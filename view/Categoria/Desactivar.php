<?php 
include_once '../../controller/Categoria_controller.php';
include_once '../../model/Categoria_model.php';
$ControlCategoria = new CategoriaController ();
$categoria=new CategoriaModel();
$resultado=$ControlCategoria->buscar($_GET['Id_Categoria']);
$activar=1;
$categoria->__SET('Id_Categoria',$_GET['Id_Categoria']);
$categoria->__SET('Estado',$activar);
if($ControlCategoria->activar($categoria)){?>
    <meta http-equiv="refresh" content="120; url=List_Categoria.php">
    <?php
}
?>