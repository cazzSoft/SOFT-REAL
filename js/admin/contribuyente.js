function buscar(){
	 var buscar=$('#busquedad').val();

	$.get('contributor/search/'+buscar, function (data) {
		 $('#tableContribuyente').html('');
            $.each(data, function(i, item) {
                $('#tableContribuyente').append(
                    `<tr>
                        <td >${item.id}</td>
                        <td >${item.identificacion}</td>
                        <td >${item.nombres}</td>
                        <td style="width: 3%"><a  class="btn btn-info btn-xs"
                        onclick="btnMostraVerContibuyente(${item.id})"
                        >  <span class="fa fa-eye"></span> ver </a></td>
                    </tr>`
                );
            });
        });
}


//mostrat la modal de acabado_closet Edit
   function btnMostraVerContibuyente(id){

     //$("#headerAcabado").html('<i class="fa fa-edit"></i> ACTUALIZAR ACABADO CLOSET');
     $.get('contributor/getcontributor/'+id, function (data) {
          $.each(data, function(i, item) {
             $('#datosContribuyente').html(
                        ` <li class="list-group-item "><span class='text-primary'>Id: </span>${item.id}</li>
                          <li class="list-group-item "><span class="text-primary">Nombres :</span> ${item.nombres}</li>
                          <li class="list-group-item "><span class="text-primary">Identificacion :</span> ${item.identificacion}</li>
                          <li class="list-group-item "><span class="text-primary">Domicilio :</span> ${item.domicilio}</li>
                          <li class="list-group-item "><span class="text-primary">Telefono :</span> ${item.telefono}</li>
                          <li class="list-group-item "><span class="text-primary">Celular :</span> ${item.celular}</li>
                          <li class="list-group-item "><span class="text-primary">Correo :</span> ${item.correo}</li>
                          <li class="list-group-item "><span class="text-primary">Fecha nacimiento :</span> ${item.fecha_nacimiento}</li>
                          <li class="list-group-item "><span class="text-primary">Genero :</span> ${item.sexo}</li>
                          <li class="list-group-item "><span class="text-primary">Tipo Contribuyente :</span> ${item.tipocontribuyente}</li>
                          <li class="list-group-item "><span class="text-primary">Segmento :</span> ${item.segmento}</li>
                          <li class="list-group-item "><span class="text-primary">Estado Civil :</span> ${item.estadocivil}</li>
                          <li class="list-group-item "><span class="text-primary">Descapacidad :</span> ${item.tipo_discapacidad}</li>
                          <li class="list-group-item "><span class="text-primary">grado de discapacidad :</span> ${item.grado_discapacidad}</li>
                        `
                 );
          });

      });

     $("#formModaContribuyente").modal('show');
    }