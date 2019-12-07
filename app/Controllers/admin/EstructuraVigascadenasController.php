<?php

namespace App\Http\Controllers\admin;

use App\EstructuraVigasCadenas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstructuraVigascadenasController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
       $estructura=EstructuraVigasCadenas::all();
       return view('estructura.estructura_vigascadenas.estructura_vigascadenas_gestion')->with(compact('estructura'));
    }
    public function validar($request){
       $rules = [
            'name' => 'required|unique:estructura_vigascadenas,name',
       ];
       $messages = [
           'name.unique' => 'El nombre de la Estructura Viga cadena ya existe',
       ];
       return $this->validate($request, $rules, $messages);
    }

    public function store(Request $request)
    {
        $this->validar($request);
        $estructura = new EstructuraVigasCadenas();
        $estructura->name = $request->name;
        $estructura->indice = $request->indice;
        $estructura->peso = '1';
        $estructura->estado = 'A';

        if($estructura->save()){
            return back()->with(['mensajeInfo'=>'La estructura Viga Cadena se ha Registrado con exito','estado'=>'info']);
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
       $estructura= EstructuraVigasCadenas::findOrFail($id);
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
       $estructura= EstructuraVigasCadenas::find($id);
       if ($estructura->name!=$request->name) {
           $this->validar($request);
        }
        $estructura->name = $request->name;
        $estructura->indice = $request->indice;
        // $A_closet->peso = $request->peso;
        // $A_closet->estado = $request->estado;
       if($estructura->save()){
           return back()->with(['mensajeInfo'=>'La estructura Viga cadena se ha Actualizado con exito','estado'=>'info']);
       }else{
           return back()->with(['mensajeInfo'=>'No se pudo realizar la actualización','estado'=>'danger']);
       };

   }
    public function destroy($id)
    {
        //
    }
}
