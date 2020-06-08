-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jun 08, 2020 at 08:06 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eofficesatuankapalselam`
--

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terima_dari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_surat` date NOT NULL,
  `perihal_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_penerima` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_persetujuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_disposisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `uuid`, `terima_dari`, `nomor_surat`, `tanggal_surat`, `perihal_surat`, `file`, `alamat_aksi`, `aksi`, `catatan`, `status`, `created_at`, `updated_at`, `user_penerima`, `user_persetujuan`, `user_disposisi`) VALUES
(1, '7bcf407a63c240d1bae2d5dcbdfa7bad', 'Siapa saja', 'No. 04/06/2020', '2020-06-04', 'Apa aja', 'assets/mail/1591256696_5ed8a678e35cc.pdf', '[\"pasops\",\"dan-kri-adl-404\"]', '[\"siapkan\",\"bahas-rapatkan\"]', '<p>Tes</p>', 'DISPOSITION', '2020-06-04 14:44:56', '2020-06-06 15:09:41', 'c408bea2c02746a6829d45ddcc54d161', 'fc75a58c88014309ad38584d2f289e3f', 'c408bea2c02746a6829d45ddcc54d161'),
(2, '04fb209b58214056bfb219d7b0b0e4c3', 'Siapa saja II', 'No. 08/06/2020', '2020-06-08', 'Apa aja II', 'assets/mail/1591600332_5edde4cc7e88e_6604962.pdf', '[\"pasops\",\"pasprogar\",\"dan-kri-agr-405\"]', '[\"udk\",\"monitoring\",\"acarakan-agendakan\",\"file-arsipkan\"]', '<p>Lanjutkan</p>', 'DISPOSITION', '2020-06-08 14:12:12', '2020-06-08 14:43:05', 'c408bea2c02746a6829d45ddcc54d161', 'c408bea2c02746a6829d45ddcc54d161', 'c408bea2c02746a6829d45ddcc54d161'),
(3, '30153f5dc280433db5bcfdaeff8a5e65', 'Siapa saja III', 'No. 08/06/2020 ABC', '2020-06-08', 'Apa aja III', 'assets/mail/1591602793_5eddee6914c8f_6604962.pdf', NULL, NULL, NULL, 'PENDING', '2020-06-08 14:53:13', '2020-06-08 14:53:13', 'c408bea2c02746a6829d45ddcc54d161', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_05_27_053308_add_roles_field_to_users_table', 1),
(4, '2020_05_27_054137_add_username_field_to_users_table', 2),
(5, '2014_10_12_100000_create_password_resets_table', 3),
(6, '2020_05_31_060816_add_pangkat_to_users_table', 3),
(7, '2020_06_01_080057_add_field_status_to_users_table', 4),
(8, '2020_06_02_081236_add_photo_field_to_users_table', 5),
(9, '2020_06_04_125500_create_mails_table', 6),
(10, '2020_06_04_131018_update_type_tanggal_surat_mails', 7),
(11, '2020_06_04_132530_add_user_to_mails_table', 8),
(12, '2020_06_06_201406_change_field_name_roles_users_table', 9),
(13, '2020_06_06_202314_add_uuid_field_to_users_table', 10),
(14, '2020_06_07_202704_add_uuid_field_to_mails_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'STAFF',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `username`, `rank`, `status`, `photo`) VALUES
(1, 'c408bea2c02746a6829d45ddcc54d161', 'Shindu Nata Gama', 'shindunatagama@gmail.com', '2020-05-27 12:43:04', '$2y$10$896/dhRAFHb9ovRpJIGGIeqM2G1fESXy1qYRDJtJgSPFIdzQcpU86', NULL, '2020-05-27 12:43:04', '2020-06-08 12:46:40', 'ADMIN', 'shindunatagama', 'Laksamana Jenderal', 'ACTIVE', 'assets/user/1591205978_5ed7e05aa4121.jpg'),
(16, 'fc75a58c88014309ad38584d2f289e3f', 'Muhammad Dhaffa Mahendra', 'shindunatagama@yahoo.co.id', '2020-06-04 01:32:03', '$2y$10$mKfNgwUnfBAQ/Q2DIAsWQenrsjhdZX9wtwgkxRAYkECrDvqd/gS4O', NULL, '2020-06-03 05:05:14', '2020-06-04 01:34:58', 'SEKRETARIS', 'dapulous', 'Laksamana Mayor', 'ACTIVE', 'assets/user/1591160714_5ed72f8a99311.jpg'),
(17, 'a20ad615e2354b3ca668e4e0c94ea280', 'Riska Sulistiyorini', 'riskarini@gmail.com', NULL, '$2y$10$qXSZPR40Dbes4EUi1sb7yOQdonMmjrgOSZjauSuz9Zpc2gAEMDBwm', NULL, '2020-06-06 22:56:26', '2020-06-08 00:18:46', 'SUPERVISOR', 'riskarini', 'Kapten', 'ACTIVE', 'assets/user/1591458986_5edbbcaab7323.jpg'),
(18, 'b7c899bcd04144678727e49465d52bce', 'Byantara Alvarendra', 'byantaraalvarendra@gmail.com', NULL, '$2y$10$MRWs7H5pen/fMaR6X9UIsetXWljBit9ozae7eDeiihASrohF53TWK', NULL, '2020-06-06 23:05:10', '2020-06-08 11:12:03', 'PIMPINAN', 'byantaraalvarendra', 'Jenderal', 'ACTIVE', 'assets/user/1591459510_5edbbeb6d0aa7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
