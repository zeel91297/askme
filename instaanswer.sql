-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2017 at 08:45 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instaanswer`
--

-- --------------------------------------------------------

--
-- Table structure for table `ans_tbl`
--

CREATE TABLE `ans_tbl` (
  `ans_id` int(11) NOT NULL,
  `ans_desc` varchar(500) NOT NULL,
  `ans_img` varchar(300) DEFAULT NULL,
  `fk_que_id` int(11) NOT NULL,
  `fk_email_id` varchar(100) NOT NULL,
  `ans_date` date NOT NULL,
  `ans_like` double DEFAULT NULL,
  `ans_approve` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ans_tbl`
--

INSERT INTO `ans_tbl` (`ans_id`, `ans_desc`, `ans_img`, `fk_que_id`, `fk_email_id`, `ans_date`, `ans_like`, `ans_approve`) VALUES
(1, 'Both allocates memory from heap area/dynamic memory. By default calloc fills the allocated memory with 0’s.', NULL, 2, 'jaishilbhavsar@yahoo.com', '2017-07-04', 500, 1),
(3, 'Class is a blue print which reflects the entities attributes and actions. Technically defining a class is designing an user defined data type.', NULL, 5, 'jollyprashil@gmail.com', '2017-07-11', 150, 1),
(4, 'Python is an interpreted language. That means that, unlike languages like C and its variants, Python does not need to be compiled before it is run. Other interpreted languages include PHP and Ruby.', NULL, 6, 'zeel91297@gmail.com', '2017-07-17', 40, 1),
(5, 'In Python, functions are first-class objects. This means that they can be assigned to variables, returned from other functions and passed into functions. Classes are also first class objects', NULL, 6, 'zeel91297@gmail.com', '2017-07-11', 100, 1),
(6, 'Python is dynamically typed, this means that you don\'t need to state the types of variables when you declare them or anything like that. ', NULL, 6, 'jaishilbhavsar@yahoo.com', '2017-07-11', 44, 1),
(7, 'Synchronous: waits until the task has completed Asynchronous: completes a task in background and can notify you when complete', NULL, 7, 'jaishilbhavsar@gmail.com', '2017-07-03', 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `que_tbl`
--

CREATE TABLE `que_tbl` (
  `que_id` int(11) NOT NULL,
  `que_title` varchar(100) NOT NULL,
  `que_desc` varchar(300) NOT NULL,
  `que_img` varchar(300) DEFAULT NULL,
  `fk_email_id` varchar(50) NOT NULL,
  `fk_sub_id` int(11) NOT NULL,
  `que_date` date NOT NULL,
  `que_flag` int(5) NOT NULL DEFAULT '0',
  `que_approve` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `que_tbl`
--

INSERT INTO `que_tbl` (`que_id`, `que_title`, `que_desc`, `que_img`, `fk_email_id`, `fk_sub_id`, `que_date`, `que_flag`, `que_approve`) VALUES
(2, 'Distinguish between malloc() and calloc()', 'helo world', '../images/patterns/bg13.png', 'zeel91297@gmail.com', 2, '2017-05-02', 1, 1),
(3, 'What is file extension of Web Services in .Net?', 'Extentions for .NET', NULL, 'bhargavijansari01@gmail.com', 9, '2017-06-04', 0, 1),
(4, 'What is SQL and Why is it important?', 'Structured Query Language', NULL, 'zeel91297@gmail.com', 2, '2017-06-12', 0, 1),
(5, 'What is a class?', 'class in c++', NULL, 'jaishilbhavsar@yahoo.com', 1, '2017-07-17', 1, 1),
(6, 'What is Python really?', '', NULL, 'kevalshah@gmail.com', 8, '2017-06-28', 1, 1),
(7, 'What is the difference between Synchronous & Asynchronous task ? ', 'related to IOS', NULL, 'jollyprashil@gmail.com', 10, '2017-04-03', 1, 1),
(8, 'Why don’t we use strong for enum property in Objective-C ? ', '', NULL, 'zeel91297@gmail.com', 1, '2017-07-02', 0, 1),
(9, 'What is Android?', 'dgrdfgldkfnhlsdfbl', '../images/', 'zeel91297@gmail.com', 3, '2017-07-22', 0, 1),
(10, 'What is Android?', 'dgrdfgldkfnhlsdfbl', '../images/17a702abdb19f71beb3002454dd42cc7.jpg', 'zeel91297@gmail.com', 3, '2017-07-22', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_tbl`
--

CREATE TABLE `subject_tbl` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_tbl`
--

INSERT INTO `subject_tbl` (`sub_id`, `sub_name`) VALUES
(1, ' C,C++'),
(2, 'SQL'),
(3, 'Java'),
(4, 'PHP'),
(5, 'VB.Net'),
(6, 'Angular'),
(7, 'Ionic'),
(8, 'Python'),
(9, '.NET'),
(10, 'IOS');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `email_id` varchar(100) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_pass` varchar(10) NOT NULL,
  `user_address` varchar(50) DEFAULT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `profile_pic` varchar(200) DEFAULT NULL,
  `verify` varchar(7) NOT NULL,
  `token` varchar(10) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`email_id`, `user_name`, `user_pass`, `user_address`, `mobile_no`, `gender`, `profile_pic`, `verify`, `token`, `user_type`) VALUES
('admin@gmail.com', 'admin', 'admin', 'home', '8128076168', 'male', '../images/minion.jpg', 'yes', '', 'admin'),
('bhargavijansari01@gmail.com', 'Bhargavi', '123456', 'Kalupur', '7403626416', 'female', '../images/bhargavi.jpg', 'yes', '', 'user'),
('jaishilbhavsar@yahoo.com', 'Jaishil Bhavsar', '123456', 'Saraspur', '9727333333', 'male', '../images/jaishil.jpg', 'yes', '', 'user'),
('jollyprashil@gmail.com', 'Prashil Parmar', '123456', 'Thaltej', '9099022499', 'male', '../images/prashil.png', 'yes', '', 'user'),
('kevalshah@gmail.com', 'Keval Shah', '123456', NULL, '8401634165', 'male', '../images/keval.png', 'yes', '', 'user'),
('zeel91297@gmail.com', 'Zeel Modi', '123456', 'Manekchowk', '8460816553', 'female', '../images/zeel.jpg', 'yes', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ans_tbl`
--
ALTER TABLE `ans_tbl`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `que_tbl`
--
ALTER TABLE `que_tbl`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ans_tbl`
--
ALTER TABLE `ans_tbl`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `que_tbl`
--
ALTER TABLE `que_tbl`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
