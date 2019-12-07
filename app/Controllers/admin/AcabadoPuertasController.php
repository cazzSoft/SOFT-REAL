<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AcabadosPuertas;
class AcabadoPuertasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validar($request){
        $rules = [
             'name' => 'required|unique:acabado_puertas,name',
        ];
        $messages = [
            'name.unique' => 'El nombre del Acabado Puerta  ya existe',
        ];
        return $this->validate($request, $rules, $messages);
    }

    public function index()
    {
        $acabado=AcabadosPuertas::all();
        return view('acabado.acabado_puerta.acabado_puerta_gestion')->with(compact('acabado'));
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
         $puerta = new AcabadosPuertas();
         $puerta->name = $request->name;
         $puerta->indice = $request->indice;
         $puerta->peso = '1';
         $puerta->estado = 'A';

          if($puerta->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado  Puerta se ha Registrado con exito','estado'=>'info']);
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
         $puerta= AcabadosPuertas::find($id);

          return $puerta;
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
         $puerta= AcabadosPuertas::find($id);

         if ($puerta->name!=$request->name) {
             $this->validar($request);
          }

         $puerta->name = $request->name;
         $puerta->indice = $request->indice;
         // $puerta->peso = $request->peso;
         // $puerta->estado = $request->estado;

          if($puerta->save()){
             return back()->with(['mensajeInfoCloset'=>'El Acabado Puerta se ha Actualizado con exito','estado'=>'info']);
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
