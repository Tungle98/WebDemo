-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 15, 2020 lúc 11:13 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GioiTinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GhiChu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `Name`, `GioiTinh`, `email`, `DiaChi`, `SDT`, `GhiChu`, `created_at`, `updated_at`) VALUES
(1, 'Tran van a', 'Nam', 'Atran@gmail.com', 'Thanh tri Ha Noi', '1552455225', 'note', '2020-04-06 02:20:13', NULL),
(10, 'hoang van mach', 'nam', 'thucmam97@gmail.com', 'yen dinh thanh Hoa', '44545445', 'giao nhanh', '2020-04-10 01:40:35', '2020-04-10 01:40:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_04_05_145935_customer', 1),
(4, '2020_04_05_145958_oder', 1),
(5, '2020_04_05_150056_order_detail', 1),
(6, '2020_04_05_150129_product', 1),
(7, '2020_04_05_150149_product_type', 1),
(8, '2020_04_05_150207_news', 1),
(9, '2020_04_05_150215_slide', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `new`
--

CREATE TABLE `new` (
  `id` int(10) UNSIGNED NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `idCustomer` int(11) NOT NULL,
  `NgayDat` date NOT NULL,
  `ThanhToan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TongTien` double NOT NULL,
  `GhiChu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `idCustomer`, `NgayDat`, `ThanhToan`, `TongTien`, `GhiChu`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-04-02', 'paied', 500999, '', '2020-04-06 02:21:37', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `idOrder` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `DonViGia` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `idOrder`, `idProduct`, `quantity`, `DonViGia`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 2, 45000, '2020-04-10 01:16:26', '2020-04-10 01:16:26'),
(2, 4, 2, 1, 18000, '2020-04-10 01:40:36', '2020-04-10 01:40:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idType` int(10) UNSIGNED NOT NULL,
  `MoTa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DonViGia` double(8,2) NOT NULL,
  `GiaKM` double(8,2) NOT NULL,
  `Hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DonVi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `New` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `Name`, `idType`, `MoTa`, `DonViGia`, `GiaKM`, `Hinh`, `DonVi`, `New`, `created_at`, `updated_at`) VALUES
(2, 'Bánh Pía', 1, 'lam tu pia', 20000.00, 18000.00, '1234.jpg', 'hop', '1', '2020-04-06 15:24:27', '2020-04-22 03:03:37'),
(3, 'Bánh gato  nhân dâu', 2, 'co them vi dau', 250000.00, 200000.00, 'banhkem-dau.jpg', 'Cai', '0', '2020-04-06 15:27:27', '2020-04-22 01:47:40'),
(4, 'Banh kem tra xanh', 2, 'het hop voi nguyen lieu tra xanh', 30000.00, 25000.00, 'banhtraicay.jpg', 'Cai', '0', '2020-03-27 02:40:51', NULL),
(5, 'Banh kem', 2, 'banh', 50000.00, 45000.00, 'banhkem.jpg', 'Cai', '1', '2020-04-07 02:32:41', NULL),
(6, 'Bánh bơ dâu', 1, 'dau xanh lam ra banh', 50000.00, 0.00, 'crepedau.jpg', 'Cai', '0', '2020-03-21 01:48:55', '2020-04-22 01:54:54'),
(9, 'Bánh ngọt vị dâu', 3, 'Vị dâu thêm phần hấp dẫn', 100000.00, 0.00, 'crepedau.jpg', 'Cái', '1', '2020-04-15 08:27:48', '2020-04-15 08:27:48'),
(10, 'Bánh bao mặn 1', 4, 'Được làm từ các nguyên liệu nhập khẩu', 10000.00, 0.00, 'banh-mi-nhan-man.jpg', 'Cái', '1', '2020-04-15 08:40:22', '2020-04-22 02:16:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_type`
--

CREATE TABLE `product_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_type`
--

INSERT INTO `product_type` (`id`, `Name`, `MoTa`, `Hinh`, `created_at`, `updated_at`) VALUES
(1, 'Bánh Bao', 'lam tu bot', 'anh5.jpg', '2020-04-02 02:24:50', '2020-05-04 08:56:25'),
(2, 'Bánh sầu giêng', 'nguyen lieu chinh sau rieng', 'anh6.jpg', '2020-04-06 15:25:51', NULL),
(3, 'Bánh ngọt', 'Làm từ đường và bột', 'hinh1.jpg', '2020-04-13 02:18:39', '2020-04-13 02:18:39'),
(4, 'Bánh mặn', 'Cho hương vị đậm đà hơn', 'hinh2.jpg', '2020-04-13 02:20:44', '2020-04-13 02:20:44'),
(13, 'Bánh hàn quốc', 'Được làm từ các nguyên liệu nhập khẩu', 'hinh4.jpg', '2020-05-04 08:59:16', '2020-05-04 08:59:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `Hinh`, `created_at`, `updated_at`) VALUES
(1, 'aabc.vn', 'banner1.jpg', '2020-04-06 15:00:17', NULL),
(2, 'hfhfh.vn', 'banner2.jpg', '2020-04-06 15:02:32', NULL),
(3, 'jhfhf', 'banner3.jpg', '2020-04-06 15:02:56', NULL),
(4, 'org.vn', 'banner4.jpg', '2020-04-07 15:03:19', NULL),
(5, 'tung123.vn', 'banner5.jpg', '2020-04-15 06:46:30', '2020-04-26 07:53:26'),
(6, 'banhngot1.com', 'banner6.jpg', '2020-04-15 08:35:40', '2020-04-26 07:52:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `Phone`, `DiaChi`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lê Văn Tùng', 'letung26021998@gmail.com', '$2y$10$z30d4Qz6h/JDQ8UnRVHfJ.pxrbL77QJ1TVXv9pfdM5eWCyvbh97XK', '5374847', 'Thanh Hoa', NULL, '2020-04-10 03:07:41', '2020-04-10 03:07:41'),
(2, 'Đào Ngọc Vũ', 'VuBui@gmail.com', '$2y$10$hLnld1yFpnLTZ7U09qiPnOdOcTxHxxNDM4nDu1vTHc15VOwU5Zqpy', '123456899', 'Thanh Hoa', NULL, '2020-04-10 06:26:22', '2020-04-10 06:26:22'),
(3, 'Tuấn Trần', 'hoangthucmam97@gmail.com', '123456', '535555748', 'ha noi', NULL, '2020-05-06 08:00:07', '2020-05-06 08:00:07');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `new`
--
ALTER TABLE `new`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_type`
--
ALTER TABLE `product_type`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `new`
--
ALTER TABLE `new`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
