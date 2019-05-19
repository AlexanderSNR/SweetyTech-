<?php

class TipoEnvolturaModel
{
    private $Id_Tipo_Envoltura;
    private $Nombre_Tipo_Envoltura;
    private $Estado;

    public function __GET($atributo){

        return $this->$atributo;
    }
    
    public function __SET($atributo, $valor)
    {
       $this->$atributo=$valor;
    }

}
