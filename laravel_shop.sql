-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 08:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_shop`
--

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2022_03_30_185637_create_tbl_admin_table', 1),
(4, '2022_04_01_162011_create_tbl_category_product', 2),
(5, '2022_04_02_183423_create_tbl_brand_product', 3),
(6, '2022_04_02_190755_create_tbl_product', 4),
(7, '2022_04_09_045240_create_tbl_costumer', 5),
(8, '2022_04_09_060225_create_tbl_shipping', 6),
(12, '2022_04_10_131536_create_tbl_payment', 7),
(13, '2022_04_10_132203_create_tbl_order_details', 7),
(14, '2022_04_10_132222_create_tbl_order', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(2, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Nam Ha', '0965918874', NULL, NULL),
(3, 'nam@gmail.com', '23fa0fc5b846eb003cd31ad601e51f5f', 'Chanh Nam', '0965918875', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(10, 'Chanel', 'Thương hiệu nổi tiếng Chanel', 1, NULL, NULL),
(11, 'Gucci', 'Thương hiệu nổi tiếng Gucci', 1, NULL, NULL),
(12, 'Adidas', 'Thương hiệu nổi tiếng Adidas', 1, NULL, NULL),
(14, 'Puma', 'Thương hiệu nổi tiếng', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(14, 'Áo thun', 'Áo thun mẫu mới', 1, NULL, NULL),
(15, 'Áo sơ mi', 'Áo khoác sơ mi', 1, NULL, NULL),
(16, 'Giày', 'Giày nhiều loại', 1, NULL, NULL),
(17, 'Quần', 'Quần mẫu mới nhất', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`) VALUES
(30, 'Hà Chánh Nam', 'hachanhnam10@gmail.com', '23fa0fc5b846eb003cd31ad601e51f5f', '0965918874', NULL, NULL),
(31, 'chanhnam0123', 'chanhnam0123@gmail.com', '23fa0fc5b846eb003cd31ad601e51f5f', '0965918874', NULL, NULL),
(32, 'namb1909951', 'namb1909951@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0965918874', NULL, NULL),
(33, 'Hà Chánh Nam', 'hachanhnaam10@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '0965918874', NULL, NULL),
(34, 'Hà Chánh Nam', 'nam1@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0965918874', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(49, 31, 42, 53, '224.40', 'Đã bị hủy', NULL, NULL),
(50, 31, 42, 54, '214.50', 'Đang vận chuyển', NULL, NULL),
(51, 31, 44, 55, '13.20', 'Đang chờ duyệt', NULL, NULL),
(52, 31, 45, 56, '13.20', 'Đang chờ duyệt', NULL, NULL),
(55, 31, 48, 59, '31.90', 'Đang chờ duyệt', NULL, NULL),
(56, 31, 49, 60, '24.20', 'Đang chờ duyệt', NULL, NULL),
(57, 31, 50, 61, '24.20', 'Đang chờ duyệt', NULL, NULL),
(58, 31, 50, 62, '24.20', 'Đang chờ duyệt', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(54, 49, 34, 'Giày đen Puma Mẫu 4', '24', 1, NULL, NULL),
(55, 49, 50, 'Áo sơ mi nâu', '15', 12, NULL, NULL),
(56, 50, 50, 'Áo sơ mi nâu', '15', 13, NULL, NULL),
(57, 51, 60, 'giay 2 chiec', '12', 1, NULL, NULL),
(58, 52, 60, 'giay 2 chiec', '12', 1, NULL, NULL),
(62, 55, 36, 'Giày Thể Thao Puma Mẫu 2', '29', 1, NULL, NULL),
(63, 56, 51, 'Áo sơ mi xanh', '22', 1, NULL, NULL),
(64, 57, 51, 'Áo sơ mi xanh', '22', 1, NULL, NULL),
(65, 58, 51, 'Áo sơ mi xanh', '22', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` int(11) NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(53, 2, 'Đang chờ duyệt', NULL, NULL),
(54, 3, 'Đang chờ duyệt', NULL, NULL),
(55, 1, 'Đang chờ duyệt', NULL, NULL),
(56, 1, 'Đang chờ duyệt', NULL, NULL),
(57, 1, 'Đang chờ duyệt', NULL, NULL),
(58, 1, 'Đang chờ duyệt', NULL, NULL),
(59, 3, 'Đang chờ duyệt', NULL, NULL),
(60, 1, 'Đang chờ duyệt', NULL, NULL),
(61, 1, 'Đang chờ duyệt', NULL, NULL),
(62, 1, 'Đang chờ duyệt', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_inventory` int(11) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_inventory`, `category_id`, `brand_id`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(31, 'Giày Puma Mẫu 1', -1, 16, 14, '.', '.', '28', 'giay139.jpg', 1, NULL, NULL),
(34, 'Giày đen Puma Mẫu 4', 99, 16, 14, '.', '.', '24', 'giay492.jpg', 1, NULL, NULL),
(36, 'Giày Thể Thao Puma Mẫu 2', 99, 16, 14, '.', '.', '29', 'giay697.jpg', 1, NULL, NULL),
(39, 'Giày Adidas Xanh mẫu 1', 100, 16, 12, '.', '.', '25', 'giaya587.jpg', 1, NULL, NULL),
(41, 'Giày Adidas Nâu mẫu 1', 100, 16, 12, '.', '.', '23', 'giaya862.jpg', 1, NULL, NULL),
(42, 'Giày Adidas Trắng mẫu 2', 100, 16, 12, '.', '.', '34', 'giaya629.jpg', 1, NULL, NULL),
(49, 'Áo sơ mi sọc', 77, 15, 11, '.', '.', '23', 's379.jpg', 1, NULL, NULL),
(50, 'Áo sơ mi nâu', 61, 15, 10, '.', '.', '15', 's528.jpg', 1, NULL, NULL),
(51, 'Áo sơ mi xanh', 96, 15, 11, '.', '100', '22', 's670.jpg', 1, NULL, NULL),
(60, 'giay 2 chiec', 108, 15, 11, '.', '.', '12', 'thun12165.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_email`, `shipping_address`, `shipping_phone`, `shipping_message`, `created_at`, `updated_at`) VALUES
(29, 'chanhnam0123', 'chanhnam0123@gmail.com', 'KTX A, ĐHCT', '0965918874', 'Không', NULL, NULL),
(30, 'chanhnam0123', 'chanhnam0123@gmail.com', 'KTX A, ĐHCT', '0965918874', 'Không', NULL, NULL),
(31, 'chanhnam0123', 'chanhnam0123@gmail.com', 'có', '0965918874', 'Không', NULL, NULL),
(32, 'chanhnam0123', 'chanhnam0123@gmail.com', 'có', '0965918874', 'Không', NULL, NULL),
(33, 'chanhnam0123', 'chanhnam0123@gmail.com', 'Không', '0965918874', 'Không', NULL, NULL),
(34, 'chanhnam0123', 'chanhnam0123@gmail.com', 'Không', '0965918874', 'Không', NULL, NULL),
(35, 'chanhnam0123', 'chanhnam0123@gmail.com', 'có', '0965918874', 'Không', NULL, NULL),
(36, 'chanhnam0123', 'chanhnam0123@gmail.com', 'có', '0965918874', 'Không', NULL, NULL),
(37, 'chanhnam0123', 'chanhnam0123@gmail.com', 'có', '0965918874', 'Không', NULL, NULL),
(38, 'chanhnam0123', 'chanhnam0123@gmail.com', 'có', '0965918874', 'Không', NULL, NULL),
(39, 'chanhnam0123', 'chanhnam0123@gmail.com', 'có', '0965918874', 'Không', NULL, NULL),
(40, 'chanhnam0123', 'chanhnam0123@gmail.com', '39', '0965918874', 'Không', NULL, NULL),
(41, 'chanhnam0123', 'chanhnam0123@gmail.com', 'hi', '0965918874', 'có', NULL, NULL),
(42, 'chanhnam0123', 'chanhnam0123@gmail.com', 'Cần Thơ', '0965918874', 'Ship hàng vào buổi trưa', NULL, NULL),
(43, 'chanhnam0123ád', 'chanhnam0123@gmail.com', 'Không', '0965918874', 'Không', NULL, NULL),
(44, 'chanhnam0123', 'chanhnam0123@gmail.com', 'Không', '0965918874', 'Không', NULL, NULL),
(45, 'chanhnam0123', 'chanhnam0123@gmail.com', 'Không', '0965918874', 'Không', NULL, NULL),
(46, 'chanhnam0123', 'chanhnam0123@gmail.com', 'KTX A, ĐHCT', '0965918874', 'Hàng dễ vỡ', NULL, NULL),
(47, 'Hà Chánh Nam', 'nam1@gmail.com', 'Cần thwo', '0965918874', 'Không có', NULL, NULL),
(48, 'chanhnam0123', 'chanhnam0123@gmail.com', 'can tho', '0965918874', '12', NULL, NULL),
(49, 'chanhnam0123', 'chanhnam0123@gmail.com', 'Không', '0965918874', 'Không', NULL, NULL),
(50, 'chanhnam0123', 'chanhnam0123@gmail.com', 'Không', '0965918874', 'Không', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_customer_id_foreign` (`customer_id`),
  ADD KEY `order_shipping_id_foreign` (`shipping_id`),
  ADD KEY `order_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `details_order_id_foreign` (`order_id`),
  ADD KEY `details_product_id_foreign` (`product_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_cate_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `order_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `tbl_payment` (`payment_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `tbl_shipping` (`shipping_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_category_product` (`category_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
