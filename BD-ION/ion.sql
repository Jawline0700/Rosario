-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2023 a las 04:31:03
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
  `ID_Usuario` int(11) NOT NULL,
  `ID_Solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `ID_Cita` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `ID_Paciente` int(11) NOT NULL,
  `ID_Medico` int(11) NOT NULL,
  `ID_Tipo_Tratamiento` int(11) NOT NULL,
  `ID_Estado_Cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `ID_Especialidad` int(11) NOT NULL,
  `Tipo_Especialidad` tinyint(1) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_cita`
--

CREATE TABLE `estado_cita` (
  `ID_Estado` int(11) NOT NULL,
  `Descripción` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `ID_Paciente` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Posicion_Rad` int(11) NOT NULL,
  `ID_Posicion_Quimio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `ID_Rol` int(11) NOT NULL,
  `Descripcion` varchar(40) NOT NULL,
  `ID_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_expediente`
--

CREATE TABLE `solicitud_expediente` (
  `ID_Solicitud` int(11) NOT NULL,
  `ID_Paciente` int(11) NOT NULL,
  `Expendiente_Entregado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_tratamiento`
--

CREATE TABLE `tipo_tratamiento` (
  `ID_Tipo_Tratamiento` int(11) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_Administrador`),
  ADD KEY `FK_Administrador` (`ID_Usuario`),
  ADD KEY `FK_Solicitud` (`ID_Solicitud`);

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
  ADD KEY `FK_Enferma_Radio` (`ID_Enfermera`),
  ADD KEY `FK_Cola_Radio_Paciente` (`ID_Paciente`);

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
  ADD KEY `FK_Paciente_Usuario` (`ID_Usuario`),
  ADD KEY `FK_Posicion_Rad` (`ID_Posicion_Rad`),
  ADD KEY `FK_Cola_Quimio_Paciente1` (`ID_Posicion_Quimio`);

--
-- Indices de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`ID_Rol`),
  ADD KEY `FK_rol_usuario_tipos` (`ID_Usuario`);

--
-- Indices de la tabla `solicitud_expediente`
--
ALTER TABLE `solicitud_expediente`
  ADD PRIMARY KEY (`ID_Solicitud`),
  ADD KEY `FK_Solicitud_Expediendete_Paciente` (`ID_Paciente`);

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
  ADD KEY `FK_ID_Tipo_Usuario` (`Tipo_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ID_Administrador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `ID_Cita` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID_Enfermera` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `ID_Especialidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_cita`
--
ALTER TABLE `estado_cita`
  MODIFY `ID_Estado` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID_Medico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `ID_Paciente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  MODIFY `ID_Rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud_expediente`
--
ALTER TABLE `solicitud_expediente`
  MODIFY `ID_Solicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_tratamiento`
--
ALTER TABLE `tipo_tratamiento`
  MODIFY `ID_Tipo_Tratamiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `FK_Administrador` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`),
  ADD CONSTRAINT `FK_Solicitud` FOREIGN KEY (`ID_Solicitud`) REFERENCES `solicitud_expediente` (`ID_Solicitud`);

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
  ADD CONSTRAINT `FK_Cola_Quimio_Paciente1` FOREIGN KEY (`ID_Posicion_Quimio`) REFERENCES `cola_quimio` (`ID_Quimio`),
  ADD CONSTRAINT `FK_Paciente_Usuario` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`),
  ADD CONSTRAINT `FK_Posicion_Rad` FOREIGN KEY (`ID_Posicion_Rad`) REFERENCES `cola_radio` (`ID_Cola_Radio`);

--
-- Filtros para la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD CONSTRAINT `FK_rol_usuario_tipos` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `solicitud_expediente`
--
ALTER TABLE `solicitud_expediente`
  ADD CONSTRAINT `FK_Solicitud_Expediendete_Paciente` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_ID_Tipo_Usuario` FOREIGN KEY (`Tipo_Usuario`) REFERENCES `rol_usuario` (`ID_Rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
