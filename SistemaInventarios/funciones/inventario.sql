-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8080
-- Generation Time: Nov 23, 2018 at 05:00 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventario`
--

-- --------------------------------------------------------

--
-- Table structure for table `almaceninsumos`
--

CREATE TABLE `almaceninsumos` (
  `id` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `ubicacion` int(11) NOT NULL,
  `fechaAlta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `almaceninsumos`
--

INSERT INTO `almaceninsumos` (`id`, `idInsumo`, `ubicacion`, `fechaAlta`) VALUES
(1, 2, 2, '2014-04-30 11:55:11'),
(3, 2, 2, '2014-04-30 11:55:10'),
(5, 1, 2, '2014-07-02 12:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `almacenproductos`
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
-- Dumping data for table `almacenproductos`
--

INSERT INTO `almacenproductos` (`id`, `idProducto`, `ubicacion`, `fechaAlta`, `talla`, `color`) VALUES
(1, 5, 3, '2018-11-08 07:11:00', 'M', 'ROJO'),
(2, 5, 3, '2018-11-08 07:11:00', 'M', 'ROJO');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `correo`, `password`) VALUES
(1, 'FERNANDO SÁNCHEZ', 'fgsl.182@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `compra`
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
-- Dumping data for table `compra`
--

INSERT INTO `compra` (`id`, `idCliente`, `idProducto`, `cantidad`, `color`, `talla`, `importe`, `fecha`, `direccion`, `estado`) VALUES
(1, 1, 5, 4, 'R', 'C', 21.00, '2018-11-27 08:16:10', 'CASA', 0),
(2, 1, 5, 3, 'ROJO', 'M', 412.02, '2018-11-20 18:15:19', 'ASDJKAS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comprainsumos`
--

CREATE TABLE `comprainsumos` (
  `id` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`id`, `correo`, `password`) VALUES
(1, 'inventario.gv@gmail.com', 'gerente1'),
(2, 'inventario.sp@gmail.com', 'super2');

-- --------------------------------------------------------

--
-- Table structure for table `insumo`
--

CREATE TABLE `insumo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insumo`
--

INSERT INTO `insumo` (`id`, `nombre`) VALUES
(1, 'TELA DE ALGODON'),
(2, 'TELA DE LANA');

-- --------------------------------------------------------

--
-- Table structure for table `ordenproduccion`
--

CREATE TABLE `ordenproduccion` (
  `id` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidadProducto` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `img` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `img`) VALUES
(5, 'CAMISETA asjdklashdjasdhaksjdasd', 'esta chida', 391.20, 'img/productos/sp.png');

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `almaceninsumos`
--
ALTER TABLE `almaceninsumos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idInsumo_idx` (`idInsumo`);

--
-- Indexes for table `almacenproductos`
--
ALTER TABLE `almacenproductos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTipo_idx` (`idProducto`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`,`correo`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente_idx` (`idCliente`),
  ADD KEY `idProducto_idx` (`idProducto`);

--
-- Indexes for table `comprainsumos`
--
ALTER TABLE `comprainsumos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idInsumo_idx` (`idInsumo`),
  ADD KEY `idProveedor_idx` (`idProveedor`);

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordenproduccion`
--
ALTER TABLE `ordenproduccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idInsumo_idx` (`idInsumo`),
  ADD KEY `idProducto_idx` (`idProducto`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insumo_idx` (`idInsumo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `almaceninsumos`
--
ALTER TABLE `almaceninsumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `almacenproductos`
--
ALTER TABLE `almacenproductos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comprainsumos`
--
ALTER TABLE `comprainsumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `insumo`
--
ALTER TABLE `insumo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ordenproduccion`
--
ALTER TABLE `ordenproduccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `almaceninsumos`
--
ALTER TABLE `almaceninsumos`
  ADD CONSTRAINT `fkalmacen_idInsumo` FOREIGN KEY (`idInsumo`) REFERENCES `insumo` (`id`);

--
-- Constraints for table `almacenproductos`
--
ALTER TABLE `almacenproductos`
  ADD CONSTRAINT `producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`id`);

--
-- Constraints for table `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `idProducto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`id`);

--
-- Constraints for table `comprainsumos`
--
ALTER TABLE `comprainsumos`
  ADD CONSTRAINT `compraI_idInsumo` FOREIGN KEY (`idInsumo`) REFERENCES `insumo` (`id`),
  ADD CONSTRAINT `compraI_idProveedor` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`id`);

--
-- Constraints for table `ordenproduccion`
--
ALTER TABLE `ordenproduccion`
  ADD CONSTRAINT `fk_idInsumo` FOREIGN KEY (`idInsumo`) REFERENCES `insumo` (`id`),
  ADD CONSTRAINT `fk_idProducto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`id`);

--
-- Constraints for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_insumo` FOREIGN KEY (`idInsumo`) REFERENCES `insumo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
