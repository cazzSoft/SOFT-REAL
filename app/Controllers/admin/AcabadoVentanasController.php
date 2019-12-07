<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AcabadosVentanas;

class AcabadoVentanasController extends Controller
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
    public function validar($request){
        $rules = [
             'name' => 'required|unique:acabado_ventanas,name',
        ];
        $messages = [
            'name.unique' => 'El nombre del Acabado Ventana  ya existe',
        ];
        return $this->validate($request, $rules, $messages);
    }

    public function index()
    {
        $acabado=AcabadosVentanas::all();
        return view('acabado.acabado_ventana.acabado_ventana_gestion')->with(compact('acabado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

         $ventana = new AcabadosVentanas();
         $ventana->name = $request->name;
         $ventana->indice = $request->indice;
         $ventana->peso = '1';
         $ventana->estado = 'A';

          if($ventana->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado  Ventana se ha Registrado con exito','estado'=>'info']);
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
         $ventana= AcabadosVentanas::find($id);

          return $ventana;
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
         $ventana= AcabadosVentanas::find($id);

         if ($ventana->name!=$request->name) {
             $this->validar($request);
          }
         $ventana->name = $request->name;
         $ventana->indice = $request->indice;
         // $ventana->peso = $request->peso;
         // $ventana->estado = $request->estado;

          if($ventana->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado  Ventana se ha Actualizadp con exito','estado'=>'info']);
        }else{

            return back()->with(['mensajeInfoCloset'=>'No se pudo realizar el Actualizar','estado'=>'danger']);
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
