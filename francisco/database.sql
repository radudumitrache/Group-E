-- COPY PASTE THIS STRUCTURE FOR ALL OF THE TABLES OF THE UPPER PART OF THE ERD


-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Dec 01, 2022 at 12:58 PM
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
-- Database: 'Morgenster'
--
CREATE DATABASE IF NOT EXISTS 'Morgenster' DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE 'Morgenster';

-- Indexes for dumped tables

-- Table structure for table 'events'

DROP TABLE IF EXISTS 'events';
CREATE TABLE 'events' (
	'eventID' int(100) NOT NULL,
	'name' varchar(100) NOT NULL,
	'date' date(10) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Indexes for table 'events'

ALTER TABLE 'events'
	ADD PRIMARY KEY ('eventID');

-- Constraints for dumped tables

-- Constraints for table 'events'
--
ALTER TABLE 'events'
	ADD CONSTRAINT 'events_ibfk_1' FOREIGN KEY ('reportsTo') REFERENCES 'events' ('eventID'),
	ADD CONSTRAINT 'events_ibfk_2' FOREIGN KEY ('officeCode') REFERENCES 'offices' ('officeCode');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
