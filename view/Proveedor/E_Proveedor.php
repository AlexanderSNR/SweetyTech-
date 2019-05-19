<?php 

require_once '../../controller/proveedor_controller.php';
require_once '../../model/proveedor_model.php';
require_once '../../model/Persona_model.php';


$control = new Proveedor_controller();
$proveedor = new PersonasModel();
$resultado=$control->buscar($_GET['Id_Persona']);


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
                        <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Proveedor</li>
                    </ol>
                </nav>
            </div>
            <!-- / breadcrumbs -->
            <div class="container" style="width: 100%;">

                <div class="content-form col-md-12">
                    <form action=" " method="post">

                                <input type="text" name="Id_Persona" class="campos"  value="<?php echo $resultado->Id_Persona;?>" required autofocus>
								
                                <label for="campo" class="lbl-campo"> DOCUMENTO IDENTIFICACION </label>
                                <input type="number" name="Documento_Identificacion" class="campos"  value="<?php echo $resultado->Documento_Identificacion;?>" required autofocus>


								<label for="campo" class="lbl-campo"> NOMBRE </label>
								<input type="text" name="Nombre" class="campos"  value="<?php echo $resultado->Nombre;?>" required autofocus>


								<label for="campo" class="lbl-campo"> APELLIDO </label>
								<input type="text" name="Apellido" class="campos" value="<?php echo $resultado->Apellido; ?>" required autofocus>

                                <label for="campo" class="lbl-campo"> DIRECCION </label>
								<input type="text" name="Direccion" class="campos"  value="<?php echo $resultado->Direccion; ?>" required autofocus>


								<label for="campo" class="lbl-campo"> TELEFONO </label>
								<input type="number" name="Telefono" class="campos"  value="<?php echo $resultado->Telefono; ?>" required autofocus>

								<label for="campo" class="lbl-campo"> CELULAR </label>
								<input  type="number" name="Celular" class="campos"  value="<?php echo $resultado->Celular; ?>" required autofocus>
								
                                <label for="campo" class="lbl-campo"> FECHA NACIMIENTO </label>
                                <input type="date" name="Fecha_Nacimiento" class="campos" value="<?php echo $resultado->Fecha_Nacimiento; ?>" required autofocus>

                                <label for="campo" class="lbl-campo"> NIT EMPRESA</label>
								<input type="number" name="Nit_Empresa" class="campos"  value="<?php echo $resultado->Nit_Empresa; ?>" required autofocus>

								


                                <div class="col-md-12">
                                     <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right"  name="enviar" style="float: right; margin-right:3%; margin-top:2%;" value="Guardar Cambios">
                                </div>
                    </form>

                </div>

       
                <?php
        
        if (isset($_POST['enviar'])) {
            if(empty($_POST['Id_Persona']) || empty($_POST['Documento_Identificacion']) || empty($_POST['Nombre']) || empty($_POST['Apellido']) || empty($_POST['Direccion']) || empty($_POST['Telefono']) || empty($_POST['Celular']) || empty($_POST['Fecha_Nacimiento'])  ||  empty($_POST['Nit_Empresa'])){
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

                        $proveedor->__SET('Id_Persona',$_POST['Id_Persona']);
                        $proveedor->__SET('Documento_Identificacion',$_POST['Documento_Identificacion']);
                        $proveedor->__SET('Nombre',$_POST['Nombre']);
                        $proveedor->__SET('Apellido',$_POST['Apellido']);
                        $proveedor->__SET('Direccion',$_POST['Direccion']);		
                        $proveedor->__SET('Telefono',$_POST['Telefono']);
                        $proveedor->__SET('Celular',$_POST['Celular']);
                        $proveedor->__SET('Fecha_Nacimiento',$_POST['Fecha_Nacimiento']);
                        $proveedor->__SET('Nit_Empresa',$_POST['Nit_Empresa']);

                        $control->actualizar($proveedor);
                        
                        
                        echo'<script type="text/javascript">
                        swal({
                            title: "Actualizado",
                            text: "Realizado con exito!",
                            type: "success",
                            confirmButtonColor: "#DB00DB",
                            confirmButtonText: "OK!"
                        },
                        function(){
                            window.location.href="C_Proveedor.php";
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