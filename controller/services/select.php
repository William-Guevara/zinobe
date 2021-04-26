<?php
	
	require_once('../../start.php');

	switch ($_REQUEST['accion']) {
		case 'cargarPaises':
			$arrayUser=array();
			//consulta los usuarios de una empresa
			$resultado = $db->consulta('id,nombre','paises','1');

			while($_cap=mysqli_fetch_assoc($resultado)) 
			{
				$arrayUser[]=$_cap;
			}

			echo json_encode($arrayUser);
		break;	
	}

?>