<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Overtrue\LaravelLike\Traits\Likeable;
use Auth;

class Reply extends Model
{
    use HasFactory;
    use Likeable;

    protected $fillable = ['content'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
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
