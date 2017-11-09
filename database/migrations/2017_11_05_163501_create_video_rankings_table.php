<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoRankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_rankings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('videos_id')->unsigned();
            $table->foreign('videos_id')->references('id')->on('videos')->onDelete('cascade');
            $table->integer('rank');
            $table->integer('votes');
            $table->string('voting_link')->comment('url to vote for this video');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_rankings');
    }
}
