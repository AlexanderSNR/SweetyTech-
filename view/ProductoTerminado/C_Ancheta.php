<?php
include_once "../../controller/Ancheta_controller.php";
$Control= new AnchetaController();
?>

<!DOCTYPE html>
<html lang="en">
	<?php   require_once '../util/head.php';  ?>

	<body>
		<?php include ("../util/menu.php"); ?>
		<main>
		   <?php include ("../util/logo.php"); ?>
		   
			<div class="row col-md-12" id="migas">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
						<li class="breadcrumb-item text-light" id="titulos"><a>Consultar</a></li>
						<li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Producto Terminado</li>
					</ol>
				</nav>
			</div>

			<div class="container">
				<div class="stepwizard"> 
				</div>
				<div id="main-container">
						<table class="table">
							<thead class="thead-dark">
								<tr>
									<th>Codigo Ancheta</th>
									<th>Nombre Ancheta</th>
									<th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Foto 1</th>
									<th>Foto 2</th>
									<th>Foto 3</th>
                                    <th>Tipo de Base</th>
									<th>Insumos</th>
								</tr>
							</thead>
							<tr>

								<?php foreach ($Control->Listar() as $valor):?> 
								<td><?php echo $valor->__GET('CodigoAncheta'); ?> </td>
								<td><?php echo $valor->__GET('Nombre'); ?> </td>
                                <td><?php echo $valor->__GET('Descripcion'); ?> </td>
                                <td><?php echo $valor->__GET('Precio'); ?> </td>
                                <td><img src=" <?php $i = "Imagenes/"; echo $i.$valor->__GET('Foto'); ?>" style="width:100px; height:100px;"/></td>
								<td><img src=" <?php $i = "Imagenes/"; echo $i.$valor->__GET('Foto2'); ?>" style="width:100px; height:100px;"/></td>
								<td><img src=" <?php $i = "Imagenes/"; echo $i.$valor->__GET('Foto3'); ?>" style="width:100px; height:100px;"/></td>
                                <td><?php echo $valor->__GET('TipoBase'); ?> </td>
                                <td></td>

							</tr>
							<?php endforeach; ?>

						</table>
					</div>
				</div>

				<?php include ("../util/footer.php"); ?>

		</main>

	</body>
</html>