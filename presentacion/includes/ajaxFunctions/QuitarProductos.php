<?php


include_once '../../../negocio/kioscoDatabaseLinker.php';

session_start();

$ret->result=true;

if (isset($_SESSION['egresoFarmacia'])) {
	/* @var $movimiento Movimiento */
	$egreso = unserialize($_SESSION['egresoFarmacia']);
} else {
	throw new Exception("EL movimiento no se encuentra inicializado",2014); 
}

if(isset($_POST['oper']) && $_POST['oper']=="del")
{
	if(isset($_POST['id']))
	{
		$index = Utils::postIntToPHP($_POST['id']);
	}
	else {
		
		$ret->result = false;
		$ret->message = "El id debe ser especificado";
		throw new Exception("El id del articulo debe ser especificado", 2032);
	}	
}
else {
	$ret->result = false;
	throw new Exception("Operacion invalida o no especificada", 2032);
	
}

if($ret->result)
{
	
	try {
		$egreso->quitar($index);	
	}
	catch (Exception $e)
	{
		$ret->result = false;
		$ret->message = $e->getMessage();
	}
	$_SESSION['egresoFarmacia'] = serialize($egreso);
}

echo json_encode($ret);
?>