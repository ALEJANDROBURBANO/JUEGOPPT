-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2022 a las 22:27:35
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `play`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user` int(11) NOT NULL,
  `machine` int(11) NOT NULL,
  `winner` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `score`
--

INSERT INTO `score` (`id`, `date`, `user`, `machine`, `winner`, `user_id`) VALUES
(2, '2022-05-06 02:33:41', 1, 2, 'MAQUINA', 4),
(3, '2022-05-06 02:44:08', 2, 2, 'EMPATE', 4),
(4, '2022-05-06 02:46:00', 3, 3, 'EMPATE', 3),
(5, '2022-05-06 02:47:16', 1, 1, 'EMPATE', 5),
(6, '2022-05-06 02:48:21', 2, 2, 'EMPATE', 5),
(7, '2022-05-06 02:53:26', 1, 3, 'USUARIO', 4),
(8, '2022-05-06 02:53:29', 2, 3, 'MAQUINA', 4),
(9, '2022-05-06 03:05:44', 1, 1, 'EMPATE', 4),
(10, '2022-05-06 03:06:20', 2, 1, 'USUARIO', 5),
(11, '2022-05-06 03:07:12', 3, 3, 'EMPATE', 4),
(12, '2022-05-06 03:07:14', 2, 1, 'USUARIO', 4),
(13, '0000-00-00 00:00:00', 1, 1, 'EMPATE', 4),
(14, '2022-05-05 08:10:19', 3, 2, 'USUARIO', 4),
(15, '2022-05-05 08:10:29', 2, 3, 'MAQUINA', 4),
(16, '2022-05-05 08:10:51', 1, 1, 'EMPATE', 4),
(17, '2022-05-05 08:11:02', 3, 1, 'MAQUINA', 4),
(18, '2022-05-05 08:12:00', 1, 2, 'MAQUINA', 4),
(19, '2022-05-05 08:14:00', 2, 1, 'USUARIO', 5),
(20, '2022-05-05 08:19:00', 1, 3, 'USUARIO', 9),
(21, '2022-05-05 08:19:00', 2, 3, 'MAQUINA', 9),
(22, '2022-05-05 08:19:00', 3, 3, 'EMPATE', 9),
(23, '2022-05-05 08:19:00', 2, 2, 'EMPATE', 9),
(24, '2022-05-05 08:19:00', 1, 3, 'USUARIO', 9),
(25, '2022-05-05 08:19:00', 3, 2, 'USUARIO', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`) VALUES
(3, 'Alejandro'),
(4, 'Yerson'),
(5, 'Dayana'),
(6, 'Andres'),
(7, 'Camilo'),
(8, 'Carlos'),
(9, 'cristian');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
