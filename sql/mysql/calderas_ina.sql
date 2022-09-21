-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-09-2022 a las 20:43:26
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `calderas_ina`
--
USE calderas_ina;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caldera`
--

CREATE TABLE `caldera` (
  `Id` int(11) NOT NULL,
  `Num_Caldera` int(11) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `caldera`
--

INSERT INTO `caldera` (`Id`, `Num_Caldera`, `Fecha`) VALUES
(1, 1, '2022-08-31 03:21:49'),
(2, 2, '2022-08-31 03:21:49'),
(3, 3, '2022-08-31 03:21:49'),
(4, 4, '2022-08-31 03:21:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caldera_medicion`
--

CREATE TABLE `caldera_medicion` (
  `caldera_medicion_id` int(11) NOT NULL,
  `caldera_id` int(11) NOT NULL,
  `medicion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `caldera_medicion`
--

INSERT INTO `caldera_medicion` (`caldera_medicion_id`, `caldera_id`, `medicion_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 1),
(9, 2, 2),
(10, 2, 3),
(11, 2, 4),
(12, 2, 5),
(13, 2, 6),
(14, 2, 7),
(15, 3, 1),
(16, 3, 2),
(17, 3, 3),
(18, 3, 4),
(19, 3, 5),
(20, 3, 6),
(21, 3, 7),
(22, 4, 1),
(23, 4, 2),
(24, 4, 3),
(25, 4, 4),
(26, 4, 5),
(27, 4, 6),
(28, 4, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_parametro_medicion_caldera`
--

CREATE TABLE `configuracion_parametro_medicion_caldera` (
  `caldera_medicion_id` int(11) NOT NULL,
  `parametro_medicion_id` int(11) NOT NULL,
  `valor` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `fecha_grabacion` datetime DEFAULT current_timestamp(),
  `fecha_actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `configuracion_parametro_medicion_caldera`
--

INSERT INTO `configuracion_parametro_medicion_caldera` (`caldera_medicion_id`, `parametro_medicion_id`, `valor`, `fecha_grabacion`, `fecha_actualizacion`) VALUES
(1, 1, '20.0', '2022-09-02 18:41:40', NULL),
(1, 2, '10.0', '2022-09-02 18:41:40', NULL),
(4, 3, '23.0', '2022-09-02 18:41:40', NULL),
(4, 4, '13.0', '2022-09-02 18:41:40', NULL),
(8, 1, '20.0', '2022-09-02 18:41:40', NULL),
(8, 2, '10.0', '2022-09-02 18:41:40', NULL),
(11, 3, '23.0', '2022-09-02 18:41:40', NULL),
(11, 4, '13.0', '2022-09-02 18:41:40', NULL),
(15, 1, '20.0', '2022-09-02 18:41:40', NULL),
(15, 2, '10.0', '2022-09-02 18:41:40', NULL),
(18, 3, '23.0', '2022-09-02 18:41:40', NULL),
(18, 4, '13.0', '2022-09-02 18:41:40', NULL),
(22, 1, '20.0', '2022-09-02 18:41:40', NULL),
(22, 2, '10.0', '2022-09-02 18:41:40', NULL),
(25, 3, '23.0', '2022-09-02 18:41:40', NULL),
(25, 4, '13.0', '2022-09-02 18:41:40', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flama`
--

CREATE TABLE `flama` (
  `Id` int(11) NOT NULL,
  `id_caldera` int(11) NOT NULL,
  `Flama` int(11) NOT NULL,
  `Fecha` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `flama`
--

INSERT INTO `flama` (`Id`, `id_caldera`, `Flama`, `Fecha`) VALUES
(1, 1, 1, '2022-08-31 05:30:09.000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gaspropano`
--

CREATE TABLE `gaspropano` (
  `Id` int(11) NOT NULL,
  `id_caldera` int(11) NOT NULL,
  `GPropano` tinyint(1) NOT NULL,
  `Fecha` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `gaspropano`
--

INSERT INTO `gaspropano` (`Id`, `id_caldera`, `GPropano`, `Fecha`) VALUES
(1, 1, 8, '2022-08-31 05:30:09.000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicion`
--

CREATE TABLE `medicion` (
  `medicion_id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_bin NOT NULL,
  `nombre_pretty` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `activo_p` tinyint(4) DEFAULT 1,
  `fecha_grabacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `medicion`
--

INSERT INTO `medicion` (`medicion_id`, `nombre`, `nombre_pretty`, `activo_p`, `fecha_grabacion`, `fecha_actualizacion`) VALUES
(1, 'temp_agua', 'Temperatura de Agua', 1, '2022-09-02 18:41:40', NULL),
(2, 'presion_vapor', 'Presión de Vapor', 1, '2022-09-02 18:41:40', NULL),
(3, 'nivel_agua', 'Nivel de Agua', 1, '2022-09-02 18:41:40', NULL),
(4, 'temp_chimenea', 'Temperatura de Chimenea', 1, '2022-09-02 18:41:40', NULL),
(5, 'presion_bunker', 'Presión de Bunker', 1, '2022-09-02 18:41:40', NULL),
(6, 'gas_propano', 'Gas Propano', 1, '2022-09-02 18:41:40', NULL),
(7, 'flama', 'Flama', 1, '2022-09-02 18:41:40', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ni_deaguaalto`
--

CREATE TABLE `ni_deaguaalto` (
  `Id` int(11) NOT NULL,
  `id_caldera` int(11) NOT NULL,
  `NiveA` tinyint(1) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ni_deaguaalto`
--

INSERT INTO `ni_deaguaalto` (`Id`, `id_caldera`, `NiveA`, `Fecha`) VALUES
(1, 1, 99, '2022-08-31 03:27:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ni_deaguabajo`
--

CREATE TABLE `ni_deaguabajo` (
  `Id` int(11) NOT NULL,
  `id_caldera` int(11) NOT NULL,
  `NivelB` tinyint(1) NOT NULL,
  `Fecha` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ni_deaguabajo`
--

INSERT INTO `ni_deaguabajo` (`Id`, `id_caldera`, `NivelB`, `Fecha`) VALUES
(1, 1, 1, '2022-08-31 05:30:09.000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro_medicion`
--

CREATE TABLE `parametro_medicion` (
  `parametro_medicion_id` int(11) NOT NULL,
  `medicion_id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `nombre_pretty` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `tipo_dato` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `activo_p` tinyint(4) DEFAULT 1,
  `fecha_grabacion` datetime DEFAULT current_timestamp(),
  `fecha_actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `parametro_medicion`
--

INSERT INTO `parametro_medicion` (`parametro_medicion_id`, `medicion_id`, `nombre`, `nombre_pretty`, `tipo_dato`, `activo_p`, `fecha_grabacion`, `fecha_actualizacion`) VALUES
(1, 1, 'temp_max', 'Temperatura Máxima', 'DECIMAL', 1, '2022-09-02 18:41:40', NULL),
(2, 1, 'temp_min', 'Temperatura Mínima', 'DECIMAL', 1, '2022-09-02 18:41:40', NULL),
(3, 4, 'temp_max', 'Temperatura Máxima', 'DECIMAL', 1, '2022-09-02 18:41:40', NULL),
(4, 4, 'temp_min', 'Temperatura Mínima', 'DECIMAL', 1, '2022-09-02 18:41:40', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prebunker`
--

CREATE TABLE `prebunker` (
  `Id` int(11) NOT NULL,
  `id_caldera` int(11) NOT NULL,
  `PreBunke` tinyint(1) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `prebunker`
--

INSERT INTO `prebunker` (`Id`, `id_caldera`, `PreBunke`, `Fecha`) VALUES
(1, 1, 4, '2022-08-31 05:30:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pr_altovapor`
--

CREATE TABLE `pr_altovapor` (
  `Id` int(11) NOT NULL,
  `id_caldera` int(11) NOT NULL,
  `PrAlto` tinyint(1) NOT NULL,
  `Fecha` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pr_altovapor`
--

INSERT INTO `pr_altovapor` (`Id`, `id_caldera`, `PrAlto`, `Fecha`) VALUES
(1, 1, 5, '2022-08-31 05:30:09.000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pr_bajavapor`
--

CREATE TABLE `pr_bajavapor` (
  `Id` int(11) NOT NULL,
  `id_caldera` int(11) NOT NULL,
  `PreBaja` tinyint(1) NOT NULL,
  `Fecha` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pr_bajavapor`
--

INSERT INTO `pr_bajavapor` (`Id`, `id_caldera`, `PreBaja`, `Fecha`) VALUES
(1, 1, 54, '2022-08-31 05:30:09.000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temagua`
--

CREATE TABLE `temagua` (
  `Id` int(11) NOT NULL,
  `id_caldera` int(11) NOT NULL,
  `TAgua` int(11) NOT NULL,
  `Fecha` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `temagua`
--

INSERT INTO `temagua` (`Id`, `id_caldera`, `TAgua`, `Fecha`) VALUES
(1, 1, 20, '2022-08-31 05:30:09.000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temchimenea`
--

CREATE TABLE `temchimenea` (
  `Id` int(11) NOT NULL,
  `id_caldera` int(11) NOT NULL,
  `TemChimenea` int(11) NOT NULL,
  `Fecha` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `temchimenea`
--

INSERT INTO `temchimenea` (`Id`, `id_caldera`, `TemChimenea`, `Fecha`) VALUES
(1, 1, 76, '2022-08-31 05:30:09.000000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caldera`
--
ALTER TABLE `caldera`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `caldera_medicion`
--
ALTER TABLE `caldera_medicion`
  ADD PRIMARY KEY (`caldera_medicion_id`),
  ADD UNIQUE KEY `caldera_medicion_unique` (`caldera_id`,`medicion_id`),
  ADD KEY `medicion_id` (`medicion_id`);

--
-- Indices de la tabla `configuracion_parametro_medicion_caldera`
--
ALTER TABLE `configuracion_parametro_medicion_caldera`
  ADD PRIMARY KEY (`caldera_medicion_id`,`parametro_medicion_id`),
  ADD KEY `parametro_medicion_id` (`parametro_medicion_id`);

--
-- Indices de la tabla `flama`
--
ALTER TABLE `flama`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_caldera_flama` (`id_caldera`);

--
-- Indices de la tabla `gaspropano`
--
ALTER TABLE `gaspropano`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_caldera_gas_propano` (`id_caldera`);

--
-- Indices de la tabla `medicion`
--
ALTER TABLE `medicion`
  ADD PRIMARY KEY (`medicion_id`);

--
-- Indices de la tabla `ni_deaguaalto`
--
ALTER TABLE `ni_deaguaalto`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_caldera_agua_alto` (`id_caldera`);

--
-- Indices de la tabla `ni_deaguabajo`
--
ALTER TABLE `ni_deaguabajo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_caldera_agua_bajo` (`id_caldera`);

--
-- Indices de la tabla `parametro_medicion`
--
ALTER TABLE `parametro_medicion`
  ADD PRIMARY KEY (`parametro_medicion_id`),
  ADD KEY `medicion_id` (`medicion_id`);

--
-- Indices de la tabla `prebunker`
--
ALTER TABLE `prebunker`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_caldera_prebunker` (`id_caldera`);

--
-- Indices de la tabla `pr_altovapor`
--
ALTER TABLE `pr_altovapor`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_caldera_pr_altovapor` (`id_caldera`);

--
-- Indices de la tabla `pr_bajavapor`
--
ALTER TABLE `pr_bajavapor`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_caldera_pr_bajavapor` (`id_caldera`);

--
-- Indices de la tabla `temagua`
--
ALTER TABLE `temagua`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_caldera_temagua` (`id_caldera`);

--
-- Indices de la tabla `temchimenea`
--
ALTER TABLE `temchimenea`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_caldera_temchimenea` (`id_caldera`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caldera`
--
ALTER TABLE `caldera`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `caldera_medicion`
--
ALTER TABLE `caldera_medicion`
  MODIFY `caldera_medicion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `flama`
--
ALTER TABLE `flama`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `gaspropano`
--
ALTER TABLE `gaspropano`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `medicion`
--
ALTER TABLE `medicion`
  MODIFY `medicion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ni_deaguaalto`
--
ALTER TABLE `ni_deaguaalto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ni_deaguabajo`
--
ALTER TABLE `ni_deaguabajo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `parametro_medicion`
--
ALTER TABLE `parametro_medicion`
  MODIFY `parametro_medicion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `prebunker`
--
ALTER TABLE `prebunker`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pr_altovapor`
--
ALTER TABLE `pr_altovapor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pr_bajavapor`
--
ALTER TABLE `pr_bajavapor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `temagua`
--
ALTER TABLE `temagua`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `temchimenea`
--
ALTER TABLE `temchimenea`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caldera_medicion`
--
ALTER TABLE `caldera_medicion`
  ADD CONSTRAINT `caldera_medicion_ibfk_1` FOREIGN KEY (`caldera_id`) REFERENCES `caldera` (`Id`),
  ADD CONSTRAINT `caldera_medicion_ibfk_2` FOREIGN KEY (`medicion_id`) REFERENCES `medicion` (`medicion_id`);

--
-- Filtros para la tabla `configuracion_parametro_medicion_caldera`
--
ALTER TABLE `configuracion_parametro_medicion_caldera`
  ADD CONSTRAINT `configuracion_parametro_medicion_caldera_ibfk_1` FOREIGN KEY (`caldera_medicion_id`) REFERENCES `caldera_medicion` (`caldera_medicion_id`),
  ADD CONSTRAINT `configuracion_parametro_medicion_caldera_ibfk_2` FOREIGN KEY (`parametro_medicion_id`) REFERENCES `parametro_medicion` (`parametro_medicion_id`);

--
-- Filtros para la tabla `parametro_medicion`
--
ALTER TABLE `parametro_medicion`
  ADD CONSTRAINT `parametro_medicion_ibfk_1` FOREIGN KEY (`medicion_id`) REFERENCES `medicion` (`medicion_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
