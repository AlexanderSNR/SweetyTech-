<?php
require_once '../../controller/user_controller.php';
require_once '../../model/user_model.php';
require_once '../../helps/helps.php';
$control = new User_controller();
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
            <div class="content-login  col-sm-7 col-md-7 col-xs-8 col-md-5 ">
                <img src="../../public/img/logo.png">
                <h1>Recuperar Cuenta</h1>
                <br>
                <p style="margin-top:10%;">Ingresa el codigo que hemos enviado a tu correo para restablecer tu contraseña</p>
                <form action="#" method="POST">
                    <label for="email" class="lbl-email">Codigo</label>
                    <input type="text" class="user" id="email" name="code" autocomplete="off">
                    

                    <div style="margin-bottom:10%;">

                        <button type="submit" name="iniciar" id="btn-login">Recuperar</button>
                        <br>
                        <a href="#" id="recuperar">¿Olvidaste tu contraseña?</a>
                    </div>
                    <br>

                </form>

            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="../../public/js/animaciones.js"></script>
    <script src="../../public/js/bootstrap.js"></script>
    <script src="../../public/js/superplaceholder.min.js"></script>
    <script src="../../public/js/script2.js"></script>
    <script type="text/javascript" src="../../public/librerias/notify/sweetalert.min.js"></script>

    <?php
                   
		if (isset($_POST['iniciar'])) {
            
            $Code=validar_campo($_POST['code']);
			$control->newPassword($Code);
        
        }
		?>

    <meta http-equivale="refresh" content="0;url=login.php">




</body>

</html>
