<?php

include_once "../../controller/Ancheta_controller.php";
include_once "../../model/Ancheta_Model.php";
include_once "../../controller/TipoBase_controller.php";

$Base= new TipoBaseController();
$control= new AnchetaController();
$Ancheta= new AnchetaModel();
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width , user-scalable= no,initial-scale=1.0,maximum-scale= 1.0,minimum-scale=1.0">
		<title>Dulces Momentos</title>
		<link rel="stylesheet" href="../../public/librerias/icon/style.css">
		<link rel="stylesheet" href="../../public/css/estilos-admin.css">
		<link rel="stylesheet" href="../../public/css/bootstrap.min.css">
		<link href="../../public/librerias/notify/sweetalert.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="../../public/librerias/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link href="../../public/librerias/fonts/icon-font.min.css" rel="stylesheet" />
        <script src="../../public/librerias/notify/sweetalert.min.js"></script>
		<link  rel="stylesheet" href="../../public/css/responsive.min.css" />
		<link  rel="stylesheet" href="../../public/css/style.min.css" />
    <link id="bootstrap-styleshhet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    
</head> 


<script src="../../public/js/uploadHBR.min.js"></script>
<script src="../../public/js/modernizr.min.js"></script>

<body>
      <?php include ("../util/menu.php"); ?>
    <main>
       <?php include ("../util/logo.php"); ?>

        <div class="row" id="cont">
            
            <div class="row col-md-12" id="migas">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
                        <li class="breadcrumb-item text-light" id="titulos"><a>Registrar</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Producto Terminado</li>
                    </ol>
                </nav>
            </div>

          <div class="container">
              <div class="stepwizard">

                <form method="POST" enctype="multipart/form-data">

                    <div class="container" style="width: 100%;">

                             <div class="content-form col-md-12">

                                    <label for="campo" class="lbl-campo">Nombre Ancheta: </label>
                                    <input type="text" class="campos" name="NombreA">

                                    <label for="campo" class="lbl-campo">Descripcion: </label>
                                    <p><textarea name="Descripcion" rows="5" class="campos"></textarea></p>

                                    <label for="campo" class="lbl-campo">Precio Ancheta: </label>
                                    <input type="number" class="campos"  name="Precio">
                                      
                                     
                                        <div>
                                          <div  id="columns">
                                            <h3 class="form-label">Seleccione las imagenes de la ancheta</h3>
                                            <div id="uploads"><!-- Upload Content --></div>
                                          </div>
                                          <div class="clearfix"></div>
                                          <button class="btn btn-primary btn-lg " id="reset" type="button" ><i class="fa fa-history"></i> Limpiar</button>
                                        </div>
                                      
                        
                                        <div class="slidecontainer">
                                          <label for="campo" class="lbl-campo">Descuento: </label>
                                          <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                                          <h4><p>Valor del Descuento: <span id="demo"></span>%</p></h4>
                                        </div>
                                        
                                        <!--Aquí empieza --><button type="button" class="btn btn-primary" 
                                    data-toggle="modal" data-target="#exampleModalCenter"> 
                                    Asociar Plantilla
                                    </button>

                                   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                   <div class="modal-content">
                                    <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalCenterTitle">Plantilla</h5>
                                   
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                    </button>
                                       </div>
                             
                                       <div class="modal-body">
                                       <div class="input-group mb-3">
                                          <input type="text" class="form-control" placeholder="Buscar Nombre Plantilla" aria-label="Buscar Nombre Plantilla" aria-describedby="button-addon2" id="insumo" name="insumo">
                                            <div class="input-group-append" id="datos" name="datos">
                                          <button class="btn btn-outline-secondary" type="button" id="buscar" onclick="busqueda()">Buscar</button>
                                         <br> <div id="resultado">

                                          </div>
                                      </div>
                                 </div>
                                </div>
                          
                                     <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                     <input type="button" class="btn btn-primary" id="Guardar" name="Guardar" value="Guardar" >
                                 </div>
    
                                </div>
                            </div>
                        </div>

                        </div><!-- Aquí termina el Modal-->

                                       
                            </div>
                      </div>
                         
                      <div class="col-md-12">
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" style="float: right;" id="btnEnviar" name="btnEnviar">Registrar Ancheta</button>
                        </div>

                        <?php
                    if (isset($_POST["btnEnviar"])){
                        
                       include_once 'upload.php';
                       
                    }
               
                    ?>
                        <div class="container">
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nombre Insumo</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
           
            
            <tr>
                <td>Zenaida Frank</td>
                <td>Software Engineer</td>
                <td>New York</td>
                <td>63</td>
                <td>2010/01/04</td>
                <td>$125,250</td>
            </tr>
            <tr>
                <td>Zorita Serrano</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>56</td>
                <td>2012/06/01</td>
                <td>$115,000</td>
            </tr>
            <tr>
                <td>Jennifer Acosta</td>
                <td>Junior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>43</td>
                <td>2013/02/01</td>
                <td>$75,650</td>
            </tr>
            <tr>
                <td>Cara Stevens</td>
                <td>Sales Assistant</td>
                <td>New York</td>
                <td>46</td>
                <td>2011/12/06</td>
                <td>$145,600</td>
            </tr>
            <tr>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>47</td>
                <td>2011/03/21</td>
                <td>$356,250</td>
            </tr>
            <tr>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>2009/02/27</td>
                <td>$103,500</td>
            </tr>
           
        </tbody>
       
    </table>
</div>
                  </form>
                  
                </div>
              </div>
         </div>
         
    </main>   
<?php include ("../util/Libscripts.php"); ?>
              
<script>
        $(document).ready(function () { //Este sirve para las fotos
            uploadHBR.init({
                "target": "#uploads",
                "max":3,
                "textNew": "Agregar",
                "textTitle": "Subir foto de la Ancheta" ,
                "textTitleRemove": "remover la imagen"
            });
            $('#reset').click(function () {
                uploadHBR.reset('#uploads');
            });
            $('#tabla').DataTable();
        });
       
</script>
<script>
var slider = document.getElementById("myRange"); // Este sirve para el rango del descuento
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>
<script>// Esta funcion es para el buscar plantilla
function busqueda(){
    var texto = $('#insumo').val();
    var parametros = {
        "texto" : texto
    };
    $.ajax({
    data: parametros, 
    url:"validar.php",
    type: "POST",
    success: function(response){
        console.log(response);
        $("#resultado").html(response);
    }
    
    });
    }
</script>
</body>
</html>