-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2023 at 07:19 AM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u318237870_pxams`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_study_set`
--

CREATE TABLE `account_study_set` (
  `id` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `ss_id` bigint(20) NOT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account_study_set`
--

INSERT INTO `account_study_set` (`id`, `create_by`, `owner_id`, `ss_id`, `date`, `type`, `active`) VALUES
(1, 1, 1, 1, '2023-02-28', 'OWNED', 1),
(2, 1, 1, 2, '2023-02-28', 'OWNED', 1),
(3, 1, 1, 3, '2023-03-29', 'OWNED', 1),
(4, 1, 1, 4, '2023-03-31', 'OWNED', 1),
(5, 1, 1, 5, '2023-04-01', 'OWNED', 1),
(6, 1, 1, 6, '2023-04-19', 'OWNED', 0),
(7, 1, 1, 7, '2023-05-25', 'OWNED', 1),
(8, 1, 1, 8, '2023-05-25', 'OWNED', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_study_set`
--
ALTER TABLE `account_study_set`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`create_by`,`ss_id`),
  ADD KEY `ss_acc` (`ss_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_study_set`
--
ALTER TABLE `account_study_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_study_set`
--
ALTER TABLE `account_study_set`
  ADD CONSTRAINT `acc_ss` FOREIGN KEY (`create_by`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ss_acc` FOREIGN KEY (`ss_id`) REFERENCES `study_set` (`ssid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
