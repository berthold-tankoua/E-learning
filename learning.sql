-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 21 fév. 2026 à 20:12
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `learning`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$VdqSCZQF5n55.ZQLrXAiw.4madB87ls4Fh8euaMS6XHuHL1W1bMRm', '6Mzr8cFCVKOGM36r6f8wUeD4GL0RtgB3moDsNQd5MX4ZZdTx8bc9PXMSO8mn', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_fr` varchar(255) NOT NULL,
  `brand_slug_fr` varchar(255) NOT NULL,
  `brand_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_fr`, `brand_slug_fr`, `brand_image`, `created_at`, `updated_at`) VALUES
(1, 'youtube', 'youtube', '2212130325logo (2).png', NULL, NULL),
(2, 'Agencedigitals', 'agencedigitals', '2212150307ad-logo-transparent.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_fr` varchar(255) NOT NULL,
  `category_slug_fr` varchar(255) NOT NULL,
  `category_icon` varchar(255) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `category_name_fr`, `category_slug_fr`, `category_icon`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 'Infographie', 'infographie', 'icon fa fa-pencil', 'upload/categories/1752113516255050.png', '2022-12-13 14:34:20', NULL),
(2, 'Cryptomonnaie', 'cryptomonnaie', 'icon fa fa-bitcoin', 'upload/categories/1752113838752477.jpg', '2022-12-13 14:39:28', NULL),
(3, 'Marketing', 'marketing-digital', 'icon fa fa-shopping-bag', 'upload/categories/1752113934421866.jpg', '2022-12-13 14:40:59', NULL),
(4, 'Programmation', 'programmation', 'icon fa fa-code', 'upload/categories/1752114044580886.jpg', '2022-12-13 14:42:43', NULL),
(5, 'Formations', 'formations', 'icon fa fa-graduation-cap', 'upload/categories/1752824110159619.jpg', '2022-12-21 10:48:58', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `course_id`, `user_id`, `name`, `email`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, NULL, 'brecht', 'brtankoua@gmail.com', 'Superbe formation gratuite, ca m\'a bcp aidé', '1', '2022-12-17 19:15:27', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `channel_id` varchar(255) DEFAULT NULL,
  `channel_title` varchar(255) DEFAULT NULL,
  `video_id` varchar(255) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `thumburl` varchar(255) DEFAULT NULL,
  `avis` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lessons`
--

INSERT INTO `lessons` (`id`, `course_id`, `channel_id`, `channel_title`, `video_id`, `video_title`, `thumburl`, `avis`, `created_at`, `updated_at`) VALUES
(5, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'u5W2NWItytc', 'HTML/CSS #1 - introduction', 'https://i.ytimg.com/vi/u5W2NWItytc/hqdefault.jpg', NULL, '2022-12-17 10:35:46', NULL),
(6, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'Fi8fj_JY91o', 'HTML/CSS #2 - première page web', 'https://i.ytimg.com/vi/Fi8fj_JY91o/hqdefault.jpg', NULL, '2022-12-17 10:35:47', NULL),
(7, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', '1sPjNkKGMsY', 'HTML/CSS #3 - fonctionnement balises', 'https://i.ytimg.com/vi/1sPjNkKGMsY/hqdefault.jpg', NULL, '2022-12-17 10:35:47', NULL),
(8, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'w2knKi0ZQps', 'HTML/CSS #4 - formatage texte (1/2)', 'https://i.ytimg.com/vi/w2knKi0ZQps/hqdefault.jpg', NULL, '2022-12-17 10:35:48', NULL),
(9, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'HSWzav5yc6Y', 'HTML/CSS #5 - formatage texte (2/2)', 'https://i.ytimg.com/vi/HSWzav5yc6Y/hqdefault.jpg', NULL, '2022-12-17 10:35:49', NULL),
(10, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'ce2mpuSTz0E', 'HTML/CSS #6 - formatage technique', 'https://i.ytimg.com/vi/ce2mpuSTz0E/hqdefault.jpg', NULL, '2022-12-17 10:35:50', NULL),
(11, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'zKgNS-m572U', 'HTML/CSS #7 - listes', 'https://i.ytimg.com/vi/zKgNS-m572U/hqdefault.jpg', NULL, '2022-12-17 10:35:50', NULL),
(12, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'yTp_qgvM1LU', 'HTML/CSS #8 - tableaux', 'https://i.ytimg.com/vi/yTp_qgvM1LU/hqdefault.jpg', NULL, '2022-12-17 10:35:50', NULL),
(13, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'L6ld1B2Q98Y', 'HTML/CSS #9 - formulaires (1/2)', 'https://i.ytimg.com/vi/L6ld1B2Q98Y/hqdefault.jpg', NULL, '2022-12-17 10:35:50', NULL),
(14, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'zmJ2rHL5UfM', 'HTML/CSS #10 - formulaires (2/2)', 'https://i.ytimg.com/vi/zmJ2rHL5UfM/hqdefault.jpg', NULL, '2022-12-17 10:35:50', NULL),
(15, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'VXZ5mP8jUWw', 'HTML/CSS #11 - images', 'https://i.ytimg.com/vi/VXZ5mP8jUWw/hqdefault.jpg', NULL, '2022-12-17 10:35:50', NULL),
(16, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'XSJj1uKF1RU', 'HTML/CSS #12 - sons et vidéos', 'https://i.ytimg.com/vi/XSJj1uKF1RU/hqdefault.jpg', NULL, '2022-12-17 10:35:51', NULL),
(17, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'kvjz6GyiQsE', 'HTML/CSS #13 - structurer page web', 'https://i.ytimg.com/vi/kvjz6GyiQsE/hqdefault.jpg', NULL, '2022-12-17 10:35:51', NULL),
(18, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'l10hhz0VJj4', 'HTML/CSS #14 - introduction design', 'https://i.ytimg.com/vi/l10hhz0VJj4/hqdefault.jpg', NULL, '2022-12-17 10:35:51', NULL),
(19, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'n4H0nod_gHY', 'HTML/CSS #15 - styliser texte (1/2)', 'https://i.ytimg.com/vi/n4H0nod_gHY/hqdefault.jpg', NULL, '2022-12-17 10:35:51', NULL),
(20, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'K9UciHsxieI', 'HTML/CSS #16 - styliser texte (2/2)', 'https://i.ytimg.com/vi/K9UciHsxieI/hqdefault.jpg', NULL, '2022-12-17 10:35:51', NULL),
(21, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'txiwOU0gUlw', 'HTML/CSS #17 - couleur et fond', 'https://i.ytimg.com/vi/txiwOU0gUlw/hqdefault.jpg', NULL, '2022-12-17 10:35:52', NULL),
(22, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'yMFEqm_8D5k', 'HTML/CSS #18 - styliser liste', 'https://i.ytimg.com/vi/yMFEqm_8D5k/hqdefault.jpg', NULL, '2022-12-17 10:35:52', NULL),
(23, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'ByUtms52CGc', 'HTML/CSS #19 - modèle de boîte', 'https://i.ytimg.com/vi/ByUtms52CGc/hqdefault.jpg', NULL, '2022-12-17 10:35:52', NULL),
(24, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', '9GWjxAcGzVQ', 'HTML/CSS #20 - bordures et contours', 'https://i.ytimg.com/vi/9GWjxAcGzVQ/hqdefault.jpg', NULL, '2022-12-17 10:35:52', NULL),
(25, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'uT9hw2wpL9c', 'HTML/CSS #21 - affichage et positionnement', 'https://i.ytimg.com/vi/uT9hw2wpL9c/hqdefault.jpg', NULL, '2022-12-17 10:35:52', NULL),
(26, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'E-AphbscmP8', 'HTML/CSS #22 - modèle avancé de boîte', 'https://i.ytimg.com/vi/E-AphbscmP8/hqdefault.jpg', NULL, '2022-12-17 10:35:52', NULL),
(27, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', '_RiiOPQ5CcU', 'HTML/CSS #23 - flexbox', 'https://i.ytimg.com/vi/_RiiOPQ5CcU/hqdefault.jpg', NULL, '2022-12-17 10:35:52', NULL),
(28, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'wItB9sia1rg', 'HTML/CSS #24 - grid', 'https://i.ytimg.com/vi/wItB9sia1rg/hqdefault.jpg', NULL, '2022-12-17 10:35:52', NULL),
(29, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', '_p8abfdp_Co', 'HTML/CSS #25 - media queries', 'https://i.ytimg.com/vi/_p8abfdp_Co/hqdefault.jpg', NULL, '2022-12-17 10:35:53', NULL),
(30, 3, 'UCS2e0hEJMhwd6bNscS60xTg', 'FormationVidéo', 'yQDqF9IxhIU', 'HTML/CSS #26 - conclusion', 'https://i.ytimg.com/vi/yQDqF9IxhIU/hqdefault.jpg', NULL, '2022-12-17 10:35:53', NULL),
(31, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'SbR0-dGg3tE', 'Formation Laravel 8 - 1/26 - Introduction et Prérequis', 'https://i.ytimg.com/vi/SbR0-dGg3tE/hqdefault.jpg', NULL, '2022-12-18 03:50:23', NULL),
(32, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'UHxCIwABV6Q', 'Formation Laravel 8 - 2/26 - Création d\'un projet Laravel', 'https://i.ytimg.com/vi/UHxCIwABV6Q/hqdefault.jpg', NULL, '2022-12-18 03:50:23', NULL),
(33, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'loJf5gtidN0', 'Formation Laravel 8 - 3/26 - Le script artisan', 'https://i.ytimg.com/vi/loJf5gtidN0/hqdefault.jpg', NULL, '2022-12-18 03:50:23', NULL),
(34, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'vm6rGJW9KIo', 'Formation Laravel 8 - 4/26 - Structure d\'un projet Laravel', 'https://i.ytimg.com/vi/vm6rGJW9KIo/hqdefault.jpg', NULL, '2022-12-18 03:50:24', NULL),
(35, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'l7K9H4QyYLk', 'Formation Laravel 8 - 5/26 - Routes et Vues', 'https://i.ytimg.com/vi/l7K9H4QyYLk/hqdefault.jpg', NULL, '2022-12-18 03:50:24', NULL),
(36, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', '76uCwQ0u6zQ', 'Formation Laravel 8 - 6/26 - Ajout de la page À propos', 'https://i.ytimg.com/vi/76uCwQ0u6zQ/hqdefault.jpg', NULL, '2022-12-18 03:50:24', NULL),
(37, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'oKJ4VBAR2uk', 'Formation Laravel 8 - 7/26 - Un sous-dossier pour nos pages statiques', 'https://i.ytimg.com/vi/oKJ4VBAR2uk/hqdefault.jpg', NULL, '2022-12-18 03:50:24', NULL),
(38, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'UqKwaNdeoJU', 'Formation Laravel 8 - 8/26 - Layouts et sections', 'https://i.ytimg.com/vi/UqKwaNdeoJU/hqdefault.jpg', NULL, '2022-12-18 03:50:24', NULL),
(39, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'RSu0hyYN_4Q', 'Formation Laravel 8 - 9/26 - Astuces avec les sections Blade', 'https://i.ytimg.com/vi/RSu0hyYN_4Q/hqdefault.jpg', NULL, '2022-12-18 03:50:25', NULL),
(40, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'XNEWZdQZrlo', 'Formation Laravel 8 - 10/26 - Variables d\'environnement', 'https://i.ytimg.com/vi/XNEWZdQZrlo/hqdefault.jpg', NULL, '2022-12-18 03:50:25', NULL),
(41, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'bFIaeiE7wVA', 'Formation Laravel 8 - 11/26 - Variables de configuration', 'https://i.ytimg.com/vi/bFIaeiE7wVA/hqdefault.jpg', NULL, '2022-12-18 03:50:25', NULL),
(42, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'ZegV8B6jB1o', 'Formation Laravel 8 - 12/26 - Mise en cache de la configuration', 'https://i.ytimg.com/vi/ZegV8B6jB1o/hqdefault.jpg', NULL, '2022-12-18 03:50:25', NULL),
(43, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'gxbCY1efCDk', 'Formation Laravel 8 - 13/26 - Utilité des noms de route', 'https://i.ytimg.com/vi/gxbCY1efCDk/hqdefault.jpg', NULL, '2022-12-18 03:50:25', NULL),
(44, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'Hu0U6s4mzoA', 'Formation Laravel 8 - 14/26 - Déterminer la route courante', 'https://i.ytimg.com/vi/Hu0U6s4mzoA/hqdefault.jpg', NULL, '2022-12-18 03:50:25', NULL),
(45, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'poIBc_eMb5g', 'Formation Laravel 8 - 15/26 - Utilité des alias de classes', 'https://i.ytimg.com/vi/poIBc_eMb5g/hqdefault.jpg', NULL, '2022-12-18 03:50:25', NULL),
(46, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'mKzUTgevj2Y', 'Formation Laravel 8 - 16/26 - Ajout et Affichage d\'images', 'https://i.ytimg.com/vi/mKzUTgevj2Y/hqdefault.jpg', NULL, '2022-12-18 03:50:25', NULL),
(47, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'bwbiH3EB3T8', 'Formation Laravel 8 - 17/26 - Utilité de la fonction helper asset', 'https://i.ytimg.com/vi/bwbiH3EB3T8/hqdefault.jpg', NULL, '2022-12-18 03:50:25', NULL),
(48, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'XQ9c36b0G5Q', 'Formation Laravel 8 - 18/26 - Génération de la valeur de l\'attribut lang', 'https://i.ytimg.com/vi/XQ9c36b0G5Q/hqdefault.jpg', NULL, '2022-12-18 03:50:26', NULL),
(49, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'j46T6ufETqw', 'Formation Laravel 8 - 19/26 - Stylisation avec le framework Tailwind CSS', 'https://i.ytimg.com/vi/j46T6ufETqw/hqdefault.jpg', NULL, '2022-12-18 03:50:26', NULL),
(50, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'ROlg1eYwKY4', 'Formation Laravel 8 - 20/26 - Déploiement avec Heroku', 'https://i.ytimg.com/vi/ROlg1eYwKY4/hqdefault.jpg', NULL, '2022-12-18 03:50:26', NULL),
(51, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'LYVpQXlSmCg', 'Formation Laravel 8 - 21/26 - Les partials', 'https://i.ytimg.com/vi/LYVpQXlSmCg/hqdefault.jpg', NULL, '2022-12-18 03:50:26', NULL),
(52, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'PRy19kyyLck', 'Formation Laravel 8 - 22/26 - Variables de layouts (1/2)', 'https://i.ytimg.com/vi/PRy19kyyLck/hqdefault.jpg', NULL, '2022-12-18 03:50:26', NULL),
(53, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', '86A2l9f7-Ng', 'Formation Laravel 8 - 23/26 - Variables de layouts (2/2)', 'https://i.ytimg.com/vi/86A2l9f7-Ng/hqdefault.jpg', NULL, '2022-12-18 03:50:26', NULL),
(54, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'xsGLY5AAAHY', 'Formation Laravel 8 - 24/26 - Les fonctions helpers', 'https://i.ytimg.com/vi/xsGLY5AAAHY/hqdefault.jpg', NULL, '2022-12-18 03:50:26', NULL),
(55, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', '4eprrRZ0O-U', 'Formation Laravel 8 - 25/26 - Fonctions fléchées et Route::View', 'https://i.ytimg.com/vi/4eprrRZ0O-U/hqdefault.jpg', NULL, '2022-12-18 03:50:26', NULL),
(56, 2, 'UCzuaB4F2znrMggxcwUuVhAw', 'LES TEACHERS DU NET', 'DgZDXCuqg3s', 'Formation Laravel 8 - 26/26 - Création d\'un dépôt GitHub', 'https://i.ytimg.com/vi/DgZDXCuqg3s/hqdefault.jpg', NULL, '2022-12-18 03:50:26', NULL),
(57, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'aE23W1Tf_ZU', 'laravel 9 tutorial #1 what is Laravel', 'https://i.ytimg.com/vi/aE23W1Tf_ZU/hqdefault.jpg', NULL, '2022-12-18 03:53:37', NULL),
(58, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', '9fC5zmvbDwU', 'Laravel 9 tutorial #2 Prerequisites | Important points before start with Laravel', 'https://i.ytimg.com/vi/9fC5zmvbDwU/hqdefault.jpg', NULL, '2022-12-18 03:53:37', NULL),
(59, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'k6cPFf0i0Cc', 'Laravel 9 tutorial #3 What is MVC in laravel', 'https://i.ytimg.com/vi/k6cPFf0i0Cc/hqdefault.jpg', NULL, '2022-12-18 03:53:37', NULL),
(60, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'z9iY_Tw8Ul0', 'Laravel 9 tutorial #4 install Xampp | download PHP and MySql', 'https://i.ytimg.com/vi/z9iY_Tw8Ul0/hqdefault.jpg', NULL, '2022-12-18 03:53:38', NULL),
(61, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', '0qZF6lW9Fto', 'Laravel 9 tutorial #5 laravel composer install | What is Composer', 'https://i.ytimg.com/vi/0qZF6lW9Fto/hqdefault.jpg', NULL, '2022-12-18 03:53:38', NULL),
(62, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'GKA-2P9lXlA', 'Laravel 9 tutorial #6 Install Laravel  | Create Laravel Application', 'https://i.ytimg.com/vi/GKA-2P9lXlA/hqdefault.jpg', NULL, '2022-12-18 03:53:38', NULL),
(63, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'Y2dyLlYHyzg', 'Laravel 8 tutorial # Folder and file structure', 'https://i.ytimg.com/vi/Y2dyLlYHyzg/hqdefault.jpg', NULL, '2022-12-18 03:53:38', NULL),
(64, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', '54WJepj8siE', 'Laravel 8 tutorial # Make first file', 'https://i.ytimg.com/vi/54WJepj8siE/hqdefault.jpg', NULL, '2022-12-18 03:53:38', NULL),
(65, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'dxHTkqSpz-w', 'Laravel 8 tutorial # Routing with example', 'https://i.ytimg.com/vi/dxHTkqSpz-w/hqdefault.jpg', NULL, '2022-12-18 03:53:38', NULL),
(66, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'X0yYnGb9RtM', 'Laravel 8 tutorial # controller', 'https://i.ytimg.com/vi/X0yYnGb9RtM/hqdefault.jpg', NULL, '2022-12-18 03:53:38', NULL),
(67, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', '79fjVrH7Ph8', 'Laravel 8 tutorial # View', 'https://i.ytimg.com/vi/79fjVrH7Ph8/hqdefault.jpg', NULL, '2022-12-18 03:53:38', NULL),
(68, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'lqtqEsk1Jl0', 'Laravel 9 tutorial # URL generation in laravel #laravel9', 'https://i.ytimg.com/vi/lqtqEsk1Jl0/hqdefault.jpg', NULL, '2022-12-18 03:53:39', NULL),
(69, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'jJBs2dlj75Y', 'Laravel 8 tutorial # Component', 'https://i.ytimg.com/vi/jJBs2dlj75Y/hqdefault.jpg', NULL, '2022-12-18 03:53:39', NULL),
(70, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'qCK7exhFZLs', 'Laravel 8 tutorial # Blade Template', 'https://i.ytimg.com/vi/qCK7exhFZLs/hqdefault.jpg', NULL, '2022-12-18 03:53:39', NULL),
(71, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'j7PQYHpFQJs', 'Laravel 8 tutorial -  Blade Template | Header | Footer', 'https://i.ytimg.com/vi/j7PQYHpFQJs/hqdefault.jpg', NULL, '2022-12-18 03:53:39', NULL),
(72, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', '8DCF4Im8tKM', 'Laravel 9 tutorial # Inline Blade template | laravel new feature', 'https://i.ytimg.com/vi/8DCF4Im8tKM/hqdefault.jpg', NULL, '2022-12-18 03:53:39', NULL),
(73, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'A-PCuzCTLWU', 'Laravel 8 tutorial - Submit HTML form', 'https://i.ytimg.com/vi/A-PCuzCTLWU/hqdefault.jpg', NULL, '2022-12-18 03:53:39', NULL),
(74, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', '-u-xcYC7TKg', 'Laravel 8 tutorial - Form Validation', 'https://i.ytimg.com/vi/-u-xcYC7TKg/hqdefault.jpg', NULL, '2022-12-18 03:53:39', NULL),
(75, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'O0r7eQRZO3I', 'Laravel 8 tutorial - What is middleware', 'https://i.ytimg.com/vi/O0r7eQRZO3I/hqdefault.jpg', NULL, '2022-12-18 03:53:39', NULL),
(76, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'cvTR7sL3T50', 'Laravel 8 tutorial - Group middleware', 'https://i.ytimg.com/vi/cvTR7sL3T50/hqdefault.jpg', NULL, '2022-12-18 03:53:40', NULL),
(77, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'UNFCw9nf8_Q', 'Laravel 8 tutorial - Route middleware', 'https://i.ytimg.com/vi/UNFCw9nf8_Q/hqdefault.jpg', NULL, '2022-12-18 03:53:40', NULL),
(78, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'Y-hM4nepJ8o', 'Laravel 8 tutorial - Database configuration and Fetch Data', 'https://i.ytimg.com/vi/Y-hM4nepJ8o/hqdefault.jpg', NULL, '2022-12-18 03:53:40', NULL),
(79, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'TCpNMofO3iA', 'Laravel 8 tutorial - Model', 'https://i.ytimg.com/vi/TCpNMofO3iA/hqdefault.jpg', NULL, '2022-12-18 03:53:40', NULL),
(80, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'L-PCVFvhDZ0', 'Laravel 8 tutorial - Http Client', 'https://i.ytimg.com/vi/L-PCVFvhDZ0/hqdefault.jpg', NULL, '2022-12-18 03:53:40', NULL),
(81, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', '56rfoQoOaF4', 'Laravel 8 tutorial - Http Request Methods', 'https://i.ytimg.com/vi/56rfoQoOaF4/hqdefault.jpg', NULL, '2022-12-18 03:53:40', NULL),
(82, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'idw3k9EvmcE', 'Laravel 8 tutorial - Session | with login example', 'https://i.ytimg.com/vi/idw3k9EvmcE/hqdefault.jpg', NULL, '2022-12-18 03:53:40', NULL),
(83, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'Pmk53CLXm-g', 'Laravel 8 tutorial - Flash Session | Example', 'https://i.ytimg.com/vi/Pmk53CLXm-g/hqdefault.jpg', NULL, '2022-12-18 03:53:40', NULL),
(84, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'OOGmH-tTilA', 'Laravel 8 tutorial - File Upload', 'https://i.ytimg.com/vi/OOGmH-tTilA/hqdefault.jpg', NULL, '2022-12-18 03:53:40', NULL),
(85, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'ytuQ8oezLDw', 'Laravel 8 tutorial - Localization | locale', 'https://i.ytimg.com/vi/ytuQ8oezLDw/hqdefault.jpg', NULL, '2022-12-18 03:53:40', NULL),
(86, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'y3p10h_00A8', 'Laravel 8 tutorial - Show List from Database Table', 'https://i.ytimg.com/vi/y3p10h_00A8/hqdefault.jpg', NULL, '2022-12-18 03:53:40', NULL),
(87, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'vvf8e-1X4os', 'Laravel 8 tutorial - Pagination with Database', 'https://i.ytimg.com/vi/vvf8e-1X4os/hqdefault.jpg', NULL, '2022-12-18 03:53:41', NULL),
(88, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'xaMhrkr2Okw', 'Laravel 8 tutorial - Save Data in Database', 'https://i.ytimg.com/vi/xaMhrkr2Okw/hqdefault.jpg', NULL, '2022-12-18 03:53:41', NULL),
(89, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', '6PdI4hHGq4Q', 'Laravel 8 tutorial - Delete Data in Database', 'https://i.ytimg.com/vi/6PdI4hHGq4Q/hqdefault.jpg', NULL, '2022-12-18 03:53:41', NULL),
(90, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'i8P3Et1Q-K8', 'Laravel 8 tutorial - Update Data in Database', 'https://i.ytimg.com/vi/i8P3Et1Q-K8/hqdefault.jpg', NULL, '2022-12-18 03:53:41', NULL),
(91, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'mSseJJoePZg', 'Laravel 8 tutorial - Query Builder', 'https://i.ytimg.com/vi/mSseJJoePZg/hqdefault.jpg', NULL, '2022-12-18 03:53:41', NULL),
(92, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'gbj8KX3pcGo', 'Laravel 8 tutorial -  Aggregate methods | sum,avg,min,max etc', 'https://i.ytimg.com/vi/gbj8KX3pcGo/hqdefault.jpg', NULL, '2022-12-18 03:53:41', NULL),
(93, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'wkNkgkFePTg', 'Laravel 8 tutorial - Joins', 'https://i.ytimg.com/vi/wkNkgkFePTg/hqdefault.jpg', NULL, '2022-12-18 03:53:41', NULL),
(94, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', '8USJR_D8pIk', 'Laravel 8 tutorial - Migration', 'https://i.ytimg.com/vi/8USJR_D8pIk/hqdefault.jpg', NULL, '2022-12-18 03:53:41', NULL),
(95, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'Uo0OJvXeknI', 'Laravel 8 tutorial - Important Migration command for interview', 'https://i.ytimg.com/vi/Uo0OJvXeknI/hqdefault.jpg', NULL, '2022-12-18 03:53:41', NULL),
(96, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'SLEWYV43Jxo', 'Laravel 8 tutorial - Seeding', 'https://i.ytimg.com/vi/SLEWYV43Jxo/hqdefault.jpg', NULL, '2022-12-18 03:53:41', NULL),
(97, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'B7bVaWL6BPU', 'Laravel 8 tutorial - Accessors', 'https://i.ytimg.com/vi/B7bVaWL6BPU/hqdefault.jpg', NULL, '2022-12-18 03:53:41', NULL),
(98, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'uckmICzusv0', 'Laravel 8 tutorial - Mutator', 'https://i.ytimg.com/vi/uckmICzusv0/hqdefault.jpg', NULL, '2022-12-18 03:53:42', NULL),
(99, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'OSiio-7UkZw', 'Laravel 8 tutorial - One to One Relation', 'https://i.ytimg.com/vi/OSiio-7UkZw/hqdefault.jpg', NULL, '2022-12-18 03:53:42', NULL),
(100, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'zZRvuvrFBB0', 'Laravel 8 tutorial - One to Many Relation', 'https://i.ytimg.com/vi/zZRvuvrFBB0/hqdefault.jpg', NULL, '2022-12-18 03:53:42', NULL),
(101, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', '8am2rMlukm8', 'Laravel 8 tutorial - Stub', 'https://i.ytimg.com/vi/8am2rMlukm8/hqdefault.jpg', NULL, '2022-12-18 03:53:42', NULL),
(102, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'aloKRHa8yuM', 'Laravel 8 tutorial - Fluent Strings', 'https://i.ytimg.com/vi/aloKRHa8yuM/hqdefault.jpg', NULL, '2022-12-18 03:53:42', NULL),
(103, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'EjVT_0Iqq3E', 'Laravel 8 tutorial - Route Model Binding', 'https://i.ytimg.com/vi/EjVT_0Iqq3E/hqdefault.jpg', NULL, '2022-12-18 03:53:42', NULL),
(104, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', '4qyfHX_zLj0', 'Laravel 8 - 7 tutorial - Markdown Mail Template', 'https://i.ytimg.com/vi/4qyfHX_zLj0/hqdefault.jpg', NULL, '2022-12-18 03:53:42', NULL),
(105, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', 'rbzoQ9e60Co', 'Laravel 8 tutorial - Make Custom Command', 'https://i.ytimg.com/vi/rbzoQ9e60Co/hqdefault.jpg', NULL, '2022-12-18 03:53:42', NULL),
(106, 5, 'UCvHX2bCZG2m9ddUhwxudKYA', 'Code Step By Step', '0nJwYGvmX5M', 'Laravel 8 tutorial - Multiple Database Connection', 'https://i.ytimg.com/vi/0nJwYGvmX5M/hqdefault.jpg', NULL, '2022-12-18 03:53:42', NULL),
(107, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'asToYAq0F-I', 'La formation JavaScript 2022 est en ligne !', 'https://i.ytimg.com/vi/asToYAq0F-I/hqdefault.jpg', NULL, '2022-12-18 04:20:43', NULL),
(108, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'GU8kxJ3P67I', 'Apprendre le JavaScript : Les variables', 'https://i.ytimg.com/vi/GU8kxJ3P67I/hqdefault.jpg', NULL, '2022-12-18 04:20:45', NULL),
(109, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'gUYfRJ-v_1Y', 'Apprendre le JavaScript : Introduction à la formation', 'https://i.ytimg.com/vi/gUYfRJ-v_1Y/hqdefault.jpg', NULL, '2022-12-18 04:20:45', NULL),
(110, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'zwLmRotDdu8', 'Apprendre le JavaScript : Les conditions', 'https://i.ytimg.com/vi/zwLmRotDdu8/hqdefault.jpg', NULL, '2022-12-18 04:20:45', NULL),
(111, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'qYuvcK8QU4c', 'Apprendre le JavaScript : La portée des variables', 'https://i.ytimg.com/vi/qYuvcK8QU4c/hqdefault.jpg', NULL, '2022-12-18 04:20:45', NULL),
(112, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'kLdQAsrcyvk', 'Apprendre le JavaScript : Les boucles', 'https://i.ytimg.com/vi/kLdQAsrcyvk/hqdefault.jpg', NULL, '2022-12-18 04:20:45', NULL),
(113, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'EvHAiskwHvE', 'Apprendre le JavaScript : Les fonctions', 'https://i.ytimg.com/vi/EvHAiskwHvE/hqdefault.jpg', NULL, '2022-12-18 04:20:45', NULL),
(114, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'wVuJTS8aQyA', 'Apprendre le JavaScript : Pratiquons les fonctions', 'https://i.ytimg.com/vi/wVuJTS8aQyA/hqdefault.jpg', NULL, '2022-12-18 04:20:45', NULL),
(115, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', '2HAPViIAYjc', 'Apprendre le JavaScript : Les classes', 'https://i.ytimg.com/vi/2HAPViIAYjc/hqdefault.jpg', NULL, '2022-12-18 04:20:46', NULL),
(116, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', '6tC4tv9MlkI', 'Apprendre le JavaScript : Pratiquons les class', 'https://i.ytimg.com/vi/6tC4tv9MlkI/hqdefault.jpg', NULL, '2022-12-18 04:20:46', NULL),
(117, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'OSHPfiuDbqM', 'Apprendre le JavaScript : Les erreurs', 'https://i.ytimg.com/vi/OSHPfiuDbqM/hqdefault.jpg', NULL, '2022-12-18 04:20:46', NULL),
(118, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'ZocfMM0qofA', 'Apprendre le JavaScript : Les fonctions usuelles', 'https://i.ytimg.com/vi/ZocfMM0qofA/hqdefault.jpg', NULL, '2022-12-18 04:20:47', NULL),
(119, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'Qvr6Nh7rtAI', 'Apprendre le JavaScript : Le sucre syntaxique', 'https://i.ytimg.com/vi/Qvr6Nh7rtAI/hqdefault.jpg', NULL, '2022-12-18 04:20:47', NULL),
(120, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'kwcFfskBaag', 'Apprendre le JavaScript : Les timers', 'https://i.ytimg.com/vi/kwcFfskBaag/hqdefault.jpg', NULL, '2022-12-18 04:20:47', NULL),
(121, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', '05mKXSdkCJg', 'Apprendre le JavaScript : Promise', 'https://i.ytimg.com/vi/05mKXSdkCJg/hqdefault.jpg', NULL, '2022-12-18 04:20:47', NULL),
(122, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'z9pcgJX1DdY', 'Apprendre le JavaScript : Appel HTTP avec fetch()', 'https://i.ytimg.com/vi/z9pcgJX1DdY/hqdefault.jpg', NULL, '2022-12-18 04:20:48', NULL),
(123, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'DJewHNOFqD0', 'Apprendre le JavaScript : Les modules', 'https://i.ytimg.com/vi/DJewHNOFqD0/hqdefault.jpg', NULL, '2022-12-18 04:20:48', NULL),
(124, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', '9U-RgCzN9mI', 'Apprendre le JavaScript : Commentaires et JSDoc', 'https://i.ytimg.com/vi/9U-RgCzN9mI/hqdefault.jpg', NULL, '2022-12-18 04:20:48', NULL),
(125, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'AD28PddTwEE', 'Apprendre le JavaScript : L\'objet Date', 'https://i.ytimg.com/vi/AD28PddTwEE/hqdefault.jpg', NULL, '2022-12-18 04:20:48', NULL),
(126, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'O41U3fOOhvA', 'Apprendre le JavaScript : Que faire maintenant ? Front-end ou Back-end ?', 'https://i.ytimg.com/vi/O41U3fOOhvA/hqdefault.jpg', NULL, '2022-12-18 04:20:48', NULL),
(127, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'Kh0drIcQ2UI', 'Apprendre le JavaScript : JavaScript côté navigateur', 'https://i.ytimg.com/vi/Kh0drIcQ2UI/hqdefault.jpg', NULL, '2022-12-18 04:20:48', NULL),
(128, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'sXwPfnsKGiE', 'JavaScript côté navigateur : Manipuler le DOM', 'https://i.ytimg.com/vi/sXwPfnsKGiE/hqdefault.jpg', NULL, '2022-12-18 04:20:48', NULL),
(129, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'Rm8kxBf5Eoc', 'JavaScript côté navigateur : Pratiquons avec une TodoList', 'https://i.ytimg.com/vi/Rm8kxBf5Eoc/hqdefault.jpg', NULL, '2022-12-18 04:20:49', NULL),
(130, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', '55EXq7ZjL4Q', 'JavaScript côté navigateur : Les écouteurs d\'évènements', 'https://i.ytimg.com/vi/55EXq7ZjL4Q/hqdefault.jpg', NULL, '2022-12-18 04:20:49', NULL),
(131, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'TicxcEDiP3U', 'JavaScript côté navigateur : Les templates', 'https://i.ytimg.com/vi/TicxcEDiP3U/hqdefault.jpg', NULL, '2022-12-18 04:20:49', NULL),
(132, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', '7e4EMDOeiYE', 'JavaScript côté navigateur : Évènements personnalisés', 'https://i.ytimg.com/vi/7e4EMDOeiYE/hqdefault.jpg', NULL, '2022-12-18 04:20:49', NULL),
(133, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'PmrHg7q5raw', 'JavaScript côté navigateur : Local Storage', 'https://i.ytimg.com/vi/PmrHg7q5raw/hqdefault.jpg', NULL, '2022-12-18 04:20:50', NULL),
(134, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', '9AdBFTM2lVM', 'JavaScript côté navigateur : Manipuler les cookies', 'https://i.ytimg.com/vi/9AdBFTM2lVM/hqdefault.jpg', NULL, '2022-12-18 04:20:50', NULL),
(135, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'rcShQM00mIM', 'JavaScript côté navigateur : Inspecter son code JavaScript', 'https://i.ytimg.com/vi/rcShQM00mIM/hqdefault.jpg', NULL, '2022-12-18 04:20:50', NULL),
(136, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'p2UW7Wptlow', 'JavaScript côté navigateur : Fonctions usuelles du DOM', 'https://i.ytimg.com/vi/p2UW7Wptlow/hqdefault.jpg', NULL, '2022-12-18 04:20:50', NULL),
(137, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'N3l-kV4nczo', 'JavaScript côté navigateur : IntersectionObserver', 'https://i.ytimg.com/vi/N3l-kV4nczo/hqdefault.jpg', NULL, '2022-12-18 04:20:50', NULL),
(138, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', '3Hrhuz8-w2M', 'Apprendre le JavaScript : TP ScrollSpy', 'https://i.ytimg.com/vi/3Hrhuz8-w2M/hqdefault.jpg', NULL, '2022-12-18 04:20:50', NULL),
(139, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', '__3lzaZS3yc', 'JavaScript côté navigateur : TP : Système de commentaire', 'https://i.ytimg.com/vi/__3lzaZS3yc/hqdefault.jpg', NULL, '2022-12-18 04:20:50', NULL),
(140, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', '1hHVvuShsGo', 'Apprendre le JavaScript : TP, Créer un Carousel (1/4)', 'https://i.ytimg.com/vi/1hHVvuShsGo/hqdefault.jpg', NULL, '2022-12-18 04:20:50', NULL),
(141, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'WXaDeTmZTgk', 'Apprendre le JavaScript : TP, Créer un Carousel, Pagination (2/4)', 'https://i.ytimg.com/vi/WXaDeTmZTgk/hqdefault.jpg', NULL, '2022-12-18 04:20:50', NULL),
(142, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'eBiNsThWR70', 'Apprendre le JavaScript : TP, Créer un Carousel, Défilement infini (3/4)', 'https://i.ytimg.com/vi/eBiNsThWR70/hqdefault.jpg', NULL, '2022-12-18 04:20:50', NULL),
(143, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'jAYyeRjQJdQ', 'Apprendre le JavaScript : TP, Créer un Carousel, Gestion du tactile (4/4)', 'https://i.ytimg.com/vi/jAYyeRjQJdQ/hqdefault.jpg', NULL, '2022-12-18 04:20:51', NULL),
(144, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'o5UAtZUx7l0', 'Apprendre le JavaScript : JavaScript côté serveur', 'https://i.ytimg.com/vi/o5UAtZUx7l0/hqdefault.jpg', NULL, '2022-12-18 04:20:51', NULL),
(145, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'bunBbhY4da4', 'JavaScript côté serveur : Installer NodeJS sur Windows', 'https://i.ytimg.com/vi/bunBbhY4da4/hqdefault.jpg', NULL, '2022-12-18 04:20:51', NULL),
(146, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'g01qBs1CpAc', 'JavaScript côté serveur : Installer NodeJS avec Volta', 'https://i.ytimg.com/vi/g01qBs1CpAc/hqdefault.jpg', NULL, '2022-12-18 04:20:51', NULL),
(147, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'cT6b6_XzFmI', 'JavaScript côté serveur : Lire et écrire des fichiers', 'https://i.ytimg.com/vi/cT6b6_XzFmI/hqdefault.jpg', NULL, '2022-12-18 04:20:51', NULL),
(148, 1, 'UCj_iGliGCkLcHSZ8eqVNPDQ', 'Grafikart.fr', 'O2v_ghJlVAA', 'JavaScript côté serveur : Les streams', 'https://i.ytimg.com/vi/O2v_ghJlVAA/hqdefault.jpg', NULL, '2022-12-18 04:20:52', NULL),
(149, 9, 'UCkAFcwbFr0zvxfVcdMhRtQA', 'Alphorm', 'SNU9eilHP3Y', 'L\'interface de Photoshop CC 2021 - Vidéo Tuto', 'https://i.ytimg.com/vi/SNU9eilHP3Y/hqdefault.jpg', NULL, '2022-12-19 03:20:30', NULL),
(150, 9, 'UCkAFcwbFr0zvxfVcdMhRtQA', 'Alphorm', 'wIsYaxKwc5w', 'C\'est quoi les pixels sous Photoshop CC 2021 - Vidéo Tuto', 'https://i.ytimg.com/vi/wIsYaxKwc5w/hqdefault.jpg', NULL, '2022-12-19 03:20:30', NULL),
(151, 9, 'UCkAFcwbFr0zvxfVcdMhRtQA', 'Alphorm', 'C3cHWqNfhp4', 'L\'outil recadrage sous Photoshop CC 2021 - Vidéo Tuto', 'https://i.ytimg.com/vi/C3cHWqNfhp4/hqdefault.jpg', NULL, '2022-12-19 03:20:30', NULL),
(152, 9, 'UCkAFcwbFr0zvxfVcdMhRtQA', 'Alphorm', 'XPmD2X8z3jg', 'Qu\'est-ce qu\'un calque sous Photoshop CC 2021? - Vidéo Tuto', 'https://i.ytimg.com/vi/XPmD2X8z3jg/hqdefault.jpg', NULL, '2022-12-19 03:20:30', NULL),
(153, 9, 'UCkAFcwbFr0zvxfVcdMhRtQA', 'Alphorm', 'LXWc-We6JSk', 'L\'outil baguette Magique sous Photoshop CC 2021 - Vidéo Tuto', 'https://i.ytimg.com/vi/LXWc-We6JSk/hqdefault.jpg', NULL, '2022-12-19 03:20:31', NULL),
(154, 9, 'UCkAFcwbFr0zvxfVcdMhRtQA', 'Alphorm', '0LUUYRn2uCc', 'Comment changer le fond du personnage sous Photoshop CC 2021', 'https://i.ytimg.com/vi/0LUUYRn2uCc/hqdefault.jpg', NULL, '2022-12-19 03:20:31', NULL),
(155, 9, 'UCkAFcwbFr0zvxfVcdMhRtQA', 'Alphorm', '6dp5odCf7Wk', 'L\'outil pinceau sous Photoshop CC 2021 - Vidéo Tuto', 'https://i.ytimg.com/vi/6dp5odCf7Wk/hqdefault.jpg', NULL, '2022-12-19 03:20:31', NULL),
(156, 9, 'UCkAFcwbFr0zvxfVcdMhRtQA', 'Alphorm', 'ceywhvUf_28', 'Exercice texte - Trouver une typo sous Photoshop CC 2021- Vidéo Tuto', 'https://i.ytimg.com/vi/ceywhvUf_28/hqdefault.jpg', NULL, '2022-12-19 03:20:31', NULL),
(157, 9, 'UCkAFcwbFr0zvxfVcdMhRtQA', 'Alphorm', '20dIONC-Frs', 'Comment générer un rectangle et changer ces paramètres sous Photoshop', 'https://i.ytimg.com/vi/20dIONC-Frs/hqdefault.jpg', NULL, '2022-12-19 03:20:31', NULL),
(158, 9, 'UCkAFcwbFr0zvxfVcdMhRtQA', 'Alphorm', 'DLTkasiMmUQ', 'Présentation rapide de la galerie de filtres sous Adobe Photoshop', 'https://i.ytimg.com/vi/DLTkasiMmUQ/hqdefault.jpg', NULL, '2022-12-19 03:20:31', NULL),
(159, 9, 'UCkAFcwbFr0zvxfVcdMhRtQA', 'Alphorm', 'oGCQMn0gBgY', 'L\'outil Correcteur sous Photoshop CC 2021 - Vidéo Tuto', 'https://i.ytimg.com/vi/oGCQMn0gBgY/hqdefault.jpg', NULL, '2022-12-19 03:20:31', NULL),
(160, 9, 'UCkAFcwbFr0zvxfVcdMhRtQA', 'Alphorm', '3Yk9Os-Ib-E', 'Introduction aux calques de réglages sous Photoshop CC 2021', 'https://i.ytimg.com/vi/3Yk9Os-Ib-E/hqdefault.jpg', NULL, '2022-12-19 03:20:31', NULL),
(161, 9, 'UCkAFcwbFr0zvxfVcdMhRtQA', 'Alphorm', 'A42cNiN8YQo', 'Comment transformer son tracé en sélection sous Photoshop CC 2021', 'https://i.ytimg.com/vi/A42cNiN8YQo/hqdefault.jpg', NULL, '2022-12-19 03:20:31', NULL),
(162, 9, 'UCkAFcwbFr0zvxfVcdMhRtQA', 'Alphorm', 'cJCUIuT4NB4', 'Comment utiliser l\'outil pipette sou Photoshop CC 2021 - Vidéo Tuto', 'https://i.ytimg.com/vi/cJCUIuT4NB4/hqdefault.jpg', NULL, '2022-12-19 03:20:31', NULL),
(163, 9, 'UCkAFcwbFr0zvxfVcdMhRtQA', 'Alphorm', 'r0QtQADz4NI', 'Comment coloriser ces vieilles photos sous Photoshop CC 2021', 'https://i.ytimg.com/vi/r0QtQADz4NI/hqdefault.jpg', NULL, '2022-12-19 03:20:31', NULL),
(164, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', 'fm4aHVTFOjA', 'Photoshop cs6 - Partie 1 - Présentation du logiciel et de la formation', 'https://i.ytimg.com/vi/fm4aHVTFOjA/hqdefault.jpg', NULL, '2022-12-19 03:22:47', NULL),
(165, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', 'wvUgujI0tsw', 'Photoshop cs6 - Partie 2 - Utilisation des calques et Création de formes', 'https://i.ytimg.com/vi/wvUgujI0tsw/hqdefault.jpg', NULL, '2022-12-19 03:22:48', NULL),
(166, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', '_krJBFLN8TE', 'Photoshop cs6 - Partie 3 - Insérer une image et ajouter une bordure', 'https://i.ytimg.com/vi/_krJBFLN8TE/hqdefault.jpg', NULL, '2022-12-19 03:22:48', NULL),
(167, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', '3e83I4mkw54', 'Photoshop cs6 - Partie 4 - Utilisation de l\'outil texte pour créer des titres', 'https://i.ytimg.com/vi/3e83I4mkw54/hqdefault.jpg', NULL, '2022-12-19 03:22:49', NULL),
(168, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', 'Hidi4d8xkAU', 'Photoshop cs6 - Partie 5 - Création d\'une zone de texte', 'https://i.ytimg.com/vi/Hidi4d8xkAU/hqdefault.jpg', NULL, '2022-12-19 03:22:49', NULL),
(169, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', 'hijgxP-WTl0', 'Photoshop cs6 - Partie 6 - Gestion des groupes de calques', 'https://i.ytimg.com/vi/hijgxP-WTl0/hqdefault.jpg', NULL, '2022-12-19 03:22:49', NULL),
(170, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', 'jiAKxHwul2M', 'Photoshop cs6 - Partie 7 - Intégrer un QRcode avec le mode de fusion produit', 'https://i.ytimg.com/vi/jiAKxHwul2M/hqdefault.jpg', NULL, '2022-12-19 03:22:49', NULL),
(171, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', 'iMmRpkYfRh0', 'Photoshop cs6 - Partie 8 - Enregistrer son CV dans plusieurs formats', 'https://i.ytimg.com/vi/iMmRpkYfRh0/hqdefault.jpg', NULL, '2022-12-19 03:22:49', NULL),
(172, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', 'TqJZKXMYteA', 'Photoshop cs6 - Partie 9 - Création d\'un nouveau document pour une affiche en A3', 'https://i.ytimg.com/vi/TqJZKXMYteA/hqdefault.jpg', NULL, '2022-12-19 03:22:49', NULL),
(173, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', 'SiliRxTFxCI', 'Photoshop cs6 - Partie 10 - Détourer une image avec l\'outil plume', 'https://i.ytimg.com/vi/SiliRxTFxCI/hqdefault.jpg', NULL, '2022-12-19 03:22:49', NULL),
(174, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', 'dBso_vNGsZw', 'Photoshop cs6 - Partie 11 - Intégrer et fondre l\'objet dans l\'arrière plan', 'https://i.ytimg.com/vi/dBso_vNGsZw/hqdefault.jpg', NULL, '2022-12-19 03:22:49', NULL),
(175, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', '09ehCyVd1m8', 'Photoshop cs6 - Partie 12 - Ajouter des blocs et des titres', 'https://i.ytimg.com/vi/09ehCyVd1m8/hqdefault.jpg', NULL, '2022-12-19 03:22:50', NULL),
(176, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', 'OUv6HWsUwE0', 'Photoshop cs6 - Partie 13 - Transformer une photo de voiture en voiture toon', 'https://i.ytimg.com/vi/OUv6HWsUwE0/hqdefault.jpg', NULL, '2022-12-19 03:22:50', NULL),
(177, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', 'TC1UDb81EBI', 'Photoshop cs6 - Partie 14 - Transformer l\'image en un logo', 'https://i.ytimg.com/vi/TC1UDb81EBI/hqdefault.jpg', NULL, '2022-12-19 03:22:50', NULL),
(178, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', 'HnGxUrwPlAs', 'Photoshop cs6 - Partie 15 - Dessiner des courbes avec l\'outil plume', 'https://i.ytimg.com/vi/HnGxUrwPlAs/hqdefault.jpg', NULL, '2022-12-19 03:22:50', NULL),
(179, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', 'ij0ZqoHFMBs', 'Photoshop cs6 - Partie 16 - Dessiner une caricature à partir d\'une photo', 'https://i.ytimg.com/vi/ij0ZqoHFMBs/hqdefault.jpg', NULL, '2022-12-19 03:22:50', NULL),
(180, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', 'Ez4LPQ5SS4Q', 'Photoshop cs6 - Partie 17 - Détourer le personnage avec le mode masque', 'https://i.ytimg.com/vi/Ez4LPQ5SS4Q/hqdefault.jpg', NULL, '2022-12-19 03:22:50', NULL),
(181, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', 'AiJ1xSE7g6A', 'Photoshop cs6 - Partie 18 - Déformer la tête avec l\'outil fluidité', 'https://i.ytimg.com/vi/AiJ1xSE7g6A/hqdefault.jpg', NULL, '2022-12-19 03:22:50', NULL),
(182, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', '8NZLxuEvs6g', 'Photoshop cs6 - Partie 19 - Dessiner les contours du personnage avec l\'outil plume', 'https://i.ytimg.com/vi/8NZLxuEvs6g/hqdefault.jpg', NULL, '2022-12-19 03:22:51', NULL),
(183, 8, 'UCsOUNJ3CNBlDJs6q6ZWNmzg', 'Ben Mousnier', '2SqX71Kz7PU', 'Photoshop cs6 - Partie 20 - Coloriser le dessin', 'https://i.ytimg.com/vi/2SqX71Kz7PU/hqdefault.jpg', NULL, '2022-12-19 03:22:51', NULL),
(184, 4, 'UCW5YeuERMmlnqo4oq8vwUpg', 'The Net Ninja', 'hu-q2zYwEYs', 'HTML & CSS Crash Course Tutorial #1 - Introduction', 'https://i.ytimg.com/vi/hu-q2zYwEYs/hqdefault.jpg', NULL, '2022-12-19 03:29:49', NULL),
(185, 4, 'UCW5YeuERMmlnqo4oq8vwUpg', 'The Net Ninja', 'mbeT8mpmtHA', 'HTML & CSS Crash Course Tutorial #2 - HTML Basics', 'https://i.ytimg.com/vi/mbeT8mpmtHA/hqdefault.jpg', NULL, '2022-12-19 03:29:49', NULL),
(186, 4, 'UCW5YeuERMmlnqo4oq8vwUpg', 'The Net Ninja', 'YwbIeMlxZAU', 'HTML & CSS Crash Course Tutorial #3 - HTML Forms', 'https://i.ytimg.com/vi/YwbIeMlxZAU/hqdefault.jpg', NULL, '2022-12-19 03:29:49', NULL),
(187, 4, 'UCW5YeuERMmlnqo4oq8vwUpg', 'The Net Ninja', 'D3iEE29ZXRM', 'HTML & CSS Crash Course Tutorial #4 - CSS Basics', 'https://i.ytimg.com/vi/D3iEE29ZXRM/hqdefault.jpg', NULL, '2022-12-19 03:29:49', NULL),
(188, 4, 'UCW5YeuERMmlnqo4oq8vwUpg', 'The Net Ninja', 'FHZn6706e3Q', 'HTML & CSS Crash Course Tutorial #5 - CSS Classes & Selectors', 'https://i.ytimg.com/vi/FHZn6706e3Q/hqdefault.jpg', NULL, '2022-12-19 03:29:49', NULL),
(189, 4, 'UCW5YeuERMmlnqo4oq8vwUpg', 'The Net Ninja', 'kGW8Al_cga4', 'HTML & CSS Crash Course Tutorial #6 - HTML 5 Semantics', 'https://i.ytimg.com/vi/kGW8Al_cga4/hqdefault.jpg', NULL, '2022-12-19 03:29:49', NULL),
(190, 4, 'UCW5YeuERMmlnqo4oq8vwUpg', 'The Net Ninja', '25R1Jl5P7Mw', 'HTML & CSS Crash Course Tutorial #7 - Chrome Dev Tools', 'https://i.ytimg.com/vi/25R1Jl5P7Mw/hqdefault.jpg', NULL, '2022-12-19 03:29:49', NULL),
(191, 4, 'UCW5YeuERMmlnqo4oq8vwUpg', 'The Net Ninja', 'XQaHAAXIVg8', 'HTML & CSS Crash Course Tutorial #8 - CSS Layout & Position', 'https://i.ytimg.com/vi/XQaHAAXIVg8/hqdefault.jpg', NULL, '2022-12-19 03:29:49', NULL),
(192, 4, 'UCW5YeuERMmlnqo4oq8vwUpg', 'The Net Ninja', 'FMu2cKWD90g', 'HTML & CSS Crash Course Tutorial #9 - Pseudo Classes & Elements', 'https://i.ytimg.com/vi/FMu2cKWD90g/hqdefault.jpg', NULL, '2022-12-19 03:29:49', NULL),
(193, 4, 'UCW5YeuERMmlnqo4oq8vwUpg', 'The Net Ninja', 'Xig7NsIE6DI', 'HTML & CSS Crash Course Tutorial #10 - Intro to Media Queries', 'https://i.ytimg.com/vi/Xig7NsIE6DI/hqdefault.jpg', NULL, '2022-12-19 03:29:50', NULL),
(194, 4, 'UCW5YeuERMmlnqo4oq8vwUpg', 'The Net Ninja', 'qES0HypsUK0', 'HTML & CSS Crash Course Tutorial #11 - Next Steps', 'https://i.ytimg.com/vi/qES0HypsUK0/hqdefault.jpg', NULL, '2022-12-19 03:29:50', NULL),
(195, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'U2T-8ZFdsT0', 'Cours de Japonais : Leçon d\'introduction', 'https://i.ytimg.com/vi/U2T-8ZFdsT0/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(196, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'x6mPctcC1qw', 'Cours de Japonais : Les bases de la grammaire', 'https://i.ytimg.com/vi/x6mPctcC1qw/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(197, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'nAWIDlwK27w', 'Cours de Japonais : Écriture des Kanjis et spécificités de la lecture des Kanas', 'https://i.ytimg.com/vi/nAWIDlwK27w/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(198, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'V9L0RajdzXE', 'Cours de Japonais : Expression de la cause avec la particule Kara', 'https://i.ytimg.com/vi/V9L0RajdzXE/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(199, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'WCdZ8Vm-AE4', 'Cours de Japonais : Transformer un adjectif en adverbe', 'https://i.ytimg.com/vi/WCdZ8Vm-AE4/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(200, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'CFqQtz7AvCw', 'Cours de Japonais : Les règles de l\'échange basique', 'https://i.ytimg.com/vi/CFqQtz7AvCw/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(201, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'oFTdo6H4PSg', 'Cours de Japonais : Les deux séries de chiffres en japonais', 'https://i.ytimg.com/vi/oFTdo6H4PSg/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(202, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'knfXewEw8cM', 'Cours de Japonais : Les auxiliaires numéraux', 'https://i.ytimg.com/vi/knfXewEw8cM/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(203, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'wyx2JipZs7k', 'Cours de Japonais : Les adverbes de degré \"très\" ou \"pas très\"', 'https://i.ytimg.com/vi/wyx2JipZs7k/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(204, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', '9pF7J3nE0Y0', 'Cours de Japonais : Les adjectifs en i', 'https://i.ytimg.com/vi/9pF7J3nE0Y0/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(205, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'VSbpTTv5duw', 'Cours de Japonais : Les adjectifs de capacité (être doué)', 'https://i.ytimg.com/vi/VSbpTTv5duw/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(206, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'zY_VO1KdNGw', 'Cours de Japonais : Les adjectifs d’appréciation suki kirai', 'https://i.ytimg.com/vi/zY_VO1KdNGw/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(207, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'YluDyybpS7c', 'Cours de Japonais : La particule \"mais\"', 'https://i.ytimg.com/vi/YluDyybpS7c/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(208, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'qauVcrSM1F8', 'Cours de Japonais : La particule du COD', 'https://i.ytimg.com/vi/qauVcrSM1F8/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(209, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'dAlrND9_vws', 'Cours de Japonais : La particule d\'énumération non exhaustive', 'https://i.ytimg.com/vi/dAlrND9_vws/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(210, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', '13K4UuOxJtE', 'Cours de Japonais : L\'indicateur \"seulement\"', 'https://i.ytimg.com/vi/13K4UuOxJtE/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(211, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'A-yCx_daCfM', 'Cours de Japonais : Expression de la fréquence', 'https://i.ytimg.com/vi/A-yCx_daCfM/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(212, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'G0I78YPCTAw', 'Cours de Japonais : Exprimer la localisation', 'https://i.ytimg.com/vi/G0I78YPCTAw/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(213, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'JKweQQY6aLQ', 'Cours de Japonais : Adverbes de degrés verbaux', 'https://i.ytimg.com/vi/JKweQQY6aLQ/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(214, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'Yo_koKRdepo', 'Cours de Japonais : Particules de départ et d\'arrivée', 'https://i.ytimg.com/vi/Yo_koKRdepo/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(215, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', '-QTvYK9G-bg', 'Cours de Japonais : Particule も et verbes négatifs', 'https://i.ytimg.com/vi/-QTvYK9G-bg/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(216, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'JqV5z-n9wvQ', 'Cours de Japonais : Particule で', 'https://i.ytimg.com/vi/JqV5z-n9wvQ/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(217, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', '0cl5eLHW1k0', 'Cours de Japonais : Particule de déplacement', 'https://i.ytimg.com/vi/0cl5eLHW1k0/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(218, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'LlOeXwzvjrc', 'Cours de Japonais : Les pronoms et adjectifs démonstratifs', 'https://i.ytimg.com/vi/LlOeXwzvjrc/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(219, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'aaRPpK9mkk4', 'Cours de Japonais : Les chiffres d\'origine chinoise', 'https://i.ytimg.com/vi/aaRPpK9mkk4/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(220, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'siqhRh6I06g', 'Cours de Japonais : La particule \"et\"', 'https://i.ytimg.com/vi/siqhRh6I06g/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(221, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'yXSYi6FNSKE', 'Cours de Japonais : La particule d\'appartenance', 'https://i.ytimg.com/vi/yXSYi6FNSKE/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(222, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'sFekOFRdYXQ', 'Cours de Japonais : La particule \"à\"', 'https://i.ytimg.com/vi/sFekOFRdYXQ/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(223, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'mSodbsVxOqs', 'Cours de Japonais : La conjugaison des verbes à la forme polie', 'https://i.ytimg.com/vi/mSodbsVxOqs/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(224, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'qGS7IaLLFXA', 'Cours de Japonais : proposition et invitation', 'https://i.ytimg.com/vi/qGS7IaLLFXA/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(225, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'TAdJoJEmi_I', 'Le fonctionnement de DEKIMASU - Japonais', 'https://i.ytimg.com/vi/TAdJoJEmi_I/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(226, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'Cc2-LuYIV64', 'Expression des loisirs par la nominalisation verbale - Japonais', 'https://i.ytimg.com/vi/Cc2-LuYIV64/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(227, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'Oqlx0QxxcOY', 'L\'indicateur MAE NI - Japonais', 'https://i.ytimg.com/vi/Oqlx0QxxcOY/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(228, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'Qbj9_bn-Uyc', 'Les successions verbales avec TARI - Japonais', 'https://i.ytimg.com/vi/Qbj9_bn-Uyc/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(229, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'v1EkPija8bg', 'L\'expression DESHÔ - Japonais', 'https://i.ytimg.com/vi/v1EkPija8bg/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(230, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', '-eiNUXXWOec', 'L\'expression de l\'expérience avec la forme KOTO GA ARIMASU - Japonais', 'https://i.ytimg.com/vi/-eiNUXXWOec/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(231, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', '8aQ9MT5U4hA', 'L\'utilisation du NARIMASU de changement - Japonais', 'https://i.ytimg.com/vi/8aQ9MT5U4hA/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(232, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'oGUXu5bMiis', 'La forme déterminante - Japonais', 'https://i.ytimg.com/vi/oGUXu5bMiis/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(233, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'UWEOfP_KEV0', 'Le fonctionement du TO OMOIMASU - Japonais', 'https://i.ytimg.com/vi/UWEOfP_KEV0/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(234, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'UQwLhvSiFEA', 'Le fonctionement du TO IIMASU - Japonais', 'https://i.ytimg.com/vi/UQwLhvSiFEA/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(235, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'kgVAvGsykPA', 'L\'indicateur temporel TOKI - Japonais', 'https://i.ytimg.com/vi/kgVAvGsykPA/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(236, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'JOyqqOVCpAc', 'La forme NO ITADAKEMASEN KA - Japonais', 'https://i.ytimg.com/vi/JOyqqOVCpAc/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(237, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'uLj4EOcu1A0', 'Les particularités sémantique de TOKI - Japonais', 'https://i.ytimg.com/vi/uLj4EOcu1A0/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(238, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'ElOorL1a5X8', 'Le conditionnel en TO - Japonais', 'https://i.ytimg.com/vi/ElOorL1a5X8/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(239, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'rPQ9mXSH62k', 'La forme verbe TE AGERU - Japonais', 'https://i.ytimg.com/vi/rPQ9mXSH62k/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL);
INSERT INTO `lessons` (`id`, `course_id`, `channel_id`, `channel_title`, `video_id`, `video_title`, `thumburl`, `avis`, `created_at`, `updated_at`) VALUES
(240, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'NWi1q0qUSm8', 'La forme verbe TE KURERU - Japonais', 'https://i.ytimg.com/vi/NWi1q0qUSm8/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(241, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', '4_eUWrz9MGc', 'La forme verbe TE MORAU - Japonais', 'https://i.ytimg.com/vi/4_eUWrz9MGc/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(242, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'SWgBswQ3A44', 'Le conditionnel en TARA - Japonais', 'https://i.ytimg.com/vi/SWgBswQ3A44/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(243, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'SO3PNOShihI', 'La condition concessive en TEMO - Japonais', 'https://i.ytimg.com/vi/SO3PNOShihI/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(244, 11, 'UCXHJxRgcRoQCQj9ElFD8HQg', 'super Orientation by digiSchool', 'UWitF_g3RrU', 'Construction et sémantique de NO DESU - Japonais', 'https://i.ytimg.com/vi/UWitF_g3RrU/hqdefault.jpg', NULL, '2022-12-22 02:26:30', NULL),
(245, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'QFaFIcGhPoM', 'ReactJS Tutorial - 1 - Introduction', 'https://i.ytimg.com/vi/QFaFIcGhPoM/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(246, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', '9hb_0TZ_MVI', 'ReactJS Tutorial - 2 - Hello World', 'https://i.ytimg.com/vi/9hb_0TZ_MVI/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(247, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', '9VIiLJL0H4Y', 'ReactJS Tutorial - 3 - Folder Structure', 'https://i.ytimg.com/vi/9VIiLJL0H4Y/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(248, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'Y2hgEGPzTZY', 'ReactJS Tutorial - 4 - Components', 'https://i.ytimg.com/vi/Y2hgEGPzTZY/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(249, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'Cla1WwguArA', 'ReactJS Tutorial - 5 - Functional Components', 'https://i.ytimg.com/vi/Cla1WwguArA/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(250, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'lnV34uLEzis', 'ReactJS Tutorial - 6 - Class Components', 'https://i.ytimg.com/vi/lnV34uLEzis/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(251, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'oecI26cWqzk', 'ReactJS Tutorial - 7 - Hooks Update', 'https://i.ytimg.com/vi/oecI26cWqzk/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(252, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', '7fPXI_MnBOY', 'ReactJS Tutorial - 8 - JSX', 'https://i.ytimg.com/vi/7fPXI_MnBOY/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(253, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'm7OWXtbiXX8', 'ReactJS Tutorial - 9 - Props', 'https://i.ytimg.com/vi/m7OWXtbiXX8/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(254, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', '4ORZ1GmjaMc', 'ReactJS Tutorial - 10 - State', 'https://i.ytimg.com/vi/4ORZ1GmjaMc/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(255, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'uirRaVjRsf4', 'ReactJS Tutorial - 11 - setState', 'https://i.ytimg.com/vi/uirRaVjRsf4/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(256, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', '5_PdMS9CLLI', 'ReactJS Tutorial - 12 - Destructuring props and state', 'https://i.ytimg.com/vi/5_PdMS9CLLI/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(257, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'Znqv84xi8Vs', 'ReactJS Tutorial - 13 - Event Handling', 'https://i.ytimg.com/vi/Znqv84xi8Vs/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(258, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'kVWpBtRjkCk', 'ReactJS Tutorial - 14 - Binding Event Handlers', 'https://i.ytimg.com/vi/kVWpBtRjkCk/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(259, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'QpfyjwhY9kg', 'ReactJS Tutorial - 15 - Methods as props', 'https://i.ytimg.com/vi/QpfyjwhY9kg/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(260, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', '7o5FPaVA9m0', 'ReactJS Tutorial - 16 - Conditional Rendering', 'https://i.ytimg.com/vi/7o5FPaVA9m0/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(261, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', '5s8Ol9uw-yM', 'ReactJS Tutorial - 17 - List Rendering', 'https://i.ytimg.com/vi/5s8Ol9uw-yM/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(262, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', '0sasRxl35_8', 'ReactJS Tutorial - 18 - Lists and Keys', 'https://i.ytimg.com/vi/0sasRxl35_8/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(263, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'xlPxnc5uUPQ', 'ReactJS Tutorial - 19 - Index as Key Anti-pattern', 'https://i.ytimg.com/vi/xlPxnc5uUPQ/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(264, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'j5P9FHiBVNo', 'ReactJS Tutorial - 20 - Styling and CSS Basics', 'https://i.ytimg.com/vi/j5P9FHiBVNo/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(265, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', '7Vo_VCcWupQ', 'ReactJS Tutorial - 21 - Basics of Form Handling', 'https://i.ytimg.com/vi/7Vo_VCcWupQ/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(266, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'qnN_FuFNq2g', 'ReactJS Tutorial - 22 - Component Lifecycle Methods', 'https://i.ytimg.com/vi/qnN_FuFNq2g/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(267, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'KDXZibVdiEI', 'ReactJS Tutorial - 23 - Component Mounting Lifecycle Methods', 'https://i.ytimg.com/vi/KDXZibVdiEI/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(268, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'DyPkojd1fas', 'ReactJS Tutorial - 24 - Component Updating Lifecycle Methods', 'https://i.ytimg.com/vi/DyPkojd1fas/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(269, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'bHdh1T0-US4', 'ReactJS Tutorial - 25 - Fragments', 'https://i.ytimg.com/vi/bHdh1T0-US4/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(270, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'YCRuTT31qR0', 'ReactJS Tutorial - 26 - Pure Components', 'https://i.ytimg.com/vi/YCRuTT31qR0/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(271, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', '7TaBhrnPH78', 'ReactJS Tutorial - 27 - memo', 'https://i.ytimg.com/vi/7TaBhrnPH78/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(272, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'FXa9mMTKOu8', 'ReactJS Tutorial - 28 - Refs', 'https://i.ytimg.com/vi/FXa9mMTKOu8/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(273, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', '8aCXVC9Qmto', 'ReactJS Tutorial - 29 - Refs with Class Components', 'https://i.ytimg.com/vi/8aCXVC9Qmto/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(274, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'RLWniwmfdq4', 'ReactJS Tutorial - 30 - Forwarding Refs', 'https://i.ytimg.com/vi/RLWniwmfdq4/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(275, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'HpHLa-5Wdys', 'ReactJS Tutorial - 31 - Portals', 'https://i.ytimg.com/vi/HpHLa-5Wdys/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(276, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'DNYXgtZBRPE', 'ReactJS Tutorial - 32 - Error Boundary', 'https://i.ytimg.com/vi/DNYXgtZBRPE/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(277, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'B6aNv8nkUSw', 'ReactJS Tutorial - 33 - Higher Order Components (Part 1)', 'https://i.ytimg.com/vi/B6aNv8nkUSw/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(278, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'rsBQj6X7UK8', 'ReactJS Tutorial - 34 - Higher Order Components (Part 2)', 'https://i.ytimg.com/vi/rsBQj6X7UK8/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(279, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'l8V59zIdBXU', 'ReactJS Tutorial - 35 - Higher Order Components (Part 3)', 'https://i.ytimg.com/vi/l8V59zIdBXU/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(280, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'NdapMDgNhtE', 'ReactJS Tutorial - 36 - Render Props (Part 1)', 'https://i.ytimg.com/vi/NdapMDgNhtE/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(281, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'EZil2OTyB4w', 'ReactJS Tutorial - 37 - Render Props (Part 2)', 'https://i.ytimg.com/vi/EZil2OTyB4w/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(282, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'j3j8St50fNY', 'ReactJS Tutorial - 38 - Context (Part 1)', 'https://i.ytimg.com/vi/j3j8St50fNY/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(283, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'lTjQjWemKgE', 'ReactJS Tutorial - 39 - Context (Part 2)', 'https://i.ytimg.com/vi/lTjQjWemKgE/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(284, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'A9WlkhdLnn0', 'ReactJS Tutorial - 40 - Context (Part 3)', 'https://i.ytimg.com/vi/A9WlkhdLnn0/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(285, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'GTmjthNvrxY', 'ReactJS Tutorial - 41 - HTTP and React', 'https://i.ytimg.com/vi/GTmjthNvrxY/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(286, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'NEYrSUM4Umw', 'ReactJS Tutorial - 42 - HTTP GET Request', 'https://i.ytimg.com/vi/NEYrSUM4Umw/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(287, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'x9UEDRbLhJE', 'ReactJS Tutorial - 43 - HTTP Post Request', 'https://i.ytimg.com/vi/x9UEDRbLhJE/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(288, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'cF2lQ_gZeA8', 'React Hooks Tutorial - 1 - Introduction', 'https://i.ytimg.com/vi/cF2lQ_gZeA8/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(289, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'lAW1Jmmr9hc', 'React Hooks Tutorial - 2 - useState Hook', 'https://i.ytimg.com/vi/lAW1Jmmr9hc/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(290, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'd0plTCQgsXs', 'React Hooks Tutorial - 3 - useState with previous state', 'https://i.ytimg.com/vi/d0plTCQgsXs/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(291, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', '-3lL8oyev9w', 'React Hooks Tutorial - 4 - useState with object', 'https://i.ytimg.com/vi/-3lL8oyev9w/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(292, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'RZ5wKYbOM_I', 'React Hooks Tutorial - 5 - useState with array', 'https://i.ytimg.com/vi/RZ5wKYbOM_I/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(293, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', '06Y6aJzTmXY', 'React Hooks Tutorial - 6 - useEffect Hook', 'https://i.ytimg.com/vi/06Y6aJzTmXY/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(294, 13, 'UC80PWRj_ZU8Zu0HSMNVwKWw', 'Codevolution', 'nAuWOnFMlOw', 'React Hooks Tutorial - 7 - useEffect after render', 'https://i.ytimg.com/vi/nAuWOnFMlOw/hqdefault.jpg', NULL, '2022-12-23 07:32:50', NULL),
(295, 14, 'UCVnxfoMf21FW4-6n5r0go1w', 'Chad Fabiano', 'CKSkhK_kri0', '#1. Comment créer un compte publicitaire Facebook (formation complète pour débutant)', 'https://i.ytimg.com/vi/CKSkhK_kri0/hqdefault.jpg', NULL, '2022-12-23 10:33:22', NULL),
(296, 14, 'UCVnxfoMf21FW4-6n5r0go1w', 'Chad Fabiano', 'qT66LCtswe0', '#2. Comment créer et installer le Pixel de Facebook sur son site web (en 6 minutes)', 'https://i.ytimg.com/vi/qT66LCtswe0/hqdefault.jpg', NULL, '2022-12-23 10:33:22', NULL),
(297, 14, 'UCVnxfoMf21FW4-6n5r0go1w', 'Chad Fabiano', 'vpffeq3Rrog', '#3. Comment créer une campagne Facebook facilement et rapidement (niveau débutant)', 'https://i.ytimg.com/vi/vpffeq3Rrog/hqdefault.jpg', NULL, '2022-12-23 10:33:22', NULL),
(298, 14, 'UCVnxfoMf21FW4-6n5r0go1w', 'Chad Fabiano', 'HI9fI4w8R_A', '#4. Comment créer des audiences Facebook dans une campagne (niveau débutant)', 'https://i.ytimg.com/vi/HI9fI4w8R_A/hqdefault.jpg', NULL, '2022-12-23 10:33:22', NULL),
(299, 14, 'UCVnxfoMf21FW4-6n5r0go1w', 'Chad Fabiano', '450CqmrCpjc', '#5. Comment créer ses publicités Facebook dans le gestionnaire de publicité', 'https://i.ytimg.com/vi/450CqmrCpjc/hqdefault.jpg', NULL, '2022-12-23 10:33:22', NULL),
(300, 14, 'UCVnxfoMf21FW4-6n5r0go1w', 'Chad Fabiano', 'ICMai3a4ZEM', '#6. La meilleure structure à utiliser pour ses campagnes de publicité Facebook', 'https://i.ytimg.com/vi/ICMai3a4ZEM/hqdefault.jpg', NULL, '2022-12-23 10:33:22', NULL),
(301, 14, 'UCVnxfoMf21FW4-6n5r0go1w', 'Chad Fabiano', 'u2OhC3sYD_4', '#7. Les 5 types de campagne Facebook et la meilleure pour toi', 'https://i.ytimg.com/vi/u2OhC3sYD_4/hqdefault.jpg', NULL, '2022-12-23 10:33:22', NULL),
(302, 14, 'UCVnxfoMf21FW4-6n5r0go1w', 'Chad Fabiano', 'HxdQCFhFsLs', '#8. Comment créer une campagne Facebook de lead magnet et récupérer des courriels', 'https://i.ytimg.com/vi/HxdQCFhFsLs/hqdefault.jpg', NULL, '2022-12-23 10:33:22', NULL),
(303, 14, 'UCVnxfoMf21FW4-6n5r0go1w', 'Chad Fabiano', 'OLLRHkI5syU', '#9. Comment vendre directement avec la publicité Facebook sans perdre d\'argent.', 'https://i.ytimg.com/vi/OLLRHkI5syU/hqdefault.jpg', NULL, '2022-12-23 10:33:22', NULL),
(304, 14, 'UCVnxfoMf21FW4-6n5r0go1w', 'Chad Fabiano', 'HiglpPGknkk', '#10. Site web VS Tunnel de vente, lequel devrais-tu utiliser?', 'https://i.ytimg.com/vi/HiglpPGknkk/hqdefault.jpg', NULL, '2022-12-23 10:33:22', NULL),
(305, 14, 'UCVnxfoMf21FW4-6n5r0go1w', 'Chad Fabiano', 'DB1kngyx010', '#11. Comment analyser ta publicité Facebook et obtenir de meilleurs résultats', 'https://i.ytimg.com/vi/DB1kngyx010/hqdefault.jpg', NULL, '2022-12-23 10:33:22', NULL),
(306, 14, 'UCVnxfoMf21FW4-6n5r0go1w', 'Chad Fabiano', 'HQuwiD6eaTU', 'Guide complet - Comment créer une publicité Facebook en 2022?', 'https://i.ytimg.com/vi/HQuwiD6eaTU/hqdefault.jpg', NULL, '2022-12-23 10:33:22', NULL),
(307, 15, 'UCf7zJFMsxlQw7BdKhni2XTg', 'Quentin Bonnardel', 'wyMX6e2Vtjo', '[GUIDE COMPLET] Facebook Ads 2023 - Comment Lancer Une Publicité Facebook Performante ? (Débutant)', 'https://i.ytimg.com/vi/wyMX6e2Vtjo/hqdefault.jpg', NULL, '2022-12-23 10:50:08', NULL),
(308, 15, 'UCf7zJFMsxlQw7BdKhni2XTg', 'Quentin Bonnardel', 'kWRAtCmei90', '[GUIDE COMPLET] TikTok Ads 2022 - Comment Lancer Une Publicité TikTok Performante ? (DÉBUTANT)', 'https://i.ytimg.com/vi/kWRAtCmei90/hqdefault.jpg', NULL, '2022-12-23 10:50:08', NULL),
(309, 15, 'UCf7zJFMsxlQw7BdKhni2XTg', 'Quentin Bonnardel', 'RppuWp2oI4o', '[GUIDE COMPLET] Google Ads 2022 - Comment Lancer Une Campagne Google Ads Performante ? (Débutant)', 'https://i.ytimg.com/vi/RppuWp2oI4o/hqdefault.jpg', NULL, '2022-12-23 10:50:08', NULL),
(310, 15, 'UCf7zJFMsxlQw7BdKhni2XTg', 'Quentin Bonnardel', 'Z8EbJs5cC_4', 'COMMENT CIBLER CORRECTEMENT VOS PUB FACEBOOK EN 2022 ?', 'https://i.ytimg.com/vi/Z8EbJs5cC_4/hqdefault.jpg', NULL, '2022-12-23 10:50:08', NULL),
(311, 15, 'UCf7zJFMsxlQw7BdKhni2XTg', 'Quentin Bonnardel', 'cj1r_R0bwak', '[Stratégie complète] YouTube Ads en 2021 - Lancer une campagne profitable', 'https://i.ytimg.com/vi/cj1r_R0bwak/hqdefault.jpg', NULL, '2022-12-23 10:50:08', NULL),
(312, 15, 'UCf7zJFMsxlQw7BdKhni2XTg', 'Quentin Bonnardel', 'VGzQ8oaqBHM', 'Le Guide Ultime De La Pub Facebook En 2020 (Partie 1)', 'https://i.ytimg.com/vi/VGzQ8oaqBHM/hqdefault.jpg', NULL, '2022-12-23 10:50:08', NULL),
(313, 15, 'UCf7zJFMsxlQw7BdKhni2XTg', 'Quentin Bonnardel', 'ErX9BRThTHc', 'Le Guide Ultime De La Pub Facebook En 2020 (Partie 2)', 'https://i.ytimg.com/vi/ErX9BRThTHc/hqdefault.jpg', NULL, '2022-12-23 10:50:08', NULL),
(314, 15, 'UCf7zJFMsxlQw7BdKhni2XTg', 'Quentin Bonnardel', 'gesAX13Q1jg', 'Le Guide Ultime De La Pub Facebook En 2020 (Partie 3)', 'https://i.ytimg.com/vi/gesAX13Q1jg/hqdefault.jpg', NULL, '2022-12-23 10:50:08', NULL),
(315, 15, 'UCf7zJFMsxlQw7BdKhni2XTg', 'Quentin Bonnardel', 'ssXYpzQqNBg', 'CE CIBLAGE FACEBOOK ADS EST ULTRA-EFFICACE !', 'https://i.ytimg.com/vi/ssXYpzQqNBg/hqdefault.jpg', NULL, '2022-12-23 10:50:08', NULL),
(316, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', '_xQNeOTRyig', 'Introduction To Python -1 | Python For Beginners | Python Tutorial | Python Basics | Simplilearn', 'https://i.ytimg.com/vi/_xQNeOTRyig/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(317, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'Pc-fBj78lDM', 'Installing Python On Windows 10 - 2 | Python Installation In Windows 10 | Python Basics |Simplilearn', 'https://i.ytimg.com/vi/Pc-fBj78lDM/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(318, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'HcUpnurp2sQ', 'Python First Program - 3 | Python For Beginners | Python Tutorial | Python Programming | Simplilearn', 'https://i.ytimg.com/vi/HcUpnurp2sQ/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(319, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'MoZFRj0C2vg', 'Python Data Types - 4 | Data Types In Python | Python For Beginners | Python Tutorial | Simplilearn', 'https://i.ytimg.com/vi/MoZFRj0C2vg/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(320, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'kwNx8zVw6LM', 'Variables In Python - 5 | What Is A Variable In Python | Python For Beginners | Simplilearn', 'https://i.ytimg.com/vi/kwNx8zVw6LM/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(321, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'mrZ9ePSQthk', 'Python Object Types - 6 | Python Data Types | Python Classes & Objects | Python Basics | Simplilearn', 'https://i.ytimg.com/vi/mrZ9ePSQthk/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(322, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', '7uBBgg7Ox-w', 'Pandas Dataframe Tutorial | Dataframe In Pandas | Python Pandas Tutorial | Python Basics|Simplilearn', 'https://i.ytimg.com/vi/7uBBgg7Ox-w/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(323, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'VRcGUKcyQWk', 'Best Books For Coding | Best Book To Learn Coding For Beginners | Learn Coding | Simplilearn', 'https://i.ytimg.com/vi/VRcGUKcyQWk/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(324, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'nQ6oKNg7QrM', 'Numbers In Python - 7 | Python Series Tutorial | Python Basics | Python Tutorial | Simplilearn', 'https://i.ytimg.com/vi/nQ6oKNg7QrM/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(325, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'JbmpyhuEjW0', 'Strings In Python | Python Strings | What Are Strings In Python? | Python For Beginners |Simplilearn', 'https://i.ytimg.com/vi/JbmpyhuEjW0/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(326, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', '2hHs9rWH81g', 'Operators In Python - 9 | Python Operators | Python Tutorial For Beginners | Simplilearn', 'https://i.ytimg.com/vi/2hHs9rWH81g/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(327, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'fXRxHrDhQuI', 'Python Lists, Tuples And Dictionaries - 10 | Python For Beginners | Python Tutorial | Simplilearn', 'https://i.ytimg.com/vi/fXRxHrDhQuI/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(328, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'ft8nK7NSLig', 'If Statement In Python - 12 | Conditional Statements In Python | Python Tutorial | Simplilearn', 'https://i.ytimg.com/vi/ft8nK7NSLig/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(329, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'u6ZmnyIkOgk', 'For Loop In Python | Introduction To For Loop In Python | Python Loops Tutorial | Simplilearn', 'https://i.ytimg.com/vi/u6ZmnyIkOgk/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(330, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'q1FttL_G1G4', 'Olympics Data Analysis Using Python 2021 | Olympics Exploratory Data Analysis Tutorial | Simplilearn', 'https://i.ytimg.com/vi/q1FttL_G1G4/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(331, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'eG663qYKjVw', 'Python Seaborn Tutorial | Python Seaborn Plots | Python Seaborn Tutorial For Beginners | Simplilearn', 'https://i.ytimg.com/vi/eG663qYKjVw/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(332, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'PWVH3Vx3dCI', 'Speech Recognition Using Python | How Speech Recognition Works In Python | Simplilearn', 'https://i.ytimg.com/vi/PWVH3Vx3dCI/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(333, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'DJofs2JyIVM', 'Covid-19 Data Analysis Project Using Python And Tableau | Covid Data Analysis Tutorial | Simplilearn', 'https://i.ytimg.com/vi/DJofs2JyIVM/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(334, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'EqV1cto2Xug', 'Python Loop Coding Techniques - 16 | Looping Techniques In Python | Python Tutorial | Simplilearn', 'https://i.ytimg.com/vi/EqV1cto2Xug/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(335, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'P8MdDCTbMOI', 'Python Lambda Function - 19 | Lambda Function In Python Explained | Python Tutorial | Simplilearn', 'https://i.ytimg.com/vi/P8MdDCTbMOI/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(336, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'Qgbv2ESFhbs', 'Python Loops Tutorial | Python For Loop | While Loop In Python | Python Training | Simplilearn', 'https://i.ytimg.com/vi/Qgbv2ESFhbs/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(337, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'EqkCuH2Nlmk', 'Longest Common Substring | Dynamic Programming | Data Structures And Algorithms | Simplilearn', 'https://i.ytimg.com/vi/EqkCuH2Nlmk/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(338, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', '2WFg2JCaMuc', 'Class In Python | Python Classes Tutorial With Example | Python Tutorial For Beginners | Simplilearn', 'https://i.ytimg.com/vi/2WFg2JCaMuc/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(339, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'Ciqf0RJvY9U', '🔥FREE Python Course With Certificate 2021 | Learn Python Programming For Beginners | Simplilearn', 'https://i.ytimg.com/vi/Ciqf0RJvY9U/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(340, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'SRoxS9BRTA8', 'Pygame Tutorial For Beginners | Pygame Programming For Beginners 2021 | Python Game | Simplilearn', 'https://i.ytimg.com/vi/SRoxS9BRTA8/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(341, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'HNtEq-dK3C4', 'World Happiness Report 2021 Data Analysis Using Python | Data Analysis Project | Simplilearn', 'https://i.ytimg.com/vi/HNtEq-dK3C4/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(342, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'Nt84_TzRkbo', 'Python Data Visualization Tutorial | Python Data Visualization Projects Examples | Simplilearn', 'https://i.ytimg.com/vi/Nt84_TzRkbo/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(343, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', '8d7ywKCm6HI', 'Spotify Data Analysis Project | Spotify Data Analysis Using Python | Data Analysis | Simplilearn', 'https://i.ytimg.com/vi/8d7ywKCm6HI/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(344, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'QiBCQ_J1yos', 'String Formatting In Python - 21 | How To Format String In Python | Python Tutorial | Simplilearn', 'https://i.ytimg.com/vi/QiBCQ_J1yos/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(345, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'jxpnLAGyLqI', 'Scopes & Arguments In Python - 22 | Python Tutorial For Beginners | Python Programming | Simplilearn', 'https://i.ytimg.com/vi/jxpnLAGyLqI/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(346, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'vm-X_31NFI0', 'What Is GSoC And How To Apply For It? | GSoC 2022 - Google Summer Of Code Explained | Simplilearn', 'https://i.ytimg.com/vi/vm-X_31NFI0/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(347, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'ElfO6vJwSkg', 'Python Loops Tutorial | Python Loops Explained | Python Tutorial | Python For Beginners |Simplilearn', 'https://i.ytimg.com/vi/ElfO6vJwSkg/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(348, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'nMS5ptwax08', 'Map, Filter and Reduce In Python | Python Functions | Advanced Python Programming | Simplilearn', 'https://i.ytimg.com/vi/nMS5ptwax08/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(349, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'DJqWNfu0guk', 'Inheritance in Python | Types of Inheritance in Python | Learn Python Programming | Simplilearn', 'https://i.ytimg.com/vi/DJqWNfu0guk/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(350, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', '6ZjfKLsR7Ps', 'Top 10 Reasons To Learn Python In 2022 | Why You Should Learn Python? | Python | Simplilearn', 'https://i.ytimg.com/vi/6ZjfKLsR7Ps/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(351, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'jaie0C-uZug', 'OOPS in Python | Object Oriented Programming In Python | Python Tutorial for Beginners | Simplilearn', 'https://i.ytimg.com/vi/jaie0C-uZug/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(352, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'G9NmACvXh8w', 'Python Data Analysis Projects for 2022 | Data Analysis With Python | Python Training | Simplilearn', 'https://i.ytimg.com/vi/G9NmACvXh8w/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(353, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'kEFquUB_XHU', 'Go vs Python Comparison | Which Language You Should Learn In 2022? | Learn Coding | Simplilearn', 'https://i.ytimg.com/vi/kEFquUB_XHU/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(354, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'WETsGyrR2b4', '🔥FREE Course on Python Libraries for Data Science | Learn Python For FREE | SkillUp | Simplilearn', 'https://i.ytimg.com/vi/WETsGyrR2b4/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(355, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'YPeQj7clJ3I', 'Operator Overloading In Python | Object Oriented Programming Concept | Python Tutorial | Simplilearn', 'https://i.ytimg.com/vi/YPeQj7clJ3I/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(356, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'DmHSwTiD5Tk', 'File Handling In Python | Python File IO | Python Read & Write Files | Python Tutorial | Simplilearn', 'https://i.ytimg.com/vi/DmHSwTiD5Tk/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(357, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', '-_uNayxaQoU', 'Exception Handling in Python | Using Try and Except Block for Error Handling | Python | Simplilearn', 'https://i.ytimg.com/vi/-_uNayxaQoU/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(358, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', '1oFneicTaII', 'Modules in Python Explained | Python Built in Modules | Python Tutorial for Beginners | Simplilearn', 'https://i.ytimg.com/vi/1oFneicTaII/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(359, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'FniLzpaSFGk', 'NumPy and Pandas Tutorial | Data Analysis With Python | Python Tutorial for Beginners | Simplilearn', 'https://i.ytimg.com/vi/FniLzpaSFGk/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(360, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', '31DoC_7IhMU', 'Generators In Python | Python Generators Explained | Python Tutorial For Beginners | Simplilearn', 'https://i.ytimg.com/vi/31DoC_7IhMU/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(361, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', '77UBlkzq2l4', 'Top 5 Python Libraries | Most Useful Python Libraries | Python For Data Science | Simplilearn', 'https://i.ytimg.com/vi/77UBlkzq2l4/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(362, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'pMgHS_DbE4I', 'Iterators In Python | Python Iterators Explained | Python Tutorial For Beginners | Simplilearn', 'https://i.ytimg.com/vi/pMgHS_DbE4I/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(363, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', '390dkU2TUCE', 'Iterator And Generator In Python | Python Generators And Iterators Explained | Python | Simplilearn', 'https://i.ytimg.com/vi/390dkU2TUCE/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(364, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', '-ENGwvWBuWM', 'Python Vs Rust: Which Is Better And Why? | Rust & Python Programming Beginners Guide | Simplilearn', 'https://i.ytimg.com/vi/-ENGwvWBuWM/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(365, 16, 'UCsvqVGtbbyHaMoevxPAq9Fg', 'Simplilearn', 'ur-v0dv0Qtw', 'IPL Data Analysis Using Python 2022 | Data Analysis Project | TATA IPL 2022| Python | Simplilearn', 'https://i.ytimg.com/vi/ur-v0dv0Qtw/hqdefault.jpg', NULL, '2022-12-23 11:09:33', NULL),
(366, 17, 'UCyBD3P9YOFWNIMTuDzqeObg', 'Collection Crypto', 'fAfrBL5QRr0', 'Coinbase Tutorial For Beginners 2022 - Buy Bitcoin On Coinbase [COMPLETE STEP-BY-STEP GUIDE]', 'https://i.ytimg.com/vi/fAfrBL5QRr0/hqdefault.jpg', NULL, '2022-12-23 11:25:26', NULL),
(367, 17, 'UCyBD3P9YOFWNIMTuDzqeObg', 'Collection Crypto', 'BVFVZ7CFYEk', 'How to Create a Coinbase Account [STEP-BY-STEP]', 'https://i.ytimg.com/vi/BVFVZ7CFYEk/hqdefault.jpg', NULL, '2022-12-23 11:25:26', NULL),
(368, 17, 'UCyBD3P9YOFWNIMTuDzqeObg', 'Collection Crypto', 'L0IEzletba8', 'Coinbase Tutorial: Set Up 2-Factor Authentication (Using Google Authenticator)', 'https://i.ytimg.com/vi/L0IEzletba8/hqdefault.jpg', NULL, '2022-12-23 11:25:26', NULL),
(369, 17, 'UCyBD3P9YOFWNIMTuDzqeObg', 'Collection Crypto', 'sCTzjUZLKK0', 'Coinbase Fees Explained - How To Avoid High Coinbase Fees', 'https://i.ytimg.com/vi/sCTzjUZLKK0/hqdefault.jpg', NULL, '2022-12-23 11:25:26', NULL),
(370, 17, 'UCyBD3P9YOFWNIMTuDzqeObg', 'Collection Crypto', 'Yy_R2C0tpqU', 'How To Buy Bitcoin On Coinbase [STEP BY STEP Guide For BEGINNERS]', 'https://i.ytimg.com/vi/Yy_R2C0tpqU/hqdefault.jpg', NULL, '2022-12-23 11:25:26', NULL),
(371, 17, 'UCyBD3P9YOFWNIMTuDzqeObg', 'Collection Crypto', 'wVuN7Tyzq58', 'How To Send And Receive Bitcoin On Coinbase [STEP-BY-STEP TUTORIAL]', 'https://i.ytimg.com/vi/wVuN7Tyzq58/hqdefault.jpg', NULL, '2022-12-23 11:25:26', NULL),
(372, 17, 'UCyBD3P9YOFWNIMTuDzqeObg', 'Collection Crypto', 'zEd_7SAlLCw', 'How To Withdraw Money From Coinbase To Bank [STEP-BY-STEP TUTORIAL]', 'https://i.ytimg.com/vi/zEd_7SAlLCw/hqdefault.jpg', NULL, '2022-12-23 11:25:26', NULL),
(373, 17, 'UCyBD3P9YOFWNIMTuDzqeObg', 'Collection Crypto', 'gUPGjvsBoEE', 'How To Make Money On Coinbase [Tutorial]', 'https://i.ytimg.com/vi/gUPGjvsBoEE/hqdefault.jpg', NULL, '2022-12-23 11:25:26', NULL),
(374, 17, 'UCyBD3P9YOFWNIMTuDzqeObg', 'Collection Crypto', 'Wf2_GhuXcqY', 'Coinbase Referral Code 2022 (How to Get a 10$ Sign up Bonus)', 'https://i.ytimg.com/vi/Wf2_GhuXcqY/hqdefault.jpg', NULL, '2022-12-23 11:25:26', NULL),
(375, 18, NULL, NULL, 'yr1FZOUcLPs', 'Binance : TUTO complet en Français 2022', NULL, NULL, '2022-12-23 11:39:29', NULL),
(376, 20, NULL, NULL, 'RkQl2wVpQAo', 'Advanced Excel Full Course 2022', NULL, NULL, '2023-01-14 23:33:05', NULL),
(377, 21, NULL, NULL, '6qVWh1bglmo', 'EXCEL 7H DE FORMATION COMPLETE', NULL, NULL, '2023-01-14 23:39:18', NULL),
(378, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '6PPRQpC7qJ8', 'Démarrer avec Excel, création du premier classeur', 'https://i.ytimg.com/vi/6PPRQpC7qJ8/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(379, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'XkgYe60T44M', 'Débuter avec les calculs dans Excel', 'https://i.ytimg.com/vi/XkgYe60T44M/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(380, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'sYPSroBx3xI', 'Analyse rapide d\'excel, mise en forme conditionnelle automatique', 'https://i.ytimg.com/vi/sYPSroBx3xI/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(381, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'IkzKabXhYyI', 'Remplissage instantané lors de la saisie Excel', 'https://i.ytimg.com/vi/IkzKabXhYyI/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(382, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'NKeVwukU3VE', 'Figer une cellule dans un calcul Excel pour reproduire la formule', 'https://i.ytimg.com/vi/NKeVwukU3VE/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(383, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'Y5A8KlOWd4g', 'Techniques rapides et professionnelles pour réaliser des calculs dans Excel', 'https://i.ytimg.com/vi/Y5A8KlOWd4g/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(384, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'RzwmLEg2hqA', 'Concaténation Excel, assembler des textes ou joindre des cellules', 'https://i.ytimg.com/vi/RzwmLEg2hqA/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(385, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'ViCaG9rF4k4', 'Apprendre à poser des raisonnements dans des feuilles de calcul Excel', 'https://i.ytimg.com/vi/ViCaG9rF4k4/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(386, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'zvQI2kWMw-A', 'Didacticiel pour apprendre à créer des listes déroulantes dans Excel', 'https://i.ytimg.com/vi/zvQI2kWMw-A/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(387, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'p6ZJnA18W-E', 'Listes déroulantes liées ou reliées entre elles avec Excel', 'https://i.ytimg.com/vi/p6ZJnA18W-E/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(388, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'pDMrOOB8s2U', 'Créer une liste déroulante dynamique sous Excel', 'https://i.ytimg.com/vi/pDMrOOB8s2U/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(389, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'kZzVFnxXGhU', 'Extraire les données d\'un tableau selon une recherche avec RechecheV', 'https://i.ytimg.com/vi/kZzVFnxXGhU/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(390, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'ryK4k5wgrQY', 'Apprendre à créer des macros Excel pour automatiser les tâches', 'https://i.ytimg.com/vi/ryK4k5wgrQY/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(391, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'M3YNeBkbLQU', 'Didacticiel Excel pour apprendre à créer des formats numériques', 'https://i.ytimg.com/vi/M3YNeBkbLQU/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(392, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '_P9tLDIJkJ0', 'Multiplication rapide sur un grand nombre de chiffres avec Excel', 'https://i.ytimg.com/vi/_P9tLDIJkJ0/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(393, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '_DUdUs1jqog', 'La moyenne conditionnelle avec Excel, moyenne selon critères', 'https://i.ytimg.com/vi/_DUdUs1jqog/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(394, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'NqR4UysGqnM', 'Techniques de mises en forme avancées avec Excel', 'https://i.ytimg.com/vi/NqR4UysGqnM/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(395, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '5CBa4Y0zsVU', 'Raccourcis clavier d\'Excel pour la mise en forme et le calcul', 'https://i.ytimg.com/vi/5CBa4Y0zsVU/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(396, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'dkOdkiFrgEs', 'Trucs et astuces pour le tableur Excel', 'https://i.ytimg.com/vi/dkOdkiFrgEs/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(397, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'xuViGuaVKbc', 'Reproduire un calcul Excel avec une cellule fixe', 'https://i.ytimg.com/vi/xuViGuaVKbc/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(398, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'VPS28l5V87A', 'Ajouter un bouton de macro sur une feuille Excel', 'https://i.ytimg.com/vi/VPS28l5V87A/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(399, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '9j95ZKaiqfQ', 'Ajuster les dimensions d\'un tableau Excel pour de jolies présentations', 'https://i.ytimg.com/vi/9j95ZKaiqfQ/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(400, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'pifhkNqDkb8', 'Insérer un grand nombre de lignes ou colonnes en une fois', 'https://i.ytimg.com/vi/pifhkNqDkb8/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(401, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'ua-yZJXUZaE', 'Facturation automatisée de clients avec Excel', 'https://i.ytimg.com/vi/ua-yZJXUZaE/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(402, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'ejirlzV475Q', 'Créer un modèle de classeur Excel pour protéger la source', 'https://i.ytimg.com/vi/ejirlzV475Q/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(403, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'Qh_r7NA_400', 'Protection des cellules d\'une feuille Excel', 'https://i.ytimg.com/vi/Qh_r7NA_400/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(404, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'jMF-4bAw7lM', 'Partager les données d\'un classeur en masquant des informations', 'https://i.ytimg.com/vi/jMF-4bAw7lM/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(405, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'L6zVedxur24', 'Faire des sommes sur des heures dans Excel', 'https://i.ytimg.com/vi/L6zVedxur24/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(406, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'FZwdUZUwnuI', 'Listes automatiques et séries de nombres dans Excel', 'https://i.ytimg.com/vi/FZwdUZUwnuI/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(407, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'uei1oK8uqAU', 'Listes déroulantes et recherches dynamiques dans Excel', 'https://i.ytimg.com/vi/uei1oK8uqAU/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(408, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '_gupWPwYoys', 'Afficher les zéro devant les nombres Excel', 'https://i.ytimg.com/vi/_gupWPwYoys/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(409, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '8ZvOobOzRdQ', 'Les formats de date dans Excel', 'https://i.ytimg.com/vi/8ZvOobOzRdQ/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(410, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'BTjK9-dT7zs', 'Opérations sur les dates avec Excel', 'https://i.ytimg.com/vi/BTjK9-dT7zs/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(411, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'pV3NmNXYh0k', 'Echéances de paiement des clients dans Excel', 'https://i.ytimg.com/vi/pV3NmNXYh0k/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(412, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '4DSCP7KvQhY', 'Primes sur chiffres d\'affaire avec Excel', 'https://i.ytimg.com/vi/4DSCP7KvQhY/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(413, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '4VHmsNBV2WA', 'Partager et consolider les données d\'un classeur Excel', 'https://i.ytimg.com/vi/4VHmsNBV2WA/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(414, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'qsOeHFrJDkk', 'Protéger l\'accès à un classeur Excel', 'https://i.ytimg.com/vi/qsOeHFrJDkk/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(415, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'xoqAwIbNRb0', 'Créer des tableaux et réaliser des calculs Excel', 'https://i.ytimg.com/vi/xoqAwIbNRb0/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(416, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '5PnD0WQQNzg', 'Format dynamique avec des formules Excel', 'https://i.ytimg.com/vi/5PnD0WQQNzg/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(417, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '86JL2aZ0B7g', 'Reproduire des calculs Excel partout avec une seule formule', 'https://i.ytimg.com/vi/86JL2aZ0B7g/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(418, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'wvjGXTOtIz8', 'Créer un onglet avec des boutons personnalisés dans Excel', 'https://i.ytimg.com/vi/wvjGXTOtIz8/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(419, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '_ZMeL1l9bdE', 'Présentation des graphiques dans Excel', 'https://i.ytimg.com/vi/_ZMeL1l9bdE/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(420, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'Hfv3QD6Tyow', 'Graphiques Excel pour interpréter les données', 'https://i.ytimg.com/vi/Hfv3QD6Tyow/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(421, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'QGmJcZ1urXk', 'Regrouper et combiner des données dans un graphique Excel', 'https://i.ytimg.com/vi/QGmJcZ1urXk/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(422, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'JLbYdRjWbgs', 'Répéter les lignes de titres à l\'impression Excel', 'https://i.ytimg.com/vi/JLbYdRjWbgs/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(423, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '6GFnMb0Wzoc', 'Techniques de mise en page de tableaux Excel', 'https://i.ytimg.com/vi/6GFnMb0Wzoc/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(424, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'Qh99cp1E-fQ', 'Tableaux croisés dynamiques d\'Excel', 'https://i.ytimg.com/vi/Qh99cp1E-fQ/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(425, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'gTeAK8BgLNQ', 'Filtrer et extraire les données Excel selon critères', 'https://i.ytimg.com/vi/gTeAK8BgLNQ/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(426, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'tZzzVelMlwE', 'Rechercher et extraire dans des bases de données Excel', 'https://i.ytimg.com/vi/tZzzVelMlwE/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(427, 22, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'h7JkSBApwgs', 'Faire sauter la protection des feuilles Excel', 'https://i.ytimg.com/vi/h7JkSBApwgs/hqdefault.jpg', NULL, '2023-01-14 23:45:57', NULL),
(428, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'uNo6QhxuAcg', 'Charges et bénéfices, Exercice Excel débutant', 'https://i.ytimg.com/vi/uNo6QhxuAcg/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(429, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'tC26t-QaOjk', 'Agence de voyage, Exercice Excel débutant', 'https://i.ytimg.com/vi/tC26t-QaOjk/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(430, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'XGU0ZsfvUJg', 'Calcul des résultats d\'une entreprise', 'https://i.ytimg.com/vi/XGU0ZsfvUJg/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(431, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '7IBwid44rjA', 'Exercice Excel débutant sur la facturation client', 'https://i.ytimg.com/vi/7IBwid44rjA/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(432, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'qSvvRStCmHE', 'Exercice Excel sur les résultats commerciaux', 'https://i.ytimg.com/vi/qSvvRStCmHE/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(433, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'jH8Wj_ycqn4', 'Suivi des comptes bancaires avec Excel', 'https://i.ytimg.com/vi/jH8Wj_ycqn4/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(434, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'SEYowQib6zc', 'Exercice Excel pour calculer les remises clients', 'https://i.ytimg.com/vi/SEYowQib6zc/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(435, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'amShR2Xcu24', 'Synthèse des ventes et chiffres d\'affaires Excel', 'https://i.ytimg.com/vi/amShR2Xcu24/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(436, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'PerbUoGpTtk', 'Marges variables et prix de vente avec Excel', 'https://i.ytimg.com/vi/PerbUoGpTtk/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(437, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '4UQmFabhxio', 'Remises commerciales variables avec Excel', 'https://i.ytimg.com/vi/4UQmFabhxio/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(438, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'XHNF758NwRA', 'Bilan dynamique des résultats avec Excel', 'https://i.ytimg.com/vi/XHNF758NwRA/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(439, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'DeN9vI4C_jI', 'Comptabiliser les meilleurs résultats avec Excel', 'https://i.ytimg.com/vi/DeN9vI4C_jI/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(440, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '3_sXJciVRPI', 'Augmentations de salaires sous condition avec Excel', 'https://i.ytimg.com/vi/3_sXJciVRPI/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(441, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '06lHRGmlqJI', 'Pourcentages variables de primes avec Excel', 'https://i.ytimg.com/vi/06lHRGmlqJI/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(442, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'g7Yq1n-YidY', 'Calculer le taux d\'absentéisme avec Excel', 'https://i.ytimg.com/vi/g7Yq1n-YidY/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(443, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'FKTTP4POAG0', 'Analyser les résultats d\'une équipe de Football', 'https://i.ytimg.com/vi/FKTTP4POAG0/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(444, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', '4cP7TDKwOX4', 'Commissions conditionnelles sur objectifs', 'https://i.ytimg.com/vi/4cP7TDKwOX4/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(445, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'FhXZa9yAjbY', 'Attribuer des primes selon des quotas de vente', 'https://i.ytimg.com/vi/FhXZa9yAjbY/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(446, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'VI0NpyF_L1Y', 'Consolider les données d\'un tableau Excel', 'https://i.ytimg.com/vi/VI0NpyF_L1Y/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(447, 23, 'UCW-_iHbGuZG9nsE8D76lpIQ', 'Formations Excel, Access et bien d\'autres', 'qUW0MoKsSZU', 'Taux d\'imposition et salaires nets avec Excel', 'https://i.ytimg.com/vi/qUW0MoKsSZU/hqdefault.jpg', NULL, '2023-01-14 23:57:11', NULL),
(448, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'wHGMBjkce8o', 'COMMENT utiliser MICROSOFT EXCEL ? - Formation complète 365', 'https://i.ytimg.com/vi/wHGMBjkce8o/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(449, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '0jbun2KfDnE', 'ORGANISER les FEUILLES d\'un classeur EXCEL : copier, supprimer, déplacer, colorier... (Tutoriel)', 'https://i.ytimg.com/vi/0jbun2KfDnE/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(450, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'q6NzIEKL2TM', 'GÉRER les LIGNES et COLONNES dans EXCEL: agrandir, ajuster, ajouter, effacer, uniformiser (Tuto)', 'https://i.ytimg.com/vi/q6NzIEKL2TM/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(451, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'eOHFvo3LisM', 'MISE EN FORME du TEXTE dans EXCEL : aligner, centrer, orienter, renvoyer à la ligne... (Formation)', 'https://i.ytimg.com/vi/eOHFvo3LisM/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(452, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '14_UAvEM9d4', 'Les BORDURES et TRAMES dans EXCEL pour créer un TABLEAU : Cours pratique Office', 'https://i.ytimg.com/vi/14_UAvEM9d4/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(453, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'FqCSvH0NUMI', 'FUSIONNER dans EXCEL et CENTRER un TITRE sur plusieurs cases (Tutoriel rapide)', 'https://i.ytimg.com/vi/FqCSvH0NUMI/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(454, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'hzkmb0-iles', 'Comment réaliser des CALCULS avec EXCEL ? - Opérations et formules (Cours facile)', 'https://i.ytimg.com/vi/hzkmb0-iles/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(455, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '3AUwF4Jxq20', 'Calculer une SOMME et une MOYENNE + formules (Cours EXCEL)', 'https://i.ytimg.com/vi/3AUwF4Jxq20/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL);
INSERT INTO `lessons` (`id`, `course_id`, `channel_id`, `channel_title`, `video_id`, `video_title`, `thumburl`, `avis`, `created_at`, `updated_at`) VALUES
(456, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'pIBGRA2ErlM', 'Calculer un POURCENTAGE avec EXCEL (Cours Office en français)', 'https://i.ytimg.com/vi/pIBGRA2ErlM/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(457, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '96snn_ENHt4', 'Les graphiques avec EXCEL - Formation Office facile', 'https://i.ytimg.com/vi/96snn_ENHt4/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(458, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'uVn3j_WMDH8', 'FILTRER et TRIER une base de données ou une liste avec Microsoft EXCEL', 'https://i.ytimg.com/vi/uVn3j_WMDH8/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(459, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '2WsLW4iSW_s', 'Les fonctions NB.SI et NBVAL (Tutoriel Microsoft Excel)', 'https://i.ytimg.com/vi/2WsLW4iSW_s/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(460, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '_WpijGWdyKc', 'Les fonctions MIN et MAX - Cours EXCEL gratuit et facile', 'https://i.ytimg.com/vi/_WpijGWdyKc/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(461, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '4YB_2sa9YGQ', 'La MISE EN FORME CONDITIONNELLE (Cours EXCEL en français)', 'https://i.ytimg.com/vi/4YB_2sa9YGQ/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(462, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'J1u1HGcXYus', 'Les GRAPHIQUES SPARKLINE (mini-graphiques) - Tutoriel EXCEL', 'https://i.ytimg.com/vi/J1u1HGcXYus/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(463, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'Iag-161QKg8', 'Comment utiliser la fonction SI ? (condition à 2 choix) - Cours facile EXCEL', 'https://i.ytimg.com/vi/Iag-161QKg8/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(464, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'nweTyuainQU', 'Excel: SI imbriqués (condition à 3 possibilités ou plus) - Cours EXCEL', 'https://i.ytimg.com/vi/nweTyuainQU/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(465, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '-mm5fR0JkIg', 'Les fonctions ET et OU avec EXCEL + utilisation avec SI (Tutoriel)', 'https://i.ytimg.com/vi/-mm5fR0JkIg/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(466, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '2t6_P5gWWdM', 'Les nombres aléatoires avec EXCEL - ALEA et ALEA ENTRE BORNES', 'https://i.ytimg.com/vi/2t6_P5gWWdM/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(467, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'hGvG1RKHsVc', 'Créer une LISTE DÉROULANTE avec EXCEL - Tutoriel facile', 'https://i.ytimg.com/vi/hGvG1RKHsVc/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(468, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'qWIal3P7o1Q', 'La VALIDATION des DONNÉES avec EXCEL - Créer un formulaire sans erreur d\'encodage', 'https://i.ytimg.com/vi/qWIal3P7o1Q/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(469, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'emBoX5S0rfk', 'Les fonctions RECHERCHEV et RECHERCHEH avec EXCEL : tuto et exemples', 'https://i.ytimg.com/vi/emBoX5S0rfk/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(470, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'KL6eBBDb0z0', 'Créer un TABLEAU CROISÉ DYNAMIQUE + GRAPHIQUE - Cours EXCEL gratuit', 'https://i.ytimg.com/vi/KL6eBBDb0z0/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(471, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'BCHoaGimAz4', 'La fonction RANG avec EXCEL : établir un classement (tutoriel)', 'https://i.ytimg.com/vi/BCHoaGimAz4/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(472, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'M-LzyNqfJpw', 'Réaliser un CLASSEMENT AUTOMATIQUE avec EXCEL - Exemple pratique', 'https://i.ytimg.com/vi/M-LzyNqfJpw/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(473, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '9eALuTKoTh8', 'Créer une CARTE GÉOGRAPHIQUE automatique avec EXCEL (statistiques par pays, régions et villes)', 'https://i.ytimg.com/vi/9eALuTKoTh8/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(474, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'gL35Ar0XMB4', 'CONVERTIR des DEVISES avec EXCEL - Créez votre convertisseur de monnaie automatique (Tuto)', 'https://i.ytimg.com/vi/gL35Ar0XMB4/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(475, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '0986-lRTYO8', 'IMPRIMER avec EXCEL : toutes les ASTUCES (Tutoriel facile)', 'https://i.ytimg.com/vi/0986-lRTYO8/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(476, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'DOQLac_0QBM', 'Les FORMULES et CALCULS de base avec EXCEL - Calculatrice automatique (Tutoriel)', 'https://i.ytimg.com/vi/DOQLac_0QBM/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(477, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'HmoZ-HgVe04', 'SOMME et MOYENNE avec EXCEL + Rechercher une formule (Tutoriel simple)', 'https://i.ytimg.com/vi/HmoZ-HgVe04/hqdefault.jpg', NULL, '2023-01-15 00:05:40', NULL),
(478, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'wHGMBjkce8o', 'COMMENT utiliser MICROSOFT EXCEL ? - Formation complète 365', 'https://i.ytimg.com/vi/wHGMBjkce8o/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(479, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '0jbun2KfDnE', 'ORGANISER les FEUILLES d\'un classeur EXCEL : copier, supprimer, déplacer, colorier... (Tutoriel)', 'https://i.ytimg.com/vi/0jbun2KfDnE/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(480, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'q6NzIEKL2TM', 'GÉRER les LIGNES et COLONNES dans EXCEL: agrandir, ajuster, ajouter, effacer, uniformiser (Tuto)', 'https://i.ytimg.com/vi/q6NzIEKL2TM/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(481, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'eOHFvo3LisM', 'MISE EN FORME du TEXTE dans EXCEL : aligner, centrer, orienter, renvoyer à la ligne... (Formation)', 'https://i.ytimg.com/vi/eOHFvo3LisM/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(482, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '14_UAvEM9d4', 'Les BORDURES et TRAMES dans EXCEL pour créer un TABLEAU : Cours pratique Office', 'https://i.ytimg.com/vi/14_UAvEM9d4/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(483, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'FqCSvH0NUMI', 'FUSIONNER dans EXCEL et CENTRER un TITRE sur plusieurs cases (Tutoriel rapide)', 'https://i.ytimg.com/vi/FqCSvH0NUMI/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(484, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'hzkmb0-iles', 'Comment réaliser des CALCULS avec EXCEL ? - Opérations et formules (Cours facile)', 'https://i.ytimg.com/vi/hzkmb0-iles/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(485, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '3AUwF4Jxq20', 'Calculer une SOMME et une MOYENNE + formules (Cours EXCEL)', 'https://i.ytimg.com/vi/3AUwF4Jxq20/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(486, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'pIBGRA2ErlM', 'Calculer un POURCENTAGE avec EXCEL (Cours Office en français)', 'https://i.ytimg.com/vi/pIBGRA2ErlM/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(487, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '96snn_ENHt4', 'Les graphiques avec EXCEL - Formation Office facile', 'https://i.ytimg.com/vi/96snn_ENHt4/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(488, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'uVn3j_WMDH8', 'FILTRER et TRIER une base de données ou une liste avec Microsoft EXCEL', 'https://i.ytimg.com/vi/uVn3j_WMDH8/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(489, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '2WsLW4iSW_s', 'Les fonctions NB.SI et NBVAL (Tutoriel Microsoft Excel)', 'https://i.ytimg.com/vi/2WsLW4iSW_s/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(490, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '_WpijGWdyKc', 'Les fonctions MIN et MAX - Cours EXCEL gratuit et facile', 'https://i.ytimg.com/vi/_WpijGWdyKc/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(491, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '4YB_2sa9YGQ', 'La MISE EN FORME CONDITIONNELLE (Cours EXCEL en français)', 'https://i.ytimg.com/vi/4YB_2sa9YGQ/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(492, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'J1u1HGcXYus', 'Les GRAPHIQUES SPARKLINE (mini-graphiques) - Tutoriel EXCEL', 'https://i.ytimg.com/vi/J1u1HGcXYus/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(493, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'Iag-161QKg8', 'Comment utiliser la fonction SI ? (condition à 2 choix) - Cours facile EXCEL', 'https://i.ytimg.com/vi/Iag-161QKg8/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(494, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'nweTyuainQU', 'Excel: SI imbriqués (condition à 3 possibilités ou plus) - Cours EXCEL', 'https://i.ytimg.com/vi/nweTyuainQU/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(495, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '-mm5fR0JkIg', 'Les fonctions ET et OU avec EXCEL + utilisation avec SI (Tutoriel)', 'https://i.ytimg.com/vi/-mm5fR0JkIg/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(496, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '2t6_P5gWWdM', 'Les nombres aléatoires avec EXCEL - ALEA et ALEA ENTRE BORNES', 'https://i.ytimg.com/vi/2t6_P5gWWdM/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(497, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'hGvG1RKHsVc', 'Créer une LISTE DÉROULANTE avec EXCEL - Tutoriel facile', 'https://i.ytimg.com/vi/hGvG1RKHsVc/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(498, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'qWIal3P7o1Q', 'La VALIDATION des DONNÉES avec EXCEL - Créer un formulaire sans erreur d\'encodage', 'https://i.ytimg.com/vi/qWIal3P7o1Q/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(499, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'emBoX5S0rfk', 'Les fonctions RECHERCHEV et RECHERCHEH avec EXCEL : tuto et exemples', 'https://i.ytimg.com/vi/emBoX5S0rfk/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(500, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'KL6eBBDb0z0', 'Créer un TABLEAU CROISÉ DYNAMIQUE + GRAPHIQUE - Cours EXCEL gratuit', 'https://i.ytimg.com/vi/KL6eBBDb0z0/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(501, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'BCHoaGimAz4', 'La fonction RANG avec EXCEL : établir un classement (tutoriel)', 'https://i.ytimg.com/vi/BCHoaGimAz4/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(502, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'M-LzyNqfJpw', 'Réaliser un CLASSEMENT AUTOMATIQUE avec EXCEL - Exemple pratique', 'https://i.ytimg.com/vi/M-LzyNqfJpw/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(503, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '9eALuTKoTh8', 'Créer une CARTE GÉOGRAPHIQUE automatique avec EXCEL (statistiques par pays, régions et villes)', 'https://i.ytimg.com/vi/9eALuTKoTh8/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(504, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'gL35Ar0XMB4', 'CONVERTIR des DEVISES avec EXCEL - Créez votre convertisseur de monnaie automatique (Tuto)', 'https://i.ytimg.com/vi/gL35Ar0XMB4/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(505, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', '0986-lRTYO8', 'IMPRIMER avec EXCEL : toutes les ASTUCES (Tutoriel facile)', 'https://i.ytimg.com/vi/0986-lRTYO8/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(506, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'DOQLac_0QBM', 'Les FORMULES et CALCULS de base avec EXCEL - Calculatrice automatique (Tutoriel)', 'https://i.ytimg.com/vi/DOQLac_0QBM/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL),
(507, 24, 'UCPR8d5zPiiz9IUhZQQyOv3g', 'Thom Reo', 'HmoZ-HgVe04', 'SOMME et MOYENNE avec EXCEL + Rechercher une formule (Tutoriel simple)', 'https://i.ytimg.com/vi/HmoZ-HgVe04/hqdefault.jpg', NULL, '2023-01-15 00:05:58', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2018_12_23_120000_create_shoppingcart_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_02_17_012745_create_sessions_table', 1),
(8, '2022_02_18_170905_create_admins_table', 1),
(9, '2022_09_08_214210_create_student_classes_table', 1),
(10, '2022_12_13_151131_create_brands_table', 2),
(11, '2022_12_13_151317_create_categories_table', 2),
(12, '2022_12_13_151535_create_sub_categories_table', 2),
(13, '2022_12_13_151713_create_sub_sub_categories_table', 2),
(14, '2022_12_13_170002_create_notices_table', 3),
(15, '2022_12_14_090304_create_products_table', 4),
(16, '2022_12_15_171931_create_lessons_table', 5),
(17, '2022_12_17_182820_create_comments_table', 6),
(18, '2022_12_18_101356_create_wishlists_table', 7),
(19, '2022_12_18_165545_create_orders_table', 8),
(20, '2022_12_18_165605_create_order_items_table', 8),
(21, '2022_12_19_102018_create_user_suivis_table', 9),
(22, '2022_12_19_103022_create_visit_counts_table', 9);

-- --------------------------------------------------------

--
-- Structure de la table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `notice_link` varchar(255) DEFAULT NULL,
  `notice_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notices`
--

INSERT INTO `notices` (`id`, `product_id`, `notice_link`, `notice_image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'upload/notices/1752120649032116.jpg', 1, NULL, NULL),
(2, NULL, 'none_url', 'upload/notices/1752128816490748.png', 1, NULL, NULL),
(3, NULL, 'none_url', 'upload/notices/1752827623007111.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coutry` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `quarter` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `post_code` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(255) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_month` varchar(255) NOT NULL,
  `order_year` varchar(255) NOT NULL,
  `confirmed_date` varchar(255) DEFAULT NULL,
  `processing_date` varchar(255) DEFAULT NULL,
  `picked_date` varchar(255) DEFAULT NULL,
  `shipped_date` varchar(255) DEFAULT NULL,
  `delivered_date` varchar(255) DEFAULT NULL,
  `cancel_date` varchar(255) DEFAULT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `return_reason` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division_id`, `district_id`, `state_id`, `coutry`, `town`, `quarter`, `name`, `email`, `phone`, `post_code`, `notes`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, 'Cameroon', 'Yaoundé', 'Mbankolo', 'brecht tankoua brecht tankoua', 'brtankoua@gmail.com', '0694011998', 237, NULL, 'Paiement à la Livraison', 'Paiement à la Livraison', NULL, 'fcfa', 24200.00, NULL, 'EOS94710305', '22 December 2022', 'December', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2022-12-22 02:58:11', NULL),
(2, 1, NULL, NULL, NULL, 'Cameroon', 'yaounde', 'mbankolo', 'brecht tankoua brecht tankoua', 'brtankoua@gmail.com', '0694011998', 237, NULL, 'Paiement à la Livraison', 'Paiement à la Livraison', NULL, 'fcfa', 15125.00, NULL, 'EOS41515034', '27 December 2022', 'December', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2022-12-27 16:28:24', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 10000.00, '2022-12-22 02:58:13', NULL),
(2, 2, 10, 12500.00, '2022-12-27 16:28:25', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
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
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) NOT NULL,
  `product_name_fr` varchar(255) NOT NULL,
  `product_slug_fr` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `avis` int(11) NOT NULL,
  `product_tags_fr` varchar(255) NOT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `selling_price` varchar(255) DEFAULT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `short_descp_fr` text DEFAULT NULL,
  `long_descp_fr` longtext DEFAULT NULL,
  `specification_fr` varchar(255) DEFAULT NULL,
  `product_thambnail` varchar(255) NOT NULL,
  `langue` varchar(255) DEFAULT NULL,
  `top_sales` int(11) DEFAULT NULL,
  `top_views` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `top_20` int(11) DEFAULT NULL,
  `special` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_fr`, `product_slug_fr`, `product_code`, `avis`, `product_tags_fr`, `video_link`, `selling_price`, `discount_price`, `short_descp_fr`, `long_descp_fr`, `specification_fr`, `product_thambnail`, `langue`, `top_sales`, `top_views`, `type`, `top_20`, `special`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 3, 'Javascript de A à Z', 'javascript-de-a-a-z', '61cb5nf0', 7, 'javascript,free,gratuit,programmation', 'asToYAq0F-I', NULL, NULL, '<h2>Description</h2>\n\n<p>Dans ce&nbsp;<strong>cours en ligne,</strong>&nbsp;nous allons apprendre &agrave; utiliser un langage g&eacute;nial :&nbsp;<strong>JavaScript</strong>.<br />\nC&#39;est un des piliers pour coder en&nbsp;<strong>Front-End</strong>, et depuis quelques ann&eacute;es on l&#39;utilise m&ecirc;me en back, en application de bureau, en application mobile et j&#39;en passe !</p>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Un ordinateur</p>\r\n	</li>\r\n	<li>\r\n	<p>Des connaissances de base en HTML / CSS</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p>Dans ce&nbsp;<strong>cours en ligne,</strong>&nbsp;nous allons apprendre &agrave; utiliser un langage g&eacute;nial :&nbsp;<strong>JavaScript</strong>.<br />\r\nC&#39;est un des piliers pour coder en&nbsp;<strong>Front-End</strong>, et depuis quelques ann&eacute;es on l&#39;utilise m&ecirc;me en back, en application de bureau, en application mobile et j&#39;en passe !</p>\r\n\r\n<p>C&#39;est donc un&nbsp;<strong>incontournable.&nbsp;</strong>Il faut bien le ma&icirc;triser pour acc&eacute;der &agrave; toutes ces possibilit&eacute;s.</p>\r\n\r\n<p>Au programme de cette formation 100% en ligne pour apprendre le JavaScript :</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Les bases,</p>\r\n	</li>\r\n	<li>\r\n	<p>Les conditions,</p>\r\n	</li>\r\n	<li>\r\n	<p>Les &eacute;v&egrave;nements,</p>\r\n	</li>\r\n	<li>\r\n	<p>Les objets,</p>\r\n	</li>\r\n	<li>\r\n	<p>Les fonctions,</p>\r\n	</li>\r\n	<li>\r\n	<p>Les tableaux,</p>\r\n	</li>\r\n	<li>\r\n	<p>Le&nbsp;<strong>JavaScript moderne</strong>,</p>\r\n	</li>\r\n	<li>\r\n	<p>Le JavaScript asynchrone,</p>\r\n	</li>\r\n	<li>\r\n	<p>Comment g&eacute;rer son &eacute;diteur, les sites utiles,</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Des projets pour mettre en pratique</strong>&nbsp;ce que l&#39;on voit ensemble,</p>\r\n	</li>\r\n	<li>\r\n	<p>Il y aura &eacute;galement&nbsp;<strong>beaucoup d&#39;exercices</strong>&nbsp;et de&nbsp;<strong>quizz</strong>&nbsp;!</p>\r\n	</li>\r\n	<li>\r\n	<p>Enfin nous r&eacute;aliserons des projets sympathiques pour&nbsp;<strong>voir les possibilit&eacute;s de JS&nbsp;</strong>et pour vous donner des&nbsp;<strong>id&eacute;es</strong>.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Programme all&eacute;chant n&#39;est ce pas ? Rendez-vous de l&#39;autre c&ocirc;t&eacute; pour commencer &agrave; coder !</p>\r\n\r\n<p><strong>Pr&eacute;-requis pour suivre confortablement la formation</strong></p>\r\n\r\n<p>Nous verrons comment le JavaScript est li&eacute; &agrave; l&#39;HTML et au CSS, c&#39;est donc important d&#39;avoir des bases dans ces deux langages !</p>\r\n\r\n<h2>&Agrave; qui ce cours s&#39;adresse-t-il&nbsp;?</h2>\r\n\r\n<ul>\r\n	<li>Personne effectuant une reconversion</li>\r\n	<li>Dev Front</li>\r\n	<li>Dev back</li>\r\n	<li>&Eacute;tudiant en informatique</li>\r\n	<li>Amateur de dev web</li>\r\n</ul>', NULL, 'upload/courses/thambnail/1752189174907559.jpg', 'francais', NULL, NULL, 0, 1, NULL, 1, '2022-12-14 10:36:53', '2023-01-24 20:17:08'),
(2, 1, 4, 1, 2, 'Le guide de Laravel 8', 'le-guide-de-laravel-8', 't51doxiq', 10, 'laravel,programmation,web', 'SbR0-dGg3tE', NULL, NULL, '<h2>Description</h2>\r\n\r\n<p>Dans ce guide sur framework&nbsp;<strong>Laravel 8</strong>, vous allez apprendre les notions fondamentales du framework via des exemples concrets et la cr&eacute;ation d&#39;un blog. Vous serez donc en mesure de comprendre et ma&icirc;triser le framework.</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>D&eacute;couvrir les bases de Laravel</p>\r\n	</li>\r\n	<li>\r\n	<p>Installation &amp; creation du projet</p>\r\n	</li>\r\n	<li>\r\n	<p>Comprendre le syst&egrave;me de route</p>\r\n	</li>\r\n	<li>\r\n	<p>Les variables</p>\r\n	</li>\r\n	<li>\r\n	<p>Hebergement avec heroku</p>\r\n	</li>\r\n	<li>\r\n	<p>Creation depot github</p>\r\n	</li>\r\n</ul>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Notions de PHP</p>\r\n	</li>\r\n	<li>\r\n	<p>Notions de Programmation Orient&eacute;e Objet</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p>Dans ce guide sur framework&nbsp;<strong>Laravel 8</strong>, vous allez apprendre les notions fondamentales du framework via des exemples concrets et la cr&eacute;ation d&#39;un blog. Vous serez donc en mesure de comprendre et ma&icirc;triser le framework.</p>\r\n\r\n<p>A la fin de cette formation, vous serez capable de construire et&nbsp;<strong>s&eacute;curiser&nbsp;</strong>votre propre site web, via un syst&egrave;me&nbsp;<strong>d&#39;authentification</strong>.</p>\r\n\r\n<p>Vous apprendrez les notions essentielles de Laravel, telles que le&nbsp;<strong>routing</strong>, l&#39;utilisation du mod&egrave;le&nbsp;<strong>MVC</strong>, la cr&eacute;ation de&nbsp;<strong>Model</strong>, l&#39;utilisation d&#39;un&nbsp;<strong>moteur de template,&nbsp;</strong>la communication avec une<strong>&nbsp;base de donn&eacute;es</strong>&nbsp;etc..</p>\r\n\r\n<p>Nous aurons l&#39;occasion d&#39;aborder le&nbsp;<strong>cycle de vie</strong>&nbsp;d&#39;un mod&egrave;le, l&#39;utilisation de&nbsp;<strong>helpers</strong>, la gestion des&nbsp;<strong>relations</strong>&nbsp;entre mod&egrave;les, les&nbsp;<strong>factories</strong>, les&nbsp;<strong>tests unitaires</strong>&nbsp;et&nbsp;<strong>fonctionnels,&nbsp;</strong>la<strong>&nbsp;surcharge&nbsp;</strong>de fichiers<strong>&nbsp;</strong>Laravel etc..</p>\r\n\r\n<p>Bon apprentissage !</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>D&eacute;couvrir les bases de Laravel</p>\r\n	</li>\r\n	<li>\r\n	<p>Installation &amp; creation du projet</p>\r\n	</li>\r\n	<li>\r\n	<p>Comprendre le syst&egrave;me de route</p>\r\n	</li>\r\n	<li>\r\n	<p>Les variables</p>\r\n	</li>\r\n	<li>\r\n	<p>Hebergement avec heroku</p>\r\n	</li>\r\n	<li>\r\n	<p>Creation depot heroku</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>&Agrave; qui ce cours s&#39;adresse-t-il&nbsp;?</h2>\r\n\r\n<ul>\r\n	<li>D&eacute;veloppeurs PHP</li>\r\n	<li>D&eacute;veloppeurs Juniors</li>\r\n	<li>Toute personne souhaitant prendre en main Laravel</li>\r\n</ul>', NULL, 'upload/courses/thambnail/1752242806020399.png', 'francais', NULL, NULL, 0, 1, 1, 1, '2022-12-15 00:49:22', NULL),
(3, 1, 4, 1, 1, 'HTML5 et CSS3 : la formation ULTIME', 'html5-et-css3-la-formation-ultime', 'wsacf8ob', 10, 'html,css,web,programmation,gratuit,free', 'u5W2NWItytc', NULL, NULL, '<p>Description</p>\r\n\r\n<p>Dans ce cours vous allez construire un site Web depuis 0 avec uniquement de l&#39;HTML et du CSS.<br />\r\nVous allez taper vos premi&eacute;res lignes de code ! Je vous assisterai et vous expliquerai en d&eacute;tails chacune des &eacute;tapes.<br />\r\nAllez ! Au boulot ! On passe &agrave; l&#39;action !</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Ma&icirc;triser les langages HTML et CSS</p>\r\n	</li>\r\n	<li>\r\n	<p>Construire un site Web</p>\r\n	</li>\r\n</ul>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Pour suivre ce cours, vous n&#39;avez besoin d&#39;aucun pr&eacute;-requis technique</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p>Vous souhaitez devenir d&eacute;veloppeur web?<br />\r\nVous voulez &ecirc;tre capable de cr&eacute;er un site Internet?<br />\r\nVous &ecirc;tes un d&eacute;butant dans ce domaine?<br />\r\nAlors vous &ecirc;tes exactement l&agrave; ou vous devez &ecirc;tre !</p>\r\n\r\n<p>Dans ce cours on va apprendre ensemble les bases du web, c&#39;est &agrave; dire HTML et CSS.</p>\r\n\r\n<p>HTML c&#39;est quoi?<br />\r\nC&#39;est un langage compos&eacute; de ce que l&#39;on appelle des tags qui vont nous permettre de repr&eacute;senter la structure de nos pages Web: un titre, un paragraphe, des images, etc...<br />\r\nMaintenant, il faut savoir que HTML sans CSS c&#39;est pas tr&egrave;s joli !<br />\r\nC&#39;est pourquoi HTML vient souvent avec son fid&eacute;le compagnon: le CSS.</p>\r\n\r\n<p><br />\r\nCSS c&#39;est quoi?<br />\r\nC&#39;est un langage qui va d&eacute;corer notre HTML, il est responsable des couleurs, des tailles, de la mise en page, etc...</p>\r\n\r\n<p>Dans ce cours vous allez construire un site Web depuis 0 avec uniquement de l&#39;HTML et du CSS.<br />\r\nVous allez taper vos premi&eacute;res lignes de code ! Je vous assisterai et vous expliquerai en d&eacute;tails chacune des &eacute;tapes.<br />\r\nAllez ! Au boulot ! On passe &agrave; l&#39;action !</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Ma&icirc;triser les langages HTML et CSS</p>\r\n	</li>\r\n	<li>\r\n	<p>Construire un site Web</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>&Agrave; qui ce cours s&#39;adresse-t-il&nbsp;?</h2>\r\n\r\n<ul>\r\n	<li>Toute personne voulant apprendre &agrave; cr&eacute;er un Site Web</li>\r\n</ul>', NULL, 'upload/courses/thambnail/1752243839770825.jpg', 'francais', NULL, 1, 0, 1, NULL, 1, '2022-12-15 01:05:46', NULL),
(4, 1, 4, 1, 1, 'HTML and CSS Tutorials', 'html-and-css-tutorials', 'tfoqmy4n', 10, 'Lorem,Ipsum,Amet', 'TKYsuU86-DQ', NULL, NULL, '<h2>Description</h2>\r\n\r\n<p>In this course you&#39;ll gain a deep understanding of HTML and CSS (HTML5, CSS3 and beyond), as we dive into how these technologies really work. We&#39;ll look at the problems HTML and CSS are trying to solve and how they solve them. We&#39;ll dive into how browser rendering engines really work. We&#39;ll gain confidence to read and understand the HTML and CSS&nbsp;specifications, so you can continue to teach yourself in the future and keep your skills fresh.</p>', '<h2>Description</h2>\r\n\r\n<p>In this course you&#39;ll gain a deep understanding of HTML and CSS (HTML5, CSS3 and beyond), as we dive into how these technologies really work. We&#39;ll look at the problems HTML and CSS are trying to solve and how they solve them. We&#39;ll dive into how browser rendering engines really work. We&#39;ll gain confidence to read and understand the HTML and CSS&nbsp;specifications, so you can continue to teach yourself in the future and keep your skills fresh.</p>\r\n\r\n<p>Along the way we&rsquo;ll follow our core philosophy of &ldquo;Don&rsquo;t Imitate, Understand&rdquo;. Simply copying others&rsquo; projects won&rsquo;t help you when faced with a real-world job that doesn&rsquo;t look like the projects you&rsquo;ve copied. To succeed in a real world job, you need to truly understand.</p>\r\n\r\n<p>This course is designed for beginners to learn from scratch, but also to break experienced developers out of bad habits.</p>', NULL, 'upload/courses/thambnail/1752244750852246.jpg', 'anglais', NULL, 1, 0, 1, 1, 1, '2022-12-15 01:20:15', NULL),
(5, 1, 4, 1, 2, 'Laravel 9 A-Z For Beginner', 'laravel-9-a-z-for-beginner', '3ypgqxov', 6, 'laravel,web,framework,php,programmation', 'aE23W1Tf_ZU', NULL, NULL, '<h2>Description</h2>\n\n<p><strong>Laravel 9 A-Z For Beginner&nbsp;</strong></p>\n\n<p>If you are very serious about learning laravel 9 from beginner to advance. Build up your laravel skill then this course will be the best choice for you.</p>\n\n<p><strong>Why We Should Learn Laravel?</strong></p>\n\n<ul>\n	<li>\n	<p>- Installation</p>\n	</li>\n	<li>\n	<p>- Learn about MVC</p>\n	</li>\n	<li>\n	<p>- Learn about routing</p>\n	</li>\n	<li>\n	<p>- Learn about controller</p>\n	</li>\n</ul>\n', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>OOP (Basic)</p>\r\n	</li>\r\n	<li>\r\n	<p>Basic HTML, CSS, Bootstrap</p>\r\n	</li>\r\n	<li>\r\n	<p>Local Server : Xampp/Wampp/Vertrigo/Mamp</p>\r\n	</li>\r\n	<li>\r\n	<p>Text Editor/IDE: Sublime Text, Visual Studio Code, Netbeans, PHPStrom, Atom etc</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p><strong>Laravel 9 A-Z For Beginner&nbsp;</strong></p>\r\n\r\n<p>If you are very serious about learning laravel 9 from beginner to advance. Build up your laravel skill then this course will be the best choice for you. In this course, you will build three different projects..</p>\r\n\r\n<p>Laravel is an open-source PHP framework, which is robust and easy to understand. It follows a model-view-controller design pattern. Laravel reuses the existing components of different frameworks which helps in creating a web application. The web application thus designed is more structured and pragmatic.</p>\r\n\r\n<p><strong>Why We Should Learn Laravel?</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>installation</p>\r\n	</li>\r\n	<li>\r\n	<p>Learn about MVC</p>\r\n	</li>\r\n	<li>\r\n	<p>making web applications faster</p>\r\n	</li>\r\n	<li>\r\n	<p>Learn about routing</p>\r\n	</li>\r\n	<li>\r\n	<p>Learn about controller</p>\r\n	</li>\r\n	<li>\r\n	<p>html form</p>\r\n	</li>\r\n</ul>', NULL, 'upload/courses/thambnail/1752246803583146.jpg', 'anglais', NULL, 1, 0, 1, 1, 1, '2022-12-15 01:52:53', '2022-12-22 03:06:35'),
(6, 2, 4, 1, 3, 'Web Projects With JavaScript', 'web-projects-with-javascript', 'j6k2lwo7', 6, 'js,javascript,payante,programmation', 'none', '10000', NULL, '<h2>Description</h2>\r\n\r\n<p>This is a&nbsp;<strong>fun, practical &amp; project based course&nbsp;</strong>for all skill levels. The projects in this course are designed to get you building things using HTML5, CSS &amp;&nbsp; JavaScript with no frameworks or libraries. Every project is built from scratch and has some kind of dynamic functionality from small games to an expense tracker to a breathing relax app.</p>\r\n\r\n<p><strong>Some Things You Will Learn In These Projects:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Create Layouts &amp; UI&#39;s With HTML/CSS ( No CSS Frameworks )</p>\r\n	</li>\r\n	<li>\r\n	<p>CSS Animations (Transitions, Keyframes, etc With JS Triggers)</p>\r\n	</li>\r\n	<li>\r\n	<p>JavaScript Fundamentals</p>\r\n	</li>\r\n	<li>\r\n	<p>DOM Selection &amp; Manipulation</p>\r\n	</li>\r\n	<li>\r\n	<p>JavaScript Events (Forms, buttons, scrolling, etc)</p>\r\n	</li>\r\n</ul>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Basic knowledge in HTML, CSS &amp; JavaScript</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p>This is a&nbsp;<strong>fun, practical &amp; project based course&nbsp;</strong>for all skill levels. The projects in this course are designed to get you building things using HTML5, CSS &amp;&nbsp; JavaScript with no frameworks or libraries. Every project is built from scratch and has some kind of dynamic functionality from small games to an expense tracker to a breathing relax app.</p>\r\n\r\n<p>Although this is a project based course, I will still be explaining everything as I go. These are mini-projects designed for you to complete in a few hours.</p>\r\n\r\n<p>You should have some basic knowledge of HTML/CSS/JS. If you are brand new, I would suggest my Modern HTML/CSS From The Beginning and/or my Modern JS From The Beginning courses on Udemy. This course is a mix of both.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Some Things You Will Learn In These Projects:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Create Layouts &amp; UI&#39;s With HTML/CSS ( No CSS Frameworks )</p>\r\n	</li>\r\n	<li>\r\n	<p>CSS Animations (Transitions, Keyframes, etc With JS Triggers)</p>\r\n	</li>\r\n	<li>\r\n	<p>JavaScript Fundamentals</p>\r\n	</li>\r\n	<li>\r\n	<p>DOM Selection &amp; Manipulation</p>\r\n	</li>\r\n	<li>\r\n	<p>JavaScript Events (Forms, buttons, scrolling, etc)</p>\r\n	</li>\r\n	<li>\r\n	<p>Fetch API &amp; JSON</p>\r\n	</li>\r\n	<li>\r\n	<p>HTML5 Canvas</p>\r\n	</li>\r\n	<li>\r\n	<p>The Audio &amp; Video API</p>\r\n	</li>\r\n	<li>\r\n	<p>Drag &amp; Drop</p>\r\n	</li>\r\n	<li>\r\n	<p>Web Speech API (Syth &amp; Recognition)</p>\r\n	</li>\r\n	<li>\r\n	<p>Working with Local Storage</p>\r\n	</li>\r\n	<li>\r\n	<p>High Order Array Methods - forEach, map, filter, reduce, sort</p>\r\n	</li>\r\n	<li>\r\n	<p>setTimout, setInterval</p>\r\n	</li>\r\n	<li>\r\n	<p>Arrow Functions</p>\r\n	</li>\r\n	<li>\r\n	<p>and More!!</p>\r\n	</li>\r\n</ul>', NULL, 'upload/courses/thambnail/1752248066880777.png', 'anglais', 1, NULL, 1, NULL, 1, 1, '2022-12-15 02:12:58', '2022-12-22 09:19:19'),
(7, 2, 4, 2, 2, 'Laravel 8 - Build Advance Ecommerce Project A-Z', 'laravel-8-build-advance-ecommerce-project-a-z', 'pwyzqgrn', 30, 'laravel,ecommerce,payante,programmation,web', 'none', '25000', NULL, '<h2>Description</h2>\r\n\r\n<p><strong>Laravel 8 Advance Ecommerce Project A-Z</strong></p>\r\n\r\n<p>If you are very serious about learning laravel 8 from beginner to advance. Build up your laravel skill then this course will be the best choice for you. In this course, you will build three different projects. One will be How to build a company website with Laravel 8. Then Laravel 8 Multi Authentication and last you will build one complete Advance Ecommerce Project with Laravel 8. You will build every project from scratch.&nbsp;</p>\r\n\r\n<p><strong>Why We Should Learn Laravel?</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Laravel is a first development life cycle and less code functionality</p>\r\n	</li>\r\n	<li>\r\n	<p>it&#39;s easy to learn</p>\r\n	</li>\r\n	<li>\r\n	<p>making web applications faster</p>\r\n	</li>\r\n	<li>\r\n	<p>configuration error and exception handling</p>\r\n	</li>\r\n</ul>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>You have to know basic PHP</p>\r\n	</li>\r\n	<li>\r\n	<p>OOP (Basic)</p>\r\n	</li>\r\n	<li>\r\n	<p>Basic HTML, CSS, Bootstrap</p>\r\n	</li>\r\n	<li>\r\n	<p>Local Server : Xampp/Wampp/Vertrigo/Mamp</p>\r\n	</li>\r\n	<li>\r\n	<p>Text Editor/IDE: Sublime Text, Visual Studio Code, Netbeans, PHPStrom, Atom etc</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p><strong>Laravel 8 Advance Ecommerce Project A-Z</strong></p>\r\n\r\n<p>If you are very serious about learning laravel 8 from beginner to advance. Build up your laravel skill then this course will be the best choice for you. In this course, you will build three different projects. One will be How to build a company website with Laravel 8. Then Laravel 8 Multi Authentication and last you will build one complete Advance Ecommerce Project with Laravel 8. You will build every project from scratch. This is not just a functional course it&#39;s a real-life project course. Which helps you to become a professional developer.</p>\r\n\r\n<p><strong>Why We Should Learn Laravel?</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Laravel is a first development life cycle and less code functionality</p>\r\n	</li>\r\n	<li>\r\n	<p>it&#39;s easy to learn</p>\r\n	</li>\r\n	<li>\r\n	<p>making web applications faster</p>\r\n	</li>\r\n	<li>\r\n	<p>configuration error and exception handling</p>\r\n	</li>\r\n	<li>\r\n	<p>automation testing work.</p>\r\n	</li>\r\n	<li>\r\n	<p>URL Routing Configuration is very high in Laravel.</p>\r\n	</li>\r\n	<li>\r\n	<p>Scheduling tasks configuration and management</p>\r\n	</li>\r\n	<li>\r\n	<p>It has a huge community</p>\r\n	</li>\r\n	<li>\r\n	<p>Unlimited resource.</p>\r\n	</li>\r\n	<li>\r\n	<p>Most importantly it&#39;s very easy to get a job if you have Laravel skills.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>What is your benefit?</strong></p>\r\n\r\n<p>As I told you this complete project course which beings you from Beginner to the Advance level by creating the complete most advanced Ecommerce Project. You will able to understand how to complete one project, how to handle project bugs. You will be able to start work for your client. Add this project to your portfolio and university assignment And most importantly you will get my support within 24 hours. If you have any issues just let me know about this I will be in your touch.</p>', NULL, 'upload/courses/thambnail/1752249545311792.png', 'anglais', 1, 1, 1, 1, 1, 1, '2022-12-15 02:36:28', NULL),
(8, 1, 1, 7, 6, 'Photoshop CS6 : formation complète', 'photoshop-cs6-formation-complete', 'pxa1gyw6', 20, 'infographie,photoshop,gratuit,free,photo,montage', 'fm4aHVTFOjA', NULL, NULL, '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Savoir utiliser un PC ou Mac.</p>\r\n	</li>\r\n	<li>\r\n	<p>Installer Photoshop (CC de pr&eacute;f&eacute;rence) ou une d&eacute;mo de Photoshop.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p>Dans ce cours complet, vous apprendrez &agrave; ma&icirc;triser les principaux aspects de Photoshop, que vous soyez totalement novice ou en partie form&eacute;. Vous d&eacute;couvrirez toutes les notions fondamentales pour analyser, retoucher, corriger, modifier vos images, &agrave; travers un cursus tr&egrave;s progressif. Apr&egrave;s avoir &eacute;tudi&eacute; de cours, vous pourrez laisser de c&ocirc;t&eacute; les questionnements techniques, et vous concentrer sur l&#39;essentiel : votre cr&eacute;ativit&eacute;.</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>- Visualiser, manipuler et analyser des images dans Photoshop.</p>\r\n	</li>\r\n	<li>\r\n	<p>- Modifier les valeurs et couleurs de photo, illustrations, cr&eacute;ation graphiques, etc.</p>\r\n	</li>\r\n	<li>\r\n	<p>- Utiliser toutes les fonctions de calques et d&#39;objets dynamiques de Photoshop.</p>\r\n	</li>\r\n	<li>\r\n	<p>- Ma&icirc;triser les s&eacute;lections, d&eacute;tourages et masques de Photoshop.</p>\r\n	</li>\r\n</ul>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Savoir utiliser un PC ou Mac.</p>\r\n	</li>\r\n	<li>\r\n	<p>Installer Photoshop (CC de pr&eacute;f&eacute;rence) ou une d&eacute;mo de Photoshop.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p>Dans ce cours complet, vous apprendrez &agrave; ma&icirc;triser les principaux aspects de Photoshop, que vous soyez totalement novice ou en partie form&eacute;. Vous d&eacute;couvrirez toutes les notions fondamentales pour analyser, retoucher, corriger, modifier vos images, &agrave; travers un cursus tr&egrave;s progressif. Apr&egrave;s avoir &eacute;tudi&eacute; de cours, vous pourrez laisser de c&ocirc;t&eacute; les questionnements techniques, et vous concentrer sur l&#39;essentiel : votre cr&eacute;ativit&eacute;.</p>\r\n\r\n<p>Id&eacute;al pour quiconque souhaite prendre en main Photoshop rapidement, retoucher, d&eacute;velopper ses photos num&eacute;riques, analyser ses images, comprendre et ma&icirc;triser les calques, les masques, les modes de fusion, les s&eacute;lections et d&eacute;tourages, les objets dynamiques, la peinture avec Photoshop, les styles de calque, les automatisations, et plus g&eacute;n&eacute;ralement tout ce qui est utile &agrave; la conception et la publication d&#39;images pour le web ou l&#39;impression.</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Visualiser, manipuler et analyser des images dans Photoshop.</p>\r\n	</li>\r\n	<li>\r\n	<p>Modifier les valeurs et couleurs de photo, illustrations, cr&eacute;ation graphiques, etc.</p>\r\n	</li>\r\n	<li>\r\n	<p>Utiliser toutes les fonctions de calques et d&#39;objets dynamiques de Photoshop.</p>\r\n	</li>\r\n	<li>\r\n	<p>Ma&icirc;triser les s&eacute;lections, d&eacute;tourages et masques de Photoshop.</p>\r\n	</li>\r\n	<li>\r\n	<p>Ma&icirc;triser les principaux outils de correction et retouche d&#39;image.</p>\r\n	</li>\r\n	<li>\r\n	<p>Utiliser les outils de peinture de Photoshop.</p>\r\n	</li>\r\n	<li>\r\n	<p>Pr&eacute;parer ses images pour le web et l&#39;impression.</p>\r\n	</li>\r\n	<li>\r\n	<p>Personnaliser l&#39;apparence et le comportement de Photoshop.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>&Agrave; qui ce cours s&#39;adresse-t-il&nbsp;?</h2>\r\n\r\n<ul>\r\n	<li>Toute personne souhaitant d&eacute;couvrir Photoshop et/ou progresser dans son utilisation.</li>\r\n</ul>', NULL, 'upload/courses/thambnail/1752611825919632.jpg', 'francais', NULL, 1, 0, 1, 1, 1, '2022-12-19 02:34:47', NULL),
(9, 1, 1, 7, 6, 'Photoshop 2021 : Niveau initiation', 'photoshop-2021-niveau-initiation', '0afoxme8', 16, 'infographie,photoshop,gratuit,montage,photo', 'SNU9eilHP3Y', NULL, NULL, '<h2>Description</h2>\r\n\r\n<p>Dans ce cours complet, vous apprendrez &agrave; ma&icirc;triser les principaux aspects de Photoshop, que vous soyez totalement novice ou en partie form&eacute;. Vous d&eacute;couvrirez toutes les notions fondamentales pour analyser, retoucher, corriger, modifier vos images, &agrave; travers un cursus tr&egrave;s progressif. Apr&egrave;s avoir &eacute;tudi&eacute; de cours, vous pourrez laisser de c&ocirc;t&eacute; les questionnements techniques, et vous concentrer sur l&#39;essentiel : votre cr&eacute;ativit&eacute;.</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>- Visualiser, manipuler et analyser des images dans Photoshop.</p>\r\n	</li>\r\n	<li>\r\n	<p>- Modifier les valeurs et couleurs de photo, illustrations, cr&eacute;ation graphiques, etc.</p>\r\n	</li>\r\n	<li>\r\n	<p>- Utiliser toutes les fonctions de calques et d&#39;objets dynamiques de Photoshop.</p>\r\n	</li>\r\n	<li>\r\n	<p>- Ma&icirc;triser les s&eacute;lections, d&eacute;tourages et masques de Photoshop.</p>\r\n	</li>\r\n</ul>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Savoir utiliser un PC ou Mac.</p>\r\n	</li>\r\n	<li>\r\n	<p>Installer Photoshop (CC de pr&eacute;f&eacute;rence) ou une d&eacute;mo de Photoshop.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p>Dans ce cours complet, vous apprendrez &agrave; ma&icirc;triser les principaux aspects de Photoshop, que vous soyez totalement novice ou en partie form&eacute;. Vous d&eacute;couvrirez toutes les notions fondamentales pour analyser, retoucher, corriger, modifier vos images, &agrave; travers un cursus tr&egrave;s progressif. Apr&egrave;s avoir &eacute;tudi&eacute; de cours, vous pourrez laisser de c&ocirc;t&eacute; les questionnements techniques, et vous concentrer sur l&#39;essentiel : votre cr&eacute;ativit&eacute;.</p>\r\n\r\n<p>Id&eacute;al pour quiconque souhaite prendre en main Photoshop rapidement, retoucher, d&eacute;velopper ses photos num&eacute;riques, analyser ses images, comprendre et ma&icirc;triser les calques, les masques, les modes de fusion, les s&eacute;lections et d&eacute;tourages, les objets dynamiques, la peinture avec Photoshop, les styles de calque, les automatisations, et plus g&eacute;n&eacute;ralement tout ce qui est utile &agrave; la conception et la publication d&#39;images pour le web ou l&#39;impression.</p>\r\n\r\n<p>Votre formateur est expert certifi&eacute; ACE (Adobe Certified Expert) sur le logiciel Photoshop CC, illustrateur ind&eacute;pendant, coloriste BD, formateur Photoshop et auteur de livres et articles de presse sur Photoshop.</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Visualiser, manipuler et analyser des images dans Photoshop.</p>\r\n	</li>\r\n	<li>\r\n	<p>Modifier les valeurs et couleurs de photo, illustrations, cr&eacute;ation graphiques, etc.</p>\r\n	</li>\r\n	<li>\r\n	<p>Utiliser toutes les fonctions de calques et d&#39;objets dynamiques de Photoshop.</p>\r\n	</li>\r\n	<li>\r\n	<p>Ma&icirc;triser les s&eacute;lections, d&eacute;tourages et masques de Photoshop.</p>\r\n	</li>\r\n	<li>\r\n	<p>Ma&icirc;triser les principaux outils de correction et retouche d&#39;image.</p>\r\n	</li>\r\n	<li>\r\n	<p>Utiliser les outils de peinture de Photoshop.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>&Agrave; qui ce cours s&#39;adresse-t-il&nbsp;?</h2>\r\n\r\n<ul>\r\n	<li>Toute personne souhaitant d&eacute;couvrir Photoshop et/ou progresser dans son utilisation</li>\r\n</ul>', NULL, 'upload/courses/thambnail/1752612533972004.jpg', 'francais', NULL, 1, 0, 1, 1, 1, '2022-12-19 02:46:00', '2024-02-04 20:56:16'),
(10, 2, 1, 7, 6, 'Photoshop CC MasterClass', 'photoshop-cc-masterclass', 'bp3grkz0', 9, 'Lorem,Ipsum,Amet', 'none', '12500', NULL, '<h2>Description</h2>\r\n\r\n<p>This course teaches you to use this industry-leading image editing application as a creative professional. The whole course content, including examples, techniques, exercises and quizzes have been carefully selected and refined to offer the most efficient and enjoyable way to master Adobe Photoshop</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Learn all the different kind of Selection techniques</p>\r\n	</li>\r\n	<li>\r\n	<p>Master Masking to be able to seamlessly combine images together</p>\r\n	</li>\r\n	<li>\r\n	<p>Learn how to retouch photos like a pro</p>\r\n	</li>\r\n	<li>\r\n	<p>Understand the differences and pros/cons between different image file formats</p>\r\n	</li>\r\n	<li>\r\n	<p>Learn useful keyboard shortcuts and best practices</p>\r\n	</li>\r\n	<li>\r\n	<p>Learn Photoshop from the very beginning the way a professional would use it</p>\r\n	</li>\r\n</ul>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Adobe Photoshop, preferably the latest CC (Creative Cloud) version.</p>\r\n	</li>\r\n	<li>\r\n	<p>No prior knowledge or experience with Photoshop is required</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p>This course teaches you to use this industry-leading image editing application as a creative professional. The whole course content, including examples, techniques, exercises and quizzes have been carefully selected and refined to offer the most efficient and enjoyable way to master Adobe Photoshop.</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Learn all the different kind of Selection techniques</p>\r\n	</li>\r\n	<li>\r\n	<p>Master Masking to be able to seamlessly combine images together</p>\r\n	</li>\r\n	<li>\r\n	<p>Learn how to retouch photos like a pro</p>\r\n	</li>\r\n	<li>\r\n	<p>Understand the differences and pros/cons between different image file formats</p>\r\n	</li>\r\n	<li>\r\n	<p>Learn useful keyboard shortcuts and best practices</p>\r\n	</li>\r\n	<li>\r\n	<p>Learn Photoshop from the very beginning the way a professional would use it</p>\r\n	</li>\r\n</ul>', NULL, 'upload/courses/thambnail/1752612915786212.jpg', 'anglais', 1, 1, 1, NULL, NULL, 1, '2022-12-19 02:52:04', '2023-01-22 07:04:01'),
(11, 1, 5, 8, 8, 'Cours de japonais pour débutant', 'cours-de-japonais-pour-debutant', '42bwmtq8', 10, 'formation,langue,japonais,free,gratuit', 'U2T-8ZFdsT0', NULL, NULL, '<h2>Description</h2>\r\n\r\n<p><strong>Cours de japonais pour D&eacute;butants</strong></p>\r\n\r\n<p>Cours enseign&eacute; en japonais (m&eacute;thode d&#39;immersion totale) avec des voix&nbsp;fran&ccedil;aise .</p>\r\n\r\n<p>Pendant ce cours nous allons d&eacute;couvrir les sujets suivants&nbsp;: le discours en japonais, la prononciation,&nbsp;les r&egrave;gles et les structures grammaticales, le vocabulaire, la conversation et les capacit&eacute;s de communication.&nbsp;</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>- Vous pourrez avoir une conversation en japonais.</p>\r\n	</li>\r\n	<li>\r\n	<p>- Vous allez conna&icirc;tre les notions de base et interm&eacute;diaires de la grammaire japonaise.</p>\r\n	</li>\r\n	<li>\r\n	<p>- Vous allez obtenir des aptitudes de base et un vocabulaire interm&eacute;diaire japonais.</p>\r\n	</li>\r\n	<li>\r\n	<p>- Vous allez comprendre et employer des expressions famili&egrave;res de tous les jours.</p>\r\n	</li>\r\n</ul>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Il faudrait savoir utiliser l&rsquo;ordinateur ou un telephone niveau d&eacute;butant</p>\r\n	</li>\r\n	<li>\r\n	<p>Pas n&eacute;cessaires d&rsquo;avoir des connaissances ant&eacute;rieures d&rsquo;anglais</p>\r\n	</li>\r\n	<li>\r\n	<p>Professeur natif</p>\r\n	</li>\r\n	<li>\r\n	<p>Le&ccedil;ons d&eacute;mo gratuits</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p><strong>Cours de japonais pour D&eacute;butants</strong></p>\r\n\r\n<p>Cours enseign&eacute; en japonais (m&eacute;thode d&#39;immersion totale) avec des voix&nbsp;fran&ccedil;aise .</p>\r\n\r\n<p>Pendant ce cours nous allons d&eacute;couvrir les sujets suivants&nbsp;: le discours en japonais, la prononciation,&nbsp;les r&egrave;gles et les structures grammaticales, le vocabulaire, la conversation et les capacit&eacute;s de communication.&nbsp;</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Vous pourrez avoir une conversation en japonais.</p>\r\n	</li>\r\n	<li>\r\n	<p>Vous allez conna&icirc;tre les notions de base et interm&eacute;diaires de la grammaire japonaise.</p>\r\n	</li>\r\n	<li>\r\n	<p>Vous allez obtenir des aptitudes de base et un vocabulaire interm&eacute;diaire japonais.</p>\r\n	</li>\r\n	<li>\r\n	<p>Vous allez comprendre et employer des expressions famili&egrave;res de tous les jours.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>&Agrave; qui ce cours s&#39;adresse-t-il&nbsp;?</h2>\r\n\r\n<ul>\r\n	<li>Le site est disponible pour tous qui veulent apprendre l&rsquo;anglais rapidement et facilement.</li>\r\n	<li>Ce cours est con&ccedil;u pour d&eacute;butants. On commence avec les notions de base.</li>\r\n	<li>Si vous &ecirc;tes presque interm&eacute;diaires, vous pouvez perfectionner vos connaissances d&rsquo;anglais avec ce cours.</li>\r\n</ul>', NULL, 'upload/courses/thambnail/1752826858623206.jpg', 'francais', NULL, 1, 0, 1, 1, 1, '2022-12-21 11:32:42', NULL),
(12, 2, 4, 1, 2, 'React & Laravel - Ecommerce Project', 'react-laravel-ecommerce-project', 'svxz5em8', 6, 'laravel,react,php,payant,sale,commerce', 'none', '15000', NULL, '<h2>Description</h2>\r\n\r\n<p><strong>This React Js With Laravel Build Complete PWA Ecommerce Project Course will help you to become a Full Stack Web Developer</strong></p>\r\n\r\n<p>React has rapidly become one of the&nbsp;<strong>most powerful tools for building Web Applications</strong>. Top sites using React include Facebook, Twitter, Netflix, Airbnb, and more!</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>- React Basic Foundation</p>\r\n	</li>\r\n	<li>\r\n	<p>- JavaScript Fundamental In Detail</p>\r\n	</li>\r\n	<li>\r\n	<p>- A-Z React FrontEnd</p>\r\n	</li>\r\n	<li>\r\n	<p>- Creating REST API</p>\r\n	</li>\r\n	<li>\r\n	<p>- Project Implementation with Database on Real Server</p>\r\n	</li>\r\n	<li>\r\n	<p>- Component Framework</p>\r\n	</li>\r\n</ul>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Must Know HTML</p>\r\n	</li>\r\n	<li>\r\n	<p>Must Know CSS</p>\r\n	</li>\r\n	<li>\r\n	<p>Basics Knowledge Of React Js will be better.</p>\r\n	</li>\r\n	<li>\r\n	<p>A Windows PC, Mac or Linux Computer</p>\r\n	</li>\r\n	<li>\r\n	<p>Basics of JavaScript like creating functions and loops</p>\r\n	</li>\r\n	<li>\r\n	<p>Desire to learn React</p>\r\n	</li>\r\n	<li>\r\n	<p>Nothing else! It&rsquo;s just you, your computer and your ambition to get started today</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p><strong>This React Js With Laravel Build Complete PWA Ecommerce Project Course will help you to become a Full Stack Web Developer</strong></p>\r\n\r\n<p>React has rapidly become one of the&nbsp;<strong>most powerful tools for building Web Applications</strong>. Top sites using React include Facebook, Twitter, Netflix, Airbnb, and more!</p>\r\n\r\n<p>This course is perfect for all who want to start their career as a&nbsp;<strong>Full Stack Web Developer.</strong>&nbsp;This course will help you to build a strong foundation of Frontend by React Js and Backend by Laravel.</p>\r\n\r\n<p>If you complete totally course perfectly you will be able to build any dynamic website with react and laravel. In this course, i will create multiple complete real-life projects included a Complete Ecommerce Website from scratch. I have designed this course like that way first you will learn react Basic Fundamentals then you will Learn Laravel Basic fundamentals by complete one project. Then together&nbsp;<strong>React Js&nbsp;</strong>and&nbsp;<strong>Laravel&nbsp;</strong>how to create one<strong>&nbsp;Complete PWA Ecommerce Application</strong>&nbsp;I will show this with a live example.</p>\r\n\r\n<p>Also, you will be able to understand how to create Rest API and also how to use this API everything I will show you with a live example. So you will not just learn from this course you will do it.</p>\r\n\r\n<p>That will be a straight forward course Coz you will build one complete&nbsp;<strong>PWA Ecommerce project</strong>&nbsp;with react and laravel from scratch. and it will be one progressive web application.</p>\r\n\r\n<p><strong>And remember the practical experience is the best way to let you learn any new programming language</strong>. Our Mission is to become you successful.</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>React Basic Foundation</p>\r\n	</li>\r\n	<li>\r\n	<p>JavaScript Fundamental In Detail</p>\r\n	</li>\r\n	<li>\r\n	<p>A-Z React FrontEnd</p>\r\n	</li>\r\n	<li>\r\n	<p>Creating REST API</p>\r\n	</li>\r\n	<li>\r\n	<p>Project Implementation with Database on Real Server</p>\r\n	</li>\r\n	<li>\r\n	<p>Component Framework</p>\r\n	</li>\r\n	<li>\r\n	<p>React API Consuming</p>\r\n	</li>\r\n	<li>\r\n	<p>Contact Form Setup</p>\r\n	</li>\r\n	<li>\r\n	<p>Loader Animation Setup</p>\r\n	</li>\r\n	<li>\r\n	<p>API Failure Setup</p>\r\n	</li>\r\n	<li>\r\n	<p>Laravel Fundamental All</p>\r\n	</li>\r\n	<li>\r\n	<p>Build React Js Authentication with Laravel Passport</p>\r\n	</li>\r\n	<li>\r\n	<p>Admin Panel Setup</p>\r\n	</li>\r\n	<li>\r\n	<p>Laravel Authentication with Jetstream</p>\r\n	</li>\r\n	<li>\r\n	<p>Product Image Zoom</p>\r\n	</li>\r\n	<li>\r\n	<p>Related Product Setup</p>\r\n	</li>\r\n	<li>\r\n	<p>Product Review Option</p>\r\n	</li>\r\n	<li>\r\n	<p>Add To Cart Option</p>\r\n	</li>\r\n	<li>\r\n	<p>Add To Favorite Option</p>\r\n	</li>\r\n	<li>\r\n	<p>Order History Option</p>\r\n	</li>\r\n	<li>\r\n	<p>Notification History</p>\r\n	</li>\r\n	<li>\r\n	<p>Managing Loader Placeholder</p>\r\n	</li>\r\n	<li>\r\n	<p>Form Validation with Message</p>\r\n	</li>\r\n	<li>\r\n	<p>Multiple Language Option</p>\r\n	</li>\r\n	<li>\r\n	<p>Build PWA Application</p>\r\n	</li>\r\n	<li>\r\n	<p>Responsive for all Devices</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>What is the Best Part of this Course?</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>You will learn&nbsp;<strong>React Js</strong>&nbsp;Basic Fundamentals</p>\r\n	</li>\r\n	<li>\r\n	<p>You will learn&nbsp;<strong>JavaScript</strong>&nbsp;Fundamentals [Updated on Nov 21]</p>\r\n	</li>\r\n	<li>\r\n	<p>You will learn&nbsp;<strong>Laravel&nbsp;</strong>Basic Fundamentals</p>\r\n	</li>\r\n	<li>\r\n	<p>How to Create Rest API</p>\r\n	</li>\r\n	<li>\r\n	<p>Some Essential JavaScript.</p>\r\n	</li>\r\n	<li>\r\n	<p>Create Custom Authentication with&nbsp;<strong>React Js</strong>&nbsp;and&nbsp;<strong>Laravel&nbsp; Passport.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Build One<strong>&nbsp;Complete PWA Ecommerce Project.</strong></p>\r\n	</li>\r\n</ul>', NULL, 'upload/courses/thambnail/1752988655993018.png', 'anglais', 1, 1, 1, 1, 1, 1, '2022-12-23 07:24:19', '2024-01-15 16:24:00'),
(13, 1, 4, 1, 10, 'React JS - les bases', 'react-js-les-bases', '6we0k3go', 10, 'programmation,react,javascript,free,gratuit', 'QFaFIcGhPoM', NULL, NULL, '<h2>Description</h2>\r\n\r\n<p><em>Dans cette formation tu vas apprendre &agrave; utiliser le Framework Javascript le plus populaire : React.</em></p>\r\n\r\n<p>Il reste encore le&nbsp;<strong>Framework le plus demand&eacute; en 2021.&nbsp;</strong>Tu peux trouver des centaines de missions chaque jour sur les sites de Freelance li&eacute;s au code.</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Le Framework React</p>\r\n	</li>\r\n	<li>\r\n	<p>Utilier la &quot;Context API&quot;</p>\r\n	</li>\r\n	<li>\r\n	<p>React Router</p>\r\n	</li>\r\n	<li>\r\n	<p>Les composants</p>\r\n	</li>\r\n	<li>\r\n	<p>State et Props</p>\r\n	</li>\r\n	<li>\r\n	<p>Des outils de l&#39;&eacute;cosyst&egrave;me React</p>\r\n	</li>\r\n	<li>\r\n	<p>Des techniques pour mieux coder avec React</p>\r\n	</li>\r\n	<li>\r\n	<p>Faire des requ&ecirc;tes HTTP</p>\r\n	</li>\r\n	<li>\r\n	<p>&Eacute;changer des donn&eacute;es avec une API</p>\r\n	</li>\r\n	<li>\r\n	<p>Utiliser axios</p>\r\n	</li>\r\n</ul>', '<h2>Description</h2>\r\n\r\n<p><em>Dans cette formation tu vas apprendre &agrave; utiliser le Framework Javascript le plus populaire : React.</em></p>\r\n\r\n<p>Il reste encore le&nbsp;<strong>Framework le plus demand&eacute; en 2021.</strong><br />\r\nTu peux trouver des centaines de missions chaque jour sur les sites de Freelance li&eacute;s au code.</p>\r\n\r\n<p><strong>Les agences web et les entreprises s&#39;arrachent les d&eacute;veloppeurs qui ont ces comp&eacute;tences.</strong><br />\r\n<br />\r\nC&#39;est simple, la demande est beaucoup plus grande que l&#39;offre.</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Le Framework React</p>\r\n	</li>\r\n	<li>\r\n	<p>Utilier la &quot;Context API&quot;</p>\r\n	</li>\r\n	<li>\r\n	<p>React Router</p>\r\n	</li>\r\n	<li>\r\n	<p>Les composants</p>\r\n	</li>\r\n	<li>\r\n	<p>State et Props</p>\r\n	</li>\r\n	<li>\r\n	<p>Des outils de l&#39;&eacute;cosyst&egrave;me React</p>\r\n	</li>\r\n	<li>\r\n	<p>Des techniques pour mieux coder avec React</p>\r\n	</li>\r\n	<li>\r\n	<p>Faire des requ&ecirc;tes HTTP</p>\r\n	</li>\r\n	<li>\r\n	<p>&Eacute;changer des donn&eacute;es avec une API</p>\r\n	</li>\r\n	<li>\r\n	<p>Utiliser axios</p>\r\n	</li>\r\n</ul>', NULL, 'upload/courses/thambnail/1752989131023274.jpg', 'francais', NULL, 1, 0, 1, NULL, 1, '2022-12-23 07:31:51', NULL),
(14, 1, 3, 10, 11, 'Facebook ads 2022 -Formation complète', 'formation-complete-facebook-ads-2022', '4tdj0xyn', 7, 'facebook,marketing,free,gratuit,sociaux', 'CKSkhK_kri0', NULL, NULL, '<h2>Description</h2>\r\n\r\n<p>Pourquoi avoir choisi&nbsp;<strong>Facebook ?</strong></p>\r\n\r\n<p><strong>Facebook</strong>&nbsp;est l&rsquo;un des r&eacute;seaux&nbsp;<strong>le plus vaste du monde</strong>&nbsp;en terme d&rsquo;utilisateurs et d&rsquo;informations les concernant, donc dispose d&rsquo;une&nbsp;<strong>base de donn&eacute;e</strong>&nbsp;remplie&nbsp;<strong>d&rsquo;informations tr&egrave;s pr&eacute;cises et tr&egrave;s pointues&nbsp;</strong>qui peuvent vous aider &agrave;&nbsp;<strong>atteindre votre cible efficacement</strong>&nbsp;donc sans une initiation ad&eacute;quate il est facile de s&rsquo;y perdre.</p>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Aucun pr&eacute;-requis n&#39;est n&eacute;cessaire et aucune comp&eacute;tence requise: Le cours explique de A jusqu&#39;&agrave; Z la cr&eacute;ation des publicit&eacute;s sur Facebook</p>\r\n	</li>\r\n	<li>\r\n	<p>Un programme &eacute;tape par &eacute;tape de la cr&eacute;ation de Business Manager jusqu&#39;&agrave; la diffusion de fa&ccedil;on PRO vos campagnes avec un ciblage ultra pr&eacute;cis</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p>Vous n&rsquo;avez besoin&nbsp;<strong>ni de 6 mois d&rsquo;investissement, ni de comp&eacute;tence, ni de mat&eacute;riels et ni d&rsquo;argent &agrave; investir comme d&rsquo;aucuns le pensent,</strong>&nbsp;la seule chose dont vous avez besoin&nbsp;<strong>c&rsquo;est d&rsquo;un compte Business Manager de Facebook ou d&rsquo;un page Facebook</strong>&nbsp;et bien &eacute;videmment d&rsquo;une&nbsp;<strong>v&eacute;ritable strat&eacute;gie&nbsp;</strong>vous permettant<strong>&nbsp;d&rsquo;atteindre vos objectifs de mani&egrave;re efficace et efficiente.</strong></p>\r\n\r\n<p>Pourquoi avoir choisi&nbsp;<strong>Facebook ?</strong></p>\r\n\r\n<p><strong>Facebook</strong>&nbsp;est l&rsquo;un des r&eacute;seaux&nbsp;<strong>le plus vaste du monde</strong>&nbsp;en terme d&rsquo;utilisateurs et d&rsquo;informations les concernant, donc dispose d&rsquo;une&nbsp;<strong>base de donn&eacute;e</strong>&nbsp;remplie&nbsp;<strong>d&rsquo;informations tr&egrave;s pr&eacute;cises et tr&egrave;s pointues&nbsp;</strong>qui peuvent vous aider &agrave;&nbsp;<strong>atteindre votre cible efficacement</strong>&nbsp;donc sans une initiation ad&eacute;quate il est facile de s&rsquo;y perdre.</p>\r\n\r\n<p>Venez apprendre avec moi &agrave; exploiter la plateforme que vous utilisiez chaque jour, et qui regroupe le plus grand nombre d&rsquo;internautes pour faire connaitre vos produits, services et id&eacute;es pour atteindre vos objectifs effectivement et rapidement !</p>', NULL, 'upload/courses/thambnail/1753000345563952.jpg', 'francais', NULL, 1, 0, 1, 1, 1, '2022-12-23 10:30:06', '2023-06-20 19:04:59'),
(15, 1, 3, 10, 11, 'Marketing numérique Ads (débutant)', 'marketing-numerique-ads-debutant', 'ih2pgab9', 20, 'facebook,instagram,google,tiktok', 'wyMX6e2Vtjo', NULL, NULL, '<h2>Description</h2>\r\n\r\n<p><strong>Maitrisez les concepts du Facebook, Tiktok, Google&nbsp;Ads avec le cours le plus complet&nbsp; !!</strong></p>\r\n\r\n<p>Vous n&rsquo;avez besoin&nbsp;<strong>ni de 6 mois d&rsquo;investissement, ni de comp&eacute;tence, ni de mat&eacute;riels et ni d&rsquo;argent &agrave; investir comme d&rsquo;aucuns le pensent,</strong>&nbsp;la seule chose dont vous avez besoin&nbsp;<strong>c&rsquo;est d&rsquo;un compte Business Manager de Facebook ou d&rsquo;un page Facebook, Instagram, tiktok</strong>&nbsp;et bien &eacute;videmment d&rsquo;une&nbsp;<strong>v&eacute;ritable strat&eacute;gie&nbsp;</strong>vous permettant<strong>&nbsp;d&rsquo;atteindre vos objectifs de mani&egrave;re efficace et efficiente.</strong></p>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Aucun pr&eacute;-requis n&#39;est n&eacute;cessaire et aucune comp&eacute;tence requise: Le cours explique de A jusqu&#39;&agrave; Z la cr&eacute;ation des publicit&eacute;s sur Facebook</p>\r\n	</li>\r\n	<li>\r\n	<p>Un programme &eacute;tape par &eacute;tape de la cr&eacute;ation de Business Manager jusqu&#39;&agrave; la diffusion de fa&ccedil;on PRO vos campagnes avec un ciblage ultra pr&eacute;cis</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p><strong>Maitrisez les concepts du Facebook, Tiktok, Google&nbsp;Ads avec le cours le plus complet&nbsp; !!</strong></p>\r\n\r\n<p>Vous n&rsquo;avez besoin&nbsp;<strong>ni de 6 mois d&rsquo;investissement, ni de comp&eacute;tence, ni de mat&eacute;riels et ni d&rsquo;argent &agrave; investir comme d&rsquo;aucuns le pensent,</strong>&nbsp;la seule chose dont vous avez besoin&nbsp;<strong>c&rsquo;est d&rsquo;un compte Business Manager de Facebook ou d&rsquo;un page Facebook, Instagram, tiktok</strong>&nbsp;et bien &eacute;videmment d&rsquo;une&nbsp;<strong>v&eacute;ritable strat&eacute;gie&nbsp;</strong>vous permettant<strong>&nbsp;d&rsquo;atteindre vos objectifs de mani&egrave;re efficace et efficiente.</strong></p>', NULL, 'upload/courses/thambnail/1753001435590056.jpg', 'francais', NULL, NULL, 0, NULL, 1, 1, '2022-12-23 10:47:25', NULL),
(16, 1, 4, 4, 4, 'Python For Beginners 2022', 'python-for-beginners-2022', '81x0f7k6', 10, 'python,programmation,anglais,free,gratuit', '_xQNeOTRyig', NULL, NULL, '<h2>Description</h2>\r\n\r\n<p>Vous voulez apprendre le langage Python et devenir un bon d&eacute;veloppeur avec une m&eacute;thode simple et efficace ?</p>\r\n\r\n<p>Bienvenue dans&nbsp;<strong>le SEUL programme francophone sur Python qui vous est propos&eacute; par un expert reconnu.</strong></p>\r\n\r\n<p>✅<strong>&nbsp;</strong>Obtenir des&nbsp;<strong>bases solides en programmation</strong>&nbsp;avec des techniques rares et professionnelles, (<strong>m&ecirc;me si vous partez de 0 en programmation</strong>)</p>\r\n\r\n<p>✅<strong>&nbsp;</strong>Savoir cr&eacute;er des&nbsp;<strong>projets complets de A &agrave; Z</strong>&nbsp;(et pouvoir les partager avec le monde entier)</p>\r\n\r\n<p>✅<strong>&nbsp;</strong>Vous perfectionner et&nbsp;<strong>am&eacute;liorer vos comp&eacute;tences</strong></p>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Aucune connaissance pr&eacute;alable n&#39;est requise</p>\r\n	</li>\r\n	<li>\r\n	<p>Vous pouvez utiliser un PC Windows ou un MAC</p>\r\n	</li>\r\n	<li>\r\n	<p>Tous les logiciels utilis&eacute;s sont gratuits</p>\r\n	</li>\r\n	<li>\r\n	<p>Vous pouvez suivre ce cours m&ecirc;me si vous n&#39;avez que 2 heures de temps hebdomadaire &agrave; y consacrer</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p>Vous voulez apprendre le langage Python et devenir un bon d&eacute;veloppeur avec une m&eacute;thode simple et efficace ?</p>\r\n\r\n<p>Bienvenue dans&nbsp;<strong>le SEUL programme francophone sur Python qui vous est propos&eacute; par un expert reconnu.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Cette formation est pour vous si vous souhaitez :</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>✅<strong>&nbsp;</strong>Obtenir des&nbsp;<strong>bases solides en programmation</strong>&nbsp;avec des techniques rares et professionnelles, (<strong>m&ecirc;me si vous partez de 0 en programmation</strong>)</p>\r\n\r\n<p>✅<strong>&nbsp;</strong>Savoir cr&eacute;er des&nbsp;<strong>projets complets de A &agrave; Z</strong>&nbsp;(et pouvoir les partager avec le monde entier)</p>\r\n\r\n<p>✅<strong>&nbsp;</strong>Vous perfectionner et&nbsp;<strong>am&eacute;liorer vos comp&eacute;tences</strong>&nbsp;(gr&acirc;ce &agrave; une m&eacute;thodologie unique et des techniques de pointe reconnues par les plus grands experts).</p>', NULL, 'upload/courses/thambnail/1753002796511567.jpg', 'anglais', NULL, 1, 0, 1, 1, 1, '2022-12-23 11:09:03', '2022-12-26 08:43:01');
INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_fr`, `product_slug_fr`, `product_code`, `avis`, `product_tags_fr`, `video_link`, `selling_price`, `discount_price`, `short_descp_fr`, `long_descp_fr`, `specification_fr`, `product_thambnail`, `langue`, `top_sales`, `top_views`, `type`, `top_20`, `special`, `status`, `created_at`, `updated_at`) VALUES
(17, 1, 2, 12, 13, 'Coinbase Tutorial For Beginners 2022', 'coinbase-tutorial-for-beginners-2022', '3ehcmw1f', 6, 'coinbase,crypto', 'fAfrBL5QRr0', NULL, NULL, '<h2>Description</h2>\r\n\r\n<p>Coinbase est un portefeuille de devises num&eacute;riques en ligne et une plate-forme d&#39;&eacute;change de cryptomonnaies permettant d&#39;acheter, de vendre et de stocker des Bitcoin, des Ethereum, des Ethereum classic, des Litecoin, des Bitcoin Cash et de nombreuses autres cryptomonnaie</p>', '<h2>Description</h2>\r\n\r\n<p>Coinbase est un portefeuille de devises num&eacute;riques en ligne et une plate-forme d&#39;&eacute;change de cryptomonnaies permettant d&#39;acheter, de vendre et de stocker des Bitcoin, des Ethereum, des Ethereum classic, des Litecoin, des Bitcoin Cash et de nombreuses autres cryptomonnaie</p>', NULL, 'upload/courses/thambnail/1753003700277913.jpg', 'anglais', NULL, 1, 0, 1, 1, 1, '2022-12-23 11:23:25', '2024-01-15 16:32:37'),
(18, 1, 2, 12, 14, 'Binance : TUTO complet en Français 2022', 'binance-tuto-complet-en-francais-2022', 'dcm7tgnp', 11, 'binance,crypto', 'yr1FZOUcLPs', NULL, NULL, '<h2>Description</h2>\r\n\r\n<p>Binance est un portefeuille de devises num&eacute;riques et une plateforme d&#39;&eacute;change de cryptomonnaies mondiale qui permet d&#39;acheter, vendre et stocker plus de 600 cryptomonnaies</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>- Apprendre &agrave; utiliser la plateforme Binance</p>\r\n	</li>\r\n	<li>\r\n	<p>- Creer son compte sur Binance</p>\r\n	</li>\r\n	<li>\r\n	<p>- Acheter la crypto sur Binance</p>\r\n	</li>\r\n</ul>', '<h2>Description</h2>\r\n\r\n<p>Binance est un portefeuille de devises num&eacute;riques et une plateforme d&#39;&eacute;change de cryptomonnaies mondiale qui permet d&#39;acheter, vendre et stocker plus de 600 cryptomonnaies</p>', NULL, 'upload/courses/thambnail/1753004656399940.jpeg', 'francais', NULL, 1, 0, 1, 1, 1, '2022-12-23 11:38:37', '2023-10-08 08:38:56'),
(19, 2, 3, 10, 11, 'Facebook ADS & publicité formation complète', 'facebook-ads-publicite-formation-complete', 'imp5dl3v', 7, 'marketing,facebook,reseau social,payante,ADS,publicite', 'none', '25000', NULL, '<h2>Description</h2>\n\n<p><strong>Le cours sur Facebook et le marketing le plus complet disponible sur E-learning : Comment r&eacute;ussir votre marketing et votre communication sur Facebook.</strong></p>\n<h2>Ce que vous apprendrez</h2>\n\n<ul>\n	<li>\n	<p>Cr&eacute;er une page pour votre produit / entreprise / association</p>\n	</li>\n	<li>\n	<p>Param&eacute;trer votre page et la rendre attractive</p>\n	</li>\n	<li>\n	<p>Cr&eacute;er du contenu attractif pour augmenter votre audience</p>\n	</li>\n	<li>\n	<p>Mettre en avant vos publications</p>\n	</li>\n	<li>\n	<p>Apprendre &agrave; utiliser les outils professionnels de Facebook</p>\n	</li>\n</ul>\n', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Avoir un navigateur et une connexion &agrave; internet pour g&eacute;rer vos pages et campagnes</p>\r\n	</li>\r\n	<li>\r\n	<p>&Ecirc;tre enthousiaste et pr&ecirc;t &agrave; apprendre efficacement &eacute;tape par &eacute;tape !</p>\r\n	</li>\r\n	<li>\r\n	<p>Aucune connaissance technique n&eacute;cessaire</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p><strong>Le cours sur Facebook et le marketing le plus complet disponible sur E-learning : Comment r&eacute;ussir votre marketing et votre communication sur Facebook.</strong></p>\r\n\r\n<p>Ce cours a &eacute;t&eacute; construit afin de vous donner&nbsp;les moyens et la m&eacute;thodologie pour construire rapidement votre strat&eacute;gie marketing&nbsp;<strong>afin d&#39;augmenter vos ventes, d&#39;attirer de nouveaux clients et de ma&icirc;triser Facebook.</strong></p>\r\n\r\n<p>Sans bla-bla ni termes techniques ou&nbsp;publicitaires, comment appr&eacute;hender, comprendre, d&eacute;finir sa strat&eacute;gie et mettre en place des actions simples pour obtenir des r&eacute;sultats.</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Cr&eacute;er une page pour votre produit / entreprise / association</p>\r\n	</li>\r\n	<li>\r\n	<p>Param&eacute;trer votre page et la rendre attractive</p>\r\n	</li>\r\n	<li>\r\n	<p>Cr&eacute;er du contenu attractif pour augmenter votre audience</p>\r\n	</li>\r\n	<li>\r\n	<p>Mettre en avant vos publications</p>\r\n	</li>\r\n	<li>\r\n	<p>Apprendre &agrave; utiliser les outils professionnels de Facebook</p>\r\n	</li>\r\n</ul>', NULL, 'upload/courses/thambnail/1753387291912109.png', 'francais', 1, 1, 1, 1, 1, 1, '2022-12-27 17:00:27', '2023-08-27 17:32:16'),
(20, 1, 5, 14, 15, 'Advanced Excel Full Course 2022', 'advanced-excel-full-course-2022', 'x48l9p6o', 10, 'excel,formation,bureautique,microsoft', 'RkQl2wVpQAo', NULL, NULL, '<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>- Learn how to THINK like Excel, and write powerful and dynamic Excel formulas from scratch</p>\r\n	</li>\r\n	<li>\r\n	<p>- Automate, streamline, and completely revolutionize your workflow with Excel</p>\r\n	</li>\r\n	<li>\r\n	<p>- Master unique tips &amp; techniques that you won&#39;t find in ANY other course, guaranteed</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p><strong>It&#39;s time to show Excel who&#39;s boss.&nbsp;</strong>Whether you&#39;re starting from square one or aspiring to become an absolute Excel power user, you&#39;ve come to the right place.</p>\r\n\r\n<p>This course will give you a deep understanding of the advanced Excel formulas and functions that transform Excel from a basic spreadsheet program into a dynamic and powerful analytics tool.</p>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Microsoft Excel 2013+ or Office 365 (Some features may not be available in earlier versions)</p>\r\n	</li>\r\n	<li>\r\n	<p>Experience with Excel formulas is recommended, but not required (we&#39;ll review the fundamentals)</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p><strong>It&#39;s time to show Excel who&#39;s boss.&nbsp;</strong>Whether you&#39;re starting from square one or aspiring to become an absolute Excel power user, you&#39;ve come to the right place.</p>\r\n\r\n<p>This course will give you a deep understanding of the advanced Excel formulas and functions that transform Excel from a basic spreadsheet program into a dynamic and powerful analytics tool.</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Learn how to THINK like Excel, and write powerful and dynamic Excel formulas from scratch</p>\r\n	</li>\r\n	<li>\r\n	<p>Automate, streamline, and completely revolutionize your workflow with Excel</p>\r\n	</li>\r\n	<li>\r\n	<p>Master unique tips &amp; techniques that you won&#39;t find in ANY other course, guaranteed</p>\r\n	</li>\r\n	<li>\r\n	<p>Explore fun, interactive, and highly effective demos from a best-selling Excel instructor</p>\r\n	</li>\r\n</ul>', NULL, 'upload/courses/thambnail/1755042704099209.jpg', 'anglais', NULL, 1, 0, NULL, NULL, 1, '2023-01-14 23:32:31', NULL),
(21, 1, 5, 14, 15, 'EXCEL 7H DE FORMATION COMPLETE', 'excel-7h-de-formation-complete', 'q6fmgwj1', 10, 'excel,microsoft,bureautique,free,gratuit', '6qVWh1bglmo', NULL, NULL, '<h2>Description</h2>\r\n\r\n<p><strong>Excel&nbsp;</strong>est un&nbsp;<strong>tableur puissant</strong>&nbsp;tr&egrave;s courant , il fait partie de la suite&nbsp;<strong>Microsoft Office</strong>&nbsp;et permet de g&eacute;rer des tableaux complexes, ou tous simplement des tableaux de base comme pour la&nbsp;gestion de vos comptes personnels.</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>- Ma&icirc;triser Microsoft Excel</p>\r\n	</li>\r\n	<li>\r\n	<p>- Cr&eacute;er des formules complexes</p>\r\n	</li>\r\n	<li>\r\n	<p>- Cr&eacute;er des graphiques personalis&eacute;s</p>\r\n	</li>\r\n	<li>\r\n	<p>- Utiliser et cr&eacute;er des Macros</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Un ordinateur et Excel Install&eacute; sur votre machine</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p><strong>Excel&nbsp;</strong>est un&nbsp;<strong>tableur puissant</strong>&nbsp;tr&egrave;s courant , il fait partie de la suite&nbsp;<strong>Microsoft Office</strong>&nbsp;et permet de g&eacute;rer des tableaux complexes, ou tous simplement des tableaux de base comme pour la&nbsp;gestion de vos comptes personnels.</p>\r\n\r\n<p>Tout le monde conna&icirc;t Excel, mais &ecirc;tes-vous sur de l&#39;exploiter pleinement. Connaissez-vous :</p>\r\n\r\n<ul>\r\n	<li><em>Le&nbsp;tableau&nbsp;crois&eacute; dynamique</em></li>\r\n	<li><em>Les segments</em></li>\r\n	<li><em>Les fonctions et les formules</em></li>\r\n	<li><em>Les macros</em></li>\r\n</ul>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Ma&icirc;triser Microsoft Excel</p>\r\n	</li>\r\n	<li>\r\n	<p>Cr&eacute;er des formules complexes</p>\r\n	</li>\r\n	<li>\r\n	<p>Cr&eacute;er des graphiques personalis&eacute;s</p>\r\n	</li>\r\n	<li>\r\n	<p>Utiliser et cr&eacute;er des Macros</p>\r\n	</li>\r\n</ul>', NULL, 'upload/courses/thambnail/1755043082086786.jpg', 'francais', NULL, 1, 0, 1, 1, 1, '2023-01-14 23:38:31', NULL),
(22, 1, 5, 14, 15, 'Apprendre et Maîtriser Excel de A à Z', 'apprendre-et-maitriser-excel-de-a-a-z', 'htga8qns', 6, 'excel,bureautique,free,microsoft,gratuit', '6PPRQpC7qJ', NULL, NULL, '<h2>Description</h2>\r\n\r\n<p><strong>Excel&nbsp;</strong>est un&nbsp;<strong>tableur puissant</strong>&nbsp;tr&egrave;s courant , il fait partie de la suite&nbsp;<strong>Microsoft Office</strong>&nbsp;et permet de g&eacute;rer des tableaux complexes, ou tous simplement des tableaux de base comme pour la&nbsp;gestion de vos comptes personnels.</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>- Ma&icirc;triser Microsoft Excel</p>\r\n	</li>\r\n	<li>\r\n	<p>- Cr&eacute;er des formules complexes</p>\r\n	</li>\r\n	<li>\r\n	<p>- Cr&eacute;er des graphiques personalis&eacute;s</p>\r\n	</li>\r\n	<li>\r\n	<p>- Utiliser et cr&eacute;er des Macros</p>\r\n	</li>\r\n</ul>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Un ordinateur et Excel Install&eacute; sur votre machine</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p><strong>Excel&nbsp;</strong>est un&nbsp;<strong>tableur puissant</strong>&nbsp;tr&egrave;s courant , il fait partie de la suite&nbsp;<strong>Microsoft Office</strong>&nbsp;et permet de g&eacute;rer des tableaux complexes, ou tous simplement des tableaux de base comme pour la&nbsp;gestion de vos comptes personnels.</p>\r\n\r\n<p>Tout le monde conna&icirc;t Excel, mais &ecirc;tes-vous sur de l&#39;exploiter pleinement. Connaissez-vous :</p>\r\n\r\n<ul>\r\n	<li><em>Le&nbsp;tableau&nbsp;crois&eacute; dynamique</em></li>\r\n	<li><em>Les segments</em></li>\r\n	<li><em>Les fonctions et les formules</em></li>\r\n	<li><em>Les macros</em></li>\r\n	<li><em>Les lignes de tendanc</em></li>\r\n</ul>', NULL, 'upload/courses/thambnail/1755043520404234.jpg', 'francais', NULL, 1, 0, 1, NULL, 1, '2023-01-14 23:45:29', '2023-01-15 07:33:55'),
(23, 1, 5, 14, 15, 'Excel Exercices', 'excel-exercices', '1d4jrimv', 10, 'excel,microsoft,gratuit', NULL, NULL, NULL, '<h2>Description</h2>\r\n\r\n<p>Apprendre les techniques de calculs dynamiques avec Excel au travers d&#39;un exercice pour calculer les b&eacute;n&eacute;fices d&#39;une entreprise sur les r&eacute;sultats du semestre. Cette mise en pratique est destin&eacute;e aux grands d&eacute;butants avec Excel. Cet exercice est le premier d&#39;une longue s&eacute;rie. Sa vocation est de faciliter la prise de contact avec le tableur Excel. Toutes les terminologies essentielles y sont &eacute;nonc&eacute;es. Les calculs y sont d&eacute;cortiqu&eacute;s et propos&eacute;s. Les m&eacute;thodes professionnelles et efficaces y sont d&eacute;montr&eacute;es.</p>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Un ordinateur et Excel Install&eacute; sur votre machine</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p>Apprendre les techniques de calculs dynamiques avec Excel au travers d&#39;un exercice pour calculer les b&eacute;n&eacute;fices d&#39;une entreprise sur les r&eacute;sultats du semestre. Cette mise en pratique est destin&eacute;e aux grands d&eacute;butants avec Excel. Cet exercice est le premier d&#39;une longue s&eacute;rie. Sa vocation est de faciliter la prise de contact avec le tableur Excel. Toutes les terminologies essentielles y sont &eacute;nonc&eacute;es. Les calculs y sont d&eacute;cortiqu&eacute;s et propos&eacute;s. Les m&eacute;thodes professionnelles et efficaces y sont d&eacute;montr&eacute;es.</p>', NULL, 'upload/courses/thambnail/1755044241713857.jpg', 'francais', NULL, NULL, 0, 1, NULL, 1, '2023-01-14 23:56:57', NULL),
(24, 1, 5, 14, 15, 'Excel pour débutant', 'excel-pour-debutant', 'bdma6f52', 7, 'excel,gratuit,microsoft', 'wHGMBjkce8o', NULL, NULL, '<h2>Description</h2>\r\n\r\n<p>Comment utiliser Excel ? Voici la premi&egrave;re vid&eacute;o de la formation compl&egrave;te et gratuite &agrave; Microsoft Excel 365, o&ugrave; nous allons d&eacute;couvrir les bases et conseils pour bien d&eacute;buter. Ce cours est accessible &agrave; tous, m&ecirc;me d&eacute;butants. D&eacute;couvrons l&#39;interface, les classeurs, les feuilles, les principes basiques et l&#39;encodage de donn&eacute;es.</p>\r\n\r\n<h2>Ce que vous apprendrez</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Ma&icirc;triser Microsoft Excel</p>\r\n	</li>\r\n	<li>\r\n	<p>Cr&eacute;er des formules complexes</p>\r\n	</li>\r\n	<li>\r\n	<p>Cr&eacute;er des graphiques personalis&eacute;s</p>\r\n	</li>\r\n</ul>', '<h2>Pr&eacute;requis</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Un ordinateur et Excel Install&eacute; sur votre machine</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Description</h2>\r\n\r\n<p>Comment utiliser Excel ? Voici la premi&egrave;re vid&eacute;o de la formation compl&egrave;te et gratuite &agrave; Microsoft Excel 365, o&ugrave; nous allons d&eacute;couvrir les bases et conseils pour bien d&eacute;buter. Ce cours est accessible &agrave; tous, m&ecirc;me d&eacute;butants. D&eacute;couvrons l&#39;interface, les classeurs, les feuilles, les principes basiques et l&#39;encodage de donn&eacute;es.</p>', NULL, 'upload/courses/thambnail/1755044767671816.jpg', 'francais', NULL, 1, 0, NULL, 1, 1, '2023-01-15 00:05:19', '2025-11-14 03:33:45');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gyB1iHJjPku9a0QjbaZxYO3RjB6Y20cxSU75r3eu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTElxYTFMUGNoc0xCNXAxQjcwcUo4MlVub3BDYmd4dFM0SUlpT1VHdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb3Vyc2UvZGV0YWlscy8yNC9leGNlbC1wb3VyLWRlYnV0YW50Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1763073235),
('vAqy9XKsNXNgw7vNWhJs7arbqq7t7XrXF4d9p2fA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV1RCS1VrdENVcmhFMUNkcDZuNll1dmNROTdVTFpraThqcEpvdUF5ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1763073206);

-- --------------------------------------------------------

--
-- Structure de la table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `subcategory_name_fr` varchar(255) NOT NULL,
  `subcategory_slug_fr` varchar(255) NOT NULL,
  `subcategory_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `order`, `category_id`, `subcategory_name_fr`, `subcategory_slug_fr`, `subcategory_image`, `created_at`, `updated_at`) VALUES
(1, 0, 4, 'Développement web', 'developpement-web', 'upload/subcategories/1752114382149821.jpg', NULL, '2022-12-19 02:09:48'),
(2, 0, 4, 'Développement mobile', 'developpement-mobile', 'upload/subcategories/1752114454345880.jpg', NULL, '2022-12-19 02:10:14'),
(3, 0, 4, 'Développement de jeux', 'developpement-de-jeux', 'upload/subcategories/1752114637067902.jpg', NULL, '2022-12-19 02:10:55'),
(4, 0, 4, 'Langages de programmation', 'langages-de-programmation', 'upload/subcategories/1752114710526993.jpg', NULL, '2022-12-19 02:11:33'),
(5, 0, 4, 'Test logiciel', 'test-logiciel', 'upload/subcategories/1752114759223139.jpg', NULL, '2022-12-19 02:12:37'),
(6, 0, 1, 'Conception vidéo', 'conception-video', 'upload/subcategories/1752114813995268.jpg', NULL, '2022-12-19 02:19:50'),
(7, 0, 1, 'Photographie', 'photographie', 'upload/subcategories/1752114839931104.jpg', NULL, '2022-12-19 02:20:20'),
(8, 0, 5, 'Apprentissage des langues', 'apprentissage-des-langues', 'upload/subcategories/1752824376626931.jpg', NULL, NULL),
(9, 0, 5, 'Mathematiques', 'mathematiques', 'upload/subcategories/1752824905480531.jpg', NULL, NULL),
(10, 0, 3, 'Reseaux sociaux', 'reseaux-sociaux', 'upload/subcategories/1752999674482122.png', NULL, NULL),
(11, 0, 3, 'Stratégie de vente', 'stratégie-de-vente', 'upload/subcategories/1752999893855788.jpg', NULL, NULL),
(12, 0, 2, 'plateforme', 'plateforme', 'upload/subcategories/1753003450188135.jpg', NULL, NULL),
(13, 0, 2, 'Traiding', 'traiding', 'upload/subcategories/1753003483529038.jpg', NULL, NULL),
(14, 0, 5, 'Bureautique', 'bureautique', 'upload/subcategories/1755042233934188.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name_fr` varchar(255) NOT NULL,
  `subsubcategory_slug_fr` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_fr`, `subsubcategory_slug_fr`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'HTML & CSS', 'html-css', '2022-12-13 14:57:07', '2022-12-19 02:13:43'),
(2, 4, 1, 'Laravel', 'laravel', '2022-12-13 14:57:29', '2022-12-19 02:14:34'),
(3, 4, 1, 'JavaScript', 'javascript', '2022-12-13 14:57:51', '2022-12-19 02:15:02'),
(4, 4, 4, 'Python', 'python', '2022-12-13 14:58:14', '2022-12-21 10:58:43'),
(5, 1, 7, 'Illustrator', 'illustrator', '2022-12-13 14:58:52', '2022-12-19 02:22:41'),
(6, 1, 7, 'Photoshop', 'photoshop', '2022-12-13 14:59:25', '2022-12-19 02:21:40'),
(7, 5, 8, 'Anglais', 'anglais', '2022-12-21 10:56:00', NULL),
(8, 5, 8, 'Japonais', 'japonais', '2022-12-21 10:57:18', NULL),
(9, 5, 8, 'Francais', 'francais', '2022-12-21 10:57:48', NULL),
(10, 4, 1, 'React Js', 'react-js', '2022-12-23 07:25:40', NULL),
(11, 3, 10, 'Facebook', 'facebook', '2022-12-23 10:19:42', NULL),
(12, 3, 10, 'WhatsApp', 'whatsapp', '2022-12-23 10:23:37', NULL),
(13, 2, 12, 'Coinbase', 'coinbase', '2022-12-23 11:20:19', NULL),
(14, 2, 12, 'Binance', 'binance', '2022-12-23 11:20:35', NULL),
(15, 5, 14, 'Ms Excel', 'ms-excel', '2023-01-14 23:25:27', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `profil_pic` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `sex` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `profil_pic`, `email`, `phone`, `user_role`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `sex`, `status`, `remember_token`, `current_team_id`, `created_at`, `updated_at`) VALUES
(1, 'brecht tankoua', 'brecht tankoua', NULL, 'brtankoua@gmail.com', '0694011998', 'user', NULL, '$2y$10$rRjmoK9LY6dA3YL441qf2.CCdf3iLujkqPbnkYCi/PUAB764oTjT.', NULL, NULL, 'Empty', 1, 'ImKDxLmOugNLDLNOBA793ISPpllj1gCCoVNXUMfJfDDKAPE2IuMd9gEp3CXS', NULL, '2022-12-18 10:07:02', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_suivis`
--

CREATE TABLE `user_suivis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lesson_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_suivis`
--

INSERT INTO `user_suivis` (`id`, `course_id`, `lesson_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 149, 1, '0', '2022-12-19 12:41:50', NULL),
(2, NULL, 168, 1, '0', '2022-12-19 21:28:34', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `visit_counts`
--

CREATE TABLE `visit_counts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `count` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `visit_counts`
--

INSERT INTO `visit_counts` (`id`, `product_id`, `count`, `created_at`, `updated_at`) VALUES
(1, 9, 16, '2022-12-19 20:48:08', '2024-02-04 20:56:16'),
(2, 8, 5, '2022-12-19 21:26:35', NULL),
(3, 10, 9, '2022-12-20 14:17:14', '2023-01-22 07:04:01'),
(4, 6, 6, '2022-12-22 02:33:20', '2022-12-22 09:19:19'),
(5, 5, 6, '2022-12-22 03:05:54', '2022-12-22 03:06:35'),
(6, 14, 7, '2022-12-23 10:36:40', '2023-06-20 19:04:59'),
(7, 18, 11, '2022-12-23 11:39:45', '2023-10-08 08:38:56'),
(8, 16, 10, '2022-12-23 12:21:41', '2022-12-26 08:43:01'),
(9, 11, 5, '2022-12-23 19:23:41', NULL),
(10, 7, 5, '2022-12-27 16:23:10', NULL),
(11, 19, 7, '2022-12-27 17:10:15', '2023-08-27 17:32:16'),
(12, 12, 6, '2022-12-27 17:19:08', '2024-01-15 16:24:00'),
(13, 22, 6, '2023-01-14 23:46:09', '2023-01-15 07:33:55'),
(14, 21, 5, '2023-01-14 23:46:35', NULL),
(15, 24, 7, '2023-01-15 00:42:16', '2025-11-14 03:33:45'),
(16, 17, 6, '2023-01-17 15:39:49', '2024-01-15 16:32:37'),
(17, 1, 7, '2023-01-20 10:21:02', '2023-01-24 20:17:08'),
(18, 3, 5, '2023-01-24 20:14:56', NULL),
(19, 2, 5, '2023-01-24 20:19:43', NULL),
(20, 20, 5, '2023-01-26 23:09:32', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2022-12-18 10:39:20', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Index pour la table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Index pour la table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Index pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_sex_unique` (`sex`);

--
-- Index pour la table `user_suivis`
--
ALTER TABLE `user_suivis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visit_counts`
--
ALTER TABLE `visit_counts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user_suivis`
--
ALTER TABLE `user_suivis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `visit_counts`
--
ALTER TABLE `visit_counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
