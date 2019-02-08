<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if(DB::table('departamentos')->get()->count() == 0){
        	DB::table('departamentos')->insert([
           	[
							"depa_nombre" => "Cundinamarca",
              "paices_id" => 1
           	],
           	[
           		"depa_nombre" => "Valle de cauca",
              "paices_id" => 1
           	],
           	[
           		"depa_nombre" => "Antioquia",
              "paices_id" => 1            
           	],
           	[
           		"depa_nombre" => "Tolima",
              "paices_id" => 1              
           	],
            [
              "depa_nombre" => "Bolívar",
              "paices_id" => 1          
            ]
        	]);
        }else { 
        	echo "\La tabla de users no esta vacia."; 
        }
    }
}
