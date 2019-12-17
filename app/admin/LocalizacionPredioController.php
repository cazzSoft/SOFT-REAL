<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\LocalizacionPredioModel;
use Illuminate\Http\Request;

class LocalizacionPredioController extends Controller
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
             'name' => 'required|unique:localizacion_predio,name',
        ];
        $messages = [
            'name.unique' => 'El nombre de localización Predio ya existe',
        ];
        return $this->validate($request, $rules, $messages);
    }
    public function index()
    {
        $localizacion=LocalizacionPredioModel::all();
        return view('localizacionPredio.localizacionGestion')->with(compact('localizacion'));
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
    public function mostrar()
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
         $localizacion = new LocalizacionPredioModel();
         $localizacion->name = $request->name;
         $localizacion->indice = $request->indice;
         if($localizacion->save()){
             return back()->with(['mensajeInfo'=>'La Localización Predio se ha Registrado con exito','estado'=>'info']);
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
        $localizacion= LocalizacionPredioModel::findOrFail($id);
        return $localizacion;
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
        $localizacion= LocalizacionPredioModel::find($id);
        if ($localizacion->name!=$request->name) {
            $this->validar($request);
         }

         $localizacion->name = $request->name;
         $localizacion->indice = $request->indice;

        if($localizacion->save()){
            return back()->with(['mensajeInfo'=>'La localización se ha Actualizado con exito','estado'=>'info']);
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
