-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Jún 20. 13:39
-- Kiszolgáló verziója: 10.4.22-MariaDB
-- PHP verzió: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `wp3_01`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Manchester', 1, '2022-04-22 09:48:54', '2022-04-22 09:48:54'),
(2, 'Barcelona', 2, '2022-04-22 09:48:54', '2022-04-22 09:48:54'),
(3, 'Paris', 3, '2022-04-22 09:48:54', '2022-04-22 09:48:54'),
(4, 'München', 4, '2022-04-23 15:26:18', '2022-04-23 15:26:18'),
(5, 'Milan', 5, '2022-04-23 15:26:18', '2022-04-23 15:26:18'),
(6, 'Torino', 5, '2022-04-23 15:26:18', '2022-04-23 15:26:18'),
(7, 'London', 1, '2022-04-26 18:12:08', '2022-04-26 18:12:08'),
(8, 'Amsterdam', 12, '2022-04-30 16:11:02', '2022-04-30 16:11:02'),
(9, 'Liverpool', 1, '2022-06-18 15:19:52', '2022-06-18 15:19:52');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `commentable_type` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `commentable_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `comments`
--

INSERT INTO `comments` (`id`, `message`, `commentable_type`, `commentable_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'test', 'App\\Models\\Game', 7, 1, '2022-06-20 08:41:01', '2022-06-20 08:41:01'),
(2, 'test', 'App\\Models\\Game', 6, 1, '2022-06-20 08:43:55', '2022-06-20 08:43:55'),
(3, 'test2', 'App\\Models\\Game', 7, 1, '2022-06-20 09:28:04', '2022-06-20 09:28:04');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'England', '2022-04-22 09:38:38', '2022-04-22 09:38:38'),
(2, 'Spain', '2022-04-22 09:38:38', '2022-04-22 09:38:38'),
(3, 'France', '2022-04-22 09:38:38', '2022-04-22 09:38:38'),
(4, 'Germany', '2022-04-23 15:26:18', '2022-04-23 15:26:18'),
(5, 'Italy', '2022-04-23 15:26:18', '2022-04-23 15:26:18'),
(9, 'Hungary', '2022-04-26 17:44:24', '2022-04-26 17:44:24'),
(10, 'Ukrain', '2022-04-26 17:50:03', '2022-04-26 17:50:03'),
(11, 'Croatia', '2022-04-26 17:51:26', '2022-04-26 17:51:26'),
(12, 'Netherlands', '2022-04-26 17:51:46', '2022-04-26 17:51:46');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `games`
--

CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `league_id` bigint(20) UNSIGNED NOT NULL,
  `team1_id` bigint(20) UNSIGNED NOT NULL,
  `team2_id` bigint(20) UNSIGNED NOT NULL,
  `team1_goals` int(11) NOT NULL,
  `team2_goals` int(11) NOT NULL,
  `result` enum('h','a','x') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `games`
--

INSERT INTO `games` (`id`, `league_id`, `team1_id`, `team2_id`, `team1_goals`, `team2_goals`, `result`, `created_at`, `updated_at`, `img`) VALUES
(2, 5, 5, 6, 0, 0, 'h', '2022-04-23 16:32:50', '2022-04-23 16:32:50', NULL),
(3, 4, 4, 6, 0, 0, 'x', '2022-04-24 14:11:41', '2022-04-24 14:11:41', NULL),
(4, 2, 2, 3, 0, 0, 'h', '2022-04-24 14:12:21', '2022-04-24 15:28:21', NULL),
(5, 3, 3, 2, 0, 0, 'h', '2022-04-26 16:16:02', '2022-06-11 17:37:16', NULL),
(6, 1, 4, 8, 0, 0, 'h', '2022-06-18 15:22:36', '2022-06-20 09:32:27', NULL),
(7, 6, 3, 8, 2, 1, 'h', '2022-06-18 16:04:27', '2022-06-20 09:30:58', '62ae13ab3f8b7.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `leagues`
--

CREATE TABLE `leagues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_count` int(11) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `leagues`
--

INSERT INTO `leagues` (`id`, `name`, `team_count`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'English Premier League', 20, 1, '2022-04-22 09:48:54', '2022-04-22 09:48:54'),
(2, 'LaLiga', 20, 2, '2022-04-22 09:48:54', '2022-04-22 09:48:54'),
(3, 'Ligue 1', 20, 3, '2022-04-22 09:48:54', '2022-04-22 09:48:54'),
(4, 'Bundesliga', 18, 4, '2022-04-23 15:26:18', '2022-04-23 15:26:18'),
(5, 'Serie A', 20, 5, '2022-04-23 15:26:18', '2022-04-23 15:26:18'),
(6, 'Eredivisie', 18, 12, '2022-04-30 16:10:12', '2022-04-30 16:10:12');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2014_10_12_100000_create_password_resets_table', 1),
(35, '2019_08_19_000000_create_failed_jobs_table', 1),
(36, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(37, '2022_04_21_171532_create_leagues_table', 1),
(38, '2022_04_21_171603_create_countries_table', 1),
(39, '2022_04_21_171627_create_cities_table', 1),
(40, '2022_04_21_171649_create_teams_table', 1),
(41, '2022_04_21_171707_create_games_table', 1),
(42, '2022_04_21_173359_create_predictions_table', 1),
(43, '2022_06_11_180806_add_img_column_to_games_table', 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `predictions`
--

CREATE TABLE `predictions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `result` enum('h','a','x') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `predictions`
--

INSERT INTO `predictions` (`id`, `match_id`, `user_id`, `result`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 'h', NULL, NULL),
(2, 4, 2, 'x', NULL, NULL),
(3, 3, 2, 'a', NULL, NULL),
(4, 5, 1, 'a', NULL, NULL),
(5, 4, 1, 'a', NULL, NULL),
(6, 5, 5, 'x', NULL, NULL),
(7, 5, 3, 'h', NULL, NULL),
(8, 4, 3, 'h', NULL, NULL),
(9, 3, 3, 'h', NULL, NULL),
(10, 2, 3, 'a', NULL, NULL),
(12, 3, 1, 'x', NULL, NULL),
(13, 2, 1, 'a', NULL, NULL),
(14, 2, 2, 'x', NULL, NULL),
(15, 7, 1, 'h', NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `league_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `teams`
--

INSERT INTO `teams` (`id`, `name`, `country_id`, `league_id`, `city_id`, `created_at`, `updated_at`) VALUES
(2, 'Barcelona', 2, 2, 2, '2022-04-22 09:48:54', '2022-04-22 09:48:54'),
(3, 'Paris Saint Germain', 3, 3, 3, '2022-04-22 09:48:54', '2022-04-22 09:48:54'),
(4, 'FC Bayern München', 4, 4, 4, '2022-04-23 15:26:18', '2022-04-23 15:26:18'),
(5, 'AC Milan', 5, 5, 5, '2022-04-23 15:26:18', '2022-04-23 15:26:18'),
(6, 'Juventus', 5, 5, 6, '2022-04-23 15:26:18', '2022-04-23 15:26:18'),
(8, 'Liverpool FC', 1, 1, 9, '2022-06-18 15:20:24', '2022-06-18 15:20:24');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `permission`) VALUES
(1, 'a', 'a@a.com', NULL, '$2y$10$iI9./4qkPCziwbPplnZ1XuL9HhIyMgUcv6kH1Zkcw6Ost/kIEIMki', '5P6U408fz813fivY0zshW8V8ZRdeLyMW9B0pVb70vRGaLl6Ogi0mi4dX34z8', '2022-04-23 18:43:57', '2022-04-23 18:43:57', 1),
(2, 'asd1', 'test@test.com', NULL, '$2y$10$jy7bs03WN8Uo46Z.EDXRw.h1lQGfFjwL.CWFP.eh/iTpeLFz6VMnu', NULL, '2022-04-24 10:39:58', '2022-04-26 18:08:01', 0),
(3, 'barna', 'intelbarna97@gmail.com', NULL, '$2y$10$gqsSRbXolg9HnzWOJZ86j.hCKt4O7/y0XjmQ5Kc4hroL/8CLJOF.2', NULL, '2022-05-23 14:57:01', '2022-05-23 14:57:01', 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- A tábla indexei `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- A tábla indexei `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `league_id` (`league_id`),
  ADD KEY `team1_id` (`team1_id`),
  ADD KEY `team2_id` (`team2_id`);

--
-- A tábla indexei `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- A tábla indexei `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- A tábla indexei `predictions`
--
ALTER TABLE `predictions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_id` (`match_id`);

--
-- A tábla indexei `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `league_id` (`league_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `leagues`
--
ALTER TABLE `leagues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT a táblához `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `predictions`
--
ALTER TABLE `predictions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT a táblához `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`league_id`) REFERENCES `leagues` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `games_ibfk_2` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `games_ibfk_3` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `leagues`
--
ALTER TABLE `leagues`
  ADD CONSTRAINT `leagues_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `predictions`
--
ALTER TABLE `predictions`
  ADD CONSTRAINT `predictions_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `games` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `predictions_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `games` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teams_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teams_ibfk_3` FOREIGN KEY (`league_id`) REFERENCES `leagues` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
