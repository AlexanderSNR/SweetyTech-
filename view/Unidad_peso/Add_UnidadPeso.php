<?php

require_once '../../controller/UnidadPeso_controller.php';
require_once '../../model/UnidadPeso_model.php';

$ControlUnidadPeso = new UnidadPesoController ();
$UnidadPeso = new UnidadPesoModel();

?>


<a data-toggle="modal" data-target="#UnidadPeso"><span class="lnr lnr-plus-circle icon11"></span> </a> 


<!-- modal tipo base -->
<div class="modal fade" id="UnidadPeso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Registrar Unidad Peso</h5>
        
        <br>
        <a class="btn btn-primary" href="list_UnidadPeso.php">Listar</a><br>
        
      </div>
      <div class="modal-body">
        <form action="" method="post">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre: </label>
            <input type="text" class="form-control" name="Nombre" id="" >
          </div>
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary"  value="Registrar" name ="Registrar">
        <input type="reset" class="btn btn-primary" value="Limpiar">  <br>
        
        <?php

if (isset($_POST['Registrar'])) {
  if (!empty($_POST['Nombre'])) {
    
$UnidadPeso->__SET('Nombre', $_POST['Nombre']);


if($ControlUnidadPeso->Insertar($UnidadPeso)){


    echo '<center>Datos ingresados con exito.</center>';
   }

}

}else{

echo 'Debe llenar el formulario.';

}
       
?>

    </form>
    </div>
  </div>
</div>

