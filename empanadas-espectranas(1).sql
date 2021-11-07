-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2021 a las 01:01:01
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empanadas-espectranas`
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
(21, '9516fffc0f77f241a3cea4df9a9c62b3', 'c1', 'c1@gmail.com', '$2a$07$T3xT0P4rA3nCR1pT4rL4Pu7E7w/I0h5rMdj4IjjkBFcqfsBkE3Tku', 0, '2021-10-09 14:50:37');

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
(39, '8d3fec76888bbab2933214d58a4c4f3b', 'santi', 'santiago.bima@gmail.com', '$2a$07$T3xT0P4rA3nCR1pT4rL4PuHQw7/3BDfleWQewiVYdj1NGjTvwCkni', NULL, '2021-08-30 01:27:38'),
(41, '555487b3f06a6cd8d2f4a6b2764d08a8', 'e11', 'e1@gmail.com', '$2a$07$T3xT0P4rA3nCR1pT4rL4PuHQw7/3BDfleWQewiVYdj1NGjTvwCkni', 0, '2021-11-04 23:32:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id`, `nombre`, `descripcion`, `foto`, `precio`, `tipo`) VALUES
(12, 'Agua de Manantial', 'Agua rica', 'agua.jpg', 40, 'Jugos'),
(13, 'Aquarius', 'de manzana, pera y naranja', 'aquarius.jfif', 65, 'Jugos'),
(14, 'Baggio', 'de Manzana, durazno y naranja. cheto', 'baggio.jpg', 70, 'Jugos'),
(15, 'cepita', 'cepita humilde', 'cepita.jfif', 55, 'Jugos'),
(16, 'Coca Cola', 'coca cola espuma', 'coca.jfif', 75, 'Gaseosas'),
(17, 'Empanadas Arabes', 'ricas', 'empanada%20arabes.jfif', 65, 'Empanadas de carne'),
(19, 'Empanadas Criollas dulces', 'criollitos x2', 'empanadas%20criollas%20dulces.jpg', 55, 'Empanadas vegetarianas/veganas'),
(20, 'Empanadas Criollas', 'criollitos', 'empanadas%20criollas.jfif', 55, 'Empanadas de carne'),
(21, 'Empanadas de Manzana', 'wtf', 'empanadas%20de%20manzana.jfif', 60, 'Empanadas vegetarianas/veganas'),
(22, 'empanadas de pollo', 'solo de pollo', 'empanadas%20de%20pollo.jfif', 65, 'Empanadas de carne'),
(23, 'Empanadas de Queso', 'queso de pie', 'empanadas%20de%20queso.jfif', 60, 'Empanadas vegetarianas/veganas'),
(24, 'Empanadas de Sardinas', 'pescadito', 'empanadas%20de%20sardinas.jfif', 55, 'Empanadas de carne'),
(25, 'Empanada de Tofu', 'queso de pie fermentado', 'empanadas%20de%20tofu.jfif', 60, 'Empanadas vegetarianas/veganas'),
(26, 'Empanada de Verdura', 'Pasto', 'empanadas%20de%20verdura.jfif', 60, 'Empanadas vegetarianas/veganas'),
(27, 'Fanta', 'la naranja', 'fanta.jfif', 65, 'Gaseosas'),
(28, 'Gancia', 'Jugo', 'gancia.jfif', 80, 'Bebidas alcoholicas'),
(29, 'Jack Danields', 'Mi amigo Jack sparrow', 'jack.jfif', 115, 'Bebidas alcoholicas'),
(30, 'Manaos de Uva', 'solo uva', 'manaos.jfif', 65, 'Gaseosas'),
(31, 'Mirinda', 'Fanta humilde', 'mirinda.jpg', 60, 'Gaseosas'),
(32, 'Pepsi', 'aguante pezi', 'pepsi.jfif', 70, 'Gaseosas'),
(33, '7Up', 'siete arriba', 'seven.jfif', 65, 'Gaseosas'),
(34, 'Sky', 'wtf cielo?', 'sky.jfif', 85, 'Bebidas alcoholicas'),
(35, 'Smirnoff', 'tan bueno como la ovalada', 'smir.jfif', 100, 'Bebidas alcoholicas'),
(36, 'Sprite', '7Up cheta', 'sprite.jfif', 70, 'Gaseosas'),
(37, 'Stella', 'estela artoa', 'stella.jfif', 90, 'Bebidas alcoholicas'),
(38, 'Trompis', 'la trooompiiis', 'trompis.jpg', 65, 'Gaseosas'),
(39, 'Vino Toro', 'vino', 'vino.jfif', 90, 'Bebidas alcoholicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_de_productos`
--

CREATE TABLE `tipos_de_productos` (
  `id` int(11) NOT NULL,
  `tipos` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_de_productos`
--

INSERT INTO `tipos_de_productos` (`id`, `tipos`) VALUES
(1, 'Empanadas de carne'),
(2, 'Empanadas vegetarianas/veganas'),
(3, 'Jugos'),
(4, 'Bebidas alcoholicas'),
(5, 'Gaseosas');

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
-- Indices de la tabla `tipos_de_productos`
--
ALTER TABLE `tipos_de_productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `tipos_de_productos`
--
ALTER TABLE `tipos_de_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
