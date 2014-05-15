<?php
include_once 'conectionData.php';
include_once 'dataBaseConnector.php';
include_once 'producto.class.php';
include_once 'proveedor.class.php';
include_once 'movimiento.class.php';
include_once 'itemMovimiento.class.php';

class KioscoDatabaseLinker
{
	var $dbKiosco;

	function KioscoDatabaseLinker()
	{
		$this->dbKiosco = new dataBaseConnector(HOSTLocal,0,DBKiosco,USRDBAdmin,PASSDBAdmin);
	}

	//Funciones referidas a los productos
	function agregarProducto($codigo, $stock_minimo, $precio_compra, $precio_venta, $descripcion, $idrubro)
	{
		$query = "INSERT INTO producto (
						codigo_producto, 
						stock_minimo, 
						precio_compra, 
						precio_venta, 
						datetime, 
						descripcion, 
						rubro) 
				  VALUES ( ".$codigo." , 
				  		".$stock_minimo." , 
				  		".$precio_compra." , 
				  		".$precio_venta." , 
				  		now(), 
				  		'".$descripcion."' , 
				  		'".$idrubro."'
				  		);";
		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarAccion($query);
			}
			catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos del kiosco", 17052013);
				return false;
			}

		$this->dbKiosco->desconectar();

		return true;
	}
	
	function getProductos()
	{
		$query="SELECT 
					idproducto,
				    codigo_producto,
				    descripcion,
				    rubro,
				    precio_venta,
				    precio_compra,
				    stock_minimo
				FROM
				    producto
				WHERE
				    habilitado = '1';";

		try 
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarQuery($query);
			} 
			catch (Exception $e) 
			{
				throw new Exception("Error al consultar los productos", 1);
			}

		$ret = array();

		for ($i = 0; $i < $this->dbKiosco->querySize; $i++)
		{
			$result = $this->dbKiosco->fetchRow($query);
			$producto = new Producto();
			$producto->setId($result['idproducto']);
			$producto->setCodigo($result['codigo_producto']);
			$producto->setNombre($result['descripcion']);
			$producto->setRubro($result['rubro']);
			$producto->setPrecioVenta($result['precio_venta']);
			$producto->setPrecioCompra($result['precio_compra']);
			$producto->setStockMinimo($result['stock_minimo']);
			$ret[] = $producto;
		}

		$this->dbKiosco->desconectar();
		
		return $ret;
	}


	function getProductosJson()
	{
		$response = new stdClass();

		$productosarray=$this->getProductos();

		$response->page = 1;
		$response->total = 1; 
		$response->records = count($productosarray); 
	
		for ($i=0; $i < count($productosarray) ; $i++) 
		{ 
			$response->rows[$i]['id'] = $i; 
			$row = array();
			$producto = $productosarray[$i];
			$row[] =$producto->getNombre();
 			$row[] =$producto->getPrecioVenta();
			$row[] = '';
			$response->rows[$i]['cell'] = $row;
		}

		$response->userdata['nombre']= 'Movimiento';
		$response->userdata['precioVenta'] = '';
		$response->userdata['myac'] = '';

		return json_encode($response);
	}
	
	function eliminarProducto($idproducto)
	{
		
		$query="UPDATE 
				        producto 
				SET 
				        habilitado = '0' 
				WHERE 
				        idproducto = ".$idproducto.";";
		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarAccion($query);
			}
			catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
				return false;
			}

		$this->dbKiosco->desconectar();

		return true;

	}

	function agregarProveedor($telef, $direccion, $descripcion)
	{
		$query = "INSERT INTO proveedor (
								telefono, 
								direccion, 
								descripcion
								)
						VALUES 
							(
							".$telef.", 
							'".$direccion."', 
							'".$descripcion."'
							) ;";
		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarAccion($query);
			}
			catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
				return false;
			}

		$this->dbKiosco->desconectar();

		return true;
	}

	function getProveedores()
	{
		$query="SELECT 
					idproveedor,
					descripcion,
					direccion,
				    telefono
				FROM
				    proveedor
				WHERE
				    habilitado = '1';";

		try 
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarQuery($query);
			} 
			catch (Exception $e) 
			{
				throw new Exception("Error al seleccionar la lista de proveedores", 17052013);
			}

		$ret = array();

		for ($i = 0; $i < $this->dbKiosco->querySize; $i++)
		{
			$result = $this->dbKiosco->fetchRow($query);
			$proveedor = new Proveedor();
			$proveedor->setId($result['idproveedor']);
			$proveedor->setDescripcion($result['descripcion']);
			$proveedor->setDireccion($result['direccion']);
			$proveedor->setTelefono($result['telefono']);
			$ret[] = $proveedor;
		}

		$this->dbKiosco->desconectar();
		
		return $ret;

	}

	function eliminarProveedor($idprov)
	{
		$query = "UPDATE 
							proveedor 
						SET 
							habilitado = '0' 
						WHERE 
							idproveedor = ".$idprov.";";

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarAccion($query);
			}
			catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
				return false;
			}

		$this->dbKiosco->desconectar();

		return true;
	}

	function inicializarCaja($saldoInicial, $idturno)
	{
		try
			{
				$this->dbKiosco->conectar();
			}
			catch (Exception $e)
			{
				throw new Exception("No se pudo insertar el dato en la tabla", 201230);
			}
		
		$query="SELECT 
					IFNULL(MAX(idcaja),0)+1 AS proximo
				FROM 
				  	caja;";
		
		try
			{
				$this->dbKiosco->ejecutarQuery($query);
			}
			catch (Exception $e)
			{
				throw new Exception("No se pudo obtener el proximo nro para el ingreso", 201230);
			}

		$result = $this->dbKiosco->fetchRow();

		$nroIdCaja = $result['proximo'];
		
		$query="INSERT INTO
						caja
						(
							idcaja,
							fecha_saldo_inicial,
							saldo_inicial,
							idturno,
							datetime
						)
						VALUES
						(
							".$nroIdCaja.",
							now(),
							'".$saldoInicial."',
							".$idturno.",
							now()
						);";
		try
			{
				$this->dbKiosco->ejecutarAccion($query);
			}
			catch (Exception $e)
			{
				throw new Exception("No se pudo insertar el proximo nro para la caja", 201230);
			}
		
		$this->dbKiosco->desconectar();

		return $nroIdCaja;
	}

	function finalizarCaja($saldoFinal, $idCaja) //el idcaja se tiene que mandar automaticamente
	{
		$query="UPDATE
						caja
					SET
						fecha_saldo_final = now(), 
						saldo_final = ".$saldoFinal.", 
						datetime = now() 
					WHERE
						idcaja = ".$idCaja.";";

		try 
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarAccion($query);
			} 
			catch (Exception $e) 
			{
				throw new Exception("Error al intentar finalizar la caja", 17052013);
				return false;
			}

		$this->dbKiosco->desconectar();

		return true;
	}

	function eliminarCaja($idcaja)
	{
		$query = "UPDATE 
						caja 
				  	SET 
				  		habilitado = '0' 
		   		  	WHERE 
		   		  		idcaja = ".$idcaja.";";

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarAccion($query);
			}
			catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
				return false;
			}

		$this->dbKiosco->desconectar();

		return true;

	}

	function ultimaCajaSinCerrar($idTurno)
	{
		$query="SELECT
					idcaja, saldo_inicial, idturno
				FROM
					caja
				WHERE
					idturno=".$idTurno." and
					saldo_final IS NULL and
					idcaja=(SELECT MAX(idcaja) FROM caja);";

		try 
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarQuery($query);
			} 
			catch (Exception $e) 
			{
				throw new Exception("Error al intentar consultar si habia una caja abierta", 17052013);
				return false;
			}

		$result = $this->dbKiosco->fetchRow();

		$this->dbKiosco->desconectar();

		return $result;

	}

	function hayCajaSinCerrar()
	{
		$query="SELECT 
					saldo_final
				FROM
					caja
				WHERE
					idcaja=(SELECT MAX(idcaja) FROM caja);";

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarQuery($query);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
			}

		$result = $this->dbKiosco->fetchRow();

		$this->dbKiosco->desconectar();

		if($result['saldo_final'] == NULL)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	function nuevoCarrito($idcaja)
	{
		try
			{
				$this->dbKiosco->conectar();
			}
			catch (Exception $e)
			{
				throw new Exception("No se pudo insertar el dato en la tabla", 201230);
			}
		
		$query="SELECT 
					IFNULL(MAX(idcarrito),0)+1 AS proximo
				FROM 
				  	carrito;";
		
		try
			{
				$this->dbKiosco->ejecutarQuery($query);
			}
			catch (Exception $e)
			{
				throw new Exception("No se pudo obtener el proximo nro para el ingreso", 201230);
			}

		$result = $this->dbKiosco->fetchRow();

		$nroIdCarrito = $result['proximo'];

		$query = "INSERT INTO 
								carrito (idcarrito,idcaja, datetime)
						VALUES 
								(".$nroIdCarrito.", ".$idcaja.", now());";

		try
			{
				$this->dbKiosco->ejecutarAccion($query);
			}
			catch (Exception $e)
			{
				throw new Exception("No se pudo ejecutar la accion del insert", 201230);
			}		

		$this->dbKiosco->desconectar();

		return $nroIdCarrito;
	} 

	function registrarEgreso($idcarrito, Movimiento $movimiento)
	{
		$completado = true;

		$query="SAVEPOINT savepoint;";

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarQuery($query);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
			}

		for($i=0; $i<$movimiento->getCantItems(); $i++)
		{
			$item = $movimiento->getItem($i);
			try 
			{
				$this->registrarEgresoDetalle($idcarrito, $item);
			}
			catch (Exception $e)
			{
				$completado = false;
				break;
			}
		}

		return $completado;
	}

	function registrarEgresoDetalle($idcarrito, ItemMovimiento $item)
	{

		$query="INSERT INTO egreso (valor_egreso, idcarrito, cantidad, datetime, idproducto)
				VALUES ((
					(SELECT precio_venta from producto WHERE idproducto = ".$item->getProducto()->getId().")*".$item->getCantidad()."),
					".$idcarrito.", 
					".$item->getCantidad()."
					,now(),".$item->getProducto()->getId()."); ";
				


		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarAccion($query);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
			}
		
		$this->dbKiosco->desconectar();
	}

	function confirmarCarrito($idcaja, Movimiento $movimiento)
	{
		try
			{
				$idcarrito=$this->nuevoCarrito($idcaja);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
			}

		try //savepoint en registrarEgreso
		{
			$cargo = $this->registrarEgreso($idcarrito,$movimiento);
		} 
		catch (Exception $e) 
		{
			throw new Exception("error al registrar el movimiento", 17052013);
		}
		
		if(!$cargo)
		{
			$this->eliminarMovimiento();

		}
		else
		{
		    $this->finalizarCarrito();
		}

		return $idcarrito;
	} 

	function finalizarCarrito()
	{
		$query = "COMMIT;";

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarQuery($query);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
			}

		$this->dbKiosco->desconectar();
	}

	function eliminarMovimiento()
	{
		$rollback = "ROLLBACK TO SAVEPOINT savepoint;"; 
			$this->dbKiosco->conectar();
			$this->dbKiosco->ejecutarQuery($rollback);
		$this->dbKiosco->desconectar();
	}

	function agregarFactura($nrofactura, $fecha, $datetime)
	{
		$query = "INSERT INTO factura (nrofactura, fecha, datetime)
						VALUES (".$nrofactura.", '".$fecha."', '".$datetime."') ;"; /* INSERT INTO factura (nrofactura, fecha, datetime)
						VALUES (".$nrofactura.", ".$fecha.", ".$datetime.") ; */

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarQuery($query);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
			}

		$this->dbKiosco->desconectar();

	}

	function agregarIngreso($idprov, $idfact, $idcaja, $idprod, $cant, $datetime)
	{
		$query = "INSERT INTO ingreso (idproveedor, idfactura, idcaja, idproducto, cantidad, datetime)
						VALUES (".$idprov.", ".$idfact.", ".$idcaja.", ".$idprod.", ".$cant.", '".$datetime."') ;"; /* INSERT INTO ingreso (idproveedor, idfactura, idcaja, idproducto, cantidad, datetime)
						VALUES (".$idprov.", ".$idfact.", ".$idcaja.", ".$idprod.", ".$cant.", ".$datetime.") ; */

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarQuery($query);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
			}

		$this->dbKiosco->desconectar();

	}

	function agregarStockCajaDiario($idcaja, $idproducto, $cantidad_ingreso, $cantidad_egreso, $datetime)
	{
		$query = "INSERT INTO stock_caja_diario (idcaja, idproducto, cantidad_ingreso, cantidad_egreso, datetime)
						VALUES (".$idcaja.", ".$idproducto.", ".$cantidad_ingreso.", ".$cantidad_egreso.", '".$datetime."') "; /* INSERT INTO stock_caja_diario (idcaja, idproducto, cantidad_ingreso, cantidad_egreso, datetime)
						VALUES (".$idcaja.", ".$idproducto.", ".$cantidad_ingreso.", ".$cantidad_egreso.", ".$datetime.") ; */

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarQuery($query);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
			}

		$this->dbKiosco->desconectar();

	}

	function agregarTurno($idturno, $desc)
	{
		$query = "INSERT INTO turno (idturno, descripcion)
						VALUES (".$idturno.", '".$desc."') ;"; /* INSERT INTO turno (idturno, descripcion)
						VALUES (".$idturno.", ".$desc.") ; */

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarQuery($query);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
			}

		$this->dbKiosco->desconectar();

	}

	function getTurnos()
	{
		$query="SELECT MAX(idturno) as idturno FROM turno;";

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarQuery($query);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
			}

			$result = $this->dbKiosco->fetchRow($query);
			$arrdos = array('idturno' => $result['idturno']);

		$idturnoultimo = $arrdos['idturno'];

		$this->dbKiosco->desconectar();
		
		return $idturnoultimo;

	}

	function traerIngresos($idproducto, $idcaja)
	{
		$query = "SELECT cantidad as cantidad, idproducto as idproducto FROM ingreso WHERE idproducto = ".$idproducto." and idcaja = ".$idcaja." ;";

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarQuery($query);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
			}

		$arr = array();

		for($i = 0 ; $i < $this->dbKiosco->querySize; $i++)
		{
			$result = $this->dbKiosco->fetchRow($query);
			$arrdos = array('producto' => $result['idproducto'], 'cantidad' => $result['cantidad']);
			$arr[] = $arrdos;
		}

		$this->dbKiosco->desconectar();
		return $arr;

	}

	function traerEgresos($idproducto, $idcaja)
	{
		$query = "SELECT e.cantidad as cantidad FROM egreso e, carrito c WHERE e.idproducto = ".$idproducto." and c.idcaja = ".$idcaja." and c.idcarrito = e.idcarrito ;";

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarQuery($query);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
			}

		$arr = array();

		for($i = 0 ; $i < $this->dbKiosco->querySize; $i++)
		{
			$result = $this->dbKiosco->fetchRow($query);
			$arrdos = array('cantidad' => $result['cantidad']);
			$arr[] = $arrdos;
		}

		$this->dbKiosco->desconectar();
		return $arr;

	}

}
?>
