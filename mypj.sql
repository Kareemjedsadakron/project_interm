-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 08:47 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `user` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `stasut_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `name_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `position` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `license_plate` varchar(10) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `user`, `password`, `stasut_user`, `name_user`, `Fullname`, `position`, `department`, `license_plate`, `sex`, `email`) VALUES
(1, 'watchara', '12345', 'app', 'lui', 'watchara chonthapha', 'programmer', 'application', '', 'male', 'jedsadakron.reong@vru.ac.th'),
(2, 'sales-barcode1', 'gggg1009', 'sales', 'Goy', 'Pornraphat Martvised', 'sales', 'office', '7กฒ6895', 'female', NULL),
(3, 'kae', '4321', 'sales', 'Kae', 'Jantima Channara', 'manager', 'office', '', 'female', NULL),
(4, 'sales-barcode2', 'somao0806', 'sales', 'Somo', 'Patthamanan Phookronghin', 'sales', 'paper-cup', '2กถ 6907', 'female', NULL),
(5, 'application', 'appen', 'app', 'Wee', 'Nawee Sangkhaw', 'application-manager', 'application', '4กศ 8027', 'male', NULL),
(7, 'admin', '1234', 'admin', 'Moddang', 'Anutita Nantha-klub', 'admin', 'office', '', 'female', NULL),
(9, 'lui1', '1234', 'admin', 'wat', 'watchara chonthapha', 'programmer', 'application', '', 'male', 'kareem4895@gmail.com'),
(10, 'nid', '1819', 'account', 'Nid', 'Rujira Wintachai', 'account', 'office', '', 'female', NULL),
(11, 'lot', '1234', 'app', 'Lot', 'Nichanan Aueanchirapornchai', 'programmer', 'application', '', 'female', 'kareem15268@gmail.com'),
(12, 'tum', '1234', 'app', 'tum', 'Pongpak Yingyaem', 'technician', 'application', '', 'male', 'kareem15268@gmail.com'),
(13, 'jpond', '1234', 'app', 'Pond', 'Aviruth Grompraputh', 'co-programmer', 'application', 'กท 4475', 'male', NULL),
(15, 'tik', '6537', 'paper', 'Chu', 'Chutima Chongsakul', 'admin', 'paper-cup', '', 'female', NULL),
(16, 'tua', '1234', 'app', 'Tua', 'Phubet Mabklang', 'programmer', 'application', '', 'female', 'kareem_2541@hotmail.com'),
(17, 'noi', '1234', 'maid', 'Noi', 'Supattra Phongsak', 'maid', 'office', '', 'female', NULL),
(18, 'richard', '1234', 'paper', 'Richard', 'Ong How Leong', 'paper-manager', 'paper-cup', '', 'male', NULL),
(19, 'tump', '1234', 'paper', 'Tump', 'Komsak Aonmee', 'driver', 'paper-cup', '', 'male', NULL),
(22, 'Phuriwat ', '24122539', 'app', 'Tar', 'Phuriwat Wanna', 'technician', 'application', '', 'male', 'jedsadakron.reong@vru.ac.th'),
(21, 'hot', '1234', 'paper', 'Hot', 'Aphisak Boonthongtho', 'driver', 'paper-cup', '', 'male', NULL),
(23, 'chayanan', 'jipjip1936', 'sales', 'Jip ', 'Chayanan Mungpong', 'sales', 'paper-cup', '7กต 8794', 'female', NULL),
(24, 'Hormchui', 'ChUi7777', 'sales', 'Chui', 'Sarunyu  detworrawit', 'sales', 'office', '', 'male', NULL),
(25, 'bee', '1234', 'app', 'bee', 'Chonlatee Muenjan', 'technician', 'application', '', 'male', 'kareem4895@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_11_094731_create_order_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(200) UNSIGNED NOT NULL COMMENT 'ลำดับ',
  `new_order` date NOT NULL COMMENT 'วันที่สั่งงาน',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery` date NOT NULL COMMENT 'วันที่ส่งของ',
  `company` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'บริษัทลูกค้า',
  `cell` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อเซลล์',
  `company_sticker` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ติดสติกเกอร์บริษัท',
  `warranty_sticker` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ติดสติกเกอร์รับประกัน',
  `list_product` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'รายการสินค้า',
  `number` int(200) DEFAULT NULL COMMENT 'จำนวน',
  `annotation` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `worker` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ผู้รับงาน	',
  `check_job` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ผู้ตรวจงาน',
  `status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'สถานะ',
  `order_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'เลขใบสั่งงาน',
  `assign` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ผู้สั่งงาน',
  `delete` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ลบ',
  `user_delete` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ลบโดย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(200) NOT NULL,
  `product_name` varchar(200) NOT NULL COMMENT 'รายการสินค้า',
  `Qty` varchar(200) NOT NULL COMMENT 'จำนวน',
  `remark` varchar(255) NOT NULL COMMENT 'หมายเหตุ',
  `order_id` int(200) NOT NULL,
  `order_number` varchar(200) NOT NULL COMMENT 'เลขใบสั่งงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL COMMENT 'ลำดับ',
  `request` date DEFAULT NULL COMMENT 'วันที่รับคำร้อง',
  `completion` datetime DEFAULT NULL COMMENT 'วันที่เสร็จ',
  `company` varchar(200) DEFAULT NULL COMMENT 'บริษัทลูกค้า',
  `name_customer` varchar(200) DEFAULT NULL COMMENT 'ชื่อลูกค้า	',
  `telephone` varchar(200) DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `responsible` varchar(200) DEFAULT NULL COMMENT 'ผู้รับผิดชอบ',
  `email` varchar(200) DEFAULT NULL COMMENT 'อีเมลล์',
  `other` varchar(200) DEFAULT NULL COMMENT 'อื่นๆ',
  `complaint` varchar(200) DEFAULT NULL COMMENT 'คำร้องเรียน',
  `support_image` varchar(200) DEFAULT NULL COMMENT 'เพิ่มรูป',
  `support_number` varchar(20) DEFAULT NULL COMMENT 'เลขซัพพอต',
  `receive_complaints` varchar(200) DEFAULT NULL COMMENT 'รับคำร้องเรียน',
  `delete` varchar(200) DEFAULT NULL COMMENT 'ลบ',
  `user_delete` varchar(200) DEFAULT NULL COMMENT 'ลบโดย',
  `image_update1` varchar(200) DEFAULT NULL COMMENT 'รูปภาพอัปเดรต',
  `image_update2` varchar(50) DEFAULT NULL,
  `image_update3` varchar(50) DEFAULT NULL,
  `image_update4` varchar(50) DEFAULT NULL,
  `image_update5` varchar(50) DEFAULT NULL,
  `image_update6` varchar(50) DEFAULT NULL,
  `worker_support` varchar(200) DEFAULT NULL COMMENT 'รับงานลูกค้า',
  `img1` varchar(50) DEFAULT NULL,
  `img2` varchar(50) DEFAULT NULL,
  `img3` varchar(50) DEFAULT NULL,
  `img4` varchar(50) DEFAULT NULL,
  `img5` varchar(50) DEFAULT NULL,
  `img6` varchar(50) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `support_image`
--

CREATE TABLE `support_image` (
  `id` int(20) NOT NULL,
  `img` varchar(20) NOT NULL,
  `support_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `support_imageupdate`
--

CREATE TABLE `support_imageupdate` (
  `id` int(20) NOT NULL,
  `image` varchar(20) NOT NULL,
  `support_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `Name`, `Department`, `status`) VALUES
(1, 'navee', '12345678', 'นาวี', 'Application', 'Admin'),
(12, 'ta', '12345678', 'ต้า', 'Application', 'User'),
(11, 'leu', '12345678', 'ลิว', 'Application', 'User'),
(13, 'reem', '12345678', 'รีม', 'Application', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '12', NULL, NULL, NULL, NULL, '2020-02-25 20:14:32', '2020-02-25 20:14:32'),
(2, '11', NULL, NULL, NULL, NULL, '2020-02-25 20:15:15', '2020-02-25 20:15:15'),
(3, '7index', NULL, NULL, NULL, NULL, '2020-02-25 21:40:02', '2020-02-25 21:40:02'),
(4, '7', NULL, NULL, NULL, NULL, '2020-02-26 06:42:29', '2020-02-26 06:42:29'),
(5, '1', NULL, NULL, NULL, NULL, '2020-03-02 21:30:30', '2020-03-02 21:30:30'),
(6, '5', NULL, NULL, NULL, NULL, '2020-03-05 20:29:23', '2020-03-05 20:29:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_image`
--
ALTER TABLE `support_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(200) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ';

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ';

--
-- AUTO_INCREMENT for table `support_image`
--
ALTER TABLE `support_image`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
