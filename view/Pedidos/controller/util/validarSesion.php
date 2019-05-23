<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $Usuario = $_SESSION['usuario'];
}else{
    echo "<script>window.location.href='../Gestion/login.php'</script>";
}

?>