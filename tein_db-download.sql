-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2015 at 11:30 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tein_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `institutes_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `institutes_id`, `username`, `password`, `email`) VALUES
(1, 1, 'admintu', 'ba990e75b54b0849f9c6931462cae6b0', 'admintu@gmail.com'),
(2, 2, 'adminot', '93a1ededef49acba72bf5d8cb61b8f42', 'ot.clement@gmail.com'),
(3, 3, 'admincape', '37b0a81a3757e3fcb38412a42cf11a13', 'ot.clement@gmail.com'),
(4, 5, 'adminknust', 'e91d1d7557ae54460210f09e7288eb45', 'ot.clement@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `card_tb`
--

CREATE TABLE IF NOT EXISTS `card_tb` (
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `institutes_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `card_tb`
--

INSERT INTO `card_tb` (`card_id`, `institutes_id`, `admin_id`, `member_id`, `amount`) VALUES
(3, 2, 2, 44, 12),
(4, 2, 2, 34, 12);

-- --------------------------------------------------------

--
-- Table structure for table `dues_tb`
--

CREATE TABLE IF NOT EXISTS `dues_tb` (
  `dues_id` int(11) NOT NULL AUTO_INCREMENT,
  `institutes_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`dues_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `dues_tb`
--

INSERT INTO `dues_tb` (`dues_id`, `institutes_id`, `admin_id`, `member_id`, `amount`) VALUES
(18, 2, 2, 66, 5),
(19, 2, 2, 69, 5);

-- --------------------------------------------------------

--
-- Table structure for table `institutes_tb`
--

CREATE TABLE IF NOT EXISTS `institutes_tb` (
  `institutes_id` int(11) NOT NULL AUTO_INCREMENT,
  `institute_name` varchar(255) NOT NULL,
  `tertiary` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `institute_logo` varchar(255) NOT NULL,
  `date_registered` datetime NOT NULL,
  PRIMARY KEY (`institutes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `institutes_tb`
--

INSERT INTO `institutes_tb` (`institutes_id`, `institute_name`, `tertiary`, `region`, `city`, `institute_logo`, `date_registered`) VALUES
(1, 'University Of Ghana', 'University', 'Areater-accra', 'Accra', '../images/inst_logo/4524548_68_b.jpg', '2015-09-08 03:09:47'),
(2, 'Kumasi Polytechnic', 'Polytechnic', 'Ashanti', 'kumasi', '../images/inst_logo/Kumasi-Polytechnic.jpg', '2015-09-08 03:11:02'),
(3, 'University Of Cape Coast', 'University', 'Central', 'Cape Cost', '../images/inst_logo/img1822015_223231.jpg', '2015-09-10 09:14:12'),
(5, 'Kwame Nkrumah University Of Science &amp; Technology', 'University', 'Ashanti', 'kumasi', '../images/inst_logo/logo.png', '2015-09-15 04:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `members_tb`
--

CREATE TABLE IF NOT EXISTS `members_tb` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `institutes_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `constituency` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date_registerd` varchar(255) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `members_tb`
--

INSERT INTO `members_tb` (`member_id`, `institutes_id`, `admin_id`, `student_number`, `surname`, `first_name`, `last_name`, `date_of_birth`, `level`, `department`, `constituency`, `region`, `phone_number`, `email`, `picture`, `date_registerd`) VALUES
(47, 2, 2, '051301310', 'Osei tutu', 'Clement', '', '17/09/2015', 2, 'Electrical Engineering', 'kumasi', 'Ashanti', '0263307997', 'ot.clement@gmail.com', '../images/profile/WP_20150216_09_56_11_Selfie.jpg', '2015-09-20 14:43:31'),
(48, 2, 2, '051301310', 'Osei tutu', 'Clement', '', '17/09/2015', 2, 'Electrical Engineering', 'kumasi', 'Ashanti', '0263307997', 'ot.clement@gmail.com', '../images/profile/WP_20150216_09_56_11_Selfie.jpg', '2015-09-20 14:43:39'),
(49, 2, 2, '051301310', 'Osei tutu', 'Clement', '', '17/09/2015', 2, 'Electrical Engineering', 'kumasi', 'Ashanti', '0263307997', 'ot.clement@gmail.com', '../images/profile/WP_20150216_09_56_11_Selfie.jpg', '2015-09-20 14:43:43'),
(50, 2, 2, '051301310', 'Osei tutu', 'Clement', '', '17/09/2015', 2, 'Electrical Engineering', 'kumasi', 'Ashanti', '0263307997', 'ot.clement@gmail.com', '../images/profile/WP_20150216_09_56_11_Selfie.jpg', '2015-09-20 14:43:47'),
(51, 2, 2, '051301310', 'Osei tutu', 'Clement', '', '17/09/2015', 2, 'Electrical Engineering', 'kumasi', 'Ashanti', '0263307997', 'ot.clement@gmail.com', '../images/profile/WP_20150216_09_56_11_Selfie.jpg', '2015-09-20 14:43:50'),
(52, 2, 2, '0363837388', 'Appiah', 'Wise', '', '17/09/2015', 2, 'northen', 'Ahafo', 'Ashanti', '0263307997', 'admintu@gmail.com', '../images/profile/', '2015-09-20 14:45:12'),
(53, 2, 2, '0363837388', 'Appiah', 'Wise', '', '17/09/2015', 2, 'northen', 'Ahafo', 'Ashanti', '0263307997', 'admintu@gmail.com', '../images/profile/', '2015-09-20 14:45:16'),
(54, 2, 2, '0363837388', 'Appiah', 'Wise', '', '17/09/2015', 2, 'northen', 'Ahafo', 'Ashanti', '0263307997', 'admintu@gmail.com', '../images/profile/', '2015-09-20 14:45:20'),
(55, 2, 2, '0363837388', 'Appiah', 'Wise', '', '17/09/2015', 2, 'northen', 'Ahafo', 'Ashanti', '0263307997', 'admintu@gmail.com', '../images/profile/', '2015-09-20 14:45:23'),
(56, 2, 2, '0363837388', 'Appiah', 'Wise', '', '17/09/2015', 2, 'northen', 'Ahafo', 'Ashanti', '0263307997', 'admintu@gmail.com', '../images/profile/', '2015-09-20 14:45:29'),
(57, 2, 2, '0363837388', 'Appiah', 'Wise', '', '17/09/2015', 2, 'northen', 'Ahafo', 'Ashanti', '0263307997', 'admintu@gmail.com', '../images/profile/', '2015-09-20 14:45:33'),
(58, 2, 2, '051301312', 'Amponsem', 'Stephen', '', '25/09/2015', 1, 'bolgatanga', 'Obuasi', 'Ashanti', '0263307997', 'admin@gmail.com', '../images/profile/', '2015-09-20 14:46:52'),
(59, 2, 2, '051301312', 'Amponsem', 'Stephen', '', '25/09/2015', 1, 'bolgatanga', 'Obuasi', 'Ashanti', '0263307997', 'admin@gmail.com', '../images/profile/', '2015-09-20 14:46:56'),
(60, 2, 2, '051301312', 'Amponsem', 'Stephen', '', '25/09/2015', 1, 'bolgatanga', 'Obuasi', 'Ashanti', '0263307997', 'admin@gmail.com', '../images/profile/', '2015-09-20 14:47:00'),
(61, 2, 2, '051301312', 'Amponsem', 'Stephen', '', '25/09/2015', 1, 'bolgatanga', 'Obuasi', 'Ashanti', '0263307997', 'admin@gmail.com', '../images/profile/', '2015-09-20 14:47:03'),
(62, 2, 2, '051301312', 'Amponsem', 'Stephen', '', '25/09/2015', 1, 'bolgatanga', 'Obuasi', 'Ashanti', '0263307997', 'admin@gmail.com', '../images/profile/', '2015-09-20 14:47:05'),
(63, 2, 2, '051301312', 'Amponsem', 'Stephen', '', '25/09/2015', 1, 'bolgatanga', 'Obuasi', 'Ashanti', '0263307997', 'admin@gmail.com', '../images/profile/', '2015-09-20 14:47:09'),
(64, 2, 2, '051301312', 'Amponsem', 'Stephen', '', '25/09/2015', 1, 'bolgatanga', 'Obuasi', 'Ashanti', '0263307997', 'admin@gmail.com', '../images/profile/', '2015-09-20 14:47:14'),
(65, 2, 2, '051301313', 'Osei', 'Gifty', '', '07/01/2014', 3, 'western', 'Accra', 'Greater Accra', '0263307997', 'ot.clement@gmail.com', '../images/profile/user5-128x128.jpg', '2015-09-20 14:49:19'),
(66, 2, 2, '051301314', 'Osei', 'Prince', '', '07/01/2014', 3, 'Electrical Engineering', 'Accra', 'Greater Accra', '0263307997', 'ot.clement@gmail.com', '../images/profile/user6-128x128.jpg', '2015-09-20 14:50:16'),
(67, 2, 2, '051301314', 'Joseph', 'Aboagye', '', '07/01/2014', 4, 'Computer Science', 'Accra', 'Ashanti', '0263307997', 'ot.clement@gmail.com', '../images/profile/WP_20150216_09_56_11_Selfie.jpg', '2015-09-20 14:51:11'),
(68, 2, 2, '051301315', 'Joseph', 'Sharaf', '', '07/01/2014', 3, 'Electrical Engineering', 'Accra', 'Greater Accra', '0263307997', 'ot.clement@gmail.com', '../images/profile/PRESIDENT-edietd.jpg', '2015-09-20 14:53:05'),
(69, 2, 2, '051301316', 'Joseph', 'Joyce', '', '07/01/2014', 1, 'northen', 'Accra', 'Central', '0263307997', 'ot.clement@gmail.com', '../images/profile/user4-128x128.jpg', '2015-09-20 14:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `news_tb`
--

CREATE TABLE IF NOT EXISTS `news_tb` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_image` varchar(225) NOT NULL,
  `news_title` varchar(225) NOT NULL,
  `news_body` text NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `news_tb`
--

INSERT INTO `news_tb` (`news_id`, `news_image`, `news_title`, `news_body`) VALUES
(1, '../images/news_image/8.jpg', 'Agender 2016', 'TEIN! NDC money from your account to another account in a very fast and accurate way at. Our technologies also allows you to track down all your history.  \r\n                      '),
(2, '../images/news_image/1c.png', 'National Election 2016', ' TEIN! NDC money from your account to another account in a very fast and accurate way at. Our technologies also allows you to track down all your history.\r\n                      '),
(3, '../images/news_image/1b.png', 'President John Mahama For 2016', 'Sort your bills and school fees online, imagine that. We take all the hustle away. You will never have to queue again.Our partners include KenyaPower, Multichoice, NairobiWater  \r\n                      '),
(4, '../images/news_image/facebook_icon.png', 'District Assembly Election', ' Make a payment in exchange for goods and services without sharing your financial information with the seller. It''s simple, faster and more secure. \r\n                      '),
(5, '../images/news_image/whatup_icon.png', 'Operation 1,000 Votes in Ashanti Region', 'Convert your savings from one currency to another. No hustle! No brokers, No agents. Currency conversion fees may apply.  \r\n                      '),
(6, '../images/news_image/photo2.png', '   Operation 1,000 Votes in Ashanti Region   ', ' \r\n                        Convert your savings from one currency to another. No hustle! No brokers, No agents. Currency conversion fees may apply.  \r\n \r\n                        Convert your savings from one currency to another. No hustle! No brokers, No agents. Currency conversion fees may apply\r\n \r\n                        Convert your savings from one currency to another. No hustle! No brokers, No agents. Currency conversion fees may apply\r\n \r\n                        Convert your savings from one currency to another. No hustle! No brokers, No agents. Currency conversion fees may apply\r\n                                                                                        ');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `name`, `email`, `logo`) VALUES
(1, 'naa', 'ot.clement@gmail.com', 'images/2812940_orig.jpg'),
(2, 'ot', 'ot.clement@gmail.com', 'images/4524548_68_b.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
