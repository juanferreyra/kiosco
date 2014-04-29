<?php
include_once 'conectionData.php';
include_once 'dataBaseConnector.php';
include_once 'producto.class.php';
include_once 'proveedor.class.php';

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

	function finalizarCaja($saldoFinal, $idCaja)
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
				$this->dbKiosco->ejecutarQuery($query);
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
					idcaja
				FROM
					caja
				WHERE
					idturno=".$idTurno." and
					saldo_final IS NULL and
					idcaja=(SELECT MAX(idcaja) FROM caja);";

		try 
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarAccion($query);
			} 
			catch (Exception $e) 
			{
				throw new Exception("Error al intentar consultar si habia una caja abierta", 17052013);
				return false;
			}

		$result = $this->dbKiosco->fetchRow();

		$this->dbKiosco->desconectar();

		return $result['idcaja'];

	}

	function hayCajaSinCerrar()
	{
		$query="SELECT 
					saldo_final
				FROM
					caja
				WHERE
					idcaja=MAX(idcaja);";

	}

	function agregarCarrito($idcaja, $monto, $fecha)
	{
		$query = "INSERT INTO carrito (idcaja, monto_venta_total, datetime)
						VALUES (".$idcaja.", ".$monto.", '".$fecha."') ;"; /* INSERT INTO carrito (idcarrito, idcaja, monto_venta_total, datetime)
						VALUES (".$idcarrito.",".$idcaja.", ".$monto.", ".$fecha.") ; */

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarQuery($query);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
			}

	} 

	function agregarEgreso($valor, $idcarrito, $idproducto, $cantidad, $fecha)
	{
		$query = "INSERT INTO egreso (valor_egreso, idcarrito, idproducto, cantidad, datetime)
						VALUES (".$valor.", ".$idcarrito.", ".$idproducto." , ".$cantidad." , '".$fecha."') ;"; /* INSERT INTO egreso (valor_egreso, idcarrito, idproducto, cantidad, datetime)
						VALUES (".$valor.", ".$idcarrito.", ".$idproducto." , ".$cantidad." , ".$fecha.") ; */

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarQuery($query);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
			}

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

	}

	function getTurnos()
	{
		//o_o
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
