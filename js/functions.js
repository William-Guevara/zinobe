var dataGlobalUrl = [];
$('document').ready(function()
{
	$('#nuevoUsuario').click(function()
	{
		var titulo = ['Nombre','Documento','Email','País','Contraseña'];
		var campo = ['r_primerNombre','rn_documento','re_email','rs_pais','r_contrasena'];
		var formulario = 'new_user';
		formNuevo(titulo,campo,formulario);
	});
	$('#btn-cancel-modal').click(function()
	{
		$('#modal').slideUp();
	});

});

function cargarPaises()
{
	$('#idPais').html('cargando...');//pais

	datosPaises = '';

	$.ajax({
		method: "POST",
		dataType: 'json',
		url: "controller/services/select.php",
		data: {accion: 'cargarPaises'}
	}).done(function(data) {
		for(var i = 0; i < data.length; i++)
		{
			datosPaises += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
		}
		$('#pais').html(datosPaises);
	})
	.fail(function(data) {

	})
	.always(function() {

	});
}

function accionFormulario(formulario)
{
	var data = formulario.split('_');//separar tipo de nombre
	var type = data[0];//tipo de campo
	
	switch(type)
	{
		case 'new':
		return 'Crear';
		break;

		case 'edit':
		return 'Editar';
		break;
	}
}

function formNuevo(titulo,campos,formulario)
{
	$('#container-modal-title').html('<h2>'+accionFormulario(formulario)+'</h2>');

	$('#container-modal-content').html('');
	pintarForm = '';
	pintarForm += '<form method="post" action="pages/controller/'+formulario+'.php">';
	for(var i = 0; i< titulo.length;i++)
	{
		var data = campos[i].split('_');//separar tipo de nombre
		var type = data[0];//tipo de campo
		var campo =data[1];//nombre del campo

		pintarForm += '<div class="divClass2">';

		if(type == 'r' || type == 'rs' || type == 'rn')
		{
			pintarForm += '<div>'+titulo[i]+'*</div>';
		}
		else
		{
			pintarForm += '<div>'+titulo[i]+'</div>';	
		}
		switch(type)
		{
			case 'i':
			pintarForm += '<input class="inp-modal" type="input" id="'+campo+'" name="'+campo+'">';
			break;
			case 's':
			pintarForm += '<select class="inp-modal" id="'+campo+'" name="'+campo+'"><option selected="selected">seleccione...</option></select>';
			break;
			case 'n':
			pintarForm += '<input class="inp-modal" type="number" id="'+campo+'" name="'+campo+'" min="0">';
			break;
			case 'd':
			pintarForm += '<input class="inp-modal" type="date" id="'+campo+'" name="'+campo+'" min="0">';
			break;
			//datos obligatorios
			case 'rs':
			pintarForm += '<select class="inp-modal" id="'+campo+'" name="'+campo+'" required><option selected="selected">seleccione...</option></select>';
			break;
			case 'rn':
			pintarForm += '<input class="inp-modal" type="number" id="'+campo+'" name="'+campo+'" min="0" required>';
			break;
			case 'r':
			pintarForm += '<input class="inp-modal" type="text" id="'+campo+'" name="'+campo+'" required>';
			break;
			case 'rd':
			pintarForm += '<input class="inp-modal" type="date" id="'+campo+'" name="'+campo+'" required>';
			break;
			case 'rp':
			pintarForm += '<input class="inp-modal" type="password" id="'+campo+'" name="'+campo+'" required>';
			break;
			case 're':
			pintarForm += '<input class="inp-modal" type=“email” id="'+campo+'" name="'+campo+'" required>';
			break;
			case 'rh':
			pintarForm += '<input class="inp-modal" type="hidden" id="'+campo+'" name="'+campo+'" required>';
			break;
			default:

			break;
		}
		pintarForm += '</div>';
	}

	pintarForm+= '<div class="divClass4"><button id="btn-new-user" type="submit" class="btn-modal success btn">'+accionFormulario(formulario)+'</button></div>';
	pintarForm += '</form>';

	$('#container-modal-content').html(pintarForm);
	
	cargarFunciones();
	
	$('#modal').slideDown();
}

function cargarFunciones()
{
	cargarPaises();
}