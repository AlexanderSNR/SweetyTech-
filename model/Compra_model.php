<?php

class CompraModel
{
    private $Id_Compra;
    private $Precio_Unidad;
    private $Fecha_Compra;
    private $Nit_Empresa;
    private $Nombre;

    public function __GET($atributo){

        return $this->$atributo;
    }
    
    public function __SET($atributo, $valor)
    {
       $this->$atributo=$valor;
    }

}