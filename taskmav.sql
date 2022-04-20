-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 05:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskmav`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_type`
--

CREATE TABLE `tbl_account_type` (
  `accountTypeID` int(11) NOT NULL,
  `accountType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_account_type`
--

INSERT INTO `tbl_account_type` (`accountTypeID`, `accountType`) VALUES
(1, 'Admin'),
(2, 'Team Leader'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `departmentID` int(11) NOT NULL,
  `departmentName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`departmentID`, `departmentName`) VALUES
(1, 'Project IT 26'),
(2, 'Project IT 27'),
(3, 'Project IT 28'),
(4, 'Project IT 29'),
(5, 'Project IT 1'),
(6, 'Project IT 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `notifID` int(10) NOT NULL,
  `notifTitle` varchar(255) NOT NULL,
  `notifDescription` varchar(255) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `receiverDepartment` int(11) NOT NULL,
  `dateSent` date NOT NULL,
  `isRead` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_notifications`
--

INSERT INTO `tbl_notifications` (`notifID`, `notifTitle`, `notifDescription`, `receiverID`, `receiverDepartment`, `dateSent`, `isRead`) VALUES
(32230739, 'New Project', 'A new project has been assigned to your team named TaskMAV', 0, 1, '2022-04-08', '0'),
(32230740, 'New Project', 'A new project has been assigned to your team named Try', 0, 1, '2022-04-19', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `projectID` int(9) NOT NULL,
  `projectTitle` varchar(255) NOT NULL,
  `projectDescription` varchar(255) NOT NULL,
  `projectStatus` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `departmentID` int(11) NOT NULL,
  `leaderUserID` int(11) NOT NULL,
  `projectProgress` int(11) DEFAULT NULL,
  `filePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`projectID`, `projectTitle`, `projectDescription`, `projectStatus`, `startDate`, `endDate`, `departmentID`, `leaderUserID`, `projectProgress`, `filePath`) VALUES
(32120957, 'Project Sample 2', 'A sample of a project description', 'Pending', '2022-03-01', '2022-03-15', 1, 3, 75, ''),
(32120958, 'Project Sample 3', 'Another project description example', 'Finished', '2022-03-04', '2022-03-11', 2, 4, 100, ''),
(32220633, 'Project Sample 1', 'Sample project description', 'Ongoing', '2022-03-21', '2022-03-31', 3, 7, 25, ''),
(32230659, 'Project Sample 4 ', 'Project Sample Description here', 'Ongoing', '2022-03-13', '2022-03-20', 2, 4, 0, ''),
(525654546, 'tryProject', 'tryDesc', 'Pending', '2022-03-29', '2022-03-31', 2, 3, 0, NULL),
(525654547, 'Project 1', 'Desc', 'Ongoing', '2022-03-29', '2022-04-08', 1, 3, 0, NULL),
(525654549, 'TryInput', 'Try', 'Ongoing', '2022-03-29', '2022-04-07', 1, 4, 0, NULL),
(525654550, 'New UI Project', 'New UI', 'Pending', '2022-04-04', '2022-04-29', 1, 4, 0, NULL),
(525654551, 'tryProject1', 'tryyyyy', 'Pending', '2022-04-04', '2022-04-18', 2, 3, 0, NULL),
(525654553, 'TaskMAV', 'Try', 'Pending', '2022-04-08', '2022-04-30', 1, 3, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE `tbl_reports` (
  `reportID` int(9) NOT NULL,
  `reportType` varchar(255) NOT NULL,
  `reportTitle` varchar(255) NOT NULL,
  `typeID` int(10) NOT NULL,
  `reportContent` varchar(255) NOT NULL,
  `reportDate` date NOT NULL,
  `reportStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`reportID`, `reportType`, `reportTitle`, `typeID`, `reportContent`, `reportDate`, `reportStatus`) VALUES
(32230723, 'Task Report 1\r\n', 'Finished Navigation Panel', 32230709, 'Today we have finished the navigation panel', '2022-03-22', 'Read'),
(32230726, 'Project Report 1', 'Finished Project Sample 3', 32120958, 'Project Sample 3 is completed as of today', '2022-03-10', 'Read'),
(32230728, 'Task Report 2', 'Database Progress', 32230712, 'Made progress with databae today', '2022-03-18', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `taskID` int(9) NOT NULL,
  `taskName` varchar(255) NOT NULL,
  `taskDescription` varchar(255) NOT NULL,
  `taskStatus` varchar(255) NOT NULL,
  `projectID` int(11) NOT NULL,
  `departmentID` int(11) NOT NULL,
  `filePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`taskID`, `taskName`, `taskDescription`, `taskStatus`, `projectID`, `departmentID`, `filePath`) VALUES
(32230709, 'Task Sample 1', 'Create the navigation panel', 'Completed', 32230659, 111111111, ''),
(32230712, 'Task Sample 2', 'Create the databases for the project', 'Ongoing', 32230659, 111111111, ''),
(32230721, 'Wireframes', 'Create initial design', 'Ongoing', 525654547, 1, ''),
(32230722, 'Task1', 'Task1', 'Ongoing', 525654549, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userID` int(9) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `departmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `lastName`, `firstName`, `middleName`, `email`, `phoneNumber`, `adress`, `role`, `departmentID`) VALUES
(1, 'Banasihan', 'Joshua Remmyl', 'Ferrer', 'banasihan@gmail.com', '0909090909', 'aadsadsdfa', '1', 5),
(2, 'Arriesgado', 'Bernard', 'Almero', 'barries@gmail.com', '09999999999', 'Maahas, Los Baños, Laguna', '1', 1),
(3, 'Cruz', 'Juan', 'Dela', 'juanDL@gmail.com', '09444444444', 'Address', '2', 1),
(4, 'Penduko', 'Pedro', 'Pandan', 'pedrop@gmail.com', '09222222222', 'Address', '2', 2),
(6, 'Sol', 'Richmond', 'Philip', 'richsol@gmail.com', '09090900909', 'Address', '3', 4),
(7, 'Divino', 'Sheila', 'Marie', 'sheiladiv@gmail.com', '09876543210', 'Address', '2', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_creds`
--

CREATE TABLE `tbl_user_creds` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `accountType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_creds`
--

INSERT INTO `tbl_user_creds` (`userID`, `username`, `password`, `accountType`) VALUES
(1, 'banasihan@gmail.com', '52fqSIMN', 1),
(2, 'admin', '1234', 1),
(3, 'juanDL@gmail.com', 'IQukzhlo', 2),
(4, 'pedrop@gmail.com', 'QcwrPAjL', 2),
(5, 'jdoe@gmail.com', '08ju1Pc7', 3),
(6, 'richsol@gmail.com', 'Sz26nmRf', 3),
(7, 'sheiladiv@gmail.com', 'oq70rnCA', 2),
(202281409, 'user', '1234', 3),
(202299214, 'leader', '1234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account_type`
--
ALTER TABLE `tbl_account_type`
  ADD PRIMARY KEY (`accountTypeID`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`notifID`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  ADD PRIMARY KEY (`reportID`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`taskID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `tbl_user_creds`
--
ALTER TABLE `tbl_user_creds`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account_type`
--
ALTER TABLE `tbl_account_type`
  MODIFY `accountTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `departmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `notifID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32230741;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `projectID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=525654555;

--
-- AUTO_INCREMENT for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  MODIFY `reportID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32230729;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `taskID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32230725;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
