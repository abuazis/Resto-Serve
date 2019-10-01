-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 29, 2019 at 08:24 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

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
-- Procedures
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`, `icon`) VALUES
(1, 'Pizza', 'fas fa-pizza-slice'),
(2, 'Pasta', 'fas fa-hamburger'),
(3, 'Chicken', 'fas fa-drumstick-bite'),
(4, 'Dessert', 'fas fa-ice-cream'),
(5, 'Drink', 'fas fa-mug-hot');

-- --------------------------------------------------------

--
-- Table structure for table `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `id_order` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status_detail_order` enum('Selesai','On Process') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `id_menu`, `id_order`, `jumlah`, `harga`, `status_detail_order`, `created_at`, `updated_at`) VALUES
(1, 12, 'wtw527n3', 1, 150000, 'On Process', NULL, NULL),
(2, 13, 'wtw527n3', 1, 19000, 'On Process', NULL, NULL),
(3, 18, 'wtw527n3', 1, 10000, 'On Process', NULL, NULL),
(4, 17, 'wtw527n3', 1, 38000, 'On Process', NULL, NULL),
(5, 12, 'HOGNOAV7', 1, 150000, 'On Process', NULL, NULL),
(6, 16, 'HOGNOAV7', 1, 156900, 'On Process', NULL, NULL),
(7, 13, 'HOGNOAV7', 1, 19000, 'On Process', NULL, NULL),
(8, 12, 'JGKO2LTH', 1, 150000, 'On Process', NULL, NULL),
(9, 2, 'JGKO2LTH', 1, 150000, 'On Process', NULL, NULL),
(10, 16, 'JGKO2LTH', 1, 156900, 'On Process', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transactions`
--

CREATE TABLE `detail_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transactions`
--

INSERT INTO `detail_transactions` (`id`, `id_transaksi`, `id_menu`, `jumlah`, `sub_total`) VALUES
(5, 20, 12, 1, 150000),
(6, 20, 13, 1, 19000),
(7, 20, 18, 1, 10000),
(8, 20, 17, 1, 38000),
(9, 21, 12, 1, 150000),
(10, 21, 16, 1, 156900),
(11, 21, 13, 1, 19000),
(12, 22, 12, 1, 150000),
(13, 22, 16, 1, 156900),
(14, 22, 13, 1, 19000),
(15, 23, 12, 1, 150000),
(16, 23, 2, 1, 150000),
(17, 23, 16, 1, 156900),
(18, 24, 12, 1, 150000),
(19, 24, 2, 1, 150000),
(20, 24, 16, 1, 156900);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('valid','invalid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `kode`, `diskon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'rdcs53dr', '20%', 'invalid', '2019-09-24 11:26:42', '2019-09-29 06:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_level` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_level` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `nama_level`, `email_level`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@resto.co.id', '2019-08-30 04:28:34', '2019-08-30 04:28:34'),
(2, 'Waiter', 'waiter@resto.co.id', '2019-08-30 19:40:20', '2019-08-30 19:40:20'),
(3, 'Kasir', 'kasir@resto.co.id', '2019-08-30 19:40:20', '2019-08-30 19:40:20'),
(4, 'Owner', 'owner@resto.co.id', '2019-08-30 19:40:20', '2019-08-30 19:40:20'),
(5, 'Pelanggan', '', '2019-08-30 19:40:20', '2019-08-30 19:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_menu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `status_menu` enum('Tersedia','Tidak Tersedia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `id_kategori`, `nama_menu`, `harga`, `status_menu`, `deskripsi`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Spagheti Beef', 79000, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'beef-pizaa.jpg', '2019-09-01 02:47:31', '2019-09-19 14:43:26', NULL),
(2, 3, 'Chicken Dinner', 150000, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'chicken-dinner.jpg', '2019-09-02 04:01:12', '2019-09-19 14:48:02', NULL),
(12, 1, 'Splitza Classic', 150000, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'pizza-egg.jpg', '2019-09-02 17:19:26', '2019-09-24 02:25:01', NULL),
(13, 4, 'Pudding Choco', 19000, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'pudding-choco.jpg', '2019-09-02 17:21:44', '2019-09-19 14:48:32', NULL),
(16, 3, 'Chicken Spice', 156900, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'chicken-dinner.jpg', '2019-09-02 17:57:05', '2019-09-19 14:49:15', NULL),
(17, 4, 'Sandwich Bread', 38000, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'sandwich.jpg', '2019-09-08 20:03:03', '2019-09-19 14:49:38', NULL),
(18, 1, 'Pizza Matang', 10000, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'pizza-buah.png', '2019-09-08 20:19:43', '2019-09-19 07:56:40', NULL),
(19, 5, 'Roast Coffee', 18000, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'drink.png', '2019-09-19 04:23:21', '2019-09-19 14:50:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
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
(17, '2019_08_30_223554_add_status_order_to_orders', 1),
(18, '2019_08_30_235915_add_email_level_to_levels', 1),
(19, '2019_09_03_070438_create_soft_delete_menu', 1),
(20, '2019_09_10_102223_create_social_accounts_table', 1),
(21, '2019_09_15_200832_add_soft_delete_order', 1),
(22, '2019_09_17_075820_add_timestamp_to_detail_order', 1),
(23, '2019_09_17_092027_add_total_bayar_orders', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_meja` enum('01','02','03') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_order` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_order` enum('Sudah Dibayar','Belum Dibayar','Bayar Ditempat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `nama_pelanggan`, `no_meja`, `alamat`, `waktu_order`, `keterangan`, `status_order`, `total_pembayaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
('HOGNOAV7', 6, 'Dot Blade', '02', NULL, '18:32:30 WIB', 'Semua Bungkus, Bawa Pulang', 'Belum Dibayar', 325900, '2019-09-18 11:32:30', '2019-09-19 03:40:46', NULL),
('JGKO2LTH', 6, 'Abu Azis', '02', NULL, '11:31:30 WIB', 'chvasjgcvajvschagvscg', 'Sudah Dibayar', 456900, '2019-09-19 04:31:30', '2019-09-20 02:05:16', NULL),
('wtw527n3', 6, 'Rudi Hartono', '02', NULL, '22:48:46 WIB', 'Semua Gratis Untuk Raja', 'Sudah Dibayar', 217000, '2019-09-17 15:48:46', '2019-09-23 22:57:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
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
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `id_user`, `id_order`, `total_bayar`, `uang_dibayar`, `total_kembali`, `created_at`, `updated_at`) VALUES
(20, 6, 'wtw527n3', 217000, 220000, -3000, '2019-09-18 06:03:52', '2019-09-28 03:35:43'),
(21, 6, 'HOGNOAV7', 325900, 328000, 4100, '2019-09-18 12:56:21', '2019-09-19 03:25:59'),
(22, 6, 'HOGNOAV7', 325900, 400000, 74100, '2019-09-19 03:40:45', '2019-09-19 03:40:45'),
(23, 6, 'JGKO2LTH', 456900, 460000, 3100, '2019-09-20 01:57:25', '2019-09-20 01:57:25'),
(24, 6, 'JGKO2LTH', 456900, 460000, 3100, '2019-09-20 02:05:15', '2019-09-20 02:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_level` int(10) UNSIGNED NOT NULL,
  `nickname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_level`, `nickname`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 1, NULL, 'admin', 'admin@resto.co.id', NULL, '$2y$10$Jv4/yUWBwIffiTMcsTYdV.QHO1zzYVYN1CvrOhDALi7iLLhIAiDK6', 'x8TaST3MZ91TOTLZOGC80dCxWEARO23Xl1igrhvI8o7G0M2bkAzIAd82LSP7', '2019-09-17 14:08:39', '2019-09-23 22:48:57'),
(7, 3, NULL, 'kasir', 'kasir@resto.co.id', NULL, '$2y$10$cJlFqBWZz9NP.8ePyl7PSOV4EUAFqK7sQIKdudozZgJ9CsN2rqSU6', NULL, '2019-09-17 15:36:44', '2019-09-23 22:52:17'),
(8, 2, NULL, 'waiter', 'waiter@resto.co.id', NULL, '$2y$10$1aauRip3hYoU29XBEwd/aO8qqu.FsxoP1ec28nPnEoA90SPDHG0oq', NULL, '2019-09-19 06:14:06', '2019-09-23 22:55:23'),
(9, 4, NULL, 'owner', 'owner@resto.co.id', NULL, '$2y$10$HR/.e1gczNuH5aXOiORbzeLXifoE3z./fbmGaZShFPNohD/Jn/sWi', NULL, '2019-09-19 06:15:36', '2019-09-23 22:59:34'),
(10, 5, NULL, 'customer', 'customer@test.com', NULL, '$2y$10$UMdse07H7fTP97tBGDpmZukgXMOV2fejCaRYFRglvDxNrDkiggayO', 'kquHKubVqj6L9FZkMGDyscUyPJG2KKUgHZcXfbVoj7rU1YNu1MseEcfIGxdt', '2019-09-23 13:36:29', '2019-09-23 23:01:40');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vMenu`
-- (See below for the actual view)
--
CREATE TABLE `vMenu` (
`id` int(10) unsigned
,`id_kategori` int(10) unsigned
,`nama_menu` varchar(100)
,`harga` int(11)
,`status_menu` enum('Tersedia','Tidak Tersedia')
,`deskripsi` text
,`gambar` varchar(100)
,`deleted_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vOrderKasir`
-- (See below for the actual view)
--
CREATE TABLE `vOrderKasir` (
`id` char(8)
,`id_user` bigint(20) unsigned
,`nama_pelanggan` varchar(100)
,`no_meja` enum('01','02','03')
,`alamat` varchar(191)
,`waktu_order` varchar(30)
,`keterangan` text
,`status_order` enum('Sudah Dibayar','Belum Dibayar','Bayar Ditempat')
,`total_pembayaran` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`deleted_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vOrderWaiter`
-- (See below for the actual view)
--
CREATE TABLE `vOrderWaiter` (
`id` char(8)
,`id_user` bigint(20) unsigned
,`nama_pelanggan` varchar(100)
,`no_meja` enum('01','02','03')
,`alamat` varchar(191)
,`waktu_order` varchar(30)
,`keterangan` text
,`status_order` enum('Sudah Dibayar','Belum Dibayar','Bayar Ditempat')
,`total_pembayaran` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`deleted_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vUser`
-- (See below for the actual view)
--
CREATE TABLE `vUser` (
`id` bigint(20) unsigned
,`nickname` varchar(100)
,`username` varchar(20)
,`email` varchar(20)
,`nama_level` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `vMenu`
--
DROP TABLE IF EXISTS `vMenu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vMenu`  AS  select `menus`.`id` AS `id`,`menus`.`id_kategori` AS `id_kategori`,`menus`.`nama_menu` AS `nama_menu`,`menus`.`harga` AS `harga`,`menus`.`status_menu` AS `status_menu`,`menus`.`deskripsi` AS `deskripsi`,`menus`.`gambar` AS `gambar`,`menus`.`deleted_at` AS `deleted_at` from (`menus` join `categories` on(`menus`.`id_kategori` = `categories`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vOrderKasir`
--
DROP TABLE IF EXISTS `vOrderKasir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vOrderKasir`  AS  select `orders`.`id` AS `id`,`orders`.`id_user` AS `id_user`,`orders`.`nama_pelanggan` AS `nama_pelanggan`,`orders`.`no_meja` AS `no_meja`,`orders`.`alamat` AS `alamat`,`orders`.`waktu_order` AS `waktu_order`,`orders`.`keterangan` AS `keterangan`,`orders`.`status_order` AS `status_order`,`orders`.`total_pembayaran` AS `total_pembayaran`,`orders`.`created_at` AS `created_at`,`orders`.`updated_at` AS `updated_at`,`orders`.`deleted_at` AS `deleted_at` from `orders` ;

-- --------------------------------------------------------

--
-- Structure for view `vOrderWaiter`
--
DROP TABLE IF EXISTS `vOrderWaiter`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vOrderWaiter`  AS  select `orders`.`id` AS `id`,`orders`.`id_user` AS `id_user`,`orders`.`nama_pelanggan` AS `nama_pelanggan`,`orders`.`no_meja` AS `no_meja`,`orders`.`alamat` AS `alamat`,`orders`.`waktu_order` AS `waktu_order`,`orders`.`keterangan` AS `keterangan`,`orders`.`status_order` AS `status_order`,`orders`.`total_pembayaran` AS `total_pembayaran`,`orders`.`created_at` AS `created_at`,`orders`.`updated_at` AS `updated_at`,`orders`.`deleted_at` AS `deleted_at` from `orders` ;

-- --------------------------------------------------------

--
-- Structure for view `vUser`
--
DROP TABLE IF EXISTS `vUser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vUser`  AS  select `users`.`id` AS `id`,`users`.`nickname` AS `nickname`,`users`.`username` AS `username`,`users`.`email` AS `email`,`levels`.`nama_level` AS `nama_level` from (`users` join `levels` on(`users`.`id_level` = `levels`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_orders_id_order_foreign` (`id_order`),
  ADD KEY `detail_orders_id_menu_foreign` (`id_menu`);

--
-- Indexes for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transactions_id_transaksi_foreign` (`id_transaksi`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_user_foreign` (`id_user`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_accounts_provider_id_unique` (`provider_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_id_user_foreign` (`id_user`),
  ADD KEY `transactions_id_order_foreign` (`id_order`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_level_foreign` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_orders_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD CONSTRAINT `detail_transactions_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `transactions_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_level_foreign` FOREIGN KEY (`id_level`) REFERENCES `levels` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
