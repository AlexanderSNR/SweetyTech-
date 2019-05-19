<?php
session_start();
$Usuario = $_SESSION['usuario'];

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
<!-- //js -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="../assets/css/loader.css" rel="stylesheet" type="text/css" media="all" />

<!-- start-smoth-scrolling -->
<script>
$(document).ready(function(){
    load();
});

 function load(){
    var parametros = {"action":"ajax","option":'5'};
   $.ajax({
       url:'../controller/controllerPedido.php',
       data: parametros,
       beforeSend: function(objeto) {
         $('#pedidos').html("<br><br><center ><div class='cssload-box-loading'></div><br>Cargando ...</center>");
         },
       success: function(data){ 
          
						if(parseInt(data)== 0){
							$('#pedidos').html("<br><br><center><div class='alert alert-info' role='alert'> No tienes pedidos . </div></center>");
						}else{
							var pedidos = JSON.parse(data);
							var template = ` <div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>No.</th>	
							<th>Fecha</th>
                            <th>tipo envío </th>
                            <th>Estado</th>
						
						</tr>
					</thead> `;
					 var cont=1;
					 for ( pedido of pedidos) {
						   template+=`<tr class="rem1">
						<td class="invert">${cont}</td>
						<td class="invert-image">${pedido.Fecha_Pedido}</td>
						<td class="invert">${pedido.Nombre}</td>
						<td class="invert"><a href="estadoPedido.php?id=${pedido.id_Pedido}" class="btn btn-info"><img src="https://cdn2.iconfinder.com/data/icons/flat-ui-icons-24-px/24/eye-24-512.png" alt="" width="30" heigth="30"></a></td>
					
					</tr> `;
					cont++;
					 }
						 template+=`</table></div>`;
						 
						 $('#pedidos').html(template);
						}
						
				
       } ,
       error: function(){
           console.log("Ha ocurrido un error! :(");
       }
   });
}
</script>
</head>	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p><?php
				 if ($Usuario['Genero']=='M') { ?> Bienvenido <?php }else{ ?> Bienvenida <?php } echo $Usuario['Nombre']." ".$Usuario['Apellido'] ?>  </p>
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
				<li><a href="Catalogo.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Mis Pedidos</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- forma de envio -->
<HR  id = "Separador"> </HR>
<h2  style=" text-align: center;" >Mis Pedidos</h2><br>
   <div class="container" >
   <div id="pedidos">
      
					
				
        </div>
   </div>
				

<!-- //footer -->
<div class="footer" style="margin-top: 20%;">
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
        </div>
        <div class="modal-footer">
		
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<!-- Bootstrap Core JavaScript -->
<script src="../assets/js/bootstrap.min.js"></script>
<!-- main slider-banner -->

<!-- //main slider-banner --> 

</body>
</html>