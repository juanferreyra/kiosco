<?php


class Carrito{
	var $items;

	function Carrito(){
		$this->items = array();
	}
	/**
	 * 
	 * retorna el elemento en la posicion index
	 * @param int $index
	 * @return ItemProducto
	 */
	function getItem($index)
	{
		if($index<count($this->items) && $index>=0)
		{
			return $this->items[$index];
		}
		else
		{
			throw new OutOfRangeException("Parametro fuera de rango", 20121015);
		}
	}
	
	/**
	 * 
	 * Retorna la cantidad de items en la solicitud
	 * @return int
	 */
	function getCantItems()
	{
		return count($this->items);
	}
	
	/**
	 * 
	 * Agrega en la solicitud el producto y la cantidad del mismo indicado
	 * @param Producto $prod
	 * @param int $cantidad
	 */
	function agregar(Producto $prod, $cantidad)
	{
		$this->items[] = new ItemCarrito($prod, $cantidad);
	}
	
	/**
	 * 
	 * Quita el elemento que se encuentra en la posicion index
	 * @param int $index
	 */
	function quitar($index)
	{
		if($index<count($this->items) && $index>=0)
		{
			array_splice($this->items, $index,1);
		}
		else
		{
			throw new OutOfRangeException("Parametro fuera de rango", 20121015);
		}
	}

	function modificar($index, $cantidad)
	{
		if($index<count($this->items) && $index>=0)
		{
			$this->items[$index]->setCantidad($cantidad);
		}
		else
		{
			throw new OutOfRangeException("Parametro fuera de rango", 20121015);
		}
	}
	
	/**
	 * 
	 * Retorna la suma de los productos en el carrito
	 */
	
	function listaJson()
	{
		$response->page = 1; 
		$response->total = 1; 
		$response->records = count($this->items); 
		
		/* @var $item ItemProducto */
		foreach ($this->items as $key => $item) {
			
			$response->rows[$key]['id'] = $key;  
			$row = array();
			$producto = $item->getProducto();
			
			$row[] = Utils::phpStringToHTML($producto->getNombre());
 			$row[] = Utils::phpIntToHTML($item->getCantidad());
			$row[] = '';
			$response->rows[$key]['cell'] = $row;
			
		}
		
		$response->userdata['producto']= 'Carrito';
		$response->userdata['cantidad'] = '';
		$response->userdata['myac'] = '';
		
		return json_encode($response);
	}
	
	/**
	 * 
	 * Vacia toda la información dentro del carrito
	 */
	function vaciar()
	{
		unset($this->items);
		$this->items = array();
	} 
	
}


?>