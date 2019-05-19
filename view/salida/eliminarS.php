<?php 
require_once '../../controller/salida_controller.php';
$control = new salida_Controller();
if ($control->eliminar($_GET['Codigo_Salida'])) {
	echo "Datos eliminandos con exito  "; ?>
	<meta http-equiv="refresh" content="0; url=C_Salida.php">
<?php  }?>