<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();        
        Schema::create('departamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('depa_nombre')->default(0);
            $table->integer('paices_id')->unsigned();
            $table->timestamps();
            $table->foreign('paices_id')->references('id')->on('paices')->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
