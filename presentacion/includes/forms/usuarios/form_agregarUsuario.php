<?php
include_once '../../../../namespacesAdress.php';
include_once negocio.'kioscoDatabaseLinker.class.php';

$dbKiosco = new KioscoDatabaseLinker();

$acceso = $dbKiosco->traerPermisos();

?>
<script type="text/javascript">
	
</script>

<div class="post" id="wrapper">
	
	<div id="page">
		<form id="form1" name="form1" method="post" action="" >

			<a>Nombre Completo: </a><input id="inputUsuario" name="usuario" placeholder="Apellido y nombre"></br>

			<a>Usuario de usuario: </a><input id="inputUsuario" name="usuario" placeholder="Identificacion de Usuario"></br>

			<a>Contras&ntilde;a: </a><input type="password" id="inputContrasenia" name="contra" placeholder="Password"></br>

			<a>Vuelva a ingresar: </a><input type="password" id="inputContrasenia2" name="contra2" placeholder="Reingresar"></br>

			<a>Este Usuario puede tener acceso a ...</a></br>

			<?php
			for ($i=0; $i < count($acceso); $i++) 
			 { 
				echo "<input type='checkbox' name='accesos[]' value=".$acceso[$i]['idpermiso'].">".$acceso[$i]['detalle']."</br>";
			}
			?>

			<input class="button" type="submit" id="guardarUser" name="guardarUser" value="Guardar" >

		</form>

	</div>

</div>

 <?

if(isset($_POST['guardarUser'])){
	var_dump( $_POST['accesos']);
	echo "</br>";
foreach( $_POST['accesos'] as $key => $value ) 
{
   echo "Key: $key; Valor: $value<br>";
}
}
?> 