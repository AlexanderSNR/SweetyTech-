<?php
session_start();
if (isset($_SESSION['usuario'])) {
	$Usuario = $_SESSION['usuario'];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dulces Momentos</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- //for-mobile-apps -->
<link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="../assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="../assets/js/jquery-1.11.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="../../js/javascript-dulcesM.js"></script>
<!-- //js -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../assets/css/tox-progress.css">
<script src="../assets/js/tox-progress.js"></script>
<script>
$(document).ready(function(){
	var  id = "<?php if(isset($_GET['id'])){echo $_GET['id'];}else{ echo 0; } ?>";
	searchPedido(id);
		 
 });
 function searchPedido(producto){
 var parametros = {"action":"ajax",'idPedido':producto,"option":'4'};
 $.ajax({
        url:'../controller/controllerPedido.php',
        data: parametros,
        success: function(data){ 
					try {
						if (parseInt(data) == 0) {
							var template = ` <br><br><center><div class="alert alert-info" role="alert"> Lo sentimos el producto no existe . </div></center>`;
							$("#estado").html(template);
					}else{
						var pedido = JSON.parse(data);
						$("#PedidoId").text(pedido[0].id_Pedido);
						$("#estadoPedido").text(estadoPedido(pedido[0]));

						var template = `	<div class="col-md-25 col-sm-50 ">
            <div style="margin: auto" class="tox-progress" data-size="180" data-thickness="12" data-color="#DB00DB"
                 data-background="#ffffff" data-progress="${progresoPedido(pedido[0])}" data-speed="500">
                <div class="tox-progress-content" data-vcenter="true">
                    <img height="90" style="margin:auto" src="../assets/images/${iconoEstado(pedido[0])}"/><br>
                </div>
               
						</div><br>
						<p style="font-family:'Josefin Sans', sans-serif;font-size: 1.4em;" class="text-center margin-top-xs">Proceso :${mensajeProgreso(pedido[0])}</p><br>
						<p style="font-family:'Josefin Sans', sans-serif;font-size: 1.4em;" class="text-center margin-top-xs" >${mensajePedido(pedido[0])}</p><br>
						<div class="container"><center><a href="misPedidos.php"class="btn btn-info">Ver Pedidos</a> ` ;
						if (parseInt(pedido[0].Id_Estado_Pedido) == 1 || parseInt(pedido[0].Id_Estado_Pedido) == 6 ) {
							
						}else{
							template+=`<a href="../controller/util/reporte.php?id=${pedido[0].id_Pedido}" target="_blank" class="btn btn-info">Ver comprobante</a>`;
						}
					template += `	</center></div>
        </div>`;
							$("#estado").html(template);
							ToxProgress.create();
              ToxProgress.animate();
					}
					} catch (error) {
						console.log(error);
					}
          
        } ,
        error: function(){
            console.log("Ha ocurrido un error! :(");
        }
    });
 }
  function estadoPedido(pedido){
		 switch (parseInt(pedido.Id_Estado_Pedido)) {
			 case 1:
				  return "Pendiente por confirmar";
				 break;
				 case 2:
				  return "Aprobado";
				 break;
				 case 3:
				  return "En Producción";
				 break;
				 case 4:
				  return "Enviado";
				 break;
				 case 5:
				  return "Entregado exitosamente";
				 break;
				 case 6:
				  return "Cancelado";
				 break;
		 
			 default:
			 return "";
				 break;
		 }
	}
	function progresoPedido(pedido){
		 switch (parseInt(pedido.Id_Estado_Pedido)) {
			 case 1:
				 return 10;
				 break;
				 case 2:
				  return 30;
				 break;
				 case 3:
				  return 55;
				 break;
				 case 4:
				  return 85;
				 break;
				 case 5:
				  return 100;
				 break;
				 case 6:
				  return 100;
				 break;
			 default:
			   return 0;
				 break;
		 }
	}
	function mensajePedido(pedido){
		 switch (parseInt(pedido.Id_Estado_Pedido)) {
			 case 1:
			 return  "El pedido debe ser confirmado por el administrador";
				break;
				 case 2:
				 return  "Tu pedido esta aprobado";
				 break;
				 case 3:
				 return  "Estamos preparando tu pedido";
				 break;
				 case 4:
				  return "Tu pedido esta en camino";
				 break;
				 case 5:
				 return "Entregado exitosamente" ;
				 break;
				 case 6 :
				 return "Lo sentimos ,Tu pedido fue cancelado" ;
				 break;
			 default:
			   return "";
				 break;
		 }
	}
	function iconoEstado(pedido){
		 switch (parseInt(pedido.Id_Estado_Pedido)) {
			 case 1:
			 return  "pendiente.png";
				break;
				 case 2:
				 return  "aprobado.png";
				 break;
				 case 3:
				 return  "produccion.png";
				 break;
				 case 4:
				  return "enviado.jpg";
				 break;
				 case 5:
				 return "Entregado.png" ;
				 break;
				 case 6 :
				 return "cancelado.jpg" ;
				 break;
			 default:
			   return "";
				 break;
		 }
	}
	function mensajeProgreso(pedido){
		 switch (parseInt(pedido.Id_Estado_Pedido)) {
			 case 1:
			 return  "10 %";
				break;
				 case 2:
				 return  "30 %";
				 break;
				 case 3:
				 return  "55 %";
				 break;
				 case 4:
				  return "85 %";
				 break;
				 case 5:
				 return "100 %" ;
				 break;
				 case 6 :
				 return "100 %" ;
				 break;
			 default:
			   return "";
				 break;
		 }
	}

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p><?php if ($Usuario['Genero']=='M') { ?> Bienvenido <?php }else{ ?> Bienvenida <?php } echo $Usuario['Nombre']." ".$Usuario['Apellido'] ?>   </p>
			</div>
			<div class="agile-login">
				<ul>
					<li><a href="../../user/perfil.php?id=<?php echo $Usuario['Id_Persona']?>">Mi cuenta </a></li>
					<li><a href="misPedidos.php"> Mis pedidos</a></li>
					<li><a href="contact.html">Ayuda</a></li>
					<li><a href="#" onclick="CerrarSesion()">Cerrar cuenta</a></li>
				</ul>
			</div>
			<div class="product_list_header">  
					<form action="carrito.php" method="post" class="last"> 
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">
						<button class="w3view-cart" type="submit" name="submit" value=""  ><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
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
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="catalogo.php" class="act">Inicio</a></li>	
									<li><a href="">Crear mi ancheta</a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>
<!-- navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="productos.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Estado Pedido</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- //Estado pedido -->
<h2  style=" text-align: center;" >Estado del pedido </h2><br>
        <section id="informacion-estado"><h3 style="text-align: left;">Orden # <span id="PedidoId"></span> </h3><h3 style="text-align: right;">Estado: <span id="estadoPedido"></span> </h3></section><br><br>
		    <div class="container" id="estado">
			
	 </div>
<!-- //Estado pedido -->

	 


<!-- //footer -->
<div class="footer"  style="margin-top:229px" >
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
					<p  style="color: #fff">Teléfono :  30162512371</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //footer -->	

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<script src="../assets/js/cerrarSesion.js"> </script>
<link href="css/skdslider.css" rel="stylesheet">

<!-- //main slider-banner --> 
<script >
  function  mostrarAlerta(){
 
 swal({
  title: "Esta seguro que desea salir?",
  icon: "warning",
  buttons:["Cancelar","Aceptar"],
  dangerMode:true,
})
.then((willsalir) => {
  if (willsalir) {
          location.href = '../../index.html';
  } else {
    
  }
})
  }



</script>

</body>
</html>