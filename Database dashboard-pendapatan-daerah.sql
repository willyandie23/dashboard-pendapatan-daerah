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

-- Dumping data for table website-profile-disdik.app_logs: ~14 rows (approximately)
REPLACE INTO `app_logs` (`id`, `system_logable_id`, `system_logable_type`, `user_id`, `guard_name`, `module_name`, `action`, `old_value`, `new_value`, `ip_address`, `created_at`, `updated_at`) VALUES
	(1, 1, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 1, "key": "site_heading", "value": "Website Profile Disid", "created_at": "2025-11-27 14:39:28", "updated_at": "2025-11-27 14:39:28"}', '127.0.0.1', '2025-11-27 07:39:28', '2025-11-27 07:39:28'),
	(2, 2, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 2, "key": "site_ytb", "value": "iQ7Vwwe_kDY", "created_at": "2025-11-27 14:39:28", "updated_at": "2025-11-27 14:39:28"}', '127.0.0.1', '2025-11-27 07:39:28', '2025-11-27 07:39:28'),
	(3, 3, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 3, "key": "site_logo", "value": "/storage/logo/Hdk3lZmiRwlO4ybpH2uzp8JtvTTjjF6pAEHtuah8.png", "created_at": "2025-11-27 14:39:28", "updated_at": "2025-11-27 14:39:28"}', '127.0.0.1', '2025-11-27 07:39:28', '2025-11-27 07:39:28'),
	(4, 4, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 4, "key": "site_favicon", "value": "/storage/favicon/Ov5basfDpnw6KLobtcOo3cfSR1Aeg34sUOzkVaMn.png", "created_at": "2025-11-27 14:39:28", "updated_at": "2025-11-27 14:39:28"}', '127.0.0.1', '2025-11-27 07:39:28', '2025-11-27 07:39:28'),
	(5, 5, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 5, "key": "cp_address", "value": "Jalan jalan", "created_at": "2025-11-27 14:39:28", "updated_at": "2025-11-27 14:39:28"}', '127.0.0.1', '2025-11-27 07:39:28', '2025-11-27 07:39:28'),
	(6, 6, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 6, "key": "cp_phone", "value": "081234567890", "created_at": "2025-11-27 14:39:28", "updated_at": "2025-11-27 14:39:28"}', '127.0.0.1', '2025-11-27 07:39:28', '2025-11-27 07:39:28'),
	(7, 7, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 7, "key": "cp_email", "value": "disdik@gmail.com", "created_at": "2025-11-27 14:39:28", "updated_at": "2025-11-27 14:39:28"}', '127.0.0.1', '2025-11-27 07:39:28', '2025-11-27 07:39:28'),
	(8, 8, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 8, "key": "cp_agency", "value": "Dinas Pendidikan Kab. Katingan", "created_at": "2025-11-27 14:39:28", "updated_at": "2025-11-27 14:39:28"}', '127.0.0.1', '2025-11-27 07:39:28', '2025-11-27 07:39:28'),
	(9, 9, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 9, "key": "sm_facebook", "value": "https://www.instagram.com/ti.diskominfokatingan/", "created_at": "2025-11-27 14:39:28", "updated_at": "2025-11-27 14:39:28"}', '127.0.0.1', '2025-11-27 07:39:28', '2025-11-27 07:39:28'),
	(10, 10, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 10, "key": "sm_instagram", "value": "https://www.instagram.com/ti.diskominfokatingan/", "created_at": "2025-11-27 14:39:28", "updated_at": "2025-11-27 14:39:28"}', '127.0.0.1', '2025-11-27 07:39:28', '2025-11-27 07:39:28'),
	(11, 11, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 11, "key": "sm_x", "value": "https://www.instagram.com/ti.diskominfokatingan/", "created_at": "2025-11-27 14:39:28", "updated_at": "2025-11-27 14:39:28"}', '127.0.0.1', '2025-11-27 07:39:28', '2025-11-27 07:39:28'),
	(12, 12, 'App\\Models\\Identity', 1, 'api', 'Identity', 'CREATED', NULL, '{"id": 12, "key": "sm_youtube", "value": "https://www.instagram.com/ti.diskominfokatingan/", "created_at": "2025-11-27 14:39:28", "updated_at": "2025-11-27 14:39:28"}', '127.0.0.1', '2025-11-27 07:39:28', '2025-11-27 07:39:28'),
	(13, 1, 'App\\Models\\Banner', 1, 'api', 'Banner', 'CREATED', NULL, '{"id": 1, "image": "/storage/banners/lI0v9TWoM29bHt6TvCQ2CuqBq8SXW88k9YzdXEuI.png", "title": "Tut Wuri Handayani", "created_at": "2025-11-27 15:09:13", "updated_at": "2025-11-27 15:09:13", "description": "\\"Tut wuri handayani\\" adalah semboyan pendidikan yang berarti \\"dari belakang memberikan dorongan\\" atau \\"menuntun dari belakang\\". Semboyan ini adalah bagian dari trilogi pendidikan Ki Hadjar Dewantara yang juga mencakup \\"Ing ngarsa sung tuladha\\" (di depan memberi teladan) dan \\"Ing madya mangun karsa\\" (di tengah membangun semangat). Artinya, seorang guru harus memberi dukungan, dorongan moral, dan semangat kepada muridnya agar tumbuh menjadi manusia yang merdeka dan mandiri."}', '127.0.0.1', '2025-11-27 08:09:13', '2025-11-27 08:09:13'),
	(14, 2, 'App\\Models\\Banner', 1, 'api', 'Banner', 'CREATED', NULL, '{"id": 2, "image": "/storage/banners/UnK2TwcLQAg33mDVfmjKAEGeQQCJ49tJ4XO531El.png", "title": "Test Banner", "created_at": "2025-11-27 15:09:31", "updated_at": "2025-11-27 15:09:31", "description": "Test"}', '127.0.0.1', '2025-11-27 08:09:31', '2025-11-27 08:09:31');

-- Dumping data for table website-profile-disdik.banners: ~2 rows (approximately)
REPLACE INTO `banners` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Tut Wuri Handayani', '"Tut wuri handayani" adalah semboyan pendidikan yang berarti "dari belakang memberikan dorongan" atau "menuntun dari belakang". Semboyan ini adalah bagian dari trilogi pendidikan Ki Hadjar Dewantara yang juga mencakup "Ing ngarsa sung tuladha" (di depan memberi teladan) dan "Ing madya mangun karsa" (di tengah membangun semangat). Artinya, seorang guru harus memberi dukungan, dorongan moral, dan semangat kepada muridnya agar tumbuh menjadi manusia yang merdeka dan mandiri.', '/storage/banners/lI0v9TWoM29bHt6TvCQ2CuqBq8SXW88k9YzdXEuI.png', '2025-11-27 08:09:13', '2025-11-27 08:09:13', NULL),
	(2, 'Test Banner', 'Test', '/storage/banners/UnK2TwcLQAg33mDVfmjKAEGeQQCJ49tJ4XO531El.png', '2025-11-27 08:09:31', '2025-11-27 08:09:31', NULL);

-- Dumping data for table website-profile-disdik.cache: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.cache_locks: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.contacts: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.downloads: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.failed_jobs: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.fields: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.galerys: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.identities: ~12 rows (approximately)
REPLACE INTO `identities` (`id`, `key`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'site_heading', 'Website Profile Disid', '2025-11-27 07:39:28', '2025-11-27 07:39:28', NULL),
	(2, 'site_ytb', 'iQ7Vwwe_kDY', '2025-11-27 07:39:28', '2025-11-27 07:39:28', NULL),
	(3, 'site_logo', '/storage/logo/Hdk3lZmiRwlO4ybpH2uzp8JtvTTjjF6pAEHtuah8.png', '2025-11-27 07:39:28', '2025-11-27 07:39:28', NULL),
	(4, 'site_favicon', '/storage/favicon/Ov5basfDpnw6KLobtcOo3cfSR1Aeg34sUOzkVaMn.png', '2025-11-27 07:39:28', '2025-11-27 07:39:28', NULL),
	(5, 'cp_address', 'Jalan jalan', '2025-11-27 07:39:28', '2025-11-27 07:39:28', NULL),
	(6, 'cp_phone', '081234567890', '2025-11-27 07:39:28', '2025-11-27 07:39:28', NULL),
	(7, 'cp_email', 'disdik@gmail.com', '2025-11-27 07:39:28', '2025-11-27 07:39:28', NULL),
	(8, 'cp_agency', 'Dinas Pendidikan Kab. Katingan', '2025-11-27 07:39:28', '2025-11-27 07:39:28', NULL),
	(9, 'sm_facebook', 'https://www.instagram.com/ti.diskominfokatingan/', '2025-11-27 07:39:28', '2025-11-27 07:39:28', NULL),
	(10, 'sm_instagram', 'https://www.instagram.com/ti.diskominfokatingan/', '2025-11-27 07:39:28', '2025-11-27 07:39:28', NULL),
	(11, 'sm_x', 'https://www.instagram.com/ti.diskominfokatingan/', '2025-11-27 07:39:28', '2025-11-27 07:39:28', NULL),
	(12, 'sm_youtube', 'https://www.instagram.com/ti.diskominfokatingan/', '2025-11-27 07:39:28', '2025-11-27 07:39:28', NULL);

-- Dumping data for table website-profile-disdik.jobs: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.job_batches: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.links: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.migrations: ~20 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_11_26_032318_create_oauth_auth_codes_table', 2),
	(5, '2025_11_26_032319_create_oauth_access_tokens_table', 2),
	(6, '2025_11_26_032320_create_oauth_refresh_tokens_table', 2),
	(7, '2025_11_26_032321_create_oauth_clients_table', 2),
	(8, '2025_11_26_032322_create_oauth_device_codes_table', 2),
	(9, '2025_11_26_051940_create_permission_tables', 3),
	(10, '2025_11_26_101833_create_app_logs_table', 4),
	(12, '2025_11_26_105248_create_banners_table', 5),
	(13, '2025_11_26_105331_create_organizations_table', 5),
	(14, '2025_11_26_105358_create_galerys_table', 5),
	(15, '2025_11_26_105409_create_news_table', 5),
	(16, '2025_11_26_105425_create_downloads_table', 5),
	(17, '2025_11_26_105445_create_identities_table', 5),
	(18, '2025_11_26_105512_create_field_table', 5),
	(19, '2025_11_26_105533_create_contacts_table', 5),
	(20, '2025_11_26_105545_create_links_table', 5),
	(21, '2025_11_26_110508_add_field_id_to_organizations_table', 5);

-- Dumping data for table website-profile-disdik.model_has_permissions: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.model_has_roles: ~2 rows (approximately)
REPLACE INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2);

-- Dumping data for table website-profile-disdik.news: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.oauth_access_tokens: ~2 rows (approximately)
REPLACE INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('2b9c9b85895f433c5443a4a161f8b1f022423203533489373c504752abe554b91e50c2e6aac72536', 1, '019abe30-0a4d-70f7-b206-2420092f2a9e', 'Personal Access Token', '[]', 0, '2025-11-27 07:37:18', '2025-11-27 07:37:18', '2026-11-27 14:37:18'),
	('310b7b340be48ff718eb5cb05e271ae02f6a86386d324227c5bde03901bab8c62c8ae9ec9a4791cb', 1, '019abe30-0a4d-70f7-b206-2420092f2a9e', 'Personal Access Token', '[]', 0, '2025-11-27 07:37:30', '2025-11-27 07:37:30', '2026-11-27 14:37:30');

-- Dumping data for table website-profile-disdik.oauth_auth_codes: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.oauth_clients: ~1 rows (approximately)
REPLACE INTO `oauth_clients` (`id`, `owner_type`, `owner_id`, `name`, `secret`, `provider`, `redirect_uris`, `grant_types`, `revoked`, `created_at`, `updated_at`) VALUES
	('019abe30-0a4d-70f7-b206-2420092f2a9e', NULL, NULL, 'Laravel', '$2y$12$.PzJkGEezanqhqUvJKVB3.j5QTeqX93BB2XvVcpMyprFjwwQyidsG', 'users', '[]', '["personal_access"]', 0, '2025-11-25 20:23:30', '2025-11-25 20:23:30');

-- Dumping data for table website-profile-disdik.oauth_device_codes: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.oauth_refresh_tokens: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.organizations: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table website-profile-disdik.permissions: ~4 rows (approximately)
REPLACE INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'create post', 'web', '2025-11-26 03:23:42', '2025-11-26 03:23:42'),
	(2, 'edit post', 'web', '2025-11-26 03:23:42', '2025-11-26 03:23:42'),
	(3, 'delete post', 'web', '2025-11-26 03:23:42', '2025-11-26 03:23:42'),
	(4, 'view post', 'web', '2025-11-26 03:23:42', '2025-11-26 03:23:42');

-- Dumping data for table website-profile-disdik.roles: ~5 rows (approximately)
REPLACE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'superadmin', 'web', '2025-11-26 03:23:42', '2025-11-26 03:23:42'),
	(2, 'admin', 'web', '2025-11-26 03:23:42', '2025-11-26 03:23:42'),
	(3, 'kassubag', 'web', '2025-11-26 03:23:42', '2025-11-26 03:23:42'),
	(4, 'sekdis', 'web', '2025-11-26 03:23:42', '2025-11-26 03:23:42'),
	(5, 'kadis', 'web', '2025-11-26 03:23:42', '2025-11-26 03:23:42');

-- Dumping data for table website-profile-disdik.role_has_permissions: ~17 rows (approximately)
REPLACE INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2),
	(1, 3),
	(2, 3),
	(4, 3),
	(1, 4),
	(2, 4),
	(4, 4),
	(1, 5),
	(2, 5),
	(4, 5);

-- Dumping data for table website-profile-disdik.sessions: ~1 rows (approximately)
REPLACE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('4ZxGhU8xI3HRnZsIeqf17MVM8athfSyvP4r0Qjz9', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoienpFYkNCZWhvdHV0bjI2U0hRMFRPcmNid1BDTUlRS2lQZ0hHMWtZRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9uZXdzL2NyZWF0ZSI7czo1OiJyb3V0ZSI7czoxMToibmV3cy5jcmVhdGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6OToiYXBpX3Rva2VuIjtzOjEwMjc6ImV5SjBlWEFpT2lKS1YxUWlMQ0poYkdjaU9pSlNVekkxTmlKOS5leUpoZFdRaU9pSXdNVGxoWW1Vek1DMHdZVFJrTFRjd1pqY3RZakl3TmkweU5ESXdNRGt5WmpKaE9XVWlMQ0pxZEdraU9pSXpNVEJpTjJJek5EQmlaVFE0Wm1ZM01UaGxZalZqWWpBMVpUSTNNV0ZsTURKbU5tRTROak00Tm1Rek1qUXlNamRqTldKa1pUQXpPVEF4WW1GaU9HTTJNbU00WVdVNVpXTTVZVFEzT1RGallpSXNJbWxoZENJNk1UYzJOREkxTkRJMU1DNDRNVGsxTnpRc0ltNWlaaUk2TVRjMk5ESTFOREkxTUM0NE1UazFOellzSW1WNGNDSTZNVGM1TlRjNU1ESTFNQzQ0TVRBek1qZ3NJbk4xWWlJNklqRWlMQ0p6WTI5d1pYTWlPbHRkZlEubHYzNmtieEVsbEU2a2V2c1lBcW54QXJ1SjRNSGVtTHZTX2xFSjdNWlZIRV9JNnVYa0lHZWNGcGd3bTNOdm9WbUpWLXA3Z0tJM1oyT3FjWjFuakRGZERsWXV1enBLZUExUjVzWFkwdTBVdWVvZ1BSZmJSekVPSENzLW5vRFBRcjk1c1BBbFJSczJZSkhCUVIzT3E4MHdVRWQ5SmlzdHJjTmVwVVkwNUYwZDFmVjBuYnJZNXN5cXZZMVNLdU8ybTZsMFZmY1NrRWVuanlrNElQWjlLNkNlZC16elE0UUxxdzA5QUZXN2k4VFJNQndqZmdQOXBRdWhiQ1pQdEdGTW8zbGo3ak5rUXVhWVFEZi1ONlVGNzN0RjJzbVBsMXZHc1BMbjB1MGVEb2xpMWhFcXFwMTJUaVBHMnhabmVucGdXNGF0QmpEYWZJSXdTUmNLNmxwTGtjOGhZelU2dUYydFFkOWZCRkd6bDdvbXBPTVVEVVN2WVdvMFhaNnE5b19FSG5iUXJrdGZMdmJxZWtTcXFBUXY0SDk4R3J4QzQtdFNsQkliYWIxeW1iV3Z5dGpBS1RfWWlqODNyRUdCX0tqNlhRc2c2WEFZT3E3TEwxeEhqMXZVT1hPVHdzdHdEZTBfd092bi1oQWNmakthcFlQVjVRU1dIYXR3RU1fRU90NFlCNnhQbFg0aEtycUM2c0cwdnRIbjF6bmJRaFJNWHIyZTBvMmlwaFY0bmx1bFB6ZEJsTUtyNG5oc1ltTm1CeWxXSmtTRm5uUUM4X1RwQkVNa18xc2VsOGZ1N2c5b1luTjhPODhVWk82STZYMkIzanFyc1F1YUJqUjlmZWFZZDdWS2gwbFk5a1p4OGp4ckN5ZF9teVAxZW9LTVhQUkdfa1g4LWgtNEJGWVNwSGZlTXMiO30=', 1764256749);

-- Dumping data for table website-profile-disdik.users: ~2 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'superadmin', 'superadmin@katingankab.go.id', NULL, '$2y$12$b6V9T4A1H82DBTnyWVSMv.K0iDoc5ZFlSzoYRKv6N1NHFaNUNM36K', '2QazhZYgGWK2c0HsaDaRVGD7P4wVFoy4kZKP3X3pHLERwB7EpAn40JQ3A9cN', '2025-11-26 03:23:42', '2025-11-26 03:23:42'),
	(2, 'admin', 'admin@katingankab.go.id', NULL, '$2y$12$2ctA31L6vQ.Koaiy.FHq8O1brw12sXDWcRnMH6GsJbu.MUqMSVbpi', 'DGiAFFCKyz', '2025-11-26 03:23:42', '2025-11-26 03:23:42');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
