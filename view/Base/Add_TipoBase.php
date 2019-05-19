<?php

require_once '../../controller/TipoBase_controller.php';
require_once '../../model/TipoBase_model.php';

$ControlTipoBase = new TipoBaseController ();
$TipoBase = new TipoBaseModel();

?>

<a data-toggle="modal" data-target="#TipoBase"><span class="lnr lnr-plus-circle icon11"></span> </a> 

<!-- modal tipo base -->
<div class="modal fade" id="TipoBase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				
				<h5 class="modal-title" id="exampleModalLabel">Registrar Tipo Base</h5>

				<br>

				<a class="btn btn-primary" href="../Base/list_TipoBase.php">Listar</a><br>

			</div>
			<div class="modal-body">
				<form action="" method="post">

					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Nombre: </label>
						<input type="text" class="form-control" name="Nombre" id="" >
					</div>

					<div class="modal-footer"> 
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<input type="submit" class="btn btn-primary"  value="Registrar" name ="Registrar">
					
						<?php

						if (isset($_POST['Registrar'])) {
							if (!empty($_POST['Nombre'])) {

								$TipoBase->__SET('Nombre', $_POST['Nombre']);


								if($ControlTipoBase->Insertar($TipoBase)){


									echo '<center>Datos ingresados con exito.</center>';
								}

							}

						}
						
					?>
					</div>
				</form>
			</div>
		</div>
	</div>
