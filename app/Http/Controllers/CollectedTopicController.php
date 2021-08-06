<?php

namespace App\Http\Controllers;

use App\Models\CollectedTopic;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class CollectedTopicController extends Controller
{
    public function collects(User $user)
    {
        $topic_ids =  $user->collectedTopics->pluck('topic_id')->toArray();

        $collected_topics = Topic::whereIn('id', $topic_ids)->paginate(10);
        // TODO:: 用户收藏的话题
        dda($collected_topics);
        return 'index';
    }
}
