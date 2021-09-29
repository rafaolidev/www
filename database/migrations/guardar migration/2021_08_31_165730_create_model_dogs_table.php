<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelDogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {

              $table->id();
              $table->string('raca');
              $table->string('nome');
              $table->string('cor');
              $table->unsignedInteger('id_user');
              $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
              $table->integer('idade');
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
        Schema::dropIfExists('dogs');
    }
}
