-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2021 lúc 03:58 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `level` tinyint(4) NOT NULL DEFAULT 1,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `account`, `email`, `address`, `password`, `phone`, `status`, `level`, `avatar`, `create_at`, `update_at`) VALUES
(13, 'admin', 'Trần Quốc Hậu', 'tranquochaua2@gmail.com', 'Sóc Trăng', '6ac880fb3a082a9bd546a49938e9e0d7', '123', 1, 1, '', '2021-09-25 05:05:04', '2021-09-30 07:02:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_id` int(11) NOT NULL,
  `images` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `page_id`, `images`, `banner`, `home`, `status`, `create_at`, `update_at`) VALUES
(13, 'Asus', 'asus', 3, '', NULL, 0, 1, '2018-11-25 16:37:50', '2018-12-09 16:20:03'),
(14, 'Lenovo', 'lenovo', 3, '', NULL, 0, 1, '2018-11-25 16:45:00', '2021-10-05 03:07:01'),
(17, 'HP', 'hp', 3, '', NULL, 0, 1, '2018-11-25 16:46:23', '2021-10-05 03:07:00'),
(20, 'Dell', 'dell', 3, '', NULL, 0, 1, '2018-11-27 03:22:35', '2021-10-05 03:06:58'),
(35, 'Máy tính bàn', 'may-tinh-ban', 1, '', NULL, 1, 1, '2018-12-10 00:18:20', '2021-10-05 14:22:35'),
(36, 'Gamming', 'gamming', 1, '', NULL, 1, 1, '2018-12-10 00:18:44', '2021-10-05 14:22:33'),
(38, 'Chuột - Bàn phím', 'chuot---ban-phim', 2, '', NULL, 1, 1, '2018-12-10 00:20:38', '2021-10-05 14:22:25'),
(39, 'Ổ cứng', 'o-cung', 2, '', NULL, 1, 1, '2018-12-10 00:20:48', '2021-10-05 14:22:23'),
(41, 'Tai nghe', 'tai-nghe', 2, '', NULL, 1, 1, '2018-12-10 00:21:35', '2021-10-05 14:16:01'),
(79, 'Phần mềm', 'phan mem', 4, '', NULL, 1, 1, '2018-12-10 00:21:35', '2021-10-26 03:52:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `content`, `product_id`, `users_id`, `admin_id`, `create_at`, `update_at`) VALUES
(169, '32131', 53, 14, 0, '2018-12-26 06:01:09', '0000-00-00 00:00:00'),
(170, '32123', 53, 14, 0, '2018-12-26 06:01:14', '0000-00-00 00:00:00'),
(171, '3311', 53, 14, 0, '2018-12-26 06:01:21', '0000-00-00 00:00:00'),
(172, '3123', 53, 14, 0, '2018-12-26 06:01:26', '0000-00-00 00:00:00'),
(173, '412', 53, 14, 0, '2018-12-26 06:01:33', '0000-00-00 00:00:00'),
(174, '123123', 53, 14, 0, '2018-12-26 06:01:39', '0000-00-00 00:00:00'),
(175, '333', 53, 11, 0, '2018-12-26 06:09:26', '0000-00-00 00:00:00'),
(176, 'abcd', 70, 29, 0, '2021-10-04 15:48:56', '0000-00-00 00:00:00'),
(177, 'sản phẩm đẹp', 49, 29, 0, '2021-10-04 15:53:36', '0000-00-00 00:00:00'),
(178, 'san phẩm đẹp', 41, 29, 0, '2021-10-06 04:33:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muc`
--

CREATE TABLE `muc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `muc`
--

INSERT INTO `muc` (`id`, `name`) VALUES
(46, 'Nhạc'),
(47, 'Nhạc'),
(48, 'dell');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganluong`
--

CREATE TABLE `nganluong` (
  `id` int(11) NOT NULL,
  `name` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `users_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nganluong`
--

INSERT INTO `nganluong` (`id`, `name`, `total`, `note`, `users_id`, `create_at`, `update_at`) VALUES
(1, '0', 13189000, '', 14, '2018-12-16 04:08:23', '0000-00-00 00:00:00'),
(2, '0', 14850000, '', 14, '2018-12-16 04:32:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `nganluong_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `nganluong_id`, `qty`, `price`, `create_at`, `update_at`) VALUES
(211, 184, 50, 0, 1, '11961000', '2021-09-30 07:34:32', '2021-09-30 07:34:32'),
(215, 186, 53, 0, 1, '13500000', '2021-10-01 06:35:13', '2021-10-01 06:35:13'),
(216, 186, 51, 0, 1, '24900000', '2021-10-01 06:35:13', '2021-10-01 06:35:13'),
(217, 187, 52, 0, 1, '13050000', '2021-10-04 15:38:54', '2021-10-04 15:38:54'),
(218, 187, 53, 0, 1, '13500000', '2021-10-04 15:38:54', '2021-10-04 15:38:54'),
(219, 188, 50, 0, 1, '11961000', '2021-10-05 03:11:53', '2021-10-05 03:11:53'),
(220, 189, 50, 0, 1, '11961000', '2021-10-05 03:13:54', '2021-10-05 03:13:54'),
(221, 190, 50, 0, 1, '11961000', '2021-10-05 03:14:25', '2021-10-05 03:14:25'),
(222, 191, 50, 0, 1, '11961000', '2021-10-05 03:18:43', '2021-10-05 03:18:43'),
(223, 192, 50, 0, 1, '11961000', '2021-10-05 03:20:03', '2021-10-05 03:20:03'),
(225, 194, 69, 0, 1, '600000', '2021-10-06 07:43:04', '2021-10-06 07:43:04'),
(226, 195, 37, 0, 1, '13990000', '2021-10-26 06:29:18', '2021-10-26 06:29:18'),
(227, 195, 47, 0, 12, '18390000', '2021-10-26 06:29:18', '2021-10-26 06:29:18'),
(228, 195, 41, 0, 2, '8990000', '2021-10-26 06:29:18', '2021-10-26 06:29:18'),
(229, 195, 43, 0, 12, '19290000', '2021-10-26 06:29:18', '2021-10-26 06:29:18'),
(230, 195, 75, 0, 1, '19490000', '2021-10-26 06:29:18', '2021-10-26 06:29:18'),
(231, 195, 87, 0, 10, '3125500', '2021-10-26 06:29:18', '2021-10-26 06:29:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `homepage` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `page`
--

INSERT INTO `page` (`id`, `name`, `homepage`, `slug`, `create_update`, `update_at`) VALUES
(1, 'Máy tính để bàn', 0, 'may-tinh-de-ban', '2018-12-09 15:13:29', '2021-10-05 03:36:27'),
(2, 'Phụ kiện máy tính', 1, '', '2018-12-09 15:23:30', '2021-10-13 10:56:13'),
(3, 'Laptop', 1, '', '2018-12-09 15:23:41', '2021-10-13 10:56:12'),
(4, 'Phần mềm', 1, '', '2018-12-09 15:23:41', '2021-10-26 03:46:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `panel`
--

CREATE TABLE `panel` (
  `id` int(11) NOT NULL,
  `panel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sum` int(11) NOT NULL DEFAULT 0,
  `creat_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `panel`
--

INSERT INTO `panel` (`id`, `panel`, `sum`, `creat_at`, `update_at`) VALUES
(7, '43264_pcgm118__custom_.jpg', 1, '2021-10-11 14:39:27', '2021-10-11 14:39:27'),
(17, '43041_pcgm116_2.png', 0, '2021-10-10 02:53:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `sale` tinyint(4) NOT NULL DEFAULT 0,
  `pay` int(11) NOT NULL,
  `number` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `thumbal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `chitietsp` text COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `hot` int(11) NOT NULL DEFAULT 0,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `pay`, `number`, `thumbal`, `category_id`, `content`, `chitietsp`, `view`, `hot`, `comment`, `create_at`, `update_at`) VALUES
(37, 'Laptop Dell Inspiron 3576 (F3576-70153188) (Đen)', 'laptop-dell-inspiron-3576-f3576-70153188-den', 13990000, 0, 2, '9', 'dell-inspiron-3576-f3576-70153188-0.jpg', 14, '<ul><li>CPU: Intel Core i5-8300H ( 2.3 GHz - 4.0 GHz / 8MB / 4 nhân, 8 luồng )<br></li><li>Màn hình: 15.6\" IPS ( 1920 x 1080 ) , không cảm ứng<br></li><li>RAM: 1 x 8GB DDR4 2400MHz<br></li><li>Đồ họa: Intel UHD Graphics 630 / NVIDIA GeForce GTX 1050 4GB<br></li><li>Lưu trữ: 1TB HDD 5400RPM<br></li><li>Hệ điều hành: Linux<br></li><li>Pin: 4 cell 48 Wh Pin liền , khối lượng: 2.4 kg<br></li></ul>', '0', 9, 0, '', '2021-09-30 03:46:44', '2021-10-26 08:12:53'),
(38, 'Laptop Dell Vostro 3578-V3578A (Đen)', 'laptop-dell-vostro-3578-v3578a-den', 15490000, 0, 2, '20', 'may-xach-tay-laptop-dell-vostro-3578-v3578a-den.jpg', 20, '- CPU: Intel Core i5-8250U ( 1.6 GHz - 3.4 GHz / 6MB / 4 nhân, 8 luồng )<div> - Màn hình: 15.6\" ( 1920 x 1080 ) , không cảm ứng \r\n- RAM: 1 x 4GB DDR4 2400MHz</div><div> - Đồ họa: Intel UHD Graphics 620 / AMD Radeon R5 520 2GB </div><div> - Lưu trữ: 1TB HDD 5400RPM </div><div> - Hệ điều hành: Ubuntu</div><div> - Pin: 4 cell 40 Wh Pin rời , khối lượng: 2.3 kg</div>', '0', 2, 0, '', '2018-11-30 03:48:28', '2021-09-30 10:46:42'),
(39, 'Laptop Dell Inspiron 5370-N3I3002W (I3-8130U) (Bạc)', 'laptop-dell-inspiron-5370-n3i3002w-i3-8130u-bac', 15390000, 0, 2, '18', '1_47_1.jpg', 20, '- CPU: Intel Core i3-8130U ( 2.2 GHz - 3.4 GHz / 4MB / 2 nhân, 4 luồng )<div>- Màn hình: 13.3\" ( 1920 x 1080 ) , không cảm ứng </div><div> - RAM: 1 x 4GB DDR4 2400MHz </div><div> - Đồ họa: Intel UHD Graphics 620 / Shared memory</div><div> - Lưu trữ: 128GB SSD M.2 NVMe </div><div> - Hệ điều hành: Windows 10 Home SL 64-bit </div><div> - Pin: 3 cell 38 Wh Pin liền , khối lượng: 1.4 kg</div>', '0', 0, 0, '', '2018-11-30 03:49:35', '2021-09-30 10:47:16'),
(40, ' Laptop Dell Inspiron 5370-N3I3002W (I3-8160U) (Bạc)', 'laptop-dell-inspiron-5370-n3i3002w-i3-8160u-bac', 15390000, 0, 1, '9', '1_47.jpg', 20, '- CPU: Intel Core i3-8130U ( 2.2 GHz - 3.4 GHz / 4MB / 2 nhân, 4 luồng ) <div>- Màn hình: 13.3\" ( 1920 x 1080 ) , không cảm ứng </div><div> - RAM: 1 x 4GB DDR4 2400MHz </div><div> - Đồ họa: Intel UHD Graphics 620 / Shared memory </div><div> - Lưu trữ: 128GB SSD M.2 NVMe </div><div> - Hệ điều hành: Windows 10 Home SL 64-bit </div><div> - Pin: 3 cell 38 Wh Pin liền , khối lượng: 1.4 kg</div>', '0', 2, 0, '', '2018-11-30 03:50:50', '2021-10-06 03:12:58'),
(41, 'Laptop Asus TP203NAH-BP049T (N4200) (Vàng)', 'laptop-asus-tp203nah-bp049t-n4200-vang', 8990000, 0, 1, '28', 'may-xach-tay-laptop-asus-tp203nah-bp049t-n4200-vang-1.jpg', 13, '- CPU: Intel Pentium N4200 ( 1.1 GHz - 2.5 GHz / 2MB / 4 nhân, 4 luồng ) <div> - Màn hình: 11.6\" IPS ( 1366 x 768 ) , cảm ứng </div><div> - RAM: 4GB DDR3L 1600MHz </div><div> - Đồ họa: Intel HD Graphics 505 </div><div> - Lưu trữ: 1TB HDD 5400RPM </div><div> - Hệ điều hành: Windows 10 Home SL 64-bit </div><div> - Pin: 3 cell 42 Wh Pin liền , khối lượng: 1.3 kg</div>', '0', 27, 0, '', '2018-11-30 03:52:31', '2021-10-26 06:29:29'),
(42, 'Laptop Asus FX504GD-E4177T (i5-8300H) (Đen)', 'laptop-asus-fx504gd-e4177t-i5-8300h-den', 19990000, 0, 1, '5', '1_34_43.jpg', 13, '- CPU: Intel Core i5-8300H ( 2.3 GHz - 4.0 GHz / 8MB / 4 nhân, 8 luồng ) <div> - Màn hình: 15.6\" IPS ( 1920 x 1080 ) , không cảm ứng </div><div> - RAM: 1 x 8GB DDR4 2666MHz  </div><div>- Đồ họa: Intel UHD Graphics 630 / NVIDIA GeForce GTX 1050 2GB GDDR5</div><div>- Lưu trữ: 1TB HDD 5400RPM </div><div> - Hệ điều hành: Windows 10 Home SL 64-bit </div><div> - Pin: 3 cell 48 Wh Pin liền , khối lượng: 2.3 kg</div>', '0', 51, 0, '', '2018-11-30 03:53:25', '2021-10-20 03:27:23'),
(43, 'Laptop Asus S410UN-EB022T (I5-8250U) (Vàng đồng)', 'laptop-asus-s410un-eb022t-i5-8250u-vang-dong', 19290000, 0, 1, '8', 'may-xach-tay-laptop-asus-tp203nah-bp049t-n4200-vang-1.jpg', 13, '- CPU: Intel Core i5-8250U ( 1.6 GHz - 3.4 GHz / 6MB / 4 nhân, 8 luồng ) <div> - Màn hình: 14\" ( 1920 x 1080 ) , không cảm ứng </div><div> - RAM: 1 x 4GB Onboard DDR4 2133MHz </div><div> - Đồ họa: Intel UHD Graphics 620 / NVIDIA GeForce MX150 2GB </div><div> - Lưu trữ: 128GB SSD M.2 SATA / 1TB HDD 5400RPM </div><div> - Hệ điều hành: Windows 10 Home SL 64-bit </div><div> - Pin: 3 cell 42 Wh Pin liền , khối lượng: 1.4 kg</div>', '0', 4, 0, '', '2018-11-30 03:54:22', '2021-10-26 06:29:29'),
(44, 'Laptop Asus UX580GE-BN066T (i7-8750H) (Đen xanh)', 'laptop-asus-ux580ge-bn066t-i7-8750h-den-xanh', 47000000, 0, 0, '12', '1_26_112.jpg', 13, '- CPU: Intel Core i7-8750H ( 2.2 GHz - 4.1 GHz / 9MB / 6 nhân, 12 luồng ) <div> - Màn hình: 15.6\" ( 1920 x 1080 ) , không cảm ứng </div><div> - RAM: 1 x 8GB DDR4 2400MHz </div><div> - Đồ họa: Intel UHD Graphics 630 / NVIDIA GeForce GTX 1050Ti 4GB GDDR5 </div><div> - Lưu trữ: 512GB SSD M.2 NVMe </div><div> - Hệ điều hành: Windows 10 Home 64-bit </div><div> - Pin: 8 cell Pin liền , khối lượng: 1.5 kg</div>', '0', 3, 0, '', '2018-11-30 03:55:12', '2021-10-06 15:10:30'),
(46, 'Laptop Lenovo Ideapad 330-14AST 81D5002CVN (AMD A4-9125) (Đen)', 'laptop-lenovo-ideapad-330-14ast-81d5002cvn-amd-a4-9125-den', 7290000, 0, 0, '20', 'l.jpg', 14, '- CPU: AMD A9-9125 ( 2.3 GHz - 2.6 GHz / 1MB / 2 nhân, 2 luồng ) <div> - Màn hình: 14\" ( 1366 x 768 ) , không cảm ứng </div><div> - RAM: 1 x 4GB DDR4 2666MHz </div><div> - Đồ họa: AMD Radeon R3 Graphics </div><div> - Lưu trữ: 500GB HDD 5400RPM </div><div> - Hệ điều hành: Windows 10 Home SL 64-bit </div><div> - Pin: 2 cell 30 Wh Pin liền , khối lượng: 2.1 kg</div>', '0', 3, 0, '', '2018-11-30 03:59:09', '2021-10-14 03:54:17'),
(47, 'Laptop Lenovo Thinkpad L380-20M5S01500 (I5-8250U) (Bạc)', 'laptop-lenovo-thinkpad-l380-20m5s01500-i5-8250u-bac', 18390000, 0, 2, '7', 'l1.jpg', 14, '- CPU: Intel Core i5-8250U ( 1.6 GHz - 3.4 GHz / 6MB / 4 nhân, 8 luồng ) <div> - Màn hình: 13.3\" IPS ( 1920 x 1080 ) , không cảm ứng </div><div> - RAM: 1 x 4GB DDR4 2400MHz </div><div> - Đồ họa: Intel UHD Graphics 620 </div><div> - Lưu trữ: 256GB SSD M.2 SATA </div><div> - Hệ điều hành: Free DOS </div><div> - Pin: 3 cell 45 Wh Pin liền , khối lượng: 1.5 kg</div>', '0', 13, 0, '', '2018-11-30 03:59:56', '2021-10-26 06:29:29'),
(48, 'Laptop Lenovo Ideapad 330-15IKBR 81DE010CVN (i3-7020U) (Đen)', 'laptop-lenovo-ideapad-330-15ikbr-81de010cvn-i3-7020u-den', 11990000, 0, 1, '19', 'l2.jpg', 14, '- CPU: Intel Core i3-7020U ( 2.3 GHz / 3MB / 2 nhân, 4 luồng ) <div> - Màn hình: 15.6\" ( 1366 x 768 ) , không cảm ứng </div><div> - RAM: 1 x 4GB Onboard DDR4 2133MHz </div><div> - Đồ họa: Intel HD Graphics 620 / AMD Radeon 530 2GB GDDR5 </div><div> - Lưu trữ: 2TB HDD 5400RPM </div><div> - Hệ điều hành: Windows 10 Home SL 64-bit </div><div> - Pin: 2 cell 30 Wh Pin liền , khối lượng: 2.2 kg</div>', '0', 5, 0, '', '2018-11-30 04:00:46', '2021-10-20 08:29:43'),
(49, 'Laptop Lenovo V130-14IKB (81HQ00EQVN) (Xám)', 'laptop-lenovo-v130-14ikb-81hq00eqvn-xam', 9690000, 10, 2, '18', 'l3.jpg', 20, '- CPU: Intel Core i3-7020U ( 2.3 GHz / 3MB / 2 nhân, 4 luồng ) <div> - Màn hình: 14\" ( 1366 x 768 ) , cảm ứng </div><div> - RAM: 1 x 4GB Onboard DDR4 2400MHz </div><div> - Đồ họa: Intel HD Graphics 620 </div><div> - Lưu trữ: 500GB HDD 5400RPM </div><div> - Hệ điều hành: Free DOS </div><div> - Pin: 2 cell 30 Wh Pin liền , khối lượng: 1.5 kg</div>', '0', 15, 0, '', '2018-11-30 04:01:44', '2021-10-05 03:07:07'),
(50, 'Laptop HP 15-bs153TU (3PN47PA) (Bạc)', 'laptop-hp-15-bs153tu-3pn47pa-bac', 13290000, 10, 6, '3', '1_26_125.jpg', 17, '- CPU: Intel Core i5-8250U ( 1.6 GHz - 3.4 GHz / 6MB / 4 nhân, 8 luồng ) <div> - Màn hình: 15.6\" ( 1366 x 768 ) , không cảm ứng </div><div> - RAM: 1 x 4GB DDR4 2400MHz </div><div> - Đồ họa: Intel UHD Graphics 620 </div><div> - Lưu trữ: 1TB HDD 5400RPM </div><div> - Hệ điều hành: Windows 10 Home SL 64-bit </div><div> - Pin: 4 cell 41 Wh Pin rời , khối lượng: 1.9 kg</div>', '0', 12, 0, '', '2018-11-30 04:06:01', '2021-10-26 14:25:30'),
(51, 'Laptop HP Pavilion Gaming 15-cx0177TX (5EF40PA) (Đen)', 'laptop-hp-pavilion-gaming-15-cx0177tx-5ef40pa-den', 24900000, 0, 6, '20', '32.jpg', 17, '- CPU: Intel Core i5-8300H ( 2.3 GHz - 4.0 GHz / 8MB / 4 nhân, 8 luồng ) <div> - Màn hình: 15.6\" ( 1920 x 1080 ) , không cảm ứng </div><div> - RAM: 1 x 8GB DDR4 2666MHz  </div><div>- Đồ họa: Intel UHD Graphics 630 / NVIDIA GeForce GTX 1050 4GB GDDR5 </div><div> - Lưu trữ: 128GB SSD M.2 NVMe / 1TB HDD 7200RPM </div><div> - Hệ điều hành: Windows 10 Home SL 64-bit </div><div> - Pin: 3 cell 52 Wh Pin liền , khối lượng: 2.2 kg</div>', '0', 8, 0, '', '2018-11-30 04:06:58', '2021-10-06 15:11:37'),
(52, 'Laptop HP Pavilion 14-ce0024TU (4ME97PA) (Vàng)', 'laptop-hp-pavilion-14-ce0024tu-4me97pa-vang', 14500000, 10, 6, '14', '1_26_123.jpg', 17, '- CPU: Intel Core i5-8250U ( 1.6 GHz - 3.4 GHz / 6MB / 4 nhân, 8 luồng ) <div> - Màn hình: 14\" IPS ( 1920 x 1080 ) , không cảm ứng </div><div> - RAM: 1 x 4GB DDR4 2400MHz </div><div> - Đồ họa: Intel UHD Graphics 620 </div><div> - Lưu trữ: 1TB HDD 5400RPM </div><div> - Hệ điều hành: Windows 10 Home SL 64-bit </div><div> - Pin: 3 cell 41 Wh Pin liền , khối lượng: 1.6 kg</div>', '0', 33, 0, '', '2018-11-30 04:07:50', '2021-10-06 03:12:33'),
(53, 'Laptop HP Pavilion 15-cc116TU (3PN25PA) (Xám)', 'laptop-hp-pavilion-15-cc116tu-3pn25pa-xam', 15000000, 10, 4, '5', '11.jpg', 17, '- CPU: Intel Core i5-8250U ( 1.6 GHz - 3.4 GHz / 6MB / 4 nhân, 8 luồng ) <div> - Màn hình: 15.6\" ( 1366 x 768 ) , không cảm ứng </div><div> - RAM: 1 x 4GB DDR4 2666MHz </div><div> - Đồ họa: Intel UHD Graphics 620 </div><div> - Lưu trữ: 1TB HDD 5400RPM </div><div> - Hệ điều hành: Windows 10 Home SL 64-bit </div><div> - Pin: 3 cell 41 Wh Pin liền , khối lượng: 2.1 kg</div>', '0', 234, 0, '', '2018-11-30 04:08:43', '2021-10-06 05:50:45'),
(54, 'CHUỘT KHÔNG DÂY ELECOM M-IR07DRSBK', 'chuot-khong-day-elecom-m-ir07drsbk', 299000, 0, 0, '100', 'chuot-khong-day-yen-tinh-elecom-m-ir07drsbk-1.jpg', 38, '- Chuột bluetooth khoảng cách 10m. <div>- Nút click êm không gây ồn </div><div>- Độ phân giải 1200 dpi </div><div>- Receiver: 2.4 GHz </div><div>- Có nút on/off tiết kiệm pin</div>', '0', 5, 0, '', '2018-12-10 00:46:50', '2021-10-14 04:09:26'),
(55, 'CHUỘT KHÔNG DÂY ELECOM M-DY11DRWH', 'chuot-khong-day-elecom-m-dy11drwh', 249000, 0, 0, '100', '10034383-1.jpg', 38, '- Thiết kế cong, sử dụng thoải mái <div>- Băng tần 2,4 GHz, đầu thu USB </div><div>- Đầu thu có thể bảo quản bên trong chuột </div><div>- Công tắt on/off giúp tiết kiệm pin </div><div>- Sử dụng pin AAA </div><div>- Phạm vi kết nối tối đa 10m</div>', '0', 5, 0, '', '2018-12-10 00:47:55', '2021-10-06 14:50:09'),
(56, 'CHUỘT ELECOM M-Y7URBU', 'chuot-elecom-m-y7urbu', 149000, 0, 0, '100', '10034579-1.jpg', 38, '- Độ phân giải 1000 DPI <div>- Có dây dài 1m </div><div>- Giao tiếp qua cổng USB </div><div>- Thiết kế bo tròn đối xứng </div><div>- Sử dụng ngay không cần Driver </div><div>- Thương hiệu nổi tiếng tại Nhật Bản</div>', '0', 0, 0, '', '2018-12-10 00:48:42', '2018-12-14 01:06:56'),
(57, 'CHUỘT KHÔNG DÂY ELECOM M-IR07DRGN', 'chuot-khong-day-elecom-m-ir07drgn', 249000, 0, 0, '100', '123.jpg', 38, '- Độ phân giải: 1200 DPI <div>- Không dây khoảng cách 10m </div><div>- Receiver: 2.4 GHz </div><div>- Cổng: USB, Sử dụng 1 pin AAA </div><div>- Phím chức năng: Standard </div><div>- Nút on/off tiết kiệm pin</div>', '0', 0, 0, '', '2018-12-10 00:49:30', '2018-12-14 01:07:15'),
(58, 'CHUỘT KHÔNG DÂY ELECOM M-IR07DRSBU', 'chuot-khong-day-elecom-m-ir07drsbu', 299000, 0, 0, '100', '321.jpg', 38, '- Chuột bluetooth khoảng cách 10m <div>- Size M </div><div>- Nút click êm không gây ồn </div><div>- Độ phân giải 1200 dpi </div><div>- Receiver: 2.4 GHz </div><div>- Có nút on/off tiết kiệm pin</div>', '0', 0, 0, '', '2018-12-10 00:50:22', '2018-12-14 01:07:28'),
(59, 'BÀN PHÍM LOGITECH KHÔNG DÂY MK215', 'ban-phim-logitech-khong-day-mk215', 290000, 0, 0, '100', 'ban-phim-va-chuoi-khong-day-mk215-1.jpg', 38, '- Bộ bàn phím chuột vi tính <div>- Kết nối: Wireless </div><div>- Thiết kế chống tràn nước </div><div>- Thiết kế nhỏ gọn</div><div>- Chuột không dây tiện lợi </div><div><br></div>', '0', 0, 0, '', '2018-12-10 00:53:09', '2018-12-14 01:08:08'),
(60, 'BỘ BÀN PHÍM VÀ CHUỘT LOGITECH MK240', 'bo-ban-phim-va-chuot-logitech-mk240', 490000, 0, 0, '100', 'bo-ban-phim-va-chuot-logitech-mk240-td-920-008201-1.jpg', 38, '- Bộ bàn phím và chuột không dây <div>- Màu trắng - đỏ </div><div>- Kết nối trong phạm vi 10m </div><div>- Thiết kế chống tràn nước </div><div>- Bảo hành: 12 tháng</div>', '0', 0, 0, '', '2018-12-10 00:54:47', '2018-12-14 01:08:21'),
(61, 'BÀN PHÍM VI TÍNH KHÔNG DÂY RAPOO E2710', 'ban-phim-vi-tinh-khong-day-rapoo-e2710', 616000, 0, 10, '100', '1.jpg', 38, '- Bàn phím không dây sóng 2.4 Ghz <div>- Khoảng cách: 10 m </div><div>- Siêu mỏng: 5.6 mm </div><div>- Chữ in Laser không phai </div><div>- Bảo hánh: 12 tháng</div>', '0', 1, 0, '', '2018-12-10 00:55:30', '2021-10-26 08:18:48'),
(62, 'BÀN PHÍM LOGITECH K400 PLUS', 'ban-phim-logitech-k400-plus', 799000, 0, 0, '100', '2.png', 38, '- Bàn phím không dây <div>- Có Touch Pad </div><div>- Pin: 2 x AA </div><div>- Tuổi thọ pin lên đến 18 tháng</div>', '0', 1, 0, '', '2018-12-10 00:56:18', '2018-12-14 14:49:25'),
(63, 'BỘ BÀN PHÍM VÀ CHUỘT LOGITECH MK2401', 'bo-ban-phim-va-chuot-logitech-mk2401', 470000, 0, 0, '100', '5.jpg', 38, '- Bộ bàn phím chuột vi tính <div>- Kết nối trong phạm vi 10m </div><div>- Bàn phím thiết kế chống tràn nước</div>', '0', 0, 0, '', '2018-12-10 00:57:45', '2018-12-14 01:09:13'),
(64, 'TAI NGHE CÓ MIC ELECOM EHP-IN100MWH-G', 'tai-nghe-co-mic-elecom-ehp-in100mwh-g', 149000, 0, 0, '100', 'EHP-IN100MWH-G.jpg', 41, '- Tai nghe nhét tai có mic <div>- Maximum Input Power 30 mW </div><div>- Jack cắm 3.5mm </div><div>- Độ nhạy: 98dB </div><div>- Bảo hành: 12 tháng </div><div> - Xuất xứ: Nhật Bản</div>', '0', 1, 0, '', '2018-12-10 01:08:27', '2021-10-05 14:17:52'),
(65, 'TAI NGHE PHILIPS SHL3065', 'tai-nghe-philips-shl3065', 599000, 0, 0, '100', 'tai-nghe-philips-shl3065wt.jpg', 41, '- Tai nghe DJ Style Philips <div>- Công suất tối đa: 1000 mW </div><div>- Màng loa: 32 mm </div><div>- Chiều dài dây: 1.2 m </div><div>- Độ nhạy: 106 dB</div>', '0', 0, 0, '', '2018-12-10 01:09:39', '2018-12-14 01:12:01'),
(66, 'TAI NGHE SONY MDR-XB50AP/YQE', 'tai-nghe-sony-mdr-xb50apyqe', 392000, 0, 1, '99', 'tai-nghe-philips-shl3065wt.jpg', 41, '- Bộ màng loa: Loại vòm 12mm <div>- Độ nhạy: 110 dB/mW </div><div>- Tần số phản hồi: 4-24000Hz </div><div>- Độ dài cáp: 1.2m </div><div>- Bảo hành: 06 tháng </div><div> - Xuất xứ: Thái Lan</div>', '0', 0, 0, '', '2018-12-10 01:10:43', '2018-12-14 01:11:49'),
(67, 'TAI NGHE ELECOM EHP-IN100AWH-G', 'tai-nghe-elecom-ehp-in100awh-g', 1000, 0, 0, '100', '2.jpg', 41, '- Tai nghe nhét tai <div>- Jack cắm : 3.5 mm </div><div>- Chiều dài dây: 1.2 m </div><div>- Độ nhạy: 98dB </div><div>- Bảo hành: 12 tháng </div><div> - Xuất xứ: Nhật Bản</div>', '0', 2, 0, '', '2018-12-10 01:11:23', '2021-10-06 02:51:59'),
(68, 'TAI NGHE SENNHEISER HD215 II', 'tai-nghe-sennheiser-hd215-ii', 1500000, 0, 0, '100', '112.jpg', 41, '- Loại tai nghe choàng đầu <div>- Micro: Không </div><div>- Jack cắm: 3.5 / 6.3 mm stereo </div><div>- Chiều dài dây: 3m</div>', '0', 0, 0, '', '2018-12-10 01:12:15', '2018-12-14 01:11:16'),
(69, 'TAI NGHE SENNHEISER HD429 S', 'tai-nghe-sennheiser-hd429-s', 600000, 0, 1, '99', '911.jpg', 41, '- Loại tai nghe choàng đầu <div>- Microphone: Có </div><div>- Jack cắm: 3.5 mm </div><div>- Chiều dài dây: 1.2m</div>', '0', 6, 0, '', '2018-12-10 01:13:54', '2021-10-20 04:06:38'),
(70, 'Ổ CỨNG DI ĐỘNG WD 1TB', 'o-cung-di-dong-wd-1tb', 1290000, 0, 0, '50', '10023736-Ổ-CỨNG-WD-MY-PASSPORT-ULTRA-1TB-ĐỎ-MẬN.png', 39, '- Ổ cứng di động WD Passport Ultra <div>- Dung lượng 1TB </div><div>- Kết nối USB 2.0 / USB 3.0</div>', '0', 4, 0, '', '2018-12-10 01:16:34', '2021-10-06 05:51:00'),
(71, 'Ổ CỨNG DI ĐỘNG WD 1TB XANH', 'o-cung-di-dong-wd-1tb-xanh', 1290000, 0, 0, '50', '10023735-Ổ-CỨNG--WD-MY-PASSPORT-ULTRA-1TB-XANH.png', 39, '- Ổ cứng di động WD Passport Ultra <div>- Dung lượng 1TB </div><div>- Kết nối USB 2.0 / USB 3.0</div>', '0', 1, 0, '', '2018-12-10 01:17:41', '2021-10-06 03:07:25'),
(72, 'Ổ CỨNG DI ĐỘNG WD 2TB', 'o-cung-di-dong-wd-2tb', 24900000, 0, 0, '50', 'o-cung-di-dong-wd-my-passport-ultra-2tb-mau-do-man-1.jpg', 39, '- Ổ cứng di động WD Passport Ultra <div>- Dung lượng 2TB </div><div>- Kết nối USB 3.0 </div><div>- Hệ điều hành tương thích: Windows/Mac </div><div>- Bảo hành: 36 tháng</div>', '0', 0, 0, '', '2018-12-10 01:18:46', '2018-12-14 01:10:30'),
(73, 'Ổ CỨNG DI ĐỘNG WD ELEMENTS 2TB', 'o-cung-di-dong-wd-elements-2tb', 2490000, 0, 0, '50', 'wd_elements_1tb_-_2.5_usb_3.0_1.u579.d20160808.t172730.328870_ukze-4q.jpg', 39, '- Ổ cứng di động Western Elements <div>- Dung lượng 2TB </div><div>- Kết nối USB 2.0 / USB 3.0 </div><div>- Tốc độ kết nối tối đa: 5Gb/s </div><div>- Tương thích: Windows/ Mac</div>', '0', 0, 0, '', '2018-12-10 01:19:35', '2018-12-14 01:10:16'),
(74, 'Ổ CỨNG SEAGATE BACKUP PLUS SLIM 1TB', 'o-cung-seagate-backup-plus-slim-1tb', 1640000, 0, 0, '50', 'o-cung-seagate-backup-plus-slim-1tb-xanh-1.jpg', 39, '- Kích thước: 2.5\" <div>- Màu xanh dương </div><div>- Dung lượng: 1TB </div><div>- Kết nối: USB 3.0 </div><div>- Bảo hành: 36 tháng</div>', '0', 0, 0, '', '2018-12-10 01:20:25', '2018-12-14 01:15:18'),
(75, 'Máy tính để bàn/ PC HP AIO 22-c0057d (i5 8400T/4GB/1TB/Win10) 21.5', 'may-tinh-de-ban-pc-hp-aio-22-c0057d-i5-8400t4gb1tbwin10-215', 19490000, 0, 1, '49', '1_47_22.jpg', 35, '- CPU: Intel Core i5-8400T ( 1.7 GHz - 3.3 GHz / 9MB / 6 nhân, 6 luồng ) <div>- Màn hình: 21.5\" IPS ( 1920 x 1080 ) cảm ứng </div><div>- RAM: 1 x 4GB DDR4 2666MHz </div><div>- Đồ họa: Intel UHD Graphics 630 </div><div>- Lưu trữ: / 1TB HDD 7200 RPM </div><div>- Tặng kèm chuột;bàn phím</div>', '0', 5, 0, '', '2018-12-10 01:36:43', '2021-10-26 06:29:29'),
(76, 'Máy tính để bàn/ PC HP AIO 22-c0059d (i5 8400T/4GB/1TB/MX110 2G/Win10) 21.5', 'may-tinh-de-ban-pc-hp-aio-22-c0059d-i5-8400t4gb1tbmx110-2gwin10-215', 19590000, 0, 0, '50', '1_47_22.jpg', 35, '- CPU: Intel Core i5-8400T ( 1.7 GHz - 3.3 GHz / 9MB / 6 nhân, 6 luồng ) <div> - Màn hình: 21.5\" IPS ( 1920 x 1080 ) cảm ứng </div><div> - RAM: 1 x 4GB DDR4 2666MHz </div><div> - Đồ họa: Intel UHD Graphics 630 / GeForce MX110 </div><div> - Lưu trữ: / 1TB HDD 7200 RPM </div><div> - Tặng kèm chuột;bàn phím</div>', '0', 3, 0, '', '2018-12-10 01:37:42', '2021-10-20 03:02:23'),
(77, 'Máy tính để bàn/ PC Dell AIO Inspiron 3277B (4115U)', 'may-tinh-de-ban-pc-dell-aio-inspiron-3277b-4115u', 12590000, 0, 0, '50', 'dell-aio-inspiron-3277b-0.jpg', 35, '- CPU: Intel Pentium 4415U ( 2.3 GHz / 2MB / 2 nhân, 4 luồng ) <div> - Màn hình: 21.5\" ( 1920 x 1080 ) không cảm ứng </div><div> - RAM: 1 x 4GB DDR4 2400MHz </div><div> - Đồ họa: Intel HD Graphics 610 </div><div> - Lưu trữ: / 1TB HDD 5400 RPM </div>', '0', 0, 0, '', '2018-12-10 01:38:47', '2018-12-14 01:14:27'),
(78, 'Máy tính để bàn/ PC Asus AIO Vivo V222UA (i5 8250U/4GB/1TB/Win 10) 21.5', 'may-tinh-de-ban-pc-asus-aio-vivo-v222ua-i5-8250u4gb1tbwin-10-215', 157000000, 0, 0, '50', '1_39_172.jpg', 35, '- CPU: Intel Core i5-8250U ( 1.6 GHz - 3.4 GHz / 6MB / 4 nhân, 8 luồng ) <div> - Màn hình: 21.5\" ( 1920 x 1080 ) không cảm ứng </div><div> - RAM: 1 x 4GB DDR4 2400MHz </div><div> - Đồ họa: Intel UHD Graphics 620 </div><div> - Lưu trữ: / 1TB HDD 5400 RPM </div><div> - Tặng kèm chuột;bàn phím</div>', '0', 3, 0, '', '2018-12-10 01:39:40', '2018-12-26 05:12:25'),
(79, 'PC HNC PROFESSIONAL GAMING P12 RYZEN5 1600/8G/1060-3G', 'pc-hnc-professional-gaming-p12-ryzen5-16008g1060-3g', 15900000, 0, 0, '50', '43910_pcgm126_amd_2.jpg', 36, '- CPU: AMD Ryzen 5 1600 socket AM4. <div>- Mainboard: Gigabyte X370M-DS3H (AMD) </div><div> - RAM: ANTECMEMORY 8GB (1x8GB) DDR4 Bus 2400 (1S) </div><div> - VGA: Asus Dual GTX1060-O3G (192bits) </div><div> - Nguồn: Andyson Venus 500W </div><div> - SSD: Kingston SSDNow A400 240GB </div><div> - Case: 1STPLAYER Bullet Hunter - H3</div>', '0', 2, 0, '', '2018-12-10 01:50:59', '2021-10-26 14:25:50'),
(80, 'PC HNC PROFESSIONAL MSI EDITION LIMITED GAMING P9 I5 8500/8G/240G/1060-6G', 'pc-hnc-professional-msi-edition-limited-gaming-p9-i5-85008g240g1060-6g', 26700000, 0, 0, '50', '43041_pcgm116_2.png', 36, '- CPU: Intel Core i5 8500 (Coffee Lake ) <div>- Bo mạch chủ: MSI B360 GAMING PRO CARBON</div><div>- RAM: DDR4 ANTECMEMORY 8GB/2400 RGB </div><div>- Nguồn: FSP Power Supply HYDRO Series Model HD600 </div><div> - Case Cooler Master MASTERBOX 5 MSI Edition </div><div> - SSD Kingston SSDNow A400 240GB </div><div> - VGA: MSI GTX 1060 GAMING X 6G </div><div> - Tản nhiệt CPU Cooler Master MasterAir 410P</div>', '0', 2, 0, '', '2018-12-10 01:53:01', '2021-10-10 10:38:29'),
(81, 'PC HNC ADVANCED GAMING A2 G5400/4G/120G/1050', 'pc-hnc-advanced-gaming-a2-g54004g120g1050', 10600000, 0, 0, '20', '43263_pcgm117__custom_.jpg', 36, '<ul><li>CPU: Intel Pentium Gold G5400 (Coffee Lake)<br></li><li>Bo mạch chủ: ASUS PRIME H310M-K (T)<br></li><li>RAM: DDRam 4 AVEXIR 4GB/2400 Budget<br></li><li>Nguồn: Andyson E5+ 300W<br></li><li>Case: SAMA X Black <br></li><li>SSD: Kingston SSD Now A400 120GB<br></li><li>VGA: ASUS PH1050-3G<br></li></ul>', '0', 3, 0, '', '2018-12-10 01:53:40', '2021-09-30 08:23:39'),
(82, 'PC HNC ADVANCED GAMING A3 G5400/8G/120G/1050Ti', 'pc-hnc-advanced-gaming-a3-g54008g120g1050ti', 12000000, 0, 0, '20', '43264_pcgm118__custom_.jpg', 36, '<ul><li>CPU Intel Pentium Gold G5400 3.7 GHz / 4MB / 2 Cores, 4 Threads / HD 630 Series Graphics / Socket 1151 (Tray , No Fan)<br></li><li>Mainboard ASUS PRIME H310M-K (T) <br></li><li>DDRam 4 Kingston HyperX Fury Black 8G/2400 - HX424C15FB2/8 <br></li><li>Nguồn 1STPLAYER 450W PS-450BS Active PFC 80Plus \r\n- Case SAMA X Black \r\n- Vga Card ASUS CERBERUS-GTX1050TI-O4G \r\n- Fan CPU Socket 1151<br></li></ul>', '0', 2, 0, '', '2018-12-10 01:55:06', '2021-10-06 10:40:31'),
(83, 'PC HNC PROFESSIONAL GAMING WATERCOOLING RGB P8 I3 8100/8G/240G/1060-3G', 'pc-hnc-professional-gaming-watercooling-rgb-p8-i3-81008g240g1060-3g', 20000000, 0, 1, '20', '42156_pcgm106__custom_2.png', 36, '<div style=\"text-align: left;\"><ul><li> CPU Intel Core i3-8100 (Coffee Lake ) <br></li><li> Mainboard ASUS TUF B360 PLUS GAMING <br></li><li> DDRam 4 ANTECMEMORY 8GB/2400 RGB <br></li><li> Andyson Venus 500W  \r\n- Case Huntkey GX600P <br></li><li> SSD Kingston SSDNow A400 240GB <br></li><li> VGA Palit GTX 1060 Dual 3GB <br></li><li> Tản nhiệt nước Custom Freezemod Elite RGB \r\n- Nước cất dùng cho tản nhiệ<br></li></ul></div>', 'Chi tiết', 13, 0, '', '2018-12-10 01:55:50', '2021-10-26 08:20:04'),
(85, 'Office Home & Student 2021 For PC/Mac Vĩnh Viễn All Languages', 'Office Home & Student 2021 For PC/Mac Vĩnh Viễn All Languages', 2000000, 10, 0, '100', 'office1.jpg', 79, 'Bản quyền vĩnh viễn, thiết lập cho 1 tài khoản Microsoft.\r\n<br>Hỗ trợ thiết bị hoạt động trên nền tảng Windows/MacOS.</br>\r\nSử dụng ngôn ngữ đa dạng. \r\n<br>Cung cấp các ứng dụng quan trọng nhất của Microsoft bao gồm Word, Excel, Powerpoint, OneNote.</br>', '0', 2, 0, '', '2018-12-10 00:56:18', '2021-10-26 03:54:51'),
(86, 'ESET NOD32 Antivirus cho Windows - 1 PC', 'ESET NOD32 Antivirus cho Windows - 1 PC', 150000, 0, 1, '10', 'virus.jpg', 79, '<br><b>Thông số kỹ thuật ESET NOD32 Antivirus cho Windows - 1 PC</b></br>\r\n\r\nLoại phần mềm Diệt Virus\r\n<br>Hãng sản xuất ESET</br>\r\nTính năng nâng cao Không có\r\n<br>Tính năng khác Không có</br>\r\nYêu cầu đĩa quang Không có\r\n<br>Yêu cầu CPU Bộ xử lý Intel hoặc AMD, 32-bit (x86) với tập lệnh SSE2 hoặc 64bit (x64), 1 GHz trở lên</br>\r\nYêu cầu RAM 512 MB\r\n<br>Yêu cầu đồ họa Không có</br>\r\nYêu cầu dung lượng đĩa trống 1 GB\r\n<br>Tương thích hệ điều hành Windows 10</br>', 'san phẩm rất thích hợp sử dụng cho máy tính cá nhân', 15, 0, '', '2021-09-30 03:46:44', '2021-10-26 04:51:02'),
(87, 'Windows 10 Home 32-bit/64-bit All Languages (KW9-00265) ', 'Windows 10 Home 32-bit/64-bit All Languages (KW9-00265) ', 3290000, 5, 2, '0', 'win10.jpg', 79, '<b>Đặc điểm nổi bật</b>\r\n\r\n<br>Bản quyền vĩnh viễn cho 1 thiết bị: cài đặt cho 1 Máy tính bàn hoặc 1 Laptop\r\nĐược cập nhật những tính năng mới nhất, miễn phí trong suốt thời gian sử dụng\r\nCó thể chuyển đổi sang máy tính mới sau khi gỡ bỏ Windows trên máy cũ</br>\r\nTổng đài hỗ trợ Microsoft Việt Nam: https://support.microsoft.com/vi-vn/contactus\r\n<br>Sản phẩm không áp dụng chính sách đổi trả hàng</br>\r\nKey bán ra dưới dạng mã in sẵn, không đi kèm hộp', 'Sản phẩm  phù hop cho máy tính cá nhân phục vụ cho việc học tập và làm việc văn phòng.', 9, 0, '', '2021-09-30 03:46:44', '2021-10-26 06:29:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `users_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `huy` int(11) NOT NULL DEFAULT 0,
  `done` int(11) NOT NULL DEFAULT 0,
  `tructuyen` int(11) DEFAULT 0,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `users_id`, `status`, `note`, `huy`, `done`, `tructuyen`, `create_at`, `update_at`) VALUES
(184, '13157100', 29, 1, '', 0, 0, 0, '2021-09-30 07:34:32', '2021-09-30 10:53:51'),
(186, '42240000', 29, 0, '', 0, 0, 0, '2021-10-01 06:35:13', '2021-10-01 06:35:13'),
(187, '29205000', 29, 1, 'abc', 0, 0, 0, '2021-10-04 15:38:54', '2021-10-04 15:39:42'),
(188, '13157100', 29, 0, 'abc', 1, 1, 0, '2021-10-05 03:11:53', '2021-10-05 03:26:20'),
(189, '13157100', 29, 0, '', 0, 0, 0, '2021-10-05 03:13:54', '2021-10-05 03:13:54'),
(190, '13157100', 29, 0, '', 1, 0, 0, '2021-10-05 03:14:25', '2021-10-26 08:09:39'),
(191, '13157100', 29, 1, '', 0, 0, 0, '2021-10-05 03:18:43', '2021-10-05 03:33:18'),
(192, '13157100', 29, 0, '', 0, 0, 0, '2021-10-05 03:20:03', '2021-10-09 03:48:07'),
(194, '660000', 29, 1, '', 0, 0, 0, '2021-10-06 07:43:04', '2021-10-09 03:48:09'),
(195, '588362500', 29, 1, '1234567895Hau', 0, 0, 0, '2021-10-26 06:29:18', '2021-10-26 06:29:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(255) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `token` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `account`, `email`, `phone`, `address`, `level`, `password`, `avatar`, `status`, `token`, `create_at`, `update_at`) VALUES
(29, 'tranquochaua2', 'trần quốc hậu', 'tranquochaua2@gmail.com', '0374216629', 'soc trang', 0, '6ac880fb3a082a9bd546a49938e9e0d7', 'dell-inspiron-3576-f3576-70153188-0.jpg', 1, 'McbRPeNzSj', '2021-09-30 06:54:57', '2021-10-10 10:15:33'),
(30, 'hauhauhau', 'tranquochauhau', 'tranquochaua3@gmail.com', '0374216629', 'soc trang', 0, '124bd1296bec0d9d93c7b52a71ad8d5b', '', 1, '', '2021-10-09 03:06:19', '2021-10-09 03:06:19'),
(31, 'hauhauhauhau', 'tranquochauhau2', 'tranquochaua4@gmail.com', '0374216629', 'soc trang', 0, 'ce612626ed2cb99703cb6daaee378093', '', 1, '', '2021-10-09 03:09:50', '2021-10-09 03:09:50'),
(32, 'hauhaunek', 'trần quốc hậu', 'tranquochaua1655@gmail.com', '0374216629', 'soc trang', 0, 'ce612626ed2cb99703cb6daaee378093', '', 1, '', '2021-10-10 10:03:27', '2021-10-10 10:03:27'),
(33, 'hauhaunekn', 'trần quốc hậu', 'tranquochaua16555@gmail.com', '0374216629', 'soc trang', 0, '124bd1296bec0d9d93c7b52a71ad8d5b', '', 1, '', '2021-10-10 10:09:25', '2021-10-10 10:09:25'),
(34, 'hauhauneknn', 'trần quốc hậu', 'tranquochaua165555@gmail.com', '0374216629', 'soc trang', 0, '22975d8a5ed1b91445f6c55ac121505b', '', 1, '', '2021-10-10 10:21:24', '2021-10-10 10:21:24');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muc`
--
ALTER TABLE `muc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nganluong`
--
ALTER TABLE `nganluong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `panel`
--
ALTER TABLE `panel`
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
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT cho bảng `muc`
--
ALTER TABLE `muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `nganluong`
--
ALTER TABLE `nganluong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT cho bảng `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `panel`
--
ALTER TABLE `panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
