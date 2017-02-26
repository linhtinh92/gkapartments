-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2017 at 03:32 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `images`, `description`, `link`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Kid’s Fashion', '/public/upload/images/348-blog2-370x224.jpg', 'Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable, that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'',', '#', 1, '2016-12-16 22:10:24', '2016-12-16 22:10:24'),
(3, 'Men''s Colections', '/public/upload/images/449-blog1-370x224.jpg', '  Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable, that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', ', '#', 1, '2016-12-16 22:10:59', '2016-12-16 22:10:59'),
(4, 'Men’s Fashion', '/public/upload/images/902-blog3-370x224.jpg', '  Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable, that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', ', '#', 1, '2016-12-16 22:11:43', '2016-12-16 22:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `brand_logos`
--

CREATE TABLE `brand_logos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand_logos`
--

INSERT INTO `brand_logos` (`id`, `title`, `images`, `link`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Brand Logo A', 'public/upload/images/159-brand1-175x72.png', '#', 1, '2016-12-16 22:22:56', '2016-12-16 22:22:56'),
(3, 'Brand Logo B', 'public/upload/images/267-brand2-175x72.png', '#', 1, '2016-12-16 22:23:08', '2016-12-16 22:23:08'),
(4, 'Brand Logo C', 'public/upload/images/576-brand3-175x72.png', '#', 1, '2016-12-16 22:23:20', '2016-12-16 22:23:20'),
(5, 'Brand Logo D', 'public/upload/images/623-brand4-175x72.png', '#', 1, '2016-12-16 22:23:30', '2016-12-16 22:23:30'),
(6, 'Brand Logo E', 'public/upload/images/983-brand5-175x72.png', '#', 1, '2016-12-16 22:23:43', '2016-12-16 22:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `checkout_id`, `product_name`, `product_qty`, `product_avatar`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-18 19:53:49', '2016-12-18 19:53:49'),
(2, 2, 2, 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-18 20:03:19', '2016-12-18 20:03:19'),
(3, 2, 3, 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-18 20:03:54', '2016-12-18 20:03:54'),
(4, 2, 4, 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-18 20:05:08', '2016-12-18 20:05:08'),
(5, 2, 5, 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-18 20:12:57', '2016-12-18 20:12:57'),
(6, 2, 6, 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-18 20:19:38', '2016-12-18 20:19:38'),
(7, 2, 7, 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-18 20:29:49', '2016-12-18 20:29:49'),
(8, 2, 8, 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-18 20:36:55', '2016-12-18 20:36:55'),
(9, 2, 9, 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-18 20:46:18', '2016-12-18 20:46:18'),
(10, 8, 10, 'Pellentesque Habitant', '1', 'public/upload/images/409-7.jpg', '1000000', '2016-12-18 23:58:40', '2016-12-18 23:58:40'),
(11, 6, 10, 'Pleasure Rationally', '3', 'public/upload/images/494-15_1_4.jpg', '1000000', '2016-12-18 23:58:40', '2016-12-18 23:58:40'),
(12, 8, 1, 'Pellentesque Habitant', '4', 'public/upload/images/409-7.jpg', '1000000', '2016-12-19 00:07:26', '2016-12-19 00:07:26'),
(13, 3, 1, 'Fusce Aliquam', '2', 'public/upload/images/684-1.jpg', '10000000', '2016-12-19 00:07:26', '2016-12-19 00:07:26'),
(14, 5, 1, 'Aptent Taciti', '1', 'public/upload/images/810-17_1_3.jpg', '100000', '2016-12-19 00:07:26', '2016-12-19 00:07:26'),
(15, 6, 2, 'Pleasure Rationally', '1', 'public/upload/images/494-15_1_4.jpg', '1000000', '2016-12-19 01:19:47', '2016-12-19 01:19:47'),
(16, 6, 3, 'Pleasure Rationally', '1', 'public/upload/images/494-15_1_4.jpg', '1000000', '2016-12-19 01:20:10', '2016-12-19 01:20:10'),
(17, 6, 4, 'Pleasure Rationally', '1', 'public/upload/images/494-15_1_4.jpg', '1000000', '2016-12-19 01:20:47', '2016-12-19 01:20:47'),
(18, 8, 5, 'Pellentesque Habitant', '1', 'public/upload/images/409-7.jpg', '1000000', '2016-12-19 01:37:32', '2016-12-19 01:37:32'),
(19, 4, 5, 'Vulputate Mollis', '1', 'public/upload/images/172-19_1_5.jpg', '1000000', '2016-12-19 01:37:32', '2016-12-19 01:37:32'),
(20, 3, 5, 'Fusce Aliquam', '1', 'public/upload/images/684-1.jpg', '10000000', '2016-12-19 01:37:32', '2016-12-19 01:37:32'),
(21, 7, 5, 'Cras Neque Metus', '1', 'public/upload/images/607-9_1_2.jpg', '100000', '2016-12-19 01:37:32', '2016-12-19 01:37:32'),
(22, 8, 6, 'Pellentesque Habitant', '1', 'public/upload/images/409-7.jpg', '1000000', '2016-12-19 01:38:57', '2016-12-19 01:38:57'),
(23, 8, 7, 'Pellentesque Habitant', '1', 'public/upload/images/409-7.jpg', '1000000', '2016-12-19 01:40:25', '2016-12-19 01:40:25'),
(24, 3, 7, 'Fusce Aliquam', '1', 'public/upload/images/684-1.jpg', '10000000', '2016-12-19 01:40:25', '2016-12-19 01:40:25'),
(25, 8, 8, 'Pellentesque Habitant', '1', 'public/upload/images/409-7.jpg', '1000000', '2016-12-19 01:44:23', '2016-12-19 01:44:23'),
(26, 7, 8, 'Cras Neque Metus', '1', 'public/upload/images/607-9_1_2.jpg', '100000', '2016-12-19 01:44:23', '2016-12-19 01:44:23'),
(27, 4, 8, 'Vulputate Mollis', '1', 'public/upload/images/172-19_1_5.jpg', '1000000', '2016-12-19 01:44:24', '2016-12-19 01:44:24'),
(28, 5, 8, 'Aptent Taciti', '1', 'public/upload/images/810-17_1_3.jpg', '100000', '2016-12-19 01:44:24', '2016-12-19 01:44:24'),
(29, 4, 9, 'Vulputate Mollis', '1', 'public/upload/images/172-19_1_5.jpg', '1000000', '2016-12-20 08:17:53', '2016-12-20 08:17:53'),
(30, 8, 10, 'Pellentesque Habitant', '1', 'public/upload/images/409-7.jpg', '1000000', '2016-12-20 08:18:49', '2016-12-20 08:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `site_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_description` text COLLATE utf8_unicode_ci,
  `site_keyword` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `parent`, `site_title`, `site_description`, `site_keyword`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Phòng Ngủ', 'phong-ngu', 0, 'Phòng Ngủ', 'Phòng Ngủ', 'Phòng Ngủ', 1, '2016-12-15 08:22:26', '2016-12-18 22:09:22'),
(7, 'Sunglasses', 'sunglasses', 6, 'Sunglasses', 'Sunglasses', 'Sunglasses', 1, '2016-12-16 19:48:56', '2016-12-16 20:08:47'),
(8, 'livingroom', 'livingroom', 0, 'livingroom', 'livingroom', 'livingroom', 1, '2016-12-16 19:49:05', '2016-12-16 20:11:06'),
(9, 'Belts', 'belts', 8, 'Belts', 'Belts', 'Belts', 1, '2016-12-16 19:49:16', '2016-12-16 20:11:37'),
(10, 'Gold Necklaces', 'gold-necklaces', 6, 'Gold Necklaces', 'Gold Necklaces', 'Gold Necklaces', 1, '2016-12-16 20:10:04', '2016-12-16 20:10:04'),
(11, 'Platinum Necklaces', 'platinum-necklaces', 6, 'Platinum Necklaces', 'Platinum Necklaces', 'Platinum Necklaces', 1, '2016-12-16 20:10:22', '2016-12-16 20:10:22'),
(12, 'Silver Necklaces', 'silver-necklaces', 6, 'Silver Necklaces', 'Silver Necklaces', 'Silver Necklaces', 1, '2016-12-16 20:10:40', '2016-12-16 20:10:40'),
(13, 'Cold Weather', 'cold-weather', 8, 'Cold Weather', 'Cold Weather', 'Cold Weather', 1, '2016-12-16 20:11:56', '2016-12-16 20:11:56'),
(14, 'Lighting', 'lighting', 0, 'Lighting', 'Lighting', 'Lighting', 1, '2016-12-16 20:12:21', '2016-12-16 20:12:21'),
(15, 'Sundresses', 'sundresses', 14, 'Sundresses', 'Sundresses', 'Sundresses', 1, '2016-12-16 20:13:06', '2016-12-16 20:13:06'),
(16, 'Dresser', 'dresser', 0, 'Dresser', 'Dresser', 'Dresser', 1, '2016-12-16 20:13:42', '2016-12-16 20:13:42'),
(17, 'Evening', 'evening', 16, 'Evening', 'Evening', 'Evening', 1, '2016-12-16 20:13:59', '2016-12-16 20:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` int(11) NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtotal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` int(11) NOT NULL,
  `checkout_type` int(11) NOT NULL DEFAULT '0',
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `fullname`, `company_name`, `email`, `code`, `phone`, `province`, `total`, `subtotal`, `district`, `checkout_type`, `address`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nguyen Vu linh', '', 'linhtinh.it.92@gmail.com', 'JM47WZNFN0', '0933910461', 1, '24,100,000.0', '24,100,000.0', 2, 0, '435 Hoang Van Thu', '', 0, '2016-12-19 00:07:26', '2016-12-19 00:30:21'),
(2, 'Nguyen Vu linh', '', 'linhtinh.it.92@gmail.com', 'SC017KQKYV', '0933910461', 1, '1,000,000.0', '1,000,000.0', 2, 0, '435 Hoang Van Thu', '', 0, '2016-12-19 01:19:47', '2016-12-19 01:19:47'),
(3, 'Nguyen Vu linh', '', 'linhtinh.it.92@gmail.com', '5C5I5ED705', '0933910461', 1, '1,000,000.0', '1,000,000.0', 2, 0, '435 Hoang Van Thu', '', 0, '2016-12-19 01:20:10', '2016-12-19 01:20:10'),
(4, 'Nguyen Vu linh', '', 'linhtinh.it.92@gmail.com', 'R5NLU3C7Q7', '0933910461', 1, '1,000,000.0', '1,000,000.0', 2, 0, '435 Hoang Van Thu', '', 0, '2016-12-19 01:20:47', '2016-12-19 01:20:47'),
(5, 'Linh', '', 'linhtinh.it.92@gmail.com', 'C57SF8LXM1', '0933910461', 1, '12,100,000.0', '12,100,000.0', 2, 0, 'Tây ninh', 'nhanh', 0, '2016-12-19 01:37:32', '2016-12-19 01:37:32'),
(6, 'Linh', '', 'linhtinh.it.92@gmail.com', 'AH4E73POTU', '0933910461', 1, '1,000,000.0', '1,000,000.0', 2, 0, 'Tây ninh', '', 0, '2016-12-19 01:38:57', '2016-12-19 01:38:57'),
(7, 'Linh', '', 'linhtinh.it.92@gmail.com', 'IN5ABQMKCQ', '0933910461', 1, '11,000,000.0', '11,000,000.0', 2, 0, 'Tây ninh', '', 0, '2016-12-19 01:40:25', '2016-12-19 01:40:25'),
(8, 'Nguyen Vu linh', '', 'linhtinh.it.92@gmail.com', '8991EHCF5R', '0933910461', 1, '2,200,000.0', '2,200,000.0', 2, 0, '435 Hoang Van Thu', '', 0, '2016-12-19 01:44:23', '2016-12-19 01:44:23'),
(9, 'Linh', '', 'linhtinh.it.92@gmail.com', 'FURA-5G85', '0933910461', 1, '1,000,000.0', '1,000,000.0', 2, 0, 'Tây ninh', '', 0, '2016-12-20 08:17:53', '2016-12-20 08:17:53'),
(10, 'Linh', '', 'linhtinh.it.92@gmail.com', 'FURA-3JY3', '0933910461', 1, '1,000,000.0', '1,000,000.0', 2, 0, 'Tây ninh', '', 0, '2016-12-20 08:18:49', '2016-12-20 08:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option_value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `option_key`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'site_title', 'sadasd', '2016-12-14 07:33:25', '2016-12-14 07:33:25'),
(2, 'site_description', 'asdasd', '2016-12-14 07:41:33', '2016-12-14 07:41:33'),
(3, 'site_keyword', 'asd,asdasd,asdfas,sdf', '2016-12-14 07:53:29', '2016-12-14 08:07:04'),
(4, 'email_receives_feedback', 'linhtinh.it.92@gmail.com', '2016-12-14 07:56:19', '2016-12-14 07:56:19'),
(5, 'phone_number', '+8493391046', '2016-12-14 07:58:48', '2016-12-18 02:20:39'),
(6, 'tag_line', 'asd', '2016-12-16 19:35:25', '2016-12-16 19:35:25'),
(7, 'sub_money', 'VND', '2016-12-16 21:33:50', '2016-12-16 21:33:50'),
(8, 'company_name', 'Cendo', '2016-12-18 02:17:20', '2016-12-18 02:18:12'),
(9, 'address', 'số 249 Cộng Hoà, phường 13, quận Tân Bình, Tp.HCM', '2016-12-18 02:17:20', '2016-12-18 02:19:12'),
(10, 'longitude', '10.801936', '2016-12-18 02:17:20', '2016-12-18 02:20:39'),
(11, 'latitude', '106.647350', '2016-12-18 02:17:20', '2016-12-18 02:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fullname`, `address`, `email`, `phone`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', 'ádasd', 1, '2016-12-18 02:58:36', '2016-12-18 23:20:17'),
(2, 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', '123123', 0, '2016-12-18 03:07:13', '2016-12-18 03:07:13'),
(3, 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', 'ádasd', 0, '2016-12-18 03:11:56', '2016-12-18 03:11:56'),
(4, 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', 'ádasd', 0, '2016-12-18 03:16:15', '2016-12-18 03:16:15'),
(5, 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', 'ádasd', 1, '2016-12-18 03:16:34', '2016-12-18 23:20:24'),
(6, 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', 'dfgdfgdfg', 1, '2016-12-18 03:19:16', '2016-12-18 23:20:14'),
(7, 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', 'ádasd', 0, '2016-12-18 03:44:26', '2016-12-18 03:44:26'),
(8, 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', 'ádasd', 0, '2016-12-18 03:45:55', '2016-12-18 03:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `title`, `parent`, `type`, `created_at`, `updated_at`) VALUES
(1, 'TP Hồ Chí Minh', 0, 'TP', '2016-12-18 08:36:34', '2016-12-18 08:36:34'),
(2, 'Tân Bình', 1, 'Quận', '2016-12-18 08:37:42', '2016-12-18 08:37:42'),
(3, 'Bình Tân', 1, 'Quận', '2016-12-18 16:23:19', '2016-12-18 16:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_12_11_015849_create_shoppingcart_table', 1),
('2016_12_12_160611_create_users_table', 1),
('2016_12_14_095304_create_sliders_table', 1),
('2016_12_14_102626_create_blogs_table', 1),
('2016_12_14_140006_create_configs_table', 2),
('2016_12_14_150753_create_brand_logos_table', 3),
('2016_12_14_153240_create_categories_table', 4),
('2016_12_14_161506_create_products_table', 5),
('2016_12_16_090454_create_product_metas_table', 5),
('2016_12_17_150113_create_shoppingcart_table', 6),
('2016_12_18_092809_create_contacts_table', 6),
('2016_12_18_152743_create_locations_table', 7),
('2016_12_18_150553_create_carts_table', 10),
('2016_12_18_150608_create_checkouts_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `price_sale` double NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `site_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_description` text COLLATE utf8_unicode_ci,
  `site_keyword` text COLLATE utf8_unicode_ci,
  `featured_product` tinyint(4) NOT NULL DEFAULT '0',
  `new_product` tinyint(4) NOT NULL DEFAULT '0',
  `bestseller_product` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `title`, `slug`, `price`, `price_sale`, `avatar`, `description`, `content`, `site_title`, `site_description`, `site_keyword`, `featured_product`, `new_product`, `bestseller_product`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'Sed Diam', 'sed-diam', 100, 0, 'public/upload/images/607-4-539x761.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio...', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue. Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>\r\n', '', '', '', 1, 1, 1, 1, '2016-12-16 20:50:56', '2016-12-16 21:05:14'),
(2, 6, 'Adipiscing Elit', 'adipiscing-elit', 200, 100, 'public/upload/images/414-3-539x761.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio...', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue. Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>\r\n', '', '', '', 1, 1, 1, 1, '2016-12-16 21:56:20', '2016-12-17 04:21:00'),
(3, 6, 'Fusce Aliquam', 'fusce-aliquam', 10000000, 0, 'public/upload/images/684-1.jpg', 'Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem ...', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue. Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>\r\n', 'Fusce Aliquam', 'Fusce Aliquam', 'Fusce Aliquam', 1, 1, 1, 1, '2016-12-18 20:56:33', '2016-12-18 21:02:51'),
(4, 6, 'Vulputate Mollis', 'vulputate-mollis', 1000000, 0, 'public/upload/images/172-19_1_5.jpg', 'Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem ...', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>\r\n', 'Vulputate Mollis', 'Vulputate Mollis', 'Vulputate Mollis', 1, 1, 1, 1, '2016-12-18 21:11:04', '2016-12-18 21:20:43'),
(5, 6, 'Aptent Taciti', 'aptent-taciti', 100000, 0, 'public/upload/images/810-17_1_3.jpg', 'Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem ...', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>\r\n', 'Aptent Taciti', 'Aptent Taciti', 'Aptent Taciti', 1, 1, 1, 1, '2016-12-18 21:13:27', '2016-12-18 21:13:27'),
(6, 6, 'Pleasure Rationally', 'pleasure-rationally', 1000000, 0, 'public/upload/images/494-15_1_4.jpg', 'Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem ...', '<p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>\r\n', '', '', '', 1, 1, 1, 1, '2016-12-18 21:14:46', '2016-12-18 21:14:46'),
(7, 6, 'Cras Neque Metus', 'cras-neque-metus', 100000, 0, 'public/upload/images/607-9_1_2.jpg', 'Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem ...', '<p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis. Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>\r\n', '', '', '', 1, 1, 1, 1, '2016-12-18 21:17:54', '2016-12-18 21:17:54'),
(8, 6, 'Pellentesque Habitant', 'pellentesque-habitant', 1000000, 0, 'public/upload/images/409-7.jpg', 'Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem ...', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue. Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>\r\n', '', '', '', 1, 1, 1, 1, '2016-12-18 21:19:09', '2016-12-18 21:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_metas`
--

CREATE TABLE `product_metas` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_metas`
--

INSERT INTO `product_metas` (`id`, `product_id`, `key`, `slug`, `type`, `value`, `created_at`, `updated_at`) VALUES
(9, 1, 'Availability', 'availability', 'img', '/public/upload/images/18-539x761.jpg', '2016-12-16 21:06:45', '2016-12-16 21:06:45'),
(10, 1, 'Brand', 'brand', 'text', 'Apple', '2016-12-16 21:06:45', '2016-12-16 21:06:45'),
(17, 2, 'Adipiscing Elit', 'adipiscing-elit', 'img', '/public/upload/images/10-539x761.jpg', '2016-12-17 04:21:00', '2016-12-17 04:21:00'),
(18, 2, 'Product Code', 'product-code', 'text', '123', '2016-12-17 04:21:00', '2016-12-17 04:21:00'),
(20, 3, 'Fusce Aliquam', 'fusce-aliquam', 'img', '/public/upload/images/535-4-539x761.jpg', '2016-12-18 21:02:51', '2016-12-18 21:02:51'),
(21, 5, 'Availability', 'availability', 'img', '/public/upload/images/10.jpg', '2016-12-18 21:13:27', '2016-12-18 21:13:27'),
(22, 5, 'Adipiscing Elit', 'adipiscing-elit', 'img', '/public/upload/images/9.jpg', '2016-12-18 21:13:27', '2016-12-18 21:13:27'),
(23, 6, 'Adipiscing Elit', 'adipiscing-elit', 'img', '/public/upload/images/684-1.jpg', '2016-12-18 21:14:46', '2016-12-18 21:14:46'),
(24, 7, 'Availability', 'availability', 'img', '/public/upload/images/810-17_1_3.jpg', '2016-12-18 21:17:54', '2016-12-18 21:17:54'),
(25, 8, 'Adipiscing Elit', 'adipiscing-elit', 'img', '/public/upload/images/18-539x761.jpg', '2016-12-18 21:19:09', '2016-12-18 21:19:09'),
(26, 8, 'Availability', 'availability', 'img', '/public/upload/images/10-539x761.jpg', '2016-12-18 21:19:09', '2016-12-18 21:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `images`, `description`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DESIGN FURNITURE', '/public/upload/images/647-DESIGN-FURNITURE.jpg', 'SAVE UP TO 70% A HUGE SELECTION OF FURNITURE', '#', 1, '2016-12-16 19:01:04', '2016-12-16 19:01:04'),
(2, 'DESIGN FURNITURE 2', '/public/upload/images/309-MTDS-Guest-Bedroom-Blue-Sofa-HQ-e1465650262625-1920x658.jpg', 'SAVE UP TO 70% A HUGE SELECTION OF FURNITURE', '#', 1, '2016-12-16 19:01:38', '2016-12-16 19:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `avatar`, `remember_token`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(1, 'linhtinh', '$2y$10$DorBOX2IJVrzmF62w.cLDO6mJc6WXFQfkWijcgS5iIJKG0W9CDP6y', 'Linh', '/public/upload/images/961-THK_3856_1.png', NULL, 1, 1, '2016-12-14 06:58:26', '2016-12-16 08:14:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_logos`
--
ALTER TABLE `brand_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `product_metas`
--
ALTER TABLE `product_metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_metas_product_id_foreign` (`product_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `brand_logos`
--
ALTER TABLE `brand_logos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product_metas`
--
ALTER TABLE `product_metas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_metas`
--
ALTER TABLE `product_metas`
  ADD CONSTRAINT `product_metas_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
