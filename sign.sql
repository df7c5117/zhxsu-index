-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2016 at 02:02 PM
-- Server version: 5.1.62
-- PHP Version: 5.4.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `susage_oa`
--

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE IF NOT EXISTS `sign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stuName` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `stuClass` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `stuSex` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `stuPhone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `stuMail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stuQQ` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `stuWeChat` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `SignDep` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Contact` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `SignTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
