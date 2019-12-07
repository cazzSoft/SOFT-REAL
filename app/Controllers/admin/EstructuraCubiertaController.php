<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EstructuraCubierta;
class EstructuraCubiertaController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
       $estructura=EstructuraCubierta::all();
       return view('estructura.estructura_cubierta.estructura_cubierta_gestion')->with(compact('estructura'));
    }
    public function validar($request){
       $rules = [
            'name' => 'required|unique:estructura_cubierta,name',
       ];
       $messages = [
           'name.unique' => 'El nombre de la Estructura Cubierta ya existe',
       ];
       return $this->validate($request, $rules, $messages);
    }

    public function store(Request $request)
    {
        $this->validar($request);
        $cubierta = new EstructuraCubierta();
        $cubierta->name = $request->name;
        $cubierta->indice = $request->indice;
        $cubierta->peso = '1';
        $cubierta->estado = 'A';

        if($cubierta->save()){
            return back()->with(['mensajeInfo'=>'La estructura Cubierta se ha Registrado con exito','estado'=>'info']);
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
       $cubierta= EstructuraCubierta::findOrFail($id);
       return $cubierta;
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
       $cubierta= EstructuraCubierta::find($id);
       if ($cubierta->name!=$request->name) {
           $this->validar($request);
        }
        $cubierta->name = $request->name;
        $cubierta->indice = $request->indice;
        // $A_closet->peso = $request->peso;
        // $A_closet->estado = $request->estado;
       if($cubierta->save()){
           return back()->with(['mensajeInfo'=>'La estructura cubierta se ha Actualizado con exito','estado'=>'info']);
       }else{
           return back()->with(['mensajeInfo'=>'No se pudo realizar la actualización','estado'=>'danger']);
       };

   }
    public function destroy($id)
    {
        //
    }
}
