-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2020 a las 22:52:12
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
                           `entrenador_id` int(11),
                           `enfermero_id` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
                          `id` int(11) NOT NULL,
                          `genero` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
                          `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
                           `id` int(11) NOT NULL,
                           `altura` int(11) DEFAULT NULL,
                           `peso` int(11) DEFAULT NULL,
                           `imc` double DEFAULT NULL,
                           `enfermero_idenfermero` int(11) NOT NULL,
                           `cliente_idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rh`
--

CREATE TABLE `rh` (
                      `id` int(11) NOT NULL,
                      `rh` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
                      `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutina`
--

CREATE TABLE `rutina` (
                          `id` int(11) NOT NULL,
                          `descripcion` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
                          `fecha_inicio` date DEFAULT NULL,
                          `fecha_fin` date DEFAULT NULL,
                          `entrenador_identrenador` int(11) NOT NULL,
                          `cliente_idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
    ADD PRIMARY KEY (`id`,`entrenador_id`,`enfermero_id`),
    ADD KEY `fk_cliente_entrenador1_idx` (`entrenador_id`),
    ADD KEY `fk_cliente_enfermero1_idx` (`enfermero_id`);

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
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_genero_cliente1_idx` (`cliente_id`);

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
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_rh_cliente1_idx` (`cliente_id`);

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
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `enfermero`
--
ALTER TABLE `enfermero`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrenador`
--
ALTER TABLE `entrenador`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rh`
--
ALTER TABLE `rh`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rutina`
--
ALTER TABLE `rutina`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
    ADD CONSTRAINT `fk_cliente_enfermero1` FOREIGN KEY (`enfermero_id`) REFERENCES `enfermero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    ADD CONSTRAINT `fk_cliente_entrenador1` FOREIGN KEY (`entrenador_id`) REFERENCES `entrenador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `genero`
--
ALTER TABLE `genero`
    ADD CONSTRAINT `fk_genero_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `medidas`
--
ALTER TABLE `medidas`
    ADD CONSTRAINT `fk_medidas_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    ADD CONSTRAINT `fk_medidas_enfermero1` FOREIGN KEY (`enfermero_idenfermero`) REFERENCES `enfermero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rh`
--
ALTER TABLE `rh`
    ADD CONSTRAINT `fk_rh_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
