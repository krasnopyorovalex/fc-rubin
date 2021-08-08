<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('gallery_id')->nullable();
            $table->string('city', 512);
            $table->string('name', 512);
            $table->string('title', 512);
            $table->string('description', 512)->nullable();
            $table->text('text')->nullable();
            $table->string('alias', 64)->unique();
            $table->timestamps();

            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
