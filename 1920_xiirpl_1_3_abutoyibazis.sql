-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 13 Sep 2019 pada 09.02
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1920_xiirpl_1_3_abutoyibazis`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDetailOrder` (IN `_id` INT, IN `_id_menu` INT, IN `_id_order` CHAR(8), IN `_jumlah` INT, IN `_harga` INT, IN `_status_detail_order` ENUM('Selesai','On Process'))  NO SQL
BEGIN
INSERT INTO detail_orders VALUES (_id, _id_menu, _id_order, _jumlah, _harga, _status_detail_order);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDetailTransaction` (IN `_id` INT, IN `_id_transaksi` INT, IN `_id_menu` INT, IN `_jumlah` INT, IN `_sub_total` INT)  NO SQL
BEGIN
INSERT INTO detail_transactions VALUES (_id, _id_transaksi, _id_menu, _jumlah, _sub_total);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertOrder` (IN `_id` CHAR(8), IN `_id_user` INT, IN `_nama_pelanggan` VARCHAR(100), IN `_no_meja` ENUM('01','02','03'), IN `_alamat` VARCHAR(191), IN `_waktu_order` VARCHAR(30), IN `_keterangan` TEXT, IN `_status_order` ENUM('Sudah Dibayar','Belum Dibayar'))  NO SQL
BEGIN
INSERT INTO orders VALUES (_id, _id_user, _nama_pelanggan, _no_meja, _alamat, _waktu_order, _keterangan, _status_order );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertTransaction` (IN `_id` INT, IN `_id_user` INT, IN `_id_order` CHAR(8), IN `_total_bayar` INT, IN `_uang_dibayar` INT, IN `_total_kembali` INT)  NO SQL
BEGIN
INSERT INTO transactions VALUES (_id, _id_user, _id_order, _total_bayar, _uang_dibayar, _total_kembali);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`) VALUES
(1, 'Pizza'),
(2, 'Pasta'),
(3, 'Chicken'),
(4, 'Dessert'),
(5, 'Drink');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `id_order` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status_detail_order` enum('Selesai','On Process') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `id_menu`, `id_order`, `jumlah`, `harga`, `status_detail_order`) VALUES
(1, 13, '75403245', 2, 79000, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transactions`
--

CREATE TABLE `detail_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `discounts`
--

CREATE TABLE `discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('valid','invalid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_level` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_level` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`id`, `nama_level`, `email_level`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@resto.co.id', '2019-08-30 11:28:34', '2019-08-30 11:28:34'),
(2, 'Waiter', 'waiter@resto.co.id', '2019-08-31 02:40:20', '2019-08-31 02:40:20'),
(3, 'Kasir', 'kasir@resto.co.id', '2019-08-31 02:40:20', '2019-08-31 02:40:20'),
(4, 'Owner', 'owner@resto.co.id', '2019-08-31 02:40:20', '2019-08-31 02:40:20'),
(5, 'Pelanggan', '', '2019-08-31 02:40:20', '2019-08-31 02:40:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_menu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `status_menu` enum('Tersedia','Tidak Tersedia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `id_kategori`, `nama_menu`, `harga`, `status_menu`, `deskripsi`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Spagheti Beef', 79000, 'Tersedia', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae quia ad quos odio ducimus magni atque tenetur', 'pizza-buah.png', '2019-09-01 09:47:31', '2019-09-12 23:58:00', NULL),
(2, 3, 'Chicken Dinner', 150000, 'Tersedia', 'lorem ipsum dolor sit amet', 'pizza-buah.png', '2019-09-02 11:01:12', '2019-09-10 04:50:18', NULL),
(12, 1, 'Splitza Classic', 150000, 'Tersedia', 'Call to undefined function SoftDeletes()', 'pizza-buah.png', '2019-09-03 00:19:26', '2019-09-10 04:35:26', NULL),
(13, 5, 'Pudding Choco', 19000, 'Tersedia', 'Call to undefined function SoftDeletes()', 'pizza-buah.png', '2019-09-03 00:21:44', '2019-09-03 00:21:44', NULL),
(16, 3, 'Chicken Spice', 156900, 'Tersedia', '\'sweetalert::alert\'->->', 'pizza-buah.png', '2019-09-03 00:57:05', '2019-09-03 06:30:15', NULL),
(17, 4, 'Sandwich Bread', 38000, 'Tersedia', '->setConnection(Check::connection());', 'pizza-buah.png', '2019-09-09 03:03:03', '2019-09-09 03:12:38', NULL),
(18, 1, 'Pizza Matang', 10000, 'Tersedia', 'protected $dates = [\'deleted_at\'];', 'pizza-buah.png', '2019-09-09 03:19:43', '2019-09-09 04:09:47', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_26_141515_create_menus_table', 1),
(4, '2019_08_26_143231_create_categories_table', 1),
(5, '2019_08_26_144130_create_levels_table', 1),
(6, '2019_08_27_112605_create_transactions_table', 1),
(7, '2019_08_27_114105_create_orders_table', 1),
(8, '2019_08_27_120433_create_discounts_table', 1),
(9, '2019_08_27_123807_create_detail_orders_table', 1),
(10, '2019_08_27_132151_create_detail_transactions_table', 1),
(11, '2019_08_27_235303_add_foreign_to_users_table', 1),
(12, '2019_08_28_113254_add_foreign_to_menus_table', 1),
(13, '2019_08_28_113738_add_foreign_to_transactions_table', 1),
(14, '2019_08_28_114053_add_foreign_to_orders_table', 1),
(15, '2019_08_28_114541_add_foreign_to_detail_orders_table', 1),
(16, '2019_08_28_115620_add_foreign_to_detail_transactions_table', 1),
(17, '2019_08_30_223554_add_status_order_to_orders', 2),
(18, '2019_08_30_235915_add_email_level_to_levels', 3),
(19, '2019_09_03_070438_create_soft_delete_menu', 4),
(20, '2019_09_10_102223_create_social_accounts_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_meja` enum('01','02','03') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_order` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_order` enum('Sudah Dibayar','Belum Dibayar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `nama_pelanggan`, `no_meja`, `alamat`, `waktu_order`, `keterangan`, `status_order`, `created_at`, `updated_at`) VALUES
('75403245', 4, 'Rudi Kun', '03', 'Jln. Bacang Raya', '17:45:06 WIB', 'Tidak Pedas', 'Belum Dibayar', '2019-09-05 09:03:57', '2019-09-05 09:03:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `social_accounts`
--

INSERT INTO `social_accounts` (`id`, `id_user`, `provider_id`, `provider_name`, `created_at`, `updated_at`) VALUES
(5, 10, '2442204752727241', 'facebook', '2019-09-12 04:59:23', '2019-09-12 04:59:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_order` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `uang_dibayar` int(11) DEFAULT NULL,
  `total_kembali` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Trigger `transactions`
--
DELIMITER $$
CREATE TRIGGER `ubahStatusBayar` AFTER INSERT ON `transactions` FOR EACH ROW BEGIN
UPDATE orders SET status_bayar = 'Sudah Dibayar' WHERE id_order = NEW.id_order;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_level` int(10) UNSIGNED NOT NULL,
  `nickname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_level`, `nickname`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'admin', 'admin@resto.co.id', NULL, '$2y$10$TiMCa2s1BzNdLoLtyyKFVe/YptkkSdwZIBfULEZJ6RF3g2bWKcI6y', NULL, '2019-08-30 04:31:20', '2019-08-30 04:31:20'),
(2, 2, NULL, 'waiter', 'waiter@resto.co.id', NULL, '$2y$10$BnDJjQ.cSb6f1oSVemld4.hIjh10IZIi5SkllAU56q9I9dGGeuC0K', NULL, '2019-08-30 20:55:01', '2019-08-30 20:55:01'),
(3, 4, NULL, 'owner', 'owner@resto.co.id', NULL, '$2y$10$QimYFsOJ6haOn52Ocx2neOzkk/BoTjLdmS.WSji8mdb1THXME3yNK', NULL, '2019-08-30 21:39:35', '2019-08-30 21:39:35'),
(4, 5, NULL, 'rudikun', 'abuazis801@gmail.com', NULL, '$2y$10$xnyEE4dCJvvBlImxL6bX1.YEiJy/tDcnI6fsdx6i1pgSAFYoYKPsG', 'nwwU20ZzDJJ993Nq0v0vyw4kF4vHuzn9C4LD6l6RFQ3Q6RlCM9GXHhYMy4t6', '2019-08-31 01:04:37', '2019-09-04 04:39:16'),
(5, 3, NULL, 'kasir', 'kasir@resto.co.id', NULL, '$2y$10$GLM6NBz6ZFwRRSDQ/LU/yOJksfOIuPY0KwBxeskNjwNJJKpuRRAmq', NULL, '2019-09-01 01:54:06', '2019-09-01 01:54:06'),
(10, 5, NULL, 'abuazis', 'muhammadazis801@gmail.com', NULL, NULL, 'TG3NaorSkf3E0FmUqnjp25i52ianUTp2q7hUuxFguW7vaTiEEcQXnHsIBOcd', '2019-09-12 04:59:09', '2019-09-12 04:59:09');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vMenu`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vMenu` (
`id` int(10) unsigned
,`nama_menu` varchar(100)
,`harga` int(11)
,`status_menu` enum('Tersedia','Tidak Tersedia')
,`deskripsi` text
,`gambar` varchar(100)
,`nama_kategori` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vOrderKasir`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vOrderKasir` (
`id` char(8)
,`nama_pelanggan` varchar(100)
,`no_meja` enum('01','02','03')
,`waktu_order` varchar(30)
,`status_order` enum('Sudah Dibayar','Belum Dibayar')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vOrderWaiter`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vOrderWaiter` (
`id` char(8)
,`nama_pelanggan` varchar(100)
,`no_meja` enum('01','02','03')
,`waktu_order` varchar(30)
,`keterangan` text
,`status_order` enum('Sudah Dibayar','Belum Dibayar')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vUser`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vUser` (
`id` bigint(20) unsigned
,`nickname` varchar(100)
,`username` varchar(20)
,`email` varchar(100)
,`nama_level` varchar(20)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vMenu`
--
DROP TABLE IF EXISTS `vMenu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vMenu`  AS  select `menus`.`id` AS `id`,`menus`.`nama_menu` AS `nama_menu`,`menus`.`harga` AS `harga`,`menus`.`status_menu` AS `status_menu`,`menus`.`deskripsi` AS `deskripsi`,`menus`.`gambar` AS `gambar`,`categories`.`nama_kategori` AS `nama_kategori` from (`menus` join `categories` on(`menus`.`id_kategori` = `categories`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vOrderKasir`
--
DROP TABLE IF EXISTS `vOrderKasir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vOrderKasir`  AS  select `orders`.`id` AS `id`,`orders`.`nama_pelanggan` AS `nama_pelanggan`,`orders`.`no_meja` AS `no_meja`,`orders`.`waktu_order` AS `waktu_order`,`orders`.`status_order` AS `status_order` from `orders` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vOrderWaiter`
--
DROP TABLE IF EXISTS `vOrderWaiter`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vOrderWaiter`  AS  select `orders`.`id` AS `id`,`orders`.`nama_pelanggan` AS `nama_pelanggan`,`orders`.`no_meja` AS `no_meja`,`orders`.`waktu_order` AS `waktu_order`,`orders`.`keterangan` AS `keterangan`,`orders`.`status_order` AS `status_order` from `orders` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vUser`
--
DROP TABLE IF EXISTS `vUser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vUser`  AS  select `users`.`id` AS `id`,`users`.`nickname` AS `nickname`,`users`.`username` AS `username`,`users`.`email` AS `email`,`levels`.`nama_level` AS `nama_level` from (`users` join `levels` on(`users`.`id_level` = `levels`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_orders_id_order_foreign` (`id_order`),
  ADD KEY `detail_orders_id_menu_foreign` (`id_menu`);

--
-- Indeks untuk tabel `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transactions_id_transaksi_foreign` (`id_transaksi`);

--
-- Indeks untuk tabel `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_id_kategori_foreign` (`id_kategori`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_accounts_provider_id_unique` (`provider_id`),
  ADD KEY `social_ibfk_foreign_id` (`id_user`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_id_user_foreign` (`id_user`),
  ADD KEY `transactions_id_order_foreign` (`id_order`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique_field` (`email`) USING BTREE,
  ADD KEY `users_id_level_foreign` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_transactions`
--
ALTER TABLE `detail_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_orders_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD CONSTRAINT `detail_transactions_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transactions` (`id`);

--
-- Ketidakleluasaan untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_ibfk_foreign_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `transactions_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_level_foreign` FOREIGN KEY (`id_level`) REFERENCES `levels` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
