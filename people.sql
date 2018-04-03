-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-04-2018 a las 00:26:51
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `people`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida`
--

CREATE TABLE `comida` (
  `idcomida` int(11) NOT NULL,
  `cocina` varchar(11) NOT NULL,
  `peticion` longtext NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `fecha_peticion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comida`
--

INSERT INTO `comida` (`idcomida`, `cocina`, `peticion`, `usuario`, `fecha_peticion`) VALUES
(1, 'Socorrito', 'Rataburguesa', 'Eric', '2018-01-11 16:13:48'),
(2, 'Morena Mia', 'Rataburguer', 'Eric', '2018-01-11 16:14:13'),
(3, 'Morena Mia', 'Rataburguer', 'Eric', '2018-01-11 16:15:28'),
(4, 'Morena Mia', 'Hamburguesa/Con papas/ salchichingas', 'Eric', '2018-01-11 16:28:26'),
(5, 'Morena Mia', 'Sopa/Hamburguesa', 'Eric', '2018-03-06 22:49:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people_admin`
--

CREATE TABLE `people_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `createdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `people_admin`
--

INSERT INTO `people_admin` (`id`, `name`, `username`, `password`, `createdtime`) VALUES
(1, '', '', '', '2017-11-21 22:33:44'),
(3, 'admin', 'admin', 'admin', '2017-11-21 22:37:40'),
(4, 'Eric', 'Eric', 'Eric', '2017-11-21 22:39:22'),
(5, 'Andres Santiago', 'asantiago', 'ddae7432ccc3dce9c279b20daf6b6631', '2017-11-21 22:40:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendita`
--

CREATE TABLE `tiendita` (
  `id` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `cantidad` int(1) NOT NULL,
  `username` varchar(200) NOT NULL,
  `createdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiendita`
--

INSERT INTO `tiendita` (`id`, `producto`, `cantidad`, `username`, `createdtime`) VALUES
(22, 'cacahuates', 1, 'Eric', '2017-11-15 20:08:45'),
(23, 'tamales', 1, 'Eric', '2017-11-15 20:10:20'),
(45, 'sdafsdaf', 1, 'Eric', '2017-11-16 18:26:15'),
(46, 'sdafsdf', 1, 'Eric', '2017-11-16 18:26:19'),
(55, 'fsdgfdsg', 1, 'Eric', '2017-11-17 22:33:09'),
(56, 'dsfgsfdgsdf', 1, 'Eric', '2017-11-17 22:41:37'),
(57, 'dgdasgdfag', 1, 'Eric', '2017-11-17 22:41:40'),
(58, 'Prueba2', 1, 'Eric', '2017-11-21 18:28:09'),
(71, 'asfsadfasgadg', 1, 'Eric', '2017-11-23 19:09:31'),
(72, 'reqwrewqtr', 1, 'Eric', '2017-11-23 19:09:34'),
(73, 'Cvbvcxbx', 1, 'Luis Cedillo', '2017-11-24 20:17:47'),
(74, 'vcnvcbnbvcn', 1, 'Luis Cedillo', '2017-11-24 20:17:50'),
(75, 'Galletitas', 2, 'Andres Santiago', '2017-11-29 19:42:06'),
(76, 'Porro', 1, 'Gerardo', '2017-11-29 19:48:42'),
(77, 'Sable Ninja', 1, 'Gerardo', '2017-11-29 19:48:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_profile`
--

CREATE TABLE `users_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `hire_date` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `vacations` int(2) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `jefe_inmediato` tinyint(1) NOT NULL,
  `rh` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users_profile`
--

INSERT INTO `users_profile` (`id`, `name`, `apellido`, `email`, `puesto`, `hire_date`, `gender`, `birthday`, `telephone`, `address`, `department`, `vacations`, `profile_pic`, `password`, `usertype`, `jefe_inmediato`, `rh`, `admin`) VALUES
(29, 'Luis Cedillo', '', 'lcedillo@idric.com.mx', '', '0000-00-00', '', '0000-00-00', '', '', '', 0, '', '2f1e49b6503c31fecd97ed6fff906f78', 'admin', 0, 0, 0),
(34, 'ToÃ±o Loba', '', 'jruiz@idric.com.mx', '', '2017-11-25', 'Male', '2017-11-11', '5463663456', 'rwerwer', 'Operaciones', 2, '', '18547efa7632fbb3c891a493cb1385b5', 'user', 1, 0, 0),
(37, 'Gerardo', '', 'gvarillas@idric.com.mx', '', '2017-11-17', 'Male', '2017-11-14', '5543645367457', 'Coyoyoyo', 'Operaciones', 6, '', '4a5240849ccd770467a76c3cc90d9835', 'user', 0, 0, 0),
(38, 'Perra Loba', '', 'perra@loba.au', '', '0000-00-00', '', '0000-00-00', '', '', '', 0, '', 'f6a93ef053d973f2161f44d7851430a7', 'admin', 0, 0, 0),
(46, 'Andres', '', 'asantiago@idric.com.mx', '', '2017-12-04', 'Male', '2017-12-04', '6556436546', 'Una direcciÃ³n', 'Operaciones', 2, '', 'ddae7432ccc3dce9c279b20daf6b6631', 'admin', 1, 0, 1),
(48, 'El ToÃ±Ã³n', '', 'eltono@idric.com', '', '0006-12-25', 'Femeni', '2059-12-26', '', 'no se, creo que en Iztapalapa', '', 2, '', 'a7c1c0fe2d8d5fefbc4bc9df5dcfd5bb', 'admin', 0, 0, 1),
(50, 'Eric', 'Ocampo', 'eocampo@idric.com.mx', '', '2017-12-08', 'Mascul', '2017-12-08', '656463463457', 'Creo que en Coyoacan', 'Operaciones', 7, '', '141037f0eb4a6ff3c6bcf4d195f844df', 'admin', 0, 0, 1),
(51, 'Jaime', 'Martinez', 'jmartinez@idric.com.mx', '', '2017-12-14', 'Masculino', '2017-12-08', '5564574568', 'Neza', 'Operaciones', 4, '', '7ade497d45dfff9eab8ff682a02313df', 'user', 1, 0, 0),
(52, 'Fabiola', 'Gallegos', 'fgallegos@idric.com.mx', '', '2017-12-15', 'Masculino', '2017-12-01', '5643635463', 'DirecciÃ³n', 'Finanzas', 4, '', '6d919fc4b0be32abffd8313f668e03d3', 'user', 0, 1, 0),
(53, 'Claudia', 'Rh', 'claudia@idric.com.mx', '', '2018-02-01', 'Femenino', '2018-02-21', '12364782361578 ext 12', 'Prueba', 'Finanzas', 4, '', '943b0922e17bd77101f13910525dcec7', 'admin', 0, 1, 1),
(54, 'Ivan', 'Osorio', 'iosorio@idric.com.mx', 'puesto', '2018-03-07', 'Masculino', '2018-03-01', '32532452345', 'no se', 'Operaciones', 6, '', '7370f838452fbc6e28266ec30eb651e8', 'user', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones`
--

CREATE TABLE `vacaciones` (
  `idvacacion` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `dias_periodo1` int(80) NOT NULL,
  `dias_periodo2` int(80) NOT NULL,
  `dias_solicitados` int(11) NOT NULL,
  `dias_disfrutar` int(11) NOT NULL,
  `fecha_disfrutar1` date NOT NULL,
  `fecha_disfrutar2` date NOT NULL,
  `fecha_regreso` date NOT NULL,
  `jefe_inmediato` varchar(100) NOT NULL,
  `status_aprobacion_jefe` varchar(50) NOT NULL,
  `status_aprobacion_rh` varchar(50) NOT NULL,
  `fecha_peticion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacaciones`
--

INSERT INTO `vacaciones` (`idvacacion`, `nombre`, `departamento`, `puesto`, `dias_periodo1`, `dias_periodo2`, `dias_solicitados`, `dias_disfrutar`, `fecha_disfrutar1`, `fecha_disfrutar2`, `fecha_regreso`, `jefe_inmediato`, `status_aprobacion_jefe`, `status_aprobacion_rh`, `fecha_peticion`) VALUES
(1, 'Andres', 'Operaciones', '', 2000, 2000, 1, 0, '0000-00-00', '0000-00-00', '0000-00-00', 'Andres Santiago', '', '', '2017-11-24 16:41:44'),
(2, 'Andres', 'Operaciones', '', 2000, 2000, 1, 0, '0000-00-00', '0000-00-00', '0000-00-00', 'Andres Santiago', '', '', '2017-11-24 16:41:46'),
(3, 'Andres', 'Operaciones', '', 2000, 2000, 1, 0, '0000-00-00', '0000-00-00', '0000-00-00', 'Andres Santiago', '', '', '2017-11-24 16:42:47'),
(4, 'Andres', 'Operaciones', '', 2000, 2000, 1, 0, '0000-00-00', '0000-00-00', '0000-00-00', 'Andres Santiago', '', '', '2017-11-24 16:42:53'),
(5, 'Andres', 'Operaciones', '', 2005, 2009, 1, 0, '2017-11-24', '2017-11-24', '2017-11-24', 'Andres Santiago', '', '', '2017-11-24 16:43:08'),
(6, 'Eric', 'Operaciones', '', 2000, 2000, 1, 3, '2017-11-24', '2017-11-29', '2017-12-02', 'ToÃ±o Loba', 'Aprobada', 'Aprobada', '2017-12-13 17:15:48'),
(7, 'Andres', 'Operaciones', '', 2000, 2000, 1, 2, '0000-00-00', '0000-00-00', '0000-00-00', 'Lulu', '', '', '2017-11-28 19:56:57'),
(8, 'Eric', 'Operaciones', '', 2017, 2018, 1, 3, '2017-11-10', '2017-11-29', '2017-12-02', 'Lulu', '', '', '2017-11-28 23:05:44'),
(9, 'Jaime', 'Operaciones', '', 2017, 2018, 3, 0, '2017-12-21', '2017-12-31', '2017-11-30', 'ToÃ±o Loba', 'Aprobada', '', '2017-11-29 19:31:40'),
(10, 'Eric', 'Operaciones', '', 2000, 2000, 1, 0, '0000-00-00', '0000-00-00', '0000-00-00', 'ToÃ±o Loba', 'Pendiente', 'Pendiente', '2017-12-11 17:29:42'),
(11, 'Eric', 'Operaciones', '', 2011, 2017, 1, 7, '2017-12-22', '2017-12-27', '2017-12-30', 'Jaime', 'Aprobada', 'Rechazada', '2017-12-13 17:16:01'),
(12, 'Eric', 'Operaciones', '', 2017, 2017, 1, 7, '2017-12-27', '2017-12-29', '2017-12-30', 'Jaime', 'Aprobada', 'Aprobada', '2017-12-27 23:49:27'),
(13, 'Eric', 'Operaciones', '', 2017, 2017, 2, 7, '2018-01-12', '2018-01-17', '2018-01-18', 'Jaime', 'Aprobada', 'Pendiente', '2018-01-11 16:33:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`idcomida`);

--
-- Indices de la tabla `people_admin`
--
ALTER TABLE `people_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiendita`
--
ALTER TABLE `tiendita`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD PRIMARY KEY (`idvacacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comida`
--
ALTER TABLE `comida`
  MODIFY `idcomida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `people_admin`
--
ALTER TABLE `people_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tiendita`
--
ALTER TABLE `tiendita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  MODIFY `idvacacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
