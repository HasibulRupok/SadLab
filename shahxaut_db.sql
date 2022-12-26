-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2022 at 06:50 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shahxaut_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Sl` int(3) NOT NULL,
  `CURRENT_READING` float NOT NULL,
  `CURRENT_READINGA2` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Sl`, `CURRENT_READING`, `CURRENT_READINGA2`) VALUES
(0, 40000, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `bus_location`
--

CREATE TABLE `bus_location` (
  `ID` int(5) NOT NULL,
  `timestemp` timestamp NOT NULL DEFAULT current_timestamp(),
  `latitude` varchar(10) NOT NULL,
  `longitude` varchar(10) NOT NULL,
  `Activity` text NOT NULL DEFAULT 'false',
  `total_booked` int(3) NOT NULL,
  `B_Power` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_location`
--

INSERT INTO `bus_location` (`ID`, `timestemp`, `latitude`, `longitude`, `Activity`, `total_booked`, `B_Power`) VALUES
(1, '2022-05-21 15:52:14', '23.797298', '90.450202', 'false', 40, 'ON'),
(2, '2022-05-21 15:52:14', '23.797117', '90.449392', 'true', 10, 'OFF');

-- --------------------------------------------------------

--
-- Table structure for table `bus_sit_booking`
--

CREATE TABLE `bus_sit_booking` (
  `ID` int(5) NOT NULL,
  `Bus_ID` int(5) NOT NULL,
  `Time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `Booked_Sit` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`Booked_Sit`)),
  `Time_Schedule` time NOT NULL,
  `Driver_Name` text NOT NULL,
  `Driver_Phone` varchar(11) NOT NULL,
  `Type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_sit_booking`
--

INSERT INTO `bus_sit_booking` (`ID`, `Bus_ID`, `Time`, `Booked_Sit`, `Time_Schedule`, `Driver_Name`, `Driver_Phone`, `Type`) VALUES
(1, 1, '2022-04-18 22:14:42.099245', '40', '07:13:09', 'Kamal', '', 'Shuttle'),
(3, 2, '2022-04-18 22:13:43.078051', '120', '00:00:00', 'Abul', '', 'BRTC_Shuttle');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(5) NOT NULL,
  `cus_acc_no` int(6) NOT NULL,
  `f_wings_id` int(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `paid` int(6) NOT NULL,
  `due` int(6) NOT NULL,
  `credit_limit` int(6) NOT NULL,
  `is_credit_check` int(6) NOT NULL,
  `paid_status` varchar(10) NOT NULL,
  `opening_due` int(6) NOT NULL,
  `opening_due_date` date NOT NULL,
  `opening_due_complete` int(6) NOT NULL,
  `insert_by` varchar(20) NOT NULL,
  `insert_date_time` datetime NOT NULL,
  `update_by` varchar(30) NOT NULL,
  `update_date_time` datetime NOT NULL,
  `last_action_user_id` int(6) NOT NULL,
  `last_action_time` datetime NOT NULL,
  `last_action_name` varchar(20) NOT NULL,
  `is_corporate` int(6) NOT NULL,
  `is_individual_price` int(6) NOT NULL,
  `f_customer_group_id` varchar(6) NOT NULL,
  `is_customer_group` int(6) NOT NULL,
  `is_customer_category` int(6) NOT NULL,
  `f_customer_department_id` int(6) NOT NULL,
  `is_product` int(6) NOT NULL,
  `is_exist` int(6) NOT NULL,
  `is_active` int(6) NOT NULL,
  `is_void` int(6) NOT NULL,
  `f_client_id` int(6) NOT NULL,
  `file_upload` text NOT NULL,
  `status` int(6) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `is_regular` int(6) NOT NULL,
  `remarks` text NOT NULL,
  `customer_group` varchar(6) NOT NULL,
  `sister_wings_setup` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_category`
--

CREATE TABLE `customer_category` (
  `id` int(11) NOT NULL,
  `customer_category_name_en` varchar(30) NOT NULL,
  `customer_category_name_bn` varchar(30) NOT NULL,
  `customer_category_code` varchar(20) NOT NULL,
  `insert_by` varchar(30) NOT NULL,
  `insert_date_time` datetime NOT NULL,
  `update_by` varchar(30) NOT NULL,
  `update_date_time` datetime NOT NULL,
  `last_action_user_id` int(11) NOT NULL,
  `last_action_time` datetime NOT NULL,
  `last_action_name` varchar(11) NOT NULL,
  `is_exist` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_void` int(11) NOT NULL,
  `f_client_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donartab`
--

CREATE TABLE `donartab` (
  `ID` int(3) NOT NULL,
  `Donar_Name` varchar(30) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `Payment_Method` varchar(30) NOT NULL,
  `Amount` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donartab`
--

INSERT INTO `donartab` (`ID`, `Donar_Name`, `Date`, `Payment_Method`, `Amount`) VALUES
(1, 'Shah Newaz Aziz', '10-05-2022', 'DBBL', '10000'),
(2, 'John Doe', '12-05-2022', 'DBBL', '15000'),
(3, 'Sheikh Saadi', '22-05-2022', 'DBBL', '25000'),
(4, 'ShahNaz Rahman', '15-05-2022', 'BKash', '30000'),
(5, 'Azizur Rahman', '15-05-2022', 'Paypal', '45000');

-- --------------------------------------------------------

--
-- Table structure for table `faied`
--

CREATE TABLE `faied` (
  `Sl` int(5) NOT NULL,
  `DeviceID` int(5) NOT NULL,
  `N` varchar(5) NOT NULL,
  `R` int(5) NOT NULL,
  `R1` int(5) NOT NULL,
  `T` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faied`
--

INSERT INTO `faied` (`Sl`, `DeviceID`, `N`, `R`, `R1`, `T`) VALUES
(1439, 10001, 'A', 200, 200, '1656064315'),
(1440, 10001, 'A', 200, 200, '1656064316'),
(1441, 10001, 'A', 200, 200, '1656064317'),
(1442, 10001, 'A', 200, 201, '1656064318'),
(1443, 10001, 'A', 200, 200, '1656064393'),
(1444, 10001, 'A', 200, 200, '1656064394'),
(1445, 10001, 'A', 200, 200, '1656064395'),
(1446, 10001, 'A', 200, 201, '1656064396'),
(1447, 10002, 'B', 1419, 1419, '1656064665'),
(1448, 10002, 'A', 1498, 1497, '1656065453'),
(1449, 10002, 'A', 523, 524, '1656074213'),
(1450, 10002, 'A', 523, 524, '1656074228'),
(1451, 10002, 'A', 523, 524, '1656074261'),
(1452, 10002, 'A', 1197, 1197, '1656074485'),
(1453, 10002, 'A', 1197, 1197, '1656074485'),
(1454, 10002, 'A', 263, 263, '1656074714'),
(1455, 10002, 'A', 263, 263, '1656074732'),
(1456, 10002, 'A', 263, 263, '1656074735'),
(1457, 10002, 'B', 1673, 1673, '1656077013'),
(1458, 10002, 'B', 1673, 1673, '1656077025'),
(1459, 10002, 'B', 374, 374, '1656080078'),
(1460, 10001, 'A', 234, 234, '1656121776'),
(1461, 10002, 'B', 1793, 1793, '1656123135'),
(1462, 10002, 'B', 2510, 2509, '1656123777'),
(1463, 10002, 'A', 374, 374, '1656126567'),
(1464, 10002, 'A', 374, 374, '1656126575'),
(1465, 10002, 'A', 374, 374, '1656126579'),
(1466, 10001, 'B', 100, 100, '1656127183'),
(1467, 10001, 'B', 70, 70, '1656127906'),
(1468, 10002, 'A', 599, 599, '1656127987'),
(1469, 10001, 'A', 2823, 2823, '1656128143'),
(1470, 10001, 'B', 334, 334, '1656128235'),
(1471, 10003, 'A', 374, 374, '1656129006'),
(1472, 10003, 'A', 374, 374, '1656129007'),
(1473, 10003, 'A', 374, 374, '1656129008'),
(1474, 10002, 'A', 2097, 2097, '1656129129');

-- --------------------------------------------------------

--
-- Table structure for table `otp_config`
--

CREATE TABLE `otp_config` (
  `ID` int(5) NOT NULL,
  `Student_ID` int(9) NOT NULL,
  `OTP` int(6) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shuttle_sit`
--

CREATE TABLE `shuttle_sit` (
  `Sl` int(3) NOT NULL,
  `seat_number` varchar(30) NOT NULL,
  `seat_column` varchar(30) NOT NULL,
  `seat_row` varchar(30) NOT NULL,
  `seat_floor` varchar(30) NOT NULL,
  `ticket_status` varchar(20) NOT NULL,
  `is_selected_for_booking` varchar(20) NOT NULL,
  `seatAvailable` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shuttle_sit`
--

INSERT INTO `shuttle_sit` (`Sl`, `seat_number`, `seat_column`, `seat_row`, `seat_floor`, `ticket_status`, `is_selected_for_booking`, `seatAvailable`) VALUES
(1, 'A1', '1', '1', '1', '0', '1', '0'),
(10, 'A10', '1', '1', '10', '0', '1', '0'),
(2, 'A2', '1', '1', '2', '0', '1', '0'),
(3, 'A3', '1', '1', '3', '0', '1', '0'),
(4, 'A4', '1', '1', '4', '0', '1', '0'),
(5, 'A5', '1', '1', '5', '0', '1', '0'),
(6, 'A6', '1', '1', '6', '0', '1', '0'),
(7, 'A7', '1', '1', '7', '0', '1', '0'),
(8, 'A8', '1', '1', '8', '0', '1', '0'),
(9, 'A9', '1', '1', '9', '0', '1', '0'),
(11, 'B1', '1', '2', '1', '0', '1', '0'),
(20, 'B10', '1', '2', '10', '0', '1', '0'),
(12, 'B2', '1', '2', '2', '0', '1', '0'),
(13, 'B3', '1', '2', '3', '0', '1', '0'),
(14, 'B4', '1', '2', '4', '0', '1', '0'),
(15, 'B5', '1', '2', '5', '0', '1', '0'),
(16, 'B6', '1', '2', '6', '0', '1', '0'),
(17, 'B7', '1', '2', '7', '0', '1', '0'),
(18, 'B8', '1', '2', '8', '0', '1', '0'),
(19, 'B9', '1', '2', '9', '0', '1', '0'),
(21, 'C1', '1', '3', '1', '0', '1', '0'),
(30, 'C10', '1', '3', '10', '0', '1', '0'),
(22, 'C2', '1', '3', '2', '0', '1', '0'),
(23, 'C3', '1', '3', '3', '0', '1', '0'),
(24, 'C4', '1', '3', '4', '0', '1', '0'),
(25, 'C5', '1', '3', '5', '0', '1', '0'),
(26, 'C6', '1', '3', '6', '0', '1', '0'),
(27, 'C7', '1', '3', '7', '0', '1', '0'),
(28, 'C8', '1', '3', '8', '0', '1', '0'),
(29, 'C9', '1', '3', '9', '0', '1', '0'),
(31, 'D1', '1', '4', '1', '0', '1', '0'),
(40, 'D10', '1', '4', '10', '0', '1', '0'),
(32, 'D2', '1', '4', '2', '0', '1', '0'),
(33, 'D3', '1', '4', '3', '0', '1', '0'),
(34, 'D4', '1', '4', '4', '0', '1', '0'),
(35, 'D5', '1', '4', '5', '0', '1', '0'),
(36, 'D6', '1', '4', '6', '0', '1', '0'),
(37, 'D7', '1', '4', '7', '0', '1', '0'),
(38, 'D8', '1', '4', '8', '0', '1', '0'),
(39, 'D9', '1', '4', '9', '0', '1', '0'),
(41, 'E1', '1', '5', '1', '0', '1', '0'),
(50, 'E10', '1', '5', '10', '0', '1', '0'),
(42, 'E2', '1', '5', '2', '0', '1', '0'),
(43, 'E3', '1', '5', '3', '0', '1', '0'),
(44, 'E4', '1', '5', '4', '0', '1', '0'),
(45, 'E5', '1', '5', '5', '0', '1', '0'),
(46, 'E6', '1', '5', '6', '0', '1', '0'),
(47, 'E7', '1', '5', '7', '0', '1', '0'),
(48, 'E8', '1', '5', '8', '0', '1', '0'),
(49, 'E9', '1', '5', '9', '0', '1', '0'),
(51, 'F1', '1', '6', '1', '0', '1', '0'),
(60, 'F10', '1', '6', '10', '0', '1', '0'),
(52, 'F2', '1', '6', '2', '0', '1', '0'),
(53, 'F3', '1', '6', '3', '0', '1', '0'),
(54, 'F4', '1', '6', '4', '0', '1', '0'),
(55, 'F5', '1', '6', '5', '0', '1', '0'),
(56, 'F6', '1', '6', '6', '0', '1', '0'),
(57, 'F7', '1', '6', '7', '0', '1', '0'),
(58, 'F8', '1', '6', '8', '0', '1', '0'),
(59, 'F9', '1', '6', '9', '0', '1', '0'),
(61, 'G1', '1', '7', '1', '0', '1', '0'),
(70, 'G10', '1', '7', '10', '0', '1', '0'),
(62, 'G2', '1', '7', '2', '0', '1', '0'),
(63, 'G3', '1', '7', '3', '0', '1', '0'),
(64, 'G4', '1', '7', '4', '0', '1', '0'),
(65, 'G5', '1', '7', '5', '0', '1', '0'),
(66, 'G6', '1', '7', '6', '0', '1', '0'),
(67, 'G7', '1', '7', '7', '0', '1', '0'),
(68, 'G8', '1', '7', '8', '0', '1', '0'),
(69, 'G9', '1', '7', '9', '0', '1', '0'),
(71, 'H1', '1', '8', '1', '0', '1', '0'),
(80, 'H10', '1', '8', '10', '0', '1', '0'),
(72, 'H2', '1', '8', '2', '0', '1', '0'),
(73, 'H3', '1', '8', '3', '0', '1', '0'),
(74, 'H4', '1', '8', '4', '0', '1', '0'),
(75, 'H5', '1', '8', '5', '0', '1', '0'),
(76, 'H6', '1', '8', '6', '0', '1', '0'),
(77, 'H7', '1', '8', '7', '0', '1', '0'),
(78, 'H8', '1', '8', '8', '0', '1', '0'),
(79, 'H9', '1', '8', '9', '0', '1', '0'),
(81, 'I1', '1', '9', '1', '0', '1', '0'),
(90, 'I10', '1', '9', '10', '0', '1', '0'),
(82, 'I2', '1', '9', '2', '0', '1', '0'),
(83, 'I3', '1', '9', '3', '0', '1', '0'),
(84, 'I4', '1', '9', '4', '0', '1', '0'),
(85, 'I5', '1', '9', '5', '0', '1', '0'),
(86, 'I6', '1', '9', '6', '0', '1', '0'),
(87, 'I7', '1', '9', '7', '0', '1', '0'),
(88, 'I8', '1', '9', '8', '0', '1', '0'),
(89, 'I9', '1', '9', '9', '0', '1', '0'),
(91, 'J1', '0', '10', '1', '0', '1', '0'),
(100, 'J10', '1', '10', '10', '0', '1', '0'),
(92, 'J2', '0', '10', '2', '0', '1', '0'),
(93, 'J3', '0', '10', '3', '0', '1', '0'),
(94, 'J4', '0', '10', '4', '0', '1', '0'),
(95, 'J5', '0', '10', '5', '0', '1', '0'),
(96, 'J6', '0', '10', '6', '0', '1', '0'),
(97, 'J7', '0', '10', '7', '0', '1', '0'),
(98, 'J8', '0', '10', '8', '0', '1', '0'),
(99, 'J9', '0', '10', '9', '0', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `time_schedule`
--

CREATE TABLE `time_schedule` (
  `Sl` int(3) NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Booked` int(9) NOT NULL,
  `SitRemain` int(9) NOT NULL,
  `Status` varchar(9) NOT NULL,
  `isFree` varchar(20) NOT NULL DEFAULT 'true',
  `BookedJson` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`BookedJson`)),
  `Location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_schedule`
--

INSERT INTO `time_schedule` (`Sl`, `Time`, `Booked`, `SitRemain`, `Status`, `isFree`, `BookedJson`, `Location`) VALUES
(1, '(7.30-8.45) AM', 40, 10, 'Waiting', 'true', '{\"A1\":1,\"A2\":1,\"A3\":0,\"A4\":1,\"A5\":1,\"B1\":1,\"B2\":1,\"B3\":0,\"B4\":0,\"B5\":1,\"C1\":0,\"C2\":0,\"C3\":0,\"C4\":1,\"C5\":1,\"D1\":1,\"D2\":1,\"D3\":0,\"D4\":0,\"D5\":0,\"E1\":0,\"E2\":0,\"E3\":0,\"E4\":0,\"E5\":1,\"F1\":0,\"F2\":0,\"F3\":0,\"F4\":0,\"F5\":0,\"G1\":0,\"G2\":1,\"G3\":0,\"G4\":0,\"G5\":0,\"H1\":0,\"H2\":1,\"H3\":1,\"H4\":0,\"H5\":1,\"I1\":0,\"I2\":0,\"I3\":0,\"I4\":1,\"I5\":1,\"J1\":1,\"J2\":1,\"J3\":1,\"J4\":1,\"J5\":1}', 'Cox\'s Bazar'),
(2, ' 09.45 AM', 48, 2, 'Upcoming', 'true', '{    \"A1\":0,    \"A2\":0,    \"A3\":0,    \"A4\":0,  \"A5\":0,   \"B1\":1,    \"B2\":1,    \"B3\":0,    \"B4\":0, \"B5\":0,     \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0, \"C5\":0,   \"D1\":1,    \"D2\":1,    \"D3\":0,    \"D4\":0,  \"D5\":0,   \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,  \"E5\":0,   \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,   \"F5\":0,  \"G1\":0,    \"G2\":1,    \"G3\":0,    \"G4\":0,  \"G5\":0,  \"H1\":0,    \"H2\":1,    \"H3\":1,    \"H4\":0,   \"H5\":1,  \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":1,  \"I5\":0,  \"J1\":1,    \"J2\":1,    \"J3\":1,    \"J4\":1,    \"J5\":1 }', 'Sajek Valley'),
(3, '11.20 AM', 10, 40, 'Upcoming', 'true', '{    \"A1\":1,    \"A2\":1,    \"A3\":1,    \"A4\":1,    \"B1\":1,    \"B2\":1,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":1,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":1,    \"H3\":1,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":1,    \"J4\":1,    \"J5\":1 }', 'Sajek Valley'),
(4, '01.10 PM', 30, 0, 'Upcoming', 'true', '{    \"A1\":1,    \"A2\":1,    \"A3\":1,    \"A4\":1,    \"B1\":1,    \"B2\":1,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":1,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":1,    \"H3\":1,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":1,    \"J4\":1,    \"J5\":1 }', 'Sundarbans'),
(5, '02.40 PM', 0, 0, 'Upcoming', 'true', '{    \"A1\":1,    \"A2\":1,    \"A3\":1,    \"A4\":1,    \"B1\":1,    \"B2\":1,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":1,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":1,    \"H3\":1,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":1,    \"J4\":1,    \"J5\":1 }', 'Tanguar Haor'),
(6, '3.15 PM', 0, 0, 'Upcoming', 'true', '{    \"A1\":1,    \"A2\":1,    \"A3\":1,    \"A4\":1,    \"B1\":1,    \"B2\":1,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":1,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":1,    \"H3\":1,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":1,    \"J4\":1,    \"J5\":1 }', 'Saint Martin'),
(7, '4.20 PM', 0, 0, 'Upcoming', 'true', '{    \"A1\":1,    \"A2\":1,    \"A3\":1,    \"A4\":1,    \"B1\":1,    \"B2\":1,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":1,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":1,    \"H3\":1,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":1,    \"J4\":1,    \"J5\":1 }', 'Sajek Valley'),
(8, '5.45 PM', 0, 0, 'Upcoming', 'true', '{    \"A1\":1,    \"A2\":1,    \"A3\":1,    \"A4\":1,    \"B1\":1,    \"B2\":1,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":1,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":1,    \"H3\":1,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":1,    \"J4\":1,    \"J5\":1 }', 'Rangamati'),
(9, '9.00 PM', 10, 0, 'Upcoming', 'true', '{    \"A1\":1,    \"A2\":1,    \"A3\":1,    \"A4\":1,    \"B1\":1,    \"B2\":1,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":1,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":1,    \"H3\":1,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":1,    \"J4\":1,    \"J5\":1 }', 'Cox\'s Bazar');

-- --------------------------------------------------------

--
-- Table structure for table `time_schedule_paid`
--

CREATE TABLE `time_schedule_paid` (
  `Sl` int(3) NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Booked` int(9) NOT NULL,
  `SitRemain` int(9) NOT NULL,
  `Status` varchar(9) NOT NULL,
  `isFree` varchar(20) NOT NULL DEFAULT 'true',
  `Location` varchar(30) NOT NULL,
  `BookedJson` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`BookedJson`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_schedule_paid`
--

INSERT INTO `time_schedule_paid` (`Sl`, `Time`, `Booked`, `SitRemain`, `Status`, `isFree`, `Location`, `BookedJson`) VALUES
(1, '(7.30-8.45) AM', 10, 40, 'Waiting', 'true', 'Route 1 - UIU', '{    \"A1\":1,    \"A2\":1,    \"A3\":1,    \"A4\":1,    \"B1\":0,    \"B2\":0,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":1,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":1,    \"H3\":1,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":1,    \"J4\":1,    \"J5\":1 }'),
(2, ' 09.45 AM', 0, 50, 'Upcoming', 'true', 'UIU - Route 1', '{    \"A1\":0,    \"A2\":0,    \"A3\":0,    \"A4\":0,    \"B1\":0,    \"B2\":0,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":0,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":0,    \"H3\":0,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":0,    \"J4\":0,    \"J5\":0 }'),
(3, '11.20 AM', 0, 50, 'Upcoming', 'true', 'Route 1 - UIU', '{    \"A1\":0,    \"A2\":0,    \"A3\":0,    \"A4\":0,    \"B1\":0,    \"B2\":0,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":0,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":0,    \"H3\":0,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":0,    \"J4\":0,    \"J5\":0 }'),
(4, '01.10 PM', 0, 50, 'Upcoming', 'true', 'Route 2 - UIU', '{    \"A1\":0,    \"A2\":0,    \"A3\":0,    \"A4\":0,    \"B1\":0,    \"B2\":0,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":0,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":0,    \"H3\":0,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":0,    \"J4\":0,    \"J5\":0 }'),
(5, '02.40 PM', 0, 50, 'Upcoming', 'true', 'UIU - Route2', '{    \"A1\":0,    \"A2\":0,    \"A3\":0,    \"A4\":0,    \"B1\":0,    \"B2\":0,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":0,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":0,    \"H3\":0,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":0,    \"J4\":0,    \"J5\":0 }'),
(6, '3.15 PM', 0, 50, 'Upcoming', 'true', 'Route 2 - UIU', '{    \"A1\":0,    \"A2\":0,    \"A3\":0,    \"A4\":0,    \"B1\":0,    \"B2\":0,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":0,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":0,    \"H3\":0,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":0,    \"J4\":0,    \"J5\":0 }'),
(7, '4.20 PM', 0, 50, 'Upcoming', 'true', 'Route 1 - UIU', '{    \"A1\":0,    \"A2\":0,    \"A3\":0,    \"A4\":0,    \"B1\":0,    \"B2\":0,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":0,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":0,    \"H3\":0,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":0,    \"J4\":0,    \"J5\":0 }'),
(8, '5.45 PM', 0, 50, 'Upcoming', 'true', 'UIU - Route 1', '{    \"A1\":0,    \"A2\":0,    \"A3\":0,    \"A4\":0,    \"B1\":0,    \"B2\":0,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":0,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":0,    \"H3\":0,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":0,    \"J4\":0,    \"J5\":0 }'),
(9, '9.00 PM', 0, 50, 'Upcoming', 'true', 'UIU - Route2', '{    \"A1\":0,    \"A2\":0,    \"A3\":0,    \"A4\":0,    \"B1\":0,    \"B2\":0,    \"B3\":0,    \"B4\":0,    \"C1\":0,    \"C2\":0,    \"C3\":0,    \"C4\":0,    \"D1\":0,    \"D2\":0,    \"D3\":0,    \"D4\":0,    \"E1\":0,    \"E2\":0,    \"E3\":0,    \"E4\":0,    \"F1\":0,    \"F2\":0,    \"F3\":0,    \"F4\":0,    \"G1\":0,    \"G2\":0,    \"G3\":0,    \"G4\":0,    \"H1\":0,    \"H2\":0,    \"H3\":0,    \"H4\":0,    \"I1\":0,    \"I2\":0,    \"I3\":0,    \"I4\":0,    \"J1\":0,    \"J2\":0,    \"J3\":0,    \"J4\":0,    \"J5\":0 }');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `No` int(5) NOT NULL,
  `Student_ID` varchar(9) NOT NULL,
  `FName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pass` varchar(11) NOT NULL,
  `img_url` text DEFAULT NULL,
  `join_time` date NOT NULL,
  `Verified` text NOT NULL DEFAULT 'false',
  `Location` varchar(30) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `AccesType` varchar(30) NOT NULL DEFAULT 'employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`No`, `Student_ID`, `FName`, `Email`, `Pass`, `img_url`, `join_time`, `Verified`, `Location`, `Phone`, `AccesType`) VALUES
(1, '011201437', 'Shah Newaz Aziz', 'saziz201437@bscse.uiu.ac.bd', '1345', 'assets/User/shah.jpeg', '2022-04-29', 'True', 'Natun Bazar', '01774307401', 'employee'),
(2, '011201433', 'Shah Newaz', 'mrroktimroktim@gmail.com', '11201437', NULL, '2022-04-30', 'false', '0', '', 'employee'),
(3, '011201435', 'Shah Newaz', 'mrsroktimroktim@gmail.com', '1234', NULL, '2022-04-30', 'false', '0', '', 'employee'),
(5, '123', 'Shah Newaz Aziz', 'admin@gmail.com', '1234', NULL, '2022-05-23', 'true', 'NatunBazar', '01774307401', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Sl`);

--
-- Indexes for table `bus_location`
--
ALTER TABLE `bus_location`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `donartab`
--
ALTER TABLE `donartab`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `faied`
--
ALTER TABLE `faied`
  ADD PRIMARY KEY (`Sl`);

--
-- Indexes for table `otp_config`
--
ALTER TABLE `otp_config`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `shuttle_sit`
--
ALTER TABLE `shuttle_sit`
  ADD PRIMARY KEY (`seat_number`),
  ADD UNIQUE KEY `Sl` (`Sl`);

--
-- Indexes for table `time_schedule`
--
ALTER TABLE `time_schedule`
  ADD PRIMARY KEY (`Sl`);

--
-- Indexes for table `time_schedule_paid`
--
ALTER TABLE `time_schedule_paid`
  ADD PRIMARY KEY (`Sl`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`No`),
  ADD UNIQUE KEY `Student_ID` (`Student_ID`,`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donartab`
--
ALTER TABLE `donartab`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faied`
--
ALTER TABLE `faied`
  MODIFY `Sl` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1475;

--
-- AUTO_INCREMENT for table `otp_config`
--
ALTER TABLE `otp_config`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shuttle_sit`
--
ALTER TABLE `shuttle_sit`
  MODIFY `Sl` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
