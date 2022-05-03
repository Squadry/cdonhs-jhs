-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 01:14 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `admin_image` varchar(100) NOT NULL,
  `admin_type` varchar(100) NOT NULL,
  `admin_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `confirm_password`, `admin_image`, `admin_type`, `admin_added`) VALUES
(4, 'Ash', '', 'Ketchum', 'admin', 'admin', 'admin', 'admin_.png', 'Admin', '2022-04-21 17:37:40'),
(12, 'admini', '', 'admin', 'assistant', 'assistant', 'assistant', '', 'Admin', '2022-04-24 14:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `allowed_days`
--

CREATE TABLE `allowed_days` (
  `allowed_days_id` int(11) NOT NULL,
  `no_of_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowed_days`
--

INSERT INTO `allowed_days` (`allowed_days_id`, `no_of_days`) VALUES
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `allowed_item`
--

CREATE TABLE `allowed_item` (
  `allowed_item_id` int(11) NOT NULL,
  `qntty_items` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowed_item`
--

INSERT INTO `allowed_item` (`allowed_item_id`, `qntty_items`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `barcode_id` int(11) NOT NULL,
  `pre_barcode` varchar(100) NOT NULL,
  `mid_barcode` int(100) NOT NULL,
  `suf_barcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`barcode_id`, `pre_barcode`, `mid_barcode`, `suf_barcode`) VALUES
(1, 'VNHS', 1, 'LMS'),
(2, 'VNHS', 2, 'LMS'),
(3, 'VNHS', 3, 'LMS'),
(4, 'VNHS', 4, 'LMS'),
(5, 'VNHS', 5, 'LMS'),
(6, 'VNHS', 6, 'LMS'),
(7, 'VNHS', 7, 'LMS'),
(8, '', 0, ''),
(9, 'VNHS', 8, 'LMS'),
(10, 'VNHS', 9, 'LMS'),
(11, 'VNHS', 10, 'LMS'),
(12, 'VNHS', 11, 'LMS'),
(13, 'VNHS', 12, 'LMS'),
(14, 'VNHS', 12, 'LMS'),
(15, 'VNHS', 13, 'LMS'),
(16, 'VNHS', 14, 'LMS'),
(17, 'VNHS', 15, 'LMS'),
(18, 'VNHS', 16, 'LMS'),
(19, 'VNHS', 17, 'LMS'),
(20, 'VNHS', 18, 'LMS'),
(21, 'VNHS', 19, 'LMS'),
(22, 'VNHS', 20, 'LMS'),
(23, 'VNHS', 21, 'LMS'),
(24, 'VNHS', 22, 'LMS'),
(25, 'VNHS', 23, 'LMS'),
(26, 'VNHS', 24, 'LMS'),
(27, 'VNHS', 25, 'LMS'),
(28, 'VNHS', 26, 'LMS'),
(29, 'VNHS', 27, 'LMS'),
(30, 'VNHS', 28, 'LMS'),
(31, 'VNHS', 29, 'LMS'),
(32, 'VNHS', 30, 'LMS'),
(33, 'VNHS', 31, 'LMS'),
(34, 'VNHS', 32, 'LMS'),
(35, 'VNHS', 33, 'LMS'),
(36, 'VNHS', 34, 'LMS'),
(37, 'VNHS', 35, 'LMS'),
(38, 'VNHS', 36, 'LMS'),
(39, 'VNHS', 37, 'LMS'),
(40, 'VNHS', 38, 'LMS'),
(41, 'VNHS', 39, 'LMS'),
(42, 'VNHS', 40, 'LMS'),
(43, 'VNHS', 41, 'LMS'),
(44, 'VNHS', 42, 'LMS'),
(45, 'VNHS', 43, 'LMS'),
(46, 'VNHS', 44, 'LMS'),
(47, 'VNHS', 45, 'LMS'),
(48, 'VNHS', 46, 'LMS'),
(49, 'VNHS', 47, 'LMS'),
(50, 'VNHS', 48, 'LMS'),
(51, 'VNHS', 49, 'LMS'),
(52, 'VNHS', 50, 'LMS'),
(53, 'VNHS', 51, 'LMS'),
(54, 'VNHS', 52, 'LMS'),
(55, 'VNHS', 53, 'LMS'),
(56, 'VNHS', 54, 'LMS'),
(57, 'VNHS', 55, 'LMS'),
(58, 'VNHS', 56, 'LMS'),
(59, 'VNHS', 57, 'LMS'),
(60, 'VNHS', 58, 'LMS'),
(61, 'VNHS', 59, 'LMS'),
(62, 'VNHS', 60, 'LMS'),
(63, 'VNHS', 61, 'LMS'),
(64, 'VNHS', 62, 'LMS'),
(65, 'VNHS', 63, 'LMS'),
(66, 'VNHS', 64, 'LMS'),
(67, 'VNHS', 65, 'LMS'),
(68, 'VNHS', 66, 'LMS'),
(69, 'VNHS', 67, 'LMS'),
(70, 'VNHS', 68, 'LMS'),
(71, 'VNHS', 69, 'LMS'),
(72, 'VNHS', 70, 'LMS'),
(73, 'VNHS', 71, 'LMS'),
(74, 'VNHS', 72, 'LMS'),
(75, 'VNHS', 73, 'LMS'),
(76, 'VNHS', 74, 'LMS'),
(77, 'VNHS', 75, 'LMS'),
(78, 'VNHS', 76, 'LMS'),
(79, 'VNHS', 77, 'LMS'),
(80, 'VNHS', 78, 'LMS'),
(81, 'VNHS', 79, 'LMS'),
(82, 'VNHS', 80, 'LMS'),
(83, 'VNHS', 81, 'LMS'),
(84, 'VNHS', 82, 'LMS'),
(85, 'VNHS', 83, 'LMS'),
(86, 'VNHS', 84, 'LMS'),
(87, 'VNHS', 85, 'LMS'),
(88, 'VNHS', 86, 'LMS'),
(89, 'VNHS', 87, 'LMS'),
(90, 'VNHS', 88, 'LMS'),
(91, 'VNHS', 89, 'LMS'),
(92, 'VNHS', 90, 'LMS'),
(93, 'VNHS', 91, 'LMS'),
(94, 'VNHS', 92, 'LMS'),
(95, 'VNHS', 93, 'LMS'),
(96, 'VNHS', 94, 'LMS'),
(97, 'VNHS', 95, 'LMS'),
(98, 'VNHS', 96, 'LMS');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_item`
--

CREATE TABLE `borrow_item` (
  `borrow_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `r_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=For approval, 1 =Approved,2= Claimed,3= Denied',
  `date_borrowed` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `date_returned` datetime NOT NULL,
  `borrowed_status` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow_item`
--

INSERT INTO `borrow_item` (`borrow_item_id`, `user_id`, `item_id`, `r_status`, `date_borrowed`, `due_date`, `date_returned`, `borrowed_status`) VALUES
(101, 70, 95, 0, '2022-04-30 21:43:49', '2022-05-07 21:43:49', '2022-05-02 03:43:52', 'returned'),
(102, 70, 95, 0, '2022-05-01 02:49:56', '2022-05-08 02:49:56', '2022-05-02 03:50:45', 'returned'),
(103, 49, 93, 0, '2022-05-01 21:15:05', '2022-05-08 21:15:05', '0000-00-00 00:00:00', 'borrowed'),
(104, 49, 93, 0, '2022-05-01 23:27:59', '2022-05-08 23:27:59', '0000-00-00 00:00:00', 'borrowed'),
(105, 49, 93, 0, '2022-05-01 23:28:45', '2022-05-08 23:28:45', '0000-00-00 00:00:00', 'borrowed'),
(106, 49, 93, 0, '2022-05-01 23:33:23', '2022-05-08 23:33:23', '0000-00-00 00:00:00', 'borrowed'),
(107, 49, 90, 0, '2022-05-01 23:33:43', '2022-05-08 23:33:43', '0000-00-00 00:00:00', 'borrowed'),
(108, 51, 93, 0, '2022-05-02 00:42:42', '2022-05-09 00:42:42', '0000-00-00 00:00:00', 'borrowed'),
(109, 70, 93, 0, '2022-05-02 03:44:01', '2022-05-09 03:44:01', '2022-05-02 03:47:09', 'returned'),
(110, 70, 93, 0, '2022-05-02 03:46:00', '2022-05-09 03:46:00', '2022-05-02 03:47:11', 'returned'),
(111, 70, 92, 0, '2022-05-02 03:47:03', '2022-05-09 03:47:03', '0000-00-00 00:00:00', 'borrowed'),
(112, 70, 90, 0, '2022-05-02 12:55:47', '2022-05-09 12:55:47', '0000-00-00 00:00:00', 'borrowed');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `classname` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `classname`) VALUES
(1, 'Glasswares'),
(2, 'Electricity'),
(3, 'Light: Mirrors and lenses'),
(4, 'Mechanics'),
(5, 'Reagents'),
(6, 'Models'),
(7, 'Biology (Life Sciences)'),
(8, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `sched_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user`, `title`, `start_event`, `end_event`, `sched_remarks`) VALUES
(1, 'sawas', 'sasasasa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yesyes'),
(3, 'Sample', 'sample only', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'asa'),
(4, 'wewe', 'asdasd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'asdas'),
(5, 'hg', 'jhg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'jjjjjjh'),
(6, '', 'sa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'asad'),
(8, 'wwww', 'asasas', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'adasd'),
(9, 'alliah', 'chem 3', '2022-05-03 03:30:00', '2022-05-04 04:30:00', 'sample only'),
(14, 'Borrower', 'chem 3', '2022-05-04 12:30:00', '2022-05-04 05:40:00', 'lab class');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `property_no` varchar(100) CHARACTER SET latin1 NOT NULL,
  `item_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `category_id` int(11) NOT NULL,
  `categ_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `specification` varchar(100) CHARACTER SET latin1 NOT NULL,
  `quantity` int(11) NOT NULL,
  `source_fund` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 NOT NULL,
  `item_image` varchar(100) CHARACTER SET latin1 NOT NULL,
  `date_added` datetime NOT NULL,
  `remarks` varchar(100) CHARACTER SET latin1 NOT NULL,
  `item_barcode` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `property_no`, `item_name`, `category_id`, `categ_name`, `specification`, `quantity`, `source_fund`, `status`, `item_image`, `date_added`, `remarks`, `item_barcode`) VALUES
(38, 'OE 7240- OE 7241', 'Water Bath Circulator', 0, 'Mechanics', '', 2, 'National', 'New', 'WaterBath.jpg', '2022-04-27 22:45:00', 'Available', 'VNHS39LMS'),
(39, 'OE 7242', 'Variable Power Supply', 0, 'Electricity', ' AC-DC, with 5 terminal Boards', 22, 'National', 'New', 'variablePowerSupple.jpg', '2022-04-27 22:46:06', 'Available', 'VNHS40LMS'),
(40, 'OE 7243- OE 7244', 'Oscilloscope', 0, 'Electricity', '', 2, 'National', 'New', 'oscilloscope.png', '2022-04-27 22:50:45', 'Available', 'VNHS41LMS'),
(41, 'OE 7245', 'Electronic Balance', 0, 'Mechanics', '', 1, 'National', 'New', 'electronic balance.jpg', '2022-04-27 22:53:48', 'Available', 'VNHS42LMS'),
(42, 'OE 7246', 'Hot plate with Magnetic Stirrer', 0, 'Mechanics', '', 1, 'National', 'New', 'Hot plate with magnetic stirrer.jpg', '2022-04-27 22:56:17', 'Available', 'VNHS43LMS'),
(43, 'OE 7247', 'Ceramic Hot Plate', 0, 'Mechanics', '', 1, 'National', 'New', 'Ceramic Hot Plate.jpg', '2022-04-27 22:58:34', 'Available', 'VNHS44LMS'),
(44, 'OE 7248', 'Ceramic Magnetic Stirrer', 0, 'Mechanics', '', 1, 'National', 'New', 'Ceramic Magnetic Stirrer.jpg', '2022-04-27 23:01:13', 'Available', 'VNHS45LMS'),
(45, 'OE 7249', 'Centrifuge', 0, 'Mechanics', '', 1, 'National', 'New', 'Centrifuge.jpg', '2022-04-27 23:02:27', 'Available', 'VNHS46LMS'),
(46, 'OE 7250', 'Colony Counter', 0, 'Mechanics', '', 1, 'National', 'New', 'Colony Counter.jpg', '2022-04-27 23:06:54', 'Available', 'VNHS47LMS'),
(47, 'OE 7251- OE 7266', 'Microscope', 0, 'Mechanics', '', 16, 'National', 'New', 'Microscope.jpg', '2022-04-27 23:09:10', 'Available', 'VNHS48LMS'),
(48, 'OE 7267- OE 7271', 'Beaker 50', 0, 'Glasswares', '50 mL, Borosilicate', 65, 'National', 'New', 'beaker_50.jpg', '2022-04-27 23:10:37', 'Available', 'VNHS49LMS'),
(49, 'OE 7272- OE 7276', 'Beaker 100', 0, 'Glasswares', '100 mL, Borosilicate', 125, 'National', 'New', 'beaker_100.jpg', '2022-04-27 23:25:12', 'Available', 'VNHS50LMS'),
(50, 'OE 7277- OE 7283', 'Beaker 150', 0, 'Glasswares', '150mL, Borosilicate', 7, 'National', 'New', 'beaker_150.jpg', '2022-04-27 23:26:32', 'Available', 'VNHS51LMS'),
(51, 'OE 7284- OE 7291', 'Beaker 250', 0, 'Glasswares', '250 mL, Borosilicate', 218, 'National', 'New', 'beaker_250.jpg', '2022-04-27 23:29:26', 'Available', 'VNHS52LMS'),
(52, 'OE 7292- OE 7294', 'Beaker 500', 0, 'Glasswares', '500 mL, Borosilicate', 63, 'National', 'New', 'beaker_500.jpg', '2022-04-27 23:30:37', 'Available', 'VNHS53LMS'),
(53, 'OE 7295- OE 7296', 'Beaker 1000', 0, 'Glasswares', '100mL, Borosilicate', 32, 'National', 'New', 'beaker_1000.jpg', '2022-04-27 23:31:42', 'Available', 'VNHS54LMS'),
(54, 'OE 7297- OE 7298', 'Graduated Cylinder 10', 0, 'Glasswares', '10mL', 152, 'National', 'New', 'graduated-cylinder-10ml.png', '2022-04-27 23:33:28', 'Available', 'VNHS55LMS'),
(55, 'OE 7299- OE 7302', 'Graduated Cylinder 100', 0, 'Glasswares', '100 mL', 154, 'National', 'New', 'graduated-cylinder-100ml.png', '2022-04-27 23:35:30', 'Available', 'VNHS56LMS'),
(56, 'OE 7303- OE 7305', 'Erlenmeyer Flask 100', 0, 'Glasswares', '100 mL, Borosilicate', 3, 'National', 'New', 'erlenmeyer_flask_100.jpg', '2022-04-27 23:38:34', 'Available', 'VNHS57LMS'),
(57, 'OE 7306- OE 7318', 'Erlenmeyer Flask 250', 0, 'Glasswares', '250 mL, Borosilicate', 263, 'National', 'New', 'erlenmeyer_flask_250.jpg', '2022-04-27 23:41:06', 'Available', 'VNHS58LMS'),
(58, 'OE 7319- OE 7320', 'Test Tube Holder', 0, 'Others', '', 2, 'National', 'New', 'test_tube_holder.jpg', '2022-04-27 23:43:10', 'Available', 'VNHS59LMS'),
(59, 'OE 7321- OE 7347', 'Test Tube', 0, 'Glasswares', '16 mm x 150 mm long', 567, 'National', 'New', 'test tube.jpg', '2022-04-27 23:50:02', 'Available', 'VNHS60LMS'),
(60, '--', 'Alcohol Burner', 0, 'Glasswares', '', 90, 'National', 'New', 'Alcohol Burner.jpg', '2022-04-27 23:52:28', 'Available', 'VNHS61LMS'),
(61, '--', 'Alcohol Thermometer', 0, 'Glasswares', '', 120, 'National', 'New', 'alcohol_thermometer.jpeg', '2022-04-27 23:53:23', 'Available', 'VNHS62LMS'),
(62, '--', 'Distilling Flask', 0, 'Glasswares', '', 10, 'National', 'New', 'distilling-flask.jpg', '2022-04-27 23:55:33', 'Available', 'VNHS63LMS'),
(63, '--', 'Florence Flask', 0, 'Glasswares', '', 5, 'National', 'New', 'florence_flask.jpg', '2022-04-27 23:56:04', 'Available', 'VNHS64LMS'),
(64, '--', 'Glass funnel', 0, 'Glasswares', '', 90, 'National', 'New', 'glass funnel.jpg', '2022-04-27 23:56:38', 'Available', 'VNHS65LMS'),
(65, '--', 'Graduated Pipette', 0, 'Glasswares', '', 30, 'National', 'New', 'Graduated_pippete.jpg', '2022-04-27 23:58:59', 'Available', 'VNHS66LMS'),
(66, '--', 'Petri Dish', 0, 'Glasswares', '', 90, 'National', 'New', 'petri-dish-glass.jpg', '2022-04-28 00:00:00', 'Available', 'VNHS67LMS'),
(67, '--', 'Reagent Bottle Narrow', 0, 'Glasswares', ' narrow mouth, amber glass ( 250 mL capacity)', 30, 'National', 'New', 'reagentbottle_narrowmouth.jpg', '2022-04-28 00:02:18', 'Available', 'VNHS68LMS'),
(68, '--', 'Reagent Bottle Wide', 0, 'Glasswares', ' Wide mouth, transparent glass (250 mL capacity)', 30, 'National', 'New', 'reagent-bottle-wide-mouth-500x500.jpg', '2022-04-28 00:03:33', 'Available', 'VNHS69LMS'),
(69, '--', 'Stirring Rod', 0, 'Glasswares', '16 mm x 250 mm long', 120, 'National', 'New', 'Glass-Stirring-Rods-1.jpg', '2022-04-28 00:04:47', 'Available', 'VNHS70LMS'),
(71, '--', 'Vial 50', 0, 'Glasswares', ' 50 mL ( with screw-type plastic cap)', 240, 'National', 'New', 'vial50.png', '2022-04-28 00:15:58', 'Available', 'VNHS72LMS'),
(72, '--', 'Vial 25', 0, 'Glasswares', '25 mL ( with screw-type plastic cap)', 120, 'National', 'New', 'vial25.jpg', '2022-04-28 00:18:07', 'Available', 'VNHS73LMS'),
(73, '--', 'Volumetric Flask', 0, 'Glasswares', '250 mL', 30, 'National', 'New', 'volumetric_flask_250.png', '2022-04-28 00:19:05', 'Available', 'VNHS74LMS'),
(74, '--', 'Watch Glass', 0, 'Glasswares', '', 120, 'National', 'New', 'watch_glass.jpg', '2022-04-28 00:20:29', 'Available', 'VNHS75LMS'),
(76, '--', 'Test Lead Black', 0, 'Electricity', 'Black 350 mm long with alligator clip on one end and banana plug on the other end', 90, 'National', 'New', 'black 350.jpg', '2022-04-28 00:26:20', 'Available', 'VNHS77LMS'),
(77, '--', 'Test Lead Blue', 0, 'Electricity', 'Blue 350 mm long with alligator clip on one end and banana plug on the other end', 60, 'National', 'New', 'blue 350.jpg', '2022-04-28 00:26:59', 'Available', 'VNHS78LMS'),
(78, '--', 'DC Ammeter', 0, 'Electricity', '', 30, 'National', 'New', 'dc ammeter.jpg', '2022-04-28 00:28:56', 'Available', 'VNHS79LMS'),
(79, '--', 'DC Voltmeter', 0, 'Electricity', '', 30, 'National', 'New', 'DC Voltmeter.jpg', '2022-04-28 00:30:12', 'Available', 'VNHS80LMS'),
(80, '--', 'Dry cell AA', 0, 'Electricity', '1.5 V AA', 56, 'National', 'New', '1.5AA.jpg', '2022-04-28 00:32:06', 'Available', 'VNHS81LMS'),
(81, '--', 'Dry cell D', 0, 'Electricity', '1.5 V, size D ', 120, 'National', 'New', '1.5D.jpg', '2022-04-28 00:33:19', 'Available', 'VNHS82LMS'),
(82, '--', 'Dry cell 9V', 0, 'Electricity', '9 volts', 30, 'National', 'New', '9v.jpg', '2022-04-28 00:34:32', 'Available', 'VNHS83LMS'),
(83, '--', 'Dry Cell Holder', 0, 'Electricity', 'for single size D dry cell', 120, 'National', 'New', 'D_cell_holder_big.jpg', '2022-04-28 00:37:54', 'Available', 'VNHS84LMS'),
(84, '--', 'Galvanometer', 0, 'Electricity', '', 30, 'National', 'New', 'galvanometer.jpg', '2022-04-28 00:39:00', 'Available', 'VNHS85LMS'),
(85, '--', 'Logic Gates Trainer Kit', 0, 'Electricity', '', 5, 'National', 'New', 'logic trainer.jpg', '2022-04-28 00:41:58', 'Available', 'VNHS86LMS'),
(86, '--', 'Light Bulb Holder', 0, 'Electricity', 'miniature bulb holder assembly', 90, 'National', 'New', 'Miniature Light Bulb Holder Assembly.jpg', '2022-04-28 00:44:28', 'Available', 'VNHS87LMS'),
(87, '--', 'Motor-Generator Model', 0, 'Electricity', 'by set', 35, 'National', 'New', 'motormodel.PNG', '2022-04-28 00:48:12', 'Available', 'VNHS88LMS'),
(88, '--', 'Multitester', 0, 'Electricity', '', 5, 'National', 'New', 'multimeter.jpg', '2022-04-28 00:49:43', 'Available', 'VNHS89LMS'),
(89, '--', 'Test Lead Red', 0, 'Electricity', 'Red 350 mm long with alligator clip on one end and banana plug on the other end', 90, 'National', 'New', 'test lead red.jpg', '2022-04-28 00:51:11', 'Available', 'VNHS90LMS'),
(90, '--', 'Resistance Box', 0, 'Electricity', '', 3, 'National', 'New', 'resistance box.PNG', '2022-04-28 00:52:57', 'Available', 'VNHS91LMS'),
(91, '--', 'Resistance board', 0, 'Electricity', 'by (units)', 30, 'National', 'New', 'resistance-board.jpg', '2022-04-28 00:54:06', 'Available', 'VNHS92LMS'),
(92, '--', 'Switch Knife Type', 0, 'Electricity', '', 39, 'National', 'New', 'Switch Knife type.jpg', '2022-04-28 00:55:44', 'Available', 'VNHS93LMS'),
(93, '--', 'Test Lead White', 0, 'Electricity', 'White 350 mm long with alligator clip on one end and banana plug on the other end', 60, 'National', 'New', 'test lead white.PNG', '2022-04-28 01:03:06', 'Available', 'VNHS94LMS'),
(95, '1111', 'test', 0, 'Others', 'test', 356, 'National', 'Old', '', '2022-04-28 19:47:06', 'Available', 'VNHS96LMS');

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

CREATE TABLE `penalty` (
  `penalty_id` int(11) NOT NULL,
  `penalty_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penalty`
--

INSERT INTO `penalty` (`penalty_id`, `penalty_amount`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `detail_action` varchar(100) NOT NULL,
  `date_transaction` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `item_id`, `user_id`, `admin_name`, `detail_action`, `date_transaction`) VALUES
(236, 95, 70, 'Ash  Ketchum', 'Borrowed Book', '2022-05-01 02:49:57'),
(237, 93, 49, 'Ash  Ketchum', 'Borrowed Book', '2022-05-01 21:15:11'),
(238, 93, 49, '  ', 'Borrowed Book', '2022-05-01 23:28:03'),
(239, 93, 49, '  ', 'Borrowed Book', '2022-05-01 23:28:47'),
(240, 93, 49, '  ', 'Borrowed Book', '2022-05-01 23:33:26'),
(241, 90, 49, '  ', 'Borrowed Book', '2022-05-01 23:33:44'),
(242, 93, 51, 'Ash  Ketchum', 'Borrowed Book', '2022-05-02 00:43:04'),
(243, 95, 70, '  ', 'Returned Book', '2022-05-02 03:43:52'),
(244, 95, 70, '  ', 'Returned Book', '2022-05-02 03:43:52'),
(245, 93, 70, '  ', 'Borrowed Book', '2022-05-02 03:44:02'),
(246, 93, 70, '  ', 'Borrowed Book', '2022-05-02 03:46:02'),
(247, 92, 70, '  ', 'Borrowed Book', '2022-05-02 03:47:04'),
(248, 93, 70, '  ', 'Returned Book', '2022-05-02 03:47:09'),
(249, 93, 70, '  ', 'Returned Book', '2022-05-02 03:47:09'),
(250, 93, 70, '  ', 'Returned Book', '2022-05-02 03:47:09'),
(251, 93, 70, '  ', 'Returned Book', '2022-05-02 03:47:09'),
(252, 93, 70, '  ', 'Returned Book', '2022-05-02 03:47:11'),
(253, 93, 70, '  ', 'Returned Book', '2022-05-02 03:47:11'),
(254, 93, 70, '  ', 'Returned Book', '2022-05-02 03:47:11'),
(255, 95, 70, '  ', 'Returned Book', '2022-05-02 03:50:45'),
(256, 95, 70, '  ', 'Returned Book', '2022-05-02 03:50:45'),
(257, 90, 70, 'Ash  Ketchum', 'Borrowed Book', '2022-05-02 12:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `return_item`
--

CREATE TABLE `return_item` (
  `return_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `date_returned` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `return_item`
--

INSERT INTO `return_item` (`return_item_id`, `user_id`, `item_id`, `date_borrowed`, `due_date`, `date_returned`) VALUES
(141, 70, 95, '2022-04-30 21:43:49', '2022-05-07 21:43:49', '2022-05-02 03:42:20'),
(142, 70, 95, '2022-04-30 21:43:49', '2022-05-07 21:43:49', '2022-05-02 03:42:20'),
(143, 70, 93, '2022-05-02 03:44:01', '2022-05-09 03:44:01', '2022-05-02 03:46:29'),
(144, 70, 93, '2022-05-02 03:44:01', '2022-05-09 03:44:01', '2022-05-02 03:46:29'),
(145, 70, 93, '2022-05-02 03:44:01', '2022-05-09 03:44:01', '2022-05-02 03:46:29'),
(146, 70, 93, '2022-05-02 03:44:01', '2022-05-09 03:44:01', '2022-05-02 03:46:29'),
(147, 70, 93, '2022-05-02 03:46:00', '2022-05-09 03:46:00', '2022-05-02 03:47:09'),
(148, 70, 93, '2022-05-02 03:46:00', '2022-05-09 03:46:00', '2022-05-02 03:47:09'),
(149, 70, 93, '2022-05-02 03:46:00', '2022-05-09 03:46:00', '2022-05-02 03:47:09'),
(150, 70, 95, '2022-05-01 02:49:56', '2022-05-08 02:49:56', '2022-05-02 03:50:43'),
(151, 70, 95, '2022-05-01 02:49:56', '2022-05-08 02:49:56', '2022-05-02 03:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `schedule_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime_start` datetime NOT NULL,
  `datetime_end` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schedule_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `school_number` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `h_address` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=active, 1=inactive',
  `user_added` datetime NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `school_number`, `firstname`, `middlename`, `lastname`, `contact`, `gender`, `h_address`, `department`, `user_image`, `status`, `user_added`, `password`, `confirm_password`) VALUES
(48, '888888', 'Inigo', '', 'Pascual', '09098302938', 'Male', 'asdasdasd', 'Science', '', 1, '2022-04-27 04:22:59', 'admin123', 'inigo'),
(49, '01', 'Jeffry ', 'Q', 'Abella', '09090909090', 'Male', '  **insert address123**                                                                        ', 'Science', '', 0, '2022-04-28 01:46:21', '01', '01'),
(50, '02', 'Daniel', 'M.', 'Artango', '09090909090', 'Male', '**insert address**', 'Science', '', 0, '2022-04-28 01:47:14', '02', '02'),
(51, '03', 'Julius', 'A.', 'Alcoser', '09090909090', 'Male', '**insert address**', 'Science', '', 0, '2022-04-28 01:53:58', '03', '03'),
(52, '04', 'Bernadette', 'D.', 'Busano', '09090909090', 'Female', '**insert address**', 'Science', '', 0, '2022-04-28 01:54:26', '04', '04'),
(53, '05', 'Llyod Allan', 'L.', 'Cabunoc', '09090090909', 'Male', '**insert address**', 'Science', '', 0, '2022-04-28 01:55:08', '05', '05'),
(54, '06', 'Severino', 'M.', 'Cantorne', '09090909090', 'Male', '**insert address**', 'Science', '', 0, '2022-04-28 01:55:36', '06', '06'),
(55, '07', 'Sherryll', 'P.', 'Dura', '09090909090', 'Female', '**insert address**', 'Science', '', 0, '2022-04-28 01:56:08', '07', '07'),
(56, '08', 'Jacqueline', 'G.', 'Gasatan', '09090909999', 'Female', '**insert address**', 'Science', '', 0, '2022-04-28 01:56:45', '08', '08'),
(57, '09', 'Ophelia', 'B.', 'Hamac', '09989090909', 'Female', '**insert address**', 'Science', '', 0, '2022-04-28 01:59:11', '09', '09'),
(58, '10', 'Jacquelene', 'M.', 'Igano', '00909990909', 'Female', '**insert address**', 'Science', '', 0, '2022-04-28 01:59:51', '010', '010'),
(59, '11', 'Bismark', 'E.', 'Labadan', '09990990909', 'Male', '**insert address**', 'Science', '', 0, '2022-04-28 02:00:38', '11', '11'),
(60, '12', 'Leah Lyn ', 'A.', 'Lingatong', '09909909090', 'Female', '**insert address**', 'Science', '', 0, '2022-04-28 02:01:08', '12', '12'),
(61, '13', 'Krista Mari', 'M.', 'Llenas', '09909090909', 'Female', '**insert address**', 'Science', '', 0, '2022-04-28 02:01:38', '13', '13'),
(62, '14', 'Lauren', 'M.', 'Manus', '09909099090', 'Female', '**insert address**', 'Science', '', 0, '2022-04-28 02:02:50', '14', '14'),
(63, '15', 'Christine', 'M.', 'Montalban', '09909099099', 'Female', '**insert address**', 'Science', '', 0, '2022-04-28 02:03:35', '15', '15'),
(64, '16', 'Rubylinda', 'E.', 'Peralta', '09909099999', 'Female', '**insert address**', 'Science', '', 0, '2022-04-28 02:04:06', '16', '16'),
(65, '17', 'Teresita', 'A.', 'Rara', '09909999999', 'Female', '**insert address**', 'Science', '', 0, '2022-04-28 02:04:32', '17', '17'),
(66, '18', 'Eva', 'A.', 'Ritardo', '09999909999', 'Female', '**insert address**', 'Science', '', 0, '2022-04-28 02:04:58', '18', '18'),
(67, '19', 'Nelsa', 'J.', 'Ruiz', '09099090909', 'Female', '**insert address**', 'Science', '', 0, '2022-04-28 02:05:28', '19', '19'),
(68, '20', 'Analeah', 'A.', 'Saberon', '09099909090', 'Female', '**insert address**', 'Science', '', 0, '2022-04-28 02:05:57', '20', '20'),
(69, '21', 'Joan Mae', 'C', 'Tabla', '09990999999', 'Female', '**insert address**', 'Science', '', 0, '2022-04-28 02:06:19', '21', '21'),
(70, '1111', 'test', '', 'sample', '09090909090', 'Male', 'vbbnbb', 'Science', '', 0, '2022-04-29 02:29:56', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `date_log` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `allowed_days`
--
ALTER TABLE `allowed_days`
  ADD PRIMARY KEY (`allowed_days_id`);

--
-- Indexes for table `allowed_item`
--
ALTER TABLE `allowed_item`
  ADD PRIMARY KEY (`allowed_item_id`);

--
-- Indexes for table `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`barcode_id`);

--
-- Indexes for table `borrow_item`
--
ALTER TABLE `borrow_item`
  ADD PRIMARY KEY (`borrow_item_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_id` (`category_id`),
  ADD KEY `classid` (`category_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `penalty`
--
ALTER TABLE `penalty`
  ADD PRIMARY KEY (`penalty_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `return_item`
--
ALTER TABLE `return_item`
  ADD PRIMARY KEY (`return_item_id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `allowed_days`
--
ALTER TABLE `allowed_days`
  MODIFY `allowed_days_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `allowed_item`
--
ALTER TABLE `allowed_item`
  MODIFY `allowed_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barcode`
--
ALTER TABLE `barcode`
  MODIFY `barcode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `borrow_item`
--
ALTER TABLE `borrow_item`
  MODIFY `borrow_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=801;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `penalty`
--
ALTER TABLE `penalty`
  MODIFY `penalty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `return_item`
--
ALTER TABLE `return_item`
  MODIFY `return_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
