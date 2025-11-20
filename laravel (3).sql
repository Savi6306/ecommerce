-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2025 at 10:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `name`, `phone`, `pincode`, `state`, `city`, `address_line1`, `address_line2`, `is_default`, `created_at`, `updated_at`, `customer_id`) VALUES
(4, 3, 'Savita', '06325415263', '202589', 'Uttar Pradesh', 'gaurakhpur', 'Gaurakhpur', 'city center', 0, '2025-11-05 05:42:54', '2025-11-05 05:42:54', NULL),
(5, 2, 'Sandhya', '6394672103', '203156', 'UP', 'Kanpur', 'Kidwai nagar', 'Saket nagar', 0, '2025-11-05 05:43:59', '2025-11-05 05:43:59', NULL),
(8, 4, 'Purnima', '09898989898', '203156', 'UP', 'Kanpur', 'Govind nagar', 'Saket nagar', 0, '2025-11-07 01:25:10', '2025-11-07 01:25:10', NULL),
(10, 5, 'Mahi', '09878978798', '203156', 'UP', 'Kanpur', 'Barra', 'Saket nagar', 0, '2025-11-07 01:50:50', '2025-11-07 01:50:50', NULL),
(11, 10, 'savita yadav', '06306417890', '272270', 'Uttar Pradesh', 'Sant Kabir Nagar', 'BELHAR KALAN SANT KABIR NAGAR', 'kali', 0, '2025-11-13 07:35:22', '2025-11-13 07:35:22', NULL),
(12, 12, 'Khushboo', '06306417890', '272270', 'Uttar Pradesh', 'Sant Kabir Nagar', 'BELHAR KALAN SANT KABIR NAGAR', 'kali', 0, '2025-11-13 07:57:19', '2025-11-13 07:57:19', NULL),
(13, 8, 'manu', '06306417890', '272270', 'Uttar Pradesh', 'Sant Kabir Nagar', 'BELHAR KALAN SANT KABIR NAGAR', 'kali', 0, '2025-11-13 08:08:48', '2025-11-13 08:08:48', NULL),
(14, 15, 'neha', '06306417890', '272270', 'Uttar Pradesh', 'Sant Kabir Nagar', 'BELHAR KALAN SANT KABIR NAGAR', 'kali', 0, '2025-11-13 14:50:34', '2025-11-13 14:50:34', NULL),
(15, 16, 'siya', '06306417890', '272270', 'Uttar Pradesh', 'Sant Kabir Nagar', 'BELHAR KALAN SANT KABIR NAGAR', 'kali', 0, '2025-11-14 04:52:48', '2025-11-14 04:52:48', NULL),
(16, 17, 'Satyam', '69358741236', '201546', 'Bihar', 'Patna', 'patna', NULL, 0, '2025-11-14 06:23:48', '2025-11-14 06:23:48', NULL),
(17, 18, 'sanvi', '69358741236', '201546', 'Bihar', 'Patna', 'patna', NULL, 0, '2025-11-14 09:57:52', '2025-11-14 09:57:52', NULL),
(18, 19, 'sanya', '69358741236', '201546', 'Bihar', 'Patna', 'patna', 'patna', 0, '2025-11-14 11:30:56', '2025-11-14 11:30:56', NULL),
(19, 20, 'Nidhi', '69358741236', '201546', 'Bihar', 'Patna', 'patna', 'patna', 0, '2025-11-15 13:10:37', '2025-11-15 13:10:37', NULL),
(20, 21, 'Saumya', '69358741236', '201546', 'Bihar', 'Patna', 'patna', 'patna', 0, '2025-11-17 05:09:39', '2025-11-17 05:09:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, '2025-10-08 01:32:04', '2025-10-09 05:09:46'),
(19, 8, 8, 3, '2025-11-13 09:55:02', '2025-11-13 11:12:28'),
(20, 8, 10, 2, '2025-11-13 11:21:33', '2025-11-13 11:28:09'),
(23, 15, 9, 1, '2025-11-13 14:50:14', '2025-11-13 14:50:14'),
(24, 15, 10, 1, '2025-11-13 14:56:10', '2025-11-13 14:56:10'),
(25, 16, 10, 1, '2025-11-14 04:52:22', '2025-11-14 04:52:22'),
(31, 12, 10, 2, '2025-11-14 08:13:15', '2025-11-14 09:35:43'),
(32, 18, 8, 1, '2025-11-14 10:04:44', '2025-11-14 10:04:44'),
(33, 18, 10, 1, '2025-11-14 10:17:56', '2025-11-14 10:17:56'),
(34, 21, 8, 1, '2025-11-17 05:10:48', '2025-11-17 05:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Women\'s Wear', '2025-10-07 10:57:38', '2025-10-07 10:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` enum('fixed','percent') NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `min_order_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `expiry_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `min_order_amount`, `expiry_date`, `created_at`, `updated_at`) VALUES
(1, 'PGMS10', '', 10.00, 300.00, '2025-12-31', '2025-10-08 07:55:48', '2025-10-08 07:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('male','female','other','','','','','','','') DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `gender`, `phone`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Salbi Sinha', 'salbi@gmail.com', 'female', '8545854712', '$2y$12$5HpLt4Qa5RrDchEq70fQZuXI1ZRhmcaES9oCVJLx5FZAk.BmhXt0u', '2025-10-08 00:17:54', '2025-10-08 00:17:54'),
(2, 'Sandhya Yadav', 'sandhya@pushpendratechnology.com', 'female', '6394672102', '$2y$12$hYnTKkd0aS2FaV03Ad.cl.FlZ2VGRRbXUbr028fA2x/ylljZA152y', '2025-10-09 06:11:41', '2025-10-14 00:33:18'),
(3, 'Savita', 'sy@gmail.com', 'female', '434322', '$2y$12$dr8iEQCcrSlIHR2uJ6jSiOwB0SXcFE0X18PnaSHminoDh8x8Q3Ux2', '2025-11-05 04:56:23', '2025-11-05 05:32:26'),
(4, 'Purnima', 'purnima@gmail.com', 'female', '09898989898', '$2y$12$oaFd.irPGX1We.9ikVrtf.Kwzd8.VgFhktUSTdoain32T.dC62uU2', '2025-11-05 06:02:58', '2025-11-05 06:02:58'),
(5, 'Mahi', 'm@gmail.com', 'female', '9878978799', '$2y$12$.JVzKwxsl/JsGXLKfOhZCeeX.bOGj1aPbnQO6322QK8.QayGZSbaS', '2025-11-06 00:33:06', '2025-11-10 01:51:19'),
(6, 'savi', 'savi1239@gmail.com', 'female', '06306417890', '$2y$12$j3cTE5LEIpzxA2stM0IOPOk4qeX7RUOKrb7IXIL1Gf3FV/uXA500O', '2025-11-11 11:14:47', '2025-11-11 11:14:47'),
(7, 'savi', 'savi@gmail.com', 'female', '06306417890', '$2y$12$yH8sR6JcVkL8PcP.JS72d.rMXk1NzBcfy54RpY5r/aKNteDQfbScu', '2025-11-11 11:15:26', '2025-11-11 11:15:26'),
(8, 'manu', 'manu@gmail.com', 'female', '06306417890', '$2y$12$4rJK/P4M4Y4cWTiug9yBBOPiOBhD4zxcr1WhSWmkYZ7JHgyFflS0i', '2025-11-12 05:07:52', '2025-11-12 05:07:52'),
(10, 'manu', 'savi123@gmail.com', 'female', '06306417890', '$2y$12$7Sc4WFUBs6zRc8Ld65EjdO0jWrYmsx9nsEOGalmx2uxmfUIJ1mY.y', '2025-11-12 16:15:56', '2025-11-12 16:15:56'),
(12, 'Khushboo', 'k@gmail.com', 'female', '06306417890', '$2y$12$ptdsMDUP5QUiRvEmQGK3mOk/3M04CyOL/YJbF00hT3R.krcuroy1m', '2025-11-13 07:53:53', '2025-11-13 07:53:53'),
(15, 'neha', 'neha@gmail.com', 'female', '06306417890', '$2y$12$L2SPaQM0hW8D3IR11P5ASOXP.3dWrIBfPRN406zFOSa0K0fMIogaa', '2025-11-13 14:50:04', '2025-11-13 14:50:04'),
(16, 'siya', 'siya@gmail.com', 'female', '06306417890', '$2y$12$hmlXGkEBdnGSGRVo6DuZYuSu91EfA.dmUEKzDUgkknsvi8/UF8DaG', '2025-11-14 04:52:12', '2025-11-14 04:52:12'),
(17, 'Satyam', 'satyam@gmail.com', 'male', '69358741236', '$2y$12$LmDjUPJFvPKyzK3vQsw3quqN3Uz2ICx14CJNj2ENUutyTvWHEX/rm', '2025-11-14 06:23:10', '2025-11-14 06:23:10'),
(18, 'sanvi', 'sanvi@gmail.com', 'female', '69358741236', '$2y$12$.GYvp0fcQELNseXv3MV6UuSHUefLZNgK.wuW0bNFdETbrhd7/IKJS', '2025-11-14 09:57:01', '2025-11-14 09:57:01'),
(19, 'sanya', 'sanya@gmail.com', 'female', '69358741236', '$2y$12$k76kIq0ikmRFg2nbITWtPOnAZ92rWyVgbcISM254MoDQ9ri5uJV4y', '2025-11-14 11:10:49', '2025-11-14 11:10:49'),
(20, 'Nidhi', 'n@gmail.com', 'female', '69358741236', '$2y$12$AoIuKAonjNu3KAKpVH0P4u9XQbPmUXicc.IaHgtiIdVsuwWFAIIvC', '2025-11-15 13:10:10', '2025-11-15 13:10:10'),
(21, 'Saumya', 'saumya@gmail.com', 'female', '69358741236', '$2y$12$tIOBCUSWpQc3wvSo8/srSOKofMUsgVZFDNmVvth6VrGRTD4JFnP2.', '2025-11-17 05:09:00', '2025-11-17 05:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_partners`
--

CREATE TABLE `delivery_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tracking_url` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_partners`
--

INSERT INTO `delivery_partners` (`id`, `name`, `tracking_url`, `contact_number`, `created_at`, `updated_at`) VALUES
(1, 'Delhivery', 'https://www.delhivery.com/track/', '1800-123-4567', '2025-11-04 10:17:29', '2025-11-04 10:17:29'),
(2, 'BlueDart', 'https://bluedart.com/track', '1800-233-1234', '2025-11-04 10:17:29', '2025-11-04 10:17:29'),
(3, 'EcomExpress', 'https://ecomexpress.in/tracking/', '1800-208-1000', '2025-11-04 10:17:29', '2025-11-04 10:17:29');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_16_073437_create_customers_table', 1),
(5, '2025_09_19_104448_add_gender_to_users_table', 1),
(6, '2025_09_19_104600_add_gender_to_customers_table', 1),
(7, '2025_09_22_095112_create_addresses_table', 1),
(8, '2025_09_24_071257_create_password_resets_table', 1),
(9, '2025_09_30_053550_add_payment_columns_to_orders_table', 1),
(10, '2025_10_03_061405_create_payments_table', 1),
(11, '2025_10_04_055456_create_coupons_table', 1),
(12, '2025_10_07_063054_create_categories_table', 2),
(13, '2025_10_07_063056_create_products_table', 3),
(14, '2025_10_07_063058_create_orders_table', 4),
(15, '2025_10_23_095050_create_order_status_histories_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_partner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `latitude` decimal(10,6) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `destination_lat` decimal(10,6) DEFAULT NULL,
  `destination_lng` decimal(10,6) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `final_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `delivery_partner_id`, `latitude`, `longitude`, `destination_lat`, `destination_lng`, `user_id`, `address_id`, `total`, `payment_method`, `payment_status`, `created_at`, `updated_at`, `promo_code`, `discount`, `final_total`, `status`) VALUES
(24, NULL, 28.613900, 77.209000, 28.535500, 77.391000, 1, 0, 2000.00, 'Razorpay', 'Paid', '2025-10-13 07:39:01', '2025-10-13 07:39:01', 'WELCOME10', 200.00, 1800.00, NULL),
(25, 1, 28.613900, 77.209000, 28.535500, 77.391000, 2, 0, 1497.00, 'COD', 'Paid', '2025-10-13 02:24:32', '2025-10-13 02:24:32', 'PGMS10', 10.00, 1487.00, NULL),
(26, NULL, 28.613900, 77.209000, 28.535500, 77.391000, 2, 0, 1487.00, 'COD', 'Paid', '2025-10-13 02:24:33', '2025-10-13 02:24:33', NULL, 0.00, 1487.00, NULL),
(27, NULL, 28.613900, 77.209000, 28.535500, 77.391000, 2, 0, 998.00, 'COD', 'Paid', '2025-10-13 02:34:35', '2025-10-13 02:34:35', NULL, 0.00, 998.00, NULL),
(28, NULL, 28.613900, 77.209000, 28.535500, 77.391000, 2, 0, 998.00, 'UPI', 'Paid', '2025-10-13 04:13:06', '2025-10-13 04:13:06', NULL, 0.00, 998.00, NULL),
(34, NULL, NULL, NULL, NULL, NULL, 4, 0, 499.00, 'COD', 'pending', '2025-11-05 23:35:05', '2025-11-05 23:35:05', 'PGMS10', 10.00, 489.00, NULL),
(35, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-07 04:38:21', '2025-11-07 04:38:21', NULL, 0.00, 499.00, NULL),
(36, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-07 04:38:49', '2025-11-07 04:38:49', NULL, 0.00, 499.00, NULL),
(37, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-07 04:39:25', '2025-11-07 04:39:25', NULL, 0.00, 499.00, NULL),
(38, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-07 04:39:39', '2025-11-07 04:39:39', NULL, 0.00, 499.00, NULL),
(39, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-07 04:40:19', '2025-11-07 04:40:19', NULL, 0.00, 499.00, NULL),
(40, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-07 04:42:39', '2025-11-07 04:42:39', NULL, 0.00, 499.00, NULL),
(41, NULL, NULL, NULL, NULL, NULL, 5, 0, 998.00, 'COD', 'pending', '2025-11-08 05:30:32', '2025-11-08 05:30:32', NULL, 0.00, 998.00, NULL),
(42, NULL, NULL, NULL, NULL, NULL, 5, 0, 998.00, 'COD', 'pending', '2025-11-08 05:33:36', '2025-11-08 05:33:36', NULL, 0.00, 998.00, NULL),
(43, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-10 01:41:13', '2025-11-10 01:41:13', 'PGMS10', 10.00, 489.00, NULL),
(44, NULL, NULL, NULL, NULL, NULL, 5, 0, 489.00, 'COD', 'pending', '2025-11-10 01:41:16', '2025-11-10 01:41:16', NULL, 0.00, 489.00, NULL),
(45, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-10 02:08:44', '2025-11-10 02:08:44', 'PGMS10', 10.00, 489.00, NULL),
(46, NULL, NULL, NULL, NULL, NULL, 5, 0, 489.00, 'COD', 'pending', '2025-11-10 02:08:49', '2025-11-10 02:08:49', NULL, 0.00, 489.00, NULL),
(47, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-10 02:11:34', '2025-11-10 02:11:34', NULL, 0.00, 499.00, NULL),
(48, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-10 02:12:33', '2025-11-10 02:12:33', NULL, 0.00, 499.00, NULL),
(49, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-10 02:12:36', '2025-11-10 02:12:36', NULL, 0.00, 499.00, NULL),
(50, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-10 02:13:58', '2025-11-10 02:13:58', NULL, 0.00, 499.00, NULL),
(51, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-10 02:15:46', '2025-11-10 02:15:46', NULL, 0.00, 499.00, NULL),
(52, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-10 02:25:55', '2025-11-10 02:25:55', NULL, 0.00, 499.00, NULL),
(53, NULL, NULL, NULL, NULL, NULL, 5, 0, 1497.00, 'COD', 'pending', '2025-11-10 02:26:52', '2025-11-10 02:26:52', NULL, 0.00, 1497.00, NULL),
(54, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-10 02:33:44', '2025-11-10 02:33:44', NULL, 0.00, 499.00, NULL),
(55, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-10 02:43:51', '2025-11-10 02:43:51', NULL, 0.00, 499.00, NULL),
(56, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-10 02:45:42', '2025-11-10 02:45:42', NULL, 0.00, 499.00, NULL),
(57, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-10 02:48:37', '2025-11-10 02:48:37', NULL, 0.00, 499.00, NULL),
(58, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-10 02:52:47', '2025-11-10 02:52:47', NULL, 0.00, 499.00, NULL),
(59, NULL, NULL, NULL, NULL, NULL, 5, 0, 499.00, 'COD', 'pending', '2025-11-10 02:53:24', '2025-11-10 02:53:24', NULL, 0.00, 499.00, NULL),
(60, NULL, NULL, NULL, NULL, NULL, 10, 11, 400.00, 'COD', 'pending', '2025-11-13 06:35:10', '2025-11-13 06:35:10', NULL, 0.00, 400.00, NULL),
(61, NULL, NULL, NULL, NULL, NULL, 10, 11, 400.00, 'COD', 'Paid', '2025-11-13 07:15:10', '2025-11-13 07:22:29', NULL, 0.00, 400.00, 'Pending'),
(62, NULL, NULL, NULL, NULL, NULL, 10, 11, 767.00, 'COD', 'Paid', '2025-11-13 07:35:48', '2025-11-13 07:35:53', NULL, 0.00, 767.00, 'Pending'),
(63, NULL, NULL, NULL, NULL, NULL, 10, 11, 767.00, 'COD', 'Paid', '2025-11-13 07:50:36', '2025-11-13 07:50:40', NULL, 0.00, 767.00, 'Pending'),
(64, NULL, NULL, NULL, NULL, NULL, 10, 11, 400.00, 'COD', 'pending', '2025-11-13 08:02:58', '2025-11-13 08:02:58', 'PGMS10', 10.00, 757.00, NULL),
(65, NULL, NULL, NULL, NULL, NULL, 10, 11, 400.00, 'COD', 'pending', '2025-11-13 14:27:03', '2025-11-13 14:27:03', NULL, 0.00, 400.00, 'pending'),
(66, NULL, NULL, NULL, NULL, NULL, 10, 11, 400.00, 'COD', 'pending', '2025-11-13 14:30:46', '2025-11-13 14:30:46', NULL, 0.00, 400.00, 'pending'),
(67, NULL, NULL, NULL, NULL, NULL, 10, 11, 400.00, 'COD', 'pending', '2025-11-13 14:32:38', '2025-11-13 14:32:38', NULL, 0.00, 400.00, 'pending'),
(68, NULL, NULL, NULL, NULL, NULL, 10, 11, 400.00, 'COD', 'pending', '2025-11-13 14:33:59', '2025-11-13 14:33:59', NULL, 0.00, 400.00, 'pending'),
(69, NULL, NULL, NULL, NULL, NULL, 10, 11, 400.00, 'COD', 'pending', '2025-11-13 14:34:12', '2025-11-13 14:34:12', NULL, 0.00, 400.00, 'pending'),
(70, NULL, NULL, NULL, NULL, NULL, 10, 11, 400.00, 'COD', 'pending', '2025-11-13 14:34:58', '2025-11-13 14:34:58', NULL, 0.00, 400.00, 'pending'),
(71, NULL, NULL, NULL, NULL, NULL, 10, 11, 400.00, 'COD', 'Paid', '2025-11-13 14:37:02', '2025-11-13 14:37:08', NULL, 0.00, 400.00, 'Pending'),
(72, NULL, NULL, NULL, NULL, NULL, 10, 11, 300.00, 'COD', 'Paid', '2025-11-14 05:16:39', '2025-11-14 05:16:45', NULL, 0.00, 300.00, 'Pending'),
(73, NULL, NULL, NULL, NULL, NULL, 2, 5, 400.00, 'COD', 'Paid', '2025-11-14 06:22:00', '2025-11-14 06:22:04', NULL, 0.00, 400.00, 'Pending'),
(74, NULL, NULL, NULL, NULL, NULL, 2, 5, 400.00, 'COD', 'Paid', '2025-11-14 07:32:21', '2025-11-14 07:32:30', NULL, 0.00, 400.00, 'Pending'),
(75, NULL, NULL, NULL, NULL, NULL, 2, 5, 390.00, 'COD', 'Paid', '2025-11-14 07:56:56', '2025-11-14 07:57:01', 'PGMS10', 10.00, 390.00, 'Pending'),
(76, NULL, NULL, NULL, NULL, NULL, 2, 5, 400.00, 'COD', 'Paid', '2025-11-14 08:00:49', '2025-11-14 08:00:53', NULL, 0.00, 400.00, 'Pending'),
(77, NULL, NULL, NULL, NULL, NULL, 2, 5, 800.00, 'COD', 'paid', '2025-11-14 08:11:45', '2025-11-14 08:11:45', NULL, 0.00, 800.00, 'pending'),
(78, NULL, NULL, NULL, NULL, NULL, 2, 5, 400.00, 'COD', 'paid', '2025-11-14 11:49:45', '2025-11-14 11:49:45', NULL, 0.00, 400.00, 'pending'),
(79, NULL, NULL, NULL, NULL, NULL, 19, 18, 300.00, 'COD', 'paid', '2025-11-14 11:56:29', '2025-11-14 11:56:29', NULL, 0.00, 300.00, 'pending'),
(80, NULL, NULL, NULL, NULL, NULL, 20, 19, 400.00, 'COD', 'Paid', '2025-11-15 13:10:51', '2025-11-15 13:10:57', NULL, 0.00, 400.00, 'Pending'),
(81, NULL, NULL, NULL, NULL, NULL, 20, 19, 757.00, 'COD', 'Paid', '2025-11-15 13:15:59', '2025-11-15 13:16:05', 'PGMS10', 10.00, 757.00, 'Pending'),
(82, NULL, NULL, NULL, NULL, NULL, 21, 20, 300.00, 'COD', 'Paid', '2025-11-17 05:09:51', '2025-11-17 05:09:58', NULL, 0.00, 300.00, 'Pending'),
(83, NULL, NULL, NULL, NULL, NULL, 5, 10, 767.00, 'COD', 'Paid', '2025-11-17 10:57:15', '2025-11-17 10:57:47', NULL, 0.00, 767.00, 'Pending'),
(84, NULL, NULL, NULL, NULL, NULL, 2, 5, 767.00, 'COD', 'Paid', '2025-11-19 05:13:52', '2025-11-19 05:13:58', NULL, 0.00, 767.00, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 25, 1, 2, 1000.00, '2025-10-13 08:03:27', '2025-10-13 08:03:27'),
(9, 71, 9, 1, 300.00, '2025-11-13 14:37:02', '2025-11-13 14:37:02'),
(10, 72, 8, 1, 767.00, '2025-11-14 05:16:39', '2025-11-14 05:16:39'),
(11, 73, 10, 1, 400.00, '2025-11-14 06:22:00', '2025-11-14 06:22:00'),
(12, 75, 10, 1, 400.00, '2025-11-14 07:56:56', '2025-11-14 07:56:56'),
(13, 77, 10, 2, 400.00, '2025-11-14 08:11:45', '2025-11-14 08:11:45'),
(14, 83, 8, 1, 767.00, '2025-11-17 10:57:15', '2025-11-17 10:57:15'),
(15, 84, 8, 2, 767.00, '2025-11-19 05:13:52', '2025-11-19 05:13:52'),
(16, 84, 9, 3, 300.00, '2025-11-19 05:13:52', '2025-11-19 05:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_status_histories`
--

CREATE TABLE `order_status_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_tracking_updates`
--

CREATE TABLE `order_tracking_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tracking_updates`
--

INSERT INTO `order_tracking_updates` (`id`, `order_id`, `location`, `message`, `status`, `created_at`) VALUES
(2, 25, 'Noida', 'Arrived at Noida sector 18', 'in transit', '2025-11-04 11:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `method` varchar(255) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `method`, `details`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'COD', 'Dummy Payment', 489.00, 'success', '2025-10-09 01:45:27', '2025-10-09 01:45:27'),
(2, 1, 'COD', 'Dummy Payment', 489.00, 'success', '2025-10-09 01:49:13', '2025-10-09 01:49:13'),
(3, 1, 'COD', 'Dummy Payment', 489.00, 'success', '2025-10-09 01:55:04', '2025-10-09 01:55:04'),
(4, 1, 'COD', 'Dummy Payment', 988.00, 'success', '2025-10-09 01:58:36', '2025-10-09 01:58:36'),
(5, 1, 'COD', 'Dummy Payment', 988.00, 'success', '2025-10-09 02:43:44', '2025-10-09 02:43:44'),
(6, 1, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-09 02:55:41', '2025-10-09 02:55:41'),
(7, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 00:38:17', '2025-10-13 00:38:17'),
(8, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 00:38:45', '2025-10-13 00:38:45'),
(9, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 00:42:53', '2025-10-13 00:42:53'),
(10, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 01:09:16', '2025-10-13 01:09:16'),
(11, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 01:09:18', '2025-10-13 01:09:18'),
(12, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 01:09:19', '2025-10-13 01:09:19'),
(13, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 01:12:30', '2025-10-13 01:12:30'),
(14, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 01:12:34', '2025-10-13 01:12:34'),
(15, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 01:40:43', '2025-10-13 01:40:43'),
(16, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 01:40:47', '2025-10-13 01:40:47'),
(17, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 01:40:48', '2025-10-13 01:40:48'),
(18, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 01:40:50', '2025-10-13 01:40:50'),
(19, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 01:40:54', '2025-10-13 01:40:54'),
(20, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 01:56:42', '2025-10-13 01:56:42'),
(21, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 02:24:32', '2025-10-13 02:24:32'),
(22, 2, 'COD', 'Cash on Delivery', 1487.00, 'success', '2025-10-13 02:24:33', '2025-10-13 02:24:33'),
(23, 2, 'COD', 'Cash on Delivery', 998.00, 'success', '2025-10-13 02:34:35', '2025-10-13 02:34:35'),
(24, 2, 'UPI', '12354521254', 998.00, 'success', '2025-10-13 04:13:06', '2025-10-13 04:13:06'),
(25, 2, 'COD', 'Cash on Delivery', 988.00, 'success', '2025-10-14 00:04:24', '2025-10-14 00:04:24'),
(26, 2, 'COD', 'Cash on Delivery', 988.00, 'success', '2025-10-14 00:04:26', '2025-10-14 00:04:26'),
(27, 2, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-10-15 23:58:15', '2025-10-15 23:58:15'),
(28, 2, 'COD', 'Cash on Delivery', 489.00, 'success', '2025-10-29 05:01:23', '2025-10-29 05:01:23'),
(29, 2, 'COD', 'Cash on Delivery', 489.00, 'success', '2025-10-29 05:01:25', '2025-10-29 05:01:25'),
(30, 4, 'COD', 'Cash on Delivery', 489.00, 'success', '2025-11-05 23:35:05', '2025-11-05 23:35:05'),
(31, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-07 04:38:13', '2025-11-07 04:38:13'),
(32, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-07 04:38:48', '2025-11-07 04:38:48'),
(33, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-07 04:39:24', '2025-11-07 04:39:24'),
(34, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-07 04:39:34', '2025-11-07 04:39:34'),
(35, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-07 04:40:12', '2025-11-07 04:40:12'),
(36, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-07 04:42:37', '2025-11-07 04:42:37'),
(37, 5, 'COD', 'Cash on Delivery', 998.00, 'success', '2025-11-08 05:30:31', '2025-11-08 05:30:31'),
(38, 5, 'COD', 'Cash on Delivery', 998.00, 'success', '2025-11-08 05:33:36', '2025-11-08 05:33:36'),
(39, 5, 'COD', 'Cash on Delivery', 489.00, 'success', '2025-11-10 01:41:12', '2025-11-10 01:41:12'),
(40, 5, 'COD', 'Cash on Delivery', 489.00, 'success', '2025-11-10 01:41:16', '2025-11-10 01:41:16'),
(41, 5, 'COD', 'Cash on Delivery', 489.00, 'success', '2025-11-10 02:08:44', '2025-11-10 02:08:44'),
(42, 5, 'COD', 'Cash on Delivery', 489.00, 'success', '2025-11-10 02:08:48', '2025-11-10 02:08:48'),
(43, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-10 02:11:34', '2025-11-10 02:11:34'),
(44, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-10 02:12:33', '2025-11-10 02:12:33'),
(45, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-10 02:12:36', '2025-11-10 02:12:36'),
(46, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-10 02:13:57', '2025-11-10 02:13:57'),
(47, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-10 02:15:45', '2025-11-10 02:15:45'),
(48, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-10 02:25:54', '2025-11-10 02:25:54'),
(49, 5, 'COD', 'Cash on Delivery', 1497.00, 'success', '2025-11-10 02:26:52', '2025-11-10 02:26:52'),
(50, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-10 02:33:44', '2025-11-10 02:33:44'),
(51, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-10 02:43:51', '2025-11-10 02:43:51'),
(52, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-10 02:45:41', '2025-11-10 02:45:41'),
(53, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-10 02:48:36', '2025-11-10 02:48:36'),
(54, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-10 02:52:47', '2025-11-10 02:52:47'),
(55, 5, 'COD', 'Cash on Delivery', 499.00, 'success', '2025-11-10 02:53:24', '2025-11-10 02:53:24'),
(56, 10, 'COD', 'Cash on Delivery', 400.00, 'success', '2025-11-13 07:18:21', '2025-11-13 07:18:21'),
(57, 10, 'COD', 'Cash on Delivery', 400.00, 'success', '2025-11-13 07:18:34', '2025-11-13 07:18:34'),
(58, 10, 'COD', 'Cash on Delivery', 400.00, 'success', '2025-11-13 07:18:43', '2025-11-13 07:18:43'),
(59, 10, 'COD', 'Cash on Delivery', 400.00, 'success', '2025-11-13 07:22:29', '2025-11-13 07:22:29'),
(60, 10, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-13 07:35:53', '2025-11-13 07:35:53'),
(61, 10, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-13 07:50:40', '2025-11-13 07:50:40'),
(62, 10, 'COD', 'Cash on Delivery', 400.00, 'success', '2025-11-13 14:37:08', '2025-11-13 14:37:08'),
(63, 10, 'COD', 'Cash on Delivery', 300.00, 'success', '2025-11-14 05:16:45', '2025-11-14 05:16:45'),
(64, 2, 'COD', 'Cash on Delivery', 400.00, 'success', '2025-11-14 06:22:04', '2025-11-14 06:22:04'),
(65, 2, 'COD', 'Cash on Delivery', 400.00, 'success', '2025-11-14 07:32:29', '2025-11-14 07:32:29'),
(66, 2, 'COD', 'Cash on Delivery', 390.00, 'success', '2025-11-14 07:57:01', '2025-11-14 07:57:01'),
(67, 2, 'COD', 'Cash on Delivery', 400.00, 'success', '2025-11-14 08:00:53', '2025-11-14 08:00:53'),
(68, 20, 'COD', 'Cash on Delivery', 400.00, 'success', '2025-11-15 13:10:57', '2025-11-15 13:10:57'),
(69, 20, 'COD', 'Cash on Delivery', 757.00, 'success', '2025-11-15 13:16:05', '2025-11-15 13:16:05'),
(70, 21, 'COD', 'Cash on Delivery', 300.00, 'success', '2025-11-17 05:09:58', '2025-11-17 05:09:58'),
(71, 5, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-17 10:57:46', '2025-11-17 10:57:46'),
(72, 2, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-19 05:13:57', '2025-11-19 05:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0cVx3qCbztpm4JazRON6umL7muxeO6TG2bWgcqPq', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMDJaNlA4VTZyQnNYaWpaeWdrNXdGV2ZkWldRWHBlNktOM2lrVGZIRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFja19zdGVwcy81OSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7czoxOToiY2hlY2tvdXRfYWRkcmVzc19pZCI7czoyOiIxMCI7czoxNDoiY2hlY2tvdXRfdG90YWwiO3M6NjoiNDk5LjAwIjt9', 1762763006),
('WpWWMMvcer4LQMBBq8gKYRKLaDvyijzQ0O962CoS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkt6Y0h0VHlXRnJrakZPV2ZHZ04xMjBTVFRvcWRJb3AxN09HRE53byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1763098701),
('zYsJs8mM9x7wEjVebZoCkDbHOkUp1tqIIUridEDR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOHRjb3U1N1Jma1ZMTURxNGJXbjhaTzNPUXpPTWEyemZ6MjJEU1BrMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1762840521);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2025-10-30 05:50:11', '2025-10-30 05:50:11'),
(2, 2, 1, '2025-10-30 05:50:59', '2025-10-30 05:50:59'),
(3, 5, 1, '2025-11-08 02:23:49', '2025-11-08 02:23:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `delivery_partners`
--
ALTER TABLE `delivery_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_delivery_partner_id_foreign` (`delivery_partner_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_status_histories`
--
ALTER TABLE `order_status_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_status_histories_order_id_index` (`order_id`);

--
-- Indexes for table `order_tracking_updates`
--
ALTER TABLE `order_tracking_updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `delivery_partners`
--
ALTER TABLE `delivery_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_status_histories`
--
ALTER TABLE `order_status_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_tracking_updates`
--
ALTER TABLE `order_tracking_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_buyer_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_delivery_partner_id_foreign` FOREIGN KEY (`delivery_partner_id`) REFERENCES `delivery_partners` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_status_histories`
--
ALTER TABLE `order_status_histories`
  ADD CONSTRAINT `order_status_histories_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_tracking_updates`
--
ALTER TABLE `order_tracking_updates`
  ADD CONSTRAINT `order_tracking_updates_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
