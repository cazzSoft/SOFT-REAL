<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AcabadosCubreVentanas;
class AcabadoCubiertaVentanaController extends Controller
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
        $acabado=AcabadosCubreVentanas::all();
        return view('acabado.acabado_cubierta_ventana.acabado_cubierta_ventana_gestion')->with(compact('acabado'));
    }

    public function validar($request){
        $rules = [
             'name' => 'required|unique:acabado_cubventana,name',
        ];
        $messages = [
            'name.unique' => 'El nombre de la Cubierta Ventana  ya existe',
        ];
        return $this->validate($request, $rules, $messages);
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
         $cubiertaVentana = new AcabadosCubreVentanas();
         $cubiertaVentana->name = $request->name;
         $cubiertaVentana->indice = $request->indice;
         $cubiertaVentana->peso = '1';
         $cubiertaVentana->estado = 'A';

          if($cubiertaVentana->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado Cubierta Ventana se ha Registrado con exito','estado'=>'info']);
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
         $cubiertaVentana= AcabadosCubreVentanas::find($id);

          return $cubiertaVentana;
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
         $cubiertaVentana= AcabadosCubreVentanas::find($id);
         if ($cubiertaVentana->name!=$request->name) {
            $this->validar($request);
         }
         $cubiertaVentana->name = $request->name;
         $cubiertaVentana->indice = $request->indice;
         // $cubiertaVentana->peso = $request->peso;
         // $cubiertaVentana->estado = $request->estado;

         if($cubiertaVentana->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado Cubierta Ventana se ha Actualizado con exito','estado'=>'info']);
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
