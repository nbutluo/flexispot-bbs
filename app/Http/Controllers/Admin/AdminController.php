<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('admin.user')) {
            return redirect()->route('admin.users.index');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function create(Request $request)
    {
        // 如果未登录，则跳转到登录页面
        if ($request->session()->has('admin.user')) {
            return redirect()->route('admin.users.index')->with('warning', '您已登录，无须操作');
        } else {
            return view('admin.login.create');
        }
    }

    public function store(AdminRequest $request)
    {
        $res = Admin::where([
            'username' => $request->username,
            'password' => $request->password
        ])->get();

        //如果有就代表账号密码正确,写入session
        if ($res->count()) {
            $request->session()->put('admin.user', $request->username);
            return redirect()->route('admin.users.index')->with('success', '欢迎回来！');
        } else {
            session()->flash('danger', '用户名或密码错误');
            return redirect()->back()->withInput();
        }
    }

    public function logout(Request $request)
    {
        //判断session里面是否有值(用户是否登陆)
        if ($request->session()->has('admin.user')) {
            //移除session
            $request->session()->pull('admin.user', session('admin.user'));
        }
        return redirect()->route('admin.login')->with('success', '成功退出');;
    }
}
