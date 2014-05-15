<?php
class Producto
{
	var $id;
	var $codigo;
	var $nombre;
	var $rubro;
	var $precioVenta;
	var $precioCompra;
	var $stockMinimo;

	function Producto() 
	{
		//inicializo el producto vacio por que soy re pro
	}

	//Set
	function setId($value)
	{
		$this->id = $value;
	}

	function setCodigo($value)
	{
		$this->codigo = $value;
	}

	function setNombre($value)
	{
		$this->nombre = $value;
	}
	
	function setRubro($value)
	{
		$this->rubro = $value;
	}

	function setPrecioVenta($value)
	{
		$this->precioVenta = $value;
	}

	function setPrecioCompra($value)
	{
		$this->precioCompra = $value;
	}

	function setStockMinimo($value)
	{
		$this->stockMinimo = $value;
	}

	//Get
	function getId()
	{
		return $this->id;
	}

	function getCodigo()
	{
		return $this->codigo;
	}
	
	function getNombre()
	{
		return $this->nombre;
	}

	function getRubro()
	{
		return $this->rubro;
	}

	function getPrecioVenta()
	{
		return $this->precioVenta;
	}

	function getPrecioCompra()
	{
		return $this->precioCompra;
	}

	function getStockMinimo()
	{
		return $this->stockMinimo;
	}

}
?>