-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2018 at 01:03 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luxshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `image`) VALUES
(2, 'Hưng Còi', 'coi@gmail.com', '39158d08a93108693f9c45afe743a9a2', '2018-07-25 18:11:44', '2018-07-25 19:16:42', ''),
(12, 'Bách B', 'bachbim@gmail.com', 'ae1af6e4d1464ca612cba5ebb9204ed7', '2018-07-25 18:27:02', '2018-07-28 10:51:41', ''),
(13, 'hung', '123@gmail.com', 'bcb81133dddeff1fa0b5d6fbb346a593', '2018-07-25 20:12:27', '2018-07-25 20:12:27', ''),
(14, 'Hưng123', 'vip@gmail.com', 'bcb81133dddeff1fa0b5d6fbb346a593', '2018-07-25 20:13:35', '2018-07-25 20:13:35', '');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `content`, `images`, `status`) VALUES
(1, 'Bộ sưu tập nữ 2018, mùa giải mới', 'images/slide-01.jpg', 1),
(2, 'Áo khoác & Áo da nam, mới', 'images/slide-02.jpg', 1),
(3, 'Bộ sưu tập nam giới 2018, mùa giải mới', 'images/slide-03.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `status`) VALUES
(1, 'Nữ giới', 0, 1),
(2, 'Nam giới', 0, 1),
(3, 'Phụ kiện', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf16_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf16_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `address`, `password`, `gender`, `created`) VALUES
(1, 'Hưng Còi', 'nguyenviethung@gmail.com', '012323923', 'Đông Anh - Hà Nội', 'bcb81133dddeff1fa0b5d6fbb346a593', 1, '2018-07-28 06:41:27'),
(2, 'Blabla', '123hung@gmaill.com', '1232131', 'Kiên Giang - TP.HCM', '4297f44b13955235245b2497399d7a93', 1, '2018-07-28 06:51:57'),
(3, 'hungc oi', 'hh@g', '123123', 'Đông Anh - Hà Nội', '4297f44b13955235245b2497399d7a93', 1, '2018-08-02 23:03:32'),
(4, 'hung', 'hung@gmaill.com', '01232131', 'Đông Anh - Hà Nội', '4297f44b13955235245b2497399d7a93', 1, '2018-08-18 13:50:32'),
(5, 'Hung Vip', 'hung@gmail.com', '01231231', 'Đông Anh - Hà Nội', '4297f44b13955235245b2497399d7a93', 1, '2018-08-18 13:51:21'),
(6, 'sss', 'ss@gmail.com', '123123123', 'Đông Anh - Hà Nội', '4297f44b13955235245b2497399d7a93', 1, '2018-08-26 21:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `created`, `status`) VALUES
(1, 1, '2018-07-28 07:55:27', 0),
(2, 1, '2018-07-28 07:56:41', 0),
(3, 5, '2018-08-18 13:51:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 6, 1, 350000),
(2, 10, 1, 5000000),
(3, 6, 1, 350000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `sale_price` float NOT NULL,
  `images` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `description` text COLLATE utf32_unicode_ci NOT NULL,
  `size` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `color` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `sale_price`, `images`, `description`, `size`, `color`, `featured`, `category_id`, `created`, `status`) VALUES
(4, 'Sơ mi M12', 500000, 0, 'save_images/1532434807product-02.jpg', '  THÔNG TIN SẢN PHẨM:\r\n\r\n- Xuất xứ: Hồng Kong\r\n\r\n- Chất liệu: Kate mềm cao cấp \r\n\r\n-Màu sắc : 100% như hình\r\n-Size : M, L, XL, XXL\r\n-Chi tiết kích thước sản phẩm\r\n➡️Size M: Size M dưới 50kg\r\n➡️Size L: Size L dưới 55kg\r\n➡️Size XL: Size XL dưới 60kg \r\n➡️ Size XXL: Size XXl dưới 65kg\r\n\r\nMÀU SẮC GIỐNG HÌNH 100%\r\n\r\nHÀNG NHẬP TRỰC TIẾP ĐẢM BẢO CHẤT LƯỢNG VÀ GIÁ CẠNH TRANH', 'S, M, L, XL', 'Trắng', 0, 1, '2018-07-24 19:20:07', 1),
(5, 'Váy công sở', 123123, 12321300, 'save_images/1532434962product-05.jpg', '   váy công sở c hất liệu tốt nhất', 'S, M, L, XL', 'Trắng, Vàng, Đen, Hồng', 1, 1, '2018-07-24 19:22:42', 1),
(6, 'Áo sơ mi nam ', 350000, 0, 'save_images/1532435073product-11.jpg', 'Sơ mi nam chất liệu tốt nhất', 'S, M, L, XL', 'Trắng, Xanh, Hồng', 1, 2, '2018-07-24 19:24:33', 1),
(7, 'Áo khoác', 440000, 240000, 'save_images/1532435165product-detail-01.jpg', ' Áo khoác gió chất đẹp', 'S, M, L, XL', 'Trắng, Xanh, Hồng', 4, 2, '2018-07-24 19:26:05', 1),
(8, 'Set Gucci ', 13000000, 0, 'save_images/1532435765suit_men1.png', '    bao gồm : 1 áo vest , 1 quần vest, 1 đôi giày lười , một cala vạt', 'XS, S, M , L, XL', 'Đen, Nâu', 3, 2, '2018-07-24 19:36:05', 1),
(9, 'Set Gucci 2', 15000000, 0, 'save_images/1532435804suit_men2.png', '   bao gồm : 1 áo vest , 1 quần vest, 1 đôi giày lười , một cala vạt', 'XS, S, M , L, XL', 'Đen, Nâu', 0, 2, '2018-07-24 19:36:44', 1),
(10, 'Kính Gucci', 5000000, 0, 'save_images/1532435913glass1.png', 'Chất liệu kính đẹp', 'XS, S, M , L, XL', 'Đen, Nâu', 1, 3, '2018-07-24 19:38:33', 1),
(11, 'Túi xách Gucci', 8000000, 0, 'save_images/1532436001handle-bag_women1.png', '   Chất liệu túi đẹp', '41,42,44', 'Vàng, Hồng', 0, 3, '2018-07-24 19:40:01', 1),
(12, 'Áo phông B1', 300000, 0, 'save_images/1532747922product-01.jpg', '  Mô tả sp:\r\nVới thiết kế đơn giản nhưng không kém phần sang trọng và cá tính\r\n•	Kiểu dáng đa phong cách\r\n•	Đường may tinh tế sắc sảo\r\n•	Áo thun được thiết kế vể đẹp trẻ trung năng động nhưng không kém phần mạnh mẽ.\r\n•	Dễ dàng phối trang phục , thích hợp đi chơi đi làm đi dạo phố\r\n•	Chất vải poly co dãn, áo form rộng thích hợp cả nam và nữ\r\n•	Hàng Việt Nam\r\nBảng size:\r\nSize XS : < 40 kg chiều cao phù hợp từ 1m45 đến 1m6\r\nSize S : < 45 kg chiều cao phù hợp từ 1m5 đến 1m6\r\nSize M : < 55 kg chiều cao phù hợp từ 1m5 đến 1m65\r\nSize L : < 65 kg chiều cao phù hợp từ 1m5 đến 1m7\r\nSize Xl : < 75 kg chiều cao phù hợp từ 1m6 đến 1m75\r\nSize XXL : < 85 kg chiều cao phù hợp từ 1m6 đến 1m8\r\nSize XXXL : >85 kg chiều cao phù hợp từ 1m7 đến 1m85\r\n', 'S, M, L, XL', 'Trắng', 0, 1, '2018-07-28 10:18:42', 1),
(13, 'Áo phông 42', 300000, 0, 'save_images/1532747973product-03.jpg', '   Mô tả sp:\r\nVới thiết kế đơn giản nhưng không kém phần sang trọng và cá tính\r\n•	Kiểu dáng đa phong cách\r\n•	Đường may tinh tế sắc sảo\r\n•	Áo thun được thiết kế vể đẹp trẻ trung năng động nhưng không kém phần mạnh mẽ.\r\n•	Dễ dàng phối trang phục , thích hợp đi chơi đi làm đi dạo phố\r\n•	Chất vải poly co dãn, áo form rộng thích hợp cả nam và nữ\r\n•	Hàng Việt Nam\r\nBảng size:\r\nSize XS : < 40 kg chiều cao phù hợp từ 1m45 đến 1m6\r\nSize S : < 45 kg chiều cao phù hợp từ 1m5 đến 1m6\r\nSize M : < 55 kg chiều cao phù hợp từ 1m5 đến 1m65\r\nSize L : < 65 kg chiều cao phù hợp từ 1m5 đến 1m7\r\nSize Xl : < 75 kg chiều cao phù hợp từ 1m6 đến 1m75\r\nSize XXL : < 85 kg chiều cao phù hợp từ 1m6 đến 1m8\r\nSize XXXL : >85 kg chiều cao phù hợp từ 1m7 đến 1m85\r\n', 'S, M, L, XL', 'Xanh biển', 1, 2, '2018-07-28 10:19:33', 1),
(14, 'Áo choàng B4', 500000, 450000, 'save_images/1532748039product-07.jpg', '    Mô tả sp:\r\nVới thiết kế đơn giản nhưng không kém phần sang trọng và cá tính\r\n•	Kiểu dáng đa phong cách\r\n•	Đường may tinh tế sắc sảo\r\n•	Áo thun được thiết kế vể đẹp trẻ trung năng động nhưng không kém phần mạnh mẽ.\r\n•	Dễ dàng phối trang phục , thích hợp đi chơi đi làm đi dạo phố\r\n•	Chất vải poly co dãn, áo form rộng thích hợp cả nam và nữ\r\n•	Hàng Việt Nam\r\nBảng size:\r\nSize XS : < 40 kg chiều cao phù hợp từ 1m45 đến 1m6\r\nSize S : < 45 kg chiều cao phù hợp từ 1m5 đến 1m6\r\nSize M : < 55 kg chiều cao phù hợp từ 1m5 đến 1m65\r\nSize L : < 65 kg chiều cao phù hợp từ 1m5 đến 1m7\r\nSize Xl : < 75 kg chiều cao phù hợp từ 1m6 đến 1m75\r\nSize XXL : < 85 kg chiều cao phù hợp từ 1m6 đến 1m8\r\nSize XXXL : >85 kg chiều cao phù hợp từ 1m7 đến 1m85\r\n', 'S, M, L, XL', 'Xám', 2, 1, '2018-07-28 10:20:40', 1),
(15, 'Đồng hồ TT12', 5000000, 0, 'save_images/1532748124product-06.jpg', '     Mô tả sp:\r\nVới thiết kế đơn giản nhưng không kém phần sang trọng và cá tính\r\n•	Kiểu dáng đa phong cách\r\n•	Đường may tinh tế sắc sảo\r\n•	Áo thun được thiết kế vể đẹp trẻ trung năng động nhưng không kém phần mạnh mẽ.\r\n•	Dễ dàng phối trang phục , thích hợp đi chơi đi làm đi dạo phố\r\n•	Chất vải poly co dãn, áo form rộng thích hợp cả nam và nữ\r\n•	Hàng Việt Nam\r\nBảng size:\r\nSize XS : < 40 kg chiều cao phù hợp từ 1m45 đến 1m6\r\nSize S : < 45 kg chiều cao phù hợp từ 1m5 đến 1m6\r\nSize M : < 55 kg chiều cao phù hợp từ 1m5 đến 1m65\r\nSize L : < 65 kg chiều cao phù hợp từ 1m5 đến 1m7\r\nSize Xl : < 75 kg chiều cao phù hợp từ 1m6 đến 1m75\r\nSize XXL : < 85 kg chiều cao phù hợp từ 1m6 đến 1m8\r\nSize XXXL : >85 kg chiều cao phù hợp từ 1m7 đến 1m85\r\n', 'S, M, L, XL', 'Xám', 0, 3, '2018-07-28 10:22:04', 1),
(16, 'Áo Croptop T22', 500000, 0, 'save_images/1532748153product-10.jpg', '      Mô tả sp:\r\nVới thiết kế đơn giản nhưng không kém phần sang trọng và cá tính\r\n•	Kiểu dáng đa phong cách\r\n•	Đường may tinh tế sắc sảo\r\n•	Áo thun được thiết kế vể đẹp trẻ trung năng động nhưng không kém phần mạnh mẽ.\r\n•	Dễ dàng phối trang phục , thích hợp đi chơi đi làm đi dạo phố\r\n•	Chất vải poly co dãn, áo form rộng thích hợp cả nam và nữ\r\n•	Hàng Việt Nam\r\nBảng size:\r\nSize XS : < 40 kg chiều cao phù hợp từ 1m45 đến 1m6\r\nSize S : < 45 kg chiều cao phù hợp từ 1m5 đến 1m6\r\nSize M : < 55 kg chiều cao phù hợp từ 1m5 đến 1m65\r\nSize L : < 65 kg chiều cao phù hợp từ 1m5 đến 1m7\r\nSize Xl : < 75 kg chiều cao phù hợp từ 1m6 đến 1m75\r\nSize XXL : < 85 kg chiều cao phù hợp từ 1m6 đến 1m8\r\nSize XXXL : >85 kg chiều cao phù hợp từ 1m7 đến 1m85\r\n', 'S, M, L, XL', 'Đen', 1, 1, '2018-07-28 10:22:33', 1),
(17, 'Giày converse BC1', 1500000, 0, 'save_images/1532748200product-09.jpg', '       Mô tả sp:\r\nVới thiết kế đơn giản nhưng không kém phần sang trọng và cá tính\r\n•	Kiểu dáng đa phong cách\r\n•	Đường may tinh tế sắc sảo\r\n•	Áo thun được thiết kế vể đẹp trẻ trung năng động nhưng không kém phần mạnh mẽ.\r\n•	Dễ dàng phối trang phục , thích hợp đi chơi đi làm đi dạo phố\r\n•	Chất vải poly co dãn, áo form rộng thích hợp cả nam và nữ\r\n•	Hàng Việt Nam\r\nBảng size:\r\nSize XS : < 40 kg chiều cao phù hợp từ 1m45 đến 1m6\r\nSize S : < 45 kg chiều cao phù hợp từ 1m5 đến 1m6\r\nSize M : < 55 kg chiều cao phù hợp từ 1m5 đến 1m65\r\nSize L : < 65 kg chiều cao phù hợp từ 1m5 đến 1m7\r\nSize Xl : < 75 kg chiều cao phù hợp từ 1m6 đến 1m75\r\nSize XXL : < 85 kg chiều cao phù hợp từ 1m6 đến 1m8\r\nSize XXXL : >85 kg chiều cao phù hợp từ 1m7 đến 1m85\r\n', '41,42,43,44,45', 'Đen', 0, 3, '2018-07-28 10:23:20', 1),
(18, 'Áo Cộc BC12', 500000, 250000, 'save_images/1532748266product-16.jpg', '        Mô tả sp:\r\nVới thiết kế đơn giản nhưng không kém phần sang trọng và cá tính\r\n•	Kiểu dáng đa phong cách\r\n•	Đường may tinh tế sắc sảo\r\n•	Áo thun được thiết kế vể đẹp trẻ trung năng động nhưng không kém phần mạnh mẽ.\r\n•	Dễ dàng phối trang phục , thích hợp đi chơi đi làm đi dạo phố\r\n•	Chất vải poly co dãn, áo form rộng thích hợp cả nam và nữ\r\n•	Hàng Việt Nam\r\nBảng size:\r\nSize XS : < 40 kg chiều cao phù hợp từ 1m45 đến 1m6\r\nSize S : < 45 kg chiều cao phù hợp từ 1m5 đến 1m6\r\nSize M : < 55 kg chiều cao phù hợp từ 1m5 đến 1m65\r\nSize L : < 65 kg chiều cao phù hợp từ 1m5 đến 1m7\r\nSize Xl : < 75 kg chiều cao phù hợp từ 1m6 đến 1m75\r\nSize XXL : < 85 kg chiều cao phù hợp từ 1m6 đến 1m8\r\nSize XXXL : >85 kg chiều cao phù hợp từ 1m7 đến 1m85\r\n', 'S, M, L, XL', 'Xám, Trắng', 2, 1, '2018-07-28 10:24:26', 1),
(19, 'Giày nữ BC12', 6000000, 0, 'save_images/1532748323shoes_women11.png', '         Mô tả sp:\r\nVới thiết kế đơn giản nhưng không kém phần sang trọng và cá tính\r\n•	Kiểu dáng đa phong cách\r\n•	Đường may tinh tế sắc sảo\r\n•	Áo thun được thiết kế vể đẹp trẻ trung năng động nhưng không kém phần mạnh mẽ.\r\n•	Dễ dàng phối trang phục , thích hợp đi chơi đi làm đi dạo phố\r\n•	Chất vải poly co dãn, áo form rộng thích hợp cả nam và nữ\r\n•	Hàng Việt Nam\r\nBảng size:\r\nSize XS : < 40 kg chiều cao phù hợp từ 1m45 đến 1m6\r\nSize S : < 45 kg chiều cao phù hợp từ 1m5 đến 1m6\r\nSize M : < 55 kg chiều cao phù hợp từ 1m5 đến 1m65\r\nSize L : < 65 kg chiều cao phù hợp từ 1m5 đến 1m7\r\nSize Xl : < 75 kg chiều cao phù hợp từ 1m6 đến 1m75\r\nSize XXL : < 85 kg chiều cao phù hợp từ 1m6 đến 1m8\r\nSize XXXL : >85 kg chiều cao phù hợp từ 1m7 đến 1m85\r\n', '41,42,43,44,45', 'Xám, Trắng', 1, 3, '2018-07-28 10:25:23', 1),
(20, 'Giày nữ BB3', 7000000, 0, 'save_images/1532748340shoes_women21.png', '          Mô tả sp:\r\nVới thiết kế đơn giản nhưng không kém phần sang trọng và cá tính\r\n•	Kiểu dáng đa phong cách\r\n•	Đường may tinh tế sắc sảo\r\n•	Áo thun được thiết kế vể đẹp trẻ trung năng động nhưng không kém phần mạnh mẽ.\r\n•	Dễ dàng phối trang phục , thích hợp đi chơi đi làm đi dạo phố\r\n•	Chất vải poly co dãn, áo form rộng thích hợp cả nam và nữ\r\n•	Hàng Việt Nam\r\nBảng size:\r\nSize XS : < 40 kg chiều cao phù hợp từ 1m45 đến 1m6\r\nSize S : < 45 kg chiều cao phù hợp từ 1m5 đến 1m6\r\nSize M : < 55 kg chiều cao phù hợp từ 1m5 đến 1m65\r\nSize L : < 65 kg chiều cao phù hợp từ 1m5 đến 1m7\r\nSize Xl : < 75 kg chiều cao phù hợp từ 1m6 đến 1m75\r\nSize XXL : < 85 kg chiều cao phù hợp từ 1m6 đến 1m8\r\nSize XXXL : >85 kg chiều cao phù hợp từ 1m7 đến 1m85\r\n', '41,42,43,44,45', 'Xám, Trắng', 1, 3, '2018-07-28 10:25:40', 1),
(21, 'Kính B432', 1600000, 0, 'save_images/1532748383glass2.png', '           Mô tả sp:\r\nVới thiết kế đơn giản nhưng không kém phần sang trọng và cá tính\r\n•	Kiểu dáng đa phong cách\r\n•	Đường may tinh tế sắc sảo\r\n•	Áo thun được thiết kế vể đẹp trẻ trung năng động nhưng không kém phần mạnh mẽ.\r\n•	Dễ dàng phối trang phục , thích hợp đi chơi đi làm đi dạo phố\r\n•	Chất vải poly co dãn, áo form rộng thích hợp cả nam và nữ\r\n•	Hàng Việt Nam\r\nBảng size:\r\nSize XS : < 40 kg chiều cao phù hợp từ 1m45 đến 1m6\r\nSize S : < 45 kg chiều cao phù hợp từ 1m5 đến 1m6\r\nSize M : < 55 kg chiều cao phù hợp từ 1m5 đến 1m65\r\nSize L : < 65 kg chiều cao phù hợp từ 1m5 đến 1m7\r\nSize Xl : < 75 kg chiều cao phù hợp từ 1m6 đến 1m75\r\nSize XXL : < 85 kg chiều cao phù hợp từ 1m6 đến 1m8\r\nSize XXXL : >85 kg chiều cao phù hợp từ 1m7 đến 1m85\r\n', '41,42,43,44,45', 'Xám, Trắng', 0, 3, '2018-07-28 10:26:23', 1),
(22, 'Đồng hồ B43', 15000000, 0, 'save_images/1532748434watch1.png', '            Mô tả sp:\r\nVới thiết kế đơn giản nhưng không kém phần sang trọng và cá tính\r\n•	Kiểu dáng đa phong cách\r\n•	Đường may tinh tế sắc sảo\r\n•	Áo thun được thiết kế vể đẹp trẻ trung năng động nhưng không kém phần mạnh mẽ.\r\n•	Dễ dàng phối trang phục , thích hợp đi chơi đi làm đi dạo phố\r\n•	Chất vải poly co dãn, áo form rộng thích hợp cả nam và nữ\r\n•	Hàng Việt Nam\r\nBảng size:\r\nSize XS : < 40 kg chiều cao phù hợp từ 1m45 đến 1m6\r\nSize S : < 45 kg chiều cao phù hợp từ 1m5 đến 1m6\r\nSize M : < 55 kg chiều cao phù hợp từ 1m5 đến 1m65\r\nSize L : < 65 kg chiều cao phù hợp từ 1m5 đến 1m7\r\nSize Xl : < 75 kg chiều cao phù hợp từ 1m6 đến 1m75\r\nSize XXL : < 85 kg chiều cao phù hợp từ 1m6 đến 1m8\r\nSize XXXL : >85 kg chiều cao phù hợp từ 1m7 đến 1m85\r\n', 'S, M, L', 'Mặc định như ảnh', 0, 3, '2018-07-28 10:27:14', 1),
(23, 'Đồng hồ BTT1', 15000000, 0, 'save_images/1532748547watch3.png', '             Mô tả sp:\r\nVới thiết kế đơn giản nhưng không kém phần sang trọng và cá tính\r\n•	Kiểu dáng đa phong cách\r\n•	Đường may tinh tế sắc sảo\r\n•	Áo thun được thiết kế vể đẹp trẻ trung năng động nhưng không kém phần mạnh mẽ.\r\n•	Dễ dàng phối trang phục , thích hợp đi chơi đi làm đi dạo phố\r\n•	Chất vải poly co dãn, áo form rộng thích hợp cả nam và nữ\r\n•	Hàng Việt Nam\r\nBảng size:\r\nSize XS : < 40 kg chiều cao phù hợp từ 1m45 đến 1m6\r\nSize S : < 45 kg chiều cao phù hợp từ 1m5 đến 1m6\r\nSize M : < 55 kg chiều cao phù hợp từ 1m5 đến 1m65\r\nSize L : < 65 kg chiều cao phù hợp từ 1m5 đến 1m7\r\nSize Xl : < 75 kg chiều cao phù hợp từ 1m6 đến 1m75\r\nSize XXL : < 85 kg chiều cao phù hợp từ 1m6 đến 1m8\r\nSize XXXL : >85 kg chiều cao phù hợp từ 1m7 đến 1m85\r\n', 'S, M, L', 'Mặc định như ảnh', 1, 3, '2018-07-28 10:29:07', 1),
(24, 'Túi xách  A123', 5500000, 5000000, 'save_images/1532748610handle-bag_women1.png', '              Mô tả sp:\r\nVới thiết kế đơn giản nhưng không kém phần sang trọng và cá tính\r\n•	Kiểu dáng đa phong cách\r\n•	Đường may tinh tế sắc sảo\r\n•	Áo thun được thiết kế vể đẹp trẻ trung năng động nhưng không kém phần mạnh mẽ.\r\n•	Dễ dàng phối trang phục , thích hợp đi chơi đi làm đi dạo phố\r\n•	Chất vải poly co dãn, áo form rộng thích hợp cả nam và nữ\r\n•	Hàng Việt Nam\r\nBảng size:\r\nSize XS : < 40 kg chiều cao phù hợp từ 1m45 đến 1m6\r\nSize S : < 45 kg chiều cao phù hợp từ 1m5 đến 1m6\r\nSize M : < 55 kg chiều cao phù hợp từ 1m5 đến 1m65\r\nSize L : < 65 kg chiều cao phù hợp từ 1m5 đến 1m7\r\nSize Xl : < 75 kg chiều cao phù hợp từ 1m6 đến 1m75\r\nSize XXL : < 85 kg chiều cao phù hợp từ 1m6 đến 1m8\r\nSize XXXL : >85 kg chiều cao phù hợp từ 1m7 đến 1m85\r\n', 'S, M, L', 'Mặc định như ảnh', 2, 3, '2018-07-28 10:30:10', 1),
(25, 'suit', 100000, 9000, 'save_images/1532755080suit_men1.png', ' ', 'XS, S, M , L, XL', 'Trắng, Vàng, Đen, Hồng', 2, 2, '2018-07-28 12:18:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailUNIQUE` (`email`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mailQnique` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
