<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\TipoTraspasosModel;
use Illuminate\Http\Request;

class TipoTraspasosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function validar($request){
        $rules = [
             'name' => 'required|unique:tipo_traspasos,name',
        ];
        $messages = [
            'name.unique' => 'El nombre del tipo traspaso ya existe',
        ];
        return $this->validate($request, $rules, $messages);
    }

    public function index()
    {
        $traspaso=TipoTraspasosModel::all();
        return view('tipoTraspaso.tipoTraspasosGestion')->with(compact('traspaso'));
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
        //dd($request);
         $this->validar($request);
         $traspaso = new TipoTraspasosModel();
         $traspaso->name = $request->name;
         $traspaso->descuento_alcabalas  = $request->descuentoalcabalas;
         $traspaso->descuento_utilidades  = $request->descuentutilidades;
         if($traspaso->save()){
             return back()->with(['mensajeInfo'=>'El tipo traspasos se ha Registrado con exito','estado'=>'info']);
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
        $traspaso= TipoTraspasosModel::find($id);
        return $traspaso;
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
        $traspaso= TipoTraspasosModel::find($id);
        if ($traspaso->name!=$request->name) {
            $this->validar($request);
         }
         $traspaso->name = $request->name;
         $traspaso->descuento_alcabalas  = $request->descuento_alcabalas;
         $traspaso->descuento_utilidades  = $request->descuento_utilidades;

        if($traspaso->save()){
            return back()->with(['mensajeInfo'=>'El tipo de traspaso se ha Actualizado con exito','estado'=>'info']);
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
