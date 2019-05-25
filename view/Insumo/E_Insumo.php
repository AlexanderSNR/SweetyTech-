<?php
require_once '../../controller/Insumo_controller.php';
require_once '../../controller/Categoria_controller.php';
require_once '../../controller/Tamano_controller.php';
require_once '../../controller/TipoEnvoltura_controller.php';
require_once '../../model/Insumo_model.php';
require_once '../../controller/Empresa_controller.php';

$controlInsumo = new InsumoController ();
$Insumo = new InsumoModel();
$Categoria = new CategoriaController();
$Tamano = new TamanoController();
$TipoEnvoltura = new TipoEnvolturaController();
$Empresa = new EmpresaController();

$resultado=$controlInsumo->buscar($_GET['Codigo_insumo']);

?>
 
 <!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="../../public/css/fileinput.min.css">
	<?php require_once ("../util/head.php");?>

 
  <style>
#imagen_insumo{
  width:80%;
}
.file-preview-image{
  width:234px;
  margin: auto;

}.file-preview-frame{
  margin:auto;
  float:none;
}

</style>
	<body>
		<?php require_once ("../util/menu.php"); ?>
 
		<main>
			<?php require_once ("../util/logo.php"); ?>

			<div class="row" id="cont">

				<!-- breadcrumbs -->
				<div class="row col-md-12" id="migas">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
							<li class="breadcrumb-item text-light" id="titulos"><a>Modificar</a></li>
							<li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Insumo </li>
						</ol>
					</nav>
				</div>
				<!-- / breadcrumbs -->


		<div class="container" style="width: 100%;">
					<div class="content-form col-md-12">

						<form action="" method="post" enctype="multipart/form-data">


  <label for="" class="lbl-campo">Codigo Insumo: </label>
<input type="number" class="campos" name="Codigo_insumo"  value="<?php echo $resultado->Codigo_insumo;?>" disabled >



<label for="campo" class="lbl-campo">Nombre Insumo: <span style="color:red;"> *</span></label>
  <input type="text" class="campos" name="Nombre_Insumo" value="<?php echo $resultado->Nombre_Insumo;?>"  >


  <label for="" class="lbl-campo">Empresa: </label>    
    <select id="campo" class="campos" name="Nit_Proveedor">
    <option   value ="<?php  echo $resultado->Nit_Proveedor;?>" selected><?php echo $resultado->Nombre;?></option>
      <?php          
				foreach ($Empresa->Listar() as $r):?>
        <?php if ($r->__GET('Nit_Empresa') != $resultado->Nit_Proveedor ) {
            ?>
          <option value="<?php echo $r->__GET('Nit_Empresa')  ?>">
        <?php echo $r->__GET('Nombre'); ?></option>
          <?php
        } 
        ?>
        
        <?php endforeach; ?>
    </select>


  <label for="" class="lbl-campo">Precio Entrada: </label>
  <input type="number" class="campos" id="campo" name="Precio_Entrada" value="<?php echo $resultado->Precio_Entrada;?>" >



  <label for="" class="lbl-campo">Precio Cliente: </label>
  <input type="number" class="campos" id="campo" name="Precio_Cliente" value="<?php echo $resultado->Precio_Cliente;?>"  >



  <label for="" class="lbl-campo">StockMinimo: </label>
  <input type="number" class="campos" id="campo" name="StockMinimo" value="<?php echo $resultado->StockMinimo;?>"  >
  
  <label for="" class="lbl-campo">Categoria: </label>    
    <select id="campo" class="campos" name="id_Categoria" >
    <option value="<?php echo $resultado->id_Categoria; ?>" selected><?php echo $resultado->Nombre_Categoria;?></option>
      <?php          
				foreach ($Categoria->Listar() as $r):?>
         <?php if ($r->__GET('Id_Categoria') != $resultado->id_Categoria ) {
            ?>
          <option value="<?php echo $r->__GET('Id_Categoria')  ?>">
        <?php echo $r->__GET('Nombre_Categoria'); ?></option>
          <?php
        } 
        ?>
        <?php endforeach; ?>
    </select>




  <label for="" class="lbl-campo">Tamaño: </label>
  <select id="campo" class="campos" name="Id_Tamano">
    <option value="<?php echo $resultado->Id_Tamano;?>" selected><?php echo $resultado->Nombre_Tamano;?></option>
    <?php          
				foreach ($Tamano->Listar() as $r):?>
         <?php if ($r->__GET('Id_Tamano') != $resultado->Id_Tamano ) {
            ?>
          <option value="<?php echo $r->__GET('Id_Tamano')  ?>">
        <?php echo $r->__GET('Nombre_Tamano'); ?></option>
          <?php
        } 
        ?>

        <?php endforeach; ?>
    </select>


  <label for="" class="lbl-campo">Tipo Envoltura: </label>
  <select id="campo" class="campos" name="Id_Tipo_Envoltura" >
  <option  value ="<?php echo $resultado->Id_Tipo_Envoltura;?>"selected><?php echo $resultado->Nombre_Tipo_Envoltura;?></option>
  <?php          
				foreach ($TipoEnvoltura->Listar() as $r):?>
         <?php if ($r->__GET('Id_Tipo_Envoltura') != $resultado->Id_Tipo_Envoltura ) {
            ?>
          <option value="<?php echo $r->__GET('Id_Tipo_Envoltura')  ?>">
        <?php echo $r->__GET('Nombre_Tipo_Envoltura'); ?></option>
          <?php
        } 
        ?>
        <?php endforeach; ?>
    </select>
    <br>
<div>
<label for="" class="lbl-campo">Foto actual</label>
<img src="../../public/img/insumos/<?php echo $resultado->Imagen;?>" alt="No hay imagen" style="margin-left:35%; width:200px; height: 200px;" >
</div>

                 <div id="imagen_insumo">
                    <label for="campo" class="lbl-campo"> Imagen: </label>
                    <input type="file" name="Imagen" id="archivos" value="../../public/img/insumos/<?php echo $resultado->Imagen;?>" >
                </div>


                <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right" type="button"  style="float: right; margin-right:3%; margin-top:2%;" value="Actualizar" name ="Actualizar">

</form>
</div>
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
<?php

if (isset($_POST['Actualizar'])) {

  if ($_FILES['Imagen']['name']==null){
    $imagen=$resultado->Imagen;
  }else {
    $imagen=$_FILES['Imagen']['name'];
  }
  $destinourl = "../../public/img/insumos/".$_FILES['Imagen']['name'];
  move_uploaded_file($_FILES['Imagen']['tmp_name'],$destinourl); 
  $Insumo->__SET('Codigo_insumo', $_GET['Codigo_insumo']);
  $Insumo->__SET('Nit_Proveedor',$_POST['Nit_Proveedor']);
  $Insumo->__SET('Nombre_Insumo',$_POST['Nombre_Insumo']);
  $Insumo->__SET('Precio_Entrada',$_POST['Precio_Entrada']);
  $Insumo->__SET('Precio_Cliente',$_POST['Precio_Cliente']);		
  $Insumo->__SET('StockMinimo',$_POST['StockMinimo']);
  $Insumo->__SET('id_Categoria',$_POST['id_Categoria']);
  $Insumo->__SET('Id_Tamano',$_POST['Id_Tamano']);
  $Insumo->__SET('Id_Tipo_Envoltura',$_POST['Id_Tipo_Envoltura']);
  $Insumo->__SET('Imagen',$imagen);
 

  if($controlInsumo->actualizar($Insumo)){
    echo '<script>swal ( "Genial!" ,  "Insumo actualizado correctamente!" ,  "success" );</script>';
     
    echo '<script>setTimeout(() => {
      window.location.href="C_insumo.php"
    },2000);</script>';
  }else{
    echo '<script>swal ( "Oops" ,  "Ocurrio un problema !" ,  "error" );</script>';
  }


}

?>

</body>
</html>