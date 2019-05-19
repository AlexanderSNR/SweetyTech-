<?php 
include_once '../../controller/Empresa_Controller.php';
require_once '../../model/Empresa_model.php';
require_once '../../helps/helps.php';
$control = new Empresacontroller ();
?>
<!DOCTYPE html>
<html lang="en">
	<?php   require_once '../util/head.php';  ?>
	<body>
		<?php include ("../util/menu.php"); ?>
		<main>
		<?php include ("../util/logo.php"); ?>
			<!-- breadcrumbs -->
			<div class="row col-md-12" id="migas">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
						<li class="breadcrumb-item text-light" id="titulos"><a>Consultar</a></li>
						<li class="breadcrumb-item text-light" id="titulos"><a>Empresa</a></li>

					</ol>
				</nav>
			</div>
			<!-- / breadcrumbs -->
			<div class="table-responsive" >

				<table>
					<thead class="thead-dark">
						<tr>
							<th>Nit Empresa </th>
							<th>Nombre </th>							
							<th>Telefono</th>
							<th>Direccion </th>													
							<th>Editar</th>
							

						</tr>
					</thead>
					<tbody>
					<tr>
							<?php foreach ($control->listar() as $f):?>
							<td><?php echo $f->Nit_Empresa; ?> </td>
							<td><?php echo $f->Nombre ?> </td>										
							<td><?php echo $f->Telefono; ?> </td>
							<td><?php echo $f->Direccion; ?> </td>
							
							<td><a href="E_Empresa.php?Nit_Empresa=<?php echo $f->Nit_Empresa;?>" class="btn btn-primary">Editar</a></td>
							
						</tr>
					</tbody>

					<?php endforeach; ?>
					
				</table>
				<?php include ("../util/footer.php"); ?>
			</div>

		</main>



	</body>

</html>
