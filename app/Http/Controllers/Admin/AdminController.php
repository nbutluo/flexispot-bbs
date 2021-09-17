<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify.admin.login', ['except'=>['store','create']]);
    }

    // 将用户列表作为后台首页
    public function index(Request $request)
    {
        return redirect()->route('admin.users.index');
    }


    public function create(Request $request)
    {
        if ($request->session()->has('admin.user')) {
            return redirect()->route('admin.users.index')->with('warning', '您已登录，无须操作');
        }
        // 如果未登录，则跳转到登录页面
        return view('admin.login.create');
    }

    public function store(AdminRequest $request)
    {
        $user = Admin::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // 密码匹配
            $request->session()->put('admin.user', $request->username);
            return redirect()->route('admin.users.index')->with('success', '欢迎回来！');
        }

        return redirect()->back()->with('error', '用户名或密码错误');
    }

    public function logout(Request $request)
    {
        //判断session里面是否有值(用户是否登陆)
        if ($request->session()->has('admin.user')) {
            //移除session
            $request->session()->pull('admin.user', session('admin.user'));
        }

        return redirect()->route('admin.login.create')->with('success', '成功退出');
    }
}
