-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2026 at 09:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rw_palem`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-setting:contact.address', 's:58:\"Jl. Palem X, Kel. Rancabolang, Kec. Gedebage, Kota Bandung\";', 2101863821),
('laravel-cache-setting:contact.email', 's:21:\"info@clusterpalem.com\";', 2101863821),
('laravel-cache-setting:contact.hours', 's:32:\"Senin – Sabtu: 08.00 – 18.00\";', 2101863821),
('laravel-cache-setting:contact.phone', 's:17:\"022 – 8750 6667\";', 2101863821),
('laravel-cache-setting:contact.wa', 's:11:\"02287506667\";', 2101863821),
('laravel-cache-setting:footer.news', 's:66:\"Pengurus RW 09 Berikan Kembali Kartu Iuran Warga sebagai Syarat...\";', 2101863821),
('laravel-cache-setting:home.app_badge', 's:19:\"Tentang Portal Kami\";', 2101958497),
('laravel-cache-setting:home.app_card1_desc', 's:62:\"Akses layanan dan informasi warga kapan saja lewat portal ini.\";', 2101958497),
('laravel-cache-setting:home.app_card1_title', 's:13:\"Website Resmi\";', 2101958497),
('laravel-cache-setting:home.app_card2_desc', 's:56:\"Konsultasi, pengaduan, dan info langsung ke pengurus RW.\";', 2101958497),
('laravel-cache-setting:home.app_card2_title', 's:17:\"WhatsApp Pengurus\";', 2101958497),
('laravel-cache-setting:home.app_img', 's:68:\"https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=700&q=80\";', 2101958497),
('laravel-cache-setting:home.app_subtitle', 's:147:\"Semua informasi, pengumuman, layanan administrasi, dan kegiatan warga RW 09 Cluster Palem tersedia dalam satu portal yang mudah diakses kapan saja.\";', 2101958497),
('laravel-cache-setting:home.app_title', 's:24:\"Portal Resmi Warga Palem\";', 2101958497),
('laravel-cache-setting:home.pelindung_desc', 's:34:\"Pemantauan Lingkungan Kota Bandung\";', 2101958497),
('laravel-cache-setting:home.pelindung_text', 's:100:\"CCTV pemantauan lingkungan di Kota Bandung untuk menjaga keamanan, kebersihan, dan kenyamanan warga.\";', 2101958497),
('laravel-cache-setting:home.pelindung_title', 's:9:\"PELINDUNG\";', 2101958497),
('laravel-cache-setting:layanan.card_1_desc', 's:86:\"Pengajuan surat pengantar, keterangan domisili, dan administrasi kependudukan lainnya.\";', 2101958505),
('laravel-cache-setting:layanan.card_1_title', 's:25:\"Persuratan & Administrasi\";', 2101958505),
('laravel-cache-setting:layanan.card_2_desc', 's:80:\"Portal pembayaran IPL bulanan secara digital, cepat, dan terverifikasi otomatis.\";', 2101958505),
('laravel-cache-setting:layanan.card_2_title', 's:16:\"Pembayaran Iuran\";', 2101958505),
('laravel-cache-setting:layanan.card_3_desc', 's:64:\"Reservasi clubhouse, lapangan olahraga, dan area publik cluster.\";', 2101958505),
('laravel-cache-setting:layanan.card_3_title', 's:14:\"Fasilitas Umum\";', 2101958505),
('laravel-cache-setting:layanan.card_4_desc', 's:74:\"Laporan masalah keamanan, kebersihan, atau fasilitas cluster secara cepat.\";', 2101958505),
('laravel-cache-setting:layanan.card_4_title', 's:15:\"Pengaduan Warga\";', 2101958505),
('laravel-cache-setting:layanan.card_5_desc', 's:57:\"Kontak darurat dan kontrol patroli keamanan terintegrasi.\";', 2101958505),
('laravel-cache-setting:layanan.card_5_title', 's:18:\"Keamanan & Darurat\";', 2101958505),
('laravel-cache-setting:layanan.card_6_desc', 's:66:\"Unduh aplikasi Palem untuk akses layanan langsung dari smartphone.\";', 2101958505),
('laravel-cache-setting:layanan.card_6_title', 's:16:\"Aplikasi Android\";', 2101958505),
('laravel-cache-setting:layanan.cta_subtitle', 's:80:\"Hubungi pengurus RW melalui WhatsApp atau datang langsung ke kantor sekretariat.\";', 2101958505),
('laravel-cache-setting:layanan.cta_title', 's:14:\"Butuh Bantuan?\";', 2101958505),
('laravel-cache-setting:layanan.hero_img', 's:71:\"https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=600&q=80\";', 2101958505),
('laravel-cache-setting:layanan.hero_subtitle', 's:109:\"Layanan komunitas yang efisien, transparan, dan mudah diakses untuk seluruh warga Cluster Palem Bumi Adipura.\";', 2101958505),
('laravel-cache-setting:layanan.hero_title', 's:25:\"Pusat Layanan Warga Palem\";', 2101958505),
('laravel-cache-setting:profil.hero_badge', 's:27:\"Adipura Cluster Palem RW 09\";', 2101863820),
('laravel-cache-setting:profil.hero_subtitle', 's:112:\"Mewujudkan lingkungan yang aman, nyaman, dan harmonis menuju tata kelola warga yang transparan dan partisipatif.\";', 2101863820),
('laravel-cache-setting:profil.hero_title', 's:31:\"Profil RW Cluster Adipura Palem\";', 2101863820),
('laravel-cache-setting:profil.misi_1', 's:75:\"Meningkatkan keamanan dan ketertiban lingkungan secara swadaya dan terpadu.\";', 2101863820),
('laravel-cache-setting:profil.misi_2', 's:73:\"Mengoptimalkan kebersihan, penghijauan, dan kesehatan lingkungan cluster.\";', 2101863820),
('laravel-cache-setting:profil.misi_3', 's:75:\"Membangun kerukunan antar warga melalui kegiatan sosial dan kemasyarakatan.\";', 2101863820),
('laravel-cache-setting:profil.misi_4', 's:63:\"Mewujudkan transparansi pengelolaan dana kas RW yang akuntabel.\";', 2101863820),
('laravel-cache-setting:profil.sejarah', 's:41:\"Cluster Palem diresmikan pada tahun 2015.\";', 2101863820),
('laravel-cache-setting:profil.sejarah_2', 's:50:\"Secara administratif, Cluster Palem meliputi 6 RT.\";', 2101863821),
('laravel-cache-setting:profil.sejarah_badge', 's:17:\"Sejarah & Wilayah\";', 2101863820),
('laravel-cache-setting:profil.sejarah_img', 's:82:\"http://127.0.0.1:8000/storage/uploads/5zzSQA4MGjqr9dFB9DBQ2a36XKCQuIgk9gvPezQW.jpg\";', 2101863821),
('laravel-cache-setting:profil.sejarah_location', 's:17:\"Gedebage, Bandung\";', 2101863821),
('laravel-cache-setting:profil.sejarah_title', 's:21:\"Tentang Cluster Palem\";', 2101863820),
('laravel-cache-setting:profil.visi', 's:70:\"Menjadi rukun warga yang mandiri, sejahtera, dan berbudaya lingkungan.\";', 2101863820),
('laravel-cache-setting:site.copyright', 's:52:\"RW 09 Cluster Adipura Palem · Bumi Adipura, Bandung\";', 2101863821),
('laravel-cache-setting:site.name', 's:5:\"PALEM\";', 2101863821),
('laravel-cache-setting:site.tagline', 's:21:\"Adipura Cluster RW 09\";', 2101863821),
('laravel-cache-setting:stats.kk', 's:3:\"250\";', 2101863821),
('laravel-cache-setting:stats.rt', 's:1:\"6\";', 2101863821),
('laravel-cache-setting:stats.tahun', 's:4:\"2015\";', 2101863821);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carousel_items`
--

CREATE TABLE `carousel_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `button_text` varchar(255) NOT NULL DEFAULT 'Selengkapnya',
  `button_url` varchar(255) NOT NULL DEFAULT '#',
  `sort_order` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carousel_items`
--

INSERT INTO `carousel_items` (`id`, `title`, `subtitle`, `image_url`, `button_text`, `button_url`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Selamat Datang di Cluster Palem', 'Portal resmi warga RW 10 Cluster Palem Bumi Adipura. Nikmati kemudahan akses layanan, informasi, dan kegiatan komunitas.', 'https://images.unsplash.com/photo-1543269865-cbf427effbad?w=1400&q=80', 'Akses Layanan', '/layanan', 0, 1, '2026-08-11 17:47:55', '2026-08-11 17:47:55'),
(2, 'FINAL 17 Agustus Volley Palem', 'Ayo warga RW 10, kita berikan dukungan terbaik! Jangan lewatkan babak final voli 17 Agustus.', 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=1400&q=80', 'Selengkapnya', '/berita', 1, 1, '2026-08-11 17:47:55', '2026-08-11 17:47:55'),
(3, 'Gotong Royong Bersama Warga', 'Bersama kita jaga kebersihan dan keindahan lingkungan Cluster Palem tercinta.', 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=1400&q=80', 'Lihat Informasi', '/informasi', 2, 1, '2026-08-11 17:47:55', '2026-08-11 17:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_08_11_022054_create_posts_table', 1),
(5, '2026_08_12_000001_create_carousel_items_table', 1),
(6, '2026_08_12_000002_create_org_members_table', 1),
(7, '2026_08_12_000003_create_site_settings_table', 1),
(8, '2026_08_12_000004_seed_extended_settings', 1);

-- --------------------------------------------------------

--
-- Table structure for table `org_members`
--

CREATE TABLE `org_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `role_type` enum('ketua_rw','rt','divisi') NOT NULL,
  `rt_number` tinyint(3) UNSIGNED DEFAULT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `period` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `bg_color` varchar(255) NOT NULL DEFAULT '2563eb',
  `sort_order` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `org_members`
--

INSERT INTO `org_members` (`id`, `name`, `position`, `role_type`, `rt_number`, `photo_url`, `phone`, `period`, `description`, `bg_color`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Suryana', 'Ketua RW 10', 'ketua_rw', NULL, 'http://127.0.0.1:8000/storage/uploads/51eS0jpxLSpanDyg7AQB44I1PKfINoaA4S9cUR3m.png', '0812-3456-7890', '2023 – 2026', 'Menjabat sejak Januari 2023', '2563eb', 0, '2026-08-11 17:47:55', '2026-08-11 19:44:00'),
(2, 'Budi Hartono', 'Ketua RT 01', 'rt', 1, NULL, '0812-1111-2222', NULL, NULL, '059669', 1, '2026-08-11 17:47:55', '2026-08-11 17:47:55'),
(3, 'Siti Rahayu', 'Ketua RT 02', 'rt', 2, NULL, '0813-2222-3333', NULL, NULL, '059669', 2, '2026-08-11 17:47:55', '2026-08-11 17:47:55'),
(4, 'Hendra Wijaya', 'Ketua RT 03', 'rt', 3, NULL, '0814-3333-4444', NULL, NULL, '059669', 3, '2026-08-11 17:47:55', '2026-08-11 17:47:55'),
(5, 'Dewi Susanti', 'Ketua RT 04', 'rt', 4, NULL, '0815-4444-5555', NULL, NULL, '059669', 4, '2026-08-11 17:47:55', '2026-08-11 17:47:55'),
(6, 'Agus Prasetyo', 'Ketua RT 05', 'rt', 5, NULL, '0816-5555-6666', NULL, NULL, '059669', 5, '2026-08-11 17:47:55', '2026-08-11 17:47:55'),
(7, 'Rina Kusuma', 'Ketua RT 06', 'rt', 6, NULL, '0817-6666-7777', NULL, NULL, '059669', 6, '2026-08-11 17:47:55', '2026-08-11 17:47:55'),
(8, 'Sri Mulyani', 'Ketua Posyandu', 'divisi', NULL, NULL, '0818-1234-5678', NULL, 'Bertanggung jawab atas kesehatan ibu & balita', '3b82f6', 10, '2026-08-11 17:47:55', '2026-08-11 17:47:55'),
(9, 'Kartini Dewi', 'Ketua PKK', 'divisi', NULL, NULL, '0819-2345-6789', NULL, 'Pemberdayaan kesejahteraan keluarga', '7c3aed', 11, '2026-08-11 17:47:55', '2026-08-11 17:47:55'),
(10, 'Yusuf Santoso', 'Keamanan', 'divisi', NULL, NULL, '0821-3456-7890', NULL, 'Koordinator keamanan & patroli lingkungan', 'f97316', 12, '2026-08-11 17:47:55', '2026-08-11 17:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(20) NOT NULL,
  `title` varchar(160) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `type`, `title`, `excerpt`, `content`, `image_url`, `published_at`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'berita', 'Kerja Bakti Massal dan Penghijauan Taman Utama Cluster Palem', 'Warga RW 10 bergotong royong membersihkan saluran air dan menanam bibit pohon untuk menyambut musim penghujan.', 'Kegiatan kerja bakti massal melibatkan seluruh RT di lingkungan Palem. Fokus utama pada kebersihan drainase, penghijauan area publik, dan edukasi pemilahan sampah rumah tangga.', 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=900', '2026-08-09 17:47:55', 1, '2026-08-11 17:47:55', '2026-08-11 17:47:55'),
(2, 'berita', 'Pembaruan Sistem Akses Gerbang Menggunakan RFID', 'Sistem akses gerbang utama akan ditingkatkan untuk keamanan dan kelancaran mobilitas warga.', 'Distribusi kartu RFID dilakukan bertahap per RT di pos keamanan. Warga diminta membawa identitas saat pengambilan kartu.', 'https://images.unsplash.com/photo-1595079676601-f1adf5be5dee?w=600', '2026-08-07 17:47:55', 0, '2026-08-11 17:47:55', '2026-08-11 17:47:55'),
(3, 'informasi', 'Pemeliharaan Jaringan Listrik Cluster', 'Akan dilakukan pemeliharaan rutin jaringan listrik pada akhir pekan ini.', 'Pemadaman sementara dijadwalkan per blok untuk meminimalkan gangguan. Detail jadwal dapat dilihat pada papan pengumuman balai warga.', 'https://images.unsplash.com/photo-1517511620798-cec17d428bc0?w=600', '2026-08-10 17:47:55', 1, '2026-08-11 17:47:55', '2026-08-11 17:47:55'),
(4, 'informasi', 'Pemberlakuan Jam Operasional Lapangan Multifungsi', 'Lapangan multifungsi kini memiliki jadwal operasional baru untuk meningkatkan kenyamanan bersama.', 'Penggunaan lapangan dibagi dalam sesi pagi, sore, dan malam. Reservasi tetap dilakukan melalui pengurus fasilitas.', NULL, '2026-08-08 17:47:55', 0, '2026-08-11 17:47:55', '2026-08-11 17:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('TczrCFbj3ZrdnxRxOYttJu51r1ttklMX0KQlP0XE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXM5V1Jxam1FVUp5UURDUm1adFByOFhWMTVNRXcxVzNhaXNRdVUzaCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sYXlhbmFuIjtzOjU6InJvdXRlIjtzOjc6ImxheWFuYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1786598777),
('urok2VsMzSy9fNsXGdpIKqXoqZTBaXLTK2BMo9bA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXJDeDBPTVFUOUNCV1Ywc3Nnb3Bkb0RLcTRUMnhTUml3NVFJNG80WiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7czo1OiJyb3V0ZSI7czoxMToiYWRtaW4ubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1786631359),
('v4jtJoCcfjO0oMO4yhX7AyLbechujhN3TxXtjapQ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSTEzYTA1ZlVaMzNSRVNWNXoxYkRzMnJCZjk0WFJrWGtwV0sxMTZkTSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWwiO3M6NToicm91dGUiO3M6NjoicHJvZmlsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1786503821);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` enum('text','textarea','image') NOT NULL DEFAULT 'text',
  `label` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `sort_order` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `key`, `value`, `type`, `label`, `group`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'home.pelindung_title', 'PELINDUNG', 'text', 'Nama Program CCTV', 'home', 1, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(2, 'home.pelindung_desc', 'Pemantauan Lingkungan Kota Bandung', 'text', 'Sub-judul PELINDUNG', 'home', 2, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(3, 'home.pelindung_text', 'CCTV pemantauan lingkungan di Kota Bandung untuk menjaga keamanan, kebersihan, dan kenyamanan warga.', 'textarea', 'Keterangan PELINDUNG', 'home', 3, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(4, 'home.app_badge', 'Tentang Portal Kami', 'text', 'Badge Seksi Aplikasi', 'home', 4, '2026-08-11 17:47:54', '2026-08-11 19:13:26'),
(5, 'home.app_title', 'Portal Resmi Warga Palem', 'text', 'Judul Seksi Aplikasi', 'home', 5, '2026-08-11 17:47:54', '2026-08-11 19:13:26'),
(6, 'home.app_subtitle', 'Semua informasi, pengumuman, layanan administrasi, dan kegiatan warga RW 09 Cluster Palem tersedia dalam satu portal yang mudah diakses kapan saja.', 'textarea', 'Sub-judul Seksi Aplikasi', 'home', 6, '2026-08-11 17:47:54', '2026-08-11 19:13:26'),
(7, 'home.app_card1_title', 'Website Resmi', 'text', 'Kartu Aplikasi 1 – Judul', 'home', 7, '2026-08-11 17:47:54', '2026-08-11 19:13:26'),
(8, 'home.app_card1_desc', 'Akses layanan dan informasi warga kapan saja lewat portal ini.', 'text', 'Kartu Aplikasi 1 – Deskripsi', 'home', 8, '2026-08-11 17:47:54', '2026-08-11 19:13:26'),
(9, 'home.app_card2_title', 'WhatsApp Pengurus', 'text', 'Kartu Aplikasi 2 – Judul', 'home', 9, '2026-08-11 17:47:54', '2026-08-11 19:13:26'),
(10, 'home.app_card2_desc', 'Konsultasi, pengaduan, dan info langsung ke pengurus RW.', 'text', 'Kartu Aplikasi 2 – Deskripsi', 'home', 10, '2026-08-11 17:47:54', '2026-08-11 19:13:26'),
(11, 'profil.hero_badge', 'Adipura Cluster Palem RW 09', 'text', 'Badge Hero Profil', 'profil', 0, '2026-08-11 17:47:54', '2026-08-11 20:03:34'),
(12, 'profil.hero_title', 'Profil RW Cluster Adipura Palem', 'text', 'Judul Hero Profil', 'profil', 0, '2026-08-11 17:47:54', '2026-08-11 20:03:34'),
(13, 'profil.hero_subtitle', 'Mewujudkan lingkungan yang aman, nyaman, dan harmonis menuju tata kelola warga yang transparan dan partisipatif.', 'textarea', 'Sub-judul Hero Profil', 'profil', 0, '2026-08-11 17:47:54', '2026-08-11 20:03:34'),
(14, 'profil.misi_1', 'Meningkatkan keamanan dan ketertiban lingkungan secara swadaya dan terpadu.', 'text', 'Misi 1', 'profil', 4, '2026-08-11 17:47:54', '2026-08-11 20:03:34'),
(15, 'profil.misi_2', 'Mengoptimalkan kebersihan, penghijauan, dan kesehatan lingkungan cluster.', 'text', 'Misi 2', 'profil', 5, '2026-08-11 17:47:54', '2026-08-11 20:03:34'),
(16, 'profil.misi_3', 'Membangun kerukunan antar warga melalui kegiatan sosial dan kemasyarakatan.', 'text', 'Misi 3', 'profil', 6, '2026-08-11 17:47:54', '2026-08-11 20:03:34'),
(17, 'profil.misi_4', 'Mewujudkan transparansi pengelolaan dana kas RW yang akuntabel.', 'text', 'Misi 4', 'profil', 7, '2026-08-11 17:47:54', '2026-08-11 20:03:34'),
(18, 'layanan.hero_title', 'Pusat Layanan Warga Palem', 'text', 'Judul Hero Layanan', 'layanan', 1, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(19, 'layanan.hero_subtitle', 'Layanan komunitas yang efisien, transparan, dan mudah diakses untuk seluruh warga Cluster Palem Bumi Adipura.', 'textarea', 'Sub-judul Hero Layanan', 'layanan', 2, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(20, 'layanan.hero_img', 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=600&q=80', 'image', 'Foto Hero Layanan', 'layanan', 3, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(21, 'layanan.cta_title', 'Butuh Bantuan?', 'text', 'Judul CTA Bawah', 'layanan', 4, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(22, 'layanan.cta_subtitle', 'Hubungi pengurus RW melalui WhatsApp atau datang langsung ke kantor sekretariat.', 'textarea', 'Sub-judul CTA Bawah', 'layanan', 5, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(23, 'layanan.card_1_title', 'Persuratan & Administrasi', 'text', 'Layanan 1 – Judul', 'layanan', 10, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(24, 'layanan.card_1_desc', 'Pengajuan surat pengantar, keterangan domisili, dan administrasi kependudukan lainnya.', 'textarea', 'Layanan 1 – Deskripsi', 'layanan', 11, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(25, 'layanan.card_2_title', 'Pembayaran Iuran', 'text', 'Layanan 2 – Judul', 'layanan', 12, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(26, 'layanan.card_2_desc', 'Portal pembayaran IPL bulanan secara digital, cepat, dan terverifikasi otomatis.', 'textarea', 'Layanan 2 – Deskripsi', 'layanan', 13, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(27, 'layanan.card_3_title', 'Fasilitas Umum', 'text', 'Layanan 3 – Judul', 'layanan', 14, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(28, 'layanan.card_3_desc', 'Reservasi clubhouse, lapangan olahraga, dan area publik cluster.', 'textarea', 'Layanan 3 – Deskripsi', 'layanan', 15, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(29, 'layanan.card_4_title', 'Pengaduan Warga', 'text', 'Layanan 4 – Judul', 'layanan', 16, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(30, 'layanan.card_4_desc', 'Laporan masalah keamanan, kebersihan, atau fasilitas cluster secara cepat.', 'textarea', 'Layanan 4 – Deskripsi', 'layanan', 17, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(31, 'layanan.card_5_title', 'Keamanan & Darurat', 'text', 'Layanan 5 – Judul', 'layanan', 18, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(32, 'layanan.card_5_desc', 'Kontak darurat dan kontrol patroli keamanan terintegrasi.', 'textarea', 'Layanan 5 – Deskripsi', 'layanan', 19, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(33, 'layanan.card_6_title', 'Aplikasi Android', 'text', 'Layanan 6 – Judul', 'layanan', 20, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(34, 'layanan.card_6_desc', 'Unduh aplikasi Palem untuk akses layanan langsung dari smartphone.', 'textarea', 'Layanan 6 – Deskripsi', 'layanan', 21, '2026-08-11 17:47:54', '2026-08-11 17:47:54'),
(35, 'home.app_img', 'https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=700&q=80', 'image', 'Foto Seksi Portal (kiri)', 'home', 11, '2026-08-11 19:13:26', '2026-08-11 19:13:26'),
(36, 'stats.kk', '250', 'text', 'Jumlah Kepala Keluarga', 'stats', 1, '2026-08-11 19:24:42', '2026-08-11 19:24:42'),
(37, 'stats.rt', '6', 'text', 'Jumlah Rukun Tetangga', 'stats', 2, '2026-08-11 19:24:42', '2026-08-11 19:24:42'),
(38, 'stats.tahun', '2015', 'text', 'Tahun Berdiri', 'stats', 3, '2026-08-11 19:24:42', '2026-08-11 19:24:42'),
(39, 'hero.badge', 'RW 09 · Cluster Palem · Bandung', 'text', 'Badge Hero', 'hero', 1, '2026-08-11 19:24:42', '2026-08-11 19:24:42'),
(40, 'hero.title', 'Selamat Datang di Cluster Palem', 'text', 'Judul Hero', 'hero', 2, '2026-08-11 19:24:42', '2026-08-11 19:24:42'),
(41, 'hero.subtitle', 'Portal resmi warga RW 09 Cluster Palem Bumi Adipura. Nikmati kemudahan akses layanan, informasi, dan kegiatan komunitas.', 'textarea', 'Sub-judul Hero', 'hero', 3, '2026-08-11 19:24:42', '2026-08-11 19:24:42'),
(42, 'site.name', 'PALEM', 'text', 'Nama Situs', 'general', 1, '2026-08-11 19:24:42', '2026-08-11 19:24:42'),
(43, 'site.tagline', 'Adipura Cluster RW 09', 'text', 'Tagline', 'general', 2, '2026-08-11 19:24:42', '2026-08-11 19:24:42'),
(44, 'site.copyright', 'RW 09 Cluster Adipura Palem · Bumi Adipura, Bandung', 'text', 'Copyright Footer', 'general', 3, '2026-08-11 19:24:42', '2026-08-11 19:24:42'),
(45, 'contact.phone', '022 – 8750 6667', 'text', 'Telepon', 'contact', 1, '2026-08-11 19:24:42', '2026-08-11 19:24:42'),
(46, 'contact.wa', '02287506667', 'text', 'Nomor WhatsApp', 'contact', 2, '2026-08-11 19:24:42', '2026-08-11 19:24:42'),
(47, 'contact.email', 'info@clusterpalem.com', 'text', 'Email', 'contact', 3, '2026-08-11 19:24:42', '2026-08-11 19:24:42'),
(48, 'contact.address', 'Jl. Palem X, Kel. Rancabolang, Kec. Gedebage, Kota Bandung', 'textarea', 'Alamat Lengkap', 'contact', 4, '2026-08-11 19:24:42', '2026-08-11 19:24:42'),
(49, 'contact.hours', 'Senin – Sabtu: 08.00 – 18.00', 'text', 'Jam Pelayanan', 'contact', 5, '2026-08-11 19:24:42', '2026-08-11 19:24:42'),
(50, 'footer.news', 'Pengurus RW 09 Berikan Kembali Kartu Iuran Warga sebagai Syarat...', 'text', 'Cuplikan Berita Footer', 'footer', 1, '2026-08-11 19:24:42', '2026-08-11 19:24:42'),
(51, 'profil.sejarah_badge', 'Sejarah & Wilayah', 'text', 'Badge Seksi Sejarah (teks kecil atas)', 'profil', 8, '2026-08-11 19:55:06', '2026-08-11 20:03:34'),
(52, 'profil.sejarah_title', 'Tentang Cluster Palem', 'text', 'Judul Seksi Sejarah', 'profil', 9, '2026-08-11 19:55:06', '2026-08-11 20:03:34'),
(53, 'profil.sejarah_img', 'http://127.0.0.1:8000/storage/uploads/5zzSQA4MGjqr9dFB9DBQ2a36XKCQuIgk9gvPezQW.jpg', 'image', 'Foto Wilayah (gambar kanan)', 'profil', 10, '2026-08-11 19:55:06', '2026-08-11 20:03:34'),
(54, 'profil.sejarah_location', 'Gedebage, Bandung', 'text', 'Badge Lokasi (di pojok foto)', 'profil', 11, '2026-08-11 19:55:06', '2026-08-11 20:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Palem', 'admin@palem.id', NULL, '$2y$12$4c9U3ZGTw117iJqsxQQ7budWuYUg9Bwb3UkvZQzL83gSBPYY58RzK', NULL, '2026-08-11 17:47:55', '2026-08-11 17:47:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `carousel_items`
--
ALTER TABLE `carousel_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_members`
--
ALTER TABLE `org_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_type_index` (`type`),
  ADD KEY `posts_published_at_index` (`published_at`),
  ADD KEY `posts_type_published_at_index` (`type`,`published_at`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_settings_key_unique` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carousel_items`
--
ALTER TABLE `carousel_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `org_members`
--
ALTER TABLE `org_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
