<?php

  class  PlantillaModel { 
    private $Codigo_Plantilla;
    private $Nombre_plantilla;
    private $Fecha_Registro;
    private $Id_Tipo_Plantilla;
    private $Nombre;

    public function __GET($att){
		return $this->$att;
	}

	public function __SET($att, $v){
		$this->$att=$v;
	}

}

?>