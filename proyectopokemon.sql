-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2023 a las 21:21:26
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectopokemon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combates`
--

CREATE TABLE `combates` (
  `id_combate` int(5) NOT NULL,
  `idpk1` int(5) NOT NULL,
  `idpk2` int(5) NOT NULL,
  `pokemon1` varchar(30) NOT NULL,
  `pokemon2` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `ganador` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `combates`
--

INSERT INTO `combates` (`id_combate`, `idpk1`, `idpk2`, `pokemon1`, `pokemon2`, `fecha`, `ganador`) VALUES
(32, 15, 18, 'DugChamp', 'Pablo', '2010-10-10', 'DugChamp'),
(33, 15, 17, 'DugChamp', 'Tobi', '1025-04-07', 'DugChamp'),
(34, 16, 15, 'DugGod', 'DugChamp', '1478-12-15', 'DugGod');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `id` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `tipo1` varchar(30) NOT NULL,
  `tipo2` varchar(30) NOT NULL,
  `region` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`id`, `nombre`, `tipo1`, `tipo2`, `region`) VALUES
(6, 'Growlithe', 'Fuego', '', 'Kanto'),
(7, 'Walrein', 'Agua', 'Hielo', 'Hoenn'),
(8, 'Dugtrio', 'Tierra', '', 'Kanto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(30) NOT NULL,
  `especie` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `ataque` int(2) NOT NULL,
  `defensa` int(2) NOT NULL,
  `velocidad` int(2) NOT NULL,
  `Nivel` int(3) NOT NULL,
  `combates_ganados` int(5) NOT NULL,
  `combates_perdidos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemon`
--

INSERT INTO `pokemon` (`id`, `especie`, `nombre`, `ataque`, `defensa`, `velocidad`, `Nivel`, `combates_ganados`, `combates_perdidos`) VALUES
(14, 'Dugtrio', 'Dug1', 5, 5, 5, 20, 0, 0),
(15, 'Dugtrio', 'DugChamp', 9, 9, 9, 50, 2, 1),
(16, 'Dugtrio', 'DugGod', 10, 10, 10, 100, 1, 0),
(17, 'Growlithe', 'Tobi', 8, 3, 6, 40, 0, 1),
(18, 'Growlithe', 'Pablo', 5, 2, 3, 60, 0, 1),
(19, 'Walrein', 'CR7', 8, 7, 5, 90, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `combates`
--
ALTER TABLE `combates`
  ADD PRIMARY KEY (`id_combate`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `combates`
--
ALTER TABLE `combates`
  MODIFY `id_combate` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
