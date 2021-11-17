-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2021 at 03:04 PM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alphawav_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch_tbl`
--

CREATE TABLE `batch_tbl` (
  `batch_id` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `batch_no` int(100) NOT NULL,
  `batch_date` varchar(100) NOT NULL,
  `ex_date` varchar(100) NOT NULL,
  `cost` double NOT NULL,
  `price` double NOT NULL,
  `user_id` int(50) NOT NULL,
  `added_date` varchar(100) NOT NULL,
  `batch_location` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_tbl`
--

INSERT INTO `batch_tbl` (`batch_id`, `pro_id`, `batch_no`, `batch_date`, `ex_date`, `cost`, `price`, `user_id`, `added_date`, `batch_location`) VALUES
(1, 9, 1, '', '', 37.08, 135, 3, '2021-10-01', 2),
(2, 25, 2, '', '', 88.79, 270, 3, '2021-10-01', 2),
(3, 29, 3, '', '', 109.13, 305, 3, '2021-10-01', 2),
(4, 49, 4, '', '', 108.98, 295, 3, '2021-10-01', 2),
(5, 53, 5, '', '', 31.34, 100, 3, '2021-10-01', 2),
(6, 97, 6, '', '', 7.81, 25, 3, '2021-10-01', 2),
(7, 117, 7, '', '', 7.7, 30, 3, '2021-10-01', 2),
(8, 121, 8, '', '', 5.19, 18, 3, '2021-10-01', 2),
(9, 54, 9, '', '', 30.06, 100, 3, '2021-10-01', 2),
(10, 57, 10, '', '', 33.82, 110, 3, '2021-10-01', 2),
(11, 61, 11, '', '', 39.78, 130, 3, '2021-10-01', 2),
(12, 65, 12, '', '', 34.14, 110, 3, '2021-10-01', 2),
(13, 69, 13, '', '', 36.82, 120, 3, '2021-10-01', 2),
(14, 77, 14, '', '', 86.66, 255, 3, '2021-10-01', 2),
(15, 81, 15, '', '', 102.86, 285, 3, '2021-10-01', 2),
(16, 85, 16, '', '', 119.06, 315, 3, '2021-10-01', 2),
(17, 89, 17, '', '', 94.5, 265, 3, '2021-10-01', 2),
(18, 93, 18, '', '', 102.72, 300, 3, '2021-10-01', 2),
(19, 129, 19, '', '', 11.41, 32, 3, '2021-10-01', 2),
(20, 137, 20, '', '', 2.25, 6, 3, '2021-10-01', 2),
(21, 141, 21, '', '', 249.87, 1500, 3, '2021-10-01', 2),
(22, 145, 22, '', '', 249.87, 1800, 3, '2021-10-01', 2),
(23, 149, 23, '', '', 163.49, 1050, 3, '2021-10-01', 2),
(24, 161, 24, '', '', 29.61, 65, 3, '2021-10-01', 2),
(25, 165, 25, '', '', 40.23, 85, 3, '2021-10-01', 2),
(26, 169, 26, '', '', 31, 65, 3, '2021-10-01', 2),
(27, 173, 27, '', '', 42.14, 85, 3, '2021-10-01', 2),
(28, 189, 28, '', '', 90.56, 125, 3, '2021-10-01', 2),
(29, 293, 29, '', '', 0.74, 2.5, 3, '2021-10-01', 2),
(30, 297, 30, '', '', 1.36, 3.5, 3, '2021-10-01', 2),
(31, 309, 31, '', '', 1825.72, 2500, 3, '2021-10-01', 2),
(32, 13, 32, '', '', 48.63, 160, 3, '2021-10-01', 2),
(33, 17, 33, '', '', 56.47, 190, 3, '2021-10-01', 2),
(34, 26, 34, '', '', 102.58, 270, 3, '2021-10-01', 2),
(35, 30, 35, '', '', 126.08, 305, 3, '2021-10-01', 2),
(36, 33, 36, '', '', 37.3, 105, 3, '2021-10-01', 2),
(37, 37, 37, '', '', 41.96, 115, 3, '2021-10-01', 2),
(38, 41, 38, '', '', 49.34, 135, 3, '2021-10-01', 2),
(39, 45, 39, '', '', 111.85, 260, 3, '2021-10-01', 2),
(40, 73, 40, '', '', 49.76, 155, 3, '2021-10-01', 2),
(41, 105, 41, '', '', 14.68, 40, 3, '2021-10-01', 2),
(42, 109, 42, '', '', 17.03, 45, 3, '2021-10-01', 2),
(43, 113, 43, '', '', 20.31, 50, 3, '2021-10-01', 2),
(44, 122, 44, '', '', 6, 18, 3, '2021-10-01', 2),
(45, 125, 45, '', '', 9.4, 25, 3, '2021-10-01', 2),
(46, 294, 46, '', '', 0.89, 2.5, 3, '2021-10-01', 2),
(47, 298, 47, '', '', 1.45, 3.5, 3, '2021-10-01', 2),
(48, 157, 48, '', '', 523.84, 450, 3, '2021-10-01', 2),
(49, 181, 49, '', '', 29.37, 40, 3, '2021-10-01', 2),
(50, 185, 50, '', '', 50.35, 55, 3, '2021-10-01', 2),
(51, 193, 51, '', '', 4.41, 15, 3, '2021-10-01', 2),
(52, 197, 52, '', '', 7.38, 20, 3, '2021-10-01', 2),
(53, 301, 53, '', '', 71.32, 423.08, 3, '2021-10-01', 2),
(54, 5, 54, '', '', 30.81, 120, 3, '2021-10-01', 2),
(55, 14, 55, '', '', 38.23, 160, 3, '2021-10-01', 2),
(56, 18, 56, '', '', 44.4, 190, 3, '2021-10-01', 2),
(57, 21, 57, '', '', 61.82, 240, 3, '2021-10-01', 2),
(58, 31, 58, '', '', 99.13, 305, 3, '2021-10-01', 2),
(59, 34, 59, '', '', 29.33, 105, 3, '2021-10-01', 2),
(60, 38, 60, '', '', 32.99, 115, 3, '2021-10-01', 2),
(61, 42, 61, '', '', 38.79, 135, 3, '2021-10-01', 2),
(62, 46, 62, '', '', 87.94, 260, 3, '2021-10-01', 2),
(63, 1, 63, '', '', 79.93, 300, 3, '2021-10-01', 2),
(64, 74, 64, '', '', 39.12, 155, 3, '2021-10-01', 2),
(65, 106, 65, '', '', 8.11, 40, 3, '2021-10-01', 2),
(66, 110, 66, '', '', 13.39, 45, 3, '2021-10-01', 2),
(67, 114, 67, '', '', 15.97, 50, 3, '2021-10-01', 2),
(68, 133, 68, '', '', 1.58, 6, 3, '2021-10-01', 2),
(69, 154, 69, '', '', 187.06, 550, 3, '2021-10-01', 2),
(70, 158, 70, '', '', 154.91, 450, 3, '2021-10-01', 2),
(71, 177, 71, '', '', 5.97, 18, 3, '2021-10-01', 2),
(72, 194, 72, '', '', 2.18, 15, 3, '2021-10-01', 2),
(73, 198, 73, '', '', 3.99, 20, 3, '2021-10-01', 2),
(74, 201, 74, '', '', 43.97, 121, 3, '2021-10-01', 2),
(75, 205, 75, '', '', 39.25, 110, 3, '2021-10-01', 2),
(76, 209, 76, '', '', 56.71, 156, 3, '2021-10-01', 2),
(77, 213, 77, '', '', 76.2, 207, 3, '2021-10-01', 2),
(78, 217, 78, '', '', 86.95, 236, 3, '2021-10-01', 2),
(79, 221, 79, '', '', 77.19, 207, 3, '2021-10-01', 2),
(80, 225, 80, '', '', 80.42, 219, 3, '2021-10-01', 2),
(81, 229, 81, '', '', 88.74, 236, 3, '2021-10-01', 2),
(82, 233, 82, '', '', 99.03, 271, 3, '2021-10-01', 2),
(83, 237, 83, '', '', 102.1, 276, 3, '2021-10-01', 2),
(84, 241, 84, '', '', 117.73, 317, 3, '2021-10-01', 2),
(85, 245, 85, '', '', 130.37, 351, 3, '2021-10-01', 2),
(86, 249, 86, '', '', 163.68, 443, 3, '2021-10-01', 2),
(87, 253, 87, '', '', 188.85, 506, 3, '2021-10-01', 2),
(88, 257, 88, '', '', 211.48, 570, 3, '2021-10-01', 2),
(89, 261, 89, '', '', 240.05, 644, 3, '2021-10-01', 2),
(90, 265, 90, '', '', 42.03, 90, 3, '2021-10-01', 2),
(91, 269, 91, '', '', 689.43, 2000, 3, '2021-10-01', 2),
(92, 273, 92, '', '', 6.47, 15, 3, '2021-10-01', 2),
(93, 277, 93, '', '', 5.44, 12, 3, '2021-10-01', 2),
(94, 281, 94, '', '', 5.97, 15, 3, '2021-10-01', 2),
(95, 285, 95, '', '', 4.35, 10, 3, '2021-10-01', 2),
(96, 289, 96, '', '', 3146.21, 9200, 3, '2021-10-01', 2),
(97, 295, 97, '', '', 0.69, 2.5, 3, '2021-10-01', 2),
(98, 299, 98, '', '', 1.14, 3.5, 3, '2021-10-01', 2),
(99, 302, 99, '', '', 56.08, 423.08, 3, '2021-10-01', 2),
(100, 313, 100, '', '', 1505.43, 6200, 3, '2021-10-01', 2),
(101, 317, 101, '', '', 6924.88, 15000, 3, '2021-10-01', 2),
(102, 321, 102, '', '', 5340.48, 13000, 3, '2021-10-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bill_tbl`
--

CREATE TABLE `bill_tbl` (
  `bill_id` int(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tell_num` varchar(100) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `bill_logo` varchar(100) NOT NULL,
  `bill_loc` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand_tbl`
--

CREATE TABLE `brand_tbl` (
  `brand_id` int(25) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand_tbl`
--

INSERT INTO `brand_tbl` (`brand_id`, `brand_name`) VALUES
(1, 'KLIMAS');

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `cate_id` int(25) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cate_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`cate_id`, `cat_name`, `cate_code`) VALUES
(1, 'ANCHOR FASTNER', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `cus_id` int(25) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `cus_phone` varchar(20) NOT NULL,
  `cus_email` varchar(50) NOT NULL,
  `cus_custom_feild` varchar(100) NOT NULL,
  `added_user` int(100) NOT NULL,
  `added_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`cus_id`, `cus_name`, `cus_phone`, `cus_email`, `cus_custom_feild`, `added_user`, `added_date`) VALUES
(1, 'JANATHA STORES', '0772248454', '', 'No. 15, Awissawella Road, Kaduwela', 3, '11/10/2021');

-- --------------------------------------------------------

--
-- Table structure for table `damage_tbl`
--

CREATE TABLE `damage_tbl` (
  `damage_id` int(100) NOT NULL,
  `damage_stock_id` int(100) NOT NULL,
  `damage_qty` double NOT NULL,
  `added_user` int(100) NOT NULL,
  `damage_added_date` varchar(255) NOT NULL,
  `d_location` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disposal_tbl`
--

CREATE TABLE `disposal_tbl` (
  `dispose_id` int(100) NOT NULL,
  `dispos_stock_id` int(100) NOT NULL,
  `dispose_qty` double NOT NULL,
  `added_user` int(100) NOT NULL,
  `dispose_added_date` varchar(255) NOT NULL,
  `gatePass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exchangedetaol_tbl`
--

CREATE TABLE `exchangedetaol_tbl` (
  `exDetail_id` int(100) NOT NULL,
  `exDetail_detailId` int(100) NOT NULL,
  `exDetail_stockId` int(100) NOT NULL,
  `exDetail_proName` varchar(255) NOT NULL,
  `exDetail_proCode` varchar(255) NOT NULL,
  `exDetail_qty` double NOT NULL,
  `exchange_refId` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exchange_tbl`
--

CREATE TABLE `exchange_tbl` (
  `exchange_id` int(100) NOT NULL,
  `exchange_date` varchar(100) NOT NULL,
  `exchange_user` int(100) NOT NULL,
  `exchange_price` double NOT NULL,
  `exchanged` int(15) NOT NULL,
  `exchange_bill` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grndetail_tbl`
--

CREATE TABLE `grndetail_tbl` (
  `detail_id` int(50) NOT NULL,
  `grnPro_id` int(50) NOT NULL,
  `qty` int(100) NOT NULL,
  `cost` double(10,2) NOT NULL,
  `price` double(10,2) NOT NULL,
  `exDate` varchar(20) NOT NULL,
  `grn_num` int(100) NOT NULL,
  `grn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grndetail_tbl`
--

INSERT INTO `grndetail_tbl` (`detail_id`, `grnPro_id`, `qty`, `cost`, `price`, `exDate`, `grn_num`, `grn_id`) VALUES
(4, 9, 95, 37.08, 135.00, '', 1, 2),
(5, 25, 20, 88.79, 270.00, '', 2, 2),
(6, 29, 166, 109.13, 305.00, '', 3, 2),
(7, 49, 50, 108.98, 295.00, '', 4, 2),
(8, 53, 79, 31.34, 100.00, '', 5, 2),
(9, 97, 586, 7.81, 25.00, '', 6, 2),
(10, 117, 2600, 7.70, 30.00, '', 7, 2),
(11, 121, 23, 5.19, 18.00, '', 8, 2),
(12, 54, 36, 30.06, 100.00, '', 9, 3),
(13, 57, 2850, 33.82, 110.00, '', 10, 3),
(14, 61, 1950, 39.78, 130.00, '', 11, 3),
(15, 65, 2164, 34.14, 110.00, '', 12, 3),
(16, 69, 2625, 36.82, 120.00, '', 13, 3),
(17, 77, 65, 86.66, 255.00, '', 14, 3),
(18, 81, 1200, 102.86, 285.00, '', 15, 3),
(19, 85, 340, 119.06, 315.00, '', 16, 3),
(20, 89, 1878, 94.50, 265.00, '', 17, 3),
(21, 93, 2550, 102.72, 300.00, '', 18, 3),
(22, 129, 61, 11.41, 32.00, '', 19, 3),
(23, 137, 89, 2.25, 6.00, '', 20, 3),
(24, 141, 89, 249.87, 1500.00, '', 21, 3),
(25, 145, 98, 249.87, 1800.00, '', 22, 3),
(26, 149, 10, 163.49, 1050.00, '', 23, 3),
(27, 161, 80, 29.61, 65.00, '', 24, 3),
(28, 165, 2094, 40.23, 85.00, '', 25, 3),
(29, 169, 58, 31.00, 65.00, '', 26, 3),
(30, 173, 2510, 42.14, 85.00, '', 27, 3),
(31, 189, 783, 90.56, 125.00, '', 28, 3),
(32, 293, 21870, 0.74, 2.50, '', 29, 3),
(33, 297, 12883, 1.36, 3.50, '', 30, 3),
(34, 309, 12, 1825.72, 2500.00, '', 31, 3),
(35, 13, 643, 48.63, 160.00, '', 32, 4),
(36, 17, 100, 56.47, 190.00, '', 33, 4),
(37, 26, 99, 102.58, 270.00, '', 34, 4),
(38, 30, 50, 126.08, 305.00, '', 35, 4),
(39, 33, 495, 37.30, 105.00, '', 36, 4),
(40, 37, 1615, 41.96, 115.00, '', 37, 4),
(41, 41, 550, 49.34, 135.00, '', 38, 4),
(42, 45, 199, 111.85, 260.00, '', 39, 4),
(43, 73, 977, 49.76, 155.00, '', 40, 4),
(44, 105, 1414, 14.68, 40.00, '', 41, 4),
(45, 109, 75, 17.03, 45.00, '', 42, 4),
(46, 113, 1996, 20.31, 50.00, '', 43, 4),
(47, 122, 101, 6.00, 18.00, '', 44, 4),
(48, 125, 52, 9.40, 25.00, '', 45, 4),
(49, 294, 50000, 0.89, 2.50, '', 46, 4),
(50, 298, 29000, 1.45, 3.50, '', 47, 4),
(51, 157, 1, 523.84, 450.00, '', 48, 4),
(52, 181, 19, 29.37, 40.00, '', 49, 4),
(53, 185, 1072, 50.35, 55.00, '', 50, 4),
(54, 193, 985, 4.41, 15.00, '', 51, 4),
(55, 197, 1987, 7.38, 20.00, '', 52, 4),
(56, 301, 61, 71.32, 423.08, '', 53, 4),
(57, 5, 433, 30.81, 120.00, '', 54, 5),
(58, 14, 1000, 38.23, 160.00, '', 55, 5),
(59, 18, 150, 44.40, 190.00, '', 56, 5),
(60, 21, 16, 61.82, 240.00, '', 57, 5),
(61, 31, 100, 99.13, 305.00, '', 58, 5),
(62, 34, 1800, 29.33, 105.00, '', 59, 5),
(63, 38, 2000, 32.99, 115.00, '', 60, 5),
(64, 42, 700, 38.79, 135.00, '', 61, 5),
(65, 46, 200, 87.94, 260.00, '', 62, 5),
(66, 1, 50, 79.93, 300.00, '', 63, 5),
(67, 74, 2000, 39.12, 155.00, '', 64, 5),
(68, 106, 6000, 8.11, 40.00, '', 65, 5),
(69, 110, 2000, 13.39, 45.00, '', 66, 5),
(70, 114, 2000, 15.97, 50.00, '', 67, 5),
(71, 133, 8770, 1.58, 6.00, '', 68, 5),
(72, 154, 21, 187.06, 550.00, '', 69, 5),
(73, 158, 100, 154.91, 450.00, '', 70, 5),
(74, 177, 1988, 5.97, 18.00, '', 71, 5),
(75, 194, 5800, 2.18, 15.00, '', 72, 5),
(76, 198, 6000, 3.99, 20.00, '', 73, 5),
(77, 201, 100, 43.97, 121.00, '', 74, 5),
(78, 205, 1899, 39.25, 110.00, '', 75, 5),
(79, 209, 1100, 56.71, 156.00, '', 76, 5),
(80, 213, 974, 76.20, 207.00, '', 77, 5),
(81, 217, 500, 86.95, 236.00, '', 78, 5),
(82, 221, 80, 77.19, 207.00, '', 79, 5),
(83, 225, 500, 80.42, 219.00, '', 80, 5),
(84, 229, 3580, 88.74, 236.00, '', 81, 5),
(85, 233, 1479, 99.03, 271.00, '', 82, 5),
(86, 237, 1000, 102.10, 276.00, '', 83, 5),
(87, 241, 820, 117.73, 317.00, '', 84, 5),
(88, 245, 500, 130.37, 351.00, '', 85, 5),
(89, 249, 100, 163.68, 443.00, '', 86, 5),
(90, 253, 1000, 188.85, 506.00, '', 87, 5),
(91, 257, 989, 211.48, 570.00, '', 88, 5),
(92, 261, 120, 240.05, 644.00, '', 89, 5),
(93, 265, 200, 42.03, 90.00, '', 90, 5),
(94, 269, 10, 689.43, 2000.00, '', 91, 5),
(95, 273, 1000, 6.47, 15.00, '', 92, 5),
(96, 277, 1000, 5.44, 12.00, '', 93, 5),
(97, 281, 1000, 5.97, 15.00, '', 94, 5),
(98, 285, 1000, 4.35, 10.00, '', 95, 5),
(99, 289, 199, 3146.21, 9200.00, '', 96, 5),
(100, 295, 50000, 0.69, 2.50, '', 97, 5),
(101, 299, 29000, 1.14, 3.50, '', 98, 5),
(102, 302, 50, 56.08, 423.08, '', 99, 5),
(103, 313, 88, 1505.43, 6200.00, '', 100, 5),
(104, 317, 17, 6924.88, 15000.00, '', 101, 5),
(105, 321, 18, 5340.48, 13000.00, '', 102, 5);

-- --------------------------------------------------------

--
-- Table structure for table `grn_tbl`
--

CREATE TABLE `grn_tbl` (
  `grn_id` int(50) NOT NULL,
  `grn_num` varchar(100) NOT NULL,
  `grn_received` varchar(100) NOT NULL,
  `grn_suppid` int(100) NOT NULL,
  `grn_locid` int(100) NOT NULL,
  `grn_invoice_no` varchar(100) NOT NULL,
  `grn_due_on` varchar(20) NOT NULL,
  `added_user` int(100) NOT NULL,
  `added_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grn_tbl`
--

INSERT INTO `grn_tbl` (`grn_id`, `grn_num`, `grn_received`, `grn_suppid`, `grn_locid`, `grn_invoice_no`, `grn_due_on`, `added_user`, `added_date`) VALUES
(2, '2', '2021-10-01', 1, 2, 'FWJ200001121', '2021-10-02', 3, 'data'),
(3, '4', '2021-10-01', 1, 2, 'FWJ200002643', '2021-10-02', 3, 'data'),
(4, '5', '2021-10-01', 1, 2, 'FWE210400030', '2021-10-02', 3, 'data'),
(5, '6', '2021-10-01', 1, 2, 'FWE210600156', '2021-10-02', 3, 'data');

-- --------------------------------------------------------

--
-- Table structure for table `location_tbl`
--

CREATE TABLE `location_tbl` (
  `loc_id` int(50) NOT NULL,
  `loc_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_tbl`
--

INSERT INTO `location_tbl` (`loc_id`, `loc_name`) VALUES
(2, 'Head Office'),
(3, 'Show Room');

-- --------------------------------------------------------

--
-- Table structure for table `main_transfer_tbl`
--

CREATE TABLE `main_transfer_tbl` (
  `main_tra_id` int(100) NOT NULL,
  `added_user` int(100) NOT NULL,
  `transfer_date` varchar(255) NOT NULL,
  `trans_loc` int(11) NOT NULL,
  `accept` int(100) NOT NULL,
  `special_note` text NOT NULL,
  `view` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packdetail_tbl`
--

CREATE TABLE `packdetail_tbl` (
  `packDetail_id` int(100) NOT NULL,
  `packRef_id` int(100) NOT NULL,
  `packDetStock` int(100) NOT NULL,
  `packQty` double NOT NULL,
  `pack_loc` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pack_stock_tbl`
--

CREATE TABLE `pack_stock_tbl` (
  `packStock_id` int(100) NOT NULL,
  `loc_id` int(100) NOT NULL,
  `pack_qty` double NOT NULL,
  `pack_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pack_tbl`
--

CREATE TABLE `pack_tbl` (
  `pack_id` int(100) NOT NULL,
  `pack_name` varchar(255) NOT NULL,
  `added_date` varchar(100) NOT NULL,
  `added_user` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos_details_tbl`
--

CREATE TABLE `pos_details_tbl` (
  `pos_det_id` int(100) NOT NULL,
  `pos_id` int(100) NOT NULL,
  `stock_id` int(100) NOT NULL,
  `totQty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_details_tbl`
--

INSERT INTO `pos_details_tbl` (`pos_det_id`, `pos_id`, `stock_id`, `totQty`) VALUES
(1, 1, 7, 1),
(2, 1, 8, 1),
(3, 1, 106, 3),
(4, 2, 106, 3),
(5, 3, 106, 3),
(6, 4, 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_tbl`
--

CREATE TABLE `pos_tbl` (
  `pos_id` int(100) NOT NULL,
  `pos_date` varchar(100) NOT NULL,
  `pos_time` varchar(100) NOT NULL,
  `added_user` int(100) NOT NULL,
  `customerId` int(100) NOT NULL,
  `refNote` varchar(255) NOT NULL,
  `proDesc` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `payBy` varchar(100) NOT NULL,
  `payNote` varchar(100) NOT NULL,
  `secuCode` varchar(255) NOT NULL,
  `cardNo` varchar(255) NOT NULL,
  `holdName` varchar(255) NOT NULL,
  `cardType` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `cvv2` varchar(100) NOT NULL,
  `cheqNo` varchar(100) NOT NULL,
  `ref_code` varchar(100) NOT NULL,
  `pro_disc` double NOT NULL,
  `bill_void` int(50) NOT NULL,
  `exc_bill_id` int(100) NOT NULL,
  `exc_bill_price` double NOT NULL,
  `checkRegDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_tbl`
--

INSERT INTO `pos_tbl` (`pos_id`, `pos_date`, `pos_time`, `added_user`, `customerId`, `refNote`, `proDesc`, `amount`, `payBy`, `payNote`, `secuCode`, `cardNo`, `holdName`, `cardType`, `month`, `year`, `cvv2`, `cheqNo`, `ref_code`, `pro_disc`, `bill_void`, `exc_bill_id`, `exc_bill_price`, `checkRegDate`) VALUES
(1, '11/10/2021', '02:42:53pm', 3, 1, '', '', 0, 'other', 'Credit - 30 Days', '', '', '', '', '', '', '', '', '0001', 20, 0, 0, 0, '2021-11-10 14:42:53'),
(2, '11/10/2021', '02:47:18pm', 3, 1, '', '', 14880, 'other', 'Credit - 30 Days', '', '', '', '', '', '', '', '', '0002', 20, 0, 0, 0, '2021-11-10 14:47:18'),
(3, '11/10/2021', '03:02:51pm', 3, 0, 'test invoice', '', 14880, 'other', '', '', '', '', '', '', '', '', '', '0003', 20, 0, 0, 0, '2021-11-10 15:02:51'),
(4, '11/10/2021', '03:08:25pm', 3, 0, '', '', 3000, 'cash', '', '', '', '', '', '', '', '', '', '0004', 0, 0, 0, 0, '2021-11-10 15:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `po_details_tbl`
--

CREATE TABLE `po_details_tbl` (
  `po_order_de_id` int(20) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `cost_prise` double(10,2) NOT NULL,
  `sell_prise` double(10,2) NOT NULL,
  `status` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_details_tbl`
--

INSERT INTO `po_details_tbl` (`po_order_de_id`, `pro_name`, `pro_qty`, `cost_prise`, `sell_prise`, `status`, `po_id`, `pro_id`) VALUES
(4, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 100', 95, 37.08, 135.00, 1, 2, 9),
(5, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 80 - SS 316', 20, 88.79, 270.00, 1, 2, 25),
(6, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 100 - SS 316', 166, 109.13, 305.00, 1, 2, 29),
(7, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 100 - SS 316', 50, 108.98, 295.00, 1, 2, 49),
(8, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 80', 79, 31.34, 100.00, 1, 2, 53),
(9, '( B1 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 6 X 50', 586, 7.81, 25.00, 1, 2, 97),
(10, '( B1 ) - HAMMER DRIVE FIXING CSK HEAD, NYLON - 6 X 50', 2600, 7.70, 30.00, 1, 2, 117),
(11, '( B1 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 6 X 30 X 50', 23, 5.19, 18.00, 1, 2, 121),
(12, '( B2 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 80', 36, 30.06, 100.00, 1, 3, 54),
(13, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 100', 2850, 33.82, 110.00, 1, 3, 57),
(14, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 120', 1950, 39.78, 130.00, 1, 3, 61),
(15, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 10 X 80', 2164, 34.14, 110.00, 1, 3, 65),
(16, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 10 X 100', 2625, 36.82, 120.00, 1, 3, 69),
(17, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 80 - SS 316', 65, 86.66, 255.00, 1, 3, 77),
(18, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 100 - SS 316', 1200, 102.86, 285.00, 1, 3, 81),
(19, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 8 x 120 - SS 316', 340, 119.06, 315.00, 1, 3, 85),
(20, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 80 - SS 316', 1878, 94.50, 265.00, 1, 3, 89),
(21, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 100 - SS 316', 2550, 102.72, 300.00, 1, 3, 93),
(22, '( B1 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 10 x 50 x 60', 61, 11.41, 32.00, 1, 3, 129),
(23, '( B1 ) - EXPANSION PLUG - PP - 8 X 50', 89, 2.25, 6.00, 1, 3, 137),
(24, '( B1 ) - PZ TYPE SCREW DRIVER BIT (10 pcs)', 89, 249.87, 1500.00, 1, 3, 141),
(25, '( B1 ) - PZ TYPE SCREW DRIVER BIT (10 pcs)', 98, 249.87, 1800.00, 1, 3, 145),
(26, '( B1 ) - TX TYPE SCREW DRIVER BIT (5 pcs)', 10, 163.49, 1050.00, 1, 3, 149),
(27, '( B1 ) - UNIVERSAL NYLON PLUG WITH C HOOK 6 x 30 x 65', 80, 29.61, 65.00, 1, 3, 161),
(28, '( B1 ) - UNIVERSAL NYLON PLUG WITH C HOOK 8 x 40 x 83', 2094, 40.23, 85.00, 1, 3, 165),
(29, '( B1 ) - UNIVERSAL NYLON PLUG EYE BOLT 6 x 30 x 64', 58, 31.00, 65.00, 1, 3, 169),
(30, '( B1 ) - UNIVERSAL NYLON PLUG EYE BOLT 8 x 40 x 85', 2510, 42.14, 85.00, 1, 3, 173),
(31, '( B1 ) - DROP-IN METAL ANCHOR - 12', 783, 90.56, 125.00, 1, 3, 189),
(32, '( B1 ) - EXPANSION PLUG - PP - 6 X 30', 21870, 0.74, 2.50, 1, 3, 293),
(33, '( B1 ) - 3 - WAY NYLON EXPANSION PLUG - 6 x 30', 12883, 1.36, 3.50, 1, 3, 297),
(34, '( B1 ) - ALL PURPOSE ADHESIVE 310 ml', 12, 1825.72, 2500.00, 1, 4, 309),
(35, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 120', 643, 48.63, 160.00, 1, 5, 13),
(36, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 140', 100, 56.47, 190.00, 1, 5, 17),
(37, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 80 - SS 316', 99, 102.58, 270.00, 1, 5, 26),
(38, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 100 - SS 316', 50, 126.08, 305.00, 1, 5, 30),
(39, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 80', 495, 37.30, 105.00, 1, 5, 33),
(40, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 100', 1615, 41.96, 115.00, 1, 5, 37),
(41, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 120', 550, 49.34, 135.00, 1, 5, 41),
(42, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 80 - SS 316', 199, 111.85, 260.00, 1, 5, 45),
(43, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 120', 977, 49.76, 155.00, 1, 5, 73),
(44, '( B1 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 8 X 60', 1414, 14.68, 40.00, 1, 5, 105),
(45, '( B1 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 10 X 80', 75, 17.03, 45.00, 1, 5, 109),
(46, '( B1 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 10 X 100', 1996, 20.31, 50.00, 1, 5, 113),
(47, '( B2 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 6 X 30 X 50', 101, 6.00, 18.00, 1, 5, 122),
(48, '( B1 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 8 x 40 x 60', 52, 9.40, 25.00, 1, 5, 125),
(49, '( B2 ) - EXPANSION PLUG - PP - 6 X 30', 50000, 0.89, 2.50, 1, 5, 294),
(50, '( B2 ) - 3 - WAY NYLON EXPANSION PLUG - 6 x 30', 29000, 1.45, 3.50, 1, 5, 298),
(51, '( B1 ) - TX-30 DRIVER BIT WITH 160mm LENGHT', 1, 523.84, 450.00, 1, 5, 157),
(52, '( B1 ) - DROP-IN METAL ANCHOR', 19, 29.37, 40.00, 1, 5, 181),
(53, '( B1 ) - DROP-IN METAL ANCHOR - 10', 1072, 50.35, 55.00, 1, 5, 185),
(54, '( B1 ) - EXPANSION PLUG PP WITH CSK SCREW - 6/3, 5 X 40', 985, 4.41, 15.00, 1, 5, 193),
(55, '( B1 ) - EXPANSION PLUG PP WITH CSK SCREW - 8/4, 0 X 60', 1987, 7.38, 20.00, 1, 5, 197),
(56, '( B1 ) - WASH BASIN FIXING KIT', 61, 71.32, 423.08, 1, 5, 301),
(57, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 80', 433, 30.81, 120.00, 1, 6, 5),
(58, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 120', 1000, 38.23, 160.00, 1, 6, 14),
(59, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 140', 150, 44.40, 190.00, 1, 6, 18),
(60, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 160', 16, 61.82, 240.00, 1, 6, 21),
(61, '( B3 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 100 - SS 316', 100, 99.13, 305.00, 1, 6, 31),
(62, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 80', 1800, 29.33, 105.00, 1, 6, 34),
(63, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 100', 2000, 32.99, 115.00, 1, 6, 38),
(64, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 120', 700, 38.79, 135.00, 1, 6, 42),
(65, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 80 - SS 316', 200, 87.94, 260.00, 1, 6, 46),
(66, '( B1 ) - KPR-FAST-12200K', 50, 79.93, 300.00, 1, 6, 1),
(67, '( B2 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 120', 2000, 39.12, 155.00, 1, 6, 74),
(68, '( B2 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 8 X 60', 6000, 8.11, 40.00, 1, 6, 106),
(69, '( B2 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 10 X 80', 2000, 13.39, 45.00, 1, 6, 110),
(70, '( B2 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 10 X 100', 2000, 15.97, 50.00, 1, 6, 114),
(71, '( B1 ) - EXPANSION PLUG - PP - 8 X 40', 8770, 1.58, 6.00, 1, 6, 133),
(72, '( B2 ) - TX TYPE SCREW DRIVER BIT (2 pcs)', 21, 187.06, 550.00, 1, 6, 154),
(73, '( B2 ) - TX-30 DRIVER BIT WITH 160mm LENGHT', 100, 154.91, 450.00, 1, 6, 158),
(74, '( B1 ) - PLASTERBOARD PLUG WITH SCREW', 1988, 5.97, 18.00, 1, 6, 177),
(75, '( B2 ) - EXPANSION PLUG PP WITH CSK SCREW - 6/3, 5 X 40', 5800, 2.18, 15.00, 1, 6, 194),
(76, '( B2 ) - EXPANSION PLUG PP WITH CSK SCREW - 8/4, 0 X 60', 6000, 3.99, 20.00, 1, 6, 198),
(77, '( B1 ) - MECHANICAL ANCHOR, ZN 8X95', 100, 43.97, 121.00, 1, 6, 201),
(78, '( B1 ) - MECHANICAL ANCHOR, ZN 8X75', 1899, 39.25, 110.00, 1, 6, 205),
(79, '( B1 ) - MECHANICAL ANCHOR, ZN 10X85', 1100, 56.71, 156.00, 1, 6, 209),
(80, '( B1 ) - MECHANICAL ANCHOR, ZN 10X115', 974, 76.20, 207.00, 1, 6, 213),
(81, '( B1 ) - MECHANICAL ANCHOR, ZN 10X135', 500, 86.95, 236.00, 1, 6, 217),
(82, '( B1 ) - MECHANICAL ANCHOR, ZN 12X85', 80, 77.19, 207.00, 1, 6, 221),
(83, '( B1 ) - MECHANICAL ANCHOR, ZN 12X95', 500, 80.42, 219.00, 1, 6, 225),
(84, '( B1 ) - MECHANICAL ANCHOR, ZN 12X105', 3580, 88.74, 236.00, 1, 6, 229),
(85, '( B1 ) - MECHANICAL ANCHOR, ZN 12X115', 1479, 99.03, 271.00, 1, 6, 233),
(86, '( B1 ) - MECHANICAL ANCHOR, ZN 12X125', 1000, 102.10, 276.00, 1, 6, 237),
(87, '( B1 ) - MECHANICAL ANCHOR, ZN 12X145', 820, 117.73, 317.00, 1, 6, 241),
(88, '( B1 ) - MECHANICAL ANCHOR, ZN 12X165', 500, 130.37, 351.00, 1, 6, 245),
(89, '( B1 ) - MECHANICAL ANCHOR, ZN 16X105', 100, 163.68, 443.00, 1, 6, 249),
(90, '( B1 ) - MECHANICAL ANCHOR, ZN 16X125', 1000, 188.85, 506.00, 1, 6, 253),
(91, '( B1 ) - MECHANICAL ANCHOR, ZN 16X145', 989, 211.48, 570.00, 1, 6, 257),
(92, '( B1 ) - MECHANICAL ANCHOR, ZN 16X165', 120, 240.05, 644.00, 1, 6, 261),
(93, '( B1 ) - SLEAVE ANCHOR - 8x40', 200, 42.03, 90.00, 1, 6, 265),
(94, '( B1 ) - DRYWALL SCREW TO METAL, PH DRIVE 3,5X35  KG', 10, 689.43, 2000.00, 1, 6, 269),
(95, '( B1 ) - SELF-DRILLING SCREW (TIMBER IN STEEL)  PH DRIVE - 4.8x50', 1000, 6.47, 15.00, 1, 6, 273),
(96, '( B1 ) - SELF-DRILLING SCREW (TIMBER IN STEEL)  PH DRIVE - 5.5x38', 1000, 5.44, 12.00, 1, 6, 277),
(97, '( B1 ) - SELF-DRILLING SCREW (TIMBER IN STEEL)  PH DRIVE - 5.5x45', 1000, 5.97, 15.00, 1, 6, 281),
(98, '( B1 ) - SELF-DRILLING SCREW WITH HEX HEAD - 5.5x25', 1000, 4.35, 10.00, 1, 6, 285),
(99, '( B1 ) - PURE EPORY -585ml', 199, 3.00, 9200.00, 1, 6, 289),
(100, '( B3 ) - EXPANSION PLUG - PP - 6 X 30', 50000, 0.69, 2.50, 1, 6, 295),
(101, '( B3 ) - 3 - WAY NYLON EXPANSION PLUG - 6 x 30', 29000, 1.14, 3.50, 1, 6, 299),
(102, '( B2 ) - WASH BASIN FIXING KIT', 50, 56.08, 423.08, 1, 6, 302),
(103, '( B1 ) - METHACRYLATE INJECTION ANCHOR MAKALU 410ml', 88, 1505.43, 6200.00, 1, 6, 313),
(104, '( B1 ) - RESIN INJECTION TOOL 585ml - Chemical Gun', 17, 6924.88, 15000.00, 1, 6, 317),
(105, '( B1 ) - RESIN INJECTION TOOL 410ml - Chemical Gun', 18, 5340.48, 13000.00, 1, 6, 321);

-- --------------------------------------------------------

--
-- Table structure for table `po_tbl`
--

CREATE TABLE `po_tbl` (
  `po_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` int(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_tbl`
--

INSERT INTO `po_tbl` (`po_id`, `user_id`, `supplier_id`, `location`, `status`, `date`) VALUES
(2, 3, 1, ' Head Office ', 1, '2021-10-01'),
(3, 3, 1, ' Head Office ', 1, '2021-10-01'),
(4, 3, 1, ' Head Office ', 1, '2021-10-01'),
(5, 3, 1, ' Head Office ', 1, '2021-10-01'),
(6, 3, 1, ' Head Office ', 1, '2021-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
  `pro_id` int(25) NOT NULL,
  `pro_name` varchar(100) DEFAULT NULL,
  `pro_code` varchar(100) DEFAULT NULL,
  `cat_id` int(25) DEFAULT NULL,
  `subcat_id` int(25) DEFAULT NULL,
  `brand_id` int(25) DEFAULT NULL,
  `pro_desc` varchar(100) DEFAULT NULL,
  `pro_cost` double DEFAULT NULL,
  `pro_price` double DEFAULT NULL,
  `pro_all_qty` double DEFAULT NULL,
  `pro_img` varchar(100) DEFAULT NULL,
  `supplier_id` int(100) DEFAULT NULL,
  `added_date` varchar(100) DEFAULT NULL,
  `added_user` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`pro_id`, `pro_name`, `pro_code`, `cat_id`, `subcat_id`, `brand_id`, `pro_desc`, `pro_cost`, `pro_price`, `pro_all_qty`, `pro_img`, `supplier_id`, `added_date`, `added_user`) VALUES
(1, '( B1 ) - KPR-FAST-12200K', 'KPR-FAST-12200K', 1, 1, 1, '', 79.93, 300, 25, 'non', 1, '11/07/2021', 3),
(2, '( B2 ) - KPR-FAST-12200K', 'KPR-FAST-12200K', 1, 1, 1, '', 79.93, 300, 25, 'non', 1, '11/07/2021', 3),
(3, '( B3 ) - KPR-FAST-12200K', 'KPR-FAST-12200K', 1, 1, 1, '', 79.93, 300, 25, 'non', 1, '11/07/2021', 3),
(4, '( B4 ) - KPR-FAST-12200K', 'KPR-FAST-12200K', 1, 1, 1, '', 79.93, 300, 25, 'non', 1, '11/07/2021', 3),
(5, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 80', 'KPR-FAST-10080K', 1, 1, 1, '', 30.81, 120, 50, 'non', 1, '11/07/2021', 3),
(6, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 80', 'KPR-FAST-10080K', 1, 1, 1, '', 30.81, 120, 50, 'non', 1, '11/07/2021', 3),
(7, '( B3 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 80', 'KPR-FAST-10080K', 1, 1, 1, '', 30.81, 120, 50, 'non', 1, '11/07/2021', 3),
(8, '( B4 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 80', 'KPR-FAST-10080K', 1, 1, 1, '', 30.81, 120, 50, 'non', 1, '11/07/2021', 3),
(9, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 100', 'KPR-FAST-10100K', 1, 1, 1, '', 37.08, 135, 50, 'non', 1, '11/07/2021', 3),
(10, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 100', 'KPR-FAST-10100K', 1, 1, 1, '', 37.08, 135, 50, 'non', 1, '11/07/2021', 3),
(11, '( B3 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 100', 'KPR-FAST-10100K', 1, 1, 1, '', 37.08, 135, 50, 'non', 1, '11/07/2021', 3),
(12, '( B4 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 100', 'KPR-FAST-10100K', 1, 1, 1, '', 37.08, 135, 50, 'non', 1, '11/07/2021', 3),
(13, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 120', 'KPR-FAST-10120K', 1, 1, 1, '', 38.23, 160, 50, 'non', 1, '11/07/2021', 3),
(14, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 120', 'KPR-FAST-10120K', 1, 1, 1, '', 38.23, 160, 50, 'non', 1, '11/07/2021', 3),
(15, '( B3 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 120', 'KPR-FAST-10120K', 1, 1, 1, '', 38.23, 160, 50, 'non', 1, '11/07/2021', 3),
(16, '( B4 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 120', 'KPR-FAST-10120K', 1, 1, 1, '', 38.23, 160, 50, 'non', 1, '11/07/2021', 3),
(17, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 140', 'KPR-FAST-10140K', 1, 1, 1, '', 44.4, 190, 25, 'non', 1, '11/07/2021', 3),
(18, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 140', 'KPR-FAST-10140K', 1, 1, 1, '', 44.4, 190, 25, 'non', 1, '11/07/2021', 3),
(19, '( B3 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 140', 'KPR-FAST-10140K', 1, 1, 1, '', 44.4, 190, 25, 'non', 1, '11/07/2021', 3),
(20, '( B4 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 140', 'KPR-FAST-10140K', 1, 1, 1, '', 44.4, 190, 25, 'non', 1, '11/07/2021', 3),
(21, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 160', 'KPR-FAST-10160K', 1, 1, 1, '', 61.82, 240, 25, 'non', 1, '11/07/2021', 3),
(22, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 160', 'KPR-FAST-10160K', 1, 1, 1, '', 61.82, 240, 25, 'non', 1, '11/07/2021', 3),
(23, '( B3 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 160', 'KPR-FAST-10160K', 1, 1, 1, '', 61.82, 240, 25, 'non', 1, '11/07/2021', 3),
(24, '( B4 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 160', 'KPR-FAST-10160K', 1, 1, 1, '', 61.82, 240, 25, 'non', 1, '11/07/2021', 3),
(25, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 80 - SS 316', 'KPR-FAST-10080K-A4', 1, 1, 1, '', 102.58, 270, 50, 'non', 1, '11/07/2021', 3),
(26, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 80 - SS 316', 'KPR-FAST-10080K-A4', 1, 1, 1, '', 102.58, 270, 50, 'non', 1, '11/07/2021', 3),
(27, '( B3 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 80 - SS 316', 'KPR-FAST-10080K-A4', 1, 1, 1, '', 102.58, 270, 50, 'non', 1, '11/07/2021', 3),
(28, '( B4 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 80 - SS 316', 'KPR-FAST-10080K-A4', 1, 1, 1, '', 102.58, 270, 50, 'non', 1, '11/07/2021', 3),
(29, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 100 - SS 316', 'KPR-FAST-10100K-A4', 1, 1, 1, '', 99.13, 305, 50, 'non', 1, '11/07/2021', 3),
(30, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 100 - SS 316', 'KPR-FAST-10100K-A4', 1, 1, 1, '', 99.13, 305, 50, 'non', 1, '11/07/2021', 3),
(31, '( B3 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 100 - SS 316', 'KPR-FAST-10100K-A4', 1, 1, 1, '', 99.13, 305, 50, 'non', 1, '11/07/2021', 3),
(32, '( B4 ) - FRAME ANCHOR WITH HEX & TX HEAD - 10 X 100 - SS 316', 'KPR-FAST-10100K-A4', 1, 1, 1, '', 99.13, 305, 50, 'non', 1, '11/07/2021', 3),
(33, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 80', 'KPS-FAST-08080K', 1, 1, 1, '', 29.33, 105, 50, 'non', 1, '11/07/2021', 3),
(34, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 80', 'KPS-FAST-08080K', 1, 1, 1, '', 29.33, 105, 50, 'non', 1, '11/07/2021', 3),
(35, '( B3 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 80', 'KPS-FAST-08080K', 1, 1, 1, '', 29.33, 105, 50, 'non', 1, '11/07/2021', 3),
(36, '( B4 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 80', 'KPS-FAST-08080K', 1, 1, 1, '', 29.33, 105, 50, 'non', 1, '11/07/2021', 3),
(37, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 100', 'KPS-FAST-08100K', 1, 1, 1, '', 32.99, 115, 50, 'non', 1, '11/07/2021', 3),
(38, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 100', 'KPS-FAST-08100K', 1, 1, 1, '', 32.99, 115, 50, 'non', 1, '11/07/2021', 3),
(39, '( B3 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 100', 'KPS-FAST-08100K', 1, 1, 1, '', 32.99, 115, 50, 'non', 1, '11/07/2021', 3),
(40, '( B4 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 100', 'KPS-FAST-08100K', 1, 1, 1, '', 32.99, 115, 50, 'non', 1, '11/07/2021', 3),
(41, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 120', 'KPS-FAST-08120K', 1, 1, 1, '', 38.79, 135, 50, 'non', 1, '11/07/2021', 3),
(42, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 120', 'KPS-FAST-08120K', 1, 1, 1, '', 38.79, 135, 50, 'non', 1, '11/07/2021', 3),
(43, '( B3 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 120', 'KPS-FAST-08120K', 1, 1, 1, '', 38.79, 135, 50, 'non', 1, '11/07/2021', 3),
(44, '( B4 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 120', 'KPS-FAST-08120K', 1, 1, 1, '', 38.79, 135, 50, 'non', 1, '11/07/2021', 3),
(45, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 80 - SS 316', 'KPS-FAST-08080K-A4', 1, 1, 1, '', 87.94, 260, 50, 'non', 1, '11/07/2021', 3),
(46, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 80 - SS 316', 'KPS-FAST-08080K-A4', 1, 1, 1, '', 87.94, 260, 50, 'non', 1, '11/07/2021', 3),
(47, '( B3 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 80 - SS 316', 'KPS-FAST-08080K-A4', 1, 1, 1, '', 87.94, 260, 50, 'non', 1, '11/07/2021', 3),
(48, '( B4 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 80 - SS 316', 'KPS-FAST-08080K-A4', 1, 1, 1, '', 87.94, 260, 50, 'non', 1, '11/07/2021', 3),
(49, '( B1 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 100 - SS 316', 'KPS-FAST-08100K-A4', 1, 1, 1, '', 108.98, 295, 50, 'non', 1, '11/07/2021', 3),
(50, '( B2 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 100 - SS 316', 'KPS-FAST-08100K-A4', 1, 1, 1, '', 108.98, 295, 50, 'non', 1, '11/07/2021', 3),
(51, '( B3 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 100 - SS 316', 'KPS-FAST-08100K-A4', 1, 1, 1, '', 108.98, 295, 50, 'non', 1, '11/07/2021', 3),
(52, '( B4 ) - FRAME ANCHOR WITH HEX & TX HEAD - 8 X 100 - SS 316', 'KPS-FAST-08100K-A4', 1, 1, 1, '', 108.98, 295, 50, 'non', 1, '11/07/2021', 3),
(53, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 80', 'KPS-FAST-08080S', 1, 1, 1, '', 30.06, 100, 48, 'non', 1, '11/07/2021', 3),
(54, '( B2 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 80', 'KPS-FAST-08080S', 1, 1, 1, '', 30.06, 100, 48, 'non', 1, '11/07/2021', 3),
(55, '( B3 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 80', 'KPS-FAST-08080S', 1, 1, 1, '', 30.06, 100, 48, 'non', 1, '11/07/2021', 3),
(56, '( B4 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 80', 'KPS-FAST-08080S', 1, 1, 1, '', 30.06, 100, 48, 'non', 1, '11/07/2021', 3),
(57, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 100', 'KPS-FAST-08100S', 1, 1, 1, '', 33.82, 110, 50, 'non', 1, '11/07/2021', 3),
(58, '( B2 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 100', 'KPS-FAST-08100S', 1, 1, 1, '', 33.82, 110, 50, 'non', 1, '11/07/2021', 3),
(59, '( B3 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 100', 'KPS-FAST-08100S', 1, 1, 1, '', 33.82, 110, 50, 'non', 1, '11/07/2021', 3),
(60, '( B4 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 100', 'KPS-FAST-08100S', 1, 1, 1, '', 33.82, 110, 50, 'non', 1, '11/07/2021', 3),
(61, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 120', 'KPS-FAST-08120S', 1, 1, 1, '', 39.78, 130, 50, 'non', 1, '11/07/2021', 3),
(62, '( B2 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 120', 'KPS-FAST-08120S', 1, 1, 1, '', 39.78, 130, 50, 'non', 1, '11/07/2021', 3),
(63, '( B3 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 120', 'KPS-FAST-08120S', 1, 1, 1, '', 39.78, 130, 50, 'non', 1, '11/07/2021', 3),
(64, '( B4 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 120', 'KPS-FAST-08120S', 1, 1, 1, '', 39.78, 130, 50, 'non', 1, '11/07/2021', 3),
(65, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 10 X 80', 'KPS-FAST-10080S', 1, 1, 1, '', 34.14, 110, 50, 'non', 1, '11/07/2021', 3),
(66, '( B2 ) - FRAME ANCHOR WITH CSK HEAD - 10 X 80', 'KPS-FAST-10080S', 1, 1, 1, '', 34.14, 110, 50, 'non', 1, '11/07/2021', 3),
(67, '( B3 ) - FRAME ANCHOR WITH CSK HEAD - 10 X 80', 'KPS-FAST-10080S', 1, 1, 1, '', 34.14, 110, 50, 'non', 1, '11/07/2021', 3),
(68, '( B4 ) - FRAME ANCHOR WITH CSK HEAD - 10 X 80', 'KPS-FAST-10080S', 1, 1, 1, '', 34.14, 110, 50, 'non', 1, '11/07/2021', 3),
(69, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 10 X 100', 'KPS-FAST-10100S', 1, 1, 1, '', 36.82, 120, 50, 'non', 1, '11/07/2021', 3),
(70, '( B2 ) - FRAME ANCHOR WITH CSK HEAD - 10 X 100', 'KPS-FAST-10100S', 1, 1, 1, '', 36.82, 120, 50, 'non', 1, '11/07/2021', 3),
(71, '( B3 ) - FRAME ANCHOR WITH CSK HEAD - 10 X 100', 'KPS-FAST-10100S', 1, 1, 1, '', 36.82, 120, 50, 'non', 1, '11/07/2021', 3),
(72, '( B4 ) - FRAME ANCHOR WITH CSK HEAD - 10 X 100', 'KPS-FAST-10100S', 1, 1, 1, '', 36.82, 120, 50, 'non', 1, '11/07/2021', 3),
(73, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 120', 'KPS-FAST-10120S', 1, 1, 1, '', 39.12, 155, 50, 'non', 1, '11/07/2021', 3),
(74, '( B2 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 120', 'KPS-FAST-10120S', 1, 1, 1, '', 39.12, 155, 50, 'non', 1, '11/07/2021', 3),
(75, '( B3 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 120', 'KPS-FAST-10120S', 1, 1, 1, '', 39.12, 155, 50, 'non', 1, '11/07/2021', 3),
(76, '( B4 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 120', 'KPS-FAST-10120S', 1, 1, 1, '', 39.12, 155, 50, 'non', 1, '11/07/2021', 3),
(77, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 80 - SS 316', 'KPS-FAST-08080S-A4', 1, 1, 0, '', 86.66, 255, 50, 'non', 1, '11/07/2021', 3),
(78, '( B2 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 80 - SS 316', 'KPS-FAST-08080S-A4', 1, 1, 0, '', 86.66, 255, 50, 'non', 1, '11/07/2021', 3),
(79, '( B3 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 80 - SS 316', 'KPS-FAST-08080S-A4', 1, 1, 0, '', 86.66, 255, 50, 'non', 1, '11/07/2021', 3),
(80, '( B4 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 80 - SS 316', 'KPS-FAST-08080S-A4', 1, 1, 0, '', 86.66, 255, 50, 'non', 1, '11/07/2021', 3),
(81, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 100 - SS 316', 'KPS-FAST-08100S-A4', 1, 1, 1, '', 102.86, 285, 50, 'non', 1, '11/07/2021', 3),
(82, '( B2 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 100 - SS 316', 'KPS-FAST-08100S-A4', 1, 1, 1, '', 102.86, 285, 50, 'non', 1, '11/07/2021', 3),
(83, '( B3 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 100 - SS 316', 'KPS-FAST-08100S-A4', 1, 1, 1, '', 102.86, 285, 50, 'non', 1, '11/07/2021', 3),
(84, '( B4 ) - FRAME ANCHOR WITH CSK HEAD - 8 X 100 - SS 316', 'KPS-FAST-08100S-A4', 1, 1, 1, '', 102.86, 285, 50, 'non', 1, '11/07/2021', 3),
(85, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 8 x 120 - SS 316', 'KPS-FAST-08120S-A4', 1, 1, 1, '', 119.06, 315, 50, 'non', 1, '11/07/2021', 3),
(86, '( B2 ) - FRAME ANCHOR WITH CSK HEAD - 8 x 120 - SS 316', 'KPS-FAST-08120S-A4', 1, 1, 1, '', 119.06, 315, 50, 'non', 1, '11/07/2021', 3),
(87, '( B3 ) - FRAME ANCHOR WITH CSK HEAD - 8 x 120 - SS 316', 'KPS-FAST-08120S-A4', 1, 1, 1, '', 119.06, 315, 50, 'non', 1, '11/07/2021', 3),
(88, '( B4 ) - FRAME ANCHOR WITH CSK HEAD - 8 x 120 - SS 316', 'KPS-FAST-08120S-A4', 1, 1, 1, '', 119.06, 315, 50, 'non', 1, '11/07/2021', 3),
(89, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 80 - SS 316', 'KPS-FAST-10080S-A4', 1, 1, 1, '', 94.5, 265, 50, 'non', 1, '11/07/2021', 3),
(90, '( B2 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 80 - SS 316', 'KPS-FAST-10080S-A4', 1, 1, 1, '', 94.5, 265, 50, 'non', 1, '11/07/2021', 3),
(91, '( B3 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 80 - SS 316', 'KPS-FAST-10080S-A4', 1, 1, 1, '', 94.5, 265, 50, 'non', 1, '11/07/2021', 3),
(92, '( B4 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 80 - SS 316', 'KPS-FAST-10080S-A4', 1, 1, 1, '', 94.5, 265, 50, 'non', 1, '11/07/2021', 3),
(93, '( B1 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 100 - SS 316', 'KPS-FAST-10100S-A4', 1, 1, 1, '', 102.72, 300, 50, 'non', 1, '11/07/2021', 3),
(94, '( B2 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 100 - SS 316', 'KPS-FAST-10100S-A4', 1, 1, 1, '', 102.72, 300, 50, 'non', 1, '11/07/2021', 3),
(95, '( B3 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 100 - SS 316', 'KPS-FAST-10100S-A4', 1, 1, 1, '', 102.72, 300, 50, 'non', 1, '11/07/2021', 3),
(96, '( B4 ) - FRAME ANCHOR WITH CSK HEAD - 10 x 100 - SS 316', 'KPS-FAST-10100S-A4', 1, 1, 1, '', 102.72, 300, 50, 'non', 1, '11/07/2021', 3),
(97, '( B1 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 6 X 50', 'SM-06050', 1, 2, 1, '', 7.81, 25, 200, 'non', 1, '11/07/2021', 3),
(98, '( B2 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 6 X 50', 'SM-06050', 1, 2, 1, '', 7.81, 25, 200, 'non', 1, '11/07/2021', 3),
(99, '( B3 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 6 X 50', 'SM-06050', 1, 2, 1, '', 7.81, 25, 200, 'non', 1, '11/07/2021', 3),
(100, '( B4 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 6 X 50', 'SM-06050', 1, 2, 1, '', 7.81, 25, 200, 'non', 1, '11/07/2021', 3),
(101, '( B1 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 6 X 80', 'SM-06080', 1, 2, 1, '', 7.44, 35, 100, 'non', 1, '11/07/2021', 3),
(102, '( B2 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 6 X 80', 'SM-06080', 1, 2, 1, '', 7.44, 35, 100, 'non', 1, '11/07/2021', 3),
(103, '( B3 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 6 X 80', 'SM-06080', 1, 2, 1, '', 7.44, 35, 100, 'non', 1, '11/07/2021', 3),
(104, '( B4 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 6 X 80', 'SM-06080', 1, 2, 1, '', 7.44, 35, 100, 'non', 1, '11/07/2021', 3),
(105, '( B1 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 8 X 60', 'SM-08060', 1, 2, 1, '', 8.11, 40, 100, 'non', 1, '11/07/2021', 3),
(106, '( B2 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 8 X 60', 'SM-08060', 1, 2, 1, '', 8.11, 40, 100, 'non', 1, '11/07/2021', 3),
(107, '( B3 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 8 X 60', 'SM-08060', 1, 2, 1, '', 8.11, 40, 100, 'non', 1, '11/07/2021', 3),
(108, '( B4 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 8 X 60', 'SM-08060', 1, 2, 1, '', 8.11, 40, 100, 'non', 1, '11/07/2021', 3),
(109, '( B1 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 10 X 80', 'SM-10080', 1, 2, 1, '', 13.39, 45, 50, 'non', 1, '11/07/2021', 3),
(110, '( B2 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 10 X 80', 'SM-10080', 1, 2, 1, '', 13.39, 45, 50, 'non', 1, '11/07/2021', 3),
(111, '( B3 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 10 X 80', 'SM-10080', 1, 2, 1, '', 13.39, 45, 50, 'non', 1, '11/07/2021', 3),
(112, '( B4 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 10 X 80', 'SM-10080', 1, 2, 1, '', 13.39, 45, 50, 'non', 1, '11/07/2021', 3),
(113, '( B1 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 10 X 100', 'SM-10100', 1, 2, 1, '', 15.97, 50, 50, 'non', 1, '11/07/2021', 3),
(114, '( B2 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 10 X 100', 'SM-10100', 1, 2, 1, '', 15.97, 50, 50, 'non', 1, '11/07/2021', 3),
(115, '( B3 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 10 X 100', 'SM-10100', 1, 2, 1, '', 15.97, 50, 50, 'non', 1, '11/07/2021', 3),
(116, '( B4 ) - HAMMER DRIVE FIXING CSK HEAD, HD-PE - 10 X 100', 'SM-10100', 1, 2, 1, '', 15.97, 50, 50, 'non', 1, '11/07/2021', 3),
(117, '( B1 ) - HAMMER DRIVE FIXING CSK HEAD, NYLON - 6 X 50', 'SMN-06050', 1, 2, 1, '', 7.7, 30, 200, 'non', 1, '11/07/2021', 3),
(118, '( B2 ) - HAMMER DRIVE FIXING CSK HEAD, NYLON - 6 X 50', 'SMN-06050', 1, 2, 1, '', 7.7, 30, 200, 'non', 1, '11/07/2021', 3),
(119, '( B3 ) - HAMMER DRIVE FIXING CSK HEAD, NYLON - 6 X 50', 'SMN-06050', 1, 2, 1, '', 7.7, 30, 200, 'non', 1, '11/07/2021', 3),
(120, '( B4 ) - HAMMER DRIVE FIXING CSK HEAD, NYLON - 6 X 50', 'SMN-06050', 1, 2, 1, '', 7.7, 30, 200, 'non', 1, '11/07/2021', 3),
(121, '( B1 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 6 X 30 X 50', 'SFXP-06030050', 1, 3, 1, '', 4.72, 18, 100, 'non', 1, '11/07/2021', 3),
(122, '( B2 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 6 X 30 X 50', 'SFXP-06030050', 1, 3, 1, '', 4.72, 18, 100, 'non', 1, '11/07/2021', 3),
(123, '( B3 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 6 X 30 X 50', 'SFXP-06030050', 1, 3, 1, '', 4.72, 18, 100, 'non', 1, '11/07/2021', 3),
(124, '( B4 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 6 X 30 X 50', 'SFXP-06030050', 1, 3, 1, '', 4.72, 18, 100, 'non', 1, '11/07/2021', 3),
(125, '( B1 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 8 x 40 x 60', 'SFXP-08040060', 1, 3, 1, '', 7.39, 25, 100, 'non', 1, '11/07/2021', 3),
(126, '( B2 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 8 x 40 x 60', 'SFXP-08040060', 1, 3, 1, '', 7.39, 25, 100, 'non', 1, '11/07/2021', 3),
(127, '( B3 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 8 x 40 x 60', 'SFXP-08040060', 1, 3, 1, '', 7.39, 25, 100, 'non', 1, '11/07/2021', 3),
(128, '( B4 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 8 x 40 x 60', 'SFXP-08040060', 1, 3, 1, '', 7.39, 25, 100, 'non', 1, '11/07/2021', 3),
(129, '( B1 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 10 x 50 x 60', 'SFXP-10050060', 1, 3, 1, '', 11.41, 32, 50, 'non', 1, '11/07/2021', 3),
(130, '( B2 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 10 x 50 x 60', 'SFXP-10050060', 1, 3, 1, '', 11.41, 32, 50, 'non', 1, '11/07/2021', 3),
(131, '( B3 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 10 x 50 x 60', 'SFXP-10050060', 1, 3, 1, '', 11.41, 32, 50, 'non', 1, '11/07/2021', 3),
(132, '( B4 ) - UNIVERSAL NYLON PLUG WITH CSK SCREW - 10 x 50 x 60', 'SFXP-10050060', 1, 3, 1, '', 11.41, 32, 50, 'non', 1, '11/07/2021', 3),
(133, '( B1 ) - EXPANSION PLUG - PP - 8 X 40', 'KPX-08040', 1, 4, 1, '', 1.58, 6, 500, 'non', 1, '11/07/2021', 3),
(134, '( B2 ) - EXPANSION PLUG - PP - 8 X 40', 'KPX-08040', 1, 4, 1, '', 1.58, 6, 500, 'non', 1, '11/07/2021', 3),
(135, '( B3 ) - EXPANSION PLUG - PP - 8 X 40', 'KPX-08040', 1, 4, 1, '', 1.58, 6, 500, 'non', 1, '11/07/2021', 3),
(136, '( B4 ) - EXPANSION PLUG - PP - 8 X 40', 'KPX-08040', 1, 4, 1, '', 1.58, 6, 500, 'non', 1, '11/07/2021', 3),
(137, '( B1 ) - EXPANSION PLUG - PP - 8 X 50', 'KPX-08050', 1, 4, 1, '', 2.25, 6, 400, 'non', 1, '11/07/2021', 3),
(138, '( B2 ) - EXPANSION PLUG - PP - 8 X 50', 'KPX-08050', 1, 4, 1, '', 2.25, 6, 400, 'non', 1, '11/07/2021', 3),
(139, '( B3 ) - EXPANSION PLUG - PP - 8 X 50', 'KPX-08050', 1, 4, 1, '', 2.25, 6, 400, 'non', 1, '11/07/2021', 3),
(140, '( B4 ) - EXPANSION PLUG - PP - 8 X 50', 'KPX-08050', 1, 4, 1, '', 2.25, 6, 400, 'non', 1, '11/07/2021', 3),
(141, '( B1 ) - PZ TYPE SCREW DRIVER BIT (10 pcs)', 'PZ-S2-02025', 1, 5, 1, '', 249.87, 1500, 10, 'non', 1, '11/07/2021', 3),
(142, '( B2 ) - PZ TYPE SCREW DRIVER BIT (10 pcs)', 'PZ-S2-02025', 1, 5, 1, '', 249.87, 1500, 10, 'non', 1, '11/07/2021', 3),
(143, '( B3 ) - PZ TYPE SCREW DRIVER BIT (10 pcs)', 'PZ-S2-02025', 1, 5, 1, '', 249.87, 1500, 10, 'non', 1, '11/07/2021', 3),
(144, '( B4 ) - PZ TYPE SCREW DRIVER BIT (10 pcs)', 'PZ-S2-02025', 1, 5, 1, '', 249.87, 1500, 10, 'non', 1, '11/07/2021', 3),
(145, '( B1 ) - PZ TYPE SCREW DRIVER BIT (10 pcs)', 'PZ-S2-03025', 1, 5, 1, '', 249.87, 1800, 10, 'non', 1, '11/07/2021', 3),
(146, '( B2 ) - PZ TYPE SCREW DRIVER BIT (10 pcs)', 'PZ-S2-03025', 1, 5, 1, '', 249.87, 1800, 10, 'non', 1, '11/07/2021', 3),
(147, '( B3 ) - PZ TYPE SCREW DRIVER BIT (10 pcs)', 'PZ-S2-03025', 1, 5, 1, '', 249.87, 1800, 10, 'non', 1, '11/07/2021', 3),
(148, '( B4 ) - PZ TYPE SCREW DRIVER BIT (10 pcs)', 'PZ-S2-03025', 1, 5, 1, '', 249.87, 1800, 10, 'non', 1, '11/07/2021', 3),
(149, '( B1 ) - TX TYPE SCREW DRIVER BIT (5 pcs)', 'TX-30S2', 1, 5, 1, '', 163.49, 1050, 10, 'non', 1, '11/07/2021', 3),
(150, '( B2 ) - TX TYPE SCREW DRIVER BIT (5 pcs)', 'TX-30S2', 1, 5, 1, '', 163.49, 1050, 10, 'non', 1, '11/07/2021', 3),
(151, '( B3 ) - TX TYPE SCREW DRIVER BIT (5 pcs)', 'TX-30S2', 1, 5, 1, '', 163.49, 1050, 10, 'non', 1, '11/07/2021', 3),
(152, '( B4 ) - TX TYPE SCREW DRIVER BIT (5 pcs)', 'TX-30S2', 1, 5, 1, '', 163.49, 1050, 10, 'non', 1, '11/07/2021', 3),
(153, '( B1 ) - TX TYPE SCREW DRIVER BIT (2 pcs)', 'TX-40S2', 1, 5, 1, '', 187.06, 550, 10, 'non', 1, '11/07/2021', 3),
(154, '( B2 ) - TX TYPE SCREW DRIVER BIT (2 pcs)', 'TX-40S2', 1, 5, 1, '', 187.06, 550, 10, 'non', 1, '11/07/2021', 3),
(155, '( B3 ) - TX TYPE SCREW DRIVER BIT (2 pcs)', 'TX-40S2', 1, 5, 1, '', 187.06, 550, 10, 'non', 1, '11/07/2021', 3),
(156, '( B4 ) - TX TYPE SCREW DRIVER BIT (2 pcs)', 'TX-40S2', 1, 5, 1, '', 187.06, 550, 10, 'non', 1, '11/07/2021', 3),
(157, '( B1 ) - TX-30 DRIVER BIT WITH 160mm LENGHT', 'TX-30S2-160', 1, 5, 1, '', 154.91, 450, 10, 'non', 1, '11/07/2021', 3),
(158, '( B2 ) - TX-30 DRIVER BIT WITH 160mm LENGHT', 'TX-30S2-160', 1, 5, 1, '', 154.91, 450, 10, 'non', 1, '11/07/2021', 3),
(159, '( B3 ) - TX-30 DRIVER BIT WITH 160mm LENGHT', 'TX-30S2-160', 1, 5, 1, '', 154.91, 450, 10, 'non', 1, '11/07/2021', 3),
(160, '( B4 ) - TX-30 DRIVER BIT WITH 160mm LENGHT', 'TX-30S2-160', 1, 5, 1, '', 154.91, 450, 10, 'non', 1, '11/07/2021', 3),
(161, '( B1 ) - UNIVERSAL NYLON PLUG WITH C HOOK 6 x 30 x 65', 'SFXC-06030065', 1, 3, 1, '', 29.61, 65, 50, 'non', 1, '11/07/2021', 3),
(162, '( B2 ) - UNIVERSAL NYLON PLUG WITH C HOOK 6 x 30 x 65', 'SFXC-06030065', 1, 3, 1, '', 29.61, 65, 50, 'non', 1, '11/07/2021', 3),
(163, '( B3 ) - UNIVERSAL NYLON PLUG WITH C HOOK 6 x 30 x 65', 'SFXC-06030065', 1, 3, 1, '', 29.61, 65, 50, 'non', 1, '11/07/2021', 3),
(164, '( B4 ) - UNIVERSAL NYLON PLUG WITH C HOOK 6 x 30 x 65', 'SFXC-06030065', 1, 3, 1, '', 29.61, 65, 50, 'non', 1, '11/07/2021', 3),
(165, '( B1 ) - UNIVERSAL NYLON PLUG WITH C HOOK 8 x 40 x 83', 'SFXC-08040083', 1, 3, 1, '', 40.23, 85, 25, 'non', 1, '11/07/2021', 3),
(166, '( B2 ) - UNIVERSAL NYLON PLUG WITH C HOOK 8 x 40 x 83', 'SFXC-08040083', 1, 3, 1, '', 40.23, 85, 25, 'non', 1, '11/07/2021', 3),
(167, '( B3 ) - UNIVERSAL NYLON PLUG WITH C HOOK 8 x 40 x 83', 'SFXC-08040083', 1, 3, 1, '', 40.23, 85, 25, 'non', 1, '11/07/2021', 3),
(168, '( B4 ) - UNIVERSAL NYLON PLUG WITH C HOOK 8 x 40 x 83', 'SFXC-08040083', 1, 3, 1, '', 40.23, 85, 25, 'non', 1, '11/07/2021', 3),
(169, '( B1 ) - UNIVERSAL NYLON PLUG EYE BOLT 6 x 30 x 64', 'SFXO-06030064', 1, 3, 1, '', 31, 65, 50, 'non', 1, '11/07/2021', 3),
(170, '( B2 ) - UNIVERSAL NYLON PLUG EYE BOLT 6 x 30 x 64', 'SFXO-06030064', 1, 3, 1, '', 31, 65, 50, 'non', 1, '11/07/2021', 3),
(171, '( B3 ) - UNIVERSAL NYLON PLUG EYE BOLT 6 x 30 x 64', 'SFXO-06030064', 1, 3, 1, '', 31, 65, 50, 'non', 1, '11/07/2021', 3),
(172, '( B4 ) - UNIVERSAL NYLON PLUG EYE BOLT 6 x 30 x 64', 'SFXO-06030064', 1, 3, 1, '', 31, 65, 50, 'non', 1, '11/07/2021', 3),
(173, '( B1 ) - UNIVERSAL NYLON PLUG EYE BOLT 8 x 40 x 85', 'SFXO-08040085', 1, 3, 1, '', 42.14, 85, 25, 'non', 1, '11/07/2021', 3),
(174, '( B2 ) - UNIVERSAL NYLON PLUG EYE BOLT 8 x 40 x 85', 'SFXO-08040085', 1, 3, 1, '', 42.14, 85, 25, 'non', 1, '11/07/2021', 3),
(175, '( B3 ) - UNIVERSAL NYLON PLUG EYE BOLT 8 x 40 x 85', 'SFXO-08040085', 1, 3, 1, '', 42.14, 85, 25, 'non', 1, '11/07/2021', 3),
(176, '( B4 ) - UNIVERSAL NYLON PLUG EYE BOLT 8 x 40 x 85', 'SFXO-08040085', 1, 3, 1, '', 42.14, 85, 25, 'non', 1, '11/07/2021', 3),
(177, '( B1 ) - PLASTERBOARD PLUG WITH SCREW', 'GKW', 1, 7, 1, '', 5.97, 18, 100, 'non', 1, '11/07/2021', 3),
(178, '( B2 ) - PLASTERBOARD PLUG WITH SCREW', 'GKW', 1, 7, 1, '', 5.97, 18, 100, 'non', 1, '11/07/2021', 3),
(179, '( B3 ) - PLASTERBOARD PLUG WITH SCREW', 'GKW', 1, 7, 1, '', 5.97, 18, 100, 'non', 1, '11/07/2021', 3),
(180, '( B4 ) - PLASTERBOARD PLUG WITH SCREW', 'GKW', 1, 7, 1, '', 5.97, 18, 100, 'non', 1, '11/07/2021', 3),
(181, '( B1 ) - DROP-IN METAL ANCHOR', 'TSW-08', 1, 8, 1, '', 29.37, 40, 10, 'non', 1, '11/07/2021', 3),
(182, '( B2 ) - DROP-IN METAL ANCHOR', 'TSW-08', 1, 8, 1, '', 29.37, 40, 10, 'non', 1, '11/07/2021', 3),
(183, '( B3 ) - DROP-IN METAL ANCHOR', 'TSW-08', 1, 8, 1, '', 29.37, 40, 10, 'non', 1, '11/07/2021', 3),
(184, '( B4 ) - DROP-IN METAL ANCHOR', 'TSW-08', 1, 8, 1, '', 29.37, 40, 10, 'non', 1, '11/07/2021', 3),
(185, '( B1 ) - DROP-IN METAL ANCHOR - 10', 'TSW-10', 1, 8, 1, '', 50.35, 55, 10, 'non', 1, '11/07/2021', 3),
(186, '( B2 ) - DROP-IN METAL ANCHOR - 10', 'TSW-10', 1, 8, 1, '', 50.35, 55, 10, 'non', 1, '11/07/2021', 3),
(187, '( B3 ) - DROP-IN METAL ANCHOR - 10', 'TSW-10', 1, 8, 1, '', 50.35, 55, 10, 'non', 1, '11/07/2021', 3),
(188, '( B4 ) - DROP-IN METAL ANCHOR - 10', 'TSW-10', 1, 8, 1, '', 50.35, 55, 10, 'non', 1, '11/07/2021', 3),
(189, '( B1 ) - DROP-IN METAL ANCHOR - 12', 'TSW-12', 1, 8, 1, '', 90.56, 125, 10, 'non', 1, '11/07/2021', 3),
(190, '( B2 ) - DROP-IN METAL ANCHOR - 12', 'TSW-12', 1, 8, 1, '', 90.56, 125, 10, 'non', 1, '11/07/2021', 3),
(191, '( B3 ) - DROP-IN METAL ANCHOR - 12', 'TSW-12', 1, 8, 1, '', 90.56, 125, 10, 'non', 1, '11/07/2021', 3),
(192, '( B4 ) - DROP-IN METAL ANCHOR - 12', 'TSW-12', 1, 8, 1, '', 90.56, 125, 10, 'non', 1, '11/07/2021', 3),
(193, '( B1 ) - EXPANSION PLUG PP WITH CSK SCREW - 6/3, 5 X 40', 'KRX-063540', 1, 4, 1, '', 2.18, 15, 200, 'non', 1, '11/07/2021', 3),
(194, '( B2 ) - EXPANSION PLUG PP WITH CSK SCREW - 6/3, 5 X 40', 'KRX-063540', 1, 4, 1, '', 2.18, 15, 200, 'non', 1, '11/07/2021', 3),
(195, '( B3 ) - EXPANSION PLUG PP WITH CSK SCREW - 6/3, 5 X 40', 'KRX-063540', 1, 4, 1, '', 2.18, 15, 200, 'non', 1, '11/07/2021', 3),
(196, '( B4 ) - EXPANSION PLUG PP WITH CSK SCREW - 6/3, 5 X 40', 'KRX-063540', 1, 4, 1, '', 2.18, 15, 200, 'non', 1, '11/07/2021', 3),
(197, '( B1 ) - EXPANSION PLUG PP WITH CSK SCREW - 8/4, 0 X 60', 'KRX-084060', 1, 4, 1, '', 3.99, 20, 100, 'non', 1, '11/07/2021', 3),
(198, '( B2 ) - EXPANSION PLUG PP WITH CSK SCREW - 8/4, 0 X 60', 'KRX-084060', 1, 4, 1, '', 3.99, 20, 100, 'non', 1, '11/07/2021', 3),
(199, '( B3 ) - EXPANSION PLUG PP WITH CSK SCREW - 8/4, 0 X 60', 'KRX-084060', 1, 4, 1, '', 3.99, 20, 100, 'non', 1, '11/07/2021', 3),
(200, '( B4 ) - EXPANSION PLUG PP WITH CSK SCREW - 8/4, 0 X 60', 'KRX-084060', 1, 4, 1, '', 3.99, 20, 100, 'non', 1, '11/07/2021', 3),
(201, '( B1 ) - MECHANICAL ANCHOR, ZN 8X95', 'LE-ZN-08095', 1, 8, 1, '', 43.97, 121, 100, 'non', 1, '11/07/2021', 3),
(202, '( B2 ) - MECHANICAL ANCHOR, ZN 8X95', 'LE-ZN-08095', 1, 8, 1, '', 43.97, 121, 100, 'non', 1, '11/07/2021', 3),
(203, '( B3 ) - MECHANICAL ANCHOR, ZN 8X95', 'LE-ZN-08095', 1, 8, 1, '', 43.97, 121, 100, 'non', 1, '11/07/2021', 3),
(204, '( B4 ) - MECHANICAL ANCHOR, ZN 8X95', 'LE-ZN-08095', 1, 8, 1, '', 43.97, 121, 100, 'non', 1, '11/07/2021', 3),
(205, '( B1 ) - MECHANICAL ANCHOR, ZN 8X75', 'LE-ZN-08075', 1, 8, 1, '', 39.25, 110, 100, 'non', 1, '11/07/2021', 3),
(206, '( B2 ) - MECHANICAL ANCHOR, ZN 8X75', 'LE-ZN-08075', 1, 8, 1, '', 39.25, 110, 100, 'non', 1, '11/07/2021', 3),
(207, '( B3 ) - MECHANICAL ANCHOR, ZN 8X75', 'LE-ZN-08075', 1, 8, 1, '', 39.25, 110, 100, 'non', 1, '11/07/2021', 3),
(208, '( B4 ) - MECHANICAL ANCHOR, ZN 8X75', 'LE-ZN-08075', 1, 8, 1, '', 39.25, 110, 100, 'non', 1, '11/07/2021', 3),
(209, '( B1 ) - MECHANICAL ANCHOR, ZN 10X85', 'LE-ZN-10085', 1, 8, 1, '', 56.71, 156, 100, 'non', 1, '11/07/2021', 3),
(210, '( B2 ) - MECHANICAL ANCHOR, ZN 10X85', 'LE-ZN-10085', 1, 8, 1, '', 56.71, 156, 100, 'non', 1, '11/07/2021', 3),
(211, '( B3 ) - MECHANICAL ANCHOR, ZN 10X85', 'LE-ZN-10085', 1, 8, 1, '', 56.71, 156, 100, 'non', 1, '11/07/2021', 3),
(212, '( B4 ) - MECHANICAL ANCHOR, ZN 10X85', 'LE-ZN-10085', 1, 8, 1, '', 56.71, 156, 100, 'non', 1, '11/07/2021', 3),
(213, '( B1 ) - MECHANICAL ANCHOR, ZN 10X115', 'LE-ZN-10115', 1, 8, 1, '', 76.2, 207, 100, 'non', 1, '11/07/2021', 3),
(214, '( B2 ) - MECHANICAL ANCHOR, ZN 10X115', 'LE-ZN-10115', 1, 8, 1, '', 76.2, 207, 100, 'non', 1, '11/07/2021', 3),
(215, '( B3 ) - MECHANICAL ANCHOR, ZN 10X115', 'LE-ZN-10115', 1, 8, 1, '', 76.2, 207, 100, 'non', 1, '11/07/2021', 3),
(216, '( B4 ) - MECHANICAL ANCHOR, ZN 10X115', 'LE-ZN-10115', 1, 8, 1, '', 76.2, 207, 100, 'non', 1, '11/07/2021', 3),
(217, '( B1 ) - MECHANICAL ANCHOR, ZN 10X135', 'LE-ZN-10135', 1, 8, 1, '', 86.95, 236, 100, 'non', 1, '11/07/2021', 3),
(218, '( B2 ) - MECHANICAL ANCHOR, ZN 10X135', 'LE-ZN-10135', 1, 8, 1, '', 86.95, 236, 100, 'non', 1, '11/07/2021', 3),
(219, '( B3 ) - MECHANICAL ANCHOR, ZN 10X135', 'LE-ZN-10135', 1, 8, 1, '', 86.95, 236, 100, 'non', 1, '11/07/2021', 3),
(220, '( B4 ) - MECHANICAL ANCHOR, ZN 10X135', 'LE-ZN-10135', 1, 8, 1, '', 86.95, 236, 100, 'non', 1, '11/07/2021', 3),
(221, '( B1 ) - MECHANICAL ANCHOR, ZN 12X85', 'LE-ZN-12085', 1, 8, 1, '', 77.19, 207, 100, 'non', 1, '11/07/2021', 3),
(222, '( B2 ) - MECHANICAL ANCHOR, ZN 12X85', 'LE-ZN-12085', 1, 8, 1, '', 77.19, 207, 100, 'non', 1, '11/07/2021', 3),
(223, '( B3 ) - MECHANICAL ANCHOR, ZN 12X85', 'LE-ZN-12085', 1, 8, 1, '', 77.19, 207, 100, 'non', 1, '11/07/2021', 3),
(224, '( B4 ) - MECHANICAL ANCHOR, ZN 12X85', 'LE-ZN-12085', 1, 8, 1, '', 77.19, 207, 100, 'non', 1, '11/07/2021', 3),
(225, '( B1 ) - MECHANICAL ANCHOR, ZN 12X95', 'LE-ZN-12095', 1, 8, 1, '', 80.42, 219, 100, 'non', 1, '11/07/2021', 3),
(226, '( B2 ) - MECHANICAL ANCHOR, ZN 12X95', 'LE-ZN-12095', 1, 8, 1, '', 80.42, 219, 100, 'non', 1, '11/07/2021', 3),
(227, '( B3 ) - MECHANICAL ANCHOR, ZN 12X95', 'LE-ZN-12095', 1, 8, 1, '', 80.42, 219, 100, 'non', 1, '11/07/2021', 3),
(228, '( B4 ) - MECHANICAL ANCHOR, ZN 12X95', 'LE-ZN-12095', 1, 8, 1, '', 80.42, 219, 100, 'non', 1, '11/07/2021', 3),
(229, '( B1 ) - MECHANICAL ANCHOR, ZN 12X105', 'LE-ZN-12105', 1, 8, 1, '', 88.74, 236, 100, 'non', 1, '11/07/2021', 3),
(230, '( B2 ) - MECHANICAL ANCHOR, ZN 12X105', 'LE-ZN-12105', 1, 8, 1, '', 88.74, 236, 100, 'non', 1, '11/07/2021', 3),
(231, '( B3 ) - MECHANICAL ANCHOR, ZN 12X105', 'LE-ZN-12105', 1, 8, 1, '', 88.74, 236, 100, 'non', 1, '11/07/2021', 3),
(232, '( B4 ) - MECHANICAL ANCHOR, ZN 12X105', 'LE-ZN-12105', 1, 8, 1, '', 88.74, 236, 100, 'non', 1, '11/07/2021', 3),
(233, '( B1 ) - MECHANICAL ANCHOR, ZN 12X115', 'LE-ZN-12115', 1, 8, 1, '', 99.03, 271, 100, 'non', 1, '11/07/2021', 3),
(234, '( B2 ) - MECHANICAL ANCHOR, ZN 12X115', 'LE-ZN-12115', 1, 8, 1, '', 99.03, 271, 100, 'non', 1, '11/07/2021', 3),
(235, '( B3 ) - MECHANICAL ANCHOR, ZN 12X115', 'LE-ZN-12115', 1, 8, 1, '', 99.03, 271, 100, 'non', 1, '11/07/2021', 3),
(236, '( B4 ) - MECHANICAL ANCHOR, ZN 12X115', 'LE-ZN-12115', 1, 8, 1, '', 99.03, 271, 100, 'non', 1, '11/07/2021', 3),
(237, '( B1 ) - MECHANICAL ANCHOR, ZN 12X125', 'LE-ZN-12125', 1, 8, 1, '', 102.1, 276, 100, 'non', 1, '11/07/2021', 3),
(238, '( B2 ) - MECHANICAL ANCHOR, ZN 12X125', 'LE-ZN-12125', 1, 8, 1, '', 102.1, 276, 100, 'non', 1, '11/07/2021', 3),
(239, '( B3 ) - MECHANICAL ANCHOR, ZN 12X125', 'LE-ZN-12125', 1, 8, 1, '', 102.1, 276, 100, 'non', 1, '11/07/2021', 3),
(240, '( B4 ) - MECHANICAL ANCHOR, ZN 12X125', 'LE-ZN-12125', 1, 8, 1, '', 102.1, 276, 100, 'non', 1, '11/07/2021', 3),
(241, '( B1 ) - MECHANICAL ANCHOR, ZN 12X145', 'LE-ZN-12145', 1, 8, 1, '', 117.73, 317, 100, 'non', 1, '11/07/2021', 3),
(242, '( B2 ) - MECHANICAL ANCHOR, ZN 12X145', 'LE-ZN-12145', 1, 8, 1, '', 117.73, 317, 100, 'non', 1, '11/07/2021', 3),
(243, '( B3 ) - MECHANICAL ANCHOR, ZN 12X145', 'LE-ZN-12145', 1, 8, 1, '', 117.73, 317, 100, 'non', 1, '11/07/2021', 3),
(244, '( B4 ) - MECHANICAL ANCHOR, ZN 12X145', 'LE-ZN-12145', 1, 8, 1, '', 117.73, 317, 100, 'non', 1, '11/07/2021', 3),
(245, '( B1 ) - MECHANICAL ANCHOR, ZN 12X165', 'LE-ZN-12165', 1, 8, 1, '', 130.37, 351, 100, 'non', 1, '11/07/2021', 3),
(246, '( B2 ) - MECHANICAL ANCHOR, ZN 12X165', 'LE-ZN-12165', 1, 8, 1, '', 130.37, 351, 100, 'non', 1, '11/07/2021', 3),
(247, '( B3 ) - MECHANICAL ANCHOR, ZN 12X165', 'LE-ZN-12165', 1, 8, 1, '', 130.37, 351, 100, 'non', 1, '11/07/2021', 3),
(248, '( B4 ) - MECHANICAL ANCHOR, ZN 12X165', 'LE-ZN-12165', 1, 8, 1, '', 130.37, 351, 100, 'non', 1, '11/07/2021', 3),
(249, '( B1 ) - MECHANICAL ANCHOR, ZN 16X105', 'LE-ZN-16105', 1, 8, 1, '', 163.68, 443, 100, 'non', 1, '11/07/2021', 3),
(250, '( B2 ) - MECHANICAL ANCHOR, ZN 16X105', 'LE-ZN-16105', 1, 8, 1, '', 163.68, 443, 100, 'non', 1, '11/07/2021', 3),
(251, '( B3 ) - MECHANICAL ANCHOR, ZN 16X105', 'LE-ZN-16105', 1, 8, 1, '', 163.68, 443, 100, 'non', 1, '11/07/2021', 3),
(252, '( B4 ) - MECHANICAL ANCHOR, ZN 16X105', 'LE-ZN-16105', 1, 8, 1, '', 163.68, 443, 100, 'non', 1, '11/07/2021', 3),
(253, '( B1 ) - MECHANICAL ANCHOR, ZN 16X125', 'LE-ZN-16125', 1, 8, 1, '', 188.85, 506, 100, 'non', 1, '11/08/2021', 3),
(254, '( B2 ) - MECHANICAL ANCHOR, ZN 16X125', 'LE-ZN-16125', 1, 8, 1, '', 188.85, 506, 100, 'non', 1, '11/08/2021', 3),
(255, '( B3 ) - MECHANICAL ANCHOR, ZN 16X125', 'LE-ZN-16125', 1, 8, 1, '', 188.85, 506, 100, 'non', 1, '11/08/2021', 3),
(256, '( B4 ) - MECHANICAL ANCHOR, ZN 16X125', 'LE-ZN-16125', 1, 8, 1, '', 188.85, 506, 100, 'non', 1, '11/08/2021', 3),
(257, '( B1 ) - MECHANICAL ANCHOR, ZN 16X145', 'LE-ZN-16145', 1, 8, 1, '', 211.48, 570, 100, 'non', 1, '11/08/2021', 3),
(258, '( B2 ) - MECHANICAL ANCHOR, ZN 16X145', 'LE-ZN-16145', 1, 8, 1, '', 211.48, 570, 100, 'non', 1, '11/08/2021', 3),
(259, '( B3 ) - MECHANICAL ANCHOR, ZN 16X145', 'LE-ZN-16145', 1, 8, 1, '', 211.48, 570, 100, 'non', 1, '11/08/2021', 3),
(260, '( B4 ) - MECHANICAL ANCHOR, ZN 16X145', 'LE-ZN-16145', 1, 8, 1, '', 211.48, 570, 100, 'non', 1, '11/08/2021', 3),
(261, '( B1 ) - MECHANICAL ANCHOR, ZN 16X165', 'LE-ZN-16165', 1, 8, 0, '', 240.05, 644, 100, 'non', 1, '11/08/2021', 3),
(262, '( B2 ) - MECHANICAL ANCHOR, ZN 16X165', 'LE-ZN-16165', 1, 8, 0, '', 240.05, 644, 100, 'non', 1, '11/08/2021', 3),
(263, '( B3 ) - MECHANICAL ANCHOR, ZN 16X165', 'LE-ZN-16165', 1, 8, 0, '', 240.05, 644, 100, 'non', 1, '11/08/2021', 3),
(264, '( B4 ) - MECHANICAL ANCHOR, ZN 16X165', 'LE-ZN-16165', 1, 8, 0, '', 240.05, 644, 100, 'non', 1, '11/08/2021', 3),
(265, '( B1 ) - SLEAVE ANCHOR - 8x40', 'LSI-08040', 1, 8, 1, '', 42.03, 90, 100, 'non', 1, '11/08/2021', 3),
(266, '( B2 ) - SLEAVE ANCHOR - 8x40', 'LSI-08040', 1, 8, 1, '', 42.03, 90, 100, 'non', 1, '11/08/2021', 3),
(267, '( B3 ) - SLEAVE ANCHOR - 8x40', 'LSI-08040', 1, 8, 1, '', 42.03, 90, 100, 'non', 1, '11/08/2021', 3),
(268, '( B4 ) - SLEAVE ANCHOR - 8x40', 'LSI-08040', 1, 8, 1, '', 42.03, 90, 100, 'non', 1, '11/08/2021', 3),
(269, '( B1 ) - DRYWALL SCREW TO METAL, PH DRIVE 3,5X35  KG', 'KGM-35035', 1, 7, 1, '', 689.43, 2000, 1, 'non', 1, '11/08/2021', 3),
(270, '( B2 ) - DRYWALL SCREW TO METAL, PH DRIVE 3,5X35  KG', 'KGM-35035', 1, 7, 1, '', 689.43, 2000, 1, 'non', 1, '11/08/2021', 3),
(271, '( B3 ) - DRYWALL SCREW TO METAL, PH DRIVE 3,5X35  KG', 'KGM-35035', 1, 7, 1, '', 689.43, 2000, 1, 'non', 1, '11/08/2021', 3),
(272, '( B4 ) - DRYWALL SCREW TO METAL, PH DRIVE 3,5X35  KG', 'KGM-35035', 1, 7, 1, '', 689.43, 2000, 1, 'non', 1, '11/08/2021', 3),
(273, '( B1 ) - SELF-DRILLING SCREW (TIMBER IN STEEL)  PH DRIVE - 4.8x50', 'WSDSK-48050', 1, 10, 1, '', 6.47, 15, 100, 'non', 1, '11/08/2021', 3),
(274, '( B2 ) - SELF-DRILLING SCREW (TIMBER IN STEEL)  PH DRIVE - 4.8x50', 'WSDSK-48050', 1, 10, 1, '', 6.47, 15, 100, 'non', 1, '11/08/2021', 3),
(275, '( B3 ) - SELF-DRILLING SCREW (TIMBER IN STEEL)  PH DRIVE - 4.8x50', 'WSDSK-48050', 1, 10, 1, '', 6.47, 15, 100, 'non', 1, '11/08/2021', 3),
(276, '( B4 ) - SELF-DRILLING SCREW (TIMBER IN STEEL)  PH DRIVE - 4.8x50', 'WSDSK-48050', 1, 10, 1, '', 6.47, 15, 100, 'non', 1, '11/08/2021', 3),
(277, '( B1 ) - SELF-DRILLING SCREW (TIMBER IN STEEL)  PH DRIVE - 5.5x38', 'WSDSK-55038', 1, 10, 1, '', 5.44, 12, 100, 'non', 1, '11/08/2021', 3),
(278, '( B2 ) - SELF-DRILLING SCREW (TIMBER IN STEEL)  PH DRIVE - 5.5x38', 'WSDSK-55038', 1, 10, 1, '', 5.44, 12, 100, 'non', 1, '11/08/2021', 3),
(279, '( B3 ) - SELF-DRILLING SCREW (TIMBER IN STEEL)  PH DRIVE - 5.5x38', 'WSDSK-55038', 1, 10, 1, '', 5.44, 12, 100, 'non', 1, '11/08/2021', 3),
(280, '( B4 ) - SELF-DRILLING SCREW (TIMBER IN STEEL)  PH DRIVE - 5.5x38', 'WSDSK-55038', 1, 10, 1, '', 5.44, 12, 100, 'non', 1, '11/08/2021', 3),
(281, '( B1 ) - SELF-DRILLING SCREW (TIMBER IN STEEL)  PH DRIVE - 5.5x45', 'WSDSK-55045', 1, 10, 1, '', 5.97, 15, 100, 'non', 1, '11/08/2021', 3),
(282, '( B2 ) - SELF-DRILLING SCREW (TIMBER IN STEEL)  PH DRIVE - 5.5x45', 'WSDSK-55045', 1, 10, 1, '', 5.97, 15, 100, 'non', 1, '11/08/2021', 3),
(283, '( B3 ) - SELF-DRILLING SCREW (TIMBER IN STEEL)  PH DRIVE - 5.5x45', 'WSDSK-55045', 1, 10, 1, '', 5.97, 15, 100, 'non', 1, '11/08/2021', 3),
(284, '( B4 ) - SELF-DRILLING SCREW (TIMBER IN STEEL)  PH DRIVE - 5.5x45', 'WSDSK-55045', 1, 10, 1, '', 5.97, 15, 100, 'non', 1, '11/08/2021', 3),
(285, '( B1 ) - SELF-DRILLING SCREW WITH HEX HEAD - 5.5x25', 'WS-55025', 1, 10, 1, '', 4.35, 10, 100, 'non', 1, '11/08/2021', 3),
(286, '( B2 ) - SELF-DRILLING SCREW WITH HEX HEAD - 5.5x25', 'WS-55025', 1, 10, 1, '', 4.35, 10, 100, 'non', 1, '11/08/2021', 3),
(287, '( B3 ) - SELF-DRILLING SCREW WITH HEX HEAD - 5.5x25', 'WS-55025', 1, 10, 1, '', 4.35, 10, 100, 'non', 1, '11/08/2021', 3),
(288, '( B4 ) - SELF-DRILLING SCREW WITH HEX HEAD - 5.5x25', 'WS-55025', 1, 10, 1, '', 4.35, 10, 100, 'non', 1, '11/08/2021', 3),
(289, '( B1 ) - PURE EPORY -585ml', 'WCF-E3-585', 1, 11, 1, '', 5000, 9200, 10, 'non', 1, '11/08/2021', 3),
(290, '( B2 ) - PURE EPORY -585ml', 'WCF-E3-585', 1, 11, 1, '', 5000, 9200, 10, 'non', 1, '11/08/2021', 3),
(291, '( B3 ) - PURE EPORY -585ml', 'WCF-E3-585', 1, 11, 1, '', 5000, 9200, 10, 'non', 1, '11/08/2021', 3),
(292, '( B4 ) - PURE EPORY -585ml', 'WCF-E3-585', 1, 11, 1, '', 5000, 9200, 10, 'non', 1, '11/08/2021', 3),
(293, '( B1 ) - EXPANSION PLUG - PP - 6 X 30', 'KPX-06030', 1, 4, 1, '', 0.69, 2.5, 1000, 'non', 1, '11/08/2021', 38),
(294, '( B2 ) - EXPANSION PLUG - PP - 6 X 30', 'KPX-06030', 1, 4, 1, '', 0.69, 2.5, 1000, 'non', 1, '11/08/2021', 38),
(295, '( B3 ) - EXPANSION PLUG - PP - 6 X 30', 'KPX-06030', 1, 4, 1, '', 0.69, 2.5, 1000, 'non', 1, '11/08/2021', 38),
(296, '( B4 ) - EXPANSION PLUG - PP - 6 X 30', 'KPX-06030', 1, 4, 1, '', 0.69, 2.5, 1000, 'non', 1, '11/08/2021', 38),
(297, '( B1 ) - 3 - WAY NYLON EXPANSION PLUG - 6 x 30', 'KNX-06030', 1, 4, 1, '', 1.14, 3.5, 1000, 'non', 1, '11/08/2021', 38),
(298, '( B2 ) - 3 - WAY NYLON EXPANSION PLUG - 6 x 30', 'KNX-06030', 1, 4, 1, '', 1.14, 3.5, 1000, 'non', 1, '11/08/2021', 38),
(299, '( B3 ) - 3 - WAY NYLON EXPANSION PLUG - 6 x 30', 'KNX-06030', 1, 4, 1, '', 1.14, 3.5, 1000, 'non', 1, '11/08/2021', 38),
(300, '( B4 ) - 3 - WAY NYLON EXPANSION PLUG - 6 x 30', 'KNX-06030', 1, 4, 1, '', 1.14, 3.5, 1000, 'non', 1, '11/08/2021', 38),
(301, '( B1 ) - WASH BASIN FIXING KIT', 'BKMUX-12100', 1, 9, 1, '', 56.08, 423.08, 10, 'non', 1, '11/08/2021', 38),
(302, '( B2 ) - WASH BASIN FIXING KIT', 'BKMUX-12100', 1, 9, 1, '', 56.08, 423.08, 10, 'non', 1, '11/08/2021', 38),
(303, '( B3 ) - WASH BASIN FIXING KIT', 'BKMUX-12100', 1, 9, 1, '', 56.08, 423.08, 10, 'non', 1, '11/08/2021', 38),
(304, '( B4 ) - WASH BASIN FIXING KIT', 'BKMUX-12100', 1, 9, 1, '', 56.08, 423.08, 10, 'non', 1, '11/08/2021', 38),
(309, '( B1 ) - ALL PURPOSE ADHESIVE 310 ml', 'KU-310-BI', 1, 11, 1, '', 1825.72, 2500, 10, 'non', 1, '11/08/2021', 3),
(310, '( B2 ) - ALL PURPOSE ADHESIVE 310 ml', 'KU-310-BI', 1, 11, 1, '', 1825.72, 2500, 10, 'non', 1, '11/08/2021', 3),
(311, '( B3 ) - ALL PURPOSE ADHESIVE 310 ml', 'KU-310-BI', 1, 11, 1, '', 1825.72, 2500, 10, 'non', 1, '11/08/2021', 3),
(312, '( B4 ) - ALL PURPOSE ADHESIVE 310 ml', 'KU-310-BI', 1, 11, 1, '', 1825.72, 2500, 10, 'non', 1, '11/08/2021', 3),
(313, '( B1 ) - METHACRYLATE INJECTION ANCHOR MAKALU 410ml', 'WCF-EASF-410', 1, 11, 1, '', 1505.43, 6200, 10, 'non', 1, '11/08/2021', 3),
(314, '( B2 ) - METHACRYLATE INJECTION ANCHOR MAKALU 410ml', 'WCF-EASF-410', 1, 11, 1, '', 1505.43, 6200, 10, 'non', 1, '11/08/2021', 3),
(315, '( B3 ) - METHACRYLATE INJECTION ANCHOR MAKALU 410ml', 'WCF-EASF-410', 1, 11, 1, '', 1505.43, 6200, 10, 'non', 1, '11/08/2021', 3),
(316, '( B4 ) - METHACRYLATE INJECTION ANCHOR MAKALU 410ml', 'WCF-EASF-410', 1, 11, 1, '', 1505.43, 6200, 10, 'non', 1, '11/08/2021', 3),
(317, '( B1 ) - RESIN INJECTION TOOL 585ml - Chemical Gun', 'DCF-585', 1, 11, 1, '', 6924.88, 15000, 10, 'non', 1, '11/08/2021', 3),
(318, '( B2 ) - RESIN INJECTION TOOL 585ml - Chemical Gun', 'DCF-585', 1, 11, 1, '', 6924.88, 15000, 10, 'non', 1, '11/08/2021', 3),
(319, '( B3 ) - RESIN INJECTION TOOL 585ml - Chemical Gun', 'DCF-585', 1, 11, 1, '', 6924.88, 15000, 10, 'non', 1, '11/08/2021', 3),
(320, '( B4 ) - RESIN INJECTION TOOL 585ml - Chemical Gun', 'DCF-585', 1, 11, 1, '', 6924.88, 15000, 10, 'non', 1, '11/08/2021', 3),
(321, '( B1 ) - RESIN INJECTION TOOL 410ml - Chemical Gun', 'DCF-410', 1, 11, 1, 'RESIN INJECTION TOOL 410ml - Chemical Gun', 5340.48, 13000, 10, 'non', 1, '11/08/2021', 3),
(322, '( B2 ) - RESIN INJECTION TOOL 410ml - Chemical Gun', 'DCF-410', 1, 11, 1, 'RESIN INJECTION TOOL 410ml - Chemical Gun', 5340.48, 13000, 10, 'non', 1, '11/08/2021', 3),
(323, '( B3 ) - RESIN INJECTION TOOL 410ml - Chemical Gun', 'DCF-410', 1, 11, 1, 'RESIN INJECTION TOOL 410ml - Chemical Gun', 5340.48, 13000, 10, 'non', 1, '11/08/2021', 3),
(324, '( B4 ) - RESIN INJECTION TOOL 410ml - Chemical Gun', 'DCF-410', 1, 11, 1, 'RESIN INJECTION TOOL 410ml - Chemical Gun', 5340.48, 13000, 10, 'non', 1, '11/08/2021', 3);

-- --------------------------------------------------------

--
-- Table structure for table `register_table`
--

CREATE TABLE `register_table` (
  `reg_id` int(100) NOT NULL,
  `reg_user_id` int(100) NOT NULL,
  `open_time` varchar(255) NOT NULL,
  `close_time` varchar(255) NOT NULL,
  `reg_status` int(100) NOT NULL,
  `open_price` double NOT NULL,
  `cloce_price` double NOT NULL,
  `regNote` text NOT NULL,
  `cash_out` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_table`
--

INSERT INTO `register_table` (`reg_id`, `reg_user_id`, `open_time`, `close_time`, `reg_status`, `open_price`, `cloce_price`, `regNote`, `cash_out`) VALUES
(3, 3, '2021-11-10 10:21:00', '', 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `row_batch_tbl`
--

CREATE TABLE `row_batch_tbl` (
  `batch_id` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `batch_no` int(100) NOT NULL,
  `batch_date` varchar(100) NOT NULL,
  `ex_date` varchar(100) NOT NULL,
  `cost` double NOT NULL,
  `price` double NOT NULL,
  `user_id` int(50) NOT NULL,
  `added_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `row_brand_tbl`
--

CREATE TABLE `row_brand_tbl` (
  `brand_id` int(25) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `row_category_tbl`
--

CREATE TABLE `row_category_tbl` (
  `cate_id` int(25) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cate_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `row_grndetail_tbl`
--

CREATE TABLE `row_grndetail_tbl` (
  `detail_id` int(50) NOT NULL,
  `grnPro_id` int(50) NOT NULL,
  `unit` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `cost` double NOT NULL,
  `price` double NOT NULL,
  `exDate` varchar(20) NOT NULL,
  `discount` double NOT NULL,
  `freeQty` int(100) NOT NULL,
  `grn_num` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `row_grn_tbl`
--

CREATE TABLE `row_grn_tbl` (
  `grn_id` int(50) NOT NULL,
  `grn_num` varchar(100) NOT NULL,
  `grn_received` varchar(100) NOT NULL,
  `grn_suppid` int(100) NOT NULL,
  `grn_locid` int(100) NOT NULL,
  `grn_com_no` varchar(100) NOT NULL,
  `grn_due_on` varchar(20) NOT NULL,
  `grn_value` double NOT NULL,
  `grn_disc` double NOT NULL,
  `net_value` double NOT NULL,
  `invoice_value` double NOT NULL,
  `added_user` int(100) NOT NULL,
  `added_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `row_pos_details_tbl`
--

CREATE TABLE `row_pos_details_tbl` (
  `pos_det_id` int(100) NOT NULL,
  `pos_id` int(100) NOT NULL,
  `stock_id` int(100) NOT NULL,
  `pro_code` varchar(100) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `totQty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `row_pos_tbl`
--

CREATE TABLE `row_pos_tbl` (
  `pos_id` int(100) NOT NULL,
  `pos_date` varchar(100) NOT NULL,
  `pos_time` varchar(100) NOT NULL,
  `added_user` int(100) NOT NULL,
  `customerId` int(100) NOT NULL,
  `refNote` varchar(255) NOT NULL,
  `proDesc` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `payBy` varchar(100) NOT NULL,
  `payNote` varchar(100) NOT NULL,
  `secuCode` varchar(255) NOT NULL,
  `cardNo` varchar(255) NOT NULL,
  `holdName` varchar(255) NOT NULL,
  `cardType` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `cvv2` varchar(100) NOT NULL,
  `cheqNo` varchar(100) NOT NULL,
  `ref_code` varchar(100) NOT NULL,
  `pro_disc` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `row_products_tbl`
--

CREATE TABLE `row_products_tbl` (
  `pro_id` int(25) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_code` varchar(100) NOT NULL,
  `cat_id` int(25) NOT NULL,
  `subcat_id` int(25) NOT NULL,
  `brand_id` int(25) NOT NULL,
  `pro_desc` varchar(100) NOT NULL,
  `pro_cost` double NOT NULL,
  `pro_price` double NOT NULL,
  `pro_all_qty` double NOT NULL,
  `pro_img` varchar(100) NOT NULL,
  `rack_no` varchar(100) NOT NULL,
  `supplier_id` int(100) NOT NULL,
  `whole_sale_price` double NOT NULL,
  `added_date` varchar(100) NOT NULL,
  `added_user` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `row_stock_tbl`
--

CREATE TABLE `row_stock_tbl` (
  `stock_id` int(100) NOT NULL,
  `stock_location` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `batch_id` int(100) NOT NULL,
  `stock_qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `row_subcategory_tbl`
--

CREATE TABLE `row_subcategory_tbl` (
  `subcate_id` int(25) NOT NULL,
  `subcate_name` varchar(100) NOT NULL,
  `subcate_code` varchar(100) NOT NULL,
  `cate_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stk`
--

CREATE TABLE `stk` (
  `stock_id` int(100) NOT NULL,
  `stock_location` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `batch_id` int(100) NOT NULL,
  `stock_qty` double NOT NULL,
  `update_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_tbl`
--

CREATE TABLE `stock_tbl` (
  `stock_id` int(100) NOT NULL,
  `stock_location` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `batch_id` int(100) NOT NULL,
  `stock_qty` double NOT NULL,
  `update_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_tbl`
--

INSERT INTO `stock_tbl` (`stock_id`, `stock_location`, `pro_id`, `batch_id`, `stock_qty`, `update_date`) VALUES
(7, 2, 9, 1, 94, '11/10/2021'),
(8, 2, 25, 2, 19, '11/10/2021'),
(9, 2, 29, 3, 166, 'date'),
(10, 2, 49, 4, 50, 'date'),
(11, 2, 53, 5, 79, 'date'),
(12, 2, 97, 6, 586, 'date'),
(13, 2, 117, 7, 2600, 'date'),
(14, 2, 121, 8, 23, 'date'),
(15, 2, 54, 9, 36, 'date'),
(16, 2, 57, 10, 2850, 'date'),
(17, 2, 61, 11, 1950, 'date'),
(18, 2, 65, 12, 2164, 'date'),
(19, 2, 69, 13, 2625, 'date'),
(20, 2, 77, 14, 65, 'date'),
(21, 2, 81, 15, 1200, 'date'),
(22, 2, 85, 16, 340, 'date'),
(23, 2, 89, 17, 1878, 'date'),
(24, 2, 93, 18, 2550, 'date'),
(25, 2, 129, 19, 61, 'date'),
(26, 2, 137, 20, 89, 'date'),
(27, 2, 141, 21, 89, 'date'),
(28, 2, 145, 22, 98, 'date'),
(29, 2, 149, 23, 10, 'date'),
(30, 2, 161, 24, 80, 'date'),
(31, 2, 165, 25, 2094, 'date'),
(32, 2, 169, 26, 58, 'date'),
(33, 2, 173, 27, 2510, 'date'),
(34, 2, 189, 28, 783, 'date'),
(35, 2, 293, 29, 21870, 'date'),
(36, 2, 297, 30, 12883, 'date'),
(37, 2, 309, 31, 11, '11/10/2021'),
(38, 2, 13, 32, 643, 'date'),
(39, 2, 17, 33, 100, 'date'),
(40, 2, 26, 34, 99, 'date'),
(41, 2, 30, 35, 50, 'date'),
(42, 2, 33, 36, 495, 'date'),
(43, 2, 37, 37, 1615, 'date'),
(44, 2, 41, 38, 550, 'date'),
(45, 2, 45, 39, 199, 'date'),
(46, 2, 73, 40, 977, 'date'),
(47, 2, 105, 41, 1414, 'date'),
(48, 2, 109, 42, 75, 'date'),
(49, 2, 113, 43, 1996, 'date'),
(50, 2, 122, 44, 101, 'date'),
(51, 2, 125, 45, 52, 'date'),
(52, 2, 294, 46, 50000, 'date'),
(53, 2, 298, 47, 29000, 'date'),
(54, 2, 157, 48, 1, 'date'),
(55, 2, 181, 49, 19, 'date'),
(56, 2, 185, 50, 1072, 'date'),
(57, 2, 193, 51, 985, 'date'),
(58, 2, 197, 52, 1987, 'date'),
(59, 2, 301, 53, 61, 'date'),
(60, 2, 5, 54, 433, 'date'),
(61, 2, 14, 55, 1000, 'date'),
(62, 2, 18, 56, 150, 'date'),
(63, 2, 21, 57, 16, 'date'),
(64, 2, 31, 58, 100, 'date'),
(65, 2, 34, 59, 1800, 'date'),
(66, 2, 38, 60, 2000, 'date'),
(67, 2, 42, 61, 700, 'date'),
(68, 2, 46, 62, 200, 'date'),
(69, 2, 1, 63, 50, 'date'),
(70, 2, 74, 64, 2000, 'date'),
(71, 2, 106, 65, 6000, 'date'),
(72, 2, 110, 66, 2000, 'date'),
(73, 2, 114, 67, 2000, 'date'),
(74, 2, 133, 68, 8770, 'date'),
(75, 2, 154, 69, 21, 'date'),
(76, 2, 158, 70, 100, 'date'),
(77, 2, 177, 71, 1988, 'date'),
(78, 2, 194, 72, 5800, 'date'),
(79, 2, 198, 73, 6000, 'date'),
(80, 2, 201, 74, 100, 'date'),
(81, 2, 205, 75, 1899, 'date'),
(82, 2, 209, 76, 1100, 'date'),
(83, 2, 213, 77, 974, 'date'),
(84, 2, 217, 78, 500, 'date'),
(85, 2, 221, 79, 80, 'date'),
(86, 2, 225, 80, 500, 'date'),
(87, 2, 229, 81, 3580, 'date'),
(88, 2, 233, 82, 1479, 'date'),
(89, 2, 237, 83, 1000, 'date'),
(90, 2, 241, 84, 820, 'date'),
(91, 2, 245, 85, 500, 'date'),
(92, 2, 249, 86, 100, 'date'),
(93, 2, 253, 87, 1000, 'date'),
(94, 2, 257, 88, 989, 'date'),
(95, 2, 261, 89, 120, 'date'),
(96, 2, 265, 90, 200, 'date'),
(97, 2, 269, 91, 10, 'date'),
(98, 2, 273, 92, 1000, 'date'),
(99, 2, 277, 93, 1000, 'date'),
(100, 2, 281, 94, 1000, 'date'),
(101, 2, 285, 95, 1000, 'date'),
(102, 2, 289, 96, 199, 'date'),
(103, 2, 295, 97, 50000, 'date'),
(104, 2, 299, 98, 29000, 'date'),
(105, 2, 302, 99, 50, 'date'),
(106, 2, 313, 100, 79, '11/10/2021'),
(107, 2, 317, 101, 17, 'date'),
(108, 2, 321, 102, 18, 'date');

-- --------------------------------------------------------

--
-- Table structure for table `stock_transfer_tbl`
--

CREATE TABLE `stock_transfer_tbl` (
  `transfer_id` int(100) NOT NULL,
  `trans_stock_id` int(100) NOT NULL,
  `transfer_qty` double NOT NULL,
  `main_trans_id` int(100) NOT NULL,
  `pro_Code` varchar(45) DEFAULT NULL,
  `accept` int(11) DEFAULT NULL,
  `price_sell` int(11) DEFAULT NULL,
  `price_cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `std_id` int(255) NOT NULL,
  `std_name` varchar(255) NOT NULL,
  `std_address` varchar(255) NOT NULL,
  `std_phone` varchar(255) NOT NULL,
  `std_contPerson` varchar(255) NOT NULL,
  `std_contPhone` varchar(255) NOT NULL,
  `std_barcode` varchar(255) NOT NULL,
  `std_price` double NOT NULL,
  `added_date` varchar(255) NOT NULL,
  `added_user` int(100) NOT NULL,
  `price_limit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory_tbl`
--

CREATE TABLE `subcategory_tbl` (
  `subcate_id` int(25) NOT NULL,
  `subcate_name` varchar(100) NOT NULL,
  `subcate_code` varchar(100) NOT NULL,
  `cate_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory_tbl`
--

INSERT INTO `subcategory_tbl` (`subcate_id`, `subcate_name`, `subcate_code`, `cate_id`) VALUES
(1, 'FRAME ANCHOR', '1', 1),
(2, 'HAMMER DRIVE', '2', 1),
(3, 'UNIVERSAL PLUG', '3', 1),
(4, 'EXPANSION PLUG', '4', 1),
(5, 'DRIVER BIT', '5', 1),
(6, 'DRYWALL SCREW', '6', 0),
(7, 'DRYWALL SCREW', '6', 1),
(8, 'MECHANICAL ANCHOR', '8', 1),
(9, 'SANITARY FIXING', '9', 1),
(10, 'SELF-DRILLING SCREW', '10', 1),
(11, 'CHEMICAL ANCHOR', '11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_tbl`
--

CREATE TABLE `supplier_tbl` (
  `supplier_id` int(25) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_email` varchar(100) NOT NULL,
  `supplier_phone` varchar(20) NOT NULL,
  `custom_field` varchar(150) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `added_user` int(100) NOT NULL,
  `added_date` varchar(100) NOT NULL,
  `credit_period` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_tbl`
--

INSERT INTO `supplier_tbl` (`supplier_id`, `supplier_name`, `supplier_email`, `supplier_phone`, `custom_field`, `contact_name`, `contact_phone`, `site_name`, `added_user`, `added_date`, `credit_period`) VALUES
(1, 'KLIMAS', '', '0112080834', '', 'Marlena Lis ', '0112080834', 'www.wkret-met.com', 3, '11/07/2021', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(25) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_loc` int(255) NOT NULL,
  `pos_pos` int(100) NOT NULL,
  `pos_customer` int(100) NOT NULL,
  `pos_bill_sett` int(100) NOT NULL,
  `pos_day_sales` int(100) NOT NULL,
  `pos_curr_month_sales` int(100) NOT NULL,
  `pos_last_month_sale` int(100) NOT NULL,
  `pos_dispose_pro` int(100) NOT NULL,
  `pos_damage_stock` int(100) NOT NULL,
  `pos_reorder_stock` int(100) NOT NULL,
  `pos_verify_pro_transfer` int(100) NOT NULL,
  `pos_pro_exchange` int(100) NOT NULL,
  `pos_stock_rep` int(100) NOT NULL,
  `pos_reo_pro_rep` int(100) NOT NULL,
  `pos_pro_rep` int(100) NOT NULL,
  `pos_sales_rep` int(100) NOT NULL,
  `pos_damage_pro_rep` int(100) NOT NULL,
  `pos_exp_pro_rep` int(100) NOT NULL,
  `pos_disposal_rep` int(100) NOT NULL,
  `pos_not_moving_item_rep` int(100) NOT NULL,
  `pos_cashier_reg_rep` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `user_name`, `user_pwd`, `user_type`, `user_loc`, `pos_pos`, `pos_customer`, `pos_bill_sett`, `pos_day_sales`, `pos_curr_month_sales`, `pos_last_month_sale`, `pos_dispose_pro`, `pos_damage_stock`, `pos_reorder_stock`, `pos_verify_pro_transfer`, `pos_pro_exchange`, `pos_stock_rep`, `pos_reo_pro_rep`, `pos_pro_rep`, `pos_sales_rep`, `pos_damage_pro_rep`, `pos_exp_pro_rep`, `pos_disposal_rep`, `pos_not_moving_item_rep`, `pos_cashier_reg_rep`) VALUES
(1, 'Chamila@gmail.com', '$2y$10$/wtORbx4y3Lx.h6TtgTleeqFbjvfHLxPm9G5D6ED/scBSWs2pHhg6', 'super admin', 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'Dinesh@gmail.com', '$2y$10$jR6lWh1C6r0TwM9hnemZp.l5/aNoODmvcMoYmteqCvBJSfV1HrWP6', 'super admin', 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 'Neshani@gmail.com', '$2y$10$3PD4spoZ8/P9DJCW/Zl5UuXpEXJYwu9DSy6PugB6wGdk/9iFWO0Xm', 'admin', 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(4, 'Sachith@gmail.com', '$2y$10$TbntLBUYCeemZdNplNKPZuWe7R/76clogZ29Y0PMoVd/rNonrbd/a', 'cashier', 3, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1),
(5, 'superadmin@gmail.com', '$2y$10$Hdt5kFIWrg4dGfTd3mS2u.a6dcGiFaySqv0ToRvPhfHZ41jqymK76', 'super admin', 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(38, 'adminS@gmail.com', '$2y$10$CammjIMUAEFqzCGpYsPKT.0WTCkMTwObERfJE2D2AHhKx95BzxOhy', 'admin', 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `void_tbl`
--

CREATE TABLE `void_tbl` (
  `void_id` int(100) NOT NULL,
  `void_bill` int(100) NOT NULL,
  `void_user` int(100) NOT NULL,
  `void_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch_tbl`
--
ALTER TABLE `batch_tbl`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `bill_tbl`
--
ALTER TABLE `bill_tbl`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `damage_tbl`
--
ALTER TABLE `damage_tbl`
  ADD PRIMARY KEY (`damage_id`);

--
-- Indexes for table `disposal_tbl`
--
ALTER TABLE `disposal_tbl`
  ADD PRIMARY KEY (`dispose_id`);

--
-- Indexes for table `exchangedetaol_tbl`
--
ALTER TABLE `exchangedetaol_tbl`
  ADD PRIMARY KEY (`exDetail_id`);

--
-- Indexes for table `exchange_tbl`
--
ALTER TABLE `exchange_tbl`
  ADD PRIMARY KEY (`exchange_id`);

--
-- Indexes for table `grndetail_tbl`
--
ALTER TABLE `grndetail_tbl`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `grn_id` (`grn_id`);

--
-- Indexes for table `grn_tbl`
--
ALTER TABLE `grn_tbl`
  ADD PRIMARY KEY (`grn_id`);

--
-- Indexes for table `location_tbl`
--
ALTER TABLE `location_tbl`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `main_transfer_tbl`
--
ALTER TABLE `main_transfer_tbl`
  ADD PRIMARY KEY (`main_tra_id`);

--
-- Indexes for table `packdetail_tbl`
--
ALTER TABLE `packdetail_tbl`
  ADD PRIMARY KEY (`packDetail_id`);

--
-- Indexes for table `pack_stock_tbl`
--
ALTER TABLE `pack_stock_tbl`
  ADD PRIMARY KEY (`packStock_id`);

--
-- Indexes for table `pack_tbl`
--
ALTER TABLE `pack_tbl`
  ADD PRIMARY KEY (`pack_id`);

--
-- Indexes for table `pos_details_tbl`
--
ALTER TABLE `pos_details_tbl`
  ADD PRIMARY KEY (`pos_det_id`);

--
-- Indexes for table `pos_tbl`
--
ALTER TABLE `pos_tbl`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `po_details_tbl`
--
ALTER TABLE `po_details_tbl`
  ADD PRIMARY KEY (`po_order_de_id`);

--
-- Indexes for table `po_tbl`
--
ALTER TABLE `po_tbl`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `register_table`
--
ALTER TABLE `register_table`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `row_batch_tbl`
--
ALTER TABLE `row_batch_tbl`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `row_brand_tbl`
--
ALTER TABLE `row_brand_tbl`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `row_category_tbl`
--
ALTER TABLE `row_category_tbl`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `row_grndetail_tbl`
--
ALTER TABLE `row_grndetail_tbl`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `row_grn_tbl`
--
ALTER TABLE `row_grn_tbl`
  ADD PRIMARY KEY (`grn_id`);

--
-- Indexes for table `row_pos_details_tbl`
--
ALTER TABLE `row_pos_details_tbl`
  ADD PRIMARY KEY (`pos_det_id`);

--
-- Indexes for table `row_pos_tbl`
--
ALTER TABLE `row_pos_tbl`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `row_products_tbl`
--
ALTER TABLE `row_products_tbl`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `row_stock_tbl`
--
ALTER TABLE `row_stock_tbl`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `row_subcategory_tbl`
--
ALTER TABLE `row_subcategory_tbl`
  ADD PRIMARY KEY (`subcate_id`);

--
-- Indexes for table `stk`
--
ALTER TABLE `stk`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `stock_tbl`
--
ALTER TABLE `stock_tbl`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `stock_transfer_tbl`
--
ALTER TABLE `stock_transfer_tbl`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `subcategory_tbl`
--
ALTER TABLE `subcategory_tbl`
  ADD PRIMARY KEY (`subcate_id`);

--
-- Indexes for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `void_tbl`
--
ALTER TABLE `void_tbl`
  ADD PRIMARY KEY (`void_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch_tbl`
--
ALTER TABLE `batch_tbl`
  MODIFY `batch_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `bill_tbl`
--
ALTER TABLE `bill_tbl`
  MODIFY `bill_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  MODIFY `brand_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `cate_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `cus_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `damage_tbl`
--
ALTER TABLE `damage_tbl`
  MODIFY `damage_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disposal_tbl`
--
ALTER TABLE `disposal_tbl`
  MODIFY `dispose_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exchangedetaol_tbl`
--
ALTER TABLE `exchangedetaol_tbl`
  MODIFY `exDetail_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exchange_tbl`
--
ALTER TABLE `exchange_tbl`
  MODIFY `exchange_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grndetail_tbl`
--
ALTER TABLE `grndetail_tbl`
  MODIFY `detail_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `grn_tbl`
--
ALTER TABLE `grn_tbl`
  MODIFY `grn_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location_tbl`
--
ALTER TABLE `location_tbl`
  MODIFY `loc_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `main_transfer_tbl`
--
ALTER TABLE `main_transfer_tbl`
  MODIFY `main_tra_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packdetail_tbl`
--
ALTER TABLE `packdetail_tbl`
  MODIFY `packDetail_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pack_stock_tbl`
--
ALTER TABLE `pack_stock_tbl`
  MODIFY `packStock_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pack_tbl`
--
ALTER TABLE `pack_tbl`
  MODIFY `pack_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_details_tbl`
--
ALTER TABLE `pos_details_tbl`
  MODIFY `pos_det_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pos_tbl`
--
ALTER TABLE `pos_tbl`
  MODIFY `pos_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `po_details_tbl`
--
ALTER TABLE `po_details_tbl`
  MODIFY `po_order_de_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `po_tbl`
--
ALTER TABLE `po_tbl`
  MODIFY `po_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `pro_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `register_table`
--
ALTER TABLE `register_table`
  MODIFY `reg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `row_batch_tbl`
--
ALTER TABLE `row_batch_tbl`
  MODIFY `batch_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `row_brand_tbl`
--
ALTER TABLE `row_brand_tbl`
  MODIFY `brand_id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `row_category_tbl`
--
ALTER TABLE `row_category_tbl`
  MODIFY `cate_id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `row_grndetail_tbl`
--
ALTER TABLE `row_grndetail_tbl`
  MODIFY `detail_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `row_grn_tbl`
--
ALTER TABLE `row_grn_tbl`
  MODIFY `grn_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `row_pos_details_tbl`
--
ALTER TABLE `row_pos_details_tbl`
  MODIFY `pos_det_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `row_pos_tbl`
--
ALTER TABLE `row_pos_tbl`
  MODIFY `pos_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `row_products_tbl`
--
ALTER TABLE `row_products_tbl`
  MODIFY `pro_id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `row_stock_tbl`
--
ALTER TABLE `row_stock_tbl`
  MODIFY `stock_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `row_subcategory_tbl`
--
ALTER TABLE `row_subcategory_tbl`
  MODIFY `subcate_id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stk`
--
ALTER TABLE `stk`
  MODIFY `stock_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_tbl`
--
ALTER TABLE `stock_tbl`
  MODIFY `stock_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `stock_transfer_tbl`
--
ALTER TABLE `stock_transfer_tbl`
  MODIFY `transfer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `std_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory_tbl`
--
ALTER TABLE `subcategory_tbl`
  MODIFY `subcate_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  MODIFY `supplier_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `void_tbl`
--
ALTER TABLE `void_tbl`
  MODIFY `void_id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
