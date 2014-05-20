<?php
include_once '../../../namespacesAdress.php';
include_once negocio.'kioscoDatabaseLinker.class.php';


$nivelDePantalla=3;
$nivelDePerfil=5;

$obj = new kioscoDatabaseLinker();

if($nivelDePerfil<$nivelDePantalla)
{
	echo "<input type='hidden' value='false' id='habilitado'>";
	echo "No tiene los permisos necesarios para <br> visualizar la pantalla";
	return false;
}


?>

<form id="agregarubro">
	<input type='hidden' value='true' id='habilitado'>
	Descripcion de Rubro: <input type="text" id="descripcionrubro"> <br>
	
</form>