<?php 

require_once '../../controller/user_controller.php';
require_once '../../model/user_model.php';
require_once '../../helps/helps.php';
require_once '../../controller/TipoDocumento_controller.php';
$persona = new Usuariomodel();
$control = new User_controller();
$usuario = new Usuariomodel();
$control2 = new TipoDocumentoController();
$resultado=$control->buscar($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<?php include ("../util/head.php"); ?>
<body>
    <?php include ("../util/menu.php"); ?>
    <main>
        <div class="row" id="cont">
            <!-- breadcrumbs -->
            <div class="row col-md-12" id="migas">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
                        <li class="breadcrumb-item text-light" id="titulos"><a>Registrar</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Compra</li>
                    </ol>
                </nav>
            </div>
            <!-- / breadcrumbs -->
            <div class="container" style="width: 100%;">
                <div class="form-group col-md-12">
                    <div class="content-form col-md-12">
                        <form action=" " method="post">
                            <label for="campo" class="lbl-campo"> TIPO DOCUMENTO<span style="color:red;"> *</span></label>
                            <select name="Id_Tipo_Documento">
                                <?php foreach ($control2->Listar() as $r):?>
                                <option value="<?php echo $r->__GET('Id_Tipo_Documento'); ?>">
                                    <?php echo $r->__GET('Nombre'); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="number" name="Id_Persona" class="campos" value="<?php echo $resultado->Documento_Identificacion;?>" required autofocus disabled>
                            <input type="hidden" name="Documento" class="campos" value="<?php echo $resultado->Documento_Identificacion;?>" required autofocus>
                            <label for="campo" class="lbl-campo"> NOMBRE </label>
                            <input type="text" name="Nombre"class="campos" value="<?php echo $resultado->Nombre;?>" required autofocus>
                            <label for="campo" class="lbl-campo"> APELLIDO </label>
                            <input type="text" name="Apellido" class="campos" value="<?php echo $resultado->Apellido; ?>" required autofocus>
                            <input type="hidden" name="Fecha_Nacimiento" class="campos" value="<?php echo $resultado->Fecha_Nacimiento; ?>" required autofocus>
                            <label for="campo" class="lbl-campo"> FIJO </label>
                            <input type="number" name="Telefono" class="campos" value="<?php echo $resultado->Telefono; ?>" required autofocus>
                            
                            <label for="campo" class="lbl-campo"> CELULAR </label>
                            <input  type="number" name="Celular" class="campos" value="<?php echo $resultado->Celular; ?>" required autofocus>
                            <label for="campo" class="lbl-campo"> EMAIL</label>
                            <input  type="email" name="Email" class="campos" value="<?php echo $_SESSION['usu']; ?>" required autofocus>
                            <label for="campo" class="lbl-campo">Contraña</label>
                            <input  type="text" name="pwd" class="campos" value="<?php echo $_SESSION['pwd'];?>" required autofocus>
                            <label for="campo" class="lbl-campo"> Direccion</label>
                            <input  type="text" name="Direccion" class="campos" value="<?php echo $resultado->Direccion; ?>" required autofocus>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right" type="button" name="enviar" style="float: right;">
                            </div>
                        </form>
                    </div>
                    <?php 
						if (isset($_POST['enviar'])) {
                        $id= validar_campo($_POST['Documento']);
                        $nombre= validar_campo($_POST['Nombre']);
                        $apellido= validar_campo($_POST['Apellido']);
                        $direccion= validar_campo($_POST['Direccion']);
                        $tel= validar_campo($_POST['Telefono']);
                        $cel= validar_campo($_POST['Celular']);
                        $fecha_n= validar_campo($_POST['Fecha_Nacimiento']);
                        $tipo_doc= validar_campo($_POST['Id_Tipo_Documento']);
                        $Email= validar_campo($_POST['Email']);
                        $pass= validar_campo($_POST['pwd']);
                        
                            
						$persona = new Usuariomodel(intval($id),$nombre,$apellido,$direccion,$tel,$cel,$fecha_n,$tipo_doc,$Email,$pass);
                      
                         $control->actualizar($persona);
						
						?>
                    <?php 
							}
						 ?>
                </div>
            </div>
            <?php include ("../util/footer.php"); ?>
        </div>
    </main>
</body>
</html>
