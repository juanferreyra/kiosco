<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Kiosco</title>
		<meta name="description" content="Kiosco con menu multinivel" />
		<meta name="keywords" content="multi-level, menu, navigation, off-canvas, off-screen, mobile, levels, nested, transform" />
		<meta name="author" content="Juan Ferreyra" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="includes/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="includes/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="includes/css/icons.css" />
		<link rel="stylesheet" type="text/css" href="includes/css/component.css" />
		<link type="text/css" rel="Stylesheet" href="includes/plug-in/css2/jquery-ui-1.8.16.custom.css" />
  		<link type="text/css" rel="Stylesheet" href="includes/plug-in/jqGrid/css/ui.jqgrid.css" />

		<script src="includes/js/modernizr.custom.js"></script>
		
		<!--Jdialog-->
		<link type="text/css" rel="Stylesheet" href="includes/plug-in/css2/jquery-ui-1.8.16.custom.css" />
		<script src="includes/plug-in/js/jquery-last.min.js" type="text/javascript"></script>
		<script src="includes/plug-in/js/jquery-ui-last.custom.min.js" type="text/javascript"></script>
		<script src="includes/plug-in/jqGrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
		<script src="includes/plug-in/jqGrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>


		<script src="includes/js/mainForm.js" type="text/javascript"></script>

		<?php
		include_once '../negocio/kioscoDatabaseLinker.class.php';
		?>

	</head>
	<body>
		<div class="container">
			<!-- Push Wrapper -->
			<div class="mp-pusher" id="mp-pusher">

				<!-- mp-menu -->
				<nav id="mp-menu" class="mp-menu">
					<div class="mp-level">
						<h2 class="icon icon-search">Menu de Kiosco</h2>
						<ul>
							<li class="icon icon-arrow-left">
								<a class="icon icon-like" href="#">Administracion</a>
								<div class="mp-level">
									<h2 class="icon icon-like">Administrar kiosco</h2>
									<ul>
										<!-- botones de manejo de articulos-->

										<li><a class="icon icon-food" href="#" id="btnAgregarRubro">Agregar Rubro</a></li>
										<li><a class="icon icon-tv" href="#" id="btnAgregarProducto">Agregar Articulos</a></li>
										<li><a class="icon icon-food" href="#" id="btnVerProducto">Ver Articulos</a></li>
									</ul>
								</div>
							</li>
							<li class="icon icon-arrow-left">
								<a class="icon icon-shop" href="#">Compras</a>
								<div class="mp-level">
									<h2 class="icon icon-shop">Compras</h2>
									<ul>
										<!-- botones de compra-->

										<li><a class="icon icon-stack" href="#" id="btnIngresarCompra">Ingresar Compra</a></li>
										<li><a class="icon icon-eye" href="#" id="btnVerFacturas">Ver Facturas</a></li>
									</ul>
								</div>
							</li>

							<li class="icon icon-arrow-left">
								<a class="icon icon-pen" href="#">Ventas</a>
								<div class="mp-level">
									<h2 class="icon icon-pen">Ventas</h2>
									<ul>
										<!-- botones de venta-->

										<li><a class="icon icon-stack" href="#" id="btnIngresarVenta">Vender</a></li>
										<li><a class="icon icon-eye" href="#" id="btnVentasEnCaja">Ventas en caja actual</a></li>
										<li><a class="icon icon-wallet" href="#" id="btnProductoMasVendido">Producto mas vendido</a></li>
									</ul>
								</div>
							</li>
							
							<!-- boton de caja-->

							<li><a class="icon icon-wallet" href="#" id="btnCaja">Caja</a></li>
						</ul>
					</div>
				</nav>
				<!-- /mp-menu -->

				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">
						<!-- Top Navigation -->
						<div class="codrops-top clearfix">
							<p><a href="#" id="trigger" class="menu-trigger"><span>toca Abrir/Cerrar Menu</span></a></p>
						</div>
						<header class="codrops-header">
							<h1>Kiosco Lauris</h1>
						</header>
						<div class="content clearfix">
							<div class="block block-40 clearfix">
								</nav>
							</div>
							<div class="block block-60">

								<!--Aca van todos los cuadros de dialogo-->

								<!-- Dialogos de menejo de productos -->

								<div id="dialogVerProducto" style="visibility: hidden; ">

									<div align="center"; ><table id="jqprodu" ></table></div>

								</div>

								<div id="dialogAgregarProducto" style="visibility: hidden;">
									
								</div>

								<div id="dialogAgregarRubro" style="visibility: hidden;">
									

								</div>

								<!-- dialogos de compra -->

								<div id="dialogIngresarCompra" style="visibility: hidden;">
									Dialogo ingresar compra
								</div>

								<div id="dialogVerFacturas" style="visibility: hidden;">
									Dialogo para ver facturas
								</div>

								<!-- dialogos de venta -->

								<div id="dialogIngresarVenta" style="visibility: hidden;">
									Dialogo de ingreso de venta
								</div>

								<div id="dialogVentasEnCaja" style="visibility: hidden;">
									Dialogo de Ventas en caja
								</div>

								<div id="dialogProductoMasVendido" style="visibility: hidden;">
									Dialogo de producto mas vendido
								</div>

								<!-- dialogo de caja-- >

								<div id="dialogCaja" style="visibility: hidden;">
									Dialogo de caja
								</div>

							</div>
						</div>
					</div><!-- /scroller-inner -->
				</div><!-- /scroller -->

			</div><!-- /pusher -->
		</div><!-- /container -->
		<script src="includes/js/classie.js"></script>
		<script src="includes/js/mlpushmenu.js"></script>
		<script>
			new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
		</script>
	</body>
</html>