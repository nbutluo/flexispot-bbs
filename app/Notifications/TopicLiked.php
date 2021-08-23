<?php

namespace App\Notifications;

use App\Models\Topic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

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
            'user_id' => $this->topic->user->id,
            'user_name' => $this->topic->user->name,
            'user_avatar' => $this->topic->user->avatar,
        ];
    }
}
