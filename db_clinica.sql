-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2020 a las 22:02:09
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas_medicas`
--

CREATE TABLE `consultas_medicas` (
  `consulta_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_consulta` date NOT NULL,
  `id_paciente` int(5) NOT NULL,
  `id_medico` int(5) NOT NULL,
  `consultorio` varchar(20) NOT NULL,
  `diagnostico` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `consultas_medicas`
--

INSERT INTO `consultas_medicas` (`consulta_id`, `fecha_consulta`, `id_paciente`, `id_medico`, `consultorio`, `diagnostico`) VALUES
(1, '2020-04-14', 1, 3, 'B-05', 'Sinusitis Aguda'),
(2, '2020-05-11', 1, 1, 'A-09', 'Hematoma severa'),
(3, '2020-06-17', 2, 2, 'B-06', 'Gastritis'),
(4, '2020-07-18', 1, 3, 'D-90', 'Gripe aguda'),
(5, '2020-08-19', 3, 2, 'Z-11', 'Fractura Clavicula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `medico_id` bigint(20) UNSIGNED NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nombre_medico` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`medico_id`, `cedula`, `nombre_medico`) VALUES
(1, '78452596', 'Dr. Juan Medina'),
(2, '74582125', 'Dr. Maria Prada'),
(3, '96352145', 'Dr. Carlos Kim'),
(4, '78965412', 'Dr. Luis Tejada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `paciente_id` int(11) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellido_paterno` varchar(80) NOT NULL,
  `apellido_materno` varchar(80) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `domicilio` text NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`paciente_id`, `dni`, `nombre`, `apellido_paterno`, `apellido_materno`, `sexo`, `domicilio`, `foto`) VALUES
(1, '45125236', 'Pedro', 'Carrillo', 'Gonzales', 'H', 'Av. Santiago Mayolo #2840', 'pedro.jpg'),
(2, '21526356', 'Joaquin', 'Flores', 'Valencia', 'H', 'Av. Los molinos #41', 'joaquin.jpg'),
(3, '74582145', 'Lucia', 'Espinoza', 'Zavaleta', 'F', 'Av. Los Florales #327', 'lucia.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas_medicas`
--
ALTER TABLE `consultas_medicas`
  ADD PRIMARY KEY (`consulta_id`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`medico_id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`paciente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas_medicas`
--
ALTER TABLE `consultas_medicas`
  MODIFY `consulta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `medico_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `paciente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
