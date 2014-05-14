<?php

//phpinfo();
include_once 'kioscoDatabaseLinker.php';
include_once 'movimiento.class.php';
include_once 'producto.class.php';




$obj = new kioscoDatabaseLinker();
$mov = new Movimiento();

//$prod = new Producto();
//$prod2 = new Producto();


//$prod->setNombre("Leche matrix");
//$prod->setId(0);
//$prod->setPrecioVenta(5);
//$prod2->setNombre("Pepitos");
//$prod2->setId(16);

//$mov->agregar($prod,11111);
//$mov->agregar($prod2,2222);

//var_dump($mov);

//$obj->confirmarCarrito(7, $mov);

$obj->getTurnos();

//$id = $obj->inicializarCaja('800.90', 3);

//$id = $obj->ultimaCajaSinCerrar(3);

//var_dump($id);

//$entro = $obj->finalizarCaja('5', 6);

//var_dump($obj->hayCajaSinCerrar());

//var_dump($id['idturno']);

?>