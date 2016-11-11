-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2016 a las 16:28:31
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
(1, 'HOla soy morris', NULL, NULL, 4, 1),
(2, 'hola soy jhonsito', NULL, NULL, 5, 2),
(3, 'hola soy cosito', NULL, NULL, 4, 2);

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
(1, 4, 2),
(2, 4, 4),
(3, 5, 1),
(4, 5, 2),
(5, 5, 3),
(6, 5, 4),
(7, 6, 1),
(8, 6, 3),
(9, 6, 4),
(10, 7, 1),
(11, 7, 2),
(12, 7, 3),
(17, 9, 1),
(18, 9, 3),
(19, 9, 4),
(20, 10, 1),
(21, 10, 3),
(22, 11, 1),
(23, 11, 3),
(24, 12, 1),
(25, 17, 3);

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
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resumen` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `estadosdeproyectos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `nombrep`, `sectorenfocado`, `empresa`, `descripcion`, `resumen`, `created_at`, `updated_at`, `usuario_id`, `estadosdeproyectos_id`) VALUES
(4, 'lsajkfsdhkjhdsf', 'tecnologia', 'SENA', 'dfhskjfdhsdkjfhksd                ', 'porque me cae mal, suerte', '2016-09-19', '2016-11-11', 1, 1),
(5, 'mama', 'Industria', 'Sena Bonito', '                uGIUGVPIsgvpuiWVHÑuigvñIUGVlivgurugqrvug', '', '2016-09-19', '2016-11-11', 1, 3),
(6, 'Dos', 'Lavel', 'SenaDos', '                jhdbvdvb ñsiu bñsoi bob ', '', '2016-09-19', '2016-11-09', 1, 1),
(7, 'La caja', 'Industria', 'Sena', '                sdbvjsbñvbñviab{vi nS{OVobv-SLDV-Lsd', 'OE', '2016-09-20', '2016-11-11', 1, 1),
(9, 'Alien', 'Mercantil', 'Dell', '                kasnv''kndkvnadscnsdc''kdlnv'';akdfn ''acn''cvn''asnc''lDSCSDCLSKJVC ', 'este proyecto no continua', '2016-10-20', '2016-11-11', 2, 2),
(10, 'juju', 'avon', 'no tengo', '                aknbv;kafdnv;kandvlkadfnvldfemv/.dsl,mvA:>L<MSadf', 'fuera', '2016-10-30', '2016-11-11', 2, 3),
(11, 'nuevo', 'cualquiera', 'ud', '                sdzf', 'nunca', '2016-11-01', '2016-11-10', 2, 2),
(12, 'vacio', 'sin nada', '', '                ', 'suerte', '2016-11-01', '2016-11-10', 2, 2),
(13, 'el tres', 'jum', '', '                ', '', '2016-11-01', '2016-11-10', 2, 2),
(14, 'el tres', 'jum', '', '                ', '', '2016-11-01', '2016-11-10', 2, 2),
(15, 'el tres', 'jum', '', '                ', 'no lo quiero ver', '2016-11-01', '2016-11-10', 2, 2),
(16, 's', 's', '', '                ', '', '2016-11-01', '2016-11-10', 2, 2),
(17, 's', 's', '', '                ', 'pues probar', '2016-11-01', '2016-11-10', 2, 3);

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

--
-- Volcado de datos para la tabla `proyectosusers`
--

INSERT INTO `proyectosusers` (`id`, `proyectos_id`, `users_id`, `estadosproyectosusers_id`) VALUES
(1, 6, 2, 3),
(2, 10, 2, 3),
(3, 4, 2, 1),
(4, 5, 2, 2),
(5, 7, 2, 3);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nameu`, `apellidos`, `email`, `celular`, `titulos`, `estado`, `password`, `remember_token`, `tiporol`, `created_at`, `updated_at`) VALUES
(1, 'Morris', 'anacleto', 'morris@gmail.com', 3215697363, 'Tecnologo', 'sinestado', '$2y$10$TAaC3BVpe4v4lXtkwZ0Mb.PzBlgt7Eo7XkQdEvIphDEMc3zdEUtAe', '3F7zTK8Sk2omsqS5yD0MpJF2MKgx10X7ON4INQ5K7frTlUtbToK7Q6cDXzeK', 'gestor', NULL, '2016-11-11 07:27:14'),
(2, 'Yonathan Andres', 'Galvez Giraldo', 'ogiraldo272@gmail.com', 3122730311, 'Tecnologo', 'sinestado', '$2y$10$G8U9VHdgeAPcyTkOeFiyFe9GQPadn0JxQmj4nNZme0BtwfD.r3Xtu', 'Ky97zSvOWsw23vsxBy4tTCaAHhAxNqy80DpBp5ObFgrWH8SEspm3zhSta57q', 'usuario', NULL, '2016-11-11 05:59:48'),
(3, 'henry', 'valencia', 'henry@hotmail.com', 213344, 'teeee', 'sinestado', '$2y$10$/jba58HVxbq8BpJV3UeBTO3jDeSMdBluSySqOZphPXg7.N64pMud2', 'ZzDrQqKTrMFn9YVE0I9Pb09RRo5SMUTXIoxmphsoO4jGz5lqhWyyaOtB9EQq', 'usuario', '2016-10-21 00:36:47', '2016-10-21 00:39:12'),
(4, 'Yon', 'Gal', 'ogiraldo@yahoo.com', 312, 'mani', 'sinestado', '$2y$10$/8wvnTjNMyv2CYFROAg52.Rpl5dTTCdeYJBdNwnDUbXL.NkQc39ku', '4e89SKcWpkH2gt9s9gI140Co157iLgv75iPFUfcnXyt1ZAW9zOy2TXyB6JqE', 'usuario', '2016-11-11 07:46:03', '2016-11-11 08:14:05');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `proyectosusers`
--
ALTER TABLE `proyectosusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
