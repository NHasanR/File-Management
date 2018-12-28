-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2014 at 04:21 PM
-- Server version: 5.5.37
-- PHP Version: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dk`
--

-- --------------------------------------------------------

--
-- Table structure for table `upload_data`
--

CREATE TABLE IF NOT EXISTS `upload_data` (
  `FILE_NAME` varchar(100) NOT NULL,
  `FILE_SIZE` int(10) NOT NULL,
  `FILE_TYPE` varchar(20) NOT NULL,
  `CATEGORY` varchar(50) NOT NULL,
  `UPLOADED_BY` varchar(50) NOT NULL,
  `PATH` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_data`
--

INSERT INTO `upload_data` (`FILE_NAME`, `FILE_SIZE`, `FILE_TYPE`, `CATEGORY`, `UPLOADED_BY`, `PATH`) VALUES
('02.jpg', 5, 'image/jpeg', 'Images', 'joe', 'user_data/joe/02.jpg'),
('02.jpg', 5, 'image/jpeg', 'Images', 'admin', 'user_data/admin/02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
