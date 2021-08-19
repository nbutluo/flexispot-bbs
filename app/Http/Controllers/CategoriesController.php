<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Advertise;
use App\Models\Announcement;

class CategoriesController extends Controller
{
    public function show(Category $category, Request $request, Topic $topic)
    {
        $announcements = Announcement::first();
        $advertises = Advertise::where('is_show', true)->get();
        $categories = $category->getCategoryLevel();

        // 读取分类 ID 关联的话题，并按每 20 条分页
        $topics = $topic->withTab($request->tab)
            ->where('category_id', $category->id)
            ->with('user', 'category')   // 预加载防止 N+1 问题
            ->paginate(20);

        // 传参变量话题和分类到模板中
        // return view('pages.root', compact('topics', 'category'));
        return view('pages.root', compact('announcements', 'advertises', 'topics', 'categories'));
    }
}
