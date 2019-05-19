<?php

class TamanoModel
{
    private $Id_Tamano;
    private $Nombre_Tamano;
    private $Estado;

    public function __GET($atributo){

        return $this->$atributo;
    }
    
    public function __SET($atributo, $valor)
    {
       $this->$atributo=$valor;
    }

}