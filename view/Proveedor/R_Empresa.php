<?php 
require_once '../../controller/Empresa_controller.php';
require_once '../../model/Empresa_model.php';
require_once '../../helps/helps.php';


$Empresa = new EmpresaModel();
$control = new EmpresaController();
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
                        <li class="breadcrumb-item text-light" id="titulos"><a>Registrar</a></li>
                        
                        <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Empresa</li>
                        
                    </ol>
                </nav>
            </div>
            
            <!-- / breadcrumbs -->
            <div class="container" style="width: 100%;">
                <div class="content-form col-md-12">
                    <form action=" " class="validate-form" method="post" >
          
                       
                        <div  class="validate-input" data-validate="El nit de la empresa es necesario">
                            <label for="campo" class="lbl-campo">  NIT EMPRESA <span style="color:red;">*</span> </label>
                            <input type="number" name="Nit_Empresa"  class="campos" placeholder="Ingrese Documento">
                            
                        </div>

                        <div class="validate-input" data-validate="El nombre es necesario">
                            <label for="campo" class="lbl-campo"> NOMBRE<span style="color:red;"> *</span> </label>
                            <input type="text" name="Nombre"  class="campos" placeholder="Ingrese Nombre" >
                        </div>

                       <div div class="validate-input" data-validate="El telefono es necesario">
                            <label for="campo" class="lbl-campo"> TELEFONO <span style="color:red;"> *</span></label>
                            <input type="number" name="Telefono"  class="campos" placeholder="Ingrese Tel" >
                       </div>

                       <div div class="validate-input" data-validate="La direccion es necesaria">
                            <label for="campo" class="lbl-campo"> DIRECCION<span style="color:red;"> *</span> </label>
                            <input type="text" name="Direccion"  class="campos" placeholder="Ingrese Cel" >
                       </div>

                    <div class="col-md-12">
                            <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right"  name="enviar" style="float: right; margin-right:3%; margin-top:2%;" value="Registrar">
                        </div>

                    </form>

                </div>

       
                <?php
        
        if (isset($_POST['enviar'])) {
            if(empty($_POST['Nit_Empresa']) || empty($_POST['Nombre']) || empty($_POST['Telefono'])  || empty($_POST['Direccion'])){
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
                        
                        $control->insertar($Empresa);
                        /*
                        $nit_empre= validar_campo($_POST['Nit_Empresa']);
                        $nombre= validar_campo($_POST['Nombre']);
                        $tel= validar_campo($_POST['Telefono']);
                        $direccion= validar_campo($_POST['Direccion']);
                                         
                        $Empresa = new EmpresaModel($nit_empre,$nombre,$tel,$direccion);
                        $control->insertar($Empresa);
                        */
                        echo'<script type="text/javascript">
                        swal({
                            title: "REGISTRO",
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
<script src="../../helps/Validate.js"></script>
</html>