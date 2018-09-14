-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-09-2018 a las 01:23:10
-- Versión del servidor: 5.6.23
-- Versión de PHP: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `jobs24_opticacym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abmbancos`
--

CREATE TABLE IF NOT EXISTS `abmbancos` (
  `bancid` int(11) NOT NULL AUTO_INCREMENT,
  `bancdescrip` varchar(255) DEFAULT NULL,
  `bancdir` varchar(255) DEFAULT NULL,
  `banccontacto` varchar(255) DEFAULT NULL,
  `banccuenta` varchar(255) DEFAULT NULL,
  `bancsucursal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bancid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `abmbancos`
--

INSERT INTO `abmbancos` (`bancid`, `bancdescrip`, `bancdir`, `banccontacto`, `banccuenta`, `bancsucursal`) VALUES
(3, 'ICBC', 'Mendoza 84 Sur', 'Jesus', NULL, 'San Juan'),
(5, 'BANCO COMAFI', 'GRAL ACHA 384- SUR-', '******', NULL, 'SAN JUAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abmdeposito`
--

CREATE TABLE IF NOT EXISTS `abmdeposito` (
  `depositoId` int(11) NOT NULL AUTO_INCREMENT,
  `depositodescrip` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `id_provincial` int(11) DEFAULT NULL,
  `id_localidad` int(11) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL,
  `GPS` varchar(255) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`depositoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `abmdeposito`
--

INSERT INTO `abmdeposito` (`depositoId`, `depositodescrip`, `direccion`, `id_provincial`, `id_localidad`, `id_pais`, `GPS`, `id_empresa`) VALUES
(1, 'Deposito Rawson', '0', 1, 1, 1, 'ddd', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abmproveedores`
--

CREATE TABLE IF NOT EXISTS `abmproveedores` (
  `provid` int(10) NOT NULL AUTO_INCREMENT,
  `provnombre` varchar(255) DEFAULT NULL,
  `provcuit` varchar(50) DEFAULT NULL,
  `provdomicilio` varchar(255) DEFAULT NULL,
  `provtelefono` varchar(50) DEFAULT NULL,
  `provmail` varchar(100) DEFAULT NULL,
  `provestado` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`provid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Volcado de datos para la tabla `abmproveedores`
--

INSERT INTO `abmproveedores` (`provid`, `provnombre`, `provcuit`, `provdomicilio`, `provtelefono`, `provmail`, `provestado`) VALUES
(10, 'RANIERI ARGENTINA S.A', '30-69172993-8', 'CALLE 29 Nº 2522-SAN ANDRESD', '011-4754-1300-fax-011-4752-4391', 'postventa@ranieriarg.com', '8'),
(11, 'FALCONE BODETTO S.A', '30-50363209-4', 'SANTA FE 4545- RODARIO', '0341-4370838', 'fbd@fbd.com.ar', '8'),
(12, 'VECTORLATINA S.A', '30-71426568-3', 'AV: S. MARTIN 1027.GAL PIAZZA LOCAL 2 SS- MENDOZA', '0261-4291114', 'mendoza@vectorlatina.com.ar', '8'),
(13, 'MOA', '30-52232587-9', 'COLPAYO 745- CAPITAL FEDERAL', '0261-4253737-fax-0261-4200999', 'mendoza@moa.com.ar', '8'),
(14, 'LABORATORIO OPTICO GUAYMALLEN', '20-16751880-0', 'L.MANZILLA 765-SAN JOSE-GUAYMALLEN-MZA', '0261-4323055-43118842', 'laboratorio@guaymallen.com.ar', '8'),
(15, 'VITOLEN', '30-52118920-3', 'AV.ROQUE SANZ PEÑA 786-RAFAELA-STA FE', '0264-4278339-', 'administracion@vitolen.com', '8'),
(16, 'WAICON VISION S.A', '30-51677561-7', 'AV: PUEYRREDON 1716-3º A-BS AS', '011-4718-4200', 'waicon.pedidos@bausch.com', '8'),
(17, 'OPTOFOR SRL', '30-71501590-7', 'GRAL PAZ 315 ESTE-PLANTA BAJE B- SAN JUAN', '0264-4203311', 'optoford@optoford.com.ar', '8'),
(18, 'CACIC SPORTS VISION SRL', '30-71098310-7', 'DR: ADOLFO DICKMAN 1352/54- CABA', '011-4582-0377', 'info@rustyoptical.com.ar', '8'),
(19, 'LA CAMIONERA MENDOCINA', '33-53112259-9', 'MENDOZA 1919-SUR', '4214265', '555555', '8'),
(20, 'GPERM S.A', '33-70993738-9', 'CATAMARCA 177 OF-2 (1213) CAP.FEDERAL', '011-4957-0845', '5656556', '8'),
(21, 'DIATTO SERGIO DANIEL ( TODO OPTICA)', '20-16083164-3', 'CORDOBA', '56565', '4444444', '8'),
(22, 'NORTIME S.R.L', '30-71069181-5', 'AV: DE MAYO 1316- PISO 21 DPTO A-( 1085) BS AS', '011-4382-4862', '213183135411', '8'),
(23, 'CDA ( CRISTIAN DANIEL ARIAUDO)', '20-21402620-2', 'RIVERA INDARTE 243', 'PPPPPPP', 'PPPPP', '8'),
(24, 'OPTIWAY S.R.L.', '30-70808240-2', 'AV.ALVAREZ TOMAS 1131-', '011-4555-6333', 'info@optiway.com.ar', '8'),
(25, 'WEST OPTICAL S.A', '30.71455979-2', 'AV. PUEYRREDON 480- P-11 OF: 73', '011-4862-4172', '*******', '8'),
(26, 'BOXER ', '30.70798338-4', 'CERRITO 146 5º PISO  C/P 1010', '011-4382-7979', 'atencionalcliente@boxeronline.com.ar', '8'),
(27, 'ANTEOJOS NIVEL UNO S.R.L', '30.70890423-2', 'DONATO ALVAREZ 836- C/P 1708- MORON', '*******', '*******', '8'),
(28, 'L.G.I. SRL', '30-70809651-9', 'ROSALES 3925/3933 C/P 1672- VILLA LINCH-SAN MARTIN -PCI BS AS', '******', '*******', '8'),
(29, 'L&D VISUAL', '30.71134798-0', 'AGUSTIN M. GARCIA 3755-C/P-1621- BENAVIDEZ-', '03327-480944', '************', '8'),
(30, 'VISION PLANET', '30-71089730-8', 'SERRANO 661 4º PISO-C.A.B.A', '011-5272-6120', 'info@visionplanet.com.ar', '8'),
(31, 'IMPRESOS ASTRO', '20.25641479-2', 'HELGUERA 44- C.A.B.A', '*****', 'ventas@impresosastro.com', '8'),
(32, 'CASA PARA TI S.A.C.I.F', '30-54208344-8', 'CIUDAD DE LA PAZ 1808- 3º A', '011-4780-2100', 'infocasaparati.com.ar', '8'),
(33, 'GILARDI ARGENTINA', '20-26200343-5', 'ARANGUREN 1572 (1424) CAPITAL FEDERAL', '011-4431-9882', '******', '8'),
(34, 'ZF. MONICA VILLALBA', '27-26577364-3', 'AV: GAONA 4248-CIUDADELA( C/P 1702)', '011-4488-8666', 'GABRIELFEDON@GMAIL', '8'),
(35, 'MEGAVISION S.A', '30.71450633-8', 'SARMIENTO 2884-RIO CUARTO-CBA', '*******', '*****', '8'),
(36, 'MG LUNETTES', '20-10762146-7', 'AV CORRIENTES 4006 2º PISO OF -18 (1194) CAP.FEDERAL', '011-4867-6080-', 'mglunettes@fibertel.com.ar', '8'),
(37, 'BISTOLFI (ELEVE)', '****', 'PASAJE PUMA-3606-CAP.FEDERAL', '011-3965-4825', '**********', '8'),
(38, 'BORSALINO', '******', 'BERNASCONI 255-BS AS', '011-4856-6960', '----', '8'),
(39, 'CLIVION', '***********', 'J.B.AMBROSETTI 277', '011-5901-5583', '------------------', '8'),
(40, 'CREMONA DAMIAN TIZIANO HERA', '*******', '****', '121212121211', '************', '8'),
(41, 'CROSS', '**************', 'LA FRATERNIDAD 255-C.A.B.A', '011-4460-5484', '----------------', '8'),
(42, 'CUYO VISION', '******************', 'JOSE V. ZAPATA 194- OF. 8- MZA', '0261-156667368', '********', '8'),
(43, 'DAMIANO', '***************', 'SAN ANTONIO DE PADUA- BS AS', '0220-4824371', '--------------', '8'),
(44, 'DL.3 S.R.L.', '*********', 'BRUSELAS 36 -ITUZAINGO- BS AS', '011-4661-8448', '-------------------------', '8'),
(45, 'FEDON FLAVIO FIORAVANTE ', '*****', 'GARCIA LORCA 3604- PCIA DE BS AS', '011-4657-7942', '---------------------', '8'),
(46, 'FRANCO LENT', '*******', 'BS AS', '--------------------', '*************', '8'),
(47, 'GOMAZ PAOLA DE LAS MERCEDES', '**********', 'MORENO 852-RIO CUARTO CBA', '0358-4650731', '********', '8'),
(48, 'GONZALEZ JOSE ROBERTO', '**********', 'BETINOTTI 458- MERLO BS AS ', '0220-4806688', '***************', '8'),
(49, 'HUGO PARADA OBIOL S.A', '******', 'AV: PUYRREDON 480- P-11- PCIA BS AS', '011-4862-8067', '***************', '8'),
(50, 'KARINA RABOLINI', '*******', 'MEXICO 441-2º PISO -D-CAP.FEDERAL', '011-433-3776-78', '***************', '8'),
(51, 'LENTES DE CUYO S.A', '***********', 'MENDOZA 179- SUR OF 25- SAN JUAN', '4201953', '**********', '8'),
(52, 'LENTES OFTALMOLOGICAS GROUP', '*************', 'BARCALA 470- MENDOZA ', '0261-4251242', '********', '8'),
(53, 'LUJAN GUADALUPE', '****************', 'ENTRE RIOS 3135- MARTINEZ- BS AS', '011-4717-0217', '**********', '8'),
(54, 'LUMINOPTICA', '****************', 'LAVALLE 1783- 7º B- C.A B.A', '*********', '**********', '8'),
(55, 'MARTINEZ ORLANDO', '30-71416565-4', 'BRASIL 237- HAEDO BS AS-', '**********************', '****', '8'),
(56, 'OPTIVARO', '*******', 'MORENO 852- RIO CUARTO CBA-', '0358-4650731', '**********', '8'),
(57, 'PRO-OPTIC', '20-16453622-0', 'NECOCHEA 1319- RAMOS MEJIA -BS AS', '1545771810', '********', '8'),
(58, 'ROSAFE', '*******', 'MARCOS PAZ 5271-ROSARIO STA FE-', '***************', '*******', '8'),
(59, 'SERVICIOS OPTICOS', '***************', 'CACANEO 675- CBA', '03541-441626', '**********', '8'),
(60, 'WADA GROUP', '************', 'ROSARIO STA FE-', '121212122121', '*****', '8'),
(61, '3B OPTIC', '20-14938378-7', 'OCAMPO 370-C/P-2000-ROSARIO', '0341-482-0414', 'alatina@3boptic.com', '8'),
(62, 'SKILLMEDIA ', '30-71155862-0', 'LADISLAO MARTINEZ 24- 1640- MARTINEZ- BS AS', '0800-7777-767', 'administracion@smsmasivos.com.ar', '8'),
(64, 'RANIERI ARG.SA (OSSIRA)', '30-69172993-8', '*****', '*******', '////', '8'),
(65, 'RANIERI ARG SA ( REEF)', '30-69172993-8', '***********', '**/*/*/*/*/', '/////////', '8'),
(66, 'BELLINI, ZULMA RAQUEL', '27-17591366-7', 'MARCOS PAZ 5271-ROSARIO NORTE- STA FE-', '*/**/*/*', '******', '8'),
(67, 'SUCESION DE DORGAN ROBERTO JUAN', '20-06771252-9', 'MENDOZA 1726 -SUR- SAN JUAN', '*/*/*/*/*/*/*', '**********', '8'),
(68, 'INDUSTRIA ÓPTICA ARGENTINA S.A- ( ADD)', '30-71224385-2', 'MARCOS PAZ 2570 OF.1 C/P 1417- BS AS', '*//*/*//', '*****', '8'),
(69, 'PABLO VICENTE GAMIDDO', '20-28233870-0', 'VILLA BOSCH 1344- BS AS', '*/*/**/*//*', '******', '8'),
(70, 'GRUPO IASA S.A ( Mormaii)', '30-61449860-5', '/*/*/*/*/', '/*/*', '********', '8'),
(71, 'AGUIAR, ALFREDO JUAN', '20-11481427-0', 'GUEMES 24 (SUR) -SAN JUAN', '*/*/*/*/*/*/*/*/*/**', '*********', '8'),
(72, 'TECNIVIS S.R.L.', '30-70721344-9', 'PJE.RIVAROLA 184- CAP. FEDERAL-', '/*/*/*/*/*/*/*/*', '**********', '8'),
(73, 'LEMON-SOFT', '9998989899', 'PEDRO IGNACIO RIVERA 2463- 3º  PISO -A- C/P 1428 CAP.FEDERAL-', '011-4787-1282', '****', '8'),
(74, 'RODE MARGARITA ADRIANA( D''ALESANDRO ESTUCHES)', '27-16844479-1', 'MOSCONI 3525-BECCAR- (B1643GG4) PCIA DE BS AS', '++++++++++++', '**********', '8'),
(75, 'FRANCISCO MONTES S.A.C.I.F', '30-50012729-1', 'MENDOZA 380 SUR- SAN JUAN', '4290094', '******', '8'),
(76, 'ENGLAND OPTICAL', '20-05250447-4', 'ARROYO 897 14º F (1007 C.A.B.A)', '02344-433828', 'ventas@englamdoptical.com.ar', '8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abmtarjetas`
--

CREATE TABLE IF NOT EXISTS `abmtarjetas` (
  `tarjetid` int(11) NOT NULL AUTO_INCREMENT,
  `tarjetdescrip` varchar(255) DEFAULT NULL,
  `tarjetentidad` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tarjetid`),
  KEY `tarjetid` (`tarjetid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `abmtarjetas`
--

INSERT INTO `abmtarjetas` (`tarjetid`, `tarjetdescrip`, `tarjetentidad`) VALUES
(2, 'DATA', '1212'),
(3, 'NEVADA', ''),
(4, 'VISA', ''),
(5, 'MASTERCARD', ''),
(6, 'VISA DEBITO', ''),
(7, 'NATIVA MASTER', ''),
(8, 'CABAL', ''),
(9, 'FIEL', ''),
(10, 'FALABELLA MASTER', ''),
(11, 'MAESTRO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admcredits`
--

CREATE TABLE IF NOT EXISTS `admcredits` (
  `crdId` int(11) NOT NULL AUTO_INCREMENT,
  `crdDescription` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `crdDate` datetime DEFAULT NULL,
  `crdDebe` decimal(10,2) DEFAULT NULL,
  `crdHaber` decimal(10,2) DEFAULT NULL,
  `crdNote` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cliId` int(11) NOT NULL,
  `usrId` int(11) NOT NULL,
  `saleId` int(11) DEFAULT NULL,
  PRIMARY KEY (`crdId`),
  KEY `cliId` (`cliId`),
  KEY `usrId` (`usrId`),
  KEY `saleId` (`saleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=97 ;

--
-- Volcado de datos para la tabla `admcredits`
--

INSERT INTO `admcredits` (`crdId`, `crdDescription`, `crdDate`, `crdDebe`, `crdHaber`, `crdNote`, `cliId`, `usrId`, `saleId`) VALUES
(96, 'Importe venta 21', '2016-05-17 18:15:03', 1540.00, 0.00, '', 15, 1, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admcustomerpreferences`
--

CREATE TABLE IF NOT EXISTS `admcustomerpreferences` (
  `cstprefId` int(11) NOT NULL AUTO_INCREMENT,
  `sfamId` int(11) NOT NULL,
  `cliId` int(11) NOT NULL,
  PRIMARY KEY (`cstprefId`),
  KEY `sfamId` (`sfamId`),
  KEY `cliId` (`cliId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=103 ;

--
-- Volcado de datos para la tabla `admcustomerpreferences`
--

INSERT INTO `admcustomerpreferences` (`cstprefId`, `sfamId`, `cliId`) VALUES
(97, 8, 13),
(98, 9, 13),
(99, 10, 13),
(100, 17, 13),
(101, 8, 14),
(102, 10, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admcustomers`
--

CREATE TABLE IF NOT EXISTS `admcustomers` (
  `cliId` int(11) NOT NULL AUTO_INCREMENT,
  `cliName` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cliLastName` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cliDni` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cliDateOfBirth` date DEFAULT NULL,
  `cliNroCustomer` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cliAddress` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cliPhone` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cliMovil` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cliEmail` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cliImagePath` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `zonaId` int(11) DEFAULT NULL,
  `cliDay` int(11) DEFAULT '30',
  `cliColor` varchar(7) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cliId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `admcustomers`
--

INSERT INTO `admcustomers` (`cliId`, `cliName`, `cliLastName`, `cliDni`, `cliDateOfBirth`, `cliNroCustomer`, `cliAddress`, `cliPhone`, `cliMovil`, `cliEmail`, `cliImagePath`, `zonaId`, `cliDay`, `cliColor`, `estado`) VALUES
(13, 'Daniel', 'Osvaldo', '31324200', '1984-05-01', '1', 'Av La Humareda 12', '', '', '', '13.png', 10, 30, '#00a65a', ''),
(14, 'Mariana', 'Romero', '31324205', '2016-05-04', '14', 'Av. Simpre Viva 123', '', '', '', '14.png', 11, 15, '#f39c12', ''),
(15, 'Patricia', 'Moreno', '45632145', '2016-05-19', '15', 'Rogelio Funes Mori y No Fue Corner', '', '', '', '15.png', 10, 10, '#dd4b39', ''),
(16, 'Homero', 'Perez', '45888882', '2000-05-10', '16', 'Rivadavia 124s', '', '', '', '16.png', 12, 20, '#00a65a', ''),
(17, 'juan', 'perez', NULL, NULL, NULL, NULL, NULL, '15555', NULL, NULL, NULL, 30, NULL, 'AN'),
(18, 'eeeee', 'asdfasdfa', '', '0000-00-00', NULL, '', '', '111111111111111', '111111111111111', NULL, 10, 1, NULL, 'AN'),
(19, 'Juan', 'Perez', '2111111', '1975-10-27', NULL, 'calle 5', '422222', '1555555', '1555555', NULL, 10, 1, NULL, 'C'),
(20, 'OPTICA', 'CABELLO', '', '0000-00-00', NULL, '', '', '', '', NULL, 10, 1, NULL, 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admproducts`
--

CREATE TABLE IF NOT EXISTS `admproducts` (
  `prodId` int(11) NOT NULL AUTO_INCREMENT,
  `prodCode` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `prodDescription` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `prodPrice` decimal(10,2) NOT NULL,
  `prodMargin` int(11) NOT NULL,
  `prodImg1` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prodImg2` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prodImg3` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prodImg4` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prodImg5` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prodStatus` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `sfamId` int(11) NOT NULL,
  PRIMARY KEY (`prodId`),
  KEY `sfamId` (`sfamId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `admproducts`
--

INSERT INTO `admproducts` (`prodId`, `prodCode`, `prodDescription`, `prodPrice`, `prodMargin`, `prodImg1`, `prodImg2`, `prodImg3`, `prodImg4`, `prodImg5`, `prodStatus`, `sfamId`) VALUES
(8, '1', 'Taladro percutor 10mm', 500.00, 20, '8_1.png', '8_2.png', '8_3.png', '8_4.png', NULL, 'AC', 14),
(9, '2', 'Microondas Philips', 700.00, 10, '9_1.png', '9_2.png', '9_3.png', '9_4.png', NULL, 'AC', 10),
(10, '3', 'Sillas Plásticas x 6', 800.00, 20, '10_1.png', '10_2.png', '10_3.png', '10_4.png', NULL, 'AC', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admsales`
--

CREATE TABLE IF NOT EXISTS `admsales` (
  `saleId` int(11) NOT NULL AUTO_INCREMENT,
  `cliId` int(11) DEFAULT NULL,
  `saleDate` datetime DEFAULT NULL,
  `saleEstado` varchar(2) COLLATE utf8_spanish_ci DEFAULT '',
  `usrId` int(11) DEFAULT NULL,
  PRIMARY KEY (`saleId`),
  KEY `cliId` (`cliId`),
  KEY `usrId` (`usrId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `admsales`
--

INSERT INTO `admsales` (`saleId`, `cliId`, `saleDate`, `saleEstado`, `usrId`) VALUES
(21, 15, '2016-05-17 18:15:03', 'AC', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admsalesdetail`
--

CREATE TABLE IF NOT EXISTS `admsalesdetail` (
  `saleDetId` int(11) NOT NULL AUTO_INCREMENT,
  `saleId` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `prodPrice` decimal(14,2) NOT NULL,
  `prodDescription` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `prodCant` int(11) NOT NULL,
  PRIMARY KEY (`saleDetId`),
  KEY `saleId` (`saleId`),
  KEY `prodId` (`prodId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `admsalesdetail`
--

INSERT INTO `admsalesdetail` (`saleDetId`, `saleId`, `prodId`, `prodPrice`, `prodDescription`, `prodCant`) VALUES
(21, 21, 9, 770.00, '2 - Microondas Philips', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admstock`
--

CREATE TABLE IF NOT EXISTS `admstock` (
  `stkId` int(11) NOT NULL AUTO_INCREMENT,
  `prodId` int(11) NOT NULL,
  `stkCant` int(11) NOT NULL,
  `usrId` int(11) NOT NULL,
  `stkDate` datetime NOT NULL,
  `stkMotive` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`stkId`),
  KEY `prodId` (`prodId`),
  KEY `usrId` (`usrId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `admstock`
--

INSERT INTO `admstock` (`stkId`, `prodId`, `stkCant`, `usrId`, `stkDate`, `stkMotive`) VALUES
(27, 8, 10, 1, '2016-05-13 15:59:17', 'Ajuste inicial'),
(28, 9, 5, 1, '2016-05-13 15:59:39', 'Ajuste inicial'),
(29, 10, 20, 1, '2016-05-13 15:59:57', 'Ajuste inicial'),
(30, 9, -2, 1, '2016-05-17 18:15:03', 'Venta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admvisits`
--

CREATE TABLE IF NOT EXISTS `admvisits` (
  `vstId` int(11) NOT NULL AUTO_INCREMENT,
  `vstDate` datetime NOT NULL,
  `cliId` int(11) NOT NULL,
  `vstNote` text COLLATE utf8_spanish_ci NOT NULL,
  `vstStatus` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`vstId`),
  KEY `cliId` (`cliId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=80 ;

--
-- Volcado de datos para la tabla `admvisits`
--

INSERT INTO `admvisits` (`vstId`, `vstDate`, `cliId`, `vstNote`, `vstStatus`) VALUES
(74, '2016-05-20 16:00:00', 15, 'Llevar taladro', 'PN'),
(75, '2016-05-20 18:00:00', 13, 'Llevar huesos (para el perro)', 'PN'),
(76, '2016-05-20 14:00:00', 14, 'Mostrar manteles', 'PN'),
(77, '2016-05-25 08:00:00', 16, 'Herramientas de construcción', 'PN'),
(78, '2016-05-18 08:00:00', 15, '', 'PN'),
(79, '2016-08-31 08:00:00', 15, 'xcvcxv', 'PN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alicuotaiva`
--

CREATE TABLE IF NOT EXISTS `alicuotaiva` (
  `alicuotaid` int(11) NOT NULL AUTO_INCREMENT,
  `alicuotadescrip` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `alicuota` double DEFAULT NULL,
  PRIMARY KEY (`alicuotaid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `alicuotaiva`
--

INSERT INTO `alicuotaiva` (`alicuotaid`, `alicuotadescrip`, `alicuota`) VALUES
(1, 'RI', 21),
(2, 'MO', 10.5),
(3, 'Exento', 0),
(4, 'Consumidor Final', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `artId` int(11) NOT NULL AUTO_INCREMENT,
  `artBarCode` varchar(50) NOT NULL,
  `artDescription` varchar(50) NOT NULL,
  `artCoste` decimal(14,2) NOT NULL,
  `artMargin` decimal(10,2) NOT NULL,
  `artIsByBox` bit(1) NOT NULL,
  `artCantBox` int(11) DEFAULT NULL,
  `artMarginIsPorcent` bit(1) NOT NULL,
  `artEstado` varchar(2) NOT NULL DEFAULT 'AC',
  `famId` int(11) DEFAULT NULL,
  PRIMARY KEY (`artId`),
  UNIQUE KEY `artBarCode` (`artBarCode`) USING BTREE,
  UNIQUE KEY `artDescription` (`artDescription`) USING BTREE,
  KEY `famId` (`famId`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`artId`, `artBarCode`, `artDescription`, `artCoste`, `artMargin`, `artIsByBox`, `artCantBox`, `artMarginIsPorcent`, `artEstado`, `famId`) VALUES
(1, '4587', 'uniforme talle 6 x  ', 10.00, 5.00, b'0', 0, b'0', 'AC', 7),
(8, '4444', 'agua x 1 ', 10.00, 4.00, b'0', 6, b'0', 'AC', 7),
(9, '34', 'dasdsadasdasdas', 0.00, 0.00, b'0', 0, b'0', 'AC', 7),
(12, '234423', 'ffsdfdsf', 0.00, 0.00, b'0', 0, b'0', 'AC', 7),
(13, '345', 'cdsfsdfsdfdsfsdfsd', 0.00, 0.00, b'1', 345, b'0', 'AC', 7),
(16, '33', '333', 0.00, 0.00, b'1', 34, b'0', 'AC', 7),
(17, '2324324', 'fdfgdfg', 0.00, 0.00, b'0', 0, b'0', 'IN', 7),
(18, 'sadasf', 'sdasd', 0.00, 0.00, b'1', 34, b'0', 'AC', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conffamily`
--

CREATE TABLE IF NOT EXISTS `conffamily` (
  `famId` int(11) NOT NULL AUTO_INCREMENT,
  `famName` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`famId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `conffamily`
--

INSERT INTO `conffamily` (`famId`, `famName`) VALUES
(5, 'Electrodomésticos'),
(6, 'Muebles'),
(7, 'Herramientas'),
(8, 'Personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confsubfamily`
--

CREATE TABLE IF NOT EXISTS `confsubfamily` (
  `sfamId` int(11) NOT NULL AUTO_INCREMENT,
  `sfamName` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `famId` int(11) DEFAULT NULL,
  PRIMARY KEY (`sfamId`),
  KEY `famId` (`famId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `confsubfamily`
--

INSERT INTO `confsubfamily` (`sfamId`, `sfamName`, `famId`) VALUES
(8, 'Cocina', 5),
(9, 'Heladera', 5),
(10, 'Microondas', 5),
(11, 'Futón', 6),
(12, 'Alacena', 6),
(13, 'Sillas', 6),
(14, 'Taladro', 7),
(15, 'Amoladora', 7),
(16, 'LLaves', 7),
(17, 'Afeitadora', 8),
(18, 'Secador de Cabello', 8),
(19, 'Masajeador', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confzone`
--

CREATE TABLE IF NOT EXISTS `confzone` (
  `zonaId` int(11) NOT NULL AUTO_INCREMENT,
  `zonaName` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`zonaId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `confzone`
--

INSERT INTO `confzone` (`zonaId`, `zonaName`) VALUES
(10, 'Caucete'),
(11, 'Zonda'),
(12, 'Rivadavia'),
(13, 'Sarmiento'),
(14, 'Los Berros'),
(15, 'El Encón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deta-remito`
--

CREATE TABLE IF NOT EXISTS `deta-remito` (
  `detaremitoid` int(11) NOT NULL AUTO_INCREMENT,
  `id_remito` int(10) NOT NULL,
  `loteid` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`detaremitoid`),
  KEY `id_remito` (`id_remito`) USING BTREE,
  KEY `loteid` (`loteid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deta_ordeninsumos`
--

CREATE TABLE IF NOT EXISTS `deta_ordeninsumos` (
  `id_detaordeninsumo` int(11) NOT NULL AUTO_INCREMENT,
  `id_ordeninsumo` int(11) DEFAULT NULL,
  `loteid` int(10) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`id_detaordeninsumo`),
  KEY `loteid` (`loteid`) USING BTREE,
  KEY `id_ordeninsumo` (`id_ordeninsumo`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_insumos`
--

CREATE TABLE IF NOT EXISTS `orden_insumos` (
  `id_orden` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `solicitante` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `destino` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `comprobante` int(255) NOT NULL,
  PRIMARY KEY (`id_orden`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_pedido`
--

CREATE TABLE IF NOT EXISTS `orden_pedido` (
  `id_orden` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) NOT NULL,
  `nro_trabajo` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_entrega` datetime NOT NULL,
  `fecha_entregada` datetime NOT NULL,
  `estado` varchar(2) NOT NULL,
  `id_trabajo` int(11) NOT NULL,
  `observacion` text NOT NULL,
  PRIMARY KEY (`id_orden`),
  KEY `id_trabajo` (`id_trabajo`),
  KEY `id_proveedor` (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `orden_pedido`
--

INSERT INTO `orden_pedido` (`id_orden`, `id_proveedor`, `nro_trabajo`, `descripcion`, `fecha`, `fecha_entrega`, `fecha_entregada`, `estado`, `id_trabajo`, `observacion`) VALUES
(1, 5, 1255, 'PRUEBA DE ORDEN DE PEDIDO', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'P', 12, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_trabajo`
--

CREATE TABLE IF NOT EXISTS `orden_trabajo` (
  `id_orden` int(11) NOT NULL AUTO_INCREMENT,
  `nro` varchar(100) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_entrega` datetime NOT NULL,
  `fecha_terminada` datetime NOT NULL,
  `fecha_aviso` datetime NOT NULL,
  `fecha_entregada` datetime NOT NULL,
  `descripcion` text NOT NULL,
  `cliId` int(11) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `id_usuario` int(11) NOT NULL DEFAULT '1',
  `id_usuario_a` int(11) NOT NULL,
  `id_usuario_e` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  PRIMARY KEY (`id_orden`),
  KEY `orden_trabajo_ibfk_1` (`cliId`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_usuariosolicitante` (`id_usuario_a`),
  KEY `usuario_entrega` (`id_usuario_e`),
  KEY `id_sucursal` (`id_sucursal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `orden_trabajo`
--

INSERT INTO `orden_trabajo` (`id_orden`, `nro`, `fecha_inicio`, `fecha_entrega`, `fecha_terminada`, `fecha_aviso`, `fecha_entregada`, `descripcion`, `cliId`, `estado`, `id_usuario`, `id_usuario_a`, `id_usuario_e`, `id_sucursal`) VALUES
(1, '345656001', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'prueba', -1, 'C', 1, 1, 1, 1),
(2, '33455', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017-06-14 00:00:00', 'sadasd', 14, 'E', 1, 1, 1, 2),
(3, '333', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sdad', 13, 'T', 1, 1, 1, 2),
(4, 'ww', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'zx<x', 14, 'T', 1, 1, 1, 2),
(5, 'wwww', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '<zxz<x<', 14, 'T', 1, 1, 1, 1),
(6, '2332', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sadad', 14, 'T', 1, 1, 1, 1),
(7, '4342', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017-08-08 00:00:00', 'dsadsad', 14, 'E', 1, 1, 1, 2),
(8, '33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017-06-14 00:00:00', '333', 15, 'E', 1, 1, 1, 1),
(10, '4444', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017-08-08 00:00:00', 'dsadsa', 14, 'E', 1, 1, 1, 1),
(11, '3444', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'adsadsadsad\nEDITADO\n', 13, 'As', 1, 1, 1, 0),
(12, '33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'asdsa\nEDITADO1', 14, 'As', 1, 2, 1, 0),
(13, '12120', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cambiar ventana en edificio\nEDITADO', 16, 'C', 1, 1, 1, 0),
(18, '1234', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 20, 'C', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remitos`
--

CREATE TABLE IF NOT EXISTS `remitos` (
  `remitoId` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `provid` int(11) NOT NULL,
  `comprobante` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`remitoId`),
  KEY `provid` (`provid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `remitos`
--

INSERT INTO `remitos` (`remitoId`, `fecha`, `provid`, `comprobante`) VALUES
(27, '2010-06-29 00:00:00', 4, '23'),
(28, '2010-06-29 00:00:00', 4, '10'),
(29, '2010-06-29 00:00:00', 4, '15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sisactions`
--

CREATE TABLE IF NOT EXISTS `sisactions` (
  `actId` int(11) NOT NULL AUTO_INCREMENT,
  `actDescription` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `actDescriptionSpanish` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`actId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `sisactions`
--

INSERT INTO `sisactions` (`actId`, `actDescription`, `actDescriptionSpanish`) VALUES
(1, 'Add', 'Agregar'),
(2, 'Edit', 'Editar'),
(3, 'Del', 'Eliminar'),
(4, 'View', 'Consultar'),
(5, 'Imprimir', 'Imprimir'),
(6, 'Saldo', 'Consultar Saldo'),
(7, 'Asignar', 'Asignar'),
(8, 'Finalizar', 'Finalizar'),
(9, 'OP', 'OP'),
(10, 'Pedidos', 'Pedidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sisgroups`
--

CREATE TABLE IF NOT EXISTS `sisgroups` (
  `grpId` int(11) NOT NULL AUTO_INCREMENT,
  `grpName` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`grpId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `sisgroups`
--

INSERT INTO `sisgroups` (`grpId`, `grpName`) VALUES
(1, 'Administrador'),
(2, 'Vendedor'),
(3, 'Depósito'),
(4, 'Administra'),
(5, 'supervisor Laborator'),
(6, 'laboratorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sisgroupsactions`
--

CREATE TABLE IF NOT EXISTS `sisgroupsactions` (
  `grpactId` int(11) NOT NULL AUTO_INCREMENT,
  `grpId` int(11) NOT NULL,
  `menuAccId` int(11) NOT NULL,
  PRIMARY KEY (`grpactId`),
  KEY `grpId` (`grpId`),
  KEY `menuAccId` (`menuAccId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2895 ;

--
-- Volcado de datos para la tabla `sisgroupsactions`
--

INSERT INTO `sisgroupsactions` (`grpactId`, `grpId`, `menuAccId`) VALUES
(125, 2, 1),
(126, 2, 4),
(127, 2, 8),
(128, 2, 13),
(129, 2, 25),
(130, 2, 28),
(2766, 4, 1),
(2767, 4, 2),
(2768, 4, 4),
(2769, 5, 1),
(2770, 5, 2),
(2771, 5, 4),
(2772, 5, 41),
(2773, 5, 42),
(2774, 5, 43),
(2775, 5, 53),
(2776, 5, 54),
(2777, 5, 55),
(2778, 5, 56),
(2779, 5, 57),
(2780, 6, 54),
(2781, 6, 55),
(2782, 6, 56),
(2783, 6, 57),
(2784, 1, 1),
(2785, 1, 2),
(2786, 1, 4),
(2787, 1, 5),
(2788, 1, 6),
(2789, 1, 8),
(2790, 1, 17),
(2791, 1, 18),
(2792, 1, 19),
(2793, 1, 20),
(2794, 1, 21),
(2795, 1, 22),
(2796, 1, 23),
(2797, 1, 24),
(2798, 1, 25),
(2799, 1, 26),
(2800, 1, 27),
(2801, 1, 28),
(2802, 1, 29),
(2803, 1, 30),
(2804, 1, 31),
(2805, 1, 32),
(2806, 1, 33),
(2807, 1, 34),
(2808, 1, 35),
(2809, 1, 36),
(2810, 1, 39),
(2811, 1, 41),
(2812, 1, 42),
(2813, 1, 43),
(2814, 1, 53),
(2815, 1, 54),
(2816, 1, 55),
(2817, 1, 56),
(2818, 1, 57),
(2819, 1, 44),
(2820, 1, 45),
(2821, 1, 46),
(2822, 1, 47),
(2823, 1, 48),
(2824, 1, 49),
(2825, 1, 61),
(2826, 1, 62),
(2827, 1, 63),
(2828, 1, 64),
(2829, 1, 65),
(2830, 1, 66),
(2831, 1, 67),
(2832, 1, 70),
(2833, 1, 71),
(2834, 1, 72),
(2835, 1, 73),
(2836, 1, 74),
(2837, 1, 75),
(2838, 1, 76),
(2839, 1, 77),
(2840, 1, 78),
(2841, 1, 79),
(2842, 1, 80),
(2843, 1, 81),
(2844, 1, 82),
(2845, 1, 83),
(2846, 1, 84),
(2847, 1, 85),
(2848, 1, 86),
(2849, 1, 87),
(2850, 1, 88),
(2851, 1, 89),
(2852, 1, 93),
(2853, 1, 94),
(2854, 1, 95),
(2855, 1, 96),
(2856, 1, 97),
(2857, 1, 98),
(2858, 1, 102),
(2859, 1, 103),
(2860, 1, 104),
(2861, 1, 105),
(2862, 1, 106),
(2863, 1, 107),
(2864, 1, 108),
(2865, 1, 109),
(2866, 1, 110),
(2867, 1, 111),
(2868, 1, 112),
(2869, 1, 113),
(2870, 1, 117),
(2871, 1, 118),
(2872, 1, 119),
(2873, 1, 120),
(2874, 1, 121),
(2875, 1, 122),
(2876, 1, 123),
(2877, 1, 124),
(2878, 1, 125),
(2879, 1, 129),
(2880, 1, 130),
(2881, 1, 131),
(2882, 1, 132),
(2883, 1, 133),
(2884, 1, 134),
(2885, 1, 135),
(2886, 1, 136),
(2887, 1, 137),
(2888, 1, 138),
(2889, 1, 139),
(2890, 1, 140),
(2891, 1, 141),
(2892, 1, 142),
(2893, 1, 143),
(2894, 1, 144);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sismenu`
--

CREATE TABLE IF NOT EXISTS `sismenu` (
  `menuId` int(11) NOT NULL AUTO_INCREMENT,
  `menuName` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `menuIcon` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `menuController` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `menuView` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `menuFather` int(11) DEFAULT NULL,
  PRIMARY KEY (`menuId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=52 ;

--
-- Volcado de datos para la tabla `sismenu`
--

INSERT INTO `sismenu` (`menuId`, `menuName`, `menuIcon`, `menuController`, `menuView`, `menuFather`) VALUES
(1, 'Clientes', 'fa fa-users', 'Cliente', 'index', NULL),
(2, 'Calendario', 'fa fa-leanpub', 'Dash', 'Index', NULL),
(9, 'Seguridad', 'fa fa-key', '', '', NULL),
(10, 'Usuarios', '', 'user', 'index', 9),
(11, 'Grupos', '', 'group', 'index', 9),
(12, 'Administración', 'fa fa-fw fa-cogs', '', '', NULL),
(13, 'Zonas', '', 'zone', 'index', 12),
(14, 'Familias', '', 'family', 'index', 12),
(15, 'Sub-Familias', '', 'family', 'indexSF', 12),
(16, 'BackUp', 'fa fa-check-square-o', 'backup', 'index', NULL),
(17, 'Ordenes_de_trabajo', 'fa fa-check-square-o', '', '', NULL),
(18, 'Alta_Ordenes', 'fa fa-plus', 'otrabajo', 'listOrden', 17),
(19, 'Entrega _ordenes', 'fa-thumbs-up', 'Envio', 'index', 17),
(20, 'Reporte Ordenes', 'fa fa-file-picture-o', '', 'index', 17),
(21, 'Ordenes_Pedido', 'fa  fa-tags', '', '', NULL),
(22, 'Proveedores', 'fa fa-truck', 'Proveedor', 'index', 21),
(23, 'Enviar Pedido', 'fa fa-paper-plane ', '', 'index', 21),
(24, 'Reporte O. Pedido', 'fa fa-file-picture-o', '', 'index', 21),
(25, 'Gestion_Stock', 'fa fa-truck', '', '', NULL),
(26, 'Articulos', 'fa fa-cubes', 'Article', 'index', 25),
(27, 'Stock', 'fa fa-truck', 'Lote', 'index', 25),
(28, 'Remitos', 'fa fa-paperclip ', 'Remito', 'index', 25),
(29, 'Ordenes_insumos', 'fa fa-check', 'Ordeninsumo', 'index', 25),
(30, 'Proveedores_', 'fa fa-truck', 'proveedor', 'index', 25),
(31, 'Cheques', 'fa  fa-cc ', 'Cheque', '', NULL),
(32, 'Cheques_propios', 'fa fa-cc ', 'Cheqpropio', 'index', 31),
(33, 'Cheques_terceros', 'a fa-external-link-square ', 'Cheqtercero', 'index', 31),
(34, 'ABM_Proveedores', 'fa fa-truck ', '', '', 31),
(35, 'ABM_Bancos', 'fa fa-university ', 'Banco', 'index', 31),
(36, 'ABM_Chequera', 'fa fa-university ', 'Chequera', 'index', 31),
(37, 'Reportes_cheques', 'fa fa-cart-arrow-down ', 'Reporte', 'index', 31),
(38, 'Compras', 'fa fa-cart-arrow-down ', '', '', NULL),
(39, 'Factura', 'fa fa-calculator', 'Factura', 'index', 38),
(40, 'Pagos', 'fa fa-money', 'Ordenpago', 'index', 38),
(41, 'Iva_Compras', 'fa fa-calculator', 'Ivacompra', 'index', 38),
(42, 'Informe_Compras', 'fa fa-newspaper-o', 'Informecompra', 'index', 38),
(43, 'Informes_Pagos', '', '', '', 38),
(44, 'compras 1', '', '', '', 38),
(45, 'compras2', '', '', '', 38),
(46, 'Tarjetas', 'fa fa-credit-card', '', '', NULL),
(47, 'Alta_cupones', '', 'Cupon', 'index', 46),
(48, 'Conciliar_liquidacion', '', 'Liquida', 'index', 46),
(49, 'Alta_tarjetas', '', 'Tarjeta', 'index', 46),
(50, 'Reporte_liquidacion', '', '', '', 46),
(51, 'Reporte_cupones', '', '', '', 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sismenuactions`
--

CREATE TABLE IF NOT EXISTS `sismenuactions` (
  `menuAccId` int(11) NOT NULL AUTO_INCREMENT,
  `menuId` int(11) NOT NULL,
  `actId` int(11) DEFAULT NULL,
  PRIMARY KEY (`menuAccId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=145 ;

--
-- Volcado de datos para la tabla `sismenuactions`
--

INSERT INTO `sismenuactions` (`menuAccId`, `menuId`, `actId`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(8, 2, 4),
(13, 4, 1),
(14, 6, 5),
(15, 7, 5),
(16, 8, 5),
(17, 10, 1),
(18, 10, 2),
(19, 10, 3),
(20, 10, 4),
(21, 11, 1),
(22, 11, 2),
(23, 11, 3),
(24, 11, 4),
(25, 13, 1),
(26, 13, 2),
(27, 13, 3),
(28, 13, 4),
(29, 14, 1),
(30, 14, 2),
(31, 14, 3),
(32, 14, 4),
(33, 15, 1),
(34, 15, 2),
(35, 15, 3),
(36, 15, 4),
(37, 4, 4),
(38, 4, 6),
(39, 16, 1),
(40, 4, 3),
(41, 18, 1),
(42, 18, 2),
(43, 18, 3),
(44, 19, 1),
(45, 19, 1),
(46, 19, 2),
(47, 20, 1),
(48, 20, 2),
(49, 20, 3),
(50, 17, 1),
(51, 17, 2),
(52, 17, 3),
(53, 18, 7),
(54, 18, 8),
(55, 18, 9),
(56, 18, 10),
(57, 18, 4),
(61, 22, 1),
(62, 22, 3),
(63, 22, 4),
(64, 23, 1),
(65, 23, 2),
(66, 23, 3),
(67, 24, 1),
(68, 24, 1),
(69, 24, 1),
(70, 26, 1),
(71, 26, 2),
(72, 26, 3),
(73, 26, 4),
(74, 27, 1),
(75, 27, 2),
(76, 27, 3),
(77, 27, 4),
(78, 28, 1),
(79, 28, 2),
(80, 28, 3),
(81, 28, 4),
(82, 29, 1),
(83, 29, 2),
(84, 29, 3),
(85, 29, 4),
(86, 30, 1),
(87, 30, 2),
(88, 30, 3),
(89, 30, 4),
(90, 31, 1),
(91, 31, 2),
(92, 31, 3),
(93, 32, 1),
(94, 32, 2),
(95, 32, 3),
(96, 33, 1),
(97, 33, 2),
(98, 33, 3),
(99, 34, 1),
(100, 34, 2),
(101, 34, 3),
(102, 35, 1),
(103, 35, 2),
(104, 35, 3),
(105, 36, 1),
(106, 36, 2),
(107, 36, 3),
(108, 37, 1),
(109, 37, 2),
(110, 37, 3),
(111, 39, 1),
(112, 39, 2),
(113, 39, 3),
(117, 40, 1),
(118, 40, 2),
(119, 40, 3),
(120, 41, 1),
(121, 41, 2),
(122, 41, 3),
(123, 42, 1),
(124, 42, 2),
(125, 42, 3),
(126, 43, 1),
(127, 43, 2),
(128, 43, 3),
(129, 47, 1),
(130, 47, 2),
(131, 47, 3),
(132, 48, 1),
(133, 48, 2),
(134, 48, 3),
(135, 49, 1),
(136, 49, 2),
(137, 49, 3),
(138, 50, 1),
(139, 50, 2),
(140, 50, 3),
(141, 51, 1),
(142, 51, 2),
(143, 51, 3),
(144, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sisusers`
--

CREATE TABLE IF NOT EXISTS `sisusers` (
  `usrId` int(11) NOT NULL AUTO_INCREMENT,
  `usrNick` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `usrName` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usrLastName` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usrComision` int(11) NOT NULL,
  `usrPassword` varchar(5000) COLLATE utf8_spanish_ci NOT NULL,
  `grpId` int(11) NOT NULL,
  PRIMARY KEY (`usrId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `sisusers`
--

INSERT INTO `sisusers` (`usrId`, `usrNick`, `usrName`, `usrLastName`, `usrComision`, `usrPassword`, `grpId`) VALUES
(1, 'admin', 'Administrador', ' ', 0, '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Juanp', 'Juan ', 'Perez', 0, 'e00cf25ad42683b3df678c61f42c6bda', 3),
(3, 'Roberto', 'roberto', 'roberto', 0, '21429bba62e1f21a7e44621e1236a58a', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE IF NOT EXISTS `sucursal` (
  `id_sucursal` int(11) NOT NULL AUTO_INCREMENT,
  `dire` varchar(3000) NOT NULL,
  `telefono` varchar(3000) NOT NULL,
  `zonas` varchar(3000) NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `descripc` varchar(3000) NOT NULL,
  PRIMARY KEY (`id_sucursal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `dire`, `telefono`, `zonas`, `id_localidad`, `descripc`) VALUES
(1, 'ee', 'ee', 'eee', 1, 'casa central'),
(2, 'v', 'fafa', 'fafa', 1, 'casa central ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_chequera`
--

CREATE TABLE IF NOT EXISTS `tbl_chequera` (
  `cheqId` int(11) NOT NULL AUTO_INCREMENT,
  `cheqinicio` varchar(255) DEFAULT NULL,
  `cheqcantidad` varchar(255) DEFAULT NULL,
  `chefecha` varchar(255) DEFAULT NULL,
  `bancid` int(11) DEFAULT NULL,
  `cont` int(11) DEFAULT NULL,
  PRIMARY KEY (`cheqId`),
  KEY `bancid` (`bancid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `tbl_chequera`
--

INSERT INTO `tbl_chequera` (`cheqId`, `cheqinicio`, `cheqcantidad`, `chefecha`, `bancid`, `cont`) VALUES
(10, '89879326', '50', NULL, 3, 50),
(11, '91852301', '50', NULL, 3, 49),
(12, '2820001', '50', NULL, 5, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cheques`
--

CREATE TABLE IF NOT EXISTS `tbl_cheques` (
  `cheqid` int(11) NOT NULL AUTO_INCREMENT,
  `cheqnro` int(11) NOT NULL,
  `cheqvenc` date DEFAULT NULL,
  `provid` int(11) DEFAULT NULL,
  `cheqmonto` double DEFAULT NULL,
  `cheqestado` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_chequera` int(11) DEFAULT NULL,
  `cheqfechae` date NOT NULL,
  PRIMARY KEY (`cheqid`),
  KEY `provid` (`provid`),
  KEY `id_chequera` (`id_chequera`),
  KEY `cheqestado` (`cheqestado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Volcado de datos para la tabla `tbl_cheques`
--

INSERT INTO `tbl_cheques` (`cheqid`, `cheqnro`, `cheqvenc`, `provid`, `cheqmonto`, `cheqestado`, `id_chequera`, `cheqfechae`) VALUES
(7, 89879326, '2018-04-30', 64, 20000, 'C', 10, '2018-04-23'),
(8, 89879327, '2018-05-31', 64, 23, 'C', 10, '2018-04-23'),
(9, 89879328, '2018-06-30', 64, 23.61, 'C', 10, '2018-04-23'),
(10, 89879340, '2018-04-13', 12, 30, 'C', 10, '2018-04-23'),
(11, 89879341, '2018-05-14', 12, 50, 'C', 10, '2018-04-23'),
(13, 89879343, '2018-04-30', 11, 8.047, 'C', 10, '2018-04-23'),
(14, 89879344, '2018-05-31', 11, 10, 'C', 10, '2018-04-23'),
(15, 89879345, '2018-06-30', 11, 10, 'C', 10, '2018-04-23'),
(16, 89879346, '2018-05-15', 11, 9.159, 'C', 10, '2018-04-23'),
(17, 89879357, '2018-05-30', 23, 40, 'C', 10, '2018-04-23'),
(18, 89879358, '2018-06-30', 23, 41, 'C', 10, '2018-04-23'),
(19, 89879359, '2018-07-30', 23, 50, 'C', 10, '2018-04-23'),
(20, 89879360, '2018-08-30', 23, 60, 'C', 10, '2018-04-23'),
(21, 89879361, '2018-09-30', 23, 60, 'C', 10, '2018-04-23'),
(22, 89879362, '2018-10-30', 23, 60, 'C', 10, '2018-04-23'),
(23, 89879363, '2018-11-30', 23, 70, 'C', 10, '2018-04-23'),
(24, 89879368, '2018-04-30', 14, 5, 'C', 10, '2018-04-23'),
(25, 89879369, '2018-05-28', 14, 6.374, 'C', 10, '2018-04-23'),
(26, 89879338, '2018-04-30', 33, 7.278, 'C', 10, '2018-04-23'),
(27, 89879339, '2018-05-30', 33, 10, 'C', 10, '2018-04-23'),
(28, 89879329, '2018-04-30', 55, 10.232, 'C', 10, '2018-04-23'),
(29, 89879330, '2018-05-31', 55, 15, 'C', 10, '2018-04-23'),
(30, 89879331, '2018-06-30', 55, 15, 'C', 10, '2018-04-23'),
(31, 89879332, '2018-04-30', 25, 6.244, 'C', 10, '2018-04-23'),
(32, 89879333, '2018-05-31', 25, 10, 'C', 10, '2018-04-23'),
(33, 89879334, '2018-06-30', 25, 10, 'C', 10, '2018-04-23'),
(34, 89879335, '2018-04-30', 66, 11.803, 'C', 10, '2018-04-23'),
(35, 89879336, '2018-04-30', 27, 12, 'C', 10, '2018-04-23'),
(36, 89879337, '2018-05-31', 27, 12, 'C', 10, '2018-04-23'),
(38, 89879367, '2018-04-30', 15, 10.48, 'C', 10, '2018-04-23'),
(39, 89879371, '2018-04-30', 67, 3.702, 'C', 10, '2018-04-23'),
(40, 89879348, '2018-05-31', 24, 9.532, 'C', 10, '2018-04-23'),
(41, 89879349, '2018-06-30', 24, 12, 'C', 10, '2018-04-23'),
(42, 89879350, '2018-07-31', 24, 12, 'C', 10, '2018-04-23'),
(43, 89879351, '2018-08-30', 24, 12, 'C', 10, '2018-04-23'),
(44, 89879352, '2018-09-30', 24, 12, 'C', 10, '2018-04-23'),
(45, 89879353, '2018-10-30', 24, 12, 'C', 10, '2018-04-23'),
(46, 89879370, '2018-04-30', 69, 1.792, 'C', 10, '2018-04-23'),
(47, 89879364, '2018-05-21', 70, 18.382, 'C', 10, '2018-04-23'),
(49, 89879366, '2018-07-30', 70, 20, 'C', 10, '2018-04-23'),
(50, 89879372, '2018-05-18', 57, 4.484, 'C', 10, '2018-04-24'),
(51, 89879373, '2018-04-25', 71, 14.26, 'C', 10, '2018-04-24'),
(52, 89879374, '2018-05-24', 71, 14.26, 'C', 10, '2018-04-24'),
(53, 89879375, '2018-05-15', 30, 6.02, 'C', 10, '2018-04-26'),
(55, 91852301, '2018-07-31', 26, 50, 'C', 11, '2018-05-23'),
(56, 91852302, '2018-08-31', 26, 60, 'C', 11, '2018-05-23'),
(57, 91852303, '2018-09-30', 26, 60, 'C', 11, '2018-05-23'),
(58, 91852304, '2018-10-31', 26, 60, 'C', 11, '2018-05-23'),
(59, 91852305, '2018-11-30', 26, 60000, 'C', 11, '2018-05-23'),
(60, 91852306, '2018-12-31', 26, 60, 'C', 11, '2018-05-23'),
(61, 91852307, '2018-06-04', 73, 4.85, 'C', 11, '2018-05-23'),
(62, 91852308, '2018-07-06', 73, 4.85, 'C', 11, '2018-05-23'),
(63, 91852309, '2018-08-06', 73, 4.85, 'C', 11, '2018-05-23'),
(64, 91852310, '2018-09-06', 73, 4.85, 'C', 11, '2018-05-23'),
(65, 91852311, '2018-10-06', 73, 4.85, 'C', 11, '2018-05-23'),
(66, 91852312, '2018-11-06', 73, 4.85, 'C', 11, '2018-05-23'),
(67, 91852336, '2018-05-31', 68, 24, 'C', 11, '2018-05-09'),
(68, 91852337, '2018-06-30', 68, 24, 'C', 11, '2018-05-09'),
(69, 91852338, '2018-07-31', 68, 24, 'C', 11, '2018-05-09'),
(70, 89879342, '2018-06-15', 12, 50000, 'C', 10, '2018-04-23'),
(71, 89879375, '2018-05-15', 30, 6020, 'C', 10, '2018-04-23'),
(72, 91852339, '2018-08-31', 68, 27383.91, 'C', 11, '2018-05-09'),
(73, 91852333, '2018-07-10', 57, 11719, 'C', 11, '2018-06-08'),
(74, 91852334, '2018-08-31', 57, 9200, 'C', 11, '2018-06-08'),
(75, 91852335, '2018-09-30', 57, 7948, 'C', 11, '2018-06-08'),
(76, 91852315, '2018-05-31', 17, 60000, 'C', 11, '2018-05-28'),
(77, 91852316, '2018-06-22', 17, 50000, 'C', 11, '2018-05-29'),
(78, 91852317, '2018-06-30', 17, 50000, 'C', 11, '2018-05-29'),
(82, 91852321, '2018-08-31', 17, 50000, 'C', 11, '2018-05-29'),
(83, 91852318, '2018-07-20', 17, 50000, 'C', 11, '2018-05-29'),
(84, 91852319, '2018-07-31', 17, 50000, 'C', 11, '2018-05-29'),
(85, 91852320, '2018-08-17', 17, 50000, 'C', 11, '2018-05-29'),
(86, 91852322, '2018-06-22', 18, 12619.75, 'C', 11, '2018-05-28'),
(87, 91852323, '2018-06-08', 15, 13326, 'C', 11, '2018-05-28'),
(88, 91852324, '2018-06-22', 15, 4966, 'C', 11, '2018-05-28'),
(89, 91852325, '2018-06-30', 11, 10000, 'C', 11, '2018-05-28'),
(90, 91852326, '2018-07-23', 11, 12654, 'C', 11, '2018-05-28'),
(91, 91852327, '2018-06-30', 32, 6000, 'C', 11, '2018-06-06'),
(92, 91852328, '2018-07-31', 32, 6000, 'C', 11, '2018-06-06'),
(93, 91852329, '2018-08-31', 32, 7000, 'C', 11, '2018-06-06'),
(94, 91852330, '2018-09-30', 32, 7000, 'C', 11, '2018-06-06'),
(95, 91852332, '2018-10-31', 32, 9574.1, 'C', 11, '2018-06-06'),
(96, 91852331, '2018-10-31', 32, 7142, 'C', 11, '2018-06-08'),
(97, 91852347, '2018-08-30', 74, 16920, 'C', 11, '2018-06-11'),
(98, 91852348, '2018-06-30', 12, 60000, 'C', 11, '2018-06-19'),
(99, 91852349, '2018-07-31', 12, 70000, 'C', 11, '2018-06-19'),
(100, 91852350, '2018-08-31', 12, 70000, 'C', 11, '2018-06-19'),
(101, 91852346, '2018-07-31', 66, 10877, 'C', 11, '2018-06-11'),
(102, 91852340, '2018-07-31', 25, 12646.65, 'C', 11, '2018-06-11'),
(103, 91852341, '2018-08-31', 25, 15000, 'C', 11, '2018-06-11'),
(104, 91852342, '2018-09-30', 25, 15000, 'C', 11, '2018-06-11'),
(106, 27000016, '2018-06-22', 65, 19585.64, 'C', 12, '2018-03-08'),
(107, 2700017, '2018-07-22', 65, 19585.64, 'C', 12, '2018-03-08'),
(108, 2700018, '2018-08-22', 65, 19585.64, 'C', 12, '2018-03-08'),
(109, 2700019, '2018-09-22', 65, 19585.64, 'C', 12, '2018-03-08'),
(110, 2820006, '2018-10-22', 65, 19585.64, 'C', 12, '2018-03-08'),
(111, 89879365, '2018-06-21', 22, 20000, 'C', 10, '2018-05-01'),
(112, 91852358, '2018-08-06', 75, 4383.54, 'E', 11, '2018-07-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_chequesterceros`
--

CREATE TABLE IF NOT EXISTS `tbl_chequesterceros` (
  `id_che` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `id_banco` int(11) NOT NULL,
  `cliente` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `monto` float NOT NULL,
  `fecha_vto` date NOT NULL,
  PRIMARY KEY (`id_che`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbl_chequesterceros`
--

INSERT INTO `tbl_chequesterceros` (`id_che`, `numero`, `id_banco`, `cliente`, `estado`, `monto`, `fecha_vto`) VALUES
(5, 4324234, 4, 'dasdasdas', 'E', 23.333, '2017-05-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cupon`
--

CREATE TABLE IF NOT EXISTS `tbl_cupon` (
  `cuponid` int(11) NOT NULL AUTO_INCREMENT,
  `cuponfech` datetime DEFAULT NULL,
  `cuponnro` varchar(255) DEFAULT NULL,
  `cuponlote` varchar(255) DEFAULT NULL,
  `cuponfactura` varchar(255) DEFAULT NULL,
  `cuponcliente` varchar(255) DEFAULT NULL,
  `cuponmonto` double DEFAULT NULL,
  `cuponestado` varchar(255) DEFAULT NULL,
  `tarjetaid` int(11) DEFAULT NULL,
  PRIMARY KEY (`cuponid`),
  KEY `tarjetaid` (`tarjetaid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `tbl_cupon`
--

INSERT INTO `tbl_cupon` (`cuponid`, `cuponfech`, `cuponnro`, `cuponlote`, `cuponfactura`, `cuponcliente`, `cuponmonto`, `cuponestado`, `tarjetaid`) VALUES
(5, '2017-06-27 00:00:00', '1122', NULL, 'A', NULL, 5.5, 'L', 1),
(6, '2017-08-23 00:00:00', '15', '1414', 'A', 'gemma', 14.141, 'L', 2),
(8, '2017-10-02 00:00:00', '0015', '011', '11504', 'Contreras Griselga', 4.09, 'C', 4),
(9, '2017-10-02 00:00:00', '0016', '011', '11505', 'Moreno, MArtin', 3.7, 'C', 6),
(10, '2017-10-02 00:00:00', '0017', '011', '11510', 'Castillo Eduardo', 1.51, 'C', 6),
(11, '2017-10-02 00:00:00', '0018', '011', '11511', 'Torres, Emanuel', 550, 'C', 3),
(12, '2017-10-02 00:00:00', '0005', '002', '11512', 'Barquiel Giselle', 190, 'C', 11),
(13, '2017-10-02 00:00:00', '0019', '003', '11506', 'Conde, Maria ', 148, 'C', 6),
(14, '2017-10-02 00:00:00', '0020', '003', '11509', 'Elias, Elsa', 7.62, 'C', 3),
(15, '2017-10-03 00:00:00', '0016', '011', '11514', 'Castro, Viviana', 1.145, 'C', 7),
(16, '2017-10-03 00:00:00', '0019', '012', '11513', 'Lopez, Mario', 360, 'C', 6),
(17, '2017-10-03 00:00:00', '0020', '12', '11515', 'Castro Walter', 1.45, 'C', 2),
(18, '2017-10-04 00:00:00', '0021', '013', '11519', 'Tapia, Armani', 1.54, 'C', 4),
(19, '2017-10-04 00:00:00', '0022', '013', '11521', 'Sanchez, Ruben', 500, 'C', 6),
(20, '2017-10-04 00:00:00', '0022', '004', '11520', 'Jofre Javier', 1.5, 'C', 4),
(21, '2017-10-04 00:00:00', '0021', '004', '11518', 'Guiron Mariela', 2, 'C', 6),
(22, '2017-10-04 00:00:00', '0023', '004', '11522', 'Oyola Vizcaino', 2.485, 'C', 6),
(23, '2017-10-05 00:00:00', '0006', '003', '11536', 'Mardonez, Nelida', 850, 'C', 5),
(24, '2017-10-05 00:00:00', '0024', '005', '11524', 'Gonzalez, belen', 850, 'C', 3),
(25, '2017-10-05 00:00:00', '0024', '014', '11526', 'Robledo, Natalia', 570, 'C', 3),
(26, '2017-10-05 00:00:00', '0026', '005', '11544', 'Mugas, Marta', 4, 'C', 3),
(27, '2017-10-05 00:00:00', '0025', '005', '11540', 'Morales, Marcela', 2.55, 'C', 2),
(28, '0000-00-00 00:00:00', '', '', '', '', 0, 'C', -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_deposito`
--

CREATE TABLE IF NOT EXISTS `tbl_deposito` (
  `depid` int(11) NOT NULL AUTO_INCREMENT,
  `depfecha` date DEFAULT NULL,
  `depbanco` int(11) DEFAULT NULL,
  `liquidaid` int(11) DEFAULT NULL,
  `bancid` int(11) DEFAULT NULL,
  `depestado` varchar(11) DEFAULT NULL,
  `depmonto` double NOT NULL,
  `codigo` double NOT NULL,
  PRIMARY KEY (`depid`),
  KEY `liquidaid` (`liquidaid`),
  KEY `bancid` (`bancid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_deposito`
--

INSERT INTO `tbl_deposito` (`depid`, `depfecha`, `depbanco`, `liquidaid`, `bancid`, `depestado`, `depmonto`, `codigo`) VALUES
(1, '2017-06-01', 3, 1, 3, 'C', 100, 1012),
(2, '2017-06-22', 3, 2, 3, 'C', 12, 120),
(3, '2017-09-08', 3, 2, 3, 'C', 15555, 1415),
(4, '2017-09-14', NULL, 1, 3, 'C', 233, 22323);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detaliquida`
--

CREATE TABLE IF NOT EXISTS `tbl_detaliquida` (
  `detaliqid` int(11) NOT NULL AUTO_INCREMENT,
  `liquidaid` int(11) DEFAULT NULL,
  `detaliqfecha` datetime DEFAULT NULL,
  `cuponid` int(11) DEFAULT NULL,
  PRIMARY KEY (`detaliqid`),
  KEY `liquidaid` (`liquidaid`),
  KEY `cuponid` (`cuponid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_detaliquida`
--

INSERT INTO `tbl_detaliquida` (`detaliqid`, `liquidaid`, `detaliqfecha`, `cuponid`) VALUES
(1, 1, '2017-08-23 00:00:00', 5),
(2, 2, '2017-08-23 00:00:00', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detaordenpago`
--

CREATE TABLE IF NOT EXISTS `tbl_detaordenpago` (
  `id_detaordenpago` int(11) NOT NULL AUTO_INCREMENT,
  `opid` int(11) DEFAULT NULL,
  `monto` float(15,3) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tipo` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `comp` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_detaordenpago`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tbl_detaordenpago`
--

INSERT INTO `tbl_detaordenpago` (`id_detaordenpago`, `opid`, `monto`, `fecha`, `tipo`, `comp`) VALUES
(1, 1, 23.333, '2017-09-15', 'tercero', '1'),
(2, 1, 500.000, '2017-09-15', 'propio', '1'),
(3, 1, 5526.670, '2017-09-15', 'efectivo', '1'),
(4, 2, 41342.121, '2018-06-27', 'efectivo', '1'),
(5, 3, 134685.875, '2018-06-27', 'efectivo', '1'),
(6, 4, 98332.039, '2018-06-30', 'efectivo', '1'),
(7, 5, 4383.540, '2018-07-04', 'propio', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estados`
--

CREATE TABLE IF NOT EXISTS `tbl_estados` (
  `estadoid` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`estadoid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_estados`
--

INSERT INTO `tbl_estados` (`estadoid`, `descripcion`, `estado`) VALUES
(1, 'CURSO', 'C'),
(2, 'PAGADO', 'P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_factura`
--

CREATE TABLE IF NOT EXISTS `tbl_factura` (
  `facId` int(11) NOT NULL AUTO_INCREMENT,
  `facNumero` varchar(20) NOT NULL,
  `facFecha` date NOT NULL,
  `facTipo` varchar(10) NOT NULL,
  `facProveedorId` int(11) NOT NULL,
  `facSubtotal` double NOT NULL,
  `facIva` double NOT NULL,
  `facIva2` double NOT NULL,
  `facIngresosBrutos` double NOT NULL,
  `facTotal` double NOT NULL,
  `facRetenciones` double NOT NULL,
  `facTipoComprobante` varchar(10) NOT NULL,
  `facEstado` varchar(10) NOT NULL,
  PRIMARY KEY (`facId`),
  KEY `provid` (`facProveedorId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=702 ;

--
-- Volcado de datos para la tabla `tbl_factura`
--

INSERT INTO `tbl_factura` (`facId`, `facNumero`, `facFecha`, `facTipo`, `facProveedorId`, `facSubtotal`, `facIva`, `facIva2`, `facIngresosBrutos`, `facTotal`, `facRetenciones`, `facTipoComprobante`, `facEstado`) VALUES
(1, '0000001', '2017-08-25', 'B', 9, 1256.78, 263.92, 0, 37.7, 1614.96, 56.56, 'FA', 'P'),
(2, '0011-00077739', '2017-08-10', 'A', 10, 81679, 17152.59, 0, 0, 98831.59, 0, 'FA', 'C'),
(3, '0101-00561194', '2017-03-28', 'A', 11, 302.12, 63.45, 0, 0, 365.57, 0, 'FA', 'C'),
(4, '0101-00589002', '2017-08-08', 'A', 11, 314.87, 66.12, 0, 0, 380.99, 0, 'FA', 'C'),
(5, '0101-00589001', '2017-08-08', 'A', 11, 2.04, 0.43, 0, 0, 2.47, 0, 'FA', 'C'),
(6, '0101-00589287', '2017-08-09', 'A', 11, 116.79, 24.53, 0, 0, 141.32, 0, 'FA', 'C'),
(7, '0101-00589706', '2017-08-10', 'A', 11, 315.89, 66.34, 0, 0, 382.23, 0, 'FA', 'C'),
(8, '0101-00589706', '2017-08-10', 'A', 11, 315.89, 66.34, 0, 0, 382.23, 0, 'FA', 'C'),
(9, '0101-00589705', '2017-08-10', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(10, '0101-00589704', '2017-08-10', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(11, '0101-00589696', '2017-08-10', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(12, '0101-00589686', '2017-08-10', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(13, '0101-00590868', '2017-08-16', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(14, '0101-00590873', '2017-08-16', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(15, '0101-00591134', '2017-08-17', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(16, '0101-00591257', '2017-08-17', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(17, '0106-00110831', '2017-08-17', 'A', 11, 44.98, 9.45, 0, 0, 54.43, 0, 'FA', 'C'),
(18, '0106-00111187', '2017-08-22', 'A', 11, 320.38, 67.28, 0, 0, 387.66, 0, 'FA', 'C'),
(19, '0010-00013863', '2017-08-02', 'A', 12, 1377, 289.17, 0, 0, 1666.17, 0, 'FA', 'P'),
(20, '0010-00013882', '2017-08-03', 'A', 12, 0.02, 0, 0, 0, 0.02, 0, 'FA', 'P'),
(21, '0010-00013911', '2017-08-04', 'A', 12, 0.02, 0, 0, 0, 0.02, 0, 'FA', 'P'),
(22, '0010-00013935', '2017-08-07', 'A', 12, 1429.2, 300.13, 0, 0, 1729.33, 0, 'FA', 'P'),
(23, '0010-00013978', '2017-08-09', 'A', 12, 484.5, 101.74, 0, 0, 586.25, 0, 'FA', 'P'),
(24, '0010-00013996', '2017-08-10', 'A', 12, 2836.8, 595.73, 0, 0, 3432.53, 0, 'FA', 'P'),
(25, '0010-00014033', '2017-08-12', 'A', 12, 5764.12, 1210.47, 0, 0, 6974.59, 0, 'FA', 'P'),
(26, '0010-00014069', '2017-08-15', 'A', 12, 2457, 515.97, 0, 0, 2972.97, 0, 'FA', 'P'),
(27, '0010-00014091', '2017-08-16', 'A', 12, 850.1, 178.52, 0, 0, 1028.62, 0, 'FA', 'P'),
(28, '0010-00014112', '2017-08-17', 'A', 12, 1369.62, 287.62, 0, 0, 1657.24, 0, 'FA', 'P'),
(29, '0010-00014132', '2017-08-18', 'A', 12, 9218.2, 1935.82, 0, 0, 11154.02, 0, 'FA', 'P'),
(30, '0010-00014183', '2017-08-23', 'A', 12, 0.06, 0.01, 0, 0, 0.07, 0, 'FA', 'P'),
(31, '0022-47886', '2017-08-03', 'A', 13, 116.69, 24.5, 0, 0, 141.19, 0, 'FA', 'C'),
(32, '0013-00058831', '2017-08-17', 'A', 13, 116.69, 24.5, 0, 0, 141.19, 0, 'FA', 'C'),
(33, '0021-00727784', '2017-08-18', 'A', 13, 233.38, 49.01, 0, 0, 282.39, 0, 'FA', 'C'),
(34, '0003-00006930', '2017-08-04', 'A', 14, 1559, 327.39, 0, 0, 1886.39, 0, 'FA', 'C'),
(35, '0003-00007045', '2017-08-17', 'A', 14, 1950, 409.5, 0, 0, 2359.5, 0, 'FA', 'C'),
(36, '0003-00007081', '2017-08-23', 'A', 14, 1100, 231, 0, 0, 1331, 0, 'FA', 'C'),
(38, '0058-00330456', '2017-08-02', 'A', 15, 1394, 292.74, 0, 0, 1686.74, 0, 'FA', 'C'),
(39, '0037-00031304', '2017-08-07', 'A', 15, 99.56, 20.91, 0, 0, 120.47, 0, 'FA', 'C'),
(40, '0037-00031434', '2017-08-12', 'A', 15, 49.78, 10.45, 0, 0, 60.23, 0, 'FA', 'C'),
(41, '0031-00287852', '2017-08-11', 'A', 16, 4767.03, 1001.08, 0, 0, 5911.12, 143.01, 'FA', 'C'),
(42, '0031-00287293', '2017-08-04', 'A', 16, 4260.02, 894.6, 0, 0, 5282.42, 127.8, 'FA', 'C'),
(43, '0002-00000104', '2017-08-23', 'A', 17, 99527.75, 20900.83, 0, 0, 120428.58, 0, 'FA', 'C'),
(44, '0010-00014210', '2017-08-24', 'A', 12, 7691.9, 1615.3, 0, 0, 9307.2, 0, 'FA', 'P'),
(45, '0101-00592803', '2017-08-28', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(46, '0101-00592804', '2017-08-28', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(47, '0101-00592791', '2017-08-28', 'A', 11, 330.48, 69.4, 0, 0, 399.88, 0, 'FA', 'C'),
(48, '0106-00109857', '2017-08-28', 'A', 11, 569.62, 119.62, 0, 0, 689.24, 0, 'FA', 'C'),
(49, '0003-00007109', '2017-08-25', 'A', 14, 275, 57.75, 0, 0, 332.75, 0, 'FA', 'C'),
(50, '0021-00730174', '2017-08-26', 'A', 13, 1309.17, 274.93, 0, 0, 1584.1, 0, 'FA', 'C'),
(51, '0021-00729798', '2017-08-25', 'A', 13, 233.38, 49.01, 0, 0, 282.39, 0, 'FA', 'C'),
(52, '0010-00014269', '2017-08-29', 'A', 12, 688.5, 144.59, 0, 0, 833.09, 0, 'FA', 'P'),
(53, '0010-00014241', '2017-08-28', 'A', 13, 850.18, 178.54, 0, 0, 1028.72, 0, 'FA', 'C'),
(54, '0010-00014230', '2017-08-25', 'A', 12, 0.04, 0.01, 0, 0, 0.05, 0, 'FA', 'P'),
(55, '0003-00007134', '2017-08-30', 'A', 14, 550, 115.5, 0, 0, 665.5, 0, 'FA', 'C'),
(56, '0010-00014286', '2017-08-30', 'A', 12, 14805.8, 3109.22, 0, 0, 17915.02, 0, 'FA', 'P'),
(57, '0010-00014316', '2017-08-31', 'A', 12, 913.22, 191.78, 0, 0, 1105, 0, 'FA', 'P'),
(58, '0101-00593090', '2017-08-29', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(59, '0106-00109655', '2017-08-08', 'A', 11, 1885.57, 395.97, 0, 0, 2281.54, 0, 'FA', 'C'),
(60, '0106-00111410', '2017-08-23', 'A', 11, 1408.67, 295.82, 0, 0, 1704.49, 0, 'FA', 'C'),
(61, '0031-00288465', '2017-08-19', 'A', 16, 14944.02, 3138.24, 0, 0, 18530.58, 448.32, 'FA', 'C'),
(62, '111111', '2017-09-11', 'A', 4, 5000, 1050, 0, 0, 6050, 0, 'FA', 'P'),
(63, '22222', '2017-09-11', 'A', 4, 200, 0, 0, 0, 200.5, 0, 'FA', 'C'),
(64, '0005-00083107', '2017-08-15', 'A', 18, 18432.1, 3870.74, 0, 0, 22302.84, 0, 'FA', 'C'),
(65, '0005-00083108', '2017-08-15', 'A', 18, 9785, 2054.85, 0, 0, 11839.85, 0, 'FA', 'C'),
(66, '0005-00083109', '2017-08-15', 'A', 18, 22038.85, 4628.16, 0, 0, 26667.01, 0, 'FA', 'C'),
(67, '0005-00083110', '2017-08-15', 'A', 18, 5700.1, 1197.02, 0, 0, 6897.12, 0, 'FA', 'C'),
(68, '0058-342230', '2017-08-16', 'A', 15, 3334, 700.14, 0, 0, 4034.14, 0, 'FA', 'C'),
(69, '0058-00338722', '2017-08-11', 'A', 15, 3301, 693.21, 0, 0, 3994.21, 0, 'FA', 'C'),
(70, '0058-00339917', '2017-08-14', 'A', 15, 2085, 437.85, 0, 0, 2522.85, 0, 'FA', 'C'),
(71, '0037-00031856', '2017-09-01', 'A', 15, 63.65, 13.37, 0, 0, 77.02, 0, 'FA', 'C'),
(72, '0058-00358038', '2017-09-05', 'A', 15, 107.72, 22.62, 0, 0, 130.34, 0, 'FA', 'C'),
(73, '0037-00031910', '2017-09-05', 'A', 15, 296.23, 62.21, 0, 0, 358.44, 0, 'FA', 'C'),
(74, '0037-00031993', '2017-09-08', 'A', 15, 134.65, 28.28, 0, 0, 162.93, 0, 'FA', 'C'),
(75, '0037-00032010', '2017-09-09', 'A', 15, 543.48, 114.13, 0, 0, 657.61, 0, 'FA', 'C'),
(76, '0037-00032012', '2017-09-11', 'A', 15, 636.5, 133.66, 0, 0, 770.16, 0, 'FA', 'C'),
(77, '0021-00735390', '2017-09-11', 'A', 13, 233.38, 49.01, 0, 0, 282.39, 0, 'FA', 'C'),
(78, '0022-00048633', '2017-09-12', 'A', 13, 116.69, 24.5, 0, 0, 141.19, 0, 'FA', 'C'),
(79, '0010-00014342', '2017-09-01', 'A', 12, 2836.8, 595.73, 0, 0, 3432.53, 0, 'FA', 'P'),
(80, '0010-00014349', '2017-09-02', 'A', 12, 6310.82, 1325.27, 0, 0, 7636.09, 0, 'FA', 'P'),
(81, '0010-00014403', '2017-09-06', 'A', 12, 5739.62, 1205.32, 0, 0, 6944.94, 0, 'FA', 'P'),
(82, '0010-00014442', '2017-09-08', 'A', 12, 3010.87, 632.28, 0, 0, 3643.15, 0, 'FA', 'P'),
(83, '0003-00007154', '2017-09-01', 'A', 14, 550, 115.5, 0, 0, 665.5, 0, 'FA', 'C'),
(84, '0003-00007180', '2017-09-05', 'A', 14, 350, 73.5, 0, 0, 423.5, 0, 'FA', 'C'),
(85, '0106-00112644', '2017-09-01', 'A', 11, 314.42, 66.03, 0, 0, 380.45, 0, 'FA', 'C'),
(86, '0101-00595210', '2017-09-07', 'A', 11, 331.5, 69.61, 0, 0, 401.12, 0, 'FA', 'C'),
(87, '0101-00595282', '2017-09-07', 'A', 11, 3954.95, 830.54, 0, 0, 4785.49, 0, 'FA', 'C'),
(88, '0032-00006140', '2017-09-08', 'A', 19, 212.84, 44.7, 0, 0, 257.54, 0, 'FA', 'P'),
(89, '0003-00018375', '2017-09-11', 'A', 20, 2030, 426.3, 0, 0, 2456.3, 0, 'FA', 'C'),
(90, '0037-00032137', '2017-09-16', 'A', 15, 63.65, 13.37, 0, 0, 77.02, 0, 'FA', 'C'),
(91, '0010-00014541', '2017-09-15', 'A', 12, 0.04, 0.01, 0, 0, 0.05, 0, 'FA', 'P'),
(92, '0010-0014511', '2017-09-14', 'A', 12, 5673.6, 1191.46, 0, 0, 6865.06, 0, 'FA', 'P'),
(93, '0010-00014564', '2017-09-18', 'A', 12, 1011.4, 212.39, 0, 0, 1223.79, 0, 'FA', 'P'),
(94, '0022-00048725', '2017-09-18', 'A', 13, 700.13, 147.03, 0, 0, 847.16, 0, 'FA', 'C'),
(95, '0101-00595742', '2017-09-11', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(96, '0003-00017627', '2017-08-09', 'A', 20, 5286.4, 1110.14, 0, 0, 6396.54, 0, 'FA', 'C'),
(97, '0003-00007269', '2017-09-18', 'A', 14, 300, 63, 0, 0, 363, 0, 'FA', 'C'),
(98, '0003-00007286', '2017-09-19', 'A', 14, 750, 157.5, 0, 0, 907.5, 0, 'FA', 'C'),
(99, '0010-00014465', '2017-09-11', 'A', 12, 4278.6, 898.51, 0, 0, 5177.11, 0, 'FA', 'P'),
(100, '0101-00595091', '2017-09-07', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(101, '0002-00000103', '2017-09-15', 'A', 21, 16271.1, 3416.93, 0, 0, 19688.03, 0, 'FA', 'C'),
(102, '0005-00007201', '2017-09-26', 'A', 22, 14258.75, 2994.34, 0, 0, 17253.09, 0, 'FA', 'C'),
(103, '0106-00112012', '2017-08-28', 'A', 11, 583.39, 122.51, 0, 0, 705.9, 0, 'FA', 'C'),
(104, '0106-00112911', '2017-09-04', 'A', 11, 1164.94, 244.64, 0, 0, 1409.58, 0, 'FA', 'C'),
(105, '0106-00114094', '2017-09-12', 'A', 11, 709.16, 148.92, 0, 0, 858.08, 0, 'FA', 'C'),
(106, '0106-00114916', '2017-09-18', 'A', 11, 481.95, 101.21, 0, 0, 583.16, 0, 'FA', 'C'),
(107, '0003-00007298', '2017-09-20', 'A', 14, 1100, 231, 0, 0, 1331, 0, 'FA', 'C'),
(108, '0002-00010399', '2017-09-08', 'A', 18, 449, 94.29, 0, 0, 543.29, 0, 'FA', 'C'),
(109, '0021-00737530', '2017-09-18', 'A', 13, 152.59, 32.04, 0, 0, 184.63, 0, 'FA', 'C'),
(110, '0022-00048843', '2017-09-25', 'A', 13, 233.38, 49.01, 0, 0, 282.39, 0, 'FA', 'C'),
(111, '0010-00014635', '2017-09-21', 'A', 12, 2374.82, 498.71, 0, 0, 2873.53, 0, 'FA', 'P'),
(112, '0010-00014688', '2017-09-26', 'A', 12, 3535.2, 742.39, 0, 0, 4277.59, 0, 'FA', 'P'),
(113, '0002-00000119', '2017-09-28', 'A', 17, 110380.4, 23179.88, 0, 0, 133560.28, 0, 'FA', 'C'),
(114, '0021-00739906', '2017-09-25', 'A', 13, 76.3, 16.02, 0, 0, 92.32, 0, 'FA', 'C'),
(115, '0022-00048926', '2017-09-29', 'A', 13, 466.75, 98.02, 0, 0, 564.77, 0, 'FA', 'C'),
(116, '0010-00014769', '2017-09-29', 'A', 12, 2771.2, 581.95, 0, 0, 3353.15, 0, 'FA', 'P'),
(117, '0021-00741679', '2017-09-29', 'A', 13, 116.69, 24.5, 0, 0, 141.19, 0, 'FA', 'C'),
(118, '0101-00599900', '2017-09-29', 'A', 11, 331.5, 69.61, 0, 0, 401.12, 0, 'FA', 'C'),
(119, '0101-00599901', '2017-09-29', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(120, '0010-00014707', '2017-09-27', 'A', 12, 839.8, 176.36, 0, 0, 1016.16, 0, 'FA', 'P'),
(121, '0010-00014606', '2017-09-20', 'A', 12, 6881.4, 1445.09, 0, 0, 8326.49, 0, 'FA', 'P'),
(122, '0010-00014825', '2017-10-03', 'A', 12, 419.92, 88.18, 0, 0, 508.1, 0, 'FA', 'P'),
(123, '0010-0001483', '2017-10-03', 'A', 12, 4944, 98.88, 0, 0, 5042.88, 0, 'FA', 'P'),
(124, '0010-000000778', '2017-10-04', 'A', 12, 4944, 1038.24, 0, 0, 5982.24, 0, 'NC', 'P'),
(125, '0010-00014881', '2017-10-06', 'A', 12, 0.02, 0, 0, 0, 0.02, 0, 'FA', 'P'),
(126, '0010-00014907', '2017-10-09', 'A', 12, 3058.26, 642.23, 0, 0, 3700.49, 0, 'FA', 'P'),
(127, '0010-00014930', '2017-10-10', 'A', 12, 5396.17, 1133.2, 0, 0, 6529.37, 0, 'FA', 'P'),
(128, '0010-00014995', '2017-10-13', 'A', 12, 3063.6, 643.36, 0, 0, 3706.96, 0, 'FA', 'P'),
(129, '0010-00015011º', '2017-10-14', 'A', 12, 6113.7, 1283.88, 0, 0, 7397.58, 0, 'FA', 'P'),
(130, '0010-00015048', '2017-10-18', 'A', 12, 9516, 1998.36, 0, 0, 11514.36, 0, 'FA', 'P'),
(131, '0010-00015090', '2017-10-20', 'A', 12, 0.02, 0, 0, 0, 0.02, 0, 'FA', 'P'),
(132, '0010-00015187', '2017-10-26', 'A', 12, 1141.4, 239.69, 0, 0, 1381.09, 0, 'FA', 'P'),
(133, '0010-00015178', '2017-10-26', 'A', 12, 3817.8, 801.74, 0, 0, 4619.54, 0, 'FA', 'P'),
(134, '0010-00015207', '2017-10-27', 'A', 12, 791.6, 166.24, 0, 0, 957.84, 0, 'FA', 'P'),
(135, '0010-00015237', '2017-10-30', 'A', 12, 1110.4, 233.18, 0, 0, 1343.58, 0, 'FA', 'P'),
(136, '0010-00015254', '2017-10-31', 'A', 12, 2245, 471.45, 0, 0, 2716.45, 0, 'FA', 'P'),
(137, '0022-00048977', '2017-10-02', 'A', 13, 233.38, 49.01, 0, 0, 282.39, 0, 'FA', 'C'),
(138, '0021-00742348', '2017-10-02', 'A', 13, 152.59, 32.04, 0, 0, 184.63, 0, 'FA', 'C'),
(140, '0022-00048965', '2017-10-02', 'A', 13, 192.98, 40.53, 0, 0, 233.51, 0, 'FA', 'C'),
(141, '0022-00049059', '2017-10-05', 'A', 13, 152.59, 32.04, 0, 0, 184.63, 0, 'FA', 'C'),
(142, '0022-00049083', '2017-10-06', 'A', 13, 116.69, 24.5, 0, 0, 141.19, 0, 'FA', 'C'),
(143, '0022-00049181', '2017-10-12', 'A', 13, 233.38, 49.01, 0, 0, 282.39, 0, 'FA', 'C'),
(144, '0021-00747351', '2017-10-18', 'A', 13, 233.38, 49.01, 0, 0, 282.39, 0, 'FA', 'C'),
(145, '0021-00750585', '2017-10-27', 'A', 13, 152.59, 32.04, 0, 0, 184.63, 0, 'FA', 'C'),
(146, '0021-00751241', '2017-10-30', 'A', 13, 152.59, 32.04, 0, 0, 184.63, 0, 'FA', 'C'),
(147, '0022-00049483', '2017-10-31', 'A', 13, 152.59, 32.04, 0, 0, 184.63, 0, 'FA', 'C'),
(148, '0022-000494483', '2017-09-27', 'A', 11, 15440, 3242.4, 0, 0, 18682.4, 0, 'FA', 'C'),
(149, '0106-00116230', '2017-09-28', 'A', 11, 1010.26, 212.15, 0, 0, 1222.41, 0, 'FA', 'C'),
(150, '0101-00600130', '2017-10-02', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(151, '0101-00600113', '2017-10-02', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(152, '0101-00600358', '2017-10-03', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(153, '0101-00600708', '2017-10-04', 'A', 11, 3900, 819, 0, 0, 4719, 0, 'FA', 'C'),
(154, '0101-00078227', '2017-10-04', 'A', 11, 3900, 819, 0, 0, 4719, 0, 'FA', 'C'),
(155, '0106-00116977', '2017-10-04', 'A', 11, 443.39, 93.11, 0, 0, 536.5, 0, 'FA', 'C'),
(156, '0101-00601521', '2017-10-09', 'A', 11, 330.48, 69.4, 0, 0, 399.88, 0, 'FA', 'C'),
(157, '0106-00117660', '2017-10-10', 'A', 11, 89.96, 18.89, 0, 0, 108.85, 0, 'FA', 'C'),
(158, '0106-00118251', '2017-10-17', 'A', 11, 60.59, 12.72, 0, 0, 73.31, 0, 'FA', 'C'),
(159, '0101-00602904', '2017-10-17', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(160, '0101-00602910', '2017-10-17', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(161, '0101-00602903', '2017-10-17', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(162, '0101-00602909', '2017-10-17', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(163, '0101-00602923', '2017-10-17', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(164, '0106-00118423', '2017-10-18', 'A', 11, 128.52, 26.99, 0, 0, 155.51, 0, 'FA', 'C'),
(165, '0101-00603931', '2017-10-20', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(166, '0101-00603930', '2017-10-20', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(167, '0101-00603916', '2017-10-20', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(168, '0106-00118801', '2017-10-20', 'A', 11, 158.81, 33.35, 0, 0, 192.16, 0, 'FA', 'C'),
(169, '0101-00604825', '2017-10-25', 'A', 11, 2.04, 0.43, 0, 0, 2.47, 0, 'FA', 'C'),
(170, '0101-00605601', '2017-10-30', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(171, '0101-00605881', '2017-10-31', 'A', 11, 2.04, 0.43, 0, 0, 2.47, 0, 'FA', 'C'),
(172, '0002-00000131', '2017-10-21', 'A', 17, 123430.05, 25920.31, 0, 0, 149350.36, 0, 'FA', 'C'),
(173, '0029-00051985', '2017-09-08', 'A', 15, 1050, 220.5, 0, 0, 1270.5, 0, 'FA', 'C'),
(174, '0058-00361090', '2017-09-08', 'A', 15, 902, 189.42, 0, 0, 1091.42, 0, 'FA', 'C'),
(175, '0058-00361182', '2017-09-08', 'A', 15, 703, 14.06, 0, 0, 717.06, 0, 'FA', 'C'),
(176, '0058-00369629', '2017-09-19', 'A', 15, 3373, 708.33, 0, 0, 4081.33, 0, 'FA', 'C'),
(177, '0058-00374592', '2017-09-25', 'A', 15, 703, 147.63, 0, 0, 850.63, 0, 'FA', 'C'),
(178, '0058-00375400', '2017-09-26', 'A', 15, 2240, 470.4, 0, 0, 2710.4, 0, 'FA', 'C'),
(179, '0029-00052850', '2017-09-28', 'A', 15, 1832, 384.72, 0, 0, 2216.72, 0, 'FA', 'C'),
(180, '0037-00032556', '2017-10-06', 'A', 15, 269.3, 56.55, 0, 0, 325.85, 0, 'FA', 'C'),
(181, '0058-00389401', '2017-10-12', 'A', 15, 922, 193.62, 0, 0, 1115.62, 0, 'FA', 'C'),
(182, '0037-00032971', '2017-10-28', 'A', 15, 619.39, 130.07, 0, 0, 749.46, 0, 'FA', 'C'),
(183, '0037-00032972', '2017-10-28', 'A', 15, 754.04, 158.35, 0, 0, 912.39, 0, 'FA', 'C'),
(184, '0037-00032973', '2017-10-28', 'A', 15, 323.16, 67.86, 0, 0, 391.02, 0, 'FA', 'C'),
(185, '0037-00032974', '2017-10-28', 'A', 15, 53.86, 11.31, 0, 0, 65.17, 0, 'FA', 'C'),
(186, '0001-00000075', '2017-09-19', 'A', 23, 47500, 9975, 0, 0, 57475, 0, 'FA', 'C'),
(187, '0003-00007391', '2017-10-02', 'A', 14, 275, 57.75, 0, 0, 332.75, 0, 'FA', 'C'),
(188, '0003-00007489', '2017-10-12', 'A', 14, 300, 63, 0, 0, 363, 0, 'FA', 'C'),
(189, '0003-00007584', '2017-10-25', 'A', 14, 175, 36.75, 0, 0, 211.75, 0, 'FA', 'C'),
(190, '0058-00401649', '2017-10-30', 'A', 15, 107.72, 22.62, 0, 0, 130.34, 0, 'FA', 'C'),
(191, '0058-00401628', '2017-10-30', 'A', 15, 134.65, 28.28, 0, 0, 162.93, 0, 'FA', 'C'),
(192, '0058-00403305', '2017-10-31', 'A', 15, 1018.36, 213.86, 0, 0, 1232.22, 0, 'FA', 'C'),
(193, '0106-00119874', '2017-10-30', 'A', 11, 121.18, 25.45, 0, 0, 146.63, 0, 'FA', 'C'),
(194, '0106-00119515', '2017-10-27', 'A', 11, 240.98, 50.61, 0, 0, 291.59, 0, 'FA', 'C'),
(195, '0058-00344737', '2017-08-18', 'A', 15, 2085, 437.85, 0, 0, 2522.85, 0, 'FA', 'C'),
(196, '0058-00393847', '2017-10-19', 'A', 15, 1377, 289.17, 0, 0, 1666.17, 0, 'FA', 'C'),
(197, '0058-00394565', '2017-10-20', 'A', 15, 1476, 309.96, 0, 0, 1785.96, 0, 'FA', 'C'),
(198, '0058-00396966', '2017-10-24', 'A', 15, 1832, 384.72, 0, 0, 2216.72, 0, 'FA', 'C'),
(199, '0058-00409924', '2017-11-08', 'A', 15, 2208, 463.68, 0, 0, 2671.68, 0, 'FA', 'C'),
(200, '0058-00410745', '2017-11-09', 'A', 15, 2742, 575.82, 0, 0, 3317.82, 0, 'FA', 'C'),
(201, '0029-00054589', '2017-11-07', 'A', 15, 26.93, 5.66, 0, 0, 32.59, 0, 'NC', 'C'),
(202, '0106-00119625', '2017-10-27', 'A', 11, 8712, 1829.52, 0, 0, 10541.52, 0, 'FA', 'C'),
(203, '0003-00012900', '2017-10-03', 'A', 24, 13410, 2816.1, 0, 0, 16226.1, 0, 'FA', 'C'),
(204, '0003-00012901', '2017-10-03', 'A', 24, 15100, 3171, 0, 0, 18271, 0, 'FA', 'C'),
(205, '0005-00087430', '2017-10-24', 'A', 18, 6434, 1351.14, 0, 0, 7785.14, 0, 'FA', 'C'),
(206, '0001-00001016', '2017-09-21', 'A', 25, 14435, 3031.35, 0, 0, 17466.35, 0, 'FA', 'C'),
(207, '0002-00002651', '2017-10-09', 'A', 26, 62210, 13064.1, 0, 0, 75274.1, 0, 'FA', 'C'),
(208, '0002-00002652', '2017-10-09', 'A', 26, 76160, 15993.6, 0, 0, 92153.6, 0, 'FA', 'C'),
(209, '0002-00002653', '2017-10-09', 'A', 26, 74800, 15708, 0, 0, 90508, 0, 'FA', 'C'),
(210, '0002-00002654', '2017-10-09', 'A', 26, 27930, 5865.3, 0, 0, 33795.3, 0, 'FA', 'C'),
(211, '0003-00005150', '2017-09-25', 'A', 27, 19610, 4118.1, 0, 0, 23728.1, 0, 'FA', 'C'),
(212, '0012-00019217', '2017-08-29', 'A', 28, 67520, 14179.2, 0, 0, 81699.2, 0, 'FA', 'C'),
(213, '0012-00019262', '2017-09-04', 'A', 28, 30523.5, 6409.93, 0, 0, 36933.43, 0, 'FA', 'C'),
(214, '0002-00005268', '2017-09-13', 'A', 29, 33500, 7035, 0, 0, 40535, 0, 'FA', 'C'),
(215, '0011-000000006931', '2017-10-29', 'A', 30, 4010, 842.1, 0, 0, 4852.1, 0, 'FA', 'C'),
(216, '0002-00011726', '2017-11-01', 'A', 18, 730, 153.3, 0, 0, 883.3, 0, 'FA', 'C'),
(217, '0002-00001933', '2017-10-23', 'A', 31, 2000, 420, 0, 0, 2420, 0, 'FA', 'C'),
(218, '0002-00000124', '2017-10-31', 'A', 21, 24261.66, 5094.95, 0, 0, 29356.61, 0, 'FA', 'C'),
(219, '0001-00000079', '2017-10-25', 'A', 23, 19000, 3990, 0, 0, 22990, 0, 'FA', 'C'),
(220, '0003-00001455', '2017-11-24', 'A', 20, 2436, 511.56, 0, 0, 2947.56, 0, 'NC', 'C'),
(221, '0022-00049512', '2017-11-01', 'A', 13, 233.39, 49.01, 0, 0, 282.4, 0, 'FA', 'C'),
(222, '022-00050133', '2017-11-23', 'A', 13, 233.38, 49.01, 0, 0, 282.39, 0, 'FA', 'C'),
(223, '0010-00015306', '2017-11-02', 'A', 12, 1101.6, 231.34, 0, 0, 1332.94, 0, 'FA', 'P'),
(224, '0010-00015305', '2017-11-02', 'A', 12, 2474.6, 519.67, 0, 0, 2994.27, 0, 'FA', 'P'),
(225, '0010-00015359', '2017-11-06', 'A', 12, 791.6, 166.24, 0, 0, 957.84, 0, 'FA', 'P'),
(226, '0010-00015377', '2017-11-07', 'A', 12, 174.05, 36.55, 0, 0, 210.6, 0, 'FA', 'P'),
(227, '0010-00015418', '2017-11-09', 'A', 12, 0.02, 0, 0, 0, 0.02, 0, 'FA', 'P'),
(228, '0010-00015448', '2017-11-11', 'A', 12, 2096.19, 440.2, 0, 0, 2536.39, 0, 'FA', 'P'),
(229, '0010-00015502', '2017-11-15', 'A', 12, 5257.31, 1104.04, 0, 0, 6361.35, 0, 'FA', 'P'),
(230, '0010-00015567', '2017-11-18', 'A', 12, 237.6, 49.9, 0, 0, 287.5, 0, 'FA', 'P'),
(231, '0010-00015604', '2017-11-22', 'A', 12, 3063.66, 643.37, 0, 0, 3707.03, 0, 'FA', 'P'),
(232, '0037-00033107', '2017-11-03', 'A', 15, 53.86, 11.31, 0, 0, 65.17, 0, 'FA', 'C'),
(233, '0029-00054589', '2017-11-07', 'A', 15, 26.93, 5.66, 0, 0, 32.59, 0, 'FA', 'C'),
(234, '0058-00409924', '2017-11-08', 'A', 15, 2208, 463.68, 0, 0, 2671.68, 0, 'FA', 'C'),
(235, '0037-00033203', '2017-11-08', 'A', 15, 107.72, 22.62, 0, 0, 130.34, 0, 'FA', 'C'),
(236, '0058-00410745', '2017-11-09', 'A', 15, 2742, 575.82, 0, 0, 3317.82, 0, 'FA', 'C'),
(237, '0037-00033283', '2017-11-14', 'A', 15, 53.86, 11.31, 0, 0, 65.17, 0, 'FA', 'C'),
(238, '0058-00414439', '2017-11-14', 'A', 15, 1377, 289.17, 0, 0, 1666.17, 0, 'FA', 'C'),
(239, '0037-00033298', '2017-11-15', 'A', 15, 90.58, 19.02, 0, 0, 109.6, 0, 'FA', 'C'),
(240, '0037-00033390', '2017-11-18', 'A', 15, 269.3, 56.55, 0, 0, 325.85, 0, 'FA', 'C'),
(241, '0037-00033442', '2017-11-22', 'A', 15, 26.93, 5.66, 0, 0, 32.59, 0, 'FA', 'C'),
(242, '0003-00007681', '2017-11-02', 'A', 14, 600, 126, 0, 0, 726, 0, 'FA', 'C'),
(243, '0003-00007795', '2017-11-15', 'A', 14, 175, 36.75, 0, 0, 211.75, 0, 'FA', 'C'),
(244, '0003-00007849', '2017-11-22', 'A', 14, 565, 118.65, 0, 0, 683.65, 0, 'FA', 'C'),
(245, '0003-00007867', '2017-11-23', 'A', 14, 1100, 231, 0, 0, 1331, 0, 'FA', 'C'),
(246, '0101-00593424', '2017-08-30', 'A', 11, 428.25, 89.93, 0, 0, 518.18, 0, 'FA', 'C'),
(247, '0106-00120194', '2017-11-01', 'A', 11, 64.26, 13.49, 0, 0, 77.75, 0, 'FA', 'C'),
(248, '0106-00120675', '2017-11-06', 'A', 11, 602.21, 126.46, 0, 0, 728.67, 0, 'FA', 'C'),
(249, '0106-00120885', '2017-11-07', 'A', 11, 320.38, 67.28, 0, 0, 387.66, 0, 'FA', 'C'),
(250, '0106-00120917', '2017-11-07', 'A', 11, 30.29, 6.36, 0, 0, 36.65, 0, 'FA', 'C'),
(251, '0101-00607713', '2017-11-09', 'A', 10, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(252, '0101-00607717', '2017-11-09', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(253, '0101-00607725', '2017-11-09', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(254, '0101-00607726', '2017-11-09', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(255, '0101-00607745', '2017-11-09', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(256, '0101-00607956', '2017-11-10', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(257, '0101-00609852', '2017-11-22', 'A', 11, 355.47, 74.65, 0, 0, 430.12, 0, 'FA', 'C'),
(258, '0002-00011726', '2017-11-01', 'A', 18, 730, 153.3, 0, 0, 883.3, 0, 'FA', 'C'),
(259, '0010-00015628', '2017-11-23', 'A', 12, 2203.22, 462.68, 0, 0, 2665.9, 0, 'FA', 'P'),
(260, '0101-0061814', '2017-11-28', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(261, '0010-00015693', '2017-11-28', 'A', 12, 14302.89, 3003.61, 0, 0, 17306.5, 0, 'FA', 'P'),
(262, '0010-00015650', '2017-11-25', 'A', 12, 4913.24, 1031.78, 0, 0, 5945.02, 0, 'FA', 'P'),
(263, '0003-00007916', '2017-11-29', 'A', 14, 175, 36.75, 0, 0, 211.75, 0, 'FA', 'C'),
(264, '0003-00007906', '2017-11-28', 'A', 14, 750, 157.5, 0, 0, 907.5, 0, 'FA', 'C'),
(265, '0037-00033593', '2017-11-30', 'A', 15, 26.93, 5.66, 0, 0, 32.59, 0, 'FA', 'C'),
(266, '0037-00033546', '2017-11-28', 'A', 15, 26.93, 5.66, 0, 0, 32.59, 0, 'FA', 'C'),
(267, '0021-00761493', '2017-11-28', 'A', 13, 204, 42.84, 0, 0, 246.84, 0, 'FA', 'C'),
(268, '0022-00050324', '2017-11-30', 'A', 13, 340.64, 71.53, 0, 0, 412.17, 0, 'FA', 'C'),
(269, '0010-00015751', '2017-11-30', 'A', 12, 7873.2, 1653.37, 0, 0, 9526.57, 0, 'FA', 'P'),
(270, '0002-00000141', '2017-11-30', 'A', 17, 130805.7, 27469.2, 0, 0, 158274.9, 0, 'FA', 'C'),
(272, '00004-00005571', '2017-11-30', 'A', 61, 19793.38, 4156.61, 0, 0, 23949.99, 0, 'FA', 'C'),
(273, '0004-00005571', '2017-11-30', 'A', 61, 7058.82, 741.18, 0, 0, 7800, 0, 'FA', 'C'),
(274, '0106-00121280', '2017-11-10', 'A', 11, 320.38, 67.28, 0, 0, 387.66, 0, 'FA', 'C'),
(275, '0106-00122522', '2017-12-22', 'A', 11, 107.87, 22.65, 0, 0, 130.52, 0, 'FA', 'C'),
(276, '0101-00611339', '2017-11-30', 'A', 11, 2.04, 0.43, 0, 0, 2.47, 0, 'FA', 'C'),
(277, '0021-00762738', '2017-11-30', 'A', 13, 256.71, 53.91, 0, 0, 310.62, 0, 'FA', 'C'),
(278, '0010-00015727', '2017-11-29', 'A', 12, 5337.56, 1120.89, 0, 0, 6458.45, 0, 'FA', 'P'),
(279, '0106-00123388', '2017-11-30', 'A', 11, 540.24, 113.45, 0, 0, 653.69, 0, 'FA', 'C'),
(280, '0004-00020906', '2017-11-28', 'A', 62, 518, 108.78, 0, 0, 626.78, 0, 'FA', 'P'),
(281, '0010-00015780', '2017-12-02', 'A', 12, 6881.42, 1445.1, 0, 0, 8326.52, 0, 'FA', 'P'),
(282, '0010-00015814', '2017-12-05', 'A', 12, 3423.6, 718.96, 0, 0, 4142.56, 0, 'FA', 'P'),
(283, '0010-00015834', '2017-12-06', 'A', 12, 0.02, 0, 0, 0, 0.02, 0, 'FA', 'P'),
(284, '0010-00015852', '2017-12-07', 'A', 12, 0.02, 0, 0, 0, 0.02, 0, 'FA', 'P'),
(285, '0010-00015930', '2017-12-13', 'A', 12, 4809.6, 1010.02, 0, 0, 5819.62, 0, 'FA', 'P'),
(286, '0010-00015951', '2017-12-14', 'A', 12, 3063.62, 643.36, 0, 0, 3706.98, 0, 'FA', 'P'),
(287, '0010-00016004', '2017-12-18', 'A', 12, 310.5, 65.2, 0, 0, 375.7, 0, 'FA', 'P'),
(288, '0010-00016003', '2017-12-18', 'A', 12, 0.02, 0, 0, 0, 0.02, 0, 'FA', 'P'),
(289, '0010-00016024', '2017-12-20', 'A', 12, 3063.64, 643.36, 0, 0, 3707, 0, 'FA', 'P'),
(292, '0029-00055439', '2017-11-28', 'A', 15, 53.86, 11.31, 0, 0, 65.17, 0, 'NC', 'C'),
(293, '0058-00430329', '2017-12-05', 'A', 15, 1832, 384.72, 0, 0, 2216.72, 0, 'FA', 'C'),
(294, '0037-00033671', '2017-12-05', 'A', 15, 26.93, 5.66, 0, 0, 32.59, 0, 'FA', 'C'),
(295, '0037-00033695', '2017-12-05', 'A', 15, 53.86, 11.31, 0, 0, 65.17, 0, 'FA', 'C'),
(296, '0037-00033729', '2017-12-06', 'A', 15, 63.65, 13.37, 0, 0, 77.02, 0, 'FA', 'C'),
(297, '0058-00433802', '2017-12-11', 'A', 15, 1476, 309.96, 0, 0, 1785.96, 0, 'FA', 'C'),
(298, '0037-00033904', '2017-12-16', 'A', 15, 26.93, 5.66, 0, 0, 32.59, 0, 'FA', 'C'),
(299, '0037-00033943', '2017-12-19', 'A', 15, 53.86, 11.31, 0, 0, 65.17, 0, 'FA', 'C'),
(300, '0037-00033949', '2017-12-19', 'A', 15, 53.86, 11.31, 0, 0, 65.17, 0, 'FA', 'C'),
(301, '0022-00050396', '2017-12-04', 'A', 13, 83.93, 17.63, 0, 0, 101.56, 0, 'FA', 'C'),
(302, '0022-00050500', '2017-12-07', 'A', 13, 335.7, 70.5, 0, 0, 406.2, 0, 'FA', 'C'),
(303, '0022-00050546', '2017-12-11', 'A', 13, 83.93, 17.63, 0, 0, 101.56, 0, 'FA', 'C'),
(304, '0022-00050620', '2017-12-13', 'A', 13, 256.71, 53.91, 0, 0, 310.62, 0, 'FA', 'C'),
(305, '0021', '2017-12-13', 'A', 13, 256.71, 53.91, 0, 0, 310.62, 0, 'FA', 'C'),
(306, '0002-00000149', '2017-12-13', 'A', 17, 80822.5, 16972.72, 0, 0, 97795.23, 0, 'FA', 'C'),
(307, '0106-00123587', '2017-12-01', 'A', 11, 94.1, 19.76, 0, 0, 113.86, 0, 'FA', 'C'),
(308, '0106-00123944', '2017-12-05', 'A', 11, 94.1, 19.76, 0, 0, 113.86, 0, 'FA', 'C'),
(309, '0101-00612953', '2017-12-12', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(310, '0101-00612956', '2017-12-12', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(311, '0101-00612959', '2017-12-12', 'A', 11, 494.09, 103.76, 0, 0, 597.85, 0, 'FA', 'C'),
(312, '0101-00612966', '2017-12-12', 'A', 11, 494.09, 103.76, 0, 0, 597.85, 0, 'FA', 'C'),
(313, '0112-00000014', '2017-12-16', 'A', 11, 537.95, 112.97, 0, 0, 650.92, 0, 'FA', 'C'),
(314, '0101-00613988', '2017-12-18', 'A', 11, 494.09, 103.76, 0, 0, 597.85, 0, 'FA', 'C'),
(315, '0112-000000017', '2017-12-18', 'A', 11, 330.94, 69.5, 0, 0, 400.44, 0, 'FA', 'C'),
(316, '0101-00613989', '2017-12-18', 'A', 11, 494.09, 103.76, 0, 0, 597.85, 0, 'FA', 'C'),
(317, '0112-00000026', '2017-12-19', 'A', 11, 94.55, 19.86, 0, 0, 114.41, 0, 'FA', 'C'),
(318, '0101-00612340', '2017-12-19', 'A', 11, 1071.31, 224.98, 0, 0, 1296.29, 0, 'FA', 'C'),
(319, '0106-00125446', '2017-12-19', 'A', 11, 44.98, 9.45, 0, 0, 54.43, 0, 'FA', 'C'),
(320, '0101-00614569', '2017-12-20', 'A', 11, 494.09, 103.76, 0, 0, 597.85, 0, 'FA', 'C'),
(321, '0101-00614550', '2017-12-20', 'A', 11, 494.09, 103.76, 0, 0, 597.85, 0, 'FA', 'C'),
(322, '0112-00000040', '2017-12-21', 'A', 11, 235.01, 49.35, 0, 0, 284.36, 0, 'FA', 'C'),
(323, '0003-00007945', '2017-12-01', 'A', 14, 1100, 231, 0, 0, 1331, 0, 'FA', 'C'),
(324, '0003-00007976', '2017-12-06', 'A', 14, 1450, 304.5, 0, 0, 1754.5, 0, 'FA', 'C'),
(325, '0003-00008066', '2017-12-15', 'A', 14, 1275, 267.75, 0, 0, 1542.75, 0, 'FA', 'C'),
(326, '0003-00008124', '2017-12-20', 'A', 14, 600, 126, 0, 0, 726, 0, 'FA', 'C'),
(327, '0003-00020577', '2017-12-07', 'A', 20, 140, 29.4, 0, 0, 169.4, 0, 'FA', 'C'),
(328, '0101-00614840', '2017-12-21', 'A', 11, 1071.31, 224.98, 0, 0, 1296.29, 0, 'FA', 'C'),
(329, '0010-00016074', '2017-12-22', 'A', 12, 9190.82, 1930.07, 0, 0, 11120.89, 0, 'FA', 'P'),
(330, '0010-00016097', '2017-12-26', 'A', 12, 4177.8, 877.34, 0, 0, 5055.14, 0, 'FA', 'P'),
(331, '0010-00016119', '2017-12-27', 'A', 12, 1060.2, 222.64, 0, 0, 1282.84, 0, 'FA', 'P'),
(332, '0037-00034099', '2017-12-27', 'A', 15, 26.93, 5.66, 0, 0, 32.59, 0, 'FA', 'C'),
(333, '0003-00008150', '2017-12-22', 'A', 14, 750, 157.5, 0, 0, 907.5, 0, 'FA', 'C'),
(334, '0106-00123386', '2017-11-30', 'A', 11, 231.8, 48.68, 0, 0, 280.48, 0, 'FA', 'C'),
(335, '0106-00123804', '2017-12-04', 'A', 11, 594.86, 124.92, 0, 0, 719.78, 0, 'FA', 'C'),
(336, '0106-00124202', '2017-12-07', 'A', 11, 339.66, 71.33, 0, 0, 410.99, 0, 'FA', 'C'),
(337, '0106-00124729', '2017-12-13', 'A', 11, 470.02, 98.7, 0, 0, 568.72, 0, 'FA', 'C'),
(338, '0112-00000035', '2017-12-20', 'A', 11, 215.73, 45.3, 0, 0, 261.03, 0, 'FA', 'C'),
(339, '0101-00615078', '2017-12-22', 'A', 11, 763.98, 160.44, 0, 0, 924.42, 0, 'FA', 'C'),
(340, '0022-00050955', '2017-12-30', 'A', 13, 256.71, 53.91, 0, 0, 310.62, 0, 'FA', 'C'),
(341, '022-00051410', '2018-01-17', 'A', 13, 167.85, 35.25, 0, 0, 203.1, 0, 'FA', 'C'),
(342, '0022-00051489', '2018-01-19', 'A', 13, 83.93, 17.63, 0, 0, 101.56, 0, 'FA', 'C'),
(343, '0010-00016313', '2018-01-09', 'A', 12, 791.62, 166.24, 0, 0, 957.86, 0, 'FA', 'C'),
(344, '0010-00016385', '2018-01-12', 'A', 12, 6113.7, 1283.88, 0, 0, 7397.58, 0, 'FA', 'C'),
(345, '0010-00016332', '2018-01-20', 'A', 12, 848.58, 178.2, 0, 0, 1026.78, 0, 'FA', 'C'),
(346, '0101-00617530', '2018-01-09', 'A', 11, 494.09, 103.76, 0, 0, 597.85, 0, 'FA', 'C'),
(347, '0101-00617787', '2018-01-10', 'A', 11, 494.09, 103.76, 0, 0, 597.85, 0, 'FA', 'C'),
(348, '0112-00000149', '2018-01-17', 'A', 11, 56, 11.76, 0, 0, 67.76, 0, 'FA', 'C'),
(349, '0112-00000153', '2018-01-17', 'A', 11, 320.38, 67.28, 0, 0, 387.66, 0, 'FA', 'C'),
(350, '0106-00128360', '2018-01-17', 'A', 11, 223.07, 46.84, 0, 0, 269.91, 0, 'FA', 'C'),
(351, '0101-00619373', '2018-01-18', 'A', 11, 1042.39, 218.9, 0, 0, 1261.29, 0, 'FA', 'C'),
(352, '0112-00000164', '2018-01-19', 'A', 11, 49.11, 10.31, 0, 0, 59.42, 0, 'FA', 'C'),
(353, '0112-00000172', '2018-01-22', 'A', 11, 297.43, 62.46, 0, 0, 359.89, 0, 'FA', 'C'),
(354, '0112-00000169', '2018-01-22', 'A', 11, 266.22, 55.91, 0, 0, 322.13, 0, 'FA', 'C'),
(355, '0002-00000872', '2017-09-29', 'A', 55, 25520, 5359.2, 0, 0, 30879.2, 0, 'FA', 'C'),
(356, '0003-00000814', '2017-10-11', 'A', 34, 36740, 7715.4, 0, 0, 44455.4, 0, 'FA', 'C'),
(357, '0003-00000815', '2017-10-11', 'A', 34, 7635, 1603.35, 0, 0, 9238.35, 0, 'FA', 'C'),
(358, '0003-00000846', '2017-10-25', 'A', 34, 1530, 321.3, 0, 0, 1851.3, 0, 'FA', 'C'),
(359, '0112-00000183', '2018-01-25', 'A', 11, 66.1, 13.88, 0, 0, 79.98, 0, 'FA', 'C'),
(360, '0003-00004791', '2017-04-10', 'A', 27, 13430, 2820.3, 0, 0, 16250.3, 0, 'FA', 'C'),
(361, '0010-00016598', '2018-01-24', 'A', 12, 481.1, 101.03, 0, 0, 582.13, 0, 'FA', 'C'),
(362, '0003-00008255', '2018-01-17', 'A', 14, 300, 63, 0, 0, 363, 0, 'FA', 'C'),
(363, '0022-00051455', '2018-01-18', 'A', 13, 128.36, 26.96, 0, 0, 155.32, 0, 'FA', 'C'),
(364, '0022-00051634', '2018-01-25', 'A', 13, 513.43, 107.82, 0, 0, 621.25, 0, 'FA', 'C'),
(365, '0010-00016639', '2018-01-26', 'A', 12, 1060.2, 222.64, 0, 0, 1282.84, 0, 'FA', 'C'),
(366, '0058-00444096', '2017-12-22', 'A', 15, 1476, 309.96, 0, 0, 1785.96, 0, 'FA', 'C'),
(367, '0058-00438234', '2017-12-15', 'A', 15, 1377, 289.17, 0, 0, 1666.17, 0, 'FA', 'C'),
(368, '0058-0043828', '2017-12-15', 'A', 15, 4404, 924.84, 0, 0, 5328.84, 0, 'FA', 'C'),
(369, '0022-00051657', '2018-01-26', 'A', 13, 296.21, 62.2, 0, 0, 358.41, 0, 'FA', 'C'),
(370, '0112-00000195', '2018-01-29', 'A', 11, 128.52, 26.99, 0, 0, 155.51, 0, 'FA', 'C'),
(371, '0037-00034801', '2018-01-30', 'A', 15, 26.93, 5.66, 0, 0, 32.59, 0, 'FA', 'C'),
(372, '0106-00129560', '2018-01-29', 'A', 11, 117.5, 24.68, 0, 0, 142.18, 0, 'FA', 'C'),
(373, '0010-00016683', '2018-01-30', 'A', 12, 0.02, 0, 0, 0, 0.02, 0, 'FA', 'C'),
(374, '0010-00016665', '2018-01-29', 'A', 12, 3063.6, 643.36, 0, 0, 3706.96, 0, 'FA', 'C'),
(375, '0112-00000202', '2018-01-31', 'A', 11, 140.45, 29.49, 0, 0, 169.94, 0, 'FA', 'C'),
(376, '0010-00016712', '2018-01-31', 'A', 12, 0.02, 0, 0, 0, 0.02, 0, 'FA', 'C'),
(377, '0003-00008393', '2018-01-31', 'A', 14, 750, 157.5, 0, 0, 907.5, 0, 'FA', 'C'),
(378, '0106-00129848', '2018-01-31', 'A', 11, 133.57, 28.05, 0, 0, 161.62, 0, 'FA', 'C'),
(379, '0101-00621511', '2018-01-30', 'A', 14, 538.15, 113.01, 0, 0, 651.16, 0, 'FA', 'C'),
(380, '0010-00016753', '2018-02-02', 'B', 12, 3063.62, 643.36, 0, 0, 3706.98, 0, 'FA', 'C'),
(381, '0010-00016773', '2018-02-05', 'A', 12, 4215.2, 885.19, 0, 0, 5100.39, 0, 'FA', 'C'),
(382, '0010-00016803', '2018-02-06', 'A', 12, 3063.6, 643.36, 0, 0, 3706.96, 0, 'FA', 'C'),
(383, '0112-00000221', '2018-02-05', 'A', 11, 49.11, 10.31, 0, 0, 59.42, 0, 'FA', 'C'),
(384, '0112-00000219', '2018-02-03', 'A', 11, 117.5, 24.68, 0, 0, 142.18, 0, 'FA', 'C'),
(385, '0112-00000211', '2018-02-02', 'A', 11, 254.75, 53.5, 0, 0, 308.25, 0, 'FA', 'C'),
(386, '0112-00000208', '2018-02-01', 'A', 11, 332.78, 69.88, 0, 0, 402.66, 0, 'FA', 'C'),
(387, '0106-00130515', '2018-02-06', 'A', 11, 174.42, 36.63, 0, 0, 211.05, 0, 'FA', 'C'),
(388, '0112-00000235', '2018-02-08', 'A', 11, 390.61, 82.03, 0, 0, 472.64, 0, 'FA', 'C'),
(389, '0010-00016826', '2018-02-07', 'A', 12, 0.04, 0.01, 0, 0, 0.05, 0, 'FA', 'C'),
(390, '0010-00016342', '2018-01-10', 'A', 12, 855.9, 179.74, 0, 0, 1035.64, 0, 'FA', 'C'),
(391, '0101', '2018-02-08', 'A', 11, 360.88, 75.78, 0, 0, 436.66, 0, 'FA', 'C'),
(392, '0112-00000243', '2018-02-09', 'A', 11, 155.14, 32.58, 0, 0, 187.72, 0, 'FA', 'C'),
(393, '0010-00016863', '2018-02-09', 'A', 12, 2273.4, 477.41, 0, 0, 2750.81, 0, 'FA', 'C'),
(394, '0112-00000251', '2018-02-14', 'A', 11, 33.05, 6.94, 0, 0, 39.99, 0, 'FA', 'C'),
(395, '0112-00000255', '2018-02-14', 'A', 11, 295.6, 62.08, 0, 0, 357.68, 0, 'FA', 'C'),
(396, '0010-00016946', '2018-02-16', 'A', 12, 0.06, 0.01, 0, 0, 0.07, 0, 'FA', 'C'),
(397, '0010-00016893', '2018-02-14', 'A', 12, 4442.95, 933.02, 0, 0, 5375.97, 0, 'FA', 'C'),
(398, '0010-00016927', '2018-02-15', 'A', 12, 7873.2, 1653.37, 0, 0, 9526.57, 0, 'FA', 'C'),
(399, '0101-00623607', '2018-02-14', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(400, '0101-00623588', '2018-02-14', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(401, '0101-00623609', '2018-02-14', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(402, '0003-00003704', '2017-11-15', 'A', 32, 46370, 9737.7, 0, 0, 56107.7, 0, 'FA', 'C'),
(403, '0022-00052132', '2018-02-17', 'A', 13, 506.52, 106.37, 0, 0, 612.89, 0, 'FA', 'C'),
(404, '0101-00624103', '2018-02-16', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(405, '0010-00017009', '2018-02-20', 'A', 12, 791.6, 166.24, 0, 0, 957.84, 0, 'FA', 'C'),
(406, '0112-00000302', '2018-02-23', 'A', 11, 489.29, 102.75, 0, 0, 592.04, 0, 'FA', 'C'),
(407, '0112-00000301', '2018-02-23', 'A', 11, 295.6, 62.08, 0, 0, 357.68, 0, 'FA', 'C'),
(408, '0101-00625081', '2018-02-22', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(409, '0106-00131955', '2018-02-21', 'A', 11, 348.84, 73.26, 0, 0, 422.1, 0, 'FA', 'C'),
(410, '0112-00000289', '2018-02-21', 'A', 11, 348.84, 73.26, 0, 0, 422.1, 0, 'FA', 'C'),
(411, '0101-00624086', '2018-02-16', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(412, '0010-00017082', '2018-02-23', 'A', 12, 10936.8, 2296.73, 0, 0, 13233.53, 0, 'FA', 'C'),
(413, '0101-00082408', '2018-02-05', 'A', 11, 32.4, 6.8, 0, 0, 39.2, 0, 'NC', 'C'),
(414, '0101-00622498', '2018-02-05', 'A', 11, 23180, 4867.8, 0, 0, 28047.8, 0, 'FA', 'C'),
(415, '0001-00000081', '2017-11-22', 'A', 23, 18000, 3780, 0, 0, 21780, 0, 'FA', 'C'),
(416, '0001-00000083', '2017-12-15', 'A', 23, 25500, 5355, 0, 0, 30855, 0, 'FA', 'C'),
(417, '0010-00017096', '2018-02-24', 'A', 12, 0.02, 0, 0, 0, 0.02, 0, 'FA', 'C'),
(418, '0003-00008565', '2018-02-19', 'A', 14, 750, 157.5, 0, 0, 907.5, 0, 'FA', 'C'),
(419, '0003-00008556', '2018-02-19', 'A', 14, 1375, 288.75, 0, 0, 1663.75, 0, 'FA', 'C'),
(420, '0001-00000084', '2018-01-18', 'A', 23, 11900, 2499, 0, 0, 14399, 0, 'FA', 'C'),
(421, '0022-00052291', '2018-02-26', 'A', 13, 1013.04, 212.74, 0, 0, 1225.78, 0, 'FA', 'C'),
(422, '0112-00000313', '2018-02-27', 'A', 11, 66.1, 13.88, 0, 0, 79.98, 0, 'FA', 'C'),
(423, '0010-00017135', '2018-02-27', 'A', 12, 0.08, 0.02, 0, 0, 0.1, 0, 'FA', 'C'),
(424, '0003-00008631', '2018-02-26', 'A', 14, 550, 115.5, 0, 0, 665.5, 0, 'FA', 'C'),
(425, '0005-00093072', '2018-02-23', 'A', 18, 9228, 1937.88, 0, 0, 11165.88, 0, 'FA', 'C'),
(427, '0022-00052370', '2018-02-28', 'A', 13, 645.15, 135.48, 0, 0, 780.63, 0, 'FA', 'C'),
(428, '0010-00017161', '2018-02-28', 'A', 12, 2592, 544.32, 0, 0, 3136.32, 0, 'FA', 'C'),
(429, '0003-00008662', '2018-02-28', 'A', 14, 600, 126, 0, 0, 726, 0, 'FA', 'C'),
(430, '0101-00626391', '2018-02-28', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(431, '0101-00626272', '2018-02-28', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(432, '0101-00626269', '2018-02-28', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(433, '0101-00626390', '2018-02-28', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(434, '0101-00626273', '2018-02-28', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(435, '0101-00616020', '2017-12-29', 'A', 11, 331.5, 69.61, 0, 0, 401.12, 0, 'FA', 'C'),
(436, '0058-00453928', '2018-01-05', 'A', 15, 1476, 309.96, 0, 0, 1785.96, 0, 'FA', 'C'),
(437, '0001-00000086', '2018-02-14', 'A', 23, 37600, 7896, 0, 0, 45496, 0, 'FA', 'C'),
(438, '0005-00088428', '2017-11-14', 'A', 18, 8569.25, 1799.54, 0, 0, 10368.79, 0, 'FA', 'C'),
(439, '0005-00088427', '2017-11-14', 'A', 18, 3457, 725.97, 0, 0, 4182.97, 0, 'FA', 'C'),
(440, '0011-00073388', '2017-03-31', 'A', 10, 14216, 2985.36, 0, 0, 17201.36, 0, 'FA', 'C'),
(441, '0011-00079479', '2017-09-21', 'A', 10, 45999, 9659.79, 0, 0, 55658.79, 0, 'FA', 'C'),
(442, '0005-00020884', '2018-02-28', 'A', 57, 3705.8, 778.22, 0, 0, 4484.02, 0, 'FA', 'C'),
(443, '0010-00017175', '2018-03-01', 'A', 12, 870.35, 182.77, 0, 0, 1053.12, 0, 'FA', 'C'),
(444, '0010-00017193', '2018-03-02', 'A', 12, 11691.02, 2455.11, 0, 0, 14146.13, 0, 'FA', 'C'),
(445, '0010-00017259', '2018-03-07', 'A', 12, 3063.66, 643.37, 0, 0, 3707.03, 0, 'FA', 'C'),
(446, '0010-00017282', '2018-03-08', 'A', 12, 4809.6, 1010.02, 0, 0, 5819.62, 0, 'FA', 'C'),
(447, '0106-00133096', '2018-03-01', 'A', 11, 147.8, 31.04, 0, 0, 178.84, 0, 'FA', 'C'),
(448, '0112-00000321', '2018-03-01', 'A', 11, 537.49, 112.87, 0, 0, 650.36, 0, 'FA', 'C'),
(449, '0101-00626956', '2018-03-02', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(450, '0101-00626941', '2018-03-02', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(451, '0101-00626930', '2018-03-02', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(452, '0112-00000339', '2018-03-06', 'A', 11, 174.42, 36.63, 0, 0, 211.05, 0, 'FA', 'C'),
(453, '0101-00627802', '2018-03-07', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(454, '0112-00000350', '2018-03-09', 'A', 11, 192.78, 40.48, 0, 0, 233.26, 0, 'FA', 'C'),
(455, '0037-00035568', '2018-03-03', 'A', 15, 66.91, 14.05, 0, 0, 80.96, 0, 'FA', 'C'),
(456, '0037-00035557', '2018-03-03', 'A', 15, 28.15, 5.91, 0, 0, 34.06, 0, 'FA', 'C'),
(457, '0058-00501485', '2018-03-05', 'A', 15, 1580, 331.8, 0, 0, 1911.8, 0, 'FA', 'C'),
(458, '0003-00008678', '2018-03-01', 'A', 14, 550, 115.5, 0, 0, 665.5, 0, 'FA', 'C'),
(459, '0003-00008730', '2018-03-06', 'A', 14, 350, 73.5, 0, 0, 423.5, 0, 'FA', 'C'),
(460, '0010-00017341', '2018-03-13', 'A', 12, 7264.8, 1525.61, 0, 0, 8790.41, 0, 'FA', 'C'),
(461, '0112-00000336', '2018-03-05', 'A', 11, 385.56, 80.97, 0, 0, 466.53, 0, 'FA', 'C'),
(462, '0112-00000361', '2018-03-12', 'A', 11, 681.16, 143.04, 0, 0, 824.2, 0, 'FA', 'C'),
(463, '0112-00000371', '2018-03-14', 'A', 11, 297.43, 62.46, 0, 0, 359.89, 0, 'FA', 'C'),
(464, '0010-00017413', '2018-03-16', 'A', 12, 10695.6, 2246.08, 0, 0, 12941.68, 0, 'FA', 'C'),
(465, '0003-00008824', '2018-03-14', 'A', 14, 875, 183.75, 0, 0, 1058.75, 0, 'FA', 'C'),
(466, '0101-00628117', '2018-03-08', 'A', 11, 2.04, 0.43, 0, 0, 2.47, 0, 'FA', 'C'),
(467, '0010-00017437', '2018-03-19', 'A', 12, 0.04, 0.01, 0, 0, 0.05, 0, 'FA', 'C'),
(468, '0101-00627804', '2018-03-07', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(469, '0112-00000392', '2018-03-20', 'A', 11, 119.34, 25.06, 0, 0, 144.4, 0, 'FA', 'C'),
(470, '0037-00036025', '2018-03-21', 'A', 15, 610.36, 128.18, 0, 0, 738.54, 0, 'FA', 'C'),
(471, '0003-00008900', '2018-03-21', 'A', 14, 1100, 231, 0, 0, 1331, 0, 'FA', 'C'),
(472, '0003-00008893', '2018-03-20', 'A', 14, 1100, 231, 0, 0, 1331, 0, 'FA', 'C'),
(473, '0101-00631110', '2018-03-20', 'A', 11, 538.15, 113.01, 0, 0, 651.16, 0, 'FA', 'C'),
(474, '0101-00631069', '2018-03-20', 'A', 11, 1373.33, 288.4, 0, 0, 1661.73, 0, 'FA', 'C'),
(475, '0101-00631397', '2018-03-21', 'A', 11, 538.15, 113.01, 0, 0, 651.16, 0, 'FA', 'C'),
(476, '0010-00017512', '2018-03-22', 'A', 12, 6861.6, 1440.94, 0, 0, 8302.54, 0, 'FA', 'C'),
(477, '0010-00017552', '2018-03-26', 'A', 12, 398.76, 83.74, 0, 0, 482.5, 0, 'FA', 'C'),
(478, '0010-00017534', '2018-03-23', 'A', 12, 3834, 805.14, 0, 0, 4639.14, 0, 'FA', 'C'),
(479, '0101-00631747', '2018-03-22', 'A', 11, 538.15, 113.01, 0, 0, 651.16, 0, 'FA', 'C'),
(480, '0101-00632213', '2018-03-26', 'A', 11, 538.15, 113.01, 0, 0, 651.16, 0, 'FA', 'C'),
(481, '0101-00632212', '2018-03-26', 'A', 11, 538.15, 113.01, 0, 0, 651.16, 0, 'FA', 'C'),
(482, '0112-00000412', '2018-03-26', 'A', 11, 446.15, 93.69, 0, 0, 539.84, 0, 'FA', 'C'),
(483, '0101-00632239', '2018-03-26', 'A', 11, 538.15, 113.01, 0, 0, 651.16, 0, 'FA', 'C'),
(484, '0112-00000429', '2018-03-28', 'A', 11, 70.23, 14.75, 0, 0, 84.98, 0, 'FA', 'C'),
(485, '0010-00017587', '2018-03-27', 'A', 12, 2930.27, 615.36, 0, 0, 3545.63, 0, 'FA', 'C'),
(486, '0011-00086181', '2018-03-26', 'A', 10, 40432, 8490.72, 0, 0, 48922.72, 0, 'FA', 'C'),
(487, '0106-00137187', '2018-03-28', 'A', 11, 272.19, 57.16, 0, 0, 329.35, 0, 'FA', 'C'),
(488, '0010-00017615', '2018-03-28', 'A', 12, 6892.05, 1447.33, 0, 0, 8339.38, 0, 'FA', 'C'),
(489, '0010-00017636', '2018-03-29', 'A', 12, 0.02, 0, 0, 0, 0.02, 0, 'FA', 'C'),
(490, '0010-00017652', '2018-03-31', 'A', 12, 3936.15, 826.59, 0, 0, 4762.74, 0, 'FA', 'C'),
(491, '0037-00035443', '2018-02-28', 'A', 15, 401.46, 84.31, 0, 0, 485.77, 0, 'FA', 'C'),
(492, '0029-00059731', '2018-03-12', 'A', 15, 66.91, 14.05, 0, 0, 80.96, 0, 'NC', 'C'),
(493, '0058-00518805', '2018-03-22', 'A', 15, 2066, 433.86, 0, 0, 2499.86, 0, 'FA', 'C'),
(494, '0058-00525389', '2018-03-29', 'A', 15, 3900, 819, 0, 0, 4719, 0, 'FA', 'C'),
(495, '0003-00022242', '2018-02-20', 'A', 20, 2336, 490.56, 0, 0, 2826.56, 0, 'FA', 'C'),
(496, '0002-00000210', '2018-04-11', 'A', 21, 28154.52, 5912.45, 0, 0, 34066.97, 0, 'FA', 'C'),
(497, '0002-0000009', '2018-04-11', 'A', 21, 28154.52, 5912.45, 0, 0, 34066.97, 0, 'NC', 'C'),
(498, '0002-00000211', '2018-04-11', 'A', 21, 27151.56, 5701.83, 0, 0, 32853.39, 0, 'FA', 'C'),
(499, '0058-00534948', '2018-04-12', 'A', 21, 2, 0.42, 0, 0, 2.42, 0, 'FA', 'C'),
(500, '0029-00061186', '2018-04-12', 'A', 15, 2, 0.42, 0, 0, 2.42, 0, 'FA', 'C'),
(501, '0058-00535230', '2018-04-12', 'A', 15, 984, 206.64, 0, 0, 1190.64, 0, 'FA', 'C'),
(502, '0010-00017692', '2018-04-04', 'A', 12, 1715.4, 360.23, 0, 0, 2075.63, 0, 'FA', 'C'),
(503, '0010-00017728', '2018-04-06', 'A', 12, 2272.7, 477.27, 0, 0, 2749.97, 0, 'FA', 'C'),
(504, '0010-00017754', '2018-04-09', 'A', 12, 7775.15, 1632.78, 0, 0, 9407.93, 0, 'FA', 'C'),
(505, '0010-0000936', '2018-04-12', 'A', 12, 1715.4, 360.23, 0, 0, 2075.63, 0, 'NC', 'C'),
(506, '0010-00017828', '2018-04-12', 'A', 12, 5105.7, 1072.2, 0, 0, 6177.9, 0, 'FA', 'C'),
(507, '0010-00017850', '2018-04-13', 'A', 12, 968.35, 203.35, 0, 0, 1171.7, 0, 'FA', 'C'),
(508, '0112-00000444', '2018-04-03', 'A', 11, 291.01, 61.11, 0, 0, 352.12, 0, 'FA', 'C'),
(512, '0112-00000458', '2018-04-05', 'A', 11, 228.58, 48, 0, 0, 276.58, 0, 'FA', 'C'),
(513, '0112-00000449', '2018-04-03', 'A', 11, 66.1, 13.88, 0, 0, 79.98, 0, 'FA', 'C'),
(514, '0106-00137910', '2018-04-05', 'A', 11, 171.67, 36.05, 0, 0, 207.72, 0, 'FA', 'C'),
(515, '0101-00633962', '2018-04-05', 'A', 11, 2256.44, 473.85, 0, 0, 2730.29, 0, 'FA', 'C'),
(516, '0101-00633961', '2018-04-05', 'A', 11, 4.08, 0.86, 0, 0, 4.94, 0, 'FA', 'C'),
(517, '0112-00000462', '2018-04-06', 'A', 11, 66.1, 13.88, 0, 0, 79.98, 0, 'FA', 'C'),
(518, '0112-00000477', '2018-04-11', 'A', 11, 103.28, 21.69, 0, 0, 124.97, 0, 'FA', 'C'),
(519, '0112-00000483', '2018-04-13', 'A', 11, 33.05, 6.94, 0, 0, 39.99, 0, 'FA', 'C'),
(520, '0003-00009009', '2018-04-05', 'A', 14, 1100, 231, 0, 0, 1331, 0, 'FA', 'C'),
(521, '0003-00009037', '2018-04-09', 'A', 14, 1100, 231, 0, 0, 1331, 0, 'FA', 'C'),
(522, '0003-00009053', '2018-04-10', 'A', 14, 550, 115.5, 0, 0, 665.5, 0, 'FA', 'C'),
(523, '0112-00000494', '2018-04-16', 'A', 11, 103.28, 21.69, 0, 0, 124.97, 0, 'FA', 'C'),
(524, '0101-00635659', '2018-04-13', 'A', 11, 951.97, 199.91, 0, 0, 1151.88, 0, 'FA', 'C'),
(525, '0010-00017874', '2018-04-16', 'A', 12, 0.06, 0.01, 0, 0, 0.07, 0, 'FA', 'C'),
(526, '0010-00017889', '2018-04-17', 'A', 12, 1234.24, 259.19, 0, 0, 1493.43, 0, 'FA', 'C'),
(527, '0010-00017916', '2018-04-18', 'A', 12, 0.04, 0.01, 0, 0, 0.05, 0, 'FA', 'C'),
(528, '0037-00036654', '2018-04-19', 'A', 15, 66.91, 14.05, 0, 0, 80.96, 0, 'FA', 'C'),
(529, '0101-00636614', '2018-04-18', 'A', 11, 538.15, 113.01, 0, 0, 651.16, 0, 'FA', 'C'),
(530, '0037-00036625', '2018-04-19', 'A', 15, 66.91, 14.05, 0, 0, 80.96, 0, 'FA', 'C'),
(531, '0058-00536522', '2018-04-13', 'A', 15, 984, 206.64, 0, 0, 1190.64, 0, 'FA', 'C'),
(532, '0058-00537562', '2018-04-16', 'A', 15, 1580, 331.8, 0, 0, 1911.8, 0, 'FA', 'C'),
(533, '0058-00539081', '2018-04-17', 'A', 15, 4308, 904.68, 0, 0, 5212.68, 0, 'FA', 'C'),
(534, '0037-00036611', '2018-04-18', 'A', 15, 66.91, 14.05, 0, 0, 80.96, 0, 'FA', 'C'),
(535, '0002-0000450', '2018-04-18', 'A', 67, 3060, 642.6, 0, 0, 3702.6, 0, 'FA', 'C'),
(536, '0001-00002223', '2018-02-19', 'A', 33, 14280, 2998.8, 0, 0, 17278.8, 0, 'FA', 'C'),
(537, '0002-00002892', '2018-03-15', 'A', 26, 750, 157.5, 0, 0, 907.5, 0, 'FA', 'C'),
(538, '0002-00002888', '2018-03-15', 'A', 26, 42240, 8870.4, 0, 0, 51110.4, 0, 'FA', 'C'),
(539, '0002-00002890', '2018-03-15', 'A', 26, 49800, 10458, 0, 0, 60258, 0, 'FA', 'C'),
(540, '0002-00002889', '2018-03-15', 'A', 26, 45570, 9569.7, 0, 0, 55139.7, 0, 'FA', 'C'),
(541, '0001-00005669', '2018-04-03', 'A', 68, 20440, 4292.4, 0, 0, 24732.4, 0, 'FA', 'C'),
(542, '0001-00005670', '2018-04-03', 'A', 68, 61695.46, 12956.05, 0, 0, 74651.51, 0, 'FA', 'C'),
(543, '0005-00093695', '2018-03-05', 'A', 18, 24321, 5107.41, 0, 0, 29428.41, 0, 'FA', 'C'),
(544, '0005-00093696', '2018-03-05', 'A', 18, 12606, 2647.26, 0, 0, 15253.26, 0, 'FA', 'C'),
(545, '0005-00093697', '2018-03-05', 'A', 18, 16193, 3400.53, 0, 0, 19593.53, 0, 'FA', 'C'),
(546, '0005-00093698', '2018-03-05', 'A', 18, 0.1, 0.02, 0, 0, 0.12, 0, 'FA', 'C'),
(547, '0005-00093699', '2018-03-05', 'A', 18, 0.1, 0.02, 0, 0, 0.12, 0, 'FA', 'C'),
(548, '0003-00000371', '2018-04-03', 'A', 48, 14710, 3089.1, 0, 0, 17799.1, 0, 'FA', 'C'),
(549, '0003-00001052', '2018-03-15', 'A', 34, 24376.5, 5119.06, 0, 0, 29495.56, 0, 'FA', 'C'),
(550, '0003-00001050', '2018-03-15', 'A', 34, 50715, 10650.15, 0, 0, 61365.15, 0, 'FA', 'C'),
(551, '0003-00001051', '2018-03-15', 'A', 34, 27720, 5821.2, 0, 0, 33541.2, 0, 'FA', 'C'),
(552, '0058-00541097', '2018-04-19', 'A', 15, 1956, 410.76, 0, 0, 2366.76, 0, 'FA', 'C'),
(553, '0029-00061760', '2018-04-24', 'A', 15, 66.91, 14.05, 0, 0, 80.96, 0, 'NC', 'C'),
(554, '0037-00036774', '2018-04-25', 'A', 15, 610.36, 128.18, 0, 0, 738.54, 0, 'FA', 'C'),
(555, '0003-00009154', '2018-04-19', 'A', 14, 300, 63, 0, 0, 363, 0, 'FA', 'C'),
(556, '0003-00009207', '2018-04-24', 'A', 14, 1400.01, 294, 0, 0, 1694.01, 0, 'FA', 'C'),
(557, '0101-00637056', '2018-04-19', 'A', 11, 538.15, 113.01, 0, 0, 651.16, 0, 'FA', 'C'),
(558, '0101-00637239', '2018-04-20', 'A', 11, 536.11, 112.58, 0, 0, 648.69, 0, 'FA', 'C'),
(559, '0101-00637241', '2018-04-20', 'A', 11, 921.67, 193.55, 0, 0, 1115.22, 0, 'FA', 'C'),
(560, '0101-00537257', '2018-04-20', 'A', 11, 538.15, 113.01, 0, 0, 651.16, 0, 'FA', 'C'),
(561, '0101-00637483', '2018-04-23', 'A', 11, 538.15, 113.01, 0, 0, 651.16, 0, 'FA', 'C'),
(562, '0101-00637475', '2018-04-23', 'A', 11, 1022.65, 214.76, 0, 0, 1237.41, 0, 'FA', 'C'),
(563, '0101-00637469', '2018-04-23', 'A', 11, 538.15, 113.01, 0, 0, 651.16, 0, 'FA', 'C'),
(564, '0010-00017937', '2018-04-19', 'A', 12, 4665.06, 979.66, 0, 0, 5644.72, 0, 'FA', 'C'),
(565, '0010-00017964', '2018-04-20', 'A', 12, 7264.82, 1525.61, 0, 0, 8790.43, 0, 'FA', 'C'),
(566, '0010-00017986', '2018-04-23', 'A', 12, 4411.75, 926.47, 0, 0, 5338.22, 0, 'FA', 'C'),
(567, '0010-00018012', '2018-04-24', 'A', 12, 11866.47, 2491.96, 0, 0, 14358.43, 0, 'FA', 'C'),
(568, '0010-00018032', '2018-04-25', 'A', 12, 3430.82, 720.47, 0, 0, 4151.29, 0, 'FA', 'C'),
(569, '0010-00018037', '2018-04-25', 'A', 12, 468, 98.28, 0, 0, 566.28, 0, 'FA', 'C'),
(570, '0002-00021891', '2018-04-26', 'A', 72, 54672, 5740.56, 0, 0, 60412.56, 0, 'FA', 'C'),
(571, '0002-00021879', '2018-04-26', 'A', 72, 3691.02, 775.11, 0, 0, 4466.13, 0, 'FA', 'C'),
(572, '0002-00021878', '2018-04-26', 'A', 72, 103549.6, 21745.42, 0, 0, 125295.02, 0, 'FA', 'C'),
(573, '0010-00018058', '2018-04-26', 'A', 12, 3760.82, 789.77, 0, 0, 4550.59, 0, 'FA', 'C'),
(574, '0106-00140929', '2018-04-25', 'A', 11, 117.5, 24.68, 0, 0, 142.18, 0, 'FA', 'C'),
(575, '0112-00000524', '2018-04-24', 'A', 11, 464.51, 97.55, 0, 0, 562.06, 0, 'FA', 'C'),
(576, '0003-00001373', '2018-02-28', 'A', 35, 57299, 12032.79, 0, 0, 69331.79, 0, 'FA', 'C'),
(577, '0002-00001040', '2018-03-15', 'A', 55, 33250, 6982.5, 0, 0, 40232.5, 0, 'FA', 'C'),
(578, '0001-00000091', '2018-03-20', 'A', 23, 25250, 5302.5, 0, 0, 30552.5, 0, 'FA', 'C'),
(579, '0001-00000095', '2018-04-17', 'A', 23, 17000, 3570, 0, 0, 20570, 0, 'FA', 'C'),
(580, '0005-00022222', '2018-04-25', 'A', 57, 5632, 1182.72, 0, 0, 6814.72, 0, 'FA', 'C');
INSERT INTO `tbl_factura` (`facId`, `facNumero`, `facFecha`, `facTipo`, `facProveedorId`, `facSubtotal`, `facIva`, `facIva2`, `facIngresosBrutos`, `facTotal`, `facRetenciones`, `facTipoComprobante`, `facEstado`) VALUES
(581, '0005-00022221', '2018-04-25', 'A', 57, 4053.35, 851.2, 0, 0, 4904.55, 0, 'FA', 'C'),
(582, '0010-00018096', '2018-04-28', 'A', 12, 0.02, 0, 0, 0, 0.02, 0, 'FA', 'C'),
(583, '0010-00018091', '2018-04-28', 'A', 12, 3705.49, 778.15, 0, 0, 4483.64, 0, 'FA', 'C'),
(584, '0010-00018133', '2018-05-02', 'A', 12, 6861.6, 1440.94, 0, 0, 8302.54, 0, 'FA', 'C'),
(585, '0010-00018150', '2018-05-03', 'A', 12, 8817.32, 1851.64, 0, 0, 10668.96, 0, 'FA', 'C'),
(586, '0010-00018173', '2018-05-04', 'A', 12, 5386.53, 1131.17, 0, 0, 6517.7, 0, 'FA', 'C'),
(587, '0010-00018226', '2018-05-08', 'A', 12, 1715.4, 360.23, 0, 0, 2075.63, 0, 'FA', 'C'),
(588, '0010-00018221', '2018-05-08', 'A', 12, 2918.05, 612.79, 0, 0, 3530.84, 0, 'FA', 'C'),
(589, '0010-00018225', '2018-05-08', 'A', 12, 3430.8, 720.47, 0, 0, 4151.27, 0, 'FA', 'C'),
(590, '0010-00018243', '2018-05-09', 'A', 12, 5386.5, 1131.16, 0, 0, 6517.66, 0, 'FA', 'C'),
(591, '0010-00018282', '2018-05-11', 'A', 12, 0.05, 0, 0, 0, 0.05, 0, 'FA', 'C'),
(592, '0010-00018300', '2018-05-12', 'A', 12, 1175.37, 246.83, 0, 0, 1422.2, 0, 'FA', 'C'),
(593, '0010-00018336', '2018-05-15', 'A', 12, 2890.75, 607.06, 0, 0, 3497.81, 0, 'FA', 'C'),
(594, '0010-00018357', '2018-05-16', 'A', 12, 3430.8, 720.47, 0, 0, 4151.27, 0, 'FA', 'C'),
(595, '0010-00018390', '2018-05-18', 'A', 12, 6861.6, 1440.94, 0, 0, 8302.54, 0, 'FA', 'C'),
(596, '0010-00018522', '2018-05-28', 'A', 12, 4241.74, 890.77, 0, 0, 5132.51, 0, 'FA', 'C'),
(597, '0010-00018545', '2018-05-29', 'A', 12, 1629.31, 342.16, 0, 0, 1971.47, 0, 'FA', 'C'),
(598, '0010-00018547', '2018-05-29', 'A', 12, 1234.2, 259.18, 0, 0, 1493.38, 0, 'FA', 'C'),
(599, '0010-00018592', '2018-05-31', 'A', 12, 5715.8, 1200.32, 0, 0, 6916.12, 0, 'FA', 'C'),
(600, '0001-00000123', '2018-05-02', 'A', 74, 13983.4, 2936.51, 0, 0, 16919.91, 0, 'FA', 'C'),
(601, '0031-00311901', '2018-05-04', 'A', 16, 2950, 619.5, 88.5, 0, 3658, 0, 'FA', 'C'),
(602, '0011-00088029', '2018-05-08', 'A', 12, 80932.4, 16995.8, 0, 0, 97928.2, 0, 'FA', 'C'),
(603, '0058-00543399', '2018-04-21', 'A', 15, 1202, 252.42, 0, 0, 1454.42, 0, 'FA', 'C'),
(604, '0037-00037288', '2018-05-16', 'A', 15, 150.14, 31.53, 0, 0, 181.67, 0, 'FA', 'C'),
(605, '0037-00037503', '2018-05-24', 'A', 15, 62.02, 13.02, 0, 0, 75.04, 0, 'FA', 'C'),
(606, '0003-00009332', '2018-05-08', 'A', 14, 300, 63, 0, 0, 363, 0, 'FA', 'C'),
(607, '0003-00009338', '2018-05-10', 'A', 14, 1100, 231, 0, 0, 1331, 0, 'FA', 'C'),
(609, '0003-00009404', '2018-05-16', 'A', 14, 4458, 936.18, 0, 0, 5394.18, 0, 'FA', 'C'),
(610, '0003-00009439', '2018-05-21', 'A', 14, 878, 184.38, 0, 0, 1062.38, 0, 'FA', 'C'),
(611, '0003-00009476', '2018-05-23', 'A', 14, 744, 156.24, 0, 0, 900.24, 0, 'FA', 'C'),
(612, '0003-00009480', '2018-05-24', 'A', 14, 810, 170.1, 0, 0, 980.1, 0, 'FA', 'C'),
(613, '0003-00009490', '2018-05-28', 'A', 14, 1488, 312.48, 0, 0, 1800.48, 0, 'FA', 'C'),
(614, '0003-00009524', '2018-05-30', 'A', 14, 3368, 707.28, 0, 0, 4075.28, 0, 'FA', 'C'),
(615, '0101-00639428', '2018-05-03', 'A', 11, 603.13, 126.66, 0, 0, 729.79, 0, 'FA', 'C'),
(616, '0101-00639422', '2018-05-03', 'A', 11, 1022.65, 214.76, 0, 0, 1237.41, 0, 'FA', 'C'),
(617, '112-00000551', '2018-05-04', 'A', 11, 54.16, 11.37, 0, 0, 65.53, 0, 'FA', 'C'),
(618, '0101-00640374', '2018-05-09', 'A', 11, 1145.66, 240.59, 0, 0, 1386.25, 0, 'FA', 'C'),
(619, '0101-00640387', '2018-05-09', 'A', 11, 1145.66, 240.59, 0, 0, 1386.25, 0, 'FA', 'C'),
(620, '0101-00640885', '2018-05-11', 'A', 11, 602.41, 126.51, 0, 0, 728.92, 0, 'FA', 'C'),
(621, '0101-00640888', '2018-05-11', 'A', 11, 602.41, 126.51, 0, 0, 728.92, 0, 'FA', 'C'),
(622, '0106-00143033', '2018-05-11', 'A', 11, 112.46, 23.62, 0, 0, 136.08, 0, 'FA', 'C'),
(623, '0101-00640907', '2018-05-11', 'A', 11, 602.41, 126.51, 0, 0, 728.92, 0, 'FA', 'C'),
(624, '0112-00000584', '2018-05-11', 'A', 11, 1036.42, 217.65, 0, 0, 1254.07, 0, 'FA', 'C'),
(625, '0101-00641367', '2018-05-15', 'A', 11, 1145.66, 240.59, 0, 0, 1386.25, 0, 'FA', 'C'),
(626, '0101-00641125', '2018-05-14', 'A', 11, 1145.66, 240.59, 0, 0, 1386.25, 0, 'FA', 'C'),
(627, '0106-00143345', '2018-05-15', 'A', 11, 112.46, 23.62, 0, 0, 136.08, 0, 'FA', 'C'),
(628, '0101-00641369', '2018-05-15', 'A', 11, 1145.66, 240.59, 0, 0, 1386.25, 0, 'FA', 'C'),
(629, '0101-00642173', '2018-05-18', 'A', 11, 1145.66, 240.59, 0, 0, 1386.25, 0, 'FA', 'C'),
(630, '0101-00642284', '2018-05-18', 'A', 11, 602.41, 126.51, 0, 0, 728.92, 0, 'FA', 'C'),
(631, '0101-00642711', '2018-05-22', 'A', 11, 1145.66, 240.59, 0, 0, 1386.25, 0, 'FA', 'C'),
(632, '0101-00643628', '2018-05-28', 'A', 11, 547.33, 114.94, 0, 0, 662.27, 0, 'FA', 'C'),
(633, '0101-00643897', '2018-05-29', 'A', 11, 602.41, 126.51, 0, 0, 728.92, 0, 'FA', 'C'),
(634, '0101-00644267', '2018-05-30', 'A', 11, 1145.66, 240.59, 0, 0, 1386.25, 0, 'FA', 'C'),
(635, '0101-00644272', '2018-05-30', 'A', 11, 404.02, 84.84, 0, 0, 488.86, 0, 'FA', 'C'),
(636, '0101-006442666', '2018-05-30', 'A', 11, 1145.66, 240.59, 0, 0, 1386.25, 0, 'FA', 'C'),
(637, '0101-00644561', '2018-05-31', 'A', 11, 1145.66, 240.59, 0, 0, 1386.25, 0, 'FA', 'C'),
(638, '0101-00644649', '2018-05-31', 'A', 11, 602.41, 126.51, 0, 0, 728.92, 0, 'FA', 'C'),
(639, '0003-00023605', '2018-04-17', 'A', 20, 4392, 922.32, 0, 0, 5314.32, 0, 'FA', 'C'),
(640, '0003-00023831', '2018-04-25', 'A', 20, 2356, 494.76, 0, 0, 2850.76, 0, 'FA', 'C'),
(641, '0003-00024169', '2018-05-10', 'A', 11, 1428, 299.88, 0, 0, 1727.88, 0, 'FA', 'C'),
(642, '0003-00024169', '2018-05-10', 'A', 20, 1428, 299.88, 0, 0, 1727.88, 0, 'FA', 'C'),
(643, '0021-00017924', '2018-04-13', 'A', 70, 34640.46, 7274.5, 0, 0, 41914.96, 0, 'FA', 'C'),
(644, '0003-00009534', '2018-05-31', 'A', 14, 372, 78.12, 0, 0, 450.12, 0, 'FA', 'C'),
(645, '0011-000000007404', '2018-05-26', 'A', 30, 32850, 6898.5, 0, 0, 39748.5, 0, 'FA', 'C'),
(646, '0005-00097251', '2018-04-19', 'A', 18, 564, 118.44, 0, 0, 682.44, 0, 'FA', 'C'),
(647, '0005-00097546', '2018-05-02', 'A', 18, 2888, 606.48, 0, 0, 3494.48, 0, 'FA', 'C'),
(648, '0022-00054538', '2018-06-21', 'A', 13, 287.23, 60.32, 0, 0, 347.55, 0, 'FA', 'C'),
(649, '0021-00827578', '2018-06-22', 'A', 13, 448.8, 94.25, 0, 0, 543.05, 0, 'FA', 'C'),
(650, '0021-00828080', '2018-06-26', 'A', 13, 321.71, 67.56, 0, 0, 389.27, 0, 'FA', 'C'),
(651, '0022-00054603', '2018-06-26', 'A', 13, 321.71, 67.56, 0, 0, 389.27, 0, 'FA', 'C'),
(652, '0010-00018612', '2018-06-01', 'A', 12, 1306.8, 274.43, 0, 0, 1581.23, 0, 'FA', 'C'),
(653, '0010-00018630', '2018-06-04', 'A', 12, 6861.6, 1440.94, 0, 0, 8302.54, 0, 'FA', 'C'),
(654, '0010-00018650', '2018-06-05', 'A', 12, 8817.3, 1851.63, 0, 0, 10668.93, 0, 'FA', 'C'),
(655, '0010-00018672', '2018-06-06', 'A', 12, 3702.6, 777.55, 0, 0, 4480.15, 0, 'FA', 'C'),
(656, '0010-00018696', '2018-06-07', 'A', 12, 5132.05, 1077.73, 0, 0, 6209.78, 0, 'FA', 'C'),
(657, '0010-00018709', '2018-06-08', 'A', 12, 4275.9, 897.94, 0, 0, 5173.84, 0, 'FA', 'C'),
(658, '0010-00018751', '2018-06-12', 'A', 12, 1247.39, 261.95, 0, 0, 1509.34, 0, 'FA', 'C'),
(659, '0010-00018770', '2018-06-13', 'A', 12, 3834.02, 805.14, 0, 0, 4639.16, 0, 'FA', 'C'),
(660, '0010-00018804', '2018-06-15', 'A', 12, 9220.5, 1936.3, 0, 0, 11156.81, 0, 'FA', 'C'),
(661, '0010-00018828', '2018-06-18', 'A', 12, 3430.8, 720.47, 0, 0, 4151.27, 0, 'FA', 'C'),
(662, '0010-00018844', '2018-06-19', 'A', 12, 4105.8, 862.22, 0, 0, 4968.02, 0, 'FA', 'C'),
(663, '0010-00018863', '2018-06-21', 'A', 12, 1247.37, 261.95, 0, 0, 1509.32, 0, 'FA', 'C'),
(664, '0010-00018882', '2018-06-22', 'A', 12, 652.8, 137.09, 0, 0, 789.89, 0, 'FA', 'C'),
(665, '0058-00563472', '2018-05-16', 'A', 15, 3148, 661.08, 0, 0, 3809.08, 0, 'FA', 'C'),
(666, '0058-00578978', '2018-06-06', 'A', 15, 1919, 402.99, 0, 0, 2321.99, 0, 'FA', 'C'),
(667, '0058-00582114', '2018-06-11', 'A', 15, 1432.9, 300.91, 0, 0, 1733.81, 0, 'FA', 'C'),
(668, '0058-00582981', '2018-06-12', 'A', 15, 5118, 1074.78, 0, 0, 6192.78, 0, 'FA', 'C'),
(669, '0058-00584869', '2018-06-14', 'A', 15, 863, 181.23, 0, 0, 1044.23, 0, 'FA', 'C'),
(670, '0058-00591685', '2018-06-26', 'A', 15, 716.45, 150.45, 0, 0, 866.9, 0, 'FA', 'C'),
(671, '0037-00038296', '2018-06-27', 'A', 15, 62.02, 13.02, 0, 0, 75.04, 0, 'FA', 'C'),
(672, '0003-00009562', '2018-06-04', 'A', 14, 878, 184.38, 0, 0, 1062.38, 0, 'FA', 'C'),
(673, '0003-00009667', '2018-06-18', 'A', 14, 237, 49.77, 0, 0, 286.77, 0, 'FA', 'C'),
(674, '0101-00643496', '2018-05-28', 'A', 11, 545.29, 114.51, 0, 0, 659.8, 0, 'FA', 'C'),
(675, '0112-00000664', '2018-06-04', 'A', 11, 424.12, 89.07, 0, 0, 513.19, 0, 'FA', 'C'),
(676, '0101-00645223', '2018-06-05', 'A', 11, 600.37, 126.08, 0, 0, 726.45, 0, 'FA', 'C'),
(677, '0101-00645525', '2018-06-06', 'A', 11, 600.37, 126.08, 0, 0, 726.45, 0, 'FA', 'C'),
(678, '0101-00646344', '2018-06-11', 'A', 11, 247.4, 51.95, 0, 0, 299.35, 0, 'FA', 'C'),
(679, '0106-00147035', '2018-06-12', 'A', 11, 77.11, 16.19, 0, 0, 93.3, 0, 'FA', 'C'),
(680, '0101-00647247', '2018-06-14', 'A', 11, 1145.66, 240.59, 0, 0, 1386.25, 0, 'FA', 'C'),
(681, '0112-00000718', '2018-06-18', 'A', 11, 558.14, 117.21, 0, 0, 675.35, 0, 'FA', 'C'),
(682, '0112-00000738', '2018-06-26', 'A', 11, 249.24, 52.34, 0, 0, 301.58, 0, 'FA', 'C'),
(683, '0101-00648763', '2018-06-25', 'A', 11, 602.41, 126.51, 0, 0, 728.92, 0, 'FA', 'C'),
(684, '0002-00000247', '2018-06-05', 'A', 21, 34445.25, 7233.5, 0, 0, 41678.75, 0, 'FA', 'C'),
(685, '0003-00024455', '2018-05-22', 'A', 20, 1428, 299.88, 0, 0, 1727.88, 0, 'FA', 'C'),
(686, '0112-00000749', '2018-06-29', 'A', 11, 233.17, 48.97, 0, 0, 282.14, 0, 'FA', 'C'),
(687, '0010-00018927', '2018-06-27', 'A', 12, 2535.08, 532.37, 0, 0, 3067.45, 0, 'FA', 'C'),
(688, '0010-00018963', '2018-06-28', 'A', 12, 7360.52, 1545.71, 0, 0, 8906.23, 0, 'FA', 'C'),
(689, '0010-00018989', '2018-06-29', 'A', 12, 12927.6, 2714.8, 0, 0, 15642.4, 0, 'FA', 'C'),
(690, '0010-00018931', '2018-06-27', 'A', 12, 5286.64, 1110.19, 0, 0, 6396.83, 0, 'FA', 'C'),
(691, '0103-00052251', '2018-05-28', 'A', 75, 3967, 416.54, 0, 0, 4383.54, 0, 'FA', 'P'),
(692, '0101-00649808', '2018-06-29', 'A', 11, 1145.66, 240.59, 0, 0, 1386.25, 0, 'FA', 'C'),
(693, '0058-00589867', '2018-06-22', 'A', 15, 863, 181.23, 0, 0, 1044.23, 0, 'FA', 'C'),
(694, '0058-00590660', '2018-06-23', 'A', 15, 1714, 359.94, 0, 0, 2073.94, 0, 'FA', 'C'),
(695, '0058-00593730', '2018-06-28', 'A', 15, 2565, 538.65, 0, 0, 3103.65, 0, 'FA', 'C'),
(696, '0001-00000098', '2018-05-15', 'A', 23, 17050, 3580.5, 0, 0, 20630.5, 0, 'FA', 'C'),
(697, '0005-00001197', '2018-06-22', 'A', 57, 436, 91.56, 0, 0, 527.56, 0, 'NC', 'C'),
(698, '0005-00023413', '2018-06-22', 'A', 57, 1098, 230.58, 0, 0, 1328.58, 0, 'FA', 'C'),
(699, '0005-00023395', '2018-06-21', 'A', 57, 6262, 1315.02, 0, 0, 7577.02, 0, 'FA', 'C'),
(700, '0003-00003892', '2018-06-11', 'A', 32, 29400, 6174, 0, 0, 35574, 0, 'FA', 'C'),
(701, '0003-00001156', '2018-06-15', 'A', 76, 26669.3, 5600.55, 0, 0, 32269.85, 0, 'FA', 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imputapago`
--

CREATE TABLE IF NOT EXISTS `tbl_imputapago` (
  `id_imputfac` int(11) NOT NULL AUTO_INCREMENT,
  `factid` int(11) DEFAULT NULL,
  `opid` int(11) DEFAULT NULL,
  KEY `id_imputfac` (`id_imputfac`),
  KEY `opid` (`opid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_liquida`
--

CREATE TABLE IF NOT EXISTS `tbl_liquida` (
  `liquidaid` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `tarjetaid` int(11) DEFAULT NULL,
  `retencion` float NOT NULL,
  PRIMARY KEY (`liquidaid`),
  KEY `tarjetaid` (`tarjetaid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbl_liquida`
--

INSERT INTO `tbl_liquida` (`liquidaid`, `fecha`, `monto`, `codigo`, `tarjetaid`, `retencion`) VALUES
(1, '2017-06-30', 20.5, '4564646', 2, 0),
(2, '2017-08-31', 344, '3324234', 2, 0),
(3, '2017-08-23', 14515, '14145', 2, 0),
(4, '2017-09-10', 1145, '1414', 3, 0),
(5, '2017-09-14', 345, '342432', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ordenpago`
--

CREATE TABLE IF NOT EXISTS `tbl_ordenpago` (
  `opid` int(11) NOT NULL AUTO_INCREMENT,
  `opcomprobante` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `opfecha` date DEFAULT NULL,
  `opmonto` float(15,0) DEFAULT NULL,
  `provid` int(11) DEFAULT NULL,
  `opestado` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`opid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbl_ordenpago`
--

INSERT INTO `tbl_ordenpago` (`opid`, `opcomprobante`, `opfecha`, `opmonto`, `provid`, `opestado`) VALUES
(1, '1', '2017-09-15', 6050, 4, 'P'),
(2, '1', '2018-06-27', 41342, 12, 'P'),
(3, '1', '2018-06-27', 134686, 12, 'P'),
(4, '1', '2018-06-30', 98332, 12, 'P'),
(5, '1', '2018-07-04', 4384, 75, 'P');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admcredits`
--
ALTER TABLE `admcredits`
  ADD CONSTRAINT `admcredits_ibfk_1` FOREIGN KEY (`cliId`) REFERENCES `admcustomers` (`cliId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `admcredits_ibfk_2` FOREIGN KEY (`usrId`) REFERENCES `sisusers` (`usrId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `admcredits_ibfk_3` FOREIGN KEY (`saleId`) REFERENCES `admsales` (`saleId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `admcustomerpreferences`
--
ALTER TABLE `admcustomerpreferences`
  ADD CONSTRAINT `cliId` FOREIGN KEY (`cliId`) REFERENCES `admcustomers` (`cliId`),
  ADD CONSTRAINT `sfamId` FOREIGN KEY (`sfamId`) REFERENCES `confsubfamily` (`sfamId`);

--
-- Filtros para la tabla `admproducts`
--
ALTER TABLE `admproducts`
  ADD CONSTRAINT `admproducts_ibfk_1` FOREIGN KEY (`sfamId`) REFERENCES `confsubfamily` (`sfamId`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `admsales`
--
ALTER TABLE `admsales`
  ADD CONSTRAINT `admsales_ibfk_1` FOREIGN KEY (`cliId`) REFERENCES `admcustomers` (`cliId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `admsales_ibfk_2` FOREIGN KEY (`usrId`) REFERENCES `sisusers` (`usrId`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `admsalesdetail`
--
ALTER TABLE `admsalesdetail`
  ADD CONSTRAINT `admsalesdetail_ibfk_1` FOREIGN KEY (`saleId`) REFERENCES `admsales` (`saleId`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `admsalesdetail_ibfk_2` FOREIGN KEY (`prodId`) REFERENCES `admproducts` (`prodId`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `admstock`
--
ALTER TABLE `admstock`
  ADD CONSTRAINT `admstock_ibfk_1` FOREIGN KEY (`prodId`) REFERENCES `admproducts` (`prodId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `admstock_ibfk_2` FOREIGN KEY (`usrId`) REFERENCES `sisusers` (`usrId`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `admvisits`
--
ALTER TABLE `admvisits`
  ADD CONSTRAINT `admvisits_ibfk_1` FOREIGN KEY (`cliId`) REFERENCES `admcustomers` (`cliId`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`famId`) REFERENCES `conffamily` (`famId`);

--
-- Filtros para la tabla `confsubfamily`
--
ALTER TABLE `confsubfamily`
  ADD CONSTRAINT `famId` FOREIGN KEY (`famId`) REFERENCES `conffamily` (`famId`);

--
-- Filtros para la tabla `tbl_chequera`
--
ALTER TABLE `tbl_chequera`
  ADD CONSTRAINT `tbl_chequera_ibfk_1` FOREIGN KEY (`bancid`) REFERENCES `abmbancos` (`bancid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_cheques`
--
ALTER TABLE `tbl_cheques`
  ADD CONSTRAINT `tbl_cheques_ibfk_1` FOREIGN KEY (`provid`) REFERENCES `abmproveedores` (`provid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_cheques_ibfk_2` FOREIGN KEY (`id_chequera`) REFERENCES `tbl_chequera` (`cheqId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_detaliquida`
--
ALTER TABLE `tbl_detaliquida`
  ADD CONSTRAINT `tbl_detaliquida_ibfk_1` FOREIGN KEY (`cuponid`) REFERENCES `tbl_cupon` (`cuponid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
