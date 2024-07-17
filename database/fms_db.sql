-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 07:22 AM
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
  `datetime_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agreement_contract`
--

INSERT INTO `agreement_contract` (`ac_id`, `franchisee`, `classification`, `rights_granted`, `franchise_term`, `agreement_date`, `location`, `franchise_fee`, `ff_note`, `franchise_package`, `fp_note`, `bond`, `b_note`, `extra_note`, `notarization_fr`, `notarization_fr_rb`, `notarization_fe`, `notarization_fe_rb`, `notary_public_seal`, `status`, `datetime_added`) VALUES
(2, 'potato-corner', 'classicifcatiopn', 'non-exclusive,use-trademarks,sell-products', '5', '2024-06-28', 'San Pedro, Minalin, Pampanga', 500000, '', 100000, '', ' 50000', '', '', 'John Doe', 'bj', 'qwerty', 'uiop', '../assets/images/notarySeals/notarySeal-20240715084300.jpg', 'active', '2024-07-15 14:43:00'),
(9, 'macao-imperial', 'classicifcatiopn', 'non-exclusive,use-trademarks,sell-products', '1', '2024-07-24', 'binan', 12, '', 13, '', '14', '', '', 'jd', 'bj', 'qwerty', 'uiop', '../assets/images/notarySeals/notarySeal-20240715084300.jpg', 'active', '2024-07-15 14:43:00');

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

--
-- Dumping data for table `lease_contract`
--

INSERT INTO `lease_contract` (`lease_id`, `franchisee`, `start_date`, `end_date`, `space_number`, `area`, `classification`, `rent`, `percentage_rent`, `minimum_rent`, `additional_fee`, `af_note`, `total_monthly_dues`, `tmd_note`, `lease_deposit`, `ld_note`, `lessor_name1`, `lessor_address1`, `lessor_name2`, `lessor_address2`, `extra_note`, `notary_public_seal`, `status`, `datetime_added`) VALUES
(3, 'auntie-annes', '2024-07-15', '2024-07-18', '123', '456', '313', '11', '22', '33', '123', 'undefined', '123', '', '123', '', 'bb', 'eyy', 'gg', 'eyy', '', 'notarySeal-20240715145959.gif', 'draft', '2024-07-15 21:20:12');

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
(3, 2, 11, 'potato-corner', 'dine-in', '10, 420, 3, 1250', '1683.00', '2024-07-16'),
(4, 2, 11, 'macao-imperial', 'take-out', '10, 420, 3, 1250', '1683.00', '2024-07-16'),
(5, 2, 11, 'auntie-anne', 'delivery', '10, 420, 1680', '1680.00', '2024-07-16'),
(6, 2, 11, 'macao-imperial', 'take-out', '10, 420, 3, 1250', '1683.00', '2024-07-16'),
(7, 2, 11, 'macao-imperial', 'delivery', '10, 420, 1680', '1680.00', '2024-07-16'),
(8, 2, 11, 'potato-corner', 'dine-in', '10, 420, 3, 1250', '1683.00', '2024-07-16');

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
  `user_type` varchar(100) NOT NULL DEFAULT 'user',
  `user_status` varchar(100) NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_accounts`
--

INSERT INTO `users_accounts` (`user_id`, `user_name`, `user_photo`, `user_email`, `user_password`, `user_phone_number`, `user_type`, `user_status`, `date_created`) VALUES
(5, 'Admin', 'default-profile.png	', 'admin@admin.com', 'YWRtaW4=', 0, 'admin', 'active', '2024-05-18 10:00:20'),
(11, 'John Doe', 'default-profile.png', 'jd@gmail.com', 'YWRtaW4=', 0, 'user', 'active', '2024-07-04 13:05:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agreement_contract`
--
ALTER TABLE `agreement_contract`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `lease_contract`
--
ALTER TABLE `lease_contract`
  ADD PRIMARY KEY (`lease_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agreement_contract`
--
ALTER TABLE `agreement_contract`
  MODIFY `ac_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lease_contract`
--
ALTER TABLE `lease_contract`
  MODIFY `lease_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_report`
--
ALTER TABLE `sales_report`
  MODIFY `report_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_accounts`
--
ALTER TABLE `users_accounts`
  MODIFY `user_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
