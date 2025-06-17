-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: feb24, 2024 at 10:29 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555556, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-02-01 08:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomputers`
--

CREATE TABLE `tblcomputers` (
  `ID` int(10) NOT NULL,
  `ComputerName` varchar(120) DEFAULT NULL,
  `ComputerLocation` varchar(120) DEFAULT NULL,
  `IPAdd` varchar(120) DEFAULT NULL,
  `EntryDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomputers`
--

INSERT INTO `tblcomputers` (`ID`, `ComputerName`, `ComputerLocation`, `IPAdd`, `EntryDate`) VALUES
(1, 'Acer', 'Cabin101', '127.0.0.1', '2024-02-01 09:25:58'),
(2, 'ASUS', 'Cabin102', '127.0.0.2', '2024-02-01 09:26:37'),
(3, 'DELL', 'Cabin103', '127.0.0.2', '2024-02-01 09:27:04'),
(4, 'DELL', 'Cabin104', '127.0.0.3', '2024-02-01 09:30:40'),
(5, 'Asus Gaming Laptop', 'Cabin 10', '127.0.0.01', '2024-02-03 07:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblfee`
--

CREATE TABLE `tblfee` (
  `ID` int(11) NOT NULL,
  `username` varchar(120) DEFAULT NULL,
  `usage_time` time DEFAULT NULL,
  `bill_amount` int(11) DEFAULT NULL,
  `extra_amount` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfee`
--
INSERT INTO `tblfee` (`username`, `usage_time`, `bill_amount`, `extra_amount`, `total_amount`, `ID`) VALUES ('raju', '01:00:00', '200', '50', '250', '1'),
 ('kruthi uj', '00:30:00', '50', '55', '155', 4);



--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `ID` int(10) NOT NULL,
  `EntryID` varchar(20) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `UserAddress` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `ComputerName` varchar(120) DEFAULT NULL,
  `IDProof` varchar(120) DEFAULT NULL,
  `InTime` timestamp NULL DEFAULT current_timestamp(),
  `OutTime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Fees` varchar(120) DEFAULT NULL,
  `Remark` varchar(120) DEFAULT NULL,
  `Status` varchar(20) NOT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`ID`, `EntryID`, `UserName`, `UserAddress`, `MobileNumber`, `Email`, `ComputerName`, `IDProof`, `InTime`, `OutTime`, `Fees`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, '1', 'nishanth u', 'shivamogga', 4646464646, 'abc@gmail.com', 'Dell', 'EG5866655', '2019-07-31 18:30:00', '2024-02-03 07:58:17', '20', 'Ok', 'Out', '2024-08-03 07:58:17'),
(2, '2', 'karthik', 'Thirthahalli', 6546464646, 'shanu@gmail.com', 'ASUS', 'FG9777977', '2024-03-01 18:30:00', '2024-02-03 07:58:20', NULL, NULL, '', '2024-08-03 07:58:20'),
(3, '3', 'varun', 'shivamogga', 7575757575, 'v@gmail.com', 'Acer', 'et686876878', '2024-02-03 05:44:06', '2024-02-03 05:44:42', '80', 'Ok', 'Out', '2024-08-03 05:44:42'),
(4, '4', 'tejas', 'Honnali', 1234567890, 'tejas@test.com', 'Asus Gaming Laptop', '184716461', '2024-02-03 07:55:41', '2024-02-03 07:56:30', '30', 'Check out', 'Out', '2024-02-03 07:56:30');

--
-- Indexes for dumped tables
--

CREATE TABLE `tblmembership` (
`ID` int(10) NOT NULL,
  `M_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Plan_name` varchar(50) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmembership`
--

INSERT INTO `tblmembership` (`ID`,`M_id`, `username`, `Plan_name`, `Start_date`, `End_date`) VALUES
(1,11, 'nishanth', 'PLAN_A', '2024-02-01', '2024-02-29'),
(2,12, 'kruthi', 'PLAN_A', '2024-02-01', '2024-02-29'),

(3,15, 'ram', 'PLAN_A', '2024-02-15', '2024-03-14');

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcomputers`
--
ALTER TABLE `tblcomputers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `tblfee`
  ADD PRIMARY KEY (`ID`);
  
  ALTER TABLE `tblmembership`
  ADD PRIMARY KEY (`ID`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcomputers`
--
ALTER TABLE `tblcomputers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
  
  ALTER TABLE `tblfee`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

ALTER TABLE `tblmembership`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  
  ALTER TABLE `tblfee` CHANGE `usage_time` `usage_time` DECIMAL(5,2) NULL DEFAULT NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE VIEW `limited_multi_table_view` AS
SELECT
    u.`UserName`,
    u.`UserAddress`,
    u.`ComputerName`,
    a.`AdminName` AS `AssignedAdminName`,
    c.`ComputerLocation` AS `AssignedComputerLocation`
FROM
    `tblusers` u
JOIN
    `tblcomputers` c ON u.`ComputerName` = c.`ComputerName`
JOIN
    `tbladmin` a ON u.`UserName` = a.`UserName`;


DELIMITER //
CREATE TRIGGER `tbladmin_before_insert` BEFORE INSERT ON `tbladmin`
FOR EACH ROW
SET NEW.`AdminRegdate` = IFNULL(NEW.`AdminRegdate`, CURRENT_TIMESTAMP());
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER `tblcomputers_before_insert` BEFORE INSERT ON `tblcomputers`
FOR EACH ROW
SET NEW.`EntryDate` = IFNULL(NEW.`EntryDate`, CURRENT_TIMESTAMP());
//
DELIMITER ;


