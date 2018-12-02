-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8080
-- Tiempo de generación: 02-12-2018 a las 10:13:34
-- Versión del servidor: 5.6.34-log
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almaceninsumos`
--

CREATE TABLE `almaceninsumos` (
  `id` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `ubicacion` int(11) NOT NULL,
  `fechaAlta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `almaceninsumos`
--

INSERT INTO `almaceninsumos` (`id`, `idInsumo`, `ubicacion`, `fechaAlta`) VALUES
(28, 2, 3, '2014-04-08 11:53:11'),
(29, 2, 3, '2014-04-08 11:53:11'),
(31, 2, 1, '2014-04-08 11:53:11'),
(35, 2, 1, '2014-04-08 11:53:11'),
(49, 1, 1, '2018-12-02 02:08:34'),
(50, 1, 1, '2018-12-02 02:08:34'),
(55, 1, 1, '2018-12-02 03:32:09'),
(56, 1, 1, '2018-12-02 03:32:09'),
(57, 1, 1, '2018-12-02 03:32:09'),
(58, 1, 1, '2018-12-02 03:32:09'),
(59, 1, 1, '2018-12-02 03:32:09'),
(60, 1, 1, '2018-12-02 03:32:11'),
(61, 1, 1, '2018-12-02 03:32:11'),
(62, 1, 1, '2018-12-02 03:32:11'),
(63, 1, 1, '2018-12-02 03:32:11'),
(64, 1, 1, '2018-12-02 03:32:11'),
(65, 1, 1, '2018-12-02 03:32:11'),
(66, 1, 1, '2018-12-02 03:32:11'),
(67, 1, 1, '2018-12-02 03:32:11'),
(68, 1, 1, '2018-12-02 03:32:11'),
(69, 1, 1, '2018-12-02 03:32:11'),
(70, 1, 1, '2018-12-02 03:32:12'),
(71, 1, 1, '2018-12-02 03:32:12'),
(72, 1, 1, '2018-12-02 03:32:12'),
(73, 1, 1, '2018-12-02 03:32:12'),
(74, 1, 1, '2018-12-02 03:32:12'),
(75, 1, 1, '2018-12-02 03:32:12'),
(76, 1, 1, '2018-12-02 03:32:13'),
(77, 1, 1, '2018-12-02 03:32:13'),
(78, 1, 1, '2018-12-02 03:32:13'),
(79, 1, 3, '2018-12-02 03:46:38'),
(80, 1, 3, '2018-12-02 03:46:38'),
(81, 1, 3, '2018-12-02 03:46:38'),
(82, 1, 1, '2018-12-02 03:46:51'),
(83, 1, 1, '2018-12-02 03:46:51'),
(84, 1, 1, '2018-12-02 03:46:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenproductos`
--

CREATE TABLE `almacenproductos` (
  `id` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `ubicacion` int(11) NOT NULL,
  `fechaAlta` datetime NOT NULL,
  `talla` varchar(1) NOT NULL,
  `color` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `almacenproductos`
--

INSERT INTO `almacenproductos` (`id`, `idProducto`, `ubicacion`, `fechaAlta`, `talla`, `color`) VALUES
(18, 5, 3, '2018-11-26 01:20:24', 'C', 'AZUL'),
(19, 5, 3, '2018-11-26 01:20:24', 'C', 'AZUL'),
(21, 5, 3, '2018-11-26 01:21:13', 'M', 'ROJO'),
(44, 5, 2, '2018-11-30 08:07:05', 'C', 'ROJO'),
(47, 5, 2, '2018-11-30 08:07:05', 'C', 'ROJO'),
(48, 5, 2, '2018-11-30 08:07:05', 'C', 'ROJO'),
(49, 5, 2, '2018-11-30 08:07:05', 'C', 'ROJO'),
(50, 5, 2, '2018-11-30 08:07:05', 'C', 'ROJO'),
(51, 5, 1, '2018-11-30 08:07:05', 'C', 'ROJO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `correo`, `password`) VALUES
(1, 'FERNANDO SÁNCHEZ', 'fgsl.182@gmail.com', '123'),
(2, 'LEO MESSI', 'dios.10@fcb.com', 'lol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `color` varchar(45) NOT NULL,
  `talla` varchar(1) NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `idCliente`, `idProducto`, `cantidad`, `color`, `talla`, `importe`, `fecha`, `direccion`, `estado`) VALUES
(10, 2, 6, 2, 'ROJO', 'C', 4.00, '2018-11-29 03:32:13', 'dlaskdl', 1),
(16, 2, 7, 2, 'ROJO', 'C', 201.12, '2018-12-02 02:44:56', 'das', 0),
(17, 1, 6, 1, 'ROJO', 'C', 2.00, '2018-12-02 04:11:48', 'daskjdk', 0),
(20, 1, 5, 3, 'ROJO', 'C', 1173.60, '2018-12-02 04:13:14', 'kaskj', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprainsumos`
--

CREATE TABLE `comprainsumos` (
  `id` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `fechaCompra` datetime NOT NULL,
  `fechaEntrega` datetime NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comprainsumos`
--

INSERT INTO `comprainsumos` (`id`, `idInsumo`, `idProveedor`, `cantidad`, `importe`, `fechaCompra`, `fechaEntrega`, `estado`) VALUES
(6, 1, 3, 6, 60.00, '2018-12-02 01:46:15', '2018-12-02 01:50:15', 1),
(7, 1, 3, 4, 40.00, '2018-12-02 01:46:19', '2018-12-02 01:50:19', 1),
(8, 1, 3, 9, 90.00, '2018-12-02 02:15:18', '2018-12-02 02:19:18', 1),
(9, 1, 3, 10, 100.00, '2018-12-02 03:14:46', '2018-12-02 03:18:46', 1),
(10, 1, 3, 5, 50.00, '2018-12-02 03:18:19', '2018-12-02 03:22:19', 1),
(11, 1, 3, 3, 30.00, '2018-12-02 03:36:50', '2018-12-02 03:40:50', 1),
(12, 1, 3, 3, 30.09, '2018-12-02 03:45:04', '2018-12-02 03:46:04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `correo`, `password`) VALUES
(1, 'inventario.gv@gmail.com', 'gerente1'),
(2, 'inventario.sp@gmail.com', 'super2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `insumo`
--

INSERT INTO `insumo` (`id`, `nombre`) VALUES
(1, 'TELA DE ALGODON'),
(2, 'TELA DE LANA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenproduccion`
--

CREATE TABLE `ordenproduccion` (
  `id` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cantidadInsumos` int(11) NOT NULL,
  `color` varchar(45) NOT NULL,
  `talla` varchar(1) NOT NULL,
  `ubicacion` int(1) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ordenproduccion`
--

INSERT INTO `ordenproduccion` (`id`, `idInsumo`, `idProducto`, `cantidad`, `cantidadInsumos`, `color`, `talla`, `ubicacion`, `fecha`) VALUES
(3, 1, 5, 2, 2, 'ROJO', 'C', 1, '2018-11-26 00:46:56'),
(4, 1, 5, 4, 4, 'ROJO', 'C', 1, '2018-11-26 00:47:07'),
(5, 1, 5, 5, 5, 'ROJO', 'C', 1, '2018-11-26 00:47:48'),
(6, 1, 5, 5, 5, 'ROJO', 'C', 1, '2018-11-26 00:48:13'),
(7, 1, 5, 2, 2, 'ROJO', 'C', 1, '2018-11-26 00:48:17'),
(8, 1, 5, 3, 3, 'ROJO', 'C', 1, '2018-11-26 00:48:33'),
(9, 1, 5, 3, 3, 'ROJO', 'C', 1, '2018-11-26 00:48:48'),
(10, 1, 5, 2, 2, 'ROJO', 'C', 1, '2018-11-26 00:48:55'),
(11, 1, 5, 2, 2, 'ROJO', 'C', 1, '2018-11-26 00:49:05'),
(12, 1, 5, 3, 3, 'ROJO', 'C', 1, '2018-11-26 00:49:09'),
(13, 1, 5, 3, 3, 'ROJO', 'C', 1, '2018-11-26 00:49:12'),
(14, 1, 5, 1, 1, 'ROJO', 'C', 1, '2018-11-26 00:50:53'),
(15, 1, 5, 3, 3, 'ROJO', 'C', 1, '2018-11-26 00:52:54'),
(16, 1, 5, 8, 16, 'ROJO', 'M', 1, '2018-11-26 00:53:42'),
(17, 1, 5, 4, 4, 'ROJO', 'C', 1, '2018-11-26 00:57:44'),
(18, 1, 5, 5, 5, 'ROJO', 'C', 1, '2018-11-26 00:57:55'),
(19, 1, 5, 5, 5, 'ROJO', 'C', 1, '2018-11-26 01:02:13'),
(20, 1, 5, 5, 5, 'ROJO', 'C', 1, '2018-11-26 01:02:21'),
(21, 2, 6, 1, 1, 'ROJO', 'C', 1, '2018-11-26 01:09:38'),
(22, 2, 6, 1, 1, 'ROJO', 'C', 1, '2018-11-26 01:10:06'),
(23, 2, 6, 1, 1, 'ROJO', 'C', 1, '2018-11-26 01:10:23'),
(24, 2, 6, 1, 1, 'ROJO', 'C', 1, '2018-11-26 01:11:21'),
(25, 1, 5, 3, 6, 'AMARILLO', 'M', 3, '2018-11-26 01:18:01'),
(26, 1, 5, 1, 2, 'ROJO', 'M', 3, '2018-11-26 01:19:55'),
(27, 1, 5, 3, 3, 'AZUL', 'C', 2, '2018-11-26 01:20:24'),
(28, 1, 5, 2, 4, 'ROJO', 'M', 1, '2018-11-26 01:21:13'),
(29, 2, 6, 1, 1, 'ROJO', 'C', 1, '2018-11-26 01:23:58'),
(30, 1, 5, 1, 1, 'ROJO', 'C', 1, '2018-11-26 08:55:03'),
(31, 2, 6, 1, 1, 'ROJO', 'C', 1, '2018-11-26 18:24:23'),
(32, 1, 7, 5, 10, 'ROJO', 'C', 3, '2018-11-30 07:53:15'),
(33, 1, 5, 10, 10, 'ROJO', 'C', 1, '2018-11-30 08:07:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `img` varchar(80) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `cantidadChico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `img`, `idInsumo`, `cantidadChico`) VALUES
(5, 'CAMISETA', 'campeon liga mx :v', 391.20, 'img/productos/camiseta.jpg', 1, 1),
(6, 'PANTALON SANO', 'esta perro', 2.00, 'img/productos/pantalon.jpg', 2, 1),
(7, 'SUDADERA RICA', 'pa hackear en la night', 100.56, 'img/productos/sudadera.jpg', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `maximo` int(11) NOT NULL,
  `minimo` int(11) NOT NULL,
  `tiempoEntrega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `idInsumo`, `costo`, `maximo`, `minimo`, `tiempoEntrega`) VALUES
(3, 'TELAS DE LA ABUELA 1', 1, 10.03, 10, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidasgerente`
--

CREATE TABLE `salidasgerente` (
  `id` int(11) NOT NULL,
  `tipo` int(1) NOT NULL,
  `idObjeto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salidasgerente`
--

INSERT INTO `salidasgerente` (`id`, `tipo`, `idObjeto`) VALUES
(17, 0, 33),
(18, 0, 29);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almaceninsumos`
--
ALTER TABLE `almaceninsumos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idInsumo_idx` (`idInsumo`);

--
-- Indices de la tabla `almacenproductos`
--
ALTER TABLE `almacenproductos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTipo_idx` (`idProducto`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`,`correo`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente_idx` (`idCliente`),
  ADD KEY `idProducto_idx` (`idProducto`);

--
-- Indices de la tabla `comprainsumos`
--
ALTER TABLE `comprainsumos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idInsumo_idx` (`idInsumo`),
  ADD KEY `idProveedor_idx` (`idProveedor`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenproduccion`
--
ALTER TABLE `ordenproduccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idInsumo_idx` (`idInsumo`),
  ADD KEY `idProducto_idx` (`idProducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkproducto_idInsumo_idx` (`idInsumo`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insumo_idx` (`idInsumo`);

--
-- Indices de la tabla `salidasgerente`
--
ALTER TABLE `salidasgerente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almaceninsumos`
--
ALTER TABLE `almaceninsumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT de la tabla `almacenproductos`
--
ALTER TABLE `almacenproductos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `comprainsumos`
--
ALTER TABLE `comprainsumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ordenproduccion`
--
ALTER TABLE `ordenproduccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `salidasgerente`
--
ALTER TABLE `salidasgerente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almaceninsumos`
--
ALTER TABLE `almaceninsumos`
  ADD CONSTRAINT `fkalmacen_idInsumo` FOREIGN KEY (`idInsumo`) REFERENCES `insumo` (`id`);

--
-- Filtros para la tabla `almacenproductos`
--
ALTER TABLE `almacenproductos`
  ADD CONSTRAINT `producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `idProducto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `comprainsumos`
--
ALTER TABLE `comprainsumos`
  ADD CONSTRAINT `compraI_idInsumo` FOREIGN KEY (`idInsumo`) REFERENCES `insumo` (`id`),
  ADD CONSTRAINT `compraI_idProveedor` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`id`);

--
-- Filtros para la tabla `ordenproduccion`
--
ALTER TABLE `ordenproduccion`
  ADD CONSTRAINT `fk_idInsumo` FOREIGN KEY (`idInsumo`) REFERENCES `insumo` (`id`),
  ADD CONSTRAINT `fk_idProducto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fkproducto_idInsumo` FOREIGN KEY (`idInsumo`) REFERENCES `insumo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_insumo` FOREIGN KEY (`idInsumo`) REFERENCES `insumo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
