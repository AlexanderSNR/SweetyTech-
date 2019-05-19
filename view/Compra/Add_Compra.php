<?php 
include_once '../../controller/Compra_as_Insumo_controller.php';
include_once '../../model/Insumo_model.php';

$ControlCompra = new CompraAsInsumoController ();
$Insumo= new InsumoModel(); 

session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<?php   require_once '../util/head.php';  ?>
	<body>
		<?php include ("../util/menu.php"); ?>
		<main>
			<?php include ("../util/logo.php"); ?>



			<!-- breadcrumbs -->
			<div class="row col-md-12" id="migas">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
						<li class="breadcrumb-item text-light" id="titulos"><a>Listado de Insumos</a></li>
						

					</ol>
				</nav>
			</div>
			<!-- / breadcrumbs -->
         
			<div class="table-responsive" style="margin:0;">

				<table>
					<thead class="thead-dark">
						<tr>
                            <th>Codigo</th>
							<th>Nombre</th>
							<th>Stockminimo </th>
                            <th>Precio </th>
							<th>Categoria</th>
							<th>Tamaño</th>
                            <th>Añadir a Venta</th>

						

						</tr>
					</thead>
					<tbody>
						<tr>
							<?php foreach ($ControlCompra->ListarInsumo() as $fila):?>
                            <td><?php echo $fila->Codigo_insumo; ?> </td>						
							<td><?php echo $fila->Nombre_Insumo; ?> </td>
							<td><?php echo $fila->StockMinimo; ?> </td>
                            <td><?php echo $fila->Precio_Entrada; ?> </td>
							<td><?php echo $fila->Nombre_Categoria; ?> </td>
							<td><?php echo $fila->Nombre_Tamano; ?> </td>
                            <td> <form action="../../controller/Añadir_controller.php" method="post">
                            <input type="hidden" name="Codigo_insumo" value="<?php echo $fila->Codigo_insumo; ?>">
                            <input type="hidden" name="Nombre_Insumo" value="<?php echo $fila->Nombre_Insumo; ?>">
                            <input type="hidden" name="StockMinimo" value="<?php echo $fila->StockMinimo; ?>">
                            <input type="hidden" name="Precio_Entrada" value="<?php echo $fila->Precio_Entrada; ?>">
                            <input type="hidden" name="Nombre_Categoria" value="<?php echo $fila->Nombre_Categoria; ?>">
                            <input type="hidden" name="Nombre_Tamano" value="<?php echo $fila->Nombre_Tamano; ?>">
                            <input type="Number" class="form-control" id="campo" name="Cantidad" placeholder="Ingrese la cantidad" require> <br>
                            <input type="submit" name="btnAñadir">
                            </form> </td>	
							

						</tr>
					</tbody>

					<?php endforeach; ?>

<?php 
if (isset($_GET["m"])) {
    $m = $ $_GET["m"];

    switch ($m) {
        case '1':
            echo "El producto no tiene stock";
            break;

            case '2':
            echo "La cantidad debe ser un numero positivo";
            break;
            
        
        default:
         
            break;
    }
}
?>

                    <?php 


                       if (isset($_SESSION["Compra"])) {
                           $Compra = $_SESSION["Compra"];

                         echo"  <table> ";
                          
                           echo"  <tr> ";
                              echo"     <th>Codigo</th>";
                                 echo"  <th>Nombre</th> ";
                                  echo "<th>Stockminimo actual </th> ";
                                 echo " <th>Precio </th> ";
                                  echo " <th>Categoria</th> ";
                                   echo " <th>Tamaño</th> ";
                                   echo " <th>Cantidad</th> ";
                                   echo " <th>Subtotal</th> ";
                                   echo " <th>Eliminar</th> ";
                                
       
                       echo" </tr> ";
                       echo" <tr> ";

                        $total = 0;

                        $i = 0;

                       foreach ($Compra as $fila):
                           
                               echo "<td>$fila->Codigo_insumo</td>";
                               echo "<td>$fila->Nombre_Insumo</td>";
                               echo "<td>$fila->StockMinimo</td>";
                               echo "<td>$fila->Precio_Entrada</td>";
                               echo "<td>$fila->Nombre_Categoria</td>";
                               echo "<td>$fila->Nombre_Tamano</td>";
                               echo "<td>$fila->Cantidad</td>";
                               echo "<td>$$fila->Subtotal</td>";
                               echo "<td>";
                                    echo "<a href='../../controller/Elimiar_C_I_controller.php?in=$i'>Eliminar</a>";
                               echo"</td>";
                               $total += $fila->Subtotal;
                               $i++;
                               echo" </tr> ";

                            endforeach; 
                       }

                                echo"<tr>";
                                     echo"<td colspan='7'>Total:</td>";
                                      echo"<td>$$total</td>";
                                      $_SESSION["total"] = $total;
                                echo"</tr>";

                                echo "<tr>";
                                     echo"<td colspan='9'>";
                                        echo"<form action='../../controller/GenerarCompra_controller.php' method='post'>";
                                            echo"<input type='submit' value='Comprar'>";
                                        echo"</form>";
                                     echo"</td>";
                                echo"</tr>";
                             echo"</table>";
                             echo"<br>";


               
                    ?>

                    

				</table>

              <center>  <a href="List_Compra.php">Listado de ventas</a></center
<br>
			</div>
		</main>
			</body>
		</html>

 