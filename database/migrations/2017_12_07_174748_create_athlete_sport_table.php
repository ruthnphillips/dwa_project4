<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthleteSportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athlete_sport', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('athlete_id')->unsigned();
            $table->integer('sport_id')->unsigned();
            $table->foreign('athlete_id')->references('id')->on('athletes');
            $table->foreign('sport_id')->references('id')->on('sports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('athlete_sport');
    }
}
