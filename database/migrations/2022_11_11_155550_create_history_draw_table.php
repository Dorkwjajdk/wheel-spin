<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryDrawTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_draw', function (Blueprint $table) {
            $table->id();
            $table->integer('draw_id')->nullable();
            $table->string('nama');
            $table->string('code');
            $table->integer('rotation')->nullable();
            $table->date('date');
            $table->integer('prize_id');
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
        Schema::dropIfExists('history_draw');
    }
}
