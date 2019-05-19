
<?php 
include_once '../../controller/compra_controller.php';
$ControlCompra = new CompraController ();

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
							<th>ID COMPRA </th>
							<th>PRECIO UNIDAD</th>
							<th>FECHA COMPRA</th>
                            <th>TOTAL</th>
							<th>NIT EMPRESA</th>
							<th>DETALLE</th>

						</tr>
					</thead>
					<tbody>
						<tr>
							<?php foreach ($ControlCompra->Listar() as $fila):?>

							<td><?php echo $fila->Id_Compra; ?> </td>
							<td><?php echo $fila->Precio_Unidad; ?> </td>
							<td><?php echo $fila->Fecha_Compra; ?> </td>
                            <td><?php echo $fila->Total; ?> </td>
                            <td><?php echo $fila->Nombre; ?> </td>
							<td> <a href="../DetalleCompra/List_Detalle.php?Codigo_insumo=<?php echo $fila->Id_Compra; ?>">Ver Detalle</a> </td>


						</tr>
					</tbody>

					<?php endforeach; ?>
               
				</table>

			</div>
		</main>
			</body>
		</html>