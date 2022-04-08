-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 06:46 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `advised_course`
--

CREATE TABLE `advised_course` (
  `STID` int(18) NOT NULL,
  `COURSE_ID` varchar(15) NOT NULL,
  `SECTION` int(11) NOT NULL,
  `FACULTY` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advised_course`
--

INSERT INTO `advised_course` (`STID`, `COURSE_ID`, `SECTION`, `FACULTY`) VALUES
(55, 'cse370', 1, 'HOS');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `COURSE_ID` varchar(15) NOT NULL,
  `COURSE_NAME` varchar(25) NOT NULL,
  `CREDIT` int(11) NOT NULL DEFAULT '3',
  `COURSE_TYPE` varchar(15) NOT NULL DEFAULT 'Mandatory',
  `TOTALNUMBER_OF_PRE_REQ_COURSE` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`COURSE_ID`, `COURSE_NAME`, `CREDIT`, `COURSE_TYPE`, `TOTALNUMBER_OF_PRE_REQ_COURSE`) VALUES
('CSE110', 'PROGRAMMING_LANGUAGE_1', 3, 'Mandatory', 0),
('CSE111', 'PROGRAMMING_LANGUAGE_2', 3, 'Mandatory', 1),
('CSE220', 'DATA_STRUCTURES', 3, 'Mandatory', 1),
('CSE221', 'ALGORITHM', 3, 'Mandatory', 1),
('CSE330', 'NUMERICAL_METHODS', 3, 'Mandatory', 1),
('CSE370', 'DATABASE_SYSTEM', 3, 'Mandatory', 2),
('CSE420', 'COMPILER_DESIGN', 4, 'Elective', 2),
('MAT120', 'INTEGRAL_CALCULUS_AND_DIF', 3, 'Mandatory(GED)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_finished`
--

CREATE TABLE `course_finished` (
  `STID` int(18) NOT NULL,
  `FINISHED_COURSE_ID` varchar(15) NOT NULL,
  `COURSE_RESULT` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_finished`
--

INSERT INTO `course_finished` (`STID`, `FINISHED_COURSE_ID`, `COURSE_RESULT`) VALUES
(11, 'CSE110', 3),
(11, 'CSE111', 2.4),
(22, 'CSE111', 3),
(22, 'CSE220', 3),
(33, 'CSE110', 4),
(33, 'CSE111', 4),
(44, 'CSE110', 1.7),
(55, 'CSE110', 4),
(55, 'CSE111', 4),
(55, 'CSE220', 3.7),
(55, 'CSE221', 3.7),
(55, 'MAT120', 1.5),
(66, 'CSE110', 4),
(66, 'CSE111', 2.5),
(77, 'CSE110', 4),
(77, 'CSE111', 3.7),
(77, 'CSE220', 4),
(77, 'CSE221', 3.7),
(77, 'CSE330', 2.7),
(77, 'CSE370', 2),
(77, 'MAT120', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pre_req_course`
--

CREATE TABLE `pre_req_course` (
  `COURSE_ID` varchar(15) NOT NULL,
  `PRE_REQ_COURSE_ID` varchar(15) NOT NULL,
  `PRE_REQ_REQUIREMENT` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_req_course`
--

INSERT INTO `pre_req_course` (`COURSE_ID`, `PRE_REQ_COURSE_ID`, `PRE_REQ_REQUIREMENT`) VALUES
('CSE110', '', NULL),
('CSE111', 'CSE110', 2.5),
('CSE220', 'CSE111', 3),
('CSE221', 'CSE220', 2.5),
('CSE330', 'MAT120', 2.5),
('CSE370', 'CSE221', 3),
('CSE370', 'MAT120', 2),
('CSE420', 'CSE330', 2),
('CSE420', 'CSE370', 2.2),
('MAT120', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `COURSE_ID` varchar(15) NOT NULL,
  `SECTION` int(11) NOT NULL,
  `FACULTY` varchar(255) NOT NULL,
  `SEAT_REMAINING` int(11) NOT NULL DEFAULT '30',
  `TOTAL_SEAT` int(11) NOT NULL DEFAULT '30'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`COURSE_ID`, `SECTION`, `FACULTY`, `SEAT_REMAINING`, `TOTAL_SEAT`) VALUES
('CSE110', 1, 'AAJ', 30, 30),
('CSE110', 2, 'DIP', 0, 30),
('CSE111', 1, 'RAK', 30, 30),
('CSE220', 1, 'RAK', 0, 30),
('CSE220', 2, 'RAK', 15, 30),
('CSE220', 3, 'SEJ', 30, 30),
('CSE221', 1, 'RAK', 30, 30),
('CSE330', 1, 'AAJ', 30, 30),
('CSE330', 2, 'ACH', 5, 30),
('CSE330', 3, 'MHT', 30, 30),
('CSE370', 1, 'HOS', 3, 30),
('CSE370', 2, 'NNC', 0, 30),
('CSE420', 1, 'AKO', 30, 30),
('MAT120', 1, 'FAB', 30, 30),
('MAT120', 2, 'DTY', 30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `STID` int(18) NOT NULL,
  `STNAME` varchar(50) NOT NULL,
  `AGE` int(3) DEFAULT NULL,
  `CONTACT_INFO` varchar(15) DEFAULT NULL,
  `ADDRESS` varchar(20) DEFAULT NULL,
  `PASSWORD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`STID`, `STNAME`, `AGE`, `CONTACT_INFO`, `ADDRESS`, `PASSWORD`) VALUES
(11, 'NUSRAT', 20, '123', 'MIRPUR', 1),
(22, 'NAYAM', 23, '456', 'MOHAKHALI', 2),
(33, 'FARIA', 21, '789', 'KAZIPARA', 3),
(44, 'Siam', 19, '321', 'UTTARA', 4),
(55, 'WAFI', 21, '654', 'NEWMARKET', 5),
(66, 'Tahsin', 22, '987', 'MIRPUR', 6),
(77, 'Ashik', 20, '432', 'GULSHAN', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advised_course`
--
ALTER TABLE `advised_course`
  ADD PRIMARY KEY (`STID`,`COURSE_ID`,`SECTION`),
  ADD UNIQUE KEY `STID` (`STID`,`COURSE_ID`),
  ADD KEY `advised_course_ibfk_2` (`COURSE_ID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`COURSE_ID`);

--
-- Indexes for table `course_finished`
--
ALTER TABLE `course_finished`
  ADD PRIMARY KEY (`STID`,`FINISHED_COURSE_ID`),
  ADD UNIQUE KEY `STID` (`STID`,`FINISHED_COURSE_ID`),
  ADD KEY `course_finished_ibfk_2` (`FINISHED_COURSE_ID`);

--
-- Indexes for table `pre_req_course`
--
ALTER TABLE `pre_req_course`
  ADD PRIMARY KEY (`COURSE_ID`,`PRE_REQ_COURSE_ID`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`COURSE_ID`,`SECTION`),
  ADD UNIQUE KEY `COURSE_ID` (`COURSE_ID`,`SECTION`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`STID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advised_course`
--
ALTER TABLE `advised_course`
  ADD CONSTRAINT `advised_course_ibfk_1` FOREIGN KEY (`STID`) REFERENCES `student` (`STID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `advised_course_ibfk_2` FOREIGN KEY (`COURSE_ID`) REFERENCES `courses` (`COURSE_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `course_finished`
--
ALTER TABLE `course_finished`
  ADD CONSTRAINT `course_finished_ibfk_1` FOREIGN KEY (`STID`) REFERENCES `student` (`STID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `course_finished_ibfk_2` FOREIGN KEY (`FINISHED_COURSE_ID`) REFERENCES `courses` (`COURSE_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pre_req_course`
--
ALTER TABLE `pre_req_course`
  ADD CONSTRAINT `pre_req_course_ibfk_1` FOREIGN KEY (`COURSE_ID`) REFERENCES `courses` (`COURSE_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`COURSE_ID`) REFERENCES `courses` (`COURSE_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
