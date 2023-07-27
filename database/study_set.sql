CREATE TABLE `study_set` (
  `ssid` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `cdate` timestamp NULL DEFAULT NULL,
  `udate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(32) DEFAULT NULL,
  `visible_to` int(1) NOT NULL,
  `visible_pass` varchar(32) DEFAULT NULL,
  `editable_by` tinyint(1) NOT NULL,
  `editable_pass` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `study_set`
--

INSERT INTO `study_set` (`ssid`, `title`, `description`, `cdate`, `udate`, `status`, `visible_to`, `visible_pass`, `editable_by`, `editable_pass`) VALUES
(1, 'Academic English: Writing', NULL, NULL, '2023-02-28 16:24:30', 'ACTIVE', 0, NULL, 1, NULL),
(2, 'IMP301', NULL, NULL, '2023-03-25 14:33:02', 'ACTIVE', 1, NULL, 1, NULL),
(3, 'PRM392 - Tổng hợp', NULL, NULL, '2023-03-30 02:14:46', 'ACTIVE', 0, NULL, 1, NULL),
(4, 'SWD392', NULL, '2023-03-31 01:58:10', '2023-03-31 03:33:15', 'ACTIVE', 0, NULL, 1, NULL),
(5, 'ML', 'This set of Artificial Intelligence Multiple Choice Questions (https://www.sanfoundry.com/artificial-intelligence-mcqs-machine-learning/)', '2023-04-01 03:02:41', '2023-04-01 05:27:37', 'ACTIVE', 0, NULL, 1, NULL),
(6, 'ENW492c (Writing Research Papers)', NULL, '2023-04-19 03:05:56', '2023-05-03 02:43:18', 'DELETED', 0, NULL, 1, NULL),
(7, 'MLN111 - Test 1', NULL, '2023-05-25 04:46:32', '2023-05-25 04:46:42', 'INPROGRESS', 0, NULL, 1, NULL),
(8, 'PMG202c', NULL, '2023-05-25 16:09:14', '2023-05-25 16:41:04', 'ACTIVE', 0, NULL, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `study_set`
--
ALTER TABLE `study_set`
  ADD PRIMARY KEY (`ssid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `study_set`
--
ALTER TABLE `study_set`
  MODIFY `ssid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
