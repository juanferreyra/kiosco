<html>
<head>
	<title>Ingreso a kiosco</title>
	<link media="screen" type="text/css" rel="stylesheet" href="includes/css/styleLogin.css">
</head>
<body>
	<div id="header-wrapper">
		<div id="header">
			
		</div>
	</div>
	<div class="post">
		<div id="page" align="center">
		<table  style="with:200px;">

			<div id="logo">
				<h1 align="center">Kiosco</h1>
			</div>

			<form method="post" action="validarInicioSession.php">
			<tr>
				<td>
					<!-- <h3 align="center">Usuario</h3></br> -->
					<input id="inputUsuario" name="usuario" placeholder="Nombre Usuario">
				</td>
			</tr>
			<tr>
				<td>
				<!-- <h3 align="center">Password</h3></br> -->
				<input type="password" id="inputContrasenia" name="contra" placeholder="Password"></br>
				</td>
			</tr>
			<tr>
				<td>
				</br>
				<input class="btnAcceder" type="submit" id="acceder" value="Acceder" >
				</td>
			</tr>
			<tr>
				<td>
				<?php 
				if (isset($_GET['error']))
				{
				?>
				<div >
					<div id="error">
						<p >Password o usuario incorrecta</p>
					</div>
				</div>
				<?php
				}
				else 
				{
				?>
				<div id="errores" style="clear: both;">
					
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