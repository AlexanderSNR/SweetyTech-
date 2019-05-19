<?php

class DetalleModel {

    private $idDetalle;
    private $idInsumo;
    private $idPlantilla;
    private $Cantidad;
    
    public function __GET($at){

        return $this->$at;
    }

    public function __SET($at, $va){

        $this->$at=$va;
    }
}

?>