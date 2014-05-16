CREATE DATABASE  IF NOT EXISTS `Kiosco` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `Kiosco`;
-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: Kiosco
-- ------------------------------------------------------
-- Server version	5.5.37-0+wheezy1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,1534466777,'Guaha','Kiosco',1),(2,474945454,'calle y numero 456','Panchos',1);
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(45) DEFAULT NULL,
  `idturno` int(11) DEFAULT NULL,
  `contrasena` varchar(60) DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT NULL,
  `idperfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'tutox',1,'tutox',1,NULL),(2,'tuto',1,'bae5be47227f4f1372e758edc221baf3',0,NULL),(3,'juan',2,'fe0ec43cc4200e777aa2190ace58e7b4',1,NULL),(4,'juan2',2,'a7144ee699113faf18538ab0a2614d19',1,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_producto` int(11) DEFAULT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  `precio_compra` float(10,5) DEFAULT NULL,
  `precio_venta` float(10,5) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT '1',
  `idrubro` int(11) DEFAULT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (0,2147483647,10,3.50000,4.00000,'0000-00-00 00:00:00','Galletitas Oreo',0,1),(1,1519948948,5,5.70000,10.00000,'0000-00-00 00:00:00','Snacks',0,6),(2,1801,10,5.80000,6.50000,'2014-04-17 12:26:06','coca cola',0,6),(3,3,10,5.00000,6.00000,'2014-05-14 12:36:53','Cavernicola',1,1),(4,3,10,5.00000,6.00000,'2014-05-14 12:39:43','Cavernicola',1,1),(5,3,10,5.00000,6.00000,'2014-05-14 12:43:06','Hue',1,1),(6,3,10,5.00000,6.00000,'2014-05-14 12:45:30','Hue',1,1),(7,3,10,5.00000,6.00000,'2014-05-14 12:47:59','Hue2',1,1),(8,3,10,5.00000,6.00000,'2014-05-14 12:50:08','Hue3',1,1),(9,3,10,5.00000,6.00000,'2014-05-14 13:25:22','Hue4',1,1),(10,3,10,5.00000,6.00000,'2014-05-14 13:55:18','Hue5',1,1),(11,3,10,5.00000,6.00000,'2014-05-14 14:03:07','Hue7',1,1),(12,3,10,5.00000,6.00000,'2014-05-14 14:05:29','Hue8',1,1),(13,3,10,5.00000,6.00000,'2014-05-14 14:07:40','Hue9',1,1),(14,12,112,12.00000,12.00000,'2014-05-14 14:17:17','ASD',1,12),(15,12,112,12.00000,12.00000,'2014-05-14 14:17:58','ASD',1,12),(16,12,112,12.00000,12.00000,'2014-05-14 14:18:40','ASD',1,12),(17,12,112,12.00000,12.00000,'2014-05-14 14:19:21','ASD',1,12),(18,12,112,12.00000,12.00000,'2014-05-14 14:25:47','ASD',1,12),(19,12,112,12.00000,12.00000,'2014-05-14 14:26:29','ASD',1,12),(20,12,112,12.00000,12.00000,'2014-05-14 14:30:41','ASD',1,12),(21,12,112,12.00000,12.00000,'2014-05-14 14:31:47','ASD',1,12),(22,9,9,9.00000,9.00000,'2014-05-14 14:34:36','hokl',1,9),(23,9,9,9.00000,9.00000,'2014-05-14 14:34:46','hokl',1,9),(24,9,9,9.00000,9.00000,'2014-05-14 14:35:14','hokl',1,9),(25,1,3,4.00000,5.00000,'2014-05-14 14:36:57','pro1',1,2),(26,2,4,5.00000,6.00000,'2014-05-14 14:37:06','pro2',1,3),(27,155,15,15.00000,15.00000,'2014-05-16 09:27:33','asdasdasd2222',1,1),(28,15,15,15.00000,15.00000,'2014-05-16 09:32:41','bondiola bondiolera justiciera',1,15);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL AUTO_INCREMENT,
  `nrofactura` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`idfactura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (0,2147483647,'2013-02-28 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito` (
  `idcarrito` int(11) NOT NULL,
  `idcaja` int(11) DEFAULT NULL,
  `monto_venta_total` float(10,5) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`idcarrito`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` VALUES (0,0,20.00000,'0000-00-00 00:00:00'),(1,0,30.00000,'0000-00-00 00:00:00'),(2,1,30.00000,'0000-00-00 00:00:00'),(3,7,NULL,'2014-05-13 09:42:56'),(4,7,NULL,'2014-05-13 10:02:42'),(5,7,NULL,'2014-05-13 10:03:06'),(6,7,NULL,'2014-05-13 10:03:30'),(7,7,NULL,'2014-05-13 10:07:36'),(8,7,NULL,'2014-05-13 10:11:59'),(9,7,NULL,'2014-05-13 10:13:23'),(10,7,NULL,'2014-05-13 12:57:55');
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caja`
--

DROP TABLE IF EXISTS `caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caja` (
  `idcaja` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_saldo_inicial` datetime DEFAULT NULL,
  `saldo_inicial` float(10,5) DEFAULT NULL,
  `fecha_saldo_final` datetime DEFAULT NULL,
  `saldo_final` float(10,5) DEFAULT NULL,
  `idturno` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idcaja`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caja`
--

LOCK TABLES `caja` WRITE;
/*!40000 ALTER TABLE `caja` DISABLE KEYS */;
INSERT INTO `caja` VALUES (1,'2014-04-25 12:59:19',800.45801,'2014-04-25 13:13:12',900.59497,2,'2014-04-25 13:13:12',1),(2,'2014-04-25 13:17:15',800.89001,'2014-04-25 14:01:13',3990.85596,3,'2014-04-25 14:01:13',1),(3,'2014-04-25 13:54:17',880.50000,'2014-05-07 11:45:19',5.00000,3,'2014-05-07 11:45:19',1),(4,'2014-04-25 13:54:19',880.50000,'2014-04-25 13:55:42',970.59497,3,'2014-04-25 13:55:42',1),(5,'2014-04-25 13:58:38',800.90002,'2014-04-25 14:00:53',9990.85645,3,'2014-04-25 14:00:53',1),(6,'2014-04-25 13:59:21',800.90002,'2014-05-07 11:46:30',5.00000,3,'2014-05-07 11:46:30',1),(7,NULL,NULL,NULL,500.00000,NULL,NULL,1),(24,NULL,NULL,NULL,250.00000,NULL,NULL,1),(25,NULL,NULL,NULL,750.00000,NULL,NULL,1);
/*!40000 ALTER TABLE `caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `idperfil` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turno`
--

DROP TABLE IF EXISTS `turno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turno` (
  `idturno` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idturno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turno`
--

LOCK TABLES `turno` WRITE;
/*!40000 ALTER TABLE `turno` DISABLE KEYS */;
INSERT INTO `turno` VALUES (0,'turno uno'),(1,'turno dos'),(2,'turno tres');
/*!40000 ALTER TABLE `turno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rubro`
--

DROP TABLE IF EXISTS `rubro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rubro` (
  `idrubro` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idrubro`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rubro`
--

LOCK TABLES `rubro` WRITE;
/*!40000 ALTER TABLE `rubro` DISABLE KEYS */;
INSERT INTO `rubro` VALUES (0,'Varios'),(1,'Bebidas'),(2,'Cafeteria'),(3,'Comedor'),(4,'Kiosco'),(5,'Pancho');
/*!40000 ALTER TABLE `rubro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_caja_diario`
--

DROP TABLE IF EXISTS `stock_caja_diario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_caja_diario` (
  `idcaja` int(11) NOT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad_ingreso` int(11) DEFAULT NULL,
  `cantidad_egreso` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`idcaja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_caja_diario`
--

LOCK TABLES `stock_caja_diario` WRITE;
/*!40000 ALTER TABLE `stock_caja_diario` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_caja_diario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egreso`
--

DROP TABLE IF EXISTS `egreso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egreso` (
  `idegreso` int(11) NOT NULL AUTO_INCREMENT,
  `valor_egreso` float(10,5) DEFAULT NULL,
  `idcarrito` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`idegreso`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egreso`
--

LOCK TABLES `egreso` WRITE;
/*!40000 ALTER TABLE `egreso` DISABLE KEYS */;
INSERT INTO `egreso` VALUES (1,20.00000,1,0,5,'0000-00-00 00:00:00'),(2,10.00000,1,1,1,'0000-00-00 00:00:00'),(3,20.00000,0,0,5,'0000-00-00 00:00:00'),(4,10.00000,2,0,10,'0000-00-00 00:00:00'),(5,NULL,3,12,3,'2014-05-13 09:38:03'),(6,NULL,3,13,15237,'2014-05-13 09:38:03'),(7,NULL,3,15,1111,'2014-05-13 09:42:56'),(8,NULL,3,16,2222,'2014-05-13 09:42:57'),(9,40.00000,5,0,22,'2014-05-13 10:05:58'),(10,NULL,7,16,11111,'2014-05-13 10:07:37'),(11,44444.00000,9,0,11111,'2014-05-13 10:13:23'),(12,44444.00000,10,0,11111,'2014-05-13 12:57:55');
/*!40000 ALTER TABLE `egreso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingreso`
--

DROP TABLE IF EXISTS `ingreso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingreso` (
  `idingreso` int(11) NOT NULL AUTO_INCREMENT,
  `idproveedor` int(11) DEFAULT NULL,
  `idfactura` int(11) DEFAULT NULL,
  `idcaja` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`idingreso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingreso`
--

LOCK TABLES `ingreso` WRITE;
/*!40000 ALTER TABLE `ingreso` DISABLE KEYS */;
INSERT INTO `ingreso` VALUES (0,1,1,0,0,20,'0000-00-00 00:00:00'),(1,1,0,0,1,30,'0000-00-00 00:00:00'),(2,1,2,0,0,10,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `ingreso` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-16 14:09:29
