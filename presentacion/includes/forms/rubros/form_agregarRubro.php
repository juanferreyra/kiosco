<?php
include_once '../../../../namespacesAdress.php';
include_once negocio.'kioscoDatabaseLinker.class.php';

$obj = new kioscoDatabaseLinker();

if(true)//aqui iria la funcion que vaalida el permiso a esta pantalla
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