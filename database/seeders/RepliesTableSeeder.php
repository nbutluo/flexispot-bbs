<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reply;

class RepliesTableSeeder extends Seeder
{
    public function run()
    {
        // 临时禁用观察者
        Reply::unsetEventDispatcher();

        Reply::factory()->times(500)->create();
    }
}
