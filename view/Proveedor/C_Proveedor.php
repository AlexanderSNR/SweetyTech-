<?php 
include_once '../../controller/proveedor_controller.php';
require_once '../../model/Persona_model.php';
require_once '../../helps/helps.php';
$control = new Proveedor_controller ();
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
						<li class="breadcrumb-item text-light" id="titulos"><a></a>Proveedor</li>

					</ol>
				</nav>
			</div>
			<!-- / breadcrumbs -->
			

					<div class="tabla">
    <table id="example" class=" responsive nowrap table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
							<th>Documento </th>
							<th>Nombre </th>
							<th>Apellido </th>
							<th>Telefono</th>
							<th>Direccion </th>						
							<th>Nit Empresa</th>
							<th>Estado</th>	
							<th>Modificar</th>
            </tr>
        </thead>
<tbody>
                    
					
							<?php foreach ($control->ListarDatos() as $f):?>
							<tr>
							<td><?php echo $f->__GET('Documento_Identificacion'); ?> </td>
							<td><?php echo $f->__GET('Nombre') ?> </td>
							<td><?php echo $f->__GET('Apellido'); ?> </td>			
							<td><?php echo $f->__GET('Telefono'); ?> </td>
							<td><?php echo $f->__GET('Direccion'); ?> </td>
							<td><?php echo $f->__GET('Nit_Empresa'); ?> </td>
							<td><?php echo $f->__GET('Estado')== 1 ? 'Activo' : 'Inactivo'; ?> </td>
							<td><a href="CE_Proveedor.php?Id_Persona=<?php echo $f->Id_Persona;?>&estado= <?php echo $f->__GET('Estado')?>"class="btn" style="  background: #DB00DB; color:white"><span class="lnr lnr-sync"></span> </a>
								<a  href="E_Proveedor.php?Id_Persona=<?php echo $f->Id_Persona;?>" class="btn btn-primary">&#128393;</a>								
							</td>
							
						</tr>
					

					<?php endforeach; ?>
					</tbody>
        <tfoot>
            <tr>
							<th>Documento </th>
							<th>Nombre </th>
							<th>Apellido </th>
							<th>Telefono</th>
							<th>Direccion </th>						
							<th>Nit Empresa</th>
							<th>Estado</th>	
							<th>Modificar</th>
            </tr>
        </tfoot>
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
        "info": "Mostrando _START_ a _END_ de _TOTAL_ proveedor",
        "infoEmpty": "Mostrando 0 to 0 of 0 proveedor",
        "infoFiltered": "(Filtrado de _MAX_ total proveedor)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ proveedor",
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
 <!-- Script para el datatable-->   
  
	</body>

</html>
