<?php
require_once '../../controller/Categoria_controller.php';
require_once '../../model/Categoria_model.php';

$controlCategoria = new CategoriaController ();
$Categoria = new CategoriaModel();

$resultado=$controlCategoria->buscar($_GET['Id_Categoria']);

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
							<li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Categoria</li>
						</ol>
					</nav>
				</div>

<!-- / breadcrumbs -->


		<div class="container" style="width: 100%;">
					<div class="content-form col-md-12">

						<form action="" method="post">
<div class="form-group">
  <label for="">ID CATEGORIA : </label>
<input type="number" class="form-control" name="Id_Categoria" id="campo" value="<?php echo $resultado->Id_Categoria;?>" disabled >
  </div>

<div class="form-group">
  <label for="">NOMBRE CATEGORIA: </label>
  <input type="text" class="form-control" id="campo" name="Nombre_Categoria" value="<?php echo $resultado->Nombre_Categoria;?>"  >
</div>
  

  <input type="submit" class="btn btn-primary" style="float: right; margin-right:3%; margin-top:2%;" value="Actualizar" name ="Actualizar">

</form>
</div>
<?php

if (isset($_POST['Actualizar'])) {
 
       
        $Categoria->__SET('Id_Categoria', $_GET['Id_Categoria']);
        $Categoria->__SET('Nombre_Categoria', $_POST['Nombre_Categoria']);
       

       if($controlCategoria->actualizar($Categoria)){

        echo 'Datos Actualizados con exito.';
       }

    }

?>
</div>
</body>
</html>