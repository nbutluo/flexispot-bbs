<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Overtrue\LaravelLike\Traits\Likeable;
use Auth;

class Topic extends Model
{
    use HasFactory;
    use Favoriteable;
    use Likeable;

    protected $fillable = [
        'title', 'body', 'category_id', 'excerpt', 'slug', 'view_count'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function scopeWithTab($query, $tab)
    {
        // 不同的排序，使用不同的数据读取逻辑
        switch ($tab) {
            case 'top':
                $query->topReplied();
                break;

            default:
                $query->recent();
                break;
        }
    }

    public function scopeTopReplied($query)
    {
        return $query->orderBy('reply_count', 'desc')->orderBy('view_count', 'desc');
    }

    public function scopeRecent($query)
    {
        // 按照创建时间排序,默认排序
        return $query->orderBy('created_at', 'desc');
    }

    public function link($params = [])
    {
        return route('topics.show', array_merge([$this->id, $this->slug], $params));
    }

    public function updateReplyCount()
    {
        $this->reply_count = $this->replies->count();
        $this->save();
    }

    // 一条帖子可以被多次收藏
    public function collects()
    {
        return $this->hasMany(CollectedTopic::class);
    }

    public function suggests()
    {
        $suggest_topics = Topic::where('category_id', $this->category_id)
            ->whereNotIn('id', [$this->id])
            ->orderBy('reply_count', 'desc')
            ->orderBy('view_count', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return $suggest_topics;
    }

    public function top()
    {
        $top_topics = Topic::orderBy('reply_count', 'desc')
            ->orderBy('view_count', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate();

        return $top_topics;
    }

    // 话该题的收藏总数
    public function likerCount()
    {
        return $this->likers()->count();
    }

    // 判断当前登录用户是否点赞过该话题
    public function hasLiked()
    {
        // return Auth::user()->hasLiked($this);
        return $this->isLikedBy(Auth::user());
    }

    // 判断当前登录用户是否点赞过该话题
    public function hasCollected()
    {
        // return Auth::user()->hasFavorited($this);
        return $this->hasBeenFavoritedBy(Auth::user());
    }

    public function updateLikeCount()
    {
        $this->like_count = $this->likers()->count();
        $this->save();
    }
}
