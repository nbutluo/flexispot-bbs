<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisesTable extends Migration
{
    public function up()
    {
        Schema::create('advertises', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('link')->nullable();
            $table->string('cover');
            $table->boolean('is_show')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('advertises');
    }
}
