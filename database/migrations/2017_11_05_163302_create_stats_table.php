<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('athletes_id')->unsigned();
            $table->foreign('athletes_id')->references('id')->on('athletes')->onDelete('cascade');
            $table->integer('videos_id')->unsigned()->nullable();
            $table->foreign('videos_id')->references('id')->on('videos');
            $table->string('match_name')->comment('example Bulls vs Rams');
            $table->date('match_date');
            $table->string('score_description')->comment('example touchdowns, assists, rebounds');
            $table->integer('score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stats');
    }
}
