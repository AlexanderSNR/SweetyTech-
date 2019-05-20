<?php
require_once '../../controller/salida_controller.php';
$stock= new salida_controller();
?>
<header>

	<nav>
		<ul class="nav">
		<button onclick="myFunction()" class="boton"><span class="lnr lnr-menu icon-1 show" ></span></button>
		
			<li class="dropdown">
				<a>
					<span class="lnr lnr-envelope icon-1"></span>
				</a>
			</li>

			<li class="dropdown">
				<a>
					<span class="lnr lnr-alarm icon-1 fa-y-combinator"><?php echo $stock->alertarstock(); ?></span>
				</a>
			</li>

			<li class="dropdown">

				<span class="lnr lnr-user"></span> <i class="fa fa-caret-down"></i>

				<ul class="dropdown-menu dropdown-user" id="user">
					<li class="col-md-12"><a href="#"><i class="fa fa-user fa-fw"></i> Perfil Usuario</a>
					</li>
					<li class="col-md-12"><a href="configuraciones.php"><i class="fa fa-gear fa-fw"></i> Configuraciones</a>
					</li>
					<li class="divider"></li>
					<li class="col-md-12"><a href="../../controller/Cerrar_session.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
					</li>
				</ul>

			</li>

		</ul>
	</nav>
</header>

<main>
	<div id="myDIV">

		<li> <span class="lnr lnr-store icon2"></span>
			<p class="text">Insumo</p>
			<ul>
				<a href="../Insumo/R_Insumo.php" style="text-decoration: none;">
					<li>REGISTRAR</li>
				</a>
				<a href="../Insumo/C_insumo.php" style="text-decoration: none;">
					<li>CONSULTAR</li>
				</a>
			</ul>
		</li>

		<li><span class="lnr lnr-users icon4"></span>
			<p class="text">Clientes</p>
			<ul>
				<a href="../user/R_Clientes.php" style="text-decoration: none;">
					<li>REGISTRAR</li>
				</a>
				<a href="../user/C_Clientes.php" style="text-decoration: none;">
					<li>CONSULTAR</li>
				</a>
			</ul>
		</li>

		<li><span class="lnr lnr-user icon7"></span>
			<p class="text">Proveedor</p>
			<ul>
				<a href="../Proveedor/R_Proveedor.php" style="text-decoration: none;">
					<li>REGISTRAR</li>
				</a>
				<a href="../Proveedor/C_Proveedor.php" style="text-decoration: none;">
					<li>CONSULTAR</li>
				</a>
			</ul>
		</li>


		


		<li><span class="lnr lnr-dice icon3"></span>
			<p class="text">Plantilla</p>
			<ul>
				<a href="../Plantilla/R_Plantilla.php
						 " style="text-decoration: none;">
					<li>REGISTRAR</li>
				</a>
				<a href="../Plantilla/C_Plantilla.php" style="text-decoration: none;">
					<li>CONSULTAR</li>
				</a>
			</ul>
		</li>
		<li><span class="lnr lnr-gift icon6"></span>
			<p class="text">Anchetas</p>
			<ul>
				<a href="../ProductoTerminado/R_Ancheta.php
						 " style="text-decoration: none;">
					<li>REGISTRAR</li>
				</a>
				<a href="../ProductoTerminado/C_Ancheta.php
						 " style="text-decoration: none;">
					<li>CONSULTAR</li>
				</a>
			</ul>
		</li>

		<li><span class="lnr lnr-cart icon8"></span>
			<p class="text">Pedidos</p>
			<ul>
				<a href="#
						 ">
					<li>REGISTRAR</li>
				</a>
				<a href="../PedidosAdmin/C_pedidos.php">
					<li>CONSULTAR</li>
				</a>
			</ul>
		</li>
		<li><span class="lnr  lnr-apartment icon2"></span>
			<p class="text">Empresa</p>
			<ul>
				<a href="../Proveedor/R_Empresa.php" style="text-decoration: none;">
					<li>REGISTRAR</li>
				</a>
				<a href="../Empresa/C_Empresa.php" style="text-decoration: none;">
					<li>CONSULTAR</li>
				</a>
			</ul>
		</li>

		<li><span class="lnr lnr-cog icon8"></span>
			<p class="text">Salida</p>

			<ul>
			<a href="../Salida/R_Salida.php">
					<li>REGISTRAR</li>
				<a href="../Salida/C_Salida.php">
					<li>CONSULTAR</li>
				</a>
	
				</a>
			</ul>

		</li>

	</div>
</main>
<script>
function myFunction() {
  var x = document.getElementById('myDIV');
  if (x.style.visibility === 'hidden') {
    x.style.visibility = 'visible';
  } else {
    x.style.visibility = 'hidden';
  }
}
</script>

