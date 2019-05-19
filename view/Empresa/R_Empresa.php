<?php

require_once '../../controller/Empresa_controller.php';
require_once '../../model/Empresa_model.php';

$ControlEmpresa = new EmpresaController();
$Empresa = new EmpresaController();

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


<form action="R_Empresa.php" method="post">


    <div class="form-group">
    <label for="campo" class="lbl-campo">NIT EMPRESA: <span style="color:red;"> *</span></label>
    <input type="text" class="form-control" id="campo" name="Nit_Empresa" placeholder="Ingrese el Nit de la empresa" >
    </div>
 
  <div class="form-group">
    <label for="campo" class="lbl-campo">NOMBRE: <span style="color:red;"> *</span></label>
    <input type="text" class="form-control" id="campo" name="Nombre" placeholder="Ingrese el Nombre de la empresa">
  </div>

    <div class="form-group">
    <label for="campo" class="lbl-campo">TELEFONO: <span style="color:red;"> *</span></label>
    <input type="number" class="form-control" id="campo" name="Telefono" placeholder="Ingrese el telefono de la empresa">
  </div>

    <div class="form-group">
    <label for="campo" class="lbl-campo">DIRECCION: <span style="color:red;"> *</span></label>
    <input type="text" class="form-control" id="campo" name="Direccion" placeholder="Ingrese el direccion de la empresa">
  </div>

    <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right" type="button"  style="float: right; margin-right:3%; margin-top:2%;" value="Registrar" name ="Registrar">
 
  </div>

</form>
</div>
</div>
</div>


        <?php

if (isset($_POST['Registrar'])) {
  if (!empty($_POST['Nit_Empresa'])  && !empty($_POST['Nombre']) && !empty($_POST['Telefono']) && !empty($_POST['Direccion']) ) {
    
    
    $Empresa->__SET('Nombre',$_POST['Nombre']);
    $Empresa->__SET('Telefono',$_POST['Telefono']);
	$Empresa->__SET('Direccion',$_POST['Direccion']);
	$Empresa->__SET('Nit_Empresa',$_POST['Nit_Empresa']);



if($ControlEmpresa->Insertar($Empresa)){

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
