-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2013 at 03:35 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(8) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(32) NOT NULL,
  `rate` double NOT NULL,
  `classification` enum('ROOM','FACILITY','SERVICE') NOT NULL,
  `article` text NOT NULL,
  PRIMARY KEY (`service_id`),
  UNIQUE KEY `classification_4` (`classification`),
  KEY `service_id` (`service_id`),
  KEY `service_id_2` (`service_id`),
  KEY `service_id_3` (`service_id`),
  KEY `service_id_4` (`service_id`),
  KEY `classification` (`classification`),
  KEY `classification_2` (`classification`),
  KEY `classification_3` (`classification`),
  KEY `classification_5` (`classification`),
  KEY `service_id_5` (`service_id`),
  KEY `classification_6` (`classification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
