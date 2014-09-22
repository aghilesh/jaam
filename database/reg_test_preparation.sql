-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2014 at 05:13 PM
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
-- Table structure for table `reg_test_preparation`
--

CREATE TABLE IF NOT EXISTS `reg_test_preparation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `toffel` int(11) NOT NULL,
  `ielts` int(11) NOT NULL,
  `gmat` int(11) NOT NULL,
  `gre` int(11) NOT NULL,
  `sat` int(11) NOT NULL,
  `started_coaching` tinyint(1) NOT NULL,
  `looking_for_coaching` tinyint(1) NOT NULL,
  `looking_for_waier` tinyint(1) NOT NULL,
  `regular_or_fasttrack` varchar(50) NOT NULL,
  `work_experiance` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;