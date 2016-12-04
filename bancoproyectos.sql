-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2016 a las 21:57:50
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bancoproyectos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `comentario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `proyecto_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `created_at`, `updated_at`, `proyecto_id`, `usuario_id`) VALUES
(1, 'Hola!, quisiera pertenecer a este proyecto, como puedo hacerlo?', '2016-11-24 00:19:54', '2016-11-24 00:19:54', 45, 2),
(2, 'Hola Yonathan, es muy fácil, simplemente dale click al boto inscribirse que esta  en esta pagina, o también lo puedes hacer donde se encuentran todo los proyectos', '2016-11-24 00:22:06', '2016-11-24 00:22:06', 45, 1),
(3, 'Perfecto', '2016-12-01 19:11:59', '2016-12-01 19:11:59', 45, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosdeproyectos`
--

CREATE TABLE `estadosdeproyectos` (
  `id` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadosdeproyectos`
--

INSERT INTO `estadosdeproyectos` (`id`, `estado`) VALUES
(1, 'En Banco'),
(2, 'En Revisión'),
(3, 'Reclutando'),
(4, 'En Desarrollo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosproyectosusers`
--

CREATE TABLE `estadosproyectosusers` (
  `id` int(11) NOT NULL,
  `estado` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadosproyectosusers`
--

INSERT INTO `estadosproyectosusers` (`id`, `estado`) VALUES
(1, 'Reclutado'),
(2, 'Solicitando'),
(3, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

CREATE TABLE `lineas` (
  `id` int(10) UNSIGNED NOT NULL,
  `linea` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`id`, `linea`, `created_at`, `updated_at`) VALUES
(1, 'Tecnologias Virtuales', NULL, NULL),
(2, 'Biotecnologia', NULL, NULL),
(3, 'Electrónica y telecomunicaciones', NULL, NULL),
(4, 'Ingenieria y Diseño', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineasproyectos`
--

CREATE TABLE `lineasproyectos` (
  `id` int(10) UNSIGNED NOT NULL,
  `proyectos_id` int(10) UNSIGNED NOT NULL,
  `lineas_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `lineasproyectos`
--

INSERT INTO `lineasproyectos` (`id`, `proyectos_id`, `lineas_id`) VALUES
(1, 45, 1),
(2, 45, 3),
(29, 47, 1),
(30, 47, 2),
(31, 47, 3),
(32, 47, 4),
(33, 48, 3),
(34, 48, 4),
(37, 50, 1),
(40, 50, 3),
(41, 49, 1),
(45, 46, 4),
(46, 46, 1),
(47, 46, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_09_01_191226_create_lineas_table', 1),
('2015_09_02_081558_create_proyectos_table', 1),
('2016_09_04_081503_create_comentarios_table', 1),
('2016_09_16_182215_create_lineasproyectos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombrep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sectorenfocado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `resumen` varchar(800) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estadosdeproyectos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `nombrep`, `sectorenfocado`, `empresa`, `descripcion`, `resumen`, `created_at`, `updated_at`, `usuario_id`, `imagen`, `estadosdeproyectos_id`) VALUES
(45, 'TecnoBike', 'Industria', 'Sena', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at pharetra lorem. Vivamus vehicula nunc non lorem hendrerit elementum. sim. Ut eu ligula erat. ', 'No continua', '2016-11-23', '2016-12-01', 2, 'imagenes/proyectos/teknobike_felt_homepage_6.jpg', 4),
(46, 'Agua Pura', 'Ambiental', 'AgroEmpresa S.A', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at pharetra lorem. Vivamus vehicula nunc non lorem hendrerit elementum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at pharetra lorem. Vivamus vehicula nunc non lorem hendrerit elementum. ', '2016-11-23', '2016-12-01', 2, 'imagenes/proyectos/agua.jpg', 4),
(47, 'Mejor Comunicación', 'Telecomunicaciones ', 'ComuUniti', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at pharetra lorem. Vivamus vehicula nunc non lorem hendrerit elementum. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at pharetra lorem. Vivamus vehicula nunc non lorem hendrerit elementum.', '2016-11-23', '2016-12-01', 2, 'imagenes/proyectos/descarga.jpg', 4),
(48, 'Maqui Empanadas', 'Alimentos', 'Empa Nadas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at pharetra lorem. Vivamus vehicula nunc non lorem hendrerit elementum.', 'Inicia el desarrollo de este proyecto', '2016-11-23', '2016-12-01', 7, 'imagenes/proyectos/empanadas.jpg', 3),
(49, 'Fobias', 'Psicología ', 'Universidad de Manizales', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at pharetra lorem. Vivamus vehicula nunc non lorem hendrerit elementum.\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at pharetra lorem. Vivamus vehicula nunc non lorem hendrerit elementum. Praesent mollis purus non egestas dignissim. Ut eu ligula erat. Fusce eget nisl sit amet metus iaculis gravida sasdasdasd', '2016-11-23', '2016-12-01', 1, 'imagenes/proyectos/fobias.jpg', 3),
(50, 'Pared verde ', 'Ambiental', 'Sena', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed iaculis purus. Nunc iaculis scelerisque ipsum. In aliquam luctus mi. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed iaculis purus. Nunc iaculis scelerisque ipsum. In aliquam luctus mi. In pellentesque venenatis ultrices. Integer porttitor euismod est, quis imperdiet turpis accumsan et. Aliquam erat volutpat. Vestibulum risus neque, scelerisque id imperdiet sed, vestibulum quis eros. Vivamus dapibus tempus auctor.', '2016-11-23', '2016-12-01', 1, 'imagenes/proyectos/paredverde.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectosusers`
--

CREATE TABLE `proyectosusers` (
  `id` int(11) NOT NULL,
  `proyectos_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `estadosproyectosusers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nameu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `celular` bigint(20) NOT NULL,
  `titulos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sinestado',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tiporol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nameu`, `apellidos`, `email`, `celular`, `titulos`, `estado`, `password`, `remember_token`, `tiporol`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Juan', 'Muñoz', 'juan@gmail.com', 3215697363, 'Tecnologo', 'sinestado', '$2y$10$TAaC3BVpe4v4lXtkwZ0Mb.PzBlgt7Eo7XkQdEvIphDEMc3zdEUtAe', 'o2B7NWjHgamwxYxd0uQ1UQKg9NtYqLUTu3iKRqxNpTR6YM3IlUEXNkg85lVc', 'gestor', NULL, NULL, '2016-12-02 01:43:38'),
(2, 'Yonathan Andres', 'Galvez Giraldo', 'ogiraldo272@gmail.com', 3122730311, 'Tecnologo', 'sinestado', '$2y$10$G8U9VHdgeAPcyTkOeFiyFe9GQPadn0JxQmj4nNZme0BtwfD.r3Xtu', 'RMW6sNCEYlBp2o0gjvWuFInOrIGjuAwTEtD8IwgEME1WNXhbse0YvqvErAq2', 'usuario', NULL, NULL, '2016-12-02 01:54:49'),
(7, 'Henry Arturo', 'Valencia Parra', 'henry_parra1994@hotmail.com', 3215697363, 'Tecnologo', 'sinestado', '$2y$10$4flVJaeSDTMpo6FBAyhJYur/5yhRh./wfU3zilTAqVhC1Wax7KdC.', 'bxqzjiPGC2ebfgpFfWR2rMjiT25F6CkbToaoZV7GGoRlfUpQVP272kh2Mim9', 'usuario', NULL, '2016-11-23 22:01:37', '2016-11-24 00:53:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentarios_proyecto_id_foreign` (`proyecto_id`),
  ADD KEY `comentarios_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `estadosdeproyectos`
--
ALTER TABLE `estadosdeproyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadosproyectosusers`
--
ALTER TABLE `estadosproyectosusers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lineasproyectos`
--
ALTER TABLE `lineasproyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lineasproyectos_proyectos_id_foreign` (`proyectos_id`),
  ADD KEY `lineasproyectos_lineas_id_foreign` (`lineas_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyectos_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `proyectosusers`
--
ALTER TABLE `proyectosusers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `estadosdeproyectos`
--
ALTER TABLE `estadosdeproyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estadosproyectosusers`
--
ALTER TABLE `estadosproyectosusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `lineas`
--
ALTER TABLE `lineas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `lineasproyectos`
--
ALTER TABLE `lineasproyectos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `proyectosusers`
--
ALTER TABLE `proyectosusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `lineasproyectos`
--
ALTER TABLE `lineasproyectos`
  ADD CONSTRAINT `lineasproyectos_lineas_id_foreign` FOREIGN KEY (`lineas_id`) REFERENCES `lineas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lineasproyectos_proyectos_id_foreign` FOREIGN KEY (`proyectos_id`) REFERENCES `proyectos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
