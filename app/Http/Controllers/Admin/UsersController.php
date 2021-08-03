<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('success', '更新成功');
    }

    public function destroy(User $user)
    {
        $user->delete();
        // 判断是否软删除成功
        if ($user->trashed()) {
            return redirect()->route('admin.users.index')->with('success', '删除成功');;
        }
    }
}
