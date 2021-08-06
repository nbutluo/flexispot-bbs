<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectedTopic extends Model
{
    use HasFactory;

    protected $fillable = ['topic_id', 'user_id'];

    // 一条收藏记录属于一个话题
    public function topics()
    {
        return $this->belongsTo(Topic::class);
    }

    // 一条收藏记录属于一个用户所有
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
