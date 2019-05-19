<?php  
session_start();
//error_reporting(0);
$usuario =$_SESSION['usuario'];
$varsesion = $usuario['Id_Persona'];

if ($varsesion== null || $varsesion= '' ){
    die();
}
session_destroy();
    header("Location:../view/gestion/login.php");

?>
