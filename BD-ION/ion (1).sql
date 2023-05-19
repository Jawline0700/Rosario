-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2023 a las 05:07:43
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `ID_Cita` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `ID_Paciente` int(11) NOT NULL,
  `ID_Medico` int(11) NOT NULL,
  `ID_Tipo_Tratamiento` int(11) NOT NULL,
  `ID_Estado_Cita` int(11) NOT NULL,
  `Orden` int(11) DEFAULT NULL,
  `ID_Maquina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `ID_Especialidad` int(11) NOT NULL,
  `Tipo_Especialidad` tinyint(1) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`ID_Especialidad`, `Tipo_Especialidad`, `Nombre`) VALUES
(1, 1, 'Ginecólogos Oncologos'),
(2, 1, 'Oncólogos Médicos'),
(3, 1, 'Ortopedista Oncologos'),
(4, 1, 'Hematólogos Oncólogos'),
(5, 1, 'Oncólogos radioterápicos'),
(6, 2, 'Enfemería Pediátrica.'),
(7, 2, 'Enfemería Psiquiátrica '),
(8, 2, 'Enfemería Psiquiátrica '),
(9, 2, 'Enfermería Oncológica.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID_Estado` int(11) NOT NULL,
  `Estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`ID_Estado`, `Estado`) VALUES
(1, 'Realizada / Aprobada'),
(2, 'En Proceso'),
(3, 'Pendiente'),
(4, 'Cancelada / Rechazada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

CREATE TABLE `maquina` (
  `ID_Maquina` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`ID_Maquina`, `Tipo`, `Estado`) VALUES
(2, 1, 1),
(3, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `ID_Rol` int(11) NOT NULL,
  `Descripcion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`ID_Rol`, `Descripcion`) VALUES
(1, 'Medico'),
(2, 'Enfermera'),
(3, 'Administrador'),
(4, 'Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_expediente`
--

CREATE TABLE `solicitud_expediente` (
  `ID_Solicitud` int(11) NOT NULL,
  `ID_Paciente` int(11) NOT NULL,
  `Expendiente_Entregado` tinyint(1) NOT NULL DEFAULT 0,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_tratamiento`
--

CREATE TABLE `tipo_tratamiento` (
  `ID_Tipo_Tratamiento` int(11) NOT NULL,
  `Tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_tratamiento`
--

INSERT INTO `tipo_tratamiento` (`ID_Tipo_Tratamiento`, `Tipo`) VALUES
(1, 'Revisión'),
(2, 'Quimioterapia'),
(3, 'Radioterapia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Cedula` varchar(20) DEFAULT NULL,
  `Edad` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(64) DEFAULT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Tipo_Usuario` int(11) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Cedula`, `Edad`, `Email`, `Password`, `Telefono`, `Tipo_Usuario`, `Estado`) VALUES
(3, 'Wencers Castillo', '8-960-165', 22, 'mathewscastillo40@gmail.com', '123456', '63194033', 4, 1),
(4, 'Madonna', '8-999-999', 63, 'mdna63@gmail.com', '123', '3466', 1, 1),
(5, 'David Lara', '88888', 23, 'davidlara@gmail.com', '1234', '1245666', 2, 1),
(6, 'Kim Kardashian', '1999', 42, 'kimkardashian@gmail.com', '6789', '12345678', 3, 1),
(7, 'Mathews', '11111', 23, 'mathews0712@gmail.com', '12344', '14553', 4, 0),
(8, 'John Quijano', '1234', 33, 'wencerscastillo40@gmail.com', '788590', '+50763194032', 4, 1),
(9, 'Luigi Santana', '4-809-753', 22, 'luis76760@gmail.com', '374793', '+507 6553-1716', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioxespecialidad`
--

CREATE TABLE `usuarioxespecialidad` (
  `ID_ue` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`ID_Cita`),
  ADD KEY `FK_Cita_Estado` (`ID_Estado_Cita`),
  ADD KEY `FK_Cita_tratamiento` (`ID_Tipo_Tratamiento`),
  ADD KEY `ID_Maquina` (`ID_Maquina`),
  ADD KEY `ID_Paciente` (`ID_Paciente`),
  ADD KEY `ID_Medico` (`ID_Medico`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`ID_Especialidad`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`ID_Estado`);

--
-- Indices de la tabla `maquina`
--
ALTER TABLE `maquina`
  ADD PRIMARY KEY (`ID_Maquina`);

--
-- Indices de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`ID_Rol`);

--
-- Indices de la tabla `solicitud_expediente`
--
ALTER TABLE `solicitud_expediente`
  ADD PRIMARY KEY (`ID_Solicitud`),
  ADD KEY `Estado_Expediente` (`Estado`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `tipo_tratamiento`
--
ALTER TABLE `tipo_tratamiento`
  ADD PRIMARY KEY (`ID_Tipo_Tratamiento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Telefono` (`Telefono`),
  ADD UNIQUE KEY `Cedula` (`Cedula`),
  ADD UNIQUE KEY `Password` (`Password`),
  ADD KEY `Tipo_Usuario` (`Tipo_Usuario`);

--
-- Indices de la tabla `usuarioxespecialidad`
--
ALTER TABLE `usuarioxespecialidad`
  ADD PRIMARY KEY (`ID_ue`),
  ADD KEY `ID_Usuario_FK` (`ID_Usuario`),
  ADD KEY `ID_Especialidad` (`ID_Especialidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `ID_Cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `ID_Especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `maquina`
--
ALTER TABLE `maquina`
  MODIFY `ID_Maquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  MODIFY `ID_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `solicitud_expediente`
--
ALTER TABLE `solicitud_expediente`
  MODIFY `ID_Solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_tratamiento`
--
ALTER TABLE `tipo_tratamiento`
  MODIFY `ID_Tipo_Tratamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarioxespecialidad`
--
ALTER TABLE `usuarioxespecialidad`
  MODIFY `ID_ue` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `FK_Cita` FOREIGN KEY (`ID_Paciente`) REFERENCES `usuario` (`ID_Usuario`),
  ADD CONSTRAINT `FK_Cita_tratamiento` FOREIGN KEY (`ID_Tipo_Tratamiento`) REFERENCES `tipo_tratamiento` (`ID_Tipo_Tratamiento`),
  ADD CONSTRAINT `FK_Estado` FOREIGN KEY (`ID_Estado_Cita`) REFERENCES `estado` (`ID_Estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`ID_Maquina`) REFERENCES `maquina` (`ID_Maquina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`ID_Medico`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud_expediente`
--
ALTER TABLE `solicitud_expediente`
  ADD CONSTRAINT `FK_Estado_Solicitud` FOREIGN KEY (`Estado`) REFERENCES `estado` (`ID_Estado`),
  ADD CONSTRAINT `solicitud_expediente_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_ID_Tipo_Usuario` FOREIGN KEY (`Tipo_Usuario`) REFERENCES `rol_usuario` (`ID_Rol`),
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Tipo_Usuario`) REFERENCES `rol_usuario` (`ID_Rol`);

--
-- Filtros para la tabla `usuarioxespecialidad`
--
ALTER TABLE `usuarioxespecialidad`
  ADD CONSTRAINT `usuarioxespecialidad_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioxespecialidad_ibfk_2` FOREIGN KEY (`ID_Especialidad`) REFERENCES `especialidad` (`ID_Especialidad`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
