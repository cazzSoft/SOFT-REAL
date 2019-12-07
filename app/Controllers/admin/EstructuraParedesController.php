<?php

namespace App\Http\Controllers\admin;

use App\EstructuraParedes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstructuraParedesController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
       $estructura=EstructuraParedes::all();
       return view('estructura.estructura_paredes.estructura_paredes_gestion')->with(compact('estructura'));
    }
    public function validar($request){
       $rules = [
            'name' => 'required|unique:estructura_paredes,name',
       ];
       $messages = [
           'name.unique' => 'El nombre de la Estructura Pared ya existe',
       ];
       return $this->validate($request, $rules, $messages);
    }

    public function store(Request $request)
    {
        $this->validar($request);
        $estructura = new EstructuraParedes();
        $estructura->name = $request->name;
        $estructura->indice = $request->indice;
        $estructura->peso = '1';
        $estructura->estado = 'A';

        if($estructura->save()){
            return back()->with(['mensajeInfo'=>'La estructura Pared se ha Registrado con exito','estado'=>'info']);
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
       $estructura= EstructuraParedes::findOrFail($id);
       return $estructura;
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
       $estructura= EstructuraParedes::find($id);
       if ($estructura->name!=$request->name) {
           $this->validar($request);
        }
        $estructura->name = $request->name;
        $estructura->indice = $request->indice;
        // $A_closet->peso = $request->peso;
        // $A_closet->estado = $request->estado;
       if($estructura->save()){
           return back()->with(['mensajeInfo'=>'La estructura Pared se ha Actualizado con exito','estado'=>'info']);
       }else{
           return back()->with(['mensajeInfo'=>'No se pudo realizar la actualización','estado'=>'danger']);
       };

   }
    public function destroy($id)
    {
        //
    }
}
