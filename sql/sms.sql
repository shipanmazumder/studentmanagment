-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2016 at 11:07 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `aemail` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(33) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lavel` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `aemail`, `password`, `birthday`, `gender`, `address`, `photo`, `mobile`, `lavel`) VALUES
(1, 'Shipan Mazumder', 'shipan@gmail.com', '1b9d89a72a006967146520970233268a', '1997-12-31', 'Male', 'Madaripur', 'shipan.jpg', '01944325586', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `atten_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `roll` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `atten` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`atten_id`, `student_id`, `name`, `roll`, `class`, `date`, `atten`, `section`) VALUES
(41, 6, 'Shipan Mazumder', '138278', 'One', '2016-08-08', 'Present', 'A'),
(42, 6, 'Shipan Mazumder', '138278', 'One', '2016-08-09', 'Absent', 'A'),
(43, 7, 'shipan', '737864', 'One', '2016-08-08', 'Absent', 'B'),
(44, 7, 'shipan', '737864', 'One', '2016-08-09', 'Present', 'B'),
(45, 8, 'Sojon Islam', '333', 'Two', '2016-08-08', 'Absent', 'A'),
(46, 8, 'Sojon Islam', '333', 'Two', '2016-08-09', 'Present', 'A'),
(47, 9, 'joy', '138278', 'Two', '2016-08-08', 'Present', 'B'),
(48, 8, 'Sojon Islam', '333', 'Two', '2016-08-15', 'Present', 'A'),
(49, 6, 'Shipan Mazumder', '138278', 'One', '2016-08-02', 'Absent', 'A'),
(50, 10, 'joyjoy', '738535', 'One', '2016-08-02', 'Absent', 'A'),
(51, 11, 'sojon', '737902', 'One', '2016-08-02', 'Absent', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE IF NOT EXISTS `class_routine` (
  `routine_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `day` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `teacher` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shour` int(2) NOT NULL,
  `sminite` int(2) NOT NULL,
  `s_am` varchar(2) NOT NULL,
  `ehour` int(2) NOT NULL,
  `eminite` int(2) NOT NULL,
  `e_am` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`routine_id`, `teacher_id`, `class`, `section`, `day`, `teacher`, `shour`, `sminite`, `s_am`, `ehour`, `eminite`, `e_am`, `subject`) VALUES
(1, 1, 'One', 'A', 'Satarday', 'Shipan Mazumder', 3, 20, 'am', 7, 20, 'am', 'English'),
(2, 2, 'One', 'A', 'Satarday', '2Shipan Mazumder', 11, 55, 'am', 11, 55, 'am', 'English'),
(3, 3, 'One', 'A', 'Satarday', '3Shipan Mazumder', 11, 45, 'am', 8, 50, 'am', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exam` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `roll` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mark` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `student_id`, `name`, `exam`, `class`, `section`, `subject`, `roll`, `comment`, `mark`, `year`) VALUES
(49, 6, 'Shipan Mazumder', '1st', 'One', 'A', 'Bangla', '138278', 'hhh', '70', '2016'),
(50, 10, 'joyjoy', '1st', 'One', 'A', 'Bangla', '738535', 'hhhj', '34', '2016'),
(51, 8, 'Sojon Islam', '1st', 'Two', 'A', 'Bangla', '333', 'ddddddddd', '34', '2016'),
(52, 6, 'Shipan Mazumder', '1st', 'One', 'A', 'Math', '138278', 'kjbb', '34', '2016'),
(53, 10, 'joyjoy', '1st', 'One', 'A', 'Math', '738535', 'ddddd', '70', '2016'),
(54, 6, 'Shipan Mazumder', '1st', 'One', 'A', 'English', '138278', 'nbn', '60', '2016'),
(55, 10, 'joyjoy', '1st', 'One', 'A', 'English', '738535', 'mbmnb', '70', '2016'),
(56, 6, 'Shipan Mazumder', '2nd', 'One', 'A', 'Bangla', '138278', 'eeee', '34', '2016'),
(57, 10, 'joyjoy', '2nd', 'One', 'A', 'Bangla', '738535', 'fffffff', '60', '2016'),
(58, 6, 'Shipan Mazumder', '3rd', 'One', 'A', 'Bangla', '138278', 'd', '56', '2016'),
(59, 10, 'joyjoy', '3rd', 'One', 'A', 'Bangla', '738535', 'dddddd', '45', '2016'),
(60, 6, 'Shipan Mazumder', '2nd', 'One', 'A', 'Bangla', '138278', 'very good', '90', '2016'),
(61, 10, 'joyjoy', '2nd', 'One', 'A', 'Bangla', '738535', 'good', '80', '2016'),
(62, 11, 'sojon', '2nd', 'One', 'A', 'Bangla', '737902', 'very good', '97', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `notice_id` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `notice` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `title`, `notice`, `date`, `status`) VALUES
(1, 'colleage holiday', '25/08/2016  this college holidaty', '2016-08-25', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `roll` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pay` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `section` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `name`, `roll`, `class`, `month`, `total`, `pay`, `status`, `student_id`, `section`, `mobile`, `date`) VALUES
(10, 'Shipan Mazumder', '138278', 'One', 'January', '4000', '2000', 'Paid', 6, 'A', '01944325586', '2016-08-09'),
(11, 'Shipan Mazumder', '138278', 'One', 'Web Develop', '4000', '4000', 'Paid', 6, 'A', '01944325586', '2016-08-04'),
(12, 'Shipan Mazumder', '138278', 'One', 'January', '3000', '2000', 'Paid', 6, 'A', '01944325586', '2016-08-02'),
(13, 'sojon', '737902', 'One', 'February', '10000', '1000', 'Unpaid', 11, 'A', '01944325586', '2016-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `semail` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(33) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `roll` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lavel` int(2) NOT NULL,
  `status` enum('0','1','','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `semail`, `password`, `birthday`, `picture`, `roll`, `class`, `section`, `gender`, `address`, `mobile`, `lavel`, `status`) VALUES
(6, 'Shipan Mazumder', 'ss@gmail.com', '1b9d89a72a006967146520970233268a', '1997-12-31', '11041738_971849982825758_7585107059046025686_n.jpg', '138278', 'One', 'A', 'Male', 'Madaripur', '01944325586', 3, '0'),
(7, 'shipan', 'dd@gmail.com', '1b9d89a72a006967146520970233268a', '2016-08-08', '60344_92fc_3.jpg', '737864', 'One', 'B', 'Male', 'mm', '01944325586', 3, '0'),
(8, 'Sojon Islam', 'sojon@gmail.com', '1b9d89a72a006967146520970233268a', '2016-08-14', '11041738_971849982825758_7585107059046025686_n.jpg', '333', 'Two', 'A', 'Male', ',vnv', '01944325586', 3, '0'),
(9, 'joy', 'joym@gmail.com', '1b9d89a72a006967146520970233268a', '2016-08-10', 'donald-trump-anonymous-e1451138115643.jpg', '138278', 'Two', 'B', 'Male', 'jhbnhv', '01944325586', 3, '0'),
(10, 'joyjoy', 'gg@gmail.com', '1b9d89a72a006967146520970233268a', '2016-08-01', '993878_869662169816715_8057527822632197115_n.jpg', '738535', 'One', 'A', 'Male', 'nbbmn', '01728100811', 3, '0'),
(11, 'sojon', 's@gmail.com', '1b9d89a72a006967146520970233268a', '1997-12-31', '10419969_1622348124690896_670676387865821500_n.jpg', '737902', 'One', 'A', 'Male', 'meharpur', '01944325586', 3, '0');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `teacher` varchar(33) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `temail` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(33) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lavel` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `temail`, `password`, `birthday`, `mobile`, `gender`, `picture`, `address`, `lavel`) VALUES
(1, 'Shipan Mazumder', 'joy@gmail.com', 'c2c8e798aecbc26d86e4805114b03c51', '2016-08-03', '01944325586', 'Male', 'images.jpg', 'Madripur', 2),
(2, 'Shipan Mazumder', 'aa@gmail.com', '1b9d89a72a006967146520970233268a', '2016-08-05', '01944325586', 'Male', 'mimipunk-tux-cartoon-1820.png', 'ddddddd', 2),
(3, 'Shipan Mazumder', 'sm@gmail.com', '1b9d89a72a006967146520970233268a', '2016-08-02', '01944325586', 'Male', 'shoiiiiiiiiiii.jpg', 'ddddd', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`atten_id`);

--
-- Indexes for table `class_routine`
--
ALTER TABLE `class_routine`
  ADD PRIMARY KEY (`routine_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `atten_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `class_routine`
--
ALTER TABLE `class_routine`
  MODIFY `routine_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
