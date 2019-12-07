<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Soft-Catastral</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Styles -->
    <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
   <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Soft-Catastral</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ url(Auth::user()->img)  }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }} </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ url(Auth::user()->img) }}" class="img-circle" alt="User Image">

                <p>

                  <small>{{ Auth::user()->name }} </small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="{{ url('/admin/editPassword') }}">Cambiar Clave</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="#">Foto de Perfil</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('/perfil') }}" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Cerrar Sesion</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="font-weight: normal;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{  url(Auth::user()->img) }}" class="img-circle" alt="User Image" style="width:140%;height: 50px; ">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }} </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree" >
        <li class="header">Menu</li>
        <li><a href="{{ url('/admin') }}"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
        @can('catastro.index')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bank"></i> <span>Catastro</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('catastro.index')
            <li class="treeview">
              <a href="#"><i class="fa fa-bank"></i> Catastro Urbano
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/admin/catastrourbano/search') }}"><i class="fa fa-circle-o"></i> Consulta Propietario</a></li>
                <li><a href="{{ url('/admin/catastrourbano/searchAdvanced') }}"><i class="fa fa-circle-o"></i> Consulta Clave </a></li>
                </li>
                <li><a href="{{ url('/admin/catastrourbano/busqueda-simple') }}"><i class="fa fa-circle-o"></i> Consulta Avanzada </a></li>
                </li>
              </ul>
            </li>
            @endcan
            @can('calles.index')
            <li><a href="{{ url('/admin/calles') }}"><i class="fa fa-circle-o"></i> Calles</a></li>
            @endcan
            @can('ciudadelas.index')
            <li><a href="{{ url('/admin/ciudadelas') }}"><i class="fa fa-circle-o"></i> Ciudadelas</a></li>
            @endcan
            @can('condominios.index')
            <li><a href="{{ url('/admin/condominios') }}"><i class="fa fa-circle-o"></i> Condominios</a></li>
            @endcan
            @can('valoracion.create')
            <li><a href="{{ url('/admin/emision/actualizardatos') }}"><i class="fa fa-circle-o"></i> Actualizar Datos</a></li>
            @endcan
            @can('valoracion.create')
            <li><a href="{{ url('/admin/rentas/cambio-nombre-titulos') }}"><i class="fa fa-circle-o"></i> Traspaso de Titulos</a></li>
            @endcan
            @can('catastro.index')
            <li><a href="{{ url('/admin/catastrourbano/predios-baja') }}"><i class="fa fa-circle-o"></i> Predios de Baja</a></li>
            @endcan
            @can('transferencia.index')
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Transferencias Dominio
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/admin/traspaso/') }}"><i class="fa fa-circle-o"></i> Inicio</a></li>
                <li><a href="{{ url('/admin/transferencias') }}"><i class="fa fa-circle-o"></i> Transferencias </a></li>
                </li>
              </ul>
            </li>
            @endcan
            @can('catastro.index')
            <li><a href="{{ url('/admin/catastrourbano/reportes') }}"><i class="fa fa-circle-o"></i> Reportes</a></li>
            @endcan
          </ul>
        </li>
        @endcan
        @can('catastro.index')
        <li><a href="{{ url('/admin') }}"><i class="fa fa-firefox"></i> <span>Visor Grafico</span></a></li>
        @endcan
        @can('contributor.index')
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-user"></i> <span>Contribuyentes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('contributor.index')
            <li><a href="{{ url('/admin/contributor/search') }}"><i class="fa fa-circle-o"></i> Consulta Basica</a></li>
            @endcan
            @can('contributor.create')
            <li><a href="{{ url('/admin/contributor/add') }}"><i class="fa fa-circle-o"></i> Registrar</a></li>
            @endcan
          </ul>
        </li>
        @endcan
        @can('valoracion.show')
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-line-chart"></i> <span>Valoracion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('valoracion.show')
            <li><a href="{{ url('/admin/valoracion/search') }}"><i class="fa fa-circle-o"></i> Consultar</a></li>
            @endcan
            @can('valoracion.historial')
            <li><a href="{{ url('/admin/valoracion/consultas/busquedaHistorial') }}"><i class="fa fa-circle-o"></i> Historial</a></li>
            @endcan
            @can('valoracion.create')
            <li><a href="{{ url('/admin/valoracion/add') }}"><i class="fa fa-circle-o"></i> Generar Individual</a></li>
            @endcan
            @can('valoraciongeneral.create')
            <li><a href="{{ url('/admin/valoraciongeneral') }}"><i class="fa fa-circle-o"></i> Generar Global</a></li>
            @endcan
            @can('valoraciondatos.create')
            <li><a href="{{ url('/admin/valoracion/datosgenerales') }}"><i class="fa fa-circle-o"></i> Datos Generales</a></li>
            @endcan
            @can('metro2.index')
            <li><a href="{{ url('/admin/metro2/search') }}"><i class="fa fa-circle-o"></i> Valor Metros2</a></li>
            @endcan
            <li><a href="{{ url('/admin/') }}"><i class="fa fa-circle-o"></i> Graficos</a></li>
            <li><a href="{{ url('/admin/') }}"><i class="fa fa-circle-o"></i> Reportes</a></li>
          </ul>
        </li>
        @endcan
        @can('contributor.index')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart-o"></i> <span>CEM </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('contributor.index')
            <li><a href="{{ url('/admin/contributor/search') }}"><i class="fa fa-circle-o"></i> Agregar Proyecto</a></li>
            @endcan
            @can('contributor.create')
            <li><a href="{{ url('/admin/contributor/add') }}"><i class="fa fa-circle-o"></i> Proyectos</a></li>
            <li><a href="{{ url('/admin/contributor/add') }}"><i class="fa fa-circle-o"></i> Unificar Predios</a></li>
            <li><a href="{{ url('/admin/contributor/add') }}"><i class="fa fa-circle-o"></i> Dividir Predios</a></li>
            @endcan
            <li><a href="{{ url('/admin/') }}"><i class="fa fa-circle-o"></i> Reportes</a></li>
          </ul>
        </li>
        @endcan
        @can('rebajas.index')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder-open-o"></i> <span>Rebajas y Exoneraciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('rebajas.index')
            <li><a href="{{ url('/admin/rebajas/search') }}"><i class="fa fa-circle-o"></i> Registrar</a></li>
            @endcan
            <li><a href="{{ url('/admin/') }}"><i class="fa fa-circle-o"></i> Consultar</a></li>
            <li><a href="{{ url('/admin/') }}"><i class="fa fa-circle-o"></i> Graficos</a></li>
            <li><a href="{{ url('/admin/') }}"><i class="fa fa-circle-o"></i> Reportes</a></li>
          </ul>
        </li>
        @endcan
        @can('emisionindividual.create')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart-o"></i> <span>Rentas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            @can('impuesto.index')
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Tributos
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @can('impuesto.index')
                <li><a href="{{ url('/admin/impuesto/') }}"><i class="fa fa-circle-o"></i> Crear Tributo</a></li>
                @endcan
                @can('componente.show')
                <li><a href="{{ url('/admin/componente/') }}"><i class="fa fa-circle-o"></i> Crear Componentes</a></li>
                @endcan
                @can('catalogo.show')
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Parametros
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    @can('catalogo.show')
                    <li><a href="{{ url('/admin/catalogo/ingresar') }}"><i class="fa fa-circle-o"></i> Catalogos</a></li>
                    @endcan
                    <li><a href="{{ url('/admin/') }}"><i class="fa fa-circle-o"></i> Funciones</a></li>
                  </ul>
                </li>
                @endcan
              </ul>
            </li>
            @endcan
            @can('emisionindividual.create')
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Emision Predial
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @can('emisionindividual.create')
                <li><a href="{{ url('/admin/emision/individual') }}"><i class="fa fa-circle-o"></i> Individual</a></li>
                @endcan
                @can('emisionglobal.create')
                <li><a href="{{ url('/admin/emisionglobal') }}"><i class="fa fa-circle-o"></i> Anual</a></li>
                @endcan
                </li>
              </ul>
            </li>
             @endcan
             @can('emisionindividual.create')
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Emisión
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @can('emisiontributos.show')
                <li><a href="{{ url('/admin/emision/tributos') }}"><i class="fa fa-circle-o"></i> Emisión Tributo</a></li>
                @endcan
                @can('emisionotrostributos.show')
                <li><a href="{{ url('/admin/emision/otrostributos') }}"><i class="fa fa-circle-o"></i> Emisión Varias</a></li>
                @endcan
                @can('emisiontransito.show')
                <li><a href="{{ url('/admin/emision/transito') }}"><i class="fa fa-circle-o"></i> Emisión Tránsito</a></li>
                @endcan
                @can('emisiontributos.create')
                <li><a href="{{ url('/admin/emision/registro_propiedad') }}"><i class="fa fa-circle-o"></i> Registro de la Propiedad</a></li>
                @endcan
              </ul>
            </li>
            @endcan
            @can('liquidacion.index')
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Transferencias Dominio
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @can('liquidacion.index')
                <li><a href="{{ url('/admin/traspaso/liquidacion') }}"><i class="fa fa-circle-o"></i> Liquidación</a></li>
                @endcan
                <li><a href="{{ url('/admin') }}"><i class="fa fa-circle-o"></i> Bajas</a></li>
              </ul>
            </li>
            @endcan
            @can('pantentes.index')
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Patentes
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @can('pantentes.create')
                <li><a href="{{ url('/admin/emision/pantentes/add') }}"><i class="fa fa-circle-o"></i> Crear Registro </a></li>
                @endcan
                @can('pantentes.index')
                <li><a href="{{ url('/admin/emision/pantentes') }}"><i class="fa fa-circle-o"></i> Patentes</a></li>
                @endcan
                @can('pantentesemision.create')
                <li><a href="{{ url('/admin/emision/pantentes/emision') }}"><i class="fa fa-circle-o"></i> Emitir Patente</a></li>
                @endcan
                @can('pantentes.create')
                <li><a href="{{ url('/admin/emision/actividad-comercial') }}"><i class="fa fa-circle-o"></i> Actividad Comercial </a></li>
                @endcan
              </ul>
            </li>
            @endcan
            @can('vehiculos.show')
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Transito
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @can('vehiculos.create')
                <li><a href="{{ url('/admin/transito/vehiculos/add') }}"><i class="fa fa-circle-o"></i> Crear Vehiculo</a></li>
                @endcan
                @can('vehiculos.show')
                <li><a href="{{ url('/admin/transito/vehiculos') }}"><i class="fa fa-circle-o"></i> Vehiculos</a></li>
                @endcan
                </li>
              </ul>
            </li>
            @endcan
            @can('emisionbaja.create')
            <li><a href="{{ url('/admin/emision/darbaja/') }}"><i class="fa fa-circle-o"></i> Dar Baja Emisión</a></li>
            @endcan
            <li><a href="{{ url('/admin/emision/reportes') }}"><i class="fa fa-circle-o"></i> Reportes</a></li>
            <li><a href="{{ url('/admin/') }}"><i class="fa fa-circle-o"></i> Graficos</a></li>
          </ul>
        </li>
        @endcan
        @can('caja.reportes')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Recaudación</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('caja.index')
            <li><a href="{{ url('/admin/caja/') }}"><i class="fa fa-circle-o"></i> Caja Unica</a></li>
            @endcan
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Administrar Caja
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @can('cajasconfiguracion.index')
                <li><a href="{{ url('/admin/configuracion-caja/') }}"><i class="fa fa-circle-o"></i> Procesos </a></li>
                @endcan
                @can('cajasconfiguracion.create')
                <li><a href="{{ url('/admin/configuracion-caja/add') }}"><i class="fa fa-circle-o"></i> Abrir Caja</a></li>
                @endcan
                @can('caja.cobrar')
                <li><a href="{{ url('/admin/tesoreria/especie/emitir') }}"><i class="fa fa-circle-o"></i> Emitir Especies</a></li>
                @endcan
                @can('caja.cobrar')
                <li><a href="{{ url('/admin/caja/intereses') }}"><i class="fa fa-circle-o"></i> Intereses BC</a></li>
                @endcan
              </ul>
            </li>
            <li><a href="{{ url('/admin/') }}"><i class="fa fa-circle-o"></i> Graficos</a></li>
            @can('caja.reportes')
            <li><a href="{{ url('/admin/caja/reportes') }}"><i class="fa fa-circle-o"></i> Reportes</a></li>
            @endcan
          </ul>
        </li>
        @endcan
        @can('inscripcion.show')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder-open"></i> <span>Registro de la Propiedad</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('inscripcion.show')
            <li><a href="{{ url('/admin/registro_propiedad/inscripcion') }}" ><i class="fa fa-circle-o"></i> Inscribir</a></li>
            @endcan
            <li><a href="{{ url('/admin/') }}"><i class="fa fa-circle-o"></i> Consultas</a></li>
          </ul>
        </li>
        @endcan
        @can('users.index')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Usuarios y Roles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('users.index')
            <li><a href="{{ url('/users') }}" ><i class="fa fa-circle-o"></i> Usuarios</a></li>
            @endcan
            @can('roles.index')
            <li><a href="{{ url('/roles') }}"><i class="fa fa-circle-o"></i> Roles</a></li>
            @endcan
            @can('permissions.index')
            <li><a href="{{ url('/permissions') }}"><i class="fa fa-circle-o"></i> Permisos</a></li>
            @endcan
          </ul>
        </li>
        @endcan
        @can('admintributos.index')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Administración</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="{{ url('/admin/') }}"><i class="fa fa-circle-o"></i> Información General</a></li>
            @can('admintributos.index')
            <li><a href="{{ url('/admin/administracion/tributos') }}"><i class="fa fa-circle-o"></i> Configuracion Tributos</a></li>
            @endcan
            <li><a href="{{ url('/admin/') }}"><i class="fa fa-circle-o"></i> Auditorias</a></li>
          </ul>
        </li>
        @endcan
        <li><a href="{{ url('/admin/estadocuenta') }}"><i class="fa fa-money"></i> <span>Estado Cuenta</span></a></li>
        <li class="header">Informacion</li>
        <li><a href="#"><i class="fa fa-book"></i> <span>Documentacion</span></a></li>
        <li><a href="#"><i class="fa  fa-info"></i> <span>Acerca De</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018 <a href="#">Soft-Catastral</a>.</strong> Todos los Derechos Reservados
  </footer>
</div>
<!-- ./wrapper -->
    <!-- Scripts -->

    <!-- jQuery 3 -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>
    <!-- Sparklin-->
    <script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('js/demo.js') }}"></script>
     <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
     <script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script>

      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
    </script>

    @yield('scripts')
</body>
</html>
