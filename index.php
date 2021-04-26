<?php
	session_start();
	require_once('start.php');
	if(isset($_SESSION['id']))
	{
		header('location: pages/usuarios.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="img/logoZinobe.png">
	<title>Zinobe</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
</head>
<body>
<div id="modal">
		<div id="container-modal">
			<div id="container-modal-title">
				<h2>Nuevo Usuario</h2>
			</div>
			<div id="container-modal-content">

			</div>
			<div id="container-modal-footer" class="divClass4">
				<div class="divClass4"><button type="button" id="btn-cancel-modal" class="btn-modal danger btn">Cancelar</button></div>
			</div>
		</div>
	</div>
<header>
	<div id="header-logo">
		<img src="img/logoZinobe2.png">
	</div>
</header>
<div id="modal">
	<div id="content-modal">
		
	</div>
</div>
<div id="container">
	<div id="container-central">
		<p>Bienvenido,<br>a tu directorio virtual.</p>
		<div id="tarjeta">
			<form name="formulario" id="formulario" method="post" action="validation.php">
			<?php
			if(isset($_GET['msg']))
			if($_GET['msg']=='DP')
			{
				echo 'El usuario ya se encuentra registrado.';
			}
			else
			{
				echo 'El usuario ha sido creado satisfactoriamente.';
			}
			?>
				<div id="contenido_tarjeta">
					<label>Usuario</label>
					<input type="text" name="user" id="user" class="inp" required="required">
					<label>Contraseña</label>
					<input type="password" name="password" ismap="password" class="inp" required="required">
					<button type="submit" class="btn success">Ingresar</button>
				</div>
			</form>
			<div id="pie_tarjeta">
				<small>No estas registrado, registrese ahora.</small>
				<button type="submit" class="btn success" id="nuevoUsuario">Registrarme</button>		
			</div>
		</div>
	</div>	
</div>
<footer>
	<small>© William Guevara 2021</small>
</footer>
</body>
</html>