-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2020 a las 17:23:06
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redder`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `ide` int(255) NOT NULL,
  `idpara` int(255) NOT NULL,
  `nombre` varchar(52) COLLATE utf8_spanish2_ci NOT NULL,
  `publicacioncomentario` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` int(1) NOT NULL DEFAULT 0,
  `solicitud` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`ide`, `idpara`, `nombre`, `publicacioncomentario`, `fecha`, `estado`, `solicitud`) VALUES
(2, 1, 'robinson', 'pienso luego existo', '2020-05-26 12:16:56', 1, 0),
(2, 4, 'sonia chen', '!..Que bien ya estoy en redder...¡', '2020-05-26 12:17:02', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(255) NOT NULL,
  `ide` int(255) NOT NULL,
  `idpara` int(255) NOT NULL,
  `mensaje` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` int(1) NOT NULL,
  `envioa` int(255) NOT NULL,
  `foto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `ide`, `idpara`, `mensaje`, `fecha`, `estado`, `envioa`, `foto`) VALUES
(11, 2, 1, 'hola robin', '2020-05-24 20:51:59', 1, 0, ''),
(12, 1, 2, 'Hola Leti como vas con los exámenes ', '2020-05-25 11:30:01', 1, 0, ''),
(13, 2, 1, 'voy bien y tu con tu proyecto', '2020-05-25 12:58:27', 1, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `idlike` int(255) NOT NULL,
  `usuario` int(52) NOT NULL,
  `publicacion` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`idlike`, `usuario`, `publicacion`) VALUES
(65, 40, 47),
(66, 40, 45),
(88, 39, 49),
(89, 40, 49),
(102, 39, 45),
(114, 39, 50),
(117, 39, 46),
(118, 41, 46),
(119, 41, 48),
(120, 41, 47),
(121, 41, 45),
(122, 41, 51),
(123, 41, 52),
(124, 41, 53),
(126, 39, 54),
(135, 42, 55),
(136, 42, 51),
(144, 40, 56),
(145, 40, 57),
(148, 39, 64),
(149, 40, 69),
(150, 40, 76),
(155, 40, 80),
(162, 40, 0),
(167, 40, 81),
(168, 39, 83),
(169, 39, 82),
(170, 40, 83),
(173, 39, 90),
(174, 40, 95),
(180, 40, 87),
(191, 39, 98),
(196, 40, 98),
(197, 40, 100),
(198, 40, 97),
(199, 39, 93),
(200, 39, 94),
(201, 40, 105),
(202, 40, 104),
(203, 40, 106),
(204, 41, 90),
(0, 1, 2),
(0, 1, 3),
(0, 2, 0),
(0, 2, 2),
(0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likesvideo`
--

CREATE TABLE `likesvideo` (
  `idlike` int(255) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `video` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `likesvideo`
--

INSERT INTO `likesvideo` (`idlike`, `usuario`, `video`) VALUES
(17, '2', 2),
(18, '2', 1),
(19, '1', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parar`
--

CREATE TABLE `parar` (
  `idstop` int(255) NOT NULL,
  `usuario` int(255) NOT NULL,
  `publicacion` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `parar`
--

INSERT INTO `parar` (`idstop`, `usuario`, `publicacion`) VALUES
(33, 40, 0),
(36, 39, 0),
(62, 39, 83),
(100, 39, 79),
(102, 39, 81),
(103, 39, 85),
(115, 40, 78),
(125, 39, 82),
(128, 40, 79),
(133, 39, 80),
(137, 40, 83),
(139, 40, 77),
(140, 40, 82),
(150, 39, 86),
(151, 39, 87),
(158, 39, 89),
(176, 39, 88),
(184, 40, 89),
(220, 39, 96),
(225, 40, 87),
(226, 40, 90),
(229, 40, 96),
(230, 40, 94),
(231, 40, 88),
(233, 39, 93),
(234, 39, 94),
(235, 39, 90),
(238, 41, 104),
(241, 39, 104),
(0, 2, 0),
(0, 2, 2),
(0, 1, 6),
(0, 2, 1),
(0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensar`
--

CREATE TABLE `pensar` (
  `ID` int(52) NOT NULL,
  `de` int(52) NOT NULL,
  `pensamiento` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(255) NOT NULL,
  `fechapublicacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nombre` varchar(52) COLLATE utf8_spanish2_ci NOT NULL,
  `publicacionfoto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `comentariopubli` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(52) COLLATE utf8_spanish2_ci NOT NULL,
  `usu_id` int(255) NOT NULL,
  `likes` int(255) NOT NULL,
  `para` int(52) NOT NULL,
  `video` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `fechapublicacion`, `nombre`, `publicacionfoto`, `comentariopubli`, `email`, `usu_id`, `likes`, `para`, `video`) VALUES
(1, '2020-05-25 11:28:40', 'robinson', 'imagenes/avatar1.png', '', 'robin@robin', 1, 0, 2, ''),
(2, '2020-05-25 11:28:35', 'leti', 'imagenes/juegos.jpg', 'me gusta los video juegos', 'leti@leti', 2, 1, -1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id_usu` int(255) NOT NULL,
  `Nombre` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Clave` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `CClave` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Pais` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Ciudad` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `publicacioncomentario` varchar(300) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id_usu`, `Nombre`, `email`, `Clave`, `CClave`, `Pais`, `Ciudad`, `avatar`, `fecharegistro`, `publicacioncomentario`) VALUES
(1, 'robinson', 'robin@robin', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'España', 'madrid', 'imagenes/foto3.jpg', '2020-05-24 20:21:58', 'pienso luego existo'),
(2, 'leti', 'leti@leti', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'España', 'madrid', 'imagenes/D5788651-3631-4B78-A918-934BBB5ED1E2.jpeg', '2020-05-25 11:10:23', 'solo espero pasar lo examenes de launi'),
(4, 'sonia chen', 'sonia@sonia', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'España', 'Madrid', 'imagenes/avatar1.png', '2020-05-25 11:58:00', '!..Que bien ya estoy en redder...¡');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `comentariovideo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `usu_id` int(255) NOT NULL,
  `likes` int(255) NOT NULL,
  `para` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `fecha`, `nombre`, `video`, `comentariovideo`, `usu_id`, `likes`, `para`) VALUES
(1, '2020-05-25 10:54:50', 'leti', 'videos/Cabriolet - 2029.mp4', '', 2, 0, 0),
(2, '2020-05-25 10:54:37', 'robinson', 'videos/trim.9E33B68F-02F1-4495-AA80-E71254674778.MOV', '', 1, 1, 0),
(3, '2020-05-25 12:26:15', 'leti', 'videos/Road Trip - 739.mp4', '', 2, 0, 0),
(5, '2020-05-25 12:51:49', 'robinson', 'videos/trim.15962F77-EF37-4BDE-A1CD-EA5D0EF9F576.MOV', '', 1, 0, 0),
(6, '2020-05-25 14:09:30', 'robinson', 'videos/FAROLAZO.mp4', 'que farolazo', 1, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `likesvideo`
--
ALTER TABLE `likesvideo`
  ADD PRIMARY KEY (`idlike`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id_usu`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `likesvideo`
--
ALTER TABLE `likesvideo`
  MODIFY `idlike` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id_usu` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
