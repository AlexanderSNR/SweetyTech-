<?php 
require_once '../pedidos/controller/util/validarSesion.php';
require_once '../../controller/user_controller.php';
require_once '../../controller/TipoDocumento_controller.php';
require_once '../../model/user_model.php';
require_once '../../helps/helps.php';
$Usuario = new Usuariomodel();
$Usuario = $_SESSION['usuario'];
$control = new User_controller();
$control2 = new TipoDocumentoController();

?>
<!DOCTYPE html>
<html lang="en">
<?php   require_once ('../util/head.php');  ?>
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
   <div>
    <?php include ("../util/menu.php"); ?>
    <main>
        <?php include ("../util/logo.php"); ?>
        
        <!-- breadcrumbs -->
        <div class="row col-md-12" id="migas">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
                    <li class="breadcrumb-item text-light" id="titulos"><a>Consultar</a></li>
                    <li class="breadcrumb-item text-light" id="titulos"><a></a></li>

                </ol>
            </nav>
        </div>
        <!-- / breadcrumbs -->
       <div class="tabla">
        <table id="example" class=" responsive nowrap table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha Nacimiento</th>
                        <th>Fijo</th>
                        <th>Celular</th>
                        <th>Estado</th>
                        <th>Modificar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($control->ListaDatos() as $r):?>
                         <tr>
                        <td> <?php echo $r->__GET('Documento_Identificacion'); ?> </td>
                        <td> <?php echo $r->__GET('Nombre'); ?> </td>
                        <td> <?php echo $r->__GET('Apellido');?> </td>
                        <td> <?php echo $r->__GET('Fecha_Nacimiento');?> </td>
                        <td> <?php echo $r->__GET('Telefono'); ?> </td>
                        <td> <?php  if ($r->__GET('Celular')== null) { echo "No tiene" ;}else{ echo $r->__GET('Celular');} ?> </td>
                        <td> <?php echo $r->__GET('Estado')== 1 ? 'Activo' : 'Inactivo';?> </td>

                        <td> <a href="estado.php?id=<?php echo $r->Documento_Identificacion; ?>&estado= <?php echo $r->__GET('Estado')?>" class="btn" style="  background: #DB00DB; color:white"><span class="lnr lnr-sync"></span> </a>
                        
                        </td>
                        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
 
            </div>
           
            
            <?php include ("../util/footer.php"); ?>
        

    </main>

    
 <!-- Script para el datatable-->   
<script>
    $(document).ready(function() {
  $('#example').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
        "infoEmpty": "Mostrando 0 to 0 of 0 Clientes",
        "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Clientes",
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
