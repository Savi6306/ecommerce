-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2025 at 10:45 AM
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
-- Database: `ecommerce`
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
  `address_line1` varchar(255) NOT NULL,
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
(1, 9, 'savita yadav', '06306417890', '272270', 'Uttar Pradesh', 'Sant Kabir Nagar', 'BELHAR KALAN SANT KABIR NAGAR', 'kaliya', 0, '2025-11-12 05:57:55', '2025-11-12 05:58:12', NULL),
(4, 3, 'Savita', '06325415263', '202589', 'Uttar Pradesh', 'gaurakhpur', 'Gaurakhpur', 'city center', 0, '2025-11-05 05:42:54', '2025-11-05 05:42:54', NULL),
(5, 2, 'Sandhya', '6394672103', '203156', 'UP', 'Kanpur', 'Kidwai nagar', 'Saket nagar', 0, '2025-11-05 05:43:59', '2025-11-05 05:43:59', NULL),
(8, 4, 'Purnima', '09898989898', '203156', 'UP', 'Kanpur', 'Govind nagar', 'Saket nagar', 0, '2025-11-07 01:25:10', '2025-11-07 01:25:10', NULL),
(10, 5, 'Mahi', '09878978798', '203156', 'UP', 'Kanpur', 'Barra', 'Saket nagar', 0, '2025-11-07 01:50:50', '2025-11-07 01:50:50', NULL),
(11, 10, 'manu', '06306417890', '272270', 'Uttar Pradesh', 'Sant Kabir Nagar', 'BELHAR KALAN SANT KABIR NAGAR delhi', 'kaliooo', 1, '2025-11-12 16:33:10', '2025-11-12 16:33:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `role`, `password`, `profile_photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'savita yadav', 'savi123@gmail.com', 'admin', '$2y$12$MHo591u7hBwVSnCr6pR9KuuSsaQvrgO5waPLSz98S4sJU.lB72M4u', NULL, NULL, '2025-11-07 07:29:02', '2025-11-07 07:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'savita yadav', 'savita-yadav', 'active', '2025-11-07 18:35:42', '2025-11-07 18:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `image`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'black shirt', 'inactive', 'brand_images/PB0Xsn5JswoGhhF2gIbjyeuNZp0yfRqBO2Rr0g22.png', 'black-shirt', 'vcbvn bvn', '2025-11-07 18:31:36', '2025-11-07 18:31:51');

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
(3, 2, 1, 1, '2025-10-09 06:11:54', '2025-10-14 00:05:52'),
(8, 5, 1, 3, '2025-11-10 01:28:30', '2025-11-10 02:26:32'),
(10, 9, 8, 1, '2025-11-12 08:23:07', '2025-11-12 08:23:07'),
(11, 9, 9, 1, '2025-11-12 10:12:02', '2025-11-12 10:12:02'),
(12, 9, 10, 1, '2025-11-12 10:43:06', '2025-11-12 10:43:06'),
(13, 10, 10, 1, '2025-11-12 17:01:50', '2025-11-12 17:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'savita yadav', 'savita-yadav', 'active', NULL, '2025-11-07 18:27:05', '2025-11-07 18:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `seller_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `chat_type` enum('user_seller','seller_admin') NOT NULL DEFAULT 'user_seller',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `seller_id`, `admin_id`, `chat_type`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, 'user_seller', '2025-11-07 10:52:17', '2025-11-07 10:52:17');

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
(5, 'Mahi', 'm@gmail.com', 'female', '9878978799', '$2y$12$.JVzKwxsl/JsGXLKfOhZCeeX.bOGj1aPbnQO6322QK8.QayGZSbaS', '2025-11-06 00:33:06', '2025-11-10 01:51:19');

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
-- Table structure for table `delivery_trackings`
--

CREATE TABLE `delivery_trackings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shipping_partner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `current_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `current_location` varchar(255) DEFAULT NULL,
  `expected_delivery_date` timestamp NULL DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_trackings`
--

INSERT INTO `delivery_trackings` (`id`, `order_id`, `shipping_partner_id`, `tracking_number`, `current_status`, `current_location`, `expected_delivery_date`, `remarks`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '1', 'Pending', NULL, NULL, NULL, '2025-11-07 19:37:50', '2025-11-07 19:37:50'),
(2, NULL, 1, '2', 'Pending', NULL, NULL, NULL, '2025-11-07 19:42:32', '2025-11-07 19:42:32');

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
-- Table structure for table `in_house_products`
--

CREATE TABLE `in_house_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `in_house_products`
--

INSERT INTO `in_house_products` (`id`, `name`, `sku`, `description`, `image`, `price`, `quantity`, `created_at`, `updated_at`, `stock`) VALUES
(1, 'res', '22222', 'gfgnhdr', 'storage/inhouse_products/Q7baLCfcIaRDuiSKAu2fBZAbyZUOqU2uRIrU0VmR.jpg', 100.00, 0, '2025-11-07 18:36:31', '2025-11-07 18:36:52', 0);

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `sender_type` enum('user','seller','admin') NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `chat_id`, `sender_id`, `sender_type`, `message`, `is_read`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'seller', 'hello', 0, NULL, '2025-11-07 10:52:32', '2025-11-07 10:52:32'),
(2, 1, 1, 'seller', 'hello', 0, NULL, '2025-11-07 10:54:23', '2025-11-07 10:54:23'),
(3, 1, 1, 'admin', 'hello', 0, NULL, '2025-11-07 11:01:44', '2025-11-07 11:01:44'),
(4, 1, 1, 'seller', 'hello', 0, NULL, '2025-11-07 11:03:52', '2025-11-07 11:03:52'),
(5, 1, 1, 'seller', 'hello', 0, NULL, '2025-11-07 11:03:52', '2025-11-07 11:03:52'),
(6, 1, 1, 'seller', 'hello', 0, NULL, '2025-11-07 11:04:18', '2025-11-07 11:04:18'),
(7, 1, 1, 'admin', 'hello', 0, NULL, '2025-11-07 11:04:56', '2025-11-07 11:04:56');

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
(4, '2025_09_20_081255_create_otps_table', 1),
(5, '2025_09_21_192009_create_seller_table', 1),
(6, '2025_09_27_012810_create_orders_table', 1),
(7, '2025_09_27_012813_create_products_table', 1),
(8, '2025_10_08_123950_create_order_items_table', 1),
(9, '2025_10_10_202513_add_is_active_to_products_table', 1),
(10, '2025_10_16_125639_add_profile_fields_to_sellers_table', 1),
(11, '2025_10_16_130546_create_admins_table', 1),
(12, '2025_10_16_133802_create_categories_table', 1),
(13, '2025_10_16_133906_create_brands_table', 1),
(14, '2025_10_16_134135_create_attributes_table', 1),
(15, '2025_10_16_134214_create_attribute_values_table', 1),
(16, '2025_10_16_134246_create_product_attribute_table', 1),
(17, '2025_10_16_134342_create_product_images_table', 1),
(18, '2025_10_16_150330_add_category_brand_approval_to_products_table', 1),
(19, '2025_10_17_121949_add_status_to_categories_table', 1),
(20, '2025_10_17_160612_create_in_house_products_table', 1),
(21, '2025_11_02_055603_create_promotions_table', 1),
(22, '2025_11_02_060755_create_support_tickets_table', 1),
(23, '2025_11_02_061142_create_blogs_table', 1),
(24, '2025_11_02_061417_create_roles_table', 1),
(25, '2025_11_02_061547_create_permissions_table', 1),
(26, '2025_11_02_061800_create_shipping_partners_table', 1),
(27, '2025_11_02_062142_create_delivery_trackings_table', 1),
(28, '2025_11_02_062403_create_transactions_table', 1),
(29, '2025_11_02_062702_create_payment_gateways_table', 1),
(30, '2025_11_02_064957_create_refunds_table', 1),
(31, '2025_11_02_070238_create_warehouses_table', 1),
(32, '2025_11_02_070551_create_warehouse_stocks_table', 1),
(33, '2025_11_02_070837_create_stock_histories_table', 1),
(34, '2025_11_02_083513_create_vendor_products_table', 1),
(35, '2025_11_03_105833_create_product_galleries_table', 1),
(36, '2025_11_03_123801_add_sku_to_in_house_products_table', 1),
(37, '2025_11_03_132021_create_vendor_product_galleries_table', 1),
(38, '2025_11_03_154923_update_promotion_type_enum', 1),
(39, '2025_11_03_222011_create_shipping_updates_table', 1),
(40, '2025_11_04_163516_create_chats_table', 1),
(41, '2025_11_04_165128_create_messages_table', 1),
(42, '2025_11_05_164725_create_role_user_table', 1),
(43, '2025_11_06_113319_add_profile_photo_to_admins_table', 1),
(44, '2025_11_07_114124_create_vendor_product_attributes_table', 1),
(45, '2025_11_07_120740_add_admin_fields_to_users_table', 1),
(46, '2025_11_07_124923_add_role_isadmin_isactive_gender_to_users_table', 2),
(47, '2025_11_07_233158_add_status_to_brands_table', 3),
(48, '2025_11_07_233429_add_slug_to_products_table', 4),
(49, '2025_11_07_233550_add_discount_price_to_products_table', 5),
(50, '2025_11_07_233714_add_type_to_products_table', 6),
(51, '2025_11_07_235846_add_image_to_brands_table', 7),
(52, '2025_11_08_000100_change_status_type_in_brands_table', 8),
(53, '2025_11_08_000257_add_slug_to_attributes_table', 9),
(54, '2025_11_08_000444_add_status_to_attributes_table', 10),
(55, '2025_11_08_001031_create_product_images_table', 11),
(56, '2025_11_08_002213_create_product_images_table', 12),
(57, '2025_11_08_004516_add_coupon_code_to_promotions_table', 13),
(58, '2025_11_08_004713_add_discount_to_promotions_table', 14),
(59, '2025_11_08_004843_add_banner_to_promotions_table', 15),
(60, '2025_11_08_005449_make_message_nullable_in_support_tickets_table', 16),
(61, '2025_11_08_010129_add_stock_to_in_house_products_table', 17),
(62, '2025_11_08_010512_add_contact_email_to_shipping_partners_table', 18),
(63, '2025_11_08_010642_add_contact_phone_to_shipping_partners_table', 19),
(64, '2025_11_08_010853_add_delivery_tracking_id_to_shipping_updates_table', 20),
(65, '2025_11_08_011053_make_tracking_id_nullable_in_shipping_updates_table', 21),
(66, '2025_11_08_124739_add_image_path_and_position_to_product_images_table', 22),
(67, '2025_11_08_165951_add_is_featured_to_product_images_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` int(20) NOT NULL,
  `final_total` int(20) NOT NULL,
  `payment_status` enum('pending','paid','failed') NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','in_transit','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `approved_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `cancel_reason` text DEFAULT NULL,
  `refund_status` enum('none','requested','approved','rejected') NOT NULL DEFAULT 'none',
  `shipping_address` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `tracking_number` varchar(255) DEFAULT NULL,
  `tax_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `attempts` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `email`, `otp`, `expires_at`, `is_used`, `attempts`, `created_at`, `updated_at`) VALUES
(1, 'savi123@gmail.com', '486858', '2025-11-07 07:30:27', 1, 0, '2025-11-07 07:29:39', '2025-11-07 07:30:27'),
(7, 'savita@pushpendratechnology.com', '592331', '2025-11-07 17:39:48', 0, 0, '2025-11-07 17:29:48', '2025-11-07 17:29:48'),
(8, 'savita@pushpendratechnology.com', '486430', '2025-11-07 17:41:43', 0, 0, '2025-11-07 17:31:43', '2025-11-07 17:31:43'),
(9, 'savita@pushpendratechnology.com', '209609', '2025-11-07 17:45:23', 0, 0, '2025-11-07 17:35:23', '2025-11-07 17:35:23'),
(10, 'savita@pushpendratechnology.com', '399196', '2025-11-07 17:49:33', 0, 0, '2025-11-07 17:39:33', '2025-11-07 17:39:33'),
(11, 'savitakld6306@gmail.com', '503958', '2025-11-07 17:57:45', 0, 0, '2025-11-07 17:47:45', '2025-11-07 17:47:45'),
(12, 'sandhya@pushpendratechnology.com', '496103', '2025-11-14 05:13:20', 1, 0, '2025-11-14 05:12:12', '2025-11-14 05:13:20');

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
(0, 9, 'COD', 'Cash on Delivery', 300.00, 'success', '2025-11-12 05:58:59', '2025-11-12 05:58:59'),
(0, 9, 'COD', 'Cash on Delivery', 300.00, 'success', '2025-11-12 05:59:17', '2025-11-12 05:59:17'),
(0, 9, 'COD', 'Cash on Delivery', 300.00, 'success', '2025-11-12 06:13:13', '2025-11-12 06:13:13'),
(0, 9, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-12 07:14:21', '2025-11-12 07:14:21'),
(0, 9, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-12 07:18:33', '2025-11-12 07:18:33'),
(0, 9, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-12 07:19:17', '2025-11-12 07:19:17'),
(0, 9, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-12 07:21:55', '2025-11-12 07:21:55'),
(0, 9, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-12 07:27:22', '2025-11-12 07:27:22'),
(0, 9, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-12 07:27:44', '2025-11-12 07:27:44'),
(0, 9, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-12 07:31:59', '2025-11-12 07:31:59'),
(0, 9, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-12 07:44:42', '2025-11-12 07:44:42'),
(0, 9, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-12 07:44:53', '2025-11-12 07:44:53'),
(0, 9, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-12 08:08:52', '2025-11-12 08:08:52'),
(0, 9, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-12 08:19:29', '2025-11-12 08:19:29'),
(0, 9, 'COD', 'Cash on Delivery', 767.00, 'success', '2025-11-12 08:19:52', '2025-11-12 08:19:52'),
(0, 9, 'COD', 'Cash on Delivery', 278.00, 'success', '2025-11-12 08:23:27', '2025-11-12 08:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `config` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`config`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `name`, `provider`, `active`, `config`, `created_at`, `updated_at`) VALUES
(1, 'upi', 'savita', 1, NULL, '2025-11-12 07:21:22', '2025-11-12 07:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `group` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `group`, `status`, `created_at`, `updated_at`) VALUES
(1, 'savita yadav', 'vandery', NULL, 'active', '2025-11-07 19:33:09', '2025-11-07 19:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sku` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `stock` int(11) NOT NULL DEFAULT 0,
  `type` varchar(255) NOT NULL DEFAULT 'inhouse',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `approved_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `seller_id`, `name`, `slug`, `description`, `sku`, `price`, `discount_price`, `stock`, `type`, `status`, `is_featured`, `image`, `created_at`, `updated_at`, `is_active`, `category_id`, `brand_id`, `approved_by_admin`, `deleted_at`) VALUES
(8, 1, 'jewellery', NULL, 'Add a touch of sparkle to your look with this beautifully crafted gold-plated jewellery set. Designed with intricate detailing and premium finish, it enhances any traditional or modern outfit.', '3333', 767.00, 0.00, 1, 'inhouse', 'active', 1, 'products/fA7R6pFAAF5LH5CaAlPb5Ti0j5wTNejDU9YxEVZy.jpg', '2025-11-12 06:44:32', '2025-11-12 06:44:32', 1, NULL, NULL, 0, NULL),
(9, 1, 'Women T-shirt', NULL, 'Trendy Women’s Cotton T-Shirt – Soft, Stylish & Comfortable Everyday Wear', '999999', 300.00, 0.00, 1, 'inhouse', 'active', 1, 'products/Yhw8ZRuWQCSzycO04P9MQHMORxrahStMbZcpWSVg.jpg', '2025-11-12 10:11:44', '2025-11-12 10:24:53', 1, NULL, NULL, 0, NULL),
(10, 1, 'Kid\'s frock', NULL, 'Style and comfort come together in this adorable frock, designed to make your little princess shine with every step', '111111', 400.00, 0.00, 1, 'inhouse', 'active', 1, 'products/VNZSM9biTnvobQNh2xOkgGtOnPnyocCnrBDD0kPY.jpg', '2025-11-12 10:29:19', '2025-11-17 07:02:45', 1, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE `product_attribute` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_value_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `discount_value` decimal(8,2) NOT NULL DEFAULT 0.00,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `coupon_code`, `title`, `description`, `code`, `type`, `discount`, `discount_value`, `start_date`, `end_date`, `banner`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ffdffxdf', 'savi', NULL, NULL, 'coupon', 7.00, 0.00, '2025-11-16', '2025-11-30', 'promotion_banners/4gcyoWJR6pwTt8UhfSFKUYz9uYnWrvGMEwFN0iIS.png', 'active', '2025-11-07 19:19:17', '2025-11-07 19:19:37'),
(2, NULL, 'savi', NULL, NULL, 'banner', NULL, 0.00, '2025-11-02', '2025-12-07', 'banners/wiGaTDza6UWWNW90LxDn80G5N2qyOZULaJ3RukrG.jpg', '', '2025-11-07 19:20:27', '2025-11-07 19:20:44'),
(3, 'dfvfbgfb', 'savita', NULL, NULL, 'offer', 30.00, 0.00, '2025-11-16', '2025-11-30', NULL, 'active', '2025-11-07 19:21:20', '2025-11-07 19:21:44'),
(4, NULL, 'b', NULL, NULL, 'notification', NULL, 0.00, '2025-11-09', '2025-11-30', NULL, 'active', '2025-11-07 19:22:09', '2025-11-07 19:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 8, 5, NULL, '2025-11-19 07:17:11', '2025-11-19 07:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `permissions` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `permissions`, `status`, `created_at`, `updated_at`) VALUES
(1, 'savita yadav', 'ddf', NULL, 'active', '2025-11-07 19:32:41', '2025-11-07 19:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `whatsapp_updates` tinyint(1) NOT NULL DEFAULT 0,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `store_name`, `phone`, `address`, `profile_photo`, `email`, `password`, `whatsapp_updates`, `is_verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'savi', 'savi', '06306417890', 'BELHAR KALAN SANT KABIR NAGAR, kali', 'storage/seller_profiles/Ru0dsfOhxKf3XYCWxxW1AqjK5s0b9s0wdOyGMctg.png', 'savi123@gmail.com', '$2y$12$QhrBVHRBhUfK68umttxsIuEBRmKtu5v9y9t0wZidGqIfCPToTJfZi', 0, 0, NULL, '2025-11-07 07:30:27', '2025-11-08 10:31:53'),
(2, 'Sandhya', NULL, NULL, NULL, NULL, 'sandhya@pushpendratechnology.com', '$2y$12$GNX1eq4I9CFkncXlxNyf/uvycwJF82ZblWzvDUzwTLhWhuS.7zknG', 0, 0, NULL, '2025-11-14 05:13:19', '2025-11-14 05:13:19');

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
('OEe04CNSsnSgNeLJxLg0302zFXUKugF86CHanJGC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNHFwT2xkNnNjQlVjdEoxY1lmUDRwRVRPQjdDenVsaEp1NVB6dkNXcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZWxsZXIvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6ImJ1eV9ub3ciO2E6NTp7czoxMDoicHJvZHVjdF9pZCI7aTo4O3M6NDoibmFtZSI7czo5OiJqZXdlbGxlcnkiO3M6NToicHJpY2UiO3M6NjoiNzY3LjAwIjtzOjg6InF1YW50aXR5IjtpOjE7czo4OiJzdWJ0b3RhbCI7czo2OiI3NjcuMDAiO31zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2FydC9hZGQvOCI7fX0=', 1763537340),
('xIJg1EGudn6wjAdrhebnIJKHgzk17rZHaHWoYi1f', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUUhFRHQ2UlhkSjh1VHBSMEJ1M2hjN0FjYUdMZmtmQ0hnaXc2UHlmUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0Ijt9fQ==', 1763545309);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_partners`
--

CREATE TABLE `shipping_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `tracking_url` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_partners`
--

INSERT INTO `shipping_partners` (`id`, `name`, `contact_person`, `email`, `phone`, `website`, `tracking_url`, `status`, `created_at`, `updated_at`, `contact_email`, `contact_phone`) VALUES
(1, 'savita yadav', NULL, NULL, NULL, NULL, NULL, 'active', '2025-11-07 19:37:17', '2025-11-07 19:37:17', 'savi123@gmail.com', '06306417890');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_updates`
--

CREATE TABLE `shipping_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tracking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_tracking_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_updates`
--

INSERT INTO `shipping_updates` (`id`, `tracking_id`, `status`, `location`, `update_time`, `remarks`, `created_at`, `updated_at`, `delivery_tracking_id`) VALUES
(1, NULL, 'pending', 'delhi', NULL, 'vc v', '2025-11-07 19:41:32', '2025-11-07 19:41:32', 1),
(2, NULL, 'pending', 'delhi', NULL, 'nmmn', '2025-11-07 19:42:08', '2025-11-07 19:42:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock_histories`
--

CREATE TABLE `stock_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity_change` int(11) NOT NULL,
  `action_type` varchar(255) NOT NULL COMMENT 'added, sold, returned, adjusted',
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `priority` enum('low','medium','high') NOT NULL DEFAULT 'medium',
  `status` enum('open','in_progress','resolved','closed') NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`id`, `user_id`, `subject`, `message`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'ggfb', NULL, 'medium', 'open', '2025-11-07 19:28:50', '2025-11-07 19:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` enum('pending','completed','failed','refunded') NOT NULL DEFAULT 'pending',
  `currency` varchar(10) NOT NULL DEFAULT 'INR',
  `response_data` text DEFAULT NULL,
  `transaction_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-11-07 06:50:10', '$2y$12$FnOX.XxSTSUyoHzlWgwZ2.BbMeSA8/Nu1CQ.gWisQAf6cYu1nU5qy', 0, 1, 'OkkPT9RBqH', '2025-11-07 06:50:10', '2025-11-07 06:50:10'),
(2, 'Admin', 'admin@meshoo.com', '2025-11-07 06:50:11', '$2y$12$81ZHmz4G/c4xM.0aLcdiReg8Af6ooXHInO/a1/T6AH/sFum9/OM1.', 1, 1, NULL, '2025-11-07 06:50:11', '2025-11-07 06:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_products`
--

CREATE TABLE `vendor_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `type` varchar(255) NOT NULL DEFAULT 'vendor',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_products`
--

INSERT INTO `vendor_products` (`id`, `vendor_id`, `name`, `slug`, `sku`, `category_id`, `brand_id`, `price`, `discount_price`, `stock`, `type`, `is_featured`, `status`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'savita yadav', 'savita-yadav', '1210', NULL, NULL, 67.00, NULL, 0, 'vendor', 0, 'active', 'gvhngvgff', NULL, '2025-11-07 18:37:22', '2025-11-08 11:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_product_attributes`
--

CREATE TABLE `vendor_product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attribute_name` varchar(255) DEFAULT NULL,
  `attribute_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_product_galleries`
--

CREATE TABLE `vendor_product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_product_galleries`
--

INSERT INTO `vendor_product_galleries` (`id`, `vendor_product_id`, `image`, `is_featured`, `position`, `created_at`, `updated_at`) VALUES
(1, 1, 'products/bhcj8fQyy4sIOGGutpsgQWZRBpbiX7vaTOpO6VEW.png', 0, 0, '2025-11-07 18:38:02', '2025-11-07 18:38:02'),
(2, 1, NULL, 0, 2, '2025-11-08 06:57:22', '2025-11-08 06:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `manager_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `total_capacity` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `location`, `manager_name`, `contact_number`, `total_capacity`, `active`, `created_at`, `updated_at`) VALUES
(1, 'savita yadav', 'delhi', NULL, NULL, NULL, 1, '2025-11-07 19:42:49', '2025-11-07 19:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_stocks`
--

CREATE TABLE `warehouse_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `reorder_level` int(11) NOT NULL DEFAULT 10 COMMENT 'Low stock alert threshold',
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
(3, 5, 1, '2025-11-08 02:23:49', '2025-11-08 02:23:49'),
(0, 9, 1, '2025-11-12 05:59:48', '2025-11-12 05:59:48'),
(0, 10, 8, '2025-11-13 07:32:18', '2025-11-13 07:32:18'),
(0, 8, 10, '2025-11-13 11:28:36', '2025-11-13 11:28:36'),
(0, 10, 10, '2025-11-13 14:26:45', '2025-11-13 14:26:45'),
(0, 15, 10, '2025-11-13 14:51:49', '2025-11-13 14:51:49'),
(0, 16, 9, '2025-11-14 04:53:18', '2025-11-14 04:53:18'),
(0, 16, 8, '2025-11-14 04:53:59', '2025-11-14 04:53:59'),
(0, 12, 8, '2025-11-14 05:18:08', '2025-11-14 05:18:08'),
(0, 18, 9, '2025-11-14 10:28:48', '2025-11-14 10:28:48'),
(0, 20, 10, '2025-11-15 13:14:47', '2025-11-15 13:14:47'),
(0, 5, 8, '2025-11-17 10:55:22', '2025-11-17 10:55:22');

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
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_author_id_foreign` (`author_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_user_id_seller_id_index` (`user_id`,`seller_id`),
  ADD KEY `chats_seller_id_admin_id_index` (`seller_id`,`admin_id`);

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
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `delivery_trackings`
--
ALTER TABLE `delivery_trackings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `delivery_trackings_tracking_number_unique` (`tracking_number`),
  ADD KEY `delivery_trackings_order_id_foreign` (`order_id`),
  ADD KEY `delivery_trackings_shipping_partner_id_foreign` (`shipping_partner_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `in_house_products`
--
ALTER TABLE `in_house_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `in_house_products_sku_unique` (`sku`);

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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_chat_id_foreign` (`chat_id`);

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
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_seller_id_foreign` (`seller_id`),
  ADD KEY `orders_buyer_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_seller_id_foreign` (`seller_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attribute_product_id_foreign` (`product_id`),
  ADD KEY `product_attribute_attribute_value_id_foreign` (`attribute_value_id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`vendor_product_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promotions_code_unique` (`code`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refunds_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permission_role_id_foreign` (`role_id`),
  ADD KEY `role_permission_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipping_partners`
--
ALTER TABLE `shipping_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_updates`
--
ALTER TABLE `shipping_updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_updates_tracking_id_foreign` (`tracking_id`);

--
-- Indexes for table `stock_histories`
--
ALTER TABLE `stock_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_histories_warehouse_id_foreign` (`warehouse_id`),
  ADD KEY `stock_histories_product_id_foreign` (`product_id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `support_tickets_user_id_foreign` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_transaction_id_unique` (`transaction_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor_products`
--
ALTER TABLE `vendor_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor_products_slug_unique` (`slug`),
  ADD UNIQUE KEY `vendor_products_sku_unique` (`sku`),
  ADD KEY `vendor_products_vendor_id_foreign` (`vendor_id`),
  ADD KEY `vendor_products_category_id_foreign` (`category_id`),
  ADD KEY `vendor_products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `vendor_product_attributes`
--
ALTER TABLE `vendor_product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_product_attributes_vendor_product_id_foreign` (`vendor_product_id`);

--
-- Indexes for table `vendor_product_galleries`
--
ALTER TABLE `vendor_product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_product_galleries_vendor_product_id_foreign` (`vendor_product_id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_stocks`
--
ALTER TABLE `warehouse_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_stocks_warehouse_id_foreign` (`warehouse_id`),
  ADD KEY `warehouse_stocks_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_trackings`
--
ALTER TABLE `delivery_trackings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `in_house_products`
--
ALTER TABLE `in_house_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_partners`
--
ALTER TABLE `shipping_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_updates`
--
ALTER TABLE `shipping_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock_histories`
--
ALTER TABLE `stock_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_products`
--
ALTER TABLE `vendor_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_product_attributes`
--
ALTER TABLE `vendor_product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_product_galleries`
--
ALTER TABLE `vendor_product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouse_stocks`
--
ALTER TABLE `warehouse_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `delivery_trackings`
--
ALTER TABLE `delivery_trackings`
  ADD CONSTRAINT `delivery_trackings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `delivery_trackings_shipping_partner_id_foreign` FOREIGN KEY (`shipping_partner_id`) REFERENCES `shipping_partners` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_chat_id_foreign` FOREIGN KEY (`chat_id`) REFERENCES `chats` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_buyer_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD CONSTRAINT `product_attribute_attribute_value_id_foreign` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_values` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_attribute_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`vendor_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `refunds`
--
ALTER TABLE `refunds`
  ADD CONSTRAINT `refunds_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_updates`
--
ALTER TABLE `shipping_updates`
  ADD CONSTRAINT `shipping_updates_tracking_id_foreign` FOREIGN KEY (`tracking_id`) REFERENCES `delivery_trackings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_histories`
--
ALTER TABLE `stock_histories`
  ADD CONSTRAINT `stock_histories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_histories_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD CONSTRAINT `support_tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `vendor_products`
--
ALTER TABLE `vendor_products`
  ADD CONSTRAINT `vendor_products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `vendor_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `vendor_products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_product_attributes`
--
ALTER TABLE `vendor_product_attributes`
  ADD CONSTRAINT `vendor_product_attributes_vendor_product_id_foreign` FOREIGN KEY (`vendor_product_id`) REFERENCES `vendor_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_product_galleries`
--
ALTER TABLE `vendor_product_galleries`
  ADD CONSTRAINT `vendor_product_galleries_vendor_product_id_foreign` FOREIGN KEY (`vendor_product_id`) REFERENCES `vendor_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `warehouse_stocks`
--
ALTER TABLE `warehouse_stocks`
  ADD CONSTRAINT `warehouse_stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `warehouse_stocks_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
