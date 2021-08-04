<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::paginate(10);

        return view('admin.announcements.index', compact('announcements'));
    }

    public function show(Announcement $announcement)
    {
        //TODO::首页公告
    }


    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }


    public function update(AnnouncementRequest $request, Announcement $announcement)
    {
        $announcement->fill($request->all());
        $announcement->save();

        return redirect()->route('admin.announcements.index')->with('success', '更新成功');
    }
}
