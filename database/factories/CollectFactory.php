<?php

namespace Database\Factories;

use App\Models\Collect;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollectFactory extends Factory
{
    protected $model = Collect::class;

    public function definition()
    {
        // 获取所有的 user_id 和 topic_id
        $user_ids = User::all()->pluck('id')->toArray();
        $topic_ids = Topic::all()->pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($user_ids),
            'favoriteable_id' => $this->faker->randomElement($topic_ids),
            'favoriteable_type' => Topic::class,
        ];
    }
}
