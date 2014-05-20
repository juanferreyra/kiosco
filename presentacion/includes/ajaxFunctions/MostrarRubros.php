<?php
include_once '../../../namespacesAdress.php';
include_once negocio.'/kioscoDatabaseLinker.class.php';



	$baseDeDatos = new KioscoDatabaseLinker();
	$ret = $baseDeDatos->getRubrosJson();
	
echo $ret;


?>