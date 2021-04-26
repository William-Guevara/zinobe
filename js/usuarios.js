$('document').ready(function()
{
	$.ajax({
		method: "GET",
		dataType: "json",
		url: "http://www.mocky.io/v2/5d9f38fd3000005b005246ac",
    }).always(function (data) {
    data = data["objects"];

    var table = $("#example").DataTable({
        data: data,
        
        columns: [
        { data: "primer_nombre" },
        { data: "apellido" },
        { data: "cedula" },
        { data: "fecha_nacimiento" },
        { data: "telefono" },
        { data: "correo" },
        { data: "pais" },
        { data: "departamento" },
        { data: "ciudad" },
        { data: "cargo" }
        ],
    });
    table.page( 'previous' ).draw( 'page' );
    });
});
