-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2016 a las 22:17:20
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Base de datos: `nuestrafarmacia`
--
CREATE DATABASE IF NOT EXISTS `nuestrafarmacia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nuestrafarmacia`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centroacopio`
--

CREATE TABLE `centroacopio` (
  `IdCentroAcopio` bigint(20) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Domicilio` varchar(20) NOT NULL,
  `CodigoPostal` varchar(20) DEFAULT NULL,
  `Correo` varchar(20) NOT NULL,
  `Telefono1` varchar(20) NOT NULL,
  `Telefono2` varchar(20) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  `Municipio` varchar(20) NOT NULL,
  `Activo` int(11) NOT NULL DEFAULT '1',
  `FechaInsercion` datetime  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centroacopio_supervisor`
--

CREATE TABLE `centroacopio_supervisor` (
  `IdCentroAcopio` bigint(20) NOT NULL,
  `IdSupervisor` bigint(20) NOT NULL,
  `FechaInsercion` datetime  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centroacopio_usuario`
--

CREATE TABLE `centroacopio_usuario` (
  `IdCentroAcopio` bigint(20) NOT NULL,
  `IdUsuario` bigint(20) NOT NULL,
  `FechaInsercion` datetime  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `IdMedicamento` bigint(20) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Formula` text NOT NULL,
  `Descripcion` text NOT NULL,
  `Clasificacion` text NOT NULL,
  `ViaAdministracion` varchar(20) NOT NULL,
  `Medida` varchar(20) NOT NULL,
  `NivelEvidencia` int(11) NOT NULL,
  `Activo` int(11) NOT NULL DEFAULT '1',
  `EsGenerico` int(11) NOT NULL DEFAULT '0',
  `PathIcono` varchar(20) NOT NULL,
  `FechaInsercion` datetime  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentodisponible`
--

CREATE TABLE `medicamentodisponible` (
  `IdMedicamentoDisponible` bigint(20) NOT NULL,
  `IdCentroAcopio` bigint(20) NOT NULL,
  `IdMedicamento` bigint(20) NOT NULL,
  `Paquete` int(11) NOT NULL,
  `Unidad` int(11) NOT NULL,
  `FechaInsercion` datetime  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticion`
--

CREATE TABLE `peticion` (
  `IdPeticion` bigint(20) NOT NULL,
  `IdUsuario` bigint(20) NOT NULL,
  `IdMedicamentoDisponible` bigint(20) NOT NULL,
  `IdMedicamento` bigint(20) NOT NULL,
  `IdSupervisor` bigint(20) NOT NULL,
  `Paquete` int(11) NOT NULL,
  `Unidad` int(11) NOT NULL,
  `Activo` int(11) NOT NULL DEFAULT '1',
  `Estatus` varchar(20) NOT NULL,
  `Comentarios` text NOT NULL,
  `FechaInsercion` datetime  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisor`
--

CREATE TABLE `supervisor` (
  `IdSupervisor` bigint(20) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `ApellidoPaterno` varchar(20) NOT NULL,
  `ApellidoMaterno` varchar(20) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Contrasenia` varchar(40) NOT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Correo` varchar(20) NOT NULL,
  `Celular` varchar(20) DEFAULT NULL,
  `Telefono1` varchar(20) DEFAULT NULL,
  `Activo` int(11) NOT NULL DEFAULT '1',
  `FechaInsercion` datetime  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` bigint(20) NOT NULL,
  `IdSupervisor` bigint(20) DEFAULT NULL,
  `Nombre` varchar(20) NOT NULL,
  `ApellidoPaterno` varchar(20) NOT NULL,
  `ApellidoMaterno` varchar(20) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Contrasenia` varchar(40) NOT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `Municipio` varchar(20) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Domicilio` varchar(30) DEFAULT NULL,
  `CodigoPostal` varchar(20) DEFAULT NULL,
  `Correo` varchar(30) NOT NULL,
  `Celular` varchar(20) DEFAULT NULL,
  `Telefono1` varchar(20) DEFAULT NULL,
  `Telefono2` varchar(20) DEFAULT NULL,
  `FechaInsercion` datetime  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_medicamento`
--

CREATE TABLE `usuario_medicamento` (
  `IdDonacion` bigint(20) NOT NULL,
  `IdUsuario` bigint(20) NOT NULL,
  `IdMedicamento` bigint(20) NOT NULL,
  `IdSupervisor` bigint(20) NOT NULL,
  `Paquete` int(11) NOT NULL,
  `Unidad` int(11) NOT NULL,
  `FechaExpiracion` datetime NOT NULL,
  `Estatus` varchar(20) NOT NULL,
  `Comentarios` text NOT NULL,
  `Activo` int(11) NOT NULL DEFAULT '1',
  `FechaInsercion` datetime  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--

--
-- Indices de la tabla `centroacopio`
--
ALTER TABLE `centroacopio`
  ADD PRIMARY KEY (`IdCentroAcopio`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`IdMedicamento`);

--
-- Indices de la tabla `medicamentodisponible`
--
ALTER TABLE `medicamentodisponible`
  ADD PRIMARY KEY (`IdMedicamentoDisponible`);

--
-- Indices de la tabla `peticion`
--
ALTER TABLE `peticion`
  ADD PRIMARY KEY (`IdPeticion`);

--
-- Indices de la tabla `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`IdSupervisor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- Indices de la tabla `usuario_medicamento`
--
ALTER TABLE `usuario_medicamento`
  ADD PRIMARY KEY (`IdDonacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `centroacopio`
--
ALTER TABLE `centroacopio`
  MODIFY `IdCentroAcopio` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `IdMedicamento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medicamentodisponible`
--
ALTER TABLE `medicamentodisponible`
  MODIFY `IdMedicamentoDisponible` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `peticion`
--
ALTER TABLE `peticion`
  MODIFY `IdPeticion` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `IdSupervisor` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_medicamento`
--
ALTER TABLE `usuario_medicamento`
  MODIFY `IdDonacion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

