<?php
include_once '../../../negocio/kioscoDatabaseLinker.class.php';

$descripcion=$_POST['descripcion'];

$obj = new kioscoDatabaseLinker();
$ret = new stdClass();

$ret->result = true;

try 
{
	$obj->ingresarRubro($descripcion);
} 
catch (Exception $e) 
{
	$ret->result=false;
}

echo json_encode($ret);


?>