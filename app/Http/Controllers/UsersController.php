<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Handlers\ImageUploadHandler;
use App\Models\Topic;
use App\Handlers\Base64ImageHandler;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index(User $user)
    {
        $users = User::paginate();
        dda($users);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user, Base64ImageHandler $base64handler)
    {
        $this->authorize('update', $user);

        $data = $user->fill($request->all());

        // dda($data);
        if ($request->avatar) {
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $data['avatar'][0], $result)) {
                $res = $base64handler->base64_image_content($request->avatar, 'avatar');
                $data['avatar'] = $res;
            } else {
                $data['avatar'] = $data['avatar'][0];
            }
        }

        $user->save();
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
