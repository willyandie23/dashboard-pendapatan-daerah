-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table dashboard-pendapatan-daerah.app_logs: ~51 rows (approximately)
REPLACE INTO `app_logs` (`id`, `system_logable_id`, `system_logable_type`, `user_id`, `guard_name`, `module_name`, `action`, `old_value`, `new_value`, `ip_address`, `created_at`, `updated_at`) VALUES
	(1, 1, 'App\\Models\\Document', 1, 'web', 'Document', 'CREATED', NULL, '{"id": 1, "created_at": "2025-10-20 02:30:46", "updated_at": "2025-10-20 02:30:46", "document_name": "asd", "document_path": "/storage/documents/kifPGoukBZXydoro7wbGOKeMTOvpJioEKxKoQnwQ.pdf", "total_download": 0}', '127.0.0.1', '2025-10-19 19:30:46', '2025-10-19 19:30:46'),
	(2, 2, 'App\\Models\\Document', 1, 'web', 'Document', 'CREATED', NULL, '{"id": 2, "created_at": "2025-10-20 02:30:57", "updated_at": "2025-10-20 02:30:57", "document_name": "asd", "document_path": "/storage/documents/G8XKkCPpsVuINaOzIfHGm6UnSOEfQFgde5uISROB.pdf", "total_download": 0}', '127.0.0.1', '2025-10-19 19:30:57', '2025-10-19 19:30:57'),
	(3, 3, 'App\\Models\\Document', 1, 'web', 'Document', 'CREATED', NULL, '{"id": 3, "created_at": "2025-10-20 02:32:18", "updated_at": "2025-10-20 02:32:18", "document_name": "assd", "document_path": "/storage/documents/Pcwf5dyXLImGmk6mfm2Mmjth28kBEuO4cqU98aTJ.pdf", "total_download": 0}', '127.0.0.1', '2025-10-19 19:32:18', '2025-10-19 19:32:18'),
	(4, 1, 'App\\Models\\Document', 1, 'api', 'Document', 'DELETED', '{"id": 1, "created_at": "2025-10-20T02:30:46.000000Z", "deleted_at": "2025-10-20T03:35:02.000000Z", "updated_at": "2025-10-20T03:35:02.000000Z", "document_name": "asd", "document_path": "/storage/documents/kifPGoukBZXydoro7wbGOKeMTOvpJioEKxKoQnwQ.pdf", "total_download": 0}', NULL, '127.0.0.1', '2025-10-19 20:35:02', '2025-10-19 20:35:02'),
	(5, 3, 'App\\Models\\Document', 1, 'api', 'Document', 'DELETED', '{"id": 3, "created_at": "2025-10-20T02:32:18.000000Z", "deleted_at": "2025-10-20T03:35:22.000000Z", "updated_at": "2025-10-20T03:35:22.000000Z", "document_name": "assd", "document_path": "/storage/documents/Pcwf5dyXLImGmk6mfm2Mmjth28kBEuO4cqU98aTJ.pdf", "total_download": 2}', NULL, '127.0.0.1', '2025-10-19 20:35:22', '2025-10-19 20:35:22'),
	(6, 2, 'App\\Models\\Document', 1, 'api', 'Document', 'DELETED', '{"id": 2, "created_at": "2025-10-20T02:30:57.000000Z", "deleted_at": "2025-10-20T03:35:35.000000Z", "updated_at": "2025-10-20T03:35:35.000000Z", "document_name": "asd", "document_path": "/storage/documents/G8XKkCPpsVuINaOzIfHGm6UnSOEfQFgde5uISROB.pdf", "total_download": 1}', NULL, '127.0.0.1', '2025-10-19 20:35:35', '2025-10-19 20:35:35'),
	(7, 4, 'App\\Models\\Document', 1, 'web', 'Document', 'CREATED', NULL, '{"id": 4, "created_at": "2025-10-20 03:43:51", "updated_at": "2025-10-20 03:43:51", "document_name": "asd", "document_path": "/storage/documents/oE0lG8Gnippm9cresNB8q6Cg8wUfSkEmV7JhvFbP.pdf", "total_download": 0}', '127.0.0.1', '2025-10-19 20:43:51', '2025-10-19 20:43:51'),
	(8, 5, 'App\\Models\\Document', 1, 'web', 'Document', 'CREATED', NULL, '{"id": 5, "created_at": "2025-10-20 03:44:06", "updated_at": "2025-10-20 03:44:06", "document_name": "qwe", "document_path": "/storage/documents/e02xp2z50Vvjk0uT9yxmn1nprwSJqFidhwORMDfB.docx", "total_download": 0}', '127.0.0.1', '2025-10-19 20:44:06', '2025-10-19 20:44:06'),
	(9, 6, 'App\\Models\\Document', 1, 'web', 'Document', 'CREATED', NULL, '{"id": 6, "created_at": "2025-10-20 03:45:25", "updated_at": "2025-10-20 03:45:25", "document_name": "Desain Dashboard", "document_path": "/storage/documents/dgnoR2HcBKYHyNzTKw3ueZnMYfRLV0Pdnogxldsg.pdf", "total_download": 0}', '127.0.0.1', '2025-10-19 20:45:25', '2025-10-19 20:45:25'),
	(10, 7, 'App\\Models\\Document', 1, 'web', 'Document', 'CREATED', NULL, '{"id": 7, "created_at": "2025-10-20 03:45:56", "updated_at": "2025-10-20 03:45:56", "document_name": "sdasdasdzxczx", "document_path": "/storage/documents/iTRYVvHUZB0RkiRKUtlkZj9QHZoHODyKIRY6krzo.pdf", "total_download": 0}', '127.0.0.1', '2025-10-19 20:45:56', '2025-10-19 20:45:56'),
	(11, 8, 'App\\Models\\Document', 1, 'web', 'Document', 'CREATED', NULL, '{"id": 8, "created_at": "2025-10-20 03:56:13", "updated_at": "2025-10-20 03:56:13", "document_name": "asd", "document_path": "/storage/documents/1760932573_Sertifikat Kmampuan Teknis dan Keahlian_compressed.pdf", "total_download": 0}', '127.0.0.1', '2025-10-19 20:56:13', '2025-10-19 20:56:13'),
	(12, 9, 'App\\Models\\Document', 1, 'web', 'Document', 'CREATED', NULL, '{"id": 9, "created_at": "2025-10-20 03:58:40", "updated_at": "2025-10-20 03:58:40", "document_name": "test", "document_path": "/storage/documents/1760932720_Surat Keterangan Lulus.pdf", "total_download": 0}', '127.0.0.1', '2025-10-19 20:58:40', '2025-10-19 20:58:40'),
	(13, 10, 'App\\Models\\Document', 1, 'web', 'Document', 'CREATED', NULL, '{"id": 10, "created_at": "2025-10-20 04:02:19", "updated_at": "2025-10-20 04:02:19", "document_name": "asdzzxczxczxcxz", "document_path": "/storage/documents/1760932939_Surat Pernyataan Staff Lab.pdf", "total_download": 0}', '127.0.0.1', '2025-10-19 21:02:19', '2025-10-19 21:02:19'),
	(14, 10, 'App\\Models\\Document', 1, 'api', 'Document', 'UPDATED', '{"id": 10, "created_at": "2025-10-20T04:02:19.000000Z", "deleted_at": null, "updated_at": "2025-10-20T04:02:33.000000Z", "document_name": "asdzzxczxczxcxz", "document_path": "/storage/documents/1760932939_Surat Pernyataan Staff Lab.pdf", "total_download": 1}', '{"updated_at": "2025-10-20 04:12:23", "document_name": "ini update", "document_path": "/storage/documents/1760933543_Sertifikat Kmampuan Teknis dan Keahlian_compressed_compressed.pdf"}', '127.0.0.1', '2025-10-19 21:12:23', '2025-10-19 21:12:23'),
	(15, 4, 'App\\Models\\Document', 1, 'api', 'Document', 'DELETED', '{"id": 4, "created_at": "2025-10-20T03:43:51.000000Z", "deleted_at": "2025-10-20T04:27:42.000000Z", "updated_at": "2025-10-20T04:27:42.000000Z", "document_name": "asd", "document_path": "/storage/documents/oE0lG8Gnippm9cresNB8q6Cg8wUfSkEmV7JhvFbP.pdf", "total_download": 0}', NULL, '127.0.0.1', '2025-10-19 21:27:42', '2025-10-19 21:27:42'),
	(16, 1, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 1, "key": "site_heading", "value": "qwqwe", "created_at": "2025-10-20 08:30:23", "updated_at": "2025-10-20 08:30:23"}', '127.0.0.1', '2025-10-20 01:30:23', '2025-10-20 01:30:23'),
	(17, 2, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 2, "key": "helpdesk", "value": "asd", "created_at": "2025-10-20 08:30:23", "updated_at": "2025-10-20 08:30:23"}', '127.0.0.1', '2025-10-20 01:30:23', '2025-10-20 01:30:23'),
	(18, 3, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 3, "key": "call_center", "value": "asd", "created_at": "2025-10-20 08:30:23", "updated_at": "2025-10-20 08:30:23"}', '127.0.0.1', '2025-10-20 01:30:23', '2025-10-20 01:30:23'),
	(19, 1, 'App\\Models\\Identity', 1, 'api', 'Identity', 'UPDATED', '{"id": 1, "key": "site_heading", "value": "qwqwe", "created_at": "2025-10-20T08:30:23.000000Z", "deleted_at": null, "updated_at": "2025-10-20T08:30:23.000000Z"}', '{"value": "test ulang", "updated_at": "2025-10-20 08:30:50"}', '127.0.0.1', '2025-10-20 01:30:50', '2025-10-20 01:30:50'),
	(20, 2, 'App\\Models\\Identity', 1, 'api', 'Identity', 'UPDATED', '{"id": 2, "key": "helpdesk", "value": "asd", "created_at": "2025-10-20T08:30:23.000000Z", "deleted_at": null, "updated_at": "2025-10-20T08:30:23.000000Z"}', '{"value": "test ulang 1", "updated_at": "2025-10-20 08:30:50"}', '127.0.0.1', '2025-10-20 01:30:50', '2025-10-20 01:30:50'),
	(21, 3, 'App\\Models\\Identity', 1, 'api', 'Identity', 'UPDATED', '{"id": 3, "key": "call_center", "value": "asd", "created_at": "2025-10-20T08:30:23.000000Z", "deleted_at": null, "updated_at": "2025-10-20T08:30:23.000000Z"}', '{"value": "test ulang 2", "updated_at": "2025-10-20 08:30:50"}', '127.0.0.1', '2025-10-20 01:30:50', '2025-10-20 01:30:50'),
	(22, 4, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 4, "key": "site_logo", "value": "/storage/logo/iv5gZpeVy7a8Ee4MR8HB8nb1ntRS7K2JQI8kBM8y.png", "created_at": "2025-10-20 08:31:22", "updated_at": "2025-10-20 08:31:22"}', '127.0.0.1', '2025-10-20 01:31:22', '2025-10-20 01:31:22'),
	(23, 5, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 5, "key": "site_favicon", "value": "/storage/favicon/2Q5LB4SAcoRuQ94nBaUNQVvpFMXLZW0KW6lXZtIG.png", "created_at": "2025-10-20 08:31:22", "updated_at": "2025-10-20 08:31:22"}', '127.0.0.1', '2025-10-20 01:31:22', '2025-10-20 01:31:22'),
	(24, 4, 'App\\Models\\Identity', 1, 'api', 'Identity', 'UPDATED', '{"id": 4, "key": "site_logo", "value": "/storage/logo/iv5gZpeVy7a8Ee4MR8HB8nb1ntRS7K2JQI8kBM8y.png", "created_at": "2025-10-20T08:31:22.000000Z", "deleted_at": null, "updated_at": "2025-10-20T08:31:22.000000Z"}', '{"value": "/storage/logo/UZbUNIuHyEEZwHmPt19HJxjh7oItbPPI71IC0BFd.png", "updated_at": "2025-10-20 08:31:32"}', '127.0.0.1', '2025-10-20 01:31:32', '2025-10-20 01:31:32'),
	(25, 4, 'App\\Models\\Identity', 1, 'api', 'Identity', 'UPDATED', '{"id": 4, "key": "site_logo", "value": "/storage/logo/UZbUNIuHyEEZwHmPt19HJxjh7oItbPPI71IC0BFd.png", "created_at": "2025-10-20T08:31:22.000000Z", "deleted_at": null, "updated_at": "2025-10-20T08:31:32.000000Z"}', '{"value": "/storage/logo/aBga0oYtrGKo5Grb9ifGWjo495m7eeQWavyKoXxL.png", "updated_at": "2025-10-20 08:31:42"}', '127.0.0.1', '2025-10-20 01:31:42', '2025-10-20 01:31:42'),
	(26, 6, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 6, "key": "site_logo_dark", "value": "/storage/logo/ZAvInZFXc2N1Dn4aY8qq3s8rLcMXXFDH3OhMc3h8.png", "created_at": "2025-10-21 08:34:53", "updated_at": "2025-10-21 08:34:53"}', '127.0.0.1', '2025-10-21 01:34:53', '2025-10-21 01:34:53'),
	(27, 1, 'App\\Models\\Identity', 1, 'api', 'Identity', 'UPDATED', '{"id": 1, "key": "site_heading", "value": "test ulang", "created_at": "2025-10-20T08:30:23.000000Z", "deleted_at": null, "updated_at": "2025-10-20T08:30:50.000000Z"}', '{"value": "Dashboard Pendapatan Daerah", "updated_at": "2025-10-22 08:26:35"}', '127.0.0.1', '2025-10-22 01:26:35', '2025-10-22 01:26:35'),
	(28, 2, 'App\\Models\\Identity', 1, 'api', 'Identity', 'UPDATED', '{"id": 2, "key": "helpdesk", "value": "test ulang 1", "created_at": "2025-10-20T08:30:23.000000Z", "deleted_at": null, "updated_at": "2025-10-20T08:30:50.000000Z"}', '{"value": "bapenda@katingankab.go.id", "updated_at": "2025-10-22 08:26:35"}', '127.0.0.1', '2025-10-22 01:26:35', '2025-10-22 01:26:35'),
	(29, 3, 'App\\Models\\Identity', 1, 'api', 'Identity', 'UPDATED', '{"id": 3, "key": "call_center", "value": "test ulang 2", "created_at": "2025-10-20T08:30:23.000000Z", "deleted_at": null, "updated_at": "2025-10-20T08:30:50.000000Z"}', '{"value": "0811-5090-5559", "updated_at": "2025-10-22 08:26:35"}', '127.0.0.1', '2025-10-22 01:26:35', '2025-10-22 01:26:35'),
	(30, 10, 'App\\Models\\Document', 1, 'api', 'Document', 'UPDATED', '{"id": 10, "created_at": "2025-10-20T04:02:19.000000Z", "deleted_at": null, "updated_at": "2025-10-23T08:57:27.000000Z", "document_name": "ini update", "document_path": "/storage/documents/1760933543_Sertifikat Kmampuan Teknis dan Keahlian_compressed_compressed.pdf", "total_download": 4}', '{"updated_at": "2025-10-27 02:57:37", "document_path": "/storage/documents/1761533857_Surat Pernyataan Staff Lab.pdf"}', '127.0.0.1', '2025-10-26 19:57:37', '2025-10-26 19:57:37'),
	(31, 11, 'App\\Models\\Document', 1, 'web', 'Document', 'CREATED', NULL, '{"id": 11, "created_at": "2025-10-27 03:01:26", "updated_at": "2025-10-27 03:01:26", "document_name": "qwezxc", "document_path": "/storage/documents/1761534086_Surat Pernyataan Staff Lab.pdf", "total_download": 0}', '127.0.0.1', '2025-10-26 20:01:26', '2025-10-26 20:01:26'),
	(32, 12, 'App\\Models\\Document', 1, 'web', 'Document', 'CREATED', NULL, '{"id": 12, "created_at": "2025-10-31 01:12:22", "updated_at": "2025-10-31 01:12:22", "document_name": "zzxcv", "document_path": "/storage/documents/1761873142_Surat Lamaran Un-Stamp.pdf", "total_download": 0}', '127.0.0.1', '2025-10-30 18:12:22', '2025-10-30 18:12:22'),
	(33, 12, 'App\\Models\\Document', 1, 'api', 'Document', 'DELETED', '{"id": 12, "created_at": "2025-10-31T01:12:22.000000Z", "deleted_at": "2025-10-31T01:12:42.000000Z", "updated_at": "2025-10-31T01:12:42.000000Z", "document_name": "zzxcv", "document_path": "/storage/documents/1761873142_Surat Lamaran Un-Stamp.pdf", "total_download": 0}', NULL, '127.0.0.1', '2025-10-30 18:12:42', '2025-10-30 18:12:42'),
	(34, 1, 'App\\Models\\ManualRealisasi', 1, 'web', 'Manual Realisasi', 'CREATED', NULL, '{"id": 1, "kode": 2, "tahun": 2025, "realisasi": 500000, "created_at": "2025-11-21 06:43:46", "updated_at": "2025-11-21 06:43:46"}', '127.0.0.1', '2025-11-20 23:43:46', '2025-11-20 23:43:46'),
	(35, 2, 'App\\Models\\ManualRealisasi', 1, 'web', 'Manual Realisasi', 'CREATED', NULL, '{"id": 2, "kode": 3, "tahun": 2025, "realisasi": 100000000000, "created_at": "2025-11-21 06:44:06", "updated_at": "2025-11-21 06:44:06"}', '127.0.0.1', '2025-11-20 23:44:06', '2025-11-20 23:44:06'),
	(36, 1, 'App\\Models\\ManualRealisasi', 1, 'web', 'Manual Realisasi', 'UPDATED', '{"id": 1, "kode": 2, "tahun": 2025, "realisasi": "500000.00", "created_at": "2025-11-21T06:43:46.000000Z", "deleted_at": null, "updated_at": "2025-11-21T06:43:46.000000Z"}', '{"realisasi": 1206354454000, "updated_at": "2025-11-21 06:44:52"}', '127.0.0.1', '2025-11-20 23:44:52', '2025-11-20 23:44:52'),
	(37, 2, 'App\\Models\\ManualRealisasi', 1, 'web', 'Manual Realisasi', 'UPDATED', '{"id": 2, "kode": 3, "tahun": 2025, "realisasi": "100000000000.00", "created_at": "2025-11-21T06:44:06.000000Z", "deleted_at": null, "updated_at": "2025-11-21T06:44:06.000000Z"}', '{"realisasi": 40000000, "updated_at": "2025-11-21 06:45:15"}', '127.0.0.1', '2025-11-20 23:45:15', '2025-11-20 23:45:15'),
	(38, 2, 'App\\Models\\ManualRealisasi', 1, 'web', 'Manual Realisasi', 'UPDATED', '{"id": 2, "kode": 3, "tahun": 2025, "realisasi": "40000000.00", "created_at": "2025-11-21T06:44:06.000000Z", "deleted_at": null, "updated_at": "2025-11-21T06:45:15.000000Z"}', '{"realisasi": 100000000, "updated_at": "2025-11-21 06:51:51"}', '127.0.0.1', '2025-11-20 23:51:51', '2025-11-20 23:51:51'),
	(39, 1, 'App\\Models\\ManualRealisasi', 1, 'web', 'Manual Realisasi', 'UPDATED', '{"id": 1, "kode": 2, "tahun": 2025, "realisasi": "1206354454000.00", "created_at": "2025-11-21T06:43:46.000000Z", "deleted_at": null, "updated_at": "2025-11-21T06:44:52.000000Z"}', '{"realisasi": 6608389755, "updated_at": "2025-11-21 07:06:25"}', '127.0.0.1', '2025-11-21 00:06:25', '2025-11-21 00:06:25'),
	(40, 2, 'App\\Models\\ManualRealisasi', 1, 'web', 'Manual Realisasi', 'UPDATED', '{"id": 2, "kode": 3, "tahun": 2025, "realisasi": "100000000.00", "created_at": "2025-11-21T06:44:06.000000Z", "deleted_at": null, "updated_at": "2025-11-21T06:51:51.000000Z"}', '{"realisasi": 40000000, "updated_at": "2025-11-21 07:10:52"}', '127.0.0.1', '2025-11-21 00:10:52', '2025-11-21 00:10:52'),
	(41, 13, 'App\\Models\\Document', 1, 'web', 'Document', 'CREATED', NULL, '{"id": 13, "created_at": "2025-11-27 02:54:47", "updated_at": "2025-11-27 02:54:47", "document_name": "jmmn", "document_path": "/storage/documents/1764212086_CamScanner 03-10-2025 10.40.pdf", "total_download": 0}', '127.0.0.1', '2025-11-26 19:54:47', '2025-11-26 19:54:47'),
	(42, 13, 'App\\Models\\Document', 1, 'api', 'Document', 'UPDATED', '{"id": 13, "created_at": "2025-11-27T02:54:47.000000Z", "deleted_at": null, "updated_at": "2025-11-27T02:54:47.000000Z", "document_name": "jmmn", "document_path": "/storage/documents/1764212086_CamScanner 03-10-2025 10.40.pdf", "total_download": 0}', '{"updated_at": "2025-11-27 02:55:16", "document_path": "/storage/documents/1764212116_Data_Kegiatan.xlsx"}', '127.0.0.1', '2025-11-26 19:55:16', '2025-11-26 19:55:16'),
	(43, 13, 'App\\Models\\Document', 1, 'api', 'Document', 'DELETED', '{"id": 13, "created_at": "2025-11-27T02:54:47.000000Z", "deleted_at": "2025-11-27T02:55:45.000000Z", "updated_at": "2025-11-27T02:55:45.000000Z", "document_name": "jmmn", "document_path": "/storage/documents/1764212116_Data_Kegiatan.xlsx", "total_download": 0}', NULL, '127.0.0.1', '2025-11-26 19:55:45', '2025-11-26 19:55:45'),
	(44, 11, 'App\\Models\\Document', 1, 'api', 'Document', 'UPDATED', '{"id": 11, "display": 0, "created_at": "2025-10-27T03:01:26.000000Z", "deleted_at": null, "updated_at": "2025-11-24T17:06:06.000000Z", "document_name": "qwezxc", "document_path": "/storage/documents/1761534086_Surat Pernyataan Staff Lab.pdf", "total_download": 17}', '{"display": true, "updated_at": "2025-11-27 08:59:43"}', '127.0.0.1', '2025-11-27 01:59:43', '2025-11-27 01:59:43'),
	(45, 11, 'App\\Models\\Document', 1, 'api', 'Document', 'UPDATED', '{"id": 11, "display": 1, "created_at": "2025-10-27T03:01:26.000000Z", "deleted_at": null, "updated_at": "2025-11-27T08:59:43.000000Z", "document_name": "qwezxc", "document_path": "/storage/documents/1761534086_Surat Pernyataan Staff Lab.pdf", "total_download": 17}', '{"display": true, "updated_at": "2025-11-27 08:59:59"}', '127.0.0.1', '2025-11-27 01:59:59', '2025-11-27 01:59:59'),
	(46, 11, 'App\\Models\\Document', 1, 'api', 'Document', 'UPDATED', '{"id": 11, "display": 1, "created_at": "2025-10-27T03:01:26.000000Z", "deleted_at": null, "updated_at": "2025-11-27T08:59:59.000000Z", "document_name": "qwezxc", "document_path": "/storage/documents/1761534086_Surat Pernyataan Staff Lab.pdf", "total_download": 17}', '{"display": true, "updated_at": "2025-11-27 09:01:14"}', '127.0.0.1', '2025-11-27 02:01:14', '2025-11-27 02:01:14'),
	(47, 10, 'App\\Models\\Document', 1, 'api', 'Document', 'UPDATED', '{"id": 10, "display": 0, "created_at": "2025-10-20T04:02:19.000000Z", "deleted_at": null, "updated_at": "2025-11-24T16:58:03.000000Z", "document_name": "ini update", "document_path": "/storage/documents/1761533857_Surat Pernyataan Staff Lab.pdf", "total_download": 6}', '{"display": true, "updated_at": "2025-11-27 09:04:50"}', '127.0.0.1', '2025-11-27 02:04:50', '2025-11-27 02:04:50'),
	(48, 6, 'App\\Models\\Document', 1, 'api', 'Document', 'UPDATED', '{"id": 6, "display": 0, "created_at": "2025-10-20T03:45:25.000000Z", "deleted_at": null, "updated_at": "2025-11-27T02:50:16.000000Z", "document_name": "Desain Dashboard", "document_path": "/storage/documents/dgnoR2HcBKYHyNzTKw3ueZnMYfRLV0Pdnogxldsg.pdf", "total_download": 5}', '{"display": true, "updated_at": "2025-11-27 09:05:09"}', '127.0.0.1', '2025-11-27 02:05:09', '2025-11-27 02:05:09'),
	(49, 14, 'App\\Models\\Document', 1, 'web', 'Document', 'CREATED', NULL, '{"id": 14, "created_at": "2025-11-27 09:08:13", "updated_at": "2025-11-27 09:08:13", "document_name": "Test Display", "document_path": "/storage/documents/1764234493_Daftar_Lulusan_1762345968585.pdf", "total_download": 0}', '127.0.0.1', '2025-11-27 02:08:13', '2025-11-27 02:08:13'),
	(50, 14, 'App\\Models\\Document', 1, 'api', 'Document', 'DELETED', '{"id": 14, "display": 0, "created_at": "2025-11-27T09:08:13.000000Z", "deleted_at": "2025-11-27T09:10:51.000000Z", "updated_at": "2025-11-27T09:10:51.000000Z", "document_name": "Test Display", "document_path": "/storage/documents/1764234493_Daftar_Lulusan_1762345968585.pdf", "total_download": 0}', NULL, '127.0.0.1', '2025-11-27 02:10:51', '2025-11-27 02:10:51'),
	(51, 15, 'App\\Models\\Document', 1, 'web', 'Document', 'CREATED', NULL, '{"id": 15, "created_at": "2025-11-27 09:11:06", "updated_at": "2025-11-27 09:11:06", "document_name": "Test Display", "document_path": "/storage/documents/1764234666_Struktur Organisasi 2025.xlsx", "total_download": 0}', '127.0.0.1', '2025-11-27 02:11:06', '2025-11-27 02:11:06');

-- Dumping data for table dashboard-pendapatan-daerah.cache: ~5 rows (approximately)
REPLACE INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel-cache-rekap_pendapatan_2024', 'a:3:{s:3:"PAD";a:3:{s:6:"target";d:84146616266;s:9:"realisasi";d:6613639754.8;s:7:"details";a:4:{i:0;a:4:{s:4:"name";s:14:"- Pajak Daerah";s:6:"target";d:51920000000;s:9:"realisasi";d:6506539716.8;s:10:"percentage";d:12.53;}i:1;a:4:{s:4:"name";s:18:"- Retribusi Daerah";s:6:"target";d:7567880558;s:9:"realisasi";d:106421000;s:10:"percentage";d:1.41;}i:2;a:4:{s:4:"name";s:51:"- Hasil Pengelolaan Kekayaan Daerah yang Dipisahkan";s:6:"target";d:3500000000;s:9:"realisasi";d:0;s:10:"percentage";d:0;}i:3;a:4:{s:4:"name";s:24:"- Lain-lain PAD yang Sah";s:6:"target";d:21158735708;s:9:"realisasi";d:679038;s:10:"percentage";d:0;}}}s:8:"Transfer";a:3:{s:6:"target";d:1306354454000;s:9:"realisasi";d:0;s:7:"details";a:2:{i:0;a:4:{s:4:"name";s:38:"- Pendapatan Transfer Pemerintah Pusat";s:6:"target";d:1262787854000;s:9:"realisasi";d:0;s:10:"percentage";d:0;}i:1;a:4:{s:4:"name";s:34:"- Pendapatan Transfer Antar Daerah";s:6:"target";d:43566600000;s:9:"realisasi";d:0;s:10:"percentage";d:0;}}}s:9:"Lain-lain";a:3:{s:6:"target";d:50000000;s:9:"realisasi";d:0;s:7:"details";a:1:{i:0;a:4:{s:4:"name";s:18:"- Pendapatan Hibah";s:6:"target";d:50000000;s:9:"realisasi";d:0;s:10:"percentage";d:0;}}}}', 1763808175),
	('laravel-cache-rekap_pendapatan_2025', 'a:3:{s:3:"PAD";a:3:{s:6:"target";d:84146616266;s:9:"realisasi";d:6613639754.8;s:7:"details";a:4:{i:0;a:4:{s:4:"name";s:14:"- Pajak Daerah";s:6:"target";d:51920000000;s:9:"realisasi";d:6506539716.8;s:10:"percentage";d:12.53;}i:1;a:4:{s:4:"name";s:18:"- Retribusi Daerah";s:6:"target";d:7567880558;s:9:"realisasi";d:106421000;s:10:"percentage";d:1.41;}i:2;a:4:{s:4:"name";s:51:"- Hasil Pengelolaan Kekayaan Daerah yang Dipisahkan";s:6:"target";d:3500000000;s:9:"realisasi";d:0;s:10:"percentage";d:0;}i:3;a:4:{s:4:"name";s:24:"- Lain-lain PAD yang Sah";s:6:"target";d:21158735708;s:9:"realisasi";d:679038;s:10:"percentage";d:0;}}}s:8:"Transfer";a:3:{s:6:"target";d:1306354454000;s:9:"realisasi";d:0;s:7:"details";a:2:{i:0;a:4:{s:4:"name";s:38:"- Pendapatan Transfer Pemerintah Pusat";s:6:"target";d:1262787854000;s:9:"realisasi";d:0;s:10:"percentage";d:0;}i:1;a:4:{s:4:"name";s:34:"- Pendapatan Transfer Antar Daerah";s:6:"target";d:43566600000;s:9:"realisasi";d:0;s:10:"percentage";d:0;}}}s:9:"Lain-lain";a:3:{s:6:"target";d:50000000;s:9:"realisasi";d:0;s:7:"details";a:1:{i:0;a:4:{s:4:"name";s:18:"- Pendapatan Hibah";s:6:"target";d:50000000;s:9:"realisasi";d:0;s:10:"percentage";d:0;}}}}', 1763808201),
	('laravel-cache-rekap_pendapatan_daerah_2025', 'a:10:{i:0;a:7:{s:12:"kodekelompok";i:1;s:9:"kodejenis";N;s:4:"urai";s:9:"PAD      ";s:6:"target";i:84146616266;s:9:"realisasi";d:6613639754.8;s:10:"persentase";d:7.859662156697185;s:5:"tahun";i:2025;}i:1;a:7:{s:12:"kodekelompok";i:1;s:9:"kodejenis";i:1;s:4:"urai";s:12:"Pajak Daerah";s:6:"target";i:51920000000;s:9:"realisasi";d:6506539716.8;s:10:"persentase";d:12.531856157164869;s:5:"tahun";i:2025;}i:2;a:7:{s:12:"kodekelompok";i:1;s:9:"kodejenis";i:2;s:4:"urai";s:16:"Retribusi Daerah";s:6:"target";i:7567880558;s:9:"realisasi";i:106421000;s:10:"persentase";d:1.4062193395415372;s:5:"tahun";i:2025;}i:3;a:7:{s:12:"kodekelompok";i:1;s:9:"kodejenis";i:3;s:4:"urai";s:49:"Hasil Pengelolaan Kekayaan Daerah yang Dipisahkan";s:6:"target";i:3500000000;s:9:"realisasi";i:0;s:10:"persentase";i:0;s:5:"tahun";i:2025;}i:4;a:7:{s:12:"kodekelompok";i:1;s:9:"kodejenis";i:4;s:4:"urai";s:22:"Lain-lain PAD yang Sah";s:6:"target";i:21158735708;s:9:"realisasi";i:679038;s:10:"persentase";d:0.0032092560225290756;s:5:"tahun";i:2025;}i:5;a:7:{s:12:"kodekelompok";i:2;s:9:"kodejenis";N;s:4:"urai";s:9:"Transfer ";s:6:"target";i:1306354454000;s:9:"realisasi";i:0;s:10:"persentase";i:0;s:5:"tahun";i:2025;}i:6;a:7:{s:12:"kodekelompok";i:2;s:9:"kodejenis";i:1;s:4:"urai";s:36:"Pendapatan Transfer Pemerintah Pusat";s:6:"target";i:1262787854000;s:9:"realisasi";i:0;s:10:"persentase";i:0;s:5:"tahun";i:2025;}i:7;a:7:{s:12:"kodekelompok";i:2;s:9:"kodejenis";i:2;s:4:"urai";s:32:"Pendapatan Transfer Antar Daerah";s:6:"target";i:43566600000;s:9:"realisasi";i:0;s:10:"persentase";i:0;s:5:"tahun";i:2025;}i:8;a:7:{s:12:"kodekelompok";i:3;s:9:"kodejenis";N;s:4:"urai";s:9:"Lain-lain";s:6:"target";i:50000000;s:9:"realisasi";i:0;s:10:"persentase";i:0;s:5:"tahun";i:2025;}i:9;a:7:{s:12:"kodekelompok";i:3;s:9:"kodejenis";i:1;s:4:"urai";s:16:"Pendapatan Hibah";s:6:"target";i:50000000;s:9:"realisasi";i:0;s:10:"persentase";i:0;s:5:"tahun";i:2025;}}', 1763806687),
	('laravel-cache-total_unique_visitors', 'i:1;', 1764374400),
	('laravel-cache-visitor_f528764d624db129b32c21fbca0cb8d6', 'b:1;', 1764374400);

-- Dumping data for table dashboard-pendapatan-daerah.cache_locks: ~0 rows (approximately)

-- Dumping data for table dashboard-pendapatan-daerah.document: ~15 rows (approximately)
REPLACE INTO `document` (`id`, `document_name`, `document_path`, `total_download`, `display`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'asd', '/storage/documents/kifPGoukBZXydoro7wbGOKeMTOvpJioEKxKoQnwQ.pdf', 0, 0, '2025-10-19 19:30:46', '2025-10-19 20:35:02', '2025-10-19 20:35:02'),
	(2, 'asd', '/storage/documents/G8XKkCPpsVuINaOzIfHGm6UnSOEfQFgde5uISROB.pdf', 1, 0, '2025-10-19 19:30:57', '2025-10-19 20:35:35', '2025-10-19 20:35:35'),
	(3, 'assd', '/storage/documents/Pcwf5dyXLImGmk6mfm2Mmjth28kBEuO4cqU98aTJ.pdf', 2, 0, '2025-10-19 19:32:18', '2025-10-19 20:35:22', '2025-10-19 20:35:22'),
	(4, 'asd', '/storage/documents/oE0lG8Gnippm9cresNB8q6Cg8wUfSkEmV7JhvFbP.pdf', 0, 0, '2025-10-19 20:43:51', '2025-10-19 21:27:42', '2025-10-19 21:27:42'),
	(5, 'qwe', '/storage/documents/e02xp2z50Vvjk0uT9yxmn1nprwSJqFidhwORMDfB.docx', 1, 0, '2025-10-19 20:44:06', '2025-10-19 20:44:12', NULL),
	(6, 'Desain Dashboard', '/storage/documents/dgnoR2HcBKYHyNzTKw3ueZnMYfRLV0Pdnogxldsg.pdf', 5, 1, '2025-10-19 20:45:25', '2025-11-27 02:05:09', NULL),
	(7, 'sdasdasdzxczx', '/storage/documents/iTRYVvHUZB0RkiRKUtlkZj9QHZoHODyKIRY6krzo.pdf', 1, 0, '2025-10-19 20:45:56', '2025-10-19 21:02:28', NULL),
	(8, 'asd', '/storage/documents/1760932573_Sertifikat Kmampuan Teknis dan Keahlian_compressed.pdf', 3, 0, '2025-10-19 20:56:13', '2025-10-23 01:50:14', NULL),
	(9, 'test', '/storage/documents/1760932720_Surat Keterangan Lulus.pdf', 2, 0, '2025-10-19 20:58:40', '2025-11-24 09:58:05', NULL),
	(10, 'ini update', '/storage/documents/1761533857_Surat Pernyataan Staff Lab.pdf', 6, 1, '2025-10-19 21:02:19', '2025-11-27 02:04:50', NULL),
	(11, 'qwezxc', '/storage/documents/1761534086_Surat Pernyataan Staff Lab.pdf', 17, 1, '2025-10-26 20:01:26', '2025-11-27 02:01:14', NULL),
	(12, 'zzxcv', '/storage/documents/1761873142_Surat Lamaran Un-Stamp.pdf', 0, 0, '2025-10-30 18:12:22', '2025-10-30 18:12:42', '2025-10-30 18:12:42'),
	(13, 'jmmn', '/storage/documents/1764212116_Data_Kegiatan.xlsx', 0, 0, '2025-11-26 19:54:47', '2025-11-26 19:55:45', '2025-11-26 19:55:45'),
	(14, 'Test Display', '/storage/documents/1764234493_Daftar_Lulusan_1762345968585.pdf', 0, 0, '2025-11-27 02:08:13', '2025-11-27 02:10:51', '2025-11-27 02:10:51'),
	(15, 'Test Display', '/storage/documents/1764234666_Struktur Organisasi 2025.xlsx', 1, 1, '2025-11-27 02:11:06', '2025-11-27 02:11:41', NULL);

-- Dumping data for table dashboard-pendapatan-daerah.failed_jobs: ~0 rows (approximately)

-- Dumping data for table dashboard-pendapatan-daerah.identity: ~6 rows (approximately)
REPLACE INTO `identity` (`id`, `key`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'site_heading', 'Dashboard Pendapatan Daerah', '2025-10-20 01:30:23', '2025-10-22 01:26:35', NULL),
	(2, 'helpdesk', 'bapenda@katingankab.go.id', '2025-10-20 01:30:23', '2025-10-22 01:26:35', NULL),
	(3, 'call_center', '0811-5090-5559', '2025-10-20 01:30:23', '2025-10-22 01:26:35', NULL),
	(4, 'site_logo', '/storage/logo/aBga0oYtrGKo5Grb9ifGWjo495m7eeQWavyKoXxL.png', '2025-10-20 01:31:22', '2025-10-20 01:31:42', NULL),
	(5, 'site_favicon', '/storage/favicon/2Q5LB4SAcoRuQ94nBaUNQVvpFMXLZW0KW6lXZtIG.png', '2025-10-20 01:31:22', '2025-10-20 01:31:22', NULL),
	(6, 'site_logo_dark', '/storage/logo/ZAvInZFXc2N1Dn4aY8qq3s8rLcMXXFDH3OhMc3h8.png', '2025-10-21 01:34:53', '2025-10-21 01:34:53', NULL);

-- Dumping data for table dashboard-pendapatan-daerah.jobs: ~0 rows (approximately)

-- Dumping data for table dashboard-pendapatan-daerah.job_batches: ~0 rows (approximately)

-- Dumping data for table dashboard-pendapatan-daerah.migrations: ~15 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_10_15_080153_create_oauth_auth_codes_table', 2),
	(5, '2025_10_15_080154_create_oauth_access_tokens_table', 2),
	(6, '2025_10_15_080155_create_oauth_refresh_tokens_table', 2),
	(7, '2025_10_15_080156_create_oauth_clients_table', 2),
	(8, '2025_10_15_080157_create_oauth_device_codes_table', 2),
	(9, '2025_10_15_080250_create_permission_tables', 3),
	(10, '2025_10_16_022528_create_document_table', 4),
	(11, '2025_10_16_034231_create_app_logs_table', 5),
	(12, '2025_10_20_075939_create_identity_table', 6),
	(14, '2025_11_21_061523_create_manual_realisasi_table', 7),
	(15, '2025_11_24_154128_create_unique_visitors_table', 8),
	(16, '2025_11_27_085603_add_display_to_documents_table', 9);

-- Dumping data for table dashboard-pendapatan-daerah.model_has_permissions: ~0 rows (approximately)

-- Dumping data for table dashboard-pendapatan-daerah.model_has_roles: ~2 rows (approximately)
REPLACE INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(2, 'App\\Models\\User', 1),
	(1, 'App\\Models\\User', 2);

-- Dumping data for table dashboard-pendapatan-daerah.oauth_access_tokens: ~25 rows (approximately)
REPLACE INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('0541caa4ee633f68423c0f9136930453fd21eb72a02061465fd2f4ee28075b8de86f34340c9ed385', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-30 18:11:24', '2025-10-30 18:11:24', '2026-10-31 01:11:24'),
	('0b84b7a8c81cf15591b7a6ac06d2bd74bfe8c9854d44efdb7c9af822d65db74d1518452540dda0aa', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-16 06:56:05', '2025-10-16 06:56:05', '2026-10-16 13:56:05'),
	('1e470159a1104b88d91a17fcf6f019c38e0aeac1d851c50c63d8618fc1a53a90956185300033ba34', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-15 19:58:46', '2025-10-15 19:58:46', '2026-10-16 02:58:46'),
	('225372418c0958e68f0266784ec384a8e19f6f1ad36795219f2128e18461bcac3c6708d6a466a327', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-11-26 19:52:49', '2025-11-26 19:52:49', '2026-11-27 02:52:49'),
	('2ea623fe1a7d452504a93f36665ba5b52ad2479da63e5f28fb28938a3159ddf52319720e26f7813e', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-11-27 01:41:05', '2025-11-27 01:41:05', '2026-11-27 08:41:05'),
	('3871330a78166cd95bbcee671f49f41216e06320426b33fd63c592f6a687e9f0e633e02057e95e9d', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-30 01:29:21', '2025-10-30 01:29:21', '2026-10-30 08:29:21'),
	('3e754b08a76900ca65098e47558f5fa3281791ef88bb263e38bbd9443fa514975c8470194ad9a50c', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-19 19:25:15', '2025-10-19 19:25:15', '2026-10-20 02:25:15'),
	('50937f9d7e967990c1ea9d41b43f6515a23d01cbd32d52a5b49ed3bde1f2bc801d5a6842c1d90685', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-21 01:21:41', '2025-10-21 01:21:42', '2026-10-21 08:21:41'),
	('61135c644a6efbd2b2155da86cf1f9821d5a60b81aac5d451c353c1365b0ee3eb982496a23a159b3', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-28 01:18:02', '2025-10-28 01:18:02', '2026-10-28 08:18:02'),
	('71b3d921cf798ebb2ddf83e2297ccc08d51f7726fec133d4065af57142def0864520baf0deac4ba4', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-11-24 09:26:49', '2025-11-24 09:26:49', '2026-11-24 16:26:49'),
	('724fc3150b11a628ab5bc4a9752f7daa6140ed0f7d19bd1fac161f9966afa2b9ef4ce2b38384339e', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-19 21:19:41', '2025-10-19 21:19:41', '2026-10-20 04:19:41'),
	('735f92e92946a9dfd75db9f031116ea0c77c9b57b4c6cd754b0cb93dbf77938fbde37f2d650b8d27', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-16 18:42:46', '2025-10-16 18:42:46', '2026-10-17 01:42:46'),
	('81645b9c23b0820dbb6b31d829271a670769883c4c9a3058c3c6e3f7119ba332c89516368be2a661', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-11-27 22:56:40', '2025-11-27 22:56:40', '2026-11-28 05:56:40'),
	('83226c750cecd9414b7d385a89353a51b5b25c2409ccaf561e09a4b2422063d1477e377ea3163697', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-20 00:50:45', '2025-10-20 00:50:45', '2026-10-20 07:50:45'),
	('91eff0be944f9cc62791eb1467116fcfd6e29e71d0d79a3b52aef7a406515392bd7cfaed0d594ac6', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-27 01:55:42', '2025-10-27 01:55:42', '2026-10-27 08:55:42'),
	('95c37151c9b5e8b6442f013752f5c37370272510c392153e73f049581234469b27ebed9fd04f2e9d', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-23 01:27:19', '2025-10-23 01:27:19', '2026-10-23 08:27:19'),
	('9600133faaf0e6cb8ecbf1a923fc2a2fccb3ceeb310120ae789ee70b458997423ee6c16fcce87c79', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-11-20 23:26:30', '2025-11-20 23:26:30', '2026-11-21 06:26:29'),
	('c4323ebee599f9b81cfc7e01505b00167d5e10eb4ccae1cbb58cb3b080c30f8f064a04c8565c0d4d', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-26 19:18:20', '2025-10-26 19:18:20', '2026-10-27 02:18:19'),
	('c546009cb93ff1445c30264aedbea3285ef3f0dc8c5c3a17c8544999667acbd1a9ab49484cfac728', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-11-27 20:11:00', '2025-11-27 20:11:00', '2026-11-28 03:11:00'),
	('ccc27d3f4e9a30a07ed7aceef8d98711c46b51580962e1b455ecadf0ca13c6522174fb419e31886e', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-29 20:11:13', '2025-10-29 20:11:13', '2026-10-30 03:11:13'),
	('dd4561cbae40b15f182110025af47c5bf56893c5c3655ad696e25f37bfa8285a240c4562f66d0a47', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-16 19:28:39', '2025-10-16 19:28:39', '2026-10-17 02:28:39'),
	('ddb359b338e9afc8fc43e0d024c131f5108b79411557d2d4d76da06adb3e437ad54d6a09909a5279', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-22 01:25:51', '2025-10-22 01:25:51', '2026-10-22 08:25:51'),
	('ed626d4c6f37dd01afa20a556c412b7a7ac5bb53b162f93106c2dda635e39b525e2586c0f5468d02', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-19 21:19:12', '2025-10-19 21:19:13', '2026-10-20 04:19:12'),
	('f06ccc13c1b87d05e6bf670fb43d0bccc329a25ff319ec1c7ec5111bb8d17a63852aa80173d6238b', 2, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-11-26 19:51:29', '2025-11-26 19:51:29', '2026-11-27 02:51:29'),
	('f7bcbb35c2fcf50a2328d47aac5af05bdab93ff1b8583ff507d3a66970301286995620e4bf8ba4ba', 1, '0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', 'Personal Access Token', '[]', 0, '2025-10-23 01:27:54', '2025-10-23 01:27:54', '2026-10-23 08:27:54');

-- Dumping data for table dashboard-pendapatan-daerah.oauth_auth_codes: ~0 rows (approximately)

-- Dumping data for table dashboard-pendapatan-daerah.oauth_clients: ~1 rows (approximately)
REPLACE INTO `oauth_clients` (`id`, `owner_type`, `owner_id`, `name`, `secret`, `provider`, `redirect_uris`, `grant_types`, `revoked`, `created_at`, `updated_at`) VALUES
	('0199e6e3-fb71-72a9-a9ea-96535f9e8b3e', NULL, NULL, 'Laravel', '$2y$12$RM.v6mQefLJE88/mL5fJdO6QyvVYGKTBAhV.9XP2LRVVQF3ZurRxO', 'users', '[]', '["personal_access"]', 0, '2025-10-15 01:02:04', '2025-10-15 01:02:04');

-- Dumping data for table dashboard-pendapatan-daerah.oauth_device_codes: ~0 rows (approximately)

-- Dumping data for table dashboard-pendapatan-daerah.oauth_refresh_tokens: ~0 rows (approximately)

-- Dumping data for table dashboard-pendapatan-daerah.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table dashboard-pendapatan-daerah.permissions: ~4 rows (approximately)
REPLACE INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'create post', 'web', '2025-10-15 01:25:14', '2025-10-15 01:25:14'),
	(2, 'edit post', 'web', '2025-10-15 01:25:15', '2025-10-15 01:25:15'),
	(3, 'delete post', 'web', '2025-10-15 01:25:15', '2025-10-15 01:25:15'),
	(4, 'view post', 'web', '2025-10-15 01:25:15', '2025-10-15 01:25:15');

-- Dumping data for table dashboard-pendapatan-daerah.roles: ~2 rows (approximately)
REPLACE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2025-10-15 01:25:15', '2025-10-15 01:25:15'),
	(2, 'superadmin', 'web', '2025-10-15 01:25:15', '2025-10-15 01:25:15');

-- Dumping data for table dashboard-pendapatan-daerah.role_has_permissions: ~7 rows (approximately)
REPLACE INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(4, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2);

-- Dumping data for table dashboard-pendapatan-daerah.sessions: ~1 rows (approximately)
REPLACE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('aI4zRotMQAuv2nOhk4sdSgzNGwRjKyuYaaxJilnO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRlRlQlFrVkxVcHJVa292eElCNEp3Y0NBcW8wQmtsVzk3UkVidnlEdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkva29tcG9zaXNpLXN1bWJlci1wZW5kYXBhdGFuLXRyaXd1bGFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764322131);

-- Dumping data for table dashboard-pendapatan-daerah.unique_visitors: ~1 rows (approximately)
REPLACE INTO `unique_visitors` (`id`, `ip_address`, `created_at`, `updated_at`) VALUES
	(1, '127.0.0.1', '2025-11-24 09:01:51', '2025-11-24 09:01:51');

-- Dumping data for table dashboard-pendapatan-daerah.users: ~2 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'superadmin', 'superadmin@katingankab.go.id', NULL, '$2y$12$pe2cXmSiC7.N2.FpCpDQVuZxA.aqD/JpexLGGcxAO/k4.H3jpC1Eu', 'mIj0fVMH6NjN9c6d2PN1wiyIvFKSoCfp6H48CQYyuvhF2jQUymFq6wAa7F41', '2025-10-15 01:25:15', '2025-10-15 01:25:15'),
	(2, 'admin', 'admin@katingankab.go.id', NULL, '$2y$12$u04QFknr6ItgZLaCARZwh.kkgjOYS4GuBUFx/As4ZQEqu8wwZReQi', 'TqbwAqn3ZH', '2025-10-15 01:25:15', '2025-10-15 01:25:15');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
