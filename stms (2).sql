-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2020 at 05:21 PM
-- Server version: 5.7.26
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stms`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

DROP TABLE IF EXISTS `academic_year`;
CREATE TABLE IF NOT EXISTS `academic_year` (
  `sbcode` varchar(20) NOT NULL,
  `lc_code` int(20) NOT NULL,
  `year` year(4) NOT NULL,
  `hours` time NOT NULL,
  PRIMARY KEY (`sbcode`,`lc_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attandance_table`
--

DROP TABLE IF EXISTS `attandance_table`;
CREATE TABLE IF NOT EXISTS `attandance_table` (
  `att_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_index_number` varchar(40) NOT NULL,
  `sub_code` int(11) NOT NULL,
  `lec_code` int(11) NOT NULL,
  `dcode` varchar(20) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `cur_date` varchar(20) NOT NULL,
  `cur_time` varchar(20) NOT NULL,
  `attandance` varchar(40) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`att_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attandance_table`
--

INSERT INTO `attandance_table` (`att_id`, `st_index_number`, `sub_code`, `lec_code`, `dcode`, `cid`, `cur_date`, `cur_time`, `attandance`, `status`) VALUES
(1, 'TAN/AC/2017/F/0014', 1102, 2, '', '', '23-02-2020', '23:37:20', 'Present', '1'),
(2, 'TAN/AC/2017/F/0014', 1101, 1, '', '', '01-04-2020', '11:10:24', 'Present', '1'),
(3, 'TAN/AC/2017/F/0014', 1101, 1, '', '', '01-04-2020', '11:12:25', 'Present', '1'),
(4, 'TAN/AC/2017/F/0003', 1102, 10, '4', '12', '01-04-2020', '11:33:08', 'Present', '1'),
(5, 'TAN/AC/2017/F/0009', 1101, 1, '4', '11', '01-04-2020', '11:36:37', 'Present', '1'),
(6, 'TAN/AC/2017/F/0014', 1101, 1, '4', '11', '01-04-2020', '11:37:13', 'Present', '1'),
(7, 'TAN/AC/2017/F/0017', 1101, 1, '4', '11', '01-04-2020', '11:37:31', 'Present', '1'),
(8, 'TAN/EN/2017/F/0042', 1101, 1, '5', '11', '01-04-2020', '11:38:03', 'Present', '1');

-- --------------------------------------------------------

--
-- Table structure for table `attempt_table`
--

DROP TABLE IF EXISTS `attempt_table`;
CREATE TABLE IF NOT EXISTS `attempt_table` (
  `st_index_number` varchar(20) NOT NULL,
  `sbcode` varchar(20) NOT NULL,
  `attempt` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  PRIMARY KEY (`st_index_number`,`sbcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_table`
--

DROP TABLE IF EXISTS `course_table`;
CREATE TABLE IF NOT EXISTS `course_table` (
  `cid` varchar(20) NOT NULL,
  `cname` varchar(60) NOT NULL,
  `cdescription` text NOT NULL,
  `cstatus` int(11) NOT NULL,
  `dcode` varchar(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_table`
--

INSERT INTO `course_table` (`cid`, `cname`, `cdescription`, `cstatus`, `dcode`) VALUES
('D1', 'CIS', 'Computing and Information Systems', 1, 'F1'),
('D2', 'FST', 'Food science and Technology', 1, 'F1'),
('D3', 'PST', 'Physical Science and Technology', 1, 'F1'),
('D4', 'NR', 'Natural Resources', 1, 'F1'),
('D5', 'SM/PE', 'Sport Science Managment and Physical Education	', 1, 'F1');

-- --------------------------------------------------------

--
-- Table structure for table `department_table`
--

DROP TABLE IF EXISTS `department_table`;
CREATE TABLE IF NOT EXISTS `department_table` (
  `dcode` varchar(20) NOT NULL,
  `dname` varchar(60) NOT NULL,
  `ddescription` text NOT NULL,
  `dstatus` int(11) NOT NULL,
  PRIMARY KEY (`dcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_table`
--

INSERT INTO `department_table` (`dcode`, `dname`, `ddescription`, `dstatus`) VALUES
('D6', 'Medical ', '', 1),
('F1', 'Applied Sciences', '', 1),
('F2', 'Managment Studies', '', 1),
('F3', 'Social Sciences and Languages', '', 1),
('F4', 'Geomatical Sciences', '', 1),
('F5', 'Agricultural Sciences', '', 1),
('F7', 'Technology', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_table`
--

DROP TABLE IF EXISTS `lecturer_table`;
CREATE TABLE IF NOT EXISTS `lecturer_table` (
  `lc_code` varchar(20) NOT NULL,
  `lc_name` varchar(60) NOT NULL,
  `lc_description` text NOT NULL,
  `lc_email` varchar(100) NOT NULL,
  `lc_type` varchar(60) NOT NULL,
  `lc_status` int(11) NOT NULL,
  PRIMARY KEY (`lc_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer_table`
--

INSERT INTO `lecturer_table` (`lc_code`, `lc_name`, `lc_description`, `lc_email`, `lc_type`, `lc_status`) VALUES
('L1', 'Kumara', 'CIS', 'kumara@gmail.com', 'P', 1),
('L2', 'Kalinga', 'CIS', 'kalinga@gmail.com', 'P', 1),
('L3', 'Anurada', 'CIS', 'anurada@gmail.com', 'P', 1),
('L4', 'Dangalla', 'CIS', 'dangalla@gmail.com', 'P', 1),
('L5', 'Pumi', 'CIS', 'pumi@gmail.com', 'P', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lecture_table`
--

DROP TABLE IF EXISTS `lecture_table`;
CREATE TABLE IF NOT EXISTS `lecture_table` (
  `lid` varchar(20) NOT NULL,
  `ldate` date NOT NULL,
  `lstart_time` varchar(20) NOT NULL,
  `lend_time` varchar(20) NOT NULL,
  `ldescription` text NOT NULL,
  `sbcode` varchar(20) NOT NULL,
  `lc_code` varchar(20) NOT NULL,
  `lstatus` int(11) NOT NULL,
  PRIMARY KEY (`lid`),
  KEY `sbcode` (`sbcode`,`lc_code`),
  KEY `lc_code` (`lc_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

DROP TABLE IF EXISTS `student_table`;
CREATE TABLE IF NOT EXISTS `student_table` (
  `st_index_number` varchar(20) NOT NULL,
  `st_name` varchar(60) NOT NULL,
  `st_email` varchar(100) NOT NULL,
  `st_phone_no` varchar(20) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `st_status` int(11) NOT NULL,
  PRIMARY KEY (`st_index_number`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`st_index_number`, `st_name`, `st_email`, `st_phone_no`, `cid`, `st_status`) VALUES
('15APC2339', 'M.I.M. Ifham', 'ifham@gmail.com', '0771390673', 'D1', 1),
('15APC2340', 'M.G.N. Isurujith', 'isurujithgmail.com', '0719824720', 'D1', 1),
('15APC2341', 'M. Jasman', 'jasman@gmail.com', '0774529075', 'D1', 1),
('15APC2342', 'J.P.U.S.D. Jayakody', 'jayakody@gmail.com', '0712389562', 'D1', 1),
('15APC2343', 'J.H.R.P. Jayamaha', 'jayamaha@gmil.com', '0775209568', 'D1', 1),
('15APC2345', 'H.W.J.Jayasanka', 'jayasankagmail.com', '0713907593', 'D1', 1),
('15APC2353', 'M.M.Karlavi', 'fathhi@gmail.com', '0773986451', 'D1', 1),
('15APC2400', 'M.M.M.Ihras', 'mohamedihras@gmail.com', '0710741622', 'D1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_table`
--

DROP TABLE IF EXISTS `subject_table`;
CREATE TABLE IF NOT EXISTS `subject_table` (
  `sbcode` varchar(20) NOT NULL,
  `sbname` varchar(60) NOT NULL,
  `sbcredit` int(3) NOT NULL,
  `sbdescription` text NOT NULL,
  `sbsemester` varchar(20) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `sbstatus` int(11) NOT NULL,
  PRIMARY KEY (`sbcode`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_table`
--

INSERT INTO `subject_table` (`sbcode`, `sbname`, `sbcredit`, `sbdescription`, `sbsemester`, `cid`, `sbstatus`) VALUES
('1101', 'Fundamentals of Financial Accounting', 4, 'Module Type- Core  GPA Status-GPA', '1', '11', 1),
('1102', 'Business Mathematics', 4, 'Module Type- Core  GPA Status-GPA', '1', '11', 1),
('1111', 'Reading & Vocabulary Development	', 3, 'Module Type- Core  GPA Status-GPA', '1', '14', 1),
('1112', 'Effective Communication Skills I	', 2, 'Module Type- Core  GPA Status-GPA', '1', '14', 1),
('1201', 'Intermediate Financial Accounting', 4, 'Module Type- Core  GPA Status-GPA', '2', '11', 1),
('1202', 'Statistical Analysis for Management', 4, 'Module Type- Core  GPA Status-GPA', '2', '11', 1),
('1211', 'Intermediate Reading & Vocabulary Development', 3, 'Module Type- Core  GPA Status-GPA', '2', '14', 1),
('1212', 'Effective Communication Skills II', 2, 'Module Type- Core  GPA Status-GPA', '2', '14', 1),
('2101', 'Advanced Financial Accounting', 4, 'Module Type- Core  GPA Status-GPA', '3', '11', 1),
('2103', 'Principles of Auditing & Taxation', 4, 'Module Type- Core  GPA Status-GPA', '3', '11', 1),
('2111', 'Advanced Reading & Vocabulary Development I', 3, 'Module Type- Core  GPA Status-GPA', '3', '14', 1),
('2112', 'Technology based Communication Skills', 2, 'Module Type- Core  GPA Status-GPA', '3', '14', 1),
('2201', 'Cost & Management Accounting', 4, 'Module Type- Core  GPA Status-GPA', '4', '11', 1),
('2202', 'Computer Applications for Accounting', 4, 'Module Type- Core  GPA Status-GPA', '4', '11', 1),
('2211', 'Advanced Reading & Vocabulary Development II', 3, 'Module Type- Core  GPA Status-GPA', '4', '14', 1),
('2212', 'Language Structure, Usage & Linguistics IV', 4, 'Module Type- Core  GPA Status-GPA', '4', '14', 1),
('3101', 'Advanced Management Accounting', 4, 'Module Type- Core  GPA Status-GPA', '5', '11', 1),
('3102', 'Financial Reporting', 4, 'Module Type- Core  GPA Status-GPA', '5', '11', 1),
('3111', 'Implant Training/Project', 6, 'Module Type- Core  GPA Status-GPA', '5', '14', 1),
('3201', 'Advanced Financial Reporting', 4, 'Module Type- Core  GPA Status-GPA', '6', '11', 1),
('3202', 'Corporate Law', 4, 'Module Type- Core  GPA Status-GPA', '6', '11', 1),
('4101', 'Financial Management', 4, 'Module Type- Core  GPA Status-GPA', '7', '11', 1),
('4102', 'Strategic Management', 4, 'Module Type- Core  GPA Status-GPA', '7', '11', 1),
('4201', 'Strategic Management Accounting', 4, 'Module Type- Core  GPA Status-GPA', '8', '11', 1),
('4202', 'Financial Statement Analysis', 4, 'Module Type- Core  GPA Status-GPA', '8', '11', 1),
('CPE1101', 'Professional English 1', 0, '1st year/ Compulsory', '1', 'D1', 1),
('CPE1201', 'Professinal English', 0, '1st year/ Compulsory', '2', 'D1', 1),
('IS11201', 'Fundamentals of Information Syatems', 2, '1st year/ Compulsory', '1', 'D1', 1),
('IS11203', 'Information System Infrastructure', 2, '1st year/ Compulsory', '1', 'D1', 1),
('IS11205', 'Fundamentals of Mathematics', 2, '1st year/ Compulsory', '1', 'D1', 1),
('IS11302', 'Structured Programming Techniques', 3, '1st year/Compulsory', '1', 'D1', 1),
('IS11306', 'statistics and Probability Theory', 3, '1st year/ Compulsory', '1', 'D1', 1),
('IS12209', 'Emerging Technologies for Information Systems', 2, '1st year/ Compulsory', '2', 'D1', 1),
('IS12210', 'Advanced Mathematics', 2, '1st year/ Compulsory', '2', 'D1', 1),
('IS12212', 'Human Computer Interaction', 2, '1st year/ Compulsory', '2', 'D1', 1),
('IS12307', 'Object Oriented Programming', 3, '1st year/ Compulsory', '2', 'D1', 1),
('IS12308', 'Database Systems', 3, '1st year/ Compulsory', '2', 'D1', 1),
('IS12311', 'Analysis Algorithms', 3, '1st year/ Compulsory', '2', 'D1', 1),
('s001', 'stest', 3, 'anx,naxn', '2', '12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

DROP TABLE IF EXISTS `user_table`;
CREATE TABLE IF NOT EXISTS `user_table` (
  `uid` int(20) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL,
  `user_pass` text NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_type` varchar(60) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`uid`, `user_login`, `user_pass`, `user_email`, `user_type`, `status`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 1),
(2, 'director@gmail.com', '3d4e992d8d8a7d848724aa26ed7f4176', 'director@gmail.com', 'director', 1),
(3, 'hod@gmail.com', '17d84f171d54c301fabae1391a125c4e', 'hod@gmail.com', 'hod', 1),
(4, 'staff@gmail.com', '1253208465b1efa876f982d8a9e73eef', 'staff@gmail.com', 'staff', 1),
(5, 'lecturer@gmail.com', 'b06febcfbc00db4f67aed9234e3e52b0', 'lecturer@gmail.com', 'lecturer', 1),
(6, 'student@gmail.com', 'cd73502828457d15655bbd7a63fb0bc8', 'student@gmail.com', 'student', 1),
(7, 'subadmin', '827ccb0eea8a706c4c34a16891f84e7b', 'test@gmail.com', 'admin', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lecture_table`
--
ALTER TABLE `lecture_table`
  ADD CONSTRAINT `lecture_table_ibfk_1` FOREIGN KEY (`sbcode`) REFERENCES `subject_table` (`sbcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_table`
--
ALTER TABLE `student_table`
  ADD CONSTRAINT `student_table_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `course_table` (`cid`);

--
-- Constraints for table `subject_table`
--
ALTER TABLE `subject_table`
  ADD CONSTRAINT `subject_table_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `course_table` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
