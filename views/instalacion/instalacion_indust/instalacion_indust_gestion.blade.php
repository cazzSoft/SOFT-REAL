@extends('layouts.app')
@section('content')
<section class="content-header" style="margin-bottom:10px;">
      <h1>
        Instalación
        <small>Industrial</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Industrial </li>
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Instalaciones Industrial</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm"  style="width: 150px;">
                  <a  class="btn btn-block btn-primary btn-sm" onclick="btnMostrarCreateIndust()" >Agregar
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
                  <th>Descripción</th>
                  <th>Indice</th>
                  <th>Peso</th>
                  <th>Estado</th>
                  <th style="min-width: 30%">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($instalacion as $instalacion)
                <tr>
                  <td>{{ $instalacion->id }}</td>
                  <td>{{ $instalacion->name }} </td>
                  <td>{{ $instalacion->indice }} </td>
                  <td>{{ $instalacion->peso }} </td>
                  <td>{{ $instalacion->estado }} </td>
                  <td style="min-width: 30%"><a  class="btn btn-warning btn-xs" onclick="btnMostraEditrIndust('{{encrypt($instalacion->id)}}')"><span class="fa fa-edit"></span> Editar </a></td>
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

        @include('instalacion.instalacion_indust.formModalIndust')


        <script src="{{ asset('js/admin/instalacionIndust.js') }}"></script>
        <script src="{{ asset('js/admin/alertConfirmInstalacion.js') }}"></script>
</section>
@endsection


