-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2019 a las 04:18:03
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Patricio', 1, '2019-04-08 22:32:59', '2019-04-08 22:32:59'),
(2, 'Eddie', 1, '2019-04-09 00:11:28', '2019-04-09 00:11:28'),
(3, 'Uriel', 1, '2019-04-09 00:15:54', '2019-04-09 00:15:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venta_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`id`, `venta_id`, `producto_id`, `cliente_id`, `cantidad`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, '1970-01-01 03:00:01', '1970-01-01 03:00:01'),
(2, 2, 1, 1, 1, 1, '2019-04-09 00:09:08', '2019-04-09 00:09:08'),
(7, 3, 1, 1, 1, 1, '2019-04-09 01:56:08', '2019-04-09 01:56:08'),
(8, 3, 1, 1, 1, 1, '2019-04-09 02:20:07', '2019-04-09 02:20:07'),
(9, 3, 1, 1, 1, 1, '2019-04-09 02:23:32', '2019-04-09 02:23:32'),
(10, 3, 1, 1, 10, 1, '2019-04-09 02:32:26', '2019-04-09 02:32:26'),
(11, 3, 1, 2, 10, 1, '2019-04-09 02:34:43', '2019-04-09 02:34:43'),
(14, 3, 1, 1, 10, 1, '2019-04-09 04:43:01', '2019-04-09 04:43:01'),
(15, 3, 1, 1, 10, 1, '2019-04-09 04:50:59', '2019-04-09 04:50:59'),
(16, 3, 1, 1, 10, 1, '2019-04-09 04:52:47', '2019-04-09 04:52:47'),
(17, 3, 1, 1, 10, 1, '2019-04-09 04:53:33', '2019-04-09 04:53:33'),
(18, 3, 1, 3, 1, 1, '2019-04-09 04:54:47', '2019-04-09 04:54:47'),
(19, 3, 1, 1, 2, 1, '2019-04-09 04:55:41', '2019-04-09 04:55:41'),
(20, 3, 2, 3, 10, 1, '2019-04-09 04:57:32', '2019-04-09 04:57:32'),
(21, 3, 1, 1, 10, 1, '2019-04-09 05:03:06', '2019-04-09 05:03:06'),
(22, 3, 1, 1, 10, 1, '2019-04-09 05:27:02', '2019-04-09 05:27:02'),
(23, 3, 1, 1, 10, 1, '2019-04-09 05:32:36', '2019-04-09 05:32:36'),
(24, 3, 1, 1, 10, 1, '2019-04-09 05:34:33', '2019-04-09 05:34:33'),
(25, 51, 1, 1, 10, 1, '2019-04-09 05:50:41', '2019-04-09 05:50:41'),
(26, 52, 2, 1, 5, 1, '2019-04-09 05:52:05', '2019-04-09 05:52:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE `iva` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iva` double(8,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`id`, `iva`, `created_at`, `updated_at`) VALUES
(1, 0.170, NULL, NULL),
(2, 0.180, NULL, NULL),
(3, 0.190, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_04_130835_create_iva_table', 1),
(4, '2019_04_04_141242_create_clientes_table', 1),
(5, '2019_04_04_141628_create_productos_table', 1),
(6, '2019_04_04_141912_create_ventas_table', 1),
(7, '2019_04_04_142108_create_detalles_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `cantidad`, `created_at`, `updated_at`) VALUES
(1, 'coca cola', 1500, 10, NULL, NULL),
(2, 'lapiz', 500, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sergio esteban ayala del castillo', 'sergio.ayala@agibiz.cl', NULL, '$2y$10$PmQdOK4HgxW.cRM95CHJEebwKIo12AdG3tLhjRIZc9c4Uriqz6Qhq', NULL, '2019-04-08 22:32:53', '2019-04-08 22:32:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date DEFAULT NULL,
  `iva_id` bigint(20) UNSIGNED NOT NULL,
  `descuento` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `iva_id`, `descuento`, `total`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, 1231, 3123.00, '2019-04-08 22:35:32', '2019-04-08 22:35:32'),
(2, NULL, 2, 1, 999.00, '2019-04-08 22:35:55', '2019-04-08 22:35:55'),
(3, NULL, 2, 3, 33.00, '2019-04-08 23:01:08', '2019-04-08 23:01:08'),
(5, NULL, 2, 32131, 12.00, '2019-04-08 23:03:59', '2019-04-08 23:03:59'),
(6, NULL, 2, 10000, 3.00, '2019-04-08 23:10:35', '2019-04-08 23:10:35'),
(7, NULL, 2, 22222, 111.00, '2019-04-08 23:11:12', '2019-04-08 23:11:12'),
(8, NULL, 1, 4, 4.00, '2019-04-08 23:27:23', '2019-04-08 23:27:23'),
(9, NULL, 2, 231321, 111.00, '2019-04-08 23:36:55', '2019-04-08 23:36:55'),
(10, NULL, 2, 22, 66.00, '2019-04-08 23:58:09', '2019-04-08 23:58:09'),
(12, NULL, 2, 22, 66.00, '2019-04-09 00:06:04', '2019-04-09 00:06:04'),
(13, NULL, 2, 44, 444.00, '2019-04-09 00:06:35', '2019-04-09 00:06:35'),
(14, NULL, 2, 22, 55.00, '2019-04-09 00:08:35', '2019-04-09 00:08:35'),
(15, NULL, 2, 333, 333.00, '2019-04-09 00:09:07', '2019-04-09 00:09:07'),
(16, NULL, 2, 22, 3333.00, '2019-04-09 00:13:04', '2019-04-09 00:13:04'),
(17, NULL, 2, 222, 333.00, '2019-04-09 00:14:41', '2019-04-09 00:14:41'),
(18, NULL, 2, 888, 999.00, '2019-04-09 00:15:44', '2019-04-09 00:15:44'),
(19, NULL, 2, 888, 777.00, '2019-04-09 00:16:05', '2019-04-09 00:16:05'),
(20, NULL, 2, 20000, 111.00, '2019-04-09 01:51:52', '2019-04-09 01:51:52'),
(21, NULL, 2, 22, 888.00, '2019-04-09 01:54:32', '2019-04-09 01:54:32'),
(22, NULL, 2, 22, 888.00, '2019-04-09 01:55:02', '2019-04-09 01:55:02'),
(23, NULL, 2, 555, 666.00, '2019-04-09 01:55:09', '2019-04-09 01:55:09'),
(24, NULL, 2, 555, 666.00, '2019-04-09 01:56:08', '2019-04-09 01:56:08'),
(25, NULL, 2, 32131231, 1111.00, '2019-04-09 02:20:07', '2019-04-09 02:20:07'),
(26, NULL, 2, 22222, 33333.00, '2019-04-09 02:23:32', '2019-04-09 02:23:32'),
(27, NULL, 2, 223, 2121.00, '2019-04-09 02:31:32', '2019-04-09 02:31:32'),
(28, NULL, 2, 222, 111.00, '2019-04-09 02:32:26', '2019-04-09 02:32:26'),
(29, NULL, 2, 22, 777.00, '2019-04-09 02:34:43', '2019-04-09 02:34:43'),
(30, NULL, 2, 222, 333.00, '2019-04-09 02:37:32', '2019-04-09 02:37:32'),
(31, NULL, 2, 22, 5555.00, '2019-04-09 04:42:36', '2019-04-09 04:42:36'),
(32, NULL, 1, 22, 3.00, '2019-04-09 04:42:48', '2019-04-09 04:42:48'),
(33, NULL, 1, 22, 444.00, '2019-04-09 04:43:01', '2019-04-09 04:43:01'),
(34, NULL, 2, 666, 1.00, '2019-04-09 04:50:59', '2019-04-09 04:50:59'),
(36, NULL, 1, 666, 99.00, '2019-04-09 04:52:47', '2019-04-09 04:52:47'),
(37, NULL, 1, 77, 1.00, '2019-04-09 04:53:33', '2019-04-09 04:53:33'),
(38, NULL, 3, 99, 3123.00, '2019-04-09 04:54:47', '2019-04-09 04:54:47'),
(39, NULL, 3, 31241231, 666.00, '2019-04-09 04:55:41', '2019-04-09 04:55:41'),
(40, NULL, 3, 66777, 32123.00, '2019-04-09 04:57:32', '2019-04-09 04:57:32'),
(41, NULL, 1, 22, 66.00, '2019-04-09 04:58:14', '2019-04-09 04:58:14'),
(42, NULL, 1, 22, 8888.00, '2019-04-09 04:59:41', '2019-04-09 04:59:41'),
(43, NULL, 1, 22, 8888.00, '2019-04-09 04:59:58', '2019-04-09 04:59:58'),
(44, NULL, 1, 22, 8888.00, '2019-04-09 05:01:34', '2019-04-09 05:01:34'),
(45, NULL, 1, 22, 8888.00, '2019-04-09 05:02:21', '2019-04-09 05:02:21'),
(46, NULL, 1, 22, 8888.00, '2019-04-09 05:02:35', '2019-04-09 05:02:35'),
(47, NULL, 3, 2231, 777.00, '2019-04-09 05:03:06', '2019-04-09 05:03:06'),
(48, NULL, 1, 22, 44.00, '2019-04-09 05:27:02', '2019-04-09 05:27:02'),
(49, NULL, 1, 22, 77.00, '2019-04-09 05:32:36', '2019-04-09 05:32:36'),
(50, NULL, 1, 22, 1.00, '2019-04-09 05:34:32', '2019-04-09 05:34:32'),
(51, NULL, 1, 22, 999.00, '2019-04-09 05:50:41', '2019-04-09 05:50:41'),
(52, NULL, 3, 2152, 2.00, '2019-04-09 05:52:05', '2019-04-09 05:52:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalles_venta_id_foreign` (`venta_id`),
  ADD KEY `detalles_producto_id_foreign` (`producto_id`),
  ADD KEY `detalles_cliente_id_foreign` (`cliente_id`);

--
-- Indices de la tabla `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ventas_iva_id_foreign` (`iva_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD CONSTRAINT `detalles_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `detalles_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `detalles_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_iva_id_foreign` FOREIGN KEY (`iva_id`) REFERENCES `iva` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
