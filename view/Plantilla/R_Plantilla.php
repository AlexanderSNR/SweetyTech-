<?php
include_once '../../controller/plantilla_controller.php';
include_once '../../model/Plantilla_Model.php';

$control= new PlantillaController();
$Plantilla = new PlantillaModel();
?>

<!DOCTYPE html>
<html lang="en">
<?php   require_once '../util/head.php';  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width , user-scalable= no,initial-scale=1.0,maximum-scale= 1.0,minimum-scale=1.0">
    <title>Dulces Momentos</title>
</head>
<body>
      <?php include ("../util/menu.php"); ?>
    <main>
    <?php include ("../util/logo.php"); ?>
        <div class="row" id="cont">
            
            <div class="row col-md-12" id="migas">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
                        <li class="breadcrumb-item text-light" id="titulos"><a>Registrar</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Plantilla</li>
                    </ol>
                </nav>
            </div>

            <div class="container">
                <div class="stepwizard">
                    
                </div>
                <form role="form" method="POST">
                    <div class="row setup-content" id="step-1" style="width: 100%;">

                        <div class="form-group col-md-12">

                            <div class="content-form col-md-12">
                                <form method="POST">

                                    <label for="campo" class="lbl-campo">Nombre Plantilla</label>
                                    <input type="text" class="campos" name="Nombre">
                                    <label for="campo" class="lbl-campo" >Fecha de Registro</label>
                                    <input type="date" class="campos" name="Fecha">
                                    <div>
                                        
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" style="float: right;" id="btnEnviar" name="btnEnviar">Registrar Plantilla</button>
                        </div>

                    </div>

                    <?php
                    if (isset($_POST["btnEnviar"])){
                        $Plantilla->__SET('Nombre_plantilla',$_POST['Nombre']);
                        $Plantilla->__SET('Fecha_Registro',$_POST["Fecha"]);
                        $Plantilla->__SET('Id_Tipo_Plantilla','1');
                        
                         if ($control->Insertar($Plantilla)){
                        echo '<script type="text/javascript">
                        swal({
            title: "REGISTRO",
            text: "Realizado con exito!",
            type: "success",
            confirmButtonColor: "#DB00DB",
            confirmButtonText: "OK!"
          },
          function(){
            window.location.href="C_Plantilla.php";
          });
                      </script>';
                    }
                    else {
                     echo '<script type="text/javascript">
              swal({
  title: "ERROR",
  text: "Por favor llenar los Campos!",
  type: "warning",
  confirmButtonColor: "#ce3a1e",
  confirmButtonText: "ok!",
  closeOnConfirm: false
});
            </script>';
                    }
                }
                    ?>
                </form>
            </div>
           
                <?php include ("../util/footer.php"); ?>
           
        </div>
    </main>
</body>
</html>