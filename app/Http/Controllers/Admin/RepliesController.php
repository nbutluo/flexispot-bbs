<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyRequest;
use App\Models\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function __construct()
    {
        // 后台操作replies 禁止使用 Observer
        Reply::unsetEventDispatcher();
        return $this->middleware('verify.admin.login');
    }

    public function index()
    {
        $replies = Reply::paginate(10);

        return view('admin.replies.index', compact('replies'));
    }

    public function edit(Reply $reply)
    {
        return view('admin.replies.edit', compact('reply'));
    }


    public function update(ReplyRequest $request, Reply $reply)
    {
        $reply->fill($request->all());
        $reply->save();

        return redirect()->route('admin.replies.index')->with('success', '修改回复成功');
    }

    public function destroy(Reply $reply)
    {
        $reply->delete();

        return redirect()->route('admin.replies.index')->with('success', '成功删除！');
    }
}
