@extends('layouts.app')
@section('content')
<section class="content-header" style="margin-bottom:10px;">
      <h1>
        Consulta Básica
        <small>Contribuyentes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Contribuyentes</li>
      </ol>
</section>

<section class="content">
    @if(Session()->has('mensajeInfo') )
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
        <div class="col-xs-12 ">
          <div class="box">
            <div class="box-header " style="margin-top:13px;">
              <h3 class="box-title">Lista de Contribuyentes</h3>
              <div class="box-tools">
                <i class="fa fa-search "style="float:left; margin-top:10px;margin-right:12px;"></i>
                <div class="input-group input-group-sm"  style="width: 240px;margin-top:auto;">
                 <input class="form-control mr-sm-8 text-center" type="search" id='busquedad' onkeyup="buscar()" placeholder="Identificacion o Nombres" aria-label="Search"  style="border-radius: 200px;">
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
              <table  class="table table-bordered table-hover text-center " >
                <thead class="th">
                <tr>
                  <th>Id</th>
                  <th>Identificacion</th>
                  <th>Nombres</th>
                  <th style="width: 10%" colspan="2">Opciones</th>
                </tr>
                </thead>
                <tbody id="tableContribuyente">
                @foreach($contribuyentes as $n)
                <tr >
                  <td>{{ $n->id }}</td>
                  <td>{{ $n->identificacion }} </td>
                  <td>{{ $n->nombres }} </td>
                  <td style="width: 3%"><a  class="btn btn-info btn-xs" onclick="btnMostraVerContibuyente({{ $n->id }})">  <span class="fa fa-eye"></span> ver </a></td>

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
    @include('contributor.modalContribuyente')

        <script src="{{ asset('js/admin/contribuyente.js') }}"></script>
        {{-- <script src="{{ asset('js/admin/alertConfirmAcabado.js') }}"></script> --}}
</section>
@endsection


