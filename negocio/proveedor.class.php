<?php
class Proveedor 
{
	var $id;
	var $descripcion;
	var $direccion;
	var $telefono;

	function Proveedor()
	{

	}

	//set
	function setId($value)
	{
		$this->id = $value;
	}

	function setDescripcion($value)
	{
		$this->descripcion = $value;
	}

	function setDireccion($value)
	{
		$this->direccion = $value;
	}

	function setTelefono($value)
	{
		$this->telefono = $value;
	}

	//get
	function getId()
	{
		return $this->id;
	}

	function getDescripcion()
	{
		return $this->descripcion;
	}

	function getDireccion()
	{
		return $this->direccion;
	}

	function getTelefono()
	{
		return $this->telefono;
	}
}
?>