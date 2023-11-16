-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 11, 2023 lúc 03:17 PM
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
-- Cơ sở dữ liệu: `cdtt_sachtruyen`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(10) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `meta_desc`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'kinh thánh', 'kinh-thanh', '1000 chữ', '2023-10-04 13:02:59', '2023-10-08 11:46:45', 1, '2023-10-08 11:46:45'),
(5, 'Light Novel', 'light-novel', '0', '2023-10-07 06:26:47', '2023-10-08 11:46:21', 0, NULL),
(6, 'Ngôn Tình', 'ngon-tinh', '0', '2023-10-07 06:28:56', '2023-10-08 11:46:02', 0, NULL),
(7, 'Tiểu thuyết', 'tieu-thuyet', '0', '2023-10-07 06:12:01', '2023-10-08 11:45:36', 0, NULL),
(8, 'Marketing - Bán Hàng', 'marketing-ban-hang', '0', '2023-10-08 11:48:21', '2023-10-08 11:48:21', 0, NULL),
(9, 'Khởi Nghiệp - Làm Giàu', 'khoi-nghiep-lam-giau', '0', '2023-10-08 11:48:34', '2023-10-08 11:48:34', 0, NULL),
(10, 'Chứng Khoán - Bất Động Sản - Đầu Tư', 'chung-khoan-bat-dong-san-dau-tu', '0', '2023-10-08 11:48:48', '2023-10-08 11:48:48', 0, NULL),
(11, 'Kỹ Năng Sống', 'ky-nang-song', '0', '2023-10-08 11:49:21', '2023-10-08 11:49:21', 0, NULL),
(12, 'Tâm Lý', 'tam-ly', '0', '2023-10-08 11:49:32', '2023-10-08 11:49:32', 0, NULL),
(13, 'Rèn Luyện Nhân Cách', 'ren-luyen-nhan-cach', '0', '2023-10-08 11:49:42', '2023-10-08 11:49:42', 0, NULL),
(14, 'Truyện Thiếu Nhi', 'truyen-thieu-nhi', '0', '2023-10-08 11:50:40', '2023-10-08 11:50:40', 0, NULL),
(15, 'Tô Màu, Luyện Chữ', 'to-mau-luyen-chu', '0', '2023-10-08 11:50:51', '2023-10-08 11:50:51', 0, NULL),
(16, 'Kiến Thức - Kỹ Năng Sống Cho Trẻ', 'kien-thuc-ky-nang-song-cho-tre', '0', '2023-10-08 11:51:01', '2023-10-08 11:51:01', 0, NULL),
(17, 'Câu Chuyện Cuộc Đời', 'cau-chuyen-cuoc-doi', '0', '2023-10-08 11:51:29', '2023-10-08 11:51:29', 0, NULL),
(18, 'Nghệ Thuật - Giải Trí', 'nghe-thuat-giai-tri', '0', '2023-10-08 11:51:38', '2023-10-08 11:51:38', 0, NULL),
(19, 'Lịch Sử', 'lich-su', '0', '2023-10-08 11:51:51', '2023-10-08 11:51:51', 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `meta_desc`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, '9999999999', '4545456', '7/*7646', 0, '2023-10-05 00:42:35', '2023-10-04 11:18:35', '2023-10-05 00:42:35'),
(4, 'Sách mới', 'sach-moi', 'Mới cập nhật', 0, NULL, '2023-10-04 11:18:35', '2023-10-08 11:44:33'),
(11, 'Kinh tế', 'kinh-te', 'Cung cấp kiến thức về lĩnh vực kinh tế', 0, NULL, '2023-10-04 11:18:35', '2023-10-08 11:43:23'),
(12, 'Tiểu sử - Hồi ký', 'tieu-su-hoi-ky', 'Hồi ký là sáng tác thuộc nhóm thể loại ký, thiên về trần thuật từ ngôi tác giả, kể về những sự kiện có thực xảy ra trong cuộc đời tác giả', 0, NULL, '2023-10-04 11:18:35', '2023-10-08 11:41:13'),
(14, 'Tâm lí- Kĩ Năng Sống', 'tam-li-ki-nang-song', 'Chủ đề sách Tâm lý - Kỹ năng sống là chủ đề rất đáng để đọc trong cuộc sống', 0, NULL, '2023-10-04 11:18:35', '2023-10-08 11:39:57'),
(15, 'ádasd343546546', 'ád12312312', '312312312', 1, '2023-10-05 04:39:22', '2023-10-04 11:18:35', '2023-10-05 04:39:22'),
(16, 'ádasd343546546', 'ád12312312', '312312312', 1, '2023-10-05 03:32:20', '2023-10-04 11:18:35', '2023-10-05 03:32:20'),
(18, '2', '2', '2', 0, '2023-10-04 01:43:32', '2023-10-04 11:18:35', '2023-10-04 11:23:25'),
(19, '4', '4', '4', 0, '2023-10-04 01:43:31', '2023-10-04 11:18:35', '2023-10-04 11:23:25'),
(21, 'sách truyện', 'sach-truyen', 'hay', 0, '2023-10-04 05:40:18', '2023-10-04 11:27:48', '2023-10-04 05:40:18'),
(22, 'Thiếu Nhi', 'thieu-nhi', 'Dành cho trẻ em', 0, NULL, '2023-10-04 05:25:49', '2023-10-08 11:38:44'),
(99, 'Văn học', 'van-hoc', 'Những cuốn sách văn học luôn tạo sức ảnh hưởng và có giá trị truyền tải những bài học sâu sắc.', 0, NULL, '2023-10-04 11:18:35', '2023-10-08 11:36:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `name`, `email`, `phone`, `title`, `content`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 1, 'Châu Thiên Cường', 'chauthiencuong123@gmail.com', '0948770702', 'Chính sách vận chuyển', 'Chúng tôi cung cấp dịch vụ giao hàng toàn quốc, gửi hàng tận nơi đến địa chỉ cung cấp của Quý khách. Thời gian giao hàng dự kiến phụ thuộc vào kho có hàng và địa chỉ nhận hàng của Quý khách.', '2023-10-11 04:56:21', NULL, '2023-10-11 05:55:10', NULL, 0, NULL),
(2, 1, 'Nguyễn Xuân Đạt', 'datvipprono1@gmail.com', '0555444333', '12312312', '13123', '2023-10-11 05:56:26', NULL, '2023-10-11 05:56:26', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2023_10_05_111923_add_deleted_at_to_brand_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(1000) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `detail` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `topic_id`, `title`, `slug`, `detail`, `status`, `image`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(2, 2, '1', '1', '1', 0, 'toi-hoc-dai-hoc26.jpg', '2023-10-09 10:36:58', '2023-10-09 10:36:58', NULL, NULL, NULL),
(3, 3, '12', '12', '212', 0, 'Nhà_giả_kim_(sách)39.jpg', '2023-10-09 10:58:35', '2023-10-09 10:58:35', NULL, NULL, NULL),
(4, 2, '33333333333333  4  4444444444444444444444', '33333333333333  444', '333333333333334444444444444444', 0, 'dac-nhan-tam24.png', '2023-10-09 11:01:07', '2023-10-09 11:06:01', NULL, NULL, NULL),
(5, 2, '7', '7', '7', 0, 'dac-nhan-tam54.png', '2023-10-09 11:14:00', '2023-10-09 11:20:51', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `price_sale` float UNSIGNED NOT NULL DEFAULT 0,
  `image` varchar(1000) NOT NULL,
  `detail` mediumtext DEFAULT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `brand_id`, `name`, `slug`, `price`, `price_sale`, `image`, `detail`, `meta_desc`, `meta_key`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 14, 12, 'Đắc nhân tâm', 'dac-nhan-tam', 100, 0, 'dac-nhan-tam86.png', NULL, '0', '0', 0, '2023-10-08 05:35:42', '2023-10-09 03:39:48', NULL),
(9, 12, 17, 'Tôi Học Đại Học - Nguyễn Ngọc Ký (Tái Bản)', 'toi-hoc-dai-hoc-nguyen-ngoc-ky-tai-ban', 83.3, 0, 'toi-hoc-dai-hoc82.jpg', NULL, '0', '0', 0, '2023-10-08 11:54:28', '2023-10-09 10:43:55', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic`
--

CREATE TABLE `topic` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `topic`
--

INSERT INTO `topic` (`id`, `name`, `slug`, `meta_desc`, `meta_key`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(2, 'Mặt trời', 'mat-troi', 'Mặt trời', 'Mặt trời', 0, '2023-10-09 05:05:45', 1, '2023-10-09 10:38:23', NULL, NULL),
(3, 'mặt trăng', 'mat-trang', 'mặt trăng', 'mặt trăng', 1, '2023-10-09 10:38:42', 1, '2023-10-09 10:38:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'chauthiencuong', 'chauthiencuong123@gmail.com', NULL, '$2y$10$V0olQNIhzF.m3FN2/KQUHu6z6nslsIWNLoAhSqEsdk.KA2gLdZFwO', 'nP7lSQx7dKHt30cN0mAhWon8lYEOxEmQPzn6KcqEF6srmiI7KxxuttrbEf7o', '2023-09-30 10:23:55', '2023-09-30 10:23:55');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`,`brand_id`);

--
-- Chỉ mục cho bảng `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
