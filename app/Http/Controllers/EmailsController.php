<?php

namespace crudperson\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use crudperson\Emails;
use crudperson\Personas;
use crudperson\Users;


class EmailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Emails::all();
        return response()->json($emails->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->id == $request->input('users_id'))
        {            
            $email = new Emails;
            $email->asunto = $request->input('asunto');        
            $email->contenido = $request->input('contenido');        
            $email->users_id = $request->input('users_id');
            $email->personas_id = $request->input('personas_id');
            $email->save();

            $persona = Personas::find($request->input('personas_id'));
            $email->personas_nombres = $persona->nombres;            
            $email->personas_apellidos = $persona->apellidos;
            
            return response()->json(["model" => $email->toArray(), "state"=> 200]);
        }else{
            return response()->json(["error" => "El usuario no es mismo que esta logeado.", "state"=> 200]);            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $email = Emails::find($id);
        return response()->json($email->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $email = Emails::find($id);
        $email->delete();
        return response()->json(["data"=> [], "status"=> 200]);
    }
}
