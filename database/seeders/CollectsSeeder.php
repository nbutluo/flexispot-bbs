<?php

namespace Database\Seeders;

use App\Models\Collects;
use Illuminate\Database\Seeder;

class CollectsSeeder extends Seeder
{
    public function run()
    {
        Collects::factory()->times(200)->create();
    }
}
