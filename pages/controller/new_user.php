<?php
	require_once('../../controller/database.php');
	require_once('../../controller/CustomerData.php');

	require_once('../../start.php');
	$database = new database();
	$db = new CustomerData($database->server,$database->user,$database->pass,$database->database);

	$validacion = $db->consulta('documento','usuario','documento = '.$_POST['documento']);
	
	if(mysqli_fetch_assoc($validacion))
	{
		header('location:../../index.php?msg=DP');	
	}
	else
	{
		$consulta = $db->insertar('usuario','primer_nombre,documento,email,pais,password,intentos,estado',"'".$_POST["primerNombre"]."','".$_POST["documento"]."','".$_POST["email"]."','".$_POST["pais"]."','".md5($_POST["contrasena"])."',0,1");
		header('location:../../index.php?msg=CR');
	}


?>