//confirmar si esta de acuerdo para el envio
document.getElementById('btnInformacion').addEventListener('click',confirmar,false);
function confirmar(){
    if ( $('#nombre').val() != "" ) {
      if ( $('#direccion').val() != "" ) {
          if ($('#telefonos').val()!="") {
              var mensaje;
              var opcion = confirm("¿Estas seguro que deseas ejecutar esta acción? ");
                if (opcion == true) {
                    var formulario = document.getElementById("formInformacion");
                    formulario.submit();
                }else{
                    event.preventDefault();
                    return false;
                }
         }
      }
    }
}
//end