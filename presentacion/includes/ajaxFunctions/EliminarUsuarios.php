<?php
include_once '../../../namespacesAdress.php';
include_once negocio.'kioscoDatabaseLinker.class.php';

$obj = new kioscoDatabaseLinker();

$registro = $obj->eliminarUsuario($_POST);

echo json_encode($registro);

?>