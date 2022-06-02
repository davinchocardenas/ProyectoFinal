-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2022 a las 02:55:02
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--
CREATE DATABASE IF NOT EXISTS `proyecto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyecto`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `SpDeleteProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpDeleteProducto` (IN `_Id_Producto` INT(5))  BEGIN
 
DELETE FROM producto WHERE Id_Producto = _Id_Producto;

END$$

DROP PROCEDURE IF EXISTS `SpDeleteProveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpDeleteProveedor` (IN `_Id_proveedor` INT(5))  BEGIN
 
DELETE FROM proveedor WHERE Id_proveedor = _Id_proveedor;

END$$

DROP PROCEDURE IF EXISTS `SpInsertProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpInsertProducto` (IN `_Descripcion` VARCHAR(20), IN `_Categoria` VARCHAR(20), IN `_Stock_Minimo` INT(5))  BEGIN
INSERT INTO producto (Descripcion,Categoria,Stock_Minimo) VALUES (_Descripcion,_Categoria,_Stock_Minimo);

END$$

DROP PROCEDURE IF EXISTS `SpInsertProveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpInsertProveedor` (IN `_Nombre` VARCHAR(15), IN `_Direccion` VARCHAR(30), IN `_Agente` VARCHAR(30), IN `_Telefono` INT(15))  BEGIN
INSERT INTO proveedor (Nombre,Direccion,Agente,Telefono) VALUES (_Nombre,_Direccion,_Agente,_Telefono);

END$$

DROP PROCEDURE IF EXISTS `SpInsertUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpInsertUsuario` (IN `_CC` INT(11), IN `_Nombre` VARCHAR(20), IN `_Apellido` VARCHAR(20), IN `_Direccion` VARCHAR(20), IN `_Telefono` INT(15), IN `_Edad` INT(3), IN `_Rol` VARCHAR(15), IN `_Contrasena` VARCHAR(20))  BEGIN
INSERT INTO usuario (CC,Nombre,Apellido,Direccion,Telefono,Edad,Rol,Contrasena) VALUES (_CC,_Nombre,_Apellido,_Direccion,_Telefono,_Edad,_Rol,_Contrasena);

END$$

DROP PROCEDURE IF EXISTS `SpSearchProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchProducto` (IN `_Id_Producto` INT(5))  BEGIN

SELECT Id_Producto,Descripcion,Categoria,Stock_Minimo FROM producto
WHERE Id_Producto = _Id_Producto;

END$$

DROP PROCEDURE IF EXISTS `SpSearchProveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchProveedor` (IN `_Id_proveedor` INT(5))  BEGIN

SELECT Id_proveedor,Nombre,Direccion,Agente,Telefono FROM proveedor
WHERE Id_proveedor = _Id_proveedor;

END$$

DROP PROCEDURE IF EXISTS `SpUpdateProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpUpdateProducto` (IN `_Id_Producto` INT(5), IN `_Descripcion` VARCHAR(20), IN `_Categoria` VARCHAR(20), IN `_Stock_Minimo` INT(5))  BEGIN

UPDATE producto 
SET Descripcion = _Descripcion,
Categoria= _Categoria,
Stock_Minimo= _Stock_Minimo

WHERE Id_Producto=_Id_Producto;


END$$

DROP PROCEDURE IF EXISTS `SpUpdateProveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpUpdateProveedor` (IN `_Id_proveedor` INT(5), IN `_Nombre` VARCHAR(15), IN `_Direccion` VARCHAR(30), IN `_Agente` VARCHAR(30), IN `_Telefono` INT(15))  BEGIN

UPDATE proveedor 
SET Nombre = _Nombre,
Direccion = _Direccion,
Agente= _Agente,
Telefono=_telefono

WHERE Id_Proveedor=_Id_Proveedor;


END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `Id_Producto` int(5) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(20) NOT NULL,
  `Categoria` varchar(20) NOT NULL,
  `Stock_Minimo` int(5) NOT NULL,
  PRIMARY KEY (`Id_Producto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id_Producto`, `Descripcion`, `Categoria`, `Stock_Minimo`) VALUES
(3, 'verde', 'textiles', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `Id_Proveedor` int(5) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(15) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Agente` varchar(30) NOT NULL,
  `Telefono` int(15) NOT NULL,
  PRIMARY KEY (`Id_Proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Id_Proveedor`, `Nombre`, `Direccion`, `Agente`, `Telefono`) VALUES
(5, 'maurotextiles', 'calle 123', 'mauro ', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_producto/entrada`
--

DROP TABLE IF EXISTS `registro_producto/entrada`;
CREATE TABLE IF NOT EXISTS `registro_producto/entrada` (
  `Id_Registro` int(5) NOT NULL AUTO_INCREMENT,
  `Id_Producto` int(5) NOT NULL,
  `Id_Proveedor` int(5) NOT NULL,
  `Cantidad` int(20) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  PRIMARY KEY (`Id_Registro`),
  KEY `FKId_Producto` (`Id_Producto`),
  KEY `FKId_Proveedor` (`Id_Proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

DROP TABLE IF EXISTS `salida`;
CREATE TABLE IF NOT EXISTS `salida` (
  `Id_Salida` int(5) NOT NULL AUTO_INCREMENT,
  `Id_Registro` int(5) NOT NULL,
  PRIMARY KEY (`Id_Salida`),
  KEY `FKId_Registro` (`Id_Registro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `CC` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Direccion` varchar(20) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `Edad` int(3) NOT NULL,
  `Rol` varchar(15) NOT NULL,
  `Contrasena` varchar(20) NOT NULL,
  PRIMARY KEY (`CC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CC`, `Nombre`, `Apellido`, `Direccion`, `Telefono`, `Edad`, `Rol`, `Contrasena`) VALUES
(2147483647, 'mauro', 'muñoz', 'calle 123', 2147483647, 18, 'administrador', '1562518647');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
