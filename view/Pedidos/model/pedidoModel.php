<?php
class pedidoModel {

    private $id_Pedido	;
    private $Direccion_Envio;
    private $Fecha_pedido;
    private $Aplicar_recargo;
    private $id_Estado_pedido;
    private $id_Tipo_Envio;

    public function __CONSTRUCT()
     {
         $a = func_get_args();
         $i = func_num_args();
         if (method_exists($this,$f='__construct'.$i)) {
             call_user_func_array(array($this,$f),$a);
         }
     }
     private function __CONSTRUCT0() {
        
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