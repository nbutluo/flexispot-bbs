<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedAdminUsersData extends Migration
{
    public function up()
    {
        $data = [
            [
                'username' => 'flexispot',
                'password' => "password",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'admin',
                'password' => "admin",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('admin_users')->insert($data);
    }

    public function down()
    {
        DB::table('admin_users')->truncate();
    }
}
