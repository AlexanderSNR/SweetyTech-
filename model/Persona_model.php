<?php
  class  PersonasModel { 
    protected $Id_Persona;
    protected $Documento_Identificacion; 
    protected $Nombre;
    protected $Apellido;
    protected $Direccion; 
    protected $Telefono; 
    protected $Celular; 
    protected $Fecha_Nacimiento; 
    protected $Estado; 	
    protected $Nit_Empresa; 
    protected $Id_Tipo_Persona; 
    protected $Id_Tipo_Documento; 
    protected $Genero ;
    //constructor  que invoca los otros Constructores dependiendo de los argumentos del constructor
    public function __CONSTRUCT()
     {
         $a = func_get_args();
         $i = func_num_args();
         if (method_exists($this,$f='__construct'.$i)) {
             call_user_func_array(array($this,$f),$a);
         }
     }
     
    //constructor para crear una persona tipo  cliente no se incluye el nit_empresa por que no es un proveedor.
  public function __CONSTRUCT9($Documento_Identificacion,$Nombre,$Apellido,$Direccion,$Telefono,
  $Celular,$Fecha_Nacimiento,$Id_Tipo_Persona,$Id_Tipo_Documento)
  {
 
  $this->Documento_Identificacion = $Documento_Identificacion;
  $this->Nombre = $Nombre;
  $this->Apellido = $Apellido;
  $this->Direccion = $Direccion;
  $this->Telefono = $Telefono;
  $this->Celular = $Celular;
  $this->Fecha_Nacimiento = $Fecha_Nacimiento;
  $this->Estado = 1;
  $this->Id_Tipo_Persona = $Id_Tipo_Persona;
  $this->Id_Tipo_Documento = $Id_Tipo_Documento;
  }
 
      

//Constructor para registrar un proveedor
  
public function __CONSTRUCT11($Documento_Identificacion,$Nombre,$Apellido,$Direccion,$Telefono,
$Celular,$Fecha_Nacimiento,$Estado,$Nit_Empresa,$Id_Tipo_Persona,$Id_Tipo_Documento)
{
$this->Documento_Identificacion = $Documento_Identificacion;
$this->Nombre = $Nombre;
$this->Apellido = $Apellido;
$this->Direccion = $Direccion;
$this->Telefono = $Telefono;
$this->Celular = $Celular;
$this->Fecha_Nacimiento = $Fecha_Nacimiento;
$this->Estado = 1;
$this->Nit_Empresa = $Nit_Empresa;
$this->Id_Tipo_Persona = 3;
$this->Id_Tipo_Documento = $Id_Tipo_Documento;
}

//constructor por defecto 
  public function  __CONSTRUCT0(){

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