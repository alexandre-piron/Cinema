<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broadcasts', function (Blueprint $table) {
            $table->unsignedBigInteger('id_room');
            $table->unsignedBigInteger('id_movie');
            $table->date('The_date');
            $table->foreign('id_room')
                ->references('id_room')
                ->on('rooms')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_movie')
                ->references('id_movie')
                ->on('movies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('broadcasts');
    }
};
