<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\Announcement;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Models\Category;
use PhpParser\Node\Expr\Cast\Object_;

class PagesController extends Controller
{
    public function root(Request $request, Category $category, Topic $topic)
    {
        $announcements = Announcement::first();
        $advertises = Advertise::where('is_show', true)->get();
        $categories = $category->getCategoryLevel();

        $topics = $topic->withTab($request->tab)
            ->with('user', 'category')  // 预加载防止 N+1 问题
            ->paginate();

        return view('pages.root', compact('announcements', 'advertises', 'topics', 'categories'));
    }
}
