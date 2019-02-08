<?php

use Illuminate\Database\Seeder;

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if(DB::table('personas')->get()->count() == 0){
        	DB::table('personas')->insert([
           	[
							"nombres" => "edwin andres",
							"apellidos" => "legro agudelo",
							"documento" => 1110,
							"email" => "maxedwwin@gmail.com",
							"municipios_id" => 1 
           	]
        	]);
        }else { 
        	echo "\La tabla de users no esta vacia."; 
        }
    }
}
