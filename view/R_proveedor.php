<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , user-scalable= no,initial-scale=1.0,maximum-scale= 1.0,minimum-scale=1.0">
    <title>Dulces Momentos</title>
    <script src="js/sweetalert.min.js"></script>
    <link href="css/sweetalert.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="icon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>




</head>

<body>
    <header>
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0 ">
            <button type="button" data-toggle="collapse" data-target=".navbar-collapse" id="boton-menu" style="background: #c1128c; border:none;">
                <span class="lnr lnr-menu show"></span>
            </button>


            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a>
                        <span class="lnr lnr-envelope icon-1"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div class="col-md-12 " id="mensajes-nombre">
                                    <strong>Daniela Cano</strong>
                                    <span class="pull-right text-muted">
                                        <em>Justo Ahora</em>
                                    </span>
                                </div>
                                <div class="col-md-12" id="mensajes">Mi pedido se suponia que llegaba hoy y no lo he recibido me pueden dar informacion</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div div class="col-md-12 " id="mensajes-nombre">
                                    <strong>Juan Dias</strong>
                                    <span class="pull-right text-muted">
                                        <em>Hace 2 min</em>
                                    </span>
                                </div>
                                <div class="col-md-12" id="mensajes">Me gustaria saber las opciones de entregar que ofrece dulces momentos</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div div class="col-md-12 " id="mensajes-nombre">
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Hace 1 hora</em>
                                    </span>
                                </div>
                                <div class="col-md-12" id="mensajes">Tengo problemas al realizar mi pedido de ancheta personalizada</div>
                            </a>
                        </li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Todos los Mensajes</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>

                <li class="dropdown">
                    <a>
                        <span class="lnr lnr-alarm icon-1"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>

                            <div class="col-md-12" style="margin-bottom: 4%; margin-top: 2;">NOTIFICACIONES</div>
                            <div class=col-md-12>
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>¡Nuevo Pedido!</strong>Se ha registrado un nuevo pedido
                                </div>
                            </div>
                            <div class=col-md-12>
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>¡Pedido Cancelado!</strong> Hay nuevos pedidos cancelados ver detalles
                                </div>
                            </div>

                            <div class=col-md-12>
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>¡Nuevo Usuario!</strong>Se ha registrado un nuevo usuario
                                </div>
                            </div>
                        </li>


                        <li>
                            <a class="text-center col-md-12 " href="#" style="text-align: center">
                                <strong>Ver Todos</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>

                <!-- /.dropdown -->
                <li class="dropdown">

                    <span class="lnr lnr-user"></span>

                    <ul class="dropdown-menu dropdown-user">
                        <li class="col-md-12"><a href="#">Perfil Usuario</a>
                        </li>
                        <li class="col-md-12"><a href="configuraciones.html">Configuraciones</a>
                        </li>
                        <li class="divider"></li>
                        <li class="col-md-12"><a href="login.html"> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
    </header>
    <main>

        <div class="content-menu">


            <a href="principal.html" style="text-decoration: none;">
                <li><span class="lnr lnr-home icon1"> </span>
                    <h4 class="text1">Principal</h4>
                </li>
            </a>

            <li> <span class="lnr lnr-store icon2"></span>
                <h4 class="text2"> Insumo </h4>
                <ul>
                    <a href="Insumos.html" style="text-decoration: none;">
                        <li>REGISTRAR</li>
                    </a>
                    <a href="productos.html" style="text-decoration: none;">
                        <li>CONSULTAR</li>
                    </a>
                </ul>
            </li>

            <li><span class="lnr lnr-users icon4"></span>
                <h4 class="text4">Clientes</h4>
                <ul>
                    <a href="R_Clientes.html" style="text-decoration: none;">
                        <li>REGISTRAR</li>
                    </a>
                    <a href="confirmaciones.html" style="text-decoration: none;">
                        <li>CONSULTAR</li>
                    </a>
                </ul>
            </li>

            <li><span class="lnr lnr-user icon7"></span>
                <h4 class="text4">Proveedor</h4>
                <ul>
                    <a href="proveedor.html" style="text-decoration: none;">
                        <li>REGISTRAR</li>
                    </a>
                    <a href="provee.html" style="text-decoration: none;">
                        <li>CONSULTAR</li>
                    </a>
                </ul>
            </li>

            <li><span class="lnr lnr-gift icon6"></span>
                <h4 class="text6">Anchetas</h4>
                <ul>
                    <a href="plantilla.html" style="text-decoration: none;">
                        <li>REGISTRAR</li>
                    </a>
                    <a href="vista_plantillas.html" style="text-decoration: none;">
                        <li>CONSULTAR</li>
                    </a>
                </ul>
            </li>

            <li><span class="lnr lnr-cart icon8"></span>
                <h4 class="text8">Pedidos</h4>
                <ul>
                    <a href="R_Pedido.html">
                        <li>REGISTRAR</li>
                    </a>
                    <a href="">
                        <li>CONSULTAR</li>
                    </a>
                </ul>
            </li>

        </div>


        <body>


            <div class="container row">

                <div class="Migas col-md-12">

                    <ol class="breadcrumb" id="migas">
                        <li>
                            <h3> <span class="lnr lnr-user icon9"></span> Registrar Proveedor</h3>
                        </li>

                    </ol>

                </div>

                <div class="col-md-9">

                    <div class="registrar">

                        <form class="form_ins  row">

                            <div class="col-md-6">
                                <label> NOMBRE </label>
                                <br>
                                <input class="input" type="text" name="nombre" placeholder="Ingrese nombre" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <label> APELLIDO </label>
                                <br>
                                <input class="input" type="" name="Apellido" placeholder="Ingrese Apellido" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <label> TELEFONO </label>
                                <br>
                                <input class="input" type="" name="Tel" placeholder="Ingrese Tel" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <label> NIT EMPRESA </label>
                                <br>
                                <input class="input" type="" name="Nit" placeholder="Ingrese NIT" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <label> NOMBRE EMPRESA </label>
                                <br>
                                <input class="input" type="" name="Nombre" placeholder="Ingrese Nombre" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <label> TELEFONO EMPRESA </label>
                                <br>
                                <input class="input" type="" name="Tel" placeholder="Ingrese Tel" required autofocus>
                            </div>
                            <div class="col-md-12">
                                <label> DIRECCION EMPRESA </label>
                                <br>
                                <input class="input" type="" name="Direccion" placeholder="Ingrese Direccion" required autofocus>
                            </div>

                            <div class="col-md-6">
                                <input class="btn_submit col-md-6" type="submit" value="Registrar" onclick="mensaje()">
                            </div>
                            <div class="col-md-6">
                                <input class="btn_reset col-md-6" type="reset" value="limpiar">
                            </div>


                            <script>
                                function mensaje() {
                                    swal({
                                            title: "SEGURO DESEA REGISTRAR EL INSUMO?",
                                            text: "Confirmar el registro del insumo!",
                                            icon: "warning",
                                            buttons: true,
                                            dangerMode: true,
                                        })
                                        .then((willDelete) => {
                                            if (willDelete) {
                                                swal("Se cambio registro correctamente el insumo!", {
                                                    icon: "success",
                                                });
                                            }
                                        });
                                }

                            </script>

                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-default " id="principal-panel">
                        <div class="panel-heading  text-dark ">
                            <h3 id="titulo-notificaciones"><i class="lnr lnr-alarm"></i>NOTIFICACIONES</h3>
                        </div>

                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="lnr lnr-cart"></i> Nuevos Pedidos
                                    <span class="pull-right text-muted small"><em>Hace 3 min</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="lnr lnr-user"></i> Nuevos Clientes
                                    <span class="pull-right text-muted small"><em>Hace 12 min</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="lnr lnr-inbox"></i> Mensajes
                                    <span class="pull-right text-muted small"><em>hace 27 min</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="lnr lnr-cross-circle"></i> Pedido Cancelado
                                    <span class="pull-right text-muted small"><em>hace 50 min</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="lnr lnr-envelope"></i> Comentarios
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                                </a>

                            </div>

                            <a href="#" class="btn btn-default btn-block">Todas las Alertas</a>
                        </div>

                    </div>


                </div>
                <div class="modal fade" id="notificaciones">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark">
                                <h4 class="modal-tittle">NOTIFICACIONES</h4>
                                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <br>
                            <div class="notificaciones col-md-12">
                                <div class="alert alert-success">
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    <a href="R_Pedido.html" style="text-decoration: none;"> <strong>NUEVO PEDIDO!</strong><br>
                                        Se han registrado nuevos pedidos <strong>VER AHORA!</strong></a><br>
                                </div>
                                <div class="alert alert-danger">
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    <a href="productos.html" style="text-decoration: none; "> <strong>INSUMO AGOTANDOSE!</strong><br>
                                        Insumo(Chocolatina Jumbo) esta bajo el stock minimo <strong>VER AHORA!</strong></a><br>
                                </div>
                                <div class="alert alert-secondary">
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    <a href="confirmaciones.html" style="text-decoration: none;"> <strong>NUEVOS USUARIOS!</strong><br>
                                        Nuevos usuarios confirmar registro<strong>VER AHORA!</strong></a><br>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="https://.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
            <script src="js/bootstrap.js"></script>
            <script src="js/search.js"></script>
            <script src="js/script.js"></script>
        </body>

    </main>

</body>

</html>