
//mostrat la modal de acabado_cubierta Create
   function btnMostrarCreateTopografiaPredio(){
    //$('#formAcabado')[0].reset();//limpiar formulario
    $('#name').val("");
    $('#indice').val("");
    $('#headerTopografiapredio').html('<span class="fa fa-list"></span> CREAR TOPOGRAFIA PREDIO');
    $("#btnTopografiaPredio").attr('class','btn btn-info');
    $("#btnTopografiaPredio").html('<i class="fa fa-save"></i> Guardar ');
    $("#formModaTopografiaPredio").modal('show');
   }
//end

//mostrat la modal de acabado_closet Edit
   function btnMostraEditarTopografiaPredio(id){

     $("#headerTopografiapredio").html('<i class="fa fa-edit"></i> ACTUALIZAR TOPOGRAFIA PREDIO');
      $('#formTopografiaPredio')[0].reset();//limpiar formulario
     $.get('topografiaPredio/'+id+'/edit', function (data) {
         $('#name').val(data.name);
         $('#indice').val(data.indice);
      });

     $("#btnTopografiaPredio").attr('class','btn btn-warning');
     $("#method_topografiaPredio").val('PUT');
     $("#formTopografiaPredio").attr('action','topografiaPredio/'+id);//fijamos laruta para editar window.location.protocol+'//'+window.location.host+'/closet/'+id);
     $("#btnTopografiaPredio").html('<i class="fa fa-save"></i> Actualizar ');
     $("#formModaTopografiaPredio").modal('show');
   }
//end


