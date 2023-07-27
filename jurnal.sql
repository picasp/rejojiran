-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 11:25 AM
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
-- Database: `jurnal`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jurusan` int(100) DEFAULT NULL,
  `article_title` varchar(255) NOT NULL,
  `abstract` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `id_jurusan`, `article_title`, `abstract`, `file`, `id_user`, `created_at`, `updated_at`) VALUES
(48, 1, 'Analisis Teknik Entity-Relationship Diagram dalam Perancangan Database Sebuah Literature Review', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed risus augue, pellentesque vitae ligula quis, semper auctor mi. Curabitur ac lacus gravida, suscipit sem at, pharetra mi. Sed sagittis maximus malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam consequat diam vel leo elementum, eget gravida massa semper. Nam sodales magna tellus, id suscipit felis accumsan ut. Praesent luctus, eros ut tempus consectetur, felis odio scelerisque libero, eget scelerisque lacus orci ut risus. Fusce tristique magna vitae turpis tincidunt condimentum. Curabitur est ex, laoreet in rutrum a, vehicula sit amet mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent fermentum, massa quis mollis condimentum, turpis justo pulvinar ex, id blandit tellus ipsum sit amet mi. Suspendisse potenti.Phasellus sed euismod enim, a commodo ipsum. In pellentesque, tortor nec dignissim faucibus, diam ante elementum massa, molestie elementum felis leo ac dolor. Aliquam malesuada ligula nulla, et bibendum augue finibus ac. Proin molestie, mi eget elementum sagittis, nisi ex aliquam nisl, eu blandit velit ipsum ac turpis. Sed lobortis lacus pretium nunc faucibus, eget imperdiet diam interdum. Curabitur hendrerit ligula at sodales pretium. Duis blandit molestie ornare. Nulla facilisi. Etiam dapibus, nunc a tempor porttitor, purus magna vehicula lorem, et sodales mauris lacus id diam. Morbi commodo erat id nunc hendrerit, sed euismod erat gravida. Mauris blandit, enim vel posuere viverra, purus urna venenatis velit, finibus consequat dui ex eget diam. Sed vitae ipsum magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas vel urna sed lacus rhoncus tristique nec ut eros. Mauris ornare suscipit lectus, ut viverra felis interdum mattis. Nulla sit amet facilisis felis, eget aliquam lorem.</p>', '3K1Zl2eNr4P5Np8ApvLBjhx4kACp0ZGmGYXp7twO.pdf', 6, '2023-07-26 20:40:07', '2023-07-27 01:24:36'),
(49, 1, 'Aplikasi Metoda VDI 2222 Pada Proses Perancangan Welding Fixture Untuk Sambungan Cerobong Dengan Teknologi CAD/CAE', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed risus augue, pellentesque vitae ligula quis, semper auctor mi. Curabitur ac lacus gravida, suscipit sem at, pharetra mi. Sed sagittis maximus malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam consequat diam vel leo elementum, eget gravida massa semper. Nam sodales magna tellus, id suscipit felis accumsan ut. Praesent luctus, eros ut tempus consectetur, felis odio scelerisque libero, eget scelerisque lacus orci ut risus. Fusce tristique magna vitae turpis tincidunt condimentum. Curabitur est ex, laoreet in rutrum a, vehicula sit amet mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent fermentum, massa quis mollis condimentum, turpis justo pulvinar ex, id blandit tellus ipsum sit amet mi. Suspendisse potenti.Phasellus sed euismod enim, a commodo ipsum. In pellentesque, tortor nec dignissim faucibus, diam ante elementum massa, molestie elementum felis leo ac dolor. Aliquam malesuada ligula nulla, et bibendum augue finibus ac. Proin molestie, mi eget elementum sagittis, nisi ex aliquam nisl, eu blandit velit ipsum ac turpis. Sed lobortis lacus pretium nunc faucibus, eget imperdiet diam interdum. Curabitur hendrerit ligula at sodales pretium. Duis blandit molestie ornare. Nulla facilisi. Etiam dapibus, nunc a tempor porttitor, purus magna vehicula lorem, et sodales mauris lacus id diam. Morbi commodo erat id nunc hendrerit, sed euismod erat gravida. Mauris blandit, enim vel posuere viverra, purus urna venenatis velit, finibus consequat dui ex eget diam. Sed vitae ipsum magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas vel urna sed lacus rhoncus tristique nec ut eros. Mauris ornare suscipit lectus, ut viverra felis interdum mattis. Nulla sit amet facilisis felis, eget aliquam lorem.</p>', '9T7ENmUwNJUUXgXfPN1MzGaMqSOnKI9SrPIZxmZr.pdf', 6, '2023-07-26 20:40:30', '2023-07-27 01:20:15'),
(50, 1, 'Perancangan Alat Deteksi Kebocoran Gas Pada Perangkat Mobile Android Dengan Sensor Mq-2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed risus augue, pellentesque vitae ligula quis, semper auctor mi. Curabitur ac lacus gravida, suscipit sem at, pharetra mi. Sed sagittis maximus malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam consequat diam vel leo elementum, eget gravida massa semper. Nam sodales magna tellus, id suscipit felis accumsan ut. Praesent luctus, eros ut tempus consectetur, felis odio scelerisque libero, eget scelerisque lacus orci ut risus. Fusce tristique magna vitae turpis tincidunt condimentum. Curabitur est ex, laoreet in rutrum a, vehicula sit amet mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent fermentum, massa quis mollis condimentum, turpis justo pulvinar ex, id blandit tellus ipsum sit amet mi. Suspendisse potenti.Phasellus sed euismod enim, a commodo ipsum. In pellentesque, tortor nec dignissim faucibus, diam ante elementum massa, molestie elementum felis leo ac dolor. Aliquam malesuada ligula nulla, et bibendum augue finibus ac. Proin molestie, mi eget elementum sagittis, nisi ex aliquam nisl, eu blandit velit ipsum ac turpis. Sed lobortis lacus pretium nunc faucibus, eget imperdiet diam interdum. Curabitur hendrerit ligula at sodales pretium. Duis blandit molestie ornare. Nulla facilisi. Etiam dapibus, nunc a tempor porttitor, purus magna vehicula lorem, et sodales mauris lacus id diam. Morbi commodo erat id nunc hendrerit, sed euismod erat gravida. Mauris blandit, enim vel posuere viverra, purus urna venenatis velit, finibus consequat dui ex eget diam. Sed vitae ipsum magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas vel urna sed lacus rhoncus tristique nec ut eros. Mauris ornare suscipit lectus, ut viverra felis interdum mattis. Nulla sit amet facilisis felis, eget aliquam lorem.</p>', 'tTpHipVasBU1OOjRjfDuM3KdlqKur1ZNCUXWxFyY.pdf', 7, '2023-07-26 20:43:08', '2023-07-27 01:25:42'),
(51, 5, 'Analisis dan Perancangan Sistem Informasi untuk keunggulan bersaing perusahaan dan organisasi modern', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed risus augue, pellentesque vitae ligula quis, semper auctor mi. Curabitur ac lacus gravida, suscipit sem at, pharetra mi. Sed sagittis maximus malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam consequat diam vel leo elementum, eget gravida massa semper. Nam sodales magna tellus, id suscipit felis accumsan ut. Praesent luctus, eros ut tempus consectetur, felis odio scelerisque libero, eget scelerisque lacus orci ut risus. Fusce tristique magna vitae turpis tincidunt condimentum. Curabitur est ex, laoreet in rutrum a, vehicula sit amet mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent fermentum, massa quis mollis condimentum, turpis justo pulvinar ex, id blandit tellus ipsum sit amet mi. Suspendisse potenti.Phasellus sed euismod enim, a commodo ipsum. In pellentesque, tortor nec dignissim faucibus, diam ante elementum massa, molestie elementum felis leo ac dolor. Aliquam malesuada ligula nulla, et bibendum augue finibus ac. Proin molestie, mi eget elementum sagittis, nisi ex aliquam nisl, eu blandit velit ipsum ac turpis. Sed lobortis lacus pretium nunc faucibus, eget imperdiet diam interdum. Curabitur hendrerit ligula at sodales pretium. Duis blandit molestie ornare. Nulla facilisi. Etiam dapibus, nunc a tempor porttitor, purus magna vehicula lorem, et sodales mauris lacus id diam. Morbi commodo erat id nunc hendrerit, sed euismod erat gravida. Mauris blandit, enim vel posuere viverra, purus urna venenatis velit, finibus consequat dui ex eget diam. Sed vitae ipsum magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas vel urna sed lacus rhoncus tristique nec ut eros. Mauris ornare suscipit lectus, ut viverra felis interdum mattis. Nulla sit amet facilisis felis, eget aliquam lorem.</p>', 'QTjP4r9YNCfgxTFJSwO6ZSS53Ed3izzDOIt6UkIp.pdf', 6, '2023-07-26 21:41:34', '2023-07-27 01:25:10'),
(52, 1, 'Perancangan Aplikasi Pemilihan Kepala Desa Dengan Metode Ux Design Thinking (Studi Kasus: Kampung Kuripan)', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed risus augue, pellentesque vitae ligula quis, semper auctor mi. Curabitur ac lacus gravida, suscipit sem at, pharetra mi. Sed sagittis maximus malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam consequat diam vel leo elementum, eget gravida massa semper. Nam sodales magna tellus, id suscipit felis accumsan ut. Praesent luctus, eros ut tempus consectetur, felis odio scelerisque libero, eget scelerisque lacus orci ut risus. Fusce tristique magna vitae turpis tincidunt condimentum. Curabitur est ex, laoreet in rutrum a, vehicula sit amet mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent fermentum, massa quis mollis condimentum, turpis justo pulvinar ex, id blandit tellus ipsum sit amet mi. Suspendisse potenti.Phasellus sed euismod enim, a commodo ipsum. In pellentesque, tortor nec dignissim faucibus, diam ante elementum massa, molestie elementum felis leo ac dolor. Aliquam malesuada ligula nulla, et bibendum augue finibus ac. Proin molestie, mi eget elementum sagittis, nisi ex aliquam nisl, eu blandit velit ipsum ac turpis. Sed lobortis lacus pretium nunc faucibus, eget imperdiet diam interdum. Curabitur hendrerit ligula at sodales pretium. Duis blandit molestie ornare. Nulla facilisi. Etiam dapibus, nunc a tempor porttitor, purus magna vehicula lorem, et sodales mauris lacus id diam. Morbi commodo erat id nunc hendrerit, sed euismod erat gravida. Mauris blandit, enim vel posuere viverra, purus urna venenatis velit, finibus consequat dui ex eget diam. Sed vitae ipsum magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas vel urna sed lacus rhoncus tristique nec ut eros. Mauris ornare suscipit lectus, ut viverra felis interdum mattis. Nulla sit amet facilisis felis, eget aliquam lorem.</p>', 'SZtpWTYi0mpgHEPo1U1QAGVyF6tzi1m2k46vOuVX.pdf', 6, '2023-07-26 21:41:57', '2023-07-27 01:25:25'),
(53, 3, 'Prinsip pengendalian perancangan taman bermain anak di ruang publik', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed risus augue, pellentesque vitae ligula quis, semper auctor mi. Curabitur ac lacus gravida, suscipit sem at, pharetra mi. Sed sagittis maximus malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam consequat diam vel leo elementum, eget gravida massa semper. Nam sodales magna tellus, id suscipit felis accumsan ut. Praesent luctus, eros ut tempus consectetur, felis odio scelerisque libero, eget scelerisque lacus orci ut risus. Fusce tristique magna vitae turpis tincidunt condimentum. Curabitur est ex, laoreet in rutrum a, vehicula sit amet mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent fermentum, massa quis mollis condimentum, turpis justo pulvinar ex, id blandit tellus ipsum sit amet mi. Suspendisse potenti.Phasellus sed euismod enim, a commodo ipsum. In pellentesque, tortor nec dignissim faucibus, diam ante elementum massa, molestie elementum felis leo ac dolor. Aliquam malesuada ligula nulla, et bibendum augue finibus ac. Proin molestie, mi eget elementum sagittis, nisi ex aliquam nisl, eu blandit velit ipsum ac turpis. Sed lobortis lacus pretium nunc faucibus, eget imperdiet diam interdum. Curabitur hendrerit ligula at sodales pretium. Duis blandit molestie ornare. Nulla facilisi. Etiam dapibus, nunc a tempor porttitor, purus magna vehicula lorem, et sodales mauris lacus id diam. Morbi commodo erat id nunc hendrerit, sed euismod erat gravida. Mauris blandit, enim vel posuere viverra, purus urna venenatis velit, finibus consequat dui ex eget diam. Sed vitae ipsum magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas vel urna sed lacus rhoncus tristique nec ut eros. Mauris ornare suscipit lectus, ut viverra felis interdum mattis. Nulla sit amet facilisis felis, eget aliquam lorem.</p>', 'qQ8hvu0DximrgcWvyBeyerMiigg0xglS9GtoBxMd.pdf', 6, '2023-07-27 00:37:51', '2023-07-27 01:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `article_id`, `first_name`, `middle_name`, `last_name`) VALUES
(44, 48, 'bot', 'bot', 'bot'),
(45, 49, 'lorem', 'ipsum', 'dolor'),
(46, 50, 'Abdul', 'Rozak', 'Mubarok'),
(47, 51, 'lorem', 'ipsum', 'dolor'),
(48, 52, 'lorem', 'ipsum', 'dolor'),
(49, 53, 'Budi', 'Andi', 'Go');

-- --------------------------------------------------------

--
-- Table structure for table `bidangs`
--

CREATE TABLE `bidangs` (
  `id_bidang` int(100) NOT NULL,
  `nama_bidang` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bidangs`
--

INSERT INTO `bidangs` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Hukum'),
(2, 'Seni'),
(3, 'Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id_bidang` int(100) NOT NULL,
  `id_jurusan` int(100) NOT NULL,
  `nama_jurusan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id_bidang`, `id_jurusan`, `nama_jurusan`) VALUES
(1, 1, 'Politik'),
(1, 2, 'Teknik Komputer'),
(1, 3, 'Farmasi'),
(2, 4, 'Bahasa'),
(3, 5, 'Teknik Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2023_05_23_082414_create_articles_table', 1),
(12, '2023_05_23_090458_create_authors_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(6, 'admin', 'admin@admin.com', NULL, '$2y$10$kh5nIncTWAbLxYqOu00DGuJy5UjagWhMTwMPiEGdTsdLw.otea2wS', NULL, 1, '2023-07-26 02:06:24', '2023-07-26 02:06:24'),
(7, 'rozak', 'rozak@gmail.com', NULL, '$2y$10$O7gdc.gbsnRMc2LMVj3Vg.kPq8KUTCp6ppzA0pVVnLxEgkYDWNemy', NULL, 2, '2023-07-26 02:18:52', '2023-07-26 02:18:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `uploaded_by` (`id_user`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authors_article_id_foreign` (`article_id`);

--
-- Indexes for table `bidangs`
--
ALTER TABLE `bidangs`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `bidangs`
--
ALTER TABLE `bidangs`
  MODIFY `id_bidang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id_jurusan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusans` (`id_jurusan`) ON DELETE SET NULL,
  ADD CONSTRAINT `articles_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `authors`
--
ALTER TABLE `authors`
  ADD CONSTRAINT `authors_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD CONSTRAINT `jurusans_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `bidangs` (`id_bidang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
