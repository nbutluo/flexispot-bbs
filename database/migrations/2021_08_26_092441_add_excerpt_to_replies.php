<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExcerptToReplies extends Migration
{
    public function up()
    {
        Schema::table('replies', function (Blueprint $table) {
            $table->string('excerpt')->after('like_count')->nullable();
        });
    }

    public function down()
    {
        Schema::table('replies', function (Blueprint $table) {
            $table->dropColumn('excerpt');
        });
    }
}
