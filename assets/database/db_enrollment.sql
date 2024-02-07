-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 05:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_enrollment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `appointmentID` int(255) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `slots` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`appointmentID`, `date`, `start_time`, `slots`) VALUES
(11, '2024-02-10', '10:00:00', 5),
(13, '2024-02-23', '22:30:00', 10),
(14, '2024-02-08', '07:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `courseID` int(255) NOT NULL,
  `courseName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`courseID`, `courseName`) VALUES
(1, 'BS Information Technology'),
(2, 'BS Computer Engineering'),
(3, 'BS Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade`
--

CREATE TABLE `tbl_grade` (
  `gradeID` int(255) NOT NULL,
  `studentID` int(200) NOT NULL,
  `subjectID` int(200) NOT NULL,
  `prelims` decimal(10,0) NOT NULL,
  `midterm` decimal(10,0) NOT NULL,
  `finals` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_grade`
--

INSERT INTO `tbl_grade` (`gradeID`, `studentID`, `subjectID`, `prelims`, `midterm`, `finals`) VALUES
(1, 1, 1, 0, 0, 0),
(2, 1, 8, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `statusID` int(255) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`statusID`, `status`) VALUES
(1, 'PENDING'),
(2, 'ENROLLED');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `studentID` int(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `section` varchar(200) DEFAULT NULL,
  `year` varchar(50) NOT NULL,
  `courseID` int(200) NOT NULL,
  `appointmentID` int(200) NOT NULL,
  `statusID` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`studentID`, `username`, `password`, `section`, `year`, `courseID`, `appointmentID`, `statusID`) VALUES
(1, 'arias@student', 'arias', 'A', 'III', 1, 13, 2),
(2, 'juliana@student', '123', 'D', 'III', 3, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_info`
--

CREATE TABLE `tbl_student_info` (
  `student_infoID` int(255) NOT NULL,
  `studentID` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fName` varchar(200) NOT NULL,
  `lName` varchar(200) NOT NULL,
  `mName` varchar(50) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `bday` date NOT NULL,
  `homeAddress` varchar(200) NOT NULL,
  `phoneNo.` bigint(200) NOT NULL,
  `guardianName` varchar(200) NOT NULL,
  `guardianPhoneNo` bigint(200) NOT NULL,
  `guardianAddress` varchar(200) NOT NULL,
  `elementary` varchar(200) NOT NULL,
  `elementaryYear` int(100) NOT NULL,
  `juniorHigh` varchar(200) NOT NULL,
  `juniorHighYear` int(100) NOT NULL,
  `seniorHigh` varchar(200) NOT NULL,
  `seniorHighYear` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student_info`
--

INSERT INTO `tbl_student_info` (`student_infoID`, `studentID`, `email`, `fName`, `lName`, `mName`, `sex`, `bday`, `homeAddress`, `phoneNo.`, `guardianName`, `guardianPhoneNo`, `guardianAddress`, `elementary`, `elementaryYear`, `juniorHigh`, `juniorHighYear`, `seniorHigh`, `seniorHighYear`) VALUES
(1, 1, 'arias@gmail.com', 'clarq', 'arias', 'pangan', 'Male', '2003-08-08', 'mars', 9123456789, 'dad', 9123456788, 'mars', 'mandasig', 2015, 'hcc', 2019, 'hcc', 2021),
(2, 2, 'juls@gmail.com', 'juls', 'paguinto', 'simbulan', 'Female', '5656-06-05', 'mars', 3232323232, 'cheenee', 998098092, 'jupiter', 'dasdas', 2015, 'dsada', 2323, 'dsada', 2323);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subjectID` int(255) NOT NULL,
  `subjectName` varchar(200) NOT NULL,
  `courseID` int(255) NOT NULL,
  `instructor` varchar(200) NOT NULL,
  `year` varchar(50) NOT NULL,
  `hours` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subjectID`, `subjectName`, `courseID`, `instructor`, `year`, `hours`) VALUES
(1, 'Devops 2', 1, 'magic man', 'III', 5),
(4, 'Webdev', 3, 'wizard man', 'III', 5),
(8, 'Itelec 3', 1, 'knight man', 'III', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userID` int(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userID`, `username`, `password`) VALUES
(1, 'admin@admin', 'admin'),
(2, 'student@student', 'student'),
(3, 'juliana@admin', '123'),
(5, 'clarq@admin', '123'),
(7, 'rhea@admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`appointmentID`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  ADD PRIMARY KEY (`gradeID`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `tbl_student_info`
--
ALTER TABLE `tbl_student_info`
  ADD PRIMARY KEY (`student_infoID`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `appointmentID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `courseID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  MODIFY `gradeID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `statusID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `studentID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_student_info`
--
ALTER TABLE `tbl_student_info`
  MODIFY `student_infoID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subjectID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
