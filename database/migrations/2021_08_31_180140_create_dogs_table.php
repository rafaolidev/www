<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {

              $table->increments('id');
              $table->string('raca');
              $table->string('nome');
              $table->string('cor');
              $table->integer('id_user')->unsigned();
              $table->integer('idade');
              $table->timestamps();

        });
        // cria a foreign key id_user
        Schema::table('dogs', function($table)
        {
          $table->foreign('id_user') ->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
