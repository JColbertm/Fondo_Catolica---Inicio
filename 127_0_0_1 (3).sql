-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2016 a las 23:44:41
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fondo_catolica`
--
CREATE DATABASE IF NOT EXISTS `fondo_catolica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fondo_catolica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conectados`
--

CREATE TABLE `conectados` (
  `idConectados` int(4) NOT NULL,
  `idUsuario` int(4) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_secundario`
--

CREATE TABLE `datos_secundario` (
  `idDatos` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `celular` int(11) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `correos` varchar(50) NOT NULL,
  `interno` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_secundario`
--

INSERT INTO `datos_secundario` (`idDatos`, `idUsuario`, `direccion`, `telefono`, `celular`, `departamento`, `correos`, `interno`) VALUES
(1, 18, 'ertetert', 456456, 456456, 'ttyfyftyfty', '0', 5654),
(2, 19, 'rtert', 54535, 3445345, 'rtrtyrtytr', 'etertetr', 4535),
(3, 20, 'ertert', 345, 345, 'ertert', 'rtertret', 345),
(4, 21, 'werwer', 234234, 234234, 'efddfd', 'werwerw', 324),
(5, 22, 'etttt', 45, 34, 'rte', 'ertert', 345),
(6, 23, 'erterte', 345, 35345, 'erterter etert', 'etertert', 234234),
(7, 24, 'eertert', 34543, 35434, 'ertertert', 'ertertet', 34535),
(8, 25, 'tyergdfg', 34534534, 5645645, 'dfgdfgdg', 'dfgdfgdfg', 53453),
(9, 26, 'dfgdfgdfg', 34234, 345345, 'ertergdf', 'dgdfgdfg', 345),
(10, 27, 'eertertert', 34345, 345345, 'gdfgdfgdfg', 'ertertert', 345),
(11, 28, 'retret', 3432, 23423, 'ertetertre', 'ertertert', 4324),
(12, 29, 'retret', 3432, 23423, 'ertetertre', 'ertertert', 4324),
(13, 30, 'werwer', 234, 234, 'wrwerwer', 'eterte', 234),
(14, 31, 'sdfsdf', 234, 234, 'sfsdfsdf', 'fsdfsdfs', 234),
(15, 32, 'erwerwe', 234, 234, 'werwer', 'werwer', 234),
(16, 33, 'erwerwe', 234, 234, 'werwer', 'werwer', 234),
(17, 34, 'erwerwe', 234, 234, 'werwer', 'werwer', 234),
(18, 35, 'ertet', 4535, 4535, 'gdfgdfgdf', 'dfgdfgdfg', 5345),
(19, 36, 'villa san antonio', 4324, 23423, 'derecho', 'dddd@email.com', 234),
(20, 37, 'la paz', 34534, 345345, 'pastoral', 'correo@email.com', 453),
(21, 38, 'la paz', 34534, 35345, 'pastoral', 'correo', 324),
(22, 39, 'ertert', 435, 6546, 'trtrter', 'rtryrtytry', 546),
(23, 40, '', 0, 0, '', '', 0),
(24, 41, 'ert', 56, 45, 'rty', 'rtyty', 456),
(25, 42, 'qwewe', 234234, 3242, 'erwer', 'erwrwer', 234),
(26, 43, '34534534', 34534, 5345, '345', '435', 345),
(27, 44, 'villa san antonio', 2237189, 61189940, 'combo', 'j@faljfd.com', 1234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directiva`
--

CREATE TABLE `directiva` (
  `idDirectiva` int(4) NOT NULL,
  `idUsuario` int(4) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL,
  `duracion` date DEFAULT NULL,
  `comite` varchar(30) DEFAULT NULL,
  `cargo` varchar(30) DEFAULT NULL,
  `estado` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form_afiliacion`
--

CREATE TABLE `form_afiliacion` (
  `idAfiliacion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `form_afiliacion`
--

INSERT INTO `form_afiliacion` (`idAfiliacion`, `idUsuario`, `fecha`, `hora`) VALUES
(1, 19, '0000-00-00', '838:59:59'),
(2, 20, '2016-05-04', '00:00:00'),
(3, 21, '2016-05-04', '19:19:21'),
(4, 22, '2016-05-04', '19:35:15'),
(5, 23, '2016-05-04', '05:53:00'),
(6, 24, '2016-05-04', '02:08:00'),
(7, 25, '2016-05-09', '04:24:00'),
(8, 1, '2016-05-09', '10:35:00'),
(9, 1, '2016-05-09', '04:35:00'),
(10, 1, '2016-05-09', '10:41:00'),
(11, 1, '2016-05-09', '04:46:00'),
(12, 1, '2016-05-09', '04:47:00'),
(13, 1, '2016-05-09', '04:48:00'),
(14, 1, '2016-05-09', '04:51:00'),
(15, 1, '2016-05-09', '04:52:00'),
(16, 1, '2016-05-09', '04:53:00'),
(17, 1, '2016-05-09', '04:53:00'),
(18, 1, '2016-05-09', '04:56:00'),
(19, 1, '2016-05-09', '05:56:00'),
(20, 1, '2016-05-09', '07:24:00'),
(21, 1, '2016-05-09', '07:28:00'),
(22, 1, '2016-05-09', '07:29:00'),
(23, 1, '2016-05-09', '07:32:00'),
(24, 1, '2016-05-09', '07:32:00'),
(25, 1, '2016-05-09', '07:33:00'),
(26, 1, '2016-05-09', '07:37:00'),
(27, 1, '2016-05-09', '03:12:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_sueldo`
--

CREATE TABLE `historial_sueldo` (
  `idHistorial_sueldo` int(4) NOT NULL,
  `cantidad_sueldo` float DEFAULT NULL,
  `monto_aporte` float DEFAULT NULL,
  `idMes` int(4) DEFAULT NULL,
  `idUsuario` int(4) DEFAULT NULL,
  `liquido` float NOT NULL,
  `literal` varchar(50) NOT NULL,
  `antiguedad` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_sueldo`
--

INSERT INTO `historial_sueldo` (`idHistorial_sueldo`, `cantidad_sueldo`, `monto_aporte`, `idMes`, `idUsuario`, `liquido`, `literal`, `antiguedad`) VALUES
(12, 45, 354, 1, 35, 345, '', 0),
(13, 234, 234, 1, 36, 24, 'effffffffffffffffffffffffffff', 6),
(14, 4000, 50, 1, 37, 3900, 'cincuenta', 6),
(15, 4000, 50, 3, 38, 3900, 'cincuenta', 6),
(16, 546, 345, 2, 39, 456, 'ertertert', 45),
(18, 56, 456, 2, 41, 456, 'ryrtyrt', 6),
(19, 234, 324, 3, 42, 234, 'werwerwer', 234),
(20, 345, 345, 2, 43, 435, '345345', 345),
(21, 1000, 50, 6, 44, 800, 'cincuenta', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes`
--

CREATE TABLE `mes` (
  `idMes` int(4) NOT NULL,
  `mes` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mes`
--

INSERT INTO `mes` (`idMes`, `mes`) VALUES
(1, 'enero'),
(2, 'febrero'),
(3, 'marzo'),
(4, 'abril'),
(5, 'mayo'),
(6, 'junio'),
(7, 'julio'),
(8, 'agosto'),
(9, 'septiembre'),
(10, 'octubre'),
(11, 'noviembre'),
(12, 'diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE `parametros` (
  `idParametros` int(11) NOT NULL,
  `parametro` varchar(20) NOT NULL,
  `condicion` varchar(11) NOT NULL,
  `imagen` mediumblob NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`idParametros`, `parametro`, `condicion`, `imagen`, `fecha_creacion`) VALUES
(1, 'antiguedad', '5', '', '0000-00-00'),
(2, 'aporte_min', '50', '', '0000-00-00');
INSERT INTO `parametros` (`idParametros`, `parametro`, `condicion`, `imagen`, `fecha_creacion`) VALUES
INSERT INTO `parametros` (`idParametros`, `parametro`, `condicion`, `imagen`, `fecha_creacion`) VALUES

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `idTipo_usuario` int(4) NOT NULL,
  `tipo_usuario` varchar(20) NOT NULL,
  `fechaMod` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idTipo_usuario`, `tipo_usuario`, `fechaMod`) VALUES
(1, 'afiliado', '0000-00-00'),
(2, 'secretaria', '0000-00-00'),
(3, 'superadmin', '0000-00-00'),
(4, 'administrativo', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(4) NOT NULL,
  `ci` int(11) NOT NULL,
  `nombre` varchar(15) DEFAULT NULL,
  `nombre2` varchar(15) DEFAULT NULL,
  `apellido_p` varchar(15) DEFAULT NULL,
  `apellido_m` varchar(15) DEFAULT NULL,
  `idTipo_usuario` int(4) DEFAULT NULL,
  `idUsuarioCreador` int(4) NOT NULL,
  `password` varchar(15) NOT NULL,
  `idAfiliacion` int(4) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `ci`, `nombre`, `nombre2`, `apellido_p`, `apellido_m`, `idTipo_usuario`, `idUsuarioCreador`, `password`, `idAfiliacion`, `nombre_usuario`) VALUES
(1, 2, 'secre', 'secre', 'secre', 'secre', 2, 1, '1234', 0, ''),
(3, 3424, 'sdfsdf', 'ssdfsd', 'sfsdf', 'sfsdf', 1, 1, '1234', 0, ''),
(4, 0, '', '', '', '', 1, 1, '1234', 0, ''),
(5, 0, '', '', '', '', 1, 1, '1234', 0, ''),
(6, 0, '', '', '', '', 1, 1, '1234', 0, ''),
(7, 0, '', '', '', '', 1, 1, '1234', 0, ''),
(8, 0, '', '', '', '', 1, 1, '1234', 0, ''),
(9, 0, '', '', '', '', 1, 1, '1234', 0, ''),
(10, 546456, 'rytrt', 'ryrty', 'rtyrty', 'rtyutyu', 1, 1, '1234', 0, ''),
(11, 0, '', '', '', '', 1, 1, '1234', 0, ''),
(12, 0, '', '', '', '', 1, 1, '1234', 0, ''),
(13, 0, '', '', '', '', 1, 1, '1234', 0, ''),
(14, 345345, 'fgf', 'fhfgh', 'ertert', 'eterter', 1, 1, '1234', 0, ''),
(15, 0, '', '', '', '', 1, 1, '1234', 0, ''),
(16, 43, 'ret', 'tryrty', 'yrtyrty', 'rtyrty', 1, 1, '1234', 0, ''),
(17, 4546, 'tretrtr', 'etetertert', 'rtrtrtret', 'rttrtret', 1, 1, '1234', 0, ''),
(18, 45645, 'rtyrty', 'ryrtyrtyrt', 'ryrtyrt', 'ryrtyrty', 1, 1, '1234', 0, ''),
(19, 45345, 'rttryrty', 'ryrtyr', 'rtyerrert', 'etrert', 1, 1, '1234', 0, ''),
(20, 4534, 'ertert', 'erterter', 'rtyrty', 'rtyeter', 1, 1, '1234', 0, ''),
(21, 234, 'rerwerwer', 'wreew', 'etrterter', 'werwer', 1, 1, '1234', 0, ''),
(22, 5345, 'erter', 'eter', 'hrtyt', 'rtert', 1, 1, '1234', 0, ''),
(23, 34534, 'etert', 'rtyrty', 'erwer', 'terte', 1, 1, '1234', 0, ''),
(24, 234234, 'rerewrw', 'rwr', 'rtert', 'rete', 1, 1, '1234', 0, ''),
(25, 345353, 'fsdfsd', 'sdfsdf', 'sdfsdfsd', 'sfsdff', 1, 1, '1234', 0, ''),
(26, 3424, 'ewrwer', 'werwerw', 'dfsdfs', 'sdsdfs', 1, 1, '1234', 0, ''),
(27, 342342, 'ertertret', 'erterter', 'tfhfgh', 'ertert', 1, 1, '1234', 0, ''),
(28, 234234, 'erwer', 'werwer', 'werwere', 'werwer', 1, 1, '1234', 11, ''),
(29, 234234, 'erwer', 'werwer', 'werwere', 'werwer', 1, 1, '1234', 12, ''),
(30, 234234, 'erter', 'ertert', 'wewerwe', 'werwer', 1, 1, '1234', 13, ''),
(31, 234234, 'sfsdfsdf', 'sfsdf', 'sdfsdf', 'sdfsds', 1, 1, '1234', 14, ''),
(32, 2342, 'werwer', 'nnnnn', 'werwer', 'sssss', 1, 1, '1234', 15, ''),
(33, 2342, 'werwer', 'mmmm', 'werwer', 'wwwwwwwww', 1, 1, '1234', 16, ''),
(34, 2342, 'werwer', 'qqqqqqq', 'werwer', 'erwr', 1, 1, '1234', 17, ''),
(35, 34535, 'tertert', 'dgdfg', 'gdfgdf', 'dgfgd', 1, 1, '1234', 18, ''),
(36, 234, 'daynor', 'eduardo', 'nogales', 'blanco', 1, 1, '1234', 19, ''),
(37, 34345, 'ana', 'teresa', 'ramos', 'morales', 1, 1, '1234', 20, ''),
(38, 3445, 'ana', 'teres', 'ramos', 'flores', 1, 1, '1234', 21, ''),
(39, 34534, 'ertert', 'erter', 'ertert', 'ertert', 1, 1, '1234', 22, ''),
(40, 345, 'ertertre', 'erter', 'tretert', 'ertert', 1, 1, '1234', 23, ''),
(41, 345, 'ertertre', 'erter', 'tretert', 'ertert', 1, 1, '1234', 24, ''),
(42, 345345, 'teresa', 'ranos', 'llanos', 'flores', 1, 1, '1234', 25, ''),
(43, 21313, 'maria', 'renee', 'canqui', 'macias', 1, 1, '1234', 26, 'm.canqui.m'),
(44, 682622, 'javier', 'gonzalo', 'colbert', 'martinez', 1, 1, '1234', 27, 'j.colbert.m');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conectados`
--
ALTER TABLE `conectados`
  ADD PRIMARY KEY (`idConectados`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `datos_secundario`
--
ALTER TABLE `datos_secundario`
  ADD PRIMARY KEY (`idDatos`);

--
-- Indices de la tabla `directiva`
--
ALTER TABLE `directiva`
  ADD PRIMARY KEY (`idDirectiva`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `form_afiliacion`
--
ALTER TABLE `form_afiliacion`
  ADD PRIMARY KEY (`idAfiliacion`);

--
-- Indices de la tabla `historial_sueldo`
--
ALTER TABLE `historial_sueldo`
  ADD PRIMARY KEY (`idHistorial_sueldo`),
  ADD KEY `idMes` (`idMes`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `mes`
--
ALTER TABLE `mes`
  ADD PRIMARY KEY (`idMes`);

--
-- Indices de la tabla `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`idParametros`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`idTipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idTipo_usuario` (`idTipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conectados`
--
ALTER TABLE `conectados`
  MODIFY `idConectados` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `datos_secundario`
--
ALTER TABLE `datos_secundario`
  MODIFY `idDatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `directiva`
--
ALTER TABLE `directiva`
  MODIFY `idDirectiva` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `form_afiliacion`
--
ALTER TABLE `form_afiliacion`
  MODIFY `idAfiliacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `historial_sueldo`
--
ALTER TABLE `historial_sueldo`
  MODIFY `idHistorial_sueldo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `mes`
--
ALTER TABLE `mes`
  MODIFY `idMes` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `parametros`
--
ALTER TABLE `parametros`
  MODIFY `idParametros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `idTipo_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conectados`
--
ALTER TABLE `conectados`
  ADD CONSTRAINT `conectados_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `directiva`
--
ALTER TABLE `directiva`
  ADD CONSTRAINT `directiva_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `historial_sueldo`
--
ALTER TABLE `historial_sueldo`
  ADD CONSTRAINT `historial_sueldo_ibfk_1` FOREIGN KEY (`idMes`) REFERENCES `mes` (`idMes`),
  ADD CONSTRAINT `historial_sueldo_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idTipo_usuario`) REFERENCES `tipo_usuario` (`idTipo_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;