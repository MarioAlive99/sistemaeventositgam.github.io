-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2023 a las 21:22:38
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `codefest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel`
--

CREATE TABLE IF NOT EXISTS `carrusel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `A` text COLLATE utf8_spanish2_ci NOT NULL,
  `B` text COLLATE utf8_spanish2_ci NOT NULL,
  `C` text COLLATE utf8_spanish2_ci NOT NULL,
  `D` text COLLATE utf8_spanish2_ci NOT NULL,
  `E` text COLLATE utf8_spanish2_ci NOT NULL,
  `F` text COLLATE utf8_spanish2_ci NOT NULL,
  `G` text COLLATE utf8_spanish2_ci NOT NULL,
  `H` text COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `carrusel`
--

INSERT INTO `carrusel` (`id`, `A`, `B`, `C`, `D`, `E`, `F`, `G`, `H`) VALUES
(1, 'vistas/img/carrusel/A.jpg', 'vistas/img/carrusel/B.jpg', 'vistas/img/carrusel/C.jpg', 'vistas/img/carrusel/D.jpg', 'vistas/img/carrusel/E.jpg', 'vistas/img/carrusel/F.jpg', 'vistas/img/carrusel/G.jpg', 'vistas/img/carrusel/H.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` text COLLATE utf8_spanish2_ci NOT NULL,
  `numero_control_profesor` text COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_profesor` text COLLATE utf8_spanish2_ci NOT NULL,
  `pdf_descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `souvenir` text COLLATE utf8_spanish2_ci NOT NULL,
  `precio` text COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` text COLLATE utf8_spanish2_ci NOT NULL,
  `horario` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` text COLLATE utf8_spanish2_ci NOT NULL,
  `fechafinal` text COLLATE utf8_spanish2_ci NOT NULL,
  `aula` text COLLATE utf8_spanish2_ci NOT NULL,
  `cupo` int(20) NOT NULL DEFAULT '30',
  `url_imagen` text COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `titulo`, `numero_control_profesor`, `nombre_profesor`, `pdf_descripcion`, `souvenir`, `precio`, `tipo`, `horario`, `fecha`, `fechafinal`, `aula`, `cupo`, `url_imagen`) VALUES
(20, 'JAVAS', '', 'omar armas', '', 'SUDADERAS CAMISAS Y PLAYERAS', '800', 'TALLER', '08:47 - 16:47', '2023-05-28', '2023-05-27', '4B', 27, 'vistas/img/curso/_Imagen de WhatsApp 2023-05-23 a las 09.27.31.jpg'),
(21, 'ORACLE 12', '123456', 'omar armas g', '', 'SUDADERAS CAMISAS Y PLAYERAS', '350', 'TALLER', '07:34 - 06:34', '2023-05-29', '2023-05-29', '4B', 29, 'vistas/img/curso/123456_Imagen de WhatsApp 2023-05-23 a las 09.27.31.jpg'),
(22, ' SISTEMAS OPERATIVOS', '123456', 'OMAR ARMAS M', '', 'PLAYERA', '800', 'TALLER', '08:25 - 05:28', '2023-05-29', '2023-05-30', 'AA', 30, 'vistas/img/curso/123456_Imagen de WhatsApp 2023-05-23 a las 09.27.31.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE IF NOT EXISTS `inscripciones` (
  `id_inscripcion` int(30) NOT NULL AUTO_INCREMENT,
  `id_curso` int(30) NOT NULL,
  `nombre_alumno` text COLLATE utf8_spanish2_ci NOT NULL,
  `numero_control` text COLLATE utf8_spanish2_ci NOT NULL,
  `talla` text COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` text COLLATE utf8_spanish2_ci NOT NULL,
  `horario` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` text COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_inscripcion`),
  KEY `id_curso` (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id_inscripcion`, `id_curso`, `nombre_alumno`, `numero_control`, `talla`, `sexo`, `horario`, `fecha`) VALUES
(29, 20, 'LUIS RODOLFO G', '31342', 'CH', 'HOMBRE', '13:30 - 14:00', '2023-05-27'),
(31, 20, 'MIGUEL CÁMARA RODRÍGUEZ', '221130268', 'M', 'HOMBRE', '13:30 - 14:00', '2023-05-27'),
(34, 20, 'KARLA GALLARDO RODRIGUEZ', '777888', 'CH', 'MUJER', '13:30 - 14:00', '2023-05-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `id_pagos` int(20) NOT NULL AUTO_INCREMENT,
  `numero_control_alumno` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_pago` text COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_pagos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=252 ;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pagos`, `numero_control_alumno`, `fecha_pago`) VALUES
(1, '191130291', '21/09/2022'),
(2, '201130050', '21/09/2022'),
(3, '191130301', '21/09/2022'),
(4, '191130289', '21/09/2022'),
(5, '221130215', '21/09/2022'),
(6, '221130268', '21/09/2022'),
(7, '181130423', '21/09/2022'),
(8, '221130219', '21/09/2022'),
(9, '181130420', '21/09/2022'),
(10, '221130529', '21/09/2022'),
(11, '191130257', '21/09/2022'),
(12, '221130270', '21/09/2022'),
(13, '221130259', '21/09/2022'),
(14, '201130071', '22/09/2022'),
(15, '181130435', '22/09/2022'),
(16, '191130242', '22/09/2022'),
(17, '191130262', '22/09/2022'),
(18, '221130273', '22/09/2022'),
(19, '211130035', '22/09/2022'),
(20, '221130271', '22/09/2022'),
(21, '191130619', '22/09/2022'),
(22, '181130386', '22/09/2022'),
(23, '181130123', '22/09/2022'),
(24, '221130290', '22/09/2022'),
(25, '191130295', '22/09/2022'),
(26, '191130266', '22/09/2022'),
(27, '201130040', '22/09/2022'),
(28, '181130398', '22/09/2022'),
(29, '191130258', '22/09/2022'),
(30, '191130331', '22/09/2022'),
(31, '191130052', '22/09/2022'),
(32, '181130406', '22/09/2022'),
(33, '201130044', '22/09/2022'),
(34, '181130432', '23/09/2022'),
(35, '201130247', '23/09/2022'),
(36, '191130313', '23/09/2022'),
(37, '191130312', '23/09/2022'),
(38, '191130237', '23/09/2022'),
(39, '211130264', '23/09/2022'),
(40, '191130286', '23/09/2022'),
(41, '201130051', '23/09/2022'),
(42, '201130036', '23/09/2022'),
(43, '211130239', '23/09/2022'),
(44, '211130183', '23/09/2022'),
(45, '211130251', '23/09/2022'),
(46, '211130050', '23/09/2022'),
(47, '201130354', '23/09/2022'),
(48, '191130271', '23/09/2022'),
(49, '211130267', '23/09/2022'),
(50, '191130308', '23/09/2022'),
(51, '221130229', '23/09/2022'),
(52, '181130463', '23/09/2022'),
(53, '191130250', '23/09/2022'),
(54, '191130276', '23/09/2022'),
(55, '211130040', '23/09/2022'),
(56, '191130267', '23/09/2022'),
(57, '191130327', '23/09/2022'),
(58, '191130278', '23/09/2022'),
(59, '191130306', '23/09/2022'),
(60, '181130393', '23/09/2022'),
(61, '201130246', '23/09/2022'),
(62, '211130044', '23/09/2022'),
(63, '201130260', '23/09/2022'),
(64, '201130253', '23/09/2022'),
(65, '201130213', '23/09/2022'),
(66, '191130273', '23/09/2022'),
(67, '191130323', '23/09/2022'),
(68, '221130280', '23/09/2022'),
(69, '211130226', '23/09/2022'),
(70, '181130433', '23/09/2022'),
(71, '191130061', '23/09/2022'),
(72, '211130217', '23/09/2022'),
(73, '191130053', '23/09/2022'),
(74, '181130426', '23/09/2022'),
(75, '181130104', '23/09/2022'),
(76, '191130119', '23/09/2022'),
(77, '201130221', '23/09/2022'),
(78, '191130044', '23/09/2022'),
(79, '191130057', '23/09/2022'),
(80, '181130465', '23/09/2022'),
(81, '191130300', '23/09/2022'),
(82, '201130039', '23/09/2022'),
(83, '181130446', '23/09/2022'),
(84, '211130216', '23/09/2022'),
(85, '181130395', '23/09/2022'),
(86, '191130325', '23/09/2022'),
(87, '191130263', '23/09/2022'),
(88, '191130248', '23/09/2022'),
(89, '211130188', '23/09/2022'),
(90, '221130233', '23/09/2022'),
(91, '191130269', '23/09/2022'),
(92, '221130221', '23/09/2022'),
(93, '181130452', '24/09/2022'),
(94, '211130218', '24/09/2022'),
(95, '211130034', '24/09/2022'),
(96, '201130217', '24/09/2022'),
(97, '181130466', '24/09/2022'),
(98, '181130107', '24/09/2022'),
(99, '181130070', '26/09/2022'),
(100, '221130284', '26/09/2022'),
(101, '181130385', '26/09/2022'),
(102, '201130240', '26/09/2022'),
(103, '201130362', '26/09/2022'),
(104, '201130360', '26/09/2022'),
(105, '211130259', '26/09/2022'),
(106, '211130093', '26/09/2022'),
(107, '211130262', '26/09/2022'),
(108, '211130196', '26/09/2022'),
(109, '181130255', '26/09/2022'),
(110, '221130260', '26/09/2022'),
(111, '221130492', '26/09/2022'),
(112, '221130218', '26/09/2022'),
(113, '181130464', '26/09/2022'),
(114, '221130275', '26/09/2022'),
(115, '181130077', '26/09/2022'),
(116, '181130094', '26/09/2022'),
(117, '221130232', '26/09/2022'),
(118, '191130042', '26/09/2022'),
(119, '221130267', '26/09/2022'),
(120, '181130415', '26/09/2022'),
(121, '191130054', '26/09/2022'),
(122, '221130302', '26/09/2022'),
(123, '221130279', '26/09/2022'),
(124, '181130445', '26/09/2022'),
(125, '171130313', '26/09/2022'),
(126, '211130234', '27/09/2022'),
(127, '211130268', '27/09/2022'),
(128, '221130265', '27/09/2022'),
(129, '221130236', '27/09/2022'),
(130, '221130224', '27/09/2022'),
(131, '211130223', '27/09/2022'),
(132, '221130276', '27/09/2022'),
(133, '211130184', '27/09/2022'),
(134, '221130231', '28/09/2022'),
(135, '221130274', '28/09/2022'),
(136, '221130223', '28/09/2022'),
(137, '211130237', '28/09/2022'),
(138, '221130247', '28/09/2022'),
(139, '211130187', '28/09/2022'),
(140, '211130255', '28/09/2022'),
(141, '201130222', '28/09/2022'),
(142, '211130206', '28/09/2022'),
(143, '211130245', '28/09/2022'),
(144, '211130198', '28/09/2022'),
(145, '211130228', '28/09/2022'),
(146, '211130186', '28/09/2022'),
(147, '221130242', '28/09/2022'),
(148, '211130192', '28/09/2022'),
(149, '221130304', '28/09/2022'),
(150, '221130264', '28/09/2022'),
(151, '221130499', '28/09/2022'),
(152, '211130257', '28/09/2022'),
(153, '211130260', '28/09/2022'),
(154, '211130236', '28/09/2022'),
(155, '211130233', '28/09/2022'),
(156, '211130247', '28/09/2022'),
(157, '191130613', '28/09/2022'),
(158, '211130246', '28/09/2022'),
(159, '211130193', '28/09/2022'),
(160, '221130032', '28/09/2022'),
(161, '191130265', '29/09/2022'),
(162, '221130297', '29/09/2022'),
(163, '211130254', '29/09/2022'),
(164, '211130211', '29/09/2022'),
(165, '211130197', '29/09/2022'),
(166, '211130214', '29/09/2022'),
(167, '211130249', '29/09/2022'),
(168, '221130507', '29/09/2022'),
(169, '211130042', '29/09/2022'),
(170, '221130299', '30/09/2022'),
(171, '191130246', '30/09/2022'),
(172, '181130417', '04/10/2022'),
(173, '221130077', '04/10/2022'),
(174, '181130108', '05/10/2022'),
(175, '221130493', '05/10/2022'),
(176, '201130373', '05/10/2022'),
(177, '211130238', '05/10/2022'),
(178, '221130292', '05/10/2022'),
(179, '221130516', '05/10/2022'),
(180, '181130424', '05/10/2022'),
(181, '221130281', '05/10/2022'),
(182, '191130329', '05/10/2022'),
(183, '221130036', '05/10/2022'),
(184, '221130238', '05/10/2022'),
(185, '221130531', '05/10/2022'),
(186, '211130041', '05/10/2022'),
(187, '221130034', '05/10/2022'),
(188, '201130042', '05/10/2022'),
(189, '201130250', '05/10/2022'),
(190, '221130078', '06/10/2022'),
(191, '221130029', '06/10/2022'),
(192, '211130269', '07/10/2022'),
(193, '191130577', '07/10/2022'),
(194, '221130023', '07/10/2022'),
(195, '221130216', '07/10/2022'),
(196, '221130039', '07/10/2022'),
(197, '221130069', '07/10/2022'),
(198, '221130041', '07/10/2022'),
(199, '201130366', '07/10/2022'),
(200, '201130259', '07/10/2022'),
(201, '211130039', '07/10/2022'),
(202, '221130244', '07/10/2022'),
(203, '161130405', '10/10/2022'),
(204, '171130356', '10/10/2022'),
(205, '181130097', '11/10/2022'),
(206, '181130096', '11/10/2022'),
(207, '221130256', '11/10/2022'),
(208, '181130072', '13/10/2022'),
(209, '211130270', '13/10/2022'),
(210, '221130294', '13/10/2022'),
(211, '211130210', '13/10/2022'),
(212, '201130239', '13/10/2022'),
(213, '221130225', '13/10/2022'),
(214, '221130488', '13/10/2022'),
(215, '221130287', '13/10/2022'),
(216, '211130256', '13/10/2022'),
(217, '221130250', '13/10/2022'),
(218, '191130261', '13/10/2022'),
(219, '211130244', '13/10/2022'),
(220, '221130005', '13/10/2022'),
(221, '191210030', '13/10/2022'),
(222, '191130309', '13/10/2022'),
(223, '221130243', '13/10/2022'),
(224, '191130305', '13/10/2022'),
(225, '211130203', '13/10/2022'),
(226, '221130028', '13/10/2022'),
(227, '221130248', '13/10/2022'),
(228, '191130045', '13/10/2022'),
(229, '211130205', '13/10/2022'),
(230, '211130227', '13/10/2022'),
(231, '221130501', '13/10/2022'),
(232, '191130259', '13/10/2022'),
(233, '201130231', '13/10/2022'),
(234, '201130227', '13/10/2022'),
(235, '221130514', '13/10/2022'),
(236, '181130257', '13/10/2022'),
(237, '221130040', '13/10/2022'),
(238, '221130251', '13/10/2022'),
(239, '211130052', '13/10/2022'),
(240, '181130411', '13/10/2022'),
(241, '211130055', '13/10/2022'),
(242, '181130122', '13/10/2022'),
(243, '221130035', '13/10/2022'),
(244, '181130130', '13/10/2022'),
(245, '221130298', '13/10/2022'),
(246, '191130287', '13/10/2022'),
(247, '221130300', '13/10/2022'),
(248, '181130401', '13/10/2022'),
(249, '191130282', '13/10/2022'),
(250, '211130037', '13/10/2022'),
(251, '181130098', '13/10/2022');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_user` int(20) NOT NULL AUTO_INCREMENT,
  `numero_control` text COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_usuario` text COLLATE utf8_spanish2_ci NOT NULL,
  `carrera` text COLLATE utf8_spanish2_ci NOT NULL,
  `semestre` text COLLATE utf8_spanish2_ci NOT NULL,
  `grupo` text COLLATE utf8_spanish2_ci NOT NULL,
  `correo` text COLLATE utf8_spanish2_ci NOT NULL,
  `password` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `limite` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `numero_control`, `nombre`, `tipo_usuario`, `carrera`, `semestre`, `grupo`, `correo`, `password`, `fecha`, `limite`) VALUES
(6, '123456', 'OMAR ARMAS M', 'maestro', 'Ingenieria en Logística', '', '', 'omar@gmail.com', '123', '2023-05-28 11:22:03', 1),
(7, '1123456777', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', '123', '2023-05-24 03:22:40', 1),
(8, '221130268', 'MIGUEL CÁMARA RODRÍGUEZ', 'alumno', 'Ingeniería Ambiental', '6', '3A', 'mm@gmail.com', '123', '2023-05-28 09:32:14', 1),
(9, '31342', 'LUIS RODOLFO G', 'alumno', 'Ingeniería Ambiental', '7', '3B', 'mmm@gmail.com', '12345', '2023-05-27 18:50:40', 1),
(10, '456789', 'JOSE SANCHEZ FERNANDEZ', 'alumno', 'Ingeniería Industrial', '3', '3A', 'l456789@gmail.com', '123', '2023-05-26 08:52:00', 1),
(11, '777888', 'KARLA GALLARDO RODRIGUEZ', 'alumno', 'Ingeniería Ambiental', '2', '1234', 'karla@gmail.com', '123', '2023-05-28 09:35:58', 1),
(12, '8888888', 'MIGUEL CÁMARA RODRÍGUEZ', 'maestro', 'Ingeniería Industrial', 'universal', 'universal', 'mm44@gmail.com', '123', '2023-05-28 10:38:19', 1),
(13, '412412', 'BRAD GUTIERREZ', 'maestro', 'Ingeniería Ambiental', 'universal', 'universal', 'amg@gmail.com', '123', '2023-05-28 11:14:49', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
