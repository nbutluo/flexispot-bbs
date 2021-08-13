<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\Reply;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    protected $model = Like::class;

    public function definition()
    {
        // 获取所有的 user_id 和 topic_id
        $user_ids = User::all()->pluck('id')->toArray();
        $topic_ids = Topic::all()->pluck('id')->toArray();
        $like_types =  [Topic::class, Reply::class];

        return [
            'user_id' => $this->faker->randomElement($user_ids),
            'likeable_type' => $this->faker->randomElement($like_types),
            'likeable_id' => $this->faker->randomElement($topic_ids),
        ];
    }
}
