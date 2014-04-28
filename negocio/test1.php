<?php

include_once 'kioscoDatabaseLinker.php';

$obj = new kioscoDatabaseLinker();

//$id = $obj->inicializarCaja('800.90', 3);

//$id = $obj->ultimaCajaSinCerrar(3);

//var_dump($id);

$entro = $obj->finalizarCaja('3990.856', 2);

var_dump($entro);

?>