<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AcabadosPisos;
class AcabadoPisosController extends Controller
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
             'name' => 'required|unique:acabado_pisos,name',
        ];
        $messages = [
            'name.unique' => 'El nombre del Acabado Piso  ya existe',
        ];
        return $this->validate($request, $rules, $messages);
    }

    public function index()
    {
        $acabado=AcabadosPisos::all();
        return view('acabado.acabado_pisos.acabado_piso_gestion')->with(compact('acabado'));
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

        $piso = new AcabadosPisos();
         $piso->name = $request->name;
         $piso->indice = $request->indice;
         $piso->peso = '1';
         $piso->estado = 'A';

          if($piso->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado  Piso se ha Registrado con exito','estado'=>'info']);
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
         $piso= AcabadosPisos::find($id);

          return $piso;
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
         $piso= AcabadosPisos::find($id);

        if ($piso->name!=$request->name) {
           $this->validar($request);
        }

         $piso->name = $request->name;
         $piso->indice = $request->indice;
         // $piso->peso = $request->peso;
         // $piso->estado = $request->estado;

          if($piso->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado Piso se ha Actualizado con exito','estado'=>'info']);
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
