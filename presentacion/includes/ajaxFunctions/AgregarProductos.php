<?php
include_once '../../../namespacesAdress.php';
include_once negocio.'kioscoDatabaseLinker.class.php';

$codigo=$_POST['codigoprodu'];
$rubro=$_POST['rubroprodu'];
$stockminimo=$_POST['stockminprodu'];
$preciocompra=$_POST['preciocompraprodu'];
$precioventa=$_POST['precioventaprodu'];
$descripcion=$_POST['descripcionprodu'];

$obj = new kioscoDatabaseLinker();
$ret = new stdClass();

$ret->result = true;

try 
{
	$obj->agregarProducto($codigo, $stockminimo, $preciocompra, $precioventa, $descripcion, $rubro);
} 
catch (Exception $e) 
{
	$ret->result=false;
}

echo json_encode($ret);


?>