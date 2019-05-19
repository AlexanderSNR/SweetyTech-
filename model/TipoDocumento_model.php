<?php

class TipoDocumentoModel
{
    private $Id_Tipo_Documento;
    private $Nombre;

    public function __GET($atributo){

        return $this->$atributo;
    }
    
    public function __SET($atributo, $valor)
    {
       $this->$atributo=$valor;
    }

}
