
//mostrat la modal de acabado_cubierta Create
   function btnMostrarCreateConservacion(){
    //$('#formAcabado')[0].reset();//limpiar formulario
    $('#name').val("");
    $('#indice').val("");
    $('#headerInstalacion').html('<span class="fa fa-list"></span> CREAR INSTALACIÓN CONSERVACIÓN');
    $("#btnInstalacion").attr('class','btn btn-info');
    $("#btnInstalacion").html('<i class="fa fa-save"></i> Guardar ');
    $("#formModaInstalacion").modal('show');
   }
//end

//mostrat la modal de acabado_closet Edit
   function btnMostraEditrConservacion(id){

     $("#headerInstalacion").html('<i class="fa fa-edit"></i> ACTUALIZAR INSTALACIÓN CONSERVACIÓN');
      $('#formInstalacion')[0].reset();//limpiar formulario
     $.get('conservacion/'+id+'/edit', function (data) {
         $('#name').val(data.name);
         $('#indice').val(data.indice);
         $('#peso').val(data.peso);
         $('#estado').val(data.estado);
      });

     $("#btnInstalacion").attr('class','btn btn-warning');
     $("#method_instalacion").val('PUT');
     $("#formInstalacion").attr('action','conservacion/'+id);//fijamos laruta para editar window.location.protocol+'//'+window.location.host+'/closet/'+id);
     $("#btnInstalacion").html('<i class="fa fa-save"></i> Actualizar ');
     $("#formModaInstalacion").modal('show');
   }
//end


