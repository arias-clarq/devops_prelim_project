-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 02:59 PM
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
-- Table structure for table `school_profile`
--

CREATE TABLE `school_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `telephone_number` varchar(15) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_profile`
--

INSERT INTO `school_profile` (`id`, `name`, `location`, `email`, `mobile_number`, `telephone_number`, `description`) VALUES
(1, 'Arayat Institute', 'Arayat, Pampanga', 'unknown@gmail.com', '09750737973', '0975073797355', 'School with a black heart');

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
-- Table structure for table `tbl_background`
--

CREATE TABLE `tbl_background` (
  `Bg_id` int(11) NOT NULL,
  `Bg` blob NOT NULL,
  `Value` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cardcontent`
--

CREATE TABLE `tbl_cardcontent` (
  `cardcontent_id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Caption` text NOT NULL,
  `Size` int(255) NOT NULL,
  `Color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card_images`
--

CREATE TABLE `tbl_card_images` (
  `card&images_id` int(11) NOT NULL,
  `Image` blob NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Caption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `prelims` decimal(10,2) NOT NULL,
  `midterm` decimal(10,2) NOT NULL,
  `finals` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_grade`
--

INSERT INTO `tbl_grade` (`gradeID`, `studentID`, `subjectID`, `prelims`, `midterm`, `finals`) VALUES
(1, 1, 1, 0.00, 0.00, 0.00),
(2, 1, 8, 56.30, 76.00, 76.00),
(4, 3, 10, 0.00, 0.00, 0.00),
(5, 1, 9, 80.00, 87.00, 90.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `logoid` int(11) NOT NULL,
  `Logo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`logoid`, `Logo`) VALUES
(1, 0x2e2e2f6173736574732f75706c6f6164732f4b4f2e706e67);

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
(3, 'juls@student', '123', 'A', 'III', 2, 11, 2);

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
(3, 3, 'juls@gmail.com', 'juliana', 'paguinto', 'simbulan', 'Female', '2003-07-07', 'jupiter', 9123456789, 'cheenee', 9123456788, 'uranus', 'das', 2345, 'das', 3456, 'das', 4567);

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
(8, 'Itelec 3', 1, 'knight man', 'III', 2),
(9, 'CC106', 1, 'Ms Jane', 'III', 3),
(10, 'Webdev', 2, 'magic man', 'III', 3);

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
-- Indexes for table `school_profile`
--
ALTER TABLE `school_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`appointmentID`);

--
-- Indexes for table `tbl_background`
--
ALTER TABLE `tbl_background`
  ADD PRIMARY KEY (`Bg_id`);

--
-- Indexes for table `tbl_cardcontent`
--
ALTER TABLE `tbl_cardcontent`
  ADD PRIMARY KEY (`cardcontent_id`);

--
-- Indexes for table `tbl_card_images`
--
ALTER TABLE `tbl_card_images`
  ADD PRIMARY KEY (`card&images_id`);

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
-- AUTO_INCREMENT for table `school_profile`
--
ALTER TABLE `school_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `appointmentID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_background`
--
ALTER TABLE `tbl_background`
  MODIFY `Bg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cardcontent`
--
ALTER TABLE `tbl_cardcontent`
  MODIFY `cardcontent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_card_images`
--
ALTER TABLE `tbl_card_images`
  MODIFY `card&images_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `courseID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  MODIFY `gradeID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `statusID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `studentID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_student_info`
--
ALTER TABLE `tbl_student_info`
  MODIFY `student_infoID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subjectID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
