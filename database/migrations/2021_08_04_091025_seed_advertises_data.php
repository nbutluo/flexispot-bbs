<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedAdvertisesData extends Migration
{
    public function up()
    {
        $data = [
            [
                'title' => 'test1',
                'cover' => 'https://via.placeholder.com/334x278.png/00ff77?text=Flexispot_One',
                'link' => 'https://www.baidu.com/',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'test2',
                'cover' => 'https://via.placeholder.com/334x278.png/00ff77?text=Flexispot_Two',
                'link' => 'https://www.baidu.com/',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('advertises')->insert($data);
    }

    public function down()
    {
        DB::table('advertises')->truncate();
    }
}
