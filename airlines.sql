-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2015 at 01:13 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airlines`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE IF NOT EXISTS `booking_details` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(50) NOT NULL,
  `b_fid` varchar(5) NOT NULL,
  `b_phno` varchar(15) NOT NULL,
  `b_mail` varchar(50) NOT NULL,
  `b_add` varchar(100) NOT NULL,
  `b_price` varchar(10) NOT NULL,
  `b_child` varchar(3) NOT NULL,
  `b_adults` varchar(3) NOT NULL,
  `b_total` varchar(3) NOT NULL,
  `b_status` varchar(10) NOT NULL,
  `b_pnr` varchar(20) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`b_id`, `b_name`, `b_fid`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`) VALUES
(17, 'Rejaul Islam', '106', '0193082294', 'rejaul_cse12@yahoo.com', 'cuet', '4500', '0', '1', '1', 'CANCELLED', '02460312092015'),
(18, 'Rejaul Islam', '106', '0193082294', 'rejaul_cse12@yahoo.com', 'cuet', '5500', '0', '1', '1', 'Booked', '15332114092015');

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE IF NOT EXISTS `booking_status` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(30) NOT NULL,
  `flight_path` varchar(30) NOT NULL,
  `ammount` varchar(30) NOT NULL,
  `payment_num` varchar(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `pnr` varchar(30) NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `booking_status`
--

INSERT INTO `booking_status` (`book_id`, `customer_name`, `flight_path`, `ammount`, `payment_num`, `status`, `pnr`) VALUES
(14, 'reza', 'Oneway', '3333', '7657765', 'CANCELLED', '02313512092015'),
(15, 'reza', 'Oneway', '3333', '7657765', 'CANCELLED', '02343812092015'),
(16, 'gjhg', 'Oneway', '33334', '7657765443', 'CANCELLED', '02353212092015'),
(17, 'gjhg', 'Oneway', '3333', '76577622', 'CANCELLED', '02460312092015'),
(18, 'reza', 'Oneway', '3333', '7657765443', 'Booked', '15332114092015');

-- --------------------------------------------------------

--
-- Table structure for table `flight_search`
--

CREATE TABLE IF NOT EXISTS `flight_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fno` varchar(10) NOT NULL,
  `from_city` varchar(20) NOT NULL,
  `to_city` varchar(20) NOT NULL,
  `departure_date` varchar(20) NOT NULL,
  `arrival_date` varchar(20) NOT NULL,
  `departure_time` varchar(20) NOT NULL,
  `arrival_time` varchar(20) NOT NULL,
  `e_seats_left` int(3) NOT NULL DEFAULT '20',
  `b_seats_left` int(3) NOT NULL DEFAULT '10',
  `e_price` int(5) NOT NULL,
  `b_price` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `flight_search`
--

INSERT INTO `flight_search` (`id`, `fno`, `from_city`, `to_city`, `departure_date`, `arrival_date`, `departure_time`, `arrival_time`, `e_seats_left`, `b_seats_left`, `e_price`, `b_price`) VALUES
(6, 'XXX', 'CTG', 'CXB', '01-09-2015', '02-09-2015', '09:00', '12:00', 0, 10, 3000, 3500),
(7, 'wow', 'CXB', 'CTG', '02-09-2015', '02-09-2015', '09:00', '12:00', -4, 10, 3000, 3500),
(8, 'abal', 'CTG', 'CXB', '06-09-2015', '07-09-2015', '09:00', '12:00', 13, 43, 2131, 3442),
(10, 'xcol', 'CXB', 'CTG', '07-09-2015', '07-09-2015', '09:00', '12:00', 14, 423, 23433, 2333),
(11, 'S3-MINI', 'CTG', 'CXB', '10-09-2015', '11-09-2015', '09:00', '09:00', -15, 20, 4000, 4000),
(12, 'S-2 R3', 'CXB', 'CTG', '11-09-2015', '11-09-2015', '09:00', '09:00', 29, 43, 5000, 5500),
(13, 'S-2 R3', 'CTG', 'BAR', '16-09-2015', '17-09-2015', '12:00', '03:00', 29, 33, 4000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `flight_users`
--

CREATE TABLE IF NOT EXISTS `flight_users` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_fname` varchar(20) NOT NULL,
  `f_lname` varchar(20) NOT NULL,
  `f_sex` varchar(10) NOT NULL,
  `f_uname` varchar(32) NOT NULL,
  `f_password` varchar(32) NOT NULL,
  `f_mailid` varchar(100) NOT NULL,
  `f_mailcode` varchar(100) NOT NULL,
  `f_active` int(11) NOT NULL,
  `f_regdate` datetime NOT NULL,
  `f_passrec` int(11) NOT NULL,
  `f_address` varchar(500) NOT NULL,
  `f_phone` varchar(10) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `flight_users`
--

INSERT INTO `flight_users` (`f_id`, `f_fname`, `f_lname`, `f_sex`, `f_uname`, `f_password`, `f_mailid`, `f_mailcode`, `f_active`, `f_regdate`, `f_passrec`, `f_address`, `f_phone`) VALUES
(106, 'Rejaul', 'Islam', 'male', 'admina', 'e10adc3949ba59abbe56e057f20f883e', 'rejaul_cse12@yahoo.com', '25e1680500c40a501617e65c245c5f08', 1, '2015-08-30 20:26:01', 0, 'cuet', '0193082294');

-- --------------------------------------------------------

--
-- Table structure for table `passenger_details`
--

CREATE TABLE IF NOT EXISTS `passenger_details` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_pnr` varchar(25) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_age` varchar(3) NOT NULL,
  `p_sex` varchar(10) NOT NULL,
  `p_fno` varchar(10) NOT NULL,
  `p_from` varchar(10) NOT NULL,
  `p_to` varchar(10) NOT NULL,
  `p_dedate` varchar(20) NOT NULL,
  `p_ardate` varchar(20) NOT NULL,
  `p_detime` varchar(20) NOT NULL,
  `p_artime` varchar(20) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  `p_class` varchar(10) NOT NULL,
  `p_passtype` varchar(1) NOT NULL,
  `p_fid` varchar(5) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `passenger_details`
--

INSERT INTO `passenger_details` (`p_id`, `p_pnr`, `p_name`, `p_age`, `p_sex`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_status`, `p_class`, `p_passtype`, `p_fid`) VALUES
(1, '15332114092015', 'reza', 'M', '55', 'S3-MINI', 'CTG', 'CXB', '10-09-2015', '11-09-2015', '09:00', '09:00', 'Booked', 'Business', 'A', '106');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
