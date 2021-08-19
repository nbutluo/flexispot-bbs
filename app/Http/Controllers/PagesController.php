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
    public function root(Category $category)
    {
        $announcements = Announcement::first();
        $advertises = Advertise::where('is_show', true)->get();
        $categories = $category->getCategoryLevel();

        $topics = Topic::OrderBy('created_at', 'desc')
            ->OrderBy('updated_at', 'desc')
            ->paginate();

        return view('pages.root', compact('announcements', 'advertises', 'topics', 'categories'));
    }
}
