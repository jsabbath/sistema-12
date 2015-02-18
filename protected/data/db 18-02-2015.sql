-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2015 a las 20:34:29
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

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
`alum_id` int(11) NOT NULL,
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
  `alum_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`alum_id`, `alum_rut`, `alum_nombres`, `alum_apepat`, `alum_apemat`, `alum_direccion`, `alum_comuna`, `alum_ciudad`, `alum_region`, `alum_genero`, `alum_f_nac`, `alum_salud`, `alum_obs`, `alum_estado`) VALUES
(1, '16.988.487-0', 'PANCRACIA', 'MOLINA', 'COCHINA', 'SU DIRECCION', 4203, 42, 4, 48, '1991-06-11', 'ENFERMITA', '', 1),
(5, '17.791.367-7', 'FREDY', 'TURBINA', 'QUEMO', 'EN TODAS PARTES', 13303, 133, 13, 47, '1993-11-11', 'ANDA SIN RUEDITAS EN SU BICICLETA', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
`are_id` int(11) NOT NULL,
  `are_descripcion` varchar(100) DEFAULT NULL,
  `are_infd` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE IF NOT EXISTS `asignatura` (
`asi_id` int(11) NOT NULL,
  `asi_codigo` varchar(20) DEFAULT NULL,
  `asi_descripcion` varchar(100) DEFAULT NULL,
  `asi_nombrecorto` varchar(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`asi_id`, `asi_codigo`, `asi_descripcion`, `asi_nombrecorto`) VALUES
(1, '52', 'MATEMATICA', 'MAT'),
(2, '32', 'INGLES', 'ING');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_asignatura`
--

CREATE TABLE IF NOT EXISTS `a_asignatura` (
`aa_id` int(11) NOT NULL,
  `aa_docente` int(11) DEFAULT NULL,
  `aa_curso` int(11) DEFAULT NULL,
  `aa_asignatura` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `a_asignatura`
--

INSERT INTO `a_asignatura` (`aa_id`, `aa_docente`, `aa_curso`, `aa_asignatura`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
`ciu_id` int(11) NOT NULL,
  `ciu_descripcion` varchar(100) DEFAULT NULL,
  `ciu_reg` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

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
`com_id` int(11) NOT NULL,
  `com_descripcion` varchar(100) DEFAULT NULL,
  `com_ciu` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15203 DEFAULT CHARSET=latin1;

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
`con_id` int(11) NOT NULL,
  `con_descripcion` varchar(100) DEFAULT NULL,
  `con_area` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authassignment`
--

CREATE TABLE IF NOT EXISTS `cruge_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text,
  `itemname` varchar(64) NOT NULL
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
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_authitem`
--

INSERT INTO `cruge_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('action_matricula_create', 0, '', NULL, 'N;'),
('action_ui_systemupdate', 0, '', NULL, 'N;'),
('action_ui_usermanagementadmin', 0, '', NULL, 'N;'),
('admin', 0, '', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authitemchild`
--

CREATE TABLE IF NOT EXISTS `cruge_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_field`
--

CREATE TABLE IF NOT EXISTS `cruge_field` (
`idfield` int(11) NOT NULL,
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
  `predetvalue` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_fieldvalue`
--

CREATE TABLE IF NOT EXISTS `cruge_fieldvalue` (
`idfieldvalue` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_session`
--

CREATE TABLE IF NOT EXISTS `cruge_session` (
`idsession` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `created` bigint(30) DEFAULT NULL,
  `expire` bigint(30) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `ipaddress` varchar(45) DEFAULT NULL,
  `usagecount` int(11) DEFAULT '0',
  `lastusage` bigint(30) DEFAULT NULL,
  `logoutdate` bigint(30) DEFAULT NULL,
  `ipaddressout` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_session`
--

INSERT INTO `cruge_session` (`idsession`, `iduser`, `created`, `expire`, `status`, `ipaddress`, `usagecount`, `lastusage`, `logoutdate`, `ipaddressout`) VALUES
(1, 1, 1424282680, 1424284480, 0, '127.0.0.1', 1, 1424282680, 1424282868, '127.0.0.1'),
(2, 1, 1424282883, 1424284683, 0, '127.0.0.1', 1, 1424282883, NULL, NULL),
(3, 1, 1424284890, 1424286690, 0, '127.0.0.1', 1, 1424284890, NULL, NULL),
(4, 1, 1424287243, 1424341243, 1, '127.0.0.1', 1, 1424287243, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_system`
--

CREATE TABLE IF NOT EXISTS `cruge_system` (
`idsystem` int(11) NOT NULL,
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
  `registrationonlogin` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_system`
--

INSERT INTO `cruge_system` (`idsystem`, `name`, `largename`, `sessionmaxdurationmins`, `sessionmaxsameipconnections`, `sessionreusesessions`, `sessionmaxsessionsperday`, `sessionmaxsessionsperuser`, `systemnonewsessions`, `systemdown`, `registerusingcaptcha`, `registerusingterms`, `terms`, `registerusingactivation`, `defaultroleforregistration`, `registerusingtermslabel`, `registrationonlogin`) VALUES
(1, 'default', NULL, 900, 10, 1, -1, -1, 0, 0, 0, 0, '', 0, '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_user`
--

CREATE TABLE IF NOT EXISTS `cruge_user` (
`iduser` int(11) NOT NULL,
  `regdate` bigint(30) DEFAULT NULL,
  `actdate` bigint(30) DEFAULT NULL,
  `logondate` bigint(30) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL COMMENT 'Hashed password',
  `authkey` varchar(100) DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` int(11) DEFAULT '0',
  `totalsessioncounter` int(11) DEFAULT '0',
  `currentsessioncounter` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_user`
--

INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`) VALUES
(1, NULL, NULL, 1424287243, 'admin', 'admin@tucorreo.com', 'admin', NULL, 1, 0, 0),
(2, NULL, NULL, NULL, 'invitado', 'invitado', 'nopassword', NULL, 1, 0, 0),
(10, 1424282738, 1424282738, NULL, '17.415.992-0', 'BOB_PANTALONES@gmail.com', '17.415.992-0', NULL, 1, 0, 0),
(11, 1424282752, 1424282752, NULL, '11.483.695-8', 'PATRICIO_ESTRELLA@gmail.com', '11.483.695-8', NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
`cur_id` int(11) NOT NULL,
  `cur_ano` int(11) DEFAULT NULL,
  `cur_notas_periodo` int(11) DEFAULT NULL,
  `cur_nivel` int(11) DEFAULT NULL,
  `cur_letra` int(11) DEFAULT NULL,
  `cur_jornada` int(11) DEFAULT NULL,
  `cur_pjefe` int(11) DEFAULT NULL,
  `cur_tperiodo` int(11) DEFAULT NULL,
  `cur_infd` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`cur_id`, `cur_ano`, `cur_notas_periodo`, `cur_nivel`, `cur_letra`, `cur_jornada`, `cur_pjefe`, `cur_tperiodo`, `cur_infd`) VALUES
(1, 2014, 20, 8, 20, 18, 10, 16, 1),
(2, 2015, 20, 8, 21, 18, 11, 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escala`
--

CREATE TABLE IF NOT EXISTS `escala` (
`esc_id` int(11) NOT NULL,
  `esc_descripcion` varchar(50) DEFAULT NULL,
  `esc_concepto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe_desarrollo`
--

CREATE TABLE IF NOT EXISTS `informe_desarrollo` (
`id_id` int(11) NOT NULL,
  `id_descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informe_desarrollo`
--

INSERT INTO `informe_desarrollo` (`id_id`, `id_descripcion`) VALUES
(1, 'INFORME UNO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE IF NOT EXISTS `matricula` (
`mat_id` int(11) NOT NULL,
  `mat_ano` int(11) DEFAULT NULL,
  `mat_numero` int(11) DEFAULT NULL,
  `mat_fingreso` date DEFAULT NULL,
  `mat_fretiro` date DEFAULT NULL,
  `mat_fcambio` date DEFAULT NULL,
  `mat_alu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`mat_id`, `mat_ano`, `mat_numero`, `mat_fingreso`, `mat_fretiro`, `mat_fcambio`, `mat_alu_id`) VALUES
(1, 2015, 5896523, '2015-02-18', NULL, NULL, 1),
(2, 2015, 2145652, '2015-02-18', NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
`not_id` int(11) NOT NULL,
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
  `not_30` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`not_id`, `not_mat`, `not_asig`, `not_01`, `not_02`, `not_03`, `not_04`, `not_05`, `not_06`, `not_07`, `not_08`, `not_09`, `not_10`, `not_11`, `not_12`, `not_13`, `not_14`, `not_15`, `not_16`, `not_17`, `not_18`, `not_19`, `not_20`, `not_21`, `not_22`, `not_23`, `not_24`, `not_25`, `not_26`, `not_27`, `not_28`, `not_29`, `not_30`) VALUES
(1, 1, 1, 5.8, 6.2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 1, 5.5, 6.8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE IF NOT EXISTS `parametro` (
`par_id` int(11) NOT NULL,
  `par_item` varchar(50) DEFAULT NULL,
  `par_descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE IF NOT EXISTS `region` (
`reg_id` int(11) NOT NULL,
  `reg_descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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
`temp_id` int(11) NOT NULL,
  `temp_ano` int(11) DEFAULT NULL,
  `temp_iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `temp`
--

INSERT INTO `temp` (`temp_id`, `temp_ano`, `temp_iduser`) VALUES
(1, 2015, 1),
(2, NULL, 10),
(3, NULL, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`usu_id` int(11) NOT NULL,
  `usu_rut` varchar(12) DEFAULT NULL,
  `usu_nombre1` varchar(50) DEFAULT NULL,
  `usu_nombre2` varchar(50) DEFAULT NULL,
  `usu_apepat` varchar(50) DEFAULT NULL,
  `usu_apemat` varchar(50) DEFAULT NULL,
  `usu_estado` int(11) DEFAULT NULL,
  `usu_iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_rut`, `usu_nombre1`, `usu_nombre2`, `usu_apepat`, `usu_apemat`, `usu_estado`, `usu_iduser`) VALUES
(1, '17.415.992-0', 'BOB', 'ESPONJA', 'PANTALONES', 'CUADRADOS', 1, 10),
(2, '11.483.695-8', 'PATRICIO', 'PATRICK', 'ESTRELLA', 'ESTRELLADO', 1, 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
 ADD PRIMARY KEY (`alum_id`), ADD KEY `alum_comuna` (`alum_comuna`), ADD KEY `alum_ciudad` (`alum_ciudad`), ADD KEY `alum_region` (`alum_region`), ADD KEY `alum_genero` (`alum_genero`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
 ADD PRIMARY KEY (`are_id`), ADD KEY `are_infd` (`are_infd`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
 ADD PRIMARY KEY (`asi_id`);

--
-- Indices de la tabla `a_asignatura`
--
ALTER TABLE `a_asignatura`
 ADD PRIMARY KEY (`aa_id`), ADD KEY `aa_docente` (`aa_docente`), ADD KEY `aa_curso` (`aa_curso`), ADD KEY `aa_asignatura` (`aa_asignatura`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
 ADD PRIMARY KEY (`ciu_id`), ADD KEY `ciu_reg` (`ciu_reg`);

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
 ADD PRIMARY KEY (`com_id`), ADD KEY `com_ciu` (`com_ciu`);

--
-- Indices de la tabla `concepto`
--
ALTER TABLE `concepto`
 ADD PRIMARY KEY (`con_id`), ADD KEY `con_area` (`con_area`);

--
-- Indices de la tabla `cruge_authassignment`
--
ALTER TABLE `cruge_authassignment`
 ADD PRIMARY KEY (`userid`,`itemname`), ADD KEY `fk_cruge_authassignment_cruge_authitem1` (`itemname`), ADD KEY `fk_cruge_authassignment_user` (`userid`);

--
-- Indices de la tabla `cruge_authitem`
--
ALTER TABLE `cruge_authitem`
 ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `cruge_authitemchild`
--
ALTER TABLE `cruge_authitemchild`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indices de la tabla `cruge_field`
--
ALTER TABLE `cruge_field`
 ADD PRIMARY KEY (`idfield`);

--
-- Indices de la tabla `cruge_fieldvalue`
--
ALTER TABLE `cruge_fieldvalue`
 ADD PRIMARY KEY (`idfieldvalue`), ADD KEY `fk_cruge_fieldvalue_cruge_user1` (`iduser`), ADD KEY `fk_cruge_fieldvalue_cruge_field1` (`idfield`);

--
-- Indices de la tabla `cruge_session`
--
ALTER TABLE `cruge_session`
 ADD PRIMARY KEY (`idsession`), ADD KEY `crugesession_iduser` (`iduser`);

--
-- Indices de la tabla `cruge_system`
--
ALTER TABLE `cruge_system`
 ADD PRIMARY KEY (`idsystem`);

--
-- Indices de la tabla `cruge_user`
--
ALTER TABLE `cruge_user`
 ADD PRIMARY KEY (`iduser`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
 ADD PRIMARY KEY (`cur_id`), ADD KEY `cur_nivel` (`cur_nivel`), ADD KEY `cur_letra` (`cur_letra`), ADD KEY `cur_jornada` (`cur_jornada`), ADD KEY `cur_pjefe` (`cur_pjefe`), ADD KEY `cur_tperiodo` (`cur_tperiodo`), ADD KEY `cur_infd` (`cur_infd`);

--
-- Indices de la tabla `escala`
--
ALTER TABLE `escala`
 ADD PRIMARY KEY (`esc_id`), ADD KEY `esc_concepto` (`esc_concepto`);

--
-- Indices de la tabla `informe_desarrollo`
--
ALTER TABLE `informe_desarrollo`
 ADD PRIMARY KEY (`id_id`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
 ADD PRIMARY KEY (`mat_id`), ADD KEY `mat_alu_id` (`mat_alu_id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
 ADD PRIMARY KEY (`not_id`), ADD KEY `not_mat` (`not_mat`), ADD KEY `not_asig` (`not_asig`);

--
-- Indices de la tabla `parametro`
--
ALTER TABLE `parametro`
 ADD PRIMARY KEY (`par_id`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
 ADD PRIMARY KEY (`reg_id`);

--
-- Indices de la tabla `temp`
--
ALTER TABLE `temp`
 ADD PRIMARY KEY (`temp_id`), ADD KEY `temp_iduser` (`temp_iduser`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`usu_id`), ADD KEY `usu_iduser` (`usu_iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
MODIFY `alum_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
MODIFY `are_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
MODIFY `asi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `a_asignatura`
--
ALTER TABLE `a_asignatura`
MODIFY `aa_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
MODIFY `ciu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15203;
--
-- AUTO_INCREMENT de la tabla `concepto`
--
ALTER TABLE `concepto`
MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cruge_field`
--
ALTER TABLE `cruge_field`
MODIFY `idfield` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cruge_fieldvalue`
--
ALTER TABLE `cruge_fieldvalue`
MODIFY `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cruge_session`
--
ALTER TABLE `cruge_session`
MODIFY `idsession` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cruge_system`
--
ALTER TABLE `cruge_system`
MODIFY `idsystem` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cruge_user`
--
ALTER TABLE `cruge_user`
MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
MODIFY `cur_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `escala`
--
ALTER TABLE `escala`
MODIFY `esc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `informe_desarrollo`
--
ALTER TABLE `informe_desarrollo`
MODIFY `id_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `parametro`
--
ALTER TABLE `parametro`
MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `temp`
--
ALTER TABLE `temp`
MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
