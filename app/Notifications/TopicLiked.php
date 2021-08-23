<?php

namespace App\Notifications;

use App\Models\Topic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Auth;

class TopicLiked extends Notification
{
    use Queueable;

    public $topic;

    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        // 存入数据库里的数据
        return [
            'topic_id' => $this->topic->id,
            'topic_link' => route('topics.show', $this->topic->id),
            'topic_title' => $this->topic->title,
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'user_avatar' => Auth::user()->avatar,
        ];
    }
}
