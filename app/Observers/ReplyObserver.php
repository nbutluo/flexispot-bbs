<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\ReplyLiked;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

use App\Notifications\TopicReplied;
use App\Notifications\ReplyUpdated;

class ReplyObserver
{
    public function created(Reply $reply)
    {
        $reply->topic->updateReplyCount();
        // 通知话题作者有新的评论
        $reply->topic->user->notify(new TopicReplied($reply));
        // 通知这条回复的作者
        if ($reply->parent_id) {
            $reply->parentUser->notify(new ReplyUpdated($reply));
        }
    }

    public function creating(Reply $reply)
    {
        $reply->content = clean($reply->content, 'user_topic_body');
    }

    public function deleted(Reply $reply)
    {
        $reply->topic->updateReplyCount();
    }

    public function saving(Reply $reply)
    {
        // 生成话题回复摘录
        $reply->excerpt =  make_excerpt($reply->content, 100);
    }

    public function saved(Reply $reply)
    {
        $reply->user->notify(new ReplyLiked($reply));
    }
}
