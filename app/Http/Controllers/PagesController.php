<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\Announcement;
use App\Models\Topic;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root()
    {
        $announcements = Announcement::first();
        $advertises = Advertise::where('is_show', true)->get();

        $topics = Topic::OrderBy('created_at', 'desc')
            ->OrderBy('updated_at', 'desc')
            ->paginate();

        // dda($topics);
        return view('pages.root', compact('announcements', 'advertises', 'topics'));
    }
}
