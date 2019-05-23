<?php 
require_once '../pedidos/controller/util/validarSesion.php';
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
<html>

<head>
    <title>Dulces Momentos</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- //for-mobile-apps -->
    <link href="../../public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../Pedidos/assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- font-awesome icons -->
    <link href="../Pedidos/assets/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="../../public/js/jquery-3.2.1.min.js"></script>
    <!-- //js -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <link rel="stylesheet" href="perfil.css">


    <!-- start-smoth-scrolling -->
</head>

<body>
    <!-- header -->
    <div class="agileits_header">
        <div class="container">
            <div class="w3l_offers">
                <p>
				<?php if ($Usuario['Genero']=='M') { ?> Bienvenido <?php }else{ ?> Bienvenida <?php } echo $Usuario['Nombre']." ".$Usuario['Apellido'] ?></p>
            </div>
            <div class="agile-login">
                <ul>
                    <li><a href="registered.html">Mi cuenta </a></li>
                    <li><a href="login.html"> Mis pedidos</a></li>
                    <li><a href="contact.html">Ayuda</a></li>
                    <li><a href="contact.html">Cerrar cuenta</a></li>
                </ul>
            </div>
            <div class="product_list_header">
                <form action="#" method="post" class="last">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="display" value="1">
                    <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                    <span id="itemsNumber"></span>
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="logo_products">
        <div class="container">
            <div class="w3ls_logo_products_left1">
            </div>
            <div class="w3ls_logo_products_left">
                <h1><a href="index.html">Dulces Momentos</a></h1>
            </div>


            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //header -->
    <!-- navigation -->
    <div class="navigation-agileits">
        <div class="container">
            <nav class="navbar navbar-default">

                <div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="../pedidos/view/Catalogo.php" class="act">Inicio</a></li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- navigation -->
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s" style="background-color: #f5f5f5;">
                <li><a href="Catalogo.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">/Perfil</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- forma de envio -->
    <HR id="Separador">
    </HR>
    <h2 style=" text-align: center;">Informacion de Usuario</h2><br>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="../../public/img/logo.png" alt="" />

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            <?php echo $resultado->Nombre;?> <?php echo $resultado->Apellido;?>
                        </h5>
                        <h6>
                            Cliente Dulces Momentos
                        </h6>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Acerca de</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Informacion de Compras</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="profile-edit-btn" data-toggle="modal" data-target="#exampleModalCenter">
                        Editar Perfil
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>Herramientas</p>
                       
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nombre</label>
                                </div>
                                <div class="col-md-6">
                                    <p> <?php echo $resultado->Nombre;?> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Apellido</label>
                                </div>
                                <div class="col-md-6">
                                    <p> <?php echo $resultado->Apellido;?> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Telefono</label>
                                </div>
                                <div class="col-md-6">
                                    <p> <?php echo $resultado->Telefono;?> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Celular</label>
                                </div>
                                <div class="col-md-6">
                                    <p> <?php echo $resultado->Celular;?> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Direccion</label>
                                </div>
                                <div class="col-md-6">
                                    <p> <?php echo $resultado->Direccion;?> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Genero</label>
                                </div>
                                <div class="col-md-6">
                                    <p> <?php echo $resultado->Genero== 'M' ? 'Masculino' : 'Femenino';?> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Cambiar Comtraseña</label>
                                </div>
                                <div class="col-md-6">
                                    <a href="CambiarPass.php" type="button" class="profile-edit-btn" data-toggle="modal" data-target="#exampleModalCenter"><p>Editar</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Pedidos Realizados</label>
                                </div>
                                <div class="col-md-6">
                                    <p>12</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar el Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                       <div class="form-group col-md-12">
                    <div class="content-form col-md-12">
                        <form action=" " method="post">
                            <input type="hidden" name="Documento" class="campos" value="<?php echo $resultado->Documento_Identificacion;?>" required autofocus>
                             <input type="hidden" name="Id_Tipo_Documento" class="campos" value="<?php echo $resultado->Id_Tipo_Documento;?>" required autofocus>
                             <input type="hidden" name="Fecha_Nacimiento" class="campos" value="<?php echo $resultado->Fecha_Nacimiento;?>" required autofocus>
                             <input type="hidden" name="Genero" class="campos" value="<?php echo $resultado->Fecha_Nacimiento;?>" required autofocus>
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
                            <input  type="email" name="Email" class="campos" value="<?php echo $resultado->Email; ?>" required autofocus>
                            <input  type="hidden" name="pwd" class="campos" value="<?php echo $resultado->Pass; ?>" required autofocus>
                            <label for="campo" class="lbl-campo"> Direccion</label>
                            <input  type="text" name="Direccion" class="campos" value="<?php echo $resultado->Direccion; ?>" required autofocus>
                            <div class="col-md-12" style="margin-top:5%;">
                                <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right" type="button" name="enviar" value="Cambiar" style="float: right;">
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
                        $email= validar_campo($_POST['Email']);
                        $pass= validar_campo($_POST['pwd']);
                        $genero= validar_campo($_POST['Genero']);
                        
                        
                            
						 $persona = new Usuariomodel($id,$nombre,$apellido,$genero,$direccion,$tel,
	                     $cel,$fecha_n,$tipo_doc,$email,$pass,1,2);
                      
                         $control->actualizar($persona);
						
						?>
                    <?php 
							}
						 ?>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
     <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar el Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                       <div class="form-group col-md-12">
                    <div class="content-form col-md-12">
                        <form action=" " method="post">
                            <label for="campo" class="lbl-campo"> Nueva Contraseña</label>
                            <input  type="Passwordd" name="np" class="campos" placeholder="Ingrese contraseña" required autofocus>
                            <label for="campo" class="lbl-campo"> Confirmar Contraseña</label>
                           <input  type="Passwordd" name="cp" class="campos" placeholder="Ingrese contraseña" required autofocus>
                            <div class="col-md-12" style="margin-top:5%;">
                                <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right" type="button" name="enviar" value="Cambiar" style="float: right;background:#DB00DB;">
                            </div>
                        </form>
                    </div>
                    <?php 
						if (isset($_POST['enviar'])) {
                            if($_POST['np']==$_POST['cp']){
                    
                    $id=$resultado->Id_Persona;
                    $Email=$Usuario['Email'];     
                    $cambio=md5($_POST['np']);
				    $control->nuevaPass($id,$cambio,Email);
    
                    echo'<script type="text/javascript">
              swal({
  title: "REGISTRO",
  text: "Realizado con exito!",
  type: "success",
  confirmButtonColor: "#DB00DB",
  confirmButtonText: "OK!"
},
function(){
  window.location.href="perfil.php";
});
            </script>';
				}else {
echo'<script type="text/javascript">
              swal({
  title: "ERROR",
  text: "Las contraseñas no coinciden",
  type: "darger",
  confirmButtonColor: "red",
  confirmButtonText: "OK!"
},
function(){
  window.location.href="perfil.php?id='.$varsesion.'";
});
            </script>';  
                    
				}
                
			} ?>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- //footer -->
    <div class="footer" style="margin-top: 10%; height:200px; padding: 0em 0 2em;">
        <div class="footer" style="margin-top: 10%; height:200px; padding: 0em 0 2em;">
            <div class="container">
                <div class="footer-copy">
                    <div class="container">
                        <p>© 2018 Dulces Momentos. Todos los derechos reservados</p>
                    </div>
                </div>
            </div>
            <div class="footer-botm">
                <div class="container">
                    <div class="w3layouts-foot">
                        <ul>
                            <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="payment-w3ls">
                        <p style="color: #fff">Teléfono : 30162512371</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../public/js/bootstrap.js"></script>


</body>

</html>
