<?php
require_once '../controller/util/validarSesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
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
<script src="../assets/js/jquery-1.11.1.min.js"></script><!-- js -->
<link href="../assets/css/loader.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- //js -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<script type="text/javascript">
function redireccionar(){
  window.locationf="carrito.php";
} 
setTimeout ("redireccionar()", 5000); //tiempo expresado en milisegundos
</script>

</head>	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>
				<?php if ($Usuario['Genero']=='M') { ?> Bienvenido <?php }else{ ?> Bienvenida <?php } echo $Usuario['Nombre']." ".$Usuario['Apellido'] ?>
				</p>
			</div>
			<div class="agile-login">
				<ul>
					<li><a href="registered.html">Mi cuenta </a></li>
					<li><a href="misPedidos.php"> Mis pedidos</a></li>
					<li><a href="contact.html">Ayuda</a></li>
					<li><a href="../../../controller/cerrar_session.php">Cerrar cuenta</a></li>
				</ul>
			</div>
			<div class="product_list_header" >  
			
					<form action="carrito.php"   method="post" class="last" id="carrito"> 
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">
						
					<button class="w3view-cart" type="submit" name="submit" value="" ><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
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
			<div class="w3l_search">
				<input type="search" name="Search" placeholder="Buscar un producto..." id="Search" onkeyup="load(1);">
				<button type="button" class="btn btn-default search" aria-label="Left Align" id="btn-buscar">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
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
									<li class="active"><a href="#" class="act filtros" >Inicio</a></li>	
									<li><a href="#" class="filtros" category="Pareja">Amor</a></li>
									<li><a href="#" class="filtros" category="Amigo">Amistad</a></li>
									<li><a href="#" class="filtros" category="Padre">Padres</a></li>
									<li><a href="#" class="filtros" category="Madre">Madres</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Ocasiones especiales<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Días especiales</h6>
														<li><a href="#" class="filtros" category="Cumpleaños">Cumpleaños</a></li>
														<li><a href="#" class="filtros" category="Baby Shower"> baby shower</a></li>
														<li><a href="#" class="filtros" category="Navidad">Navidad</a></li>
														<li><a href="#" class="filtros" category="Hallowen">halloween</a></li>
													</ul>
												</div>
							
											</div>
										</ul>
									</li>
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
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Productos</li>
			</ol>
		</div>
	</div>
	<!-- breadcrumbs -->
<!--- products --->
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Categorias</h2>
					<ul class="cate">
						<li><a href="#" class="filtros" category="Padre"> <i class="fa fa-arrow-right" aria-hidden="true" ></i>Anchetas para padres</a></li>
						<li><a href="#" class="filtros" category="Madre"><i class="fa fa-arrow-right" aria-hidden="true" ></i>Anchetas para madres</a></li>
						<li><a href="#" class="filtros" category="Amigo"><i class="fa fa-arrow-right" aria-hidden="true" ></i>Anchetas para amigos</a></li>
						<li ><a href="#" class="filtros" > <i class="fa fa-arrow-right" aria-hidden="true" ></i>Ocasiones especiales </a></li>
						<ul>
								<li><a href="#" class="filtros" category="Cumpleaños"><i class="fa fa-arrow-right" aria-hidden="true" ></i>Cumpleaños</a></li>
								<li><a href="#" class="filtros" category="Baby Shower"><i class="fa fa-arrow-right" aria-hidden="true"></i>Baby shower</a></li>
								<li><a href="#" class="filtros" category="Navidad"><i class="fa fa-arrow-right" aria-hidden="true" ></i>Navidad</a></li>
								<li><a href="#" class="filtros" category="Hallowen"><i class="fa fa-arrow-right" aria-hidden="true" ></i>Hallowen</a> </li>
							</ul>
						
					</ul>
				</div>																																												
			</div>
			<div class="col-md-8 products-right">
				<div class="products-right-grid">
					<div class="products-right-grids">
						
						<div class="clearfix"> </div>
					</div>
				</div>
				<div id="mensaje"></div>
				<div id="Catalogo"> </div>	
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!--- products --->


<script src="../assets/js/bootstrap.min.js"></script>
<!-- top-header and slider -->



	
<script src="../assets/js/Ajax/Catalogo.js"></script>
<script src="../assets/js/Carrito.js"></script>
</body>
</html>