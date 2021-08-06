<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectedTopicsTable extends Migration
{
    public function up()
    {
        Schema::create('collected_topics', function (Blueprint $table) {
            $table->id();
            $table->integer('topic_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('collected_topics');
    }
}
