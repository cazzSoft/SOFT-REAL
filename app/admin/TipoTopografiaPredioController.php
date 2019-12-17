<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\TopografiaPredio;
use Illuminate\Http\Request;

class TipoTopografiaPredioController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
     public function validar($request){
        $rules = [
             'name' => 'required|unique:topografia_predio,name',
        ];
        $messages = [
            'name.unique' => 'El nombre d la topografía predio ya existe',
        ];
        return $this->validate($request, $rules, $messages);
    }

    public function index()
    {
        $topografia=TopografiaPredio::all();
        return view('topografiaPredio.topografiaPredioGestion')->with(compact('topografia'));
    }
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
         $topografia = new TipoSueloModel();
         $topografia->name = $request->name;
         $topografia->indice = $request->indice;
         $topografia->peso = $request->indice;
         $topografia->estado = 'A';
         if($topografia->save()){
             return back()->with(['mensajeInfo'=>'La topografía predio se ha Registrado con exito','estado'=>'info']);
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
        $topografia= TopografiaPredio::find($id);
        return $topografia;
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
        $topografia= TopografiaPredio::find($id);
        if ($topografia->name!=$request->name) {
            $this->validar($request);
         }

         $topografia->name = $request->name;
         $topografia->indice = $request->indice;

        if($topografia->save()){
            return back()->with(['mensajeInfo'=>'La topografía predio se ha Actualizado con exito','estado'=>'info']);
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
