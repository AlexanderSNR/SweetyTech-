<?php 
include_once '../../controller/TipoEnvoltura_controller.php';
include_once '../../model/TipoEnvoltura_model.php';
$ControlTipoEnvoltura = new TipoEnvolturaController ();
$TipoEnvoltura = new TipoEnvolturaModel();
?>
<!DOCTYPE html>
<html lang="en">
	<?php   require_once '../util/head.php';  ?>
		<!--estilos para la tabla -->
<style>
.tabla{
    width:80%;
    margin:auto; 
}

body{
    overflow-x:hidden;
}
.page-item.active .page-link{
    background-color:#DB00DB;
    border-color:#DB00DB;
}

.page-link {
    color: #DB00DB;
}
.page-link:hover{
    color: #DB00DB;
}
</style>
<!--estilos para la tabla -->
	<body> 
		<?php include ("../util/menu.php"); ?>
		<main>
			<?php include ("../util/logo.php"); ?>

			<!-- breadcrumbs -->
			<div class="row col-md-12" id="migas">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
						<li class="breadcrumb-item text-light" id="titulos"><a>Consultar</a></li>
						<li class="breadcrumb-item text-light" id="titulos"><a>Tipo Envoltura</a></li>

					</ol>
				</nav>
			</div>
			<!-- / breadcrumbs -->
         
			<div class="tabla">
    <table id="example" class=" responsive nowrap table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Cambiar estado</th>
            </tr>
        </thead>
<tbody>	
						
							<?php foreach ($ControlTipoEnvoltura->Listar() as $fila):?>

							<tr>
							<td><?php echo $fila->Nombre_Tipo_Envoltura; ?> </td>
							<td><?php if($fila->Estado == 1){echo "Activo";}else{ echo "Inactivo";}; ?> </td>
							<td><a href="E_TipoEnvoltura.php?Id_Tipo_Envoltura=<?php echo $fila->Id_Tipo_Envoltura;?>" class="btn btn-primary">Editar</a></td>
							 <?php 
							if($fila->__GET('Estado')==1){?>
							<td><a href="Desactivar.php?Id_Tipo_Envoltura=<?php echo $fila->Id_Tipo_Envoltura;?>" class="btn btn-danger"></a></td>
							<?php }else if($fila->__GET('Estado')==0){?>
							<td><a href="Activar.php?Id_Tipo_Envoltura=<?php echo $fila->Id_Tipo_Envoltura;?>" class="btn btn-primary"></a></td>
							<?php }?>

						</tr>

					<?php endforeach; ?>
					</tbody>
        <tfoot>
            <tr>
						<th>Nombre</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Cambiar estado</th>
            </tr>
        </tfoot>
    </table>      

			</div>
		</main>
		<script>
    $(document).ready(function() {
  $('#example').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Envolturas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Envolturas",
        "infoFiltered": "(Filtrado de _MAX_ total Envolturas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Envolturas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
});
    
  });
</script>
</body>
</html>