<html>
<head>
	<title>Registrar usuario</title>
	<link media="screen" type="text/css" rel="stylesheet" href="includes/css/styleForms.css">
</head>
<body>
	<div class="codrops-top clearfix">
		<p><a href="#" id="trigger" class="menu-trigger"><span>Atras</span></a></p>
	</div>
	<div class="post" id="wrapper">
		<div id="page">
		<table style="with:200px;">
			<form method="post" action=".php">
			<tr>
				<td>
					<a>Usuario: </a><input id="inputUsuario" name="usuario" placeholder="Nombre">
				</td>
			</tr>
			<tr>
				<td>
					<a>Contras&ntilde;a: </a><input type="password" id="inputContrasenia" name="contra" placeholder="Password"></br>
				</td>
			</tr>
			<tr>
				<td>
					<a>Vuelva a ingresar: </a><input type="password" id="inputContrasenia2" name="contra2" placeholder="Reingresar"></br>
				</td>
			</tr>
			<tr>
				<td>
				</br>
					<input class="button" type="submit" id="guardarUser" value="Guardar" >
				</td>
			</tr>
		</form>
		</table>
		</div>
	</div>
</body>
</html>