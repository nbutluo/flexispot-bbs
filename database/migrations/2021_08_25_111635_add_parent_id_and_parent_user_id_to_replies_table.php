<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdAndParentUserIdToRepliesTable extends Migration
{
    public function up()
    {
        Schema::table('replies', function (Blueprint $table) {
            $table->integer('parent_id')->nullable()->index()->after('user_id');
            $table->integer('parent_user_id')->nullable()->index()->after('parent_id');
        });
    }

    public function down()
    {
        Schema::table('replies', function (Blueprint $table) {
            $table->dropColumn('parent_id');
            $table->dropColumn('parent_user_id');
        });
    }
}
