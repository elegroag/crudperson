<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if(DB::table('users')->get()->count() == 0){
        	DB::table('users')->insert([
           	[
							'nombres'   => "Asdf", 
							"apellidos" => "Edsd", 
							"email"     => "asdf@edsd.wey",
							"password"  => bcrypt('asdf'),
           ]
        	]);
        }else { 
        	echo "\La tabla de users no esta vacia."; 
        }
    }
}
