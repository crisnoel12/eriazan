-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 23, 2016 at 02:23 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eriazan`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=142 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `category`) VALUES
(101, 'Kojic Acid Soap', 75.00, 'img/kojic_soap.jpg', 'Soaps'),
(102, 'Glycolic Soap', 75.00, 'img/glycolic_soap.jpg', 'Soaps'),
(103, 'Licorice Soap', 75.00, 'img/licorice_soap.jpg', 'Soaps'),
(104, 'Anti-Melasma Set', 450.00, 'img/anti-melasma_set.jpg', 'Sets'),
(105, 'Anti-Pimple Set', 350.00, 'img/anti-pimple_set.jpg', 'Sets'),
(106, 'Anti-Wrinkle Set', 350.00, 'img/anti-wrinkle_set.jpg', 'Sets'),
(107, 'Beauty Set', 350.00, 'img/beauty_set.jpg', 'Sets'),
(108, 'Body Bleaching Set', 350.00, 'img/bleaching_set.jpg', 'Sets'),
(109, 'Exfoliating Set', 300.00, 'img/exfoliating_set.jpg', 'Sets'),
(110, 'Collagen Soap', 75.00, 'img/collagen_soap.jpg', 'Soaps'),
(111, '5% Glycolic Soap', 75.00, 'img/glycolic5_soap.jpg', 'Soaps'),
(112, 'Erythromycin Cream for Acne', 125.00, 'img/erythromycin_cream.jpg', 'Creams'),
(113, 'EPI-Ultra Whitening Cream', 300.00, 'img/epi-ultra_whitening_cream.jpg', 'Creams'),
(114, 'Dermablend Magc Cream', 200.00, 'img/magc_cream.jpg', 'Creams'),
(115, 'Sunblock Cream', 120.00, 'img/sunblock_cream.jpg', 'Sunblock'),
(116, 'Sunblock Gel', 120.00, 'img/sunblock_gel.jpg', 'Sunblock'),
(117, 'Clarifying Lotion', 100.00, 'img/clarifying_lotion.jpg', 'Solutions'),
(118, 'Kojic Wash', 100.00, 'img/kojic_wash.jpg', 'Solutions'),
(119, 'Pore Minimizer', 100.00, 'img/pore_minimizer.jpg', 'Solutions'),
(120, 'Tyro White Toner', 320.00, 'img/tyro_white_toner.jpg', 'Solutions');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`) VALUES
(1, 'Acne Surgery'),
(2, 'Botox Injection'),
(3, 'Chemical Peeling'),
(4, 'Glutathione Injection'),
(5, 'Warts and Syringoma Removal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` enum('admin','guest') NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `usertype`) VALUES
(1, 'Admin', 'ac00b91c566b4cc2ae7ad97e459dfadc2c0a6298', 'admin'),
(2, 'Guest', 'ac00b91c566b4cc2ae7ad97e459dfadc2c0a6298', 'guest');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
