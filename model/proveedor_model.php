<?php
require_once 'persona_model.php';
class proveedor extends PersonasModel
{    
    private $nit_empresa;
    private $nombre;
    private $telefono;
    private $direccion;
   

    

    public function __GET($a)
    
    {
        return $this->$a;
    }

    public function __SET($a, $v)
    {
        $this->$a->$v;
    }

}


?>