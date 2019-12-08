
//mostrat la modal de acabado_closet Edit
   function btnMostraEditarInformacion(id){

     $("#headerInformacion").html('<i class="fa fa-edit"></i> ACTUALIZAR INFORMACÍON');
      $('#formInformacion')[0].reset();//limpiar formulario

     $.get('informacion/'+id+'/edit', function (data) {
         $('#nombre').val(data.nombre);
         $('#direccion').val(data.direccion);
         $('#telefonos').val(data.telefonos);
         $('#idcanton').val(data.canton_id);
      });

     $("#btnInformacion").attr('class','btn btn-warning');
     $("#method_informacion").val('PUT');
     $("#formInformacion").attr('action','informacion/'+id);//fijamos laruta para editar window.location.protocol+'//'+window.location.host+'/closet/'+id);
     $("#btnInformacion").html('<i class="fa fa-save"></i> Actualizar ');
     $("#formModaInformacion").modal('show');
   }
//end


