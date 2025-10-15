<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Config\ApiConfigRequest;
use App\Http\Requests\Panel\Config\ConfigRequest;
use App\Models\Brand;
use App\Models\Config;
use App\Models\Prefix;
use App\Models\Role;
use App\Services\ImageService\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $config = Config::first();
        $roles = Role::where('status', 'active')->get();
        $brands = Brand::where('status', 'active')->get();
        return view('panel.config.index', compact('config', 'brands', 'roles'));
    }


    public function off(Request $request)
    {
        $config = Config::first();
        $config->update(['status' => $request->input('status_system', 'off')]);
        if (!$request->input('status_system')) {
            Artisan::call('down --secret=sWAFc9VapjfZl9Poq');
        } else {
            Artisan::call('up');
        }
        return redirect()->route('panel.index');
    }

    public function uploadBaner(ConfigRequest $request, ImageService $imageService)
    {
        try {

            if ($request->hasFile('photo_baner')) {

                $imageService->setRootFolder('config' . DIRECTORY_SEPARATOR . 'images');
                $config = Config::first();
                $photoBaner = $config->photo()?->first();
                $path = $imageService->saveImage($request->file('photo_baner'));

                if (!$path) {
                    return redirect()->back()->withErrors(['config-error' => 'در ذخیره سازی  بنر صفحه داشبورد خطا ایجاد شد لطفا با پشیبانی تماس حاصل فرمایید.']);

                }
                if ($photoBaner) {
                    if (public_path($config->photo?->path)) {
                        $rootFile = public_path($config->photo?->path);
                        $imageService->deleteImage($rootFile);
                    }
                    $photoBaner->update(['path' => $path]);

                }else{
                    $config->photo()->create(['path' => $path]);
                }
                return redirect()->route('panel.config.index')->with(['success' => 'بنر صفحه داشبورد با موفقیت ایجاد شد.']);

            }
            return redirect()->back()->withErrors(['config-error' => 'لطفا یک بنر انتخاب کنید']);


        }catch (\Exception $exception)
        {
            return redirect()->back()->withErrors(['config-error' => 'عملیات با شکست مواجه شد لطفا با پشتیبانی تماس بگیرد و بعدا تلاش فرمایید']);

        }

    }
    public function dashboardBaner(ConfigRequest $request, ImageService $imageService)
    {
        try {

            if ($request->hasFile('dashboard_baner')) {

                $imageService->setRootFolder('config' . DIRECTORY_SEPARATOR . 'images');
                $config = Config::first();
                $photoBaner = $config->photo()?->skip(1)->first();
                $path = $imageService->saveImage($request->file('dashboard_baner'));

                if (!$path) {
                    return redirect()->back()->withErrors(['config-error' => 'در ذخیره سازی  بنر صفحه آپلود اکسل ها  خطا ایجاد شد لطفا با پشیبانی تماس حاصل فرمایید.']);

                }
                if ($photoBaner) {
                    if (public_path($photoBaner->path)) {
                        $rootFile = public_path($photoBaner->path);
                        $imageService->deleteImage($rootFile);
                    }
                    $photoBaner->update(['path' => $path]);

                }else{
                    $config->photo()->create(['path' => $path]);
                }
                return redirect()->route('panel.config.index')->with(['success' => 'آپلود بنر صفحه اکسل ها  با موفقیت ایجاد شد.']);

            }
            return redirect()->back()->withErrors(['config-error' => 'لطفا یک بنر انتخاب کنید']);


        }catch (\Exception $exception)
        {
            return redirect()->back()->withErrors(['config-error' => 'عملیات با شکست مواجه شد لطفا با پشتیبانی تماس بگیرد و بعدا تلاش فرمایید']);

        }

    }

    public function roleStore(ApiConfigRequest $request)
    {
        $inputs=$request->all();
        $inputs['name']=$inputs['role'];
        $role=Role::create($inputs);
        return response()->json(['success'=>true,'message'=>'نقش  جدید ساخته شد','data'=>$role]);
    }
    public function banerStore(ApiConfigRequest $request)
    {
        $inputs=$request->all();
        $inputs['name']=$inputs['baner'];
        $baner=Brand::create($inputs);
        return response()->json(['success'=>true,'message'=>'بنر  جدید ساخته شد','data'=>$baner]);
    }
}
