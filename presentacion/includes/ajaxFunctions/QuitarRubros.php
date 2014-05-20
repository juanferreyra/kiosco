<?php
include_once '../../../namespacesAdress.php';
include_once negocio.'kioscoDatabaseLinker.class.php';




$baseDeDatos = new KioscoDatabaseLinker();

$ret = new stdClass();

$ret->result=true;

if(isset($_POST['oper']) && $_POST['oper']=="del")
{
	if(isset($_POST['id']))
	{
		$index = $_POST['id'];
	}
	else 
	{
		$ret->result = false;
		throw new Exception("El id del rubro debe ser especificado", 2032);
	}	
}
else {
	$ret->result = false;
	throw new Exception("Operacion invalida o no especificada", 2032);
	
}

if($ret->result)
{
	
	try 
	{
		$baseDeDatos->eliminarRubro($index);	
	}
	catch (Exception $e)
	{
		$ret->result = false;
	}
}

echo json_encode($ret);
?>