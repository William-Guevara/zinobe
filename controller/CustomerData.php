<?php
require_once('database.php');

class CustomerData
{	
	private $conexion;
	#el sql de la última consulta
	public $sql;
	#el resultado de la última consulta
	private $resultado;

	private $consulta;
	#el último registro del último resultado
	private $registro;

	//private $resultado;


  public function __construct($server,$user,$pass,$database)
  {
		$this->server=$server;
		$this->user=$user;
		$this->pass=$pass;
		$this->database=$database;

		$this->conexion = mysqli_connect($server,$user,$pass,$database) or die("error en dataBase");
		mysqli_select_db($this->conexion,$this->database) or die(mysqli_error());
		mysqli_query($this->conexion,"SET NAMES 'utf8'");
		mysqli_query($this->conexion,"SET time_zone='-5:00';");
		date_default_timezone_set('America/Bogota');
	}

	public function consulta($campos,$tabla,$condicion)
	{
		$this->sql='SELECT '.$campos.' FROM '.$tabla.' WHERE '.$condicion.';';
		$this->resultado = mysqli_query($this->conexion, $this->sql);

 		return $this->resultado;
	}

	public function mostrarConsulta($campos,$tabla,$condicion)
	{
		$this->sql='SELECT '.$campos.' FROM '.$tabla.' WHERE '.$condicion.';';
		$this->resultado = mysqli_query($this->conexion, $this->sql);

 		echo $this->sql;
 		return $this->resultado;
	}

	public function insertar($tabla,$campos,$valores)
	{
		$this->sql= 'INSERT INTO '.$tabla.' ('.$campos.') VALUES ('.$valores.');';
		$this->consulta = mysqli_query($this->conexion, $this->sql);
		return $this->sql;
	}

	public function editar($tabla,$campos,$condicion)
	{
		if($condicion==null||$condicion=="")
		{
			return 'Error';
		}
		else
		{
			$this->sql= 'UPDATE '.$tabla.' SET '.$campos.' WHERE '.$condicion.';';
			$this->consulta = mysqli_query($this->conexion, $this->sql);
			return $this->sql;
		}
	}

	public function iniciarSesion($user,$password)
	{
		$consulta = $this->consulta('id, intentos', 'usuario', 'email = "'.$user.'" AND estado = 1');

		$this->resultado = mysqli_fetch_assoc($consulta);
		
		if($this->resultado)
		{
			if($this->resultado['intentos'] >= 3)
			{
				return 'IN';
			}
			else
			{
				$intentos = $this->resultado['intentos'];
				$consulta = $this->consulta('id,intentos','usuario','email = "'.$user.'" and password = "'.$password.'"');
				$this->resultado = mysqli_fetch_assoc($consulta);
			}

			if($this->resultado)
			{
				//funcion en caso de que concidan los registros
				if($this->resultado['intentos'] >= 3)
				{
					return 'IN';
				}
				else
				{
					$_SESSION['id'] = $this->resultado['id'];

					$consulta = $this->consulta('*','usuario','email = "'.$user.'"');
					$this->resultado = mysqli_query($this->conexion,$this->sql) or die(mysqli_error($this->conexion));
					$this->resultado = mysqli_fetch_assoc($this->resultado);
					session_start();
					$_SESSION['id'] = $this->resultado['id'];
					$_SESSION['nombre'] = $this->resultado['primer_nombre'];
					$_SESSION['documento'] = $this->resultado['documento'];
					$_SESSION['email'] = $this->resultado['email'];
					
					return 'SC';
				}
			}
			else
			{
				$this->editar('usuario','intentos = '.($intentos+1),'id = '.$user);
				if($this->resultado['intentos'] >= 3)
				{
					return 'IN';
				}
				return 'CE';
			}
		}
		else
		{
			return 'UP';
		}
	}
}
?>
