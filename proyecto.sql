-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2022 a las 00:54:28
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

DROP PROCEDURE IF EXISTS `spDeleteUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteUser` (IN `_code` INT(4))   BEGIN
 
DELETE FROM user WHERE CODE = _code;

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpInsertEntrada` (IN `_Id_Producto` VARCHAR(15), IN `_Id_Proveedor` VARCHAR(15), IN `_Id_Bodega` VARCHAR(15), IN `_Id_Categoria` VARCHAR(15), IN `_Cantidad` INT(20), IN `_Fecha` VARCHAR(15))   BEGIN
INSERT INTO entrada (Id_Producto, Id_Proveedor, Id_Bodega, Id_Categoria, cantidad,fecha)
VALUES (_Id_Producto, _Id_Proveedor, _Id_Bodega, _Id_Categoria, _cantidad,_fecha);

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpInsertSalida` (IN `_Id_Producto` VARCHAR(15), IN `_Id_Proveedor` VARCHAR(15), IN `_Id_Bodega` VARCHAR(15), IN `_Id_Categoria` VARCHAR(15), IN `_Cantidad` INT(20), IN `_Fecha` VARCHAR(15))   BEGIN
INSERT INTO salida (Id_Producto, Id_Proveedor, Id_Bodega, Id_Categoria, cantidad,fecha)
VALUES (_Id_Producto, _Id_Proveedor, _Id_Bodega, _Id_Categoria, _cantidad,_fecha);

END$$

DROP PROCEDURE IF EXISTS `spInsertUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertUser` (IN `_name` VARCHAR(100), IN `_lastname` VARCHAR(100), IN `_USER` VARCHAR(50), IN `_password` VARCHAR(50))   BEGIN
INSERT INTO USER(name,lastname,PASSWORD,USER) VALUES (_name,_lastname,_password,_user);

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

SELECT Id_Registro, Id_Producto, Id_Proveedor, Id_Bodega, Id_Categoria, Fecha, Cantidad from entrada;

END$$

DROP PROCEDURE IF EXISTS `SpSearchAllProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchAllProducto` ()   BEGIN

SELECT Id_Producto, Descripcion, Stock_Minimo,cantidad FROM producto;

end$$

DROP PROCEDURE IF EXISTS `SpSearchAllSalida`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SpSearchAllSalida` ()   BEGIN

SELECT Id_Salida, Id_Producto, Id_Proveedor, Id_Bodega, Id_Categoria, Fecha, Cantidad from salida;

END$$

DROP PROCEDURE IF EXISTS `spSearchAllUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchAllUser` ()   BEGIN

SELECT NAME,LASTNAME,USER,CODE,PASSWORD FROM USER;

end$$

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

DROP PROCEDURE IF EXISTS `spSearchUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSearchUser` (IN `_code` INT(4))   BEGIN

SELECT CODE, NAME,lastname, password FROM user 
WHERE CODE = _code;

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateEntrada` (IN `_Id_Registro` INT(5), IN `_Id_Producto` VARCHAR(15), IN `_Id_Proveedor` VARCHAR(15), IN `_Id_Bodega` VARCHAR(15), IN `_Id_Categoria` VARCHAR(15), IN `_Cantidad` INT(20), IN `_Fecha` VARCHAR(15))   BEGIN

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

DROP PROCEDURE IF EXISTS `spUpdateUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateUser` (IN `_code` INT(4), IN `_name` VARCHAR(100), IN `_lastname` VARCHAR(100), IN `_user` VARCHAR(50), IN `_password` VARCHAR(50))   BEGIN

UPDATE user 
SET NAME = _name,
LASTNAME= _lastname,
USER= _user,
PASSWORD= _password


WHERE CODE=_code;


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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`Id_Registro`, `Id_Producto`, `Id_Proveedor`, `Id_Bodega`, `Id_Categoria`, `Fecha`, `Cantidad`) VALUES
(1, 3, 5, 1, 4, '15', 50),
(2, 8, 239, 5, 6, '16', 25),
(3, 5, 240, 5, 4, '7', 18),
(4, 8, 239, 1, 3, '7', 18),
(5, 5, 240, 1, 3, '10', 22);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id_Producto`, `Descripcion`, `Stock_Minimo`, `cantidad`) VALUES
(3, 'muestras', 10, 10),
(5, 'sadsfs', 0, 0),
(6, 'gdfhsfdh', 4, 0),
(7, 'eeee', 90, 0),
(8, 'EMA', 3, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Id_Proveedor`, `Nombre`, `Direccion`, `Agente`, `Telefono`) VALUES
(5, 'maurotextiles', 'calle 123', 'mauro ', 2147483647),
(111, 'RacTelas', 'Calle 11 # 11 11', 'Carlos Lopez', 1111111),
(222, 'VillaTelas', 'Calle 2 # 2 22', 'Laura Villa', 2222222),
(236, 'jose', 'far', 'far', 319565421),
(237, 'jorge', 'fabian', 'calle calle', 3147951),
(238, 'farfar', 'far', 'far', 65778),
(239, 'fabian', 'adsfasdf', 'adsfadsfasdf', 234234234),
(240, 'Daniel', 'calle 62 # 57 95', 'jorge', 3712808);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salida`
--

INSERT INTO `salida` (`Id_Salida`, `Id_Producto`, `Id_Proveedor`, `Id_Bodega`, `Id_Categoria`, `Fecha`, `Cantidad`) VALUES
(1, 3, 238, 1, 4, '10', 22),
(2, 8, 237, 5, 3, '25', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `CODE` int(4) NOT NULL,
  `USER` varchar(30) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `LASTNAME` varchar(100) NOT NULL,
  PRIMARY KEY (`CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`CODE`, `USER`, `PASSWORD`, `NAME`, `LASTNAME`) VALUES
(2, 'MOR', '150', 'pepe', 'perez'),
(4, 'gupe', '4862', 'guillermo', 'de la peña');

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
(2147483647, 'mauro', 'muñoz', 'calle 123', 2147483647, 18, 'administrativo', '150');

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
