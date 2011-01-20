-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2011 at 07:41 PM
-- Server version: 5.1.54
-- PHP Version: 5.3.5-0.dotdeb.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `billing_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `number`, `user_id`, `status`) VALUES
(1, '001', 2, 1),
(2, '002', 3, 1),
(3, '003', 4, 1),
(7, '004', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_has_service`
--

DROP TABLE IF EXISTS `customer_has_service`;
CREATE TABLE IF NOT EXISTS `customer_has_service` (
  `customer_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_has_service`
--

INSERT INTO `customer_has_service` (`customer_id`, `service_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(3, 2),
(7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_amount` double NOT NULL,
  `total_compensation` double NOT NULL,
  `period_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `total_amount`, `total_compensation`, `period_id`, `customer_id`) VALUES
(1, 180000, 0, 1, 1),
(2, 100000, 0, 1, 2),
(3, 180000, 0, 1, 3),
(5, 100000, 0, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item`
--

DROP TABLE IF EXISTS `invoice_item`;
CREATE TABLE IF NOT EXISTS `invoice_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double NOT NULL,
  `subtotal_compensation` double NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `invoice_item`
--

INSERT INTO `invoice_item` (`id`, `amount`, `subtotal_compensation`, `invoice_id`, `period_id`, `customer_id`, `service_id`) VALUES
(1, 100000, 0, 1, 1, 1, 1),
(2, 80000, 0, 1, 1, 1, 2),
(3, 100000, 0, 2, 1, 2, 1),
(4, 100000, 0, 3, 1, 3, 1),
(5, 80000, 0, 3, 1, 3, 2),
(6, 100000, 0, 5, 1, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

DROP TABLE IF EXISTS `period`;
CREATE TABLE IF NOT EXISTS `period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`id`, `name`) VALUES
(1, 'January 2011');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `display` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `display`) VALUES
(1, 'admin', 'Administrator'),
(2, 'customer', 'Customer'),
(3, 'management', 'Management'),
(4, 'technical_support', 'Technical Support'),
(5, 'customer_services', 'Customer Services');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `price`) VALUES
(1, 'Internet', 100000),
(2, 'TV', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

DROP TABLE IF EXISTS `tbl_migration`;
CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_migration`
--


-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `compensation` double NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `invoice_item_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ticket`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role_id`, `status`, `fullname`) VALUES
(1, 'admin', 'ac43724f16e9241d990427ab7c8f4228', 'admin@gmail.com', 1, 1, 'Administrator'),
(2, 'customer1', 'ac43724f16e9241d990427ab7c8f4228', 'customer1@gmail.com', 2, 1, 'Customer 1'),
(3, 'customer2', 'ac43724f16e9241d990427ab7c8f4228', 'customer2@gmail.com', 2, 1, 'Customer 2'),
(4, 'customer3', 'ac43724f16e9241d990427ab7c8f4228', 'customer3@gmail.com', 2, 1, 'Customer 3'),
(5, 'management1', 'ac43724f16e9241d990427ab7c8f4228', 'management1@gmail.com', 3, 1, 'Management 1'),
(6, 'techincal_support1', 'ac43724f16e9241d990427ab7c8f4228', 'techincal_support1@gmail.com', 4, 1, 'Technical Support 1'),
(7, 'customer_services1', 'ac43724f16e9241d990427ab7c8f4228', 'customer_services1@gmail.com', 5, 1, 'Customer Service 1'),
(11, 'ata', '24accbed29ea007663fb3d7e5765f1c7', 'ata@nevisa.web.id', 2, 1, 'Ahmad Tanwir');
