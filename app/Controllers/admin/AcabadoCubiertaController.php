<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AcabadosCubierta;
class AcabadoCubiertaController extends Controller
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
             'name' => 'required|unique:acabado_cubierta,name',
        ];
        $messages = [
            'name.unique' => 'El nombre deL Acabado Cubierta ya existe',
        ];
        return $this->validate($request, $rules, $messages);
    }
    public function index()
    {
         $acabado=AcabadosCubierta::all();
        return view('acabado.acabado_cubierta.acabado_cubierta_gestion')->with(compact('acabado'));
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

        $cubierta = new AcabadosCubierta();
        $cubierta->name = $request->name;
        $cubierta->indice = $request->indice;
        $cubierta->peso = '1';
        $cubierta->estado = 'A';

        if($cubierta->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado Cubierta se ha Registrado con exito','estado'=>'info']);
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
         $cubierta= AcabadosCubierta::find($id);

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
         $cubierta= AcabadosCubierta::find($id);
         if ($cubierta->name!=$request->name) {
             $this->validar($request);
          }
         $cubierta->name = $request->name;
         $cubierta->indice = $request->indice;
         // $cubierta->peso = $request->peso;
         // $cubierta->estado = $request->estado;

         if($cubierta->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado Cubierta se ha Actualizado con exito','estado'=>'info']);
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
