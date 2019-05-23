<?php 

require_once '../../controller/PedidoAdmin_controller.php';
$control = new PedidosAdmin();
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
.iconos{
width:15px;
height:15px;

}
.btn-primary{
  background-color: #DB00DB;
    border-color: #DB00DB;
    
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
                    <li class="breadcrumb-item text-light" id="titulos"><a>Pedidos</a></li>

                </ol>
            </nav>
        </div>
        <!-- / breadcrumbs -->
       <div class="tabla">
        <table id="example" class=" responsive nowrap table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                        <th> # Pedido </th>
                        <th>Identificación</th>
                        <th>Cliente</th>
                        <th>Dirección envío</th>
                        <th>Fecha Pedido</th>
                        <th>Estado Pedido</th>
                        <th>Tipo de envío</th>
                        <th>Celular</th>
                        <th>Teléfono</th>
                        <th>Recargo</th>
                        <th>Estado</th>
                        <th>ver comprobante</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($control->ListarPedidosClientes() as $r):?>
                         <tr>
                        <td> <?php echo $r['Id_Pedido']; ?> </td>
                        <td> <?php echo $r['Documento_Identificacion']; ?> </td>
                        <td> <?php echo $r['Nombre_Completo']; ?> </td>
                        <td> <?php echo $r['Direccion_Envio'];?> </td>
                        <td> <?php echo $r['Fecha_Pedido'];?></td>
                        <td> <?php echo $r['Estado'];?> </td>
                        <td> <?php echo $r['tipo_envio'];?></td>
                        <td> <?php if ($r['Celular']== null) { echo "No tiene" ;}else{ echo $r['Celular'];} ?> </td>
                        <td> <?php echo $r['Telefono'];?> </td>
                        <td><?php if ($r['Id_Tipo_Envio'] == 1) {
                            if ($r['Aplicar_recargo']!=null) {
                                echo "$".$r['Aplicar_recargo'];
                            }else{
                                ?>
                              <button type="button" class="btn btn-primary recargo" data-toggle="modal" data-target="#Recargo" id="btn-recargo" onclick="<?php echo "GetId(".$r['Id_Pedido'];?>)" required >Agregar </button>
                            <?php
                            }
                            
                        }else{
                            echo "No aplica";
                        } ?></td>
                        <td><center><button type="button" class="btn btn-primary recargo" data-toggle="modal" data-target="#Estados" id="btn-estado" onclick="<?php echo "GetId2(".$r['Id_Pedido'];?>)" required ><img src="../../public/img/actualizar-pagina-opcion.png" alt="" class="iconos" > </button></center></td>
                        <td><a href="../Pedidos/controller/util/reporte.php?id=<?php echo $r['Id_Pedido'];?>&documento=<?php echo $r['Documento_Identificacion'];?>" target="_blank"><button type="button" class="btn btn-primary btn-small " data-toggle="modal"  ><img src="../../public/img/ojo.png" alt="" class="iconos" > </button></a></td>
                        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
      </div>
    </main>
<!-- Modal -->
<div class="modal fade" id="Recargo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Aplicar recargo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form >
           <label for="valorRecargo" class="lbl-campo"> Valor del recargo <span style="color:red;">*</span> </label>
           <input type="hidden" name="idPedido" value="0" id="idPedido">
           <input type="number" name="recargo" id="valorRecargo" class="campos" min="1">
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="Aplicar">Aplicar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="Estados" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <center><h5 class="modal-title" id="exampleModalLongTitle">Cambiar estado </h5></center> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form >
           
           <input type="hidden" name="idPedido" value="0" id="idPedido2">
           <select name="Estado" class="campos" id="estadoId" required>
                            <?php foreach ($control->estadosPedidos() as $r):?>
                            <option value="<?php echo $r['Id_Estado_Pedido'];?>">
                                <?php echo $r['Nombre'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="estado">Actualizar</button>
      </div>
    </div>
  </div>
</div>
    
 <!-- Script para el datatable-->   
<script>
    $(document).ready(function() {
  $('#example').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ pedidos",
        "infoEmpty": "Mostrando 0 to 0 of 0 pedidos",
        "infoFiltered": "(Filtrado de _MAX_ total pedidos)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ pedidos",
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
   $("#Aplicar").click(function(){
        var id = $("#idPedido").val();
        var valor = $("#valorRecargo").val();
        var parametros = {"action":"ajax","option":1,"idPedido":id,"recargo":valor};
   $.ajax({
       url:'../../controller/peticiones_controller.php',
       type:"post",
       data: parametros,
       beforeSend: function(objeto) {
         $('#Aplicar').text("Aplicando...");
         },
       success: function(data){ 
          var respuesta = parseInt(data);
          if (respuesta==1) {

            swal("Genial", "El recargo se aplico correctamente ", "success");
            setTimeout(function () {
              window.location.href = "C_pedidos.php";
            }, 1000);
          }else{
            swal("Lo sentimos", "parace que tenemos problemas ,intenta mas tarde", "error");
          }
       } ,
       error: function(){
           console.log("Ha ocurrido un error! :(");
       }
   });
   });
   $("#estado").click(function(){
        var id = $("#idPedido2").val();
        var idestado = $("#estadoId").val();
        var parametros = {"action":"ajax","option":2,"idPedido2":id,"estado":idestado};
        $.ajax({
       url:'../../controller/peticiones_controller.php',
       type:"post",
       data: parametros,
       beforeSend: function(objeto) {
         $('#estado').text("Actualizando...");
         },
       success: function(data){ 
         console.log(data);
          var respuesta = parseInt(data);
          if (respuesta==1) {

            swal("Genial", "Estado actualizado correctamente ", "success");
            setTimeout(function () {
              window.location.href = "C_pedidos.php";
            }, 1000);
          }else{
            swal("Lo sentimos", "parace que tenemos problemas ,intenta mas tarde", "error");
          }
       } ,
       error: function(){
           console.log("Ha ocurrido un error! :(");
       }
   });
   });
}); 
function GetId(id) {
     $("#idPedido").val(id);
}
function GetId2(id) {
     $("#idPedido2").val(id);
}
</script>
 <!-- Script para el datatable-->   

</body>

</html>
