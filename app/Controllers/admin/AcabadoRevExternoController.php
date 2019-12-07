<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AcabadosRevestimientoExt;

class AcabadoRevExternoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validar($request){
        $rules = [
             'name' => 'required|unique:acabado_revesexte,name',
        ];
        $messages = [
            'name.unique' => 'El nombre del Acabado Revestimiento Externo  ya existe',
        ];
        return $this->validate($request, $rules, $messages);
    }

    public function index()
    {
        $acabado=AcabadosRevestimientoExt::all();
        return view('acabado.acabado_reve_externo.acabado_reve_externo_gestion')->with(compact('acabado'));
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
         $Rexterno = new AcabadosRevestimientoExt();
         $Rexterno->name = $request->name;
         $Rexterno->indice = $request->indice;
         $Rexterno->peso = '1';
         $Rexterno->estado = 'A';

          if($Rexterno->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado  Revestimiento Externo se ha Registrado con exito','estado'=>'info']);
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
         $Rexterno= AcabadosRevestimientoExt::find($id);

          return $Rexterno;
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
         $Rexterno= AcabadosRevestimientoExt::find($id);

         if ($Rexterno->name!=$request->name) {
             $this->validar($request);
          }

         $Rexterno->name = $request->name;
         $Rexterno->indice = $request->indice;
         // $Rexterno->peso = $request->peso;
         // $Rexterno->estado = $request->estado;

         if($Rexterno->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado Revestimiento Externo se ha Actualizado con exito','estado'=>'info']);
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
