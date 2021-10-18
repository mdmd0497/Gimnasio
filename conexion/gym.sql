-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2021 a las 02:02:37
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(1, 'Michael', 'Moreno', '3@a.com', '$2y$10$2JQyh1hpzxqtq55FlGTQUuZNtmUiEDyrhSkBTHv6NCYOUdKylchf.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `observaciones` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `entrenador_id` int(11) NOT NULL,
  `enfermero_id` int(11) NOT NULL,
  `genero_id` int(11) NOT NULL,
  `rh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `correo`, `clave`, `foto`, `telefono`, `observaciones`, `estado`, `entrenador_id`, `enfermero_id`, `genero_id`, `rh_id`) VALUES
(2, 'Alejandro', 'ruiz', '1@c.com', '$2y$10$KB4AQUAhX954/Gy3qtN4aOu.xjBCYyG7yy5Xq0VrcctEzVUONnBVa', '1584899455404.png', '7846385', '', 1, 3, 4, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermero`
--

CREATE TABLE `enfermero` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `enfermero`
--

INSERT INTO `enfermero` (`id`, `nombre`, `apellido`, `correo`, `clave`, `foto`, `telefono`) VALUES
(3, 'lucia', 'das', '3@e.com', '$2y$10$0FWqw7m6GZiCjpzL2QlIve4hYd/CTNtCrRxTIJTgDVPmNGl.fLXXi', NULL, '7841368'),
(4, 'martin', 'garcia', '4@e.com', '$2y$10$VaEXYATdNEvDX6d1mQ2Lcel/EZJzh.58EUyM9LdeDb2ImyizHlwkS', NULL, '7841367');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE `entrenador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rutina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`id`, `nombre`, `apellido`, `correo`, `clave`, `foto`, `telefono`, `rutina`) VALUES
(2, 'pedro', 'ruiz', '2@en.com', '$2y$10$G/4gAa/Y480vgJehQHP.UOtO15DWkuD5wTDLzDg5mc9owWUYkvikW', NULL, '7484165', NULL),
(3, 'maximilio', 'ledger', '4@en.com', '$2y$10$aKbeyUaYQPa/GTqWE1sE6O0SDckD2QgqTZVkSydL5NpO3Z9aPL6SG', '1632184343893.jpg', '4234368', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `genero` char(1) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `genero`) VALUES
(1, 'm'),
(2, 'f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id` int(11) NOT NULL,
  `altura` int(11) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `enfermero_idenfermero` int(11) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`id`, `altura`, `peso`, `fecha`, `enfermero_idenfermero`, `cliente_idcliente`) VALUES
(1, 170, 48, '2021-09-21', 4, 2),
(2, 170, 58, '2021-09-26', 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rh`
--

CREATE TABLE `rh` (
  `id` int(11) NOT NULL,
  `rh` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rh`
--

INSERT INTO `rh` (`id`, `rh`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'O+'),
(6, 'O-'),
(7, 'AB+'),
(8, 'AB-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutina`
--

CREATE TABLE `rutina` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_dia` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `duracion` bigint(20) NOT NULL COMMENT 'Medición en segundos',
  `series` int(11) NOT NULL,
  `repeticiones_series` int(11) NOT NULL,
  `imagen` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descanso` bigint(20) NOT NULL COMMENT 'Medición en segundos',
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `entrenador_identrenador` int(11) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rutina`
--

INSERT INTO `rutina` (`id`, `descripcion`, `numero_dia`, `nombre`, `duracion`, `series`, `repeticiones_series`, `imagen`, `descanso`, `fecha_inicio`, `fecha_fin`, `entrenador_identrenador`, `cliente_idcliente`) VALUES
(1, 'Flexiones de pecho', 1, 'Push Ups', 60, 4, 10, '1633915608203.jpg', 30, '2021-10-10', '2021-10-17', 3, 2),
(2, 'Baje su cuerpo hasta formar un angulo de 90 grados con las piernas', 2, 'Sentadillas', 30, 5, 12, '1634076050432.jpg', 60, '2021-10-12', '2021-10-19', 3, 2),
(3, 'Tome un banca, sujete firmemente la barra del banco y haga un ejercicio supino', 1, 'Press de banca', 20, 4, 10, '1634076337569.jpg', 20, '2021-10-11', '2021-10-18', 3, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`,`entrenador_id`,`enfermero_id`,`genero_id`,`rh_id`),
  ADD KEY `fk_cliente_entrenador1_idx` (`entrenador_id`),
  ADD KEY `fk_cliente_enfermero1_idx` (`enfermero_id`),
  ADD KEY `fk_cliente_genero1_idx` (`genero_id`),
  ADD KEY `fk_cliente_rh1_idx` (`rh_id`);

--
-- Indices de la tabla `enfermero`
--
ALTER TABLE `enfermero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_medidas_enfermero1_idx` (`enfermero_idenfermero`),
  ADD KEY `fk_medidas_cliente1_idx` (`cliente_idcliente`);

--
-- Indices de la tabla `rh`
--
ALTER TABLE `rh`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rutina`
--
ALTER TABLE `rutina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rutina_entrenador_idx` (`entrenador_identrenador`),
  ADD KEY `fk_rutina_cliente1_idx` (`cliente_idcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `enfermero`
--
ALTER TABLE `enfermero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rh`
--
ALTER TABLE `rh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rutina`
--
ALTER TABLE `rutina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_enfermero1` FOREIGN KEY (`enfermero_id`) REFERENCES `enfermero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cliente_entrenador1` FOREIGN KEY (`entrenador_id`) REFERENCES `entrenador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cliente_genero1` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cliente_rh1` FOREIGN KEY (`rh_id`) REFERENCES `rh` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD CONSTRAINT `fk_medidas_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_medidas_enfermero1` FOREIGN KEY (`enfermero_idenfermero`) REFERENCES `enfermero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rutina`
--
ALTER TABLE `rutina`
  ADD CONSTRAINT `fk_rutina_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rutina_entrenador` FOREIGN KEY (`entrenador_identrenador`) REFERENCES `entrenador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
