<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AcabadosCloset;

class AcabadoClosetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $acabado=AcabadosCloset::all();
        return view('acabado.acabado_closet.acabado_closet_gestion')->with(compact('acabado'));
    }
    public function validar($request){
        $rules = [
             'name' => 'required|unique:acabado_closet,name',
        ];
        $messages = [
            'name.unique' => 'El nombre deL Acabado Closet ya existe',
        ];
        return $this->validate($request, $rules, $messages);
    }

    public function store(Request $request)
    {
         $this->validar($request);
         $A_closet = new AcabadosCloset();
         $A_closet->name = $request->name;
         $A_closet->indice = $request->indice;
         $A_closet->peso = '1';
         $A_closet->estado = 'A';

         if($A_closet->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado Closet se ha Registrado con exito','estado'=>'info']);
        }else{
            return back()->with(['mensajeInfoCloset'=>'No se pudo realizar el registro','estado'=>'danger']);
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
        $A_closet= AcabadosCloset::findOrFail($id);
        return $A_closet;
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
        $A_closet= AcabadosCloset::find($id);
        if ($A_closet->name!=$request->name) {
            $this->validar($request);
         }

         $A_closet->name = $request->name;
         $A_closet->indice = $request->indice;
         // $A_closet->peso = $request->peso;
         // $A_closet->estado = $request->estado;

        if($A_closet->save()){
            return back()->with(['mensajeInfoCloset'=>'El Acabado Closet se ha Actualizado con exito','estado'=>'info']);
        }else{
            return back()->with(['mensajeInfoCloset'=>'No se pudo realizar la actualización','estado'=>'danger']);
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
