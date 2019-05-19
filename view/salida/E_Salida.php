<?php 
require_once '../../controller/Salida_controller.php';
require_once '../../model/Salida_model.php';
$salida = new salida();
$control = new salida_Controller();
$resultado=$control->buscar($_GET['Codigo_Salida']);
?>
<!DOCTYPE html>
<html lang="en">


<?php require_once ("../util/head.php");?>

	<body>
		<?php require_once ("../util/menu.php"); ?>

		<main>
			<?php require_once ("../util/logo.php"); ?>

            <!-- breadcrumbs -->
            <div class="row col-md-12" id="migas">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
                        <li class="breadcrumb-item text-light" id="titulos"><a>Editar</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Salida</li>
                    </ol>
                </nav>
            </div>
            <!-- breadcrumbs -->

            <div class="content-form col-md-10">
                <form method="post" action="#">
                    <label for="campo" class="lbl-campo">Codigo Salida</label>
                    <input type="number" id="campo" name="Codigo_Salida" value="<?php echo $resultado->Codigo_Salida; ?>">
                    <label for="campo" class="lbl-campo">Fecha Salida</label>
                    <input type="date" id="campo" name="Fecha_Salida" value="<?php echo $resultado->Fecha_Salida; ?>">
                    <label for="campo" class="lbl-campo">Motivo Salida</label>
                    <input type="text" id="campo" name="Motivo_Salida" value="<?php echo $resultado->Motivo_Salida; ?>">

                    <div class="row" style="margin-top:4%;">
                        <div class="col-md-6">
                            <input class="btn btn-primary nextBtn btn-lg pull-right" name="enviar" type="submit" value="Actualizar" style="float: right;" >
                        </div>
                    </div>
                </form>
                <?php 
                if (isset($_POST['enviar'])) {
                    $salida->__SET('Codigo_Salida',$_POST['Codigo_Salida']);
                    $salida->__SET('Fecha_Salida',$_POST['Fecha_Salida']);
                    $salida->__SET('Motivo_Salida',$_POST['Motivo_Salida']);
                    if ($control->actualizar($salida)) {
                        echo "datos  actualizados con exito";
                        ?>
                        <meta http-equiv="refresh" content="0; url=C_Salida.php">
                <?php 
                    }
                }else{
                echo "ingrese los datos nuevos y presione el boton enviar";
                } ?>
                
            </div>
            <footer style="width:100%; background:#272626; margin-top:5%;">
                <?php include ("../util/footer.php"); ?>
            </footer>
        </div>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/animaciones.js"></script>
        <script src="js/script.js"></script>
    </body>

</main>

</html>
