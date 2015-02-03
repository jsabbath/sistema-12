-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2015 a las 18:00:31
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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nombre1`, `usu_nombre2`, `usu_apepat`, `usu_apemat`, `usu_rut`, `usu_estado`, `usu_iduser`) VALUES
(2, 'vshbsbh', 'sfhkvbkrb', 'dfkvbhk', 'dfkbjhdkbq', '18.361.129-1', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`usu_id`), ADD UNIQUE KEY `usu_rut` (`usu_rut`), ADD KEY `usu_estado` (`usu_estado`), ADD KEY `usu_iduser` (`usu_iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `usu_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`usu_iduser`) REFERENCES `cruge_user` (`iduser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
