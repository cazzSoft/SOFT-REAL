<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\TipoCalle;
use Illuminate\Http\Request;

class TipoCalleController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
     public function validar($request){
        $rules = [
             'name' => 'required|unique:tipo_calle,name',
        ];
        $messages = [
            'name.unique' => 'El nombre del tipo calle ya existe',
        ];
        return $this->validate($request, $rules, $messages);
    }
    public function index()
    {
        $tipocalle=TipoCalle::all();
        return view('tipoCalle.tipoCalleGestion')->with(compact('tipocalle'));
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
         $tipocalle = new TipoCalle();
         $tipocalle->name = $request->name;
         $tipocalle->indice = $request->indice;
         if($tipocalle->save()){
             return back()->with(['mensajeInfo'=>'El tipo calle se ha Registrado con exito','estado'=>'info']);
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
        $tipocalle= TipoCalle::findOrFail($id);
        return $tipocalle;
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
        $tipocalle= TipoCalle::find($id);
        if ($tipocalle->name!=$request->name) {
            $this->validar($request);
         }

         $tipocalle->name = $request->name;
         $tipocalle->indice = $request->indice;

        if($tipocalle->save()){
            return back()->with(['mensajeInfo'=>'El tipo calle se ha Actualizado con exito','estado'=>'info']);
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
