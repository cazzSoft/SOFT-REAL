<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AcabadosRevestimientoInt;

class AcabadoRevInternoController extends Controller
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
             'name' => 'required|unique:acabado_revesinte,name',
        ];
        $messages = [
            'name.unique' => 'El nombre del Acabado Revestimiento Interno  ya existe',
        ];
        return $this->validate($request, $rules, $messages);
    }

    public function index()
    {
        $acabado=AcabadosRevestimientoInt::all();
        return view('acabado.acabado_reve_interno.acabado_reve_interno_gestion')->with(compact('acabado'));
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

         $Rinterno = new AcabadosRevestimientoInt();
         $Rinterno->name = $request->name;
         $Rinterno->indice = $request->indice;
         $Rinterno->peso = '1';
         $Rinterno->estado = 'A';

          if($Rinterno->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado  Revestimiento Interno se ha Registrado con exito','estado'=>'info']);
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
         $Rexterno= AcabadosRevestimientoInt::find($id);

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
         $Rinterno= AcabadosRevestimientoInt::find($id);

         if ($Rinterno->name!=$request->name) {
             $this->validar($request);
          }

         $Rinterno->name = $request->name;
         $Rinterno->indice = $request->indice;
         // $Rinterno->peso = $request->peso;
         // $Rinterno->estado = $request->estado;

          if($Rinterno->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado  Revestimiento Interno se ha Actualizado con exito','estado'=>'info']);
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
