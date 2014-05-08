<?php

include_once 'kioscoDatabaseLinker.php';

$obj = new kioscoDatabaseLinker();

//$id = $obj->inicializarCaja('800.90', 3);

//$id = $obj->ultimaCajaSinCerrar(3);

//var_dump($id);

$entro = $obj->finalizarCaja('5', 6);

var_dump($obj->hayCajaSinCerrar());

//var_dump($id['idturno']);

?>