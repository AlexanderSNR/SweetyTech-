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
<!-- //js -->

<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="../../js/javascript-dulcesM.js"></script>
</head>	
<script>
	$(document).ready(function(){
		cargarInfo();
		infocarrito();

		$('#Comprar').click(function(){
		  var Products = localStorage.getItem('carrito');
		  var  datos= localStorage.getItem('DetallePedido');
			var parametros = {"action":"ajax","option":'3',"Products":Products,"datos":datos};
		$.ajax({
        url:'../controller/controllerPedido.php',
        data: parametros,
        beforeSend: function(objeto) {
         $('#Comprar').text("Comprando......");
        },
        success: function(data){
					if (parseInt(data)!= 0) {
						  if(parseInt(data) == -1){
								swal({
  									title: "Upss.. ,lo sentimos",
  									text: "Eres menor de edad y tus anchetas contienen licor ",
  									icon: "error",
 										 button: "oK",
									});
									
										$('#Comprar').text("Comprar");
									
									
							}else{
							    if (parseInt(data) == -2) {
										swal({
  									title: "Pedido rechazado ",
  									text: "Lo sentimos , no hay insumos suficientes para completar el pedido, escoge otros productos",
  									icon: "info",
 										 button: "oK",
									});
									
										$('#Comprar').text("Comprar");
									
									
									}else{
										if (parseInt(data) != 0) {
									swal({
  					title: "Genial!",
  					text: "Pedido registrado exitosamente!",
  					icon: "success"
						});
						var location ="estadoPedido.php?id="+parseInt(data);
						setTimeout(function(){
							window.location = location;
						}, 2000);
						localStorage.clear();
								}
									}
							}
						
					}else{
						swal("Upsss!", "Pedido Rechazado!", "error");
					}
        } ,
        error: function(){
            console.log("Ha ocurrido un error! :(");
            
        }
    });
		});
	});
	

	function cargarInfo(){
		var info = JSON.parse(localStorage.getItem('DetallePedido'));
	    if(info.Tipoenvio === 2){
			$('#TipoEnvio').text("Recoger en la tienda");
			$('#dirEntrega').text(info.Direccion);
			
		}else{
			if (info.Tipoenvio === 1 ) {
				$('#TipoEnvio').text("Domicilio");
				$('#dirEntrega').text(info.direccionUser);
			}
		}
		
		$('#Empresa').text(info.Nombre);
		$('#tel').text("Teléfono :" +info.Telefono);
		$('#direccion').text(info.Direccion);
	}
   function infocarrito() {
	var Items = JSON.parse(localStorage.getItem('carrito'));
		if (Items.length > 0 ) {
			$('#itemsNumber').text(Items.length);
		}
		
		var listProduct= ` `;
		var total =0;
                for( x of Items){
				  listProduct += ` <li>${x.cantidad}  ${x.Nombre_Ancheta}  <i>--</i> <span>${Subtotal(x.Precio,x.cantidad,x.Descuento)}</span></li>`;
				  total+=Subtotal(x.Precio,x.cantidad,x.Descuento);
                }
                listProduct+=`<strong><li>Total <i></i> <span>${total}</span></li><strong> `;
               $('#listProduct').html(listProduct);
   }
   function Subtotal(price,quantity,discount){
      if (discount == null) {
          return price * quantity;
      }else{
          var Subprice = (price * quantity)-((price * quantity)*(discount/100));
          return Subprice;
      }

  }
	
</script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p><?php if ($Usuario['Genero']=='M') { ?> Bienvenido <?php }else{ ?> Bienvenida <?php } echo $Usuario['Nombre']." ".$Usuario['Apellido'] ?>  </p>
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
				<h1><a href="Catalogo.php">Dulces Momentos</a></h1>
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
									<li class="active"><a href="Catalogo.php" class="act">Inicio</a></li>	
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
				<li><a href="catalogo.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Resumen Pedido</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- resumen -->
<HR  id = "Separador"> </HR>
<h2  style=" text-align: center;" >Resumen del pedido </h2><br>
<section class="container"    >
	<center>
	<div class="checkout-left" id="listProductos">	
				<div class="checkout-left-basket" style="float: right">
					<h4>Tus articulos</h4>
					<ul id="listProduct">
					
					</ul>
				</div>
				
	</center>
	<div class="info"> 
		<div class="UserInfo"> 
			<center><h3>Información General</h3>
			<HR  id = "Separador2"> </HR>
			 <h4><?php  echo  $Usuario['Nombre']." ".$Usuario['Apellido'];   ?></h4><br>
			 <h5>CC:10254785645</h5>
			 <h5>Teléfono: <?php  echo $Usuario['Celular']; ?></h5>
			 <h5> <?php  echo $Usuario['Direccion']; ?></h5>
			 
			</center>
			<center>
				<HR  id = "Separador2"> </HR>
				<h3>Tipo de envío</h3><br>
				 <h5 id="TipoEnvio"></h5>
				</center>
		</div>
		<div class="UserInfo"> 
			<center><h3>Origen</h3>
			<HR  id = "Separador2"> </HR>
			
			 <h4 id="Empresa"></h4><br>
			 <h5 id="tel"></h5>
			 <h5 id="direccion"> </h5>
			</center>
			<center>
				<HR  id = "Separador2"> </HR>
				<h3>Dirección de entrega</h3><br>
				 <h5 id="dirEntrega"></h5>
				</center>
		</div>
	</div>
</section>

<div class="checkout-right-basket" style="margin: 20px;">
					<a  id="Comprar"> Comprar</a>
				</div>
<!-- resumen -->
<!-- //footer -->
<div class="footer"  style="margin-top: 200px;" >
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
<link href="css/skdslider.css" rel="stylesheet">	
<!-- //main slider-banner --> 
<script src="../assets/js/cerrarSesion.js"> </script>

</body>
</html>