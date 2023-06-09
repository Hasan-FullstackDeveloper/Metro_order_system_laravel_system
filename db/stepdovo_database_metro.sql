-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2023 at 05:49 AM
-- Server version: 10.5.20-MariaDB-cll-lve-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stepdovo_database_metro`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cities`
--

CREATE TABLE `tbl_cities` (
  `id` int(11) NOT NULL,
  `city` varchar(300) DEFAULT NULL,
  `country` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_cities`
--

INSERT INTO `tbl_cities` (`id`, `city`, `country`) VALUES
(1, 'Karachi', 'Pakistan'),
(2, 'Lahore', 'Pakistan'),
(3, 'Faisalabad', 'Pakistan'),
(4, 'Rawalpindi', 'Pakistan'),
(5, 'Gujranwala', 'Pakistan'),
(6, 'Peshawar', 'Pakistan'),
(7, 'Multan', 'Pakistan'),
(8, 'Saidu Sharif', 'Pakistan'),
(9, 'Hyderabad City', 'Pakistan'),
(10, 'Islamabad', 'Pakistan'),
(11, 'Quetta', 'Pakistan'),
(12, 'Bahawalpur', 'Pakistan'),
(13, 'Sargodha', 'Pakistan'),
(14, 'Sialkot City', 'Pakistan'),
(15, 'Sukkur', 'Pakistan'),
(16, 'Larkana', 'Pakistan'),
(17, 'Chiniot', 'Pakistan'),
(18, 'Shekhupura', 'Pakistan'),
(19, 'Jhang City', 'Pakistan'),
(20, 'Dera Ghazi Khan', 'Pakistan'),
(21, 'Gujrat', 'Pakistan'),
(22, 'Rahimyar Khan', 'Pakistan'),
(23, 'Kasur', 'Pakistan'),
(24, 'Mardan', 'Pakistan'),
(25, 'Mingaora', 'Pakistan'),
(26, 'Nawabshah', 'Pakistan'),
(27, 'Sahiwal', 'Pakistan'),
(28, 'Mirpur Khas', 'Pakistan'),
(29, 'Okara', 'Pakistan'),
(30, 'Mandi Burewala', 'Pakistan'),
(31, 'Jacobabad', 'Pakistan'),
(32, 'Saddiqabad', 'Pakistan'),
(33, 'Kohat', 'Pakistan'),
(34, 'Muridke', 'Pakistan'),
(35, 'Muzaffargarh', 'Pakistan'),
(36, 'Khanpur', 'Pakistan'),
(37, 'Gojra', 'Pakistan'),
(38, 'Mandi Bahauddin', 'Pakistan'),
(39, 'Abbottabad', 'Pakistan'),
(40, 'Turbat', 'Pakistan'),
(41, 'Dadu', 'Pakistan'),
(42, 'Bahawalnagar', 'Pakistan'),
(43, 'Khuzdar', 'Pakistan'),
(44, 'Pakpattan', 'Pakistan'),
(45, 'Tando Allahyar', 'Pakistan'),
(46, 'Ahmadpur East', 'Pakistan'),
(47, 'Vihari', 'Pakistan'),
(48, 'Jaranwala', 'Pakistan'),
(49, 'New Mirpur', 'Pakistan'),
(50, 'Kamalia', 'Pakistan'),
(51, 'Kot Addu', 'Pakistan'),
(52, 'Nowshera', 'Pakistan'),
(53, 'Swabi', 'Pakistan'),
(54, 'Khushab', 'Pakistan'),
(55, 'Dera Ismail Khan', 'Pakistan'),
(56, 'Chaman', 'Pakistan'),
(57, 'Charsadda', 'Pakistan'),
(58, 'Kandhkot', 'Pakistan'),
(59, 'Chishtian', 'Pakistan'),
(60, 'Hasilpur', 'Pakistan'),
(61, 'Attock Khurd', 'Pakistan'),
(62, 'Muzaffarabad', 'Pakistan'),
(63, 'Mianwali', 'Pakistan'),
(64, 'Jalalpur Jattan', 'Pakistan'),
(65, 'Bhakkar', 'Pakistan'),
(66, 'Zhob', 'Pakistan'),
(67, 'Dipalpur', 'Pakistan'),
(68, 'Kharian', 'Pakistan'),
(69, 'Mian Channun', 'Pakistan'),
(70, 'Bhalwal', 'Pakistan'),
(71, 'Jamshoro', 'Pakistan'),
(72, 'Pattoki', 'Pakistan'),
(73, 'Harunabad', 'Pakistan'),
(74, 'Kahror Pakka', 'Pakistan'),
(75, 'Toba Tek Singh', 'Pakistan'),
(76, 'Samundri', 'Pakistan'),
(77, 'Shakargarh', 'Pakistan'),
(78, 'Sambrial', 'Pakistan'),
(79, 'Shujaabad', 'Pakistan'),
(80, 'Hujra Shah Muqim', 'Pakistan'),
(81, 'Kabirwala', 'Pakistan'),
(82, 'Mansehra', 'Pakistan'),
(83, 'Lala Musa', 'Pakistan'),
(84, 'Chunian', 'Pakistan'),
(85, 'Nankana Sahib', 'Pakistan'),
(86, 'Bannu', 'Pakistan'),
(87, 'Pasrur', 'Pakistan'),
(88, 'Timargara', 'Pakistan'),
(89, 'Parachinar', 'Pakistan'),
(90, 'Chenab Nagar', 'Pakistan'),
(91, 'Gwadar', 'Pakistan'),
(92, 'Abdul Hakim', 'Pakistan'),
(93, 'Hassan Abdal', 'Pakistan'),
(94, 'Tank', 'Pakistan'),
(95, 'Hangu', 'Pakistan'),
(96, 'Risalpur Cantonment', 'Pakistan'),
(97, 'Karak', 'Pakistan'),
(98, 'Kundian', 'Pakistan'),
(99, 'Umarkot', 'Pakistan'),
(100, 'Chitral', 'Pakistan'),
(101, 'Dainyor', 'Pakistan'),
(102, 'Kulachi', 'Pakistan'),
(103, 'Kalat', 'Pakistan'),
(104, 'Kotli', 'Pakistan'),
(105, 'Gilgit', 'Pakistan'),
(106, 'Narowal', 'Pakistan'),
(107, 'Khairpur Mir’s', 'Pakistan'),
(108, 'Khanewal', 'Pakistan'),
(109, 'Jhelum', 'Pakistan'),
(110, 'Haripur', 'Pakistan'),
(111, 'Shikarpur', 'Pakistan'),
(112, 'Rawala Kot', 'Pakistan'),
(113, 'Hafizabad', 'Pakistan'),
(114, 'Lodhran', 'Pakistan'),
(115, 'Malakand', 'Pakistan'),
(116, 'Attock City', 'Pakistan'),
(117, 'Batgram', 'Pakistan'),
(118, 'Matiari', 'Pakistan'),
(119, 'Ghotki', 'Pakistan'),
(120, 'Naushahro Firoz', 'Pakistan'),
(121, 'Alpurai', 'Pakistan'),
(122, 'Bagh', 'Pakistan'),
(123, 'Daggar', 'Pakistan'),
(124, 'Leiah', 'Pakistan'),
(125, 'Tando Muhammad Khan', 'Pakistan'),
(126, 'Chakwal', 'Pakistan'),
(127, 'Badin', 'Pakistan'),
(128, 'Lakki', 'Pakistan'),
(129, 'Rajanpur', 'Pakistan'),
(130, 'Dera Allahyar', 'Pakistan'),
(131, 'Shahdad Kot', 'Pakistan'),
(132, 'Pishin', 'Pakistan'),
(133, 'Sanghar', 'Pakistan'),
(134, 'Upper Dir', 'Pakistan'),
(135, 'Thatta', 'Pakistan'),
(136, 'Dera Murad Jamali', 'Pakistan'),
(137, 'Kohlu', 'Pakistan'),
(138, 'Mastung', 'Pakistan'),
(139, 'Dasu', 'Pakistan'),
(140, 'Athmuqam', 'Pakistan'),
(141, 'Loralai', 'Pakistan'),
(142, 'Barkhan', 'Pakistan'),
(143, 'Musa Khel Bazar', 'Pakistan'),
(144, 'Ziarat', 'Pakistan'),
(145, 'Gandava', 'Pakistan'),
(146, 'Sibi', 'Pakistan'),
(147, 'Dera Bugti', 'Pakistan'),
(148, 'Eidgah', 'Pakistan'),
(149, 'Uthal', 'Pakistan'),
(150, 'Khuzdar', 'Pakistan'),
(151, 'Chilas', 'Pakistan'),
(152, 'Panjgur', 'Pakistan'),
(153, 'Gakuch', 'Pakistan'),
(154, 'Qila Saifullah', 'Pakistan'),
(155, 'Kharan', 'Pakistan'),
(156, 'Aliabad', 'Pakistan'),
(157, 'Awaran', 'Pakistan'),
(158, 'Dalbandin', 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nimco_rs_5`
--

CREATE TABLE `tbl_nimco_rs_5` (
  `id` int(10) UNSIGNED NOT NULL,
  `mix` int(11) DEFAULT NULL,
  `daal_moth` int(11) DEFAULT NULL,
  `daal_chana` int(11) DEFAULT NULL,
  `specal_mix` int(11) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_role` varchar(30) NOT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `user_role`, `reg_date`) VALUES
(1, 'admin', '2022-08-30 17:36:34'),
(2, 'order_manager', '2022-08-30 17:14:57'),
(3, 'Product_manager', '2022-08-30 17:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`id`, `owner_name`, `name`, `city`, `reg_date`) VALUES
(15, 'dfd', 'ali', 'Sargodha', '2022-09-02 19:59:16'),
(7, 'ali', 'ali tuc shop', 'lahore', '2022-09-02 18:41:40'),
(9, 'cdfdgfg', 'fdgf', 'Chiniot', '2022-09-02 18:55:44'),
(14, 'vcxb', 'vbgxv', 'Sukkur', '2022-09-02 19:51:38'),
(16, 'vbdfnggfds', 'aliddd', 'Khanpur', '2022-09-02 21:04:14'),
(17, 'bdb', 'aw', 'Larkana', '2022-09-02 21:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `user_id`, `role_id`, `reg_date`) VALUES
(1, 1, 1, '2022-08-30 17:25:54'),
(2, 2, 2, '2022-08-30 17:26:01'),
(3, 3, 3, '2022-08-30 17:26:09'),
(4, 1, 2, '2022-08-30 17:52:33'),
(5, 1, 3, '2022-08-30 17:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'anas', 'anas@gmail.com', NULL, '$2y$10$mi7J.gONObA61uGTv1q4ZOTVcLzHswZXDdGqHi4MHxsQtpl4cmI9i', NULL, '2022-08-26 14:06:57', '2022-08-26 14:06:57'),
(2, 'ali', 'ali@gmail.com', NULL, '$2y$10$xAKe780mIqDJMxKdZuXB4OHrDQRuMYkIvIykXW1IYNvUye91IMvFK', NULL, '2022-08-29 11:38:10', '2022-08-29 11:38:10'),
(3, 'ahmad', 'ahmad@gmail.com', NULL, '$2y$10$t2uecgQYBBQboN2YvNvziOE9mIq1l16K.W2.p7cALn6d00entECKa', NULL, '2022-08-29 11:38:49', '2022-08-29 11:38:49'),
(5, 'asad', 'asad@gmail.com', NULL, '$2y$10$HgTr6OFS9aHJNeyeGz.f1ejARAeuDQYTy2hJbmjnAy3sdjV7yPm4S', NULL, '2022-08-30 13:16:38', '2022-08-30 13:16:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nimco_rs_5`
--
ALTER TABLE `tbl_nimco_rs_5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `tbl_nimco_rs_5`
--
ALTER TABLE `tbl_nimco_rs_5`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
