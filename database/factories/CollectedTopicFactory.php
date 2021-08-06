<?php

namespace Database\Factories;

use App\Models\CollectedTopic;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollectedTopicFactory extends Factory
{
    protected $model = CollectedTopic::class;

    public function definition()
    {
        // 获取所有的用户 ID
        $user_ids = User::all()->pluck('id')->toArray();
        $topic_ids = Topic::all()->pluck('id')->toArray();

        return [ //
            'user_id' => $this->faker->randomElement($user_ids),
            'topic_id' => $this->faker->randomElement($topic_ids),
        ];
    }
}
