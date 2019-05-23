<?php
session_start();
//se  quema el usuario y se crea una variable de sesion para trabajar con el usuario tambien.
$Usuario =$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Dulces Momentos</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- //for-mobile-apps -->
<link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/flickity-fullscreen@1/fullscreen.css">
<script src="https://unpkg.com/flickity-fullscreen@1/fullscreen.js"></script>
<!-- font-awesome icons -->
<link href="../assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="../assets/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 <script>
	 $(document).ready(function(){
			var  id = "<?php  echo $_GET['id'];?>";
			id= parseInt(id);
			searchItem(id);
			
});
function searchOfertas(referencia,idproducto){

	var parametros = {"action":"ajax","option":'3',"referencia":referencia};
	$.ajax({
       url:'../controller/controllerCatalogo.php',
       data: parametros,
       success: function(data){ 
				 if (data == "0") {
					 
				 }else{
					var ofertas = JSON.parse(data);
					var template = ` ` ;
					var bandera = false;
					 if (ofertas.length > 0) {
						  for (item of ofertas ) {
								if (item.Codigo_Ancheta != idproducto) {
                     bandera = true;
									var precio = item.Precio -(item.Precio*(item.Descuento/100));
									template+= ` <div class="col-md-3 top_brand_left-1">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid_pos">
									<img src="../assets/images/oferta.jpg" alt=" " class="img-responsive">
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="producto.php?id=${item.Codigo_Ancheta}"><img title=" " alt=" " src="../assets/images/${item.Foto1}"  class="img-producto"></a>		
												<p>${item.Nombre_Ancheta}</p>
													<h4>$${precio}<span>$${item.Precio}</span></h4>
											</div>
											<div class="snipcart-details top_brand_home_details">
													<input type="submit" name="submit" value="Añadir" class="button" id="agregar" data-producto="${item.Codigo_Ancheta}">
											</div>
										</div>
									</figure>
								</div>
							</div>
						</div>
					</div>`;
						}
					}
						
					 }else{
					   template +=` <div class="alert alert-info" role="alert">
 						 No hay ofertas disponibles ,relacionadas con este producto
</div>`;
					 }
			    if (bandera) {
						$("#ofertas").html(template);
					}else{
						var template =` <center><div class="alert alert-info" role="alert">
 						 No hay ofertas disponibles relacionadas con este producto</div></center>`;
						$("#ofertas").html(template);
					}
				 }
          
       } ,
       error: function(){
           console.log("Ha ocurrido un error! :(");
       }
   });
}
function searchItem(id){
	var parametros = {"action":"ajax","option":'2',"idProducto":id};
	$.ajax({
       url:'../controller/controllerCatalogo.php',
       data: parametros,
       success: function(data){ 
					 
			
					

				var product = JSON.parse(data);
				 if (product == undefined) {
					$("#producto").html("<div class='alert alert-info' role='alert'>"+"Lo sentimos el producto no existe "+"</div>");
				 }else{
					if (product[0].Foto1 != null) {
						$("#Foto1").attr({src:"../assets/images/"+product[0].Foto1});
					}

					if (product[0].Foto2 != null) {
						$("#Foto2").attr({src:"../assets/images/"+product[0].Foto2});
					}else{
						$("#Foto2").attr({src:""});
					}
					if (product[0].Foto2 != null) {
						$("#Foto3").attr({src:"../assets/images/"+product[0].Foto3});
					}else{
						$("#Foto3").attr({src:""});
					}
					$("#nombreAncheta").text(product[0].Nombre_Ancheta);
					$("#nombreAncheta2").text(product[0].Nombre_Ancheta);
					$("#Descripcion").text(product[0].Descripcion);
					if (product[0].Descuento == null) {
							var template = `<h4 class="m-sing">$ ${product[0].Precio} </h4>`;
						  $("#precio").html(template);
					}else{
						var subtotal = product[0].Precio-(product[0].Precio*(product[0].Descuento/100));
						var template = `<h4 class="m-sing"> $ ${subtotal} <span>${product[0].Precio}</span></h4>`;
						$("#precio").html(template);
					}
					$("#anadir").html("<input type='button' id='agregar' name='agregar' value='Añadir' class='button' data-Producto='"+product[0].Codigo_Ancheta+"'>");
				 
				 }
				 var Letra = product[0].Nombre_Ancheta.substring(8);
				 searchOfertas(Letra,product[0].Codigo_Ancheta);
			 
       } ,
       error: function(){
           console.log("Ha ocurrido un error! :(");
       }
   });
}
function AgregarCarrito(idProduct){
    
    var parametros = {"action":"ajax",'idProducto':idProduct,"option":'2'};
    $.ajax({
        url:'../controller/controllerCatalogo.php',
        data: parametros,
        success: function(data){ 
            if (parseInt(data) != 0) {
                var product = JSON.parse(data);
                getCarrito = JSON.parse(localStorage.getItem('carrito'));
                for (i of getCarrito){
                    if(i.Codigo_Ancheta === idProduct){
                        i.cantidad++;
                        console.log(getCarrito);
                        localStorage.setItem("carrito",JSON.stringify(getCarrito));
                        AgregadoCarrito();
                        numberItems();
                        return;
                    }
                }
                //si no existe el item lo agregamos a localStorage
                product[0].cantidad = 1;
                getCarrito.push(product[0]);
                localStorage.setItem("carrito",JSON.stringify(getCarrito));
                 AgregadoCarrito();
                 numberItems();
                 
            }else{
                ErrorCarrito();
            }
        } ,
        error: function(){
            console.log("Ha ocurrido un error! :(");
        }
    });
}
function ErrorCarrito(){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr["error"]("No  existe el Item,lo sentimos");
}

function AgregadoCarrito(){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr["success"]("Agregado al carrito");
}
 function numberItems() {
    $('#itemsNumber').text("");
    getCarrito = JSON.parse(localStorage.getItem('carrito'));
    var numItems=  getCarrito.length;
      if (numItems != 0) {
        $('#itemsNumber').text(numItems);
      }
        
 }
 </script>
 <style>
	 .carousel2 {
  background: #EEE;
}

.carousel-cell2 {
  width: 28%;
  height: 300px;
  margin-right: 10px;
  background: #DB00DB;
  border-radius: 5px;
  counter-increment: carousel-cell;
}

.carousel-cell2.is-selected {
  background: #FFF;
}

/* cell number */
.carousel-cell2:before {
  display: block;
  text-align: center;
  line-height: 200px;
  font-size: 80px;
  color: white;
}
 </style>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
				<li><a href="../../user/perfil.php?id=<?php echo $Usuario['Id_Persona']?>">Mi cuenta </a></li>
					<li><a href="misPedidos.php"> Mis pedidos</a></li>
					<li><a href="contact.html">Ayuda</a></li>
					<li><a href="#" onclick="CerrarSesion()">Cerrar cuenta</a></li>
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
				<li><a href="catalogo.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active" id="nombreAncheta"></li>
			</ol>
		</div>
	</div>
<!-- breadcrumbs -->
 <div></div>
	<div class="products"  id="producto">
		<div class="container" >
			<div class="agileinfo_single">
				
				<div class="col-md-4 agileinfo_single_left" id="fotos" >
				<div class="carousel" data-flickity='{ "fullscreen": true}'  >
				<div class="carousel-cell">
								  <img class="carousel-cell-image"
									src="" id="Foto1" />
				</div>
				<div class="carousel-cell">
								  <img class="carousel-cell-image"
									src="" id="Foto2" />
				</div>
				<div class="carousel-cell" >
								  <img class="carousel-cell-image"
									src="" id="Foto3" />
				</div>
				
				</div>
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2 id="nombreAncheta2">Ancheta pareja</h2>
				
					<div class="w3agile_description">
						<h4>Descripción :</h4>
						<p id="Descripcion">Esta espectacular ancheta para parejas es perfecta para demostrarle a tu pareja cuanto la amas.  <br>
Contenido:  Base (Caja de cartón decorativa); Decorativos ( globo  de corazones ,3 figuras de helados, 2    afiches con frase “te amo ,Feliz día” , papel celofán); Dulces(2 snickers ,2 golosinas M&M, 1  galleta wafer )


					 </p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart" id="precio">
							
						</div>
						<div class="snipcart-details agileinfo_single_right_details" id="anadir">
							
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
<!-- new -->
<div class="newproducts-w3agile">
		<div class="container">
			<h3>Nuevas ofertas</h3>
				<div class="agile_top_brands_grids">
					 <div id="ofertas">

					 </div>
					
						<div class="clearfix"> </div>
				</div>
		</div>
	</div>
<!-- //new -->

<!-- //footer -->
<div class="footer">
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

<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/Carrito.js"></script>
<script src="../assets/js/cerrarSesion.js"> </script>



<!-- //main slider-banner --> 

</body>

<!-- Mirrored from p.w3layouts.com/demos_new/13-02-2017/super_market-demo_Free/405423547/web/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Aug 2018 16:09:02 GMT -->
</html>