<?php
 session_start();
 if (isset($_SESSION['usuario'])) {
      if ($_SESSION['usuario']['Id_Rol'] == 1) {
        echo "<script>window.location.href='../user/C_clientes.php'</script>";
      }else{
        echo "<script>window.location.href='../Pedidos/view/Catalogo.php'</script>";
      }
 }
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
            <div class="content-login">
                <img id="logo" src="../../public/img/logo.png">
                <h1 id="login_t">Inicia Sesión</h1>
                <h4 id="login_r">¿No tienes cuenta?<a href="registrar_login.php">Regístrate</a></h4>
                <form >
                    <label for="email" class="lbl-email">Email</label>
                    <input type="email" class="user" id="email" name="email" autocomplete="off">

                    <label for="clave" class="lbl-clave">Contraseña</label>
                    <input type="password" class="password" id="clave" name="pwd" autocomplete="off">

                    <div style="margin-top:40px;" id="recordar">
                        <label> Recordar Contraseña</label>
                        <label class="label" id="recordar">
                            <input class="label__checkbox" type="checkbox" />
                            <span class="label__text">
                                <span class="label__check">
                                    &#x2714;
                                </span>
                            </span>
                        </label>

                    </div>
                    <div style="margin-bottom:10%;">

                        <button type="button" name="iniciar" id="btn-login">Iniciar sesión</button>
                        <br>
                        <a href="recover_password.php" id="recuperar">¿Olvidaste tu contraseña?</a>
                    </div>
                    <br>

                </form>

            </div>
        </div>
    </main>

    <script src="../../public/js/jquery-3.2.1.js"></script>
    <script src="https://.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="../../public/js/animaciones.js"></script>
    <script src="../../public/js/bootstrap.js"></script>
    <script src="../../public/js/superplaceholder.min.js"></script>
    <script src="../../public/js/script2.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   

    <script type="text/javascript" src="../../public/librerias/notify/sweetalert.min.js"></script>
    <meta http-equivale="refresh" content="0;url=login.php">
  <script>
  $(document).ready(function(){
  $("#btn-login").click(function(){
    var email = $("#email").val();
    var password = $("#clave").val();
    var parametros = {"action":"ajax","option":'1',"email":email,"password":password};
   $.ajax({
       url:'../../controller/ValidarLogin.php',
       type:  'post',
       data: parametros,
       beforeSend: function(objeto) {
         $('#btn-login').text("Validando...");
         },
       success: function(data){ 
       var respuesta = parseInt(data);
       switch (respuesta) {
           case -1:
                swal("Lo sentimos", "Tu cuenta esta inactiva ", "error");
                $('#clave').val("");
               break;
               case 0:
                swal("Lo sentimos", "Tu correo o contraseña son incorrectas ", "error");
                $('#clave').val("");
               break;
               case 1 :
               window.location.href = "../user/C_clientes.php";
               break;
               case 2 :
               window.location.href = "../Pedidos/view/Catalogo.php";
               break;
       
           default:
           swal("Upss", "Tenemos Problemas,intenta mas tarde ", "error");
               break;
       }
       $('#btn-login').text("Iniciar sesión");
       } ,
       error: function(){
           console.log("Ha ocurrido un error! :(");
       }
   });
  });
});
  </script>



</body>

</html>
