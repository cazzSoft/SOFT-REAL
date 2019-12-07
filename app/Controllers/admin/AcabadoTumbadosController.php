<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AcabadosTumbados;
class AcabadoTumbadosController extends Controller
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
             'name' => 'required|unique:acabado_tumbados,name',
        ];
        $messages = [
            'name.unique' => 'El nombre del Acabado Rumbado  ya existe',
        ];
        return $this->validate($request, $rules, $messages);
    }

    public function index()
    {
        $acabado=AcabadosTumbados::all();
        return view('acabado.acabado_tumbado.acabado_tumbado_gestion')->with(compact('acabado'));
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

         $tumbado = new AcabadosTumbados();

         $tumbado->name = $request->name;
         $tumbado->indice = $request->indice;
         $tumbado->peso = '1';
         $tumbado->estado = 'A';

          if($tumbado->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado  Tumbado se ha Registrado con exito','estado'=>'info']);
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
         $tumbado= AcabadosTumbados::find($id);

          return $tumbado;
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
         $tumbado= AcabadosTumbados::find($id);

         if ($tumbado->name!=$request->name) {
             $this->validar($request);
          }

         $tumbado->name = $request->name;
         $tumbado->indice = $request->indice;
         // $tumbado->peso = $request->peso;
         // $tumbado->estado = $request->estado;

          if($tumbado->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado  Tumbado se ha Actualizado con exito','estado'=>'info']);
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