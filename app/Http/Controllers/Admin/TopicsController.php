<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    public function __construct()
    {
        // 后台操作topic 禁止使用 Observer
        // Topic::unsetEventDispatcher();
        return $this->middleware('verify.admin.login');
    }

    public function index()
    {
        $topics = Topic::paginate(10);

        return view('admin.topics.index', compact('topics'));
    }

    public function edit(Topic $topic)
    {
        $categories = Category::all();

        return view('admin.topics.edit', compact('topic', 'categories'));
    }

    public function update(TopicRequest $request, Topic $topic)
    {
        // 后台操作topic 禁止使用 Observer
        Topic::unsetEventDispatcher();

        $topic->fill($request->all());
        $topic->save();

        return redirect()->route('admin.topics.index')->with('success', '更新成功');
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('admin.topics.index')->with('success', '成功删除！');
    }
}
