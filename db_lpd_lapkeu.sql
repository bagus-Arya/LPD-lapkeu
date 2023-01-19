-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2023 pada 05.14
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lpd_lapkeu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `date_range`
--

CREATE TABLE `date_range` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `date_range`
--

INSERT INTO `date_range` (`id`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, '2022-12-01 00:00:00', '2023-01-31 00:00:00', NULL, '2023-01-12 02:06:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_24_160406_create_no_akuns_table', 1),
(6, '2022_08_14_112342_create_transaksis_table', 1),
(7, '2023_01_08_071941_create_date_rage', 2),
(8, '2023_01_08_072458_create_date_range', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `no_akuns`
--

CREATE TABLE `no_akuns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `no_akun` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `no_akuns`
--

INSERT INTO `no_akuns` (`id`, `nama_akun`, `no_akun`, `created_at`, `updated_at`) VALUES
(1, 'Pendapatan Operasional (L/R)', 101, NULL, NULL),
(2, 'Pendapatan Bunga dari Nasabah', 102, NULL, NULL),
(3, 'Pendapatan Bunga dari Lain-lain', 103, NULL, '2023-01-07 22:46:27'),
(4, 'Pendapatan Lain-lain', 104, NULL, NULL),
(5, 'Ongkos Administasi', 301, NULL, NULL),
(6, 'Kas', 100, NULL, NULL),
(7, 'Bank BPD (Giro) Neraca Percobaan', 131, NULL, NULL),
(8, 'Bank BPD (Tabungan) Neraca Percobaan', 131, NULL, NULL),
(9, 'Bank BPD (Deposito) Neraca Percobaan', 131, NULL, NULL),
(10, 'Bank Lembaga Lain (Giro) Neraca Percobaan', 131, NULL, NULL),
(11, 'Bank Lembaga Lain (Tabungan) Neraca Percobaan', 131, NULL, NULL),
(12, 'Bank Lembaga Lain (Deposito) Neraca Percobaan', 131, NULL, NULL),
(13, 'Giro', 131, NULL, NULL),
(14, 'Tabungan', 131, NULL, NULL),
(15, 'Deposito', 131, NULL, NULL),
(16, 'Pinjaman yg Diberikan Bulanan', 171, NULL, NULL),
(17, 'Pinjaman yg Diberikan Musiman', 173, NULL, NULL),
(18, 'Cadangan Piutang Ragu - Ragu', 172, NULL, NULL),
(19, 'Harga Perolehan', 211, NULL, NULL),
(20, 'Akumulasi Penyusutan', 212, NULL, NULL),
(21, 'Rupa - Rupa Aktiva', 230, NULL, NULL),
(22, 'Biaya Perjalanan', 300, NULL, NULL),
(23, 'Biaya Pemasaran / Promosi', 310, NULL, NULL),
(24, 'Biaya Jasa dan Umum', 320, NULL, NULL),
(25, 'Biaya Pegawai', 330, NULL, NULL),
(26, 'Biaya Kantor', 340, NULL, NULL),
(27, 'Biaya Penyusutan', 350, NULL, NULL),
(28, 'Biaya Pinjaman Ragu - Ragu', 360, NULL, NULL),
(29, 'Biaya Lain - Lain', 370, NULL, NULL),
(30, 'Biaya Bunga Tabungan', 380, NULL, NULL),
(31, 'Biaya Bunga Simpanan Berjangka', 390, NULL, NULL),
(32, 'Biaya Bunga Lain - Lain', 400, NULL, NULL),
(33, 'Giro (Hasil Bunga Dari Bank Lain)', 121, NULL, NULL),
(34, 'Simpanan Berjangka (Hasil Bunga Dari Bank Lain)', 122, NULL, NULL),
(35, 'Pinjaman yang Diberikan (Hasil Bunga Dari Bank Lain)', 123, NULL, NULL),
(36, 'Lainnya (Hasil Bunga Dari Bank Lain)', 124, NULL, NULL),
(37, 'Pinjaman yang Diberikan (Hasil Bunga Dari Pihak Ketiga Bukan Bank)', 126, NULL, NULL),
(38, 'Lainnya (Hasil Bunga Dari Pihak Ketiga Bukan Bank)', 129, NULL, NULL),
(39, 'Tabungan Wajib', 130, NULL, NULL),
(40, 'Tabungan Sukarela', 132, NULL, NULL),
(41, 'Pendapatan Operational Lainnya (L/R)', 170, NULL, NULL),
(42, 'Biaya Operasional (L/R)', 180, NULL, NULL),
(43, 'Simpanan Berjangka (Biaya Bunga Kepada Bank Lain)', 194, NULL, NULL),
(44, 'Pinjaman yang Diterima (Biaya Bunga Kepada Bank Lain)', 195, NULL, NULL),
(45, 'Lainnya (Biaya Bunga Kepada Bank Lain)', 199, NULL, NULL),
(46, 'Simpanan Berjangka (Biaya Bunga Kepada Pihak Ketiga Bukan Bank)', 203, NULL, NULL),
(47, 'Tabungan (Biaya Bunga Kepada Pihak Ketiga Bukan Bank)', 206, NULL, NULL),
(48, 'Lainnya (Biaya Bunga Kepada Pihak Ketiga Bukan Bank)', 209, NULL, NULL),
(49, 'Biaya Tenaga Kerja (L/R)', 241, NULL, NULL),
(50, 'Biaya Pemeliharaan dan Perbaikan (L/R)', 280, NULL, NULL),
(51, 'Aktivitas Tetap dan Inventaris (L/R)', 291, NULL, NULL),
(52, 'Piutang (L/R)', 299, NULL, NULL),
(53, 'Barang dan Jasa Dari Pihak Ketiga (L/R)', 300, NULL, NULL),
(54, 'Biaya Operasional Lainnya (L/R)', 310, NULL, NULL),
(55, 'Laba Operational (A-B) (L/R)', 320, NULL, NULL),
(56, 'Rugi Operational (B-A) (L/R)', 330, NULL, NULL),
(57, 'Pendapatan Non Operasional (L/R)', 340, NULL, NULL),
(58, 'Biaya Non Operasional (L/R)', 390, NULL, NULL),
(59, 'Laba Non Operational (D-E) (L/R)', 450, NULL, NULL),
(60, 'Rugi Non Operational (E-D) (L/R)', 460, NULL, NULL),
(61, 'Laba Tahun Berjalan (L/R)', 470, NULL, NULL),
(62, 'Rugi Tahun Berjalan (L/R)', 480, NULL, NULL),
(63, 'Laba Tahun Lalu (L/R)', 530, NULL, NULL),
(64, 'Rugi Tahun Lalu (L/R)', 540, NULL, NULL),
(65, 'Pajak Penghasilan (L/R)', 555, NULL, NULL),
(66, 'Jumlah Rugi 2 (L/R)', 560, NULL, NULL),
(67, 'Jumlah Rugi 3 (L/R)', 570, NULL, NULL),
(68, 'Tabungan', 320, NULL, NULL),
(69, 'Simpanan Berjangka', 330, NULL, NULL),
(70, 'Antar Bank Pasiva', 350, NULL, NULL),
(71, 'Pinjaman yang Diterima', 369, NULL, NULL),
(72, 'Pinjaman di Bank Lain', 371, NULL, NULL),
(73, 'Rupa - Rupa Pasiva', 400, NULL, NULL),
(74, 'Modal Disetor', 421, NULL, NULL),
(75, 'Modal Donasi', 422, NULL, NULL),
(76, 'Cadangan Umum', 430, NULL, NULL),
(77, 'Cadangan Khusus/Tujuan', 431, NULL, NULL),
(78, 'Cadangan Pinjaman Ragu-Ragu', 432, NULL, NULL),
(79, 'Laba', 441, NULL, NULL),
(80, 'Rugi', 442, NULL, NULL),
(81, 'Kewajiban Lain-Lain', 381, NULL, NULL),
(82, 'Aktiva Lain lain', 231, NULL, NULL),
(83, 'Testing', 190, '2023-01-12 01:44:58', '2023-01-12 01:44:58'),
(84, 'Pendapatan Operasional (L/R)', 101, NULL, NULL),
(85, 'Pendapatan Bunga dari Nasabah', 102, NULL, NULL),
(86, 'Pendapatan Bunga dari Lain-lain', 103, NULL, NULL),
(87, 'Pendapatan Lain-lain', 104, NULL, NULL),
(88, 'Ongkos Administasi', 302, NULL, NULL),
(89, 'Kas', 100, NULL, NULL),
(90, 'Bank BPD (Giro) Neraca Percobaan', 131, NULL, NULL),
(91, 'Bank BPD (Tabungan) Neraca Percobaan', 131, NULL, NULL),
(92, 'Bank BPD (Deposito) Neraca Percobaan', 131, NULL, NULL),
(93, 'Bank Lembaga Lain (Giro) Neraca Percobaan', 131, NULL, NULL),
(94, 'Bank Lembaga Lain (Tabungan) Neraca Percobaan', 131, NULL, NULL),
(95, 'Bank Lembaga Lain (Deposito) Neraca Percobaan', 131, NULL, NULL),
(96, 'Giro', 131, NULL, NULL),
(97, 'Tabungan', 131, NULL, NULL),
(98, 'Deposito', 131, NULL, NULL),
(99, 'Pinjaman yg Diberikan Bulanan', 171, NULL, NULL),
(100, 'Pinjaman yg Diberikan Musiman', 173, NULL, NULL),
(101, 'Cadangan Piutang Ragu - Ragu', 172, NULL, NULL),
(102, 'Harga Perolehan', 211, NULL, NULL),
(103, 'Akumulasi Penyusutan', 212, NULL, NULL),
(104, 'Rupa - Rupa Aktiva', 230, NULL, NULL),
(105, 'Biaya Perjalanan', 300, NULL, NULL),
(106, 'Biaya Pemasaran / Promosi', 310, NULL, NULL),
(107, 'Biaya Jasa dan Umum', 320, NULL, NULL),
(108, 'Biaya Pegawai', 330, NULL, NULL),
(109, 'Biaya Kantor', 340, NULL, NULL),
(110, 'Biaya Penyusutan', 350, NULL, NULL),
(111, 'Biaya Pinjaman Ragu - Ragu', 360, NULL, NULL),
(112, 'Biaya Lain - Lain', 370, NULL, NULL),
(113, 'Biaya Bunga Tabungan', 380, NULL, NULL),
(114, 'Biaya Bunga Simpanan Berjangka', 390, NULL, NULL),
(115, 'Biaya Bunga Lain - Lain', 400, NULL, NULL),
(116, 'Giro (Hasil Bunga Dari Bank Lain)', 121, NULL, NULL),
(117, 'Simpanan Berjangka (Hasil Bunga Dari Bank Lain)', 122, NULL, NULL),
(118, 'Pinjaman yang Diberikan (Hasil Bunga Dari Bank Lain)', 123, NULL, NULL),
(119, 'Lainnya (Hasil Bunga Dari Bank Lain)', 124, NULL, NULL),
(120, 'Pinjaman yang Diberikan (Hasil Bunga Dari Pihak Ketiga Bukan Bank)', 126, NULL, NULL),
(121, 'Lainnya (Hasil Bunga Dari Pihak Ketiga Bukan Bank)', 129, NULL, NULL),
(122, 'Tabungan Wajib', 130, NULL, NULL),
(123, 'Tabungan Sukarela', 132, NULL, NULL),
(124, 'Pendapatan Operational Lainnya (L/R)', 170, NULL, NULL),
(125, 'Biaya Operasional (L/R)', 180, NULL, NULL),
(126, 'Simpanan Berjangka (Biaya Bunga Kepada Bank Lain)', 194, NULL, NULL),
(127, 'Pinjaman yang Diterima (Biaya Bunga Kepada Bank Lain)', 195, NULL, NULL),
(128, 'Lainnya (Biaya Bunga Kepada Bank Lain)', 199, NULL, NULL),
(129, 'Simpanan Berjangka (Biaya Bunga Kepada Pihak Ketiga Bukan Bank)', 203, NULL, NULL),
(130, 'Tabungan (Biaya Bunga Kepada Pihak Ketiga Bukan Bank)', 206, NULL, NULL),
(131, 'Lainnya (Biaya Bunga Kepada Pihak Ketiga Bukan Bank)', 209, NULL, NULL),
(132, 'Biaya Tenaga Kerja (L/R)', 241, NULL, NULL),
(133, 'Biaya Pemeliharaan dan Perbaikan (L/R)', 280, NULL, NULL),
(134, 'Aktivitas Tetap dan Inventaris (L/R)', 291, NULL, NULL),
(135, 'Piutang (L/R)', 299, NULL, NULL),
(136, 'Barang dan Jasa Dari Pihak Ketiga (L/R)', 300, NULL, NULL),
(137, 'Biaya Operasional Lainnya (L/R)', 310, NULL, NULL),
(138, 'Laba Operational (A-B) (L/R)', 320, NULL, NULL),
(139, 'Rugi Operational (B-A) (L/R)', 330, NULL, NULL),
(140, 'Pendapatan Non Operasional (L/R)', 340, NULL, NULL),
(141, 'Biaya Non Operasional (L/R)', 390, NULL, NULL),
(142, 'Laba Non Operational (D-E) (L/R)', 450, NULL, NULL),
(143, 'Rugi Non Operational (E-D) (L/R)', 460, NULL, NULL),
(144, 'Laba Tahun Berjalan (L/R)', 470, NULL, NULL),
(145, 'Rugi Tahun Berjalan (L/R)', 480, NULL, NULL),
(146, 'Laba Tahun Lalu (L/R)', 530, NULL, NULL),
(147, 'Rugi Tahun Lalu (L/R)', 540, NULL, NULL),
(148, 'Pajak Penghasilan (L/R)', 555, NULL, NULL),
(149, 'Jumlah Rugi 2 (L/R)', 560, NULL, NULL),
(150, 'Jumlah Rugi 3 (L/R)', 570, NULL, NULL),
(151, 'Tabungan', 320, NULL, NULL),
(152, 'Simpanan Berjangka', 330, NULL, NULL),
(153, 'Antar Bank Pasiva', 350, NULL, NULL),
(154, 'Pinjaman yang Diterima', 369, NULL, NULL),
(155, 'Pinjaman di Bank Lain', 371, NULL, NULL),
(156, 'Rupa - Rupa Pasiva', 400, NULL, NULL),
(157, 'Modal Disetor', 421, NULL, NULL),
(158, 'Modal Donasi', 422, NULL, NULL),
(159, 'Cadangan Umum', 430, NULL, NULL),
(160, 'Cadangan Khusus/Tujuan', 431, NULL, NULL),
(161, 'Cadangan Pinjaman Ragu-Ragu', 432, NULL, NULL),
(162, 'Laba', 441, NULL, NULL),
(163, 'Rugi', 442, NULL, NULL),
(164, 'Kewajiban Lain-Lain', 381, NULL, NULL),
(165, 'Aktiva Lain lain', 231, NULL, NULL),
(166, 'Prive', 301, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_akun_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` text NOT NULL,
  `akun_types` enum('penerimaan','pengeluaran','beban') NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `konfirmasi` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `no_akun_id`, `keterangan`, `akun_types`, `tgl_transaksi`, `jumlah`, `konfirmasi`, `created_at`, `updated_at`) VALUES
(1, 14, 'Saldo Bank BPD', 'penerimaan', '2022-12-09 00:00:00', 71023000, 1, '2022-12-29 16:16:23', '2023-01-05 07:01:07'),
(2, 6, 'Saldo Kas', 'penerimaan', '2022-12-31 00:00:00', 13000000, 1, '2022-12-29 16:17:10', '2023-01-12 02:22:51'),
(3, 16, 'saldo pinjaman bulanan', 'penerimaan', '2023-01-18 00:00:00', 1200000000, 1, '2022-12-29 16:21:52', '2023-01-05 07:01:28'),
(4, 19, 'saldo harga perolehan', 'penerimaan', '2023-01-18 00:00:00', 14000000, 1, '2022-12-29 16:22:43', '2023-01-05 07:01:44'),
(5, 39, 'saldo tabungan wajib', 'pengeluaran', '2023-01-19 00:00:00', 29000000, 1, '2022-12-29 16:33:34', '2023-01-05 07:07:08'),
(6, 20, 'Saldo Penyusutan', 'pengeluaran', '2023-01-11 00:00:00', 120000, 1, '2022-12-29 16:35:21', '2023-01-05 07:04:52'),
(7, 40, 'Saldo Tabungan Sukarela', 'pengeluaran', '2023-01-11 00:00:00', 500000000, 1, '2022-12-29 16:41:56', '2023-01-05 07:05:12'),
(8, 40, 'Saldo Tabungan Sukarela', 'pengeluaran', '2023-01-18 00:00:00', 500000000, 1, '2022-12-29 16:41:59', '2023-01-05 07:05:21'),
(9, 69, 'Saldo simpanan berjangka', 'pengeluaran', '2023-01-14 00:00:00', 400000000, 1, '2022-12-29 16:51:00', '2023-01-05 07:05:34'),
(10, 72, 'Saldo Pinjaman di bank lain', 'pengeluaran', '2023-01-18 00:00:00', 50000000, 1, '2022-12-29 16:54:35', '2023-01-05 07:05:47'),
(11, 81, 'Saldo Kewajiban lain-lain', 'pengeluaran', '2023-01-17 00:00:00', 23000000, 1, '2022-12-29 16:55:45', '2023-01-05 07:05:56'),
(15, 74, 'Saldo Modal Disetor', 'pengeluaran', '2023-01-19 00:00:00', 12500000, 1, '2022-12-29 18:22:34', '2023-01-05 07:06:08'),
(16, 75, 'Saldo Modal Donasi', 'pengeluaran', '2023-01-18 00:00:00', 13000000, 1, '2022-12-29 18:23:37', '2023-01-05 07:06:25'),
(17, 76, 'Saldo Cadangan umum', 'pengeluaran', '2023-01-17 00:00:00', 76000000, 1, '2022-12-29 18:26:22', '2023-01-05 07:06:36'),
(18, 77, 'Saldo Cadangan Khusus/Tujuan', 'pengeluaran', '2023-01-16 00:00:00', 16000000, 1, '2022-12-29 18:27:47', '2023-01-05 07:06:49'),
(19, 78, 'Saldo cadangan pinjaman Ragu-ragu', 'pengeluaran', '2023-01-16 00:00:00', 6000000, 1, '2022-12-29 18:29:01', '2023-01-05 07:06:59'),
(20, 30, 'Saldo bunga tabungan', 'beban', '2022-12-29 00:00:00', 11000000, 1, '2022-12-29 18:32:19', '2023-01-05 06:42:42'),
(21, 31, 'Saldo Biaya bunga simpanan berjangka', 'beban', '2022-12-28 00:00:00', 19000000, 1, '2022-12-29 18:33:44', '2023-01-05 06:42:59'),
(22, 25, 'Saldo Biaya Pegawai', 'beban', '2022-12-28 00:00:00', 28000000, 1, '2022-12-29 18:35:10', '2023-01-05 06:43:13'),
(23, 26, 'Saldo Biaya Kantor', 'beban', '2022-12-28 00:00:00', 2200000, 1, '2022-12-29 18:36:05', '2023-01-05 06:43:24'),
(24, 22, 'Saldo Biaya Perjalanan', 'beban', '2022-12-27 00:00:00', 100000, 1, '2022-12-29 18:37:12', '2023-01-05 06:43:37'),
(25, 27, 'Saldo Biaya Penyusutan', 'beban', '2022-12-27 00:00:00', 1000000, 1, '2022-12-29 18:37:56', '2023-01-05 06:43:59'),
(26, 28, 'Saldo Biaya Pinjaman ragu-ragu', 'beban', '2022-12-28 00:00:00', 1500000, 1, '2022-12-29 18:38:34', '2023-01-05 06:44:11'),
(27, 29, 'Saldo Biaya lain-lain', 'beban', '2022-12-27 00:00:00', 900000, 1, '2022-12-29 18:39:09', '2023-01-05 06:44:23'),
(28, 6, 'Pembayaran angsuran', 'penerimaan', '2023-01-20 00:00:00', 1000000, 1, '2022-12-29 18:41:18', '2023-01-05 07:01:58'),
(29, 52, 'Pelunasan piutang', 'penerimaan', '2022-12-02 00:00:00', 750000, 1, '2022-12-29 18:44:13', '2023-01-05 07:00:46'),
(31, 6, 'kas dari tabungan', 'penerimaan', '2022-12-12 00:00:00', 5000000, 1, '2022-12-30 19:49:47', '2023-01-05 07:00:37'),
(32, 30, 'biaya tabungan', 'beban', '2023-01-05 00:00:00', 700000, 1, '2023-01-05 07:28:52', '2023-01-05 07:28:52'),
(33, 7, 'Giro', 'penerimaan', '2022-12-06 00:00:00', 700000, 1, '2023-01-05 10:29:34', '2023-01-05 10:30:37'),
(34, 7, 'Giroo', 'penerimaan', '2023-01-07 00:00:00', 3000000, 1, '2023-01-05 10:30:55', '2023-01-05 10:30:55'),
(35, 4, 'Pendapatan lain', 'pengeluaran', '2023-01-11 00:00:00', 15000000, 1, '2023-01-05 15:53:16', '2023-01-05 15:53:16'),
(36, 4, 'pendapatan lain', 'pengeluaran', '2022-12-06 00:00:00', 700000, 1, '2023-01-05 15:53:48', '2023-01-05 15:53:48'),
(37, 8, 'testing', 'penerimaan', '2023-01-13 00:00:00', 700000, 1, '2023-01-13 00:08:20', '2023-01-13 00:08:20'),
(38, 9, 'deposito', 'penerimaan', '2023-01-17 00:00:00', 3000000, 1, '2023-01-13 01:13:39', '2023-01-13 01:13:39'),
(39, 166, 'Prive testing', 'penerimaan', '2023-01-18 00:00:00', 12000000, 1, '2023-01-15 20:36:50', '2023-01-15 20:36:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_type` enum('admin','ketua','bendahara','sekretaris') NOT NULL,
  `photo` mediumtext DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `phone`, `user_type`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'I Nyoman Juliana', 'ketua123', 'juliana@gmail.com', '081337766811', 'ketua', NULL, NULL, '$2y$10$QSSIjTPI.mCoU9h2MwVUZebzs9x/u5IeDo4dnolrZGUrKja0tfwve', NULL, '2022-12-29 16:09:41', '2023-01-02 16:48:13'),
(2, 'bendahara', 'bendahara123', 'bendahara@softui.com', '12345', 'bendahara', NULL, NULL, '$2y$10$OaezeWkR89MYPme2KQhqDenVqMZSQWy5uFDuTUQpN2z3lkIvsxqDW', NULL, '2022-12-29 16:09:42', '2022-12-29 16:09:42'),
(3, 'sekretaris', 'sekretaris123', 'sekretaris@softui.com', '12345', 'sekretaris', NULL, NULL, '$2y$10$MmxyZ6B30Pqz1m9QFd0Mm.Jp.QYmJ9Pg8/pi0yGrrmcVxUw7UnU.u', NULL, '2022-12-29 16:09:42', '2022-12-29 16:09:42');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `date_range`
--
ALTER TABLE `date_range`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `no_akuns`
--
ALTER TABLE `no_akuns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_akuns_id_unique` (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_no_akun_id_foreign` (`no_akun_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `date_range`
--
ALTER TABLE `date_range`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `no_akuns`
--
ALTER TABLE `no_akuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_no_akun_id_foreign` FOREIGN KEY (`no_akun_id`) REFERENCES `no_akuns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
