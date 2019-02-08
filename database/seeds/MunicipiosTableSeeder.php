<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if(DB::table('municipios')->get()->count() == 0){
        	DB::table('municipios')->insert([
           	[
							"muni_nombre" => "Bogotá D.C.",
              "departamentos_id" => 1
           	],
           	[
           		"muni_nombre" => "Cali",
              "departamentos_id" => 2
           	],
           	[
           		"muni_nombre" => "Medellin",
              "departamentos_id" => 3            
           	],
           	[
           		"muni_nombre" => "Ibagué",
              "departamentos_id" => 4              
           	],
            [
              "muni_nombre" => "Cartagena",
              "departamentos_id" => 5          
            ]
        	]);
        }else { 
        	echo "\La tabla de users no esta vacia."; 
        }
    }
}
