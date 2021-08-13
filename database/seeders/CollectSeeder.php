<?php

namespace Database\Seeders;

use App\Models\Collect;
use Illuminate\Database\Seeder;

class CollectSeeder extends Seeder
{
    public function run()
    {
        Collect::factory()->times(200)->create();
    }
}
