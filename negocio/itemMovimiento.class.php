<?php
include_once 'producto.class.php';

class ItemMovimiento {
	
	/**
	 * Producto
	 * @var Producto
	 */
	
	var $producto;
	var $cantidad;
	
	/**
	 * Contruye un nuevo ItemMovimiento a partir de un producto y una cantidad
	 * @param Producto $producto
	 * @param int $cantidad
	 */
	public function ItemMovimiento(Producto $producto, $cantidad)
	{
		$this->producto = $producto;
		$this->cantidad = $cantidad;
	}
	
	public function getProducto()
	{
		return ($this->producto);
	}

	public function setCantidad($valor)
	{
		$this->cantidad=$valor;
	}
	
	public function getCantidad()
	{
		return ($this->cantidad);
	}

}
?>