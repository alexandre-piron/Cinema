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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',50);
            $table->string('lastname',50);
            $table->date('birthday')->nullable();
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
            $table->unsignedBigInteger('id_cinema')->nullable();#si on met default(1), ça veut dire que tous les utilisateurs qui s'enregistrent sont administrateurs du cinema 1 aors que c'est pas le cas
            $table->foreign('id_cinema')
                ->references('id')
                ->on('cinemas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
