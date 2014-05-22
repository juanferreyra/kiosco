<?php
include_once '../../../namespacesAdress.php';
include_once negocio.'kioscoDatabaseLinker.class.php';

$obj = new kioscoDatabaseLinker();
$ret = new stdClass();

$ret->result = true;

try 
{
	$obj->agregarProducto($_POST);
} 
catch (Exception $e) 
{
	$ret->result=false;
}

echo json_encode($ret);


?>