<?php 
require_once '../../controller/salida_controller.php';
require_once '../../model/salida_model.php';
require_once '../../helps/helps.php';
$salida = new salida();
$control = new salida_Controller();
?>
<!DOCTYPE html>

<html lang="es">

<?php include ("../util/head.php"); ?>

<body>
    <?php include ("../util/menu.php"); ?>
    <main>
        <?php include ("../util/logo.php"); ?>

        <div class="row" id="cont">

            <!-- breadcrumbs -->
            <div class="row col-md-12" id="migas">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
                        <li class="breadcrumb-item text-light" id="titulos"><a>Registrar</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Clientes</li>
                    </ol>
                </nav>
            </div>
            <!-- / breadcrumbs -->
            <div class="container" style="width: 100%;">

                <div class="content-form col-md-12">
                    <form class="validate-form" action=" " method="post">

                        <div class="validate-input" data-validate="La fecha de salida es necesario">
                            <label for="campo" class="lbl-campo">Fecha de salida<span style="color:red;"> *</span> </label>
                            <input type="date" id="campo" name="Fecha_Salida"  class="campos">
                        </div>

                        <div  class="validate-input" data-validate="El motivo es necesario">
                            <label for="campo" class="lbl-campo">Motivo de salida<span style="color:red;"> *</span> </label>
                            <input type="text" id="campo" name="Motivo_Salida" class="campos">
                        </div>
                        <br>
                        <!-- Boton para la ventana modal  -->
                        <button type="button" class="btn  btn-primary nextBtn btn-lg" data-toggle="modal" data-target="#myModal">Cargar Insumos</button>
                        <br>
                        <br>  
                        <table class="m-0" >
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre Producto</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                            <tbody id="tabla">                           
                            </tbody>
                        </table>
                        <br>                                        
                        <div class="col-md-11">
                            <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right col-md-2"  name="Registrar" style="float: right; margin-right:3%; margin-top:2%;" value="Registrar">
                        </div>

                        <!-- Inicio de la ventana modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <!-- Contenido de la ventana-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title title">Insumos</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table>
                                            <tr>
                                                <th>Nombre Producto</th>
                                                <th>Cantidad Almacenada</th>
                                                <th>Cantidad a Salir</th>
                                                <th>Acciones</th>
                                            </tr>
                                            <tbody id="product">                           
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- finalizacion de la ventana modal -->
                    </form>
                    <?php
                            if (isset($_POST['Registrar'])) {
                                if (empty($_POST['Fecha_Salida'])||empty($_POST['Motivo_Salida'])) {
                                    echo'<script type="text/javascript">
                                    swal({
                                    title: "Error en los campos",
                                    text: "Por favor llenar todos los campos!",
                                    type: "warning",
                                    confirmButtonColor: "#ce3a1e",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: false
                                    });
                                    </script>';
                                }else {
                                    $salida->__SET("Fecha_Salida",$_POST["Fecha_Salida"]);
                                    $salida->__SET("Motivo_Salida",$_POST["Motivo_Salida"]);
                                    if ($control->insertar($salida)) {
                                        echo '<script type="text/javascript">
                                        swal({
                                            title: "REGISTRO",
                                            text: "Realizado con exito!",
                                            type: "success",
                                            confirmButtonColor: "#DB00DB",
                                            confirmButtonText: "OK!"
                                        },
                                        function(){
                                            window.location.href="C_Salida.php";
                                        });
                                    </script>';
                                    }
                                }                     
                            }
                        ?>

                </div>

            </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>              
                <script src="../../ajax/salida.js"></script>
                <?php include ("../util/Libscripts.php"); ?>
                <?php include ("../util/footer.php"); ?>
        </div>
    </main>

</body>
<script src="../../helps/Validate.js"></script>

</html>
