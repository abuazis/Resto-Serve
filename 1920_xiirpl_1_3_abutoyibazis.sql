-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 28 Okt 2019 pada 06.16
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

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
  `nama_kategori` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`, `icon`) VALUES
(1, 'Pizza', 'fas fa-pizza-slice'),
(2, 'Pasta', 'fas fa-hamburger'),
(3, 'Chicken', 'fas fa-drumstick-bite'),
(4, 'Dessert', 'fas fa-ice-cream'),
(5, 'Drink', 'fas fa-mug-hot');

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
  `status_detail_order` enum('Selesai','On Process') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `id_menu`, `id_order`, `jumlah`, `harga`, `status_detail_order`, `created_at`, `updated_at`) VALUES
(18, 16, '09NZY8SN', 1, 156900, 'On Process', NULL, NULL),
(19, 13, 'ABLKHY8J', 1, 19000, 'On Process', NULL, NULL),
(20, 2, '0X3XUEI3', 1, 150000, 'On Process', NULL, NULL),
(21, 13, '0X3XUEI3', 1, 19000, 'On Process', NULL, NULL),
(22, 17, 'RCZ9KRXU', 1, 38000, 'On Process', NULL, NULL),
(23, 19, 'RCZ9KRXU', 1, 18000, 'On Process', NULL, NULL),
(24, 1, 'RCZ9KRXU', 1, 79000, 'On Process', NULL, NULL),
(25, 12, 'HWMRER3P', 1, 150000, 'On Process', NULL, NULL),
(26, 2, 'HWMRER3P', 1, 150000, 'On Process', NULL, NULL),
(27, 19, 'JPVNFBNK', 1, 18000, 'On Process', NULL, NULL),
(28, 2, 'JPVNFBNK', 1, 150000, 'On Process', NULL, NULL),
(29, 1, 'JPVNFBNK', 1, 79000, 'On Process', NULL, NULL),
(30, 16, 'HC5U5IZU', 1, 156900, 'On Process', NULL, NULL),
(31, 1, 'HC5U5IZU', 1, 79000, 'On Process', NULL, NULL),
(32, 17, 'HC5U5IZU', 1, 38000, 'On Process', NULL, NULL),
(33, 2, 'ZLKELNBY', 1, 150000, 'On Process', NULL, NULL),
(34, 17, 'ZLKELNBY', 1, 38000, 'On Process', NULL, NULL),
(35, 13, 'ZLKELNBY', 1, 19000, 'On Process', NULL, NULL),
(36, 1, 'ZLKELNBY', 2, 79000, 'On Process', NULL, NULL),
(37, 19, 'QENUHCLO', 1, 18000, 'On Process', NULL, NULL),
(38, 16, 'QENUHCLO', 1, 156900, 'On Process', NULL, NULL),
(39, 1, 'QENUHCLO', 1, 79000, 'On Process', NULL, NULL),
(40, 17, 'QENUHCLO', 2, 38000, 'On Process', NULL, NULL),
(41, 1, '4GTHYKXH', 1, 79000, 'On Process', NULL, NULL),
(42, 12, '4GTHYKXH', 1, 150000, 'On Process', NULL, NULL),
(43, 19, '4GTHYKXH', 2, 18000, 'On Process', NULL, NULL),
(44, 2, 'J5NWCCBT', 1, 150000, 'On Process', NULL, NULL),
(45, 17, 'J5NWCCBT', 1, 38000, 'On Process', NULL, NULL),
(46, 2, '9SQUQPX3', 1, 150000, 'On Process', NULL, NULL),
(47, 19, '9SQUQPX3', 1, 18000, 'On Process', NULL, NULL),
(48, 13, '9SQUQPX3', 2, 19000, 'On Process', NULL, NULL),
(49, 2, 'OKYZDAE6', 2, 150000, 'On Process', NULL, NULL),
(50, 1, 'OKYZDAE6', 1, 79000, 'On Process', NULL, NULL),
(51, 2, 'X7BKIP4I', 1, 150000, 'On Process', NULL, NULL),
(52, 2, 'MKP12VSF', 1, 150000, 'On Process', NULL, NULL);

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

--
-- Dumping data untuk tabel `detail_transactions`
--

INSERT INTO `detail_transactions` (`id`, `id_transaksi`, `id_menu`, `jumlah`, `sub_total`) VALUES
(24, 28, 2, 1, 150000),
(25, 28, 13, 1, 19000),
(26, 29, 17, 1, 38000),
(27, 29, 19, 1, 18000),
(28, 29, 1, 1, 79000),
(29, 30, 12, 1, 150000),
(30, 30, 2, 1, 150000),
(31, 31, 19, 1, 18000),
(32, 31, 16, 1, 156900),
(33, 31, 1, 1, 79000),
(34, 31, 17, 2, 76000),
(35, 32, 1, 1, 79000),
(36, 32, 12, 1, 150000),
(37, 32, 19, 2, 36000),
(38, 33, 2, 1, 150000),
(39, 33, 17, 1, 38000);

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

--
-- Dumping data untuk tabel `discounts`
--

INSERT INTO `discounts` (`id`, `kode`, `diskon`, `status`, `created_at`, `updated_at`) VALUES
(4, 'grt56nr5', '10%', 'valid', '2019-10-18 00:31:58', '2019-10-18 00:31:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_level` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_level` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`id`, `nama_level`, `email_level`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@resto.co.id', '2019-08-30 04:28:34', '2019-08-30 04:28:34'),
(2, 'Waiter', 'waiter@resto.co.id', '2019-08-30 19:40:20', '2019-08-30 19:40:20'),
(3, 'Kasir', 'kasir@resto.co.id', '2019-08-30 19:40:20', '2019-08-30 19:40:20'),
(4, 'Owner', '', '2019-08-30 19:40:20', '2019-08-30 19:40:20'),
(5, 'Pelanggan', '', '2019-08-30 19:40:20', '2019-08-30 19:40:20');

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
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `id_kategori`, `nama_menu`, `harga`, `status_menu`, `deskripsi`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Spagheti Beef', 79000, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'beef-pizaa.jpg', '2019-09-01 02:47:31', '2019-09-19 14:43:26', NULL),
(2, 3, 'Chicken Dinner', 150000, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'chicken-dinner.jpg', '2019-09-02 04:01:12', '2019-09-19 14:48:02', NULL),
(12, 1, 'Splitza Classic', 150000, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'pizza-egg.jpg', '2019-09-02 17:19:26', '2019-09-24 02:25:01', NULL),
(13, 4, 'Pudding Choco', 19000, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'pudding-choco.jpg', '2019-09-02 17:21:44', '2019-09-19 14:48:32', NULL),
(16, 3, 'Chicken Spice', 156900, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'chicken-dinner.jpg', '2019-09-02 17:57:05', '2019-09-19 14:49:15', NULL),
(17, 4, 'Sandwich Bread', 38000, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'sandwich.jpg', '2019-09-08 20:03:03', '2019-09-19 14:49:38', NULL),
(18, 1, 'Pizza Matang', 10000, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'pizza-buah.png', '2019-09-08 20:19:43', '2019-09-19 07:56:40', NULL),
(19, 5, 'Roast Coffee', 18000, 'Tersedia', 'With pepperoni, mozzarella cheese, parsley and a special PHD sauce.', 'drink.png', '2019-09-19 04:23:21', '2019-10-17 00:37:34', NULL),
(24, 2, 'Chicken Dinner booyah', 79000, 'Tersedia', 'lezatos', 'pudding-choco.jpg', '2019-10-17 01:10:56', '2019-10-17 01:11:43', '2019-10-17 01:11:43');

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
(17, '2019_08_30_223554_add_status_order_to_orders', 1),
(18, '2019_08_30_235915_add_email_level_to_levels', 1),
(19, '2019_09_03_070438_create_soft_delete_menu', 1),
(20, '2019_09_10_102223_create_social_accounts_table', 1),
(21, '2019_09_15_200832_add_soft_delete_order', 1),
(22, '2019_09_17_075820_add_timestamp_to_detail_order', 1),
(23, '2019_09_17_092027_add_total_bayar_orders', 1);

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
  `status_order` enum('Sudah Dibayar','Belum Dibayar','Bayar Ditempat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `nama_pelanggan`, `no_meja`, `alamat`, `waktu_order`, `keterangan`, `status_order`, `total_pembayaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
('09NZY8SN', 6, 'Spike', '01', NULL, '12:44:26 WIB', 'Watch My Dog', 'Belum Dibayar', 156900, '2019-09-10 05:44:26', '2019-10-14 04:24:35', NULL),
('0X3XUEI3', 6, 'Santo', '02', 'jl. bleter', '17:31:07 WIB', NULL, 'Sudah Dibayar', 169000, '2019-10-09 10:31:07', '2019-10-09 10:31:07', NULL),
('4GTHYKXH', 6, 'Hakimudin', '02', NULL, '20:04:16 WIB', 'Marilah kita tingkatkan ketaqwaan', 'Belum Dibayar', 265000, '2019-10-15 13:04:16', '2019-10-15 13:04:16', NULL),
('9SQUQPX3', 11, 'muhammad dzaky', NULL, 'jl bintara 8', '15:37:00 WIB', NULL, 'Bayar Ditempat', 123600, '2019-10-17 08:37:00', '2019-10-17 08:37:00', NULL),
('ABLKHY8J', 6, 'Kevin', '03', NULL, '12:45:27 WIB', NULL, 'Belum Dibayar', 19000, '2019-08-13 05:45:27', '2019-10-05 05:45:27', NULL),
('HC5U5IZU', 6, 'Hakimudin', '03', NULL, '11:27:18 WIB', 'No Lama Please', 'Belum Dibayar', 273900, '2019-07-02 04:27:18', '2019-10-14 04:27:18', NULL),
('HWMRER3P', 6, 'Budi', '01', NULL, '10:21:05 WIB', 'Cepetan', 'Sudah Dibayar', 300000, '2019-10-14 03:21:05', '2019-10-14 03:21:05', NULL),
('J5NWCCBT', 6, 'Hakimudin', '03', NULL, '07:35:59 WIB', NULL, 'Sudah Dibayar', 188000, '2019-10-16 00:35:59', '2019-10-16 00:35:59', NULL),
('JPVNFBNK', 10, 'Hakimudin', NULL, 'Jln. Bintara 4, Gang Sempit Pertama Dekat Warteg', '11:15:35 WIB', NULL, 'Bayar Ditempat', 49400, '2019-06-08 04:15:35', '2019-10-14 04:15:35', NULL),
('MKP12VSF', 10, 'hhahah', NULL, 'asdas', '15:44:08 WIB', NULL, 'Bayar Ditempat', 150000, '2019-10-19 08:44:08', '2019-10-19 08:44:08', NULL),
('OKYZDAE6', 10, 'Hakimudin', NULL, 'Jln. Haji Hakim', '09:04:54 WIB', NULL, 'Bayar Ditempat', 379000, '2019-10-18 02:04:54', '2019-10-18 02:04:54', NULL),
('QENUHCLO', 6, 'Hakimudin', '01', NULL, '08:26:12 WIB', 'Marilah kita tingkatkan ketaqwaan', 'Sudah Dibayar', 329900, '2019-10-15 01:26:12', '2019-10-15 06:49:42', NULL),
('RCZ9KRXU', 6, 'MBCode Group', '02', NULL, '17:49:30 WIB', 'Bungkus Cog', 'Sudah Dibayar', 135000, '2019-08-10 10:49:30', '2019-10-09 10:49:30', NULL),
('X7BKIP4I', 10, 'Mudin', NULL, 'Rumahnya', '15:29:06 WIB', NULL, 'Bayar Ditempat', 150000, '2019-10-19 08:29:06', '2019-10-19 08:29:06', NULL),
('ZLKELNBY', 10, 'Hakimudin', NULL, 'Jln. Bintara 4, Gang Sempit Pertama Dekat Warteg', '13:42:45 WIB', NULL, 'Bayar Ditempat', 73000, '2019-10-14 06:42:45', '2019-10-14 06:42:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('abuazis801@gmail.com', '$2y$10$7sl3v/F4DBIwxgrzdLWaAul4FFS/1wRXOge0DJYZykvSiPKtERSr6', '2019-10-26 14:51:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_accounts`
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
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `id_user`, `id_order`, `total_bayar`, `uang_dibayar`, `total_kembali`, `created_at`, `updated_at`) VALUES
(28, 6, '0X3XUEI3', 169000, 170000, 1000, '2019-10-09 10:31:20', '2019-10-09 10:31:20'),
(29, 6, 'RCZ9KRXU', 135000, 150000, 15000, '2019-10-09 10:49:50', '2019-10-09 10:49:50'),
(30, 6, 'HWMRER3P', 300000, 300000, 0, '2019-10-14 04:01:16', '2019-10-14 04:01:16'),
(31, 6, 'QENUHCLO', 329900, 350000, 20100, '2019-10-15 01:26:41', '2019-10-15 01:26:41'),
(32, 6, '4GTHYKXH', 265000, 270000, 5000, '2019-10-15 13:04:42', '2019-10-15 13:04:42'),
(33, 6, 'J5NWCCBT', 188000, 200000, 12000, '2019-10-16 00:36:56', '2019-10-16 00:36:56');

--
-- Trigger `transactions`
--
DELIMITER $$
CREATE TRIGGER `ubahStatusOrder` AFTER INSERT ON `transactions` FOR EACH ROW BEGIN
UPDATE orders
SET status_order = 'Sudah Dibayar'
WHERE id = NEW.id_order;

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
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_level`, `nickname`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 1, NULL, 'administrator', 'admin@resto.co.id', NULL, '$2y$10$voqrCPjUgEkZO7O10Ya5LO05yQuALSne4wRRpd1Q0mRDeRw88M9hy', '19zWryLYZjQWvIbUwzTmYGIseTHtAOJmKsAfbtYDhyXYyfCSvCC0YzR0eqOM', '2019-09-17 14:08:39', '2019-09-23 22:48:57'),
(7, 3, NULL, 'kasir', 'kasir@resto.co.id', NULL, '$2y$10$A0CBCaPYEDrny48AgFqJCeslvPhxbFba784tvwaQuYEiLOqvyhacK', 'zh4oxze1RIHfzbfVfOJpxjiyeTcHlR0mPFNOXeVew0qmajTOD19K9Wh2WxEz', '2019-09-17 15:36:44', '2019-09-23 22:52:17'),
(8, 2, NULL, 'waiter', 'waiter@resto.co.id', NULL, '$2y$10$9HQPgk0zEdOLJz8yLpSyr.QvhXEx0HiAJMPURMbhGvq/EnYXMA1oi', 'bf9DDfRnjRzfhuHMHveVKGwNIzkhMQqYL9c9M7maxjdh3Uud9KdQYymqXCoF', '2019-09-19 06:14:06', '2019-09-23 22:55:23'),
(9, 4, NULL, 'owner', 'owner@resto.co.id', NULL, '$2y$10$MfSuEMXNNGLRjGnJb524a.aXfPiHW7TJkzkQpS7viZz6FPVWjCaMm', 'cvBQ6bs6lk5ZJBs4whZoym429OqVbtw5jvYuKvgt5sk7WuL92NiycAOdvf8l', '2019-09-19 06:15:36', '2019-09-23 22:59:34'),
(10, 5, NULL, 'pelanggan', 'customer@test.com', NULL, '$2y$10$Udkw2Zkz4Y.31ShhdJ5Jg.XlJcl3kEawWJa5POADn97.ogE/au//a', 'Z9RM1O8tEGfhKSEksgNJZOmrISmGFIHQoOqkAsTiikBHQRcuLr4bKMzApNgt', '2019-09-23 13:36:29', '2019-09-23 23:01:40'),
(11, 5, NULL, 'dzaky2510', 'dzaky@gmail.com', NULL, '$2y$10$dy6dGJgi3PQCRK1TFt23W.badr/15CiSnRZH5R1BT2uhSerOwylOa', NULL, '2019-10-17 08:34:33', '2019-10-17 08:34:33'),
(13, 4, NULL, 'abuazis801', 'abuazis801@gmail.com', NULL, '$2y$10$l//VnNmOaFaKvWDFXrsJr.WZ31P6wErh/If1908fXPh0zHTXn5F6q', NULL, '2019-10-19 01:15:22', '2019-10-19 01:28:59');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vMenu`
-- (Lihat di bawah untuk tampilan aktual)
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
-- Stand-in struktur untuk tampilan `vOrderKasir`
-- (Lihat di bawah untuk tampilan aktual)
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
-- Stand-in struktur untuk tampilan `vOrderWaiter`
-- (Lihat di bawah untuk tampilan aktual)
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
-- Stand-in struktur untuk tampilan `vUser`
-- (Lihat di bawah untuk tampilan aktual)
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
-- Struktur untuk view `vMenu`
--
DROP TABLE IF EXISTS `vMenu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vMenu`  AS  select `menus`.`id` AS `id`,`menus`.`id_kategori` AS `id_kategori`,`menus`.`nama_menu` AS `nama_menu`,`menus`.`harga` AS `harga`,`menus`.`status_menu` AS `status_menu`,`menus`.`deskripsi` AS `deskripsi`,`menus`.`gambar` AS `gambar`,`menus`.`deleted_at` AS `deleted_at` from (`menus` join `categories` on(`menus`.`id_kategori` = `categories`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vOrderKasir`
--
DROP TABLE IF EXISTS `vOrderKasir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vOrderKasir`  AS  select `orders`.`id` AS `id`,`orders`.`id_user` AS `id_user`,`orders`.`nama_pelanggan` AS `nama_pelanggan`,`orders`.`no_meja` AS `no_meja`,`orders`.`alamat` AS `alamat`,`orders`.`waktu_order` AS `waktu_order`,`orders`.`keterangan` AS `keterangan`,`orders`.`status_order` AS `status_order`,`orders`.`total_pembayaran` AS `total_pembayaran`,`orders`.`created_at` AS `created_at`,`orders`.`updated_at` AS `updated_at`,`orders`.`deleted_at` AS `deleted_at` from `orders` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vOrderWaiter`
--
DROP TABLE IF EXISTS `vOrderWaiter`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vOrderWaiter`  AS  select `orders`.`id` AS `id`,`orders`.`id_user` AS `id_user`,`orders`.`nama_pelanggan` AS `nama_pelanggan`,`orders`.`no_meja` AS `no_meja`,`orders`.`alamat` AS `alamat`,`orders`.`waktu_order` AS `waktu_order`,`orders`.`keterangan` AS `keterangan`,`orders`.`status_order` AS `status_order`,`orders`.`total_pembayaran` AS `total_pembayaran`,`orders`.`created_at` AS `created_at`,`orders`.`updated_at` AS `updated_at`,`orders`.`deleted_at` AS `deleted_at` from `orders` ;

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
  ADD UNIQUE KEY `social_accounts_provider_id_unique` (`provider_id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_level_foreign` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `detail_transactions`
--
ALTER TABLE `detail_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
