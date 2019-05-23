<?php
require_once '../../controller/user_controller.php';
require_once '../../controller/TipoDocumento_controller.php';
require_once '../../model/user_model.php';
require_once '../../helps/helps.php';
$control = new User_controller();
$control2 = new TipoDocumentoController();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Dulces Momentos</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="../../public/css/estiloslogin.css">
    <link rel="stylesheet" href="../../public/css/Estilos.css">
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/librerias/icon/style.css">
    <link rel="stylesheet" type="text/css" href="../../public/librerias/notify/sweetalert.css"> 
    




</head>

<body>

    <main>

     
        <div class="contenedor">
            <div class="content-login" style="width:800px;margin-left:16%; padding-left:0">
                <img id="logo" src="../../public/img/logo.png">
                <h1 id="login_t">Registrar</h1>
                 <h4 id="login_r">¿Ya tienes cuenta?<a href="login.php">Inicia Sesión</a></h4>
                <form action="#" method="POST">
                  
                   <label for="campo" class="lbl-Cliente"> TIPO DOCUMENTO<span style="color:red;"> *</span></label>
                    <div class="validate-input" data-validate="Es necesario seleccionar un tipo documento">
                        <select name="Id_Tipo_Documento" class="campos" id="select">
                            <option value="0">Seleccione un tipo de documento</option>
                            <?php foreach ($control2->Listar() as $r):?>
                            <option value="<?php echo $r->__GET('Id_Tipo_Documento'); ?>">
                                <?php echo $r->__GET('Nombre'); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        
                    </div>
                   
                     <div class="validate-input" data-validate="Documento Es necesario o no es un número">
                            <label class="lbl-Cliente"> DOCUMENTO <span style="color:red;"> *</span></label>
                            <input  class="cliente" type="number" name="Documento" id="documento" placeholder="Ingrese Documento">
                     </div>
                     
                       <div class="validate-input" data-validate="El nombre es necesario">
                            <label class="lbl-Cliente"> NOMBRE <span style="color:red;"> *</span></label>
                            <input  class="cliente" type="text"  name="Nombre" placeholder="Ingrese Nombre" id="nombre">
                     </div>
                     
                     <div class="validate-input" data-validate="El apellido es necesario">
                            <label class="lbl-Cliente"> APELLIDO <span style="color:red;"> *</span></label>
                            <input  class="cliente" type="text" name="Apellido"  placeholder="Ingrese Apellido" id="apellido">
                     </div>
                     
                       <div class="validate-input" data-validate="La fecha de nacimiento es necesaria">
                            <label class="lbl-Cliente"> FECHA DE NACIMIENTO <span style="color:red;"> *</span></label>
                            <input  class="cliente"  type="date" name="Fecha_Nacimiento"  placeholder="Ingrese Correo" id="fecha">
                     </div>
                     
                     <div class="validate-input" data-validate="Correo electronico invalido :Ejemplo@laz.com">
                            <label class="lbl-Cliente"> CORREO <span style="color:red;"> *</span></label>
                            <input  class="cliente" type="text" name="email" placeholder="Ingrese Correo" id="correo">
                     </div>
                     
                      <div class="validate-input" data-validate="El Teléfono fijo es necesario">
                            <label class="lbl-Cliente"> FIJO <span style="color:red;"> *</span></label>
                            <input  class="cliente"  type="number" name="Telefono" id="telefono" placeholder="Ingrese Tel">
                     </div>
                     
                     
                       <div class="validate-input" data-validate="El teléfono celular es necesario">
                            <label class="lbl-Cliente"> CELULAR <span style="color:red;"> *</span></label>
                            <input  class="cliente" type="number" name="Celular"  placeholder="Ingrese Cel" id="celular">
                     </div>
                     
                     <div class="validate-input" data-validate="La dirección es necesaria">
                            <label class="lbl-Cliente"> DIRECCION <span style="color:red;"> *</span></label>
                            <input  class="cliente" type="text" name="Direccion"  placeholder="Ingrese Cel" id="direccion">
                     </div>
                     
                     
                         <div class="validate-input" data-validate="La contraseña es necesaria">
                            <label class="lbl-Cliente"> CONTRASEÑA <span style="color:red;"> *</span></label>
                            <input  class="cliente" type="password" name="pwd"  placeholder="Ingrese Contraseña" id="pwd">
                     </div>
                     
                             <div class="validate-input" data-validate="El Genero es necesario">
                            <label class="lbl-Cliente"> Genero <span style="color:red;"> *</span></label>
                            <select name="Genero" class="campos" id="select">
                            <option value="0">Seleccione un tipo de documento</option>
                            <option value="F">Femenino</option>
                            <option value="M">Masculino</option>
                            
                        </select>
                     </div>
                     
                       
                    <div style="margin-bottom:10%;">

                        <button type="submit" name="enviar" id="btn-login" style="margin-left:37%;">Registrar</button>
                    </div>

                </form>

            </div>
        </div>
    </main>

    <script src="../../public/js/jquery-3.2.1.js"></script>
    <script src="https://.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="../../public/js/animaciones.js"></script>
    <script src="../../public/js/bootstrap.js"></script>
 

   

    <script type="text/javascript" src="../../public/librerias/notify/sweetalert.min.js"></script>

    <?php 
                    if (isset($_POST['enviar'])) {
  
                        $id= validar_campo($_POST['Documento']);
                        $nombre= validar_campo($_POST['Nombre']);
                        $apellido= validar_campo($_POST['Apellido']);
                        $genero= validar_campo($_POST['Genero']);
                        $direccion= validar_campo($_POST['Direccion']);
                        $tel= validar_campo($_POST['Telefono']);
                        $cel= validar_campo($_POST['Celular']);
                        $fecha_n= validar_campo($_POST['Fecha_Nacimiento']);
                        $tipo_doc= validar_campo($_POST['Id_Tipo_Documento']);
                        $email= validar_campo($_POST['email']);
                        $pass= validar_campo($_POST['pwd']);
                        
                        
                        $persona = new Usuariomodel($id,$nombre,$apellido,$genero,$direccion,$tel,
	                    $cel,$fecha_n,$tipo_doc,$email,$pass,1,2);

                    $control->insertar($persona);
                             
                          echo "<script>window.location.href='../Pedidos/view/Catalogo.php'</script>";
                         }
                             

            
                    ?>

    <meta http-equivale="refresh" content="0;url=login.php">




</body>

</html>
