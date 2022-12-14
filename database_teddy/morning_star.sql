-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： mysql
-- 生成日期： 2022-12-14 21:14:14
-- 服务器版本： 10.9.2-MariaDB-1:10.9.2+maria~ubu2204
-- PHP 版本： 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `morning_star`
--

-- --------------------------------------------------------

--
-- 表的结构 `abscence`
--

CREATE TABLE `abscence` (
  `date_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `parent_authorisation` text NOT NULL,
  `justification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `abscence_subject`
--

CREATE TABLE `abscence_subject` (
  `abscence_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `exam`
--

CREATE TABLE `exam` (
  `date_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `score` decimal(10,0) DEFAULT NULL,
  `result` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `age` decimal(10,0) DEFAULT NULL,
  `health_issue` text NOT NULL,
  `notes` text NOT NULL,
  `extra_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `student_exam`
--

CREATE TABLE `student_exam` (
  `studnet_id` int(11) NOT NULL,
  `date_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `year` decimal(10,0) DEFAULT NULL,
  `period` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转储表的索引
--

--
-- 表的索引 `abscence`
--
ALTER TABLE `abscence`
  ADD PRIMARY KEY (`date_id`);

--
-- 表的索引 `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`date_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
