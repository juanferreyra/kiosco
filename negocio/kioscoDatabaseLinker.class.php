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

	function agregarProducto($data)
	{
		$query = "INSERT INTO producto (
						codigo_producto, 
						stock_minimo, 
						precio_compra, 
						precio_venta, 
						datetime, 
						descripcion, 
						idrubro) 
				  VALUES ( ".$data['codigo']." , 
				  		".$data['stock_minimo']." , 
				  		".$data['precio_compra']." , 
				  		".$data['precio_venta']." , 
				  		now(), 
				  		'".$data['descripcion']."' , 
				  		".$data['idrubro']."
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
					prod.idproducto,
				    prod.codigo_producto,
				    prod.descripcion as producto,
				    rub.descripcion as rubro,
				    prod.idrubro,
				    prod.precio_venta,
				    prod.precio_compra,
				    prod.stock_minimo
				FROM
				    producto prod LEFT JOIN rubro rub on (prod.idrubro = rub.idrubro)
				WHERE
				    prod.habilitado = '1';";

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
			$producto->setNombre($result['producto']);
			$producto->setRubro($result['rubro']);
			$producto->setIdRubro($result['idrubro']);
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
			$producto = $productosarray[$i];
			//id de fila
			$response->rows[$i]['id'] = $producto->getId(); 
			//datos de la fila en otro array
			$row = array();
			$row[] =$producto->getCodigo();
			$row[] =$producto->getNombre();
 			$row[] =$producto->getPrecioVenta();
 			$row[] =$producto->getPrecioCompra();
 			$row[] =$producto->getRubro();
 			$row[] =$producto->getStockMinimo();
			$row[] = '';
			//agrego datos a la fila con clave cell
			$response->rows[$i]['cell'] = $row;
		}

		$response->userdata['codigo']= 'Codigo';
		$response->userdata['nombre']= 'Movimiento';
		$response->userdata['precioVenta'] = 'precioVenta';
		$response->userdata['precioCompra']= 'precioCompra';
		$response->userdata['rubro']= 'rubro';
		$response->userdata['stock_minimo']= 'stock_minimo';
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

	function ingresarRubro($value)
	{
		$query="INSERT INTO rubro (descripcion, habilitado) VALUES ('".$value."', 1);";

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

	function getRubros()
	{

		$query="SELECT * FROM rubro WHERE habilitado=1;";

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

		$ret = array();

		for ($i = 0; $i < $this->dbKiosco->querySize; $i++)
		{
			$result = $this->dbKiosco->fetchRow();
			$arr = array('idrubro' => $result['idrubro'], 'descripcion' => $result['descripcion']);
			$ret[] = $arr;
		}

		$this->dbKiosco->desconectar();
		
		return $ret;
	}

	function getRubrosJson()
	{
		$response = new stdClass();

		$rubrosarray=$this->getRubros();

		$response->page = 1;
		$response->total = 1; 
		$response->records = count($rubrosarray); 
	
		for ($i=0; $i < count($rubrosarray) ; $i++) 
		{ 
			$rubro = $rubrosarray[$i];
			//id de fila
			$response->rows[$i]['id'] = $rubro['idrubro']; 
			//datos de la fila en otro array
			$row = array();
			$row[] =$rubro['descripcion'];
			$row[] = '';
			//agrego datos a la fila con clave cell
			$response->rows[$i]['cell'] = $row;
		}

		$response->userdata['descripcion']= 'Descripcion';		
		$response->userdata['myac'] = '';

		return json_encode($response);
	}

	function eliminarRubro($idrubro)
	{
		$query = "UPDATE 
							rubro 
						SET 
							habilitado = '0' 
						WHERE 
							idrubro = ".$idrubro.";";

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
			
		$idturnoultimo = $result['idturno'];

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

	function traerPermisos()
	{
		$query="SELECT idpermiso, detalle FROM permiso;";

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
			$arrdos = array('idpermiso' => $result['idpermiso'],'detalle' => $result['detalle']);
			$arr[] = $arrdos;
		}

		$this->dbKiosco->desconectar();
		return $arr;
	}

//------------------------------------------------------------------------------------------------

	/*Funciones orientadas al manejo de usuarios*/

	function confirmarRegistroUsuario($data)
	{
		$response = new stdClass();

		if ($this->usuarioExiste($data['detalle'])) 
		{
			$response->message = "El usuario ya existe papa!!";
			$response->ret = false;
			return $response;
		}
		else
		{
			if($data['contrasena']!= $data['contra2'])
			{
				$response->message = "La contraseña no coincide";
				$response->ret = false;
				return $response;
			}
			try 
			{
				$idusuario = $this->agregarUsuario($data['detalle'], 1/*pongo un idturno default*/, $data['contrasena'], $data['nombre']);
			} 
			catch (Exception $e) 
			{
				$response->message = "Ocurrio un error al crear el usuario";
				$response->ret = false;
				return $response;
			}

			try //savepoint en registrarEgreso
			{
				$cargo = $this->registrarTodosPermisosUsuario($idusuario,$data['accesos']);
			} 
			catch (Exception $e) 
			{
				throw new Exception("error al registrar el movimiento", 17052013);
				$response->message = "Se produjo un error al registrar los permisos";
				$response->ret = false;
				return $response;
			}
			
			if(!$cargo)
			{
				$this->eliminarConfirmacionRegistro();
				$response->message = "El usuario no se a creado correctamente";
				$response->ret = false;
				return $response;

			}
			else
			{
			    $this->finalizarRegistroUsuario();
			    $response->message = "El usuario se a creado correctamente";
			    $response->ret = true;
			    return $response;
			}

		}
	}

	function agregarUsuario($detalle, $idturno, $contrasena, $nombre)
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
					IFNULL(MAX(idusuario),0)+1 AS proximo
				FROM 
				  	usuario;";
		
		try
			{
				$this->dbKiosco->ejecutarQuery($query);
			}
			catch (Exception $e)
			{
				throw new Exception("No se pudo obtener el proximo nro para el ingreso de usuario", 201230);
			}

		$result = $this->dbKiosco->fetchRow();

		$nroIdUsuario = $result['proximo'];

		$contrasenamd5 = md5($contrasena);

		$query = "INSERT INTO usuario (idusuario, detalle, idturno,contrasena , nombre) VALUES (".$nroIdUsuario.",'".$detalle."',".$idturno.",'".$contrasenamd5."','".$nombre."');";

		try
			{
				$this->dbKiosco->ejecutarAccion($query);
			}
			catch (Exception $e)
			{
				throw new Exception("No se pudo ejecutar la accion del insert", 201230);
			}		

		$this->dbKiosco->desconectar();

		return $nroIdUsuario;
	}

	function usuarioExiste($usuario)
	{
		$query="SELECT detalle FROM usuario WHERE detalle = '".$usuario."' and habilitado = 1;";

		$arr = array ();
	
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
		
		if($result['detalle']==$usuario)
		{
			return true; //usuario existe
		}
		else
		{
			return false; //usuario no existe
		}
	}

	function registrarTodosPermisosUsuario($idusuario, $permisos)
	{
		$completado = true;

		$query="SET AUTOCOMMIT=0;";
		$query2= "SAVEPOINT punto;";

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarAccion($query);
				$this->dbKiosco->ejecutarAccion($query2);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
			}

		for($i=0; $i<count($permisos); $i++)
		{
			try 
			{
				$this->registrarPermiso($idusuario, $permisos[$i]);
			}
			catch (Exception $e)
			{
				$completado = false;
				break;
			}
		}


		return $completado;
	}

	function registrarPermiso($idusuario, $perfil)
	{	
		$query="INSERT INTO usuario_permiso (idusuario, idpermiso) VALUES (".$idusuario.", '".$perfil."');";

		try
			{
				$this->dbKiosco->conectar();
				$this->dbKiosco->ejecutarAccion($query);
			}
		catch (Exception $e)
			{
				throw new Exception("Error al conectar con la base de datos", 17052013);
				$this->dbKiosco->desconectar();
				return false;
			}

		return true;
	}

	function finalizarRegistroUsuario()
	{
		$query = "COMMIT;";

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

	function eliminarConfirmacionRegistro()
	{
		$rollback = "ROLLBACK TO SAVEPOINT punto;"; 

		try 
		{
			$this->dbKiosco->conectar();
			$this->dbKiosco->ejecutarAccion($rollback);	
		} 
		catch (Exception $e) 
		{
			throw new Exception("Error al conectar con la base de datos", 17052013);
		}
			
		$this->dbKiosco->desconectar();
	}

	function eliminarUsuario($idusuario)
	{

		$query="UPDATE usuario set habilitado = 0 WHERE idusuario=".$idusuario." and habilitado = 1;";

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
		return true;
	}

	function accesoKiosco($usuario, $contrasenaIngresada)
	{
		
		if(!$this->usuarioExiste($usuario))
		{
			return false; //usuario no existe
		}
		else
		{

			$query="SELECT contrasena FROM usuario WHERE detalle = '".$usuario."' AND habilitado=1;";
			$arr = array ();
		
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
			$contrasenaIngresadamd5 = md5($contrasenaIngresada);

			if($contrasenaIngresadamd5 == $result['contrasena'])
			{
				
				$_SESSION['usuario'] = $usuario;
				return true; //usuario existe y contraseña coincide
			}
			else
			{
				return false; //usuario existe y contraseña no coincide
			}
		}
	}

	function permisosDeUsuario($usuario)
	{

		$query = "	SELECT 
						p.idpermiso as permiso
					FROM 
						permiso p LEFT JOIN
						usuario u (u.idusuario=p.idusuario)
					WHERE 
						u.detalle = '".$usuario."';";

		try 
		{
			$this->dbKiosco->conectar();
			$this->dbKiosco->ejecutarQuery($query);
		}
		catch (Exception $e) 
		{
			throw new Exception("Error al realizar consulta de accesos de usuario", 17052013);
			return false;
		}

		$result = $this->dbKiosco->fetchRow($query);

		$ret = array();

		for($i = 0 ; $i < $this->dbKiosco->querySize; $i++)
		{
			$ret[] = $result['permiso'];
		}

		return $ret;
	}

	function controlAcceso($usuario, $area)
	{
		try 
		{
			$permisos = $this->permisosDeUsuario($usuario);	
		} 
		catch (Exception $e) 
		{
			throw new Exception("Error al consultar los permisos del usuario", 17052013);
			return false;
		}

		for ($i=0; $i < count($permisos); $i++)
		{ 
			if ($permisos[$i]==$area) 
			{
				return true;
			}
		}

		return false;
	}

	function getNombreUsuario($id_user)
	{
		$query = "SELECT nombre FROM usuario WHERE detalle='".$id_user."';";

		try 
		{
			$this->dbKiosco->conectar();
			$this->dbKiosco->ejecutarQuery($query);
		}
		catch (Exception $e) 
		{
			throw new Exception("Error al realizar consulta de accesos de usuario", 17052013);
			return false;
		}

		$result = $this->dbKiosco->fetchRow($query);

		$this->dbKiosco->desconectar();

		return $result['nombre'];
	}

}
?>
