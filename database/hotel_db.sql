-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 06:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_payments`
--

CREATE TABLE `cash_payments` (
  `invoice_ID` varchar(10) NOT NULL,
  `amount_received` float NOT NULL,
  `amount_change` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_payments`
--

CREATE TABLE `credit_payments` (
  `invoice_ID` varchar(10) NOT NULL,
  `card_fName` varchar(50) NOT NULL,
  `card_lName` varchar(50) NOT NULL,
  `card_number` varchar(30) NOT NULL,
  `card_expire_date` date NOT NULL COMMENT 'the card expires at the end of the month. We have to use the statement "SELECT LAST_DAY(Date)" to select and compare with the current date.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `credit_payments`
--

INSERT INTO `credit_payments` (`invoice_ID`, `card_fName`, `card_lName`, `card_number`, `card_expire_date`) VALUES
('INV001', 'Rujikorn', 'Rujitanont', '1111-2222-3333-4444', '2023-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `customer_ID` varchar(10) NOT NULL COMMENT 'Customer ID with auto increment from customer_seq table',
  `customer_fName` varchar(50) NOT NULL COMMENT 'Customer''s first name',
  `customer_lName` varchar(50) NOT NULL COMMENT 'Customer''s last name',
  `customer_email` varchar(100) NOT NULL COMMENT 'Customer''s e-mail',
  `customer_phone` varchar(20) NOT NULL COMMENT 'Customer''s phone number',
  `customer_gender` enum('Male','Female','Others','Not Specified') NOT NULL COMMENT 'Customer''s gender'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Customer Information table';

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`customer_ID`, `customer_fName`, `customer_lName`, `customer_email`, `customer_phone`, `customer_gender`) VALUES
('CUS001', 'Rujikorn', 'Rujitanont', 'rujikornkin96@gmail.com', '0989369396', 'Male'),
('CUS002', 'Buss', 'Nuttawat', 'superbuss@gmail.com', '0987654321', 'Male'),
('CUS003', 'Jennie', 'Kim', 'jennieblackpink@gmail.com', '0987899988', 'Female'),
('CUS004', 'Jiso', 'Kim', 'jisoblackpink@gmail.com', '0999999999', 'Female');

--
-- Triggers `customer_info`
--
DELIMITER $$
CREATE TRIGGER `tg_customer_info_insert` BEFORE INSERT ON `customer_info` FOR EACH ROW BEGIN
  INSERT INTO customer_seq VALUES (NULL);
  SET NEW.customer_ID = CONCAT('CUS', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_seq`
--

CREATE TABLE `customer_seq` (
  `id` int(11) NOT NULL COMMENT 'sequence order of customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Customer Sequence table';

--
-- Dumping data for table `customer_seq`
--

INSERT INTO `customer_seq` (`id`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `customer_user_password`
--

CREATE TABLE `customer_user_password` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL COMMENT 'encoded password',
  `customer_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_user_password`
--

INSERT INTO `customer_user_password` (`username`, `password`, `customer_ID`) VALUES
('jennieblackpink@gmail.com', '8a4b93ff76664d996ccfb95aacc412bc', 'CUS003'),
('jisoblackpink@gmail.com', '7291db7da4e1d3ad82d129da6c6a2c0a', 'CUS004'),
('rujikornkin96@gmail.com', '3ac7871e73cb71a993b47cac2cec3766', 'CUS001'),
('superbuss@gmail.com', 'b1533e735004f2ae425c21eb0bc30452', 'CUS002');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_info`
--

CREATE TABLE `hotel_info` (
  `hotel_ID` varchar(10) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `hotel_address` text NOT NULL,
  `hotel_email` varchar(100) NOT NULL,
  `hotel_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`hotel_ID`, `hotel_name`, `hotel_address`, `hotel_email`, `hotel_phone`) VALUES
('HOT001', 'The Saturn @ Pattaya', '99/99, Moo 9, Muang Pattaya, Bang Lamung District, Chonburi, 20260', 'TheSaturnHotel.pattaya@saturn.com', '0909998899'),
('HOT002', 'The Saturn @ Ayuttaya', '58/58, Moo 8, Tha Wasukri, Phra Nakhon Si Ayutthaya District, Phra Nakhon Si Ayutthaya, 13000', 'TheSaturnHotel.ayutthaya@saturn.com', '0812345263'),
('HOT006', 'KinHotel', 'KMUTT Bangkok', 'kinhotel@gmail.com', '0989369396');

--
-- Triggers `hotel_info`
--
DELIMITER $$
CREATE TRIGGER `tg_hotel_info_insert` BEFORE INSERT ON `hotel_info` FOR EACH ROW BEGIN
  INSERT INTO hotel_seq VALUES (NULL);
  SET NEW.hotel_ID = CONCAT('HOT', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_seq`
--

CREATE TABLE `hotel_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_seq`
--

INSERT INTO `hotel_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(6);

-- --------------------------------------------------------

--
-- Table structure for table `housekeeping_seq`
--

CREATE TABLE `housekeeping_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `housekeeping_seq`
--

INSERT INTO `housekeeping_seq` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `housekeeping_table`
--

CREATE TABLE `housekeeping_table` (
  `housekeeping_ID` varchar(10) NOT NULL,
  `staff_ID` varchar(10) NOT NULL,
  `room_ID` varchar(10) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `housekeeping_table`
--

INSERT INTO `housekeeping_table` (`housekeeping_ID`, `staff_ID`, `room_ID`, `timestamp`) VALUES
('HOU001', 'STF002', 'ROM003', '2023-05-30 22:49:02');

--
-- Triggers `housekeeping_table`
--
DELIMITER $$
CREATE TRIGGER `tg_housekeeping_table_insert` BEFORE INSERT ON `housekeeping_table` FOR EACH ROW BEGIN
  INSERT INTO housekeeping_seq VALUES (NULL);
  SET NEW.housekeeping_ID = CONCAT('HOU', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `housekeeping_task_list`
--

CREATE TABLE `housekeeping_task_list` (
  `housekeeping_ID` varchar(10) NOT NULL,
  `task_ID` varchar(10) NOT NULL,
  `completeness` enum('Completed','Incomplete') NOT NULL DEFAULT 'Incomplete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `housekeeping_task_list`
--

INSERT INTO `housekeeping_task_list` (`housekeeping_ID`, `task_ID`, `completeness`) VALUES
('HOU001', 'TAS001', 'Incomplete'),
('HOU001', 'TAS002', 'Incomplete'),
('HOU001', 'TAS003', 'Incomplete');

-- --------------------------------------------------------

--
-- Table structure for table `invoicing_seq`
--

CREATE TABLE `invoicing_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoicing_seq`
--

INSERT INTO `invoicing_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6);

-- --------------------------------------------------------

--
-- Table structure for table `invoicing_table`
--

CREATE TABLE `invoicing_table` (
  `invoice_ID` varchar(10) NOT NULL,
  `reserve_ID` varchar(10) NOT NULL,
  `sub_total` float NOT NULL,
  `net_total` float NOT NULL,
  `payment_method_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoicing_table`
--

INSERT INTO `invoicing_table` (`invoice_ID`, `reserve_ID`, `sub_total`, `net_total`, `payment_method_ID`) VALUES
('INV001', 'RES001', 239.96, 215.96, 'PAY002'),
('INV002', 'RES002', 1079.82, 863.86, 'PAY001'),
('INV003', 'RES003', 519.96, 415.97, 'PAY001'),
('INV004', 'RES004', 209.97, 167.98, 'PAY001'),
('INV005', 'RES005', 139.98, 111.98, 'PAY001'),
('INV006', 'RES006', 999.9, 899.91, 'PAY001');

--
-- Triggers `invoicing_table`
--
DELIMITER $$
CREATE TRIGGER `tg_invoicing_table_insert` BEFORE INSERT ON `invoicing_table` FOR EACH ROW BEGIN
  INSERT INTO invoicing_seq VALUES (NULL);
  SET NEW.invoice_ID = CONCAT('INV', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `payment_method_ID` varchar(10) NOT NULL,
  `payment_method_name` enum('Cash','Credit Card') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`payment_method_ID`, `payment_method_name`) VALUES
('PAY001', 'Cash'),
('PAY002', 'Credit Card');

-- --------------------------------------------------------

--
-- Table structure for table `position_info`
--

CREATE TABLE `position_info` (
  `position_ID` varchar(10) NOT NULL,
  `position_name` varchar(50) NOT NULL,
  `position_detail` text NOT NULL,
  `position_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position_info`
--

INSERT INTO `position_info` (`position_ID`, `position_name`, `position_detail`, `position_count`) VALUES
('POS001', 'Manager', 'do something', 1),
('POS002', 'Staff', 'do anything', 1),
('POS003', 'Staffextra', 'do everything', 3);

--
-- Triggers `position_info`
--
DELIMITER $$
CREATE TRIGGER `tg_position_info_insert` BEFORE INSERT ON `position_info` FOR EACH ROW BEGIN
  INSERT INTO position_seq VALUES (NULL);
  SET NEW.position_ID = CONCAT('POS', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `position_seq`
--

CREATE TABLE `position_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position_seq`
--

INSERT INTO `position_seq` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_seq`
--

CREATE TABLE `reservation_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation_seq`
--

INSERT INTO `reservation_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_table`
--

CREATE TABLE `reservation_table` (
  `reserve_ID` varchar(10) NOT NULL,
  `customer_ID` varchar(10) NOT NULL,
  `hotel_ID` varchar(10) NOT NULL,
  `season_ID` varchar(10) NOT NULL,
  `staff_ID` varchar(10) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `adult_quan` int(11) NOT NULL COMMENT 'number of adults',
  `children_quan` int(11) NOT NULL DEFAULT 0 COMMENT 'number of children',
  `special_request` text NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation_table`
--

INSERT INTO `reservation_table` (`reserve_ID`, `customer_ID`, `hotel_ID`, `season_ID`, `staff_ID`, `check_in_date`, `check_out_date`, `adult_quan`, `children_quan`, `special_request`) VALUES
('RES001', 'CUS001', 'HOT001', 'SEA001', 'STF001', '2023-05-30', '2023-06-01', 1, 1, '-'),
('RES002', 'CUS001', 'HOT001', 'SEA002', 'STF002', '2023-08-16', '2023-08-25', 2, 1, '-'),
('RES003', 'CUS002', 'HOT001', 'SEA002', 'STF002', '2023-09-29', '2023-10-03', 2, 0, '-'),
('RES004', 'CUS002', 'HOT001', 'SEA002', 'STF002', '2023-08-01', '2023-08-04', 2, 0, '-'),
('RES005', 'CUS003', 'HOT001', 'SEA002', 'STF002', '2023-07-29', '2023-07-31', 2, 1, '-'),
('RES006', 'CUS004', 'HOT001', 'SEA001', 'STF002', '2023-06-01', '2023-06-06', 2, 1, '-');

--
-- Triggers `reservation_table`
--
DELIMITER $$
CREATE TRIGGER `tg_reservation_table_insert` BEFORE INSERT ON `reservation_table` FOR EACH ROW BEGIN
  INSERT INTO reservation_seq VALUES (NULL);
  SET NEW.reserve_ID = CONCAT('RES', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `room_info`
--

CREATE TABLE `room_info` (
  `room_ID` varchar(10) NOT NULL,
  `hotel_ID` varchar(10) NOT NULL,
  `room_number` int(11) NOT NULL,
  `room_floor` int(11) NOT NULL,
  `room_type_ID` varchar(10) NOT NULL,
  `availability` enum('FREE','FULL') NOT NULL DEFAULT 'FREE',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_info`
--

INSERT INTO `room_info` (`room_ID`, `hotel_ID`, `room_number`, `room_floor`, `room_type_ID`, `availability`, `description`) VALUES
('ROM001', 'HOT001', 1, 3, 'RTY001', 'FREE', 'Single-bed room for one person.'),
('ROM002', 'HOT001', 2, 3, 'RTY002', 'FULL', 'Single-bed room for two person'),
('ROM003', 'HOT001', 3, 3, 'RTY003', 'FREE', 'Double-bed room for two people'),
('ROM004', 'HOT001', 4, 3, 'RTY004', 'FULL', 'Single room with two bedrooms for two people.'),
('ROM005', 'HOT001', 5, 3, 'RTY005', 'FREE', 'Single room with two bedrooms for 4 people.'),
('ROM006', 'HOT001', 1, 3, 'RTY001', 'FREE', 'Single-bed room for one person.'),
('ROM007', 'HOT001', 2, 3, 'RTY002', 'FULL', 'Single-bed room for two person'),
('ROM008', 'HOT001', 3, 3, 'RTY003', 'FREE', 'Double-bed room for two people'),
('ROM009', 'HOT001', 4, 3, 'RTY004', 'FULL', 'Single room with two bedrooms for two people.'),
('ROM010', 'HOT001', 5, 3, 'RTY005', 'FREE', 'Single room with two bedrooms for 4 people.'),
('ROM014', 'HOT006', 1234, 1, 'RTY002', 'FREE', '-');

--
-- Triggers `room_info`
--
DELIMITER $$
CREATE TRIGGER `tg_room_info_insert` BEFORE INSERT ON `room_info` FOR EACH ROW BEGIN
  INSERT INTO room_seq VALUES (NULL);
  SET NEW.room_ID = CONCAT('ROM', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `room_reserved`
--

CREATE TABLE `room_reserved` (
  `reserve_ID` varchar(10) NOT NULL,
  `room_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_reserved`
--

INSERT INTO `room_reserved` (`reserve_ID`, `room_ID`) VALUES
('RES001', 'ROM001'),
('RES001', 'ROM002'),
('RES002', 'ROM001'),
('RES002', 'ROM003'),
('RES003', 'ROM005'),
('RES004', 'ROM002'),
('RES005', 'ROM002'),
('RES006', 'ROM003'),
('RES006', 'ROM010');

-- --------------------------------------------------------

--
-- Table structure for table `room_seq`
--

CREATE TABLE `room_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_seq`
--

INSERT INTO `room_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14);

-- --------------------------------------------------------

--
-- Table structure for table `room_types_seq`
--

CREATE TABLE `room_types_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_types_seq`
--

INSERT INTO `room_types_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12);

-- --------------------------------------------------------

--
-- Table structure for table `room_types_table`
--

CREATE TABLE `room_types_table` (
  `room_type_ID` varchar(10) NOT NULL,
  `room_type_name` varchar(50) NOT NULL,
  `bed_quan` int(11) NOT NULL COMMENT 'numbers of bed',
  `bathroom_quan` int(11) NOT NULL COMMENT 'numbers of bathroom',
  `adults_capacity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_types_table`
--

INSERT INTO `room_types_table` (`room_type_ID`, `room_type_name`, `bed_quan`, `bathroom_quan`, `adults_capacity`, `price`) VALUES
('RTY001', 'Single', 1, 1, 1, 49.99),
('RTY002', 'Double', 1, 1, 2, 69.99),
('RTY003', 'Twin', 2, 1, 2, 69.99),
('RTY004', 'Suite', 2, 1, 2, 89.99),
('RTY005', 'Double Suite', 2, 1, 4, 129.99),
('RTY006', 'Single', 1, 1, 1, 49.99),
('RTY007', 'Double', 1, 1, 2, 69.99),
('RTY008', 'Twin', 2, 1, 2, 69.99),
('RTY009', 'Suite', 2, 1, 2, 89.99),
('RTY010', 'Double Suite', 2, 1, 4, 129.99),
('RTY012', 'Superman', 2, 1, 0, 200000);

--
-- Triggers `room_types_table`
--
DELIMITER $$
CREATE TRIGGER `tg_room_types_table_insert` BEFORE INSERT ON `room_types_table` FOR EACH ROW BEGIN
  INSERT INTO room_types_seq VALUES (NULL);
  SET NEW.room_type_ID = CONCAT('RTY', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `season_info`
--

CREATE TABLE `season_info` (
  `season_ID` varchar(10) NOT NULL,
  `season_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `season_discount` float NOT NULL COMMENT 'discount during the season (Percentage)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `season_info`
--

INSERT INTO `season_info` (`season_ID`, `season_name`, `start_date`, `end_date`, `season_discount`) VALUES
('SEA001', 'LowSeason', '2023-01-01', '2023-06-30', 10),
('SEA002', 'HighSeason', '2023-07-01', '2023-12-31', 20),
('SEA004', 'LowSeason1', '2024-01-01', '2024-06-30', 30);

--
-- Triggers `season_info`
--
DELIMITER $$
CREATE TRIGGER `tg_season_info_insert` BEFORE INSERT ON `season_info` FOR EACH ROW BEGIN
  INSERT INTO season_seq VALUES (NULL);
  SET NEW.season_ID = CONCAT('SEA', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `season_seq`
--

CREATE TABLE `season_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `season_seq`
--

INSERT INTO `season_seq` (`id`) VALUES
(1),
(2),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `staff_info`
--

CREATE TABLE `staff_info` (
  `staff_ID` varchar(10) NOT NULL COMMENT 'Staff ID with auto increment from staff_seq table	',
  `hotel_ID` varchar(10) NOT NULL COMMENT 'Hotel ID foreign from hotel table ',
  `staff_fName` varchar(50) NOT NULL,
  `staff_lName` varchar(50) NOT NULL,
  `staff_address` text NOT NULL,
  `staff_email` varchar(100) NOT NULL,
  `staff_phone` varchar(20) NOT NULL,
  `staff_gender` enum('Male','Female','Others','Not Specified') NOT NULL,
  `salary` float NOT NULL,
  `position_ID` varchar(10) NOT NULL COMMENT 'Position ID foreign from position table '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Staff Information table';

--
-- Dumping data for table `staff_info`
--

INSERT INTO `staff_info` (`staff_ID`, `hotel_ID`, `staff_fName`, `staff_lName`, `staff_address`, `staff_email`, `staff_phone`, `staff_gender`, `salary`, `position_ID`) VALUES
('STF001', 'HOT001', 'Rujikorn ', ' Rujitanont', ' 67/3 Bangkok Thailand', ' rujikornkin96@gmail.com', '0989369396', 'Male', 1500000, 'POS001'),
('STF002', 'HOT006', 'John', ' Olsen', ' 14', ' JohnOlsen@gmail.com', '031231313', 'Male', 20000, 'POS002');

--
-- Triggers `staff_info`
--
DELIMITER $$
CREATE TRIGGER `tg_staff_info_insert` BEFORE INSERT ON `staff_info` FOR EACH ROW BEGIN
  INSERT INTO staff_seq VALUES (NULL);
  SET NEW.staff_ID = CONCAT('STF', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `staff_seq`
--

CREATE TABLE `staff_seq` (
  `id` int(11) NOT NULL COMMENT 'sequence order of staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff_seq`
--

INSERT INTO `staff_seq` (`id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `staff_user_password`
--

CREATE TABLE `staff_user_password` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL COMMENT 'encoded_password',
  `staff_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff_user_password`
--

INSERT INTO `staff_user_password` (`username`, `password`, `staff_ID`) VALUES
('JohnOlsen@gmail.com', '039da1cdcdcb58f7b7ad2564c72e6969', 'STF002'),
('rujikornkin96@gmail.com', '3ac7871e73cb71a993b47cac2cec3766', 'STF001');

-- --------------------------------------------------------

--
-- Table structure for table `task_seq`
--

CREATE TABLE `task_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task_seq`
--

INSERT INTO `task_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Table structure for table `task_table`
--

CREATE TABLE `task_table` (
  `task_ID` varchar(10) NOT NULL,
  `task_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task_table`
--

INSERT INTO `task_table` (`task_ID`, `task_name`) VALUES
('TAS001', 'Bathroom cleaning'),
('TAS002', 'Sweeping floor'),
('TAS003', 'Mopping floor'),
('TAS004', 'Cleaning bed'),
('TAS005', 'Glassware');

--
-- Triggers `task_table`
--
DELIMITER $$
CREATE TRIGGER `tg_task_table_insert` BEFORE INSERT ON `task_table` FOR EACH ROW BEGIN
  INSERT INTO task_seq VALUES (NULL);
  SET NEW.task_ID = CONCAT('TAS', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_payments`
--
ALTER TABLE `cash_payments`
  ADD PRIMARY KEY (`invoice_ID`);

--
-- Indexes for table `credit_payments`
--
ALTER TABLE `credit_payments`
  ADD PRIMARY KEY (`invoice_ID`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Indexes for table `customer_seq`
--
ALTER TABLE `customer_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_user_password`
--
ALTER TABLE `customer_user_password`
  ADD PRIMARY KEY (`username`),
  ADD KEY `customer_ID_info_user` (`customer_ID`);

--
-- Indexes for table `hotel_info`
--
ALTER TABLE `hotel_info`
  ADD PRIMARY KEY (`hotel_ID`);

--
-- Indexes for table `hotel_seq`
--
ALTER TABLE `hotel_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `housekeeping_seq`
--
ALTER TABLE `housekeeping_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `housekeeping_table`
--
ALTER TABLE `housekeeping_table`
  ADD PRIMARY KEY (`housekeeping_ID`),
  ADD KEY `staff_id_housekeep_staff` (`staff_ID`),
  ADD KEY `room_id_housekeep_staff` (`room_ID`);

--
-- Indexes for table `housekeeping_task_list`
--
ALTER TABLE `housekeeping_task_list`
  ADD PRIMARY KEY (`housekeeping_ID`,`task_ID`),
  ADD KEY `task_id_housekeep_task_l` (`task_ID`);

--
-- Indexes for table `invoicing_seq`
--
ALTER TABLE `invoicing_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoicing_table`
--
ALTER TABLE `invoicing_table`
  ADD PRIMARY KEY (`invoice_ID`),
  ADD KEY `reserve_ID_reservation_invoicing` (`reserve_ID`),
  ADD KEY `payment_method_ID_method_invoicing` (`payment_method_ID`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`payment_method_ID`);

--
-- Indexes for table `position_info`
--
ALTER TABLE `position_info`
  ADD PRIMARY KEY (`position_ID`);

--
-- Indexes for table `position_seq`
--
ALTER TABLE `position_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_seq`
--
ALTER TABLE `reservation_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_table`
--
ALTER TABLE `reservation_table`
  ADD PRIMARY KEY (`reserve_ID`),
  ADD KEY `customer_ID_reserve_customer` (`customer_ID`),
  ADD KEY `hotel_ID_reserve_hotel` (`hotel_ID`),
  ADD KEY `season_ID_reserve_season` (`season_ID`),
  ADD KEY `staff_ID_reserve_staff` (`staff_ID`);

--
-- Indexes for table `room_info`
--
ALTER TABLE `room_info`
  ADD PRIMARY KEY (`room_ID`),
  ADD KEY `hotel_ID_hotel_room` (`hotel_ID`),
  ADD KEY `room_type_ID_types_info` (`room_type_ID`);

--
-- Indexes for table `room_reserved`
--
ALTER TABLE `room_reserved`
  ADD PRIMARY KEY (`reserve_ID`,`room_ID`),
  ADD KEY `room_id_room_reserved` (`room_ID`);

--
-- Indexes for table `room_seq`
--
ALTER TABLE `room_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types_seq`
--
ALTER TABLE `room_types_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types_table`
--
ALTER TABLE `room_types_table`
  ADD PRIMARY KEY (`room_type_ID`);

--
-- Indexes for table `season_info`
--
ALTER TABLE `season_info`
  ADD PRIMARY KEY (`season_ID`);

--
-- Indexes for table `season_seq`
--
ALTER TABLE `season_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_info`
--
ALTER TABLE `staff_info`
  ADD PRIMARY KEY (`staff_ID`),
  ADD KEY `hotel_ID_hotel_staff` (`hotel_ID`),
  ADD KEY `position_ID_position_staff` (`position_ID`);

--
-- Indexes for table `staff_seq`
--
ALTER TABLE `staff_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_user_password`
--
ALTER TABLE `staff_user_password`
  ADD PRIMARY KEY (`username`),
  ADD KEY `staff_ID_info_user` (`staff_ID`);

--
-- Indexes for table `task_seq`
--
ALTER TABLE `task_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_table`
--
ALTER TABLE `task_table`
  ADD PRIMARY KEY (`task_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_seq`
--
ALTER TABLE `customer_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'sequence order of customer', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hotel_seq`
--
ALTER TABLE `hotel_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `housekeeping_seq`
--
ALTER TABLE `housekeeping_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoicing_seq`
--
ALTER TABLE `invoicing_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `position_seq`
--
ALTER TABLE `position_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservation_seq`
--
ALTER TABLE `reservation_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_seq`
--
ALTER TABLE `room_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `room_types_seq`
--
ALTER TABLE `room_types_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `season_seq`
--
ALTER TABLE `season_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_seq`
--
ALTER TABLE `staff_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'sequence order of staff', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task_seq`
--
ALTER TABLE `task_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cash_payments`
--
ALTER TABLE `cash_payments`
  ADD CONSTRAINT `invoice_ID_invoicing_cash` FOREIGN KEY (`invoice_ID`) REFERENCES `invoicing_table` (`invoice_ID`);

--
-- Constraints for table `credit_payments`
--
ALTER TABLE `credit_payments`
  ADD CONSTRAINT `invoice_ID_invoicing_credit` FOREIGN KEY (`invoice_ID`) REFERENCES `invoicing_table` (`invoice_ID`);

--
-- Constraints for table `customer_user_password`
--
ALTER TABLE `customer_user_password`
  ADD CONSTRAINT `customer_ID_info_user` FOREIGN KEY (`customer_ID`) REFERENCES `customer_info` (`customer_ID`);

--
-- Constraints for table `housekeeping_table`
--
ALTER TABLE `housekeeping_table`
  ADD CONSTRAINT `room_id_housekeep_staff` FOREIGN KEY (`room_ID`) REFERENCES `room_info` (`room_ID`),
  ADD CONSTRAINT `staff_id_housekeep_staff` FOREIGN KEY (`staff_ID`) REFERENCES `staff_info` (`staff_ID`);

--
-- Constraints for table `housekeeping_task_list`
--
ALTER TABLE `housekeeping_task_list`
  ADD CONSTRAINT `housekeep_id_housekeep_task_l` FOREIGN KEY (`housekeeping_ID`) REFERENCES `housekeeping_table` (`housekeeping_ID`),
  ADD CONSTRAINT `task_id_housekeep_task_l` FOREIGN KEY (`task_ID`) REFERENCES `task_table` (`task_ID`);

--
-- Constraints for table `invoicing_table`
--
ALTER TABLE `invoicing_table`
  ADD CONSTRAINT `payment_method_ID_method_invoicing` FOREIGN KEY (`payment_method_ID`) REFERENCES `payment_methods` (`payment_method_ID`),
  ADD CONSTRAINT `reserve_ID_reservation_invoicing` FOREIGN KEY (`reserve_ID`) REFERENCES `reservation_table` (`reserve_ID`);

--
-- Constraints for table `reservation_table`
--
ALTER TABLE `reservation_table`
  ADD CONSTRAINT `customer_ID_reserve_customer` FOREIGN KEY (`customer_ID`) REFERENCES `customer_info` (`customer_ID`),
  ADD CONSTRAINT `hotel_ID_reserve_hotel` FOREIGN KEY (`hotel_ID`) REFERENCES `hotel_info` (`hotel_ID`),
  ADD CONSTRAINT `season_ID_reserve_season` FOREIGN KEY (`season_ID`) REFERENCES `season_info` (`season_ID`),
  ADD CONSTRAINT `staff_ID_reserve_staff` FOREIGN KEY (`staff_ID`) REFERENCES `staff_info` (`staff_ID`);

--
-- Constraints for table `room_info`
--
ALTER TABLE `room_info`
  ADD CONSTRAINT `hotel_ID_hotel_room` FOREIGN KEY (`hotel_ID`) REFERENCES `hotel_info` (`hotel_ID`),
  ADD CONSTRAINT `room_type_ID_types_info` FOREIGN KEY (`room_type_ID`) REFERENCES `room_types_table` (`room_type_ID`);

--
-- Constraints for table `room_reserved`
--
ALTER TABLE `room_reserved`
  ADD CONSTRAINT `reserve_ID_reservation_reserved` FOREIGN KEY (`reserve_ID`) REFERENCES `reservation_table` (`reserve_ID`),
  ADD CONSTRAINT `room_id_room_reserved` FOREIGN KEY (`room_ID`) REFERENCES `room_info` (`room_ID`);

--
-- Constraints for table `staff_info`
--
ALTER TABLE `staff_info`
  ADD CONSTRAINT `hotel_ID_hotel_staff` FOREIGN KEY (`hotel_ID`) REFERENCES `hotel_info` (`hotel_ID`),
  ADD CONSTRAINT `position_ID_position_staff` FOREIGN KEY (`position_ID`) REFERENCES `position_info` (`position_ID`);

--
-- Constraints for table `staff_user_password`
--
ALTER TABLE `staff_user_password`
  ADD CONSTRAINT `staff_ID_info_user` FOREIGN KEY (`staff_ID`) REFERENCES `staff_info` (`staff_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
