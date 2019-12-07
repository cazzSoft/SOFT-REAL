@extends('layouts.app')

@section('content')
<section class="content-header" style="margin-bottom:10px;">
      <h1>
        Acabado Revestido
        <small>Externo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Acabado Revestido Externo</li>
      </ol>
</section>


<section class="content">
    @if(Session()->has('mensajeInfoCloset'))
      <div class="form-group">
          <div class="col-md-12 col-sm-12 col-xs-12" >
              <div class="alert alert-{{session('estado')}} alert-dismissible fade in" role="  alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">  <span aria-hidden="true">×</span>
                  </button>
                  <strong> <i class="fa fa-info"></i>nformación: </strong><br> {{session('mensajeInfoCloset')}}
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
              <h3 class="box-title">Lista de Acabado Revestido Externo</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm"  style="width: 150px;">
                  <a  class="btn btn-block btn-primary btn-sm" onclick="btnMostrarCreateReveExterno()" >Agregar
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
                <tbody style="font-weight: normal;">
                @foreach($acabado as $acabado)
                <tr>
                  <td>{{ $acabado->id }}</td>
                  <td>{{ $acabado->name }} </td>
                  <td>{{ $acabado->indice }} </td>
                  <td>{{ $acabado->peso }} </td>
                  <td>{{ $acabado->estado }} </td>
                  <td style="min-width: 30%"><a  class="btn btn-warning btn-xs" onclick="btnMostraEditrReveExterno('{{encrypt($acabado->id)}}')"><span class="fa fa-edit"></span> Editar </a></td>
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

        @include('acabado.acabado_reve_externo.formModalReveExterno')


        <script src="{{ asset('js/admin/acabadoReveExterno.js') }}"></script>
        <script src="{{ asset('js/admin/alertConfirmAcabado.js') }}"></script>
</section>
@endsection


