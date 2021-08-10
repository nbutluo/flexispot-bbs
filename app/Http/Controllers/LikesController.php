<?php

namespace App\Http\Controllers;

use App\Models\Reply;
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
}
