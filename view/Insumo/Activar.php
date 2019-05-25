<?php 
include_once '../../controller/Insumo_controller.php';
include_once '../../model/Insumo_model.php';
$ControlInsumo = new InsumoController ();
$insumo=new InsumoModel();
$resultado=$ControlInsumo->buscar($_GET['Codigo_insumo']);
$activar=1;
$insumo->__SET('Codigo_insumo',$_GET['Codigo_insumo']);
$insumo->__SET('Estado',$activar);
if($ControlInsumo->activar($insumo)){
   echo '<script>  window.location.href="C_insumo.php"; </script>';
    
}
?>