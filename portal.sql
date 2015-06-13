-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2015 at 12:43 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `semester` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `stu_co_id` int(11) NOT NULL,
  PRIMARY KEY (`semester`,`stu_co_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `phd_comp`
--

CREATE TABLE IF NOT EXISTS `phd_comp` (
  `supervisor_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `stud_report` tinyint(1) NOT NULL,
  `comp_grade` int(11) NOT NULL,
  `fac_report` tinyint(1) NOT NULL,
  PRIMARY KEY (`supervisor_id`,`stud_id`),
  KEY `supervisor_id` (`supervisor_id`),
  KEY `supervisor_id_2` (`supervisor_id`),
  KEY `supervisor_id_3` (`supervisor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rps`
--

CREATE TABLE IF NOT EXISTS `rps` (
  `rps_semester` int(11) NOT NULL,
  `comm_super` int(11) NOT NULL,
  `members` text NOT NULL,
  `s_rps_id` int(11) NOT NULL,
  `s_report` tinyint(1) NOT NULL,
  PRIMARY KEY (`comm_super`,`s_rps_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `synopsis` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `synopsis`, `name`) VALUES
(1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `synopsis`
--

CREATE TABLE IF NOT EXISTS `synopsis` (
  `syn_std_id` int(11) NOT NULL,
  `syn_super_id` int(11) NOT NULL,
  `syn_stud_rep` tinyint(1) NOT NULL,
  `syn_members` text NOT NULL,
  `syn_com_rep` tinyint(1) NOT NULL,
  PRIMARY KEY (`syn_std_id`,`syn_super_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` enum('admin','faculty','student','') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
