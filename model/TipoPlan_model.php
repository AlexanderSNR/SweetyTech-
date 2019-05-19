<?php
class TipoPlan {
	private $Id_Tipo_Plantilla;
	private $Nombre_Plantilla;

	  public function  __CONSTRUCT($Id_Tipo,$Nombre){
        $this->Id_Tipo_Plantilla=$Id_Tipo;
        $this->Nombre_Plantilla=$Nombre;
      }
      public function __GET($att)
      {
          return $this->$att;
      }
  
      public function __SET($att, $v)
      {
          $this->$att=$v;
      }
}
?>