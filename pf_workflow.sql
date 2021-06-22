-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-06-2021 a las 16:55:32
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pf_workflow`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `nroTramite` int(11) NOT NULL,
  `usuario` int(10) NOT NULL,
  `primero` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `segundo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`nroTramite`, `usuario`, `primero`, `segundo`) VALUES
(13, 789, '../Upload/boliviainnova.png', '../Upload/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujo`
--

CREATE TABLE `flujo` (
  `flujo` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `proceso` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_proceso` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cod_rol` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `proceso_siguiente` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `formulario` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `flujo`
--

INSERT INTO `flujo` (`flujo`, `proceso`, `tipo_proceso`, `cod_rol`, `proceso_siguiente`, `formulario`) VALUES
('F1', 'P1', 'I', 'U', 'P2', 'ElegirMateria'),
('F1', 'P2', 'P', 'U', 'P3', 'SubirDocumentos'),
('F1', 'P3', 'S', 'U', 'P4', 'RealizarInscripcion'),
('F1', 'P4', 'C', 'K', NULL, 'Condicionante'),
('F1', 'P5', 'S', 'K', 'P6', 'VerificarInscripcion'),
('F1', 'P6', 'P', 'U', 'FIN', 'MateriasInscritas'),
('F1', 'P7', 'S', 'K', 'P8', 'EnviarNegativa'),
('F1', 'P8', 'P', 'U', 'P1', 'ProblemasInscripcion'),
('F2', 'P1', 'C', 'U', NULL, 'SubirNotas'),
('F2', 'P2', 'P', 'K', 'FIN', 'NotaFinal'),
('F2', 'P3', 'P', 'U', 'FIN', 'VerNotas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `nroTramite` int(11) NOT NULL,
  `observacion` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informe`
--

INSERT INTO `informe` (`nroTramite`, `observacion`) VALUES
(10, 'Aceptado'),
(9, 'Aceptado'),
(11, 'Aceptado'),
(13, 'Aceptado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritos`
--

CREATE TABLE `inscritos` (
  `sigla_materia` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscritos`
--

INSERT INTO `inscritos` (`sigla_materia`, `usuario`) VALUES
('LIN-116', 789),
('INF-113', 789);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `sigla` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nro_prerequisitos` int(11) NOT NULL,
  `nro_inscritos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`sigla`, `nombre`, `nro_prerequisitos`, `nro_inscritos`) VALUES
('INF-111', 'Introducción a la Informática', 0, 1),
('INF-112', 'Organización de Computadoras', 0, 0),
('INF-113', 'Laboratorio de Computación', 0, 1),
('LAB-111', 'Laboratorio de Informática', 0, 4),
('LIN-116', 'Gramática Española', 0, 1),
('MAT-114', 'Matemática Discreta I', 0, 0),
('MAT-115', 'Análisis Matemático I', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesocondicional`
--

CREATE TABLE `procesocondicional` (
  `flujo` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Proceso` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `procesoaceptado` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `procesonegado` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `procesocondicional`
--

INSERT INTO `procesocondicional` (`flujo`, `Proceso`, `procesoaceptado`, `procesonegado`) VALUES
('F1', 'P4', 'P5', 'P7'),
('F2', 'P1', 'P3', 'P2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_materia`
--

CREATE TABLE `registro_materia` (
  `sigla_materia` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_materia`
--

INSERT INTO `registro_materia` (`sigla_materia`, `usuario`) VALUES
('INF-113', 789),
('INF-111', 147);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `nroTramite` int(11) NOT NULL,
  `codFlujo` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codProceso` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` int(11) NOT NULL,
  `fechaini` datetime DEFAULT NULL,
  `fechafin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`nroTramite`, `codFlujo`, `codProceso`, `usuario`, `fechaini`, `fechafin`) VALUES
(13, 'F1', 'P1', 789, '2021-06-22 12:39:04', '2021-06-22 12:39:13'),
(13, 'F1', 'P2', 789, '2021-06-22 12:39:13', '2021-06-22 12:39:17'),
(13, 'F1', 'P3', 789, '2021-06-22 12:39:17', '2021-06-22 12:39:28'),
(13, 'F1', 'P4', 123, '2021-06-22 12:39:28', '2021-06-22 12:39:53'),
(13, 'F1', 'P5', 123, '2021-06-22 12:39:53', '2021-06-22 12:39:54'),
(13, 'F1', 'P6', 789, '2021-06-22 12:39:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` int(10) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `rol` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rol_usuario` varchar(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_inc` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `nombre`, `fecha_nac`, `rol`, `rol_usuario`, `password`, `fecha_inc`) VALUES
(123, 'Rodrigo', '1989-08-17', 'K', NULL, '123', NULL),
(147, 'Viviana', '2000-06-05', 'U', 'D', '123', NULL),
(789, '789', '2000-10-12', 'U', 'E', '123', '2021-05-31 08:00:00'),
(8358406, 'Noemi', '2000-10-04', 'U', 'E', '123', '2021-05-31 08:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`nroTramite`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`sigla`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `nroTramite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `documento_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
