-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 15, 2022 lúc 07:56 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `totodb_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `name`, `price`, `quantity`, `product_id`, `customer_id`, `collection_id`, `category_id`, `created_at`, `updated_at`) VALUES
(98, 'Áo thun SimpleShirt', '90000', 3, 6, 9, 3, 1, '2022-08-31 02:17:24', '2022-08-31 02:17:24'),
(103, 'Áo khoác unise Army', '350000', 3, 4, 8, 2, 6, '2022-08-31 04:44:20', '2022-08-31 04:44:20'),
(104, 'Áo khoác unise Army', '350000', 3, 4, 8, 2, 6, '2022-08-31 04:48:49', '2022-08-31 04:48:49'),
(106, 'Áo khoác unise Army', '350000', 3, 4, 8, 2, 6, '2022-08-31 04:49:31', '2022-08-31 04:49:31'),
(108, 'Balo Da ToTo', '500000', 1, 5, 0, 3, 4, '2022-08-31 16:09:59', '2022-08-31 16:09:59'),
(123, 'Balo Da ToTo', '500000', 1, 5, 0, 3, 4, '2022-08-31 19:12:37', '2022-08-31 19:12:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `title`, `slug`, `description`, `image`, `status`) VALUES
(1, 'Áo thun', 'ao-thun', 'Danh mục áo thun ToToShop', 'ao_thun94301.jpg', 1),
(2, 'Áo sơ mi', 'ao-so-mi', 'Danh mục áo sơ mi của ToToShop', 'ao_so_mi62388.jpg', 1),
(3, 'Đồ đôi', 'do-doi', 'Danh mục đồ đôi của ToToShop', 'do_doi95833.jpg', 1),
(4, 'Phụ kiện', 'phu-kien', 'Danh mục phụ kiện của ToToShop', 'phu_kien60481.jpg', 1),
(5, 'Quần', 'quan', 'Quần các loại', 'quan56034.jpg', 1),
(6, 'Áo khoác', 'ao-khoac', 'Áo khoác nam, nữ', 'ao_khoac91981.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `collection`
--

CREATE TABLE `collection` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `collection`
--

INSERT INTO `collection` (`id`, `title`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Thu Đông 2022', 'thu-dong-2022', 'Các sản phẩm thu đông 2022 bao gồm áo khoác và một vài phụ kiện', 'ao_khoac_w2akn05205fosbb21693.jpg', 1, '2022-08-23 00:20:55', '2022-08-23 01:00:47'),
(3, 'ToTo x OnePiece', 'toto-x-onepiece', 'Các sản phẩm colab với One Piece', 'icon_shop95334.jpg', 1, '2022-08-23 01:04:40', '2022-08-23 01:04:40'),
(4, 'Mùa Hè 2023', 'mua-he-2023', 'Các sản phẩm mùa hè 2023 sắp được ra mặt', 'non_luoi_trai_a2nlt0121199986.jpg', 0, '2022-08-23 01:05:14', '2022-08-23 01:05:14'),
(5, 'Bộ sưu tập NASA', 'bo-suu-tap-nasa', 'Các sản phẩm vì sao nasa', 'ao_so_mi_nasashirt70906.jpg', 1, '2022-08-25 01:59:30', '2022-08-25 01:59:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `created_at`, `updated_at`, `name`, `gender`, `birthday`, `email`, `phone`, `address`, `password`) VALUES
(8, '2022-08-24 03:54:39', '2022-08-24 03:54:39', 'Nguyễn Lê Thiên Bảo', 2, '2001-09-22', 'tu1234321@gmail.com', '098765432123', 'Hà Nội', '$2y$10$0tP/8YJldlGgGB9YcCUymuBXC01z.KId801ZwyyMoOwP0o7pnff4K'),
(9, '2022-08-24 04:16:37', '2022-08-24 04:16:37', 'Vũ Văn Hào', 3, '2002-10-02', 'hao123456@gmail.com', '0992829183913', 'Hà Nam', '$2y$10$5zFI/UmMpn/P4Ly93DONy.UkGeTmtR8KJHA0s43yovRgADniAy2BK'),
(10, '2022-08-24 04:17:46', '2022-08-24 04:17:46', 'Trần Văn Lan', 1, '2001-12-06', 'lan123456@gmail.com', '0917384187221', 'Hà Đông', '$2y$10$YfVe5nftLywegSQqVKvUk..SGaT9Z3LQX6Krdr/L4gXYVn4Ku/6LS'),
(14, '2022-08-25 00:15:55', '2022-08-25 00:16:39', 'Nguyễn Văn Tú', 1, '2001-09-22', 'tu72589tu@gmail.com', '0923377129', '159/23 Phùng Khoang', '$2y$10$3DK/Bnc/1/VndJoDl76QfOjyPW/J5v4JHLxpOQWEulBVabpFEATEm'),
(15, '2022-08-27 08:47:25', '2022-08-30 00:23:33', 'Nguyễn Văn Hồng', 1, '2005-12-03', 'hong123456@gmail.com', '0923377129', '159/23 Phùng Khoang', '$2y$10$5ETIUqR6bjCLxnMiGWNhDO/2ooRblAAvEE/1Gty0x4trhYbT120yu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_23_035119_create_collection_table', 2),
(6, '2022_08_24_065509_create_customers_table', 3),
(7, '2022_08_27_090405_create_contacts_table', 4),
(8, '2022_08_29_033520_create_carts_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tu72589@gmail.com', '$2y$10$mj4AQCY196fT9T/3kyW6SerFKeaVuJ8iEgp..2okEHHNcTdyBytzi', '2022-08-23 23:51:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `saleoff` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `title`, `slug`, `description`, `quantity`, `price`, `saleoff`, `category_id`, `collection_id`, `image`, `status`) VALUES
(1, 'Quần Short Classic', 'quan-short-classic', '<p>Quần short classic&nbsp;</p>\r\n\r\n<p>M&agrave;u đen&nbsp;&nbsp;</p>', 140, '120000', '100000', 5, 2, 'quan_short_classic20184.jpg', 1),
(2, 'Mũ Bucket', 'mu-bucket', '<p>Mũ bucket m&agrave;u đỏ&nbsp;</p>', 50, '80000', '80000', 4, 5, 'non_bucket_a2nbk1210850283.jpg', 1),
(3, 'Áo Khoác Ideals', 'ao-khoac-ideals', '<p>&Aacute;o kho&aacute;c nam nữ c&aacute;c loại&nbsp;</p>', 140, '250000', '250000', 6, 3, 'ao_khoac_nam_ideals49950.jpg', 1),
(4, 'Áo khoác unise Army', 'ao-khoac-unise-army', '<p>&Aacute;o kho&aacute;c unisex&nbsp;</p>\r\n\r\n<p>M&ugrave;a đen</p>', 99, '390000', '350000', 6, 2, 'ao_khoac_unisex_army14706.jpg', 1),
(5, 'Balo Da ToTo', 'balo-da-toto', '<p>Sản phẩm da chất lượng cao</p>', 50, '500000', '500000', 4, 3, 'balo_a2bla0520666218.jpg', 1),
(6, 'Áo thun SimpleShirt', 'ao-thun-simpleshirt', '<p>&Aacute;o thun Simple&nbsp;</p>', 250, '100000', '90000', 1, 3, 'ao_thun_simpetshirt25670.jpg', 1),
(7, 'Áo sơ mi NASA shirt', 'ao-so-mi-nasa-shirt', '<p>&aacute;o nasa</p>\r\n\r\n<p>New</p>', 100, '100000', '100000', 2, 5, 'ao_so_mi_nasashirt46545.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `title`, `description`, `image`, `status`) VALUES
(1, 'Áo nữ', 'Sale off 10%', 'slide140486.jpg', 1),
(2, 'Áo Đôi', 'Sale off 20% cho các cặp đôi', 'slide267467.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Tú', 'tu72589@gmail.com', NULL, '$2y$10$oLLADWMEI489J4VKXCo7Ee8XKZeQSdlHmUXLT9jX4QAln8UCQ2mH2', NULL, '2022-08-21 01:34:28', '2022-08-21 01:34:28');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
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
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
