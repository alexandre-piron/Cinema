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
        Schema::create('plays', function (Blueprint $table) {
            $table->unsignedBigInteger('id_movie');
            $table->unsignedBigInteger('id_casting');
            $table->foreign('id_movie')
                ->references('id_movie')
                ->on('movies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_casting')
                ->references('id_casting')
                ->on('castings')
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
        Schema::dropIfExists('plays');
    }
};