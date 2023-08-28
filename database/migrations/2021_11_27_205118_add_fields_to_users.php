<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'total_mountains')) {
                $table->integer('total_mountains')->nullable()->after('remember_token');
            }
            if (!Schema::hasColumn('users', 'total_snowdays')) {
                $table->integer('total_snowdays')->nullable()->after('total_mountains');
            }
            if (!Schema::hasColumn('users', 'total_seasons')) {
                $table->integer('total_seasons')->nullable()->after('total_snowdays');
            }
            if (!Schema::hasColumn('users', 'total_friends')) {
                $table->integer('total_friends')->nullable()->after('total_seasons');
            }
            if (!Schema::hasColumn('users', 'last_logged_in_at')) {
                $table->unsignedInteger('last_logged_in_at')->nullable()->after('total_friends');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'total_mountains')) {
                $table->dropColumn('total_mountains');
            }
            if (Schema::hasColumn('users', 'total_snowdays')) {
                $table->dropColumn('total_snowdays');
            }
            if (Schema::hasColumn('users', 'total_seasons')) {
                $table->dropColumn('total_seasons');
            }
            if (Schema::hasColumn('users', 'total_friends')) {
                $table->dropColumn('total_friends');
            }
            if (Schema::hasColumn('users', 'last_logged_in_at')) {
                $table->dropColumn('last_logged_in_at');
            }
        });
    }
}