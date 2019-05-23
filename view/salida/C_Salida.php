<?php 
require_once "../../controller/salida_controller.php";
$control = new  salida_controller();
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once ("../util/head.php");?>
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
	<body>
		<?php require_once ("../util/menu.php"); ?>

		<main>
			<?php require_once ("../util/logo.php"); ?>

        <!-- breadcrumbs -->
        <div class="row col-md-12" id="migas">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
                    <li class="breadcrumb-item text-light" id="titulos"><a>Consultar</a></li>
                    <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Salida</li>
                </ol>
            </nav>
        </div>
        <!-- / breadcrumbs -->

       
            <div class="tabla">

                <table id="example" class=" responsive nowrap table table-striped table-bordered" style="width:100%">
                    <thead class="thead-dark titulos">
                        <tr>
                            <th>Codigo Salida</th>
                            <th>Insumo</th>
                            <th>Cantidad que salio</th>
                            <th>Fecha Salida</th>
                            <th>Configuracion</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
					<?php foreach ($control->listarDatos() as $r):?>
                        <td><?php echo $r->__GET('Codigo_Salida'); ?></td>
                        <td><?php echo $r->__GET('Nombre_Insumo'); ?></td>
                        <td><?php echo $r->__GET('cantidad'); ?></td>
						<td><?php echo $r->__GET('Fecha_Salida'); ?></td>
                        
                        
						<td> <a href="E_Salida.php?Codigo_Salida=<?php echo $r->Codigo_Salida; ?>" 
                        class="btn" style="  background: #DB00DB; color:white" ><i class="lnr lnr-pencil"></i></a>					
                        </td>
					</tr>
					<?php endforeach; ?> 
                    </tbody>
                </table>             
            </div>
          

        </div>
        
            <?php include ("../util/footer.php"); ?>
        

        
  
           
    
            <script>
    $(document).ready(function() {
  $('#example').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ salidas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Clientes",
        "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ salidas",
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
