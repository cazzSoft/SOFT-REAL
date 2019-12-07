
//mostrat la modal de acabado_cubierta Create
   function btnMostrarCreateVigasCadena(){
    //$('#formAcabado')[0].reset();//limpiar formulario
    $('#name').val("");
    $('#indice').val("");
    $('#headerEstructura').html('<span class="fa fa-list"></span> CREAR ESTRUCTURA VIGA CADENA');
    $("#btnEstructura").attr('class','btn btn-info');
    $("#btnEstructura").html('<i class="fa fa-save"></i> Guardar ');
    $("#formModaEstructura").modal('show');
   }
//end

//mostrat la modal de acabado_closet Edit
   function btnMostraEditrVigascadena(id){

     $("#headerEstructura").html('<i class="fa fa-edit"></i> ACTUALIZAR ESTRUCTURA VIGA CADENA');
      $('#formEstructura')[0].reset();//limpiar formulario
     $.get('vigascadena/'+id+'/edit', function (data) {
         $('#name').val(data.name);
         $('#indice').val(data.indice);
         $('#peso').val(data.peso);
         $('#estado').val(data.estado);
      });

     $("#btnEstructura").attr('class','btn btn-warning');
     $("#method_estructura").val('PUT');
     $("#formEstructura").attr('action','vigascadena/'+id);//fijamos laruta para editar window.location.protocol+'//'+window.location.host+'/closet/'+id);
     $("#btnEstructura").html('<i class="fa fa-save"></i> Actualizar ');
     $("#formModaEstructura").modal('show');
   }
//end

