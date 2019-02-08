<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if(DB::table('paices')->get()->count() == 0){
        	DB::table('paices')->insert([
           	[
							"pais_nombre" => "Colombia" 
           	],
           	[
           		"pais_nombre" => "Venesuela"
           	],
           	[
           		"pais_nombre" => "Ecuador"
           	],
           	[
           		"pais_nombre" => "Peru"
           	],
           	[
           		"pais_nombre" => "Chile"
           	]
        	]);
        }else { 
        	echo "\La tabla de users no esta vacia."; 
        }
    }
}
