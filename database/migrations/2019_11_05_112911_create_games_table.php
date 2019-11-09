<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->bigInteger('home_team')->unsigned();
            $table->foreign('home_team')->references('id')->on('teams');
            $table->bigInteger('away_team')->unsigned();
            $table->foreign('away_team')->references('id')->on('teams');
            $table->integer('home_goals');
            $table->integer('away_goals');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
