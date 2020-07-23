-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2019 at 10:43 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: 'salary'
--

-- --------------------------------------------------------

--
-- Table structure for table 'allown_ded_master'
--

DROP TABLE IF EXISTS allown_ded_master;
CREATE TABLE IF NOT EXISTS allown_ded_master (
  a_d_id int(11) NOT NULL AUTO_INCREMENT,
  a_d_name varchar(255) NOT NULL,
  a_d_amt int(11) NOT NULL,
  a_d_cal_type varchar(255) NOT NULL,
  a_d_type varchar(255) NOT NULL,
  PRIMARY KEY (a_d_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'allown_ded_master'
--

INSERT INTO allown_ded_master (a_d_id, a_d_name, a_d_amt, a_d_cal_type, a_d_type) VALUES
(1, 'PF', 15, '%', 'd'),
(2, 'DA', 15, '%', 'a'),
(7, 'MA', 500, '+', 'a');

-- --------------------------------------------------------

--
-- Table structure for table 'designation_master'
--

DROP TABLE IF EXISTS designation_master;
CREATE TABLE IF NOT EXISTS designation_master (
  designation_id int(11) NOT NULL AUTO_INCREMENT,
  designation varchar(255) NOT NULL,
  PRIMARY KEY (designation_id),
  UNIQUE KEY designation_2 (designation),
  KEY designation_id (designation_id),
  KEY designation (designation)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'designation_master'
--

INSERT INTO designation_master (designation_id, designation) VALUES
(4, 'Assit.Teacher'),
(5, 'Gen.Manager'),
(1, 'Soft_Developer'),
(3, 'Team_leader');

-- --------------------------------------------------------

--
-- Table structure for table 'employee_master'
--

DROP TABLE IF EXISTS employee_master;
CREATE TABLE IF NOT EXISTS employee_master (
  emp_id int(11) NOT NULL AUTO_INCREMENT,
  emp_name varchar(255) NOT NULL,
  designation_id varchar(255) NOT NULL,
  emp_email varchar(255) NOT NULL,
  emp_mobile varchar(255) NOT NULL,
  emp_address varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  login_type enum('E','A') NOT NULL,
  PRIMARY KEY (emp_id),
  KEY emp_designation (designation_id),
  KEY emp_designation_2 (designation_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'employee_master'
--

INSERT INTO employee_master (emp_id, emp_name, designation_id, emp_email, emp_mobile, emp_address, password, login_type) VALUES
(1, 'Tirtharaj', '1', 'tirtharaj1998@gmail.com', '9856321475', 'kol', '1234', 'A'),
(2, 'Tejeshwar', '1', 'teju@gmail.com', '9854761213', 'slg', '1234', 'E'),
(3, 'Subhashree', '4', 'sub@gmail.com', '9517536842', 'slg', '1234', 'E'),
(4, 'Raghubir', '5', 'ragh@gmail.com', '9784512311', 'slg', '1234', 'A'),
(6, 'Satadol', '1', 'sat@gmail.com', '9586741238', 'gan', '1234', 'E');

-- --------------------------------------------------------

--
-- Table structure for table 'salary_structure'
--

DROP TABLE IF EXISTS salary_structure;
CREATE TABLE IF NOT EXISTS salary_structure (
  struc_id int(11) NOT NULL AUTO_INCREMENT,
  designation_id int(11) NOT NULL,
  basic_sal varchar(255) NOT NULL,
  agp varchar(255) NOT NULL,
  PRIMARY KEY (struc_id),
  KEY designation_id (designation_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'salary_structure'
--

INSERT INTO salary_structure (struc_id, designation_id, basic_sal, agp) VALUES
(2, 1, '25000', '2000'),
(3, 4, '24000', '1000'),
(4, 5, '100000', '5000'),
(6, 3, '42000', '6000');

-- --------------------------------------------------------

--
-- Table structure for table 'sal_gen'
--

DROP TABLE IF EXISTS sal_gen;
CREATE TABLE IF NOT EXISTS sal_gen (
  sg_id int(11) NOT NULL AUTO_INCREMENT,
  emp_id int(11) NOT NULL,
  sum int(11) NOT NULL,
  sum_div_30 int(11) NOT NULL,
  nodp int(11) NOT NULL,
  workb int(11) NOT NULL,
  allown int(11) NOT NULL,
  ded int(11) NOT NULL,
  g_sal int(11) NOT NULL,
  n_sal int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  month_num int(11) NOT NULL,
  PRIMARY KEY (sg_id),
  KEY emp_id (emp_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'sal_gen'
--

INSERT INTO sal_gen (sg_id, emp_id, sum, sum_div_30, nodp, workb, allown, ded, g_sal, n_sal, month, month_num) VALUES
(1, 1, 27000, 900, 10, 9000, 1850, 1350, 10850, 9500, 'April', 4),
(2, 2, 27000, 900, 10, 9000, 1850, 1350, 10850, 9500, 'April', 4),
(3, 3, 25000, 833, 10, 8330, 1750, 1250, 10080, 8830, 'April', 4),
(4, 4, 105000, 3500, 10, 35000, 5750, 5250, 40750, 35500, 'April', 4),
(5, 1, 27000, 900, 25, 22500, 3875, 3375, 26375, 23000, 'January', 1),
(6, 2, 27000, 900, 25, 22500, 3875, 3375, 26375, 23000, 'January', 1),
(7, 3, 25000, 833, 25, 20825, 3624, 3124, 24449, 21325, 'January', 1),
(8, 4, 105000, 3500, 25, 87500, 13625, 13125, 101125, 88000, 'January', 1),
(9, 1, 27000, 900, 30, 27000, 4550, 4050, 31550, 27500, 'September', 9),
(10, 2, 27000, 900, 30, 27000, 4550, 4050, 31550, 27500, 'September', 9),
(11, 3, 25000, 833, 30, 24990, 4249, 3749, 29239, 25490, 'September', 9),
(12, 4, 105000, 3500, 30, 105000, 16250, 15750, 121250, 105500, 'September', 9),
(13, 6, 27000, 900, 30, 27000, 4550, 4050, 31550, 27500, 'September', 9);

-- --------------------------------------------------------

--
-- Table structure for table 'sal_log'
--

DROP TABLE IF EXISTS sal_log;
CREATE TABLE IF NOT EXISTS sal_log (
  log_id int(11) NOT NULL AUTO_INCREMENT,
  emp_name varchar(255) NOT NULL,
  `date` date NOT NULL,
  log_in varchar(255) NOT NULL,
  log_out varchar(255) NOT NULL,
  emp_entry enum('Y','N') NOT NULL,
  designation_entry enum('Y','N') NOT NULL,
  sal_entry enum('Y','N') NOT NULL,
  sal_gen enum('Y','N') NOT NULL,
  sal_list enum('Y','N') NOT NULL,
  allow_ded enum('Y','N') NOT NULL,
  log enum('Y','N') NOT NULL,
  PRIMARY KEY (log_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'sal_log'
--

INSERT INTO sal_log (log_id, emp_name, date, log_in, log_out, emp_entry, designation_entry, sal_entry, sal_gen, sal_list, allow_ded, log) VALUES
(1, 'Tirtharaj', '2019-05-06', '03:16:28pm', '03:25:41pm', 'N', 'Y', 'N', 'N', 'N', 'Y', 'N'),
(2, 'Tejeshwar', '2019-05-06', '03:26:17pm', '03:26:25pm', 'N', 'N', 'N', 'N', 'Y', 'N', 'N'),
(3, 'Tirtharaj', '2019-05-06', '03:26:40pm', '03:27:05pm', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N'),
(4, 'Tirtharaj', '2019-05-06', '05:41:42pm', '05:46:29pm', 'N', 'N', 'N', 'N', 'Y', 'Y', 'N'),
(10, 'Tirtharaj', '2019-05-06', '07:24:21pm', '07:24:52pm', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'N'),
(9, 'Tirtharaj', '2019-05-06', '05:51:46pm', '07:24:09pm', 'N', 'N', 'N', 'N', 'N', 'N', 'Y'),
(8, 'Tirtharaj', '2019-05-06', '05:51:28pm', '05:51:39pm', 'N', 'N', 'N', 'N', 'N', 'N', 'Y'),
(11, 'Tirtharaj', '2019-05-06', '07:25:03pm', '07:26:03pm', 'N', 'N', 'N', 'N', 'N', 'N', 'Y'),
(12, 'Tirtharaj', '2019-05-09', '12:08:30pm', '12:09:07pm', 'Y', 'N', 'N', 'N', 'N', 'N', 'N'),
(13, 'Tirtharaj', '2019-05-09', '12:09:31pm', '07:25:54pm', 'Y', 'Y', 'Y', 'N', 'Y', 'Y', 'Y'),
(14, 'Tejeshwar', '2019-05-09', '07:26:04pm', '08:18:33pm', 'N', 'N', 'N', 'N', 'Y', 'N', 'N');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
