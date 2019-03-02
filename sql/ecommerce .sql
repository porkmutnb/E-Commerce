-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2019 at 02:52 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`categoryID`, `categoryName`, `created_at`, `updated_at`) VALUES
(1, 'สำหรับผู้หญิง', '2019-02-26 14:00:56', '2019-02-26 14:00:56'),
(2, 'สำหรับผู้ชาย', '2019-02-26 14:00:56', '2019-02-26 14:00:56'),
(3, 'สำหรับแฟชั่น', '2019-02-26 14:01:09', '2019-02-26 14:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gender`
--

CREATE TABLE `tbl_gender` (
  `genderID` int(11) NOT NULL,
  `genderName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_gender`
--

INSERT INTO `tbl_gender` (`genderID`, `genderName`, `created_at`, `updated_at`) VALUES
(1, 'ชาย', '2019-02-26 14:50:16', '2019-02-26 14:50:16'),
(2, 'หญิง', '2019-02-26 14:50:16', '2019-02-26 14:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `evidence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '1' COMMENT '0=drop;1=wait;2=delivery;3=complete',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderID`, `userID`, `address`, `evidence`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, '99 xxx yyy zzz 0000', 'public/data-image/evidence/51014052_1567888909980216_3741092788863762432_o.jpg', 1, '2019-02-27 14:12:55', '2019-02-27 14:12:55'),
(2, 4, 'asdqwe', 'public/data-image/evidence/2.gif', 1, '2019-02-28 18:09:39', '2019-02-28 18:09:39'),
(3, 3, 'ssssssssssssss', NULL, 1, '2019-02-28 18:45:41', '2019-02-28 18:45:41'),
(4, 5, 'asdfghj', NULL, 1, '2019-02-28 18:48:58', '2019-02-28 18:48:58'),
(5, 5, 'sdfgdsf', NULL, 1, '2019-02-28 18:49:27', '2019-02-28 18:49:27'),
(6, 5, 'jtghjtjtghjtgruhj', NULL, 1, '2019-02-28 18:57:32', '2019-02-28 18:57:32'),
(7, 3, 'xxx', 'public/data-image/evidence/2.gif', 1, '2019-03-02 13:50:59', '2019-03-02 13:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `orderDetailID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `qualtity` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`orderDetailID`, `orderID`, `productID`, `qualtity`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, '2019-02-27 14:13:18', '2019-02-27 14:13:18'),
(2, 2, 7, 1, '2019-02-28 18:09:39', '2019-02-28 18:09:39'),
(3, 3, 3, 3, '2019-02-28 18:45:41', '2019-02-28 18:45:41'),
(4, 4, 2, 2, '2019-02-28 18:48:58', '2019-02-28 18:48:58'),
(6, 6, 1, 1, '2019-02-28 18:57:32', '2019-02-28 18:57:32'),
(7, 7, 1, 2, '2019-03-02 13:50:59', '2019-03-02 13:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productID` int(11) NOT NULL,
  `productImageID` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productDetail` text COLLATE utf8mb4_unicode_ci,
  `categoryID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qualtity` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productID`, `productImageID`, `productName`, `productDetail`, `categoryID`, `price`, `qualtity`, `created_at`, `updated_at`) VALUES
(1, 1, 'เสื้อโปโลตราเป็ด', 'เสื้อเป็ดใส่ดีใส่ดัง ใส่แล้วปัง ทั้งดังทั้งดี ใส่แล้วคันไปทั้งตัว', 3, 250, 1000, '2019-02-27 14:06:16', '2019-02-27 14:06:16'),
(2, 2, 'เสื้อตรายีราฟ', 'เสื้อยืดยีราฟ ใส่สบายตัว คอยาวไปทั้งหลัง', 2, 350, 1000, '2019-02-27 14:06:16', '2019-02-27 14:06:16'),
(3, 3, 'เดรสยาว', 'เดรสราตรีสำหรับสตรีไปเดทยามค่ำคืนและคิดว่าตัวจะเสียสาวเพราะถอดง่ายใส่ง่ายแค่ถลกก็เห็นไปถึงใส้ไก่', 1, 500, 500, '2019-02-27 14:09:04', '2019-02-27 14:09:04'),
(4, 4, 'กางเกงยีนส์ผู้หญิงขาเดฟ', 'ยืนส์ใส่สบาย รัดรูป ใส่แล้วหนุ่มๆรอบล้อม', 1, 550, 500, '2019-02-27 18:19:13', '2019-02-27 18:19:13'),
(5, 5, 'กางเกงยีนส์ผู้ชาย', 'กางผ้านุ่มขาเดฟ ใส่สบายรัดรูป ถูกใจสาวๆ', 2, 650, 550, '2019-02-27 18:20:50', '2019-02-27 18:20:50'),
(6, 6, 'ชุดคอสเพล', 'เหมาสำหรับทุกเภท ทุกวัยส่งตรงมาจากแดนปลาดิบ', 3, 950, 600, '2019-02-27 18:22:24', '2019-02-27 18:22:24'),
(7, 7, 'ชุดเซมบัตสึ BNK48 Shonichi', 'ชุดเซมบัตสึ โชนิจิ ของ musicBNK48 ยังไม่ได้ซัก กลิ่นหอมฟุ้ง ละมุนกลิ่น เกมาะสำหรับสายนักมโนในจินตนาการ', 3, 1050, 250, '2019-02-27 18:25:01', '2019-02-27 18:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_image`
--

CREATE TABLE `tbl_product_image` (
  `productImageID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product_image`
--

INSERT INTO `tbl_product_image` (`productImageID`, `productID`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://news.mthai.com/app/uploads/2018/11/gift-shirt.png', '2019-02-27 14:07:27', '2019-02-27 14:07:27'),
(2, 2, 'https://th-live-01.slatic.net/original/82ca9bacd44809e0c522e683dd977c49.jpg', '2019-02-27 14:07:27', '2019-02-27 14:07:27'),
(3, 3, 'https://f.ptcdn.info/359/060/000/pgujbdhm3AoJGTbeu9v-o.jpg', '2019-02-27 14:09:50', '2019-02-27 14:09:50'),
(4, 4, 'https://dj7u9rvtp3yka.cloudfront.net/products/PIM-1474973134340-3be3be0e-fee5-4972-b5fc-6bf2a6cd4583_v1-small.jpg', '2019-02-27 18:19:27', '2019-02-27 18:19:27'),
(5, 5, 'https://www.zynonite.com/wp-content/uploads/2016/09/zynonite-Jeans-1089x.jpg', '2019-02-27 18:21:01', '2019-02-27 18:21:01'),
(6, 6, 'http://ck.lnwfile.com/xs2rbh.jpg', '2019-02-27 18:22:34', '2019-02-27 18:22:34'),
(7, 7, 'https://bnk48nextdoor.com/wiki/images/thumb/9/9c/Music-Shonichi.jpg/400px-Music-Shonichi.jpg', '2019-02-27 18:25:10', '2019-02-27 18:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userID` int(10) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genderID` int(10) NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userID`, `username`, `email`, `password`, `telephone`, `genderID`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cherprang', 'cherprang@bnk48.com', 'e10adc3949ba59abbe56e057f20f883e', '0888888888', 2, 'admin', 'GV45weZmUypkCKXRzYl9AqNj4fV4qH', '2019-02-26 16:28:08', '2019-02-26 16:28:08'),
(3, 'music', 'music@bnk48.com', 'e10adc3949ba59abbe56e057f20f883e', '0888888888', 2, 'member', '4iGqaoTZftU4hODahv5BP1vuIJdU', '2019-02-26 18:16:20', '2019-02-26 18:16:20'),
(4, 'mewnich', 'mewnich@bnk48.com', 'e10adc3949ba59abbe56e057f20f883e', '0854546565', 2, 'member', 'qaiBt4QEv9WP7mewCoM1OrTXz5U1yj', '2019-02-26 18:17:38', '2019-02-26 18:17:38'),
(5, 'kaimook', 'kaimook@bnk48.com', 'e10adc3949ba59abbe56e057f20f883e', '0856564212', 2, 'member', 'WWLJrKhaAPzROiZg1tCZO5AOBQsnk', '2019-02-28 18:46:49', '2019-02-28 18:46:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  ADD PRIMARY KEY (`genderID`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `ref_user_to_order` (`userID`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`orderDetailID`),
  ADD KEY `ref_order_to_order_detail` (`orderID`),
  ADD KEY `ref_product_to_order_detail` (`productID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `ref_category_to_product` (`categoryID`);

--
-- Indexes for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  ADD PRIMARY KEY (`productImageID`),
  ADD KEY `ref_product_to_productImage` (`productID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `ref_gender_to_user` (`genderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  MODIFY `genderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `orderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  MODIFY `productImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `ref_user_to_order` FOREIGN KEY (`userID`) REFERENCES `tbl_user` (`userID`);

--
-- Constraints for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `ref_order_to_order_detail` FOREIGN KEY (`orderID`) REFERENCES `tbl_order` (`orderID`),
  ADD CONSTRAINT `ref_product_to_order_detail` FOREIGN KEY (`productID`) REFERENCES `tbl_product` (`productID`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `ref_category_to_product` FOREIGN KEY (`categoryID`) REFERENCES `tbl_category` (`categoryID`);

--
-- Constraints for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  ADD CONSTRAINT `ref_product_to_productImage` FOREIGN KEY (`productID`) REFERENCES `tbl_product` (`productID`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `ref_gender_to_user` FOREIGN KEY (`genderID`) REFERENCES `tbl_gender` (`genderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
