-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th3 28, 2024 lúc 11:31 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_mvcAgsmt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminid` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(2, 'Thuan', 'thuan@gmail.com', 'admin', '4297f44b13955235245b2497399d7a93', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `image`, `type`) VALUES
(16, '0a8d228e23.png', 1),
(17, '7abd431aad.png', 1),
(18, '12385b6571.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_binhluan`
--

CREATE TABLE `tbl_binhluan` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_binhluan`
--

INSERT INTO `tbl_binhluan` (`id`, `customer_id`, `product_id`, `content`) VALUES
(1, 16, 56, '24'),
(2, 16, 56, 'đồng hồ đẹp quá trời ơi'),
(6, 16, 56, '23'),
(7, 17, 56, 'xấu quắc\r\n'),
(8, 16, 61, 'abc\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(4, 'Iphone'),
(5, 'Ipad'),
(6, 'Watch'),
(7, 'Laptop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quanlity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quanlity`, `image`) VALUES
(83, 56, '1l47km0s1rbcet53on34sf82g5', 'watch 300', '29000', 1, '793e24b043.png'),
(84, 50, '1l47km0s1rbcet53on34sf82g5', 'Iphone', '130000', 1, '1139aeb41d.png'),
(87, 60, 'j1ubp763fcni891jekrs4bnvhg', 'watch 214', '4200', 1, '9a4aecc154.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(7, ' Điện thoại'),
(8, 'LapTop'),
(9, 'Máy tính'),
(10, 'Ipad');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_compare`
--

INSERT INTO `tbl_compare` (`id`, `customer_id`, `product_id`, `productName`, `price`, `image`) VALUES
(23, 16, 60, 'watch 214', '4200', '9a4aecc154.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cusId` int(11) NOT NULL,
  `cusName` varchar(200) NOT NULL,
  `cusAdd` varchar(200) NOT NULL,
  `cusCity` varchar(30) NOT NULL,
  `cusCon` varchar(30) NOT NULL,
  `cusZip` varchar(30) NOT NULL,
  `cusPhone` varchar(30) NOT NULL,
  `cusEmail` varchar(50) NOT NULL,
  `cusPass` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`cusId`, `cusName`, `cusAdd`, `cusCity`, `cusCon`, `cusZip`, `cusPhone`, `cusEmail`, `cusPass`) VALUES
(15, '121212', 'Đà Nẵng', 'DAD', '1234', '123', '0906138104', '121212', '4297f44b13955235245b2497399d7a93'),
(16, '12312311', '', 'DAD', '', '', '09011111', '123123', '4297f44b13955235245b2497399d7a93'),
(17, '', '', 'DAD', '', '', '', '1111', 'b59c67bf196a4758191e42f76670ceba');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customerId` int(11) NOT NULL,
  `quanlity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `dateOrder` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`orId`, `productId`, `productName`, `customerId`, `quanlity`, `price`, `image`, `status`, `dateOrder`) VALUES
(12, 52, 'ipad', 16, 1, '43000', 'ca59557049.png', 4, '2024-02-26 12:28:16'),
(13, 50, 'Iphone', 16, 1, '130000', '1139aeb41d.png', 4, '2024-02-26 12:30:25'),
(14, 60, 'watch 214', 16, 1, '4200', '9a4aecc154.png', 4, '2024-02-26 12:31:06'),
(15, 60, 'watch 214', 16, 1, '4200', '9a4aecc154.png', 4, '2024-02-26 12:32:26'),
(16, 50, 'Iphone', 16, 1, '130000', '1139aeb41d.png', 4, '2024-02-26 12:37:27'),
(17, 50, 'Iphone', 16, 1, '130000', '1139aeb41d.png', 4, '2024-02-26 12:37:52'),
(18, 61, 'watch 4', 16, 1, '42400', '4355932810.png', 4, '2024-02-27 05:56:55'),
(19, 56, 'watch 300', 16, 2, '58000', '793e24b043.png', 0, '2024-02-26 19:23:57'),
(20, 50, 'Iphone', 17, 1, '130000', '1139aeb41d.png', 0, '2024-02-27 03:53:58'),
(21, 60, 'watch 214', 16, 2, '8400', '9a4aecc154.png', 4, '2024-02-27 05:56:29'),
(22, 61, 'watch 4', 16, 1, '42400', '4355932810.png', 0, '2024-02-27 05:55:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` tinytext NOT NULL,
  `catId` int(11) DEFAULT NULL,
  `brandId` int(11) DEFAULT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`) VALUES
(49, 'Laptop', 7, 7, 'Oppo ppo anh', 0, '32000', '7897bb50e0.png'),
(50, 'Iphone', 8, 4, 'MacOs 12 siu vịp', 0, '130000', '1139aeb41d.png'),
(52, 'ipad', 10, 5, 'Ipad siêu mỏmg siêu bền', 0, '43000', 'ca59557049.png'),
(53, 'watch1400', 8, 6, 'đồng hồ siu zip', 0, '43000', '171ccee978.png'),
(56, 'watch 300', 9, 5, 'đồng hồ 3000k dó tr', 0, '29000', '793e24b043.png'),
(57, 'watch 3', 9, 6, 'đồng hồ dẳngtd cấ', 0, '42000', '7af1a03a25.png'),
(60, 'watch 214', 8, 6, 'applewwathch ', 0, '4200', '9a4aecc154.png'),
(61, 'watch 4', 10, 7, '322323', 0, '42400', '4355932810.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Chỉ mục cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cusId`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orId`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
