<?php 
include_once '../../controller/Insumo_controller.php';
include_once '../../model/Insumo_model.php';

$ControlInsumo = new InsumoController ();
$Insumo= new InsumoModel();
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
						<li class="breadcrumb-item text-light" id="titulos"><a>Insumo</a></li>

					</ol>
				</nav>
			</div>
			<!-- / breadcrumbs -->
         
					<div class="tabla">
    <table id="example" class=" responsive nowrap table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
							<th>Insumo</th>
							<th>Nombre empresa</th>
							<th>Precio Entrada</th>
							<th>Precio Cliente</th> 
							<th>Stockminimo </th>
							<th>Cantidad</th>
							<th>Categoria</th>
							<th>Tamaño</th>
							<th>Envoltura</th>
							<th>Estado</th>
							<th>Imagen</th>
							<th>Editar</th>
							<th>Cambiar Estado</th>
            </tr>
        </thead>
<tbody>
						
							<?php foreach ($ControlInsumo->Listar() as $fila):?>
							<tr>
							<td><?php echo $fila->Nombre_Insumo; ?> </td>
							<td><?php echo $fila->Nombre; ?> </td>
							<td><?php echo $fila->Precio_Entrada; ?> </td>
							<td><?php echo $fila->Precio_Cliente; ?> </td>
							<td><?php echo $fila->StockMinimo; ?> </td>
							<td><?php echo $fila->Cantidad == null ? 0 :$fila->Cantidad ; ?> </td>
							<td><?php echo $fila->Nombre_Categoria; ?> </td>
							<td><?php echo $fila->Nombre_Tamano; ?> </td>	
							<td><?php echo $fila->Nombre_Tipo_Envoltura; ?> </td>
							<td><?php echo $fila->Estado == 0 ? "Inactivo" : "Activo"; ?> </td>
							<td><img src="../../public/img/insumos/<?php echo $fila->Imagen; ?>" alt="<?php echo $fila->Imagen == null ? "No hay imagen" : $fila->Nombre_Insumo;?>" style="width:60px; height:60px;" id="myImg" > </td>
							

							<td><a href="E_Insumo.php?Codigo_insumo=<?php echo $fila->Codigo_insumo;?>" class="btn btn-primary"><span class="lnr lnr-pencil"></span></a></td>
							<?php 
							if($fila->__GET('Estado')==1){?>
							<td><a href="Desactivar.php?Codigo_insumo=<?php echo $fila->Codigo_insumo;?>" class="btn btn-danger" style="  background: #DB00DB; color:white;border-color:#DB00DB;" ><span class="lnr lnr-sync"></span></a></td>
							<?php }else if($fila->__GET('Estado')==0){?>
							<td><a href="Activar.php?Codigo_insumo=<?php echo $fila->Codigo_insumo;?>" class="btn btn-primary" style="  background: #DB00DB; color:white;border-color:#DB00DB;"><span class="lnr lnr-sync"></span></a></td>
							<?php }?>
						</tr>
					<?php endforeach; ?>
					</tbody>
    </table>  

</div>
		</main>
<!-- Script para el datatable-->   
 <script>
    $(document).ready(function() {
  $('#example').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ insumos",
        "infoEmpty": "Mostrando 0 to 0 of 0 insumos",
        "infoFiltered": "(Filtrado de _MAX_ total insumos)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ insumos",
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
<script src="../../public/js/reviewImagen.js"></script>
			</body>
		</html>