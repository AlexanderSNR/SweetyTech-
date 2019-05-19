<?php 

require_once '../../controller/Empresa_Controller.php';
require_once '../../model/Empresa_model.php';



$control = new Empresacontroller();
$Empresa = new EmpresaModel();
$resultado=$control->buscar($_GET['Nit_Empresa']);


?>
<!DOCTYPE html>
<html lang="en">

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
                        <li class="breadcrumb-item text-light" id="titulos"><a>Editar</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Empresa</li>
                    </ol>
                </nav>
            </div>
            <!-- / breadcrumbs -->
            <div class="container" style="width: 100%;">

                <div class="content-form col-md-12">
                    <form action=" " method="post">

                    <label for="campo" class="lbl-campo"> NIT EMPRESA</label>
								<input  class="campos" type="number" name="Nit_Empresa"   value="<?php echo $resultado->Nit_Empresa; ?>" required autofocus>


								<label for="campo" class="lbl-campo"> NOMBRE </label>
								<input type="text" name="Nombre"  class="campos" value="<?php echo $resultado->Nombre;?>" required autofocus>

                                
                                <label for="campo" class="lbl-campo"> TELEFONO </label>
								<input type="number" name="Telefono"  class="campos" value="<?php echo $resultado->Telefono; ?>" required autofocus>
                                
                                
                                <label for="campo" class="lbl-campo"> DIRECCION </label>
								<input type="text" name="Direccion"  class="campos"  value="<?php echo $resultado->Direccion; ?>" required autofocus>

                                <div class="col-md-12">
                                     <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right"  name="enviar" style="float: right; margin-right:3%; margin-top:2%;" value="Guardar Cambios">
                                </div>
                    </form>

                </div>

       
                <?php
        
        if (isset($_POST['enviar'])) {
            if(empty($_POST['Nit_Empresa']) || empty($_POST['Nombre']) || empty($_POST['Telefono']) || empty($_POST['Direccion'])){
                echo'<script type="text/javascript">
                swal({
                title: "Error en los campos",
                text: "Por favor llenar todos los campos!",
                type: "warning",
                confirmButtonColor: "#ce3a1e",
                confirmButtonText: "ok!",
                closeOnConfirm: false
                });
                </script>';
                               
                    }else {

                        $Empresa->__SET('Nit_Empresa',$_POST['Nit_Empresa']);                      
                        $Empresa->__SET('Nombre',$_POST['Nombre']);
                        $Empresa->__SET('Telefono',$_POST['Telefono']);
                        $Empresa->__SET('Direccion',$_POST['Direccion']);

                        $control->actualizar($Empresa);
                        
                       
                        echo'<script type="text/javascript">
                        swal({
                            title: "Actualizado",
                            text: "Realizado con exito!",
                            type: "success",
                            confirmButtonColor: "#DB00DB",
                            confirmButtonText: "OK!"
                        },
                        function(){
                            window.location.href="C_Empresa.php";
                        });
                      </script>';                         
                    }

                }
                ?>
                            
                      
       

            </div>
            <?php include ("../util/Libscripts.php"); ?>
            <?php include ("../util/footer.php"); ?>
        </div>
    </main>

</body>

</html> 