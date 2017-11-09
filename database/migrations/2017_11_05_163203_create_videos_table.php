<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('athletes_id')->unsigned();
            $table->foreign('athletes_id')->references('id')->on('athletes');
            $table->string('sport')->comment('example, football, basketball');
            $table->string('position')->comment('example, quaterback, pointguard');
            $table->boolean('submitted')->comment('if video is submitted for voting');
            $table->string('video_link');
            $table->string('voting_link')->nullable()->comment('url to vote for this video');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
