<?php

class EmpresaModel
{
    private $Nit_Empresa;
    private $Nombre;
    private $Telefono;
    private $Direccion;


    public function __GET($atributo){

        return $this->$atributo;
    }
    
    public function __SET($atributo, $valor)
    {
       $this->$atributo=$valor;
    }

}