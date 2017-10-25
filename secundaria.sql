-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2017 a las 12:12:44
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `secundaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apaterno` varchar(255) DEFAULT NULL,
  `amaterno` varchar(255) DEFAULT NULL,
  `direccion` text,
  `telefono` varchar(255) DEFAULT NULL,
  `edoCivil` varchar(255) DEFAULT NULL,
  `tipo` int(255) UNSIGNED DEFAULT NULL,
  `rfc` varchar(255) DEFAULT NULL,
  `especialidad` varchar(255) DEFAULT NULL,
  `curp` varchar(18) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `nombre`, `apaterno`, `amaterno`, `direccion`, `telefono`, `edoCivil`, `tipo`, `rfc`, `especialidad`, `curp`, `email`) VALUES
(3, 'Cesar', 'Bernal', 'Mendez', 'Conocida', '909090909', 'Soltero', 0, 'aaaaaa aaa aa a a a', 'Matematicas', 'BEMC890409HDFRNS02', 'cesar@contacto.com'),
(6, 'Javier', 'Blake', 'C', 'Ciudad de MÃ©xico', '89876543456', 'Soltero', 0, 'BJBJ123456L90', 'MÃºsica', 'BBBB 444444 HDFKSO', 'javier@contacto.com'),
(7, 'Juan', 'Roman', 'Riquelme', 'Buenos Aires, Argentina                    ', '810810810', 'Soltero', 0, 'RORJ987654HJ5', 'Medio', 'RORJ987654HJSKN09', 'roman@contacto.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) DEFAULT NULL,
  `apaterno` varchar(35) DEFAULT NULL,
  `amaterno` varchar(35) DEFAULT NULL,
  `no_control` varchar(10) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `escuela_pro` varchar(35) DEFAULT NULL,
  `grado` char(1) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `nombre`, `apaterno`, `amaterno`, `no_control`, `curp`, `fecha_nac`, `email`, `escuela_pro`, `grado`, `estado`) VALUES
(1, 'Daniel', 'Hernandez', 'Martinez', '20177000', 'HEMD987654HGKNSK08', '1999-08-09', 'daniel@contacto.com', 'Primaria Justo Sierra', '1', '1'),
(2, 'Fernanda', 'Flores', 'Lopez', '20177001', 'FLLF123456MKDLSN07', '1997-09-12', 'fer@contacto.com', 'Primaria Tres', '1', '1'),
(3, 'La', 'Li', 'Le', '20177002', 'QWER987654JKDSKACL', '1999-08-09', 'e@com.com', 'Primaria', '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `clave` varchar(15) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `grado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `clave`, `nombre`, `grado`) VALUES
(1, 'BAMA-I', 'Matematicas', '1'),
(2, 'BAQU-II', 'Quimica', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE `salones` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `comment` text,
  `status` int(255) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salones`
--

INSERT INTO `salones` (`id`, `nombre`, `tipo`, `comment`, `status`) VALUES
(1, 'asd asda das da', 'as dasd sda sda s', 'asd asd ', 0),
(2, 'asdasd', 'asd', 'asd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL,
  `passwordrecovery` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `password`, `email`, `tipo`, `passwordrecovery`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '1', NULL),
(10, 'asdasasd as', '827ccb0eea8a706c4c34a16891f84e7b', 'asdas@asd.cd', '1', NULL),
(11, 'Roman', '0192023a7bbd73250516f069df18b500', 'admin', '1', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salones`
--
ALTER TABLE `salones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `salones`
--
ALTER TABLE `salones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
