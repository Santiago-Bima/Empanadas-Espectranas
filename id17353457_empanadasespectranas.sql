-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-10-2021 a las 03:02:06
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id17353457_empanadasespectranas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Id` int(11) NOT NULL,
  `token` text NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `intentos_fallidos` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Id`, `token`, `usuario`, `email`, `password`, `intentos_fallidos`, `fecha`) VALUES
(6, '9516fffc0f77f241a3cea4df9a9c62b3', 'c1', 'c1@gmail.com', '$2a$07$T3xT0P4rA3nCR1pT4rL4Pu7E7w/I0h5rMdj4IjjkBFcqfsBkE3Tku', 0, '2021-08-21 23:02:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `Id` int(11) NOT NULL,
  `token` text NOT NULL,
  `usuario` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `intentos_fallidos` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`Id`, `token`, `usuario`, `email`, `password`, `intentos_fallidos`, `fecha`) VALUES
(38, '555487b3f06a6cd8d2f4a6b2764d08a8', 'e1', 'e1@gmail.com', '$2a$07$T3xT0P4rA3nCR1pT4rL4PuHQw7/3BDfleWQewiVYdj1NGjTvwCkni', 0, '2021-08-21 22:17:50'),
(39, '8d3fec76888bbab2933214d58a4c4f3b', 'santi', 'santiago.bima@gmail.com', '$2a$07$T3xT0P4rA3nCR1pT4rL4PuHQw7/3BDfleWQewiVYdj1NGjTvwCkni', NULL, '2021-08-30 01:27:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id`, `nombre`, `descripcion`, `foto`, `precio`) VALUES
(10, 'Empanadas Arabes', 'Empanadas hechas como en arabia', 'empanada arabes.jfif', 75);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
