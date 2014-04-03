-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2013 at 07:52 AM
-- Server version: 5.1.70-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `danie133_pycadamey`
--

-- --------------------------------------------------------

--
-- Table structure for table `usercode`
--

CREATE TABLE IF NOT EXISTS `usercode` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) COLLATE latin1_general_ci NOT NULL COMMENT 'Username of the person this code belongs to',
  `topic` varchar(100) COLLATE latin1_general_ci NOT NULL COMMENT 'The topic the code is for',
  `code` mediumtext COLLATE latin1_general_ci NOT NULL COMMENT 'The code the user has written',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Stores the code that users have made' AUTO_INCREMENT=8 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
