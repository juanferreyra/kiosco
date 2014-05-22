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
	<input type='hidden' value='true' id='habilitado' name='habilitado'>
	Codigo de producto: <input type="text" name="codigo"> <br>
	Rubro de producto: <select name="idrubro"> 
	<option value="">Selecione un rubro</option>
	<?php     
	for($i=0; $i<count($rubros);$i++ )
	{
		echo '<option value='.$rubros[$i]['idrubro'].'>'.$rubros[$i]['descripcion'].'</option>';
	}
	?>
	</select>
	<br>
	Stock minimo: <input type="text" name="stock_minimo"> <br>
	Precio compra: <input type="text" name="precio_compra"> <br>
	Precio venta: <input type="text" name="precio_venta"> <br>
	Descripcion de producto: <input type="text" name="descripcion"> <br>
</form>