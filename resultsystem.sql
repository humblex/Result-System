-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 02:25 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resultsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `access_id` int(2) NOT NULL,
  `pin_number` varchar(15) NOT NULL,
  `expiry` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`access_id`, `pin_number`, `expiry`) VALUES
(1, '12ad77ef', '2018'),
(2, '17jk56bc', '2018'),
(3, '88st34iu', '2018'),
(4, '10et18bz', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(2) NOT NULL,
  `std_regno` varchar(15) NOT NULL,
  `course` varchar(30) NOT NULL,
  `CA` int(5) NOT NULL,
  `exam` int(5) NOT NULL,
  `total` int(5) NOT NULL,
  `grade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `std_regno`, `course`, `CA`, `exam`, `total`, `grade`) VALUES
(1, '2017/1992077', 'Physics', 20, 55, 75, 'A'),
(2, '2017/1992078', 'Physics', 15, 40, 55, 'C'),
(3, '2017/1992079', 'Physics', 28, 32, 60, 'B'),
(4, '2017/1992077', 'English Language', 20, 31, 51, 'C'),
(5, '2017/1992078', 'English Language', 20, 28, 48, 'D'),
(6, '2017/1992079', 'English Language', 20, 49, 69, 'B'),
(7, '2017/1992077', 'Further Mathematics', 20, 70, 90, 'A'),
(8, '2017/1992078', 'Further Mathematics', 13, 60, 73, 'A'),
(9, '2017/1992079', 'Further Mathematics', 27, 23, 50, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `std_id` int(2) NOT NULL,
  `std_name` varchar(30) NOT NULL,
  `reg_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`std_id`, `std_name`, `reg_number`) VALUES
(3, 'John Micheal', '2017/1992078'),
(4, 'Mmaduekwe Helen', '2017/1992077'),
(5, 'Ajala Temitope', '2017/1992079');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `std_regno` (`std_regno`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`std_id`,`reg_number`),
  ADD KEY `fk_student` (`reg_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `access_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `std_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `fk_student` FOREIGN KEY (`std_regno`) REFERENCES `students` (`reg_number`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
