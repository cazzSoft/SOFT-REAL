<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\InformacionModel;
use Illuminate\Http\Request;

class InformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informacion=InformacionModel::all();
       return view('informacion.index')->with(compact('informacion'));
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
        //
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
        $informacion= InformacionModel::find($id);
        return $informacion;
    }
    public function validar($request){
        $rules = [
             'nombre' => 'required|unique:informacion,nombre',

        ];
        $messages = [
            'nombre.unique' => 'El nombre del la Información  ya existe',
        ];
        return $this->validate($request, $rules, $messages);
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
        $informacion= InformacionModel::find($id);

        if ($informacion->nombre!=$request->nombre) {
            $this->validar($request);
         }


        $informacion->nombre = $request->nombre;
        $informacion->direccion = $request->direccion;
        $informacion->telefonos = $request->telefonos;
        $informacion->idcanton = $request->idcanton;


        if($informacion->save()){
            return back()->with(['mensajeInfo'=>'La información se ha Actualizado con exito','estado'=>'info']);
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
