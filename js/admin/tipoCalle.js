
//mostrat la modal de acabado_cubierta Create
   function btnMostrarCreateTipoCalle(){
    //$('#formAcabado')[0].reset();//limpiar formulario
    $('#name').val("");
    $('#indice').val("");
    $('#headerTipocalle').html('<span class="fa fa-list"></span> CREAR TIPO CALLE');
    $("#btnTipoCalle").attr('class','btn btn-info');
    $("#btnTipoCalle").html('<i class="fa fa-save"></i> Guardar ');
    $("#formModaTipoCalle").modal('show');
   }
//end

//mostrat la modal de acabado_closet Edit
   function btnMostraEditarTipoCalle(id){

     $("#headerTipocalle").html('<i class="fa fa-edit"></i> ACTUALIZAR TIPO CALLE');
      $('#formTipoCalle')[0].reset();//limpiar formulario
     $.get('tipoCalle/'+id+'/edit', function (data) {
         $('#name').val(data.name);
         $('#indice').val(data.indice);
      });

     $("#btnTipoCalle").attr('class','btn btn-warning');
     $("#method_tipoCalle").val('PUT');
     $("#formTipoCalle").attr('action','tipoCalle/'+id);//fijamos laruta para editar window.location.protocol+'//'+window.location.host+'/closet/'+id);
     $("#btnTipoCalle").html('<i class="fa fa-save"></i> Actualizar ');
     $("#formModaTipoCalle").modal('show');
   }
//end


