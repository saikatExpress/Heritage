-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2024 at 04:42 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heritage`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `bidder_id` bigint UNSIGNED NOT NULL,
  `bid_amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `property_id`, `bidder_id`, `bid_amount`, `created_at`, `updated_at`) VALUES
(3, 3, 6, 10000.00, '2024-08-13 09:41:57', '2024-08-13 09:41:57'),
(4, 3, 7, 80000.00, '2024-08-13 09:45:06', '2024-08-13 09:45:06'),
(5, 3, 7, 90000.00, '2024-08-13 09:45:21', '2024-08-13 09:45:21'),
(6, 4, 7, 66666.00, '2024-08-13 09:53:06', '2024-08-13 09:53:06'),
(7, 4, 7, 777777.00, '2024-08-13 09:53:14', '2024-08-13 09:53:14'),
(8, 4, 7, 800000.00, '2024-08-13 09:59:33', '2024-08-13 09:59:33'),
(9, 5, 7, 90000.00, '2024-08-13 10:01:16', '2024-08-13 10:01:16'),
(10, 9, 7, 80000.00, '2024-08-13 10:01:39', '2024-08-13 10:01:39'),
(11, 7, 7, 3000.00, '2024-08-13 10:39:40', '2024-08-13 10:39:40'),
(12, 8, 7, 10000.00, '2024-08-13 10:41:36', '2024-08-13 10:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_12_145818_create_properties_table', 1),
(6, '2024_08_12_145854_create_bids_table', 1),
(7, '2024_08_12_145932_create_testimonials_table', 1),
(8, '2024_08_12_150000_create_teams_table', 1),
(9, '2024_08_12_150141_create_search_filters_table', 1),
(10, '2024_08_12_161234_add_indexes_to_properties_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `bedrooms` int NOT NULL,
  `bathrooms` int NOT NULL,
  `size` int NOT NULL,
  `owner_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `description`, `location`, `price`, `bedrooms`, `bathrooms`, `size`, `owner_id`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Maya House', 'Awesome House', 'Malibagh,Dhaka', 100000.00, 4, 2, 1198, 3, 'property_images/INGt7fnxtaVWVYqsL6s9Rh016UYLL26bdCkqis6t.jpg', '2024-08-13 09:10:23', '2024-08-13 09:10:23'),
(4, 'Aston Villa', 'This is very nice...', 'Rampura,Dhaka', 120000.00, 3, 2, 1000, 3, 'property_images/SzoScwnDItPvo14XEiGJdsaV4SFgZ9CVgJd556N6.jpg', '2024-08-13 09:11:55', '2024-08-13 09:11:55'),
(5, 'Dream House', 'This is most nice house in the city', 'Uttara 10, Dhaka', 140000.00, 4, 4, 1200, 3, 'property_images/ioNeSX2yX5KIFBSbDDMCvqnJ1JZfoXpfiRflXgqz.jpg', '2024-08-13 09:12:56', '2024-08-13 09:12:56'),
(6, 'Luis Fonsa', 'A beautiful luxury villa with sea views.', 'Gulshan,Dhaka', 170000.00, 5, 5, 1300, 2, 'property_images/XSD1eLlVSeCN8rbJFvgysSfgJh6Zs5MWNdnoBO5z.jpg', '2024-08-13 09:15:21', '2024-08-13 09:15:21'),
(7, 'Saikat House', 'A modern apartment in the heart of the city.', 'Badda,Dhaka', 100000.00, 3, 3, 1000, 2, 'property_images/aVDEFTrqLULpDdlafeRHttUPVMXr9qROurpyh8Kj.webp', '2024-08-13 09:16:42', '2024-08-13 09:16:42'),
(8, 'Sharif Control House', 'Revenge House', 'Baridhara,Dhaka', 90000.00, 3, 3, 1000, 5, 'property_images/pVZPDPx8Fxw6VVbdg5Em0uPWSsXlC8JDl40VPRU2.jpg', '2024-08-13 09:19:00', '2024-08-13 09:19:00'),
(9, 'King Da House', 'Relaxing Property', 'Rangpur', 110000.00, 4, 3, 1100, 5, 'property_images/ADbovu0FBqSi6ptunVBGA1cvvOcFftNHxJhnVilB.webp', '2024-08-13 09:20:03', '2024-08-13 09:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `search_filters`
--

CREATE TABLE `search_filters` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `filter_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filter_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `role`, `contact_details`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Alice Johnson', 'Real Estate Agent', 'alice@example.com', 'alice.jpg', '2024-08-13 09:08:40', '2024-08-13 09:08:40'),
(2, 'Bob Williams', 'Property Manager', 'bob@example.com', 'bob.jpg', '2024-08-13 09:08:40', '2024-08-13 09:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `rating` tinyint NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','bidder','property_owner') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$0AtoeBesdDvp8RrLR3RIBuagCz1hvrzR1utd0k6SxEJyhE1WhSu/y', 'admin', NULL, '2024-08-13 09:08:37', '2024-08-13 09:08:37'),
(2, 'Saikat Taluker', 'saikat@gmail.com', NULL, '$2y$12$XeHWHpWVqQJ1P3OxCgBCC.OIGBVC3/x8n1RlizRyXvkFJbpxJsJiu', 'property_owner', NULL, '2024-08-13 09:08:38', '2024-08-13 09:08:38'),
(3, 'Rahim Taluker', 'rahim@gmail.com', NULL, '$2y$12$fzBUwMpn359mfpec0fOSDOiZseJk1gPg97vFjpcOuhOK6KAq4u1xq', 'property_owner', NULL, '2024-08-13 09:08:38', '2024-08-13 09:08:38'),
(4, 'Saibal Khan', 'saibal@gmail.com', NULL, '$2y$12$f5WgydNzZ0X3VLv72o55WeEsw.ps3Z46xCiKDa3j3qMJ/WaVsKmim', 'bidder', NULL, '2024-08-13 09:08:39', '2024-08-13 09:08:39'),
(5, 'Sharif Khan', 'sharif@gmail.com', NULL, '$2y$12$cXGbsNtEzncKF/zXplCcuu.7FaijfrVtCHx9btQh8LW5n.Duce33.', 'property_owner', NULL, '2024-08-13 09:08:39', '2024-08-13 09:08:39'),
(6, 'Kayes Khan', 'kayes@gmail.com', NULL, '$2y$12$yYP7G6W2mAwSeZsEVhAlf.82v.QJPFcgarijcwtEKI7gxSzxF0l06', 'bidder', NULL, '2024-08-13 09:08:39', '2024-08-13 09:08:39'),
(7, 'Akash Khan', 'akash@gmail.com', NULL, '$2y$12$0jQU2LYu9MzR3lWKcGtK3.vncvOSOWcqKnVwnnkDo8lk/Et48Pr0S', 'bidder', NULL, '2024-08-13 09:08:40', '2024-08-13 09:08:40'),
(8, 'Maruf Khan', 'maruf@gmail.com', NULL, '$2y$12$YiKmUquSf.zOQOt0WPPlueBvCweEzUTcfQdJWB0eiuUCTN/QfI2ZK', 'bidder', NULL, '2024-08-13 09:08:40', '2024-08-13 09:08:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bids_property_id_foreign` (`property_id`),
  ADD KEY `bids_bidder_id_foreign` (`bidder_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_owner_id_foreign` (`owner_id`),
  ADD KEY `properties_title_index` (`title`),
  ADD KEY `properties_bedrooms_index` (`bedrooms`);
ALTER TABLE `properties` ADD FULLTEXT KEY `properties_description_fulltext` (`description`);

--
-- Indexes for table `search_filters`
--
ALTER TABLE `search_filters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `search_filters_property_id_foreign` (`property_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_property_id_foreign` (`property_id`),
  ADD KEY `testimonials_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `search_filters`
--
ALTER TABLE `search_filters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_bidder_id_foreign` FOREIGN KEY (`bidder_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bids_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `search_filters`
--
ALTER TABLE `search_filters`
  ADD CONSTRAINT `search_filters_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `testimonials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
