<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $avatars = [
            asset('assets/avatar/1.png'),
            asset('assets/avatar/2.png'),
            asset('assets/avatar/3.png'),
            asset('assets/avatar/4.png'),
            asset('assets/avatar/5.png'),
            asset('assets/avatar/6.png'),
        ];

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'introduction' => $this->faker->sentence(),
            'avatar' => $this->faker->randomElement($avatars),
        ];
    }
}
