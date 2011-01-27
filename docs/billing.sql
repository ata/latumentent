-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2011 at 07:14 AM
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

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `ownership` int(11) NOT NULL,
  `hire_up_to` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `number`, `user_id`, `status`, `contact_number`, `ownership`, `hire_up_to`) VALUES
(1, '001', 2, 1, '', 0, '0000-00-00'),
(2, '002', 3, 1, '', 0, '0000-00-00'),
(3, '003', 4, 1, '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_has_service`
--

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
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_amount` double NOT NULL,
  `total_compensation` double NOT NULL,
  `period_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `total_amount`, `total_compensation`, `period_id`, `customer_id`) VALUES
(1, 180000, 0, 1, 1),
(2, 100000, 0, 1, 2),
(3, 180000, 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item`
--

CREATE TABLE IF NOT EXISTS `invoice_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double NOT NULL,
  `subtotal_compensation` double NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `billing_date` date NOT NULL,
  `paying_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `invoice_item`
--

INSERT INTO `invoice_item` (`id`, `amount`, `subtotal_compensation`, `invoice_id`, `period_id`, `customer_id`, `service_id`, `billing_date`, `paying_date`) VALUES
(1, 100000, 0, 1, 1, 1, 1, '0000-00-00', '0000-00-00'),
(2, 80000, 0, 1, 1, 1, 2, '0000-00-00', '0000-00-00'),
(3, 100000, 0, 2, 1, 2, 1, '0000-00-00', '0000-00-00'),
(4, 100000, 0, 3, 1, 3, 1, '0000-00-00', '0000-00-00'),
(5, 80000, 0, 3, 1, 3, 2, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `outlay`
--

CREATE TABLE IF NOT EXISTS `outlay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double NOT NULL,
  `period_id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `outlay`
--


-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE IF NOT EXISTS `period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `total_revenue` double NOT NULL,
  `total_outlay` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`id`, `name`, `total_revenue`, `total_outlay`) VALUES
(1, 'January 2011', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `problem_type`
--

CREATE TABLE IF NOT EXISTS `problem_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `problem_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE IF NOT EXISTS `revenue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double NOT NULL,
  `period_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `revenue`
--


-- --------------------------------------------------------

--
-- Table structure for table `role`
--

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
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `setting`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1295846730),
('m110117_012547_init', 1295846740),
('m110117_025939_init_data', 1295846740),
('m110117_090847_user_customer_state', 1295846740),
('m110117_102801_user_add_fullname_column', 1295846740),
('m110118_033338_service_add_column_price', 1295846740),
('m110118_120640_ticket_add_column_service_id', 1295846740),
('m110119_041753_invoice_item_add_column_service_id', 1295846740),
('m110119_152939_period_add_name_column', 1295846740),
('m110119_153306_period_drop_year_month_column', 1295846740),
('m110120_164040_ticket_alter_body_column', 1295846740),
('m110120_165041_insert_dummy_data', 1295846740),
('m110121_234243_add_detail_tables', 1295847445),
('m110126_230329_completing_customer_table', 1296083639);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text,
  `status` int(11) NOT NULL,
  `compensation` double NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `invoice_item_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `time_open` datetime NOT NULL,
  `time_closed` datetime NOT NULL,
  `problem_type_id` int(11) NOT NULL,
  `solved` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ticket`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
(7, 'customer_services1', 'ac43724f16e9241d990427ab7c8f4228', 'customer_services1@gmail.com', 5, 1, 'Customer Service 1');
