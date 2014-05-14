<?php
include_once '../../../negocio/kioscoDatabaseLinker.php';

$codigo=$_POST['codigo'];
$rubro=$_POST['rubro'];
$stockminimo=$_POST['stockminimo'];
$preciocompra=$_POST['preciocompra'];
$precioventa=$_POST['precioventa'];
$descripcion=$_POST['descripcion'];

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