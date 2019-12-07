@extends('layouts.app')
@section('content')
<section class="content-header">
      <h1>
        Datos personales
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
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
  @if(isset($consulta))
                <div class="row col-xs-12 content panel box" >
                  <div class="col-sm-3">
                    <div class="card card-head" style="width: 100%;border:1px solid #D8D8D8;">
                      <img src="{{$consulta->img}}" style="width: 100%;height: 210px;">
                    </div>
                  </div>
                  <div class="col-sm-9" >
                     <div class="card " >
                     <form id="formPerfil" method="POST" action="{{url('perfil/'.encrypt($consulta->id))}}"  enctype="multipart/form-data"  class="form-horizontal form-label-left"  >
                         {{csrf_field() }}
                         <input id="method_perfil" type="hidden" name="_method" value="PUT">
                         <div class="modal-body ">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="name" name="name" value="{{$consulta->name  }}" placeholder="nombre" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10 container">
                                  <input type="email"  class="form-control" id="direccion" name="email" value="{{ $consulta->email }}" readonly required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Rol</label>
                                <div class="col-sm-10">
                                  <input type="text"  class="form-control" id="rol" name="rol" value="admin" readonly required>
                                </div>
                              </div>
                               <div class="form-group">
                                <label  class="col-sm-2 control-label">Foto de perfil</label>
                                <div class="col-sm-10">
                                   <input type="file" name="avatar" value="{{ $consulta->img }}">
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('/admin') }}"  class="btn btn-danger"><i class="fa fa-times-circle"></i> Salir</a>
                          <button type="submit" class="btn btn-info" id="btnInformacion"  ><i class="fa fa-save"></i> Guardar</button>
                        </div>
                     </form>
                    </div>
                  </div>
                </div>
                @endif

</section>

@endsection
