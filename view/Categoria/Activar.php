<?php 
include_once '../../controller/Categoria_controller.php';
include_once '../../model/Categoria_model.php';
$ControlCategoria=new CategoriaController();
$Categoria=new CategoriaModel();
$resultado=$ControlCategoria->buscar($_GET['Id_Categoria']);
$activar=0;
$Categoria->__SET('Id_Categoria',$_GET['Id_Categoria']);
$Categoria->__SET('Estado',$activar);
if($ControlCategoria->activar($Categoria)){?>
    <meta http-equiv="refresh" content="120; url=List_Categoria.php">
    <?php
}
?>