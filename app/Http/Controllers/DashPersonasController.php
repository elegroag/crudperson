<?php

namespace crudperson\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use crudperson\Personas;
use crudperson\Municipios;
use crudperson\Emails;

class DashPersonasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$personas = DB::table('personas')
        ->join('municipios', 'municipios.id', '=', 'personas.municipios_id')
        ->select("personas.*", "municipios.muni_nombre")
        ->get();

        $municipios = DB::table('municipios')
        ->join('departamentos', 'departamentos.id', '=', 'municipios.departamentos_id')
        ->join('paices', 'paices.id', '=', 'departamentos.paices_id')        
        ->select("municipios.*", "departamentos.depa_nombre", "paices.pais_nombre")
        ->get();

        $emails =  DB::table('emails')
        ->join('users', 'users.id', '=', 'emails.users_id')
        ->join('personas', 'personas.id', '=', 'emails.personas_id')        
        ->select("emails.*", "users.nombres as users_nombre", "personas.nombres as personas_nombres", "personas.apellidos as personas_apellidos")
        ->get();
        
        $users_id = Auth::user()->id;
    	$data = [
            "_users_id"   => $users_id,
            "_emails"     => json_encode($emails->toArray()),
            "_personas"   => json_encode($personas->toArray()), 
            "_municipios" => json_encode($municipios->toArray())];
    	return view('dashboard/dash_personas', $data);
    }
}
