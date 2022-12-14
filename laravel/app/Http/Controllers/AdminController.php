<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function loginAdmin()
    {
        // auth()->logout();
        if (auth()->check()) {
            if($this->countPermission() > 0) {
                return redirect()->to('admins/home');
            }
        }
        return view('admins.login')->with('msg','Bạn khôg có quyền truy cập trang quản trị');
    }
    public function countPermission(){
        if (auth()->check()) {
            $roles = auth()->user()->roles;
            $count =0;
            foreach ($roles as $role) {
                $permission = $role->permissions->count();
                $count += $permission;
            }
            return $count;
        }
    }

    public function logoutAdmin()
    {
        auth()->logout();
        return view('admins.login');
    }
    public function forgotPassword()
    {
        return view('admins.forgot');
    }

    public function postloginAdmin(Request $request)
    {
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,

        ])) {
            if($this->countPermission() >0){
                return redirect()->to('admins/home');
            } else{
                return redirect()->back()->with('msg', 'Bạn không có quyền truy cập trang quản trị.');
            }
        } else {
            return redirect()->back()->with('msg', 'Tài khoản và mật khẩu không đúng.' . '<br />' . 'Vui lòng kiểm tra lại!');
        }
        
    }
}
