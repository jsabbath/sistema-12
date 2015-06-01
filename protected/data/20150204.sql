-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2015 a las 18:13:48
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
  `alum_rut` varchar(12) NOT NULL,
  `alum_nombres` varchar(100) NOT NULL,
  `alum_apepat` varchar(50) NOT NULL,
  `alum_apemat` varchar(50) NOT NULL,
  `alum_f_nac` date NOT NULL,
  `alum_direccion` varchar(100) NOT NULL,
  `alum_region` int(11) DEFAULT NULL,
  `alum_ciudad` int(11) DEFAULT NULL,
  `alum_comuna` int(11) DEFAULT NULL,
  `alum_genero` int(11) DEFAULT NULL,
  `alum_salud` text NULL,
  `alum_obs` text,
  `alum_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
`are_id` int(11) NOT NULL,
  `are_descripcion` varchar(100) NOT NULL,
  `are_infd` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE IF NOT EXISTS `asignatura` (
`asi_id` int(11) NOT NULL,
  `asi_descripcion` varchar(100) NOT NULL,
  `asi_codigo` varchar(10) NOT NULL,
  `asi_nombrecorto` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_asignatura`
--

CREATE TABLE IF NOT EXISTS `a_asignatura` (
`aa_id` int(11) NOT NULL,
  `aa_curso` int(11) DEFAULT NULL,
  `aa_asignatura` int(11) DEFAULT NULL,
  `aa_docente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
`ciu_id` int(11) NOT NULL,
  `ciu_descripcion` varchar(100) DEFAULT NULL,
  `ciu_reg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE IF NOT EXISTS `comuna` (
`com_id` int(11) NOT NULL,
  `com_descripcion` varchar(100) DEFAULT NULL,
  `com_ciu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto`
--

CREATE TABLE IF NOT EXISTS `concepto` (
`con_id` int(11) NOT NULL,
  `con_descripcion` varchar(100) NOT NULL,
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
('action_cargos_admin', 0, '', NULL, 'N;'),
('action_cargos_create', 0, '', NULL, 'N;'),
('action_cargos_delete', 0, '', NULL, 'N;'),
('action_cargos_index', 0, '', NULL, 'N;'),
('action_cargos_update', 0, '', NULL, 'N;'),
('action_cargos_view', 0, '', NULL, 'N;'),
('action_cargo_admin', 0, '', NULL, 'N;'),
('action_cargo_create', 0, '', NULL, 'N;'),
('action_cargo_delete', 0, '', NULL, 'N;'),
('action_cargo_index', 0, '', NULL, 'N;'),
('action_cargo_update', 0, '', NULL, 'N;'),
('action_cargo_view', 0, '', NULL, 'N;'),
('action_parametros_admin', 0, '', NULL, 'N;'),
('action_parametros_create', 0, '', NULL, 'N;'),
('action_parametros_delete', 0, '', NULL, 'N;'),
('action_parametros_index', 0, '', NULL, 'N;'),
('action_parametros_update', 0, '', NULL, 'N;'),
('action_parametros_view', 0, '', NULL, 'N;'),
('action_parametro_admin', 0, '', NULL, 'N;'),
('action_parametro_create', 0, '', NULL, 'N;'),
('action_parametro_delete', 0, '', NULL, 'N;'),
('action_parametro_index', 0, '', NULL, 'N;'),
('action_parametro_update', 0, '', NULL, 'N;'),
('action_parametro_view', 0, '', NULL, 'N;'),
('action_permisos_admin', 0, '', NULL, 'N;'),
('action_permisos_create', 0, '', NULL, 'N;'),
('action_permisos_delete', 0, '', NULL, 'N;'),
('action_permisos_index', 0, '', NULL, 'N;'),
('action_permisos_update', 0, '', NULL, 'N;'),
('action_permisos_view', 0, '', NULL, 'N;'),
('action_permiso_admin', 0, '', NULL, 'N;'),
('action_permiso_create', 0, '', NULL, 'N;'),
('action_permiso_delete', 0, '', NULL, 'N;'),
('action_permiso_index', 0, '', NULL, 'N;'),
('action_permiso_update', 0, '', NULL, 'N;'),
('action_permiso_view', 0, '', NULL, 'N;'),
('action_site_contact', 0, '', NULL, 'N;'),
('action_site_error', 0, '', NULL, 'N;'),
('action_site_index', 0, '', NULL, 'N;'),
('action_site_login', 0, '', NULL, 'N;'),
('action_site_logout', 0, '', NULL, 'N;'),
('action_ui_editprofile', 0, '', NULL, 'N;'),
('action_ui_fieldsadmincreate', 0, '', NULL, 'N;'),
('action_ui_fieldsadminlist', 0, '', NULL, 'N;'),
('action_ui_rbaclistops', 0, '', NULL, 'N;'),
('action_ui_rbaclistroles', 0, '', NULL, 'N;'),
('action_ui_rbaclisttasks', 0, '', NULL, 'N;'),
('action_ui_usermanagementadmin', 0, '', NULL, 'N;'),
('action_ui_usermanagementcreate', 0, '', NULL, 'N;'),
('action_ui_usermanagementupdate', 0, '', NULL, 'N;'),
('action_usuarios_admin', 0, '', NULL, 'N;'),
('action_usuarios_create', 0, '', NULL, 'N;'),
('action_usuarios_delete', 0, '', NULL, 'N;'),
('action_usuarios_index', 0, '', NULL, 'N;'),
('action_usuarios_update', 0, '', NULL, 'N;'),
('action_usuarios_view', 0, '', NULL, 'N;'),
('action_usuario_admin', 0, '', NULL, 'N;'),
('action_usuario_create', 0, '', NULL, 'N;'),
('action_usuario_delete', 0, '', NULL, 'N;'),
('action_usuario_index', 0, '', NULL, 'N;'),
('action_usuario_update', 0, '', NULL, 'N;'),
('action_usuario_view', 0, '', NULL, 'N;'),
('admin', 0, '', NULL, 'N;'),
('controller_cargo', 0, '', NULL, 'N;'),
('controller_cargos', 0, '', NULL, 'N;'),
('controller_parametro', 0, '', NULL, 'N;'),
('controller_parametros', 0, '', NULL, 'N;'),
('controller_permiso', 0, '', NULL, 'N;'),
('controller_permisos', 0, '', NULL, 'N;'),
('controller_site', 0, '', NULL, 'N;'),
('controller_usuario', 0, '', NULL, 'N;'),
('controller_usuarios', 0, '', NULL, 'N;'),
('edit-advanced-profile-features', 0, 'C:\\xampp\\htdocs\\sistema\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 114', NULL, 'N;');

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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_session`
--

INSERT INTO `cruge_session` (`idsession`, `iduser`, `created`, `expire`, `status`, `ipaddress`, `usagecount`, `lastusage`, `logoutdate`, `ipaddressout`) VALUES
(1, 1, 1422581871, 1422583671, 0, '::1', 6, 1422582440, 1422582568, '::1'),
(2, 1, 1422582573, 1422584373, 0, '::1', 1, 1422582573, 1422582629, '::1'),
(3, 1, 1422582633, 1422584433, 0, '::1', 3, 1422582952, 1422583394, '::1'),
(4, 1, 1422583398, 1422585198, 0, '::1', 1, 1422583398, 1422583412, '::1'),
(5, 1, 1422583416, 1422585216, 0, '::1', 1, 1422583416, 1422583454, '::1'),
(6, 1, 1422583695, 1422585495, 0, '::1', 1, 1422583695, 1422584857, '::1'),
(7, 1, 1422584861, 1422586661, 0, '::1', 1, 1422584861, NULL, NULL),
(8, 1, 1422619301, 1422621101, 0, '::1', 1, 1422619301, 1422619311, '::1'),
(9, 1, 1422619324, 1422621124, 0, '::1', 2, 1422619419, 1422619720, '::1'),
(10, 1, 1422619962, 1422621762, 0, '::1', 1, 1422619962, NULL, NULL),
(11, 1, 1422622766, 1422624566, 0, '::1', 1, 1422622766, 1422622777, '::1'),
(12, 1, 1422623075, 1422624875, 0, '::1', 1, 1422623075, 1422623082, '::1'),
(13, 1, 1422623086, 1422624886, 0, '::1', 1, 1422623086, 1422623093, '::1'),
(14, 1, 1422623099, 1422624899, 0, '::1', 2, 1422623105, 1422623425, '::1'),
(15, 1, 1422623430, 1422625230, 0, '::1', 1, 1422623430, 1422623789, '::1'),
(16, 1, 1422623793, 1422625593, 0, '::1', 1, 1422623793, 1422623800, '::1'),
(17, 1, 1422623805, 1422625605, 0, '::1', 2, 1422624119, NULL, NULL),
(18, 1, 1422625744, 1422627544, 0, '::1', 1, 1422625744, 1422627234, '::1'),
(19, 1, 1422627238, 1422629038, 0, '::1', 1, 1422627238, 1422627650, '::1'),
(20, 1, 1422627655, 1422629455, 0, '::1', 1, 1422627655, 1422628173, '::1'),
(21, 1, 1422628178, 1422629978, 0, '::1', 1, 1422628178, 1422629013, '::1'),
(22, 1, 1422630038, 1422631838, 0, '::1', 1, 1422630038, 1422630047, '::1'),
(23, 1, 1422630056, 1422631856, 0, '::1', 1, 1422630056, 1422630101, '::1'),
(24, 1, 1422631642, 1422633442, 0, '::1', 1, 1422631642, 1422631892, '::1'),
(25, 1, 1422631905, 1422633705, 0, '::1', 2, 1422631930, 1422631938, '::1'),
(26, 1, 1422632234, 1422634034, 0, '::1', 1, 1422632234, 1422632529, '::1'),
(27, 1, 1422632538, 1422634338, 0, '::1', 1, 1422632538, 1422632645, '::1'),
(28, 1, 1422632650, 1422634450, 0, '::1', 1, 1422632650, 1422632703, '::1'),
(29, 1, 1422632723, 1422634523, 0, '::1', 1, 1422632723, 1422632912, '::1'),
(30, 1, 1422632945, 1422634745, 0, '::1', 1, 1422632945, 1422632958, '::1'),
(31, 1, 1422633359, 1422635159, 0, '::1', 1, 1422633359, 1422633367, '::1'),
(32, 1, 1422633560, 1422635360, 0, '::1', 1, 1422633560, 1422633566, '::1'),
(33, 1, 1422633588, 1422635388, 0, '::1', 1, 1422633588, 1422633594, '::1'),
(34, 1, 1422633601, 1422635401, 0, '::1', 1, 1422633601, 1422633603, '::1'),
(35, 1, 1422633620, 1422635420, 0, '::1', 1, 1422633620, 1422633623, '::1'),
(36, 1, 1422635658, 1422637458, 0, '::1', 1, 1422635658, 1422635682, '::1'),
(37, 1, 1422635976, 1422637776, 0, '::1', 1, 1422635976, 1422636002, '::1'),
(38, 1, 1422647245, 1422649045, 0, '::1', 1, 1422647245, NULL, NULL),
(39, 1, 1422666063, 1422667863, 0, '::1', 1, 1422666063, 1422666071, '::1'),
(40, 1, 1422758883, 1422760683, 0, '::1', 1, 1422758883, 1422758892, '::1'),
(41, 1, 1422759682, 1422761482, 0, '::1', 1, 1422759682, NULL, NULL),
(42, 1, 1422762998, 1422764798, 0, '::1', 1, 1422762998, 1422763005, '::1'),
(43, 1, 1422763025, 1422764825, 0, '::1', 1, 1422763025, NULL, NULL),
(44, 1, 1422878666, 1422880466, 1, '::1', 1, 1422878666, NULL, NULL),
(45, 1, 1422881539, 1422883339, 0, '::1', 1, 1422881539, 1422881543, '::1'),
(46, 1, 1422881753, 1422883553, 0, '::1', 1, 1422881753, 1422881756, '::1'),
(47, 1, 1422882603, 1422884403, 0, '::1', 1, 1422882603, 1422882604, '::1'),
(48, 1, 1422885725, 1422887525, 0, '::1', 1, 1422885725, NULL, NULL),
(49, 1, 1422887664, 1422889464, 0, '::1', 2, 1422888578, 1422888760, '::1'),
(50, 1, 1422888764, 1422890564, 0, '::1', 1, 1422888764, 1422889339, '::1'),
(51, 1, 1422889343, 1422891143, 0, '::1', 1, 1422889343, 1422889840, '::1'),
(52, 1, 1422889878, 1422891678, 0, '::1', 1, 1422889878, 1422889991, '::1'),
(53, 1, 1422889999, 1422891799, 0, '::1', 1, 1422889999, 1422890218, '::1'),
(54, 1, 1422890239, 1422892039, 0, '::1', 1, 1422890239, 1422890396, '::1'),
(55, 1, 1422890404, 1422892204, 0, '::1', 1, 1422890404, 1422890713, '::1'),
(56, 1, 1422890738, 1422892538, 0, '::1', 1, 1422890738, NULL, NULL),
(57, 1, 1422892716, 1422894516, 0, '::1', 1, 1422892716, 1422892807, '::1'),
(58, 1, 1422898198, 1422899998, 0, '::1', 1, 1422898198, NULL, NULL),
(59, 1, 1422905199, 1422906999, 0, '::1', 1, 1422905199, NULL, NULL),
(60, 1, 1422965096, 1422966896, 0, '::1', 1, 1422965096, NULL, NULL),
(61, 1, 1422967087, 1422968887, 0, '::1', 1, 1422967087, 1422968448, '::1'),
(62, 4, 1422968454, 1422970254, 0, '::1', 1, 1422968454, NULL, NULL),
(63, 1, 1422970267, 1422972067, 0, '::1', 1, 1422970267, NULL, NULL),
(64, 1, 1422972188, 1422973988, 0, '::1', 1, 1422972188, NULL, NULL),
(65, 1, 1422974059, 1422975859, 0, '::1', 2, 1422974500, NULL, NULL),
(66, 1, 1422976781, 1422978581, 0, '::1', 1, 1422976781, NULL, NULL),
(67, 1, 1422979892, 1422981692, 0, '::1', 1, 1422979892, NULL, NULL),
(68, 1, 1422981778, 1422983578, 1, '::1', 3, 1422981779, NULL, NULL);

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
(1, 'default', NULL, 30, 10, 1, -1, -1, 0, 0, 0, 0, '', 0, '', '', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_user`
--

INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`) VALUES
(1, NULL, NULL, 1422981779, 'admin', 'admin@tucorreo.com', 'admin', NULL, 1, 0, 0),
(2, NULL, NULL, NULL, 'invitado', 'invitado', 'nopassword', NULL, 1, 0, 0),
(3, 1422968326, NULL, NULL, 'asd1', 'asd@asd.asd', '123456', '0b7cc650b138b2810c78e1cf31c4156c', 1, 0, 0),
(4, 1325468, NULL, 1422968454, 'julitongo', 'a@a.c', '123456', NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
`cur_id` int(11) NOT NULL,
  `cur_ano` year(4) NOT NULL,
  `cur_nivel` int(11) DEFAULT NULL,
  `cur_jornada` int(11) DEFAULT NULL,
  `cur_letra` int(11) DEFAULT NULL,
  `cur_pjefe` int(11) DEFAULT NULL,
  `cur_infd` int(11) DEFAULT NULL,
  `cur_tperiodo` int(11) DEFAULT NULL,
  `cur_notas_periodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escala`
--

CREATE TABLE IF NOT EXISTS `escala` (
`esc_id` int(11) NOT NULL,
  `esc_concepto` int(11) DEFAULT NULL,
  `esc_descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe_desarrollo`
--

CREATE TABLE IF NOT EXISTS `informe_desarrollo` (
`id_id` int(11) NOT NULL,
  `id_descripcion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE IF NOT EXISTS `matricula` (
`mat_id` int(11) NOT NULL,
  `mat_ano` year(4) NOT NULL,
  `mat_cur` int(11) DEFAULT NULL,
  `mat_alu_id` int(11) DEFAULT NULL,
  `mat_fingreso` date DEFAULT NULL,
  `mat_fretiro` date DEFAULT NULL,
  `mat_fcambio` date DEFAULT NULL,
  `mat_numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
`not_id` int(11) NOT NULL,
  `not_aa` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE IF NOT EXISTS `parametro` (
  `par_id` int(2) NOT NULL,
  `par_item` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `par_descripcion` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `parametro`
--

INSERT INTO `parametro` (`par_id`, `par_item`, `par_descripcion`) VALUES
(1, 'estado', 'activo'),
(7, 'estado', 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE IF NOT EXISTS `region` (
`reg_id` int(11) NOT NULL,
  `reg_descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`usu_id` int(4) NOT NULL,
  `usu_nombre1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `usu_nombre2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usu_apepat` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `usu_apemat` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `usu_rut` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `usu_estado` int(2) NOT NULL,
  `usu_iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
 ADD PRIMARY KEY (`alum_id`), ADD KEY `alum_region` (`alum_region`), ADD KEY `alum_ciudad` (`alum_ciudad`), ADD KEY `alum_comuna` (`alum_comuna`), ADD KEY `alum_genero` (`alum_genero`), ADD KEY `alum_estado` (`alum_estado`);

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
 ADD PRIMARY KEY (`aa_id`), ADD KEY `aa_curso` (`aa_curso`), ADD KEY `aa_asignatura` (`aa_asignatura`), ADD KEY `aa_docente` (`aa_docente`);

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
 ADD PRIMARY KEY (`cur_id`), ADD KEY `cur_nivel` (`cur_nivel`), ADD KEY `cur_jornada` (`cur_jornada`), ADD KEY `cur_letra` (`cur_letra`), ADD KEY `cur_pjefe` (`cur_pjefe`), ADD KEY `cur_infd` (`cur_infd`), ADD KEY `cur_tperiodo` (`cur_tperiodo`);

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
 ADD PRIMARY KEY (`mat_id`), ADD KEY `mat_cur` (`mat_cur`), ADD KEY `mat_alu_id` (`mat_alu_id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
 ADD PRIMARY KEY (`not_id`), ADD KEY `not_aa` (`not_aa`);

--
-- Indices de la tabla `parametro`
--
ALTER TABLE `parametro`
 ADD PRIMARY KEY (`par_id`), ADD KEY `par_id` (`par_id`), ADD KEY `par_id_2` (`par_id`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
 ADD PRIMARY KEY (`reg_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`usu_id`), ADD UNIQUE KEY `usu_rut` (`usu_rut`), ADD KEY `usu_estado` (`usu_estado`), ADD KEY `usu_iduser` (`usu_iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
MODIFY `alum_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
MODIFY `are_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
MODIFY `asi_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `a_asignatura`
--
ALTER TABLE `a_asignatura`
MODIFY `aa_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
MODIFY `ciu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `idsession` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT de la tabla `cruge_system`
--
ALTER TABLE `cruge_system`
MODIFY `idsystem` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cruge_user`
--
ALTER TABLE `cruge_user`
MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
MODIFY `cur_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `escala`
--
ALTER TABLE `escala`
MODIFY `esc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `informe_desarrollo`
--
ALTER TABLE `informe_desarrollo`
MODIFY `id_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `usu_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`alum_region`) REFERENCES `region` (`reg_id`),
ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`alum_ciudad`) REFERENCES `ciudad` (`ciu_id`),
ADD CONSTRAINT `alumno_ibfk_3` FOREIGN KEY (`alum_comuna`) REFERENCES `comuna` (`com_id`),
ADD CONSTRAINT `alumno_ibfk_4` FOREIGN KEY (`alum_genero`) REFERENCES `parametro` (`par_id`),
ADD CONSTRAINT `alumno_ibfk_5` FOREIGN KEY (`alum_estado`) REFERENCES `parametro` (`par_id`);

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`are_infd`) REFERENCES `informe_desarrollo` (`id_id`);

--
-- Filtros para la tabla `a_asignatura`
--
ALTER TABLE `a_asignatura`
ADD CONSTRAINT `a_asignatura_ibfk_1` FOREIGN KEY (`aa_curso`) REFERENCES `curso` (`cur_id`),
ADD CONSTRAINT `a_asignatura_ibfk_2` FOREIGN KEY (`aa_asignatura`) REFERENCES `asignatura` (`asi_id`),
ADD CONSTRAINT `a_asignatura_ibfk_3` FOREIGN KEY (`aa_docente`) REFERENCES `usuario` (`usu_id`);

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
ADD CONSTRAINT `curso_ibfk_2` FOREIGN KEY (`cur_jornada`) REFERENCES `parametro` (`par_id`),
ADD CONSTRAINT `curso_ibfk_3` FOREIGN KEY (`cur_letra`) REFERENCES `parametro` (`par_id`),
ADD CONSTRAINT `curso_ibfk_4` FOREIGN KEY (`cur_pjefe`) REFERENCES `cruge_user` (`iduser`),
ADD CONSTRAINT `curso_ibfk_5` FOREIGN KEY (`cur_infd`) REFERENCES `informe_desarrollo` (`id_id`),
ADD CONSTRAINT `curso_ibfk_6` FOREIGN KEY (`cur_tperiodo`) REFERENCES `parametro` (`par_id`);

--
-- Filtros para la tabla `escala`
--
ALTER TABLE `escala`
ADD CONSTRAINT `escala_ibfk_1` FOREIGN KEY (`esc_concepto`) REFERENCES `concepto` (`con_id`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`mat_cur`) REFERENCES `curso` (`cur_id`),
ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`mat_alu_id`) REFERENCES `alumno` (`alum_id`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`not_aa`) REFERENCES `a_asignatura` (`aa_id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`usu_iduser`) REFERENCES `cruge_user` (`iduser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
