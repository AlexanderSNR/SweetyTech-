<?php

class TipoBaseModel
{
    private $Id_Tipo_Base;
    private $Nombre;

    public function __GET($atributo){

        return $this->$atributo;
    }
    
    public function __SET($atributo, $valor)
    {
       $this->$atributo=$valor;
    }

}
