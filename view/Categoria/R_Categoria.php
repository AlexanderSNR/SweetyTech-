<?php
 
require_once '../../controller/Categoria_controller.php';
require_once '../../model/Categoria_model.php';

$ControlCategoria = new CategoriaController ();
$categoria = new CategoriaModel();

?>  

<a data-toggle="modal" data-target="#Categoria"><span class="lnr lnr-plus-circle icon11"></span> </a> 

<!-- modal tipo base -->
<div class="modal fade" id="Categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          
        <h5 class="modal-title" id="exampleModalLabel">Registrar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
        <span aria-hidden="true">&times;</span>
        </button>  
        
      </div>
      <div class="modal-body">
        <form action="" method="post">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre: </label>
            <input type="text" class="form-control" name="Nombre_Categoria" id="" >
          </div>
          <a class="btn btn-secondary " href="../Categoria/C_Categoria.php"><span class="lnr lnr-menu"></span> </a><br>

      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary"  value="Registrar" name ="Registrar">
        <input type="reset" class="btn btn-primary" value="Limpiar"> 
        
        <?php

if (isset($_POST['Registrar'])) {
  if (!empty($_POST['Nombre_Categoria'])) {
    
$categoria->__SET('Nombre_Categoria', $_POST['Nombre_Categoria']);


if($ControlCategoria->Insertar($categoria)){


    echo '<center>Datos ingresados con exito.</center>';
   }

}

}
       
?>

    </form>
    </div>
  </div>
</div>


