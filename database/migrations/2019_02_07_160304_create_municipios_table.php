<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();     
        Schema::create('municipios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('muni_nombre')->default(0);         
            $table->integer('departamentos_id')->unsigned();  
            $table->timestamps();
            $table->foreign('departamentos_id')->references('id')->on('departamentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipios');
    }
}
