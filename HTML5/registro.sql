-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 01:06 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registro`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE `contacto` (
  `id` int(9) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `asunto` varchar(50) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `fecha_com` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `apellido`, `email`, `asunto`, `comentario`, `fecha_com`) VALUES
(1, 'Douglas Ricardo', 'Alvarado', 'ma201906@upes.edu.sv', 'Consulta', '¿Podrías brindarme los precios de la creación de páginas web como esta?', '30/11/20'),
(2, 'Douglas Ricardo', 'Alvarado', 'ma201906@upes.edu.sv', 'PAGO', 'El sistema me hizo el recargo de la camisa dos veces a mi tarjeta, podrían ayudarme a solucionarlo?', '01/12/20');

-- --------------------------------------------------------

--
-- Table structure for table `datos`
--

CREATE TABLE `datos` (
  `id` int(9) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrase` tinytext DEFAULT NULL,
  `sexo` varchar(25) NOT NULL,
  `tipoUsuario` varchar(50) NOT NULL,
  `fecha_reg` varchar(15) NOT NULL,
  `hora` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datos`
--

INSERT INTO `datos` (`id`, `nombre`, `apellido`, `email`, `contrase`, `sexo`, `tipoUsuario`, `fecha_reg`, `hora`) VALUES
(21, 'Douglas Ricardo', 'Alvarado', 'ma201906@upes.edu.sv', '123456', 'Masculino', 'Usuario', '28/11/20', '15:50:51'),
(22, 'Ricardo', 'Alvarado', 'imurppupet@gmail.com', 'deadmau5', 'Masculino', 'Administrador', '30/11/20', '13:22:27'),
(23, 'Hittler', 'Adolf', 'hailfuther@gmail.com', '123456', 'Masculino', 'Administrador', '30/11/20', '21:38:59'),
(24, 'Tyler', 'The Creator', 'tyler@gmail.com', '123456', 'Masculino', 'Usuario', '30/11/20', '23:24:01'),
(26, 'Mike', 'Tyson', 'Miketyson@gmail.com', '123456', 'Masculino', 'Administrador', '01/12/20', '10:17:57'),
(27, 'Ricardo', 'Barraza', '2345@gmail.com', '123456', 'Masculino', 'Administrador', '01/12/20', '17:32:01'),
(28, 'Hittler', 'Boy', 'hitlerxdxd@gmail.com', '123456', 'Masculino', 'Usuario', '02/12/20', '22:30:43'),
(29, 'Kurt', 'Kobain', 'Kurt1@gmail.com', '123456', 'Masculino', 'Usuario', '03/12/20', '16:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `fact`
--

CREATE TABLE `fact` (
  `id` int(9) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descrip` varchar(200) NOT NULL,
  `precio` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `facturacion`
--

CREATE TABLE `facturacion` (
  `id` int(9) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apeliidos` varchar(200) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `numero` int(8) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `fecha_compra` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `codigo` int(9) NOT NULL,
  `nombree` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precioEntrada` varchar(25) NOT NULL,
  `categoria` varchar(25) NOT NULL,
  `cantidad` varchar(9) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`codigo`, `nombree`, `ruta`, `nombre`, `precioEntrada`, `categoria`, `cantidad`, `descripcion`) VALUES
(61, 'img1.jpg', 'productos/img1.jpg', 'T- Shirt Pretty as Fuck', '25', 'Camisetas', '48', 'Una camiseta 100% hecha de algodón con un estilo tumblr.'),
(63, 'hoodie.jpg', 'productos/hoodie.jpg', 'Hoodie - Teardrop', '45', 'Hoodie', '11', 'Suéter inspirado en los estilos de Slipknot.'),
(64, 'not.jpg', 'productos/not.jpg', 'T- Shirt Not Today, Satan', '23', 'Camiseta', '29', 'Una camisa que denota rebeldía.'),
(65, 'smile.jpg', 'productos/smile.jpg', 'T- Shirt Smile Face', '15', 'Camiseta Manga Larga', '34', 'Una camiseta manga larga para momentos de frío.'),
(66, 'boys.jpg', 'productos/boys.jpg', 'The boy are sad', '12', 'Camiseta', '50', 'Una camiseta para reflejar tu estado de ánimo.\r\n'),
(67, 'peopleare.jpg', 'productos/peopleare.jpg', 'People are Poison', '27', 'Camiseta Manga Larga', '11', 'Hazle saber a todos tus pensamientos más profundos con esta camisa.'),
(68, 'unis.jpg', 'productos/unis.jpg', 'Hoodie - Unisex Cat', '50', 'Hoodie', '47', 'Un suéter para los amantes de los gatitos.'),
(69, 'mr.jpg', 'productos/mr.jpg', 'T- Shirt Mr. Robot', '25', 'Camiseta', '69', 'Aquí somos fans de Mr. Robot, así que nos peguntamos: ¿Por qué no hacer una?'),
(70, 'One.jpg', 'productos/One.jpg', 'T- Shirt One Piece', '42', 'Camiseta', '125', 'Si eres fanático de One Piece, está camisa te gustará.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fact`
--
ALTER TABLE `fact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `fact`
--
ALTER TABLE `fact`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facturacion`
--
ALTER TABLE `facturacion`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `codigo` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
