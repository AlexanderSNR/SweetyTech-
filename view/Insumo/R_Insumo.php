<?php
require_once '../../controller/Insumo_controller.php';
require_once '../../controller/Categoria_controller.php';
require_once '../../controller/Tamano_controller.php';
require_once '../../controller/TipoEnvoltura_controller.php';
require_once '../../model/Insumo_model.php';
require_once '../../controller/Empresa_controller.php';

$ControlInsumo = new InsumoController ();
$Categoria = new CategoriaController();
$Tamano = new TamanoController();
$TipoEnvoltura = new TipoEnvolturaController();
$Insumo = new InsumoModel();
$Empresa = new EmpresaController();
 
?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../../public/css/fileinput.min.css">
<?php include ("../util/head.php"); ?>
<style>
#imagen_insumo{
  width:80%;
}
</style>

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
							<li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Insumo</li>
						</ol>
					</nav>
				</div>

 <div class="container" style="width: 100%;">
		<div class="content-form col-md-12">

          <!----------------------------- Formulario de registro -------------------------->

            <form action="R_Insumo.php" method="post">

                <form action="R_Insumo.php" method="post" enctype="multipart/form-data">

                <div >
                  <label for="campo" class="lbl-campo">Nombre Insumo: <span style="color:red;"> *</span></label>
                  <input type="text" class="campos" id="campo" name="Nombre_Insumo" placeholder="Ingrese el Nombre" >
                </div>

              <!---------------------------------  Select Empresa ---------------------------->
                <div >
                  <label for="campo" class="lbl-campo">Empresa: <span style="color:red;"> *</span></label>
                  <select id="campo" class="campos" name="Nit_Empresa" >
                      <option selected>Seleccionar</option>
                          <?php 
                              foreach ($Empresa->Listar() as $r):?>
                                <option value="<?php echo $r->__GET('Nit_Empresa'); ?>">
                                <?php echo $r->__GET('Nombre'); ?>
                                </option>
                          <?php endforeach; ?>
                  </select>
                </div>

                <div >
                  <label for="campo" class="lbl-campo">Precio Entrada: <span style="color:red;"> *</span></label>
                  <input type="number" class="campos" id="campo" name="Precio_Entrada" >
                </div>

                <div>
                  <label for="campo" class="lbl-campo">Precio Cliente: <span style="color:red;"> *</span></label>
                  <input type="number" class="campos" id="campo" name="Precio_Cliente" >
                </div>

                <div >
                  <label for="campo" class="lbl-campo">Stockminimo: <span style="color:red;"> *</span></label>
                  <input type="number" class="campos" id="campo" name="StockMinimo" >
                </div>

                <div >
                  <label for="campo" class="lbl-campo">Cantidad: <span style="color:red;"> *</span></label>
                  <input type="number" class="campos" id="campo" name="Cantidad" >
                </div>

              <!---------------------------------  Select Categorias ---------------------------->
                <div >
                  <label for="campo" class="lbl-campo">Categoria: <span style="color:red;"> *</span></label>
                  <select id="campo" class="campos" name="id_Categoria" >
                      <option selected>Seleccionar</option>
                        <?php 
                          foreach ($Categoria->Listar() as $r):?>
                              <option value="<?php echo $r->__GET('Id_Categoria'); ?>">
                              <?php echo $r->__GET('Nombre_Categoria'); ?>
                              </option>
                        <?php endforeach; ?>
                  </select> 
                    <br><?php include ("../Categoria/R_Categoria.php"); ?> 
                </div>
                <!---------------------------------  Select Tamaño ---------------------------->
                <div >
                  <label for="campo" class="lbl-campo">Tamaño: <span style="color:red;"> *</span></label>
                  <select id="campo" class="campos" name="Id_Tamano" >
                      <option selected>Seleccionar</option>
                      <?php 
                        foreach ($Tamano->Listar() as $r):?>
                            <option value="<?php echo $r->__GET('Id_Tamano'); ?>">
                            <?php echo $r->__GET('Nombre_Tamano'); ?>
                            </option>
                      <?php endforeach; ?>
                  </select> <br>
                  <?php include ("../Tamaño/R_Tamano.php"); ?> 
                </div>
                <!---------------------------------  Select Tipo Envoltura ---------------------------->
                <div >
                  <label for="campo" class="lbl-campo">Tipo Envoltura: <span style="color:red;"> *</span></label>
                  <select id="campo" class="campos" name="Id_Tipo_Envoltura" >
                      <option selected>Seleccionar</option>
                      <?php 
                          foreach ($TipoEnvoltura->Listar() as $r):?>
                              <option value="<?php echo $r->__GET('Id_Tipo_Envoltura'); ?>">
                              <?php echo $r->__GET('Nombre_Tipo_Envoltura'); ?>
                              </option>
                          <?php endforeach; ?>
                  </select> <br>
                    <?php include ("../Envoltura/R_TipoEnvoltura.php"); ?>
                </div>

                 <div id="imagen_insumo">
                    <label for="campo" class="lbl-campo"> Imagen: </label>
                    <input type="file" name="Imagen" id="archivos" >
                </div>

            <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right" type="button"  style="float: right; margin-right:3%; margin-top:2%;" value="Registrar" name ="Registrar">

            </form>
      </div>
    </div>
</div>


        <?php

if (isset($_POST['Registrar'])) {
  if (!empty($_POST['Nombre_Insumo']) && !empty($_POST['Nit_Empresa'])  && !empty($_POST['Precio_Entrada']) && !empty($_POST['Precio_Cliente']) && 
  !empty($_POST['StockMinimo']) && !empty($_POST['Cantidad']) && !empty($_POST['id_Categoria']) && !empty($_POST['Id_Tamano']) && 
  !empty($_POST['Id_Tipo_Envoltura']) && !empty($_POST['Imagen']) ) {
    
    $destinourl = "ImagenInsumo/".basename($_FILES['Imagen']['name']);
    move_uploaded_file($_FILES['Imagen']['tmp_name'],$destinourl);  

    $Insumo->__SET('Nombre_Insumo',$_POST['Nombre_Insumo']);
    $Insumo->__SET('Nit_Empresa',$_POST['Nit_Empresa']);
    $Insumo->__SET('Precio_Entrada',$_POST['Precio_Entrada']);
    $Insumo->__SET('Precio_Cliente',$_POST['Precio_Cliente']);
    $Insumo->__SET('StockMinimo',$_POST['StockMinimo']);
    $Insumo->__SET('Cantidad',$_POST['Cantidad']);
    $Insumo->__SET('id_Categoria',$_POST['id_Categoria']);
    $Insumo->__SET('Id_Tamano',$_POST['Id_Tamano']);
    $Insumo->__SET('Id_Tipo_Envoltura',$_POST['Id_Tipo_Envoltura']);
    $Insumo->__SET('Imagen',$destinourl);



if($ControlInsumo->Insertar($Insumo)){

  echo '<script type="text/javascript">
  swal({
title: "REGISTRO",
text: "Realizado con exito!",
type: "success",
confirmButtonColor: "#DB00DB",
confirmButtonText: "OK!"
},
function(){
window.location.href="C_Insumo.php";
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
confirmButtonText: "OK!",
closeOnConfirm: false
});
</script>';
}

}

}else{

echo 'Debe llenar el formulario.';

}
       
?>
<script src="../../public/js/fileinput.min.js"></script>
<script>
$("#archivos").fileinput({
  uploadUrl:"upload.php",
  uploadAsync:false,
  minFileCount:1,
  maxFileCount:1,
  showUpload:false,
  showRemove:false
});
</script>
    </body>
</html>
