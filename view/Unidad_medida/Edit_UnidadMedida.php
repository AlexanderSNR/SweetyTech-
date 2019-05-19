<?php
require_once '../controller/UnidadMedida_controller.php';
require_once '../model/UnidadMedida_model.php';

$controlUnidadMedida = new UnidadMedidaController ();
$UnidadMedida = new UnidadMedidaModel();

$resultado=$controlUnidadMedida->buscar($_GET['Id_Unidad_Medida']);

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    

    <title>Actualizar Registros</title>
</head>
<body>
<a href="List_UnidadMedida">Volver</a>
<center>
<h3>Actualizar  registro</h3>
</center>
</form>

<form method="post">
  <div class="form-group">
  <label for="">Id Unidad Medida</label>
<input type="text" name="Id_Unidad_Medida" id="" value="<?php echo $resultado->Id_Unidad_Medida;?>" disabled> <br> <br>
  </div>
  <div class="form-group">
  <label for="">Nombre</label>
<input type="text" name="Nombre" id="" value="<?php echo $resultado->Nombre;?>"> <br> <br>
  </div>
 
  <input type="submit" value="Actualizar" name ="Actualizar">
</form>

<?php

if (isset($_POST['Actualizar'])) {
    if (!empty($_POST['Nombre']) ) {
       
        $UnidadMedida->__SET('Id_Unidad_Medida', $_GET['Id_Unidad_Medida']);
        $UnidadMedida->__SET('Nombre', $_POST['Nombre']);
       

       if($controlUnidadMedida->actualizar($UnidadMedida)){

        echo 'Datos Actualizados con exito.';
       }

    }else{

        echo 'Debe llenar todos los campos.';
    
    }
    
}else{

    echo 'Debe llenar el formulario.';

}

?>
</body>
</html>