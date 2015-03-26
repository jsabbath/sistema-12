-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2015 a las 20:29:14
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `alum_id` int(11) NOT NULL AUTO_INCREMENT,
  `alum_rut` varchar(12) DEFAULT NULL,
  `alum_nombres` varchar(100) DEFAULT NULL,
  `alum_apepat` varchar(20) DEFAULT NULL,
  `alum_apemat` varchar(20) DEFAULT NULL,
  `alum_direccion` varchar(255) DEFAULT NULL,
  `alum_comuna` int(11) DEFAULT NULL,
  `alum_ciudad` int(11) DEFAULT NULL,
  `alum_region` int(11) DEFAULT NULL,
  `alum_genero` int(11) DEFAULT NULL,
  `alum_f_nac` date DEFAULT NULL,
  `alum_salud` text,
  `alum_obs` text,
  `alum_estado` int(11) DEFAULT '1',
  PRIMARY KEY (`alum_id`),
  KEY `alum_comuna` (`alum_comuna`),
  KEY `alum_ciudad` (`alum_ciudad`),
  KEY `alum_region` (`alum_region`),
  KEY `alum_genero` (`alum_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`alum_id`, `alum_rut`, `alum_nombres`, `alum_apepat`, `alum_apemat`, `alum_direccion`, `alum_comuna`, `alum_ciudad`, `alum_region`, `alum_genero`, `alum_f_nac`, `alum_salud`, `alum_obs`, `alum_estado`) VALUES
(88, '', 'JULITO ASD', 'ITURRA', 'PA LOS XOROS', '', NULL, NULL, NULL, NULL, '0000-00-00', '', '', 1),
(89, '', 'blizcrank', 'achunta', 'algo', '', NULL, NULL, NULL, NULL, '0000-00-00', '', '', 1),
(90, '', 'OLIVER', 'ATOM', '', '', NULL, NULL, NULL, NULL, '0000-00-00', '', '', 1),
(91, '', 'JUAN JAJA', 'DIOS', '123', '', NULL, NULL, NULL, NULL, '0000-00-00', '', '', 1),
(92, '', 'JUANA', 'LA', 'CUBANA', '', NULL, NULL, NULL, NULL, '0000-00-00', '', '', 1),
(93, '', 'nombre1 nom1', 'apellido1', 'apellido2', '', NULL, NULL, NULL, NULL, '0000-00-00', '', '', 1),
(94, '', 'weon1', 'asd', 'asd', '', NULL, NULL, NULL, NULL, '0000-00-00', '', '', 1),
(95, '', '', '', '', '', NULL, NULL, NULL, NULL, '0000-00-00', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `are_id` int(11) NOT NULL AUTO_INCREMENT,
  `are_descripcion` varchar(100) DEFAULT NULL,
  `are_infd` int(11) DEFAULT NULL,
  PRIMARY KEY (`are_id`),
  KEY `are_infd` (`are_infd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE IF NOT EXISTS `asignatura` (
  `asi_id` int(11) NOT NULL AUTO_INCREMENT,
  `asi_codigo` varchar(20) DEFAULT NULL,
  `asi_descripcion` varchar(100) DEFAULT NULL,
  `asi_nombrecorto` varchar(5) DEFAULT NULL,
  `asi_ano` int(4) NOT NULL,
  PRIMARY KEY (`asi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`asi_id`, `asi_codigo`, `asi_descripcion`, `asi_nombrecorto`, `asi_ano`) VALUES
(1, '52', 'MATEMATICA', 'MAT', 2015),
(2, '32', 'INGLES', 'ING', 2015),
(3, '123', 'LENGUAJE', 'LEN', 2015),
(4, '1234', 'HISTORIA', 'HIS', 2015),
(5, '213621', 'JESUS', 'JES', 2014),
(6, '12354', 'JESUS', 'JES', 2015);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_asignatura`
--

CREATE TABLE IF NOT EXISTS `a_asignatura` (
  `aa_id` int(11) NOT NULL AUTO_INCREMENT,
  `aa_docente` int(11) DEFAULT NULL,
  `aa_curso` int(11) DEFAULT NULL,
  `aa_asignatura` int(11) DEFAULT NULL,
  PRIMARY KEY (`aa_id`),
  KEY `aa_docente` (`aa_docente`),
  KEY `aa_curso` (`aa_curso`),
  KEY `aa_asignatura` (`aa_asignatura`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Volcado de datos para la tabla `a_asignatura`
--

INSERT INTO `a_asignatura` (`aa_id`, `aa_docente`, `aa_curso`, `aa_asignatura`) VALUES
(69, 2, 2, 4),
(70, 1, 2, 2),
(71, 2, 2, 3),
(74, 2, 2, 1),
(96, 2, 4, 6),
(97, 1, 4, 3),
(98, 2, NULL, 5),
(99, 2, 1, 5),
(100, 2, 4, 2),
(101, 2, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `ciu_id` int(11) NOT NULL AUTO_INCREMENT,
  `ciu_descripcion` varchar(100) DEFAULT NULL,
  `ciu_reg` int(11) DEFAULT NULL,
  PRIMARY KEY (`ciu_id`),
  KEY `ciu_reg` (`ciu_reg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=153 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ciu_id`, `ciu_descripcion`, `ciu_reg`) VALUES
(11, 'IQUIQUE', 1),
(14, 'TAMARUGAL', 1),
(21, 'ANTOFAGASTA', 2),
(22, 'EL LOA', 2),
(23, 'TOCOPILLA', 2),
(31, 'COPIAPO', 3),
(32, 'CHAÑARAL', 3),
(33, 'HUASCO', 3),
(41, 'ELQUI', 4),
(42, 'CHOAPA', 4),
(43, 'LIMARI', 4),
(51, 'VALPARAISO', 5),
(52, 'ISLA DE PASCUA', 5),
(53, 'LOS ANDES', 5),
(54, 'PETORCA', 5),
(55, 'QUILLOTA', 5),
(56, 'SAN ANTONIO', 5),
(57, 'SAN FELIPE DE ACONCAGUA', 5),
(61, 'CACHAPOAL', 6),
(62, 'CARDENAL CARO', 6),
(63, 'COLCHAGUA', 6),
(71, 'TALCA', 7),
(72, 'CAUQUENES', 7),
(73, 'CURICO', 7),
(74, 'LINARES', 7),
(81, 'CONCEPCION', 8),
(82, 'ARAUCO', 8),
(83, 'BIOBIO', 8),
(84, 'ÑUBLE', 8),
(91, 'CAUTIN', 9),
(92, 'MALLECO', 9),
(101, 'LLANQUIHUE', 10),
(102, 'CHILOE', 10),
(103, 'OSORNO', 10),
(104, 'PALENA', 10),
(111, 'COIHAIQUE', 11),
(112, 'AISEN', 11),
(113, 'CAPITAN PRAT', 11),
(114, 'GENERAL CARRERA', 11),
(121, 'MAGALLANES', 12),
(122, 'ANTARTICA CHILENA', 12),
(123, 'TIERRA DEL FUEGO', 12),
(124, 'ULTIMA ESPERANZA', 12),
(131, 'SANTIAGO', 13),
(132, 'CORDILLERA', 13),
(133, 'CHACABUCO', 13),
(134, 'MAIPO', 13),
(135, 'MELIPILLA', 13),
(136, 'TALAGANTE', 13),
(141, 'VALDIVIA', 14),
(142, 'RANCO', 14),
(151, 'ARICA', 15),
(152, 'PARINACOTA', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE IF NOT EXISTS `comuna` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_descripcion` varchar(100) DEFAULT NULL,
  `com_ciu` int(11) DEFAULT NULL,
  PRIMARY KEY (`com_id`),
  KEY `com_ciu` (`com_ciu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15203 ;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`com_id`, `com_descripcion`, `com_ciu`) VALUES
(1101, 'IQUIQUE', 11),
(1107, 'ALTO HOSPICIO', 11),
(1401, 'POZO ALMONTE', 14),
(1402, 'CAMIÑA', 14),
(1403, 'COLCHANE', 14),
(1404, 'HUARA', 14),
(1405, 'PICA', 14),
(2101, 'ANTOFAGASTA', 21),
(2102, 'MEJILLONES', 21),
(2103, 'SIERRA GORDA', 21),
(2104, 'TALTAL', 21),
(2201, 'CALAMA', 22),
(2202, 'OLLAGUE', 22),
(2203, 'SAN PEDRO DE ATACAMA', 22),
(2301, 'TOCOPILLA', 23),
(2302, 'MARÍA ELENA', 23),
(3101, 'COPIAPÓ', 31),
(3102, 'CALDERA', 31),
(3103, 'TIERRA AMARILLA', 31),
(3201, 'CHAÑARAL', 32),
(3202, 'DIEGO DE ALMAGRO', 32),
(3301, 'VALLENAR', 33),
(3302, 'ALTO DEL CARMEN', 33),
(3303, 'FREIRINA', 33),
(3304, 'HUASCO', 33),
(4101, 'LA SERENA', 41),
(4102, 'COQUIMBO', 41),
(4103, 'ANDACOLLO', 41),
(4104, 'LA HIGUERA', 41),
(4105, 'PAIHUANO', 41),
(4106, 'VICUÑA', 41),
(4201, 'ILLAPEL', 42),
(4202, 'CANELA', 42),
(4203, 'LOS VILOS', 42),
(4204, 'SALAMANCA', 42),
(4301, 'OVALLE', 43),
(4302, 'COMBARBALÁ', 43),
(4303, 'MONTE PATRIA', 43),
(4304, 'PUNITAQUI', 43),
(4305, 'RÍO HURTADO', 43),
(5101, 'VALPARAÍSO', 51),
(5102, 'CASABLANCA', 51),
(5103, 'CONCÓN', 51),
(5104, 'JUAN FERNÁNDEZ', 51),
(5105, 'PUCHUNCAVÍ', 51),
(5106, 'QUILPUÉ', 51),
(5107, 'QUINTERO', 51),
(5108, 'VILLA ALEMANA', 51),
(5109, 'VIÑA DEL MAR', 51),
(5201, 'ISLA DE PASCUA', 52),
(5301, 'LOS ANDES', 53),
(5302, 'CALLE LARGA', 53),
(5303, 'RINCONADA', 53),
(5304, 'SAN ESTEBAN', 53),
(5401, 'LA LIGUA', 54),
(5402, 'CABILDO', 54),
(5403, 'PAPUDO', 54),
(5404, 'PETORCA', 54),
(5405, 'ZAPALLAR', 54),
(5501, 'QUILLOTA', 55),
(5502, 'CALERA', 55),
(5503, 'HIJUELAS', 55),
(5504, 'LA CRUZ', 55),
(5505, 'LIMACHE', 55),
(5506, 'NOGALES', 55),
(5507, 'OLMUÉ', 55),
(5601, 'SAN ANTONIO', 56),
(5602, 'ALGARROBO', 56),
(5603, 'CARTAGENA', 56),
(5604, 'EL QUISCO', 56),
(5605, 'EL TABO', 56),
(5606, 'SANTO DOMINGO', 56),
(5701, 'SAN FELIPE', 57),
(5702, 'CATEMU', 57),
(5703, 'LLAY LLAY', 57),
(5704, 'PANQUEHUE', 57),
(5705, 'PUTAENDO', 57),
(5706, 'SANTA MARÍA', 57),
(6101, 'RANCAGUA', 61),
(6102, 'CODEGUA', 61),
(6103, 'COINCO', 61),
(6104, 'COLTAUCO', 61),
(6105, 'DOÑIHUE', 61),
(6106, 'GRANEROS', 61),
(6107, 'LAS CABRAS', 61),
(6108, 'MACHALÍ', 61),
(6109, 'MALLOA', 61),
(6110, 'MOSTAZAL', 61),
(6111, 'OLIVAR', 61),
(6112, 'PEUMO', 61),
(6113, 'PICHIDEGUA', 61),
(6114, 'QUINTA DE TILCOCO', 61),
(6115, 'RENGO', 61),
(6116, 'REQUINOA', 61),
(6117, 'SAN VICENTE', 61),
(6201, 'PICHILEMU', 62),
(6202, 'LA ESTRELLA', 62),
(6203, 'LITUECHE', 62),
(6204, 'MARCHIHUE', 62),
(6205, 'NAVIDAD', 62),
(6206, 'PAREDONES', 62),
(6301, 'SAN FERNANDO', 63),
(6302, 'CHÉPICA', 63),
(6303, 'CHIMBARONGO', 63),
(6304, 'LOLOL', 63),
(6305, 'NANCAGUA', 63),
(6306, 'PALMILLA', 63),
(6307, 'PERALILLO', 63),
(6308, 'PLACILLA', 63),
(6309, 'PUMANQUE', 63),
(6310, 'SANTA CRUZ', 63),
(7101, 'TALCA', 71),
(7102, 'CONSTITUCIÓN', 71),
(7103, 'CUREPTO', 71),
(7104, 'EMPEDRADO', 71),
(7105, 'MAULE', 71),
(7106, 'PELARCO', 71),
(7107, 'PENCAHUE', 71),
(7108, 'RÍO CLARO', 71),
(7109, 'SAN CLEMENTE', 71),
(7110, 'SAN RAFAEL', 71),
(7201, 'CAUQUENES', 72),
(7202, 'CHANCO', 72),
(7203, 'PELLUHUE', 72),
(7301, 'CURICÓ', 73),
(7302, 'HUALAÑÉ', 73),
(7303, 'LICANTÉN', 73),
(7304, 'MOLINA', 73),
(7305, 'RAUCO', 73),
(7306, 'ROMERAL', 73),
(7307, 'SAGRADA FAMILIA', 73),
(7308, 'TENO', 73),
(7309, 'VICHUQUÉN', 73),
(7401, 'LINARES', 74),
(7402, 'COLBÚN', 74),
(7403, 'LONGAVÍ', 74),
(7404, 'PARRAL', 74),
(7405, 'RETIRO', 74),
(7406, 'SAN JAVIER', 74),
(7407, 'VILLA ALEGRE', 74),
(7408, 'YERBAS BUENAS', 74),
(8101, 'CONCEPCIÓN', 81),
(8102, 'CORONEL', 81),
(8103, 'CHIGUAYANTE', 81),
(8104, 'FLORIDA', 81),
(8105, 'HUALQUI', 81),
(8106, 'LOTA', 81),
(8107, 'PENCO', 81),
(8108, 'SAN PEDRO DE LA PAZ', 81),
(8109, 'SANTA JUANA', 81),
(8110, 'TALCAHUANO', 81),
(8111, 'TOMÉ', 81),
(8112, 'HUALPÉN', 81),
(8201, 'LEBU', 82),
(8202, 'ARAUCO', 82),
(8203, 'CAÑETE', 82),
(8204, 'CONTULMO', 82),
(8205, 'CURANILAHUE', 82),
(8206, 'LOS ALAMOS', 82),
(8207, 'TIRUA', 82),
(8301, 'LOS ANGELES', 83),
(8302, 'ANTUCO', 83),
(8303, 'CABRERO', 83),
(8304, 'LAJA', 83),
(8305, 'MULCHÉN', 83),
(8306, 'NACIMIENTO', 83),
(8307, 'NEGRETE', 83),
(8308, 'QUILACO', 83),
(8309, 'QUILLECO', 83),
(8310, 'SAN ROSENDO', 83),
(8311, 'SANTA BÁRBARA', 83),
(8312, 'TUCAPEL', 83),
(8313, 'YUMBEL', 83),
(8314, 'ALTO BIOBÍO', 83),
(8401, 'CHILLÁN', 84),
(8402, 'BULNES', 84),
(8403, 'COBQUECURA', 84),
(8404, 'COELEMU', 84),
(8405, 'COIHUECO', 84),
(8406, 'CHILLÁN VIEJO', 84),
(8407, 'EL CARMEN', 84),
(8408, 'NINHUE', 84),
(8409, 'ÑIQUÉN', 84),
(8410, 'PEMUCO', 84),
(8411, 'PINTO', 84),
(8412, 'PORTEZUELO', 84),
(8413, 'QUILLÓN', 84),
(8414, 'QUIRIHUE', 84),
(8415, 'RANQUIL', 84),
(8416, 'SAN CARLOS', 84),
(8417, 'SAN FABIÁN', 84),
(8418, 'SAN IGNACIO', 84),
(8419, 'SAN NICOLÁS', 84),
(8420, 'TREHUACO', 84),
(8421, 'YUNGAY', 84),
(9101, 'TEMUCO', 91),
(9102, 'CARAHUE', 91),
(9103, 'CUNCO', 91),
(9104, 'CURARREHUE', 91),
(9105, 'FREIRE', 91),
(9106, 'GALVARINO', 91),
(9107, 'GORBEA', 91),
(9108, 'LAUTARO', 91),
(9109, 'LONCOCHE', 91),
(9110, 'MELIPEUCO', 91),
(9111, 'NUEVA IMPERIAL', 91),
(9112, 'PADRE LAS CASAS', 91),
(9113, 'PERQUENCO', 91),
(9114, 'PITRUFQUÉN', 91),
(9115, 'PUCÓN', 91),
(9116, 'SAAVEDRA', 91),
(9117, 'TEODORO SCHMIDT', 91),
(9118, 'TOLTÉN', 91),
(9119, 'VILCÚN', 91),
(9120, 'VILLARRICA', 91),
(9121, 'CHOLCHOL', 91),
(9201, 'ANGOL', 92),
(9202, 'COLLIPULLI', 92),
(9203, 'CURACAUTÍN', 92),
(9204, 'ERCILLA', 92),
(9205, 'LONQUIMAY', 92),
(9206, 'LOS SAUCES', 92),
(9207, 'LUMACO', 92),
(9208, 'PURÉN', 92),
(9209, 'RENAICO', 92),
(9210, 'TRAIGUÉN', 92),
(9211, 'VICTORIA', 92),
(10101, 'PUERTO MONTT', 101),
(10102, 'CALBUCO', 101),
(10103, 'COCHAMÓ', 101),
(10104, 'FRESIA', 101),
(10105, 'FRUTILLAR', 101),
(10106, 'LOS MUERMOS', 101),
(10107, 'LLANQUIHUE', 101),
(10108, 'MAULLÍN', 101),
(10109, 'PUERTO VARAS', 101),
(10201, 'CASTRO', 102),
(10202, 'ANCUD', 102),
(10203, 'CHONCHI', 102),
(10204, 'CURACO DE VÉLEZ', 102),
(10205, 'DALCAHUE', 102),
(10206, 'PUQUELDÓN', 102),
(10207, 'QUEILÉN', 102),
(10208, 'QUELLÓN', 102),
(10209, 'QUEMCHI', 102),
(10210, 'QUINCHAO', 102),
(10301, 'OSORNO', 103),
(10302, 'PUERTO OCTAY', 103),
(10303, 'PURRANQUE', 103),
(10304, 'PUYEHUE', 103),
(10305, 'RÍO NEGRO', 103),
(10306, 'SAN JUAN DE LA COSTA', 103),
(10307, 'SAN PABLO', 103),
(10401, 'CHAITÉN', 104),
(10402, 'FUTALEUFÚ', 104),
(10403, 'HUALAIHUE', 104),
(10404, 'PALENA', 104),
(11101, 'COIHAIQUE', 111),
(11102, 'LAGO VERDE', 111),
(11201, 'AISÉN', 112),
(11202, 'CISNES', 112),
(11203, 'GUAITECAS', 112),
(11301, 'COCHRANE', 113),
(11302, 'OHIGGINS', 113),
(11303, 'TORTEL', 113),
(11401, 'CHILE CHICO', 114),
(11402, 'RÍO IBÁÑEZ', 114),
(12101, 'PUNTA ARENAS', 121),
(12102, 'LAGUNA BLANCA', 121),
(12103, 'RÍO VERDE', 121),
(12104, 'SAN GREGORIO', 121),
(12201, 'CABO DE HORNOS', 122),
(12202, 'ANTÁRTICA', 122),
(12301, 'PORVENIR', 123),
(12302, 'PRIMAVERA', 123),
(12303, 'TIMAUKEL', 123),
(12401, 'NATALES', 124),
(12402, 'TORRES DEL PAINE', 124),
(13101, 'SANTIAGO', 131),
(13102, 'CERRILLOS', 131),
(13103, 'CERRO NAVIA', 131),
(13104, 'CONCHALÍ', 131),
(13105, 'EL BOSQUE', 131),
(13106, 'ESTACIÓN CENTRAL', 131),
(13107, 'HUECHURABA', 131),
(13108, 'INDEPENDENCIA', 131),
(13109, 'LA CISTERNA', 131),
(13110, 'LA FLORIDA', 131),
(13111, 'LA GRANJA', 131),
(13112, 'LA PINTANA', 131),
(13113, 'LA REINA', 131),
(13114, 'LAS CONDES', 131),
(13115, 'LO BARNECHEA', 131),
(13116, 'LO ESPEJO', 131),
(13117, 'LO PRADO', 131),
(13118, 'MACUL', 131),
(13119, 'MAIPÚ', 131),
(13120, 'ÑUÑOA', 131),
(13121, 'PEDRO AGUIRRE CERDA', 131),
(13122, 'PEÑALOLÉN', 131),
(13123, 'PROVIDENCIA', 131),
(13124, 'PUDAHUEL', 131),
(13125, 'QUILICURA', 131),
(13126, 'QUINTA NORMAL', 131),
(13127, 'RECOLETA', 131),
(13128, 'RENCA', 131),
(13129, 'SAN JOAQUÍN', 131),
(13130, 'SAN MIGUEL', 131),
(13131, 'SAN RAMÓN', 131),
(13132, 'VITACURA', 131),
(13201, 'PUENTE ALTO', 132),
(13202, 'PIRQUE', 132),
(13203, 'SAN JOSÉ DE MAIPO', 132),
(13301, 'COLINA', 133),
(13302, 'LAMPA', 133),
(13303, 'TIL TIL', 133),
(13401, 'SAN BERNARDO', 134),
(13402, 'BUIN', 134),
(13403, 'CALERA DE TANGO', 134),
(13404, 'PAINE', 134),
(13501, 'MELIPILLA', 135),
(13502, 'ALHUÉ', 135),
(13503, 'CURACAVÍ', 135),
(13504, 'MARÍA PINTO', 135),
(13505, 'SAN PEDRO', 135),
(13601, 'TALAGANTE', 136),
(13602, 'EL MONTE', 136),
(13603, 'ISLA DE MAIPO', 136),
(13604, 'PADRE HURTADO', 136),
(13605, 'PEÑAFLOR', 136),
(14101, 'VALDIVIA', 141),
(14102, 'CORRAL', 141),
(14103, 'LANCO', 141),
(14104, 'LOS LAGOS', 141),
(14105, 'MÁFIL', 141),
(14106, 'MARIQUINA', 141),
(14107, 'PAILLACO', 141),
(14108, 'PANGUIPULLI', 141),
(14201, 'LA UNIÓN', 142),
(14202, 'FUTRONO', 142),
(14203, 'LAGO RANCO', 142),
(14204, 'RÍO BUENO', 142),
(15101, 'ARICA', 151),
(15102, 'CAMARONES', 151),
(15201, 'PUTRE', 152),
(15202, 'GENERAL LAGOS', 152);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto`
--

CREATE TABLE IF NOT EXISTS `concepto` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `con_descripcion` varchar(100) DEFAULT NULL,
  `con_area` int(11) DEFAULT NULL,
  PRIMARY KEY (`con_id`),
  KEY `con_area` (`con_area`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authassignment`
--

CREATE TABLE IF NOT EXISTS `cruge_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text,
  `itemname` varchar(64) NOT NULL,
  PRIMARY KEY (`userid`,`itemname`),
  KEY `fk_cruge_authassignment_cruge_authitem1` (`itemname`),
  KEY `fk_cruge_authassignment_user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authitem`
--

CREATE TABLE IF NOT EXISTS `cruge_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_authitem`
--

INSERT INTO `cruge_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('action_aasignatura_admin', 0, '', NULL, 'N;'),
('action_aasignatura_anoactual', 0, '', NULL, 'N;'),
('action_aasignatura_buscar_asignatura', 0, '', NULL, 'N;'),
('action_aasignatura_buscar_prof', 0, '', NULL, 'N;'),
('action_aasignatura_create', 0, '', NULL, 'N;'),
('action_aasignatura_cursoanoactual', 0, '', NULL, 'N;'),
('action_aasignatura_delete', 0, '', NULL, 'N;'),
('action_aasignatura_index', 0, '', NULL, 'N;'),
('action_aasignatura_update', 0, '', NULL, 'N;'),
('action_aasignatura_view', 0, '', NULL, 'N;'),
('action_alumno_admin', 0, '', NULL, 'N;'),
('action_alumno_ciudades', 0, '', NULL, 'N;'),
('action_alumno_create', 0, '', NULL, 'N;'),
('action_alumno_delete', 0, '', NULL, 'N;'),
('action_alumno_index', 0, '', NULL, 'N;'),
('action_alumno_regiones', 0, '', NULL, 'N;'),
('action_alumno_update', 0, '', NULL, 'N;'),
('action_alumno_view', 0, '', NULL, 'N;'),
('action_area_admin', 0, '', NULL, 'N;'),
('action_area_buscar_area', 0, '', NULL, 'N;'),
('action_area_create', 0, '', NULL, 'N;'),
('action_area_delete', 0, '', NULL, 'N;'),
('action_area_index', 0, '', NULL, 'N;'),
('action_area_nuevo', 0, '', NULL, 'N;'),
('action_area_update', 0, '', NULL, 'N;'),
('action_area_view', 0, '', NULL, 'N;'),
('action_asignatura_admin', 0, '', NULL, 'N;'),
('action_asignatura_anoactual', 0, '', NULL, 'N;'),
('action_asignatura_create', 0, '', NULL, 'N;'),
('action_asignatura_delete', 0, '', NULL, 'N;'),
('action_asignatura_index', 0, '', NULL, 'N;'),
('action_asignatura_update', 0, '', NULL, 'N;'),
('action_asignatura_view', 0, '', NULL, 'N;'),
('action_ciudad_admin', 0, '', NULL, 'N;'),
('action_ciudad_create', 0, '', NULL, 'N;'),
('action_ciudad_delete', 0, '', NULL, 'N;'),
('action_ciudad_index', 0, '', NULL, 'N;'),
('action_ciudad_update', 0, '', NULL, 'N;'),
('action_ciudad_view', 0, '', NULL, 'N;'),
('action_comuna_admin', 0, '', NULL, 'N;'),
('action_comuna_create', 0, '', NULL, 'N;'),
('action_comuna_delete', 0, '', NULL, 'N;'),
('action_comuna_index', 0, '', NULL, 'N;'),
('action_comuna_update', 0, '', NULL, 'N;'),
('action_comuna_view', 0, '', NULL, 'N;'),
('action_concepto_admin', 0, '', NULL, 'N;'),
('action_concepto_buscar_concepto', 0, '', NULL, 'N;'),
('action_concepto_create', 0, '', NULL, 'N;'),
('action_concepto_delete', 0, '', NULL, 'N;'),
('action_concepto_index', 0, '', NULL, 'N;'),
('action_concepto_nuevo', 0, '', NULL, 'N;'),
('action_concepto_update', 0, '', NULL, 'N;'),
('action_concepto_view', 0, '', NULL, 'N;'),
('action_curso_admin', 0, '', NULL, 'N;'),
('action_curso_anoactual', 0, '', NULL, 'N;'),
('action_curso_bcxn', 0, '', NULL, 'N;'),
('action_curso_buscar_notas', 0, '', NULL, 'N;'),
('action_curso_buscar_prof', 0, '', NULL, 'N;'),
('action_curso_create', 0, '', NULL, 'N;'),
('action_curso_cursoanoactual', 0, '', NULL, 'N;'),
('action_curso_delete', 0, '', NULL, 'N;'),
('action_curso_index', 0, '', NULL, 'N;'),
('action_curso_poner_notas', 0, '', NULL, 'N;'),
('action_curso_recievevalue', 0, '', NULL, 'N;'),
('action_curso_reload_asi', 0, '', NULL, 'N;'),
('action_curso_update', 0, '', NULL, 'N;'),
('action_curso_view', 0, '', NULL, 'N;'),
('action_escala_admin', 0, '', NULL, 'N;'),
('action_escala_create', 0, '', NULL, 'N;'),
('action_escala_delete', 0, '', NULL, 'N;'),
('action_escala_index', 0, '', NULL, 'N;'),
('action_escala_update', 0, '', NULL, 'N;'),
('action_escala_view', 0, '', NULL, 'N;'),
('action_informedesarrollo_admin', 0, '', NULL, 'N;'),
('action_informedesarrollo_create', 0, '', NULL, 'N;'),
('action_informedesarrollo_delete', 0, '', NULL, 'N;'),
('action_informedesarrollo_index', 0, '', NULL, 'N;'),
('action_informedesarrollo_inf_d', 0, '', NULL, 'N;'),
('action_informedesarrollo_listaconcepto', 0, '', NULL, 'N;'),
('action_informedesarrollo_update', 0, '', NULL, 'N;'),
('action_informedesarrollo_view', 0, '', NULL, 'N;'),
('action_informedesarrollo_view_inf', 0, '', NULL, 'N;'),
('action_matricula_addcurso', 0, '', NULL, 'N;'),
('action_matricula_admin', 0, '', NULL, 'N;'),
('action_matricula_anoactual', 0, '', NULL, 'N;'),
('action_matricula_buscar_alum', 0, '', NULL, 'N;'),
('action_matricula_buscar_rut', 0, '', NULL, 'N;'),
('action_matricula_create', 0, '', NULL, 'N;'),
('action_matricula_cursoanoactual', 0, '', NULL, 'N;'),
('action_matricula_delete', 0, '', NULL, 'N;'),
('action_matricula_index', 0, '', NULL, 'N;'),
('action_matricula_retirar', 0, '', NULL, 'N;'),
('action_matricula_update', 0, '', NULL, 'N;'),
('action_matricula_view', 0, '', NULL, 'N;'),
('action_notas_admin', 0, '', NULL, 'N;'),
('action_notas_create', 0, '', NULL, 'N;'),
('action_notas_delete', 0, '', NULL, 'N;'),
('action_notas_index', 0, '', NULL, 'N;'),
('action_notas_subir_notas', 0, '', NULL, 'N;'),
('action_notas_update', 0, '', NULL, 'N;'),
('action_notas_view', 0, '', NULL, 'N;'),
('action_parametro_admin', 0, '', NULL, 'N;'),
('action_parametro_create', 0, '', NULL, 'N;'),
('action_parametro_delete', 0, '', NULL, 'N;'),
('action_parametro_index', 0, '', NULL, 'N;'),
('action_parametro_update', 0, '', NULL, 'N;'),
('action_parametro_view', 0, '', NULL, 'N;'),
('action_permiso_admin', 0, '', NULL, 'N;'),
('action_permiso_create', 0, '', NULL, 'N;'),
('action_permiso_delete', 0, '', NULL, 'N;'),
('action_permiso_index', 0, '', NULL, 'N;'),
('action_permiso_update', 0, '', NULL, 'N;'),
('action_permiso_view', 0, '', NULL, 'N;'),
('action_region_admin', 0, '', NULL, 'N;'),
('action_region_create', 0, '', NULL, 'N;'),
('action_region_delete', 0, '', NULL, 'N;'),
('action_region_index', 0, '', NULL, 'N;'),
('action_region_update', 0, '', NULL, 'N;'),
('action_region_view', 0, '', NULL, 'N;'),
('action_site_contact', 0, '', NULL, 'N;'),
('action_site_error', 0, '', NULL, 'N;'),
('action_site_index', 0, '', NULL, 'N;'),
('action_site_login', 0, '', NULL, 'N;'),
('action_site_logout', 0, '', NULL, 'N;'),
('action_temp_admin', 0, '', NULL, 'N;'),
('action_temp_create', 0, '', NULL, 'N;'),
('action_temp_delete', 0, '', NULL, 'N;'),
('action_temp_index', 0, '', NULL, 'N;'),
('action_temp_update', 0, '', NULL, 'N;'),
('action_temp_view', 0, '', NULL, 'N;'),
('action_ui_editprofile', 0, '', NULL, 'N;'),
('action_ui_fieldsadminlist', 0, '', NULL, 'N;'),
('action_ui_rbaclistops', 0, '', NULL, 'N;'),
('action_ui_rbaclistroles', 0, '', NULL, 'N;'),
('action_ui_rbacusersassignments', 0, '', NULL, 'N;'),
('action_ui_systemupdate', 0, '', NULL, 'N;'),
('action_ui_usermanagementadmin', 0, '', NULL, 'N;'),
('action_ui_usermanagementcreate', 0, '', NULL, 'N;'),
('action_usuario_admin', 0, '', NULL, 'N;'),
('action_usuario_create', 0, '', NULL, 'N;'),
('action_usuario_delete', 0, '', NULL, 'N;'),
('action_usuario_index', 0, '', NULL, 'N;'),
('action_usuario_update', 0, '', NULL, 'N;'),
('action_usuario_view', 0, '', NULL, 'N;'),
('admin', 0, '', NULL, 'N;'),
('controller_aasignatura', 0, '', NULL, 'N;'),
('controller_alumno', 0, '', NULL, 'N;'),
('controller_area', 0, '', NULL, 'N;'),
('controller_asignatura', 0, '', NULL, 'N;'),
('controller_ciudad', 0, '', NULL, 'N;'),
('controller_comuna', 0, '', NULL, 'N;'),
('controller_concepto', 0, '', NULL, 'N;'),
('controller_curso', 0, '', NULL, 'N;'),
('controller_escala', 0, '', NULL, 'N;'),
('controller_informedesarrollo', 0, '', NULL, 'N;'),
('controller_matricula', 0, '', NULL, 'N;'),
('controller_notas', 0, '', NULL, 'N;'),
('controller_parametro', 0, '', NULL, 'N;'),
('controller_permiso', 0, '', NULL, 'N;'),
('controller_region', 0, '', NULL, 'N;'),
('controller_site', 0, '', NULL, 'N;'),
('controller_temp', 0, '', NULL, 'N;'),
('controller_usuario', 0, '', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authitemchild`
--

CREATE TABLE IF NOT EXISTS `cruge_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_field`
--

CREATE TABLE IF NOT EXISTS `cruge_field` (
  `idfield` int(11) NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(20) NOT NULL,
  `longname` varchar(50) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `required` int(11) DEFAULT '0',
  `fieldtype` int(11) DEFAULT '0',
  `fieldsize` int(11) DEFAULT '20',
  `maxlength` int(11) DEFAULT '45',
  `showinreports` int(11) DEFAULT '0',
  `useregexp` varchar(512) DEFAULT NULL,
  `useregexpmsg` varchar(512) DEFAULT NULL,
  `predetvalue` mediumblob,
  PRIMARY KEY (`idfield`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_fieldvalue`
--

CREATE TABLE IF NOT EXISTS `cruge_fieldvalue` (
  `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob,
  PRIMARY KEY (`idfieldvalue`),
  KEY `fk_cruge_fieldvalue_cruge_user1` (`iduser`),
  KEY `fk_cruge_fieldvalue_cruge_field1` (`idfield`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_session`
--

CREATE TABLE IF NOT EXISTS `cruge_session` (
  `idsession` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `created` bigint(30) DEFAULT NULL,
  `expire` bigint(30) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `ipaddress` varchar(45) DEFAULT NULL,
  `usagecount` int(11) DEFAULT '0',
  `lastusage` bigint(30) DEFAULT NULL,
  `logoutdate` bigint(30) DEFAULT NULL,
  `ipaddressout` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsession`),
  KEY `crugesession_iduser` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Volcado de datos para la tabla `cruge_session`
--

INSERT INTO `cruge_session` (`idsession`, `iduser`, `created`, `expire`, `status`, `ipaddress`, `usagecount`, `lastusage`, `logoutdate`, `ipaddressout`) VALUES
(1, 1, 1424282680, 1424284480, 0, '127.0.0.1', 1, 1424282680, 1424282868, '127.0.0.1'),
(2, 1, 1424282883, 1424284683, 0, '127.0.0.1', 1, 1424282883, NULL, NULL),
(3, 1, 1424284890, 1424286690, 0, '127.0.0.1', 1, 1424284890, NULL, NULL),
(4, 1, 1424287243, 1424341243, 0, '::1', 2, 1424288720, NULL, NULL),
(5, 1, 1424353502, 1424407502, 0, '::1', 1, 1424353502, 1424384614, '::1'),
(6, 1, 1424384622, 1424438622, 0, '::1', 1, 1424384622, 1424384629, '::1'),
(7, 1, 1424384633, 1424438633, 0, '::1', 1, 1424384633, NULL, NULL),
(8, 1, 1424438643, 1424492643, 0, '::1', 1, 1424438643, 1424442550, '::1'),
(9, 1, 1424442600, 1424496600, 0, '::1', 1, 1424442600, 1424442659, '::1'),
(10, 12, 1424442672, 1424496672, 0, '::1', 2, 1424442673, 1424442722, '::1'),
(11, 12, 1424442728, 1424496728, 0, '::1', 1, 1424442728, 1424442845, '::1'),
(12, 1, 1424442847, 1424496847, 0, '::1', 1, 1424442847, NULL, NULL),
(13, 1, 1424535634, 1424589634, 0, '::1', 1, 1424535634, NULL, NULL),
(14, 1, 1424693540, 1424747540, 0, '::1', 2, 1424696373, 1424696420, '::1'),
(15, 1, 1424696429, 1424750429, 0, '192.168.10.21', 10, 1424714540, NULL, NULL),
(16, 1, 1424786982, 1424840982, 0, '192.168.10.20', 6, 1424787609, 1424787957, '192.168.10.20'),
(17, 1, 1424789288, 1424843288, 0, '192.168.10.13', 3, 1424802913, 1424803091, '192.168.10.13'),
(18, 1, 1424803229, 1424857229, 0, '192.168.10.45', 3, 1424803492, 1424803507, '192.168.10.45'),
(19, 1, 1424803741, 1424857741, 0, '192.168.10.49', 1, 1424803741, 1424803944, '192.168.10.49'),
(20, 1, 1424804264, 1424858264, 1, '192.168.10.50', 3, 1424805776, NULL, NULL),
(21, 1, 1424967798, 1425021798, 0, '::1', 1, 1424967798, NULL, NULL),
(22, 1, 1425300736, 1425354736, 0, '::1', 1, 1425300736, 1425300794, '::1'),
(23, 1, 1425300806, 1425354806, 0, '::1', 2, 1425321842, NULL, NULL),
(24, 1, 1425386437, 1425440437, 0, '::1', 1, 1425386437, NULL, NULL),
(25, 1, 1425470415, 1425524415, 0, '::1', 1, 1425470415, 1425480036, '::1'),
(26, 1, 1425480038, 1425534038, 0, '192.168.10.234', 3, 1425481034, NULL, NULL),
(27, 1, 1425556796, 1425610796, 0, '::1', 1, 1425556796, NULL, NULL),
(28, 1, 1425644250, 1425698250, 1, '::1', 6, 1425663381, NULL, NULL),
(29, 1, 1425902685, 1425956685, 0, '::1', 1, 1425902685, 1425929655, '::1'),
(30, 1, 1425929678, 1425983678, 0, '::1', 1, 1425929678, 1425929688, '::1'),
(31, 1, 1425929710, 1425983710, 0, '::1', 1, 1425929710, 1425929724, '::1'),
(32, 10, 1425929729, 1425983729, 0, '::1', 1, 1425929729, 1425930540, '::1'),
(33, 1, 1425930542, 1425984542, 0, '::1', 1, 1425930542, 1425930563, '::1'),
(34, 1, 1425930564, 1425984564, 0, '::1', 1, 1425930564, 1425930584, '::1'),
(35, 1, 1425930591, 1425984591, 0, '::1', 1, 1425930591, 1425930691, '::1'),
(36, 1, 1425930696, 1425984696, 1, '::1', 1, 1425930696, NULL, NULL),
(37, 1, 1426075600, 1426129600, 0, '::1', 1, 1426075600, 1426081884, '::1'),
(38, 11, 1426081888, 1426135888, 0, '::1', 1, 1426081888, 1426082511, '::1'),
(39, 1, 1426082513, 1426136513, 1, '::1', 1, 1426082513, NULL, NULL),
(40, 1, 1426165396, 1426219396, 0, '::1', 1, 1426165396, 1426173101, '::1'),
(41, 1, 1426173265, 1426227265, 1, '192.168.10.9', 4, 1426188606, NULL, NULL),
(42, 1, 1426251985, 1426305985, 1, '::1', 5, 1426294419, NULL, NULL),
(43, 1, 1426519584, 1426573584, 0, '::1', 3, 1426519597, 1426519747, '::1'),
(44, 1, 1426519809, 1426573809, 0, '::1', 1, 1426519809, 1426519816, '::1'),
(45, 1, 1426519832, 1426573832, 0, '::1', 1, 1426519832, 1426519836, '::1'),
(46, 1, 1426519865, 1426573865, 0, '::1', 1, 1426519865, 1426519870, '::1'),
(47, 1, 1426519900, 1426573900, 1, '::1', 1, 1426519900, NULL, NULL),
(48, 1, 1426686190, 1426740190, 0, '::1', 2, 1426690123, NULL, NULL),
(49, 1, 1426772375, 1426826375, 1, '::1', 1, 1426772375, NULL, NULL),
(50, 1, 1426880881, 1426934881, 1, '192.168.10.127', 4, 1426881987, NULL, NULL),
(51, 1, 1427115702, 1427169702, 1, '192.168.10.240', 3, 1427119578, NULL, NULL),
(52, 1, 1427205317, 1427259317, 1, '::1', 1, 1427205317, NULL, NULL),
(53, 1, 1427288550, 1427342550, 0, '192.168.10.234', 11, 1427309535, 1427309575, '::1'),
(54, 1, 1427309794, 1427363794, 0, '192.168.10.187', 3, 1427310161, 1427310166, '192.168.10.187'),
(55, 1, 1427310188, 1427364188, 0, '192.168.10.187', 2, 1427310195, 1427310199, '192.168.10.187'),
(56, 1, 1427310221, 1427364221, 0, '::1', 2, 1427310225, 1427310246, '::1'),
(57, 1, 1427310256, 1427364256, 0, '192.168.10.187', 2, 1427310258, 1427310273, '::1'),
(58, 1, 1427310284, 1427364284, 0, '192.168.10.187', 2, 1427310291, 1427310304, '::1'),
(59, 1, 1427310322, 1427364322, 0, '192.168.10.187', 2, 1427310324, 1427310333, '::1'),
(60, 1, 1427310341, 1427364341, 0, '192.168.10.187', 2, 1427310348, 1427310362, '::1'),
(61, 1, 1427310369, 1427364369, 0, '192.168.10.187', 2, 1427310397, 1427310403, '192.168.10.187'),
(62, 1, 1427310423, 1427364423, 0, '192.168.10.187', 2, 1427310439, 1427310446, '192.168.10.187'),
(63, 1, 1427310590, 1427364590, 1, '192.168.10.115', 3, 1427311860, NULL, NULL),
(64, 1, 1427375496, 1427429496, 1, '127.0.0.1', 8, 1427397322, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_system`
--

CREATE TABLE IF NOT EXISTS `cruge_system` (
  `idsystem` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `largename` varchar(45) DEFAULT NULL,
  `sessionmaxdurationmins` int(11) DEFAULT '30',
  `sessionmaxsameipconnections` int(11) DEFAULT '10',
  `sessionreusesessions` int(11) DEFAULT '1' COMMENT '1yes 0no',
  `sessionmaxsessionsperday` int(11) DEFAULT '-1',
  `sessionmaxsessionsperuser` int(11) DEFAULT '-1',
  `systemnonewsessions` int(11) DEFAULT '0' COMMENT '1yes 0no',
  `systemdown` int(11) DEFAULT '0',
  `registerusingcaptcha` int(11) DEFAULT '0',
  `registerusingterms` int(11) DEFAULT '0',
  `terms` blob,
  `registerusingactivation` int(11) DEFAULT '1',
  `defaultroleforregistration` varchar(64) DEFAULT NULL,
  `registerusingtermslabel` varchar(100) DEFAULT NULL,
  `registrationonlogin` int(11) DEFAULT '1',
  PRIMARY KEY (`idsystem`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cruge_system`
--

INSERT INTO `cruge_system` (`idsystem`, `name`, `largename`, `sessionmaxdurationmins`, `sessionmaxsameipconnections`, `sessionreusesessions`, `sessionmaxsessionsperday`, `sessionmaxsessionsperuser`, `systemnonewsessions`, `systemdown`, `registerusingcaptcha`, `registerusingterms`, `terms`, `registerusingactivation`, `defaultroleforregistration`, `registerusingtermslabel`, `registrationonlogin`) VALUES
(1, 'default', NULL, 900, 1, 1, -1, -1, 0, 0, 0, 0, '', 0, '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_user`
--

CREATE TABLE IF NOT EXISTS `cruge_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `regdate` bigint(30) DEFAULT NULL,
  `actdate` bigint(30) DEFAULT NULL,
  `logondate` bigint(30) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL COMMENT 'Hashed password',
  `authkey` varchar(100) DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` int(11) DEFAULT '0',
  `totalsessioncounter` int(11) DEFAULT '0',
  `currentsessioncounter` int(11) DEFAULT '0',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `cruge_user`
--

INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`) VALUES
(1, NULL, NULL, 1427397322, 'admin', 'admin@tucorreo.com', 'admin', NULL, 1, 0, 0),
(2, NULL, NULL, NULL, 'invitado', 'invitado', 'nopassword', NULL, 1, 0, 0),
(10, 1424282738, 1424282738, 1425929729, '17.415.992-0', 'BOB_PANTALONES@gmail.com', '17.415.992-0', NULL, 1, 0, 0),
(11, 1424282752, 1424282752, 1426081888, '11.483.695-8', 'PATRICIO_ESTRELLA@gmail.com', '11.483.695-8', NULL, 1, 0, 0),
(12, 1424442651, 1424442651, 1424442728, '18.361.129-1', 'papa_pipo@gmail.com', '123456', NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `cur_id` int(11) NOT NULL AUTO_INCREMENT,
  `cur_ano` int(11) DEFAULT NULL,
  `cur_notas_periodo` int(11) DEFAULT NULL,
  `cur_nivel` int(11) DEFAULT NULL,
  `cur_letra` int(11) DEFAULT NULL,
  `cur_jornada` int(11) DEFAULT NULL,
  `cur_pjefe` int(11) DEFAULT NULL,
  `cur_tperiodo` int(11) DEFAULT NULL,
  `cur_infd` int(11) DEFAULT NULL,
  PRIMARY KEY (`cur_id`),
  KEY `cur_nivel` (`cur_nivel`),
  KEY `cur_letra` (`cur_letra`),
  KEY `cur_jornada` (`cur_jornada`),
  KEY `cur_pjefe` (`cur_pjefe`),
  KEY `cur_tperiodo` (`cur_tperiodo`),
  KEY `cur_infd` (`cur_infd`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`cur_id`, `cur_ano`, `cur_notas_periodo`, `cur_nivel`, `cur_letra`, `cur_jornada`, `cur_pjefe`, `cur_tperiodo`, `cur_infd`) VALUES
(1, 2014, 10, 8, 20, 18, 10, 16, 1),
(2, 2015, 10, 8, 21, 18, 11, 16, 1),
(3, 2015, 12, 11, 23, 18, 11, 17, NULL),
(4, 2015, 5, 8, 32, 18, 12, 17, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escala`
--

CREATE TABLE IF NOT EXISTS `escala` (
  `esc_id` int(11) NOT NULL AUTO_INCREMENT,
  `esc_descripcion` varchar(50) DEFAULT NULL,
  `esc_concepto` int(11) DEFAULT NULL,
  PRIMARY KEY (`esc_id`),
  KEY `esc_concepto` (`esc_concepto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE IF NOT EXISTS `evaluacion` (
  `eva_id` int(11) NOT NULL AUTO_INCREMENT,
  `eva_infd` int(11) DEFAULT NULL,
  `eva_matricula` int(11) DEFAULT NULL,
  `eva_ano` int(11) DEFAULT NULL,
  PRIMARY KEY (`eva_id`),
  KEY `eva_infd` (`eva_infd`),
  KEY `eva_matricula` (`eva_matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`eva_id`, `eva_infd`, `eva_matricula`, `eva_ano`) VALUES
(1, 2, 90, 2015),
(2, 2, 91, 2015),
(3, 2, 91, 2015),
(4, 2, 91, 2015),
(5, 2, 91, 2015),
(6, 2, 91, 2015),
(7, 2, 91, 2015),
(8, 2, 91, 2015);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe_desarrollo`
--

CREATE TABLE IF NOT EXISTS `informe_desarrollo` (
  `id_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_descripcion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `informe_desarrollo`
--

INSERT INTO `informe_desarrollo` (`id_id`, `id_descripcion`) VALUES
(1, 'INFORME UNO'),
(2, 'INFORME DOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE IF NOT EXISTS `matricula` (
  `mat_id` int(11) NOT NULL AUTO_INCREMENT,
  `mat_ano` int(11) DEFAULT NULL,
  `mat_numero` varchar(11) DEFAULT NULL,
  `mat_fingreso` date DEFAULT NULL,
  `mat_fretiro` date DEFAULT NULL,
  `mat_fcambio` date DEFAULT NULL,
  `mat_asistencia_1` int(11) DEFAULT NULL,
  `mat_asistencia_2` int(11) DEFAULT NULL,
  `mat_asistencia_3` int(11) DEFAULT NULL,
  `mat_alu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mat_id`),
  KEY `mat_alu_id` (`mat_alu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`mat_id`, `mat_ano`, `mat_numero`, `mat_fingreso`, `mat_fretiro`, `mat_fcambio`, `mat_asistencia_1`, `mat_asistencia_2`, `mat_asistencia_3`, `mat_alu_id`) VALUES
(85, 2015, 'XcsnA0ZyYRC', '2015-03-09', NULL, NULL, NULL, NULL, NULL, 88),
(86, 2015, 'Xrj4NfSWQZB', '2015-03-09', NULL, NULL, NULL, NULL, NULL, 89),
(87, 2015, 'X92ETmdg9Um', '2015-03-12', NULL, NULL, NULL, NULL, NULL, 90),
(88, 2015, 'X3mxg2BmUJe', '2015-03-12', NULL, NULL, NULL, NULL, NULL, 91),
(89, 2015, 'XUkEfDZdb4a', '2015-03-12', NULL, NULL, NULL, NULL, NULL, 92),
(90, 2015, 'XtU5zqwfnUH', '2015-03-13', NULL, NULL, NULL, NULL, NULL, 93),
(91, 2015, 'Xi1cpgcga9s', '2015-03-19', NULL, NULL, NULL, NULL, NULL, 94),
(92, 2015, 'XATFSq4l2JZ', '2015-03-26', NULL, NULL, NULL, NULL, NULL, 95);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `not_id` int(11) NOT NULL AUTO_INCREMENT,
  `not_periodo` int(11) NOT NULL,
  `not_ano` int(4) NOT NULL,
  `not_mat` int(11) DEFAULT NULL,
  `not_asig` int(11) DEFAULT NULL,
  `not_01` float DEFAULT NULL,
  `not_02` float DEFAULT NULL,
  `not_03` float DEFAULT NULL,
  `not_04` float DEFAULT NULL,
  `not_05` float DEFAULT NULL,
  `not_06` float DEFAULT NULL,
  `not_07` float DEFAULT NULL,
  `not_08` float DEFAULT NULL,
  `not_09` float DEFAULT NULL,
  `not_10` float DEFAULT NULL,
  `not_11` float DEFAULT NULL,
  `not_12` float DEFAULT NULL,
  `not_13` float DEFAULT NULL,
  `not_14` float DEFAULT NULL,
  `not_15` float DEFAULT NULL,
  `not_16` float DEFAULT NULL,
  `not_17` float DEFAULT NULL,
  `not_18` float DEFAULT NULL,
  `not_19` float DEFAULT NULL,
  `not_20` float DEFAULT NULL,
  `not_21` float DEFAULT NULL,
  `not_22` float DEFAULT NULL,
  `not_23` float DEFAULT NULL,
  `not_24` float DEFAULT NULL,
  `not_25` float DEFAULT NULL,
  `not_26` float DEFAULT NULL,
  `not_27` float DEFAULT NULL,
  `not_28` float DEFAULT NULL,
  `not_29` float DEFAULT NULL,
  `not_30` float DEFAULT NULL,
  PRIMARY KEY (`not_id`),
  KEY `not_mat` (`not_mat`),
  KEY `not_asig` (`not_asig`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`not_id`, `not_periodo`, `not_ano`, `not_mat`, `not_asig`, `not_01`, `not_02`, `not_03`, `not_04`, `not_05`, `not_06`, `not_07`, `not_08`, `not_09`, `not_10`, `not_11`, `not_12`, `not_13`, `not_14`, `not_15`, `not_16`, `not_17`, `not_18`, `not_19`, `not_20`, `not_21`, `not_22`, `not_23`, `not_24`, `not_25`, `not_26`, `not_27`, `not_28`, `not_29`, `not_30`) VALUES
(90, 1, 2015, 85, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 1, 2015, 85, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(92, 1, 2015, 85, 3, 7, 7, 7, 7, 7, 7, 7, 7, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(93, 1, 2015, 85, 1, 2, 2, 2, 3.3, 2, 4, 5.5, 2.1, 1.2, 1.7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 2, 2015, 85, 4, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 2, 2015, 85, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 2, 2015, 85, 3, 2, 5, 2, 2, 2, 2, 2, 2, 2.5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(97, 2, 2015, 85, 1, 2, 1.5, 3, 4, 5.5, 7, 1, 1, 1.2, 3.3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(98, 1, 2015, 86, 6, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(99, 1, 2015, 86, 3, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(100, 2, 2015, 86, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 2, 2015, 86, 3, 2, 5, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(102, 3, 2015, 86, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 3, 2015, 86, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 1, 2015, 87, 6, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(105, 1, 2015, 87, 3, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(106, 2, 2015, 87, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 2, 2015, 87, 3, 2, 5, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(108, 3, 2015, 87, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 3, 2015, 87, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 1, 2015, 88, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 1, 2015, 88, 2, 5, 4, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(112, 1, 2015, 88, 3, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(113, 1, 2015, 88, 1, 2, 2, 2, 2, 2, 2, 4, 4, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(114, 2, 2015, 88, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 2, 2015, 88, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 2, 2015, 88, 3, 2, 2, 2, 5, 2, 5, 5, 5, 7, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(117, 2, 2015, 88, 1, 3, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(118, 1, 2014, 89, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 2, 2014, 89, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 1, 2015, 90, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 1, 2015, 90, 2, 5, 4, 7, 7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(122, 1, 2015, 90, 3, 2, 2, 2, 2, 2, 2, NULL, 2, NULL, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(123, 1, 2015, 90, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(124, 2, 2015, 90, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 2, 2015, 90, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 2, 2015, 90, 3, 5, 5, 5, 5, 5, 5, 2, 1, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(127, 2, 2015, 90, 1, 7, 7, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(128, 1, 2015, 91, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 1, 2015, 91, 2, 7, 7, 7, 7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(130, 1, 2015, 91, 3, 2, 2, 2, 2, 2, 2, 2, 2, NULL, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(131, 1, 2015, 91, 1, 2, 6, 2, 6, 6, 2, 6, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(132, 2, 2015, 91, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 2, 2015, 91, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 2, 2015, 91, 3, 2, 5, 2, 1, 2, 1, 2, 1, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(135, 2, 2015, 91, 1, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE IF NOT EXISTS `parametro` (
  `par_id` int(11) NOT NULL AUTO_INCREMENT,
  `par_item` varchar(50) DEFAULT NULL,
  `par_descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`par_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Volcado de datos para la tabla `parametro`
--

INSERT INTO `parametro` (`par_id`, `par_item`, `par_descripcion`) VALUES
(1, 'estado', 'activo'),
(6, 'estado', 'inactivo'),
(7, 'ano_activo', '2015'),
(8, 'nivel', 'PRIMERO'),
(9, 'nivel', 'SEGUNDO'),
(10, 'nivel', 'TERCERO'),
(11, 'nivel', 'CUARTO'),
(12, 'nivel', 'QUINTO'),
(13, 'nivel', 'SEXTO'),
(14, 'nivel', 'SEPTIMO'),
(15, 'nivel', 'OCTAVO'),
(16, 'tperiodo', 'SEMESTRE'),
(17, 'tperiodo', 'TRIMESTRE'),
(18, 'jornada', 'MAÑANA'),
(19, 'jornada', 'TARDE'),
(20, 'letra', 'A'),
(21, 'letra', 'B'),
(22, 'letra', 'C'),
(23, 'letra', 'D'),
(24, 'letra', 'E'),
(25, 'letra', 'F'),
(26, 'letra', 'G'),
(27, 'letra', 'H'),
(28, 'letra', 'I'),
(29, 'letra', 'J'),
(30, 'letra', 'K'),
(31, 'letra', 'L'),
(32, 'letra', 'M'),
(33, 'letra', 'N'),
(34, 'letra', 'O'),
(35, 'letra', 'P'),
(36, 'letra', 'Q'),
(37, 'letra', 'R'),
(38, 'letra', 'S'),
(39, 'letra', 'T'),
(40, 'letra', 'U'),
(41, 'letra', 'V'),
(42, 'letra', 'W'),
(43, 'letra', 'X'),
(44, 'letra', 'Y'),
(45, 'letra', 'Z'),
(47, 'SEXO', 'MASCULINO'),
(48, 'SEXO', 'FEMENINO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promedio_anual`
--

CREATE TABLE IF NOT EXISTS `promedio_anual` (
  `PRO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRO_PROM_1` int(11) DEFAULT NULL,
  `PRO_PROM_2` int(11) DEFAULT NULL,
  `PRO_PROM_3` int(11) DEFAULT NULL,
  `PRO_NOMBRE_ASIGNATURA` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`PRO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pro_mat`
--

CREATE TABLE IF NOT EXISTS `pro_mat` (
  `PRO_MAT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRO_MAT_ANUAL` int(11) DEFAULT NULL,
  `PRO_MATRI` int(11) DEFAULT NULL,
  PRIMARY KEY (`PRO_MAT_ID`),
  KEY `PRO_MAT_ANUAL` (`PRO_MAT_ANUAL`),
  KEY `PRO_MATRI` (`PRO_MATRI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`reg_id`, `reg_descripcion`) VALUES
(1, 'TARAPACA'),
(2, 'ANTOFAGASTA'),
(3, 'ATACAMA'),
(4, 'COQUIMBO'),
(5, 'VALPARAISO'),
(6, 'DEL LIBERTADOR GRAL. BERNARDO OHIGGINS'),
(7, 'DEL MAULE'),
(8, 'DEL BIOBIO'),
(9, 'DE LA ARAUCANIA'),
(10, 'DE LOS LAGOS'),
(11, 'AYSÉN DEL GRAL. CARLOS IBÁÑEZ DEL CAMPO'),
(12, 'MAGALLANES'),
(13, 'METROPOLITANA'),
(14, 'LOS RÍOS'),
(15, 'ARICA Y PARINACOTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `temp_id` int(11) NOT NULL AUTO_INCREMENT,
  `temp_ano` int(11) DEFAULT NULL,
  `temp_iduser` int(11) DEFAULT NULL,
  PRIMARY KEY (`temp_id`),
  KEY `temp_iduser` (`temp_iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `temp`
--

INSERT INTO `temp` (`temp_id`, `temp_ano`, `temp_iduser`) VALUES
(1, 0, 1),
(2, NULL, 10),
(3, NULL, 11),
(4, NULL, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_rut` varchar(12) DEFAULT NULL,
  `usu_nombre1` varchar(50) DEFAULT NULL,
  `usu_nombre2` varchar(50) DEFAULT NULL,
  `usu_apepat` varchar(50) DEFAULT NULL,
  `usu_apemat` varchar(50) DEFAULT NULL,
  `usu_estado` int(11) DEFAULT NULL,
  `usu_iduser` int(11) DEFAULT NULL,
  PRIMARY KEY (`usu_id`),
  KEY `usu_iduser` (`usu_iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_rut`, `usu_nombre1`, `usu_nombre2`, `usu_apepat`, `usu_apemat`, `usu_estado`, `usu_iduser`) VALUES
(1, '17.415.992-0', 'BOB', 'ESPONJA', 'PANTALONES', 'CUADRADOS', 1, 10),
(2, '11.483.695-8', 'PATRICIO', 'PATRICK', 'ESTRELLA', 'ESTRELLADO', 1, 11),
(3, '18.361.129-1', 'papa', 'pepe', 'pipo', 'pupu', 1, 12);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`alum_comuna`) REFERENCES `comuna` (`com_id`),
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`alum_ciudad`) REFERENCES `ciudad` (`ciu_id`),
  ADD CONSTRAINT `alumno_ibfk_3` FOREIGN KEY (`alum_region`) REFERENCES `region` (`reg_id`),
  ADD CONSTRAINT `alumno_ibfk_4` FOREIGN KEY (`alum_genero`) REFERENCES `parametro` (`par_id`);

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`are_infd`) REFERENCES `informe_desarrollo` (`id_id`);

--
-- Filtros para la tabla `a_asignatura`
--
ALTER TABLE `a_asignatura`
  ADD CONSTRAINT `a_asignatura_ibfk_1` FOREIGN KEY (`aa_docente`) REFERENCES `usuario` (`usu_id`),
  ADD CONSTRAINT `a_asignatura_ibfk_2` FOREIGN KEY (`aa_curso`) REFERENCES `curso` (`cur_id`),
  ADD CONSTRAINT `a_asignatura_ibfk_3` FOREIGN KEY (`aa_asignatura`) REFERENCES `asignatura` (`asi_id`);

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`ciu_reg`) REFERENCES `region` (`reg_id`);

--
-- Filtros para la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `comuna_ibfk_1` FOREIGN KEY (`com_ciu`) REFERENCES `ciudad` (`ciu_id`);

--
-- Filtros para la tabla `concepto`
--
ALTER TABLE `concepto`
  ADD CONSTRAINT `concepto_ibfk_1` FOREIGN KEY (`con_area`) REFERENCES `area` (`are_id`);

--
-- Filtros para la tabla `cruge_authassignment`
--
ALTER TABLE `cruge_authassignment`
  ADD CONSTRAINT `fk_cruge_authassignment_cruge_authitem1` FOREIGN KEY (`itemname`) REFERENCES `cruge_authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cruge_authassignment_user` FOREIGN KEY (`userid`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cruge_authitemchild`
--
ALTER TABLE `cruge_authitemchild`
  ADD CONSTRAINT `crugeauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crugeauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cruge_fieldvalue`
--
ALTER TABLE `cruge_fieldvalue`
  ADD CONSTRAINT `fk_cruge_fieldvalue_cruge_field1` FOREIGN KEY (`idfield`) REFERENCES `cruge_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cruge_fieldvalue_cruge_user1` FOREIGN KEY (`iduser`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`cur_nivel`) REFERENCES `parametro` (`par_id`),
  ADD CONSTRAINT `curso_ibfk_2` FOREIGN KEY (`cur_letra`) REFERENCES `parametro` (`par_id`),
  ADD CONSTRAINT `curso_ibfk_3` FOREIGN KEY (`cur_jornada`) REFERENCES `parametro` (`par_id`),
  ADD CONSTRAINT `curso_ibfk_4` FOREIGN KEY (`cur_pjefe`) REFERENCES `usuario` (`usu_iduser`),
  ADD CONSTRAINT `curso_ibfk_5` FOREIGN KEY (`cur_tperiodo`) REFERENCES `parametro` (`par_id`),
  ADD CONSTRAINT `curso_ibfk_6` FOREIGN KEY (`cur_infd`) REFERENCES `informe_desarrollo` (`id_id`);

--
-- Filtros para la tabla `escala`
--
ALTER TABLE `escala`
  ADD CONSTRAINT `escala_ibfk_1` FOREIGN KEY (`esc_concepto`) REFERENCES `concepto` (`con_id`);

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `evaluacion_ibfk_1` FOREIGN KEY (`eva_infd`) REFERENCES `informe_desarrollo` (`id_id`),
  ADD CONSTRAINT `evaluacion_ibfk_2` FOREIGN KEY (`eva_matricula`) REFERENCES `matricula` (`mat_id`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`mat_alu_id`) REFERENCES `alumno` (`alum_id`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`not_mat`) REFERENCES `matricula` (`mat_id`),
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`not_asig`) REFERENCES `asignatura` (`asi_id`);

--
-- Filtros para la tabla `pro_mat`
--
ALTER TABLE `pro_mat`
  ADD CONSTRAINT `pro_mat_ibfk_1` FOREIGN KEY (`PRO_MAT_ANUAL`) REFERENCES `promedio_anual` (`PRO_ID`),
  ADD CONSTRAINT `pro_mat_ibfk_2` FOREIGN KEY (`PRO_MATRI`) REFERENCES `matricula` (`mat_id`);

--
-- Filtros para la tabla `temp`
--
ALTER TABLE `temp`
  ADD CONSTRAINT `temp_ibfk_1` FOREIGN KEY (`temp_iduser`) REFERENCES `cruge_user` (`iduser`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`usu_iduser`) REFERENCES `cruge_user` (`iduser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
