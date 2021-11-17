-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 07:06 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spare_pos`
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
(1, 2, 1, '01/13/2020', '2020-01-14', 12, 15, 1, '01/13/2020', 1),
(2, 7, 2, '01/13/2020', '2020-01-13', 63, 70, 1, '01/13/2020', 1),
(3, 2, 3, '01/13/2020', '2020-01-14', 12, 15, 2, '01/13/2020', 2),
(4, 7, 4, '01/13/2020', '2020-01-13', 63, 70, 2, '01/13/2020', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bill_tbl`
--

CREATE TABLE `bill_tbl` (
  `bill_id` int(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tell_num` varchar(100) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `bill_logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_tbl`
--

INSERT INTO `bill_tbl` (`bill_id`, `address`, `tell_num`, `discription`, `bill_logo`) VALUES
(1, 'No.**, ******, ****', '07* - ******* / 07* - *******', '<p style=\"text-align:center\">sdfg fgf gfg fdg fdg</p>\r\n\r\n<p style=\"text-align:center\"><strong>** Thank You **</strong></p>\r\n', 'product1.jpeg');

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
(1, 'Huajie'),
(2, 'Atlas'),
(3, 'NSP'),
(4, 'Radiant'),
(6, 'promate');

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
(1, 'Exercise Books', 'OW10135'),
(2, 'Pens', 'OW18235'),
(3, 'Markers', 'OW101383'),
(4, 'Pencils & Colour Pens', 'OW10165'),
(5, 'Packaging Materials', 'OW10139'),
(6, 'Note pad', 'OW10155'),
(7, 'CR Books', 'OW18245'),
(8, 'Note book', 'OW10201'),
(9, 'Note Book', 'OW10580');

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

-- --------------------------------------------------------

--
-- Table structure for table `damage_tbl`
--

CREATE TABLE `damage_tbl` (
  `damage_id` int(100) NOT NULL,
  `damage_stock_id` int(100) NOT NULL,
  `damage_qty` double NOT NULL,
  `added_user` int(100) NOT NULL,
  `damage_added_date` varchar(255) NOT NULL
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
  `dispose_added_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grndetail_tbl`
--

CREATE TABLE `grndetail_tbl` (
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

--
-- Dumping data for table `grndetail_tbl`
--

INSERT INTO `grndetail_tbl` (`detail_id`, `grnPro_id`, `unit`, `qty`, `cost`, `price`, `exDate`, `discount`, `freeQty`, `grn_num`) VALUES
(1, 2, 0, 100, 12, 15, '2020-01-14', 5, 5, 1),
(2, 7, 0, 200, 63, 70, '2020-01-13', 0, 2, 1);

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
  `grn_com_no` varchar(100) NOT NULL,
  `grn_due_on` varchar(20) NOT NULL,
  `grn_value` double NOT NULL,
  `grn_disc` double NOT NULL,
  `net_value` double NOT NULL,
  `invoice_value` double NOT NULL,
  `added_user` int(100) NOT NULL,
  `added_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grn_tbl`
--

INSERT INTO `grn_tbl` (`grn_id`, `grn_num`, `grn_received`, `grn_suppid`, `grn_locid`, `grn_com_no`, `grn_due_on`, `grn_value`, `grn_disc`, `net_value`, `invoice_value`, `added_user`, `added_date`) VALUES
(1, '4566', '2020-01-13', 1, 1, '465', '2020-01-22', 13740, 0, 13740, 13740, 1, '01/13/2020');

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
(1, 'Main Branch'),
(2, 'vatthala');

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

--
-- Dumping data for table `main_transfer_tbl`
--

INSERT INTO `main_transfer_tbl` (`main_tra_id`, `added_user`, `transfer_date`, `trans_loc`, `accept`, `special_note`, `view`) VALUES
(1, 1, '2020-01-13 11:04:56', 2, 1, 'daddasdsadas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pos_details_tbl`
--

CREATE TABLE `pos_details_tbl` (
  `pos_det_id` int(100) NOT NULL,
  `pos_id` int(100) NOT NULL,
  `stock_id` int(100) NOT NULL,
  `pro_code` varchar(100) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `totQty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `student_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
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
  `supplier_id` int(100) NOT NULL,
  `added_date` varchar(100) NOT NULL,
  `added_user` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`pro_id`, `pro_name`, `pro_code`, `cat_id`, `subcat_id`, `brand_id`, `pro_desc`, `pro_cost`, `pro_price`, `pro_all_qty`, `pro_img`, `supplier_id`, `added_date`, `added_user`) VALUES
(1, 'PVC Tape 1\"', '10800', 5, 1, 2, 'PVC Tape 1\"', 21, 25, 5, 'tape1.jpg', 1, '11/19/2019', 1),
(2, 'Cello Tape 1\"', '10801', 5, 3, 2, 'Cello Tape 1\"', 12, 15, 5, 'tape2.jpg', 1, '11/19/2019', 1),
(3, 'Cello Tape 3 \"', '10802', 5, 3, 0, 'Cello Tape 3 \"', 28, 35, 10, 'tape3.jpg', 1, '11/19/2019', 1),
(4, 'Easy Tape 1/2', '10804', 5, 5, 2, 'Easy Tape 1/2', 7, 10, 20, 'tape9.jpg', 1, '11/19/2019', 1),
(5, 'Masking Tape 2\"', '10806', 5, 6, 2, 'Masking Tape 2\"', 42, 45, 5, 'tape7.jpg', 1, '11/19/2019', 1),
(6, 'Binding Tape 1\"', '10809', 5, 7, 0, 'Binding Tape 1\"', 48, 55, 10, 'YST-tape1.jpg', 1, '11/19/2019', 1),
(7, 'Double side tape 1\"', '10810', 5, 8, 2, 'Double side tape 1\"', 63, 70, 5, 'YST-tape2.jpg', 1, '11/19/2019', 1),
(8, 'HUAJIE Tape Dispenser', '10812', 5, 9, 1, 'HUAJIE Tape Dispenser', 238, 250, 3, 'Huajie-tape-dispenser-H10.jpg', 1, '11/19/2019', 1),
(9, 'Tape Dispenser MBM 1/2\"', '10814', 5, 9, 1, 'Tape Dispenser MBM 1/2\"', 278, 350, 5, 'tape-dispenser.jpg', 1, '11/19/2019', 1),
(10, 'NSP Exercise Books', '10120', 1, 12, 3, 'NSP Exercise Books', 18, 22, 20, 'NSP-exbooks.jpg', 1, '11/19/2019', 1),
(11, 'Atlas Exercise Books', '10124', 1, 13, 2, 'Atlas Exercise Books', 24, 35, 50, 'Atlas-CR-books.jpg', 1, '11/19/2019', 1),
(12, 'Notebook Blue Colour', '10131', 6, 10, 2, 'Notebook Blue Colour', 48, 55, 20, 'Panther-notebooks.jpg', 1, '11/19/2019', 1),
(13, 'Atlas Chooty- Ball Point Pen', 'OW10135', 2, 14, 2, 'Atlas Chooty- Ball Point Pen', 7, 10, 50, 'Atlas-Pens.jpg', 1, '11/19/2019', 1),
(14, 'Radiant - Ball Point Pen', 'OW10136', 2, 15, 4, 'Radiant - Ball Point Pen', 9, 12, 50, 'Radiant-Pens.jpg', 1, '11/19/2019', 1),
(15, 'A5 Note Book', '12345', 8, 16, 5, '-', 28, 34, 10, 'notebook.jpg', 1, '01/06/2020', 1),
(16, 'A5 Note Book', '12345', 9, 17, 6, '-', 22, 40, 10, 'notebook.jpg', 1, '01/06/2020', 1);

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
-- Table structure for table `stock_tbl`
--

CREATE TABLE `stock_tbl` (
  `stock_id` int(100) NOT NULL,
  `stock_location` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `batch_id` int(100) NOT NULL,
  `stock_qty` int(100) NOT NULL,
  `update_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_tbl`
--

INSERT INTO `stock_tbl` (`stock_id`, `stock_location`, `pro_id`, `batch_id`, `stock_qty`, `update_date`) VALUES
(1, 1, 2, 1, 105, '01/5/2020'),
(2, 1, 7, 2, 202, '01/1/2020'),
(3, 2, 2, 3, 10, '01/12/2020'),
(4, 2, 7, 4, 15, '01/10/2020');

-- --------------------------------------------------------

--
-- Table structure for table `stock_transfer_tbl`
--

CREATE TABLE `stock_transfer_tbl` (
  `transfer_id` int(100) NOT NULL,
  `trans_stock_id` int(100) NOT NULL,
  `transfer_qty` double NOT NULL,
  `main_trans_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_transfer_tbl`
--

INSERT INTO `stock_transfer_tbl` (`transfer_id`, `trans_stock_id`, `transfer_qty`, `main_trans_id`) VALUES
(1, 1, 10, 1),
(2, 2, 15, 1);

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
(1, 'PVC Tape', 'SU105', 5),
(2, 'Tape Dispenser', 'SU107', 5),
(3, 'Cello Tape', 'SU106', 5),
(4, 'Water Tape', 'SU108', 5),
(5, 'Easy Tape', 'SU101', 5),
(6, 'Masking Tape', 'SU102', 5),
(7, 'Binding Tape', 'SU103', 5),
(8, 'Double side tape', 'SU104', 5),
(9, 'Tape Dispenser', 'SU100', 5),
(10, 'Notebook Blue Colour', 'SU120', 6),
(11, 'A4 Note Book', 'SU121', 6),
(12, 'Exercise Books page 40', 'SU123', 1),
(13, 'Exercise Books page 80', 'SU125', 1),
(14, 'Atlas Chooty- Ball Point Pen', 'SU126', 2),
(15, ' Radiant - Ball Point Pen', 'SU128', 2),
(16, 'A5 Note Book', 'SU201', 8),
(17, 'A5 Note Book', 'SU584', 9);

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
(1, 'ishanga herath', 'ishanga@gmail.com', '0766581526', '-', 'lakshan', '0123456789', 'www.doubleA.com', 1, '01/13/2020', 30);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(25) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_loc` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `user_name`, `user_pwd`, `user_type`, `user_loc`) VALUES
(1, 'admin', '12345', 'super admin', 1),
(2, 'kasun', '12345', 'cashier', 2);

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
-- Indexes for table `grndetail_tbl`
--
ALTER TABLE `grndetail_tbl`
  ADD PRIMARY KEY (`detail_id`);

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
-- Indexes for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`pro_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch_tbl`
--
ALTER TABLE `batch_tbl`
  MODIFY `batch_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bill_tbl`
--
ALTER TABLE `bill_tbl`
  MODIFY `bill_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  MODIFY `brand_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `cate_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `cus_id` int(25) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `grndetail_tbl`
--
ALTER TABLE `grndetail_tbl`
  MODIFY `detail_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grn_tbl`
--
ALTER TABLE `grn_tbl`
  MODIFY `grn_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location_tbl`
--
ALTER TABLE `location_tbl`
  MODIFY `loc_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `main_transfer_tbl`
--
ALTER TABLE `main_transfer_tbl`
  MODIFY `main_tra_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pos_details_tbl`
--
ALTER TABLE `pos_details_tbl`
  MODIFY `pos_det_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_tbl`
--
ALTER TABLE `pos_tbl`
  MODIFY `pos_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `pro_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- AUTO_INCREMENT for table `stock_tbl`
--
ALTER TABLE `stock_tbl`
  MODIFY `stock_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock_transfer_tbl`
--
ALTER TABLE `stock_transfer_tbl`
  MODIFY `transfer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `std_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory_tbl`
--
ALTER TABLE `subcategory_tbl`
  MODIFY `subcate_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  MODIFY `supplier_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
