
//mostrat la modal de acabado_cubierta Create
   function btnMostrarCreatePuerta(){

    $('#name').val("");
    $('#indice').val("");

    $('#headerAcabado').html('<span class="fa fa-list"></span> CREAR ACABADO PUERTA');
    $("#btnAcabado").attr('class','btn btn-info');
    $("#btnAcabado").html('<i class="fa fa-save"></i> Guardar ');
    $("#formModaAcabado").modal('show');
   }
//end

//mostrat la modal de acabado_closet Edit
   function btnMostraEditrPuerta(id){

     $("#headerAcabado").html('<i class="fa fa-edit"></i> ACTUALIZAR ACABADO PUERTA');
      $('#formAcabado')[0].reset();//limpiar formulario
     $.get('puerta/'+id+'/edit', function (data) {
         $('#name').val(data.name);
         $('#indice').val(data.indice);
         $('#peso').val(data.peso);
         $('#estado').val(data.estado);
      });

     $("#btnAcabado").attr('class','btn btn-warning');
     $("#method_acabado").val('PUT');
     $("#formAcabado").attr('action','puerta/'+id);//fijamos laruta para editar window.location.protocol+'//'+window.location.host+'/closet/'+id);
     $("#btnAcabado").html('<i class="fa fa-save"></i> Actualizar ');
     $("#formModaAcabado").modal('show');
   }
//end
