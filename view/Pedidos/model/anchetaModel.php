<?php
class anchetaModel {

    private $Codigo_Ancheta	;
    private $Nombre;
    private $Descripcion;
    private $Precio;
    private $Foto;
    private $Descuento;

    public function __CONSTRUCT()
     {
         $a = func_get_args();
         $i = func_num_args();
         if (method_exists($this,$f='__construct'.$i)) {
             call_user_func_array(array($this,$f),$a);
         }
     }

     private function __CONSTRUCT4($Nombre,$Descripcion,$Precio,$Foto,$Descuento){
         $this->Nombre = $Nombre;
         $this->Descripcion = $Descripcion;
         $this->Precio=$Precio;
         $this->Foto = $Foto;
     }
     private function __CONSTRUCT6($Codigo_Ancheta,$Nombre,$Descripcion,$Precio,$Foto,$Descuento){
        $this->Codigo_Ancheta = $Codigo_Ancheta;
        $this->Nombre = $Nombre;
        $this->Descripcion = $Descripcion;
        $this->Precio=$Precio;
        $this->Foto = $Foto;
        $this->Descuento = $Descuento ;
    }
     public function __GET($atributo)
     {
         return $this->$atributo;
     }
    
     public function __SET($atributo,$valor)
     {
         $this->$atributo=$valor;
     }

}

?>