-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2024 a las 06:36:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `id_med` int(11) NOT NULL,
  `id_pac` int(11) NOT NULL,
  `tipo_consulta` varchar(50) NOT NULL,
  `nivel_urgencia` varchar(50) NOT NULL DEFAULT 'baja',
  `precio_consu` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `id_med`, `id_pac`, `tipo_consulta`, `nivel_urgencia`, `precio_consu`) VALUES
(1, 1, 2, 'chequeo', 'baja', 1200),
(2, 1, 3, 'operacion', 'media', 5000),
(3, 2, 4, 'chequeo', 'baja', 1300),
(4, 2, 5, 'tratamiento', 'media', 2300),
(5, 4, 7, 'vacunacion', 'baja', 1500),
(6, 6, 1, 'operacion', 'alta', 10000),
(7, 3, 6, 'emergencia', 'alta', 13000),
(8, 7, 7, 'tratamimiento', 'media', 8000),
(9, 5, 5, 'chequeo', 'baja', 1200),
(10, 5, 4, 'chequeo', 'baja', 0),
(11, 6, 2, 'tratamiento', 'media', 7000),
(12, 3, 6, 'operacion', 'media', 9000),
(13, 4, 7, 'chequeo', 'baja', 1250),
(14, 7, 1, 'chequeo', 'baja', 1350),
(15, 6, 4, 'operacion', 'baja', 8000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_esp` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `valor_espe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id_medico` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id_esp` int(11) NOT NULL,
  `apellido` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id_medico`, `edad`, `nombre`, `foto`, `id_esp`, `apellido`) VALUES
(1, 34, 'jorge', 'sinfoto.jpg', 1, 'lopez'),
(2, 29, 'Luis', 'sinfoto.jpg', 2, 'Coronel'),
(3, 41, 'Lorena', 'sinfoto.jpg', 1, 'Cardozo'),
(4, 32, 'Julio', 'sinfoto.jpg', 1, 'Perez'),
(5, 28, 'Norma', 'sinfoto.jpg', 2, 'Garcia'),
(6, 37, 'Kiara', 'sinfoto.jpg', 1, 'Luna'),
(7, 30, 'Carla', 'sinfoto.jpg', 1, 'Diaz');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
