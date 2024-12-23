/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `anggota_posyandu` (
  `id_anggota` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_anggota` bigint unsigned NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_anggota`),
  KEY `anggota_posyandu_kategori_anggota_foreign` (`kategori_anggota`),
  CONSTRAINT `anggota_posyandu_kategori_anggota_foreign` FOREIGN KEY (`kategori_anggota`) REFERENCES `kategori_anggota` (`id_kategori_anggota`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `jenis_pemeriksaan` (
  `id_jenis_pemeriksaan` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_jenis_pemeriksaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis_pemeriksaan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `kategori_anggota` (
  `id_kategori_anggota` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `pencatatan_kesehatan` (
  `id_pencatatan_kesehatan` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fk_id_anggota` bigint unsigned NOT NULL,
  `tanggal_pemeriksaan` date NOT NULL,
  `fk_jenis_pemeriksaan` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pencatatan_kesehatan`),
  KEY `pencatatan_kesehatan_fk_id_anggota_foreign` (`fk_id_anggota`),
  KEY `pencatatan_kesehatan_fk_jenis_pemeriksaan_foreign` (`fk_jenis_pemeriksaan`),
  CONSTRAINT `pencatatan_kesehatan_fk_id_anggota_foreign` FOREIGN KEY (`fk_id_anggota`) REFERENCES `anggota_posyandu` (`id_anggota`) ON DELETE CASCADE,
  CONSTRAINT `pencatatan_kesehatan_fk_jenis_pemeriksaan_foreign` FOREIGN KEY (`fk_jenis_pemeriksaan`) REFERENCES `jenis_pemeriksaan` (`id_jenis_pemeriksaan`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'petugas',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `anggota_posyandu` (`id_anggota`, `nama_anggota`, `kategori_anggota`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telepon`, `created_at`, `updated_at`) VALUES
(14, 'kakakkak', 2, '2019-02-12', 'Laki-laki', 'wkwnwqsjonsna', '1202092', '2024-12-19 09:32:31', '2024-12-19 11:54:05');








INSERT INTO `jenis_pemeriksaan` (`id_jenis_pemeriksaan`, `nama_jenis_pemeriksaan`, `created_at`, `updated_at`) VALUES
(1, 'Cek Berat Badan', NULL, '2024-12-19 13:08:48');
INSERT INTO `jenis_pemeriksaan` (`id_jenis_pemeriksaan`, `nama_jenis_pemeriksaan`, `created_at`, `updated_at`) VALUES
(2, 'Tekanan Darah', NULL, NULL);
INSERT INTO `jenis_pemeriksaan` (`id_jenis_pemeriksaan`, `nama_jenis_pemeriksaan`, `created_at`, `updated_at`) VALUES
(3, 'Tinggi Badan', NULL, NULL);
INSERT INTO `jenis_pemeriksaan` (`id_jenis_pemeriksaan`, `nama_jenis_pemeriksaan`, `created_at`, `updated_at`) VALUES
(4, 'Cek Kolestrol', '2024-12-19 13:09:14', '2024-12-19 13:09:14');





INSERT INTO `kategori_anggota` (`id_kategori_anggota`, `nama_kategori_anggota`, `created_at`, `updated_at`) VALUES
(1, 'Balita', NULL, NULL);
INSERT INTO `kategori_anggota` (`id_kategori_anggota`, `nama_kategori_anggota`, `created_at`, `updated_at`) VALUES
(2, 'Lanjut Usia', NULL, NULL);


INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2024_12_01_023003_create_kategori_anggota_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2024_12_01_024657_create_anggota_posyandu_table', 3),
(7, '0001_01_01_000000_create_users_table', 4),
(9, '2024_12_01_113021_create_jenis_pemeriksaan_table', 5),
(10, '2024_12_01_113406_create_pencatatan_kesehatan_table', 5),
(11, '2024_12_18_102535_create_laporan_table', 6),
(12, '2024_12_18_102735_create_laporans_table', 6);



INSERT INTO `pencatatan_kesehatan` (`id_pencatatan_kesehatan`, `fk_id_anggota`, `tanggal_pemeriksaan`, `fk_jenis_pemeriksaan`, `created_at`, `updated_at`) VALUES
(7, 14, '2024-12-19', 2, '2024-12-19 12:10:41', '2024-12-19 12:10:41');


INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6cPj2bU3bGHQU9eQq2SPCjGhBn6qr3No3Nlzscy3', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWldkS01sbUprcVRuVjJ5amlaMlJES3pha2R2OG9WS1hPZXljMDFOOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sYXBvcmFuLWFkbWluIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1734617266);


INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'irfan', 'irfannuril@gmail.com', 'Petugas', NULL, '$2y$12$mWWhFhcCOaWrDmoTMjjZte81JEanl7mxiwcmwOIaSI9PHHzzexEZK', NULL, '2024-12-17 09:50:17', '2024-12-17 09:50:17');
INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'joy', 'joy@gmail.com', 'Admin', NULL, '$2y$12$3gTxv8ZXBwAvezaUBBr/teqR6d1fIABnq1mUnSAPac8rEVwWZo8Fm', NULL, '2024-12-17 14:41:33', '2024-12-17 14:41:33');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;