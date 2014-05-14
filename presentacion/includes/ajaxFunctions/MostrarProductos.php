<?php
include_once '../../../negocio/kioscoDatabaseLinker.php';

	$baseDeDatos = new KioscoDatabaseLinker();
	$ret = $baseDeDatos->getProductosJson();
	
echo $ret;


?>