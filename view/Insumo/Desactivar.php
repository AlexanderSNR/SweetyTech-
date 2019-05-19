<?php 
include_once '../../controller/Insumo_controller.php';
include_once '../../model/Insumo_model.php';
$ControlInsumo = new InsumoController ();
$insumo=new InsumoModel();
$resultado=$ControlInsumo->buscar($_GET['Codigo_insumo']);
$desactivar=1;
$insumo->__SET('Codigo_insumo',$_GET['Codigo_insumo']);
$insumo->__SET('Estado',$desactivar);
if($ControlInsumo->desactivar($insumo)){?>
    <meta http-equiv="refresh" content="0; url=C_insumo.php">
    <?php
}
?>