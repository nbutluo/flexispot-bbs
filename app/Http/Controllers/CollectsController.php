<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 切换收藏话题
    public function toggleFavorite(Topic $topic)
    {
        return Auth::user()->toggleFavorite($topic);
    }

    // 获取用户收藏的话题
    public function userCollectedTopics(User $user)
    {
        return $user->getFavoriteItems(Topic::class)->paginate();
    }
}
