-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2022 a las 16:32:15
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

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
DROP PROCEDURE IF EXISTS `SpDeleteBodega`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpDeleteBodega` (IN `_Id_Bodega` INT(5))   BEGIN
 
DELETE FROM bodega WHERE Id_Bodega = _Id_Bodega;

END$$

DROP PROCEDURE IF EXISTS `spDeleteCategoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteCategoria` (IN `_Id_Categoria` INT(15))   BEGIN
 
DELETE FROM categoria WHERE Id_Categoria = _Id_Categoria;

END$$

DROP PROCEDURE IF EXISTS `spDeleteEntrada`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteEntrada` (IN `_Id_Registro` INT(5))   BEGIN

DELETE FROM entrada WHERE Id_Registro = _Id_Registro;

END$$

DROP PROCEDURE IF EXISTS `SpDeleteProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpDeleteProducto` (IN `_Id_Producto` INT(5))   BEGIN
 
DELETE FROM producto WHERE Id_Producto = _Id_Producto;

END$$

DROP PROCEDURE IF EXISTS `SpDeleteProveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpDeleteProveedor` (IN `_Id_proveedor` INT(5))   BEGIN
 
DELETE FROM proveedor WHERE Id_proveedor = _Id_proveedor;

END$$

DROP PROCEDURE IF EXISTS `spDeleteSalida`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteSalida` (IN `_Id_Salida` INT(5))   BEGIN

DELETE FROM salida WHERE Id_Salida = _Id_Salida;

END$$

DROP PROCEDURE IF EXISTS `spDeleteUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteUsuario` (IN `_CC` INT(5))   BEGIN
 
DELETE FROM usuario WHERE CC = _CC;

END$$

DROP PROCEDURE IF EXISTS `SpInsertBodega`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpInsertBodega` (IN `_Nombre` VARCHAR(15), IN `_Seccion` VARCHAR(30), IN `_Ubicacion` VARCHAR(30))   BEGIN
INSERT INTO bodega (Nombre,Seccion,Ubicacion) VALUES (_Nombre,_Seccion,_Ubicacion);

END$$

DROP PROCEDURE IF EXISTS `spInsertCategoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertCategoria` (IN `_Nombre` VARCHAR(50))   BEGIN
INSERT INTO categoria (Nombre) VALUES (_Nombre);

END$$

DROP PROCEDURE IF EXISTS `SpInsertEntrada`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpInsertEntrada` (IN `_Id_Producto` VARCHAR(15), IN `_Id_Proveedor` VARCHAR(15), IN `_Id_Bodega` VARCHAR(15), IN `_Id_Categoria` VARCHAR(15), IN `_Fecha` VARCHAR(15), IN `_Cantidad` INT(20))   BEGIN
INSERT INTO entrada (Id_Producto, Id_Proveedor, Id_Bodega, Id_Categoria, cantidad,fecha)
VALUES (_Id_Producto, _Id_Proveedor, _Id_Bodega, _Id_Categoria, _cantidad,_fecha);

UPDATE PRODUCTO SET CANTIDAD = CANTIDAD + _cantidad WHERE ID_PRODUCTO = _Id_Producto;

END$$

DROP PROCEDURE IF EXISTS `SpInsertProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpInsertProducto` (IN `_Descripcion` VARCHAR(20), IN `_Stock_Minimo` INT(5))   BEGIN
INSERT INTO producto (Descripcion,Stock_Minimo) VALUES (_Descripcion,_Stock_Minimo);

END$$

DROP PROCEDURE IF EXISTS `SpInsertProveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpInsertProveedor` (IN `_Nombre` VARCHAR(15), IN `_Direccion` VARCHAR(30), IN `_Agente` VARCHAR(30), IN `_Telefono` INT(15))   BEGIN
INSERT INTO proveedor (Nombre,Direccion,Agente,Telefono) VALUES (_Nombre,_Direccion,_Agente,_Telefono);

END$$

DROP PROCEDURE IF EXISTS `SpInsertSalida`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpInsertSalida` (IN `_Id_Producto` VARCHAR(15), IN `_Id_Proveedor` VARCHAR(15), IN `_Id_Bodega` VARCHAR(15), IN `_Id_Categoria` VARCHAR(15), IN `_Fecha` VARCHAR(15), IN `_Cantidad` INT(20))   BEGIN
INSERT INTO salida (Id_Producto, Id_Proveedor, Id_Bodega, Id_Categoria, cantidad,fecha)
VALUES (_Id_Producto, _Id_Proveedor, _Id_Bodega, _Id_Categoria, _cantidad,_fecha);

UPDATE PRODUCTO SET CANTIDAD = CANTIDAD - _cantidad WHERE ID_PRODUCTO = _Id_Producto;

END$$

DROP PROCEDURE IF EXISTS `SpInsertUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpInsertUsuario` (IN `_CC` INT(11), IN `_Nombre` VARCHAR(20), IN `_Apellido` VARCHAR(20), IN `_Direccion` VARCHAR(20), IN `_Telefono` INT(15), IN `_Edad` INT(3), IN `_Rol` VARCHAR(15), IN `_Contrasena` VARCHAR(20))   BEGIN
INSERT INTO usuario (CC,Nombre,Apellido,Direccion,Telefono,Edad,Rol,Contrasena) VALUES (_CC,_Nombre,_Apellido,_Direccion,_Telefono,_Edad,_Rol,_Contrasena);

END$$

DROP PROCEDURE IF EXISTS `spSearchAllCategoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchAllCategoria` ()   BEGIN

SELECT Id_Categoria, Nombre FROM categoria;

end$$

DROP PROCEDURE IF EXISTS `SpSearchAllEntrada`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchAllEntrada` ()   BEGIN

SELECT E.Id_Registro, P.Descripcion PRODUCTO, PV.Nombre PROVEEDOR, B.Nombre BODEGA, C.Nombre CATEGORIA, E.Fecha, E.Cantidad from entrada E INNER JOIN PRODUCTO P ON E.Id_Producto = P.Id_Producto 
JOIN PROVEEDOR PV ON E.Id_Proveedor = PV.Id_Proveedor
JOIN BODEGA B ON E.Id_Bodega = B.Id_Bodega
JOIN CATEGORIA C ON E.Id_Categoria = C.Id_Categoria;

END$$

DROP PROCEDURE IF EXISTS `SpSearchAllProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchAllProducto` ()   BEGIN

SELECT Id_Producto, Descripcion, Stock_Minimo,cantidad FROM producto;

end$$

DROP PROCEDURE IF EXISTS `SpSearchAllSalida`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchAllSalida` ()   BEGIN

SELECT S.Id_Salida, P.Descripcion PRODUCTO, PV.Nombre PROVEEDOR, B.Nombre BODEGA, C.Nombre CATEGORIA, S.Fecha, S.Cantidad from salida S INNER JOIN PRODUCTO P ON S.Id_Producto = P.Id_Producto 
JOIN PROVEEDOR PV ON S.Id_Proveedor = PV.Id_Proveedor
JOIN BODEGA B ON S.Id_Bodega = B.Id_Bodega
JOIN CATEGORIA C ON S.Id_Categoria = C.Id_Categoria;

END$$

DROP PROCEDURE IF EXISTS `spSearchAllUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchAllUsuario` ()   BEGIN

SELECT CC, Nombre, Apellido, Direccion, Telefono, Edad, Rol, Contrasena FROM usuario;

END$$

DROP PROCEDURE IF EXISTS `SpSearchBodega`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchBodega` ()   BEGIN

SELECT Id_Bodega,Nombre,Seccion,Ubicacion FROM bodega;

END$$

DROP PROCEDURE IF EXISTS `spSearchCategoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchCategoria` (IN `_Id_Categoria` INT(150))   BEGIN

SELECT Id_Categoria, Nombre FROM categoria 
WHERE Id_Categoria = _Id_Categoria;

END$$

DROP PROCEDURE IF EXISTS `SpSearchDDLBodega`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchDDLBodega` ()   BEGIN

SELECT Id_Bodega,Seccion FROM bodega;

END$$

DROP PROCEDURE IF EXISTS `SpSearchDDLCategoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchDDLCategoria` ()   BEGIN

SELECT Id_Categoria,Nombre FROM categoria;

END$$

DROP PROCEDURE IF EXISTS `SpSearchDDLProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchDDLProducto` ()   BEGIN

SELECT Id_Producto,Descripcion FROM producto;

END$$

DROP PROCEDURE IF EXISTS `SpSearchDDLProveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchDDLProveedor` ()   BEGIN

SELECT Id_Proveedor,Nombre FROM proveedor;

END$$

DROP PROCEDURE IF EXISTS `SpSearchEntrada`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchEntrada` (IN `_Id_Registro` INT(5))   BEGIN

SELECT Id_Registro,Id_Producto,Id_Proveedor,Id_Bodega,Id_Categoria,Cantidad,Fecha FROM entrada

WHERE Id_Registro = _Id_Registro;

END$$

DROP PROCEDURE IF EXISTS `SpSearchProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchProducto` (IN `_Id_Producto` INT(5))   BEGIN

SELECT Id_Producto,Descripcion,Stock_Minimo FROM producto
WHERE Id_Producto = _Id_Producto;

END$$

DROP PROCEDURE IF EXISTS `SpSearchProveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchProveedor` ()   BEGIN

SELECT Id_proveedor,Nombre,Direccion,Agente,Telefono FROM proveedor;

END$$

DROP PROCEDURE IF EXISTS `SpSearchProveedorUnico`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchProveedorUnico` (IN `_Id_proveedor` INT(5))   BEGIN

SELECT Id_proveedor,Nombre,Direccion,Agente,Telefono FROM proveedor
WHERE Id_proveedor = _Id_proveedor;

END$$

DROP PROCEDURE IF EXISTS `SpSearchSalida`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchSalida` (IN `_Id_Salida` INT(5))   BEGIN

SELECT Id_Salida,Id_Producto,Id_Proveedor,Id_Bodega,Id_Categoria,Cantidad,Fecha FROM entrada

WHERE Id_Salida = _Id_Salida;

END$$

DROP PROCEDURE IF EXISTS `spSearchUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchUsuario` (IN `_CC` INT(11))   BEGIN

SELECT Nombre, Apellido, Direccion, Telefono, Edad, Rol, Contrasena FROM usuario
WHERE CC = _CC;

END$$

DROP PROCEDURE IF EXISTS `SpUpdateBodega`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpUpdateBodega` (IN `_Id_Bodega` INT(5), IN `_Nombre` VARCHAR(15), IN `_Seccion` VARCHAR(30), IN `_Ubicacion` VARCHAR(30))   BEGIN

UPDATE bodega 
SET Nombre = _Nombre,
Seccion = _Seccion,
Ubicacion= _Ubicacion

WHERE Id_Bodega=_Id_Bodega;


END$$

DROP PROCEDURE IF EXISTS `spUpdateCategoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateCategoria` (IN `_Id_Categoria` INT(150), IN `_Nombre` VARCHAR(50))   BEGIN

UPDATE categoria
SET Nombre = _Nombre

WHERE Id_Categoria = _Id_Categoria;


END$$

DROP PROCEDURE IF EXISTS `spUpdateEntrada`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateEntrada` (IN `_Id_Registro` INT(5), IN `_Id_Producto` VARCHAR(15), IN `_Id_Proveedor` VARCHAR(15), IN `_Id_Bodega` VARCHAR(15), IN `_Id_Categoria` VARCHAR(15), IN `_Fecha` VARCHAR(15), IN `_Cantidad` INT(20))   BEGIN

UPDATE entrada
SET Id_Producto = _Id_Producto,
Id_Proveedor = _Id_Proveedor,
Id_Bodega = _Id_Bodega,
Id_Categoria = _Id_Categoria,
Cantidad = _Cantidad,
Fecha = _Fecha

WHERE Id_Registro = _Id_Registro;

END$$

DROP PROCEDURE IF EXISTS `SpUpdateProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpUpdateProducto` (IN `_Id_Producto` INT(5), IN `_Descripcion` VARCHAR(20), IN `_Stock_Minimo` INT(5))   BEGIN

UPDATE producto 
SET Descripcion = _Descripcion,
Stock_Minimo= _Stock_Minimo

WHERE Id_Producto=_Id_Producto;


END$$

DROP PROCEDURE IF EXISTS `SpUpdateProveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpUpdateProveedor` (IN `_Id_proveedor` INT(5), IN `_Nombre` VARCHAR(15), IN `_Direccion` VARCHAR(30), IN `_Agente` VARCHAR(30), IN `_Telefono` INT(15))   BEGIN

UPDATE proveedor 
SET Nombre = _Nombre,
Direccion = _Direccion,
Agente= _Agente,
Telefono=_telefono

WHERE Id_Proveedor=_Id_Proveedor;


END$$

DROP PROCEDURE IF EXISTS `spUpdateSalida`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateSalida` (IN `_Id_Salida` INT(5), IN `_Id_Producto` VARCHAR(15), IN `_Id_Proveedor` VARCHAR(15), IN `_Id_Bodega` VARCHAR(15), IN `_Id_Categoria` VARCHAR(15), IN `_Cantidad` INT(20), IN `_Fecha` VARCHAR(15))   BEGIN

UPDATE salida
SET Id_Producto = _Id_Producto,
Id_Proveedor = _Id_Proveedor,
Id_Bodega = _Id_Bodega,
Id_Categoria = _Id_Categoria,
Cantidad = _Cantidad,
Fecha = _Fecha

WHERE Id_Salida = _Id_Salida;

END$$

DROP PROCEDURE IF EXISTS `spUpdateUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateUsuario` (IN `_CC` INT(11), IN `_Nombre` VARCHAR(20), IN `_Apellido` VARCHAR(20), IN `_Direccion` VARCHAR(20), IN `_Telefono` INT(15), IN `_Edad` INT(3), IN `_Rol` VARCHAR(15), IN `_Contrasena` VARCHAR(20))   BEGIN
UPDATE usuario 
SET Nombre = _Nombre,
Apellido = _Apellido,
Direccion = _Direccion,
Telefono = _Telefono,
Edad = _Edad,
Rol = _Rol,
Contrasena = _Contrasena

WHERE CC = _CC;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

DROP TABLE IF EXISTS `bodega`;
CREATE TABLE IF NOT EXISTS `bodega` (
  `Id_Bodega` int(5) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(15) NOT NULL,
  `Seccion` varchar(30) NOT NULL,
  `Ubicacion` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_Bodega`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`Id_Bodega`, `Nombre`, `Seccion`, `Ubicacion`) VALUES
(1, 'Aguja', 'agujas', 'medio'),
(5, 'Tela gris', 'Telas', 'atras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `Id_Categoria` int(150) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id_Categoria`, `Nombre`) VALUES
(3, 'Pulidores'),
(4, 'Agujas'),
(6, 'Resorte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

DROP TABLE IF EXISTS `entrada`;
CREATE TABLE IF NOT EXISTS `entrada` (
  `Id_Registro` int(5) NOT NULL AUTO_INCREMENT,
  `Id_Producto` int(5) NOT NULL,
  `Id_Proveedor` int(5) NOT NULL,
  `Id_Bodega` int(5) NOT NULL,
  `Id_Categoria` int(150) NOT NULL,
  `Fecha` varchar(30) NOT NULL,
  `Cantidad` int(20) NOT NULL,
  PRIMARY KEY (`Id_Registro`),
  KEY `Id_Producto` (`Id_Producto`),
  KEY `Id_Proveedor` (`Id_Proveedor`),
  KEY `Id_Bodega` (`Id_Bodega`),
  KEY `Id_Categoria` (`Id_Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`Id_Registro`, `Id_Producto`, `Id_Proveedor`, `Id_Bodega`, `Id_Categoria`, `Fecha`, `Cantidad`) VALUES
(1, 3, 5, 1, 4, '15', 50),
(6, 3, 5, 1, 3, '14', 17),
(7, 3, 5, 1, 4, '3', 16),
(8, 3, 5, 1, 4, '2', 15),
(9, 3, 5, 1, 3, '1', 17),
(10, 3, 5, 1, 3, '2', 17),
(11, 3, 222, 1, 3, '15', 3),
(13, 10, 238, 5, 6, '2022-07-19', 10),
(14, 3, 5, 1, 3, '2022-07-20', 5),
(15, 11, 238, 5, 3, '2022-07-22', 10),
(16, 5, 238, 5, 3, '2022-07-23', 17),
(17, 5, 111, 5, 4, '2022-07-26', 10),
(18, 3, 5, 1, 3, '2022-07-26', 19),
(19, 3, 5, 1, 3, '2022-07-26', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `Id_Producto` int(5) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(20) NOT NULL,
  `Stock_Minimo` int(5) NOT NULL,
  `cantidad` int(10) NOT NULL,
  PRIMARY KEY (`Id_Producto`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id_Producto`, `Descripcion`, `Stock_Minimo`, `cantidad`) VALUES
(3, 'Muestras', 10, 37),
(5, 'Lana', 0, 34),
(6, 'Algodon', 4, 17),
(7, 'Botones', 90, 17),
(8, 'Cierres', 3, -61),
(9, 'Cuero', 20, 67),
(10, 'Retaso', 7, 5),
(11, 'Tela negra', 6, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Id_Proveedor`, `Nombre`, `Direccion`, `Agente`, `Telefono`) VALUES
(5, 'Distribuidora M', 'Cl. 48 # 56 36 Medellin', 'Mauro ', 316215224),
(111, 'Rikato', 'Cra. 45a #63 12 itagui', 'Carlos Lopez', 300349025),
(222, 'Soinco S.A.S', '50Sur 100 Cra. 44 itagui', 'Laura Villa', 42887474),
(236, 'AR INSUMOS', 'Cra. 50c #2 27 2 Medellin', 'Jose', 319565421),
(238, 'Almacen francis', 'Cra.50c#2sur161 Medellin', 'Francisco ', 6042292);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

DROP TABLE IF EXISTS `salida`;
CREATE TABLE IF NOT EXISTS `salida` (
  `Id_Salida` int(5) NOT NULL AUTO_INCREMENT,
  `Id_Producto` int(5) NOT NULL,
  `Id_Proveedor` int(5) NOT NULL,
  `Id_Bodega` int(5) NOT NULL,
  `Id_Categoria` int(150) NOT NULL,
  `Fecha` varchar(30) NOT NULL,
  `Cantidad` int(20) NOT NULL,
  PRIMARY KEY (`Id_Salida`),
  KEY `Id_Producto` (`Id_Producto`),
  KEY `Id_Proveedor` (`Id_Proveedor`),
  KEY `Id_Bodega` (`Id_Bodega`),
  KEY `Id_Categoria` (`Id_Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salida`
--

INSERT INTO `salida` (`Id_Salida`, `Id_Producto`, `Id_Proveedor`, `Id_Bodega`, `Id_Categoria`, `Fecha`, `Cantidad`) VALUES
(1, 3, 238, 1, 4, '10', 22),
(3, 3, 236, 1, 4, '18', 5),
(4, 8, 236, 5, 3, '2022-07-21', 78),
(5, 10, 238, 5, 6, '2022-07-19', 5),
(6, 3, 5, 1, 4, '2022-07-19', 20),
(7, 11, 238, 5, 3, '2022-07-22', 5),
(8, 5, 238, 1, 3, '2022-07-23', 10),
(9, 3, 5, 1, 3, '2022-07-26', 2);

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
(123, 'dario', 'lopez', 'calle 56', 444444, 41, 'administrativo', '3c9909afec25354d551d'),
(123456, 'mauro', 'zapata', 'calle 123', 2147483647, 18, 'administrativo', '1193088945'),
(11234567, 'Daniel', 'Correa', 'calle 56', 444444, 40, 'empleado', '3712308'),
(12853088, 'Simon', 'lopez', 'calle 67#32 bello', 345678, 23, 'empleado', '63a86059029812971a30');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`Id_Bodega`) REFERENCES `bodega` (`Id_Bodega`) ON UPDATE CASCADE,
  ADD CONSTRAINT `entrada_ibfk_2` FOREIGN KEY (`Id_Proveedor`) REFERENCES `proveedor` (`Id_Proveedor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `entrada_ibfk_3` FOREIGN KEY (`Id_Producto`) REFERENCES `producto` (`Id_Producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `entrada_ibfk_4` FOREIGN KEY (`Id_Categoria`) REFERENCES `categoria` (`id_Categoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `salida`
--
ALTER TABLE `salida`
  ADD CONSTRAINT `salida_ibfk_2` FOREIGN KEY (`Id_Producto`) REFERENCES `producto` (`Id_Producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `salida_ibfk_3` FOREIGN KEY (`Id_Proveedor`) REFERENCES `proveedor` (`Id_Proveedor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `salida_ibfk_4` FOREIGN KEY (`Id_Bodega`) REFERENCES `bodega` (`Id_Bodega`) ON UPDATE CASCADE,
  ADD CONSTRAINT `salida_ibfk_5` FOREIGN KEY (`Id_Categoria`) REFERENCES `categoria` (`id_Categoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
