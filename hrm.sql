-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2013 at 06:29 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `username` varchar(16) CHARACTER SET latin1 NOT NULL,
  `id` int(8) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`password`, `username`, `id`) VALUES
('21232f297a57a5a743894a0e4a801fc3', 'admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE IF NOT EXISTS `guest` (
  `guest_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(64) NOT NULL,
  `contact_no` varchar(64) NOT NULL,
  PRIMARY KEY (`guest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `fullname`, `contact_no`) VALUES
(1, 'Czarina', '09222222222'),
(2, 'Lizette', '09222222222'),
(3, 'Chia', '091511111111'),
(4, 'KEP', '901283120');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(8) NOT NULL AUTO_INCREMENT,
  `uname` varchar(16) CHARACTER SET latin1 NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `fullname` varchar(32) CHARACTER SET latin1 NOT NULL,
  `contactno` varchar(16) CHARACTER SET latin1 NOT NULL,
  `eadd` varchar(32) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_bin AUTO_INCREMENT=14 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `uname`, `password`, `fullname`, `contactno`, `eadd`) VALUES
(10, 'kevin', '5d41402abc4b2a76b9719d911017c592', 'Kevin Romas', '11222', 'kevin@gmail.com'),
(12, 'cpbael', '2e3817293fc275dbee74bd71ce6eb056', 'Claudine ', '2147483647', 'cpbael@gmail.com'),
(13, 'claudinebael', '81dc9bdb52d04dc20036dbd8313ed055', 'Claudine ', '2147483647', 'cpbael@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `is_Member` int(1) NOT NULL COMMENT 'boolean',
  `member_id` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `is_Paid` int(1) NOT NULL DEFAULT '0' COMMENT 'boolean',
  `flag` int(2) NOT NULL DEFAULT '0' COMMENT '0:reserved;1:checked in; -1:checked out',
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `service_id`, `start_date`, `end_date`, `is_Member`, `member_id`, `price`, `is_Paid`, `flag`) VALUES
(25, 15, '2013-02-21 00:00:00', '2013-02-28 00:00:00', 1, 10, 16800, 1, 2),
(41, 16, '2013-02-27 11:00:00', '2013-02-28 11:00:00', 1, 10, 900, 1, 2),
(42, 16, '2013-02-21 11:00:00', '2013-02-22 11:00:00', 1, 10, 900, 1, 2),
(45, 16, '2013-03-28 11:00:00', '2013-03-29 11:00:00', 1, 10, 900, 1, 2),
(46, 15, '2013-02-20 11:00:00', '2013-02-20 11:00:00', 1, 10, 0, 1, 2),
(47, 16, '2013-02-26 11:00:00', '2013-02-27 11:00:00', 1, 10, 900, 1, 2),
(50, 16, '2013-03-26 11:00:00', '2013-03-28 11:00:00', 1, 10, 1800, 1, 2),
(51, 15, '2015-02-25 11:00:00', '2015-02-27 11:00:00', 1, 13, 1000, 1, 2),
(52, 16, '2013-02-28 11:00:00', '2013-03-07 11:00:00', 1, 13, 6300, 1, 2),
(53, 18, '2013-02-27 11:00:00', '2013-02-28 11:00:00', 1, 13, 500, 1, 2),
(54, 18, '2013-03-06 11:00:00', '2013-03-07 11:00:00', 1, 13, 500, 1, 2),
(55, 15, '2013-02-28 11:00:00', '2013-03-05 11:00:00', 1, 13, 2500, 1, 2),
(56, 13, '2013-03-07 11:00:00', '2013-03-08 11:00:00', 1, 13, 977689, 1, 2),
(57, 16, '2014-03-26 11:00:00', '2014-03-28 11:00:00', 1, 13, 1800, 0, 2),
(58, 18, '2013-03-28 11:00:00', '2013-03-29 11:00:00', 0, 1, 500, 0, 2),
(59, 18, '2013-03-30 11:00:00', '2013-03-31 11:00:00', 0, 2, 500, 0, 2),
(60, 15, '2013-03-30 11:00:00', '2013-03-31 11:00:00', 0, 3, 500, 0, 2),
(61, 13, '2013-03-20 11:00:00', '2013-03-28 11:00:00', 0, 2, 7821510, 0, 2),
(62, 15, '2013-03-17 11:00:00', '2013-03-18 11:00:00', 0, 2, 500, 0, 2),
(63, 30, '2013-03-19 11:00:00', '2013-03-27 11:00:00', 1, 13, 7104, 0, 2),
(64, 29, '2013-03-17 11:00:00', '2013-03-21 11:00:00', 0, 4, 3600, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(8) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(32) NOT NULL,
  `rate` double NOT NULL,
  `classification` varchar(32) NOT NULL,
  `article` text NOT NULL,
  `image` varchar(32) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `rate`, `classification`, `article`, `image`) VALUES
(16, 'asdas', 900, 'ROOM', 'asdasdad', '4.jpg'),
(18, 'bRoom BBBBBroom', 500, 'ROOM', 'jkhfghhhgfdcghjjkkhjhhyiu', 'bRoom BBBBBroom.jpeg'),
(29, 'hihihi', 900, 'ROOM', 'asdjhlasjkjasdfhadsfj;adsgfm;adsfjadfs', 'hihihi.jpeg'),
(30, 'UI', 888, 'ROOM', 'aslkdjaskldjl', 'UI.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `type_id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `classification` enum('ROOM','SERVICE','FACILITY') NOT NULL,
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `classification` (`classification`),
  UNIQUE KEY `classification_2` (`classification`),
  UNIQUE KEY `classification_3` (`classification`),
  KEY `classification_fk` (`classification`),
  KEY `classification_fk_2` (`classification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `type`
--

