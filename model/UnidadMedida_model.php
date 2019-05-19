<?php

class UnidadMedidaModel
{
    private $Id_Unidad_Medida; 
    private $Nombre;

    public function __GET($atributo){

        return $this->$atributo;
    }
    
    public function __SET($atributo, $valor)
    {
       $this->$atributo=$valor;
    }

}
