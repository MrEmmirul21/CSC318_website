-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 12:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efinancial`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminID` int(7) NOT NULL,
  `adminPassword` varchar(20) DEFAULT NULL,
  `adminName` varchar(100) DEFAULT NULL,
  `position` varchar(50) NOT NULL,
  `adminEmail` varchar(50) NOT NULL,
  `adminPhoneNo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminID`, `adminPassword`, `adminName`, `position`, `adminEmail`, `adminPhoneNo`) VALUES
(2021, '111', 'Liyana Irdina Binti Mohd Ariff', 'Treasurer', 'myteccraub@gmail.com', '173981684');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `billNo` int(3) NOT NULL,
  `billName` varchar(50) DEFAULT NULL,
  `billDate` varchar(15) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `deadline` varchar(15) DEFAULT NULL,
  `adminID` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billNo`, `billName`, `billDate`, `amount`, `deadline`, `adminID`) VALUES
(1, 'Yuran Kelab Sesi September 2018 - December 2018', '30 Jan 2021', 10, '2018-09-30', 2021),
(2, 'Yuran Kelab Sesi Februari 2019 - Jun 2019', '31 Jan 2021', 10, '2019-03-30', 2021),
(3, 'Yuran Kelab Sesi September 2019 - January 2020', '31 Jan 2021', 10, '2019-10-30', 2021),
(4, 'Yuran Kelab Sesi Mac 2020 - July 2020', '31 Jan 2021', 10, '2020-03-30', 2021),
(5, 'Yuran Kelab Sesi Oktober 2020 - Februari 2021', '31 Jan 2021', 10, '2020-10-30', 2021),
(6, 'Annual Grand Dinner', '05 Feb 2021', 40, '2021-03-30', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusID` int(1) NOT NULL,
  `statusName` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusID`, `statusName`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(10) NOT NULL,
  `studentPassword` varchar(50) DEFAULT NULL,
  `studentName` varchar(100) DEFAULT NULL,
  `studentIC` varchar(12) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  `studentEmail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `studentPassword`, `studentName`, `studentIC`, `semester`, `studentEmail`) VALUES
(2018413026, 'Nurafiqah12', 'Nur Afiqah Binti Azman', '001209060122', 5, 'afilleazman@gmail.com'),
(2018637802, 'fazreen', 'Fazreen Aina Natasha Binti Morfarizal', '001025081316', 5, 'ainatasha2510@gmail.com'),
(2018642926, 'aisyah', 'Nur Aisyah Farhanah Binti Kamaruddin', '001221100238', 5, 'aisyahfarhanah21@gmail.com'),
(2018676276, 'izzuddin', 'Muhammad Izzuddin Bin Mansor', '000109081079', 5, 'izzuitm@gmail.com'),
(2018802864, '1111', 'Emmirul Haziq Mohd Rashid', '000916100205', 5, 'emmirulmirul@gmail.com'),
(2019279802, 'idlan', 'Mohamad Idlan Nazmi Bin Mohammad', '010116060435', 3, NULL),
(2019424052, 'munif', 'Abdul Munif Bin Mohd Muhayeddin', '001118110649', 3, 'abdmuniif1@gmail.com'),
(2019429424, 'taufiq', 'Muhammad Taufiq Aiman Bin Mohamad Fauzi', '010905060569', 3, NULL),
(2019439582, 'syahir', 'Muhamad Syahir Zakwan Bin Mohd Yusof', '010405100093', 3, NULL),
(2019447598, 'afnan', 'Khairul Afnan Bin Ahmad Zamakhshari', '010201100163', 3, NULL),
(2020000001, 'haikal', 'Muhammad Haikal Bin Zulkifli', NULL, 1, NULL),
(2020000002, 'ain', 'Wan Nur Ain Nabihah Binti Murad', NULL, 1, NULL),
(2020000003, 'asyraaf', 'Asyraaf Rozami Bin Ayob', NULL, 1, NULL),
(2020000004, 'ziqri', 'Haziq Ziqri Bin Mat Rifin', NULL, 1, NULL),
(2020000005, 'hanis', 'Hanis Suraya Binti Mohd Isa', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentbill`
--

CREATE TABLE `studentbill` (
  `studentBillNo` bigint(13) NOT NULL,
  `studentID` int(10) NOT NULL,
  `statusID` int(1) NOT NULL,
  `billNo` int(3) NOT NULL,
  `receipt` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentbill`
--

INSERT INTO `studentbill` (`studentBillNo`, `studentID`, `statusID`, `billNo`, `receipt`) VALUES
(20184130261, 2018413026, 3, 1, ''),
(20184130262, 2018413026, 3, 2, ''),
(20184130263, 2018413026, 3, 3, ''),
(20184130264, 2018413026, 3, 4, ''),
(20184130265, 2018413026, 3, 5, ''),
(20184130266, 2018413026, 1, 6, ''),
(20186378021, 2018637802, 3, 1, ''),
(20186378022, 2018637802, 3, 2, ''),
(20186378023, 2018637802, 3, 3, ''),
(20186378024, 2018637802, 3, 4, ''),
(20186378025, 2018637802, 3, 5, ''),
(20186378026, 2018637802, 1, 6, ''),
(20186429261, 2018642926, 3, 1, ''),
(20186429262, 2018642926, 3, 2, ''),
(20186429263, 2018642926, 3, 3, ''),
(20186429264, 2018642926, 3, 4, ''),
(20186429265, 2018642926, 3, 5, ''),
(20186429266, 2018642926, 1, 6, ''),
(20186762761, 2018676276, 3, 1, ''),
(20186762762, 2018676276, 3, 2, ''),
(20186762763, 2018676276, 3, 3, ''),
(20186762764, 2018676276, 3, 4, ''),
(20186762765, 2018676276, 1, 5, ''),
(20186762766, 2018676276, 1, 6, ''),
(20188028641, 2018802864, 3, 1, ''),
(20188028642, 2018802864, 3, 2, ''),
(20188028643, 2018802864, 3, 3, ''),
(20188028644, 2018802864, 3, 4, ''),
(20188028645, 2018802864, 1, 5, ''),
(20188028646, 2018802864, 2, 6, ''),
(20192798023, 2019279802, 3, 3, ''),
(20192798024, 2019279802, 3, 4, ''),
(20192798025, 2019279802, 2, 5, ''),
(20192798026, 2019279802, 1, 6, ''),
(20194240523, 2019424052, 3, 3, ''),
(20194240524, 2019424052, 3, 4, ''),
(20194240525, 2019424052, 1, 5, ''),
(20194240526, 2019424052, 1, 6, ''),
(20194294243, 2019429424, 3, 3, ''),
(20194294244, 2019429424, 3, 4, ''),
(20194294245, 2019429424, 3, 5, ''),
(20194294246, 2019429424, 1, 6, ''),
(20194395823, 2019439582, 3, 3, ''),
(20194395824, 2019439582, 3, 4, ''),
(20194395825, 2019439582, 3, 5, ''),
(20194395826, 2019439582, 1, 6, ''),
(20194475983, 2019447598, 3, 3, ''),
(20194475984, 2019447598, 3, 4, ''),
(20194475985, 2019447598, 3, 5, ''),
(20194475986, 2019447598, 1, 6, ''),
(20200000015, 2020000001, 2, 5, ''),
(20200000016, 2020000001, 1, 6, ''),
(20200000025, 2020000002, 2, 5, ''),
(20200000026, 2020000002, 1, 6, ''),
(20200000035, 2020000003, 2, 5, ''),
(20200000036, 2020000003, 1, 6, ''),
(20200000045, 2020000004, 3, 5, ''),
(20200000046, 2020000004, 1, 6, ''),
(20200000055, 2020000005, 2, 5, ''),
(20200000056, 2020000005, 1, 6, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billNo`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `studentbill`
--
ALTER TABLE `studentbill`
  ADD PRIMARY KEY (`studentBillNo`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `statusID` (`statusID`),
  ADD KEY `billType` (`billNo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `admins` (`adminID`);

--
-- Constraints for table `studentbill`
--
ALTER TABLE `studentbill`
  ADD CONSTRAINT `studentbill_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`),
  ADD CONSTRAINT `studentbill_ibfk_2` FOREIGN KEY (`statusID`) REFERENCES `status` (`statusID`),
  ADD CONSTRAINT `studentbill_ibfk_3` FOREIGN KEY (`billNo`) REFERENCES `bill` (`billNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
