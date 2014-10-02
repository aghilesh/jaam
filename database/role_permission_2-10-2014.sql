-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2014 at 03:50 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

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
  `role_id` int(11) NOT NULL,
  `permission` varchar(45) NOT NULL,
  `module` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`role_id`, `permission`, `module`) VALUES
(1, 'add User role', 'User role'),
(1, 'edit User role', 'User role'),
(1, 'delete User role', 'User role'),
(1, 'add Branch', 'Branch'),
(1, 'edit Branch', 'Branch'),
(1, 'delete Branch', 'Branch'),
(1, 'add Department', 'Department'),
(1, 'edit Department', 'Department'),
(1, 'delete Department', 'Department'),
(1, 'add User', 'User'),
(1, 'edit User', 'User'),
(1, 'delete User', 'User'),
(1, 'add Country', 'Country'),
(1, 'edit Country', 'Country'),
(1, 'delete Country', 'Country'),
(1, 'add University', 'University'),
(1, 'edit University', 'University'),
(1, 'delete University', 'University'),
(1, 'add Associate agency', 'Associate agency'),
(1, 'edit Associate agency', 'Associate agency'),
(1, 'delete Associate agency', 'Associate agency'),
(1, 'add University courses', 'University courses'),
(1, 'edit University courses', 'University courses'),
(1, 'delete University courses', 'University courses'),
(1, 'add Enquiries', 'Enquiries'),
(1, 'edit Enquiries', 'Enquiries'),
(1, 'delete Enquiries', 'Enquiries'),
(1, 'add Task', 'Task'),
(1, 'edit Task', 'Task'),
(1, 'delete Task', 'Task'),
(3, 'add User role', 'User role'),
(3, 'delete User role', 'User role'),
(3, 'add Associate agency', 'Associate agency'),
(3, 'edit Enquiries', 'Enquiries'),
(3, 'add Task', 'Task'),
(3, 'edit Task', 'Task'),
(3, 'delete Task', 'Task'),
(4, 'add Enquiries', 'Enquiries'),
(4, 'edit Enquiries', 'Enquiries'),
(4, 'delete Enquiries', 'Enquiries'),
(4, 'add Task', 'Task'),
(4, 'edit Task', 'Task'),
(4, 'delete Task', 'Task');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
