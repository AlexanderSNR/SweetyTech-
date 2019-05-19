<?php
require_once '../controller/UnidadPeso_controller.php';
require_once '../model/UnidadPeso_model.php';

$controlUnidadPeso = new UnidadPesoController ();
$UnidadPeso = new UnidadPesoModel();

$resultado=$controlUnidadPeso->buscar($_GET['Id_Unidad_Peso']);

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
<a href="List_UnidadPeso.php">Volver</a>
<center>
<h3>Actualizar  registro</h3>
</center>
<form method="post">
  <div class="form-group">
  <label for="">Id Unidad_Peso</label>
<input type="text" name="Id_Unidad_Peso" id="" value="<?php echo $resultado->Id_Unidad_Peso;?>" disabled> <br> <br>
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
       
        $UnidadPeso->__SET('Id_Unidad_Peso', $_GET['Id_Unidad_Peso']);
        $UnidadPeso->__SET('Nombre', $_POST['Nombre']);
       

       if($controlUnidadPeso->actualizar($UnidadPeso)){

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