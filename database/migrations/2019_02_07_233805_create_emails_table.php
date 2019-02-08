<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->string("asunto")->default(0);
            $table->text("contenido");
            $table->integer('users_id')->unsigned();
            $table->integer('personas_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('personas_id')->references('id')->on('personas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}
