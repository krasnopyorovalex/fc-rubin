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
        Schema::create('games', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('team_first_id')->nullable();
            $table->unsignedBigInteger('team_second_id')->nullable();
            $table->date('started_at')->nullable();
            $table->time('started_time_at')->nullable();
            $table->string('name', 512);
            $table->string('title', 512);
            $table->string('description', 512)->nullable();
            $table->text('text')->nullable();
            $table->text('preview')->nullable();
            $table->string('alias', 64)->unique();
            $table->timestamps();

            $table->foreign('team_first_id')->references('id')->on('teams')->onDelete('set null');
            $table->foreign('team_second_id')->references('id')->on('teams')->onDelete('set null');
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
