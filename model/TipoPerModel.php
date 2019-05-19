<?php
  class  TipoPerModel { 
      private $Id_Tipo_Persona;
      private $nombre;
      public function  __CONSTRUCT($Id_Tipo_Persona,$Nombre){
        $this->Id_Tipo_Persona=$Id_Tipo_Persona;
        $this->Nombre=$Nombre;
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
