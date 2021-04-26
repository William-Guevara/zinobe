<?php		
	require_once('controller/CustomerData.php');
	require_once('controller/database.php');

	$database = new database();
	$CustomerData = new CustomerData($database->server,$database->user,$database->pass,$database->database);

	$login = $CustomerData->iniciarSesion($_POST['user'], md5($_POST['password']));
	
	
	switch ($login) {
	 	case 'IN':
	 		 //remove all session variables
	 		session_unset(); 
	 		 //destroy the session 
	 		session_destroy(); 
	 		//envio pagina error login
	 		header('location:index.php');
	 	break;
		case 'SC':
			header('location:pages/usuarios.php');
		break;
	 	case 'CE':
	 		 //remove all session variables
	 		session_unset(); 
	 		 //destroy the session 
	 		session_destroy(); 
	 		//envio pagina error login
	 		header('location:index.php');
	 	break;
	 	case 'UP':
	 		 //remove all session variables
	 		session_unset(); 
	 		 //destroy the session 
	 		session_destroy(); 
	 		//envio pagina error login
	 		header('location:index.php');
	 	break;
	 	default:
	 		 //remove all session variables
	 		session_unset(); 
	 		 //destroy the session 
	 		session_destroy(); 
	 		//envio pagina error login
	 		header('location:index.php');
	 	break;
	}

?>