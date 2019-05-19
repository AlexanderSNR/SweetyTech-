<?php 
include_once '../../controller/Insumo_controller.php';
include_once '../../model/Insumo_model.php';
$ControlInsumo = new InsumoController ();
$insumo=new InsumoModel();
$resultado=$ControlInsumo->buscar($_GET['Codigo_insumo']);
$activar=0;
$insumo->__SET('Codigo_insumo',$_GET['Codigo_insumo']);
$insumo->__SET('Estado',$activar);
if($ControlInsumo->activar($insumo)){?>
    <meta http-equiv="refresh" content="0; url=C_insumo.php">
    <?php
}
?>