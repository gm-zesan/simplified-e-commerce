-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 09:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zesan_01921324091`
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Miss Kamille Fahey', '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(2, 'Phyllis McKenzie', '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(3, 'Janessa Wehner', '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(4, 'Terrance Baumbach', '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(5, 'Mr. Francesco Wolf V', '2024-10-22 07:04:39', '2024-10-22 07:04:39');

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
(4, '2024_10_21_171525_create_categories_table', 1),
(5, '2024_10_21_172130_create_sub_categories_table', 1),
(6, '2024_10_21_194431_create_products_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `old_price` decimal(8,2) DEFAULT NULL,
  `new_price` decimal(8,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `image`, `old_price`, `new_price`, `category_id`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(1, 'Monserrat Schaden IV', 'monserrat-schaden-iv', 'Est est eos omnis corrupti totam numquam. Id voluptatibus placeat tempora soluta odit. Corporis unde et et vel eos velit ut aut.', 'products/0lD1u3td7cDSL8suXk24wxm1UQjTURAHGh8AWQNe.jpg', 25.22, 86.57, 1, 1, '2024-10-22 07:04:39', '2024-10-22 07:16:04'),
(2, 'Eula Crist', 'eula-crist', 'Veritatis occaecati numquam aut a commodi. Ex eos aut ipsa ut.', 'products/Iqrtb1rWhLAfh8jdaM3oSFMapJMyiXYtZVxJQjn7.jpg', 97.04, 91.01, 1, 1, '2024-10-22 07:04:39', '2024-10-22 07:16:20'),
(3, 'Meaghan Zulauf', 'meaghan-zulauf', 'Quam atque aliquid quisquam corporis. Voluptas expedita itaque fuga dolores culpa. Quo odio omnis quod nam perspiciatis occaecati.', 'products/DCCTy8a4ayMCLYrghwjL3r3O9KQXdiY0ZCvTolm5.jpg', 96.46, 38.28, 1, 1, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(4, 'Filiberto Beer', 'filiberto-beer', 'Dolores est nesciunt laboriosam ab architecto. Saepe quia harum quas voluptatibus consequatur iure. Non blanditiis nihil consequuntur architecto. Ipsa iure voluptate est harum atque hic.', 'products/ATkZjAPPJlQauFfBlojHWI2nUJoJ4Ws7PkbB7rgs.jpg', 37.33, 91.86, 1, 2, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(5, 'Tyler Kohler', 'tyler-kohler', 'Ex molestias qui beatae rerum exercitationem est. Neque sapiente eveniet est blanditiis voluptate repellendus itaque. Omnis neque nihil rerum explicabo.', 'products/2tuINTKFY8CNAKtAz2ljht3tl68AdlI7skqufmXm.jpg', 27.80, 33.59, 1, 2, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(6, 'Emilio Hessel', 'emilio-hessel', 'Dolores labore voluptas quasi adipisci autem odit ut itaque. Qui fuga officia excepturi. Sed id nobis aliquam nostrum est omnis eveniet. Aut vel cum aspernatur expedita consequatur. Nam fugiat eius voluptas ratione maxime.', 'products/gAcECsKC97oIIVUy8NIRroKHmruwnNhNkc9KmDvb.jpg', 11.36, 85.87, 1, 2, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(7, 'Lavern Welch I', 'lavern-welch-i', 'Voluptate et possimus laudantium blanditiis officia officia aut. Deleniti debitis quibusdam et tenetur nesciunt nisi. Est delectus tempora est.', 'products/olIYpO6PdRZgqbmrcYZ9QLXmr2gOfJKBHn9fizMh.jpg', 77.00, 34.79, 2, 3, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(8, 'Ebony Huels', 'ebony-huels', 'Distinctio libero vel harum et ut autem. Nihil quidem doloribus deleniti voluptatem. Sed similique amet rerum blanditiis amet delectus. Ut ex consequatur at aut totam.', 'products/qfNDzp07PQKPqOohVPIkqFa1dhzyLaPZFYdXUbZY.jpg', 38.08, 75.34, 2, 3, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(9, 'Joannie Braun', 'joannie-braun', 'Sed deserunt ipsa deserunt pariatur enim. Veritatis odit velit unde fugit cupiditate.', 'products/8P2LweNN5IiDxWf5PkfehFZX23zxByjMwpGTdBKf.jpg', 79.34, 55.12, 2, 3, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(10, 'Sabrina Crona DDS', 'sabrina-crona-dds', 'Vitae quibusdam adipisci veritatis quisquam. Enim voluptas ad velit iusto tempore consequatur quibusdam aliquid. Aut dolores aliquid amet omnis dolores. Quia perspiciatis dolor blanditiis vitae.', 'products/MDxalQUcTdV8FXp8QwX1klVBZzHY4OT4KEN8ykHR.jpg', 35.48, 33.28, 2, 4, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(11, 'Nathen Walter', 'nathen-walter', 'Aut animi ex accusamus vitae voluptatibus. Consequuntur qui dolorem nesciunt recusandae sint. Voluptatum sed doloribus deserunt ipsam. Odit earum perspiciatis qui autem.', 'products/phstHvMESvFr81Txkj7dxHxffL4bT7UCgHymQB2O.jpg', 89.40, 75.75, 2, 4, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(12, 'Lottie Sporer', 'lottie-sporer', 'Corrupti ea sit nemo fugit atque qui consequatur. Saepe provident magnam optio magnam quis autem qui. Tenetur hic itaque rerum quasi mollitia amet fugit voluptates. Dolor necessitatibus esse consequatur.', 'products/UU2B0VGCOiZGsVBH6q6BJkSwMEp3gZYfpHRflga9.jpg', 83.85, 32.98, 2, 4, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(13, 'Prof. Ines Cruickshank IV', 'prof-ines-cruickshank-iv', 'Assumenda dignissimos quisquam totam dignissimos. Explicabo labore possimus nobis omnis.', 'products/q6Uf4WbreJ11tFX3phZCOYFTOUn8lTHOMKeQjWhV.jpg', 95.78, 31.62, 3, 5, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(14, 'Darron Kris DVM', 'darron-kris-dvm', 'Dolorem deleniti exercitationem et qui qui dicta cum. Nobis consequuntur non rem architecto. Quam veritatis incidunt labore vel minus in velit dolor. Qui omnis eum laudantium sunt alias.', 'products/yrvt50UKzALBmqSlcKaPJxPwbqYibCrOg02a15eM.jpg', 51.09, 22.23, 3, 5, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(15, 'Darryl Schumm', 'darryl-schumm', 'Voluptatibus ipsam natus atque quo sint laudantium autem. Eligendi voluptatem iste omnis eos repellat ut maiores veniam. Quibusdam aut et aliquid a.', 'products/17CrrCQc219dsAdgvpDiNPHVA8tVn7WuGnBBZCDK.jpg', 50.18, 54.33, 3, 5, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(16, 'Ms. Candida Quitzon Sr.', 'ms-candida-quitzon-sr', 'Nobis suscipit sed repellendus aut animi tenetur autem. Possimus et in odit et quod porro. Suscipit eveniet sed sit exercitationem aut aliquid autem.', 'products/DCqMry1alzPEHhlyMwwKwdOJzxFxDMXrSP7qO78r.jpg', 19.40, 61.86, 3, 6, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(17, 'Camryn Johns', 'camryn-johns', 'Sint nisi est eius nobis neque. Qui qui tempore ad debitis. Laudantium ipsa nemo quia assumenda corrupti aliquam. Ratione ipsam omnis deleniti dolores veritatis. Explicabo itaque animi corrupti velit cumque.', 'products/1j1CPvhO4tpdRjM9WqmnKAfpgOqHYlJWCFacLjS9.jpg', 93.15, 77.68, 3, 6, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(18, 'Marlee Carter', 'marlee-carter', 'Assumenda odit accusantium quam temporibus velit distinctio pariatur. Et suscipit eum sed rem non. Magni voluptas consequatur ut eaque id quae qui. Molestiae in et est ipsum adipisci.', 'products/vFChQmHxgDCODenu22CsiIeRH4EOL1a4zSqQN5gK.jpg', 88.83, 23.00, 3, 6, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(19, 'Dr. Janiya Keeling I', 'dr-janiya-keeling-i', 'Quia dicta ea architecto quasi. Laborum velit et odit ea doloremque nam et. Iusto ut minus maxime expedita. Provident molestiae beatae eius aut quibusdam.', 'products/ISfhYStrHp2Foj8QNU8D3i47YUZ6PvCmCgm859Pg.jpg', 18.76, 17.83, 4, 7, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(20, 'Loren Yundt', 'loren-yundt', 'Eos molestiae rerum velit quam. Cumque blanditiis aut autem harum. Modi ut et eveniet hic.', 'products/ouUE2nDp70CWM6quMWCHHUylb9uhh0hstmlZ9Uqn.jpg', 48.87, 88.98, 4, 7, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(21, 'Prof. Heber Marks Sr.', 'prof-heber-marks-sr', 'Non voluptatibus occaecati minus dolor. Consequuntur aut mollitia dolores et. Deserunt porro quo nulla quae aliquid sint explicabo.', 'products/dRobE0ZK6zzG8AQypCOfV7hjeSIEmTZBc4PinrUI.jpg', 94.20, 17.04, 4, 7, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(22, 'Sterling Gulgowski Sr.', 'sterling-gulgowski-sr', 'Voluptate eaque sequi esse voluptates perferendis omnis. Aut quis tempore odio earum eos id aliquam. Error deleniti ut deleniti rerum.', 'products/jWMjIFyg3Q5qYtDrfIpXtMlb3uN6dHhc058loTWD.jpg', 34.40, 17.27, 4, 8, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(23, 'Lavina Beatty', 'lavina-beatty', 'Accusantium vitae sapiente modi sed. Ea et quidem similique ut. Modi porro ducimus corporis non possimus perspiciatis.', 'products/Rrt92r1kaLd3oIzNQBLajIfQJKDoK3CHZri0onnu.jpg', 24.34, 72.84, 4, 8, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(24, 'Amiya Effertz', 'amiya-effertz', 'Quibusdam officia ipsam modi assumenda facilis nostrum asperiores. Ut aliquid ut expedita commodi quos. Alias est enim voluptatem praesentium voluptates.', 'products/rq9yIAq4oKJnY04AVOb1B1cNIusIeHDHXG7dHdG7.jpg', 67.75, 27.11, 4, 8, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(25, 'Kamryn Bosco DVM', 'kamryn-bosco-dvm', 'Asperiores ipsam molestiae quas maxime praesentium aut. Voluptas et facere aut nam numquam tempora. Dolor vitae provident est. Rerum accusamus deserunt ut ad nisi est voluptatem.', 'products/h7O0r5wdMTJN0EJTTv5h5IftIpr8zb57BdjZyuXF.jpg', 64.04, 29.46, 5, 9, '2024-10-22 07:04:39', '2024-10-22 07:22:53'),
(26, 'Kaleigh Schmitt', 'kaleigh-schmitt', 'Expedita beatae consequuntur eum praesentium quo odio. Quasi autem rerum perspiciatis omnis ipsum ad. Harum sit quae repellendus eum.', 'products/HntsI3p63jdnQVyWpWyQooiXbkzGZC4d4rUeoQeA.jpg', 48.60, 58.72, 5, 9, '2024-10-22 07:04:39', '2024-10-22 07:22:26'),
(27, 'Prof. Leila Baumbach DVM', 'prof-leila-baumbach-dvm', 'Ut nihil sunt in. Dolore ipsum error est. Numquam quas itaque laborum est corrupti at corporis aut. Ea et aliquid eos id suscipit delectus placeat.', 'products/daTm98D8advs4I3q5LZDbEINubESakB8JDWR7iOv.jpg', 83.83, 76.36, 5, 9, '2024-10-22 07:04:39', '2024-10-22 07:21:57'),
(28, 'Prof. Mylene Pollich', 'prof-mylene-pollich', 'Deserunt alias animi eligendi voluptatibus ad. Qui sed quis dolorem similique accusamus facilis sunt ut. Consequuntur iure praesentium ut corporis. Quia odio vero dolorum iste earum autem.', 'products/ksEEFJIElKzkDjjJMqYsYX3HiJ4QL1lu62sfrvRD.jpg', 16.41, 56.38, 5, 10, '2024-10-22 07:04:39', '2024-10-22 07:21:39'),
(29, 'Mr. Devon Hoeger', 'mr-devon-hoeger', 'Accusamus atque nesciunt doloremque et. Id qui sed et maxime perspiciatis veniam. Rerum autem recusandae quas amet est.', 'products/vOsbC1cBL4yOy1huy3BGFveaoqX8FrLFqfxLu5PE.jpg', 93.37, 50.91, 5, 10, '2024-10-22 07:04:39', '2024-10-22 07:21:16'),
(30, 'Cyril Armstrong', 'cyril-armstrong', 'Amet sed harum sequi dolores. Et iste et adipisci nam beatae sint autem. Aspernatur nam alias nam quae dolorem. Aut repudiandae voluptates commodi ab harum reprehenderit consequatur.', 'products/EwDHXX5CGfdiGOUgUbVLFKR77MoUDCuPBZNcb43c.jpg', 58.78, 98.98, 5, 10, '2024-10-22 07:04:39', '2024-10-22 07:21:02');

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
('Y7jREp25kxMB8kzTnwOrPAh0hdzkCRwBQHoAhGCa', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicENma1JadnpRaTkyVmN3cTZSYWl4RGRUNW1HTFhkcnpnZ1NwbXVEWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1729604063);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Dorian Osinski V', 1, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(2, 'Loren Cormier DDS', 1, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(3, 'Mariana Jacobs Sr.', 2, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(4, 'Preston Ebert', 2, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(5, 'Cassandre Kovacek III', 3, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(6, 'Dr. Otto Runolfsson', 3, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(7, 'Gunnar Schmeler', 4, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(8, 'Reymundo Crist', 4, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(9, 'Dr. Martine Bergnaum MD', 5, '2024-10-22 07:04:39', '2024-10-22 07:04:39'),
(10, 'Dr. Saige Welch', 5, '2024-10-22 07:04:39', '2024-10-22 07:04:39');

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
(1, 'Zesan', 'gmzesan7767@gmail.com', '2024-10-22 07:04:39', '$2y$12$1NvQg1ev7fnKF3poLP8b2Ob./SDQHC4qVOYRnU2bFQnoLGSMyJNGW', '3ppN0nq5wv', '2024-10-22 07:04:39', '2024-10-22 07:04:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
