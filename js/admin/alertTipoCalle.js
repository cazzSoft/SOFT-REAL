//confirmar si esta de acuerdo para el envio
document.getElementById('btnTipoCalle').addEventListener('click',confirmar,false);
function confirmar(){
    if ( $('#name').val() != "" ) {
      if ( $('#indice').val() != "" ) {
        var mensaje;
        var opcion = confirm("¿Estas seguro que deseas ejecutar esta acción? ");
          if (opcion == true) {
              var formulario = document.getElementById("formTipoCalle");
              //var dato = formulario[0];
              formulario.submit();
          }else{
              event.preventDefault();
              return false;
          }
      }
    }
}
//end