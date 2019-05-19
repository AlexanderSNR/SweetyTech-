<?php

class AnchetaModel {

    private $CodigoAncheta;
    private $Nombre;
    private $Descripcion;
    private $Precio;
    private $Foto;
    private $Foto2; 
    private $Foto3;
    private $TipoBase;


    public function __GET($at){

        return $this->$at;
    }

    public function __SET($at, $va){

        $this->$at=$va;
    }
}

?>