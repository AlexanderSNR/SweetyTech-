<?php

class UnidadPesoModel
{
    private $Id_Unidad_Peso; 
    private $Nombre;

    public function __GET($atributo){

        return $this->$atributo;
    }
    
    public function __SET($atributo, $valor)
    {
       $this->$atributo=$valor;
    }

}
