<?php 
include_once '../../controller/Empresa_controller.php';
$ControlEmpresa = new EmpresaController ();
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
						<li class="breadcrumb-item text-light" id="titulos"><a>Empresa</a></li>

					</ol>
				</nav>
			</div>
			<!-- / breadcrumbs -->
         
			<div class="tabla">
    <table id="example" class=" responsive nowrap table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                        <th>Nit empresa</th>
                        <th>Nombre</th>
                        <th>teléfono</th>
                        <th>Dirección</th>
                        <th>Editar</th> 
            </tr>
        </thead>
<tbody>
						
							<?php foreach ($ControlEmpresa->Listar() as $fila):?>
							<tr>
							<td><?php echo $fila->Nit_Empresa; ?> </td>
							<td><?php echo $fila->Nombre; ?> </td>
							<td><?php echo $fila->Telefono; ?> </td>
							<td><?php echo $fila->Direccion; ?> </td>

							<td><a href="E_Empresa.php?Nit_Empresa=<?php echo $fila->Nit_Empresa;?>" class="btn btn-primary">Editar</a></td>
							
						</tr>
					
					
					<?php endforeach; ?>
					</tbody>
        <tfoot>
            <tr>
            <th>Nit empresa</th>
                        <th>Nombre</th>
                        <th>teléfono</th>
                        <th>Dirección</th>
                        <th>Editar</th> 
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
        "info": "Mostrando _START_ a _END_ de _TOTAL_ empresas",
        "infoEmpty": "Mostrando 0 to 0 of 0 empresas",
        "infoFiltered": "(Filtrado de _MAX_ total empresas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ empresas",
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