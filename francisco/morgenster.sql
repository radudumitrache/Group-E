-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Dec 15, 2022 at 02:31 PM
-- Server version: 10.9.2-MariaDB-1:10.9.2+maria~ubu2204
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `morgenster`
--

-- --------------------------------------------------------

--
-- Table structure for table `abscence`
--

CREATE TABLE `abscence` (
  `dateID` int(8) NOT NULL,
  `studentID` int(100) NOT NULL,
  `parent's_authorisation` tinyint(1) NOT NULL,
  `justification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `abscences/subjects`
--

CREATE TABLE `abscences/subjects` (
  `dateID` int(8) NOT NULL,
  `subjectID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events/students`
--

CREATE TABLE `events/students` (
  `eventID` int(100) NOT NULL,
  `studentID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events/users`
--

CREATE TABLE `events/users` (
  `eventID` int(100) NOT NULL,
  `userID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `dateID` int(8) NOT NULL,
  `subjectID` int(100) NOT NULL,
  `score` varchar(6) NOT NULL,
  `result` varchar(6) NOT NULL,
  `notes` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(100) NOT NULL,
  `name` text NOT NULL,
  `age` int(3) NOT NULL,
  `health_issues` varchar(1000) NOT NULL,
  `notes` varchar(1000) NOT NULL,
  `extra_info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students/exams`
--

CREATE TABLE `students/exams` (
  `studentID` int(100) NOT NULL,
  `dateID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `year` int(4) NOT NULL,
  `period` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postal_code` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone_number` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users/students`
--

CREATE TABLE `users/students` (
  `userID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='In this table specifically, userIDs represent the parents';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abscence`
--
ALTER TABLE `abscence`
  ADD PRIMARY KEY (`dateID`);

--
-- Indexes for table `abscences/subjects`
--
ALTER TABLE `abscences/subjects`
  ADD KEY `dateID` (`dateID`),
  ADD KEY `subjectID` (`subjectID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `events/students`
--
ALTER TABLE `events/students`
  ADD KEY `eventID` (`eventID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `events/users`
--
ALTER TABLE `events/users`
  ADD KEY `foreign_key_1` (`eventID`),
  ADD KEY `foreign_key_2` (`userID`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`dateID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `students/exams`
--
ALTER TABLE `students/exams`
  ADD KEY `dateID` (`dateID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `users/students`
--
ALTER TABLE `users/students`
  ADD KEY `userID` (`userID`),
  ADD KEY `studentID` (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abscence`
--
ALTER TABLE `abscence`
  MODIFY `dateID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `dateID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abscences/subjects`
--
ALTER TABLE `abscences/subjects`
  ADD CONSTRAINT `abscences/subjects_ibfk_1` FOREIGN KEY (`dateID`) REFERENCES `abscence` (`dateID`),
  ADD CONSTRAINT `abscences/subjects_ibfk_2` FOREIGN KEY (`subjectID`) REFERENCES `subject` (`subjectID`);

--
-- Constraints for table `events/students`
--
ALTER TABLE `events/students`
  ADD CONSTRAINT `events/students_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`),
  ADD CONSTRAINT `events/students_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`);

--
-- Constraints for table `events/users`
--
ALTER TABLE `events/users`
  ADD CONSTRAINT `foreign_key_1` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`),
  ADD CONSTRAINT `foreign_key_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `students/exams`
--
ALTER TABLE `students/exams`
  ADD CONSTRAINT `students/exams_ibfk_1` FOREIGN KEY (`dateID`) REFERENCES `exams` (`dateID`),
  ADD CONSTRAINT `students/exams_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`);

--
-- Constraints for table `users/students`
--
ALTER TABLE `users/students`
  ADD CONSTRAINT `users/students_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `users/students_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
