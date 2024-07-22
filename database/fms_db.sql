-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2024 at 11:42 AM
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
(10, 'macao-imperial', 'classicifcatiopn', 'non-exclusive,use-trademarks,sell-products', '1', '2024-07-24', 'Binan City, Laguna', 500000, '', 100000, '', ' 50000', '', '', 'jd', 'bj', 'qwerty', 'uiop', '../assets/images/notarySeals/notarySeal-20240715084300.jpg', 'active', '2024-07-15 14:43:00');

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

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`ex_id`, `encoder_id`, `franchisee`, `location`, `expense_catergory`, `expense_type`, `expense_purpose`, `expense_amount`, `expense_description`, `date_added`) VALUES
(1, 11, 'potato-corner', 'San Pedro, Minalin, Pampanga', 'non-controllable-expenses', 'franchiseFees', 'Test', '5000', 'Nothing', '2024-07-19'),
(2, 11, 'potato-corner', 'San Pedro, Minalin, Pampanga', 'non-controllable-expenses', 'franchiseFees', 'Test', '3000', 'Nothing', '2024-07-19');

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
(669, 11, 'manpower_employee_added', '2024-07-19 20:00:49');

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
(669, 'Kai Cen', 'default-profile.png', 'kai@gmail.com', 'YWRtaW4=', 947326246, 'San Pedro, Minalin, Pampanga', '2024-07-19', 'user', 'active', '2024-07-19 20:00:49'),
(31231, 'Code Zero', 'default-profile.png', 'cd@gmail.com', 'YWRtaW4=', 947326212, 'Binan City, Laguna', '2024-07-17', 'user', 'active', '2024-07-04 13:05:09'),
(31231312, 'Kobe Bryant', 'default-profile.png', 'kb@gmail.com', 'YWRtaW4=', 947326212, 'San Pedro City, Laguna', '2024-07-17', 'user', 'active', '2024-07-04 13:05:09');

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
(11, 2, 'assigned', 'potato-corner', 'San Pedro, Minalin, Pampanga', 'Morning Shift', '', '0000-00-00', '', ''),
(669, 2, 'assigned', 'potato-corner', 'San Pedro, Minalin, Pampanga', 'Afternoon Shift', '', '0000-00-00', '', ''),
(31231, 10, 'assigned', 'macao-imperial', 'Binan City, Laguna', 'Full Time', '', '0000-00-00', '', ''),
(31231312, 0, 'unassigned', '', '', 'Full Time', '', '0000-00-00', '', '');

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
  MODIFY `ac_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `ex_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lease_contract`
--
ALTER TABLE `lease_contract`
  MODIFY `lease_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=670;

--
-- AUTO_INCREMENT for table `sales_report`
--
ALTER TABLE `sales_report`
  MODIFY `report_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_accounts`
--
ALTER TABLE `users_accounts`
  MODIFY `user_id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31231313;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
