<?php 
include_once '../../controller/compra_controller.php';
$ControlDetalle = new CompraAsInsumoController();

$resultado=$controlDetalle->ListarDetalle($_GET['Codigo_insumo']);

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
						<li class="breadcrumb-item text-light" id="titulos"><a>Compra</a></li>

					</ol>
				</nav>
			</div>
			<!-- / breadcrumbs -->
         
			<div class="table-responsive" style="margin:0;">

				<table>
					<thead class="thead-dark">
						<tr>
							<th>COMPRA </th>
							<th>INSUMO</th>
							<th>SUBTOTAL</th>
                            <th>CANTIDAD</th>
							

						</tr>
					</thead>
					<tbody>
						<tr>
							<?php foreach ($ControlDetalle->ListarDetalle()() as $fila):?>

							<td><?php echo $fila->Id_Compra; ?> </td>
							<td><?php echo $fila->Nombre_Insumo; ?> </td>
							<td><?php echo $fila->Subtotal; ?> </td>
                            <td><?php echo $fila->Cantidad; ?> </td>


						</tr>
					</tbody>

					<?php endforeach; ?>
               
				</table>

			</div>
		</main>
			</body>
		</html>













