<?php
include_once '../namespacesAdress.php';
include_once '../negocio/kioscoDatabaseLinker.class.php';

//control_acceso($user_id,$cc_password,$AREA_P,$FUNCION);

$DBKiosco = new KioscoDatabaseLinker();

$nomUsuario=$_POST['usuario'];

$contraUsuario=$_POST['contra'];

$acceso=true;//$DBKiosco->accesoKiosco($nomUsuario,$contraUsuario);

$data->result = true;

$direccion = $_SERVER['SERVER_NAME'];

if($acceso!=false)
{
	header ("Location: http://".$direccion.presentacion."mainForm.php");
}
else 
{
	$data->result = false;

	$data->message = "password o usuario incorrecto";	

	header ("Location: http://".$direccion.presentacion."login.php?error=1");
}
?>