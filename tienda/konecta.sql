-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2023 a las 23:55:35
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `konecta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `documento` varchar(15) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `correo`, `direccion`) VALUES
(1, 'Manuel Bustamante', '122888888', 'manuel@hotmail.com', 'Calle 19 # 8-56'),
(2, 'Karoline Smith', '12345789', 'karo@hotmail.com', 'Calle 56 # 8-78'),
(4, 'Lucia', '78878787', 'luci@hotmail.com', 'calle fals'),
(8, 'Prueba', '788778', 'prue@example.com', 'calle eew223');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colums`
--

CREATE TABLE `colums` (
  `id` int(11) NOT NULL,
  `label` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colums`
--

INSERT INTO `colums` (`id`, `label`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Pendientes', '#f0f0f0', '2023-05-17 20:39:43', '2023-05-17 20:44:53'),
(2, 'En progreso', 'green', '2023-05-17 20:39:43', '2023-05-17 20:44:53'),
(3, 'Realizado', 'blue', '2023-05-17 20:39:43', '2023-05-17 20:44:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `order` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `colum_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `list`
--

INSERT INTO `list` (`id`, `order`, `price`, `colum_id`, `usuario_id`, `time`) VALUES
(1, 'Aprende Angular', '100', 1, 1, '2121'),
(2, 'Aprender Vue', '200', 2, 3, '212'),
(3, 'Aprender Javascript', '50', 1, 1, '2121'),
(4, 'Django', '500', 3, 1, NULL),
(5, 'SpringBoot', '590', 3, 1, NULL),
(6, 'Otra cosa', '4343', 3, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2023_05_28_215136_create_person_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `person`
--

INSERT INTO `person` (`id`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Pepe', 'pe@mail.com', 5555555, '2023-05-29 03:12:44', '2023-05-29 03:12:44'),
(2, 'Javier Agredo', 'jav22@gmail.com', 2132, '2023-05-29 04:54:03', '2023-05-29 06:35:13'),
(5, 'Jose Martinez Ordoñez', 'jm240@gmail.com', 45, '2023-05-29 05:11:33', '2023-05-29 06:35:25'),
(6, 'juanita perez', 'juan@gmail.com', 17501753, '2023-05-29 20:41:36', '2023-05-29 20:41:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `referencia` varchar(200) NOT NULL,
  `precio` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nombre`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `created_at`) VALUES
(1, 'Coca Cola', 'coca', 2000, 1000, 'Bebida', 94, '2023-05-30 20:51:41'),
(2, 'Pespsi', 'pesico', 2000, 1000, 'Bebidad', 99, '2023-05-30 21:21:48'),
(3, 'Manzana', 'Postobon', 2000, 1000, 'Bebidad', 5, '2023-05-30 20:51:00'),
(4, 'Papas Margarita', 'pollo/mayo', 1500, 250, 'Snacks', 25, '2023-05-30 21:25:15'),
(6, 'Crema dental', 'Colgate', 5500, 250, 'Aseo personal', 49, '2023-05-30 21:52:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `permiso_users` tinyint(4) NOT NULL,
  `permiso_clientes` tinyint(4) NOT NULL,
  `permiso_otro` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `permiso_users`, `permiso_clientes`, `permiso_otro`) VALUES
(1, 'Administrador', 1, 1, 1),
(2, 'Vendedor', 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `rol_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jose Martinez', 'jmartinez240@gmail.com', 1, NULL, '$2y$10$IEmdzlCsa/RzJzzrSnEpjuGryMZXdtjtJCAxiMMyvo1miOGNs8Afq', NULL, '2021-07-06 20:59:33', '2021-07-06 20:59:33'),
(3, 'Juan Lopez', 'juan@hotmail.com', 2, NULL, '$2y$10$4ufpOO3zZarv3tjr0N.IAOYaDhTmq/llJXLcV3p8sZSMC09DxENrS', NULL, '2021-07-06 22:21:09', '2021-07-06 23:14:28'),
(6, 'Steven Collazos', 'steve@hotmail.com', 2, NULL, '$2y$10$mZFCEj7cXpGbNXja.n2wSerOGJ8/3ig56nm5GNA6XbEKkWURSGdoa', NULL, '2021-07-07 02:00:48', NULL),
(11, 'developer3', 'developer3@hotmail.com', 1, NULL, '$2y$10$JwRE5WOQ1Mzxu3v1Ic0HxefxgPdQamXzXF2utvZyH/Ra1yr1FwRHq', NULL, '2021-07-07 04:23:36', '2021-07-07 04:23:36'),
(12, 'Admin', 'admin@example.com', 1, NULL, '$2y$10$BJnzaJUa4hvua6QHzV6RQu1lAtgn3JVmQwQTiTrXfNsWVqbPtRDUm', NULL, '2021-07-07 04:43:59', NULL),
(13, 'Vendedor', 'vendedor@example.com', 2, NULL, '$2y$10$hyDTPR22t4ZU5ABWYC0y3.tOcbgMC/385uRWcKsxGMFqVyNPC4wu6', NULL, '2021-07-07 04:44:41', NULL),
(14, 'developer4', 'developer4@hotmail.com', 2, NULL, '$2y$10$fPh5ksZLceMcaJEU2QmEGehHjGaZehuixcMSs9RUjQn73dQAh8jUa', NULL, '2021-07-07 05:02:20', '2021-07-07 05:02:20'),
(15, 'prueba', 'prueba@hotmail.com', 2, NULL, '$2y$10$LZysaZ7occnr2.nvqH5u/ehtzKRrEBcbUrMLCTHeAJ.Go8P09.Xp2', NULL, '2021-07-12 01:14:30', '2021-07-12 01:14:30'),
(16, 'prueba3', 'prueba3@hotmail.com', 2, NULL, '$2y$10$NzidZj/obGo5gukj5VJwzOvDNIWFO5Y/tl2clq7y3yzWZUif5DaXu', NULL, '2021-07-12 18:41:24', '2021-07-12 18:41:24'),
(17, 'vede', 'vende@gmail.com', 2, NULL, '$2y$10$3Ewy5nG433ApIw8UFA/pj.o9nFqq7ocGEsOsVxqgZNK/0LhDvyL1e', NULL, '2023-05-29 20:58:56', NULL),
(18, 'prueba', 'prueba@example.com', 2, NULL, '$2y$10$tSUEEbQERy0gAqzS1oinQ.zqOeIHv0Dx8CSWizOmUwESGV0v8FXV6', NULL, '2023-05-29 21:01:24', '2023-05-29 21:01:24'),
(19, 'Front', 'fro@example.com', 2, NULL, '$2y$10$sWpJ0kYKX5ppYINsrVsmR.Ar2w8/7NDLMjellMNjt.yDAkoIWaGbq', NULL, '2023-05-30 07:25:10', NULL),
(20, 'Prueba', 'pru@example.com', 2, NULL, '$2y$10$VuvgV9Ajc5cPB4FDwm2VCOa48fVp2dys2NWtRl/KLrVeDZ1T2kmg.', NULL, '2023-05-30 07:30:02', NULL),
(21, 'tienda', 'tienda@example.com', 1, NULL, '$2y$10$cugDCMygSVd5Ot7ua/JAHuGiGOvvgjMZxsug9WE..DMfCfC5/s4fq', NULL, '2023-05-30 20:52:56', '2023-05-30 20:52:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_realizadas`
--

CREATE TABLE `ventas_realizadas` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_realizadas`
--

INSERT INTO `ventas_realizadas` (`id`, `producto_id`, `cantidad`, `created_at`) VALUES
(1, 1, 2, '2023-05-30 20:35:10'),
(2, 3, 5, '2023-05-30 20:51:00'),
(3, 1, 6, '2023-05-30 20:51:41'),
(4, 2, 1, '2023-05-30 21:21:48'),
(5, 4, 5, '2023-05-30 21:25:15'),
(6, 6, 1, '2023-05-30 21:52:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colums`
--
ALTER TABLE `colums`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `list`
--
ALTER TABLE `list`
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
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `ventas_realizadas`
--
ALTER TABLE `ventas_realizadas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `colums`
--
ALTER TABLE `colums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `ventas_realizadas`
--
ALTER TABLE `ventas_realizadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
