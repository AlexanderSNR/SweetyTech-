<?php
include_once "../../controller/plantilla_controller.php";
$control= new PlantillaController();
$Plantilla=new PlantillaModel();

$resultado=$control->Buscar($_GET["Codigo_Plantilla"]);
?>

<!DOCTYPE html>
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

                                    <label for="campo" class="lbl-campo">Codigo Plantilla</label>
                                    <input type="number" id="campo" name="Codigo" value="<?php echo $resultado->Codigo_Plantilla ?>">
                                    
                                    <label for="campo" class="lbl-campo">Fecha de Registro</label>
                                    <input type="date" id="campo"name="Fecha" value="<?php echo $resultado->Fecha_Registro ?>">

                                    <label for="campo" class="lbl-campo">Nombre Plantilla</label>
                                    <input type="text" id="campo" name="Nombre" value="<?php echo $resultado->Nombre_plantilla ?>">
                                   
                                    <div class="row" style="margin-top:4%;">        
                        <div class="col-md-6">
                            <input class="btn btn-primary nextBtn btn-lg pull-right" name="btnEnviar" value="Guardar Cambios" type="submit" style="float: right;" >
                        </div></div>
                  </div>
                </form>         
   
                    <?php
                    if (isset($_POST["btnEnviar"])){
                        $Plantilla->__SET('Codigo_Plantilla',$_POST['Codigo']);
                        $Plantilla->__SET('Fecha_Registro',$_POST['Fecha']);
                        $Plantilla->__SET('Nombre_plantilla',$_POST['Nombre']);

                         if ($control->Modificar($Plantilla)){
                             echo '<script type="text/javascript">
                             swal({
                 title: "ACTUALIZADO",
                 text: "Realizado con exito!",
                 type: "success",
                 confirmButtonColor: "#DB00DB",
                 confirmButtonText: "OK!"
               },
               function(){
                 window.location.href="C_Plantilla.php";
               });
                           </script>';
                           // $resultado=$control->Modificar($Plantilla);
                      ?>
                      <META HTTP-EQUIV="REFRESH" CONTENT="1;URL=C_Plantilla.php">
                      <?php      
                    }
						
                }
                    ?>
             </div>
            </div>
            <?php include ("../util/footer.php"); ?>
    </main>
 </body>
</html>
