<?php

//phpinfo();
include_once 'kioscoDatabaseLinker.php';
include_once 'movimiento.class.php';
include_once 'producto.class.php';




$obj = new kioscoDatabaseLinker();
$mov = new Movimiento();

$prod = new Producto();
$prod2 = new Producto();


$prod->setNombre("ProductoUno");
$prod2->setNombre("ProductoDos");

$mov->agregar($prod,3);
$mov->agregar($prod2,15237);

var_dump($mov);

$obj->confirmarCarrito(2, $mov);



//$id = $obj->inicializarCaja('800.90', 3);

//$id = $obj->ultimaCajaSinCerrar(3);

//var_dump($id);

//$entro = $obj->finalizarCaja('5', 6);

//var_dump($obj->hayCajaSinCerrar());

//var_dump($id['idturno']);

?>