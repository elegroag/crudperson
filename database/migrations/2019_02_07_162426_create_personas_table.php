<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->integer('documento')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('municipios_id')->unsigned();                    
            $table->timestamps();
            $table->foreign('municipios_id')->references('id')->on('municipios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
