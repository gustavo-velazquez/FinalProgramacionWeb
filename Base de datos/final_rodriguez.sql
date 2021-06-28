-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2020 a las 01:32:14
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
-- Base de datos: `final_rodriguez`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(50) NOT NULL,
  `mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `mail`, `nombre`, `contrasenia`) VALUES
(2, 'admin@gmail.com', 'Admin 1', '$2y$10$TCQx58bXudg.k80d9vjMNeumFp4TZjCtM4JpU8u.4jazkYJ6fIAjy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(50) NOT NULL,
  `mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `mail`, `nombre`, `contrasenia`) VALUES
(20, 'a@hotmail.com', 'a', '$2y$12$GT/Vl1BPZCjcqQlUQTgMzu8YFyRJWT4jVXumf1wXTOaURWvLVTFwO'),
(21, 'ab@hotmail.com', 'ab', '$2y$12$sU4T.WxbXhbkOc.7W4YmEOzSrov8QdjIMhthsM2pSy3/tSKjcqTiO'),
(22, 'abc@hotmail.com', 'abc', '$2y$12$sU4T.WxbXhbkOc.7W4YmEOzSrov8QdjIMhthsM2pSy3/tSKjcqTiO'),
(23, 'pepito@gmail.com', 'pepito', '$2y$12$ZqeP7oSJGokjXS8DnoWm1OnJxDxVWaj9TcynLdj7rdONPkpphB5vO'),
(25, 'luis@gmail.com', 'Luis', '$2y$12$nWPKRMNc0068nxBPRWNA4uJ.ZdfBaoJ3brE6q7Ja3fQ8c403UYu4K');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(50) NOT NULL,
  `mail_origen` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mail_destino` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `asunto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` varchar(5000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `mail_origen`, `mail_destino`, `asunto`, `mensaje`) VALUES
(1, 'pepito@gmail.com', 'admin@gmail.com', 'Asunto 1', 'Mensaje 1'),
(2, 'pepito@gmail.com', 'admin@gmail.com', 'Asunto 2', 'Mensaje 2'),
(3, 'a@hotmail.com', 'admin@gmail.com', 'Asunto 3', 'Mensaje 3'),
(4, 'admin@gmail.com', 'pepito@gmail.com', '[RE] Asunto 1', 'Mensaje 1'),
(5, 'admin@gmail.com', 'a@hotmail.com', '[RE] Asunto 1', 'Mensaje 1'),
(6, 'admin@gmail.com', 'pepito@gmail.com', '[RE] Asunto 2', 'Mensaje 2'),
(7, 'admin@gmail.com', 'a@hotmail.com', '[RE] Asunto 3', 'Mensaje 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor`
--

CREATE TABLE `distribuidor` (
  `id_distribuidor` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `distribuidor`
--

INSERT INTO `distribuidor` (`id_distribuidor`, `nombre`) VALUES
(2, 'Distribuidor 2'),
(3, 'Distribuidor 3'),
(11, 'Distribuidor 11'),
(15, 'Distribuidor 15'),
(16, 'Distribuidor 16'),
(17, 'Distribuidor 17'),
(18, 'Distribuidor 18'),
(19, 'Distribuidor 19'),
(21, 'Distribuidor 21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compra`
--

CREATE TABLE `orden_compra` (
  `id_orden` int(50) NOT NULL,
  `id_cliente` int(50) NOT NULL,
  `id_producto` int(50) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `orden_compra`
--

INSERT INTO `orden_compra` (`id_orden`, `id_cliente`, `id_producto`, `cantidad`, `fecha`) VALUES
(20, 20, 50, 3, '2020-12-27 09:24:34'),
(21, 20, 44, 1, '2020-12-27 09:29:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(50) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `creado_por` int(50) NOT NULL,
  `id_distribuidor` int(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `creado_por`, `id_distribuidor`, `precio`, `cantidad`) VALUES
(44, 'Producto 44', 2, 11, '1000.50', 17),
(47, 'Producto 47', 2, 3, '2000.00', 35),
(48, 'Producto 48', 2, 15, '100.00', 14),
(49, 'Producto 49', 2, 17, '300.30', 13),
(50, 'Producto 50', 2, 19, '3510.20', 41),
(51, 'Producto 51', 2, 18, '3412.00', 28),
(52, 'Producto 52', 2, 3, '1234.50', 10),
(55, 'Producto 55', 2, 16, '350.50', 50);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`,`mail`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`,`mail`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD PRIMARY KEY (`id_distribuidor`);

--
-- Indices de la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  ADD PRIMARY KEY (`id_orden`,`id_cliente`,`id_producto`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`,`creado_por`,`id_distribuidor`),
  ADD KEY `id_distribuidor` (`id_distribuidor`),
  ADD KEY `creado_por` (`creado_por`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  MODIFY `id_distribuidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  MODIFY `id_orden` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  ADD CONSTRAINT `orden_compra_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_compra_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_distribuidor`) REFERENCES `distribuidor` (`id_distribuidor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`creado_por`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
