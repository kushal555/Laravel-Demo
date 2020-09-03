<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFollowersColumnToFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('followers', function (Blueprint $table) {
            $table->unsignedInteger('follow_by')->after('id');
            $table->unsignedInteger('follow_to')->after('follow_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('followers', function (Blueprint $table) {
            $table->dropColumn('follow_by,follow_to');
        });
    }
}
