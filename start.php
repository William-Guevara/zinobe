<?php
	
	session_start();
	require_once('controller/database.php');
	require_once('controller/CustomerData.php');
	if(!isset($_SESSION['id']))
	{
		session_unset(); 
		session_destroy();
	}

	$database = new database();
	$db = new CustomerData($database->server,$database->user,$database->pass,$database->database);

?>