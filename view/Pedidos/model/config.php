<?php 

class Conexion 
{
	
	private $servername="localhost";
	private $username="root";
	private $userpassword="";
	protected $conexion;

	public function __CONSTRUCT()
	{
		try{
		$this->conexion=new PDO("mysql:host={$this->servername};dbname=sweety1", $this->username, $this->userpassword,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//echo "<h1>Conexion exitosa</h1>";
		}catch(Exception $error){
		//echo "Se ha presentado un error en la conexion".$error->getMessage();
		die($error->getMessage());
	}
	}
}
 ?>
 