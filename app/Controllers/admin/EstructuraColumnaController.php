<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EstructuraColumna;
class EstructuraColumnaController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
       $estructura=EstructuraColumna::all();
       return view('estructura.estructura_columna.estructura_columna_gestion')->with(compact('estructura'));
    }
    public function validar($request){
       $rules = [
            'name' => 'required|unique:estructura_columna,name',
       ];
       $messages = [
           'name.unique' => 'El nombre de la Estructura Columna ya existe',
       ];
       return $this->validate($request, $rules, $messages);
    }

    public function store(Request $request)
    {
        $this->validar($request);
        $columna = new EstructuraColumna();
        $columna->name = $request->name;
        $columna->indice = $request->indice;
        $columna->peso = '1';
        $columna->estado = 'A';

        if($columna->save()){
            return back()->with(['mensajeInfo'=>'La estructura Columna se ha Registrado con exito','estado'=>'info']);
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
       $columna= EstructuraColumna::findOrFail($id);
       return $columna;
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
       $columna= EstructuraColumna::find($id);
       if ($columna->name!=$request->name) {
           $this->validar($request);
        }
        $columna->name = $request->name;
        $columna->indice = $request->indice;
        // $A_closet->peso = $request->peso;
        // $A_closet->estado = $request->estado;
       if($columna->save()){
           return back()->with(['mensajeInfo'=>'La estructura columna se ha Actualizado con exito','estado'=>'info']);
       }else{
           return back()->with(['mensajeInfo'=>'No se pudo realizar la actualización','estado'=>'danger']);
       };

   }
    public function destroy($id)
    {
        //
    }
}
