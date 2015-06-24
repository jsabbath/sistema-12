-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2015 a las 13:20:26
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `asd`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `area_hogar`
--

CREATE TABLE IF NOT EXISTS `area_hogar` (
`ah_id` int(11) NOT NULL,
  `ah_descripcion` varchar(512) DEFAULT NULL,
  `ah_inf_hogar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_asignatura`
--

CREATE TABLE IF NOT EXISTS `a_asignatura` (
`aa_id` int(11) NOT NULL,
  `aa_docente` int(11) DEFAULT NULL,
  `aa_curso` int(11) DEFAULT NULL,
  `aa_asignatura` int(11) DEFAULT NULL
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
  `col_nombre_director` int(11) DEFAULT NULL,
  `col_director_email` varchar(255) DEFAULT NULL,
  `col_encargado_actas` varchar(255) DEFAULT NULL,
  `col_fecha_resol_rec_ofic` date DEFAULT NULL,
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
  `ano_promocion_evaluacion` int(11) DEFAULT NULL,
  `numero_promocion_evaluacion` int(1) DEFAULT NULL,
  `numero_plan_programa` int(11) DEFAULT NULL,
  `ano_plan_programa` int(4) DEFAULT NULL,
  `numero_decreto_supremo` int(11) DEFAULT NULL,
  `ano_decreto_supremo` int(4) DEFAULT NULL
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
  `con_descripcion` varchar(100) DEFAULT NULL,
  `con_area` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto_hogar`
--

CREATE TABLE IF NOT EXISTS `concepto_hogar` (
`ch_id` int(11) NOT NULL,
  `ch_descripcion` varchar(1024) DEFAULT NULL,
  `ch_area_hogar` int(11) DEFAULT NULL
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `cur_infd` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eva_hogar`
--

CREATE TABLE IF NOT EXISTS `eva_hogar` (
`eh_id` int(11) NOT NULL,
  `eh_matricula` int(11) DEFAULT NULL,
  `eh_curso` int(11) DEFAULT NULL,
  `eh_concepto` int(11) DEFAULT NULL,
  `eh_eva1` int(11) DEFAULT NULL,
  `eh_eva2` int(11) DEFAULT NULL,
  `eh_eva3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe_desarrollo`
--

CREATE TABLE IF NOT EXISTS `informe_desarrollo` (
`id_id` int(11) NOT NULL,
  `id_descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe_hogar`
--

CREATE TABLE IF NOT EXISTS `informe_hogar` (
`ih_id` int(11) NOT NULL,
  `ih_descripcion` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inf_hogar`
--

CREATE TABLE IF NOT EXISTS `inf_hogar` (
`ih_id` int(11) NOT NULL,
  `ih_informe` varchar(50) DEFAULT NULL,
  `ih_area` varchar(255) DEFAULT NULL,
  `ih_concepto` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_curso`
--

CREATE TABLE IF NOT EXISTS `lista_curso` (
`list_id` int(11) NOT NULL,
  `list_mat_id` int(11) DEFAULT NULL,
  `list_posicion` int(11) DEFAULT NULL,
  `list_curso_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
`not_id` int(11) NOT NULL,
  `not_user` int(11) DEFAULT NULL,
  `not_fecha` date DEFAULT NULL,
  `not_titulo` varchar(50) NOT NULL,
  `not_texto` text,
  `not_programa` text,
  `not_responsable` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE IF NOT EXISTS `parametro` (
`par_id` int(11) NOT NULL,
  `par_item` varchar(50) DEFAULT NULL,
  `par_descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_curso`
--

CREATE TABLE IF NOT EXISTS `pre_curso` (
`pre_id` int(11) NOT NULL,
  `pre_ano` int(11) DEFAULT NULL,
  `pre_nivel` int(11) DEFAULT NULL,
  `pre_letra` int(11) DEFAULT NULL,
  `pre_jornada` int(11) DEFAULT NULL,
  `pre_pjefe` int(11) DEFAULT NULL,
  `pre_inf` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
`temp_id` int(11) NOT NULL,
  `temp_ano` int(11) DEFAULT NULL,
  `temp_iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`usu_id` int(11) NOT NULL,
  `usu_firma` varchar(1024) DEFAULT NULL,
  `usu_rut` varchar(12) DEFAULT NULL,
  `usu_nombre1` varchar(50) DEFAULT NULL,
  `usu_nombre2` varchar(50) DEFAULT NULL,
  `usu_apepat` varchar(50) DEFAULT NULL,
  `usu_apemat` varchar(50) DEFAULT NULL,
  `usu_estado` int(11) DEFAULT NULL,
  `usu_iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
 ADD PRIMARY KEY (`cur_id`), ADD KEY `cur_nivel` (`cur_nivel`), ADD KEY `cur_letra` (`cur_letra`), ADD KEY `cur_jornada` (`cur_jornada`), ADD KEY `cur_pjefe` (`cur_pjefe`), ADD KEY `cur_infd` (`cur_infd`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
 ADD PRIMARY KEY (`eva_id`), ADD KEY `eva_infd` (`eva_concepto`), ADD KEY `eva_matricula` (`eva_matricula`);

--
-- Indices de la tabla `eva_hogar`
--
ALTER TABLE `eva_hogar`
 ADD PRIMARY KEY (`eh_id`), ADD KEY `eh_matricula` (`eh_matricula`), ADD KEY `eh_curso` (`eh_curso`), ADD KEY `eh_concepto` (`eh_concepto`), ADD KEY `eh_eva1` (`eh_eva1`), ADD KEY `eh_eva2` (`eh_eva2`);

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
-- Indices de la tabla `inf_hogar`
--
ALTER TABLE `inf_hogar`
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
-- Indices de la tabla `pre_curso`
--
ALTER TABLE `pre_curso`
 ADD PRIMARY KEY (`pre_id`), ADD KEY `pre_nivel` (`pre_nivel`), ADD KEY `pre_letra` (`pre_letra`), ADD KEY `pre_jornada` (`pre_jornada`), ADD KEY `pre_pjefe` (`pre_pjefe`);

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
MODIFY `alum_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
MODIFY `are_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `area_hogar`
--
ALTER TABLE `area_hogar`
MODIFY `ah_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT de la tabla `colegio`
--
ALTER TABLE `colegio`
MODIFY `col_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT de la tabla `concepto_hogar`
--
ALTER TABLE `concepto_hogar`
MODIFY `ch_id` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `idsession` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cruge_system`
--
ALTER TABLE `cruge_system`
MODIFY `idsystem` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cruge_user`
--
ALTER TABLE `cruge_user`
MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
MODIFY `cur_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
MODIFY `eva_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `eva_hogar`
--
ALTER TABLE `eva_hogar`
MODIFY `eh_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `informe_desarrollo`
--
ALTER TABLE `informe_desarrollo`
MODIFY `id_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `informe_hogar`
--
ALTER TABLE `informe_hogar`
MODIFY `ih_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inf_hogar`
--
ALTER TABLE `inf_hogar`
MODIFY `ih_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `lista_curso`
--
ALTER TABLE `lista_curso`
MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `parametro`
--
ALTER TABLE `parametro`
MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pre_curso`
--
ALTER TABLE `pre_curso`
MODIFY `pre_id` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `temp`
--
ALTER TABLE `temp`
MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
