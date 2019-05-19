<?php 
require_once '../../controller/TipoBase_controller.php';
$Base = new TipoBaseController();
if ($Base->eliminar($_GET['Id_Tipo_Base'])) {
	echo "Datos eliminandos con exito  "; ?>
	<meta http-equiv="refresh" content="0; url=List_TipoBase.php">
<?php  }?>