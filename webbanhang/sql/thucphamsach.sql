-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3307
-- Thời gian đã tạo: Th10 17, 2020 lúc 09:53 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thucphamsach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `amin`
--

CREATE TABLE `amin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `level` tinyint(4) DEFAULT 1,
  `avatar` varchar(50) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `amin`
--

INSERT INTO `amin` (`id`, `name`, `email`, `address`, `password`, `phone`, `status`, `level`, `avatar`, `create_at`, `update_at`) VALUES
(1, 'Nghiêm Minh Tuấn', 'meoteo789@gmail.com', 'hải dương', '202cb962ac59075b964b07152d234b70', '0909932349', 1, 1, NULL, NULL, '2020-10-12 02:50:15'),
(4, 'Rau Cải Thảo', 'admin@gmail.com', 'Ninh Bình', 'c4ca4238a0b923820dcc509a6f75849b', '789423123132', 1, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `image`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Rau Củ Quả', 'rau-cai-thao', NULL, NULL, 0, 1, '2020-10-11 21:59:00', '2020-10-11 21:59:00'),
(7, 'Thịt', 'thit', NULL, NULL, 0, 1, '2020-10-11 03:46:27', '2020-10-11 03:46:27'),
(8, 'Cá', 'ca', NULL, NULL, 0, 1, '2020-10-11 03:46:32', '2020-10-11 03:46:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` tinyint(100) DEFAULT 0,
  `price` int(11) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `qty`, `price`, `create_at`, `update_at`) VALUES
(5, 3, 4, 1, 70000000, '2020-10-11 18:55:33', '2020-10-11 18:55:33'),
(6, 4, 10, 1, 100000, '2020-10-11 19:32:47', '2020-10-11 19:32:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT 0,
  `pay` int(11) DEFAULT 0,
  `thunbar` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `number` int(11) DEFAULT 0,
  `head` int(11) DEFAULT 0,
  `view` int(11) DEFAULT 0,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `pay`, `thunbar`, `category_id`, `content`, `number`, `head`, `view`, `create_at`, `update_at`) VALUES
(4, 'Rau Cải Thảo', 'rau-cai-thao', 100000000, 30, 0, 'tải xuống.jpg', 5, 'sdsd', 200, 0, 0, NULL, '2020-10-11 05:30:56'),
(7, 'Cà Chua', 'ca-chua', 100000, 0, 0, 'ca-chua.jpg', 5, 'thơm ngon mọng nước', 50, 0, 0, NULL, '2020-10-11 22:00:29'),
(8, 'mận', 'man', 50000, 0, 0, 'man.jpg', 5, 'ko sâu', 20, 0, 0, NULL, '2020-10-11 22:01:09'),
(9, 'lợn', 'lon', 100000, 0, 0, 'thit-lon.jpg', 7, 'dsdad', 20, 0, 0, NULL, '2020-10-11 22:01:45'),
(11, 'Khoai Tây', 'khoai-tay', 20000, 0, 0, 'khoai-tay.jpg', 5, 'Ko Có mầm', 200, 0, 0, NULL, NULL),
(12, 'Thịt Bò', 'thit-bo', 300000, 0, 0, 'thit-bo.jpg', 7, 'ngon', 200, 0, 0, NULL, NULL),
(13, 'Dê', 'de', 50000, 0, 0, 'thit-de.jpg', 7, 'ngon', 60, 0, 0, NULL, NULL),
(14, 'Thịt Trâu', 'thit-trau', 300000, 0, 0, 'An-Thit-Trau.jpg', 7, 'Ngon\r\n', 300, 0, 0, NULL, NULL),
(15, 'Diêu Hồng', 'dieu-hong', 150000, 0, 0, 'dieu-hong.jpg', 8, 'Không XƯơng', 30, 0, 0, NULL, NULL),
(16, 'Mập', 'map', 100000000, 0, 0, 'map.jpg', 8, 'NGon', 3, 0, 0, NULL, NULL),
(17, 'Xìn Xịt', 'xin-xit', 10000, 0, 0, 'xin-xit.jpg', 8, 'Ko ăn được', 30, 0, 0, NULL, NULL),
(18, 'Rô Phi', 'ro-phi', 50000, 0, 0, 'ro-phi.jpg', 8, 'Ngon', 50, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `note`, `user_id`, `status`, `create_at`, `update_at`) VALUES
(3, 77000000, 'giao hang tan noi', 8, 0, NULL, '2020-10-17 05:23:07'),
(4, 110000, 'giao hang tan noi', 8, 0, NULL, '2020-10-17 05:04:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `token` varchar(50) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `avatar`, `status`, `token`, `create_at`, `update_at`) VALUES
(8, 'Nguyễn văn c', 'admin1@gmail.com', '0987653241', 'Ninh Bình', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `amin`
--
ALTER TABLE `amin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `amin`
--
ALTER TABLE `amin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
