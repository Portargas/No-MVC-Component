-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2017 at 05:29 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prueba`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `idarea` int(11) NOT NULL,
  `codigo` varchar(40) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`idarea`, `codigo`, `nombre`) VALUES
(1, '140', 'Derecho del Trabajo de la Seguridad Social (140)'),
(2, '230', 'Economía Financiera y Contabilidad (230)'),
(3, '381', 'Filosofía del Derecho (381)');

-- --------------------------------------------------------

--
-- Table structure for table `asignatura`
--

CREATE TABLE `asignatura` (
  `idasig` int(11) NOT NULL,
  `codigo` varchar(40) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `curso` varchar(200) NOT NULL,
  `cuatrimestre` varchar(100) NOT NULL,
  `guia_docente` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idcat` int(11) NOT NULL,
  `abrev` varchar(40) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idcat`, `abrev`, `nombre`) VALUES
(1, 'cu', 'Catedrático de Universidad'),
(2, 'ceu', 'Catedrático de Escuela Universitaria'),
(3, 'ptu', 'Profesor Titular de Universidad');

-- --------------------------------------------------------

--
-- Table structure for table `centros`
--

CREATE TABLE `centros` (
  `idcen` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `CP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `centros`
--

INSERT INTO `centros` (`idcen`, `nombre`, `direccion`, `CP`) VALUES
(1, 'Facultad de Derecho', 'Campus Universitario', '32004 Ourense'),
(2, 'FCETOU', 'Campus Universitario', '32004 Ourense');

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `idepar` int(11) NOT NULL,
  `codigo` varchar(40) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `web` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`idepar`, `codigo`, `nombre`, `web`) VALUES
(1, 'X13', 'Departamento de Derecho Público Especial (X13)', 'http://depx13.webs.uvigo.es/'),
(2, 'X07', 'Departamento de Economía Financiera y Contabilidad  (X07)', 'http://webx07.webs.uvigo.es/'),
(3, 'X02', 'Departamento de Derecho Privado (X02)', '');

-- --------------------------------------------------------

--
-- Table structure for table `grupos_investigacion`
--

CREATE TABLE `grupos_investigacion` (
  `idgrup` int(11) NOT NULL,
  `codigo` varchar(40) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `web` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grupos_investigacion`
--

INSERT INTO `grupos_investigacion` (`idgrup`, `codigo`, `nombre`, `web`) VALUES
(1, 'DT1', 'Derecho del Trabajo y de la Seguridad Social (DT1)', 'http://dt1x13.webs.uvigo.es/'),
(2, 'MDA-I', 'MEDEA-iURiS', 'http://medeaiuris.webs.uvigo.es/');

-- --------------------------------------------------------

--
-- Table structure for table `profesor`
--

CREATE TABLE `profesor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apelidos` varchar(200) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `departamento` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `espazweb` text NOT NULL,
  `despacho` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tlf` varchar(40) NOT NULL,
  `linInv1` varchar(200) NOT NULL,
  `linInv2` varchar(200) NOT NULL,
  `linInv3` varchar(200) NOT NULL,
  `linInv4` varchar(2000) NOT NULL,
  `linInv5` varchar(200) NOT NULL,
  `grupoInv` varchar(200) NOT NULL,
  `titulacion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profesor`
--

INSERT INTO `profesor` (`id`, `nombre`, `apelidos`, `genero`, `categoria`, `departamento`, `area`, `direccion`, `espazweb`, `despacho`, `email`, `tlf`, `linInv1`, `linInv2`, `linInv3`, `linInv4`, `linInv5`, `grupoInv`, `titulacion`) VALUES
(1, 'Marta', 'Fernández Prieto', 'Mujer', '3', '1', '1', '1', 'http://mfprieto.webs.uvigo.es/', 'Despacho 22, 3º Andar', 'mfprieto@uvigo.es', '988368826', 'Instrumentos de protección social privada na xestión de situacións de crise', 'O traballo no mar: pesca e traballadores vulnerables', 'Liberdade de circulación de traballadores e mercado de emprego europeo', 'Principio de igualdade e non discriminación por razón de sexo', 'Conciliación da vida laboral e familiar', '1', ''),
(2, 'Elena', 'Gallego Rodríguez', 'Mujer', '3', '2', '2', '', '', 'Despacho 9, 3º Andar', 'egallego@uvigo.es', '988368718', 'Contabilidade Internacional', 'Historia da Contabilidade', 'Internacionalización da empresa', '', '', '', ''),
(3, 'Ana', 'Garriga Domínguez', 'Mujer', '3', '3', '3', '2', '', 'Despacho 26, 4º Andar', 'agarriga@uvigo.es', '988368834', 'Protección de datos persoais e dereitos fundamentais', 'A liberdade de expresión na era de Internet', 'Desenvolvemento tecnolóxico, sociedade da información e dereitos humanos', '', '', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `titulaciones`
--

CREATE TABLE `titulaciones` (
  `idtitulo` int(11) NOT NULL,
  `codigo` varchar(40) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`idarea`);

--
-- Indexes for table `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`idasig`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcat`);

--
-- Indexes for table `centros`
--
ALTER TABLE `centros`
  ADD PRIMARY KEY (`idcen`);

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`idepar`);

--
-- Indexes for table `grupos_investigacion`
--
ALTER TABLE `grupos_investigacion`
  ADD PRIMARY KEY (`idgrup`);

--
-- Indexes for table `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titulaciones`
--
ALTER TABLE `titulaciones`
  ADD PRIMARY KEY (`idtitulo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `idasig` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `centros`
--
ALTER TABLE `centros`
  MODIFY `idcen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `idepar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `grupos_investigacion`
--
ALTER TABLE `grupos_investigacion`
  MODIFY `idgrup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `titulaciones`
--
ALTER TABLE `titulaciones`
  MODIFY `idtitulo` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
