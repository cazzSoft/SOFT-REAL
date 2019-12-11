<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contribuyente;
use App\EstadoCivil;
use App\TipoContribuyente;
use App\TipoDocumento;
use App\Segmento;
use DB;
class ContribuyenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       // $contribuyentes = Contribuyente::all();
          $contribuyentes=Contribuyente::latest()->take(10)->get();
        return view('contributor/index')->with(compact('contribuyentes'));
    }
    public function GetAdd()
    {
        $estadocivils = EstadoCivil::all();
        $tipocontribuyentes = TipoContribuyente::all();
        $tipodocuments = TipoDocumento::all();
        $segmentos = Segmento::all();
        return view('contributor/create')->with(compact('estadocivils','tipocontribuyentes','tipodocuments','segmentos'));
    }
    public function PostAdd(Request $request)
    {
        //REGLAS
        $messages = [
            'identificacion.required' => 'Debe ingresar la identificacion del contribuyente',
            'identificacion.unique' => 'El numero de identificacion ya pertenece a un contribuyente',
            'name.required' => 'Debe ingresar los nombres del contribuyente',
        ];
        $rules = [
            'identificacion' => 'required|min:10|max:13|unique:contribuyente,identificacion',
            'name' => 'required',
        ];
        $this->validate($request, $rules, $messages);
        //dd($request->all());
        $contribuyente = new Contribuyente();
        $contribuyente->identificacion = $request->input('identificacion');
        $contribuyente->nombres = $request->input('name');
        $contribuyente->domicilio = $request->input('direccion');
        $contribuyente->telefono = $request->input('telefono');
        $contribuyente->celular = $request->input('celular');
        $contribuyente->correo = $request->input('correo');
        $contribuyente->fecha_nacimiento = $request->input('fecha_nacimiento');
        $contribuyente->sexo = $request->input('sexo');
        $contribuyente->estado_civil_id = $request->input('estadocivil');
        $contribuyente->segmento_id = $request->input('segmento');
        $contribuyente->tipo_documento_id = $request->input('tipo_documento');
        $contribuyente->tipo_contribuyente_id = $request->input('tipocontribuyente');
        $contribuyente->id_discapacidad = $request->input('iddiscapacidad');
        $contribuyente->tipo_discapacidad = $request->input('tipodiscapacidad');
        $contribuyente->grado_discapacidad = $request->input('gradodiscapacidad');
        $contribuyente->save();

        return redirect('admin/contributor/search')->with('creado','El Contribuyente se ha sido creado');
    }
    public function Edit($id)
    {
        $estadocivils = EstadoCivil::all();
        $tipocontribuyentes = TipoContribuyente::all();
        $tipodocuments = TipoDocumento::all();
        $contribuyente = Contribuyente::findOrFail($id);
        $segmentos = Segmento::all();
        return view('contributor/edit')->with(compact('estadocivils','tipocontribuyentes','tipodocuments','segmentos','contribuyente'));
    }
    public function Update(Request $request, $id )
    {
        //REGLAS
        $messages = [
            'identificacion.required' => 'Debe ingresar la identificacion del contribuyente',
            'name.required' => 'Debe ingresar los nombres del contribuyente',
        ];
        $rules = [
            'identificacion' => 'required|min:10|max:13',
            'name' => 'required',
        ];
        $this->validate($request, $rules, $messages);
        $contribuyente = Contribuyente::find($id);
        $contribuyente->nombres = $request->input('name');
        $contribuyente->domicilio = $request->input('direccion');
        $contribuyente->telefono = $request->input('telefono');
        $contribuyente->celular = $request->input('celular');
        $contribuyente->correo = $request->input('correo');
        $contribuyente->fecha_nacimiento = $request->input('fecha_nacimiento');
        $contribuyente->sexo = $request->input('sexo');
        $contribuyente->estado_civil_id = $request->input('estadocivil');
        $contribuyente->segmento_id = $request->input('segmento');
        $contribuyente->tipo_documento_id = $request->input('tipo_documento');
        $contribuyente->tipo_contribuyente_id = $request->input('tipocontribuyente');
        $contribuyente->id_discapacidad = $request->input('iddiscapacidad');
        $contribuyente->tipo_discapacidad = $request->input('tipodiscapacidad');
        $contribuyente->grado_discapacidad = $request->input('gradodiscapacidad');
        $contribuyente->save();

        return redirect('admin/contributor/search')->with('actualizado','El Contribuyente se ha sido actualizado');

    }
    public function getContribuidor($id)
    {
        $contribuyente = DB::table('contribuyente')
                                 ->join('segmento','contribuyente.segmento_id','=','segmento.id')
                                 ->join('estado_civil','contribuyente.estado_civil_id','=','estado_civil.id')
                                 ->join('tipo_documento','contribuyente.tipo_documento_id','=','tipo_documento.id')
                                 ->join('tipo_contribuyente','contribuyente.tipo_contribuyente_id','=','tipo_contribuyente.id')
                                 ->where('contribuyente.id','=',$id)
                                 ->select('contribuyente.id', 'contribuyente.nombres', 'contribuyente.identificacion',
                                           'contribuyente.domicilio', 'contribuyente.telefono','contribuyente.celular',
                                           'contribuyente.correo','contribuyente.fecha_nacimiento','contribuyente.sexo',
                                            'contribuyente.tipo_discapacidad','contribuyente.grado_discapacidad',
                                           'tipo_contribuyente.name as tipocontribuyente','segmento.name as segmento','estado_civil.name as estadocivil'
                                            )
                                 ->get();
                         //  dd($contribuyente);
        return $contribuyente;
    }
    public function View($id)
    {
        $contribuyente = Contribuyente::findOrFail($id);
        return view('contributor/view')->with(compact('contribuyente'));
    }
    public function Search($buscar="")
    {
        // if ($request->buscar==null )
        // {
        //   $persona=[];
        // }
        // else
        // {
        // $persona= Contribuyente::BuscarPersonaXNombre($request->buscar)->get();
        // }
        //dd($request->get('buscar'));
        //
         $consulta=DB::table('contribuyente')
                            ->where([['identificacion','like',"%$buscar%"]])
                            ->orwhere([['nombres','ilike',"%$buscar%"]])
                            ->get();
         return $consulta;
        //return view('contributor/search')->with(compact('persona'));
    }
}

