<?php 
include_once '../../controller/Tamano_controller.php';
include_once '../../model/Tamano_model.php';
$ControlTamano=new TamanoController();
$Tamano=new TamanoModel();
$resultado=$ControlTamano->buscar($_GET['Id_Tamano']);
$activar=0;
$Tamano->__SET('Id_Tamano',$_GET['Id_Tamano']);
$Tamano->__SET('Estado',$activar);
if($ControlTamano->activar($Tamano)){?>
    <meta http-equiv="refresh" content="120; url=List_Tamano.php">
    <?php
}
?>