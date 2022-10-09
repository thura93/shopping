-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 03:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'MSI', '2022-09-25 10:46:41', '2022-09-25 10:46:41'),
(2, 'Acer', '2022-09-25 10:46:53', '2022-09-25 10:46:53'),
(3, 'ASUS', '2022-09-25 10:47:15', '2022-09-25 10:47:15'),
(4, 'LG', '2022-09-25 10:47:44', '2022-09-25 10:47:44'),
(5, 'Dell', '2022-09-25 10:47:55', '2022-09-25 10:47:55'),
(6, 'Oppo', '2022-09-25 10:48:10', '2022-09-25 10:48:10'),
(7, 'Vivo', '2022-09-25 10:48:20', '2022-09-25 10:48:20'),
(8, 'AOC', '2022-09-25 10:48:37', '2022-09-25 10:48:37'),
(9, 'Lenovo', '2022-09-25 15:52:10', '2022-09-25 15:52:10'),
(10, 'Mi', '2022-09-25 15:52:21', '2022-09-25 15:52:21'),
(11, 'Nokia', '2022-09-25 15:53:07', '2022-09-25 15:53:07'),
(12, 'Hp', '2022-09-25 16:02:44', '2022-09-25 16:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '2022-09-25 08:06:41', '2022-09-25 08:06:41'),
(2, 'Monitor', '2022-09-25 08:06:51', '2022-09-25 08:06:51'),
(3, 'Mobile Phone', '2022-09-25 08:07:02', '2022-09-25 08:07:02'),
(4, 'TV', '2022-09-25 15:53:30', '2022-09-25 15:53:30'),
(5, 'Mother Board', '2022-09-25 15:53:51', '2022-09-25 15:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `township_id` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `township_id`, `address`, `status`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Thura', 'thuratech087@gmail.com', '09-407311874', 19, 'No.33, Zay Street, Myo Ma (2) Quarters, Dalla Township, Yangon.', 1, '447', '2022-09-30 19:45:01', '2022-09-30 23:36:21'),
(2, 'Swe Swe', 'swemar@gmail.com', '09-407311872', 32, 'No.45, Min Street, (11) Quarters, Kamayut Township, Yangon.', 0, '2316', '2022-09-30 20:05:54', '2022-10-01 13:10:24'),
(3, 'Aung Aung', 'aungaung@gmail.com', '09-54753658', 28, 'No.234, 36 Street, 10 Quarters, Pabedan T/s, Yangon.', 0, '750', '2022-10-01 13:15:46', '2022-10-01 13:15:46'),
(4, 'Zin Myo', 'zinmyo@gmail.com', '09-698565825', 25, 'Kyimyindaung Township, Yangon.', 0, '250', '2022-10-01 13:21:33', '2022-10-01 13:21:33'),
(5, 'ကိုလေး', 'kolay@gmail.com', '09-698574152', 10, 'No.2358, Sabal Street, 2 Quarters, Dawbon T/s, Ygn.', 0, '1200', '2022-10-01 13:44:51', '2022-10-01 15:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `qty`) VALUES
(1, 9, 1, 1),
(2, 3, 1, 1),
(3, 6, 2, 2),
(4, 1, 3, 1),
(5, 4, 4, 1),
(6, 5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `image_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `keywords`, `status`, `category_id`, `brand_id`, `image_1`, `image_2`, `image_3`, `created_at`, `updated_at`) VALUES
(1, 'Dell Inspiron 3576 (i3) 8th Gen (W/G)', '<ul><li>8th Gen; Intel Core i3- 8130U (4M Cache,2.2GHz up to 2.7 GHz )</li><li>4GB DDR4, 1TB HDD,</li><li>15.6” HD LED LCD, DVD R/W</li><li>Intel HD Graphics</li><li>4 Cells Battery</li></ul>', '750', 'dell, laptop, inspiron 3576, i3 8th gen, 4gb ddr4, 1tb hdd, 15.6\"', 'true', 1, 5, 'Dell Inspiron 3576 (i3) 8th Gen 1.jpeg', 'Dell Inspiron 3576 (i3) 8th Gen 2.jpeg', 'Dell Inspiron 3576 (i3) 8th Gen 3.jpg', '2022-09-25 11:02:21', '2022-09-25 11:02:21'),
(2, 'Acer Aspire 5G-A515 (i5) 10th', '<ul><li>10th Generation Intel Core i5-10210U</li><li>(6MB Cache , up to 4.20GHz)</li><li>4GB DDR4 ,1TB H.D.D</li><li>15.6”FHD Display,</li><li>Nvidia GeForce MX250 2GB</li><li>4 Cell Battery<br>&nbsp;</li></ul>', '980', 'acer, laptop, aspire 5g a515, i5 10th gen, 4gb ddr4, 1tb hdd, 15.6\"', 'true', 1, 2, 'Acer Aspire 5G-A515 (i5) 10th 1.jpg', 'Acer Aspire 5G-A515 (i5) 10th 2.jpg', 'Acer Aspire 5G-A515 (i5) 10th 3.jpg', '2022-09-25 15:49:36', '2022-09-25 15:49:36'),
(3, 'Vivo Y19', '<ul><li>Mediatek MT 6768</li><li>Android 9.0 (Pie)</li><li>4GB/128GB</li><li>16MP+8MP+2MP,</li><li>Front 16MP</li><li>6.53 inches(1080×2340)</li><li>Battery Li-Ion 5000 mAh<br>&nbsp;</li></ul>', '287', 'mobile phone, vivo, y19', 'true', 3, 7, 'Vivo Y19 1.jpg', 'Vivo Y19 2.jpg', 'Vivo Y19 3.jpg', '2022-09-25 15:51:41', '2022-09-25 15:51:41'),
(4, 'Oppo A5S (4/64GB)', '<ul><li>Octa-core (2.0 GHz)</li><li>Android 9.0 (Pie)</li><li>Internal 64 GB</li><li>4GB RAM</li><li>13MP+2MP, Front 5 MP</li><li>6.22 inches</li><li>Battery Li-Ion 4230 mAh</li></ul>', '250', 'mobile phone, oppo a5s, 4/64gb', 'true', 3, 6, 'Oppo A5S (4-64GB)_1.jpg', 'Oppo A5S (4-64GB)_2.jpg', 'Oppo A5S (4-64GB)_3.jpg', '2022-09-25 15:55:24', '2022-09-25 15:55:24'),
(5, 'MSI GS75 Stealth 9SG (i7) 9th Gen', '<ul><li>9th Gen; Intel Core i7 9750H</li><li>32GB DDR4, SSD 1TB H.D.D</li><li>17.3” FHD Display,</li><li>Windows 10 Home 64bit</li><li>Nvida Geforce RTX-2080 8GB GDDR6</li><li>3 Cell Battery.</li></ul>', '1200', 'laptop, msi, gs75 stealth 75g, i7 9th gen', 'true', 1, 1, 'MSI GS75 Stealth 9SG (i7) 9th Gen 1.jpg', 'MSI GS75 Stealth 9SG (i7) 9th Gen 2.jpg', 'MSI GS75 Stealth 9SG (i7) 9th Gen 3.png', '2022-09-25 15:57:01', '2022-09-25 15:57:01'),
(6, 'Asus X545FJ-EJ012T/013T (i7) 10th Gen', '<ul><li>10th Gen Intel Core i7-1050U</li><li>(8MB Cache, up to 4.9 GHz)</li><li>8GB DDR4 , 1TB H.D.D,</li><li>Windows 10 Home 64-bit</li><li>15.6” FHD Display,</li><li>Nvidia GeForce MX 230 2GB</li><li>2 Cells Battery.</li></ul>', '1158', 'laptop, asus, x545fj ej0, i7 10th gen', 'true', 1, 3, 'Asus X545FJ-EJ012T-013T (i7) 10th Gen 1.jpg', 'Asus X545FJ-EJ012T-013T (i7) 10th Gen 2.jpg', 'Asus X545FJ-EJ012T-013T (i7) 10th Gen 3.jpg', '2022-09-25 15:59:35', '2022-09-25 15:59:35'),
(7, 'HP Elite Book 745 G5', '<ul><li>AMD Ryzen 5 Pro 2500U</li><li>(2.0GHZ up to 3.6GHZ, 14nm Archi)</li><li>4GB DDR4, 256GB SSD,</li><li>Radeon Vega 8 Graphics</li><li>Finger Print System</li><li>14” FHD Display,No Drive,</li><li>3 Cell Battery.</li></ul>', '795', 'laptop, hp, hp elite book 745 g5', 'true', 1, 12, 'HP Elite Book 745 G5 1.jpg', 'HP Elite Book 745 G5 2.jpg', 'HP Elite Book 745 G5 3.jpg', '2022-09-25 16:04:29', '2022-09-25 16:04:29'),
(8, 'LG 29WK600', '<ul><li>Screen Size : 29″</li><li>Resolution : 2560 x 1080</li><li>Contrast Ratio : 1,000:1 (typ)</li><li>Response Time : 5ms</li><li>Brightness : 300(Typ), 240(min) cd/m2</li><li>Panel Type : IPS</li><li>Ports &amp; Connectors : HDMI, Display Port, Headphone Out</li><li>Power Consumption (max) : 32W</li><li>Warranty : 3 Years<br>&nbsp;</li></ul>', '230', 'monitor, lg, lg monitor, 29\", lg 29wk600', 'true', 2, 4, 'LG 29WK600 1.jpg', 'LG 29WK600 2.jpg', 'LG 29WK600 3.png', '2022-09-25 16:07:32', '2022-09-25 16:07:32'),
(9, 'AOC 24V2H', '<ul><li>Screen Size : 23.8″ &nbsp;&nbsp;</li><li>Resolution : 1920×1080 PX @75Hz &nbsp;&nbsp;</li><li>Contrast Ratio : 20,000,000:1 &nbsp;&nbsp;</li><li>Response Time : 5 ms &nbsp;&nbsp;</li><li>Brightness : 250 cd/m² &nbsp;</li><li>&nbsp;Backlight : W-LED &nbsp;&nbsp;</li><li>Panel Type : IPS &nbsp;&nbsp;</li><li>Ports &amp; Connectors : HDMI 1.4 x 1, VGA / Headphone out (3.5mm) &nbsp;</li><li>&nbsp;Power : 100 – 240V 50/60Hz &nbsp;&nbsp;</li><li>Warranty : 3 Years</li></ul>', '160', 'monitor, aoc, aoc 23.8\",ips monitor', 'true', 2, 8, 'AOC 24V2H1.jpg', 'AOC 24V2H2.png', 'AOC 24V2H3.png', '2022-09-25 16:09:55', '2022-09-25 16:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Customer', '2022-09-25 08:04:39', '2022-09-25 08:04:39'),
(2, 'Staff', '2022-09-25 08:04:57', '2022-09-25 08:04:57'),
(3, 'Manager', '2022-09-25 08:05:50', '2022-09-25 08:05:50'),
(4, 'Admin', '2022-09-25 08:05:58', '2022-09-25 08:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `townships`
--

CREATE TABLE `townships` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `townships`
--

INSERT INTO `townships` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Botataung Township', '2022-09-28 15:35:28', '2022-09-28 15:35:28'),
(2, 'Dagon Seikkan Township', '2022-09-28 15:36:03', '2022-09-28 15:36:03'),
(3, 'East Dagon Township', '2022-09-28 15:36:45', '2022-09-28 15:36:45'),
(4, 'North Dagon Township', '2022-09-28 15:37:26', '2022-09-28 15:37:26'),
(5, 'Nouth Okkalapa Township', '2022-09-28 15:47:30', '2022-09-28 15:47:30'),
(6, 'Pazundaung Township', '2022-09-28 15:48:28', '2022-09-28 15:48:28'),
(7, 'South Dagon Township', '2022-09-28 16:09:21', '2022-09-28 16:09:21'),
(8, 'South Okkalapa Township', '2022-09-28 16:09:48', '2022-09-28 16:09:48'),
(9, 'Thingaungyun Township', '2022-09-28 16:10:30', '2022-09-28 16:10:30'),
(10, 'Dawbon Township', '2022-09-28 16:10:55', '2022-09-28 16:10:55'),
(11, 'Mingala Taungnyunt Township', '2022-09-28 16:12:07', '2022-09-28 16:12:07'),
(12, 'Tamwe Township', '2022-09-28 16:12:35', '2022-09-28 16:12:35'),
(13, 'Thaketa Township', '2022-09-28 16:13:12', '2022-09-28 16:13:12'),
(14, 'Yankin Township', '2022-09-28 16:13:31', '2022-09-28 16:13:31'),
(15, 'Hlaingthaya Township', '2022-09-28 16:13:53', '2022-09-28 16:13:53'),
(16, 'Insein Township', '2022-09-28 16:14:06', '2022-09-28 16:14:06'),
(17, 'Mingaladon Township', '2022-09-28 16:14:24', '2022-09-28 16:14:24'),
(18, 'Shwepyitha Township', '2022-09-28 16:14:44', '2022-09-28 16:14:44'),
(19, 'Dalla Township', '2022-09-28 16:15:19', '2022-09-28 16:15:19'),
(20, 'Seikkyi Kanaungto Township', '2022-09-28 16:15:56', '2022-09-28 16:15:56'),
(21, 'Ahlon Township', '2022-09-28 16:16:58', '2022-09-28 16:16:58'),
(22, 'Bahan Township', '2022-09-28 16:17:12', '2022-09-28 16:17:12'),
(23, 'Dagon Township', '2022-09-28 16:17:26', '2022-09-28 16:17:26'),
(24, 'Kyauktada Township', '2022-09-28 16:18:24', '2022-09-28 16:18:24'),
(25, 'Kyimyindaing Township', '2022-09-28 16:18:52', '2022-09-28 16:18:52'),
(26, 'Lanmadaw Township', '2022-09-28 16:19:20', '2022-09-28 16:19:20'),
(27, 'Latha Township', '2022-09-28 16:20:08', '2022-09-28 16:20:08'),
(28, 'Pabedan Township', '2022-09-28 16:20:31', '2022-09-28 16:20:31'),
(29, 'Sanchaung Township', '2022-09-28 16:20:49', '2022-09-28 16:20:49'),
(30, 'Seikkan Township', '2022-09-28 16:21:15', '2022-09-28 16:21:15'),
(31, 'Hlaing Township', '2022-09-28 16:21:41', '2022-09-28 16:21:41'),
(32, 'Kamayut Township', '2022-09-28 16:21:54', '2022-09-28 16:21:54'),
(33, 'Mayangon Township', '2022-09-28 16:22:30', '2022-09-28 18:05:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `townships`
--
ALTER TABLE `townships`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `townships`
--
ALTER TABLE `townships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
