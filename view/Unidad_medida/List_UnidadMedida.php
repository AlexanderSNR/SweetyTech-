<?php 
include_once '../controller/UnidadMedida_controller.php';
$ControlUnidadMedida = new UnidadMedidaController ();
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
    <title>Tipos de base</title>
</head>
<body>
<div class="container">
<h1>Unidad Medida Registradas</h1>
<br>
<a href="Add_Insumo.php">Volver</a>
<br>
<table class="table" style="width:100%">
  <tr>
    <th scope="row">Id Unidad Medida</th>
    <th>Nombre</th>
  </tr>
  <tr>
    <?php foreach ($ControlUnidadMedida->Listar() as $fila):?>

        <td><?php echo $fila->Id_Unidad_Medida; ?> </td>
        <td><?php echo $fila->Nombre; ?> </td>
        
        <td><a href="../views/Edit_UnidadMedida.php?Id_Unidad_Medida=<?php echo $fila->Id_Unidad_Medida;?>">Editar</a></td>
        <td><a href="../views/Delete_UnidadMedida.php?Id_Unidad_Medida=<?php echo $fila->Id_Unidad_Medida;?>">Borrar</a></td>
  </tr>

  <?php endforeach; ?>
  
</table>
</div>
</body>
</html>