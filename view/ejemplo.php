<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width , user-scalable= no,initial-scale=1.0,maximum-scale= 1.0,minimum-scale=1.0">
	<title>Dulces Momentos</title>
</head>

<body>
	  <?php include ("util/menu.php"); ?>
	   <!-- breadcrumbs -->
        <div class="row col-md-12" id="migas">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
                    <li class="breadcrumb-item text-light" id="titulos"><a>Consultar</a></li>
                    <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Insumos</li>
                </ol>
            </nav>
        </div>

        <!-- / breadcrumbs -->

		<div class="col-md-12" style="margin-left:4%; margin-top:4%;">
				<div class="wrap">
					<div class="store-wrapper">
						<div class="category_list">
							<a href="#" class="category_item" category="all">Todo</a>
							<a href="#" class="category_item" category="basegrande">Base Grande</a>
							<a href="#" class="category_item" category="basemediana">Base Mediana</a>
							<a href="#" class="category_item" category="basepequeña">Base pequeña</a>

						</div>
						<section class="products-list">
							<div class="product-item" category="basegrande">
								<div class='content'>
									<img src="images/Base1.jpg">
									<a href="#form_plantilla" data-toggle="modal">Base Madera </a>
								</div>

							</div>
							<div class="product-item" category="basegrande">
								<img src="images/Base2.jpg" alt="">
								<a href="#form_plantilla" data-toggle="modal">Base Cumpleaños</a>
							</div>
							<div class="product-item" category="basemediana">
								<img src="images/Base3.jpg" alt="">
								<a href="#form_plantilla" data-toggle="modal">Base Feliz Dia</a>
							</div>
							<div class="product-item" category="basemediana">
								<img src="images/Base4.jpg" alt="">
								<a href="#form_plantilla" data-toggle="modal">Base Canasta</a>
							</div>
							<div class="product-item" category="basepequeña">
								<img src="images/base5.png" alt="">
								<a href="#form_plantilla" data-toggle="modal">Base Amor</a>
							</div>
							<div class="product-item" category="basepequeña">
								<img src="images/base6.png" alt="">
								<a href="#form_plantilla" data-toggle="modal">Base Pareja</a>
							</div>
							<div class="product-item" category="basemediana">
								<img src="images/Base7.jpg" alt="">
								<a href="#form_plantilla" data-toggle="modal">Base Sencilla</a>
							</div>
							<div class="product-item" category="basepequeña">
								<img src="images/Base8.jpg" alt="">
								<a href="#form_plantilla" data-toggle="modal">Base Caja</a>
							</div>
						</section>
					</div>
				</div>
			</div>
			<div class="modal fade" id="form_plantilla">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header bg-dark">
							<h4 class="modal-tittle">Insumos Para Plantilla</h4>
							<button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<div class="col-md-12">
								<label> Dulces </label>
								<select id="select-form" class="categoria " name="Categoria">
									<option value="Chocolatina jet">Chocolatina Jet</option>
									<option value="Choco Break">Choco Break</option>
									<option value="Peluche oso">Arequipe</option>
								</select>
								<br>

							</div>
							<div class="col-md-12">
								<label> Peluches </label>
								<select id="select-form" class="categoria " name="Categoria">
									<option value="Oso Panda">Oso Panda</option>
									<option value="Unicornio">Unicornio</option>
									<option value="patico">patico</option>
								</select>
								<br>

							</div>
							<div class="col-md-12">
								<label> Tragos </label>
								<select id="select-form" class="categoria " name="Categoria">
									<option value="Whisky">Whisky</option>
									<option value="Vino">Vino</option>
									<option value="Corona">Corona</option>
								</select>
								<br>

							</div>
							<div class="row col-md-12">
								<button class="col-md-4" id="editar" data-dismiss="modal">Cerrar</button>
								<input class="col-md-4" type="submit" value="Guardar" id="editar">

							</div>
						</div>


					</div>
				</div>
			</div>
			
			<div class="col-md-9">
	
	<div class="registrar">
   
	<form class="form_ins row">
      
       <div class="col-md-12">
       <label>Nombre</label>
       <input class="input" name="Nombre"  placeholder="Ingrese nombre"> 
        </div>
       <div class="col-md-12">
       <label> TRAGOS </label>
        <br>
        <select id="select-form" class="categoria "name="Categoria" multiple size="3" > 
        <option value="whisky">whisky</option>
        <option value="chocolate">piña colada</option>
        <option value="trago">vodka </option>
        </select>
        </div>
        <div class="col-md-12">
         <label> DULCES </label>
        <br>
        <select class="categoria " id="categoria" multiple size="3" > 
        <option value="salado">M  M</option>
        <option value="chocolate">Jumbo</option>
        <option value="trago">Mani salado</option>
        </select>
        </div>
        <div class="col-md-12">
         <label> PELUCHES </label>
        <br>
        <select  class="categoria" size="4" multiple> 
        <option value="oso">Oso</option>
        <option value="rana">Rana</option>
        <option value="leon">leon</option>
        <option value="panda">panda</option>
        </select>
        </div>
        <div class="col-md-12">
             <label>Foto </label>
             <br>
             <input class="input" type="File" name="Precio" required autofocus>     
        </div>
       <div class="col-md-12">
       <label>Descripcion</label>
       <textarea class="textarea"name="" placeholder="Ingrese Descripcion" ></textarea>
        </div>
       
        
      <div class="col-md-6">
      <input  class="btn_submit col-md-6"  type="submit" value="Registrar" onclick = "mensaje()">
          </div>
     <div class="col-md-6">
     <input class="btn_reset col-md-6"  type="reset" value="limpiar"> 
          </div>
          
		</form>
			
<footer style="width:100%; background:#272626; margin-top:5%;">
		<?php include ("util/footer.php"); ?>
	</footer>

			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script src="https://.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
			<script src="js/bootstrap.js"></script>
			<script src="js/search.js"></script>
			<script src="js/script.js"></script>
			
			
		</body>

</html>
