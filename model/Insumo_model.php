<?php

class InsumoModel
{
    private $Codigo_insumo;
    private $Nit_Empresa;
    private $Nombre_Insumo;
    private $Estado;
    private $Precio_Entrada;
    private $Precio_Cliente;
    private $StockMinimo;
    private $Cantidad;
    private $id_Categoria;
    private $Id_Tamano;
    private $Id_Tipo_Envoltura;
    private $Nombre_Categoria;
    private $Nombre_Tamano;
    private $Nombre_Tipo_Envoltura;
    private $Nombre;
    private $Imagen;


    public function __GET($atributo){

        return $this->$atributo;
    }
    
    public function __SET($atributo, $valor)
    {
       $this->$atributo=$valor;
    }

}