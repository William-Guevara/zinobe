<?php
	require_once('../start.php');
	if(!isset($_SESSION['id']))
	{
		header('location: ../index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	
	
	<link rel="icon" type="image/png" href="../img/logoZinobe.png">
	<title>Zinobe</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../js/functions.js"></script>
	<script type="text/javascript" src="../js/usuarios.js"></script>


	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>	
	<header>
		<div id="header-logo">
			<div class="topnav">
				<img src="../img/logoZinobe2.png">
			  <a href="../cerrarSesion.php">Cerrar sesión</a>
			</div>	
		</div>
	</header>
	<div id="container">
		<div id="container-central">
			<h1 id="nombreModulo">Administrar Usuarios - <?php echo $_SESSION['nombre'] ?></h1>
	
		<table id="example" class="display" style="width:100%">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Documento</th>
					<th>Fecha nacimiento</th>
					<th>Telefono</th>
					<th>Correo</th>
					<th>País</th>
					<th>Departamento</th>
					<th>Ciudad</th>
					<th>Cargo</th>
				</tr>
			</thead>
			
		</table>
	</div>
	</div>
	<footer>
	<small>© William Guevara 2021</small>
</footer>
</body>
</html>