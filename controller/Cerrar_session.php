<?php  
//error_reporting(0);
require_once '../view/pedidos/controller/util/validarSesion.php';
$varsesion= $Usuario['Id_Persona'];
if ($varsesion== null || $varsesion= '' ){
    die();
}
session_destroy();
    header("Location:../view/gestion/login.php");

?>
