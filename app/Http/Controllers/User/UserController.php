<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\UserRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Role;
use App\Services\ImageService\ImageService;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(15)->onEachSide(2);
        $cities=City::where('status','active')->get();
        $brands = Brand::where('status', 'active')->get();
        return view('panel.user.index', compact('users','brands','cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::where('status', 'active')->get();
        $roles = Role::where('status', 'active')->get();
        $cities=City::where('status','active')->get();
        return view('panel.user.create', compact('brands', 'roles','cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request, ImageService $imageService)
    {
        try {
            $inputs = $request->all();
            DB::beginTransaction();
            $user = User::create($inputs);
            $user->roles()->sync($inputs['role_id']);

            if ($request->hasFile('photo')) {
                $imageService->setRootFolder('users');
                $imageService->setFileFolder('avatar');
                $path = $imageService->saveImage($request->file('photo'));
                if ($path) {
                    $user->photo()->create(['path' => $path]);
                } else {
                    return redirect()->back()->withErrors(['user-error' => 'در ذخیره سازی پروفایل کاربر مشکل ایجاد شد لطفا با پشیبانی تماس حاصل فرمایید.']);
                }
            }

            DB::commit();
            return redirect()->route('panel.user.index')->with(['success' => 'کاربر جدید با موفقیت ساخته شد']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['user-error' => 'روند ذخیره سازی با مشکل روبه رو شد لطفا با پشتیبانی تماس بگیرد']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $brands = Brand::where('status', 'active')->get();
        $cities=City::where('status','active')->get();
        $roles = Role::where('status', 'active')->get();
        return view('panel.user.edit', compact('brands', 'roles', 'user','cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user, ImageService $imageService)
    {
        try {
            $inputs = $request->all();
            DB::beginTransaction();
            $user->roles()->sync($inputs['role_id']);

            if ($request->hasFile('photo')) {
                $path = $user->photo()->first();

                if ($path and public_path($user->photo?->path)) {
                    $rootFile = public_path($user->photo?->path);
                    $imageService->deleteImage($rootFile);
                }

                $imageService->setRootFolder('users' . DIRECTORY_SEPARATOR . 'avatar');
                $path = $imageService->saveImage($request->file('photo'));
                if ($path) {
                    $user->photo()->updateOrCreate(['fileable_id' => $user->id, 'fileable_type' => get_class($user)], ['path' => $path]);
                } else {
                    return redirect()->back()->withErrors(['user-error' => 'در بروزرسانی پروفایل کاربر مشکل ایجاد شد لطفا با پشیبانی تماس حاصل فرمایید.']);
                }
            }
            $user->update($inputs);

            DB::commit();
            return redirect()->route('panel.user.index')->with(['success' => 'عملیات بروز‌رسانی موفق بود؛ اطلاعات شما با موفقیت به‌روز شد']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['user-error' => 'روند ذخیره سازی با مشکل روبه رو شد لطفا با پشتیبانی تماس بگیرد']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('panel.user.index')->with(['success' => 'عملیات حذف موفقیت آمزیر بود']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['user-error' => 'عملیات حذف با مشکل روبه رو شد لطفا با پشتیبانی تماس بگیرد']);
        }
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(new UsersExport, 'users.xlsx');

    }
}
