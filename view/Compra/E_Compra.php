<?php
require_once '../../controller/Compra_controller.php';
require_once '../../model/Compra_model.php';
require_once '../../controller/Empresa_controller.php';

$controlCompra = new CompraController ();
$Compra = new CompraModel();
$Empresa = new EmpresaController();


$resultado=$controlCompra->buscar($_GET['Id_Compra']);

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
							<li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Compra</li>
						</ol>
					</nav>
				</div>
				<!-- / breadcrumbs -->


		<div class="container" style="width: 100%;">
					<div class="content-form col-md-12">

						<form action="" method="post">

<div class="form-group">
  <label for="">ID COMPRA: </label>
<input type="number" class="form-control" name="Id_Compra" id="campo" value="<?php echo $resultado->Id_Compra;?>" disabled >
  </div>

<div class="form-group">
  <label for="">PRECIO UNIDAD: </label>
  <input type="text" class="form-control" id="campo" name="Precio_Unidad" value="<?php echo $resultado->Precio_Unidad;?>"  >
</div>

<div class="form-group"> 
  <label for="">FECHA COMPRA: </label>
  <input type="date" class="form-control" id="campo" name="Fecha_Compra" value="<?php echo $resultado->Fecha_Compra;?>" >
</div>

<div class="form-group"> 
  <label for="">TOTAL: </label>
  <input type="number" class="form-control" id="campo" name="Total" value="<?php echo $resultado->Total;?>" >
</div>

<div class="form-group">
  <label for="">EMPRESA: </label>
  <select id="campo" class="form-control" name="Nit_Empresa" >
  <option selected><?php echo $resultado->Nombre;?></option>
    <?php 
				foreach ($Empresa->Listar() as $r):?>
        <option value="<?php echo $r->__GET('Nit_Empresa'); ?>">
        <?php echo $r->__GET('Nombre'); ?></option>
        <?php endforeach; ?> 
    </select><br>

    <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right" type="button"  style="float: right; margin-right:3%; margin-top:2%;" value="Actualizar" name ="Actualizar">



</form>
</div>
<?php

if (isset($_POST['Actualizar'])) {
       
    $Compra->__SET('Id_Compra', $_GET['Id_Compra']);
    $Compra->__SET('Precio_Unidad',$_POST['Precio_Unidad']);
    $Compra->__SET('Fecha_Compra',$_POST['Fecha_Compra']);
    $Compra->__SET('Total',$_POST['Total']);
    $Compra->__SET('Nit_Empresa',$_POST['Nit_Empresa']);
        
    
       

       if($controlCompra->actualizar($Compra)){

        echo '<center>Datos Actualizados con exito.</center>';
       }

}

?>
</body>
</html>