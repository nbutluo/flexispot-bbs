<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedAnnouncementsData extends Migration
{
    public function up()
    {
        $data = [
            'content' => 'Community Guidelines to Lmprove Your Experience!',
            'link' => 'https://www.baidu.com/',
            'created_at' => now(),
        ];

        DB::table('announcements')->insert($data);
    }

    public function down()
    {
        DB::table('announcements')->truncate();
    }
}
