<?php 
include_once '../../controller/Insumo_controller.php';
include_once '../../controller/Plantilla_controller.php';
include_once '../../model/DetallePlantillaInsumo.php';

$ControlInsumo = new InsumoController ();
$ControlPlantilla= new PlantillaController();
$Detalle= new DetalleModel();
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
						<li class="breadcrumb-item text-light" id="titulos"><a>Insumo</a></li>

					</ol>
				</nav>
			</div>

			<!-- / breadcrumbs -->
         
			<div class="table-responsive" style="margin:0;">

				<table>
					<thead class="thead-dark">
						<tr>
							<th>Nombre</th>
							<th>Stock </th>
							<th>Categoria</th>
							<th>Tamaño</th>
							<th>Cantidad</th>
							<th>Opción</th>

						</tr>
					</thead>
					<tbody>
						<tr>
							<?php foreach ($ControlInsumo->Listar() as $fila):?>

							<td><?php echo $fila->Nombre_Insumo; ?></td>
							<td><?php echo $fila->StockMinimo; ?> </td>
							<td><?php echo $fila->id_Categoria; ?> </td>
							<td><?php echo $fila->Id_Tamano; ?> </td>	
							<td><?php echo $fila->Cantidad; ?> </td>	
						
							<td>
							<form action="#" method="post">
							<input type="number" placeholder="Ingrese Cantidad" id="Cantidad" name="Cantidad" style="width: 80;">
							<input type="hidden" class="form-control" name="Insumo" value="<?php echo $fila->__GET('Codigo_insumo'); ?>"> 
							<input type="submit" class="btn btn-primary" name="Agregar"  value="Agregar">
                            </form>
							
							<?php
							 $Detalle=$_GET['id'];
							 $ControlPlantilla->ConsultarDetalle($Detalle);
							?>
							<?php
						  if (isset($_POST['Agregar'])) {
								$Detalle->__SET('Cantidad',$_POST['Cantidad']);
								$Detalle->__SET('idInsumo',$_POST['Insumo']);
							  if($ControlPlantilla->InsertarDetalle($Detalle)){
								echo '<script type="text/javascript">
								swal({
					             title: "Cantidad Agregada",
					             text: "Realizado con exito!",
					             type: "success",
					             confirmButtonColor: "#DB00DB",
					             confirmButtonText: "OK!"
					              })
							         </script>';
							   }
							
							}
							?>	
						</td>
							
						</tr>
						
					</tbody>

					<?php endforeach; ?>

				</table>
				
			</div>
		
		</div>

		<?php require_once ("../util/Libscripts.php"); ?>
			<?php require_once ("../util/footer.php"); ?>
		</main>
		
			</body>
		</html>

	
	

