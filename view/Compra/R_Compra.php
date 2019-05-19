<?php

//COMPRA
require_once '../../controller/Compra_controller.php';
require_once '../../controller/Empresa_controller.php';
require_once '../../model/Compra_model.php';
$ControlCompra = new CompraController();
$Empresa = new EmpresaController();
$Compra = new CompraModel();



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
							<li class="breadcrumb-item text-light" id="titulos"><a>Registrar</a></li>
							<li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Insumo</li>
						</ol>
					</nav>
				</div>

          <div class="container" style="width: 100%;">
					<div class="content-form col-md-12">


<form action="R_Compra.php" method="post">


    <div class="form-group">
    <label for="campo" class="lbl-campo">PRECIO UNIDAD: <span style="color:red;"> *</span></label>
    <input type="text" class="form-control" id="campo" name="Precio_Unidad" placeholder="Ingrese el Precio" >
    </div>
 
  <div class="form-group">
    <label for="campo" class="lbl-campo">FECHA COMPRA: </label>
    <input type="date" class="form-control" id="campo" name="Fecha_Compra" >
  </div>

 <div class="form-group">
    <label for="campo" class="lbl-campo">TOTAL: </label>
    <input type="number" class="form-control" id="campo" name="Total" >
  </div>

  <div class="form-group">
    <label for="campo" class="lbl-campo">EMPRESA: <span style="color:red;"> *</span></label>
    <select id="campo" class="form-control" name="Nit_Empresa" >
    <option selected>Seleccionar</option>
			<?php 
				foreach ($Empresa->Listar() as $r):?>
        <option value="<?php echo $r->__GET('Nit_Empresa'); ?>">
        <?php echo $r->__GET('Nombre'); ?></option>
        <?php endforeach; ?>
    </select> 
    
  </div>


    <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right" type="button"  style="float: right; margin-right:3%; margin-top:2%;" value="Registrar" name ="Registrar">

</form>
</div>
</div>
</div>


        <?php

if (isset($_POST['Registrar'])) {
  if (!empty($_POST['Precio_Unidad'])  && !empty($_POST['Fecha_Compra']) && !empty($_POST['Nit_Empresa']) ) {
    
    $Compra->__SET('Precio_Unidad',$_POST['Precio_Unidad']);
    $Compra->__SET('Fecha_Compra',$_POST['Fecha_Compra']);
    $Compra->__SET('Nit_Empresa',$_POST['Nit_Empresa']);
    $Compra->__SET('Total',$_POST['Total']);
    $Compra->__SET('Id_Compra',$_POST['Id_Compra']);



if($ControlCompra->Insertar($Compra)){

  echo 'Datos ingresados con exito.';
 }

}else{

  echo 'Debe llenar todos los campos.';

}

}else{

echo 'Debe llenar el formulario.';

}
       
?>
<br>
<br>
<br>
		</main>

	</body>

</html>

