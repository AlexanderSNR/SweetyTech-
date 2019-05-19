<?php

require_once '../../controller/TipoEnvoltura_controller.php';
require_once '../../model/TipoEnvoltura_model.php';

$ControlTipoEnvoltura = new TipoEnvolturaController ();
$TipoEnvoltura = new TipoEnvolturaModel();
 
?>


<a data-toggle="modal" data-target="#TipoEnvoltura"><span class="lnr lnr-plus-circle icon11"></span> </a> 

<!-- modal tipo Envoltura -->
<div class="modal fade" id="TipoEnvoltura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          
        <h5 class="modal-title" id="exampleModalLabel">Registrar Tipo Envoltura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
        <form action="" method="post">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre: </label>
            <input type="text" class="form-control" name="Nombre_Tipo_Envoltura" id="" >
          </div>
          <a class="btn btn-secondary " href="../Envoltura/C_TipoEnvoltura.php"><span class="lnr lnr-menu"></span> </a><br>

      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary"  value="Registrar" name ="Registrar">
        <input type="reset" class="btn btn-primary" value="Limpiar">  <br>
        
        <?php

if (isset($_POST['Registrar'])) {
  if (!empty($_POST['Nombre_Tipo_Envoltura'])) {
    
$TipoEnvoltura->__SET('Nombre_Tipo_Envoltura', $_POST['Nombre_Tipo_Envoltura']);


if($ControlTipoEnvoltura->Insertar($TipoEnvoltura)){


    echo '<center>Datos ingresados con exito.</center>';
   }

}

}
       
?>

    </form>
    </div>
  </div>
</div>

</body>

</html>