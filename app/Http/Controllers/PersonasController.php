<?php

namespace crudperson\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use crudperson\Personas;

class PersonasController extends Controller
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
        $personas = Personas::all();
        return response()->json($personas->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    #POST
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'documento' => 'numeric|required'
        ]);

        if($validator->fails()){
            return response()->json(["responseText" => "Error de valdiación", "type"=> 200]);
        }else{
            $persona = new Personas;
            $persona->nombres       = $request->input('nombres');
            $persona->apellidos     = $request->input('apellidos');
            $persona->documento     = $request->input('documento');
            $persona->email         = $request->input('email');
            $persona->municipios_id = $request->input('municipios_id');        
            $persona->save();
            return response()->json(["model" => $persona->toArray(), "state"=> 200]);
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
        $personas = Personas::find($id);
        return response()->json($personas->toArray());
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
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'documento' => 'numeric|required',
            'municipios_id' => 'numeric|required'
        ]);

        if($validator->fails()){
            return response()->json(["responseText" => "Error de valdiación", "type"=> 200]);
        }else{
            $persona = Personas::find($id);
            $persona->nombres       = $request->input('nombres');
            $persona->apellidos     = $request->input('apellidos');
            $persona->documento     = $request->input('documento');
            $persona->email         = $request->input('email');
            $persona->municipios_id = $request->input('municipios_id'); 
            $persona->save();
            return response()->json(["model" => $persona->toArray(), "status"=> 200]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Personas::find($id);
        $persona->delete();
        return response()->json(["data"=> [], "status"=> 200]);
    }
}
