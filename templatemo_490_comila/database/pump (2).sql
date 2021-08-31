-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2021 at 03:25 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pump`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_pump_db`
--

CREATE TABLE IF NOT EXISTS `add_pump_db` (
  `pump_id` varchar(11) NOT NULL,
  `franchise_name` text NOT NULL,
  `email` text NOT NULL,
  `street` text NOT NULL,
  `district` text NOT NULL,
  `state` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `long` text NOT NULL,
  `lat` text NOT NULL,
  `phno` text NOT NULL,
  `status` int(11) NOT NULL,
  `lic_status` int(11) NOT NULL,
  `acno` text NOT NULL,
  `branch` text NOT NULL,
  `balance` text NOT NULL,
  PRIMARY KEY (`pump_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_pump_db`
--

INSERT INTO `add_pump_db` (`pump_id`, `franchise_name`, `email`, `street`, `district`, `state`, `pincode`, `long`, `lat`, `phno`, `status`, `lic_status`, `acno`, `branch`, `balance`) VALUES
('655', 'sjpump', 'sj@gmail.com', 'Thattamala', 'Kollam', 'Kerala', 691020, '76.643639', '8.868936', '2147483647', 1, 1, '6565677', 'SBI,Kollam', '2000'),
('660', 'abc pump', 'abc@gmail.com', 'ayathil', 'kollam', 'kerala', 691020, '76.614143', ' 8.893212', '9895391005', 1, 1, '65678789', 'SBI kollam', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `censor_db`
--

CREATE TABLE IF NOT EXISTS `censor_db` (
  `cen_id` int(10) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `pump_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`cen_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `censor_db`
--


-- --------------------------------------------------------

--
-- Table structure for table `emp_appoint`
--

CREATE TABLE IF NOT EXISTS `emp_appoint` (
  `emp_id` int(11) NOT NULL,
  `pump_id` int(11) NOT NULL,
  `machine_id` text NOT NULL,
  `qual_pic` varchar(50) NOT NULL,
  `req_send` int(11) NOT NULL,
  `approve_status` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_appoint`
--

INSERT INTO `emp_appoint` (`emp_id`, `pump_id`, `machine_id`, `qual_pic`, `req_send`, `approve_status`, `active`) VALUES
(200, 100, '001', '5eb9c879308254.89254798.png', 1, 1, 1),
(17, 655, '', '60e9aea34017c8.86312107.png', 1, 1, 1),
(205, 655, '0', '60ea560b4ebdd5.61648237.png', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `emp_reg`
--

CREATE TABLE IF NOT EXISTS `emp_reg` (
  `emp_name` text NOT NULL,
  `emp_id` bigint(20) NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `qual` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `phno` text NOT NULL,
  `qual_status` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_reg`
--

INSERT INTO `emp_reg` (`emp_name`, `emp_id`, `gender`, `dob`, `qual`, `address`, `email`, `phno`, `qual_status`) VALUES
('arjun', 200, 'male', '2020-03-15', '12', 'sdjbvsbvjwdbjbsdjlbj', 'nddjc@gmail.com', '7478477258', 1),
('anoop sheeja', 17, 'male', '1999-12-15', '12', 'whsoivshoi', 'sjab@gmail.com', '7897889787', 1),
('akshay', 205, 'male', '2000-06-11', '10', 'Mayyanad,Kollam', 'akshay@gmail.com', '9897654312', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_db`
--

CREATE TABLE IF NOT EXISTS `feedback_db` (
  `u_id` int(11) NOT NULL,
  `descrip` text NOT NULL,
  `reply` text NOT NULL,
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feedback_db`
--

INSERT INTO `feedback_db` (`u_id`, `descrip`, `reply`, `fid`) VALUES
(155, 'Nice Site', 'Thank you', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_at_pump`
--

CREATE TABLE IF NOT EXISTS `fuel_at_pump` (
  `pump_id` int(11) NOT NULL,
  `fuel_id` text NOT NULL,
  `ltr` float NOT NULL,
  KEY `pump_id` (`pump_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuel_at_pump`
--

INSERT INTO `fuel_at_pump` (`pump_id`, `fuel_id`, `ltr`) VALUES
(300, 'd1', 1100),
(100, 'p1', 10.9651),
(100, 'd1', 6.52175),
(224, 'p1', 500),
(655, 'p1', 57.5);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_db`
--

CREATE TABLE IF NOT EXISTS `fuel_db` (
  `fuel_id` text NOT NULL,
  `name` text NOT NULL,
  `rate/ltr` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuel_db`
--

INSERT INTO `fuel_db` (`fuel_id`, `name`, `rate/ltr`) VALUES
('p1', 'petrol', 80),
('p2', 'premium petrol', 85),
('d1', 'diesel', 70),
('d2', 'premium diesel', 75);

-- --------------------------------------------------------

--
-- Table structure for table `login_pump`
--

CREATE TABLE IF NOT EXISTS `login_pump` (
  `id` text NOT NULL,
  `name` text NOT NULL,
  `pass` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `status` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_pump`
--

INSERT INTO `login_pump` (`id`, `name`, `pass`, `status`, `type`) VALUES
('200', 'arjun', 'arjun', 1, 'employee'),
('1', 'admin1', 'admin', 1, 'admin'),
('160', 'sanish', 'san', 1, 'user'),
('205', 'akshay', 'akku', 1, 'employee'),
('17', 'anoop sheeja', 'anoop17', 1, 'employee'),
('660', 'abc pump', 'abc', 1, 'pump'),
('155', 'JIJO', 'abcd', 1, 'user'),
('655', 'sjpump', 'sj', 1, 'pump');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(655, 'sjpump', 'Thattamala', 8.868936, 76.643639, '');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_fuel`
--

CREATE TABLE IF NOT EXISTS `ordered_fuel` (
  `order_id` int(11) NOT NULL,
  `us_id` text NOT NULL,
  `pump_id` text NOT NULL,
  `emp_id` text NOT NULL,
  `fuel_id` text NOT NULL,
  `date` date NOT NULL,
  `adv_amt` float NOT NULL,
  `total` float NOT NULL,
  `qty` float NOT NULL,
  `long1` varchar(150) NOT NULL,
  `lat` varchar(150) NOT NULL,
  `status_d` int(11) NOT NULL,
  `status_p` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered_fuel`
--

INSERT INTO `ordered_fuel` (`order_id`, `us_id`, `pump_id`, `emp_id`, `fuel_id`, `date`, `adv_amt`, `total`, `qty`, `long1`, `lat`, `status_d`, `status_p`) VALUES
(501, '155', '655', '17', 'p1', '2020-06-27', 500, 1000, 12.5, '0', '0', 1, 2),
(502, '155', '655', '17', 'p1', '2021-07-10', 250, 500, 6.25, '76.643639', '8.868936', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

CREATE TABLE IF NOT EXISTS `profile_pic` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `picture` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_pic`
--

INSERT INTO `profile_pic` (`id`, `type`, `picture`) VALUES
(800, 'pump', 'P00800.jpg'),
(200, 'employee', '5eb5842bbe6061.37929121.jpg'),
(43, 'user', 'U0043.jpg'),
(24, 'pump', 'mini_logo.png'),
(17, 'employee', 'mini_logo.png'),
(205, 'employee', 'mini_logo.png'),
(210, 'employee', 'mini_logo.png'),
(215, 'employee', 'mini_logo.png'),
(155, 'user', 'U00155.jpg'),
(220, 'employee', 'mini_logo.png'),
(655, 'pump', 'mini_logo.png'),
(160, 'user', 'mini_logo.png'),
(660, 'pump', 'mini_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `pump_license`
--

CREATE TABLE IF NOT EXISTS `pump_license` (
  `lic_no` text NOT NULL,
  `pump_id` text NOT NULL,
  `franchise` text NOT NULL,
  `lic_image` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pump_license`
--

INSERT INTO `pump_license` (`lic_no`, `pump_id`, `franchise`, `lic_image`) VALUES
('lic123789', '24', 'indian oil', '5efaf0c2d8fd27.74968073.jpg'),
('656787899', '655', 'sjpump', '60e8f08f312e15.49839158.png'),
('65767', '660', 'abc pump', '60ea5d8a522227.16723562.png');

-- --------------------------------------------------------

--
-- Table structure for table `pump_machine`
--

CREATE TABLE IF NOT EXISTS `pump_machine` (
  `machine_id` text NOT NULL,
  `pump_id` text NOT NULL,
  `emp_id` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pump_machine`
--

INSERT INTO `pump_machine` (`machine_id`, `pump_id`, `emp_id`) VALUES
('001', '224', '0'),
('65', '650', '200'),
('56', '655', '0');

-- --------------------------------------------------------

--
-- Table structure for table `timerecord`
--

CREATE TABLE IF NOT EXISTS `timerecord` (
  `userid` tinytext NOT NULL,
  `recordtime` tinytext NOT NULL,
  `userrole` tinytext NOT NULL,
  `times` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timerecord`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE IF NOT EXISTS `user_reg` (
  `usname` text NOT NULL,
  `us_id` int(11) NOT NULL,
  `phno` text NOT NULL,
  `balance` text NOT NULL,
  `acno` text NOT NULL,
  `branchname` text NOT NULL,
  PRIMARY KEY (`us_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`usname`, `us_id`, `phno`, `balance`, `acno`, `branchname`) VALUES
('JIJO', 155, '8547764104', '4750', '4345656', 'Canera bank,Thattamala'),
('sanish', 160, '8547764104', '5000', '6878', 'SBI,ANCHAL');
