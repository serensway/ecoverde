-- Adminer 5.3.0 MySQL 8.0.43-cll-lve dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `cli_codigo` int NOT NULL AUTO_INCREMENT,
  `cli_cedula` int NOT NULL,
  `cli_nombres` varchar(25) NOT NULL,
  `cli_apellidos` varchar(25) NOT NULL,
  `cli_usuario` varchar(25) NOT NULL,
  `cli_clave` varchar(25) NOT NULL,
  PRIMARY KEY (`cli_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `cliente` (`cli_codigo`, `cli_cedula`, `cli_nombres`, `cli_apellidos`, `cli_usuario`, `cli_clave`) VALUES
(1,	25632589,	'Angi',	'Diaz',	'xim',	'123'),
(2,	32685354,	'Axel',	'Duarte',	'admin',	'012'),
(7,	1234567,	'Maria',	'Gonzales',	'mgonzales',	'123456');

DROP TABLE IF EXISTS `cobro`;
CREATE TABLE `cobro` (
  `cob_codigo` int NOT NULL AUTO_INCREMENT,
  `cob_monto` int NOT NULL,
  `cob_fecha` date NOT NULL,
  `fac_codigo` int NOT NULL,
  PRIMARY KEY (`cob_codigo`),
  KEY `fac_codigo` (`fac_codigo`),
  CONSTRAINT `cobro_ibfk_1` FOREIGN KEY (`fac_codigo`) REFERENCES `factura` (`fac_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `cobro` (`cob_codigo`, `cob_monto`, `cob_fecha`, `fac_codigo`) VALUES
(1,	20000000,	'2025-11-22',	61);

DROP TABLE IF EXISTS `compra`;
CREATE TABLE `compra` (
  `com_codigo` int NOT NULL AUTO_INCREMENT,
  `pro_codigo` int NOT NULL,
  `est_codigo` int NOT NULL,
  `emp_codigo` int NOT NULL,
  `pag_codigo` int NOT NULL,
  `com_fecha` date NOT NULL,
  PRIMARY KEY (`com_codigo`),
  KEY `propiedad_compra_fk` (`pro_codigo`),
  KEY `estado_compra_fk` (`est_codigo`),
  KEY `empleado_compra_fk` (`emp_codigo`),
  KEY `pag_codigo` (`pag_codigo`),
  CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`pag_codigo`) REFERENCES `compra` (`com_codigo`),
  CONSTRAINT `empleado_compra_fk` FOREIGN KEY (`emp_codigo`) REFERENCES `empleado` (`emp_codigo`),
  CONSTRAINT `estado_compra_fk` FOREIGN KEY (`est_codigo`) REFERENCES `estado` (`est_codigo`),
  CONSTRAINT `propiedad_compra_fk` FOREIGN KEY (`pro_codigo`) REFERENCES `propiedad` (`pro_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `emp_codigo` int NOT NULL AUTO_INCREMENT,
  `tip_codigo` int NOT NULL,
  `emp_cedula` int NOT NULL,
  `emp_nombres` varchar(25) NOT NULL,
  `emp_apellidos` varchar(25) NOT NULL,
  `emp_usuario` varchar(25) NOT NULL,
  `emp_clave` varchar(25) NOT NULL,
  PRIMARY KEY (`emp_codigo`),
  KEY `tipo_empleado_empleado_fk` (`tip_codigo`),
  CONSTRAINT `tipo_empleado_empleado_fk` FOREIGN KEY (`tip_codigo`) REFERENCES `tipo_empleado` (`tip_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `empleado` (`emp_codigo`, `tip_codigo`, `emp_cedula`, `emp_nombres`, `emp_apellidos`, `emp_usuario`, `emp_clave`) VALUES
(1,	1,	6255303,	'Angeles',	'Ojeda',	'admin',	'1234'),
(2,	2,	6255304,	'Tobias',	'Ojeda',	'tobias',	'once11'),
(3,	3,	6255305,	'Joel',	'Ramirez',	'Joel',	's3r3n'),
(4,	4,	6255306,	'Ana',	'Sanabria',	'ana',	'anitaxd'),
(5,	5,	6255303,	'Seren',	'Ojeda',	'seren',	'J03L');

DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `est_codigo` int NOT NULL AUTO_INCREMENT,
  `est_descripcion` varchar(25) NOT NULL,
  PRIMARY KEY (`est_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `estado` (`est_codigo`, `est_descripcion`) VALUES
(1,	'Pagado'),
(2,	'Pendiente'),
(3,	'Vendido'),
(4,	'Disponible');

DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura` (
  `fac_codigo` int NOT NULL AUTO_INCREMENT,
  `pro_codigo` int NOT NULL,
  `est_codigo` int NOT NULL,
  `cli_codigo` int NOT NULL,
  `fac_monto` int NOT NULL,
  `fac_fecha` date NOT NULL,
  PRIMARY KEY (`fac_codigo`),
  KEY `propiedad_factura_fk` (`pro_codigo`),
  KEY `estado_factura_fk` (`est_codigo`),
  KEY `cliente_factura_fk` (`cli_codigo`),
  CONSTRAINT `cliente_factura_fk` FOREIGN KEY (`cli_codigo`) REFERENCES `cliente` (`cli_codigo`),
  CONSTRAINT `estado_factura_fk` FOREIGN KEY (`est_codigo`) REFERENCES `estado` (`est_codigo`),
  CONSTRAINT `propiedad_factura_fk` FOREIGN KEY (`pro_codigo`) REFERENCES `propiedad` (`pro_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `factura` (`fac_codigo`, `pro_codigo`, `est_codigo`, `cli_codigo`, `fac_monto`, `fac_fecha`) VALUES
(61,	1,	1,	2,	222,	'2025-11-20');

DROP TABLE IF EXISTS `pago`;
CREATE TABLE `pago` (
  `pag_codigo` int NOT NULL AUTO_INCREMENT,
  `pag_monto` int NOT NULL,
  `pag_fecha` date NOT NULL,
  `com_codigo` int NOT NULL,
  PRIMARY KEY (`pag_codigo`),
  KEY `com_codigo` (`com_codigo`),
  CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`com_codigo`) REFERENCES `compra` (`com_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `propiedad`;
CREATE TABLE `propiedad` (
  `pro_codigo` int NOT NULL AUTO_INCREMENT,
  `pro_precio` int NOT NULL,
  `pro_direccion` varchar(25) NOT NULL,
  `pro_estado` int NOT NULL,
  PRIMARY KEY (`pro_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `propiedad` (`pro_codigo`, `pro_precio`, `pro_direccion`, `pro_estado`) VALUES
(1,	20000000,	'Villa Elisa, Av. Américo ',	0),
(2,	25000000,	'Villa Elisa, Av. Von Pole',	0),
(3,	15000000,	'Villa Elisa, Calle Jordan',	0);

DROP TABLE IF EXISTS `tipo_empleado`;
CREATE TABLE `tipo_empleado` (
  `tip_codigo` int NOT NULL AUTO_INCREMENT,
  `tip_descripcion` varchar(25) NOT NULL,
  PRIMARY KEY (`tip_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tipo_empleado` (`tip_codigo`, `tip_descripcion`) VALUES
(1,	'Gerente'),
(2,	'Administrador de Sistemas'),
(3,	'Encargado de Compras'),
(4,	'Vendedor'),
(5,	'Secretaria');

-- 2025-11-22 20:57:41 UTC