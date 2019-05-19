<?php

require_once '../../controller/Tamano_controller.php';
require_once '../../model/Tamano_model.php';

$ControlTamano = new TamanoController ();
$Tamano = new TamanoModel();
 
?>

<a data-toggle="modal" data-target="#Tamano"><span class="lnr lnr-plus-circle icon11"></span> </a> 

<!-- modal tamaño -->
<div class="modal fade" id="Tamano" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          
        <h5 class="modal-title" id="exampleModalLabel">Registrar Tamaño</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        
        <br>
        
       
        
      </div>
      <div class="modal-body">
        <form action="" method="post">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre: </label>
            <input type="text" class="form-control" name="Nombre_Tamano" id="" >
          </div>
          <a class="btn btn-secondary " href="../Tamaño/C_Tamano.php"><span class="lnr lnr-menu"></span> </a><br>

      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary"  value="Registrar" name ="Registrar">
        <input type="reset" class="btn btn-primary" value="Limpiar"> 
        
        <?php

if (isset($_POST['Registrar'])) {
  if (!empty($_POST['Nombre_Tamano'])) {
    
$Tamano->__SET('Nombre_Tamano', $_POST['Nombre_Tamano']);


if($ControlTamano->Insertar($Tamano)){


    echo '<center>Datos ingresados con exito.</center>';
   }

}

}
       
?>

    </form>
    </div>
  </div>
</div>


