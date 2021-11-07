-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2021 at 02:01 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-06:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17669041_dbhaci`
--
-- CREATE DATABASE IF NOT EXISTS `id17669041_dbhaci` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `dbHaCi`;

-- --------------------------------------------------------

--
-- Table structure for table `schUsuarios`
--

CREATE TABLE `schUsuarios` (
  `idschUsuarios` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Este es el nombre del usuario',
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Este es el correo del usuario',
  `contrasena` varchar(32) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Esta es la contraseña del usuario',
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estatus` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schUsuarios`
--

INSERT INTO `schUsuarios` (`idschUsuarios`, `name`, `email`, `contrasena`, `fecha`, `estatus`) VALUES
(1, 'User', 'user@gmail.com', '1bbd886460827015e5d605ed44252251', '2021-09-28 03:48:55', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schUsuarios`
--
ALTER TABLE `schUsuarios`
  ADD PRIMARY KEY (`idschUsuarios`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schUsuarios`
--
ALTER TABLE `schUsuarios`
  MODIFY `idschUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
