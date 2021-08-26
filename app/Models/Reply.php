<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Overtrue\LaravelLike\Traits\Likeable;
use Auth;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reply extends Model
{
    use HasFactory;
    use Likeable;

    protected $fillable = ['content', 'parent_id', 'parent_user_id', 'user_id', 'topic_id'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function parentUser()
    {
        return $this->belongsTo(User::class, 'parent_user_id');
    }

    public function parentTopic()
    {
        return $this->belongsTo(Reply::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 评论的点赞数
    public function likerCount()
    {
        return $this->likers()->count();
    }

    public function hasLiked()
    {
        // return Auth::user()->hasLiked($this);
        return $this->isLikedBy(Auth::user());
    }

    public function updateLikeCount()
    {
        $this->like_count = $this->likers()->count();
        $this->save();
    }
}
