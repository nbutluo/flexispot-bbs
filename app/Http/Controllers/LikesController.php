<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class LikesController extends Controller
{
    public function toggleLike(Reply $reply)
    {
        if (Auth::check()) {
            return  Auth::user()->toggleLike($reply);
        }

        return redirect()->route('login');
    }

    public function hasliked(Topic $topic)
    {
        $users = User::with('likes')->get();

        foreach ($users as $user) {
            dd($user->hasLiked($topic));
        }
    }
}
