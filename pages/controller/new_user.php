<?php
	require_once('../../controller/database.php');
	require_once('../../controller/CustomerData.php');

	require_once('../../start.php');
	$database = new database();
	$db = new CustomerData($database->server,$database->user,$database->pass,$database->database);

	$validacion = $db->consulta('identificacion','Empleado','identificacion = '.$_POST['identificacion']);
	
	if(mysqli_fetch_assoc($validacion))
	{
		header('location:../usuarios.php?msg=DP');	
	}
	else
	{
		$consulta = $db->insertar('usuario','primer_nombre,documento,email,pais,password,intentos,estado',"'".$_POST["primerNombre"]."','".$_POST["documento"]."','".$_POST["email"]."','".$_POST["pais"]."','".$_POST["contrasena"]."',0,1");
		header('location:../usuarios.php?msg=CR');
	}


?>