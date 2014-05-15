<html>
<head>
	<title>Ingreso a kiosco</title>
	<link media="screen" type="text/css" rel="stylesheet" href="includes/css/styleLogin.css">
</head>
<body>
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1 align="center">Kiosco</h1>
			</div>
		</div>
	</div>
	<div class="post" id="wrapper">
		<div id="page">
		<table align="center" style="with:200px;">

			<form method="post" action="validarInicioSession.php">
			<tr>
				<td>
					<h3 align="center">Usuario</h3></br>
					<input id="inputUsuario" name="usuario" >
				</td>
			</tr>
			<tr>
				<td>
		<h3 align="center">Password</h3></br>
		<input type="password" id="inputContrasenia" name="contra"></br>
				</td>
			</tr>
			<tr>
				<td>
				</br>
				<input class="button" type="submit" id="IniciarSesion" value="---> Iniciar Session <---" >
				</td>
			</tr>
			<tr>
				<td>
				<?php 
				if (isset($_GET['error']))
				{
				?>
				<div id="errores" style="clear: both;text-align: center;height: 50px;">
					<div id="error">
						<p >Password o usuario incorrecta</p>
					</div>
				</div>
				<?php 
				}
				else 
				{
				?>
				<div id="errores" style="clear: both;text-align: center;height: 80px">
					
				</div>
				<?php
				} 
				?>	
				</td>
			</tr>
		</form>
		</table>
		</div>
	</div>
</body>
</html>