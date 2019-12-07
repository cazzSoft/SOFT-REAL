<?php

namespace App\Http\Controllers;

use App\UsersModel;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = auth()->user()->id;
        $consulta=UsersModel::find($user);
        //return $consulta->img;
        return view('users.perfil')->with(compact('consulta'));
    }

    public function confirmarIngreso()
    {

        $user = auth()->user()->estado;

        if( auth()->user()->estado=='Habilitado') {
               return redirect('/admin');
           }else{
               auth()->logout();
               return redirect('/')->with(['msm'=>'Su cuenta esta Desabilitado']);
           }

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $consulta=UsersModel::find(decrypt($id));
        $img="";
        $name = auth()->user()->name;
        if ($request->avatar!=null) {
          $archivo = $request->file('avatar'); // obtenemos la url del documento asi es el nombre del input de tipo file que manda el formulario
          $destino = public_path().'/avatarPerfil'; // destino donde se almacena el documento esta carpeta esta en public
          $nombreDoc = date('Ymd').time().'_'.$archivo->getClientOriginalName().'_'.$name; // le damos un nombe al documento
          $archivo->move($destino, $nombreDoc);
          $img='avatarPerfil/'.$nombreDoc;
          $consulta->img=$img;
        }

        $consulta->name=$request->name;
        $consulta->save();
        //return back()->with('mensajeInfo');
            return back()->with(['mensajeInfo'=>'El perfil fue sido actualizado con éxito','estado'=>'info']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
