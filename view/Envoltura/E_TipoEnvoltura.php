<?php
require_once '../../controller/TipoEnvoltura_controller.php';
require_once '../../model/TipoEnvoltura_model.php';

$ControlTipoEnvoltura = new TipoEnvolturaController ();
$TipoEnvoltura = new TipoEnvolturaModel();

$resultado=$ControlTipoEnvoltura->buscar($_GET['Id_Tipo_Envoltura']);

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
							<li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Tipo Envoltura</li>
						</ol>
					</nav>
				</div>
				<!-- / breadcrumbs -->


		<div class="container" style="width: 100%;">
					<div class="content-form col-md-12">

						<form action="" method="post">

<div class="form-group">
  <label for="">ID TIPO ENVOLTURA: </label>
<input type="number" class="form-control" name="Id_Tipo_Envoltura" id="campo" value="<?php echo $resultado->Id_Tipo_Envoltura;?>" disabled required autofocus>
  </div>

<div class="form-group">
  <label for="">NOMBRE TIPO ENVOLTURA: </label>
  <input type="text" class="form-control" id="campo" name="Nombre_Tipo_Envoltura" value="<?php echo $resultado->Nombre_Tipo_Envoltura;?>" required autofocus >
</div>



  <input type="submit" class="btn btn-primary" style="float: right; margin-right:3%; margin-top:2%;" value="Actualizar" name ="Actualizar">

</form>
</div>
</div>
</div>
<?php

if (isset($_POST['Actualizar'])) {
  
       
        $TipoEnvoltura->__SET('Id_Tipo_Envoltura', $_GET['Id_Tipo_Envoltura']);
        $TipoEnvoltura->__SET('Nombre_Tipo_Envoltura', $_POST['Nombre_Tipo_Envoltura']);
       

        if($ControlTipoEnvoltura->actualizar($TipoEnvoltura)){

        echo 'Datos Actualizados con exito.';
       }
 
}

?>
</body>
</html>