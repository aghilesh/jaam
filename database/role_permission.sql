-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2014 at 05:11 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prospera`
--

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE IF NOT EXISTS `role_permission` (
  `id` int(11) NOT NULL,
  `permission` varchar(45) NOT NULL,
  `module` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `permission`, `module`) VALUES
(1, 'add User role', ' User role'),
(1, 'add Associate agency', ' Associate agency'),
(3, 'add User role', ' User role'),
(3, 'add Associate agency', ' Associate agency'),
(4, 'add User role', ' User role'),
(4, 'edit Universities', ' Universities');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
