-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.8.2-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para fromexico
CREATE DATABASE IF NOT EXISTS `fromexico` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `fromexico`;

-- Volcando estructura para tabla fromexico.carrito
CREATE TABLE IF NOT EXISTS `carrito` (
  `codigo_usuario` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `total` float NOT NULL,
  `codigo_carrito` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `entrega` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codigo_carrito`) USING BTREE,
  KEY `codigo_producto` (`codigo_producto`),
  KEY `codigo_cliente` (`codigo_usuario`) USING BTREE,
  CONSTRAINT `FK_carrito_usuarios` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`codigo_cuenta`),
  CONSTRAINT `codigo_producto` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla fromexico.carrito: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
REPLACE INTO `carrito` (`codigo_usuario`, `codigo_producto`, `total`, `codigo_carrito`, `cantidad`, `entrega`) VALUES
	(1, 3, 1745.35, 1, 1, 'En tienda'),
	(1, 1, 1500.55, 4, 1, 'Calle Siempre Viva'),
	(1, 2, 4802.97, 5, 3, 'En tienda'),
	(1, 2, 5252.97, 6, 3, 'Calle Siempre Viva'),
	(1, 10, 4245.15, 7, 7, 'Calle Siempre Viva'),
	(1, 1, 11553.8, 8, 7, 'Calle Siempre Viva'),
	(1, 10, 1819.35, 9, 3, 'En tienda'),
	(1, 10, 1212.9, 10, 2, 'Calle Siempre Viva'),
	(1, 1, 1650.55, 11, 1, 'Calle Siempre Viva'),
	(2, 1, 1650.55, 12, 1, 'En tienda'),
	(4, 2, 5252.97, 13, 3, 'En tienda');
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;

-- Volcando estructura para tabla fromexico.pago
CREATE TABLE IF NOT EXISTS `pago` (
  `forma_pago` varchar(20) NOT NULL,
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_factura` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `total` float NOT NULL,
  `codigo_usuario` int(11) DEFAULT NULL,
  `codigo_carrito` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `codigo_carrito` (`codigo_carrito`),
  KEY `codigo_cliente` (`codigo_usuario`) USING BTREE,
  CONSTRAINT `FK_pago_carrito` FOREIGN KEY (`codigo_carrito`) REFERENCES `carrito` (`codigo_carrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pago_usuarios` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`codigo_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla fromexico.pago: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
REPLACE INTO `pago` (`forma_pago`, `id_factura`, `fecha_factura`, `fecha_vencimiento`, `total`, `codigo_usuario`, `codigo_carrito`) VALUES
	('En linea', 5, '2022-05-26', '2022-06-09', 1650.55, 2, 12),
	('En linea', 8, '2022-05-26', '2022-06-28', 33783.6, 1, 1),
	('En linea', 9, '2022-05-26', '2022-06-28', 33783.6, 1, 4),
	('En linea', 10, '2022-05-26', '2022-06-28', 33783.6, 1, 5),
	('En linea', 11, '2022-05-26', '2022-06-28', 33783.6, 1, 6),
	('En linea', 12, '2022-05-26', '2022-06-28', 33783.6, 1, 7),
	('En linea', 13, '2022-05-26', '2022-06-28', 33783.6, 1, 8),
	('En linea', 14, '2022-05-26', '2022-06-28', 33783.6, 1, 9),
	('En linea', 15, '2022-05-26', '2022-06-28', 33783.6, 1, 10),
	('En linea', 16, '2022-05-26', '2022-06-28', 33783.6, 1, 11);
/*!40000 ALTER TABLE `pago` ENABLE KEYS */;

-- Volcando estructura para tabla fromexico.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `nombre` varchar(20) DEFAULT NULL,
  `codigo_producto` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `precio_proveedor` float DEFAULT NULL,
  PRIMARY KEY (`codigo_producto`),
  KEY `codigo_proveedor` (`id_proveedor`) USING BTREE,
  CONSTRAINT `FK_producto_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`codigo_proveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla fromexico.producto: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
REPLACE INTO `producto` (`nombre`, `codigo_producto`, `id_proveedor`, `descripcion`, `stock`, `precio_proveedor`) VALUES
	('Azteca', 1, 1, 'Descubre las maravillas del módelo Azteca', 8, 1500.55),
	('Mexica', 2, 1, 'Descubre las maravillas del módelo Mexica', 7, 1600.99),
	('Maya', 3, 1, 'Descubre las maravillas del módelo Maya', 10, 1745.35),
	('AMD', 4, 1, 'Descubre las maravillas del módelo Ryzen', 10, 2000.43),
	('Huichol', 5, 1, 'Descubre las maravillas del módelo Huichol', 10, 1800.67),
	('Otomíe', 6, 1, 'Descubre las maravillas del módelo Otomíe', 10, 1900.98),
	('Purépecha', 7, 1, 'Descubre las maravillas del módelo Purepecha', 10, 2000.35),
	('AMD 2N', 8, 1, 'Descubre las maravillas del módelo AMD-2N', 10, 2598.99),
	('Totonaca', 9, 1, 'Descubre las maravillas del módelo Totonaca', 10, 2100.11),
	('Olmeca', 10, 1, 'Excelente para tus necesidades', 10, 456.45);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla fromexico.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `nombre_proveedor` varchar(30) DEFAULT NULL,
  `codigo_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`codigo_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla fromexico.proveedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
REPLACE INTO `proveedor` (`nombre_proveedor`, `codigo_proveedor`) VALUES
	('Ddtech', 1);
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla fromexico.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombre_usuario` varchar(20) NOT NULL,
  `apellidos_usuario` varchar(40) NOT NULL,
  `codigo_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_cuenta` varchar(15) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tarjeta` int(12) DEFAULT NULL,
  `credito` float DEFAULT NULL,
  `direccion_usuario` varchar(50) DEFAULT NULL,
  `telefono_usuario` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`codigo_cuenta`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla fromexico.usuarios: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
REPLACE INTO `usuarios` (`nombre_usuario`, `apellidos_usuario`, `codigo_cuenta`, `tipo_cuenta`, `correo`, `password`, `tarjeta`, `credito`, `direccion_usuario`, `telefono_usuario`) VALUES
	('Administrador', 'Ortega', 1, 'admin', 'admin@gmail.com', 'admin', 31102002, 88349.5, 'Calle Siempre Viva', '33140607'),
	('Edwin Omar', 'Ortega Gutierrez', 2, 'cliente', 'cliente@gmail.com', 'cliente', 0, 88349.5, '?', '?'),
	('Alan', 'Lopez', 3, 'admin', 'alan@gmail.com', 'alan', 0, 0, '?', '?'),
	('Marcos', 'Esequiel', 4, 'vendedor', 'marcos@gmail.com', 'marcos', 343, 4747.03, '?', '?'),
	('Alexis', 'Ramirez', 5, 'cliente', 'alexis@gmail.com', 'alexis', 0, 0, '?', '?'),
	('Martin', 'Hernandez', 6, 'admin', 'martin@gmail.com', 'martin', 0, 0, '?', '?');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
