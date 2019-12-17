
//mostrat la modal de acabado_cubierta Create
   function btnMostrarCreateLocalizacion(){
    //$('#formAcabado')[0].reset();//limpiar formulario
    $('#name').val("");
    $('#indice').val("");
    $('#headerLocalizacion').html('<span class="fa fa-list"></span> CREAR LOCALIZACION PREDIO');
    $("#btnLocalizacion").attr('class','btn btn-info');
    $("#btnLocalizacion").html('<i class="fa fa-save"></i> Guardar ');
    $("#formModaLocalizacion").modal('show');
   }
//end

//mostrat la modal de acabado_closet Edit
   function btnMostraEditarLocalizacion(id){

     $("#headerLocalizacion").html('<i class="fa fa-edit"></i> ACTUALIZAR LOCALIZACION PREDIO');
      $('#formLocalizacion')[0].reset();//limpiar formulario
     $.get('localizacionpredio/'+id+'/edit', function (data) {
         $('#name').val(data.name);
         $('#indice').val(data.indice);
      });

     $("#btnLocalizacion").attr('class','btn btn-warning');
     $("#method_localizacion").val('PUT');
     $("#formLocalizacion").attr('action','localizacionpredio/'+id);//fijamos laruta para editar window.location.protocol+'//'+window.location.host+'/closet/'+id);
     $("#btnLocalizacion").html('<i class="fa fa-save"></i> Actualizar ');
     $("#formModaLocalizacion").modal('show');
   }
//end


