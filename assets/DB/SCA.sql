-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-08-2016 a las 07:33:26
-- Versión del servidor: 5.7.13-0ubuntu0.16.04.2
-- Versión de PHP: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `SCA`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoP` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoM` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `telefono` int(10) NOT NULL,
  `matricula` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `grupo_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombre`, `apellidoP`, `apellidoM`, `imagen`, `fechaNacimiento`, `telefono`, `matricula`, `grupo_id`) VALUES
(21, 'Raul', 'Poso', 'Mendez', '', '1993-07-17', 2147483647, '13001754', 4),
(25, 'ererer', 'ererer', 'fsdfsdf', 'spartan-race-logo.jpg', '1993-07-17', 554335454, '234234', 4);

--
-- Disparadores `alumno`
--
DELIMITER $$
CREATE TRIGGER `updateHistoriales` AFTER DELETE ON `alumno` FOR EACH ROW BEGIN
delete historialacademico.* from historialacademico where historialacademico.alumno_id = OLD.matricula;
delete historialeconomico.* from historialeconomico where historialeconomico.alumno_id = OLD.matricula; 
delete historialfamiliar.* from historialfamiliar where historialfamiliar.alumno_id = OLD.matricula;
delete historialmedico.* from historialmedico where historialmedico.alumno_id = OLD.matricula;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canalizacion`
--

CREATE TABLE `canalizacion` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `numeroControl` varchar(10) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `nombreAlumno` varchar(110) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `semestre` varchar(20) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `edad` int(2) NOT NULL,
  `nombreTutor` varchar(110) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `especialidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `problematica` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `solicitud` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `alumno_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `canalizacion`
--

INSERT INTO `canalizacion` (`id`, `fecha`, `numeroControl`, `nombreAlumno`, `semestre`, `edad`, `nombreTutor`, `especialidad`, `problematica`, `solicitud`, `observaciones`, `alumno_id`) VALUES
(1, '2016-08-08', '13001700', 'Fernando Fer Ferchas', 'Primer Sem', 23, 'Rafael Hernández Ramírez', 'Quimica', 'problematica ', 'solicitudes', 'observacion', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `idDireccion` int(11) NOT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `numero` int(5) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `codigoPostal` int(6) DEFAULT NULL,
  `alumno_id` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`idDireccion`, `calle`, `numero`, `colonia`, `codigoPostal`, `alumno_id`) VALUES
(7, 'Leon Rojas', 18, 'Francisco Aguilera', 30177, 13001754),
(8, 'sdfsdf', 12, 'sdfsdfsdf', 0, 13001700),
(9, 'sdfsdf', 3343, 'sdfsdf', 345656, 234234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id`, `nombre`) VALUES
(4, 'Quimica'),
(5, 'Matematica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generacion`
--

CREATE TABLE `generacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `generacion`
--

INSERT INTO `generacion` (`id`, `nombre`) VALUES
(3, '2007-2010'),
(4, '2008-2011 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `especialidad_id` int(11) NOT NULL,
  `turno_id` int(11) NOT NULL,
  `semestre_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `generacion_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `nombre`, `estado`, `especialidad_id`, `turno_id`, `semestre_id`, `tutor_id`, `generacion_id`) VALUES
(4, 'Primero A', 1, 4, 4, 5, 2, 3),
(8, 'Tercero A', 1, 4, 4, 5, 7, 3),
(6, 'Segundo A', 1, 4, 5, 6, 5, 4),
(7, 'Segundo B', 1, 5, 5, 6, 6, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialacademico`
--

CREATE TABLE `historialacademico` (
  `id` int(11) NOT NULL,
  `promedioPrimaria` double NOT NULL,
  `promedioSecundariParcialUno` double NOT NULL,
  `promedioSecundariParcialDos` double NOT NULL,
  `promedioSecundariParcialTres` double NOT NULL,
  `promedioCicloAnterior` tinyint(1) NOT NULL,
  `estatus` tinyint(1) NOT NULL,
  `alumno_id` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historialacademico`
--

INSERT INTO `historialacademico` (`id`, `promedioPrimaria`, `promedioSecundariParcialUno`, `promedioSecundariParcialDos`, `promedioSecundariParcialTres`, `promedioCicloAnterior`, `estatus`, `alumno_id`) VALUES
(3, 10, 8, 10, 8, 10, 0, 13001754),
(5, 8, 8, 8, 8, 8, 0, 234234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialeconomico`
--

CREATE TABLE `historialeconomico` (
  `id` int(11) NOT NULL,
  `dependeDe` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `viveCon` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ingresoFamiliarMensual` int(6) NOT NULL,
  `trabajo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `necesitaTrabajo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `causaTrabajo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` tinyint(1) NOT NULL,
  `alumno_id` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historialeconomico`
--

INSERT INTO `historialeconomico` (`id`, `dependeDe`, `viveCon`, `ingresoFamiliarMensual`, `trabajo`, `necesitaTrabajo`, `causaTrabajo`, `estatus`, `alumno_id`) VALUES
(4, '1', '2', 20000, '2', '                  Necesitas de ese trabajo        ', '                  Cual es la causa  ', 0, 13001754),
(6, '1', '1', 232323, '1', 'dsadadsads', 'asdasdads', 0, 234234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialfamiliar`
--

CREATE TABLE `historialfamiliar` (
  `id` int(11) NOT NULL,
  `situacionesFamiliares` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `integrantes` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `relacionPaterna` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL,
  `alumno_id` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historialfamiliar`
--

INSERT INTO `historialfamiliar` (`id`, `situacionesFamiliares`, `integrantes`, `lugar`, `relacionPaterna`, `estatus`, `alumno_id`) VALUES
(1, 'Situaciones Familiares de toda lafamilia', 'Integrantes de tu familia de toda lafamilia', '3', '2', 0, 13001754),
(3, 'sdads', 'asdadsas', '1', '3', 0, 234234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialmedico`
--

CREATE TABLE `historialmedico` (
  `id` int(11) NOT NULL,
  `enfermedades` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tratamiento` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tratamientoAnterior` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipoTratamiento` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `hospitalizacion` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `motivoHospitalizacion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `operaciones` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `motivoOperacion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `padeceEnfermedad` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `enfermedadCronica` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` tinyint(1) NOT NULL,
  `alumno_id` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historialmedico`
--

INSERT INTO `historialmedico` (`id`, `enfermedades`, `tratamiento`, `tratamientoAnterior`, `tipoTratamiento`, `hospitalizacion`, `motivoHospitalizacion`, `operaciones`, `motivoOperacion`, `padeceEnfermedad`, `enfermedadCronica`, `estatus`, `alumno_id`) VALUES
(6, '              Enfermedades         lllllll                      ', '1', '                        Tratamientos Anteriores lkkllklkl                     ', '                        Tipo de Tratamiento                                   ', '1', '                         Motivo                                   ', '1', '                         Motivo                                   ', '                                        Enfermedad                                   ', '                                        Enfermedades Cronicas                                   ', 0, 13001754),
(8, 'asdasd', '1', 'asdadsad', 'asdasdas', '1', 'asdasdad', '1', 'adadsa', 'asdasdsad', 'asdasdads', 0, 234234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `id` int(11) NOT NULL,
  `nombreSemestre` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`id`, `nombreSemestre`) VALUES
(5, 'Primer Semestre'),
(6, 'Segundo Semestre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiongrupal`
--

CREATE TABLE `sesiongrupal` (
  `id` int(5) NOT NULL,
  `nombreTutor` varchar(110) COLLATE utf8_spanish_ci NOT NULL,
  `grupo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `turno` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `mes` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `numeroSesion` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `objetivo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `problematica` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `remediales` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `resultados` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `grupo_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sesiongrupal`
--

INSERT INTO `sesiongrupal` (`id`, `nombreTutor`, `grupo`, `turno`, `mes`, `numeroSesion`, `fecha`, `objetivo`, `problematica`, `remediales`, `resultados`, `observaciones`, `grupo_id`) VALUES
(2, '2', '4', '2', '2', 2, '2016-08-07', 'dsffsdfdsf', 'sdfsdfsf', 'sdfsfdsdf', 'dsfsdfsdfsdf', 'fsdfsfdsfdsfds', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesionprivada`
--

CREATE TABLE `sesionprivada` (
  `id` int(11) NOT NULL,
  `nombreAlumno` varchar(110) COLLATE utf8_spanish_ci NOT NULL,
  `grupo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `turno` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `objetivo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `problematica` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `seguimiento` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `resultados` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `alumno_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sesionprivada`
--

INSERT INTO `sesionprivada` (`id`, `nombreAlumno`, `grupo`, `turno`, `fecha`, `objetivo`, `problematica`, `seguimiento`, `resultados`, `observaciones`, `alumno_id`) VALUES
(1, 'Juan Poso Mendez', '4', '4', '2016-07-20', 'Objetivo', 'Problematica', 'Seguimiento', 'Resultados       ', 'Observaciones       ', 21),
(2, 'Panfilo Comosea NombreFeo', '7', '5', '2016-07-20', 'sgsdfhgjkfyuthgfdfgfeee', 'lkjbvgfrtyuivnjbsdbfusbdf', '        Ya no es tan feo         dss     ', '        Uso peluca                 ', '        Loco              ', 23),
(3, 'Panfilo Comosea NombreFeo', '7', '5', '2016-07-20', 'ljbhbdfusdiusd', 'sdfsdfsdfsd', '        zsfasdfasdfsdf   ssdsd    ', '        htrwerdfasdfasdfswds                     ', '        ljljlkjljljljl                     ', 23),
(4, 'ererer ererer fsdfsdf', '4', '4', '2016-08-12', 'sdasas', 'asdasd', 'asdsa', 'asdasda', 'asdasd', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id` int(11) NOT NULL,
  `nombreTurno` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id`, `nombreTurno`) VALUES
(4, 'Matutino'),
(5, 'Vespertino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE `tutor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoP` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoM` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `privilegios` tinyint(1) NOT NULL,
  `estado` int(1) NOT NULL,
  `email` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tutor`
--

INSERT INTO `tutor` (`id`, `nombre`, `apellidoP`, `apellidoM`, `password`, `privilegios`, `estado`, `email`, `imagen`) VALUES
(2, 'Rafael', 'Hernández', 'Ramírez', 'pass', 2, 1, 'rafa_hndz@outlook.com', 'spartan-race-logo.jpg'),
(3, 'Raul', 'Manchester', 'Blanco', 'pass', 2, 1, 'raul@gmail.com', '45.png'),
(4, 'Demostracion', 'Del', 'Sistema', 'demo', 1, 2, 'demo@demo.com', ''),
(5, 'Azalia', 'Sosa', 'Calderon', 'zeldalian', 1, 1, 'zelda19lia@gmail.com', ''),
(6, 'Alejandra', 'Padilla', 'García', '1234567', 1, 1, 'ber_alejandra@hotmail.com', ''),
(7, 'sonia', 'dominguez', 'luna', '1985', 1, 1, 'sonyadl576@gmail.com', ''),
(8, 'rewrw', 'wrwer', 'werwerew', 'pass', 1, 1, 'rafa@gmail.com', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numeroControl` (`matricula`),
  ADD KEY `fk_alumno_grupo1_idx` (`grupo_id`);

--
-- Indices de la tabla `canalizacion`
--
ALTER TABLE `canalizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_canalizacion_alumno1_idx` (`alumno_id`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDireccion`),
  ADD KEY `fk_direccion_alumno1_idx` (`alumno_id`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `generacion`
--
ALTER TABLE `generacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grupo_especialidad1_idx` (`especialidad_id`),
  ADD KEY `fk_grupo_turno1_idx` (`turno_id`),
  ADD KEY `fk_grupo_semestre1_idx` (`semestre_id`),
  ADD KEY `fk_grupo_tutor1_idx` (`tutor_id`),
  ADD KEY `fk_grupo_generacion1_idx` (`generacion_id`);

--
-- Indices de la tabla `historialacademico`
--
ALTER TABLE `historialacademico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_historialMemico_alumno1_idx` (`alumno_id`);

--
-- Indices de la tabla `historialeconomico`
--
ALTER TABLE `historialeconomico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_historialEconomico_alumno_idx` (`alumno_id`);

--
-- Indices de la tabla `historialfamiliar`
--
ALTER TABLE `historialfamiliar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_historialFamiliar_alumno1_idx` (`alumno_id`);

--
-- Indices de la tabla `historialmedico`
--
ALTER TABLE `historialmedico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_historialMedico_alumno1_idx` (`alumno_id`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sesiongrupal`
--
ALTER TABLE `sesiongrupal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sesionGrupal_grupo1_idx` (`grupo_id`);

--
-- Indices de la tabla `sesionprivada`
--
ALTER TABLE `sesionprivada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sesionPrivada_alumno1_idx` (`alumno_id`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `canalizacion`
--
ALTER TABLE `canalizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `idDireccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `generacion`
--
ALTER TABLE `generacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `historialacademico`
--
ALTER TABLE `historialacademico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `historialeconomico`
--
ALTER TABLE `historialeconomico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `historialfamiliar`
--
ALTER TABLE `historialfamiliar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `historialmedico`
--
ALTER TABLE `historialmedico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `sesiongrupal`
--
ALTER TABLE `sesiongrupal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sesionprivada`
--
ALTER TABLE `sesionprivada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
