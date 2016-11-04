-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2016 a las 17:41:15
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
(4, 'lsajkfsdhkjhdsf', 'tecnologia', 'SENA', 'dfhskjfdhsdkjfhksd                ', 'proyecto de una creacion de papas', '2016-09-19', '2016-11-02', 1, 2),
(5, 'mama', 'Industria', 'Sena Bonito', '                uGIUGVPIsgvpuiWVHÑuigvñIUGVlivgurugqrvug', 'q ubo! bien, todo bien', '2016-09-19', '2016-11-01', 1, 3),
(6, 'Dos', 'Lavel', 'SenaDos', '                jhdbvdvb ñsiu bñsoi bob ', 'pepe', '2016-09-19', '2016-11-01', 1, 3),
(7, 'La caja', 'Industria', 'Sena', '                sdbvjsbñvbñviab{vi nS{OVobv-SLDV-Lsd', 'todos bien dASVSDVASCV', '2016-09-20', '2016-11-01', 1, 4),
(9, 'Alien', 'Mercantil', 'Dell', '                kasnv''kndkvnadscnsdc''kdlnv'';akdfn ''acn''cvn''asnc''lDSCSDCLSKJVC ', 'pues ve bien', '2016-10-20', '2016-11-01', 2, 4),
(10, 'juju', 'avon', 'no tengo', '                aknbv;kafdnv;kandvlkadfnvldfemv/.dsl,mvA:>L<MSadf', 'DASVWERDVDVVA', '2016-10-30', '2016-11-01', 2, 2),
(11, 'nuevo', 'cualquiera', 'ud', '                sdzf', NULL, '2016-11-01', '2016-11-01', 2, 2),
(12, 'vacio', 'sin nada', '', '                ', NULL, '2016-11-01', '2016-11-01', 2, 2),
(13, 'el tres', 'jum', '', '                ', NULL, '2016-11-01', '2016-11-01', 2, 2),
(14, 'el tres', 'jum', '', '                ', NULL, '2016-11-01', '2016-11-01', 2, 2),
(15, 'el tres', 'jum', '', '                ', '', '2016-11-01', '2016-11-02', 2, 3),
(16, 's', 's', '', '                ', NULL, '2016-11-01', '2016-11-01', 2, 2),
(17, 's', 's', '', '                ', NULL, '2016-11-01', '2016-11-01', 2, 2);

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
(1, 6, 2, 2),
(2, 10, 2, 2);

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
(1, 'Morris', 'anacleto', 'morris@gmail.com', 3215697363, 'Tecnologo', 'sinestado', '$2y$10$TAaC3BVpe4v4lXtkwZ0Mb.PzBlgt7Eo7XkQdEvIphDEMc3zdEUtAe', 'UgnrDVi0npQYxNkYMKpKeI3MWUeY25t6XZwWAvX0CH1PZObsraO2ZyRFLkT1', 'gestor', NULL, '2016-11-02 20:27:16'),
(2, 'Yonathan Andres', 'Galvez Giraldo', 'ogiraldo272@gmail.com', 3122730311, 'Tecnologo', 'sinestado', '$2y$10$G8U9VHdgeAPcyTkOeFiyFe9GQPadn0JxQmj4nNZme0BtwfD.r3Xtu', '9fz1BSvWceZMFfwUoiHRiuzSGYfbTjLEv85xSLdPIIwGS9LLztY5OmoJxFSI', 'usuario', NULL, '2016-11-02 20:17:14'),
(3, 'henry', 'valencia', 'henry@hotmail.com', 213344, 'teeee', 'sinestado', '$2y$10$/jba58HVxbq8BpJV3UeBTO3jDeSMdBluSySqOZphPXg7.N64pMud2', 'ZzDrQqKTrMFn9YVE0I9Pb09RRo5SMUTXIoxmphsoO4jGz5lqhWyyaOtB9EQq', 'usuario', '2016-10-21 00:36:47', '2016-10-21 00:39:12');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
