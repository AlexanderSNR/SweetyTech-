<?php 
require_once '../../controller/user_controller.php';
require_once '../../controller/TipoDocumento_controller.php';
require_once '../../model/user_model.php';
require_once '../../helps/helps.php';
$control = new User_Controller();
$control2 = new TipoDocumentoController();


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


                        <label for="campo" class="lbl-campo"> TIPO DOCUMENTO<span style="color:red;"> *</span></label>
                    <div class="validate-input" data-validate="Es necesario seleccionar un tipo documento">
                        <select name="Id_Tipo_Documento" class="campos" id="select">
                            <option value="0">Seleccione un tipo de documento</option>
                            <?php foreach ($control2->Listar() as $r):?>
                            <option value="<?php echo $r->__GET('Id_Tipo_Documento'); ?>">
                                <?php echo $r->__GET('Nombre'); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                        <div class="validate-input" data-validate="Documento Es necesario o no es un número">
                            <label for="campo" class="lbl-campo"> DOCUMENTO <span style="color:red;">*</span> </label>
                            <input class="campos" type="number" name="Documento" id="documento" placeholder="Ingrese Documento" >
                        </div>

                        <div class="validate-input" data-validate="El nombre es necesario">
                            <label for="campo" class="lbl-campo"> NOMBRE<span style="color:red;"> *</span> </label>
                            <input class="campos" type="text"  name="Nombre" placeholder="Ingrese Nombre" id="nombre">
                        </div>
                        <div class="validate-input" data-validate="El apellido es necesario">
                            <label for="campo" class="lbl-campo"> APELLIDO<span style="color:red;"> *</span></label>
                            <input   class="campos" type="text" name="Apellido"  placeholder="Ingrese Apellido" id="apellido">
                        </div>
                        <div class="validate-input" data-validate="La fecha de nacimiento es necesaria">
                            <label for="campo" class="lbl-campo">FECHA DE NACIMIENTO<span style="color:red;"> *</span></label>
                            <input   class="campos"  type="date" name="Fecha_Nacimiento"  placeholder="Ingrese Correo" id="fecha">
                        </div>
                        <div class="validate-input" data-validate="Correo electronico invalido :Ejemplo@laz.com">
                            <label for="campo" class="lbl-campo"> CORREO<span style="color:red;"> *</span></label>
                            <input  class="campos"  type="email" name="email" placeholder="Ingrese Correo" id="email">
                        </div>
                        <div class="validate-input" data-validate="El Teléfono fijo es necesario">
                            <label for="campo" class="lbl-campo"> FIJO <span style="color:red;"> *</span></label>
                            <input  class="campos"  type="number" name="Telefono"  placeholder="Ingrese Tel" id="telefono">
                        </div>
                        <div class="validate-input" data-validate="El teléfono celular es necesario">

                            <label for="campo" class="lbl-campo"> CELULAR<span style="color:red;"> *</span> </label>
                            <input  class="campos" type="number" name="Celular"  placeholder="Ingrese Cel" id="celular">
                        </div>

                        <div class="validate-input" data-validate="La dirección es necesaria">
                            <label for="campo" class="lbl-campo"> DIRECCION<span style="color:red;">*</span></label>
                            <input  class="campos" type="text" name="Direccion"  placeholder="Ingrese Cel" id="direccion">
                        </div>

                        <div class="validate-input" data-validate="La contraseña es necesaria">
                            <label for="campo" class="lbl-campo"> CONTRASEÑA<span style="color:red;"> *</span> </label>
                            <input  class="campos" type="password" name="pwd"  placeholder="Ingrese Contraseña" id="pwd">
                        </div>


                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right" name="enviar" style="float: right; margin-right:3%; margin-top:2%;" value="Registrar">
                        </div>

                    </form>

                </div>

            </div>
            <?php include ("../util/Libscripts.php"); ?>
            <?php include ("../util/footer.php"); ?>
        </div>
    </main>

</body>
<script src="../../helps/Validate.js"></script>

</html>
