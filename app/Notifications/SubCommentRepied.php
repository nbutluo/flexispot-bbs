<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Reply;

class SubCommentRepied extends Notification
{
    use Queueable;

    public $reply;

    public function __construct(Reply $reply)
    {
        $this->reply = $reply;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'reply_id' => $this->reply->id,
            'reply_content' => $this->reply->excerpt,
            'user_id' => $this->reply->parent_user_id,
            'user_name' => $this->reply->subCommentParentuser->name,
            'user_avatar' => $this->reply->subCommentParentuser->avatar,
            'topic_id' => $this->reply->topic->id,
            'topic_title' => $this->reply->topic->title,
        ];
    }
}
