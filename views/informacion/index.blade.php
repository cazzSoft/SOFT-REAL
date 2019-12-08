@extends('layouts.app')
@section('content')
<section class="content-header" style="margin-bottom:10px;">
      <h1>
        Información
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Información</li>
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
              <h3 class="box-title">Lista Información</h3>
              <div class="box-tools">

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
              <table id="example1" class="table table-bordered table-hover text-center ">
                <thead class="">
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Dirección</th>
                  <th>Telefono</th>
                  <th>Canton</th>
                  <th style="min-width: 30%">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($informacion as $n)
                <tr>
                  <td>{{ $n->id }}</td>
                  <td>{{ $n->nombre }} </td>
                  <td>{{ $n->direccion }} </td>
                  <td>{{ $n->telefonos }} </td>
                  <td>{{ $n->canton }} </td>
                  <td style="min-width: 30%"><a  class="btn btn-warning btn-xs" onclick="btnMostraEditarInformacion('{{encrypt($n->id)}}')"><span class="fa fa-edit"></span> Editar </a></td>
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

        @include('informacion.modalInformacion')


        <script src="{{ asset('js/admin/informacion.js') }}"></script>
        <script src="{{ asset('js/admin/alertInformacion.js') }}"></script>
</section>
@endsection


