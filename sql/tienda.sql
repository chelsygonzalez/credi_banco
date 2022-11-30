-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2022 a las 17:01:26
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
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cen_formacion`
--

CREATE TABLE `cen_formacion` (
  `id_centro` varchar(20) NOT NULL,
  `nom_centro` varchar(50) DEFAULT NULL,
  `reg_centro` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `correo_emp` varchar(40) NOT NULL,
  `nom_emple` varchar(25) DEFAULT NULL,
  `apell_emp` varchar(25) DEFAULT NULL,
  `cel_emple` int(10) DEFAULT NULL,
  `id_centro1` varchar(20) DEFAULT NULL,
  `contra_emp` varchar(30) DEFAULT NULL,
  `cedu_emp` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recargas`
--

CREATE TABLE `recargas` (
  `id_recar` int(20) NOT NULL,
  `valor_recar` int(20) DEFAULT NULL,
  `correo_usu2` varchar(40) DEFAULT NULL,
  `fecha_recar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `id_tx` int(10) NOT NULL,
  `valor_tx` int(20) DEFAULT NULL,
  `correo_emp1` varchar(40) DEFAULT NULL,
  `fecha_tx` date DEFAULT NULL,
  `correo_usu1` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correo_usu` varchar(40) NOT NULL,
  `tipo_doc` varchar(20) DEFAULT NULL,
  `id_usuario` int(20) DEFAULT NULL,
  `nomb_usu` varchar(30) DEFAULT NULL,
  `apell_usu` varchar(30) DEFAULT NULL,
  `cel_usu` int(20) DEFAULT NULL,
  `contra_usu` varchar(40) DEFAULT NULL,
  `conf_contra` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo_usu`, `tipo_doc`, `id_usuario`, `nomb_usu`, `apell_usu`, `cel_usu`, `contra_usu`, `conf_contra`) VALUES
('jfoo.npy@gmail.com', 'Cedula de ciudadanía', 1094952162, 'Juan', 'Ucros', 2147483647, 'cc', 'cc');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cen_formacion`
--
ALTER TABLE `cen_formacion`
  ADD PRIMARY KEY (`id_centro`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`correo_emp`),
  ADD KEY `id_centro1` (`id_centro1`);

--
-- Indices de la tabla `recargas`
--
ALTER TABLE `recargas`
  ADD PRIMARY KEY (`id_recar`),
  ADD KEY `correo_usu2` (`correo_usu2`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`id_tx`),
  ADD KEY `correo_emp1` (`correo_emp1`),
  ADD KEY `correo_usu1` (`correo_usu1`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo_usu`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_centro1`) REFERENCES `cen_formacion` (`id_centro`);

--
-- Filtros para la tabla `recargas`
--
ALTER TABLE `recargas`
  ADD CONSTRAINT `recargas_ibfk_1` FOREIGN KEY (`correo_usu2`) REFERENCES `usuario` (`correo_usu`);

--
-- Filtros para la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD CONSTRAINT `transacciones_ibfk_1` FOREIGN KEY (`correo_emp1`) REFERENCES `empleado` (`correo_emp`),
  ADD CONSTRAINT `transacciones_ibfk_2` FOREIGN KEY (`correo_usu1`) REFERENCES `usuario` (`correo_usu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
