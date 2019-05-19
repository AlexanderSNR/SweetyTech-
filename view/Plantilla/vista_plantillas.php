
<!DOCTYPE html>
<html lang="en">
        <?php   require_once ('../util/head.php');  ?>
        <body>
            <?php include ("../util/menu.php"); ?>

                <?php include ("../util/logo.php"); ?>
    
    <div id="main-container">
        
        <h2> Anchetas Registradas</h2>
         <div class="table-responsive">


	 <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ANCHETAS</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td>Dia Madre</td>
                    </tr>
                    
                    <tr>
                        <td>Dia Padre</td>
                    </tr>
                    
                    <tr>
                        <td>Amor</td>
                    </tr>
                    
                    <tr>
                        <td>Amistad</td>
                    </tr>
                    
                    <tr>
                        <td>Ancheta Bebe</td>
                    </tr>
                    
                    <tr>
                        <td>Ancheta Dias Especiales</td>
                    </tr>
                    
                    <tr>
                        <td>Amor y Amistad</td>
                    </tr>
                    
                    <tr>
                        <td>Cumpleaños</td>
                    </tr>
                    
                    <tr>
                        <td>Mejor amigo</td>
                    </tr>
                
                </tbody>
            </table>
        </div>
        
   <div class="row">
<div class="col-md-12">
    <a href="#DETALLES" class="btn btn.lg col-md-3" id="editar" data-toggle="modal">DETALLES</a>
          </div>

<div class="modal fade" id="DETALLES">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-tittle">ANCHETA MADRE</h4>
                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <label> NOMBRE  </label>
        <br>
                Ancheta para madres
                
        <br>        
                 <label> INSUMOS </label>
        <br>
                 
        whisky | tamaño : grande | categoria : tragos <br>
        oso | tamaño : pequeño | categoria : peluches <br>
        m y m |tamaño : mediano | categoria : dulces <br>
        mani salado | tamaño : pequeño | categoria : dulces <br>
        jumbo | tamaño : grande | categoria : dulces <br>
        gomitas | tamaño : grande | categoria : dulces <br>
        
        <label> DESCRIPCION </label>
        <br>
        Para una gran ocasión, siempre hay un gran detalle. ven y echa un vistazo a todas las posibilidades que tienes para encontrar el detalle indicado para que esa ocasión sea más que perfecta. 
        
        <div class="modal-footer">
            <button type="button" id="editar" data-dismiss="modal" >CERRAR</button>
            <a href="plantilla.html" id="editar">EDITAR</a>
        </div>
   
            </div>
        </div>
    </div>          
</div>
  
        <?php require_once ("../util/Libscripts.php");?>
        <?php require_once ("../util/footer.php");?>
</body>
        
    </main>

</html>