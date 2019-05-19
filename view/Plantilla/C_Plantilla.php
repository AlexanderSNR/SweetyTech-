<?php
include_once "../../controller/plantilla_controller.php";
$control= new PlantillaController();
//$control2= new DetalleController();
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
						<li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Plantilla</li>
					</ol>
				</nav>
			</div>

			<div class="container">
				<div class="stepwizard"> 
				<div id="main-container">
						<table class="table">
							<thead class="thead-dark">
								<tr>
									<th>Codigo Plantilla</th>
									<th>Nombre </th>
									<th>Fecha</th>
									<th>Tipo Plantilla</th>
									<th>Configuracion</th>
								</tr>
							</thead>
							    <tr>

								<?php foreach ($control->Listar() as $dato):?> 
								<td><?php echo $dato->__GET('Codigo_Plantilla'); ?> </td>
								<td><?php echo $dato->__GET('Nombre_plantilla'); ?> </td>
								<td><?php echo $dato->__GET('Fecha_Registro'); ?> </td>
								<td><?php echo $dato->__GET('Id_Tipo_Plantilla'); ?> </td>
									
								<td>
								   <a href="Lista_Insumo.php?id=<?php echo $dato->Codigo_Plantilla; ?>" class="btn btn-primary text-light">Agregar &#128393; </a>
								</td>

								<td>
									<a href="M_plantilla.php?Codigo_Plantilla=<?php echo $dato->Codigo_Plantilla; ?>" class="btn btn-primary text-light">Editar &#128393; </a>
								</td>

							    </tr>
							<?php endforeach; ?>

						</table>
					</div>
				</div>
			 </div>
			<?php include ("../util/footer.php"); ?>

			
		</main>

	</body>
</html>