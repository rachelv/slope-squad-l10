<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats_users_mountains', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('mountain_id')->index();

            $table->integer('total_snowdays')->nullable();
            $table->integer('total_seasons')->nullable();
            $table->integer('total_vertical')->nullable();

            $table->unsignedInteger('created_at')->nullable();
            $table->unsignedInteger('updated_at')->nullable();
        });

        Schema::create('stats_users_seasons', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('season_id')->index();

            $table->integer('total_snowdays')->nullable();
            $table->integer('total_mountains')->nullable();
            $table->integer('total_vertical')->nullable();

            $table->unsignedInteger('created_at')->nullable();
            $table->unsignedInteger('updated_at')->nullable();
        });

        Schema::create('stats_users_seasons_mountains', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('season_id')->index();
            $table->unsignedBigInteger('mountain_id')->index();

            $table->integer('total_snowdays')->nullable();
            $table->integer('total_vertical')->nullable();

            $table->unsignedInteger('created_at')->nullable();
            $table->unsignedInteger('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stats_users_mountains');
        Schema::dropIfExists('stats_users_seasons');
        Schema::dropIfExists('stats_users_seasons_mountains');
    }
}