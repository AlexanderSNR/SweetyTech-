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

	<?php require_once ("../util/head.php");?>

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

						<form action="" method="post">

<div class="form-group">
  <label for="">Codigo Insumo: </label>
<input type="number" class="form-control" name="Codigo_insumo" id="campo" value="<?php echo $resultado->Codigo_insumo;?>" disabled >
  </div>

<div class="form-group">
  <label for="">Nombre Insumo: </label>
  <input type="text" class="form-control" id="campo" name="Nombre_Insumo" value="<?php echo $resultado->Nombre_Insumo;?>"  >
</div>

<div class="form-group">
  <label for="">Empresa: </label>    
    <select id="campo" class="form-control" name="Nit_Empresa" >
    <option selected><?php echo $resultado->Nombre;?></option>
      <?php          
				foreach ($Empresa->Listar() as $r):?>
        <option value="<?php echo $r->__GET('Nit_Empresa'); ?>">
        <?php echo $r->__GET('Nombre'); ?></option>
        <?php endforeach; ?>
    </select>

    </div>

<div class="form-group">
  <label for="">Precio Entrada: </label>
  <input type="number" class="form-control" id="campo" name="Precio_Entrada" value="<?php echo $resultado->Precio_Entrada;?>" >
</div>

<div class="form-group">
  <label for="">Precio Cliente: </label>
  <input type="number" class="form-control" id="campo" name="Precio_Cliente" value="<?php echo $resultado->Precio_Cliente;?>"  >
</div>

<div class="form-group">
  <label for="">StockMinimo: </label>
  <input type="number" class="form-control" id="campo" name="StockMinimo" value="<?php echo $resultado->StockMinimo;?>"  >
</div>

<div class="form-group">
  <label for="">Cantidad: </label>
  <input type="number" class="form-control" id="campo" name="Cantidad" value="<?php echo $resultado->Cantidad;?>"  >
</div>

<div class="form-group">
  <label for="">Categoria: </label>    
    <select id="campo" class="form-control" name="id_Categoria" >
    <option selected><?php echo $resultado->Nombre_Categoria;?></option>
      <?php          
				foreach ($Categoria->Listar() as $r):?>
        <option value="<?php echo $r->__GET('Id_Categoria'); ?>">
        <?php echo $r->__GET('Nombre_Categoria'); ?></option>
        <?php endforeach; ?>
    </select>

    </div>


<div class="form-group">
  <label for="">Tamaño: </label>
  <select id="campo" class="form-control" name="Id_Tamano">
    <option value="<?php echo $resultado->Nombre_Tamano;?>" selected><?php echo $resultado->Nombre_Tamano;?></option>
    <?php 
				foreach ($Tamano->Listar() as $r):?>
        <option value="<?php echo $r->__GET('Id_Tamano'); ?>">
        <?php echo $r->__GET('Nombre_Tamano'); ?></option>
        <?php endforeach; ?>
    </select></div>

<div class="form-group">
  <label for="">Tipo Envoltura: </label>
  <select id="campo" class="form-control" name="Id_Tipo_Envoltura" >
  <option selected><?php echo $resultado->Nombre_Tipo_Envoltura;?></option>
    <?php 
				foreach ($TipoEnvoltura->Listar() as $r):?>
        <option value="<?php echo $r->__GET('Id_Tipo_Envoltura'); ?>">
        <?php echo $r->__GET('Nombre_Tipo_Envoltura'); ?></option>
        <?php endforeach; ?>
    </select></div>

<div class="form-group">
    <label for="campo" class="lbl-campo"> Imagen: </label>
    <input type="file" class="form-control-file" name="Imagen" value="<?php echo $resultado->Imagen;?>">
 </div>


  <input type="submit" class="btn btn-primary" value="Actualizar" name ="Actualizar">

</form>
</div>
<?php

if (isset($_POST['Actualizar'])) {
       
  $Insumo->__SET('Codigo_insumo', $_GET['Codigo_insumo']);
  $Insumo->__SET('Nit_Empresa',$_POST['Nit_Empresa']);
  $Insumo->__SET('Nombre_Insumo',$_POST['Nombre_Insumo']);
  $Insumo->__SET('Precio_Cliente',$_POST['Precio_Entrada']);
  $Insumo->__SET('Precio_Cliente',$_POST['Precio_Cliente']);		
  $Insumo->__SET('StockMinimo',$_POST['StockMinimo']);
  $Insumo->__SET('Cantidad',$_POST['Cantidad']);
  $Insumo->__SET('id_Categoria',$_POST['id_Categoria']);
  $Insumo->__SET('Id_Tamano',$_POST['Id_Tamano']);
  $Insumo->__SET('Id_Tipo_Envoltura',$_POST['Id_Tipo_Envoltura']);
  $Insumo->__SET('Imagen',$_POST['Imagen']);
      

  
     

     if($controlInsumo->actualizar($Insumo)){

      echo '<script type="text/javascript">
  swal({
title: "ACTUALIZACION",
text: "Realizada con exito!",
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



  }else{


  echo 'Debe llenar el formulario.';

}

?>
</body>
</html>