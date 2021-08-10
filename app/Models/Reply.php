<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Overtrue\LaravelLike\Traits\Likeable;

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

    // 帖子的点赞数
    public function updateReplyLikeCount()
    {
        $this->like_count = $this->likers()->count();
        $this->save();
    }
}
