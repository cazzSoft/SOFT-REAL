			@extends('layouts.app')

			@section('content')
			<section class="content-header">
				<h1>
					<a href="{{ url('/admin/estadocuenta/') }}">Estado Cuenta </a> 
					<small>Recaudación</small>
				</h1>

			</section>


			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box box-solid">
							<div class="box-header">
								<i class="fa fa-search-plus"></i>

								<h3 class="box-title">Busqueda</h3>
							</div>
							<!-- /.box-header -->
								<div class="box-body" >
									
					                	
					               
									<div class="col-sm-3">
										<label for="ddlclave">Codigo</label>
										<select id="ddlclave" name="ddlclave" class="autocomplete form-control datos">
											<option value="">Escriba Clave catastral</option>
										</select>
									</div>
									<div class="col-sm-3">
										<label for="ddldatos">Nombres, CI o RUC</label>
										<select id="ddldatos" name="ddldatos" class="autocomplete form-control datos">
											<option value="">Escriba nombres, CI o RUC</option>
										</select>
									</div>
									<div class="col-sm-3">
										<label for="txtemision">Codigo de Emisión</label>
										<input type="text" class="form-control" id="txtemision" name="txtemision">
									</div>
									<div class="col-sm-3">
										<label for="ddlestadoemision">Estado Emisión</label>
										<select id="ddlestadoemision" name="ddlestadoemision" class="form-control datos">
											<option value="Pendiente">Pendiente</option>
											<option value="Pagado">Pagado</option>
											<option value="Coactiva">Coactiva</option>
										</select>
									</div>
								</div>
								
						</div>
			          <div class="box box-solid">
			            <div class="box-header">
			            </div>
			            <!-- /.box-header -->
			            <div class="box-body table-responsive no-padding" style="font-weight: normal;">
			             <div class="col-xs-12">
										<table id="tbcaja" class="table table-bordered table-hover">



										</table>

										
									</div>

			            </div>
			            <!-- /.box-body -->
			          </div>
					</div>
					<!-- /.box -->
				</div>
				<div class="modal fade" id="modal-detalle">
		          <div class="modal-dialog">
		            <div class="modal-content">
		              <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                  <span aria-hidden="true">×</span></button>
		                <h4 class="modal-title">Detalle Emisión</h4>
		              </div>
		              <div class="modal-body" style="font-weight: normal;">
		               		<table id="tbDetalle" class="table table-bordered table-hover">
							</table>
		              </div>
		              <div class="modal-footer">
		                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
		              </div>
		            </div>
		            <!-- /.modal-content -->
		          </div>
		          <!-- /.modal-dialog -->
		        </div>
		</section>
		@endsection
		@section('scripts')
		<script>
			var table;
			var tabledetalle;
			var cuentas=0.0;		
			var cuentaspagado= 0;
			
			
			$(document).ready( function() {			

				$('#ddlclave').select2({
					placeholder: 'Escriba Clave catastral',
					minimumInputLength: 3,
					ajax: {
					  url: "{{url('admin/catastrourbano/select2-autocomplete-predios')}}",
					  dataType: 'json',
					  delay: 250,
					  processResults: function (data) {
					    return {
					      results:  $.map(data, function (item) {
					            return {
					                text: item.clave,
					                id: item.clave
					            }
					        })
					    };
					  },
					  cache: true
					}
				});


				$('#ddldatos').select2({
					placeholder: 'Escriba nombres, CI o RUC',
					minimumInputLength: 3,
					ajax: {
					  url: "{{url('admin/estadocuenta/getcontribuyente')}}",
					  dataType: 'json',
					  delay: 250,
					  processResults: function (data) {
					    return {
					      results:  $.map(data, function (item) {
					            return {
					                text: item.nombres + ' ' +item.identificacion,
					                id: item.id
					            }
					        })
					    };
					  },
					  cache: true
					}
				});


				informacioncaja(0,0);

			});


			$("#ddlclave").change(function() {

				var clave =  $("#ddlclave").val();
				var estado = $("#ddlestadoemision").val(); 

				if (clave !="")
				  {
				  	informacioncaja(clave,estado,2)
				  }
				
				
			});

			$("#ddlestadoemision").change(function() {
				var estado = $("#ddlestadoemision").val();
				if (estado !="")
				  {
				  	informacioncaja(0,estado,4)
				  }
			});


			$("#ddldatos").change(function() {

				var datos = $("#ddldatos").val();
				var estado = $("#ddlestadoemision").val(); 

				if (datos !="")
				  {
				  	informacioncaja(datos,estado,1)
				  }
				
			});


			$("#txtemision").keyup(function() {

				var emision = $("#txtemision").val();
				var estado = $("#ddlestadoemision").val(); 
				
				if (emision !="")
				  {
				  	informacioncaja(emision,estado,3)
				  }
				
			});

			function informacioncaja(filtro,estado,tipo) {

				$.post("{{url('admin/estadocuenta/getcaja')}}",
				{
					_token: $('meta[name="csrf-token"]').attr('content'),
					tipo:tipo,
					filtro:filtro,
					estado:estado
				},
				function(data, result){

					if (table) 
					{
						table.destroy();
						$('#tbcaja').empty();
						table = "";
					}
					
					llenarcaja(data);
					


				});
			}

			function llenarcaja(data){

				table = $('#tbcaja').DataTable({
					"destroy": true,
					'paging'      : true,
					'lengthChange': false,
					'searching'   : false,
					'ordering'    : true,
					'info'        : false,
					'autoWidth'   : false,
					"data": data,
					"columns":[
					{
						"title":"Emisión",
						data:   "id",
						width: "4%"	            	

					},
					{
						width: "25%",

						"title":"Contribuyente",
						data:   "nombres",
						"render": function ( data, type, row ) {
		            	return row.nombres +' - '+ row.identificacion;
		          }
					},
					
					{
						width: "15%"	,
						"title":"Tributo",
						data:   "tributo",
					},

					{
						width: "15%",
						"title":"Subtotal",
						data:   "subtotal",
					},

					{
						width: "15%",
						"title":"Total",
						data:   "subtotaldescuento",
					},
					{
						width: "15%",
						"title":"Clave",
						data:   "clave",
					},
					{
						width: "15%",
						"title":"Descripción",
						data:   "descripcion",
					},
					{
						width: "200px",
						"title":"Fecha emisión",
						data:   "fecha_emision",
					},
					{
						width: "15%",
						"title":"Fecha Obligación",
						data:   "fecha_obligacion",
					},
					{
						width: "15%",
						"title":"Estado",
						data:   "estado",
					},
					{
						width: "15%",
						title:   "Detalles",
						data:   "id",
						width: "10%",	            	
						render: function ( data, type, row ) {
							if ( type === 'display' ) {
								return ' <a onclick="detallecaja('+data+')" name="caja" data-id="'+data+'" class="btn btn-info btn-xs"><i class="fa fa-search"></i></a>';								
							}
							return data;
						},
						className: "dt-body-center"
					}


					]
				});
			}

			function detallecaja(id) {

				$.post("{{url('admin/estadocuenta/detallecaja')}}",
				{
					_token: $('meta[name="csrf-token"]').attr('content'),
					id:id,
				},
				function(data, result){
					if (tabledetalle) 
					{
						tabledetalle.destroy();
						$('#tbDetalle').empty();
						table = "";
					}
					
					tabledetalle = $('#tbDetalle').DataTable({
					"destroy": true,
					'paging'      : false,
					'lengthChange': false,
					'searching'   : false,
					'ordering'    : false,
					'info'        : false,
					'autoWidth'   : false,
					"data": data,
					"columns":[
					{
						"title":"Nº Detalle",
						data:   "detalle_emisionid",
						width: "4%"	            	

					},
					{
						width: "15%"	,
						"title":"Nombre componente",
						data:   "componente",
					},
					{
							width: "15%"	,
						"title":"Descripción",
						data:'descripcion'
					},
					{
						width: "15%",
						"title":"Valor",
						data:   "valor",
					}
					]
				});

					$('#modal-detalle').modal('show')

				});
			}

		</script>
		@endsection
