-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2015 a las 23:43:32
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

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
  `alum_obs` text
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`alum_id`, `alum_rut`, `alum_nombres`, `alum_apepat`, `alum_apemat`, `alum_direccion`, `alum_comuna`, `alum_ciudad`, `alum_region`, `alum_genero`, `alum_f_nac`, `alum_salud`, `alum_obs`) VALUES
(88, '16.321.305-2', 'JULIANS', 'ITURRA', 'VELOSO', '', NULL, NULL, NULL, NULL, '0000-00-00', '', ''),
(89, '12.348.720-6', 'CARLOS', 'CAMPOS', 'CARTES', '', NULL, NULL, NULL, NULL, '0000-00-00', '', ''),
(90, '16.349.790-5', 'FRANCISCO', 'BARRA', 'SEPULVEDA', '', NULL, NULL, NULL, NULL, '0000-00-00', '', ''),
(91, '15.126.189-2', 'LUIS', 'MALIKEO', 'ARANEDA', '', NULL, NULL, NULL, NULL, '0000-00-00', '', ''),
(92, '16.935.269-0', 'NICOLAS', 'OYARCE', 'VILDOSOLA', '', NULL, NULL, NULL, NULL, '0000-00-00', '', ''),
(93, '19.993.412-0', 'VICTOR', 'JARPA', 'JAPA', '', NULL, NULL, NULL, NULL, '0000-00-00', '', ''),
(94, '17.232.528-9', 'RENE', 'IÑIGO', 'SANCHEZ', '', NULL, NULL, NULL, NULL, '0000-00-00', '', ''),
(95, '19.013.335-4', 'YOJANS', 'CID', 'PENCA', '', NULL, NULL, NULL, NULL, '0000-00-00', '', ''),
(96, '16.598.442-0', 'ERNESTO', 'PEREZ', 'ESCOBAR', 'DEBAJO DE UN PUENTE', 8110, 81, 8, 47, '1991-09-09', 'MUY PRENDIO', 'ENTERO PIANTE'),
(97, '17.589.824-7', 'VICTOR', 'CEA', 'PAREDES', 'EN LOTA', 8106, 81, 8, 47, '1992-02-25', '', ''),
(98, '11.111.111-1', 'qwe', 'tyu', '', '', NULL, NULL, 1, NULL, '0000-00-00', '', ''),
(99, '23.406.562-9', 'qwe', 'tyu', '', '', NULL, NULL, NULL, NULL, '0000-00-00', '', ''),
(100, '12.382.518-7', 'qwejk', 'tyukjh', '', '', NULL, NULL, NULL, NULL, '0000-00-00', '', ''),
(101, '12.229.599-0', 'prueba', 'bjdb', '', '', NULL, NULL, NULL, NULL, '0000-00-00', '', ''),
(102, '8.481.516-0', 'juan', 'de dios', '', '', NULL, NULL, NULL, NULL, '0000-00-00', '', ''),
(103, '24.987.081-1', 'marciano', 'ovni', 'loco', '', NULL, NULL, NULL, NULL, '0000-00-00', '', ''),
(104, '12.432.160-3', 'batman', '', '', '', NULL, NULL, NULL, NULL, '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `are_id` int(11) NOT NULL,
  `are_descripcion` varchar(100) DEFAULT NULL,
  `are_infd` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`are_id`, `are_descripcion`, `are_infd`) VALUES
(1, 'AREA PSICOLOGICA', 1),
(2, 'AREA SOCIAL', 1),
(3, 'AREA PSICOLOGICA', 3),
(4, 'AREA SOCIAL', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_hogar`
--

CREATE TABLE IF NOT EXISTS `area_hogar` (
  `ah_id` int(11) NOT NULL,
  `ah_descripcion` varchar(512) DEFAULT NULL,
  `ah_inf_hogar` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area_hogar`
--

INSERT INTO `area_hogar` (`ah_id`, `ah_descripcion`, `ah_inf_hogar`) VALUES
(1, 'la uno', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE IF NOT EXISTS `asignatura` (
  `asi_id` int(11) NOT NULL,
  `asi_codigo` varchar(20) DEFAULT NULL,
  `asi_descripcion` varchar(100) DEFAULT NULL,
  `asi_nombrecorto` varchar(5) DEFAULT NULL,
  `asi_ano` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
  `aa_id` int(11) NOT NULL,
  `aa_docente` int(11) DEFAULT NULL,
  `aa_curso` int(11) DEFAULT NULL,
  `aa_asignatura` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

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
(102, 1, NULL, 1);

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
-- Estructura de tabla para la tabla `colegio`
--

CREATE TABLE IF NOT EXISTS `colegio` (
  `col_id` int(11) NOT NULL,
  `col_rolRBD` varchar(20) DEFAULT NULL,
  `col_nombre_colegio` varchar(50) DEFAULT NULL,
  `col_letra` varchar(1) DEFAULT NULL,
  `col_numero` int(11) DEFAULT NULL,
  `col_ano` int(11) DEFAULT NULL,
  `col_periodo` int(11) DEFAULT NULL,
  `col_nombre_director` varchar(255) DEFAULT NULL,
  `col_director_email` varchar(255) DEFAULT NULL,
  `col_encargado_actas` varchar(255) DEFAULT NULL,
  `col_fecha_resol_rec_ofic` int(11) DEFAULT NULL,
  `col_numero_resol_rec_ofic` int(11) DEFAULT NULL,
  `col_lema` text,
  `col_mision` text,
  `col_vision` text,
  `col_area` varchar(20) DEFAULT NULL,
  `col_regimen` varchar(20) DEFAULT NULL,
  `col_logo` varchar(1024) DEFAULT NULL,
  `col_razon_social` varchar(255) DEFAULT NULL,
  `col_rut_razon_social` varchar(20) DEFAULT NULL,
  `col_fecha_primer` date DEFAULT NULL,
  `col_fecha_segundo` date DEFAULT NULL,
  `col_fecha_tercer` date DEFAULT NULL,
  `col_direccion` varchar(255) DEFAULT NULL,
  `col_region` varchar(50) DEFAULT NULL,
  `col_ciudad` varchar(50) DEFAULT NULL,
  `col_colegio_email` varchar(255) DEFAULT NULL,
  `col_telefono` int(11) DEFAULT NULL,
  `col_nota_minima` int(11) DEFAULT NULL,
  `col_nota_maxima` int(11) DEFAULT NULL,
  `col_nota_aprovacion` int(11) DEFAULT NULL,
  `col_aproximacion` int(11) DEFAULT NULL,
  `ano_promocion_evaluacion` int(11) NOT NULL,
  `numero_promocion_evaluacion` int(1) NOT NULL,
  `numero_plan_programa` int(11) NOT NULL,
  `ano_plan_programa` int(4) NOT NULL,
  `numero_decreto_supremo` int(11) NOT NULL,
  `ano_decreto_supremo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `concepto`
--

INSERT INTO `concepto` (`con_id`, `con_descripcion`, `con_area`) VALUES
(1, 'VIVE EN SU IMAGINACION', 1),
(2, 'ES PSICOTICO', 1),
(3, 'SE ANDA DROGANDO', 2),
(4, 'PROVOCA GUERRA DE PANDILLAS', 2),
(5, 'EL LOCO ES RETARDADO', 3),
(6, 'PIENSA QUE VIENE DE MATRIX', 3),
(7, 'ES ANTISOCIAL', 4),
(8, 'SE QUEDA DROGANDOSE EN LA ESQUINA', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto_hogar`
--

CREATE TABLE IF NOT EXISTS `concepto_hogar` (
  `ch_id` int(11) NOT NULL,
  `ch_descripcion` varchar(1024) DEFAULT NULL,
  `ch_area_hogar` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `concepto_hogar`
--

INSERT INTO `concepto_hogar` (`ch_id`, `ch_descripcion`, `ch_area_hogar`) VALUES
(1, 'concepto uno', 1);

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

--
-- Volcado de datos para la tabla `cruge_authassignment`
--

INSERT INTO `cruge_authassignment` (`userid`, `bizrule`, `data`, `itemname`) VALUES
(12, NULL, 'N;', 'profesor'),
(13, NULL, 'N;', 'jefe_utp'),
(14, NULL, 'N;', 'director'),
(15, NULL, 'N;', 'evaluador'),
(16, NULL, 'N;', 'profesor'),
(17, NULL, 'N;', 'administrador'),
(18, NULL, 'N;', 'administrador'),
(20, NULL, 'N;', 'administrador'),
(28, NULL, 'N;', 'profesor'),
(29, NULL, 'N;', 'profesor'),
(30, NULL, 'N;', 'profesor'),
(31, NULL, 'N;', 'jefe_utp'),
(32, NULL, 'N;', 'profesor'),
(33, NULL, 'N;', 'profesor'),
(34, NULL, 'N;', 'profesor'),
(35, NULL, 'N;', 'profesor'),
(36, NULL, 'N;', 'profesor'),
(37, NULL, 'N;', 'profesor'),
(38, NULL, 'N;', 'profesor'),
(39, NULL, 'N;', 'profesor'),
(40, NULL, 'N;', 'profesor'),
(41, NULL, 'N;', 'profesor'),
(42, NULL, 'N;', 'profesor'),
(43, NULL, 'N;', 'director'),
(44, NULL, 'N;', 'evaluador');

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
('action_aasignatura_admin', 0, '', NULL, 'N;'),
('action_aasignatura_anoactual', 0, '', NULL, 'N;'),
('action_aasignatura_buscar_asignatura', 0, '', NULL, 'N;'),
('action_aasignatura_buscar_prof', 0, '', NULL, 'N;'),
('action_aasignatura_create', 0, '', NULL, 'N;'),
('action_aasignatura_cursoanoactual', 0, '', NULL, 'N;'),
('action_aasignatura_delete', 0, '', NULL, 'N;'),
('action_aasignatura_index', 0, '', NULL, 'N;'),
('action_aasignatura_lista_asignaturas', 0, '', NULL, 'N;'),
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
('action_areahogar_admin', 0, '', NULL, 'N;'),
('action_areahogar_buscar_area', 0, '', NULL, 'N;'),
('action_areahogar_create', 0, '', NULL, 'N;'),
('action_areahogar_delete', 0, '', NULL, 'N;'),
('action_areahogar_index', 0, '', NULL, 'N;'),
('action_areahogar_nuevo', 0, '', NULL, 'N;'),
('action_areahogar_update', 0, '', NULL, 'N;'),
('action_areahogar_view', 0, '', NULL, 'N;'),
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
('action_colegio_admin', 0, '', NULL, 'N;'),
('action_colegio_create', 0, '', NULL, 'N;'),
('action_colegio_delete', 0, '', NULL, 'N;'),
('action_colegio_index', 0, '', NULL, 'N;'),
('action_colegio_update', 0, '', NULL, 'N;'),
('action_colegio_view', 0, '', NULL, 'N;'),
('action_comuna_admin', 0, '', NULL, 'N;'),
('action_comuna_create', 0, '', NULL, 'N;'),
('action_comuna_delete', 0, '', NULL, 'N;'),
('action_comuna_index', 0, '', NULL, 'N;'),
('action_comuna_update', 0, '', NULL, 'N;'),
('action_comuna_view', 0, '', NULL, 'N;'),
('action_conceptohogar_admin', 0, '', NULL, 'N;'),
('action_conceptohogar_buscar_concepto', 0, '', NULL, 'N;'),
('action_conceptohogar_create', 0, '', NULL, 'N;'),
('action_conceptohogar_delete', 0, '', NULL, 'N;'),
('action_conceptohogar_index', 0, '', NULL, 'N;'),
('action_conceptohogar_nuevo', 0, '', NULL, 'N;'),
('action_conceptohogar_update', 0, '', NULL, 'N;'),
('action_conceptohogar_view', 0, '', NULL, 'N;'),
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
('action_curso_buscar_asistencia', 0, '', NULL, 'N;'),
('action_curso_buscar_notas', 0, '', NULL, 'N;'),
('action_curso_buscar_prof', 0, '', NULL, 'N;'),
('action_curso_create', 0, '', NULL, 'N;'),
('action_curso_cursoanoactual', 0, '', NULL, 'N;'),
('action_curso_delete', 0, '', NULL, 'N;'),
('action_curso_guardar_asistencia', 0, '', NULL, 'N;'),
('action_curso_index', 0, '', NULL, 'N;'),
('action_curso_listar_alumnos', 0, '', NULL, 'N;'),
('action_curso_lista_cursos', 0, '', NULL, 'N;'),
('action_curso_menu', 0, '', NULL, 'N;'),
('action_curso_poner_asistencia', 0, '', NULL, 'N;'),
('action_curso_poner_notas', 0, '', NULL, 'N;'),
('action_curso_recievevalue', 0, '', NULL, 'N;'),
('action_curso_reload_asi', 0, '', NULL, 'N;'),
('action_curso_update', 0, '', NULL, 'N;'),
('action_curso_validar_asistencia', 0, '', NULL, 'N;'),
('action_curso_view', 0, '', NULL, 'N;'),
('action_escala_admin', 0, '', NULL, 'N;'),
('action_escala_create', 0, '', NULL, 'N;'),
('action_escala_delete', 0, '', NULL, 'N;'),
('action_escala_index', 0, '', NULL, 'N;'),
('action_escala_update', 0, '', NULL, 'N;'),
('action_escala_view', 0, '', NULL, 'N;'),
('action_evaluacion_admin', 0, '', NULL, 'N;'),
('action_evaluacion_anoactual', 0, '', NULL, 'N;'),
('action_evaluacion_create', 0, '', NULL, 'N;'),
('action_evaluacion_cursoanoactual', 0, '', NULL, 'N;'),
('action_evaluacion_curso_lista', 0, '', NULL, 'N;'),
('action_evaluacion_delete', 0, '', NULL, 'N;'),
('action_evaluacion_evalua_manual', 0, '', NULL, 'N;'),
('action_evaluacion_index', 0, '', NULL, 'N;'),
('action_evaluacion_subir_eva', 0, '', NULL, 'N;'),
('action_evaluacion_update', 0, '', NULL, 'N;'),
('action_evaluacion_validar_edicion', 0, '', NULL, 'N;'),
('action_evaluacion_view', 0, '', NULL, 'N;'),
('action_informedesarrollo_admin', 0, '', NULL, 'N;'),
('action_informedesarrollo_create', 0, '', NULL, 'N;'),
('action_informedesarrollo_delete', 0, '', NULL, 'N;'),
('action_informedesarrollo_index', 0, '', NULL, 'N;'),
('action_informedesarrollo_inf_d', 0, '', NULL, 'N;'),
('action_informedesarrollo_listaconcepto', 0, '', NULL, 'N;'),
('action_informedesarrollo_menu', 0, '', NULL, 'N;'),
('action_informedesarrollo_update', 0, '', NULL, 'N;'),
('action_informedesarrollo_view', 0, '', NULL, 'N;'),
('action_informedesarrollo_view_inf', 0, '', NULL, 'N;'),
('action_informehogar_admin', 0, '', NULL, 'N;'),
('action_informehogar_create', 0, '', NULL, 'N;'),
('action_informehogar_delete', 0, '', NULL, 'N;'),
('action_informehogar_index', 0, '', NULL, 'N;'),
('action_informehogar_update', 0, '', NULL, 'N;'),
('action_informehogar_view', 0, '', NULL, 'N;'),
('action_listacurso_actualizar_lista', 0, '', NULL, 'N;'),
('action_listacurso_admin', 0, '', NULL, 'N;'),
('action_listacurso_anoactual', 0, '', NULL, 'N;'),
('action_listacurso_create', 0, '', NULL, 'N;'),
('action_listacurso_cursoanoactual', 0, '', NULL, 'N;'),
('action_listacurso_delete', 0, '', NULL, 'N;'),
('action_listacurso_index', 0, '', NULL, 'N;'),
('action_listacurso_lista_curso', 0, '', NULL, 'N;'),
('action_listacurso_subir_orden', 0, '', NULL, 'N;'),
('action_listacurso_update', 0, '', NULL, 'N;'),
('action_listacurso_validar_edicion', 0, '', NULL, 'N;'),
('action_listacurso_view', 0, '', NULL, 'N;'),
('action_matricula_addcurso', 0, '', NULL, 'N;'),
('action_matricula_admin', 0, '', NULL, 'N;'),
('action_matricula_anoactual', 0, '', NULL, 'N;'),
('action_matricula_buscar_alum', 0, '', NULL, 'N;'),
('action_matricula_buscar_rut', 0, '', NULL, 'N;'),
('action_matricula_certificado', 0, '', NULL, 'N;'),
('action_matricula_certificado_nota_par', 0, '', NULL, 'N;'),
('action_matricula_create', 0, '', NULL, 'N;'),
('action_matricula_cursoanoactual', 0, '', NULL, 'N;'),
('action_matricula_delete', 0, '', NULL, 'N;'),
('action_matricula_index', 0, '', NULL, 'N;'),
('action_matricula_infocurso', 0, '', NULL, 'N;'),
('action_matricula_informe', 0, '', NULL, 'N;'),
('action_matricula_listacompleta', 0, '', NULL, 'N;'),
('action_matricula_menu', 0, '', NULL, 'N;'),
('action_matricula_retirar', 0, '', NULL, 'N;'),
('action_matricula_update', 0, '', NULL, 'N;'),
('action_matricula_view', 0, '', NULL, 'N;'),
('action_notas_admin', 0, '', NULL, 'N;'),
('action_notas_create', 0, '', NULL, 'N;'),
('action_notas_delete', 0, '', NULL, 'N;'),
('action_notas_index', 0, '', NULL, 'N;'),
('action_notas_subir_notas', 0, '', NULL, 'N;'),
('action_notas_update', 0, '', NULL, 'N;'),
('action_notas_validar_edicion', 0, '', NULL, 'N;'),
('action_notas_view', 0, '', NULL, 'N;'),
('action_noticia_admin', 0, '', NULL, 'N;'),
('action_noticia_create', 0, '', NULL, 'N;'),
('action_noticia_delete', 0, '', NULL, 'N;'),
('action_noticia_index', 0, '', NULL, 'N;'),
('action_noticia_update', 0, '', NULL, 'N;'),
('action_noticia_view', 0, '', NULL, 'N;'),
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
('action_site_menu', 0, '', NULL, 'N;'),
('action_site_ver', 0, '', NULL, 'N;'),
('action_temp_admin', 0, '', NULL, 'N;'),
('action_temp_create', 0, '', NULL, 'N;'),
('action_temp_delete', 0, '', NULL, 'N;'),
('action_temp_index', 0, '', NULL, 'N;'),
('action_temp_update', 0, '', NULL, 'N;'),
('action_temp_view', 0, '', NULL, 'N;'),
('action_ui_editprofile', 0, '', NULL, 'N;'),
('action_ui_fieldsadminlist', 0, '', NULL, 'N;'),
('action_ui_rbacajaxsetchilditem', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemchilditems', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemcreate', 0, '', NULL, 'N;'),
('action_ui_rbaclistops', 0, '', NULL, 'N;'),
('action_ui_rbaclistroles', 0, '', NULL, 'N;'),
('action_ui_rbaclisttasks', 0, '', NULL, 'N;'),
('action_ui_rbacusersassignments', 0, '', NULL, 'N;'),
('action_ui_systemupdate', 0, '', NULL, 'N;'),
('action_ui_usermanagementadmin', 0, '', NULL, 'N;'),
('action_ui_usermanagementcreate', 0, '', NULL, 'N;'),
('action_ui_usermanagementupdate', 0, '', NULL, 'N;'),
('action_usuario_admin', 0, '', NULL, 'N;'),
('action_usuario_create', 0, '', NULL, 'N;'),
('action_usuario_delete', 0, '', NULL, 'N;'),
('action_usuario_index', 0, '', NULL, 'N;'),
('action_usuario_online', 0, '', NULL, 'N;'),
('action_usuario_update', 0, '', NULL, 'N;'),
('action_usuario_view', 0, '', NULL, 'N;'),
('admin', 0, '', NULL, 'N;'),
('administrador', 2, 'Rol de administrador', '', 'N;'),
('controller_aasignatura', 0, '', NULL, 'N;'),
('controller_alumno', 0, '', NULL, 'N;'),
('controller_area', 0, '', NULL, 'N;'),
('controller_areahogar', 0, '', NULL, 'N;'),
('controller_asignatura', 0, '', NULL, 'N;'),
('controller_ciudad', 0, '', NULL, 'N;'),
('controller_colegio', 0, '', NULL, 'N;'),
('controller_comuna', 0, '', NULL, 'N;'),
('controller_concepto', 0, '', NULL, 'N;'),
('controller_conceptohogar', 0, '', NULL, 'N;'),
('controller_curso', 0, '', NULL, 'N;'),
('controller_escala', 0, '', NULL, 'N;'),
('controller_evaluacion', 0, '', NULL, 'N;'),
('controller_informedesarrollo', 0, '', NULL, 'N;'),
('controller_informehogar', 0, '', NULL, 'N;'),
('controller_listacurso', 0, '', NULL, 'N;'),
('controller_matricula', 0, '', NULL, 'N;'),
('controller_notas', 0, '', NULL, 'N;'),
('controller_noticia', 0, '', NULL, 'N;'),
('controller_parametro', 0, '', NULL, 'N;'),
('controller_permiso', 0, '', NULL, 'N;'),
('controller_region', 0, '', NULL, 'N;'),
('controller_site', 0, '', NULL, 'N;'),
('controller_temp', 0, '', NULL, 'N;'),
('controller_usuario', 0, '', NULL, 'N;'),
('director', 2, '', NULL, 'N;'),
('edit-advanced-profile-features', 0, 'C:\\wamp\\www\\sistema\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 115', NULL, 'N;'),
('evaluador', 2, '', NULL, 'N;'),
('JEFEUTP', 0, '', NULL, 'N;'),
('jefe_utp', 2, '', NULL, 'N;'),
('profesor', 2, '', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authitemchild`
--

CREATE TABLE IF NOT EXISTS `cruge_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_authitemchild`
--

INSERT INTO `cruge_authitemchild` (`parent`, `child`) VALUES
('administrador', 'action_aasignatura_admin'),
('director', 'action_aasignatura_admin'),
('evaluador', 'action_aasignatura_admin'),
('administrador', 'action_aasignatura_anoactual'),
('director', 'action_aasignatura_anoactual'),
('evaluador', 'action_aasignatura_anoactual'),
('jefe_utp', 'action_aasignatura_anoactual'),
('administrador', 'action_aasignatura_buscar_asignatura'),
('director', 'action_aasignatura_buscar_asignatura'),
('evaluador', 'action_aasignatura_buscar_asignatura'),
('jefe_utp', 'action_aasignatura_buscar_asignatura'),
('administrador', 'action_aasignatura_buscar_prof'),
('director', 'action_aasignatura_buscar_prof'),
('evaluador', 'action_aasignatura_buscar_prof'),
('jefe_utp', 'action_aasignatura_buscar_prof'),
('administrador', 'action_aasignatura_create'),
('director', 'action_aasignatura_create'),
('evaluador', 'action_aasignatura_create'),
('administrador', 'action_aasignatura_cursoanoactual'),
('director', 'action_aasignatura_cursoanoactual'),
('evaluador', 'action_aasignatura_cursoanoactual'),
('jefe_utp', 'action_aasignatura_cursoanoactual'),
('administrador', 'action_aasignatura_delete'),
('director', 'action_aasignatura_delete'),
('administrador', 'action_aasignatura_index'),
('director', 'action_aasignatura_index'),
('evaluador', 'action_aasignatura_index'),
('jefe_utp', 'action_aasignatura_index'),
('administrador', 'action_aasignatura_lista_asignaturas'),
('administrador', 'action_aasignatura_update'),
('director', 'action_aasignatura_update'),
('evaluador', 'action_aasignatura_update'),
('administrador', 'action_aasignatura_view'),
('director', 'action_aasignatura_view'),
('evaluador', 'action_aasignatura_view'),
('jefe_utp', 'action_aasignatura_view'),
('administrador', 'action_alumno_admin'),
('director', 'action_alumno_admin'),
('profesor', 'action_alumno_admin'),
('administrador', 'action_alumno_ciudades'),
('director', 'action_alumno_ciudades'),
('evaluador', 'action_alumno_ciudades'),
('jefe_utp', 'action_alumno_ciudades'),
('profesor', 'action_alumno_ciudades'),
('administrador', 'action_alumno_create'),
('director', 'action_alumno_create'),
('profesor', 'action_alumno_create'),
('administrador', 'action_alumno_delete'),
('director', 'action_alumno_delete'),
('administrador', 'action_alumno_index'),
('director', 'action_alumno_index'),
('evaluador', 'action_alumno_index'),
('jefe_utp', 'action_alumno_index'),
('profesor', 'action_alumno_index'),
('administrador', 'action_alumno_regiones'),
('director', 'action_alumno_regiones'),
('evaluador', 'action_alumno_regiones'),
('jefe_utp', 'action_alumno_regiones'),
('profesor', 'action_alumno_regiones'),
('administrador', 'action_alumno_update'),
('director', 'action_alumno_update'),
('profesor', 'action_alumno_update'),
('administrador', 'action_alumno_view'),
('director', 'action_alumno_view'),
('evaluador', 'action_alumno_view'),
('jefe_utp', 'action_alumno_view'),
('profesor', 'action_alumno_view'),
('administrador', 'action_areahogar_admin'),
('administrador', 'action_areahogar_buscar_area'),
('administrador', 'action_areahogar_create'),
('administrador', 'action_areahogar_delete'),
('administrador', 'action_areahogar_index'),
('administrador', 'action_areahogar_nuevo'),
('administrador', 'action_areahogar_update'),
('administrador', 'action_areahogar_view'),
('administrador', 'action_area_admin'),
('director', 'action_area_admin'),
('administrador', 'action_area_buscar_area'),
('director', 'action_area_buscar_area'),
('evaluador', 'action_area_buscar_area'),
('jefe_utp', 'action_area_buscar_area'),
('administrador', 'action_area_create'),
('director', 'action_area_create'),
('administrador', 'action_area_delete'),
('director', 'action_area_delete'),
('administrador', 'action_area_index'),
('director', 'action_area_index'),
('evaluador', 'action_area_index'),
('jefe_utp', 'action_area_index'),
('administrador', 'action_area_nuevo'),
('director', 'action_area_nuevo'),
('administrador', 'action_area_update'),
('director', 'action_area_update'),
('administrador', 'action_area_view'),
('director', 'action_area_view'),
('evaluador', 'action_area_view'),
('jefe_utp', 'action_area_view'),
('administrador', 'action_asignatura_admin'),
('director', 'action_asignatura_admin'),
('evaluador', 'action_asignatura_admin'),
('administrador', 'action_asignatura_anoactual'),
('director', 'action_asignatura_anoactual'),
('evaluador', 'action_asignatura_anoactual'),
('jefe_utp', 'action_asignatura_anoactual'),
('administrador', 'action_asignatura_create'),
('director', 'action_asignatura_create'),
('evaluador', 'action_asignatura_create'),
('administrador', 'action_asignatura_delete'),
('director', 'action_asignatura_delete'),
('administrador', 'action_asignatura_index'),
('director', 'action_asignatura_index'),
('evaluador', 'action_asignatura_index'),
('jefe_utp', 'action_asignatura_index'),
('administrador', 'action_asignatura_update'),
('director', 'action_asignatura_update'),
('evaluador', 'action_asignatura_update'),
('administrador', 'action_asignatura_view'),
('director', 'action_asignatura_view'),
('evaluador', 'action_asignatura_view'),
('jefe_utp', 'action_asignatura_view'),
('administrador', 'action_ciudad_admin'),
('director', 'action_ciudad_admin'),
('profesor', 'action_ciudad_admin'),
('administrador', 'action_ciudad_create'),
('director', 'action_ciudad_create'),
('profesor', 'action_ciudad_create'),
('administrador', 'action_ciudad_delete'),
('director', 'action_ciudad_delete'),
('administrador', 'action_ciudad_index'),
('director', 'action_ciudad_index'),
('evaluador', 'action_ciudad_index'),
('jefe_utp', 'action_ciudad_index'),
('profesor', 'action_ciudad_index'),
('administrador', 'action_ciudad_update'),
('director', 'action_ciudad_update'),
('profesor', 'action_ciudad_update'),
('administrador', 'action_ciudad_view'),
('director', 'action_ciudad_view'),
('evaluador', 'action_ciudad_view'),
('jefe_utp', 'action_ciudad_view'),
('profesor', 'action_ciudad_view'),
('administrador', 'action_colegio_admin'),
('director', 'action_colegio_admin'),
('administrador', 'action_colegio_create'),
('director', 'action_colegio_create'),
('administrador', 'action_colegio_delete'),
('director', 'action_colegio_delete'),
('administrador', 'action_colegio_index'),
('director', 'action_colegio_index'),
('evaluador', 'action_colegio_index'),
('jefe_utp', 'action_colegio_index'),
('administrador', 'action_colegio_update'),
('director', 'action_colegio_update'),
('administrador', 'action_colegio_view'),
('director', 'action_colegio_view'),
('evaluador', 'action_colegio_view'),
('jefe_utp', 'action_colegio_view'),
('administrador', 'action_comuna_admin'),
('director', 'action_comuna_admin'),
('profesor', 'action_comuna_admin'),
('administrador', 'action_comuna_create'),
('director', 'action_comuna_create'),
('profesor', 'action_comuna_create'),
('administrador', 'action_comuna_delete'),
('director', 'action_comuna_delete'),
('administrador', 'action_comuna_index'),
('director', 'action_comuna_index'),
('evaluador', 'action_comuna_index'),
('jefe_utp', 'action_comuna_index'),
('profesor', 'action_comuna_index'),
('administrador', 'action_comuna_update'),
('director', 'action_comuna_update'),
('profesor', 'action_comuna_update'),
('administrador', 'action_comuna_view'),
('director', 'action_comuna_view'),
('evaluador', 'action_comuna_view'),
('jefe_utp', 'action_comuna_view'),
('profesor', 'action_comuna_view'),
('administrador', 'action_conceptohogar_admin'),
('administrador', 'action_conceptohogar_buscar_concepto'),
('administrador', 'action_conceptohogar_create'),
('administrador', 'action_conceptohogar_delete'),
('administrador', 'action_conceptohogar_index'),
('administrador', 'action_conceptohogar_nuevo'),
('administrador', 'action_conceptohogar_update'),
('administrador', 'action_conceptohogar_view'),
('administrador', 'action_concepto_admin'),
('director', 'action_concepto_admin'),
('administrador', 'action_concepto_buscar_concepto'),
('director', 'action_concepto_buscar_concepto'),
('evaluador', 'action_concepto_buscar_concepto'),
('jefe_utp', 'action_concepto_buscar_concepto'),
('administrador', 'action_concepto_create'),
('director', 'action_concepto_create'),
('administrador', 'action_concepto_delete'),
('director', 'action_concepto_delete'),
('administrador', 'action_concepto_index'),
('director', 'action_concepto_index'),
('evaluador', 'action_concepto_index'),
('jefe_utp', 'action_concepto_index'),
('administrador', 'action_concepto_nuevo'),
('director', 'action_concepto_nuevo'),
('administrador', 'action_concepto_update'),
('director', 'action_concepto_update'),
('administrador', 'action_concepto_view'),
('director', 'action_concepto_view'),
('evaluador', 'action_concepto_view'),
('jefe_utp', 'action_concepto_view'),
('administrador', 'action_curso_admin'),
('director', 'action_curso_admin'),
('evaluador', 'action_curso_admin'),
('jefe_utp', 'action_curso_admin'),
('administrador', 'action_curso_anoactual'),
('director', 'action_curso_anoactual'),
('evaluador', 'action_curso_anoactual'),
('jefe_utp', 'action_curso_anoactual'),
('profesor', 'action_curso_anoactual'),
('administrador', 'action_curso_bcxn'),
('director', 'action_curso_bcxn'),
('evaluador', 'action_curso_bcxn'),
('jefe_utp', 'action_curso_bcxn'),
('administrador', 'action_curso_buscar_asistencia'),
('director', 'action_curso_buscar_asistencia'),
('evaluador', 'action_curso_buscar_asistencia'),
('jefe_utp', 'action_curso_buscar_asistencia'),
('profesor', 'action_curso_buscar_asistencia'),
('administrador', 'action_curso_buscar_notas'),
('director', 'action_curso_buscar_notas'),
('evaluador', 'action_curso_buscar_notas'),
('jefe_utp', 'action_curso_buscar_notas'),
('profesor', 'action_curso_buscar_notas'),
('administrador', 'action_curso_buscar_prof'),
('director', 'action_curso_buscar_prof'),
('evaluador', 'action_curso_buscar_prof'),
('jefe_utp', 'action_curso_buscar_prof'),
('administrador', 'action_curso_create'),
('director', 'action_curso_create'),
('evaluador', 'action_curso_create'),
('administrador', 'action_curso_cursoanoactual'),
('director', 'action_curso_cursoanoactual'),
('evaluador', 'action_curso_cursoanoactual'),
('jefe_utp', 'action_curso_cursoanoactual'),
('profesor', 'action_curso_cursoanoactual'),
('administrador', 'action_curso_delete'),
('director', 'action_curso_delete'),
('evaluador', 'action_curso_delete'),
('administrador', 'action_curso_guardar_asistencia'),
('director', 'action_curso_guardar_asistencia'),
('evaluador', 'action_curso_guardar_asistencia'),
('profesor', 'action_curso_guardar_asistencia'),
('administrador', 'action_curso_index'),
('director', 'action_curso_index'),
('evaluador', 'action_curso_index'),
('jefe_utp', 'action_curso_index'),
('profesor', 'action_curso_index'),
('administrador', 'action_curso_listar_alumnos'),
('director', 'action_curso_listar_alumnos'),
('evaluador', 'action_curso_listar_alumnos'),
('jefe_utp', 'action_curso_listar_alumnos'),
('profesor', 'action_curso_listar_alumnos'),
('administrador', 'action_curso_lista_cursos'),
('director', 'action_curso_lista_cursos'),
('evaluador', 'action_curso_lista_cursos'),
('jefe_utp', 'action_curso_lista_cursos'),
('administrador', 'action_curso_menu'),
('director', 'action_curso_menu'),
('evaluador', 'action_curso_menu'),
('jefe_utp', 'action_curso_menu'),
('profesor', 'action_curso_menu'),
('administrador', 'action_curso_poner_asistencia'),
('director', 'action_curso_poner_asistencia'),
('evaluador', 'action_curso_poner_asistencia'),
('jefe_utp', 'action_curso_poner_asistencia'),
('profesor', 'action_curso_poner_asistencia'),
('administrador', 'action_curso_poner_notas'),
('director', 'action_curso_poner_notas'),
('evaluador', 'action_curso_poner_notas'),
('jefe_utp', 'action_curso_poner_notas'),
('profesor', 'action_curso_poner_notas'),
('administrador', 'action_curso_recievevalue'),
('director', 'action_curso_recievevalue'),
('evaluador', 'action_curso_recievevalue'),
('jefe_utp', 'action_curso_recievevalue'),
('administrador', 'action_curso_reload_asi'),
('director', 'action_curso_reload_asi'),
('evaluador', 'action_curso_reload_asi'),
('jefe_utp', 'action_curso_reload_asi'),
('profesor', 'action_curso_reload_asi'),
('administrador', 'action_curso_update'),
('director', 'action_curso_update'),
('evaluador', 'action_curso_update'),
('administrador', 'action_curso_validar_asistencia'),
('director', 'action_curso_validar_asistencia'),
('evaluador', 'action_curso_validar_asistencia'),
('profesor', 'action_curso_validar_asistencia'),
('administrador', 'action_curso_view'),
('director', 'action_curso_view'),
('evaluador', 'action_curso_view'),
('jefe_utp', 'action_curso_view'),
('profesor', 'action_curso_view'),
('administrador', 'action_escala_admin'),
('director', 'action_escala_admin'),
('administrador', 'action_escala_create'),
('director', 'action_escala_create'),
('administrador', 'action_escala_delete'),
('director', 'action_escala_delete'),
('administrador', 'action_escala_index'),
('director', 'action_escala_index'),
('administrador', 'action_escala_update'),
('director', 'action_escala_update'),
('administrador', 'action_escala_view'),
('director', 'action_escala_view'),
('administrador', 'action_evaluacion_admin'),
('director', 'action_evaluacion_admin'),
('administrador', 'action_evaluacion_anoactual'),
('director', 'action_evaluacion_anoactual'),
('evaluador', 'action_evaluacion_anoactual'),
('jefe_utp', 'action_evaluacion_anoactual'),
('profesor', 'action_evaluacion_anoactual'),
('administrador', 'action_evaluacion_create'),
('director', 'action_evaluacion_create'),
('profesor', 'action_evaluacion_create'),
('administrador', 'action_evaluacion_cursoanoactual'),
('director', 'action_evaluacion_cursoanoactual'),
('evaluador', 'action_evaluacion_cursoanoactual'),
('jefe_utp', 'action_evaluacion_cursoanoactual'),
('profesor', 'action_evaluacion_cursoanoactual'),
('administrador', 'action_evaluacion_curso_lista'),
('director', 'action_evaluacion_curso_lista'),
('evaluador', 'action_evaluacion_curso_lista'),
('jefe_utp', 'action_evaluacion_curso_lista'),
('profesor', 'action_evaluacion_curso_lista'),
('administrador', 'action_evaluacion_delete'),
('director', 'action_evaluacion_delete'),
('administrador', 'action_evaluacion_evalua_manual'),
('director', 'action_evaluacion_evalua_manual'),
('administrador', 'action_evaluacion_index'),
('director', 'action_evaluacion_index'),
('evaluador', 'action_evaluacion_index'),
('jefe_utp', 'action_evaluacion_index'),
('profesor', 'action_evaluacion_index'),
('administrador', 'action_evaluacion_subir_eva'),
('administrador', 'action_evaluacion_update'),
('director', 'action_evaluacion_update'),
('administrador', 'action_evaluacion_validar_edicion'),
('administrador', 'action_evaluacion_view'),
('director', 'action_evaluacion_view'),
('evaluador', 'action_evaluacion_view'),
('jefe_utp', 'action_evaluacion_view'),
('administrador', 'action_informedesarrollo_admin'),
('director', 'action_informedesarrollo_admin'),
('administrador', 'action_informedesarrollo_create'),
('director', 'action_informedesarrollo_create'),
('administrador', 'action_informedesarrollo_delete'),
('director', 'action_informedesarrollo_delete'),
('administrador', 'action_informedesarrollo_index'),
('director', 'action_informedesarrollo_index'),
('evaluador', 'action_informedesarrollo_index'),
('jefe_utp', 'action_informedesarrollo_index'),
('administrador', 'action_informedesarrollo_inf_d'),
('director', 'action_informedesarrollo_inf_d'),
('evaluador', 'action_informedesarrollo_inf_d'),
('jefe_utp', 'action_informedesarrollo_inf_d'),
('administrador', 'action_informedesarrollo_listaconcepto'),
('director', 'action_informedesarrollo_listaconcepto'),
('evaluador', 'action_informedesarrollo_listaconcepto'),
('jefe_utp', 'action_informedesarrollo_listaconcepto'),
('profesor', 'action_informedesarrollo_listaconcepto'),
('administrador', 'action_informedesarrollo_menu'),
('director', 'action_informedesarrollo_menu'),
('evaluador', 'action_informedesarrollo_menu'),
('jefe_utp', 'action_informedesarrollo_menu'),
('profesor', 'action_informedesarrollo_menu'),
('administrador', 'action_informedesarrollo_update'),
('director', 'action_informedesarrollo_update'),
('administrador', 'action_informedesarrollo_view'),
('director', 'action_informedesarrollo_view'),
('evaluador', 'action_informedesarrollo_view'),
('jefe_utp', 'action_informedesarrollo_view'),
('profesor', 'action_informedesarrollo_view'),
('administrador', 'action_informedesarrollo_view_inf'),
('director', 'action_informedesarrollo_view_inf'),
('evaluador', 'action_informedesarrollo_view_inf'),
('jefe_utp', 'action_informedesarrollo_view_inf'),
('profesor', 'action_informedesarrollo_view_inf'),
('administrador', 'action_informehogar_admin'),
('administrador', 'action_informehogar_create'),
('administrador', 'action_informehogar_delete'),
('administrador', 'action_informehogar_index'),
('administrador', 'action_informehogar_update'),
('administrador', 'action_informehogar_view'),
('administrador', 'action_listacurso_actualizar_lista'),
('director', 'action_listacurso_actualizar_lista'),
('administrador', 'action_listacurso_admin'),
('director', 'action_listacurso_admin'),
('administrador', 'action_listacurso_anoactual'),
('director', 'action_listacurso_anoactual'),
('evaluador', 'action_listacurso_anoactual'),
('jefe_utp', 'action_listacurso_anoactual'),
('profesor', 'action_listacurso_anoactual'),
('administrador', 'action_listacurso_create'),
('director', 'action_listacurso_create'),
('profesor', 'action_listacurso_create'),
('administrador', 'action_listacurso_cursoanoactual'),
('director', 'action_listacurso_cursoanoactual'),
('evaluador', 'action_listacurso_cursoanoactual'),
('jefe_utp', 'action_listacurso_cursoanoactual'),
('profesor', 'action_listacurso_cursoanoactual'),
('administrador', 'action_listacurso_delete'),
('director', 'action_listacurso_delete'),
('administrador', 'action_listacurso_index'),
('director', 'action_listacurso_index'),
('evaluador', 'action_listacurso_index'),
('jefe_utp', 'action_listacurso_index'),
('profesor', 'action_listacurso_index'),
('administrador', 'action_listacurso_lista_curso'),
('director', 'action_listacurso_lista_curso'),
('evaluador', 'action_listacurso_lista_curso'),
('jefe_utp', 'action_listacurso_lista_curso'),
('profesor', 'action_listacurso_lista_curso'),
('administrador', 'action_listacurso_subir_orden'),
('director', 'action_listacurso_subir_orden'),
('evaluador', 'action_listacurso_subir_orden'),
('jefe_utp', 'action_listacurso_subir_orden'),
('profesor', 'action_listacurso_subir_orden'),
('administrador', 'action_listacurso_update'),
('director', 'action_listacurso_update'),
('profesor', 'action_listacurso_update'),
('administrador', 'action_listacurso_validar_edicion'),
('director', 'action_listacurso_validar_edicion'),
('evaluador', 'action_listacurso_validar_edicion'),
('jefe_utp', 'action_listacurso_validar_edicion'),
('profesor', 'action_listacurso_validar_edicion'),
('administrador', 'action_listacurso_view'),
('director', 'action_listacurso_view'),
('evaluador', 'action_listacurso_view'),
('jefe_utp', 'action_listacurso_view'),
('administrador', 'action_matricula_addcurso'),
('director', 'action_matricula_addcurso'),
('profesor', 'action_matricula_addcurso'),
('administrador', 'action_matricula_admin'),
('director', 'action_matricula_admin'),
('profesor', 'action_matricula_admin'),
('administrador', 'action_matricula_anoactual'),
('director', 'action_matricula_anoactual'),
('evaluador', 'action_matricula_anoactual'),
('jefe_utp', 'action_matricula_anoactual'),
('profesor', 'action_matricula_anoactual'),
('administrador', 'action_matricula_buscar_alum'),
('director', 'action_matricula_buscar_alum'),
('evaluador', 'action_matricula_buscar_alum'),
('jefe_utp', 'action_matricula_buscar_alum'),
('profesor', 'action_matricula_buscar_alum'),
('administrador', 'action_matricula_buscar_rut'),
('director', 'action_matricula_buscar_rut'),
('evaluador', 'action_matricula_buscar_rut'),
('jefe_utp', 'action_matricula_buscar_rut'),
('profesor', 'action_matricula_buscar_rut'),
('administrador', 'action_matricula_certificado'),
('administrador', 'action_matricula_create'),
('director', 'action_matricula_create'),
('profesor', 'action_matricula_create'),
('administrador', 'action_matricula_cursoanoactual'),
('director', 'action_matricula_cursoanoactual'),
('evaluador', 'action_matricula_cursoanoactual'),
('jefe_utp', 'action_matricula_cursoanoactual'),
('profesor', 'action_matricula_cursoanoactual'),
('administrador', 'action_matricula_delete'),
('director', 'action_matricula_delete'),
('administrador', 'action_matricula_index'),
('director', 'action_matricula_index'),
('evaluador', 'action_matricula_index'),
('jefe_utp', 'action_matricula_index'),
('profesor', 'action_matricula_index'),
('administrador', 'action_matricula_infocurso'),
('director', 'action_matricula_infocurso'),
('evaluador', 'action_matricula_infocurso'),
('jefe_utp', 'action_matricula_infocurso'),
('profesor', 'action_matricula_infocurso'),
('administrador', 'action_matricula_informe'),
('administrador', 'action_matricula_listacompleta'),
('director', 'action_matricula_listacompleta'),
('evaluador', 'action_matricula_listacompleta'),
('jefe_utp', 'action_matricula_listacompleta'),
('profesor', 'action_matricula_listacompleta'),
('administrador', 'action_matricula_menu'),
('director', 'action_matricula_menu'),
('evaluador', 'action_matricula_menu'),
('jefe_utp', 'action_matricula_menu'),
('profesor', 'action_matricula_menu'),
('administrador', 'action_matricula_retirar'),
('director', 'action_matricula_retirar'),
('profesor', 'action_matricula_retirar'),
('administrador', 'action_matricula_update'),
('director', 'action_matricula_update'),
('profesor', 'action_matricula_update'),
('administrador', 'action_matricula_view'),
('director', 'action_matricula_view'),
('evaluador', 'action_matricula_view'),
('jefe_utp', 'action_matricula_view'),
('profesor', 'action_matricula_view'),
('administrador', 'action_notas_admin'),
('director', 'action_notas_admin'),
('jefe_utp', 'action_notas_admin'),
('administrador', 'action_notas_create'),
('director', 'action_notas_create'),
('jefe_utp', 'action_notas_create'),
('profesor', 'action_notas_create'),
('administrador', 'action_notas_delete'),
('director', 'action_notas_delete'),
('administrador', 'action_notas_index'),
('director', 'action_notas_index'),
('evaluador', 'action_notas_index'),
('jefe_utp', 'action_notas_index'),
('profesor', 'action_notas_index'),
('administrador', 'action_notas_subir_notas'),
('director', 'action_notas_subir_notas'),
('jefe_utp', 'action_notas_subir_notas'),
('profesor', 'action_notas_subir_notas'),
('administrador', 'action_notas_update'),
('director', 'action_notas_update'),
('jefe_utp', 'action_notas_update'),
('profesor', 'action_notas_update'),
('administrador', 'action_notas_validar_edicion'),
('director', 'action_notas_validar_edicion'),
('jefe_utp', 'action_notas_validar_edicion'),
('profesor', 'action_notas_validar_edicion'),
('administrador', 'action_notas_view'),
('director', 'action_notas_view'),
('evaluador', 'action_notas_view'),
('jefe_utp', 'action_notas_view'),
('profesor', 'action_notas_view'),
('administrador', 'action_noticia_admin'),
('administrador', 'action_noticia_create'),
('administrador', 'action_noticia_delete'),
('administrador', 'action_noticia_index'),
('evaluador', 'action_noticia_index'),
('jefe_utp', 'action_noticia_index'),
('profesor', 'action_noticia_index'),
('administrador', 'action_noticia_update'),
('administrador', 'action_noticia_view'),
('evaluador', 'action_noticia_view'),
('jefe_utp', 'action_noticia_view'),
('profesor', 'action_noticia_view'),
('administrador', 'action_parametro_admin'),
('director', 'action_parametro_admin'),
('administrador', 'action_parametro_create'),
('director', 'action_parametro_create'),
('administrador', 'action_parametro_delete'),
('director', 'action_parametro_delete'),
('administrador', 'action_parametro_index'),
('director', 'action_parametro_index'),
('evaluador', 'action_parametro_index'),
('jefe_utp', 'action_parametro_index'),
('administrador', 'action_parametro_update'),
('director', 'action_parametro_update'),
('administrador', 'action_parametro_view'),
('director', 'action_parametro_view'),
('evaluador', 'action_parametro_view'),
('jefe_utp', 'action_parametro_view'),
('administrador', 'action_permiso_admin'),
('director', 'action_permiso_admin'),
('administrador', 'action_permiso_create'),
('director', 'action_permiso_create'),
('administrador', 'action_permiso_delete'),
('director', 'action_permiso_delete'),
('administrador', 'action_permiso_index'),
('director', 'action_permiso_index'),
('evaluador', 'action_permiso_index'),
('jefe_utp', 'action_permiso_index'),
('administrador', 'action_permiso_update'),
('director', 'action_permiso_update'),
('administrador', 'action_permiso_view'),
('director', 'action_permiso_view'),
('evaluador', 'action_permiso_view'),
('jefe_utp', 'action_permiso_view'),
('administrador', 'action_region_admin'),
('director', 'action_region_admin'),
('administrador', 'action_region_create'),
('director', 'action_region_create'),
('administrador', 'action_region_delete'),
('director', 'action_region_delete'),
('administrador', 'action_region_index'),
('director', 'action_region_index'),
('evaluador', 'action_region_index'),
('jefe_utp', 'action_region_index'),
('administrador', 'action_region_update'),
('director', 'action_region_update'),
('administrador', 'action_region_view'),
('director', 'action_region_view'),
('evaluador', 'action_region_view'),
('jefe_utp', 'action_region_view'),
('administrador', 'action_site_contact'),
('director', 'action_site_contact'),
('evaluador', 'action_site_contact'),
('jefe_utp', 'action_site_contact'),
('profesor', 'action_site_contact'),
('administrador', 'action_site_error'),
('director', 'action_site_error'),
('evaluador', 'action_site_error'),
('jefe_utp', 'action_site_error'),
('profesor', 'action_site_error'),
('administrador', 'action_site_index'),
('director', 'action_site_index'),
('evaluador', 'action_site_index'),
('jefe_utp', 'action_site_index'),
('profesor', 'action_site_index'),
('administrador', 'action_site_login'),
('director', 'action_site_login'),
('evaluador', 'action_site_login'),
('jefe_utp', 'action_site_login'),
('profesor', 'action_site_login'),
('administrador', 'action_site_logout'),
('director', 'action_site_logout'),
('evaluador', 'action_site_logout'),
('jefe_utp', 'action_site_logout'),
('profesor', 'action_site_logout'),
('administrador', 'action_site_menu'),
('director', 'action_site_menu'),
('evaluador', 'action_site_menu'),
('jefe_utp', 'action_site_menu'),
('profesor', 'action_site_menu'),
('administrador', 'action_site_ver'),
('director', 'action_site_ver'),
('evaluador', 'action_site_ver'),
('jefe_utp', 'action_site_ver'),
('profesor', 'action_site_ver'),
('administrador', 'action_temp_admin'),
('director', 'action_temp_admin'),
('administrador', 'action_temp_create'),
('director', 'action_temp_create'),
('administrador', 'action_temp_delete'),
('director', 'action_temp_delete'),
('administrador', 'action_temp_index'),
('director', 'action_temp_index'),
('jefe_utp', 'action_temp_index'),
('administrador', 'action_temp_update'),
('director', 'action_temp_update'),
('administrador', 'action_temp_view'),
('director', 'action_temp_view'),
('jefe_utp', 'action_temp_view'),
('administrador', 'action_ui_editprofile'),
('administrador', 'action_ui_fieldsadminlist'),
('administrador', 'action_ui_rbacajaxsetchilditem'),
('administrador', 'action_ui_rbacauthitemchilditems'),
('administrador', 'action_ui_rbacauthitemcreate'),
('administrador', 'action_ui_rbaclistops'),
('administrador', 'action_ui_rbaclistroles'),
('administrador', 'action_ui_rbaclisttasks'),
('administrador', 'action_ui_rbacusersassignments'),
('administrador', 'action_ui_systemupdate'),
('administrador', 'action_ui_usermanagementadmin'),
('administrador', 'action_ui_usermanagementcreate'),
('administrador', 'action_ui_usermanagementupdate'),
('administrador', 'action_usuario_admin'),
('administrador', 'action_usuario_create'),
('administrador', 'action_usuario_delete'),
('administrador', 'action_usuario_index'),
('administrador', 'action_usuario_online'),
('administrador', 'action_usuario_update'),
('administrador', 'action_usuario_view'),
('administrador', 'admin'),
('director', 'admin'),
('administrador', 'controller_aasignatura'),
('director', 'controller_aasignatura'),
('evaluador', 'controller_aasignatura'),
('jefe_utp', 'controller_aasignatura'),
('profesor', 'controller_aasignatura'),
('administrador', 'controller_alumno'),
('director', 'controller_alumno'),
('evaluador', 'controller_alumno'),
('jefe_utp', 'controller_alumno'),
('profesor', 'controller_alumno'),
('administrador', 'controller_area'),
('director', 'controller_area'),
('evaluador', 'controller_area'),
('jefe_utp', 'controller_area'),
('profesor', 'controller_area'),
('administrador', 'controller_asignatura'),
('director', 'controller_asignatura'),
('evaluador', 'controller_asignatura'),
('jefe_utp', 'controller_asignatura'),
('profesor', 'controller_asignatura'),
('administrador', 'controller_ciudad'),
('director', 'controller_ciudad'),
('evaluador', 'controller_ciudad'),
('jefe_utp', 'controller_ciudad'),
('profesor', 'controller_ciudad'),
('administrador', 'controller_colegio'),
('director', 'controller_colegio'),
('evaluador', 'controller_colegio'),
('jefe_utp', 'controller_colegio'),
('administrador', 'controller_comuna'),
('director', 'controller_comuna'),
('evaluador', 'controller_comuna'),
('jefe_utp', 'controller_comuna'),
('profesor', 'controller_comuna'),
('administrador', 'controller_concepto'),
('director', 'controller_concepto'),
('evaluador', 'controller_concepto'),
('jefe_utp', 'controller_concepto'),
('profesor', 'controller_concepto'),
('administrador', 'controller_curso'),
('director', 'controller_curso'),
('evaluador', 'controller_curso'),
('jefe_utp', 'controller_curso'),
('profesor', 'controller_curso'),
('administrador', 'controller_escala'),
('director', 'controller_escala'),
('administrador', 'controller_evaluacion'),
('director', 'controller_evaluacion'),
('evaluador', 'controller_evaluacion'),
('jefe_utp', 'controller_evaluacion'),
('profesor', 'controller_evaluacion'),
('administrador', 'controller_informedesarrollo'),
('director', 'controller_informedesarrollo'),
('evaluador', 'controller_informedesarrollo'),
('jefe_utp', 'controller_informedesarrollo'),
('profesor', 'controller_informedesarrollo'),
('administrador', 'controller_listacurso'),
('director', 'controller_listacurso'),
('evaluador', 'controller_listacurso'),
('jefe_utp', 'controller_listacurso'),
('profesor', 'controller_listacurso'),
('administrador', 'controller_matricula'),
('director', 'controller_matricula'),
('evaluador', 'controller_matricula'),
('jefe_utp', 'controller_matricula'),
('profesor', 'controller_matricula'),
('administrador', 'controller_notas'),
('director', 'controller_notas'),
('evaluador', 'controller_notas'),
('jefe_utp', 'controller_notas'),
('profesor', 'controller_notas'),
('administrador', 'controller_noticia'),
('director', 'controller_noticia'),
('evaluador', 'controller_noticia'),
('jefe_utp', 'controller_noticia'),
('administrador', 'controller_parametro'),
('director', 'controller_parametro'),
('evaluador', 'controller_parametro'),
('jefe_utp', 'controller_parametro'),
('profesor', 'controller_parametro'),
('administrador', 'controller_permiso'),
('director', 'controller_permiso'),
('evaluador', 'controller_permiso'),
('jefe_utp', 'controller_permiso'),
('administrador', 'controller_region'),
('director', 'controller_region'),
('evaluador', 'controller_region'),
('jefe_utp', 'controller_region'),
('profesor', 'controller_region'),
('administrador', 'controller_site'),
('director', 'controller_site'),
('evaluador', 'controller_site'),
('jefe_utp', 'controller_site'),
('profesor', 'controller_site'),
('administrador', 'controller_temp'),
('director', 'controller_temp'),
('evaluador', 'controller_temp'),
('jefe_utp', 'controller_temp'),
('profesor', 'controller_temp'),
('administrador', 'controller_usuario'),
('director', 'controller_usuario'),
('evaluador', 'controller_usuario'),
('jefe_utp', 'controller_usuario'),
('administrador', 'edit-advanced-profile-features'),
('director', 'edit-advanced-profile-features'),
('administrador', 'JEFEUTP');

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
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=latin1;

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
(64, 1, 1427375496, 1427429496, 1, '127.0.0.1', 8, 1427397322, NULL, NULL),
(65, 1, 1427808527, 1427862527, 1, '127.0.0.1', 1, 1427808527, NULL, NULL),
(66, 1, 1427893540, 1427947540, 0, '127.0.0.1', 1, 1427893540, NULL, NULL),
(67, 1, 1427981224, 1428035224, 1, '::1', 2, 1427986628, NULL, NULL),
(68, 12, 1427994496, 1428048496, 1, '::1', 1, 1427994496, NULL, NULL),
(69, 1, 1428249608, 1428303608, 1, '::1', 2, 1428278235, NULL, NULL),
(70, 1, 1428425028, 1428479028, 0, '::1', 1, 1428425028, NULL, NULL),
(71, 1, 1428512663, 1428566663, 1, '::1', 1, 1428512663, NULL, NULL),
(72, 1, 1428633628, 1428687628, 1, '::1', 1, 1428633628, NULL, NULL),
(73, 1, 1428869572, 1428923572, 1, '::1', 1, 1428869572, NULL, NULL),
(74, 1, 1428985495, 1429039495, 1, '::1', 1, 1428985495, NULL, NULL),
(75, 11, 1428985760, 1429039760, 1, '::1', 1, 1428985760, NULL, NULL),
(76, 1, 1429131522, 1429185522, 1, '::1', 1, 1429131522, NULL, NULL),
(77, 1, 1429235603, 1429289603, 1, '::1', 2, 1429237186, NULL, NULL),
(78, 1, 1429335560, 1429389560, 1, '::1', 3, 1429381254, NULL, NULL),
(79, 1, 1429401262, 1429455262, 1, '::1', 2, 1429423275, NULL, NULL),
(80, 1, 1429484364, 1429538364, 0, '::1', 1, 1429484364, 1429484383, '::1'),
(81, 1, 1429484387, 1429538387, 1, '::1', 1, 1429484387, NULL, NULL),
(82, 1, 1429660717, 1429714717, 1, '::1', 1, 1429660717, NULL, NULL),
(83, 1, 1429740866, 1429794866, 1, '::1', 1, 1429740866, NULL, NULL),
(84, 1, 1429808633, 1429862633, 1, '::1', 3, 1429830694, NULL, NULL),
(85, 1, 1429990617, 1430044617, 1, '::1', 3, 1430021813, NULL, NULL),
(86, 1, 1430068338, 1430122338, 1, '::1', 1, 1430068338, NULL, NULL),
(87, 1, 1430142905, 1430196905, 0, '::1', 3, 1430171008, 1430176291, '::1'),
(88, 1, 1430176466, 1430230466, 0, '::1', 1, 1430176466, 1430176480, '::1'),
(89, 1, 1430176504, 1430230504, 0, '::1', 1, 1430176504, 1430176512, '::1'),
(90, 1, 1430176515, 1430230515, 0, '::1', 1, 1430176515, 1430176521, '::1'),
(91, 1, 1430176528, 1430230528, 0, '::1', 1, 1430176528, 1430176531, '::1'),
(92, 1, 1430176607, 1430230607, 0, '::1', 1, 1430176607, 1430176610, '::1'),
(93, 1, 1430176624, 1430230624, 0, '::1', 1, 1430176624, 1430176648, '::1'),
(94, 1, 1430176899, 1430230899, 0, '::1', 1, 1430176899, 1430181351, '::1'),
(95, 1, 1430181356, 1430235356, 0, '::1', 1, 1430181356, 1430188302, '::1'),
(96, 1, 1430189304, 1430243304, 0, '::1', 1, 1430189304, 1430189307, '::1'),
(97, 1, 1430189408, 1430243408, 0, '::1', 1, 1430189408, 1430189441, '::1'),
(98, 1, 1430189482, 1430243482, 0, '::1', 1, 1430189482, 1430189488, '::1'),
(99, 1, 1430189619, 1430243619, 0, '::1', 1, 1430189619, 1430189628, '::1'),
(100, 1, 1430189688, 1430243688, 0, '::1', 1, 1430189688, 1430189691, '::1'),
(101, 1, 1430189827, 1430243827, 0, '::1', 1, 1430189827, 1430189831, '::1'),
(102, 1, 1430189844, 1430243844, 0, '::1', 2, 1430234300, 1430234331, '::1'),
(103, 1, 1430257107, 1430311107, 0, '::1', 3, 1430270596, 1430271491, '::1'),
(104, 1, 1430271493, 1430325493, 0, '::1', 1, 1430271493, 1430272146, '::1'),
(105, 1, 1430272148, 1430326148, 0, '::1', 1, 1430272148, 1430274211, '::1'),
(106, 12, 1430274221, 1430328221, 0, '::1', 1, 1430274221, 1430274488, '::1'),
(107, 1, 1430274490, 1430328490, 0, '::1', 1, 1430274490, 1430274584, '::1'),
(108, 1, 1430274600, 1430328600, 0, '::1', 1, 1430274600, 1430274602, '::1'),
(109, 1, 1430274604, 1430328604, 0, '::1', 1, 1430274604, 1430274609, '::1'),
(110, 1, 1430274611, 1430328611, 1, '::1', 1, 1430274611, NULL, NULL),
(111, 1, 1430344189, 1430398189, 1, '192.168.0.14', 3, 1430361439, NULL, NULL),
(112, 1, 1430399353, 1430453353, 0, '127.0.0.1', 1, 1430399353, 1430399422, '127.0.0.1'),
(113, 1, 1430399616, 1430453616, 0, '127.0.0.1', 1, 1430399616, 1430402190, '127.0.0.1'),
(114, 14, 1430402206, 1430456206, 0, '127.0.0.1', 1, 1430402206, 1430402269, '127.0.0.1'),
(115, 14, 1430402275, 1430456275, 0, '127.0.0.1', 1, 1430402275, 1430402289, '127.0.0.1'),
(116, 1, 1430402305, 1430456305, 0, '127.0.0.1', 1, 1430402305, 1430402394, '127.0.0.1'),
(117, 14, 1430402401, 1430456401, 0, '127.0.0.1', 1, 1430402401, 1430402439, '127.0.0.1'),
(118, 10, 1430402451, 1430456451, 0, '127.0.0.1', 1, 1430402451, 1430402491, '127.0.0.1'),
(119, 10, 1430402565, 1430456565, 0, '127.0.0.1', 1, 1430402565, 1430402681, '127.0.0.1'),
(120, 14, 1430402696, 1430456696, 0, '127.0.0.1', 1, 1430402696, 1430402723, '127.0.0.1'),
(121, 1, 1430402727, 1430456727, 0, '127.0.0.1', 1, 1430402727, 1430404125, '127.0.0.1'),
(122, 16, 1430404142, 1430458142, 0, '127.0.0.1', 1, 1430404142, 1430404244, '127.0.0.1'),
(123, 1, 1430404249, 1430458249, 0, '127.0.0.1', 1, 1430404249, 1430404357, '127.0.0.1'),
(124, 12, 1430404390, 1430458390, 0, '127.0.0.1', 1, 1430404390, 1430404425, '127.0.0.1'),
(125, 1, 1430404430, 1430458430, 0, '127.0.0.1', 1, 1430404430, 1430404549, '127.0.0.1'),
(126, 12, 1430404558, 1430458558, 0, '127.0.0.1', 1, 1430404558, 1430405119, '127.0.0.1'),
(127, 1, 1430405123, 1430459123, 0, '127.0.0.1', 1, 1430405123, 1430405180, '127.0.0.1'),
(128, 12, 1430405187, 1430459187, 0, '127.0.0.1', 1, 1430405187, 1430405226, '127.0.0.1'),
(129, 1, 1430405233, 1430459233, 0, '127.0.0.1', 1, 1430405233, 1430405928, '127.0.0.1'),
(130, 13, 1430405941, 1430459941, 0, '127.0.0.1', 1, 1430405941, 1430406010, '127.0.0.1'),
(131, 1, 1430406014, 1430460014, 0, '127.0.0.1', 1, 1430406014, 1430406054, '127.0.0.1'),
(132, 13, 1430406060, 1430460060, 0, '127.0.0.1', 1, 1430406060, 1430406073, '127.0.0.1'),
(133, 1, 1430406078, 1430460078, 0, '127.0.0.1', 1, 1430406078, 1430406172, '127.0.0.1'),
(134, 13, 1430406176, 1430460176, 0, '127.0.0.1', 1, 1430406176, 1430406355, '127.0.0.1'),
(135, 1, 1430406359, 1430460359, 0, '127.0.0.1', 1, 1430406359, 1430407622, '127.0.0.1'),
(136, 1, 1430407626, 1430461626, 0, '127.0.0.1', 1, 1430407626, 1430407672, '127.0.0.1'),
(137, 1, 1430411559, 1430465559, 0, '::1', 1, 1430411559, 1430412126, '::1'),
(138, 1, 1430412501, 1430466501, 1, '::1', 2, 1430413666, NULL, NULL),
(139, 1, 1430526919, 1430580919, 0, '::1', 1, 1430526919, 1430527987, '::1'),
(140, 16, 1430528015, 1430582015, 0, '::1', 1, 1430528015, 1430529614, '::1'),
(141, 1, 1430529683, 1430583683, 0, '::1', 2, 1430529731, 1430529813, '::1'),
(142, 16, 1430529843, 1430583843, 0, '::1', 1, 1430529843, 1430529848, '::1'),
(143, 1, 1430534734, 1430588734, 1, '::1', 1, 1430534734, NULL, NULL),
(144, 1, 1430611494, 1430665494, 0, '::1', 1, 1430611494, 1430611589, '::1'),
(145, 1, 1430756989, 1430810989, 0, '::1', 1, 1430756989, 1430757246, '::1'),
(146, 16, 1430757320, 1430811320, 0, '::1', 1, 1430757320, 1430759533, '::1'),
(147, 16, 1430759542, 1430813542, 0, '::1', 1, 1430759542, 1430760598, '::1'),
(148, 14, 1430760601, 1430814601, 0, '::1', 1, 1430760601, 1430760625, '::1'),
(149, 16, 1430760633, 1430814633, 0, '::1', 1, 1430760633, 1430760636, '::1'),
(150, 14, 1430760676, 1430814676, 0, '::1', 1, 1430760676, 1430760753, '::1'),
(151, 1, 1430760757, 1430814757, 0, '::1', 1, 1430760757, 1430760767, '::1'),
(152, 14, 1430760784, 1430814784, 0, '::1', 1, 1430760784, 1430760796, '::1'),
(153, 16, 1430760799, 1430814799, 0, '::1', 1, 1430760799, 1430760801, '::1'),
(154, 14, 1430760811, 1430814811, 0, '::1', 1, 1430760811, 1430761153, '::1'),
(155, 16, 1430761230, 1430815230, 0, '::1', 1, 1430761230, 1430761307, '::1'),
(156, 15, 1430761317, 1430815317, 0, '::1', 1, 1430761317, 1430761389, '::1'),
(157, 1, 1430761393, 1430815393, 0, '::1', 1, 1430761393, 1430761410, '::1'),
(158, 1, 1430761444, 1430815444, 0, '::1', 1, 1430761444, 1430761447, '::1'),
(159, 1, 1430761614, 1430815614, 0, '::1', 1, 1430761614, 1430761619, '::1'),
(160, 14, 1430761627, 1430815627, 0, '::1', 1, 1430761627, 1430761643, '::1'),
(161, 16, 1430761679, 1430815679, 0, '::1', 1, 1430761679, 1430761755, '::1'),
(162, 15, 1430761764, 1430815764, 0, '::1', 1, 1430761764, 1430761898, '::1'),
(163, 13, 1430761907, 1430815907, 0, '::1', 1, 1430761907, 1430761937, '::1'),
(164, 16, 1430761968, 1430815968, 0, '::1', 1, 1430761968, 1430761971, '::1'),
(165, 16, 1430761984, 1430815984, 0, '::1', 1, 1430761984, 1430762449, '::1'),
(166, 15, 1430762456, 1430816456, 0, '::1', 1, 1430762456, 1430762855, '::1'),
(167, 1, 1430762780, 1430816780, 0, '::1', 1, 1430762780, 1430763274, '::1'),
(168, 13, 1430762865, 1430816865, 0, '::1', 1, 1430762865, 1430763068, '::1'),
(169, 13, 1430763073, 1430817073, 0, '::1', 1, 1430763073, 1430763159, '::1'),
(170, 13, 1430763163, 1430817163, 0, '::1', 1, 1430763163, 1430763262, '::1'),
(171, 1, 1430763280, 1430817280, 1, '::1', 2, 1430773363, NULL, NULL),
(172, 12, 1430773416, 1430827416, 1, '::1', 1, 1430773416, NULL, NULL),
(173, 1, 1431965637, 1432019637, 0, '::1', 1, 1431965637, 1431966136, '::1'),
(174, 17, 1431966152, 1432020152, 0, '::1', 1, 1431966152, 1431967310, '::1'),
(175, 20, 1431967318, 1432021318, 0, '::1', 1, 1431967318, 1431967337, '::1'),
(176, 1, 1431967847, 1432021847, 0, '::1', 1, 1431967847, 1431967851, '::1'),
(177, 17, 1431967877, 1432021877, 1, '::1', 2, 1431972892, NULL, NULL),
(178, 1, 1431972723, 1432026723, 0, '::1', 1, 1431972723, 1431972862, '::1'),
(179, 1, 1431976077, 1432030077, 0, '::1', 1, 1431976077, 1431982810, '::1'),
(180, 15, 1431982846, 1432036846, 0, '::1', 1, 1431982846, 1431982935, '::1'),
(181, 15, 1431983066, 1432037066, 0, '::1', 1, 1431983066, 1431983073, '::1'),
(182, 1, 1431983095, 1432037095, 0, '::1', 1, 1431983095, 1431985165, '::1'),
(183, 32, 1431985169, 1432039169, 0, '::1', 1, 1431985169, 1431985180, '::1'),
(184, 32, 1431985190, 1432039190, 0, '::1', 1, 1431985190, 1431985213, '::1'),
(185, 1, 1431985288, 1432039288, 0, '::1', 1, 1431985288, 1431985397, '::1');

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
(1, 'default', NULL, 900, 1, 1, -1, -1, 0, 0, 0, 0, '', 0, '', '', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_user`
--

INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`) VALUES
(1, NULL, NULL, 1431985288, 'admin', 'admin@tucorreo.com', 'admin', NULL, 1, 0, 0),
(2, NULL, NULL, NULL, 'invitado', 'invitado', 'nopassword', NULL, 1, 0, 0),
(10, 1424282738, 1424282738, 1430402565, '17.415.992-0', 'BOB_PANTALONES@gmail.com', '17.415.992-0', NULL, 1, 0, 0),
(11, 1424282752, 1424282752, 1428985760, '11.483.695-8', 'PATRICIO_ESTRELLA@gmail.com', '11.483.695-8', NULL, 1, 0, 0),
(12, 1424442651, 1424442651, 1430773416, '13.947.962-9', 'papa_pipo@gmail.com', '123456', NULL, 1, 0, 0),
(13, 1430400276, 1430400276, 1430763163, '19.988.593-6', 'JEFEUTP_JEFEUTP@gmail.com', '19.988.593-6', NULL, 1, 0, 0),
(14, 1430400347, 1430400347, 1430761627, '15.151.678-5', 'DIRECTOR_DIRECTOR@gmail.com', '15.151.678-5', NULL, 1, 0, 0),
(15, 1430400446, 1430400446, 1431983066, '19.107.327-4', 'EVALUADOR_EVALUADOR@gmail.com', '19.107.327-4', NULL, 1, 0, 0),
(16, 1430400480, 1430400480, 1430761984, '16.969.252-1', 'PROFESOR_PROFESOR@gmail.com', '16.969.252-1', NULL, 1, 0, 0),
(17, 1431965717, 1431965717, 1431972892, '16.762.422-7', 'JULIANS_ITURRA@gmail.com', '16.762.422-7', NULL, 1, 0, 0),
(18, 1431966616, 1431966616, NULL, '16.255.890-0', 'JOAN_PULGAR@gmail.com', '16.255.890-0', NULL, 1, 0, 0),
(19, 1431967023, 1431967023, NULL, '12.781.949-1', 'HECTOR_POBLETE@gmail.com', '12.781.949-1', NULL, 1, 0, 0),
(20, 1431967293, 1431967293, 1431967318, '18.361.129-1', 'CARLOS_CAMPOS@gmail.com', '18.361.129-1', NULL, 1, 0, 0),
(21, 1431983137, 1431983137, NULL, '15.854.390-7', 'RODRIGO_ARRIAGADA@gmail.com', '15.854.390-7', NULL, 1, 0, 0),
(22, 1431983174, 1431983174, NULL, '16.138.890-4', 'HELLEN_ARRIAGADA@gmail.com', '16.138.890-4', NULL, 1, 0, 0),
(23, 1431983217, 1431983217, NULL, '17.076.330-0', 'MARISOL_AVELLO@gmail.com', '17.076.330-0', NULL, 1, 0, 0),
(24, 1431983339, 1431983339, NULL, '13.307.700-6', 'MARCELA_BRAVO@gmail.com', '13.307.700-6', NULL, 1, 0, 0),
(25, 1431983413, 1431983413, NULL, '15.529.806-5', 'MARLENE_BRAVO@gmail.com', '15.529.806-5', NULL, 1, 0, 0),
(26, 1431983449, 1431983449, NULL, '16.972.863-1', 'ANYELINA_CISTERNA@gmail.com', '16.972.863-1', NULL, 1, 0, 0),
(27, 1431983538, 1431983538, NULL, '11.494.474-2', 'ANGELA_FERNANDEZ@gmail.com', '11.494.474-2', NULL, 1, 0, 0),
(28, 1431983649, 1431983649, NULL, '13.104.076-8', 'SUSANA_FIERRO@gmail.com', '13.104.076-8', NULL, 1, 0, 0),
(29, 1431983694, 1431983694, NULL, '10.160.986-3', 'MONICA_GONZALEZ@gmail.com', '10.160.986-3', NULL, 1, 0, 0),
(30, 1431983730, 1431983730, NULL, '13.797.296-4', 'MARCELA_INOSTROZA@gmail.com', '13.797.296-4', NULL, 1, 0, 0),
(31, 1431983790, 1431983790, NULL, '15.658.494-0', 'ANGELICA_MALDONADO@gmail.com', '15.658.494-0', NULL, 1, 0, 0),
(32, 1431983836, 1431983836, 1431985190, '15.221.816-8', 'NATALIA_MARDONES@gmail.com', '15.221.816-8', NULL, 1, 0, 0),
(33, 1431983887, 1431983887, NULL, '15.175.475-9', 'KAREN_MORALES@gmail.com', '15.175.475-9', NULL, 1, 0, 0),
(34, 1431983949, 1431983949, NULL, '13.135.065-1', 'VICTOR_OCARES@gmail.com', '13.135.065-1', NULL, 1, 0, 0),
(35, 1431983986, 1431983986, NULL, '17.799.993-8', 'CESAR_PIZARRO@gmail.com', '17.799.993-8', NULL, 1, 0, 0),
(36, 1431984024, 1431984024, NULL, '15.222.721-3', 'TAMARA_POBLETE@gmail.com', '15.222.721-3', NULL, 1, 0, 0),
(37, 1431984096, 1431984096, NULL, '15.223.556-9', 'JENIFFER_TAPIA@gmail.com', '15.223.556-9', NULL, 1, 0, 0),
(38, 1431984131, 1431984131, NULL, '7.680.260-2', 'CARMEN_CORONADO@gmail.com', '7.680.260-2', NULL, 1, 0, 0),
(39, 1431984163, 1431984163, NULL, '8.552.470-4', 'MARIA_FERNANDEZ@gmail.com', '8.552.470-4', NULL, 1, 0, 0),
(40, 1431984201, 1431984201, NULL, '6.685.170-2', 'ANA_FLORES@gmail.com', '6.685.170-2', NULL, 1, 0, 0),
(41, 1431984242, 1431984242, NULL, '9.696.588-5', 'PRAXEDES_FLORES@gmail.com', '9.696.588-5', NULL, 1, 0, 0),
(42, 1431984276, 1431984276, NULL, '7.947.238-7', 'ELENA_GARRIDO@gmail.com', '7.947.238-7', NULL, 1, 0, 0),
(43, 1431984312, 1431984312, NULL, '7.508.827-2', 'JORGE_PANTOJA@gmail.com', '7.508.827-2', NULL, 1, 0, 0),
(44, 1431984962, 1431984962, NULL, '15.154.393-6', 'MARIO_MARTIN@gmail.com', '15.154.393-6', NULL, 1, 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`cur_id`, `cur_ano`, `cur_notas_periodo`, `cur_nivel`, `cur_letra`, `cur_jornada`, `cur_pjefe`, `cur_tperiodo`, `cur_infd`) VALUES
(1, 2014, 10, 8, 20, 18, 10, 16, 1),
(2, 2015, 10, 8, 21, 18, 11, 16, 1),
(3, 2015, 12, 11, 23, 18, 11, 17, 1),
(4, 2015, 5, 8, 32, 18, 12, 17, 1),
(5, 2015, 10, 10, 30, 18, 10, 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE IF NOT EXISTS `evaluacion` (
  `eva_id` int(11) NOT NULL,
  `eva_concepto` int(11) DEFAULT NULL,
  `eva_matricula` int(11) DEFAULT NULL,
  `eva_ano` int(11) DEFAULT NULL,
  `eva_nota` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`eva_id`, `eva_concepto`, `eva_matricula`, `eva_ano`, `eva_nota`) VALUES
(1, 1, 100, 2015, ''),
(2, 2, 100, 2015, ''),
(3, 3, 100, 2015, ''),
(4, 4, 100, 2015, ''),
(5, 1, 89, 2014, ''),
(6, 2, 89, 2014, ''),
(7, 3, 89, 2014, ''),
(8, 4, 89, 2014, ''),
(9, 1, 98, 2015, ''),
(10, 2, 98, 2015, ''),
(11, 3, 98, 2015, ''),
(12, 4, 98, 2015, ''),
(13, 1, 99, 2015, ''),
(14, 2, 99, 2015, ''),
(15, 3, 99, 2015, ''),
(16, 4, 99, 2015, ''),
(17, 1, 101, 2015, ''),
(18, 2, 101, 2015, ''),
(19, 3, 101, 2015, ''),
(20, 4, 101, 2015, ''),
(21, 1, 85, 2015, ''),
(22, 2, 85, 2015, ''),
(23, 3, 85, 2015, ''),
(24, 4, 85, 2015, ''),
(25, 1, 88, 2015, 'SIEMPRE'),
(26, 2, 88, 2015, 'RARA VEZ'),
(27, 3, 88, 2015, 'SIEMPRE'),
(28, 4, 88, 2015, 'GENERALMENTE'),
(29, 1, 90, 2015, ''),
(30, 2, 90, 2015, ''),
(31, 3, 90, 2015, ''),
(32, 4, 90, 2015, ''),
(33, 1, 91, 2015, ''),
(34, 2, 91, 2015, ''),
(35, 3, 91, 2015, ''),
(36, 4, 91, 2015, ''),
(37, 1, 93, 2015, ''),
(38, 2, 93, 2015, ''),
(39, 3, 93, 2015, ''),
(40, 4, 93, 2015, ''),
(41, 1, 94, 2015, ''),
(42, 2, 94, 2015, ''),
(43, 3, 94, 2015, ''),
(44, 4, 94, 2015, ''),
(45, 1, 95, 2015, ''),
(46, 2, 95, 2015, ''),
(47, 3, 95, 2015, ''),
(48, 4, 95, 2015, ''),
(49, 1, 96, 2015, ''),
(50, 2, 96, 2015, ''),
(51, 3, 96, 2015, ''),
(52, 4, 96, 2015, ''),
(53, 1, 97, 2015, ''),
(54, 2, 97, 2015, ''),
(55, 3, 97, 2015, ''),
(56, 4, 97, 2015, ''),
(57, 1, 86, 2015, ''),
(58, 2, 86, 2015, ''),
(59, 3, 86, 2015, ''),
(60, 4, 86, 2015, ''),
(61, 1, 87, 2015, ''),
(62, 2, 87, 2015, ''),
(63, 3, 87, 2015, ''),
(64, 4, 87, 2015, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe_desarrollo`
--

CREATE TABLE IF NOT EXISTS `informe_desarrollo` (
  `id_id` int(11) NOT NULL,
  `id_descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informe_desarrollo`
--

INSERT INTO `informe_desarrollo` (`id_id`, `id_descripcion`) VALUES
(1, 'INFORME PERSONALIDAD'),
(2, 'INFORME DOS'),
(3, 'INFORME TRES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe_hogar`
--

CREATE TABLE IF NOT EXISTS `informe_hogar` (
  `ih_id` int(11) NOT NULL,
  `ih_descripcion` varchar(512) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informe_hogar`
--

INSERT INTO `informe_hogar` (`ih_id`, `ih_descripcion`) VALUES
(1, 'uno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_curso`
--

CREATE TABLE IF NOT EXISTS `lista_curso` (
  `list_id` int(11) NOT NULL,
  `list_mat_id` int(11) DEFAULT NULL,
  `list_posicion` int(11) DEFAULT NULL,
  `list_curso_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lista_curso`
--

INSERT INTO `lista_curso` (`list_id`, `list_mat_id`, `list_posicion`, `list_curso_id`) VALUES
(1, 98, 1, 2),
(4, 99, 2, 2),
(5, 101, 3, 2),
(6, 89, 1, 1),
(7, 85, 4, 2),
(8, 88, 5, 2),
(9, 90, 6, 2),
(10, 91, 7, 2),
(11, 93, 8, 2),
(12, 94, 9, 2),
(13, 95, 10, 2),
(14, 96, 11, 2),
(15, 97, 12, 2),
(16, 100, 13, 2),
(17, 86, 1, 4),
(18, 87, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE IF NOT EXISTS `matricula` (
  `mat_id` int(11) NOT NULL,
  `mat_ano` int(11) DEFAULT NULL,
  `mat_numero` varchar(11) DEFAULT NULL,
  `mat_fingreso` date DEFAULT NULL,
  `mat_fretiro` date DEFAULT NULL,
  `mat_fcambio` date DEFAULT NULL,
  `mat_asistencia_1` int(11) DEFAULT NULL,
  `mat_asistencia_2` int(11) DEFAULT NULL,
  `mat_asistencia_3` int(11) DEFAULT NULL,
  `mat_alu_id` int(11) DEFAULT NULL,
  `mat_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`mat_id`, `mat_ano`, `mat_numero`, `mat_fingreso`, `mat_fretiro`, `mat_fcambio`, `mat_asistencia_1`, `mat_asistencia_2`, `mat_asistencia_3`, `mat_alu_id`, `mat_estado`) VALUES
(85, 2015, 'XcsnA0ZyYRC', '2015-03-09', '2015-04-29', NULL, NULL, NULL, NULL, 88, 50),
(86, 2014, 'Xrj4NfSWQZB', '2015-03-09', NULL, NULL, 56, 69, NULL, 89, 53),
(87, 2015, 'X92ETmdg9Um', '2015-03-12', NULL, NULL, NULL, NULL, NULL, 90, 49),
(88, 2015, 'X3mxg2BmUJe', '2015-03-12', NULL, NULL, NULL, NULL, NULL, 91, 50),
(89, 2015, 'XUkEfDZdb4a', '2015-03-12', NULL, NULL, NULL, NULL, NULL, 92, 49),
(90, 2015, 'XtU5zqwfnUH', '2015-03-13', NULL, NULL, NULL, NULL, NULL, 93, 49),
(91, 2015, 'Xi1cpgcga9s', '2015-03-19', NULL, NULL, NULL, NULL, NULL, 94, 51),
(92, 2015, 'XATFSq4l2JZ', '2015-03-26', NULL, NULL, NULL, NULL, NULL, 95, 49),
(93, 2015, 'XXCbDcADADW', '2015-03-31', NULL, NULL, NULL, NULL, NULL, 96, 49),
(94, 2014, 'XMJxpCUKXRQ', '2015-03-31', NULL, NULL, NULL, NULL, NULL, 97, 52),
(95, 2015, 'XQLak8I3b4D', '2015-04-26', NULL, NULL, NULL, NULL, NULL, 98, 49),
(96, 2015, 'XuJjs4GrwBc', '2015-04-26', NULL, NULL, NULL, NULL, NULL, 99, 49),
(97, 2015, 'XivEyFhUqlf', '2015-04-26', NULL, NULL, NULL, NULL, NULL, 100, 49),
(98, 2015, 'XZlFygG9jDk', '2015-04-26', NULL, NULL, NULL, NULL, NULL, 101, 49),
(99, 2015, 'XMn5HjVImA5', '2015-04-26', NULL, NULL, NULL, NULL, NULL, 102, 49),
(100, 2015, 'Xf3pFPI1Oym', '2015-04-27', NULL, NULL, NULL, NULL, NULL, 103, 49),
(101, 2015, 'Xlfy5kxZbw6', '2015-04-27', NULL, NULL, NULL, NULL, NULL, 104, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `not_id` int(11) NOT NULL,
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
  `not_30` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=latin1;

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
(99, 1, 2015, 86, 3, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(100, 2, 2015, 86, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 2, 2015, 86, 3, 2, 5, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(102, 3, 2015, 86, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 3, 2015, 86, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 1, 2015, 87, 6, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(105, 1, 2015, 87, 3, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(106, 2, 2015, 87, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 2, 2015, 87, 3, 2, 5, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(108, 3, 2015, 87, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 3, 2015, 87, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 1, 2015, 88, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 1, 2015, 88, 2, 5, 4, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(112, 1, 2015, 88, 3, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(113, 1, 2015, 88, 1, 6, 6, 3, 2, 6, 6, 4, 4, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
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
(135, 2, 2015, 91, 1, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(136, 1, 2015, 93, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 1, 2015, 93, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 1, 2015, 93, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 1, 2015, 93, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(140, 2, 2015, 93, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 2, 2015, 93, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 2, 2015, 93, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 2, 2015, 93, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 1, 2015, 91, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 1, 2015, 91, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 1, 2015, 91, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 1, 2015, 91, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(152, 1, 2015, 94, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 1, 2015, 94, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 1, 2015, 94, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 1, 2015, 94, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(156, 2, 2015, 94, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 2, 2015, 94, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 2, 2015, 94, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 2, 2015, 94, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 1, 2015, 95, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 1, 2015, 95, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 1, 2015, 95, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 1, 2015, 95, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 2, 2015, 95, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 2, 2015, 95, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 2, 2015, 95, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 2, 2015, 95, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 1, 2015, 96, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 1, 2015, 96, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 1, 2015, 96, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 1, 2015, 96, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 2, 2015, 96, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 2, 2015, 96, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 2, 2015, 96, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 2, 2015, 96, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 1, 2015, 97, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 1, 2015, 97, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 1, 2015, 97, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 1, 2015, 97, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 2, 2015, 97, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, 2, 2015, 97, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, 2, 2015, 97, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 2, 2015, 97, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 1, 2015, 98, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 1, 2015, 98, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 1, 2015, 98, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 1, 2015, 98, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, 2, 2015, 98, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, 2, 2015, 98, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, 2, 2015, 98, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, 2, 2015, 98, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, 1, 2015, 99, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, 1, 2015, 99, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, 1, 2015, 99, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, 1, 2015, 99, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 2, 2015, 99, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, 2, 2015, 99, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 2, 2015, 99, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, 2, 2015, 99, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, 1, 2015, 100, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, 1, 2015, 100, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 1, 2015, 100, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, 1, 2015, 100, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 2, 2015, 100, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, 2, 2015, 100, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, 2, 2015, 100, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, 2, 2015, 100, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, 1, 2015, 101, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, 1, 2015, 101, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, 1, 2015, 101, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, 1, 2015, 101, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, 2, 2015, 101, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, 2, 2015, 101, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, 2, 2015, 101, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, 2, 2015, 101, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `not_id` int(11) NOT NULL,
  `not_user` int(11) DEFAULT NULL,
  `not_fecha` date DEFAULT NULL,
  `not_titulo` varchar(50) NOT NULL,
  `not_texto` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`not_id`, `not_user`, `not_fecha`, `not_titulo`, `not_texto`) VALUES
(1, 1, '2015-04-24', 'carlitos fleto', 'se volvio fleto'),
(2, 1, '2015-04-26', 'el carlitos se la come', 'el loco se la anda comiendo a todos'),
(3, 1, '2015-04-26', 'julito  se va', 'a la b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE IF NOT EXISTS `parametro` (
  `par_id` int(11) NOT NULL,
  `par_item` varchar(50) DEFAULT NULL,
  `par_descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parametro`
--

INSERT INTO `parametro` (`par_id`, `par_item`, `par_descripcion`) VALUES
(7, 'ano_activo', '2015'),
(8, 'NIVEL', 'PRIMERO'),
(9, 'NIVEL', 'SEGUNDO'),
(10, 'NIVEL', 'TERCERO'),
(11, 'NIVEL', 'CUARTO'),
(12, 'NIVEL', 'QUINTO'),
(13, 'NIVEL', 'SEXTO'),
(14, 'NIVEL', 'SEPTIMO'),
(15, 'NIVEL', 'OCTAVO'),
(16, 'tperiodo', 'SEMESTRE'),
(17, 'tperiodo', 'TRIMESTRE'),
(18, 'JORNADA', 'MAÑANA'),
(19, 'JORNADA', 'TARDE'),
(20, 'LETRA', 'A'),
(21, 'LETRA', 'B'),
(22, 'LETRA', 'C'),
(23, 'LETRA', 'D'),
(24, 'LETRA', 'E'),
(25, 'LETRA', 'F'),
(26, 'LETRA', 'G'),
(27, 'LETRA', 'H'),
(28, 'LETRA', 'I'),
(29, 'LETRA', 'J'),
(30, 'LETRA', 'K'),
(31, 'LETRA', 'L'),
(32, 'LETRA', 'M'),
(33, 'LETRA', 'N'),
(34, 'LETRA', 'O'),
(35, 'LETRA', 'P'),
(36, 'LETRA', 'Q'),
(37, 'LETRA', 'R'),
(38, 'LETRA', 'S'),
(39, 'LETRA', 'T'),
(40, 'LETRA', 'U'),
(41, 'LETRA', 'V'),
(42, 'LETRA', 'W'),
(43, 'LETRA', 'X'),
(44, 'LETRA', 'Y'),
(45, 'LETRA', 'Z'),
(47, 'SEXO', 'MASCULINO'),
(48, 'SEXO', 'FEMENINO'),
(49, 'ESTADO', 'ACTIVO'),
(50, 'ESTADO', 'RETIRADO'),
(51, 'ESTADO', 'PROMOVIDO'),
(52, 'ESTADO', 'REPITENTE'),
(53, 'ESTADO', 'EGRESADO'),
(54, 'EVA_ESCALA', 'GENERALMENTE'),
(55, 'EVA_ESCALA', 'SIEMPRE'),
(56, 'EVA_ESCALA', 'RARA VEZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promedio_anual`
--

CREATE TABLE IF NOT EXISTS `promedio_anual` (
  `PRO_ID` int(11) NOT NULL,
  `PRO_PROM_1` int(11) DEFAULT NULL,
  `PRO_PROM_2` int(11) DEFAULT NULL,
  `PRO_PROM_3` int(11) DEFAULT NULL,
  `PRO_NOMBRE_ASIGNATURA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pro_mat`
--

CREATE TABLE IF NOT EXISTS `pro_mat` (
  `PRO_MAT_ID` int(11) NOT NULL,
  `PRO_MAT_ANUAL` int(11) DEFAULT NULL,
  `PRO_MATRI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `temp`
--

INSERT INTO `temp` (`temp_id`, `temp_ano`, `temp_iduser`) VALUES
(1, 0, 1),
(2, NULL, 10),
(3, NULL, 11),
(4, NULL, 12),
(5, NULL, 13),
(6, NULL, 14),
(7, NULL, 15),
(8, NULL, 16),
(9, NULL, 17),
(10, NULL, 18),
(11, NULL, 19),
(12, NULL, 20),
(13, NULL, 21),
(14, NULL, 22),
(15, NULL, 23),
(16, NULL, 24),
(17, NULL, 25),
(18, NULL, 26),
(19, NULL, 27),
(20, NULL, 28),
(21, NULL, 29),
(22, NULL, 30),
(23, NULL, 31),
(24, NULL, 32),
(25, NULL, 33),
(26, NULL, 34),
(27, NULL, 35),
(28, NULL, 36),
(29, NULL, 37),
(30, NULL, 38),
(31, NULL, 39),
(32, NULL, 40),
(33, NULL, 41),
(34, NULL, 42),
(35, NULL, 43),
(36, NULL, 44);

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_rut`, `usu_nombre1`, `usu_nombre2`, `usu_apepat`, `usu_apemat`, `usu_estado`, `usu_iduser`) VALUES
(1, '17.415.992-0', 'BOB', 'ESPONJA', 'PANTALONES', 'CUADRADOS', 49, 10),
(2, '11.483.695-8', 'PATRICIO', 'PATRICK', 'ESTRELLA', 'ESTRELLADO', 49, 11),
(3, '13.947.962-9', 'papa', 'pepe', 'pipo', 'pupu', 49, 12),
(4, '19.988.593-6', 'JEFEUTP', 'JEFEUTP', 'JEFEUTP', 'JEFEUTP', 49, 13),
(5, '15.151.678-5', 'DIRECTOR', 'DIRECTOR', 'DIRECTOR', 'DIRECTOR', 49, 14),
(6, '19.107.327-4', 'EVALUADOR', 'EVALUADOR', 'EVALUADOR', 'EVALUADOR', 49, 15),
(7, '16.969.252-1', 'PROFESOR', 'PROFESOR', 'PROFESOR', 'PROFESOR', 49, 16),
(8, '16.762.422-7', 'JULIANS', 'RICARDO', 'ITURRA', 'VELOSO', 49, 17),
(9, '16.255.890-0', 'JOAN', 'PHILLIPPE', 'PULGAR', 'CUEVAS', 49, 18),
(12, '12.781.949-1', 'HECTOR', 'PEPE', 'POBLETE', 'RANCIO', 49, 19),
(14, '18.361.129-1', 'CARLOS', 'ANDRES', 'CAMPOS', 'CARTES', 49, 20),
(15, '15.854.390-7', 'RODRIGO', 'DANIEL', 'ARRIAGADA', 'AMAYA', 49, 21),
(16, '16.138.890-4', 'HELLEN', 'JEANETTE', 'ARRIAGADA', 'PEZOS', 49, 22),
(17, '17.076.330-0', 'MARISOL', 'JUDITH', 'AVELLO', 'ACUÑA', 49, 23),
(18, '13.307.700-6', 'MARCELA', 'MARIBEL', 'BRAVO', 'LEPIN', 49, 24),
(19, '15.529.806-5', 'MARLENE', 'ELIZABETH', 'BRAVO', 'YEPSEN', 49, 25),
(20, '16.972.863-1', 'ANYELINA', 'ANDREA', 'CISTERNA', 'GAETE', 49, 26),
(21, '11.494.474-2', 'ANGELA', 'MARCELA', 'FERNANDEZ', 'ARAYA', 49, 27),
(22, '13.104.076-8', 'SUSANA', 'ANDREA', 'FIERRO', 'SANHUEZA', 49, 28),
(23, '10.160.986-3', 'MONICA', 'JANETTE', 'GONZALEZ', 'COLOMA', 49, 29),
(24, '13.797.296-4', 'MARCELA', 'ANDREA', 'INOSTROZA', 'BELLO', 49, 30),
(25, '15.658.494-0', 'ANGELICA', 'IVETT', 'MALDONADO', 'MENDEZ', 49, 31),
(26, '15.221.816-8', 'NATALIA', 'ISABEL', 'MARDONES', 'SAEZ', 49, 32),
(27, '15.175.475-9', 'KAREN', 'ELIZABETH', 'MORALES', 'ARRIAGADA', 49, 33),
(28, '13.135.065-1', 'VICTOR', 'FRANCISCO', 'OCARES', 'ORELLANA', 49, 34),
(29, '17.799.993-8', 'CESAR', 'ANTONIO', 'PIZARRO', 'HIDALGO', 49, 35),
(30, '15.222.721-3', 'TAMARA', 'ANDREA', 'POBLETE', 'CIFUENTES', 49, 36),
(32, '15.223.556-9', 'JENIFFER', 'ELIZABETH', 'TAPIA', 'PEREZ', 49, 37),
(33, '7.680.260-2', 'CARMEN', 'LUISA', 'CORONADO', 'ORELLANA', 49, 38),
(34, '8.552.470-4', 'MARIA', 'EUGENIA', 'FERNANDEZ', 'MERCADO', 49, 39),
(35, '6.685.170-2', 'ANA', 'MERCEDES', 'FLORES', 'ESCANDON', 49, 40),
(36, '9.696.588-5', 'PRAXEDES', 'ELENA', 'FLORES', 'PALACIOS', 49, 41),
(37, '7.947.238-7', 'ELENA', 'INES', 'GARRIDO', 'VALENZUELA', 49, 42),
(38, '7.508.827-2', 'JORGE', 'RUBEN', 'PANTOJA', 'SOTO', 49, 43),
(40, '15.154.393-6', 'MARIO', 'RODRIGO', 'MARTIN', 'BIZAMA', 49, 44);

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
-- Indices de la tabla `area_hogar`
--
ALTER TABLE `area_hogar`
  ADD PRIMARY KEY (`ah_id`), ADD KEY `ah_inf_hogar` (`ah_inf_hogar`);

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
-- Indices de la tabla `colegio`
--
ALTER TABLE `colegio`
  ADD PRIMARY KEY (`col_id`);

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
-- Indices de la tabla `concepto_hogar`
--
ALTER TABLE `concepto_hogar`
  ADD PRIMARY KEY (`ch_id`), ADD KEY `ch_area_hogar` (`ch_area_hogar`);

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
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`eva_id`), ADD KEY `eva_infd` (`eva_concepto`), ADD KEY `eva_matricula` (`eva_matricula`);

--
-- Indices de la tabla `informe_desarrollo`
--
ALTER TABLE `informe_desarrollo`
  ADD PRIMARY KEY (`id_id`);

--
-- Indices de la tabla `informe_hogar`
--
ALTER TABLE `informe_hogar`
  ADD PRIMARY KEY (`ih_id`);

--
-- Indices de la tabla `lista_curso`
--
ALTER TABLE `lista_curso`
  ADD PRIMARY KEY (`list_id`), ADD KEY `list_curso_id` (`list_curso_id`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`mat_id`), ADD KEY `mat_alu_id` (`mat_alu_id`), ADD KEY `mat_estado` (`mat_estado`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`not_id`), ADD KEY `not_mat` (`not_mat`), ADD KEY `not_asig` (`not_asig`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`not_id`), ADD KEY `noticia_ibfk_1` (`not_user`);

--
-- Indices de la tabla `parametro`
--
ALTER TABLE `parametro`
  ADD PRIMARY KEY (`par_id`);

--
-- Indices de la tabla `promedio_anual`
--
ALTER TABLE `promedio_anual`
  ADD PRIMARY KEY (`PRO_ID`);

--
-- Indices de la tabla `pro_mat`
--
ALTER TABLE `pro_mat`
  ADD PRIMARY KEY (`PRO_MAT_ID`), ADD KEY `PRO_MAT_ANUAL` (`PRO_MAT_ANUAL`), ADD KEY `PRO_MATRI` (`PRO_MATRI`);

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
  ADD PRIMARY KEY (`usu_id`), ADD KEY `usu_iduser` (`usu_iduser`), ADD KEY `usu_estado` (`usu_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `alum_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `are_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `area_hogar`
--
ALTER TABLE `area_hogar`
  MODIFY `ah_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `asi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `a_asignatura`
--
ALTER TABLE `a_asignatura`
  MODIFY `aa_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `ciu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT de la tabla `colegio`
--
ALTER TABLE `colegio`
  MODIFY `col_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15203;
--
-- AUTO_INCREMENT de la tabla `concepto`
--
ALTER TABLE `concepto`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `concepto_hogar`
--
ALTER TABLE `concepto_hogar`
  MODIFY `ch_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
  MODIFY `idsession` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=186;
--
-- AUTO_INCREMENT de la tabla `cruge_system`
--
ALTER TABLE `cruge_system`
  MODIFY `idsystem` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cruge_user`
--
ALTER TABLE `cruge_user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `cur_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `eva_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT de la tabla `informe_desarrollo`
--
ALTER TABLE `informe_desarrollo`
  MODIFY `id_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `informe_hogar`
--
ALTER TABLE `informe_hogar`
  MODIFY `ih_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `lista_curso`
--
ALTER TABLE `lista_curso`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=216;
--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `parametro`
--
ALTER TABLE `parametro`
  MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `promedio_anual`
--
ALTER TABLE `promedio_anual`
  MODIFY `PRO_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pro_mat`
--
ALTER TABLE `pro_mat`
  MODIFY `PRO_MAT_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `temp`
--
ALTER TABLE `temp`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
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
-- Filtros para la tabla `area_hogar`
--
ALTER TABLE `area_hogar`
ADD CONSTRAINT `area_hogar_ibfk_1` FOREIGN KEY (`ah_inf_hogar`) REFERENCES `informe_hogar` (`ih_id`);

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
-- Filtros para la tabla `concepto_hogar`
--
ALTER TABLE `concepto_hogar`
ADD CONSTRAINT `concepto_hogar_ibfk_1` FOREIGN KEY (`ch_area_hogar`) REFERENCES `area_hogar` (`ah_id`);

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
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
ADD CONSTRAINT `evaluacion_ibfk_1` FOREIGN KEY (`eva_concepto`) REFERENCES `concepto` (`con_id`),
ADD CONSTRAINT `evaluacion_ibfk_2` FOREIGN KEY (`eva_matricula`) REFERENCES `matricula` (`mat_id`);

--
-- Filtros para la tabla `lista_curso`
--
ALTER TABLE `lista_curso`
ADD CONSTRAINT `lista_curso_ibfk_1` FOREIGN KEY (`list_curso_id`) REFERENCES `curso` (`cur_id`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`mat_alu_id`) REFERENCES `alumno` (`alum_id`),
ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`mat_estado`) REFERENCES `parametro` (`par_id`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`not_mat`) REFERENCES `matricula` (`mat_id`),
ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`not_asig`) REFERENCES `asignatura` (`asi_id`);

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
ADD CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`not_user`) REFERENCES `cruge_user` (`iduser`);

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
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`usu_iduser`) REFERENCES `cruge_user` (`iduser`),
ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`usu_estado`) REFERENCES `parametro` (`par_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
