<?php

class salida
{
    private $Codigo_Salida;
    private $Fecha_Salida;
    private $Motivo_Salida;
    private $Nombre_Insumo;
    private $cantidad;

    public function __GET($a)
    {
       return $this->$a;
    }

    public function __SET($a, $v)
    {
        $this->$a=$v;
    }

}




?>