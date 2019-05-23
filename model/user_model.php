<?php 
require_once 'Persona_model.php';
class Usuariomodel  extends  PersonasModel
{   
	private $Id_Usuario;	
	private $Email;
	private $password;
	private $RestablecerPass;
	private $Id_Rol;
  
	public function __CONSTRUCT()
	{
		$a = func_get_args();
		$i = func_num_args();
		if (method_exists($this,$f='__construct'.$i)) {
		call_user_func_array(array($this,$f),$a);
		}
	}
	//constructor para registrar un cliente
	public function  __CONSTRUCT13($Documento_Identificacion,$Nombre,$Apellido,$Genero,$Direccion,$Telefono,
	$Celular,$Fecha_Nacimiento,$Id_Tipo_Documento,$Email,$password,$Estado,$Id_Tipo_Persona){
	//invoca el constructor de la clase persona  para registrar un cliente
	parent::__CONSTRUCT($Documento_Identificacion,$Nombre,$Apellido,$Direccion,$Telefono,
  $Celular,$Estado,$Fecha_Nacimiento,$Id_Tipo_Persona,$Id_Tipo_Documento,$Genero,0);
	$this->Email = $Email;
	$this->password = hash('md5',$password);
	$this->Id_Rol =2;
	}

	public function __CONSTRUCT2($Email,$password){
		$this->Email = $Email;
		$this->password =  hash('MD5',$password);
	}
	
    
	public function __GET($att)
	{
		return $this->$att;
	}

	public function __SET($att, $v)
	{
		$this->$att=$v;
	}

}

?>