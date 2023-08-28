<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mountains', function (Blueprint $table) {
            $table->id();

            $table->string('name', 255);
            $table->string('short_name', 255)->nullable();
            $table->string('url', 255);

            $table->float('lat', 8, 4);
            $table->float('lon', 8, 4);

            $table->string('region_1', 255);
            $table->string('region_2', 255);
            $table->string('region_3', 255);
            $table->string('region_3_abbrev', 255);
            $table->string('city', 255);

            $table->tinyInteger('is_active');
            $table->tinyInteger('is_international');

            $table->unsignedInteger('created_at')->nullable();
            $table->unsignedInteger('updated_at')->nullable();
        });

        Schema::create('seasons', function (Blueprint $table) {
            $table->id();

            $table->integer('rank');
            $table->tinyInteger('is_current');
            $table->string('name', 255);

            $table->unsignedInteger('created_at')->nullable();
            $table->unsignedInteger('updated_at')->nullable();
        });

        Schema::create('snowdays', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('mountain_id')->index();
            $table->unsignedBigInteger('season_id')->index();

            $table->integer('rank');
            $table->integer('day_num');
            $table->date('date');

            $table->string('title', 255)->nullable();
            $table->integer('vertical')->nullable();
            $table->text('notes')->nullable();

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
        Schema::dropIfExists('mountains');
        Schema::dropIfExists('seasons');
        Schema::dropIfExists('snowdays');
    }
}