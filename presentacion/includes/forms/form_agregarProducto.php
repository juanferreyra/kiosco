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


$rubros = $obj->getRubros();

?>

<form id="agregarprodu">
	<input type='hidden' value='true' id='habilitado'>
	Codigo de producto: <input type="text" id="codigoprodu"> <br>
	Rubro de producto: <select id="rubroprodu"> 
	<option value="">Selecione un rubro</option>
	<?php     
	for($i=0; $i<count($rubros);$i++ )
	{
		echo '<option value='.$rubros[$i]['idrubro'].'>'.$rubros[$i]['descripcion'].'</option>';
	}
	?>
	</select>
	<br>
	Stock minimo: <input type="text" id="stockminprodu"> <br>
	Precio compra: <input type="text" id="preciocompraprodu"> <br>
	Precio venta: <input type="text" id="precioventaprodu"> <br>
	Descripcion de producto: <input type="text" id="descripcionprodu"> <br>
</form>