-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2016 at 09:38 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `posnic`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_details`
--

CREATE TABLE IF NOT EXISTS `category_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(120) NOT NULL,
  `category_description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `category_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE IF NOT EXISTS `customer_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(200) NOT NULL,
  `customer_address` varchar(500) NOT NULL,
  `customer_contact1` varchar(100) NOT NULL,
  `customer_contact2` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `customer_name`, `customer_address`, `customer_contact1`, `customer_contact2`, `balance`) VALUES
(2, 'Devansh s', 'Delhi', '762639494', '', 0),
(6, 'hkkbkb', 'kjb kbki			fvfvfv', '3323242424', '', 0),
(9, 'Arushhi', 'madnd', '844994999', '9627153198', 0),
(10, 'ymb', 'Pathankot', '9595493939', '', 0),
(11, 'shshebbaz', 'merut', '947399292', '528648264', 0),
(12, 'sagar', 'auckland', '', '', 0),
(13, 'Shubham', 'Pathankot', '9815979725', '9559039231', 0),
(14, 'Ambuz', 'Akshardham, Delhi', '93943434', '013242444', 0),
(15, 'Purushart', 'Pajanan', '8884944848', '8488484', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_avail`
--

CREATE TABLE IF NOT EXISTS `stock_avail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stock_avail`
--

INSERT INTO `stock_avail` (`id`, `name`, `quantity`) VALUES
(1, 'Tiles Fresh', 53),
(2, 'Brush', 5);

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE IF NOT EXISTS `stock_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stock_id` varchar(120) NOT NULL,
  `stock_name` varchar(120) NOT NULL,
  `stock_quatity` int(11) NOT NULL,
  `supplier_id` varchar(250) NOT NULL,
  `company_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `wholesale_selling_price` decimal(10,2) NOT NULL,
  `category` varchar(120) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expire_date` datetime NOT NULL,
  `uom` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stock_details`
--

INSERT INTO `stock_details` (`id`, `stock_id`, `stock_name`, `stock_quatity`, `supplier_id`, `company_price`, `selling_price`, `wholesale_selling_price`, `category`, `date`, `expire_date`, `uom`) VALUES
(1, 'SD1', 'Tiles Fresh', 0, 'Shubham Sharma', '1500.00', '1800.00', '1700.00', '', '2016-05-14 00:54:50', '0000-00-00 00:00:00', ''),
(2, 'SD2', 'Brush', 0, 'XYZ', '50.00', '100.00', '80.00', '', '2016-05-16 12:24:39', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock_entries`
--

CREATE TABLE IF NOT EXISTS `stock_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stock_id` varchar(120) NOT NULL,
  `stock_name` varchar(260) NOT NULL,
  `stock_supplier_name` varchar(200) NOT NULL,
  `category` varchar(120) NOT NULL,
  `quantity` int(11) NOT NULL,
  `company_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `wholesale_selling_price` decimal(10,2) NOT NULL,
  `opening_stock` int(11) NOT NULL,
  `closing_stock` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(120) NOT NULL,
  `type` varchar(50) NOT NULL,
  `salesid` varchar(120) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `mode` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  `due` datetime NOT NULL,
  `subtotal` int(11) NOT NULL,
  `count1` int(11) NOT NULL,
  `billnumber` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `stock_entries`
--

INSERT INTO `stock_entries` (`id`, `stock_id`, `stock_name`, `stock_supplier_name`, `category`, `quantity`, `company_price`, `selling_price`, `wholesale_selling_price`, `opening_stock`, `closing_stock`, `date`, `username`, `type`, `salesid`, `total`, `payment`, `balance`, `mode`, `description`, `due`, `subtotal`, `count1`, `billnumber`) VALUES
(1, 'PR3', 'Tiles Fresh', 'SHubham Sharma', '', 50, '1500.00', '1800.00', '1700.00', 0, 50, '2016-05-14 00:00:00', 'shubham', 'entry', 'pr12', '75000.00', '75000.00', '0.00', 'cash', '', '0000-00-00 00:00:00', 75000, 1, 'PR3'),
(2, 'SD2', 'Tiles Fresh', '', '', 15, '0.00', '1800.00', '1700.00', 30, 15, '2016-05-15 00:00:00', 'shubham', 'sales', 'SD2', '27000.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR4'),
(3, 'SD3', 'Tiles Fresh', '', '', 5, '0.00', '1800.00', '1700.00', 15, 10, '2016-05-15 00:00:00', 'shubham', 'sales', 'SD3', '8500.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR5'),
(4, 'SD4', 'Tiles Fresh', '', '', 3, '0.00', '1800.00', '1700.00', 10, 7, '2016-05-15 00:00:00', 'shubham', 'sales', 'SD4', '5400.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR6'),
(5, 'SD5', 'Tiles Fresh', '', '', 10, '0.00', '1800.00', '1700.00', 50, 40, '2016-05-15 00:00:00', 'shubham', 'sales', 'SD5', '17000.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR7'),
(6, 'SD6', 'Tiles Fresh', '', '', 12, '0.00', '1800.00', '1700.00', 40, 28, '2016-05-16 00:00:00', 'shubham', 'sales', 'SD6', '20400.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR8'),
(7, 'PR9', 'Brush', 'XYZ', '', 100, '50.00', '100.00', '80.00', 0, 100, '2016-05-16 00:00:00', 'shubham', 'entry', 'pr12', '5000.00', '5000.00', '0.00', 'cash', '', '0000-00-00 00:00:00', 5000, 1, 'PR9'),
(8, 'SD8', 'Brush', '', '', 15, '0.00', '100.00', '80.00', 100, 85, '2016-05-16 00:00:00', 'shubham', 'sales', 'SD8', '1200.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR10'),
(9, 'SD9', 'Tiles Fresh', '', '', 3, '0.00', '1800.00', '1700.00', 28, 25, '2016-05-19 00:00:00', 'shubham', 'sales', 'SD9', '5400.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR11'),
(10, 'SD10', 'Tiles Fresh', '', '', 23, '0.00', '1800.00', '1700.00', 25, 2, '2016-05-19 00:00:00', 'shubham', 'sales', 'SD10', '41400.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR12'),
(11, 'SD11', 'Brush', '', '', 33, '0.00', '100.00', '80.00', 85, 52, '2016-05-19 00:00:00', 'shubham', 'sales', 'SD11', '3300.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR13'),
(12, 'SD12', 'Brush', '', '', 22, '0.00', '100.00', '80.00', 52, 30, '2016-05-19 00:00:00', 'shubham', 'sales', 'SD12', '2200.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR14'),
(13, 'SD13', 'Brush', '', '', 3, '0.00', '100.00', '80.00', 30, 27, '2016-05-19 00:00:00', 'shubham', 'sales', 'SD13', '300.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR15'),
(14, 'SD13', 'Tiles Fresh', '', '', 1, '0.00', '1800.00', '1700.00', 2, 1, '2016-05-19 00:00:00', 'shubham', 'sales', 'SD13', '1800.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 2, 'PR15'),
(15, 'SD15', 'Brush', '', '', 3, '0.00', '100.00', '80.00', 27, 24, '2016-05-22 00:00:00', 'shubham', 'sales', 'SD15', '240.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR17'),
(16, 'SD16', 'Brush', '', '', 2, '0.00', '100.00', '80.00', 24, 22, '2016-05-22 00:00:00', 'shubham', 'sales', 'SD16', '200.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR18'),
(17, 'SD17', 'Brush', '', '', 4, '0.00', '100.00', '80.00', 22, 18, '2016-05-22 00:00:00', 'shubham', 'sales', 'SD17', '400.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR19'),
(18, 'SD18', 'Brush', '', '', 3, '0.00', '100.00', '80.00', 18, 15, '2016-05-22 00:00:00', 'shubham', 'sales', 'SD18', '300.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR20'),
(19, 'PR21', 'Tiles Fresh', 'Mohit G', '', 100, '1500.00', '1800.00', '1700.00', 1, 101, '2016-05-22 00:00:00', 'shubham', 'entry', 'pr12', '150000.00', '150000.00', '0.00', 'cash', '', '0000-00-00 00:00:00', 150000, 1, 'PR21'),
(20, 'PR22', 'Tiles Fresh', 'Kulleh Shaha', '', 20, '1500.00', '1800.00', '1700.00', 101, 121, '2016-05-22 00:00:00', 'shubham', 'entry', 'pr12', '30000.00', '3000.00', '27000.00', 'cash', '', '0000-00-00 00:00:00', 30000, 1, 'PR22'),
(21, 'SD21', 'Tiles Fresh', '', '', 11, '0.00', '1800.00', '1700.00', 121, 110, '2016-05-22 00:00:00', 'shubham', 'sales', 'SD21', '19800.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR23'),
(22, 'SD22', 'Tiles Fresh', '', '', 2, '0.00', '1800.00', '1700.00', 110, 108, '2016-05-22 00:00:00', 'shubham', 'sales', 'SD22', '3600.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR24'),
(23, 'SD23', 'Brush', '', '', 5, '0.00', '100.00', '80.00', 15, 10, '2016-05-22 00:00:00', 'shubham', 'sales', 'SD23', '500.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR25'),
(24, 'SD24', 'Tiles Fresh', '', '', 55, '0.00', '1800.00', '1700.00', 108, 53, '2016-05-22 00:00:00', 'shubham', 'sales', 'SD24', '102850.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR26'),
(25, 'SD25', 'Brush', '', '', 5, '0.00', '100.00', '80.00', 10, 5, '2016-05-22 00:00:00', 'shubham', 'sales', 'SD25', '575.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'PR27');

-- --------------------------------------------------------

--
-- Table structure for table `stock_sales`
--

CREATE TABLE IF NOT EXISTS `stock_sales` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `transactionid` varchar(250) NOT NULL,
  `stock_name` varchar(200) NOT NULL,
  `category` varchar(120) NOT NULL,
  `supplier_name` varchar(200) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(120) NOT NULL,
  `customer_id` varchar(120) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `tax` decimal(10,0) NOT NULL,
  `tax_dis` varchar(100) NOT NULL,
  `dis_amount` decimal(10,0) NOT NULL,
  `grand_total` decimal(10,0) NOT NULL,
  `due` date NOT NULL,
  `mode` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `count1` int(11) NOT NULL,
  `billnumber` varchar(120) NOT NULL,
  `opp` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `stock_sales`
--

INSERT INTO `stock_sales` (`id`, `transactionid`, `stock_name`, `category`, `supplier_name`, `selling_price`, `quantity`, `amount`, `date`, `username`, `customer_id`, `subtotal`, `payment`, `balance`, `discount`, `tax`, `tax_dis`, `dis_amount`, `grand_total`, `due`, `mode`, `description`, `count1`, `billnumber`, `opp`) VALUES
(1, 'SD5', 'Tiles Fresh', '', '', '1800.00', '10.00', '17000.00', '2016-05-15', 'shubham', 'Mohit', '17000.00', '17000.00', '0.00', '0', '0', '', '0', '17000', '2016-05-15', 'cash', '', 1, 'PR7', 0),
(2, 'SD6', 'Tiles Fresh', '', '', '1800.00', '12.00', '20400.00', '2016-05-16', 'shubham', 'Devansh', '20400.00', '20400.00', '0.00', '0', '0', '', '0', '20400', '1969-12-31', 'cash', '', 1, 'PR8', 0),
(3, 'SD8', 'Brush', '', '', '100.00', '15.00', '1200.00', '2016-05-16', 'shubham', 'Mohit', '1140.00', '1140.00', '0.00', '5', '0', '', '60', '1200', '2016-05-17', 'cash', '', 1, 'PR10', 0),
(4, 'SD9', 'Tiles Fresh', '', '', '1800.00', '3.00', '5400.00', '2016-05-19', 'shubham', 'Shubhahsfasf', '5400.00', '5400.00', '0.00', '0', '0', '', '0', '5400', '1969-12-31', 'cash', '', 1, 'PR11', 0),
(5, 'SD10', 'Tiles Fresh', '', '', '1800.00', '23.00', '41400.00', '2016-05-19', 'shubham', 'sfgmfgs', '41400.00', '41400.00', '0.00', '0', '0', '', '0', '41400', '1969-12-31', 'cash', '', 1, 'PR12', 0),
(6, 'SD11', 'Brush', '', '', '100.00', '33.00', '3300.00', '2016-05-19', 'shubham', 'popa', '3300.00', '3300.00', '0.00', '0', '0', '', '0', '3300', '1969-12-31', 'cash', '', 1, 'PR13', 0),
(7, 'SD12', 'Brush', '', '', '100.00', '22.00', '2200.00', '2016-05-19', 'shubham', 'popa', '2200.00', '2200.00', '0.00', '0', '0', '', '0', '2200', '1969-12-31', 'cash', '', 1, 'PR14', 0),
(8, 'SD13', 'Brush', '', '', '100.00', '3.00', '300.00', '2016-05-19', 'shubham', 'Devansh s', '2100.00', '2100.00', '0.00', '0', '0', '', '0', '2100', '1969-12-31', 'cash', '', 1, 'PR15', 0),
(9, 'SD13', 'Tiles Fresh', '', '', '1800.00', '1.00', '1800.00', '2016-05-19', 'shubham', 'Devansh s', '2100.00', '2100.00', '0.00', '0', '0', '', '0', '2100', '1969-12-31', 'cash', '', 2, 'PR15', 0),
(10, 'SD15', 'Brush', '', '', '100.00', '3.00', '240.00', '2016-05-22', 'shubham', 'ymb', '240.00', '240.00', '0.00', '0', '0', '', '0', '240', '1969-12-31', 'cash', '', 1, 'PR17', 0),
(11, 'SD16', 'Brush', '', '', '100.00', '2.00', '200.00', '2016-05-22', 'shubham', 'sagar', '200.00', '200.00', '0.00', '0', '0', '', '0', '200', '1969-12-31', 'cash', '', 1, 'PR18', 0),
(12, 'SD17', 'Brush', '', '', '100.00', '4.00', '400.00', '2016-05-22', 'shubham', 'Shubham', '384.00', '384.00', '0.00', '4', '0', '', '16', '400', '1969-12-31', 'cash', '', 1, 'PR19', 0),
(13, 'SD18', 'Brush', '', '', '100.00', '3.00', '300.00', '2016-05-22', 'shubham', 'Ambuz', '300.00', '300.00', '0.00', '0', '0', '', '0', '300', '1969-12-31', 'cash', '', 1, 'PR20', 0),
(14, 'SD21', 'Tiles Fresh', '', '', '1800.00', '11.00', '19800.00', '2016-05-22', 'shubham', 'Arushhi', '19800.00', '19800.00', '0.00', '0', '0', '', '0', '19800', '2016-05-22', 'cash', '', 1, 'PR23', 0),
(15, 'SD22', 'Tiles Fresh', '', '', '1800.00', '2.00', '3600.00', '2016-05-22', 'shubham', 'Arushhi', '3420.00', '3420.00', '0.00', '20', '0', '15% tax is included', '720', '3600', '1969-12-31', 'cash', '', 1, 'PR24', 0),
(16, 'SD23', 'Brush', '', '', '100.00', '5.00', '500.00', '2016-05-22', 'shubham', 'sagar', '575.00', '575.00', '0.00', '0', '0', '15% tax is included', '0', '500', '1969-12-31', 'cash', '', 1, 'PR25', 0),
(17, 'SD24', 'Tiles Fresh', '', '', '1800.00', '55.00', '93500.00', '2016-05-22', 'shubham', 'Purushart', '102850.00', '102850.00', '0.00', '5', '0', '15% tax is included', '4675', '93500', '2016-05-22', 'cash', '', 1, 'PR26', 0),
(18, 'SD25', 'Brush', '', '', '100.00', '5.00', '500.00', '2016-05-22', 'shubham', 'Arushhi', '575.00', '575.00', '0.00', '0', '10', '15% tax is included', '0', '500', '1969-12-31', 'cash', '', 1, 'PR27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_user`
--

CREATE TABLE IF NOT EXISTS `stock_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `answer` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `stock_user`
--

INSERT INTO `stock_user` (`id`, `username`, `password`, `user_type`, `answer`) VALUES
(1, 'shubham', 'shubham', 'admin', 'awarapan');

-- --------------------------------------------------------

--
-- Table structure for table `store_details`
--

CREATE TABLE IF NOT EXISTS `store_details` (
  `name` varchar(100) NOT NULL,
  `log` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gst` int(100) NOT NULL,
  `pin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_details`
--

INSERT INTO `store_details` (`name`, `log`, `type`, `address`, `place`, `city`, `phone`, `email`, `gst`, `pin`) VALUES
('Super Store', 'posnic.png', 'image/png', 'Delhi', 'Near Special Branch Police', 'New Delhi', '03453552884', 'xyz@yahoo.com', 12346, '60080');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_details`
--

CREATE TABLE IF NOT EXISTS `supplier_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(200) NOT NULL,
  `supplier_address` varchar(500) NOT NULL,
  `supplier_contact1` varchar(100) NOT NULL,
  `supplier_contact2` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gst` int(100) NOT NULL,
  `balance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `supplier_details`
--

INSERT INTO `supplier_details` (`id`, `supplier_name`, `supplier_address`, `supplier_contact1`, `supplier_contact2`, `email`, `gst`, `balance`) VALUES
(6, 'SHubham Sharma', 'Pathankot', '9559039231', '01870232', 'shubhamsharma24@gmail.com', 12342, 0),
(7, 'XYZ', '', '9559039231', '48848944', 'rocj@huhvv.in', 3311221, 0),
(8, 'Mohit G', 'naininfd', '9494948994', '2377837273', 'hanasn@mff.in', 377373, 0),
(9, 'Kulleh Shaha', '', '29492844', '9489494', '', 1213, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `customer` varchar(250) NOT NULL,
  `supplier` varchar(250) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `due` datetime NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rid` varchar(120) NOT NULL,
  `receiptid` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `type`, `customer`, `supplier`, `subtotal`, `payment`, `balance`, `due`, `date`, `rid`, `receiptid`) VALUES
(1, 'sales', 'Mohit ', '', '17000.00', '7000.00', '0.00', '2016-05-15 00:00:00', '2016-05-15 03:48:45', 'SD5', 'RCPT'),
(2, 'sales', 'Mohit ', '', '1140.00', '140.00', '0.00', '2016-05-17 00:00:00', '2016-05-16 12:27:53', 'SD8', 'RCPT1'),
(3, 'sales', 'Arushhi ', '', '19800.00', '9000.00', '800.00', '2016-05-22 00:00:00', '2016-05-22 08:26:51', 'SD21', 'RCPT2'),
(4, 'sales', 'Arushhi ', '', '19800.00', '800.00', '0.00', '2016-05-22 00:00:00', '2016-05-22 09:00:57', 'SD21', 'RCPT3'),
(5, 'sales', 'Purushart ', '', '102850.00', '42850.00', '0.00', '2016-05-22 00:00:00', '2016-05-22 09:15:59', 'SD24', 'RCPT4');

-- --------------------------------------------------------

--
-- Table structure for table `uom_details`
--

CREATE TABLE IF NOT EXISTS `uom_details` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `spec` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `uom_details`
--

INSERT INTO `uom_details` (`id`, `name`, `spec`) VALUES
(0000000006, 'UOM1', 'UOM1 Specification'),
(0000000007, 'UOM2', 'UOM2 Specification'),
(0000000008, 'UOM3', 'UOM3 Specification'),
(0000000009, 'UOM4', 'UOM4 Specification');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
