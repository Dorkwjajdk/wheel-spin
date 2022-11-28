<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('wheel')->nullable();
            $table->string('outwheel')->nullable();
            $table->string('logo')->nullable();
            $table->string('background')->nullable();
            $table->string('favicon')->nullable();
            $table->string('music')->nullable();
            $table->string('music_win')->nullable();
            $table->string('music_lose')->nullable();
            $table->string('music_spin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content');
    }
}
