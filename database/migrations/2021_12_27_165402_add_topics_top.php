<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTopicsTop extends Migration
{

    public function up()
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->integer('top')->default(0);
        });
    }


    public function down()
    {
        Schema::table('topics', function (Blueprint $table) {

        });
    }
}
