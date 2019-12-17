
//mostrat la modal de acabado_cubierta Create
   function btnMostrarCreateTipoSuelo(){
    //$('#formAcabado')[0].reset();//limpiar formulario
    $('#name').val("");
    $('#indice').val("");
    $('#headerTipoSuelo').html('<span class="fa fa-list"></span> CREAR TIPO SUELO');
    $("#btnTipoSuelo").attr('class','btn btn-info');
    $("#btnTipoSuelo").html('<i class="fa fa-save"></i> Guardar ');
    $("#formModalTipoSuelo").modal('show');
   }
//end

//mostrat la modal de acabado_closet Edit
   function btnMostraEditarTipoSuelo(id){

     $("#headerTipoSuelo").html('<i class="fa fa-edit"></i> ACTUALIZAR TIPO SUELO');
      $('#formTipoSuelo')[0].reset();//limpiar formulario
     $.get('tipoSuelo/'+id+'/edit', function (data) {
         $('#name').val(data.name);
         $('#indice').val(data.indice);
         $('#peso').val(data.peso);
         $('#estado').val(data.estado);
      });

     $("#btnTipoSuelo").attr('class','btn btn-warning');
     $("#method_tipoSuelo").val('PUT');
     $("#formTipoSuelo").attr('action','tipoSuelo/'+id);//fijamos laruta para editar window.location.protocol+'//'+window.location.host+'/closet/'+id);
     $("#btnTipoSuelo").html('<i class="fa fa-save"></i> Actualizar ');
     $("#formModalTipoSuelo").modal('show');
   }
//end


