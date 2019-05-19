<?php

class CategoriaModel
{
    private $Id_Categoria;
    private $Nombre_Categoria;
    private $Estado;

    public function __GET($atributo){

        return $this->$atributo;
    }
    
    public function __SET($atributo, $valor)
    {
       $this->$atributo=$valor;
    }

}