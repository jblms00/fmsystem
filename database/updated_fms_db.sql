-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 10:05 AM
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
-- Database: `fms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `agreement_contract`
--

CREATE TABLE `agreement_contract` (
  `ac_id` bigint(250) NOT NULL,
  `franchisee` text NOT NULL,
  `classification` text NOT NULL,
  `rights_granted` text NOT NULL,
  `franchise_term` text NOT NULL,
  `agreement_date` date NOT NULL,
  `location` text NOT NULL,
  `franchise_fee` bigint(250) NOT NULL,
  `ff_note` text NOT NULL,
  `franchise_package` bigint(250) NOT NULL,
  `fp_note` text NOT NULL,
  `bond` text NOT NULL,
  `b_note` text NOT NULL,
  `extra_note` text NOT NULL,
  `notarization_fr` text NOT NULL,
  `notarization_fr_rb` text NOT NULL,
  `notarization_fe` text NOT NULL,
  `notarization_fe_rb` text NOT NULL,
  `notary_public_seal` varchar(250) NOT NULL,
  `status` varchar(120) NOT NULL,
  `datetime_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agreement_contract`
--

INSERT INTO `agreement_contract` (`ac_id`, `franchisee`, `classification`, `rights_granted`, `franchise_term`, `agreement_date`, `location`, `franchise_fee`, `ff_note`, `franchise_package`, `fp_note`, `bond`, `b_note`, `extra_note`, `notarization_fr`, `notarization_fr_rb`, `notarization_fe`, `notarization_fe_rb`, `notary_public_seal`, `status`, `datetime_added`) VALUES
(202273, 'potato-corner', 'Classification', 'non-exclusive,use-trademarks,sell-products', '2', '2024-10-21', 'San Pedro, Minalin, Pampanga', 200, '', 200, '', '200', '', '', 'John Smith', 'Hon Ben', 'John Den', 'Den Dan', 'notarySealAgreement-20241020133518.gif', 'active', '2024-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `ex_id` bigint(250) NOT NULL,
  `encoder_id` bigint(250) NOT NULL,
  `franchisee` varchar(120) NOT NULL,
  `location` text NOT NULL,
  `expense_catergory` varchar(120) NOT NULL,
  `expense_type` text NOT NULL,
  `expense_purpose` text NOT NULL,
  `expense_amount` text NOT NULL,
  `expense_description` text NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(250) NOT NULL,
  `item_name` text NOT NULL,
  `franchisee` varchar(150) NOT NULL,
  `uo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `franchisee`, `uo`) VALUES
(1, 'Generic Icetea', 'potato-corner', 'PAC'),
(2, 'Softdrinks In Can - Coke', 'potato-corner', 'CAN'),
(3, 'Softdrinks In Can - Royal', 'potato-corner', 'CAN'),
(4, 'Softdrinks In Can - Sprite', 'potato-corner', 'CAN'),
(5, 'Softdrinks In Can - Coke Zero', 'potato-corner', 'CAN'),
(6, 'Water - Bottled 500ml', 'potato-corner', 'BT'),
(7, 'Powder - Cheese', 'potato-corner', 'PAC'),
(8, 'Powder - Sour Cream', 'potato-corner', 'PAC'),
(9, 'Powder - BBQ', 'potato-corner', 'PAC'),
(10, 'Powder - White Cheddar', 'potato-corner', 'PAC'),
(11, 'Powder - Wasabi', 'potato-corner', 'PAC'),
(12, 'Shoestring Fries 1kg', 'potato-corner', 'PAC'),
(13, 'Packaging - Regular', 'potato-corner', 'PC'),
(14, 'Packaging - Large', 'potato-corner', 'PC'),
(15, 'Packaging - Jumbo', 'potato-corner', 'PC'),
(16, 'Packaging - Mega', 'potato-corner', 'PC'),
(17, 'Packaging - Giga', 'potato-corner', 'PC'),
(18, 'Packaging - Tera', 'potato-corner', 'PC'),
(19, 'Water - Bottled 500ml', 'macao-imperial', 'BT'),
(20, 'Tea - Jasmine', 'macao-imperial', 'PAC'),
(21, 'Tea - Black', 'macao-imperial', 'PAC'),
(22, 'Boba Pack', 'macao-imperial', 'PAC'),
(23, 'Milk 1L', 'macao-imperial', 'PC'),
(24, 'Yakult 6pcs/Pack', 'macao-imperial', 'PAC'),
(25, 'Cream Cheese', 'macao-imperial', 'PAC'),
(26, 'Pudding', 'macao-imperial', 'PAC'),
(27, 'Black Pearl', 'macao-imperial', 'PAC'),
(28, 'Grass Jelly', 'macao-imperial', 'PAC'),
(29, 'Generic Icetea', 'auntie-anne', 'PAC'),
(30, 'Generic Coffee', 'auntie-anne', 'PAC'),
(31, 'Generic Lemonade', 'auntie-anne', 'PAC'),
(32, 'Water - Bottled 500ml', 'auntie-anne', 'BT'),
(33, 'Premade Dough 1kg', 'auntie-anne', 'BOX'),
(34, 'Ap Flour 1kg', 'auntie-anne', 'PC'),
(35, 'Hotdog - (12pcs/Pack)', 'auntie-anne', 'PAC'),
(36, 'Cream Cheese Pack', 'auntie-anne', 'PAC'),
(37, 'Cinnamon Sugar 1kg', 'auntie-anne', 'PAC'),
(38, 'Choco Chip 1kg', 'auntie-anne', 'PAC'),
(39, 'Almond 1kg', 'auntie-anne', 'PAC'),
(40, 'Sour Cream & Onion 1kg', 'auntie-anne', 'PAC'),
(41, 'Dip - Chocolate', 'auntie-anne', 'PC'),
(42, 'Dip - Caramel', 'auntie-anne', 'PC'),
(43, 'Dip - Cream Cheese', 'auntie-anne', 'PC');

-- --------------------------------------------------------

--
-- Table structure for table `item_inventory`
--

CREATE TABLE `item_inventory` (
  `inventory_id` bigint(250) NOT NULL,
  `item_id` bigint(250) NOT NULL,
  `franchisee` varchar(150) NOT NULL,
  `branch` text NOT NULL,
  `delivery` bigint(250) NOT NULL,
  `beginning` bigint(250) NOT NULL,
  `waste` bigint(250) NOT NULL,
  `sold` bigint(250) NOT NULL,
  `remarks` text NOT NULL,
  `filled_by` bigint(250) NOT NULL,
  `datetime_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_inventory`
--

INSERT INTO `item_inventory` (`inventory_id`, `item_id`, `franchisee`, `branch`, `delivery`, `beginning`, `waste`, `sold`, `remarks`, `filled_by`, `datetime_added`) VALUES
(140, 1, 'potato-corner', 'San Pedro, Minalin, Pampanga', 12, 122, 12, 12, '12', 11, '2024-10-21 06:30:13'),
(141, 2, 'potato-corner', 'San Pedro, Minalin, Pampanga', 1, 12, 21, 21, '12', 11, '2024-10-21 06:30:13'),
(142, 3, 'potato-corner', 'San Pedro, Minalin, Pampanga', 21, 21, 21, 21, '21', 11, '2024-10-21 06:30:13'),
(143, 4, 'potato-corner', 'San Pedro, Minalin, Pampanga', 21, 21, 21, 21, '21', 11, '2024-10-21 06:30:13'),
(144, 5, 'potato-corner', 'San Pedro, Minalin, Pampanga', 21, 21, 21, 21, '21', 11, '2024-10-21 06:30:13'),
(145, 6, 'potato-corner', 'San Pedro, Minalin, Pampanga', 21, 21, 21, 21, '121', 11, '2024-10-21 06:30:13'),
(146, 7, 'potato-corner', 'San Pedro, Minalin, Pampanga', 1232, 23, 31213, 12, '1', 11, '2024-10-21 06:30:13'),
(147, 8, 'potato-corner', 'San Pedro, Minalin, Pampanga', 31, 2212, 12, 21, '12', 11, '2024-10-21 06:30:13'),
(148, 9, 'potato-corner', 'San Pedro, Minalin, Pampanga', 12, 12, 121, 22, '2', 11, '2024-10-21 06:30:13'),
(149, 10, 'potato-corner', 'San Pedro, Minalin, Pampanga', 12, 12, 12, 1, '21', 11, '2024-10-21 06:30:13'),
(150, 11, 'potato-corner', 'San Pedro, Minalin, Pampanga', 321, 212, 12, 12, '12', 11, '2024-10-21 06:30:13'),
(151, 12, 'potato-corner', 'San Pedro, Minalin, Pampanga', 21, 1, 21, 2, '1213', 11, '2024-10-21 06:30:13'),
(152, 13, 'potato-corner', 'San Pedro, Minalin, Pampanga', 231, 321, 23, 231231, '32121', 11, '2024-10-21 06:30:13'),
(153, 14, 'potato-corner', 'San Pedro, Minalin, Pampanga', 321, 321, 321, 321, '321', 11, '2024-10-21 06:30:13'),
(154, 15, 'potato-corner', 'San Pedro, Minalin, Pampanga', 321, 321, 321, 321, '321', 11, '2024-10-21 06:30:13'),
(155, 16, 'potato-corner', 'San Pedro, Minalin, Pampanga', 312, 321, 321, 321, '321', 11, '2024-10-21 06:30:13'),
(156, 17, 'potato-corner', 'San Pedro, Minalin, Pampanga', 321, 321, 321, 321, '312', 11, '2024-10-21 06:30:13'),
(157, 18, 'potato-corner', 'San Pedro, Minalin, Pampanga', 321, 321, 321, 312, '321', 11, '2024-10-21 06:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `lease_contract`
--

CREATE TABLE `lease_contract` (
  `lease_id` bigint(250) NOT NULL,
  `franchisee` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `space_number` text NOT NULL,
  `area` text NOT NULL,
  `classification` text NOT NULL,
  `rent` text NOT NULL,
  `percentage_rent` text NOT NULL,
  `minimum_rent` text NOT NULL,
  `additional_fee` text NOT NULL,
  `af_note` text NOT NULL,
  `total_monthly_dues` text NOT NULL,
  `tmd_note` text NOT NULL,
  `lease_deposit` text NOT NULL,
  `ld_note` text NOT NULL,
  `lessor_name1` text NOT NULL,
  `lessor_address1` text NOT NULL,
  `lessor_name2` text NOT NULL,
  `lessor_address2` text NOT NULL,
  `extra_note` text NOT NULL,
  `notary_public_seal` varchar(150) NOT NULL,
  `status` varchar(120) NOT NULL,
  `datetime_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` bigint(250) NOT NULL,
  `user_id` bigint(250) NOT NULL,
  `activity_type` varchar(250) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `activity_type`, `datetime`) VALUES
(1785223, 11, 'manpower_employee_added', '2024-10-26 15:38:34'),
(7081843, 202273, 'new_agreement_contract', '2024-10-20 19:35:18'),
(7319307, 11, 'manpower_employee_added', '2024-10-26 15:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `sales_report`
--

CREATE TABLE `sales_report` (
  `report_id` bigint(250) NOT NULL,
  `ac_id` bigint(250) NOT NULL,
  `encoder_id` bigint(250) NOT NULL,
  `franchisee` varchar(150) NOT NULL,
  `services` varchar(120) NOT NULL,
  `transactions` text NOT NULL,
  `grand_total` text NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_report`
--

INSERT INTO `sales_report` (`report_id`, `ac_id`, `encoder_id`, `franchisee`, `services`, `transactions`, `grand_total`, `date_added`) VALUES
(9, 202273, 0, '11', 'dine-in', '200, 200, 200, 200', '800.00', '2024-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `users_accounts`
--

CREATE TABLE `users_accounts` (
  `user_id` bigint(250) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_photo` varchar(150) NOT NULL DEFAULT 'default-profile.png',
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_phone_number` int(15) NOT NULL,
  `user_address` text DEFAULT NULL,
  `user_birthdate` date DEFAULT NULL,
  `user_type` varchar(100) NOT NULL DEFAULT 'user',
  `user_status` varchar(100) NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_accounts`
--

INSERT INTO `users_accounts` (`user_id`, `user_name`, `user_photo`, `user_email`, `user_password`, `user_phone_number`, `user_address`, `user_birthdate`, `user_type`, `user_status`, `date_created`) VALUES
(11, 'John Doe', 'default-profile.png', 'jd@gmail.com', 'YWRtaW4=', 947326212, 'San Pedro, Minalin, Pampanga', '2024-07-17', 'user', 'active', '2024-07-04 13:05:09'),
(5135376, 'John Smith', '', 'js@gmail.com', '', 2147483647, 'dasdsada', '2024-10-26', 'user', 'active', '2024-10-26 15:38:34'),
(7294738, 'JP', '', 'jp@gmail.com', '', 2147483647, 'das das das d', '2024-10-26', 'user', 'active', '2024-10-26 15:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `user_id` bigint(250) NOT NULL,
  `assigned_at` bigint(250) NOT NULL,
  `employee_status` varchar(100) NOT NULL,
  `franchisee` varchar(250) NOT NULL,
  `branch` varchar(250) NOT NULL,
  `user_shift` varchar(120) NOT NULL,
  `certification_name` text NOT NULL,
  `certification_date` date NOT NULL,
  `certificate_file_name` text NOT NULL,
  `certificate_status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`user_id`, `assigned_at`, `employee_status`, `franchisee`, `branch`, `user_shift`, `certification_name`, `certification_date`, `certificate_file_name`, `certificate_status`) VALUES
(5135376, 202273, 'assigned', 'potato-corner', 'San Pedro, Minalin, Pampanga', 'Morning Shift', '', '0000-00-00', '', ''),
(7294738, 202273, 'assigned', 'potato-corner', 'San Pedro, Minalin, Pampanga', 'Morning Shift', '', '0000-00-00', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agreement_contract`
--
ALTER TABLE `agreement_contract`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `item_inventory`
--
ALTER TABLE `item_inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `lease_contract`
--
ALTER TABLE `lease_contract`
  ADD PRIMARY KEY (`lease_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `sales_report`
--
ALTER TABLE `sales_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users_accounts`
--
ALTER TABLE `users_accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agreement_contract`
--
ALTER TABLE `agreement_contract`
  MODIFY `ac_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211889;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `ex_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `item_inventory`
--
ALTER TABLE `item_inventory`
  MODIFY `inventory_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `lease_contract`
--
ALTER TABLE `lease_contract`
  MODIFY `lease_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7319308;

--
-- AUTO_INCREMENT for table `sales_report`
--
ALTER TABLE `sales_report`
  MODIFY `report_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_accounts`
--
ALTER TABLE `users_accounts`
  MODIFY `user_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31231314;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
