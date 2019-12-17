document.getElementById('btnTipoTraspass').addEventListener('click',confirmar,false);
function confirmar(){
    if ( $('#name').val() != "" ) {
      if ( $('#descuento_alcabalas').val() != "" ) {
        var mensaje;
        var opcion = confirm("¿Estas seguro que deseas ejecutar esta acción? ");
          if (opcion == true) {
              var formulario = document.getElementById("formTipoTraspaso");
              //var dato = formulario[0];
              formulario.submit();
          }else{
              event.preventDefault();
              return false;
          }
      }
    }
}