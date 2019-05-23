<?php

include_once "../../controller/Ancheta_controller.php";
include_once "../../model/Ancheta_Model.php";
//include_once "../../controller/TipoBase_controller.php";
include_once "../../controller/Plantilla_Controller.php";
include_once '../../model/Plantilla_Model.php';
include_once '../../controller/Insumo_controller.php';

//$Base= new TipoBaseController();
$control= new AnchetaController();
$Ancheta= new AnchetaModel();
$Plantilla = new PlantillaController();
$ModelPlantilla = new PlantillaModel();
$ControlInsumo = new InsumoController();
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
		<!--<link href="../../public/librerias/fonts/icon-font.min.css" rel="stylesheet" />-->
        <script src="../../public/librerias/notify/sweetalert.min.js"></script>
		<link  rel="stylesheet" href="../../public/css/responsive.min.css" />
		<link  rel="stylesheet" href="../../public/css/style.min.css" />
    <link id="bootstrap-styleshhet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>-->
    <script src="../../public/js/uploadHBR.min.js"></script>
<script src="../../public/js/modernizr.min.js"></script>
</head> 




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
                                          <input type="range" min="1" max="100" value="50" class="slider" id="myRange" name="Descuento">
                                          <h4><p>Valor del Descuento: <span id="demo"></span>%</p></h4>
                                        </div>

                                         <div class="button" onclick="document.body.classList.add('active')">
                                                            <span class="button-text">Plantilla</span>
                                                        </div>

                                        <!--Prueba de modal de la tabla-->
                                   
                                        <!-- Modal content -->
                                        <br><br><br><br>
                                        <div class="modal-content">
                                             <div class="modal-body" style="margin-right: 250px;">
                                             
                                            
                                            <!-- TABLA --> 
                                           
                                             <table id="tabla" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Codigo Plantilla</th>
                                                            <th>Codigo Insumo</th>
                                                            <th>Cantidad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>  
                                                        
                                                        <tr>
                                                        <?php foreach ($Plantilla->ConsultarDetalle() as $valor):?> 
                                                           
                                                            <td><?php echo $valor->__GET('idPlantilla'); ?> </td>
                                                            <td><?php echo $valor->__GET('idInsumo'); ?> </td>
                                                            <td><?php echo $valor->__GET('Cantidad'); ?> </td>

                                                        </tr>
                                                        <?php endforeach; ?>
                                                    
                                                    </tbody>
                                                
                                                </table>
                                         
                                         <!--AQUI TERMINA LA TABLA -->

                                             </div>
                                        </div>

                                        <style>

                                            /* Modal Content */
                                            .modal-content {
                                        
                                            background-color: #fefefe;
                                            margin: auto;
                                            padding: 0;
                                            border: 1px solid #888;
                                            width: 90%;
                                            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
                                            animation-name: animatetop;
                                            animation-duration: 0.4s
                                            }

                                            /* Add Animation */
                                            @keyframes animatetop {
                                            from {top: -300px; opacity: 0}
                                            to {top: 0; opacity: 1}
                                            }
                                        </style>
                                        <!-- Aquí Finaliza prueba-->
                                       
                                       
                            </div>
                           
                      </div>
                          <div class="col-md-12">
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" style="float: right;" id="Registrar" name="Registrar">Registrar Ancheta</button>
                        </div>
                      
                        <?php
                    if (isset($_POST["Registrar"])){
                        
                       include_once 'upload.php';
                       
                    }
               
                    ?>
                        
                     </form>
                  
                 </div>

              </div>
              
         </div>

         

 <!--Aquí empieza el modal de registrar Plantilla-->
                                       
                                        <div class="wrapper">                                                   
                                        </div>

                                                    <div class="wrapper">
                                                        <div class="popup">
                                                            <div class="popup-inside">
                                                                <div class="backgrounds">
                                                                    <div class="background"></div>
                                                                        <div class="background background2"></div>
                                                                        <div class="background background3"></div>
                                                                        <div class="background background4"></div>
                                                                    <div class="background background5"></div>
                                                                    <div class="background background6"></div>
                                                                </div>
                                                            </div>

                                                            <div class="content">
                                                                <div class="content-wrapper">
                                                                <!--Formulario de Registro de la plantilla -->
                                                                    <h2>Registrar Plantilla</h2>
                                                                
                                                                            <form method="POST">

                                                                                <label for="campo" class="lbl-campo">Fecha de Registro</label>
                                                                                <input type="date" class="campos" name="Fecha" required>

                                                                            </form><br>
                                                                        
                                                                        <div>
                                                                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" style="float: center;" id="btnEnviar" name="btnEnviar">Registrar</button>
                                                                        </div><br>

                                                                        <table id="tabla" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Nombre Insumo</th>
                                                            <th>Stock</th>
                                                            <th>Categoria</th>
                                                            <th>Tamaño</th>
                                                            <th>Opción</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>  
                                                        
                                                        <tr>
                                                        <?php foreach ($ControlInsumo->Listar() as $fila):?>

                                                            <td><?php echo $fila->Nombre_Insumo; ?></td>
                                                            <td><?php echo $fila->StockMinimo; ?> </td>
                                                            <td><?php echo $fila->Nombre_Categoria; ?> </td>
                                                            <td><?php echo $fila->Nombre_Tamano; ?> </td>	
                                                            <td>
                                                               
                                                           </td>

                                                        </tr>
                                                        <?php endforeach; ?>
                                                    
                                                    </tbody>
                                                
                                                </table>
                                         
                                                                     <?php
                                                                        if (isset($_POST["btnEnviar"])){
                                                                         $ModelPlantilla->__SET('Fecha_Registro',$_POST["Fecha"]);
                                                                         $ModelPlantilla->__SET('Id_Tipo_Plantilla','1');
                                                                                            
                                                                                if ($Plantilla->Insertar($ModelPlantilla)){
                                                                                    echo '<script type="text/javascript">
                                                                                     swal({
                                                                                title: "REGISTRO",
                                                                                text: "Realizado con exito!",
                                                                                type: "success",
                                                                                confirmButtonColor: "#DB00DB",
                                                                                confirmButtonText: "OK!"
                                                                            }
                                                                            function(){
                                                                                window.location.href="../Plantilla/Lista_Insumo.php";
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
                                                                                confirmButtonText: "ok!",
                                                                                closeOnConfirm: false
                                                                                });
                                                                                </script>';
                                                                                        }
                                                                        }
                                                                    ?>

                                                                    <footer class="try-again" onclick="document.body.classList.remove('active')">Cerrar</footer>
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>   
                                                    <!-- Estilos del Modal-->
                                                    <style>
                                                                                                        
                                                        h2{
                                                            padding-bottom: 40px;
                                                            text-transform: uppercase;
                                                            letter-spacing: 3px;
                                                            font-size: 16px;
                                                        }

                                                        footer {
                                                            padding-top: 300px;
                                                        }

                                                        .try-again{
                                                            cursor: pointer;
                                                            position: relative;
                                                            font-size: 16px;
                                                        }

                                                        .try-again:after{
                                                            content: '';
                                                            position: absolute;
                                                            left: 15px;
                                                            right: 15px;
                                                            height: 1px;
                                                            top: 100%;
                                                            background: #ebebeb;
                                                            margin-top: 5px;
                                                            transition: all 0.3s ease;
                                                        }

                                                        .wrapper{
                                                            position: absolute;
                                                            left: 0;
                                                            top: 0;
                                                            width: 100%;
                                                            height: 380%;
                                                            display: flex;
                                                            align-items: center;
                                                            justify-content: center;
                                                        }

                                                        .button{
                                                            cursor: pointer;
                                                            position: relative;
                                                            text-transform: uppercase;
                                                            letter-spacing: 2px;
                                                            border-radius: 2px;
                                                            transition: all 0.5s ease;*/
                                                            font-weight: 600;
                                                            font-size: 14px;
                                                            height: 60px;
                                                            width: 110px;
                                                            display: flex;
                                                            align-items: center;
                                                            justify-content: center;
                                                            border: 1px solid rgba(0,0,0,0.06);
                                                            border-radius: 5px;
                                                            box-shadow: 0 0 0 white, 0 0 0 white;
                                                            margin-right: 87%;
                                                            margin-top: 0%;
                                                            background-color: #337ab7;
                                                        }

                                                        .button-text{
                                                            display: inline-block;
                                                            position: relative;
                                                            z-index: 2;
                                                            background: white;
                                                            -webkit-background-clip: text;
                                                            -webkit-text-fill-color: transparent;
                                                        }


                                                        .popup{
                                                            opacity: 0;
                                                            visibility: hidden;
                                                            height: 550px;
                                                            width: 1000px;
                                                            flex-shrink: 0;
                                                            border-radius: 3px;
                                                            position: relative;
                                                            z-index: 3;
                                                            display: flex;
                                                            align-items: center;
                                                           /* justify-content: center;*/
                                                            transition: all 0.2s ease
                                                        }

                                                        .backgrounds{
                                                            position: absolute;
                                                            left: 0;
                                                            top: 0;
                                                            height: 100%;
                                                            width: 100%;
                                                            overflow: hidden;
                                                        }

                                                        .background{
                                                            --offset: 0;
                                                            position: absolute;
                                                            left: var(--offset);
                                                            right: var(--offset);
                                                            bottom: var(--offset);
                                                            top: var(--offset);
                                                            background: linear-gradient(to right, #504bff, #4cfa63);
                                                            transform: scale(0);
                                                            transition: all 0.5s ease 0s;
                                                            border-radius: 50%;
                                                        }

                                                        .background2{
                                                            --offset: 10%;
                                                            position: absolute;
                                                            left: var(--offset);
                                                            right: var(--offset);
                                                            bottom: var(--offset);
                                                            top: var(--offset);
                                                            background: linear-gradient(to right, #6665ff, #69fa7f);
                                                            transform: scale(0);
                                                            transition: all 0.5s ease 0.1s;
                                                        }

                                                        .background3{
                                                            --offset: 20%;
                                                            position: absolute;
                                                            left: var(--offset);
                                                            right: var(--offset);
                                                            bottom: var(--offset);
                                                            top: var(--offset);
                                                            background: linear-gradient(to right, #8583ff, #85fa99);
                                                            z-index: 2;
                                                            transition: all 0.5s ease 0.2s;
                                                        }

                                                        .background4{
                                                            --offset: 30%;
                                                            position: absolute;
                                                            left: var(--offset);
                                                            right: var(--offset);
                                                            bottom: var(--offset);
                                                            top: var(--offset);
                                                            background: linear-gradient(to right, #aaaaff, #a7fab7);
                                                            z-index: 3;
                                                            transition: all 0.5s ease 0.3s;
                                                        }

                                                        .background5{
                                                            --offset: 40%;
                                                            position: absolute;
                                                            left: var(--offset);
                                                            right: var(--offset);
                                                            bottom: var(--offset);
                                                            top: var(--offset);
                                                            background: linear-gradient(to right, #c9c8ff, #c3fad1);
                                                            z-index: 4;
                                                            transition: all 0.5s ease 0.4s;
                                                        }

                                                        .background6{
                                                            --offset: 40%;
                                                            position: absolute;
                                                            left: var(--offset);
                                                            right: var(--offset);
                                                            bottom: var(--offset);
                                                            top: var(--offset);
                                                            background: white;
                                                            z-index: 5;
                                                            transition: all 0.8s ease 0.4s;
                                                        }

                                                        .content{
                                                            --offset: 0;
                                                            position: absolute;
                                                            left: var(--offset);
                                                            right: var(--offset);
                                                            top: var(--offset);
                                                            display: flex;
                                                            align-items: center;
                                                            justify-content: left;
                                                            opacity: 0;
                                                            transition: all 0.35s ease 0.75s;
                                                            z-index: 10;
                                                        }

                                                        .content-wrapper{
                                                            text-align: center;
                                                        }

                                                        body.active .content{
                                                            opacity: 1;
                                                            transform: none;
                                                        }

                                                        body.active .popup{
                                                            opacity: 1;
                                                            visibility: visible;
                                                        }

                                                        body.active .background{
                                                            transform: scale(1);
                                                        }

                                                        body.active .background6{
                                                            transform: scale(8);
                                                        }
                                               </style>      
                                                 <!-- Aquí termina el Modal-->

         
    </main>   

           
</body>

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
       
</html>