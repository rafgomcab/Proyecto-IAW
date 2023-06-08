-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2023 a las 17:17:31
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
(1, 2, 12, 'Pichuli', 'Edgy', '2013-06-03', 'Pichuli'),
(2, 2, 4, 'Rayito', 'Pichuli', '2023-06-07', 'Pichuli'),
(3, 2, 11, 'Edgy', 'dsadas', '2023-05-30', 'Edgy'),
(8, 12, 2, 'Edgy', 'Pichuli', '2022-09-01', 'Pichuli'),
(9, 12, 2, 'Edgy', 'Pichuli', '2022-10-12', 'Pichuli'),
(10, 13, 2, 'Ganador', 'Pichuli', '2023-05-29', 'Ganador');

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
(1, 'Bulbasaur', 'Planta', 'Veneno', 'Kanto'),
(2, 'Ivysaur', 'Planta', 'Veneno', 'Kanto'),
(3, 'Grovyle', 'Planta', '', 'Hoenn'),
(5, 'Pikachu', 'Eléctrico', '', 'Kanto');

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
(2, 'Bulbasaur', 'Pichuli', 5, 5, 5, 50, 0, 1),
(4, 'Bulbasaur', 'Rayito Mcqueen', 1, 1, 10, 100, 0, 0),
(11, 'Bulbasaur', 'dsadas', 1, 2, 3, 12, 0, 0),
(12, 'Grovyle', 'Edgy', 5, 5, 2, 50, 1, 3),
(13, 'Bulbasaur', 'Ganador', 10, 10, 10, 100, 1, 0);

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
  MODIFY `id_combate` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
