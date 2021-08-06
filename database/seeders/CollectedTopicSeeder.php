<?php

namespace Database\Seeders;

use App\Models\CollectedTopic;
use Illuminate\Database\Seeder;

class CollectedTopicSeeder extends Seeder
{
    public function run()
    {
        CollectedTopic::factory()->times(200)->create();
    }
}
