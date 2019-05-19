<?php 

include_once '../../controller/TipoBase_controller.php';
$ControlTipoBase = new TipoBaseController ();
?>

<!DOCTYPE html>
<html lang="en">

<?php   require_once '../util/head.php';  ?>
<body>
  <?php include ("../util/menu.php"); ?>
  <main>
  <?php include ("../util/logo.php"); ?>

    <div class="row col-md-12" id="migas">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
          <li class="breadcrumb-item text-light" id="titulos"><a>Consultar</a></li>
          <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Tipos de Base</li>
        </ol>
      </nav>
    </div>


    <div class="container">
				<div class="stepwizard"> 
				
				<div id="main-container">
						<table class="table">
							<thead class="thead-dark">
								<tr>
                <th>Codigo Tipo Base</th>
                <th>Nombre</th>
                <th>Configuracion</th>
                </tr>
              </thead>

                <tr>
                <?php foreach ($ControlTipoBase->Listar() as $fila):?>

               <td><?php echo $fila->Id_Tipo_Base; ?> </td>
               <td><?php echo $fila->Nombre; ?> </td>
        
               <td>
									<a href="Edit_TipoBase.php?Id_Tipo_Base=<?php echo $fila->Id_Tipo_Base; ?>" class="btn btn-primary text-light"> &#128393; </a>
									<a href="E_TipoBase.php?Id_Tipo_Base=<?php echo $fila->Id_Tipo_Base; ?>" class="btn btn-danger nextBtn btn-lg pull-right"><i class="lnr lnr-trash"></i></a>
								</td>

               </tr>

              <?php endforeach; ?>

              </table>
					</div>
				</div>
			</div>
			<footer style="width:100%; background:#272626; margin-top:5%;">
				<?php include ("util/footer.php"); ?>
			</footer>
		</main>

	</body>
</html>