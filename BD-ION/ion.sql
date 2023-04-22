-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2023 a las 20:58:56
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
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `ID_Administrador` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`ID_Administrador`, `ID_Usuario`) VALUES
(1, 6);

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
  `ID_Estado_Cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`ID_Cita`, `Fecha`, `ID_Paciente`, `ID_Medico`, `ID_Tipo_Tratamiento`, `ID_Estado_Cita`) VALUES
(3, '2023-04-14', 3, 1, 2, 1),
(4, '2023-04-14', 3, 1, 3, 3),
(6, '2023-04-19', 3, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cola_quimio`
--

CREATE TABLE `cola_quimio` (
  `ID_Quimio` int(11) NOT NULL,
  `ID_Paciente` int(11) NOT NULL,
  `ID_Enfermera` int(11) NOT NULL,
  `ID_Maquina_Quimio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cola_radio`
--

CREATE TABLE `cola_radio` (
  `ID_Cola_Radio` int(11) NOT NULL,
  `ID_Paciente` int(11) NOT NULL,
  `ID_Enfermera` int(11) NOT NULL,
  `ID_Maquina_Cola` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermera`
--

CREATE TABLE `enfermera` (
  `ID_Enfermera` int(11) NOT NULL,
  `ID_Especialidad` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enfermera`
--

INSERT INTO `enfermera` (`ID_Enfermera`, `ID_Especialidad`, `ID_Usuario`) VALUES
(1, 9, 5);

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
-- Estructura de tabla para la tabla `estado_cita`
--

CREATE TABLE `estado_cita` (
  `ID_Estado` int(11) NOT NULL,
  `Estado` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_cita`
--

INSERT INTO `estado_cita` (`ID_Estado`, `Estado`) VALUES
(1, 'Realizada'),
(2, 'En Proceso'),
(3, 'Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_expediente`
--

CREATE TABLE `estado_expediente` (
  `ID_Estado_Expediente` int(11) NOT NULL,
  `Estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_expediente`
--

INSERT INTO `estado_expediente` (`ID_Estado_Expediente`, `Estado`) VALUES
(1, 'En Proceso'),
(2, 'Rechazada'),
(3, 'Aprobada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina_quimio`
--

CREATE TABLE `maquina_quimio` (
  `ID_Maquina` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina_radio`
--

CREATE TABLE `maquina_radio` (
  `ID_Maquina` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `ID_Medico` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`ID_Medico`, `ID_Usuario`, `ID_Especialidad`) VALUES
(1, 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `ID_Paciente` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`ID_Paciente`, `ID_User`) VALUES
(3, 3),
(4, 7);

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

--
-- Volcado de datos para la tabla `solicitud_expediente`
--

INSERT INTO `solicitud_expediente` (`ID_Solicitud`, `ID_Paciente`, `Expendiente_Entregado`, `Estado`) VALUES
(6, 4, 1, 3),
(8, 3, 1, 2);

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
  `Tipo_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Cedula`, `Edad`, `Email`, `Password`, `Telefono`, `Tipo_Usuario`) VALUES
(3, 'Wencers Castillo', '8-960-165', 22, 'mathewscastillo40@gmail.com', '123456', '63194033', 4),
(4, 'Madonna', '8-999-999', 63, 'mdna63@gmail.com', '123', '3466', 1),
(5, 'David Lara', '88888', 23, 'davidlara@gmail.com', '1234', '1245666', 2),
(6, 'Kim Kardashian', '1999', 42, 'kimkardashian@gmail.com', '6789', '12345678', 3),
(7, 'Mathews', '11111', 23, 'mathews0712@gmail.com', '12344', '14553', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_Administrador`),
  ADD KEY `FK_Administrador` (`ID_Usuario`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`ID_Cita`),
  ADD KEY `FK_Cita_Estado` (`ID_Estado_Cita`),
  ADD KEY `FK_Cita` (`ID_Paciente`),
  ADD KEY `FK_Cita_tratamiento` (`ID_Tipo_Tratamiento`),
  ADD KEY `FK_Cita_Medico` (`ID_Medico`);

--
-- Indices de la tabla `cola_quimio`
--
ALTER TABLE `cola_quimio`
  ADD PRIMARY KEY (`ID_Quimio`),
  ADD KEY `FK_Cola_Quimio` (`ID_Enfermera`),
  ADD KEY `FK_Maquina_Quimio` (`ID_Maquina_Quimio`),
  ADD KEY `FK_cola_paciente_Quimio` (`ID_Paciente`);

--
-- Indices de la tabla `cola_radio`
--
ALTER TABLE `cola_radio`
  ADD PRIMARY KEY (`ID_Cola_Radio`),
  ADD KEY `FK_Maquina_Radio` (`ID_Maquina_Cola`),
  ADD KEY `FK_Enferma_Radio` (`ID_Enfermera`);

--
-- Indices de la tabla `enfermera`
--
ALTER TABLE `enfermera`
  ADD PRIMARY KEY (`ID_Enfermera`),
  ADD KEY `FK_enfermera` (`ID_Especialidad`),
  ADD KEY `FK_Enfermera_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`ID_Especialidad`);

--
-- Indices de la tabla `estado_cita`
--
ALTER TABLE `estado_cita`
  ADD PRIMARY KEY (`ID_Estado`);

--
-- Indices de la tabla `estado_expediente`
--
ALTER TABLE `estado_expediente`
  ADD PRIMARY KEY (`ID_Estado_Expediente`);

--
-- Indices de la tabla `maquina_quimio`
--
ALTER TABLE `maquina_quimio`
  ADD PRIMARY KEY (`ID_Maquina`);

--
-- Indices de la tabla `maquina_radio`
--
ALTER TABLE `maquina_radio`
  ADD PRIMARY KEY (`ID_Maquina`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`ID_Medico`),
  ADD KEY `FK_Medico` (`ID_Usuario`),
  ADD KEY `FK_Medico_Especialidad` (`ID_Especialidad`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`ID_Paciente`),
  ADD UNIQUE KEY `ID_User` (`ID_User`);

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
  ADD KEY `FK_Solicitud_Expediendete_Paciente` (`ID_Paciente`),
  ADD KEY `Estado_Expediente` (`Estado`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ID_Administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `ID_Cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cola_quimio`
--
ALTER TABLE `cola_quimio`
  MODIFY `ID_Quimio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cola_radio`
--
ALTER TABLE `cola_radio`
  MODIFY `ID_Cola_Radio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `enfermera`
--
ALTER TABLE `enfermera`
  MODIFY `ID_Enfermera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `ID_Especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estado_cita`
--
ALTER TABLE `estado_cita`
  MODIFY `ID_Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `maquina_quimio`
--
ALTER TABLE `maquina_quimio`
  MODIFY `ID_Maquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `maquina_radio`
--
ALTER TABLE `maquina_radio`
  MODIFY `ID_Maquina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `ID_Medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `ID_Paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  MODIFY `ID_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `solicitud_expediente`
--
ALTER TABLE `solicitud_expediente`
  MODIFY `ID_Solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_tratamiento`
--
ALTER TABLE `tipo_tratamiento`
  MODIFY `ID_Tipo_Tratamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `FK_Administrador` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `FK_Cita` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`),
  ADD CONSTRAINT `FK_Cita_Estado` FOREIGN KEY (`ID_Estado_Cita`) REFERENCES `estado_cita` (`ID_Estado`),
  ADD CONSTRAINT `FK_Cita_Medico` FOREIGN KEY (`ID_Medico`) REFERENCES `medico` (`ID_Medico`),
  ADD CONSTRAINT `FK_Cita_tratamiento` FOREIGN KEY (`ID_Tipo_Tratamiento`) REFERENCES `tipo_tratamiento` (`ID_Tipo_Tratamiento`);

--
-- Filtros para la tabla `cola_quimio`
--
ALTER TABLE `cola_quimio`
  ADD CONSTRAINT `FK_Cola_Quimio` FOREIGN KEY (`ID_Enfermera`) REFERENCES `enfermera` (`ID_Enfermera`),
  ADD CONSTRAINT `FK_Cola_Quimio_Paciente` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`),
  ADD CONSTRAINT `FK_Maquina_Quimio` FOREIGN KEY (`ID_Maquina_Quimio`) REFERENCES `maquina_quimio` (`ID_Maquina`),
  ADD CONSTRAINT `FK_cola_paciente_Quimio` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `cola_radio`
--
ALTER TABLE `cola_radio`
  ADD CONSTRAINT `FK_Cola_Radio_Paciente` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`),
  ADD CONSTRAINT `FK_Enferma_Radio` FOREIGN KEY (`ID_Enfermera`) REFERENCES `enfermera` (`ID_Enfermera`),
  ADD CONSTRAINT `FK_Maquina_Radio` FOREIGN KEY (`ID_Maquina_Cola`) REFERENCES `maquina_radio` (`ID_Maquina`);

--
-- Filtros para la tabla `enfermera`
--
ALTER TABLE `enfermera`
  ADD CONSTRAINT `FK_Enfermera_Usuario` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`),
  ADD CONSTRAINT `FK_enfermera` FOREIGN KEY (`ID_Especialidad`) REFERENCES `especialidad` (`ID_Especialidad`);

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `FK_Medico` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`),
  ADD CONSTRAINT `FK_Medico_Especialidad` FOREIGN KEY (`ID_Especialidad`) REFERENCES `especialidad` (`ID_Especialidad`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `FK_USER` FOREIGN KEY (`ID_User`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `solicitud_expediente`
--
ALTER TABLE `solicitud_expediente`
  ADD CONSTRAINT `FK_Estado_Solicitud` FOREIGN KEY (`Estado`) REFERENCES `estado_expediente` (`ID_Estado_Expediente`),
  ADD CONSTRAINT `FK_Solicitud_Expediendete_Paciente` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_ID_Tipo_Usuario` FOREIGN KEY (`Tipo_Usuario`) REFERENCES `rol_usuario` (`ID_Rol`),
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Tipo_Usuario`) REFERENCES `rol_usuario` (`ID_Rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
