<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AcabadosEscaleras;

class AcabadoEscaleraController extends Controller
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
             'name' => 'required|unique:acabado_escalera,name',
        ];
        $messages = [
            'name.unique' => 'El nombre del Acabado Escalera  ya existe',
        ];
        return $this->validate($request, $rules, $messages);
    }

    public function index()
    {
        $acabado=AcabadosEscaleras::all();
        return view('acabado.acabado_escalera.acabado_escalera_gestion')->with(compact('acabado'));
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

         $escalera = new AcabadosEscaleras();
         $escalera->name = $request->name;
         $escalera->indice = $request->indice;
         $escalera->peso = '1';
         $escalera->estado = 'A';

          if($escalera->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado  Escalera se ha Registrado con exito','estado'=>'info']);
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
         $escalera= AcabadosEscaleras::find($id);

          return $escalera;
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
         $escalera= AcabadosEscaleras::find($id);
        if ($escalera->name!=$request->name) {
                $this->validar($request);
        }
         $escalera->name = $request->name;
         $escalera->indice = $request->indice;
         // $escalera->peso = $request->peso;
         // $escalera->estado = $request->estado;

         if($escalera->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado Escalera se ha Actualizado con exito','estado'=>'info']);
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
