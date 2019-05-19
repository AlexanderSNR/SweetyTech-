<?php
require_once '../../controller/Empresa_controller.php';
require_once '../../model/Empresa_model.php';

$controlEmpresa = new EmpresaController ();
$Empresa = new EmpresaModel();

$resultado=$controlEmpresa->buscar($_GET['Nit_Empresa']);

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
							<li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Empresa</li>
						</ol>
					</nav>
				</div>
				<!-- / breadcrumbs -->


		<div class="container" style="width: 100%;">
					<div class="content-form col-md-12">

						<form action="" method="post">
<div class="form-group">
  <label for="">NIT EMPRESA : </label>
<input type="number" class="form-control" name="Nit_Empresa" id="campo" value="<?php echo $resultado->Nit_Empresa;?>" disabled required autofocus>
  </div>

<div class="form-group">
  <label for="">NOMBRE: </label>
  <input type="text" class="form-control" id="campo" name="Nombre" value="<?php echo $resultado->Nombre;?>" required autofocus >
</div>

<div class="form-group">
  <label for="">TELEFONO: </label>
  <input type="text" class="form-control" id="campo" name="Telefono" value="<?php echo $resultado->Telefono;?>" required autofocus >
</div>

<div class="form-group">
  <label for="">DIRECCION: </label>
  <input type="text" class="form-control" id="campo" name="Direccion" value="<?php echo $resultado->Direccion;?>" required autofocus >
</div>


  <input type="submit" class="btn btn-primary" value="Actualizar" name ="Actualizar">

</form>
</div>
<?php

if (isset($_POST['Actualizar'])) {
  if (!empty($_POST['Nombre']) && !empty($_POST['Telefono']) && !empty($_POST['Direccion'])) {
       
    $Empresa->__SET('Nit_Empresa', $_GET['Nit_Empresa']);
		$Empresa->__SET('Nombre',$_POST['Nombre']);
		$Empresa->__SET('Telefono',$_POST['Telefono']);
		$Empresa->__SET('Direccion',$_POST['Direccion']);
 
        

       if($controlEmpresa->actualizar($Empresa)){

        echo '<center>Datos Actualizados con exito.</center>';
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