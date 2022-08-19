<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginPost;
use App\Http\Requests\ChangePasswordPost;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        // Auth::logoutOtherDevices('123456');

        return view('login.login');
    }

    public function checklogin(LoginPost $request)
    {
        $validated = $request->validated();

        $username = $request['username'];
        $password = $request['password'];
        $remember = $request['remember'];

        if (Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
            Auth::logoutOtherDevices($password);
            # code...
            $nameuser = User::find(DB::table('users')->where('username', $username)->value('id'))->toArray();
            // var_dump($nameuser);die;
            session()->put($nameuser);
            return redirect(route('home.index'));
        } else {
            return redirect(route('login'))->with('alert', 'Sai Tài Khoản Hoặc Mật Khẩu!');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect(route('login'));
    }

    public function changePass()
    {
        return view('login.changePass');
    }

    public function checkChangePass(ChangePasswordPost $request)
    {
        $validated = $request->validated();
        if (Hash::check($request->password_old, $request->user()->password)) {
            User::find(auth()->user()->id)->update(['password' => Hash::make($request->password_new)]);
            // var_dump(User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password_new)]));die;
            return redirect(route('changePass'))->with('alert_success', 'Thay Đổi Mật Khẩu Thành Công!');
        } else {
            // var_dump($request->user()->password);die;
            return redirect(route('changePass'))->with('alert_error', 'Sai Tài Khoản Hoặc Mật Khẩu!');
        }
    }
}