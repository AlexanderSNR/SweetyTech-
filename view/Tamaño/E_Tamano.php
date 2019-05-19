<?php
require_once '../../controller/Tamano_controller.php';
require_once '../../model/Tamano_model.php';

$ControlTamano = new TamanoController ();
$Tamano = new TamanoModel();

$resultado=$ControlTamano->buscar($_GET['Id_Tamano']);

?>
 
 <!DOCTYPE html>
<html lang="en">

	<?php require_once ("../util/head.php");?>

	<body>
		<?php require_once ("../util/menu.php"); ?>

		<main>
			<?php require_once ("../util/logo.php"); ?>

			<div class="row" id="cont">

				<!-- breadcrumbs -->
				<div class="row col-md-12" id="migas">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
							<li class="breadcrumb-item text-light" id="titulos"><a>Modificar</a></li>
							<li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Tamaño</li>
						</ol>
					</nav>
				</div>
				<!-- / breadcrumbs -->


		<div class="container" style="width: 100%;">
					<div class="content-form col-md-12">

						<form action="" method="post">

<div class="form-group">
  <label for="">ID TAMAÑO: </label>
<input type="number" class="form-control" name="Id_Tamano" id="campo" value="<?php echo $resultado->Id_Tamano;?>" disabled >
  </div>

<div class="form-group">
  <label for="">NOMBRE TAMAÑO: </label>
  <input type="text" class="form-control" id="campo" name="Nombre_Tamano" value="<?php echo $resultado->Nombre_Tamano;?>" >
</div>



  <input type="submit" class="btn btn-primary" style="float: right; margin-right:3%; margin-top:2%;" value="Actualizar" name ="Actualizar">

</form>
</div>
<?php

if (isset($_POST['Actualizar'])) {
  
       
        $Tamano->__SET('Id_Tamano', $_GET['Id_Tamano']);
        $Tamano->__SET('Nombre_Tamano', $_POST['Nombre_Tamano']);
       

       if($ControlTamano->actualizar($Tamano)){

        echo 'Datos Actualizados con exito.';
       }

    
    }

?>
</div>
</body>
</html>