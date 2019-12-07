<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\InstalacionBanos;
use Illuminate\Http\Request;

class InstalacionBanosController extends Controller
{
   public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
       $instalacion=InstalacionBanos::all();
       return view('instalacion.instalacion_banos.instalacion_banos_gestion')->with(compact('instalacion'));
    }
    public function validar($request){
       $rules = [
            'name' => 'required|unique:instalacion_banos,name',
       ];
       $messages = [
           'name.unique' => 'El nombre de la Instalacion Baño ya existe',
       ];
       return $this->validate($request, $rules, $messages);
    }

    public function store(Request $request)
    {
        $this->validar($request);
        $instalacion = new InstalacionBanos();
        $instalacion->name = $request->name;
        $instalacion->indice = $request->indice;
        $instalacion->peso = '1';
        $instalacion->estado = 'A';

        if($instalacion->save()){
            return back()->with(['mensajeInfo'=>'La instalacion Baño se ha Registrado con exito','estado'=>'info']);
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
       $instalacion= InstalacionBanos::findOrFail($id);
       return $instalacion;
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
       $instalacion= InstalacionBanos::find($id);
       if ($instalacion->name!=$request->name) {
           $this->validar($request);
        }

        $instalacion->name = $request->name;
        $instalacion->indice = $request->indice;
        // $A_closet->peso = $request->peso;
        // $A_closet->estado = $request->estado;

       if($instalacion->save()){
           return back()->with(['mensajeInfo'=>'La Instalacion Baño se ha Actualizado con exito','estado'=>'info']);
       }else{
           return back()->with(['mensajeInfo'=>'No se pudo realizar la actualización','estado'=>'danger']);
       };

   }
    public function destroy($id)
    {
        //
    }
}
