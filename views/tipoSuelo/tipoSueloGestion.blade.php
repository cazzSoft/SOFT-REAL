@extends('layouts.app')
@section('content')
<section class="content-header" style="margin-bottom:10px;">
      <h1>
        Tipo
        <small>Suelo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Tipo Suelo</li>
      </ol>
</section>

<section class="content">
    @if(Session()->has('mensajeInfo') )
      <div class="form-group">
          <div class="col-md-12 col-sm-12 col-xs-12" >
              <div class="alert alert-{{session('estado')}} alert-dismissible fade in" role="  alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">  <span aria-hidden="true">×</span>
                  </button>
                  <strong> <i class="fa fa-info"></i>nformación: </strong><br> {{session('mensajeInfo')}}

              </div>
          </div>
      </div>
    @endif
    @if($errors->any())
      <div class="form-group">
        <div class="col-md-12 col-sm-12 col-xs-12" >
            <div class="alert alert-danger alert-dismissible fade in" role="  alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">  <span aria-hidden="true">×</span>
                </button>
                <strong> <i class="fa fa-info"></i>nformación: </strong><br>
                @foreach( $errors->all() as $error)
                  <li>{{ $error}}</li>
                @endforeach
            </div>
        </div>
      </div>
    @endif

    <div class="row ">
        <div class="col-xs-12 ">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Tipo Suelo</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm"  style="width: 150px;">
                  <a  class="btn btn-block btn-primary btn-sm" onclick="btnMostrarCreateTipoSuelo()" >Agregar
                  </a>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
              <table id="example1" class="table table-bordered table-hover text-center ">
                <thead class="">
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Indice</th>
                  <th>Estado</th>
                  <th>Peso</th>
                  <th style="min-width: 30%">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tipoSuelo as $n)
                <tr>
                  <td>{{ $n->id }}</td>
                  <td>{{ $n->name }} </td>
                  <td>{{ $n->indice }} </td>
                  <td>{{ $n->estado }} </td>
                  <td>{{ $n->peso }} </td>
                  <td style="min-width: 30%"><a  class="btn btn-warning btn-xs" onclick="btnMostraEditarTipoSuelo('{{encrypt($n->id)}}')"><span class="fa fa-edit"></span> Editar </a></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>

        @include('tipoSuelo.modalTipoSuelo')
        <script src="{{ asset('js/admin/tipoSuelo.js') }}"></script>
        <script src="{{ asset('js/admin/alertTipoSuelo.js') }}"></script>
</section>
@endsection


