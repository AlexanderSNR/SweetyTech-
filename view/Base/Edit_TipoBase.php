<?php
require_once '../../controller/TipoBase_controller.php';
require_once '../../model/TipoBase_model.php';

$controlTipoBase = new TipoBaseController ();
$TipoBase = new TipoBaseModel();

$resultado=$controlTipoBase->buscar($_GET['Id_Tipo_Base']);

?>
 
<!DOCTYPE html>
<html lang="en">

<html lang="en">
<?php   require_once '../util/head.php';  ?>
<body>
<?php include ("../util/menu.php"); ?>
    <main>
    <?php include ("../util/logo.php"); ?>
    
            <div class="row col-md-12" id="migas">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
                        <li class="breadcrumb-item text-light" id="titulos"><a>Modificar</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Plantilla</li>
                    </ol>
                </nav>
            </div>
            <div class="container" style="width: 100%;">

           <div class="form-group col-md-12">

                       <div class="content-form col-md-12">
                              <form  action=" " method="POST">

                              <label for="campo" class="lbl-campo">Id Tipo Base</label>
                              <input type="text" name="Id_Tipo_Base" class="campos" value="<?php echo $resultado->Id_Tipo_Base;?>" disabled> <br> <br>
                         
                              <label for="campo" class="lbl-campo">Nombre</label>
                              <input type="text" name="Nombre" class="campos" value="<?php echo $resultado->Nombre;?>"> <br> <br>
                        </div>
  
                        <div class="row" style="margin-top:4%;">        
                        <div class="col-md-6">
                            <input class="btn btn-primary nextBtn btn-lg pull-right" name="Actualizar" value="Guardar Cambios" type="submit" style="float: right;" >
                        </div>
                      </div>
                  </div>
                </form>         

<?php

if (isset($_POST['Actualizar'])) {
    if (!empty($_POST['Nombre']) ) {
       
        $TipoBase->__SET('Id_Tipo_Base', $_GET['Id_Tipo_Base']);
        $TipoBase->__SET('Nombre', $_POST['Nombre']);
       

       if($controlTipoBase->actualizar($TipoBase)){

        echo 'Datos Actualizados con exito.';
       }
       ?>
          <META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../ProductoTerminado/R_Ancheta.php">
           <?php  

    }else{

        echo 'Debe llenar todos los campos.';
    
    }
    
}

?>
</body>
</html>