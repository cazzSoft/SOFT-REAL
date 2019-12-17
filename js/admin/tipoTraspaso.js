
//mostrat la modal de acabado_cubierta Create
   function btnMostrarCreateTipoTraspaso(){
    //$('#formAcabado')[0].reset();//limpiar formulario
    $('#name').val("");
    $('#indice').val("");
    $('#headerTipoTraspaso').html('<span class="fa fa-list"></span> CREAR TIPO TRASPASOS');
    $("#btnTipoTraspaso").attr('class','btn btn-info');
    $("#btnTipoTraspaso").html('<i class="fa fa-save"></i> Guardar ');
    $("#formModalTipoTraspaso").modal('show');
   }
//end

//mostrat la modal de acabado_closet Edit
   function btnMostraEditarTipoTraspaso(id){

     $("#headerTipoTraspaso").html('<i class="fa fa-edit"></i> ACTUALIZAR TIPO TRASPASOS');
      $('#formTipoTraspaso')[0].reset();//limpiar formulario
     $.get('tipoTraspasos/'+id+'/edit', function (data) {
         $('#name').val(data.name);
         $('#desA ').val(data.descuento_alcabalas );
         $('#desU').val(data.descuento_utilidades );
         //alert(data.descuento_utilidades);
      });

     $("#btnTipoTraspaso").attr('class','btn btn-warning');
     $("#method_tipoTraspaso").val('PUT');
     $("#formTipoTraspaso").attr('action','tipoTraspasos/'+id);//fijamos laruta para editar window.location.protocol+'//'+window.location.host+'/closet/'+id);
     $("#btnTipoTraspaso").html('<i class="fa fa-save"></i> Actualizar ');
     $("#formModalTipoTraspaso").modal('show');
   }
//end


