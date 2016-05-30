-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2016 a las 06:01:17
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
(27, 44, 'villa san antonio', 2237189, 61189940, 'combo', 'j@faljfd.com', 1234),
(28, 45, 'Av. 31 de octubre', 134564, 1321546, 'adsadasd', 'asd@das', 2147483647);

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
  `hora` time NOT NULL,
  `idUsuarioCreador` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `form_afiliacion`
--

INSERT INTO `form_afiliacion` (`idAfiliacion`, `idUsuario`, `fecha`, `hora`, `idUsuarioCreador`) VALUES
(1, 19, '0000-00-00', '838:59:59', 0),
(2, 20, '2016-05-04', '00:00:00', 0),
(3, 21, '2016-05-04', '19:19:21', 0),
(4, 22, '2016-05-04', '19:35:15', 0),
(5, 23, '2016-05-04', '05:53:00', 0),
(6, 24, '2016-05-04', '02:08:00', 0),
(7, 25, '2016-05-09', '04:24:00', 0),
(8, 1, '2016-05-09', '10:35:00', 0),
(9, 1, '2016-05-09', '04:35:00', 0),
(10, 1, '2016-05-09', '10:41:00', 0),
(11, 1, '2016-05-09', '04:46:00', 0),
(12, 1, '2016-05-09', '04:47:00', 0),
(13, 1, '2016-05-09', '04:48:00', 0),
(14, 1, '2016-05-09', '04:51:00', 0),
(15, 1, '2016-05-09', '04:52:00', 0),
(16, 1, '2016-05-09', '04:53:00', 0),
(17, 1, '2016-05-09', '04:53:00', 0),
(18, 1, '2016-05-09', '04:56:00', 0),
(19, 1, '2016-05-09', '05:56:00', 0),
(20, 1, '2016-05-09', '07:24:00', 0),
(21, 1, '2016-05-09', '07:28:00', 0),
(22, 1, '2016-05-09', '07:29:00', 0),
(23, 1, '2016-05-09', '07:32:00', 0),
(24, 1, '2016-05-09', '07:32:00', 0),
(25, 1, '2016-05-09', '07:33:00', 0),
(26, 1, '2016-05-09', '07:37:00', 0),
(27, 1, '2016-05-09', '03:12:00', 0),
(28, 45, '0000-00-00', '01:38:00', 1);

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
  `antiguedad` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_sueldo`
--

INSERT INTO `historial_sueldo` (`idHistorial_sueldo`, `cantidad_sueldo`, `monto_aporte`, `idMes`, `idUsuario`, `liquido`, `antiguedad`) VALUES
(12, 45, 354, 1, 35, 345, 0),
(13, 234, 234, 1, 36, 24, 6),
(14, 4000, 50, 1, 37, 3900, 6),
(15, 4000, 50, 3, 38, 3900, 6),
(16, 546, 345, 2, 39, 456, 45),
(18, 56, 456, 2, 41, 456, 6),
(19, 234, 324, 3, 42, 234, 234),
(20, 345, 345, 2, 43, 435, 345),
(21, 1000, 50, 6, 44, 800, 5),
(22, 5000, 50, 2, 45, 4000, 5);

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
INSERT INTO `parametros` (`idParametros`, `parametro`, `condicion`, `imagen`, `fecha_creacion`) VALUES
(5, 'imagen1', 'nada', 0x89504e470d0a1a0a0000000d49484452000000d0000000a40806000000e617a0a3000000017352474200aece1ce90000000467414d410000b18f0bfc61050000000970485973000012740000127401de661f7800000aa249444154785eed9c4b92dcb612457b13de8f67de8017f43cf6a65a8bb287eed7495542975909123f92f8dc1371a3492081ee02f3a84a52481f5f5f5fbf7fe77f0cc3e44704920b424801b708f4f1f1b18590d9b855208a4466e3118130848ccce50279a2a040184246e311811014e8ac9690deb854a05c2150a2dcb5bdf1f9f9f9ba2233d34c20aff9313994aeeb090ab406550261a3e7641544220d99936281dea4f8efb7c3bcd52f808a4381e6255ba037111c596cec1a4c0f5cf92e71e5dee479b204da35be238a175c13d6dabd1e441bfcca26a740f3922cd0aee11d51bce01a9bb73d1f001b9b029112b205f244892508f2eff7faefecf67961efef8402915a92040a4dee48128bae51797a93c836f5554d2efb52a0793915489b7b6b70479458c2ba0c8170ec6a4a04f2d69c45ebc89c240be449721414c29307e7057b7f866d549b336c0dde7b7be81826959c5a3216b708a4e8980dceb5e0ac6163f33a8e5f3525d4ac2563702850686a4790b37842e8988d62ef4bf19a569bf9a8a98fe64a68b917e993cb05522172af6b511972a468d9f02df722fd22dd7a8940125def45c17b3b372239c292f1a1408da13c6b71a94012dd0383e098374f48cf5c2e9044f74139c2df0dc1b8ad21a4776e11488272047940a26d1c6a04fdfd043f16915e391448084ded48911394c31308e705948712915e794420c19347e73d793484f444b2405b733b62e4042511706f9cf3c4d110d213a70209a1b91d297282a278d1efe589a321a42792041242933b62e444f7b151f49ef29011c816686b76478c92ecf67c81f79487f44eb2400236fcd6e48e14a9d9ed03786384f44a9640caaef91d398e826bb7f586d838b9067c161892469140c2db813bb260deea239ccd9376e0f388851c532c90e01d784a8e48a921f58473fef32f373acf67714c9540081eb89714726a4939e19c1d716cb496cfc5a799401e78f8290f20b58e94b39daf23ca51f4b9f0d9bc73a940021efed943389b27756c671b11c3ced9841ab2434ee45281107c58de03f1c6481bb6738d4811cedd19b7f5648f9cc86d0229f88034384eda12ced5c88067adf7b150221f398ddb0542ec83e2036a4f38572390c53b7f1ddbc65feb6ccdcac8493c2a90b27b50a408effcc29891c7d609a7e314e80d39892e0422f5d8e6d6fb6dec44a05dad03ce639d7e5d1579f51468226c736fd7200f0af4f71f3f83b55bfd373827843923a07e5d1579f51468226c736fd727024974cc8e2b3a4781f6c8aba74093a10dbe35b79107054051700d8e2b3a67f7d8c61686024dc8aeb9411cdbfc28c96ecd3714280d79f514683276cd0de2d8e6b79c8e27ecb11a7202146842bca63f6b7e6f5cc7b6f1843d56434e80024d88d7f418aff9758d4d6cfd36b73814686262cd2fb102847b98d37b2f617e71e40428d0a41c09205109820c4e4d2c61cde250a0893993422508323835b184358b43812626578a9c50a09f50a089094dee085013caf30b0a343114e87a28d0c468a3b79468b727a140b3739540e427146852b4c9b5e1b77b4788dc84bdc806059a146c720a741d1468526c93b71048f7a440bfa04093e20954235158ffc2eebf2a146852bc060f123882c4a26bc2da1778bd3214684262cd8d226c358e3036a1d6e08dad08059a90b3e65629b63a471ac9ae26c2d1dc2a50a00949696c14e428479ccdaf00059a909cc6465930a9e4d4cec81002d9878b213e779dcdeacfa06b815094b3903d779c0fcfbd5381721e7e4eed4ad873b9e26caed87334ba13a8f48197ae9b113c0b9b56b4dc6b64ba12a8f641c7d6dbff247076f01c6c5ad172af919153e842a0560fd9db47055a45223c039b16b4da6706e4241e17e88a076cf7a344ed5e77cbbd46474ee25181ae78c0426cdf55256a45cbbd66404ea30b81ae20b6f76aef462da1407b1e15e84a79144ad40ecaf3ceb20229ab88f4f9f91942daf19840dad8770974f47d669708e5a1446d795ca0561c8992fabd2810c9650a81742f0ce28d79ccfc318e025dc3f00279fbd831afc683ef402417e998db054a6de8338ef6b17347b5ca8c0279f248481ba46328d08b550422ed908e1942205d83eb8ef6c9a955f80e4472918ee95a20ad8de508ac49a9e7ef81482ed231dd0aa475b636366ec19ab37a91675681040a740dd231dd0be491b207d69cd553205282744c9702694daccece7ffcf35b88b29b876b0f0a444a908ee95aa0183abf05e44189700fbcf69859202b0f056a87744cf7025931049dc7b9b7e01e70edb19a4012528f744cdf1fe11c31cee6435e35581f63458124a48e470412ce1a7a9bf7a4d0bcd6bb731aad79e58899055228507bc617285217f680ac0e056acf2302e9aff6474dbd35bd238626d4bcf6389c83eb55f1e491903a1e1728d6d83a876278829cae3fa95b0594e6c78f1f6ff2e81cc9a35b8184d0fc461e21cc45d69fcdaf860a825162e3e49c47041250a218310970dccedb319c5b192b89c69b23e948773d2ed05193ebbc17253687d7e4a728faf10d65c17b1d23693c2690902a91a035b13a3b7756bf2a9e2c76cc0bf1e94aa056cdde7abfd14109e4ab7d17f242d2785420a1b544adf699054f0e894884b1f3248d6e04126a9bbf76fd8c5831ac381a9d27793c2e90d042a2d275b383f2483c7930248fee041250863321726a57c68aa242913aba1048b01209568ea39034f09d88d4d3b5408a278c869027194220427aa51b81044a4446631881f8b18df4485702099e44280f25223dd1bd409e3c9a52f44fa2308494d09d40024ae489a36909452225742910e289a3b9028a343e57f687a57b810494e6aec3a144e371778f08430824dc7d3014680cb02f6cee601881ee8602f58b278b04f1c6ae800245a040fd81b29c097236df0a0a148102f501ca922b456e7d0914280205ea831271045ce7a51514c881f28c89274a4a6aa04080888359057dbdf80fed3023902b456e7d0c0a146194c6a9612441625811302994ac41285084d9051af19dc562e7f01ec75328592350a008b30aa4ef3a18c4de3f0936b56d6e3b86f736a914adf90e0532f4d4445780e2e057492fff570236b30dce2bbbb97f5f313529e4ae914a0af4429b2825a3a3afc1be9e5e5e9b36f25114bc0ff2dc2411052a647489623f3f05fab526651d052a84025d0f36b28de28dab3cdb358ce790ba8e02154281ee411b599bd9bbb641bcb11452d74905052a60668162791adbd47a6f837863a9a4aca54085f4d05035e4fefcbd099473adf7b9a4ac95590a54c06a0209de1a19bbeb2cb0a16d73ebbd975252d653a0425614485061743ddee3f8156043dbe6d67b2fa5a4aca740855cd9287750fbf31f0983733939031bda6b6e1dc3d490b20705ca24f561f74eed6b78e20cb0a1f51affc85a08e3afba1a52f6a14099a8405e03c5c67ba4f6e77ce27562436fd72f7950a294a64f25652f0a54c8ea023d8536f5960b054add870215e2c93252534e219004e41174bc96d47d2850052a91865c8f363646b1f7a5787bc7a0400da03cd7830d8d0deea5969c7d28502594e71e6c53ebbd4d2db9fb50a04cf0231be5b90fdbd87a9fd3ec6794ec4981c810788d5dd2f01eb84fee5e14880c41acb9b1f1bdf9336ad60a14880cc15993a30847754a6e7d0c0a448620a5d151889cd44081c830e4343c0ae2a51514880c436af3a32829f5355020320c6742a03467b5ada04064183c2950166ffe6a28101906140485c1f1bba14064187a9106a1408454408108a980021152010522a4020a4448051488900a281021155020422aa040845440810829e6ebebff20841b724de1fbeb0000000049454e44ae426082, '2016-05-30');

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
  `password` varchar(100) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `ci`, `nombre`, `nombre2`, `apellido_p`, `apellido_m`, `idTipo_usuario`, `idUsuarioCreador`, `password`, `nombre_usuario`, `estado`) VALUES
(1, 2, 'secre', 'secre', 'secre', 'secre', 2, 1, 'kRsQhm5QnwNyfTeGuBq5gUxOc4GhqNZj4IQ7kdPWnB4=', 'secre', 1),
(35, 34535, 'tertert', 'dgdfg', 'gdfgdf', 'dgfgd', 1, 1, '1234', '', 0),
(36, 234, 'daynor', 'eduardo', 'nogales', 'blanco', 1, 1, '1234', '', 0),
(37, 34345, 'ana', 'teresa', 'ramos', 'morales', 1, 1, '1234', '', 0),
(38, 3445, 'ana', 'teres', 'ramos', 'flores', 1, 1, '1234', '', 0),
(39, 34534, 'ertert', 'erter', 'ertert', 'ertert', 1, 1, '1234', '', 0),
(40, 345, 'ertertre', 'erter', 'tretert', 'ertert', 1, 1, '1234', '', 0),
(41, 345, 'ertertre', 'erter', 'tretert', 'ertert', 1, 1, '1234', '', 0),
(42, 345345, 'teresa', 'ranos', 'llanos', 'flores', 1, 1, '1234', '', 0),
(43, 21313, 'maria', 'renee', 'canqui', 'macias', 1, 1, '1234', '', 0),
(44, 682622, 'javier', 'gonzalo', 'colbert', 'martinez', 3, 1, 'kRsQhm5QnwNyfTeGuBq5gUxOc4GhqNZj4IQ7kdPWnB4=', 'j.colbert.m', 1),
(45, 20481010, 'Diego', '', 'Diego', '', 1, 1, 'kRsQhm5QnwNyfTeGuBq5gUxOc4GhqNZj4IQ7kdPWnB4=', 'D.Diego.', 1);

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
  MODIFY `idDatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `directiva`
--
ALTER TABLE `directiva`
  MODIFY `idDirectiva` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `form_afiliacion`
--
ALTER TABLE `form_afiliacion`
  MODIFY `idAfiliacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `historial_sueldo`
--
ALTER TABLE `historial_sueldo`
  MODIFY `idHistorial_sueldo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `mes`
--
ALTER TABLE `mes`
  MODIFY `idMes` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `parametros`
--
ALTER TABLE `parametros`
  MODIFY `idParametros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `idTipo_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
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