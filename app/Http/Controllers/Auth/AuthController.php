<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.index');
    }
    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $inputs=$request->all();
        $user=User::where('username',$inputs['username'])->first();
        if (!$user)
        {
            return redirect()->back()->withErrors(['login_error'=>'نام کاربری یا رمز عبور اشتباه است']);
        }
        $checkPassword=password_verify($inputs['password'],$user->password);
        if ($checkPassword){
            Auth::loginUsingId($user->id);
            return redirect()->intended();
        }
        return redirect()->back()->withErrors(['login_error'=>'نام کاربری یا رمز عبور اشتباه است']);
    }
}
