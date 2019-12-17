<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\TipoSueloModel;
use Illuminate\Http\Request;

class TipoSueloController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
     public function validar($request){
        $rules = [
             'name' => 'required|unique:tipo_suelo,name',
        ];
        $messages = [
            'name.unique' => 'El nombre del tipo suelo ya existe',
        ];
        return $this->validate($request, $rules, $messages);
    }

    public function index()
    {
        $tipoSuelo=TipoSueloModel::all();
        return view('tipoSuelo.tipoSueloGestion')->with(compact('tipoSuelo'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validar($request);
         $tipoSuelo = new TipoSueloModel();
         $tipoSuelo->name = $request->name;
         $tipoSuelo->indice = $request->indice;
         $tipoSuelo->peso = $request->indice;
         $tipoSuelo->estado = 'A';
         if($tipoSuelo->save()){
             return back()->with(['mensajeInfo'=>'El tipo suelo se ha Registrado con exito','estado'=>'info']);
        }else{
            return back()->with(['mensajeInfo'=>'No se pudo realizar el registro','estado'=>'danger']);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id=decrypt($id);
        $tipoSuelo= TipoSueloModel::find($id);
        return $tipoSuelo;
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
        $id=decrypt($id);
        $tipoSuelo= TipoSueloModel::find($id);
        if ($tipoSuelo->name!=$request->name) {
            $this->validar($request);
         }

         $tipoSuelo->name = $request->name;
         $tipoSuelo->indice = $request->indice;

        if($tipoSuelo->save()){
            return back()->with(['mensajeInfo'=>'El tipo Suelo se ha Actualizado con exito','estado'=>'info']);
        }else{
            return back()->with(['mensajeInfo'=>'No se pudo realizar la actualización','estado'=>'danger']);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
