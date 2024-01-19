-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 19 jan. 2024 à 14:28
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `jl_elik6`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE `adresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `ville` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `agent_email` varchar(200) DEFAULT NULL,
  `phone` text,
  `agent_phone` varchar(20) DEFAULT NULL,
  `adresse_1` varchar(255) DEFAULT NULL,
  `adresse_2` varchar(255) DEFAULT NULL,
  `residence` text,
  `is_shipping` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adresses`
--

INSERT INTO `adresses` (`id`, `agent_id`, `country_id`, `ville`, `email`, `agent_email`, `phone`, `agent_phone`, `adresse_1`, `adresse_2`, `residence`, `is_shipping`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 244, 'Keptown', 'jdikasa@yahoo.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"0811647737\"}]', NULL, 'test 1', 'test 2', NULL, 1, '2022-11-27 22:06:17', '2022-11-27 22:06:17', NULL),
(2, NULL, 244, 'Keptown', 'jdikasa@yahoo.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"0811647737\"}]', NULL, 'test 1', 'test 2', NULL, 1, '2022-11-28 23:12:22', '2022-11-28 23:12:22', NULL),
(3, NULL, 16, 'tw', 'jdikasa@yahoo.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"09877899\"}]', NULL, 'ew', 'gfgf', NULL, 0, '2022-12-01 17:39:58', '2022-12-01 17:39:58', NULL),
(4, 1, NULL, NULL, NULL, NULL, NULL, '0810000111', NULL, NULL, 'test adresse', 0, '2023-01-21 16:07:27', '2023-05-07 16:42:41', NULL),
(5, 2, NULL, NULL, NULL, 'christian@conformitech.com', NULL, '0810000111', NULL, NULL, 'test', 0, '2023-01-21 22:47:08', '2023-01-21 22:47:08', NULL),
(6, 3, NULL, NULL, NULL, 'hervekinsala@gmail.com', NULL, '0826870122', NULL, NULL, 'test adresse', 0, '2023-03-07 03:33:58', '2023-03-07 03:33:58', NULL),
(7, NULL, 40, 'Kinshasa', 'test@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"09877899\"}]', NULL, 'test adresse 1', 'une deuxieme adresse', NULL, 0, '2023-03-25 12:02:57', '2023-03-25 12:14:29', NULL),
(8, NULL, 40, 'Kinshasa', 'jl.dikasa@itgroup-drc.net', NULL, '[{\"type\":\"Mobile\",\"num\":\"0821647737\"}]', NULL, 'test adresse 1', NULL, NULL, 0, '2023-04-10 17:25:01', '2023-04-10 17:25:01', NULL),
(9, NULL, 40, 'Kinshasa', 'info@aga.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"0821647737\"}]', NULL, 'test adresse 1', NULL, NULL, 0, '2023-05-07 17:44:15', '2023-05-07 17:44:15', NULL),
(10, NULL, 40, 'Kinshasa', 'info@aga.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"0821647737\"}]', NULL, 'test adresse 1', NULL, NULL, 0, '2023-05-07 17:46:26', '2023-05-07 17:46:26', NULL),
(11, NULL, 40, 'Kinshasa', 'info@aga.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"0821647737\"}]', NULL, 'test adresse 1', NULL, NULL, 0, '2023-05-07 17:47:54', '2023-05-07 17:47:54', NULL),
(12, NULL, 40, 'Kinshasa', 'info@aga.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"0821647737\"}]', NULL, 'test adresse 1', NULL, NULL, 0, '2023-05-07 17:48:33', '2023-05-07 17:48:33', NULL),
(13, NULL, 40, 'Kinshasa', 'christian@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"0821647737\"},{\"type\":\"Mobile\",\"num\":\"09877899\"}]', NULL, 'adresse 1', 'test adresse 2', NULL, 0, '2023-05-10 00:27:23', '2023-05-10 00:52:26', NULL),
(14, NULL, 40, 'Kinshasa', 'johndoe@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"098778990\"}]', NULL, 'adresse 1', NULL, NULL, 0, '2023-05-10 12:44:47', '2023-05-10 12:44:47', NULL),
(15, NULL, 40, 'Kinshasa', 'johndoe@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"098778990\"}]', NULL, 'adresse 1', NULL, NULL, 0, '2023-05-10 12:48:52', '2023-05-10 12:48:52', NULL),
(16, NULL, 40, 'Kinshasa', 'johndoe@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"098778990\"}]', NULL, 'adresse 1', NULL, NULL, 0, '2023-05-10 12:58:29', '2023-05-10 12:58:29', NULL),
(17, NULL, 40, 'Kinshasa', 'johndoe@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"098778990\"}]', NULL, 'adresse 1', NULL, NULL, 0, '2023-05-10 13:13:33', '2023-05-10 13:13:33', NULL),
(18, NULL, 40, 'Kinshasa', 'johndoe@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"098778990\"}]', NULL, 'adresse 1', NULL, NULL, 0, '2023-05-10 13:14:54', '2023-05-10 13:14:54', NULL),
(19, NULL, 40, 'Kinshasa', 'johndoe@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"098778990\"}]', NULL, 'adresse 1', NULL, NULL, 0, '2023-05-10 13:19:03', '2023-05-10 13:19:03', NULL),
(20, NULL, 40, 'Kinshasa', 'johndoe@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"098778990\"}]', NULL, 'adresse 1', NULL, NULL, 0, '2023-05-10 13:21:23', '2023-05-10 13:21:23', NULL),
(21, NULL, 40, 'Kinshasa', 'johndoe@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"098778990\"}]', NULL, 'adresse 1', NULL, NULL, 0, '2023-05-10 13:21:47', '2023-05-10 13:21:47', NULL),
(22, NULL, 40, 'Kinshasa', 'johndoe@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"098778990\"}]', NULL, 'adresse 1', NULL, NULL, 0, '2023-05-10 13:29:24', '2023-05-10 13:29:24', NULL),
(23, NULL, 40, 'Kinshasa', 'johndoe@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"098778990\"}]', NULL, 'adresse 1', NULL, NULL, 0, '2023-05-10 13:31:54', '2023-05-10 13:31:54', NULL),
(24, NULL, 40, 'Kinshasa', 'johndoe@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"098778990\"}]', NULL, 'adresse 1', NULL, NULL, 0, '2023-05-10 13:34:37', '2023-05-10 13:34:37', NULL),
(25, NULL, 40, 'Kinshasa', 'johndoe@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"098778990\"}]', NULL, 'adresse 1', NULL, NULL, 0, '2023-05-10 18:14:55', '2023-05-10 18:14:55', NULL),
(26, 4, NULL, NULL, NULL, 'jackyotamba@gmail.com', NULL, '0826870122', NULL, NULL, 'test adresse 1', 0, '2023-05-13 16:45:17', '2023-05-13 16:45:17', NULL),
(27, 6, NULL, NULL, NULL, 'jackyotamba@gmail.com', NULL, '0826870122', NULL, NULL, 'test adresse 1', 0, '2023-05-13 16:51:57', '2023-05-13 16:51:57', NULL),
(28, 8, NULL, NULL, NULL, 'jackyotamba@gmail.com', NULL, '0826870122', NULL, NULL, 'test adresse 1', 0, '2023-05-13 16:57:06', '2023-05-13 16:57:06', NULL),
(29, 9, NULL, NULL, NULL, 'christian2@conformitech.com', NULL, '0810000112', NULL, NULL, 'test', 0, '2023-06-20 16:12:07', '2023-06-20 16:12:07', NULL),
(30, NULL, 40, 'Kinshasa ville', 'contact@ctc.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"098778990\"},{\"type\":\"Mobile\",\"num\":\"0811647737\"}]', NULL, 'Sendwe kinshasa', NULL, NULL, 0, '2023-10-18 11:22:26', '2023-11-29 12:51:29', NULL),
(31, NULL, 40, 'Kinshasa', 'jdikasamvita2@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"098778990\"}]', NULL, 'test adresse 2', NULL, NULL, 0, '2023-10-30 09:43:29', '2023-10-30 09:46:52', NULL),
(32, NULL, 9, 'luanda', 'ben@approvalgateforafrica.net', NULL, '[{\"type\":\"Mobile\",\"num\":\"0829679613\"}]', NULL, 'blabla', NULL, NULL, 0, '2023-11-07 14:01:02', '2023-11-07 14:07:43', NULL),
(33, NULL, 244, 'Keptown', 'johndoe@gmail.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"098778990\"}]', NULL, 'hfdfjdhjfd', NULL, NULL, 0, '2023-11-07 15:15:28', '2023-11-07 15:15:28', NULL),
(34, NULL, 3, 'test', 'jdikasa@yahoo.com', NULL, '[{\"type\":\"Mobile\",\"num\":\"0829679613\"},{\"type\":\"Mobile\",\"num\":\"098778990\"}]', NULL, 'test 3', NULL, NULL, 0, '2023-11-29 13:00:44', '2023-11-29 13:02:59', NULL),
(35, 10, NULL, NULL, NULL, 'johndoe2@gmail.com', NULL, '099876756', NULL, NULL, 'test adresse', 0, '2023-11-29 14:29:36', '2023-11-29 14:29:36', NULL),
(36, 11, NULL, NULL, NULL, 'johndoe3@gmail.com', NULL, '0811647737', NULL, NULL, 'test adresse', 0, '2023-11-29 14:44:24', '2023-11-29 14:44:24', NULL),
(37, 12, NULL, NULL, NULL, 'johndoe3@gmail.com', NULL, '0811647737', NULL, NULL, 'test adresse', 0, '2023-11-29 14:46:26', '2023-11-29 14:46:26', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `planning_id` bigint(20) DEFAULT NULL,
  `statut_id` bigint(20) DEFAULT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `post_nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `lieu_naiss` varchar(200) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `etat_civil` varchar(25) DEFAULT NULL,
  `nbr_enfant` tinyint(4) DEFAULT NULL,
  `nationalite` varchar(100) DEFAULT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'users/default.png',
  `slug` varchar(255) DEFAULT NULL,
  `team_id` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id`, `user_id`, `planning_id`, `statut_id`, `nom`, `post_nom`, `prenom`, `sexe`, `lieu_naiss`, `date_naiss`, `etat_civil`, `nbr_enfant`, `nationalite`, `matricule`, `image`, `slug`, `team_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'Dikasa', 'Mvita', 'Jean-louis', 'M', 'Kinshasa', '1993-09-21', 'Marié(e)', 1, 'Congolaise', NULL, 'profile-photos/4ghX9susN0nCA8K92jbb8UwkRv1aNBh3e4Kt0WoR.jpg', 'dikasa-mvita-jean-louis', 1, 1, 1, '2023-01-16 17:59:10', '2023-05-07 16:42:41', NULL),
(2, 2, NULL, 1, 'Diki', '', 'Christian', 'M', 'Kinshasa', '2023-01-11', 'Marié(e)', 4, 'Congolaise', 'AG/CD/20230121/0003', 'agents/January2023/Wu0qEz0ROvGcWIpMWusg.jpg', 'diki-christian', 1, 1, 1, '2023-01-21 22:47:08', '2023-01-21 22:47:08', NULL),
(8, 3, NULL, 1, 'Otamba', 'Dikasa', 'Jacky', 'F', 'Kinshasa', '2023-05-13', 'Marié(e)', 1, 'Congolaise', 'CS/AG/JO/20230513/0006', 'agents/TuN2SrTkbVvWGDBLqsw4H6EOW3begmpsnCoRQrp1.png', 'otamba-dikasa-jacky', 1, 1, 1, '2023-05-13 16:57:06', '2023-05-14 12:44:11', NULL),
(9, 4, NULL, 1, 'Diki', 'Chris', 'Christian', 'M', 'Kinshasa', '2023-06-20', 'Marié(e)', 3, 'Congolaise', 'AG/KIN/001', NULL, 'diki-chris-christian', 1, 1, 1, '2023-06-20 16:12:07', '2023-06-20 16:12:07', NULL),
(10, 5, NULL, 1, 'Doe 2', 'User', 'John 2', 'M', 'Kinshasa', '2023-11-29', 'Marié(e)', 4, 'Congolaise', 'MAT0001', NULL, 'doe-2-user-john-2', 3, 2, 2, '2023-11-29 14:29:36', '2023-11-29 14:29:36', NULL),
(11, 6, NULL, 1, 'Doe 3', 'User 2', 'John 3', 'M', 'Kinshasa', '2023-11-29', 'Marié(e)', 1, 'Congolaise', 'AS/AG/JD/20231129/0003', NULL, 'doe-3-user-2-john-3', 3, 2, 2, '2023-11-29 14:44:24', '2023-11-29 14:44:24', NULL),
(12, 6, NULL, 1, 'Doe 3', 'User 2', 'John 3', 'M', 'Kinshasa', '2023-11-29', 'Marié(e)', 1, 'Congolaise', 'AS/AG/JD/20231129/0004', NULL, 'doe-3-user-2-john-3', 3, 2, 2, '2023-11-29 14:46:26', '2023-11-29 14:46:26', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `agent_statuts`
--

CREATE TABLE `agent_statuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `archive_permissions`
--

CREATE TABLE `archive_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `permissionable_id` bigint(20) DEFAULT NULL,
  `permissionable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `archive_permissions`
--

INSERT INTO `archive_permissions` (`id`, `agent_id`, `permissionable_id`, `permissionable_type`, `key`, `created_at`, `updated_at`, `deleted_at`) VALUES
(45, 1, 1, 'App\\Models\\Classeur', 'view_classeur', '2023-01-16 17:29:58', '2023-01-16 17:29:58', NULL),
(46, 1, 8, 'App\\Models\\Dossier', 'view_dossier', '2023-01-16 21:31:41', '2023-01-16 21:31:41', NULL),
(47, 1, 18, 'App\\Models\\DocumentArchivage', 'view_document', '2023-01-16 23:54:45', '2023-01-16 23:54:45', NULL),
(48, 1, 10, 'App\\Models\\Dossier', 'view_dossier', '2023-03-25 14:23:12', '2023-03-25 14:23:12', NULL),
(49, 1, 6, 'App\\Models\\Classeur', 'view_classeur', '2023-06-20 16:26:57', '2023-06-20 16:26:57', NULL),
(50, 1, 22, 'App\\Models\\Dossier', 'view_dossier', '2023-06-20 16:28:24', '2023-06-20 16:28:24', NULL),
(51, 1, 23, 'App\\Models\\Dossier', 'view_dossier', '2023-06-20 16:29:44', '2023-06-20 16:29:44', NULL),
(52, 1, 45, 'App\\Models\\DocumentArchivage', 'view_document', '2023-06-20 16:31:30', '2023-06-20 16:31:30', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bandes_frequences`
--

CREATE TABLE `bandes_frequences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `frequence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bandes_frequences`
--

INSERT INTO `bandes_frequences` (`id`, `frequence`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '45852MHz', NULL, '2022-11-09 11:08:12', '2022-11-09 11:08:12', NULL),
(2, '470 MHz', NULL, '2022-11-15 07:59:27', '2022-11-15 07:59:27', NULL),
(3, '1', NULL, '2022-12-30 14:11:36', '2022-12-30 14:11:36', NULL),
(4, '1', NULL, '2022-12-30 14:18:10', '2022-12-30 14:18:10', NULL),
(5, '1', NULL, '2022-12-30 14:19:31', '2022-12-30 14:19:31', NULL),
(6, 'un troisieme', NULL, '2023-03-25 12:37:25', '2023-03-25 12:37:25', NULL),
(7, '50hrz', 1, '2023-05-09 23:58:11', '2023-05-09 23:58:11', NULL),
(8, '150Mhrs', 1, '2023-05-10 17:38:02', '2023-05-10 17:38:02', NULL),
(9, '88Mhz', 3, '2023-10-18 11:29:17', '2023-10-18 11:29:17', NULL),
(10, '2402-2480 Mhz', 1, '2023-10-30 10:25:02', '2023-10-30 10:25:02', NULL),
(11, '345-346Mhz', 4, '2023-11-07 14:19:29', '2023-11-07 14:19:29', NULL),
(12, '2.4Ghz', 4, '2023-11-07 15:26:00', '2023-11-07 15:26:00', NULL),
(13, '3.4Ghz', 4, '2023-11-07 15:26:00', '2023-11-07 15:26:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `nom` varchar(200) DEFAULT NULL,
  `code_swift` varchar(100) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `team_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `banks`
--

INSERT INTO `banks` (`id`, `country_id`, `nom`, `code_swift`, `image`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Access Bank', NULL, NULL, 1, '2022-12-26 13:24:44', '2022-12-26 13:24:44', NULL),
(2, NULL, 'EquityBCDC', NULL, NULL, 1, '2022-12-26 13:26:49', '2022-12-26 13:26:49', NULL),
(3, 40, 'Access Bank', '786', NULL, 3, '2023-08-03 12:30:49', '2023-08-03 12:30:49', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cartes`
--

CREATE TABLE `cartes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) DEFAULT NULL,
  `type_id` bigint(20) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `num` varchar(150) DEFAULT NULL,
  `date_expir` date DEFAULT NULL,
  `code_cvv` varchar(100) DEFAULT NULL,
  `balance` decimal(10,0) DEFAULT NULL,
  `is_primary` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cartes`
--

INSERT INTO `cartes` (`id`, `bank_id`, `type_id`, `nom`, `num`, `date_expir`, `code_cvv`, `balance`, `is_primary`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Dikasa Mvita Jean-Louis', '1237 5858 6997 8746', '2024-12-01', '342', '0', 1, '2022-12-18 02:54:04', '2022-12-26 13:34:11', NULL),
(3, 2, 2, 'Dikasa Mvita Jean-Louis 2', '5108 3567 3089 9869', '2023-09-01', '326', NULL, 0, '2022-12-18 15:35:24', '2022-12-26 13:34:37', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `carte_types`
--

CREATE TABLE `carte_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carte_types`
--

INSERT INTO `carte_types` (`id`, `titre`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Carte Visa', 'assets/svg/brands/visa.svg', '2022-12-18 03:30:08', '2022-12-18 03:30:08', NULL),
(2, 'Carte MasterCard', 'assets/svg/brands/mastercard.svg', '2022-12-18 03:30:36', '2022-12-18 03:30:36', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `certificats`
--

CREATE TABLE `certificats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `is_mandatory` int(11) DEFAULT NULL,
  `types_homologation_id` int(11) DEFAULT NULL,
  `lead_time_id` int(11) DEFAULT NULL,
  `sample_requirements` int(11) DEFAULT NULL,
  `types_echantillon_id` int(11) DEFAULT NULL,
  `nombre_echantillon` int(11) DEFAULT NULL,
  `ettiquetage` int(11) DEFAULT NULL,
  `validite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_representation` int(11) DEFAULT NULL,
  `total_cost` int(11) DEFAULT NULL,
  `renewal_price` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `reglementation` text COLLATE utf8mb4_unicode_ci,
  `model_cert` text COLLATE utf8mb4_unicode_ci,
  `formulaire` text COLLATE utf8mb4_unicode_ci,
  `autre_doc` text COLLATE utf8mb4_unicode_ci,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `certificats`
--

INSERT INTO `certificats` (`id`, `country_id`, `is_mandatory`, `types_homologation_id`, `lead_time_id`, `sample_requirements`, `types_echantillon_id`, `nombre_echantillon`, `ettiquetage`, `validite`, `local_representation`, `total_cost`, `renewal_price`, `description`, `reglementation`, `model_cert`, `formulaire`, `autre_doc`, `team_id`, `created_at`, `updated_at`, `deleted_at`, `documents`) VALUES
(2, 1, 1, 1, 2, 1, 2, 4, 1, 'A vie', 1, 850, 520, NULL, '[{\"download_link\":\"certificats\\/November2022\\/BDaGEovvH7z5XFjV2p1x.pdf\",\"original_name\":\"Approval Team Authorization-Conf Tech (3).pdf\"}]', NULL, '[{\"download_link\":\"certificats\\/November2022\\/bF9yOOFvFDgRx1ouGOy9.pdf\",\"original_name\":\"Approval Team Authorization-Dem Rep Congo.pdf\"}]', NULL, NULL, '2022-11-09 11:10:41', '2022-11-09 11:10:41', NULL, '[\"Rapport de test\",\"Declaration de conformite\",\"Lettre de representation\",\"Data sheet\",\"Facture commerciale\"]'),
(3, 40, 1, 1, 6, 1, 3, 1, 0, 'A vie', 1, 1250, 1200, 'un pays que nous couvrons nous meme', NULL, NULL, NULL, NULL, NULL, '2022-11-15 08:06:03', '2023-01-02 19:09:41', NULL, '[\"Rapport de test\",\"Lettre de representation\",\"Data sheet\",\"Facture commerciale\"]'),
(4, 40, 1, 1, 1, 0, NULL, NULL, 1, 'A vie', 1, 200, 200, 'test description', '[{\"download_link\":\"certificats\\/May2023\\/ZLBI1kPPPypTB3T0NGeC.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '[{\"download_link\":\"certificats\\/May2023\\/0y536lv60juAcjl1geCf.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '[{\"download_link\":\"certificats\\/May2023\\/4xlGKvcHifw2ALNu04vT.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '[{\"download_link\":\"certificats\\/May2023\\/ntg0TPmj3wiQnc42ALhl.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', 1, '2023-05-09 22:31:00', '2023-05-09 22:31:00', NULL, '[\"Rapport de test\",\"Declaration de conformite\",\"Lettre de representation\",\"Data sheet\",\"Facture commerciale\"]'),
(18, 42, 1, 1, 2, 0, NULL, NULL, 1, 'A vie', 1, 400, 200, 'test', '[{\"download_link\":\"certificats\\/May2023\\/YAmpagSCzgiSeO9Zxpoy.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '[{\"download_link\":\"certificats\\/May2023\\/gQqKug8rf7YYmnOhrgSW.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '[{\"download_link\":\"certificats\\/May2023\\/1Kf07v5NLJH5he1rddzD.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '[{\"download_link\":\"certificats\\/May2023\\/hc12fyQT1tPtsMM6KHO5.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', 1, '2023-05-10 17:12:20', '2023-05-10 17:12:20', NULL, '[\"Rapport de test\",\"Declaration de conformite\",\"Lettre de representation\",\"Data sheet\",\"Facture commerciale\"]'),
(19, 40, 1, 1, 4, 1, NULL, 2, 1, '3 ans', 1, 300, 280, 'test description', '[{\"download_link\":\"certificats\\/October2023\\/BqYT043Meur7NoWj7l7w.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '[{\"download_link\":\"certificats\\/October2023\\/NRqK0eTMoAZzrAuN3OQ1.pdf\",\"original_name\":\"F2BC-RDC.50-Gestion-et-traitement-des-dechets-solides-dans-la-ville-de-Kinshasa.pdf\"}]', '[{\"download_link\":\"certificats\\/October2023\\/2fDRsBRU8o1iOM9pKttK.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '[{\"download_link\":\"certificats\\/October2023\\/Kpzg2YezpyO0RC50lAQU.pdf\",\"original_name\":\"F2BC-RDC.50-Gestion-et-traitement-des-dechets-solides-dans-la-ville-de-Kinshasa.pdf\"}]', 3, '2023-10-18 11:37:06', '2023-10-18 11:37:06', NULL, '[\"Rapport de test\",\"Declaration de conformite\",\"Lettre de representation\",\"Data sheet\",\"Facture commerciale\"]'),
(20, 12, 1, 1, 4, 1, NULL, 2, 1, '2 ans', 1, 600, 500, NULL, '[{\"download_link\":\"certificats\\/October2023\\/tcKa1UI1iLDkXK3jiqOP.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '[{\"download_link\":\"certificats\\/October2023\\/0n7Mz92czYd91TClvMVb.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '[{\"download_link\":\"certificats\\/October2023\\/1CXOIFkeEoxAmtFnlJQX.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '[{\"download_link\":\"certificats\\/October2023\\/Jrjijv8cayrs1iMmx9AK.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', 1, '2023-10-30 10:29:38', '2023-10-30 10:29:38', NULL, '[\"Rapport de test\",\"Declaration de conformite\",\"Lettre de representation\",\"Data sheet\",\"Facture commerciale\"]'),
(21, 9, 0, 2, 5, 1, NULL, 2, 0, 'A vie', 1, 1200, 1200, NULL, NULL, '[{\"download_link\":\"certificats\\/November2023\\/s1uOjeLe2erb84gJCx5Z.pdf\",\"original_name\":\"Af19BRLgYemBzYo0D7VZ.pdf\"}]', '[{\"download_link\":\"certificats\\/November2023\\/5rGv6LR7lfvKUBZl8WLk.pdf\",\"original_name\":\"Af19BRLgYemBzYo0D7VZ.pdf\"}]', NULL, 4, '2023-11-07 14:24:38', '2023-11-07 14:24:38', NULL, '[\"Rapport de test\",\"Declaration de conformite\",\"Lettre de representation\",\"Data sheet\"]'),
(22, 245, 0, 2, 2, 1, NULL, 2, 0, 'A vie', 1, 500, 500, NULL, NULL, '[{\"download_link\":\"certificats\\/November2023\\/0qPmACsomm9gZaEEElWz.pdf\",\"original_name\":\"230821MISE A JOUR ET DEVELOPPEMENT BLUE APP V.04.pdf\"}]', '[{\"download_link\":\"certificats\\/November2023\\/ooRDLfqo2gW5gpW8ykVJ.pdf\",\"original_name\":\"Af19BRLgYemBzYo0D7VZ.pdf\"}]', NULL, 4, '2023-11-07 14:36:07', '2023-11-07 14:36:07', NULL, '[\"Rapport de test\",\"Declaration de conformite\",\"Lettre de representation\",\"Data sheet\",\"Facture commerciale\"]'),
(23, 11, 1, 1, 3, 1, NULL, 1, 1, '4 ans', 1, 300, 200, 'test', '[{\"download_link\":\"certificats\\/November2023\\/OWjegYz09aJMCfQ9OMrl.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126-1.pdf\"}]', '[{\"download_link\":\"certificats\\/November2023\\/oXjYww64bWR0iFSmPC3m.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126.pdf\"}]', '[{\"download_link\":\"certificats\\/November2023\\/6nKRdwMGRVIqbE0Y5Ht2.pdf\",\"original_name\":\"230821MISE A JOUR ET DEVELOPPEMENT BLUE APP V.04.pdf\"}]', NULL, 4, '2023-11-07 15:34:16', '2023-11-07 15:34:16', NULL, '[\"Rapport de test\",\"Declaration de conformite\",\"Lettre de representation\",\"Data sheet\",\"Facture commerciale\"]');

-- --------------------------------------------------------

--
-- Structure de la table `certificats_documents`
--

CREATE TABLE `certificats_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `certificat_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `certificats_leads_times`
--

CREATE TABLE `certificats_leads_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lead_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `certificats_leads_times`
--

INSERT INTO `certificats_leads_times` (`id`, `lead_time`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1 semaine', 1, '2022-08-03 03:05:57', '2022-08-03 03:06:16', NULL),
(2, '2 semaines', 1, '2022-08-03 03:06:03', '2022-08-03 03:06:57', NULL),
(3, '3 semaine', 1, '2022-08-03 03:05:57', '2022-08-03 03:06:16', NULL),
(4, '4 semaines', 1, '2022-08-03 03:06:03', '2022-08-03 03:06:57', NULL),
(5, '5 semaine', 1, '2022-08-03 03:05:57', '2022-08-03 03:06:16', NULL),
(6, '6 semaines', 1, '2022-08-03 03:06:03', '2022-08-03 03:06:57', NULL),
(7, '7 semaine', 1, '2022-08-03 03:05:57', '2022-08-03 03:06:16', NULL),
(8, '8 semaines', 1, '2022-08-03 03:06:03', '2022-08-03 03:06:57', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `certificats_types_echantillons`
--

CREATE TABLE `certificats_types_echantillons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `certificats_types_echantillons`
--

INSERT INTO `certificats_types_echantillons` (`id`, `nom`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Radio', 1, '2022-08-03 03:20:05', '2022-08-03 03:20:05', NULL),
(2, 'Conduit', 1, '2022-08-03 03:20:05', '2022-08-03 03:20:05', NULL),
(3, 'Commercial', 1, '2022-08-03 03:20:53', '2022-08-03 03:20:53', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `certificats_types_homologations`
--

CREATE TABLE `certificats_types_homologations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `certificats_types_homologations`
--

INSERT INTO `certificats_types_homologations` (`id`, `nom`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Modulaire', 1, '2022-09-06 18:25:33', '2022-09-06 18:25:34', NULL),
(2, 'Equipement hote', 1, '2022-09-06 18:25:34', '2022-09-06 18:25:34', NULL),
(3, 'Modulaire et équipement hote', 1, '2022-09-06 18:35:15', '2022-09-06 18:35:15', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `certificats_validites`
--

CREATE TABLE `certificats_validites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `validite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `classeurs`
--

CREATE TABLE `classeurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classeurs`
--

INSERT INTO `classeurs` (`id`, `departement_id`, `reference`, `titre`, `description`, `created_by`, `updated_by`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'CLI/CONFTECH/DOCS/111111', 'Documents clients', 'Classeur pour les documents des clients', 1, 1, 1, '2023-05-10 13:34:37', '2023-05-10 13:34:37', NULL),
(2, 1, 'PAYS/CONFTECH/DOCS/100000', 'Classeur pays', 'Classeur pour les documents des pays', 1, 1, 1, '2023-05-10 16:57:40', '2023-05-10 16:57:40', NULL),
(3, 1, 'EQPMT/CONFTECH/DOCS/100000', 'Classeur équipements', 'Classeur pour les documents des équipements', 1, 1, 1, '2023-05-10 17:38:02', '2023-05-10 17:38:02', NULL),
(4, 1, 'CLI/CONFTECH/DOCS/100000', 'Classeur clients', 'Classeur pour les documents des clients', 1, 1, 1, '2023-05-10 18:14:55', '2023-05-10 18:14:55', NULL),
(5, 1, 'AG/CONFTECHSERVICE/DOCS/100000', 'Classeur cursus agents', 'Classeur pour les documents cursus des agents', 1, 1, 1, '2023-05-13 16:51:57', '2023-05-13 16:51:57', NULL),
(6, 1, 'REF/09677', 'Classeur agent', NULL, 1, 1, 3, '2023-06-20 16:26:57', '2023-06-20 16:26:57', NULL),
(7, 3, 'TACHE/APPROVALSERVICE/DOCS/300000', 'Classeur gestion des tâches', 'Classeur pour les documents en rapport avec la gestion des tâche', 2, 2, 3, '2023-07-02 20:42:47', '2023-07-02 20:42:47', NULL),
(8, 3, 'CLI/APPROVALSERVICE/DOCS/300000', 'Classeur clients', 'Classeur pour les documents des clients', 2, 2, 3, '2023-10-18 11:22:33', '2023-10-18 11:22:33', NULL),
(9, 3, 'EQPMT/APPROVALSERVICE/DOCS/300000', 'Classeur équipements', 'Classeur pour les documents des équipements', 2, 2, 3, '2023-10-18 11:29:17', '2023-10-18 11:29:17', NULL),
(10, 3, 'PAYS/APPROVALSERVICE/DOCS/300000', 'Classeur pays', 'Classeur pour les documents des pays', 2, 2, 3, '2023-10-18 11:37:06', '2023-10-18 11:37:06', NULL),
(11, 1, 'CLI/CONFTECHSERVICE/DOCS/100000', 'Classeur clients', 'Classeur pour les documents des clients', 1, 1, 1, '2023-10-30 09:43:33', '2023-10-30 09:43:33', NULL),
(12, 1, 'EQPMT/CONFTECHSERVICE/DOCS/100000', 'Classeur équipements', 'Classeur pour les documents des équipements', 1, 1, 1, '2023-10-30 10:25:03', '2023-10-30 10:25:03', NULL),
(13, 1, 'PAYS/CONFTECHSERVICE/DOCS/100000', 'Classeur pays', 'Classeur pour les documents des pays', 1, 1, 1, '2023-10-30 10:29:38', '2023-10-30 10:29:38', NULL),
(14, 4, 'EQPMT/NEWTECH/DOCS/400000', 'Classeur équipements', 'Classeur pour les documents des équipements', 1, 1, 4, '2023-11-07 14:19:29', '2023-11-07 14:19:29', NULL),
(15, 4, 'PAYS/NEWTECH/DOCS/400000', 'Classeur pays', 'Classeur pour les documents des pays', 1, 1, 4, '2023-11-07 14:24:38', '2023-11-07 14:24:38', NULL),
(16, 4, 'CLI/NEWTECH/DOCS/400000', 'Classeur clients', 'Classeur pour les documents des clients', 1, 1, 4, '2023-11-07 15:15:31', '2023-11-07 15:15:31', NULL),
(17, 3, 'AG/APPROVALSERVICE/DOCS/300000', 'Classeur cursus agents', 'Classeur pour les documents cursus des agents', 2, 2, 3, '2023-11-29 14:29:36', '2023-11-29 14:29:36', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tache_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `statut_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `message`, `created_at`, `updated_at`, `tache_id`, `user_id`, `statut_id`) VALUES
(1, 'tete', '2023-07-02 19:24:01', '2023-07-02 19:24:01', 3, 2, 1),
(2, 'fetez vite', '2023-08-05 16:30:38', '2023-08-05 16:30:38', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) DEFAULT NULL,
  `intitule` varchar(50) DEFAULT NULL,
  `num_compte` varchar(200) DEFAULT NULL,
  `balance` double DEFAULT '0',
  `is_primary` int(11) DEFAULT NULL,
  `team_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`id`, `bank_id`, `intitule`, `num_compte`, `balance`, `is_primary`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Dikasa Mvita Jean-Louis', '0089746353496438', 0, 0, 1, '2023-03-04 17:05:27', '2023-08-03 12:31:26', NULL),
(2, 1, 'Jean-louis Dikasa 2', '3627540606', 0, 0, 1, '2023-03-25 14:10:11', '2023-03-25 14:10:25', NULL),
(3, 3, 'Jean-louis Dikasa', '885797546460', 0, 1, NULL, '2023-08-03 12:31:26', '2023-08-03 12:31:26', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

CREATE TABLE `conges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `statut_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `conges`
--

INSERT INTO `conges` (`id`, `libelle`, `description`, `created_at`, `updated_at`, `user_id`, `statut_id`) VALUES
(1, 'Maladie', 'congé maladi', '2022-12-15 15:43:21', '2023-02-23 11:59:07', 1, 1),
(2, 'Deuil', 'Vous avez perdu un proche, Vous avez droit à une semaine de repos.', '2023-02-23 11:49:42', '2023-02-23 11:58:38', 1, 1),
(3, 'Maternité', '2 mois après accouchement', '2023-02-27 14:08:25', '2023-02-27 14:08:25', 1, 1),
(4, 'Autre', '', '2023-03-28 16:37:16', '2023-03-28 16:37:16', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contacts_people`
--

CREATE TABLE `contacts_people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contacts_people`
--

INSERT INTO `contacts_people` (`id`, `nom`, `prenom`, `phone`, `phone_type`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test nom', 'test prenom', '0811234567', '', 'jdikasa@yahoo.com', '2022-11-27 22:04:27', '2022-11-27 22:04:27', NULL),
(2, 'test nom', 'test prenom', '0811234567', '', 'jdikasa@yahoo.com', '2022-11-27 22:06:17', '2022-11-27 22:06:17', NULL),
(3, 'test nom', 'test prenom', '0811234567', 'Maison', 'jdikasa@yahoo.com', '2022-11-28 23:12:21', '2022-11-28 23:12:21', NULL),
(4, 'test nom', 'test prenom', '0811234567', 'Mobile', 'jdikasa@yahoo.com', '2022-11-29 14:11:01', '2022-11-29 14:11:01', NULL),
(5, 'test nom', 'test prenom', '0811234567', 'Mobile', 'jdikasa@yahoo.com', '2022-11-29 14:11:44', '2022-11-29 14:11:44', NULL),
(6, 'test nom', 'test prenom', '0811234567', 'Mobile', 'jdikasa@yahoo.com', '2022-11-29 14:14:23', '2022-11-29 14:14:23', NULL),
(7, 'Dikasa', 'jean-louis', '0811234567', 'Mobile', 'jdikasa@yahoo.com', '2023-03-25 12:02:57', '2023-03-25 12:02:57', NULL),
(8, 'Dikasa', 'jean-louis', '0811234567', 'Mobile', 'jdikasa@yahoo.com', '2023-03-25 12:14:29', '2023-03-25 12:14:29', NULL),
(9, 'Dikasa', 'jeanloui', '0811234567', 'Mobile', 'jdikasa@yahoo.com', '2023-05-10 00:27:23', '2023-05-10 00:27:23', NULL),
(10, 'test nom', 'test prenom', '0811234567', 'Mobile', 'jdikasa@yahoo.com', '2023-05-10 00:52:26', '2023-05-10 00:52:26', NULL),
(11, 'Dikasa', 'jeanloui', '0811234567', 'Mobile', 'jdikasa@yahoo.com', '2023-05-10 00:52:26', '2023-05-10 00:52:26', NULL),
(12, 'Dikasa', 'jean-loui', '0811234567', 'Mobile', 'jdikasa@yahoo.com', '2023-10-18 11:22:24', '2023-10-18 11:22:24', NULL),
(13, 'Dikasa', 'jean-loui', '0811234567', 'Mobile', 'jdikasa@yahoo.com', '2023-10-30 09:43:28', '2023-10-30 09:43:28', NULL),
(14, 'Dikasa', 'jean-loui', '0811234567', 'Mobile', 'jdikasa@yahoo.com', '2023-10-30 09:46:52', '2023-10-30 09:46:52', NULL),
(15, 'stephanie', 'berry', '0819679613', 'Mobile', 'stephanie@approvalgateforafrica.net', '2023-11-07 14:07:43', '2023-11-07 14:07:43', NULL),
(16, 'Doe', 'John', '0819679613', 'Mobile', 'jdikasa@yahoo.com', '2023-11-07 15:15:27', '2023-11-07 15:15:27', NULL),
(17, 'Dikasa', 'jean-loui', '0811234567', 'Mobile', 'jdikasa@yahoo.com', '2023-11-29 12:51:28', '2023-11-29 12:51:28', NULL),
(18, 'dk', 'jl', '0811234567', 'Mobile', 'jdikasa@yahoo.com', '2023-11-29 13:02:30', '2023-11-29 13:02:30', NULL),
(19, 'dk', 'jl', '0811234567', 'Mobile', 'jdikasa@yahoo.com', '2023-11-29 13:02:59', '2023-11-29 13:02:59', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

CREATE TABLE `contrats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_debut` date DEFAULT NULL,
  `fin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `devise` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT '$',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_contrat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `statut_id` bigint(20) UNSIGNED DEFAULT '1',
  `agent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contrats`
--

INSERT INTO `contrats` (`id`, `date_debut`, `fin`, `temps`, `salaire`, `devise`, `created_at`, `updated_at`, `employe_id`, `type_contrat_id`, `user_id`, `statut_id`, `agent_id`) VALUES
(1, '2023-01-19', NULL, '129', '500', '$', '2023-01-21 22:47:08', '2023-01-21 22:47:08', NULL, NULL, 2, 1, 2),
(2, NULL, NULL, '120', '500', '$', '2023-03-07 03:33:58', '2023-03-07 03:33:58', NULL, 1, 3, 1, 3),
(3, '2023-05-13', '2023-05-31 00:00:00', '120', '500', '$', '2023-05-13 16:57:06', '2023-05-13 16:57:06', NULL, 2, 3, 1, 8),
(4, '2023-06-20', NULL, '120', '1000', '$', '2023-06-20 16:12:07', '2023-06-20 16:12:07', NULL, 1, 4, 1, 9),
(5, '2023-11-29', '2023-12-10 00:00:00', '120', '200', '$', '2023-11-29 14:29:38', '2023-11-29 14:29:38', NULL, 1, 5, 1, 10),
(6, NULL, NULL, NULL, NULL, NULL, '2023-11-29 14:46:26', '2023-11-29 14:46:26', NULL, NULL, 6, 1, 12);

-- --------------------------------------------------------

--
-- Structure de la table `cotations`
--

CREATE TABLE `cotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `carte_id` bigint(20) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `date_limit_paie` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `total_net` double DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cotations`
--

INSERT INTO `cotations` (`id`, `product_id`, `country_id`, `carte_id`, `customer_id`, `date_limit_paie`, `total`, `tax`, `total_net`, `team_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, NULL, 2, NULL, 850, 986, 986, NULL, '2023-02-18 14:15:31', '2023-02-18 14:15:31'),
(2, NULL, 3, NULL, 1, NULL, 2500, 4550, 4550, NULL, '2023-03-25 13:49:50', '2023-03-25 13:49:50'),
(3, NULL, 4, NULL, 13, NULL, 200, 200, 200, 1, '2023-05-10 21:20:35', '2023-05-10 21:20:35'),
(4, NULL, 20, NULL, 15, NULL, 1200, 1800, 1800, 1, '2023-10-30 10:48:07', '2023-10-30 10:48:07'),
(5, NULL, 22, NULL, 16, NULL, 500, 500, 500, 4, '2023-11-07 14:51:23', '2023-11-07 14:51:23');

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` char(2) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Two-letter country code (ISO 3166-1 alpha-2)',
  `name_en` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'English country name',
  `name_fr` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Full English country name',
  `iso3` char(3) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Three-letter country code (ISO 3166-1 alpha-3)',
  `number` int(11) NOT NULL COMMENT 'Three-digit country number (ISO 3166-1 numeric)',
  `continent_code` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_order` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '900',
  `continent_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name_en`, `name_fr`, `full_name`, `iso3`, `number`, `continent_code`, `display_order`, `continent_id`, `created_at`, `updated_at`, `deleted_at`, `action`) VALUES
(1, 'AD', 'Andorra', 'Andorre', 'Principality of Andorra', 'AND', 20, 'EU', '7', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(2, 'AE', 'United Arab Emirates', 'Émirats arabes unis', 'United Arab Emirates', 'ARE', 784, 'AS', '232', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(3, 'AF', 'Afghanistan', 'Afghanistan', 'Islamic Republic of Afghanistan', 'AFG', 4, 'AS', '3', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(4, 'AG', 'Antigua and Barbuda', 'Antigua et Barbuda', 'Antigua and Barbuda', 'ATG', 28, 'NA', '11', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(5, 'AI', 'Anguilla', 'Anguilla', 'Anguilla', 'AIA', 660, 'NA', '9', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(6, 'AL', 'Albania', 'Albanie', 'Republic of Albania', 'ALB', 8, 'EU', '4', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(7, 'AM', 'Armenia', 'Arménie', 'Republic of Armenia', 'ARM', 51, 'AS', '13', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(8, 'AN', 'Netherlands Antilles', 'Antilles néderlandaises', 'Netherlands Antilles', 'ANT', 530, 'NA', '157', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(9, 'AO', 'Angola', 'Angola', 'Republic of Angola', 'AGO', 24, 'AF', '8', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(10, 'AQ', 'Antarctica', 'Antarctique', 'Antarctica (the territory South of 60 deg S)', 'ATA', 10, 'AN', '10', 2, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(11, 'AR', 'Argentina', 'Argentine', 'Argentine Republic', 'ARG', 32, 'SA', '12', 7, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(12, 'AS', 'American Samoa', 'Samoa', 'American Samoa', 'ASM', 16, 'OC', '6', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, '[-13, 171]'),
(13, 'AT', 'Austria', 'Autriche', 'Republic of Austria', 'AUT', 40, 'EU', '16', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(14, 'AU', 'Australia', 'Australie', 'Commonwealth of Australia', 'AUS', 36, 'OC', '15', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(15, 'AW', 'Aruba', 'Aruba', 'Aruba', 'ABW', 533, 'NA', '14', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(16, 'AX', 'Aland', 'Aland', 'Åland Islands', 'ALA', 248, 'EU', '246', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(17, 'AZ', 'Azerbaijan', 'Azerbaïdjan', 'Republic of Azerbaijan', 'AZE', 31, 'AS', '17', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(18, 'BA', 'Bosnia and Herzegovina', 'Bosnie-Herzégovine', 'Bosnia and Herzegovina', 'BIH', 70, 'EU', '29', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(19, 'BB', 'Barbados', 'La Barbad', 'Barbados', 'BRB', 52, 'NA', '21', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(20, 'BD', 'Bangladesh', 'Bangladesh', 'People\'s Republic of Bangladesh', 'BGD', 50, 'AS', '20', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(21, 'BE', 'Belgium', 'Belgique', 'Kingdom of Belgium', 'BEL', 56, 'EU', '23', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(22, 'BF', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 'BFA', 854, 'AF', '37', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(23, 'BG', 'Bulgaria', 'Bulgarie', 'Republic of Bulgaria', 'BGR', 100, 'EU', '36', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(24, 'BH', 'Bahrain', 'Bahrain', 'Kingdom of Bahrain', 'BHR', 48, 'AS', '19', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(25, 'BI', 'Burundi', 'Burundi', 'Republic of Burundi', 'BDI', 108, 'AF', '38', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(26, 'BJ', 'Benin', 'Benin', 'Republic of Benin', 'BEN', 204, 'AF', '25', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(27, 'BL', 'Saint Barthélemy', 'Saint Barthélemie', 'Saint Barthelemy', 'BLM', 652, 'NA', '185', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(28, 'BM', 'Bermuda', 'Bermudes (Les)', 'Bermuda', 'BMU', 60, 'NA', '26', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(29, 'BN', 'Brunei Darussalam', 'Brunei', 'Brunei Darussalam', 'BRN', 96, 'AS', '35', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(30, 'BO', 'Bolivia', 'Bolivie', 'Republic of Bolivia', 'BOL', 68, 'SA', '28', 7, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(31, 'BR', 'Brazil', 'Brésil', 'Federative Republic of Brazil', 'BRA', 76, 'SA', '32', 7, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(32, 'BS', 'Bahamas', 'Bahamas', 'Commonwealth of the Bahamas', 'BHS', 44, 'NA', '18', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(33, 'BT', 'Bhutan', 'Bhoutan', 'Kingdom of Bhutan', 'BTN', 64, 'AS', '27', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(34, 'BV', 'Bouvet Island', 'Bouvet (ïles)', 'Bouvet Island (Bouvetoya)', 'BVT', 74, 'AN', '31', 2, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(35, 'BW', 'Botswana', 'Botswana', 'Republic of Botswana', 'BWA', 72, 'AF', '30', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(36, 'BY', 'Belarus', 'Biélorussie', 'Republic of Belarus', 'BLR', 112, 'EU', '22', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(37, 'BZ', 'Belize', 'Belize', 'Belize', 'BLZ', 84, 'NA', '24', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(38, 'CA', 'Canada', 'Canada', 'Canada', 'CAN', 124, 'NA', '2', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(39, 'CC', 'Cocos (Keeling) Islands', 'Cocos (ïles)', 'Cocos (Keeling) Islands', 'CCK', 166, 'AS', '48', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(40, 'CD', 'Congo (Kinshasa)', 'Congo (Kinshasa)', 'Democratic Republic of the Congo', 'COD', 180, 'AF', '51', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, '[-4, 18]'),
(41, 'CF', 'Central African Republic', 'République centrafricaine', 'Central African Republic', 'CAF', 140, 'AF', '43', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(42, 'CG', 'Congo (Brazzaville)', 'Congo (Brazzaville)', 'Republic of the Congo', 'COG', 178, 'AF', '52', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, '[0, 16]'),
(43, 'CH', 'Switzerland', 'Suisse', 'Swiss Confederation', 'CHE', 756, 'EU', '214', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(44, 'CI', 'Côte d\'Ivoire', 'Côte d\'Ivoire', 'Republic of Cote d\'Ivoire', 'CIV', 384, 'AF', '55', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(45, 'CK', 'Cook Islands', 'Cook (ïles)', 'Cook Islands', 'COK', 184, 'OC', '53', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(46, 'CL', 'Chile', 'Chili', 'Republic of Chile', 'CHL', 152, 'SA', '45', 7, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(47, 'CM', 'Cameroon', 'Cameroun', 'Republic of Cameroon', 'CMR', 120, 'AF', '40', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(48, 'CN', 'China', 'Chine (Rép. pop.)', 'People\'s Republic of China', 'CHN', 156, 'AS', '46', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(49, 'CO', 'Colombia', 'Colombie', 'Republic of Colombia', 'COL', 170, 'SA', '49', 7, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(50, 'CR', 'Costa Rica', 'Costa Rica', 'Republic of Costa Rica', 'CRI', 188, 'NA', '54', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(51, 'CU', 'Cuba', 'Cuba', 'Republic of Cuba', 'CUB', 192, 'NA', '57', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(52, 'CV', 'Cape Verde', 'Cap Vert', 'Republic of Cape Verde', 'CPV', 132, 'AF', '41', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(53, 'CX', 'Christmas Island', 'Christmas (ïle)', 'Christmas Island', 'CXR', 162, 'AS', '47', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(54, 'CY', 'Cyprus', 'Chypre', 'Republic of Cyprus', 'CYP', 196, 'AS', '58', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(55, 'CZ', 'Czech Republic', 'République tchéque', 'Czech Republic', 'CZE', 203, 'EU', '59', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(56, 'DE', 'Germany', 'Allemagne', 'Federal Republic of Germany', 'DEU', 276, 'EU', '82', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(57, 'DJ', 'Djibouti', 'Djibouti', 'Republic of Djibouti', 'DJI', 262, 'AF', '61', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(58, 'DK', 'Denmark', 'Danemark', 'Kingdom of Denmark', 'DNK', 208, 'EU', '60', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(59, 'DM', 'Dominica', 'Dominique', 'Commonwealth of Dominica', 'DMA', 212, 'NA', '62', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(60, 'DO', 'Dominican Republic', 'République Dominicaine', 'Dominican Republic', 'DOM', 214, 'NA', '63', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(61, 'DZ', 'Algeria', 'Algérie', 'People\'s Democratic Republic of Algeria', 'DZA', 12, 'AF', '5', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(62, 'EC', 'Ecuador', 'Équateur', 'Republic of Ecuador', 'ECU', 218, 'SA', '64', 7, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(63, 'EE', 'Estonia', 'Estonie', 'Republic of Estonia', 'EST', 233, 'EU', '69', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(64, 'EG', 'Egypt', 'Égypte', 'Arab Republic of Egypt', 'EGY', 818, 'AF', '65', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(65, 'EH', 'Western Sahara', 'Sahara Occidental', 'Western Sahara', 'ESH', 732, 'AF', '242', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(66, 'ER', 'Eritrea', 'Érythrée', 'State of Eritrea', 'ERI', 232, 'AF', '68', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(67, 'ES', 'Spain', 'Espagne', 'Kingdom of Spain', 'ESP', 724, 'EU', '207', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(68, 'ET', 'Ethiopia', 'Ethiopie', 'Federal Democratic Republic of Ethiopia', 'ETH', 231, 'AF', '70', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(69, 'FI', 'Finland', 'Finlande', 'Republic of Finland', 'FIN', 246, 'EU', '74', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(70, 'FJ', 'Fiji', 'Fidji (République des)', 'Republic of the Fiji Islands', 'FJI', 242, 'OC', '73', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(71, 'FK', 'Falkland Islands', 'Falkland (ïle)', 'Falkland Islands (Malvinas)', 'FLK', 238, 'SA', '71', 7, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(72, 'FM', 'Micronesia', 'Micron�sie (�tats f�d�r�s de)', 'Federated States of Micronesia', 'FSM', 583, 'OC', '144', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(73, 'FO', 'Faroe Islands', 'Féroé (ïles)', 'Faroe Islands', 'FRO', 234, 'EU', '72', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(74, 'FR', 'France', 'France', 'French Republic', 'FRA', 250, 'EU', '75', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(75, 'GA', 'Gabon', 'Gabon', 'Gabonese Republic', 'GAB', 266, 'AF', '79', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(76, 'GB', 'United Kingdom', 'Royaume Unit', 'United Kingdom of Great Britain & Northern Ireland', 'GBR', 826, 'EU', '233', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(77, 'GD', 'Grenada', 'Grenade', 'Grenada', 'GRD', 308, 'NA', '87', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(78, 'GE', 'Georgia', 'G�orgie', 'Georgia', 'GEO', 268, 'AS', '81', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(79, 'GF', 'French Guiana', 'Guyane franéaise', 'French Guiana', 'GUF', 254, 'SA', '76', 7, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(80, 'GG', 'Guernsey', 'Guernsey', 'Bailiwick of Guernsey', 'GGY', 831, 'EU', '91', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(81, 'GH', 'Ghana', 'Ghana', 'Republic of Ghana', 'GHA', 288, 'AF', '83', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(82, 'GI', 'Gibraltar', 'Gibraltar', 'Gibraltar', 'GIB', 292, 'EU', '84', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(83, 'GL', 'Greenland', 'Groenland', 'Greenland', 'GRL', 304, 'NA', '86', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(84, 'GM', 'Gambia', 'Gambie', 'Republic of the Gambia', 'GMB', 270, 'AF', '80', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(85, 'GN', 'Guinea', 'Guin�e', 'Republic of Guinea', 'GIN', 324, 'AF', '92', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(86, 'GP', 'Guadeloupe', 'Guadeloupe', 'Guadeloupe', 'GLP', 312, 'NA', '88', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(87, 'GQ', 'Equatorial Guinea', 'Guinée Equatoriale', 'Republic of Equatorial Guinea', 'GNQ', 226, 'AF', '67', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(88, 'GR', 'Greece', 'Gr�ce', 'Hellenic Republic Greece', 'GRC', 300, 'EU', '85', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(89, 'GS', 'South Georgia and South Sandwich Islands', 'G�orgie du Sud et Sandwich du Sud (�les)', 'South Georgia and the South Sandwich Islands', 'SGS', 239, 'AN', '206', 2, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(90, 'GT', 'Guatemala', 'Guatemala', 'Republic of Guatemala', 'GTM', 320, 'NA', '90', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(91, 'GU', 'Guam', 'Guam', 'Guam', 'GUM', 316, 'OC', '89', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(92, 'GW', 'Guinea-Bissau', 'Guin�e-Bissau', 'Republic of Guinea-Bissau', 'GNB', 624, 'AF', '93', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(93, 'GY', 'Guyana', 'Guyane', 'Co-operative Republic of Guyana', 'GUY', 328, 'SA', '94', 7, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(94, 'HK', 'Hong Kong', 'Hong Kong', 'Hong Kong Special Administrative Region of China', 'HKG', 344, 'AS', '99', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(95, 'HM', 'Heard and McDonald Islands', 'Heard et McDonald (�les)', 'Heard Island and McDonald Islands', 'HMD', 334, 'AN', '96', 2, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(96, 'HN', 'Honduras', 'Honduras', 'Republic of Honduras', 'HND', 340, 'NA', '98', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(97, 'HR', 'Croatia', 'Croatie', 'Republic of Croatia', 'HRV', 191, 'EU', '56', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(98, 'HT', 'Haiti', 'Ha�ti', 'Republic of Haiti', 'HTI', 332, 'NA', '95', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(99, 'HU', 'Hungary', 'Hongrie', 'Republic of Hungary', 'HUN', 348, 'EU', '100', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(100, 'ID', 'Indonesia', 'Indon�sie', 'Republic of Indonesia', 'IDN', 360, 'AS', '103', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(101, 'IE', 'Ireland', 'Irlande', 'Ireland', 'IRL', 372, 'EU', '106', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(102, 'IL', 'Israel', 'Isra�l', 'State of Israel', 'ISR', 376, 'AS', '108', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(103, 'IM', 'Isle of Man', 'Isle of Man', 'Isle of Man', 'IMN', 833, 'EU', '107', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(104, 'IN', 'India', 'Inde', 'Republic of India', 'IND', 356, 'AS', '102', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(105, 'IO', 'British Indian Ocean Territory', 'Territoire britannique de l\'océan Indien', 'British Indian Ocean Territory (Chagos Archipelago)', 'IOT', 86, 'AS', '33', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(106, 'IQ', 'Iraq', 'Irak', 'Republic of Iraq', 'IRQ', 368, 'AS', '105', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(107, 'IR', 'Iran', 'Iran', 'Islamic Republic of Iran', 'IRN', 364, 'AS', '104', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(108, 'IS', 'Iceland', 'Islande', 'Republic of Iceland', 'ISL', 352, 'EU', '101', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(109, 'IT', 'Italy', 'Italie', 'Italian Republic', 'ITA', 380, 'EU', '109', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(110, 'JE', 'Jersey', 'Jersey', 'Bailiwick of Jersey', 'JEY', 832, 'EU', '112', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(111, 'JM', 'Jamaica', 'Jama�que', 'Jamaica', 'JAM', 388, 'NA', '110', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(112, 'JO', 'Jordan', 'Jordanie', 'Hashemite Kingdom of Jordan', 'JOR', 400, 'AS', '113', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(113, 'JP', 'Japan', 'Japon', 'Japan', 'JPN', 392, 'AS', '111', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(114, 'KE', 'Kenya', 'Kenya', 'Republic of Kenya', 'KEN', 404, 'AF', '115', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(115, 'KG', 'Kyrgyzstan', 'Kirghizistan', 'Kyrgyz Republic', 'KGZ', 417, 'AS', '120', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(116, 'KH', 'Cambodia', 'Cambodge', 'Kingdom of Cambodia', 'KHM', 116, 'AS', '39', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(117, 'KI', 'Kiribati', 'Kiribati', 'Republic of Kiribati', 'KIR', 296, 'OC', '116', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(118, 'KM', 'Comoros', 'Comores', 'Union of the Comoros', 'COM', 174, 'AF', '50', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(119, 'KN', 'Saint Kitts and Nevis', 'Saint-Kitts et Nevis', 'Federation of Saint Kitts and Nevis', 'KNA', 659, 'NA', '187', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(120, 'KP', 'Korea, North', 'Cor�e du Nord', 'Democratic People\'s Republic of Korea', 'PRK', 408, 'AS', '117', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(121, 'KR', 'Korea, South', 'Cor�e, Sud', 'Republic of Korea', 'KOR', 410, 'AS', '118', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(122, 'KW', 'Kuwait', 'Koweit', 'State of Kuwait', 'KWT', 414, 'AS', '119', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(123, 'KY', 'Cayman Islands', 'Cayman (ïles)', 'Cayman Islands', 'CYM', 136, 'NA', '42', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(124, 'KZ', 'Kazakhstan', 'Kazakhstan', 'Republic of Kazakhstan', 'KAZ', 398, 'AS', '114', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(125, 'LA', 'Laos', 'Laos', 'Lao People\'s Democratic Republic', 'LAO', 418, 'AS', '121', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(126, 'LB', 'Lebanon', 'Liban', 'Lebanese Republic', 'LBN', 422, 'AS', '123', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(127, 'LC', 'Saint Lucia', 'Sainte Lucie', 'Saint Lucia', 'LCA', 662, 'NA', '188', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(128, 'LI', 'Liechtenstein', 'Liechtenstein', 'Principality of Liechtenstein', 'LIE', 438, 'EU', '127', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(129, 'LK', 'Sri Lanka', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka', 'LKA', 144, 'AS', '208', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(130, 'LR', 'Liberia', 'Lib�ria', 'Republic of Liberia', 'LBR', 430, 'AF', '125', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(131, 'LS', 'Lesotho', 'Lesotho', 'Kingdom of Lesotho', 'LSO', 426, 'AF', '124', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(132, 'LT', 'Lithuania', 'Lithuanie', 'Republic of Lithuania', 'LTU', 440, 'EU', '128', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(133, 'LU', 'Luxembourg', 'Luxembourg', 'Grand Duchy of Luxembourg', 'LUX', 442, 'EU', '129', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(134, 'LV', 'Latvia', 'Lettonie', 'Republic of Latvia', 'LVA', 428, 'EU', '122', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(135, 'LY', 'Libya', 'Libye', 'Libyan Arab Jamahiriya', 'LBY', 434, 'AF', '126', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(136, 'MA', 'Morocco', 'Maroc', 'Kingdom of Morocco', 'MAR', 504, 'AF', '150', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(137, 'MC', 'Monaco', 'Monaco', 'Principality of Monaco', 'MCO', 492, 'EU', '146', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(138, 'MD', 'Moldova', 'Moldavie', 'Republic of Moldova', 'MDA', 498, 'EU', '145', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(139, 'ME', 'Montenegro', 'Montenegro', 'Republic of Montenegro', 'MNE', 499, 'EU', '148', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(140, 'MF', 'Saint Martin (French part)', 'Saint Martin', 'Saint Martin', 'MAF', 663, 'NA', '189', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(141, 'MG', 'Madagascar', 'Madagascar', 'Republic of Madagascar', 'MDG', 450, 'AF', '132', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(142, 'MH', 'Marshall Islands', 'Marshall (�les)', 'Republic of the Marshall Islands', 'MHL', 584, 'OC', '138', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(143, 'MK', 'Macedonia', 'Mac�doine', 'Republic of Macedonia', 'MKD', 807, 'EU', '131', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(144, 'ML', 'Mali', 'Mali', 'Republic of Mali', 'MLI', 466, 'AF', '136', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(145, 'MM', 'Myanmar', 'Myanmar', 'Union of Myanmar', 'MMR', 104, 'AS', '152', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(146, 'MN', 'Mongolia', 'Mongolie', 'Mongolia', 'MNG', 496, 'AS', '147', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(147, 'MO', 'Macau', 'Macau', 'Macao Special Administrative Region of China', 'MAC', 446, 'AS', '130', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(148, 'MP', 'Northern Mariana Islands', 'Mariannes du Nord (�les)', 'Commonwealth of the Northern Mariana Islands', 'MNP', 580, 'OC', '165', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(149, 'MQ', 'Martinique', 'Martinique', 'Martinique', 'MTQ', 474, 'NA', '139', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(150, 'MR', 'Mauritania', 'Mauritanie', 'Islamic Republic of Mauritania', 'MRT', 478, 'AF', '140', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(151, 'MS', 'Montserrat', 'Montserrat', 'Montserrat', 'MSR', 500, 'NA', '149', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(152, 'MT', 'Malta', 'Malte', 'Republic of Malta', 'MLT', 470, 'EU', '137', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(153, 'MU', 'Mauritius', 'Maurice', 'Republic of Mauritius', 'MUS', 480, 'AF', '141', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(154, 'MV', 'Maldives', 'Maldives (�les)', 'Republic of Maldives', 'MDV', 462, 'AS', '135', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(155, 'MW', 'Malawi', 'Malawi', 'Republic of Malawi', 'MWI', 454, 'AF', '133', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(156, 'MX', 'Mexico', 'Mexique', 'United Mexican States', 'MEX', 484, 'NA', '143', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(157, 'MY', 'Malaysia', 'Malaisie', 'Malaysia', 'MYS', 458, 'AS', '134', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(158, 'MZ', 'Mozambique', 'Mozambique', 'Republic of Mozambique', 'MOZ', 508, 'AF', '151', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(159, 'NA', 'Namibia', 'Namibie', 'Republic of Namibia', 'NAM', 516, 'AF', '153', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(160, 'NC', 'New Caledonia', 'Nouvelle Cal�donie', 'New Caledonia', 'NCL', 540, 'OC', '158', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(161, 'NE', 'Niger', 'Niger', 'Republic of Niger', 'NER', 562, 'AF', '161', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(162, 'NF', 'Norfolk Island', 'Norfolk (�les)', 'Norfolk Island', 'NFK', 574, 'OC', '164', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(163, 'NG', 'Nigeria', 'Nigeria', 'Federal Republic of Nigeria', 'NGA', 566, 'AF', '162', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(164, 'NI', 'Nicaragua', 'Nicaragua', 'Republic of Nicaragua', 'NIC', 558, 'NA', '160', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(165, 'NL', 'Netherlands', 'Pays-Bas', 'Kingdom of the Netherlands', 'NLD', 528, 'EU', '156', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(166, 'NO', 'Norway', 'Norv�ge', 'Kingdom of Norway', 'NOR', 578, 'EU', '166', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(167, 'NP', 'Nepal', 'Nepal', 'State of Nepal', 'NPL', 524, 'AS', '155', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(168, 'NR', 'Nauru', 'Nauru', 'Republic of Nauru', 'NRU', 520, 'OC', '154', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(169, 'NU', 'Niue', 'Niue', 'Niue', 'NIU', 570, 'OC', '163', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(170, 'NZ', 'New Zealand', 'Nouvelle-Z�lande', 'New Zealand', 'NZL', 554, 'OC', '159', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(171, 'OM', 'Oman', 'Oman', 'Sultanate of Oman', 'OMN', 512, 'AS', '167', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(172, 'PA', 'Panama', 'Panama', 'Republic of Panama', 'PAN', 591, 'NA', '171', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(173, 'PE', 'Peru', 'P�rou', 'Republic of Peru', 'PER', 604, 'SA', '174', 7, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(174, 'PF', 'French Polynesia', 'Polyn�sie fran�aise', 'French Polynesia', 'PYF', 258, 'OC', '77', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(175, 'PG', 'Papua New Guinea', 'Papouasie-Nouvelle-Guin�e', 'Independent State of Papua New Guinea', 'PNG', 598, 'OC', '172', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(176, 'PH', 'Philippines', 'Philippines', 'Republic of the Philippines', 'PHL', 608, 'AS', '175', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(177, 'PK', 'Pakistan', 'Pakistan', 'Islamic Republic of Pakistan', 'PAK', 586, 'AS', '168', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(178, 'PL', 'Poland', 'Pologne', 'Republic of Poland', 'POL', 616, 'EU', '177', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(179, 'PM', 'Saint Pierre and Miquelon', 'Saint Pierre et Miquelon', 'Saint Pierre and Miquelon', 'SPM', 666, 'NA', '190', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(180, 'PN', 'Pitcairn', 'Pitcairn (�les)', 'Pitcairn Islands', 'PCN', 612, 'OC', '176', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(181, 'PR', 'Puerto Rico', 'Porto Rico', 'Commonwealth of Puerto Rico', 'PRI', 630, 'NA', '179', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(182, 'PS', 'Palestine', 'Palestine', 'Occupied Palestinian Territory', 'PSE', 275, 'AS', '170', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(183, 'PT', 'Portugal', 'Portugal', 'Portuguese Republic', 'PRT', 620, 'EU', '178', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(184, 'PW', 'Palau', 'Palau', 'Republic of Palau', 'PLW', 585, 'OC', '169', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(185, 'PY', 'Paraguay', 'Paraguay', 'Republic of Paraguay', 'PRY', 600, 'SA', '173', 7, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(186, 'QA', 'Qatar', 'Qatar', 'State of Qatar', 'QAT', 634, 'AS', '180', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(187, 'RE', 'Reunion', 'R�union (La)', 'Reunion', 'REU', 638, 'AF', '181', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(188, 'RO', 'Romania', 'Roumanie', 'Romania', 'ROU', 642, 'EU', '182', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(189, 'RS', 'Serbia', 'Serbie', 'Republic of Serbia', 'SRB', 688, 'EU', '197', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(190, 'RU', 'Russian Federation', 'Russie', 'Russian Federation', 'RUS', 643, 'EU', '183', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(191, 'RW', 'Rwanda', 'Rwanda', 'Republic of Rwanda', 'RWA', 646, 'AF', '184', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(192, 'SA', 'Saudi Arabia', 'Arabie saoudite', 'Kingdom of Saudi Arabia', 'SAU', 682, 'AS', '195', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(193, 'SB', 'Solomon Islands', 'Île de salomon', 'Solomon Islands', 'SLB', 90, 'OC', '203', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(194, 'SC', 'Seychelles', 'Seychelles', 'Republic of Seychelles', 'SYC', 690, 'AF', '198', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(195, 'SD', 'Sudan', 'Soudan', 'Republic of Sudan', 'SDN', 736, 'AF', '209', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(196, 'SE', 'Sweden', 'Su�de', 'Kingdom of Sweden', 'SWE', 752, 'EU', '213', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(197, 'SG', 'Singapore', 'Singapour', 'Republic of Singapore', 'SGP', 702, 'AS', '200', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(198, 'SH', 'Saint Helena', 'Sainte H�l�ne', 'Saint Helena', 'SHN', 654, 'AF', '186', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(199, 'SI', 'Slovenia', 'Slov�nie', 'Republic of Slovenia', 'SVN', 705, 'EU', '202', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(200, 'SJ', 'Svalbard and Jan Mayen Islands', 'Svalbard et Jan Mayen (�les)', 'Svalbard & Jan Mayen Islands', 'SJM', 744, 'EU', '211', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(201, 'SK', 'Slovakia', 'Slovaquie', 'Slovakia (Slovak Republic)', 'SVK', 703, 'EU', '201', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(202, 'SL', 'Sierra Leone', 'Sierra Leone', 'Republic of Sierra Leone', 'SLE', 694, 'AF', '199', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(203, 'SM', 'San Marino', 'Saint-Marin (R�p. de)', 'Republic of San Marino', 'SMR', 674, 'EU', '193', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(204, 'SN', 'Senegal', 'S�n�gal', 'Republic of Senegal', 'SEN', 686, 'AF', '196', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(205, 'SO', 'Somalia', 'Somalie', 'Somali Republic', 'SOM', 706, 'AF', '204', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(206, 'SR', 'Suriname', 'Suriname', 'Republic of Suriname', 'SUR', 740, 'SA', '210', 7, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(207, 'ST', 'Sao Tome and Principe', 'S�o Tom� et Pr�ncipe (R�p.)', 'Democratic Republic of Sao Tome and Principe', 'STP', 678, 'AF', '194', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(208, 'SV', 'El Salvador', 'El Salvador', 'Republic of El Salvador', 'SLV', 222, 'NA', '66', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(209, 'SY', 'Syria', 'Syrie', 'Syrian Arab Republic', 'SYR', 760, 'AS', '215', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(210, 'SZ', 'Swaziland', 'Swaziland', 'Kingdom of Swaziland', 'SWZ', 748, 'AF', '212', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(211, 'TC', 'Turks and Caicos Islands', 'Turks et Ca�ques (�les)', 'Turks and Caicos Islands', 'TCA', 796, 'NA', '228', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(212, 'TD', 'Chad', 'Tchad', 'Republic of Chad', 'TCD', 148, 'AF', '44', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(213, 'TF', 'French Southern Lands', 'Territoires fran�ais du sud', 'French Southern Territories', 'ATF', 260, 'AN', '78', 2, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(214, 'TG', 'Togo', 'Togo', 'Togolese Republic', 'TGO', 768, 'AF', '221', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(215, 'TH', 'Thailand', 'Thailande', 'Kingdom of Thailand', 'THA', 764, 'AS', '219', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(216, 'TJ', 'Tajikistan', 'Tadjikistan', 'Republic of Tajikistan', 'TJK', 762, 'AS', '217', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(217, 'TK', 'Tokelau', 'Tokelau', 'Tokelau', 'TKL', 772, 'OC', '222', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(218, 'TL', 'Timor-Leste', 'Timor', 'Democratic Republic of Timor-Leste', 'TLS', 626, 'AS', '220', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(219, 'TM', 'Turkmenistan', 'Turkm�nistan', 'Turkmenistan', 'TKM', 795, 'AS', '227', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(220, 'TN', 'Tunisia', 'Tunisie', 'Tunisian Republic', 'TUN', 788, 'AF', '225', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(221, 'TO', 'Tonga', 'Tonga', 'Kingdom of Tonga', 'TON', 776, 'OC', '223', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(222, 'TR', 'Turkey', 'Turquie', 'Republic of Turkey', 'TUR', 792, 'AS', '226', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(223, 'TT', 'Trinidad and Tobago', 'Trinit� et Tobago', 'Republic of Trinidad and Tobago', 'TTO', 780, 'NA', '224', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(224, 'TV', 'Tuvalu', 'Tuvalu', 'Tuvalu', 'TUV', 798, 'OC', '229', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(225, 'TW', 'Taiwan', 'Taiwan', 'Taiwan', 'TWN', 158, 'AS', '216', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(226, 'TZ', 'Tanzania', 'Tanzanie', 'United Republic of Tanzania', 'TZA', 834, 'AF', '218', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(227, 'UA', 'Ukraine', 'Ukraine', 'Ukraine', 'UKR', 804, 'EU', '231', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(228, 'UG', 'Uganda', 'Ouganda', 'Republic of Uganda', 'UGA', 800, 'AF', '230', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(229, 'UM', 'United States Minor Outlying Islands', 'ïles Mineures �loign�es des �tats-Unis', 'United States Minor Outlying Islands', 'UMI', 581, 'OC', '234', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(230, 'US', 'United States of America', 'Etats-Unis d\'Amerique', 'United States of America', 'USA', 840, 'NA', '1', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(231, 'UY', 'Uruguay', 'Uruguay', 'Eastern Republic of Uruguay', 'URY', 858, 'SA', '236', 7, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(232, 'UZ', 'Uzbekistan', 'Ouzbékistan', 'Republic of Uzbekistan', 'UZB', 860, 'AS', '237', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(233, 'VA', 'Vatican City', 'Vatican (Etat du)', 'Holy See (Vatican City State)', 'VAT', 336, 'EU', '97', 4, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(234, 'VC', 'Saint Vincent and the Grenadines', 'Saint Vincent et les Grenadines', 'Saint Vincent and the Grenadines', 'VCT', 670, 'NA', '191', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(235, 'VE', 'Venezuela', 'Venezuela', 'Bolivarian Republic of Venezuela', 'VEN', 862, 'SA', '239', 7, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(236, 'VG', 'Virgin Islands, British', 'Vierges britanniques (�les)', 'British Virgin Islands', 'VGB', 92, 'NA', '34', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(237, 'VI', 'Virgin Islands, U.S.', 'Vierges (�les)', 'United States Virgin Islands', 'VIR', 850, 'NA', '235', 5, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(238, 'VN', 'Vietnam', 'Vietnam', 'Socialist Republic of Vietnam', 'VNM', 704, 'AS', '240', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(239, 'VU', 'Vanuatu', 'Vanuatu', 'Republic of Vanuatu', 'VUT', 548, 'OC', '238', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(240, 'WF', 'Wallis and Futuna Islands', 'Wallis et Futuna (�les)', 'Wallis and Futuna', 'WLF', 876, 'OC', '241', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(241, 'WS', 'Samoa', 'Samoa', 'Independent State of Samoa', 'WSM', 882, 'OC', '192', 6, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(242, 'YE', 'Yemen', 'Yemen', 'Yemen', 'YEM', 887, 'AS', '243', 3, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(243, 'YT', 'Mayotte', 'Mayotte', 'Mayotte', 'MYT', 175, 'AF', '142', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(244, 'ZA', 'South Africa', 'Afrique du sud', 'Republic of South Africa', 'ZAF', 710, 'AF', '205', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(245, 'ZM', 'Zambia', 'Zambie', 'Republic of Zambia', 'ZMB', 894, 'AF', '244', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL),
(246, 'ZW', 'Zimbabwe', 'Zimbabwe', 'Republic of Zimbabwe', 'ZWE', 716, 'AF', '245', 1, '2022-05-08 20:44:06', '2022-05-08 20:44:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `societe_id` bigint(20) DEFAULT NULL,
  `adresse_id` bigint(20) DEFAULT NULL,
  `type_id` bigint(20) DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contrat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autre_doc` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `societe_id`, `adresse_id`, `type_id`, `logo`, `contrat`, `nda`, `autre_doc`, `description`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 13, 2, 'customers/May2023/HriRquERiozZXZBulhLP.png', '[{\"download_link\":\"customers\\/May2023\\/pPzfdVyam1Wm71dsyJJ2.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '[{\"download_link\":\"customers\\/May2023\\/wmAK0f4FGMshrfMVMSgd.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', NULL, 'test description', 1, '2023-05-10 00:27:23', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(2, 2, 14, 3, 'customers/May2023/Au4kOA2kEZM7kG9m07i3.png', '[{\"download_link\":\"customers\\/May2023\\/ZSl1w6tRTX42kv4kpT8H.jpeg\",\"original_name\":\"a899368c8666b94af51c9c8f837fa3fe.jpeg\"}]', '[{\"download_link\":\"customers\\/May2023\\/ulWvAh4xnxP8tlPwNZt5.jpeg\",\"original_name\":\"1637679553845.jpeg\"}]', NULL, 'test description', 1, '2023-05-10 12:44:47', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(3, 2, 15, 3, 'customers/May2023/mwf9d3V8rrtS26xH6AkH.png', '[{\"download_link\":\"customers\\/May2023\\/eb4KB0rDL6L6kjAT44oD.jpeg\",\"original_name\":\"a899368c8666b94af51c9c8f837fa3fe.jpeg\"}]', '[{\"download_link\":\"customers\\/May2023\\/Lk0qPgnSe2RzyMD311B3.jpeg\",\"original_name\":\"1637679553845.jpeg\"}]', NULL, 'test', 1, '2023-05-10 12:48:53', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(4, 2, 16, 3, 'customers/May2023/1wM7KVuYoJoxLdZn6fzg.png', '[{\"download_link\":\"customers\\/May2023\\/jIhhewFMzjDm1L1p2r9m.jpeg\",\"original_name\":\"a899368c8666b94af51c9c8f837fa3fe.jpeg\"}]', '[{\"download_link\":\"customers\\/May2023\\/AOmmxI7U1qs245ubi7PV.jpeg\",\"original_name\":\"1637679553845.jpeg\"}]', NULL, 'test', 1, '2023-05-10 12:58:29', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(5, 2, 17, 3, 'customers/May2023/4P0syh1XIn2LPKs4oTq9.png', '[{\"download_link\":\"customers\\/May2023\\/k97ztDtSqxCNZQXjVXYB.jpeg\",\"original_name\":\"a899368c8666b94af51c9c8f837fa3fe.jpeg\"}]', '[{\"download_link\":\"customers\\/May2023\\/1epDoL7zfaEBKOkQqZpo.jpeg\",\"original_name\":\"1637679553845.jpeg\"}]', NULL, 'test', 1, '2023-05-10 13:13:33', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(6, 2, 18, 3, 'customers/May2023/FiRPQJoA9bZnMwwoM5lW.png', '[{\"download_link\":\"customers\\/May2023\\/RLJJ6smCRsiRIo3EgBuD.jpeg\",\"original_name\":\"a899368c8666b94af51c9c8f837fa3fe.jpeg\"}]', '[{\"download_link\":\"customers\\/May2023\\/GA84sSFBGTzEc10mIKa8.jpeg\",\"original_name\":\"1637679553845.jpeg\"}]', NULL, 'test', 1, '2023-05-10 13:14:54', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(7, 2, 19, 3, 'customers/May2023/YFbAZ8qMX7EaYbqHnKEG.png', '[{\"download_link\":\"customers\\/May2023\\/7QEH2NHVjzSF8JLtuhn6.jpeg\",\"original_name\":\"a899368c8666b94af51c9c8f837fa3fe.jpeg\"}]', '[{\"download_link\":\"customers\\/May2023\\/neqH9rB0hHxE25QzhAyq.jpeg\",\"original_name\":\"1637679553845.jpeg\"}]', NULL, 'test', 1, '2023-05-10 13:19:03', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(8, 2, 20, 3, 'customers/May2023/HkgxkMOrDXpjsGIIc9eJ.png', '[{\"download_link\":\"customers\\/May2023\\/eRMhAU8aDQ8hd5BsOuYG.jpeg\",\"original_name\":\"a899368c8666b94af51c9c8f837fa3fe.jpeg\"}]', '[{\"download_link\":\"customers\\/May2023\\/PN2VUH1EUWJZXpslLLAk.jpeg\",\"original_name\":\"1637679553845.jpeg\"}]', NULL, 'test', 1, '2023-05-10 13:21:23', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(9, 2, 21, 3, 'customers/May2023/IgVjzlOvrXtKC2VIDvDK.png', '[{\"download_link\":\"customers\\/May2023\\/g3ucTnwgrIThDhdTr4qj.jpeg\",\"original_name\":\"a899368c8666b94af51c9c8f837fa3fe.jpeg\"}]', '[{\"download_link\":\"customers\\/May2023\\/ayAKvsUfAdg3049cJmJl.jpeg\",\"original_name\":\"1637679553845.jpeg\"}]', NULL, 'test', 1, '2023-05-10 13:21:47', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(10, 2, 22, 3, 'customers/May2023/vIuSMBDAUj4JEjm0Awrq.png', '[{\"download_link\":\"customers\\/May2023\\/FHKVRWrAn1ilhh9tP8a6.jpeg\",\"original_name\":\"a899368c8666b94af51c9c8f837fa3fe.jpeg\"}]', '[{\"download_link\":\"customers\\/May2023\\/LSxCJ6du9eNJvzsSA2TX.jpeg\",\"original_name\":\"1637679553845.jpeg\"}]', NULL, 'test', 1, '2023-05-10 13:29:24', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(11, 2, 23, 3, 'customers/May2023/OgEddD37ROSXAgf9f2LO.png', '[{\"download_link\":\"customers\\/May2023\\/n5KO5R4B2DzElXrbFNg5.jpeg\",\"original_name\":\"a899368c8666b94af51c9c8f837fa3fe.jpeg\"}]', '[{\"download_link\":\"customers\\/May2023\\/TIO5BhGI8EBja586vuuA.jpeg\",\"original_name\":\"1637679553845.jpeg\"}]', NULL, 'test', 1, '2023-05-10 13:31:54', '2023-05-10 13:48:47', '2023-05-10 13:48:47'),
(12, 2, 24, 3, 'customers/May2023/r621fjNzkWKCSZOawrgs.png', '[{\"download_link\":\"customers\\/May2023\\/cUZh50EJD2iiSCkSbFKL.jpeg\",\"original_name\":\"a899368c8666b94af51c9c8f837fa3fe.jpeg\"}]', '[{\"download_link\":\"customers\\/May2023\\/NTPI48bZO2KNY47pSKD8.jpeg\",\"original_name\":\"1637679553845.jpeg\"}]', NULL, 'test', 1, '2023-05-10 13:34:37', '2023-05-10 13:48:47', '2023-05-10 13:48:47'),
(13, 2, 25, 2, 'customers/May2023/vuXLdNtgNY3TmJ63n2vf.png', '[{\"download_link\":\"customers\\/May2023\\/xir0Lf0Zjy4PejhJG5OB.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '[{\"download_link\":\"customers\\/May2023\\/yLUE38d5GAhJJdgNFjH6.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', NULL, 'test', 1, '2023-05-10 18:14:55', '2023-05-10 18:14:55', NULL),
(14, 3, 30, 2, 'customers/October2023/yBxMh9xkkB9ecv5a0E7V.png', '[{\"download_link\":\"customers\\/October2023\\/f5w9Z8wJ4VStDjokNybo.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '[{\"download_link\":\"customers\\/October2023\\/NF6KSC8oBFZl5xzSJlVe.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', NULL, 'Client test', 3, '2023-10-18 11:22:31', '2023-10-18 11:22:31', NULL),
(15, 5, 31, 1, 'customers/October2023/YeBFM46xOg3802qgtqqg.png', '[{\"download_link\":\"customers\\/October2023\\/RysfWxH20K1p5h83w6pe.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', NULL, NULL, NULL, 1, '2023-10-30 09:43:32', '2023-10-30 09:43:32', NULL),
(16, 6, 32, 2, NULL, '[{\"download_link\":\"customers\\/November2023\\/ks625OufyWK2730XVabb.pdf\",\"original_name\":\"_storage_app_public_documents_mydoc.pdf\"}]', '[{\"download_link\":\"customers\\/November2023\\/qDBb3lTvJiNT8qfz92dd.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126.pdf\"}]', NULL, 'en attente d\'un retour favorable', 4, '2023-11-07 14:01:02', '2023-11-07 14:07:44', NULL),
(17, 8, 33, 2, NULL, '[{\"download_link\":\"customers\\/November2023\\/K2U9LUA7N1UQ2nSiIMqk.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126-1.pdf\"}]', '[{\"download_link\":\"customers\\/November2023\\/dX6G2fV5fuyJEPYPjFSY.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126.pdf\"}]', NULL, 'test', 4, '2023-11-07 15:15:30', '2023-11-07 15:15:30', NULL),
(18, 9, 34, 2, NULL, NULL, NULL, NULL, 'testdg', 3, '2023-11-29 13:00:44', '2023-11-29 13:09:55', '2023-11-29 13:09:55');

-- --------------------------------------------------------

--
-- Structure de la table `customers_contacts_people`
--

CREATE TABLE `customers_contacts_people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `contacts_people_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customers_contacts_people`
--

INSERT INTO `customers_contacts_people` (`id`, `customer_id`, `contacts_people_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 3, NULL, NULL, NULL),
(5, 4, 8, NULL, NULL, NULL),
(7, 1, 10, NULL, NULL, NULL),
(8, 1, 11, NULL, NULL, NULL),
(11, 15, 14, NULL, NULL, NULL),
(12, 16, 15, NULL, NULL, NULL),
(13, 17, 16, NULL, NULL, NULL),
(14, 14, 17, NULL, NULL, NULL),
(16, 18, 19, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `direction_id` bigint(20) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `responsable_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `team_id` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id`, `direction_id`, `libelle`, `description`, `slug`, `created_at`, `updated_at`, `responsable_id`, `statut_id`, `team_id`, `deleted_at`) VALUES
(1, 1, 'Web', '', 'web', '2023-01-16 20:50:55', '2023-01-16 20:51:00', '1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `directions`
--

CREATE TABLE `directions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `departement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `responsable_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `divisions`
--

INSERT INTO `divisions` (`id`, `libelle`, `description`, `created_at`, `updated_at`, `departement_id`, `responsable_id`, `statut_id`) VALUES
(1, 'Direction', 'Division - Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio aliquam dolorum excepturi assumenda earum ipsam reprehenderit molestiae inventore odio blanditiis labore sequi iure, fugit recusandae odit magni provident praesentium nostrum!', '2022-06-28 12:01:00', '2022-08-23 11:31:49', 2, '1', 1),
(2, 'Design web', 'Design cscs', '2022-06-29 10:15:56', '2022-08-23 11:31:43', 1, '3', 1),
(3, 'Marketing', 'Marketing', '2022-06-29 10:20:05', '2022-08-23 11:31:35', 2, '15', 4),
(4, 'Prunes', 'c dcvaz', '2022-07-15 12:38:15', '2022-07-15 12:38:15', 1, '2', 1),
(5, 'Bulldozer', 'HEE EHFV ehce cefe fje efef efefef efe.', '2022-08-23 11:20:48', '2022-08-23 11:20:48', NULL, '15', 1),
(6, 'Ased', 'dad', '2022-09-21 11:49:26', '2022-09-21 11:49:26', NULL, '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dossier_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `reference` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` bigint(20) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `statut_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `team_id` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nature_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `documents`
--

INSERT INTO `documents` (`id`, `dossier_id`, `category_id`, `reference`, `libelle`, `type`, `description`, `document`, `created_at`, `updated_at`, `user_id`, `statut_id`, `team_id`, `created_by`, `deleted_at`, `nature_id`) VALUES
(1, 1, 4, 'CLI/LOGO121111', 'logo', 3, NULL, 'customers/May2023/r621fjNzkWKCSZOawrgs.png', '2023-05-10 13:34:37', '2023-05-10 13:34:37', 1, 1, 1, 1, NULL, NULL),
(2, 1, 4, 'CLI/CONTRAT121111', 'contrat', 3, NULL, '[{\"download_link\":\"customers\\/May2023\\/cUZh50EJD2iiSCkSbFKL.jpeg\",\"original_name\":\"a899368c8666b94af51c9c8f837fa3fe.jpeg\"}]', '2023-05-10 13:34:37', '2023-05-10 13:34:37', 1, 1, 1, 1, NULL, NULL),
(3, 1, 4, 'CLI/NDA121111', 'nda', 3, NULL, '[{\"download_link\":\"customers\\/May2023\\/NTPI48bZO2KNY47pSKD8.jpeg\",\"original_name\":\"1637679553845.jpeg\"}]', '2023-05-10 13:34:37', '2023-05-10 13:34:37', 1, 1, 1, 1, NULL, NULL),
(4, 2, 4, 'PAYS/REGLEMENTATION500000', 'Reglementation', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/3deV1MSBJGyUuqQ8kn4b.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 16:57:40', '2023-05-10 16:57:40', 1, 1, 1, 1, NULL, NULL),
(5, 3, 4, 'PAYS/REGLEMENTATION600000', 'Reglementation', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/48bP2Ujnp0IyGTRq9QMs.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '2023-05-10 16:59:40', '2023-05-10 16:59:40', 1, 1, 1, 1, NULL, NULL),
(6, 4, 4, 'PAYS/DOC/700000', 'Reglementation', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/arfCbHvxeE8bMewTY5yt.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '2023-05-10 17:02:36', '2023-05-10 17:02:36', 1, 1, 1, 1, NULL, NULL),
(7, 4, 4, 'PAYS/DOC/700000', 'Modele de certificat', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/G4vbI07KC5YprbHmnyXP.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:02:36', '2023-05-10 17:02:36', 1, 1, 1, 1, NULL, NULL),
(8, 4, 4, 'PAYS/DOC/700000', 'Formulaire', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/DnmQeXCAyeeIkRd7ZsIN.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:02:36', '2023-05-10 17:02:36', 1, 1, 1, 1, NULL, NULL),
(9, 5, 4, 'PAYS/DOC/800000', 'Reglementation', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/pty7iXNK9vSigoSKbCSA.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '2023-05-10 17:03:39', '2023-05-10 17:03:39', 1, 1, 1, 1, NULL, NULL),
(10, 5, 4, 'PAYS/DOC/800000', 'Modele de certificat', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/sGtKxF48yhkrIpbwuFEg.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:03:39', '2023-05-10 17:03:39', 1, 1, 1, 1, NULL, NULL),
(11, 5, 4, 'PAYS/DOC/800000', 'Formulaire', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/0pZPNQHMWAk4ZXISZXJW.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:03:39', '2023-05-10 17:03:39', 1, 1, 1, 1, NULL, NULL),
(12, 10, 4, 'PAYS/DOC/130000', 'Reglementation', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/I5F3IWuey7SW4Q4EFzIb.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '2023-05-10 17:08:12', '2023-05-10 17:08:12', 1, 1, 1, 1, NULL, NULL),
(13, 11, 4, 'PAYS/DOC/140000', 'Reglementation', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/f6xmINxzk6OxX6Yskm2r.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '2023-05-10 17:08:57', '2023-05-10 17:08:57', 1, 1, 1, 1, NULL, NULL),
(14, 11, 4, 'PAYS/DOC/140000', 'Modele de certificat', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/ijT74PGbGzxXHL8sCWT3.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:08:57', '2023-05-10 17:08:57', 1, 1, 1, 1, NULL, NULL),
(15, 11, 4, 'PAYS/DOC/140000', 'Formulaire', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/RfgxnxfZyHHCVMc39eL9.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:08:57', '2023-05-10 17:08:57', 1, 1, 1, 1, NULL, NULL),
(16, 12, 4, 'PAYS/DOC/150000', 'Reglementation', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/RaAwNvx0VpWNvTT4c8uS.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '2023-05-10 17:09:44', '2023-05-10 17:09:44', 1, 1, 1, 1, NULL, NULL),
(17, 12, 4, 'PAYS/DOC/150000', 'Modele de certificat', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/Uq6DNTFUxnkpK2UIXGt1.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:09:44', '2023-05-10 17:09:44', 1, 1, 1, 1, NULL, NULL),
(18, 12, 4, 'PAYS/DOC/150000', 'Formulaire', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/oIcbngvTO064dD8Z3bm5.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:09:44', '2023-05-10 17:09:44', 1, 1, 1, 1, NULL, NULL),
(19, 13, 4, 'PAYS/DOC/160000', 'Reglementation', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/ulTZwA5sEoHcq4VeEAu6.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '2023-05-10 17:10:37', '2023-05-10 17:10:37', 1, 1, 1, 1, NULL, NULL),
(20, 13, 4, 'PAYS/DOC/160000', 'Modele de certificat', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/DIIlaKlOcgPOCX8rFaWc.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:10:37', '2023-05-10 17:10:37', 1, 1, 1, 1, NULL, NULL),
(21, 13, 4, 'PAYS/DOC/160000', 'Formulaire', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/Ek1RDBL7Dn0GI8WDBklX.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:10:37', '2023-05-10 17:10:37', 1, 1, 1, 1, NULL, NULL),
(22, 14, 4, 'PAYS/DOC/170000', 'Reglementation', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/wc5Zt3hggHT8CUi0sBQk.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '2023-05-10 17:11:56', '2023-05-10 17:11:56', 1, 1, 1, 1, NULL, NULL),
(23, 14, 4, 'PAYS/DOC/170000', 'Modele de certificat', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/CKvJQGwUYzSjqhyHfXBU.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:11:56', '2023-05-10 17:11:56', 1, 1, 1, 1, NULL, NULL),
(24, 14, 4, 'PAYS/DOC/170000', 'Formulaire', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/PFfhFN6Ve8O84cNGTYWT.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:11:56', '2023-05-10 17:11:56', 1, 1, 1, 1, NULL, NULL),
(25, 15, 4, 'PAYS/DOC/180000', 'Reglementation', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/YAmpagSCzgiSeO9Zxpoy.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '2023-05-10 17:12:20', '2023-05-10 17:12:20', 1, 1, 1, 1, NULL, NULL),
(26, 15, 4, 'PAYS/DOC/180000', 'Modele de certificat', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/gQqKug8rf7YYmnOhrgSW.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:12:20', '2023-05-10 17:12:20', 1, 1, 1, 1, NULL, NULL),
(27, 15, 4, 'PAYS/DOC/180000', 'Formulaire', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/1Kf07v5NLJH5he1rddzD.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:12:20', '2023-05-10 17:12:20', 1, 1, 1, 1, NULL, NULL),
(28, 15, 4, 'PAYS/DOC/180000', 'Autre Document 0', 3, NULL, '[{\"download_link\":\"certificats\\/May2023\\/hc12fyQT1tPtsMM6KHO5.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:12:20', '2023-05-10 17:12:20', 1, 1, 1, 1, NULL, NULL),
(29, 16, 4, 'EQPMT/IMAGE140000', 'image', 3, NULL, 'products/May2023/j6sCVuqG5TCLIKDug7uz.jpeg', '2023-05-10 17:38:02', '2023-05-10 17:38:02', 1, 1, 1, 1, NULL, NULL),
(30, 16, 4, 'EQPMT/RAPPORT-RF140000', 'Rapport RF', 3, NULL, '[{\"download_link\":\"products\\/May2023\\/V59V1l8F3tsLEv3MP4m6.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:38:02', '2023-05-10 17:38:02', 1, 1, 1, 1, NULL, NULL),
(31, 17, 4, 'EQPMT/IMAGE150000', 'image', 3, NULL, 'products/May2023/dYY8UHxP14ePuLEVaao9.jpeg', '2023-05-10 17:42:00', '2023-05-10 17:42:00', 1, 1, 1, 1, NULL, NULL),
(32, 17, 4, 'EQPMT/RAPPORT-RF150000', 'Rapport RF', 3, NULL, '[{\"download_link\":\"products\\/May2023\\/3L9cGk9amuIigM9F2u2A.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:42:00', '2023-05-10 17:42:00', 1, 1, 1, 1, NULL, NULL),
(33, 18, 4, 'EQPMT/DOC/160000', 'image', 3, NULL, 'products/May2023/K8WDDCtC8pgHUJKhYi9L.jpeg', '2023-05-10 17:44:27', '2023-05-10 17:44:27', 1, 1, 1, 1, NULL, NULL),
(34, 18, 4, 'EQPMT/DOC/160000', 'Rapport RF', 3, NULL, '[{\"download_link\":\"products\\/May2023\\/cdTlGRhrlHHytvmvS9go.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:44:27', '2023-05-10 17:44:27', 1, 1, 1, 1, NULL, NULL),
(35, 18, 4, 'EQPMT/DOC/160000', 'Rapport Safety', 3, NULL, '[{\"download_link\":\"products\\/May2023\\/NnccoGi58adpg3R90eu7.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:44:27', '2023-05-10 17:44:27', 1, 1, 1, 1, NULL, NULL),
(36, 18, 4, 'EQPMT/DOC/160000', 'Rapport EMC', 3, NULL, '[{\"download_link\":\"products\\/May2023\\/kCT2Cjwpd6EGUb6VtZH1.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '2023-05-10 17:44:27', '2023-05-10 17:44:27', 1, 1, 1, 1, NULL, NULL),
(37, 18, 4, 'EQPMT/DOC/160000', 'Rapport SAR', 3, NULL, '[{\"download_link\":\"products\\/May2023\\/aSlCVp1f2Tj6T9U5zqnX.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:44:27', '2023-05-10 17:44:27', 1, 1, 1, 1, NULL, NULL),
(38, 18, 4, 'EQPMT/DOC/160000', 'Declaration de conformité', 3, NULL, '[{\"download_link\":\"products\\/May2023\\/5xVlOTA9bY2hDN6bULDt.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 17:44:27', '2023-05-10 17:44:27', 1, 1, 1, 1, NULL, NULL),
(39, 18, 4, 'EQPMT/DOC/160000', 'Autre Rapport 0', 3, NULL, '[{\"download_link\":\"products\\/May2023\\/UH7CE3537TowYVlWgCyf.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '2023-05-10 17:44:27', '2023-05-10 17:44:27', 1, 1, 1, 1, NULL, NULL),
(40, 19, NULL, 'CLI/DOC/130000', 'logo', NULL, 'le logo du client', 'customers/May2023/vuXLdNtgNY3TmJ63n2vf.png', '2023-05-10 18:14:55', '2023-05-14 14:20:54', 1, 1, 1, 1, NULL, 1),
(41, 19, 4, 'CLI/DOC/130000', 'contrat', 3, NULL, '[{\"download_link\":\"customers\\/May2023\\/xir0Lf0Zjy4PejhJG5OB.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '2023-05-10 18:14:55', '2023-05-10 18:14:55', 1, 1, 1, 1, NULL, NULL),
(42, 19, 4, 'CLI/DOC/130000', 'nda', 3, NULL, '[{\"download_link\":\"customers\\/May2023\\/yLUE38d5GAhJJdgNFjH6.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '2023-05-10 18:14:55', '2023-05-10 18:14:55', 1, 1, 1, 1, NULL, NULL),
(43, 20, 4, 'AG/CS/AG/JO/20230513/0003', 'CV de jacky', 3, NULL, '[{\"download_link\":\"documents\\/May2023\\/ndPbBO1vLYCIHUKW4Bni.pdf\",\"original_name\":\"Avis officiel d\'appel a\\u0300 candidature du concours du SG au Nume\\u0301rique.pdf\"}]', '2023-05-13 16:51:57', '2023-05-13 16:51:57', 1, 1, 1, 1, NULL, NULL),
(44, 21, 4, 'AG/CS/AG/JO/20230513/0006', 'CV de jacky', 3, NULL, '[{\"download_link\":\"documents\\/May2023\\/beG2Ex9yn3YaG3SsGqom.pdf\",\"original_name\":\"Avis officiel d\'appel a\\u0300 candidature du concours du SG au Nume\\u0301rique.pdf\"}]', '2023-05-13 16:57:06', '2023-05-13 16:57:06', 1, 1, 1, 1, NULL, NULL),
(45, 23, NULL, 'REF16930', 'Une facture', NULL, NULL, '[{\"download_link\":\"documents\\/June2023\\/ZAL1Bbd4XScLR26nPmQW.pdf\",\"original_name\":\"Pharmans ERP.pdf\"}]', '2023-06-20 16:31:30', '2023-06-20 16:32:49', 1, 6, 3, 1, NULL, 1),
(46, 24, 4, 'TACHE/3/30/06/2023', 'Juste un test', 3, NULL, '[{\"download_link\":\"documents\\/July2023\\/IAtXULQRq3zvDQR6oKnK.pdf\",\"original_name\":\"facture.pdf\"}]', '2023-07-02 20:44:17', '2023-07-02 20:44:17', 2, 1, 3, 2, NULL, NULL),
(47, 25, 4, 'CLI/DOC/300000', 'logo', 3, NULL, 'customers/October2023/yBxMh9xkkB9ecv5a0E7V.png', '2023-10-18 11:22:33', '2023-10-18 11:22:33', 2, 1, 3, 2, NULL, NULL),
(48, 25, 4, 'CLI/DOC/400000', 'contrat', 3, NULL, '[{\"download_link\":\"customers\\/October2023\\/f5w9Z8wJ4VStDjokNybo.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '2023-10-18 11:22:33', '2023-10-18 11:22:33', 2, 1, 3, 2, NULL, NULL),
(49, 25, 4, 'CLI/DOC/500000', 'nda', 3, NULL, '[{\"download_link\":\"customers\\/October2023\\/NF6KSC8oBFZl5xzSJlVe.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '2023-10-18 11:22:33', '2023-10-18 11:22:33', 2, 1, 3, 2, NULL, NULL),
(50, 26, 4, 'EQPMT/DOC/600000', 'image', 3, NULL, 'products/October2023/zOUG2vB57asrkRX6PcM4.png', '2023-10-18 11:29:17', '2023-10-18 11:29:17', 2, 1, 3, 2, NULL, NULL),
(51, 26, 4, 'EQPMT/DOC/700000', 'Rapport RF', 3, NULL, '[{\"download_link\":\"products\\/October2023\\/MfcAXghUr3Gci2qsMmzc.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '2023-10-18 11:29:17', '2023-10-18 11:29:17', 2, 1, 3, 2, NULL, NULL),
(52, 26, 4, 'EQPMT/DOC/800000', 'Rapport Safety', 3, NULL, '[{\"download_link\":\"products\\/October2023\\/yluACQV4fudtDKc8kk9P.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '2023-10-18 11:29:17', '2023-10-18 11:29:17', 2, 1, 3, 2, NULL, NULL),
(53, 26, 4, 'EQPMT/DOC/900000', 'Rapport EMC', 3, NULL, '[{\"download_link\":\"products\\/October2023\\/yu1KrjbJx5NmMabXQWQR.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '2023-10-18 11:29:17', '2023-10-18 11:29:17', 2, 1, 3, 2, NULL, NULL),
(54, 26, 4, 'EQPMT/DOC/100000', 'Rapport SAR', 3, NULL, '[{\"download_link\":\"products\\/October2023\\/DaQA9HdzXGsAKKBFKDyu.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '2023-10-18 11:29:17', '2023-10-18 11:29:17', 2, 1, 3, 2, NULL, NULL),
(55, 26, 4, 'EQPMT/DOC/110000', 'Declaration de conformité', 3, NULL, '[{\"download_link\":\"products\\/October2023\\/EnCSP68IFMztspp2GLbo.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '2023-10-18 11:29:17', '2023-10-18 11:29:17', 2, 1, 3, 2, NULL, NULL),
(56, 26, 4, 'EQPMT/DOC/120000', 'Autre Rapport 0', 3, NULL, '[{\"download_link\":\"products\\/October2023\\/fi5G3uGrfoLcwwvxtOsn.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '2023-10-18 11:29:17', '2023-10-18 11:29:17', 2, 1, 3, 2, NULL, NULL),
(57, 27, 4, 'PAYS/DOC/130000', 'Reglementation', 3, NULL, '[{\"download_link\":\"certificats\\/October2023\\/BqYT043Meur7NoWj7l7w.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '2023-10-18 11:37:06', '2023-10-18 11:37:06', 2, 1, 3, 2, NULL, NULL),
(58, 27, 4, 'PAYS/DOC/140000', 'Modele de certificat', 3, NULL, '[{\"download_link\":\"certificats\\/October2023\\/NRqK0eTMoAZzrAuN3OQ1.pdf\",\"original_name\":\"F2BC-RDC.50-Gestion-et-traitement-des-dechets-solides-dans-la-ville-de-Kinshasa.pdf\"}]', '2023-10-18 11:37:06', '2023-10-18 11:37:06', 2, 1, 3, 2, NULL, NULL),
(59, 27, 4, 'PAYS/DOC/150000', 'Formulaire', 3, NULL, '[{\"download_link\":\"certificats\\/October2023\\/2fDRsBRU8o1iOM9pKttK.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '2023-10-18 11:37:06', '2023-10-18 11:37:06', 2, 1, 3, 2, NULL, NULL),
(60, 27, 4, 'PAYS/DOC/160000', 'Autre Document 0', 3, NULL, '[{\"download_link\":\"certificats\\/October2023\\/Kpzg2YezpyO0RC50lAQU.pdf\",\"original_name\":\"F2BC-RDC.50-Gestion-et-traitement-des-dechets-solides-dans-la-ville-de-Kinshasa.pdf\"}]', '2023-10-18 11:37:06', '2023-10-18 11:37:06', 2, 1, 3, 2, NULL, NULL),
(61, 28, 4, 'CLI/DOC/450000', 'logo', 3, NULL, 'customers/October2023/YeBFM46xOg3802qgtqqg.png', '2023-10-30 09:43:34', '2023-10-30 09:43:34', 1, 1, 1, 1, NULL, NULL),
(62, 28, 4, 'CLI/DOC/460000', 'contrat', 3, NULL, '[{\"download_link\":\"customers\\/October2023\\/RysfWxH20K1p5h83w6pe.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '2023-10-30 09:43:34', '2023-10-30 09:43:34', 1, 1, 1, 1, NULL, NULL),
(63, 29, 4, 'EQPMT/DOC/470000', 'image', 3, NULL, 'products/October2023/hCnY9abbD7ztVrmAAhId.png', '2023-10-30 10:25:03', '2023-10-30 10:25:03', 1, 1, 1, 1, NULL, NULL),
(64, 29, 4, 'EQPMT/DOC/480000', 'Rapport RF', 3, NULL, '[{\"download_link\":\"products\\/October2023\\/J0GEOYWiZas99YvkS5Ei.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '2023-10-30 10:25:04', '2023-10-30 10:25:04', 1, 1, 1, 1, NULL, NULL),
(65, 29, 4, 'EQPMT/DOC/490000', 'Rapport Safety', 3, NULL, '[{\"download_link\":\"products\\/October2023\\/tw9qlOCQZbnsFFQPZjCj.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '2023-10-30 10:25:04', '2023-10-30 10:25:04', 1, 1, 1, 1, NULL, NULL),
(66, 29, 4, 'EQPMT/DOC/500000', 'Rapport EMC', 3, NULL, '[{\"download_link\":\"products\\/October2023\\/CWbJo9tOUepQIFbt0HC4.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '2023-10-30 10:25:04', '2023-10-30 10:25:04', 1, 1, 1, 1, NULL, NULL),
(67, 29, 4, 'EQPMT/DOC/510000', 'Rapport SAR', 3, NULL, '[{\"download_link\":\"products\\/October2023\\/nmDP6Sxv0myFhUIcgeYU.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '2023-10-30 10:25:04', '2023-10-30 10:25:04', 1, 1, 1, 1, NULL, NULL),
(68, 29, 4, 'EQPMT/DOC/520000', 'Declaration de conformité', 3, NULL, '[{\"download_link\":\"products\\/October2023\\/lhNyCFW9xFiTi6l4b8Du.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '2023-10-30 10:25:04', '2023-10-30 10:25:04', 1, 1, 1, 1, NULL, NULL),
(69, 29, 4, 'EQPMT/DOC/530000', 'Autre Rapport 0', 3, NULL, '[{\"download_link\":\"products\\/October2023\\/vXGxloIES7dFHL8JsanE.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '2023-10-30 10:25:04', '2023-10-30 10:25:04', 1, 1, 1, 1, NULL, NULL),
(70, 30, 4, 'PAYS/DOC/540000', 'Reglementation', 3, NULL, '[{\"download_link\":\"certificats\\/October2023\\/tcKa1UI1iLDkXK3jiqOP.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '2023-10-30 10:29:38', '2023-10-30 10:29:38', 1, 1, 1, 1, NULL, NULL),
(71, 30, 4, 'PAYS/DOC/550000', 'Modele de certificat', 3, NULL, '[{\"download_link\":\"certificats\\/October2023\\/0n7Mz92czYd91TClvMVb.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '2023-10-30 10:29:39', '2023-10-30 10:29:39', 1, 1, 1, 1, NULL, NULL),
(72, 30, 4, 'PAYS/DOC/560000', 'Formulaire', 3, NULL, '[{\"download_link\":\"certificats\\/October2023\\/1CXOIFkeEoxAmtFnlJQX.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '2023-10-30 10:29:39', '2023-10-30 10:29:39', 1, 1, 1, 1, NULL, NULL),
(73, 30, 4, 'PAYS/DOC/570000', 'Autre Document 0', 3, NULL, '[{\"download_link\":\"certificats\\/October2023\\/Jrjijv8cayrs1iMmx9AK.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '2023-10-30 10:29:39', '2023-10-30 10:29:39', 1, 1, 1, 1, NULL, NULL),
(74, 31, 4, 'EQPMT/DOC/100000', 'Rapport RF', 3, NULL, '[{\"download_link\":\"products\\/November2023\\/D3eQb18Wa5SUuLOjw1bq.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126.pdf\"}]', '2023-11-07 14:19:29', '2023-11-07 14:19:29', 1, 1, 4, 1, NULL, NULL),
(75, 31, 4, 'EQPMT/DOC/200000', 'Rapport Safety', 3, NULL, '[{\"download_link\":\"products\\/November2023\\/fp0C3SqRGcsX8XSaAbXL.pdf\",\"original_name\":\"230821MISE A JOUR ET DEVELOPPEMENT BLUE APP V.04.pdf\"}]', '2023-11-07 14:19:29', '2023-11-07 14:19:29', 1, 1, 4, 1, NULL, NULL),
(76, 31, 4, 'EQPMT/DOC/300000', 'Rapport EMC', 3, NULL, '[{\"download_link\":\"products\\/November2023\\/2lXoIjSvpURSHhv2HWoh.pdf\",\"original_name\":\"authentification unkin en-1.pdf\"}]', '2023-11-07 14:19:29', '2023-11-07 14:19:29', 1, 1, 4, 1, NULL, NULL),
(77, 32, 4, 'PAYS/DOC/400000', 'Modele de certificat', 3, NULL, '[{\"download_link\":\"certificats\\/November2023\\/s1uOjeLe2erb84gJCx5Z.pdf\",\"original_name\":\"Af19BRLgYemBzYo0D7VZ.pdf\"}]', '2023-11-07 14:24:38', '2023-11-07 14:24:38', 1, 1, 4, 1, NULL, NULL),
(78, 32, 4, 'PAYS/DOC/500000', 'Formulaire', 3, NULL, '[{\"download_link\":\"certificats\\/November2023\\/5rGv6LR7lfvKUBZl8WLk.pdf\",\"original_name\":\"Af19BRLgYemBzYo0D7VZ.pdf\"}]', '2023-11-07 14:24:38', '2023-11-07 14:24:38', 1, 1, 4, 1, NULL, NULL),
(79, 33, 4, 'PAYS/DOC/600000', 'Modele de certificat', 3, NULL, '[{\"download_link\":\"certificats\\/November2023\\/0qPmACsomm9gZaEEElWz.pdf\",\"original_name\":\"230821MISE A JOUR ET DEVELOPPEMENT BLUE APP V.04.pdf\"}]', '2023-11-07 14:36:07', '2023-11-07 14:36:07', 1, 1, 4, 1, NULL, NULL),
(80, 33, 4, 'PAYS/DOC/700000', 'Formulaire', 3, NULL, '[{\"download_link\":\"certificats\\/November2023\\/ooRDLfqo2gW5gpW8ykVJ.pdf\",\"original_name\":\"Af19BRLgYemBzYo0D7VZ.pdf\"}]', '2023-11-07 14:36:07', '2023-11-07 14:36:07', 1, 1, 4, 1, NULL, NULL),
(81, 34, 4, 'CLI/DOC/800000', 'contrat', 3, NULL, '[{\"download_link\":\"customers\\/November2023\\/K2U9LUA7N1UQ2nSiIMqk.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126-1.pdf\"}]', '2023-11-07 15:15:31', '2023-11-07 15:15:31', 1, 1, 4, 1, NULL, NULL),
(82, 34, 4, 'CLI/DOC/900000', 'nda', 3, NULL, '[{\"download_link\":\"customers\\/November2023\\/dX6G2fV5fuyJEPYPjFSY.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126.pdf\"}]', '2023-11-07 15:15:32', '2023-11-07 15:15:32', 1, 1, 4, 1, NULL, NULL),
(83, 35, 4, 'EQPMT/DOC/100000', 'Rapport RF', 3, NULL, '[{\"download_link\":\"products\\/November2023\\/Kbj1WUhA1KEYOKfV4Fva.pdf\",\"original_name\":\"_storage_app_public_documents_mydoc.pdf\"}]', '2023-11-07 15:26:01', '2023-11-07 15:26:01', 1, 1, 4, 1, NULL, NULL),
(84, 35, 4, 'EQPMT/DOC/110000', 'Rapport Safety', 3, NULL, '[{\"download_link\":\"products\\/November2023\\/hDtIINsykj12147F18sZ.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126.pdf\"}]', '2023-11-07 15:26:01', '2023-11-07 15:26:01', 1, 1, 4, 1, NULL, NULL),
(85, 35, 4, 'EQPMT/DOC/120000', 'Rapport EMC', 3, NULL, '[{\"download_link\":\"products\\/November2023\\/MxSTlCDoZ8TerlyMm83B.pdf\",\"original_name\":\"_storage_app_public_documents_mydoc.pdf\"}]', '2023-11-07 15:26:01', '2023-11-07 15:26:01', 1, 1, 4, 1, NULL, NULL),
(86, 35, 4, 'EQPMT/DOC/130000', 'Rapport SAR', 3, NULL, '[{\"download_link\":\"products\\/November2023\\/RiA62ifePIm27sanqEHX.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126-1.pdf\"}]', '2023-11-07 15:26:01', '2023-11-07 15:26:01', 1, 1, 4, 1, NULL, NULL),
(87, 35, 4, 'EQPMT/DOC/140000', 'Declaration de conformité', 3, NULL, '[{\"download_link\":\"products\\/November2023\\/aqUEs7XJKLmRi7H55UKY.pdf\",\"original_name\":\"authentification unkin en.pdf\"}]', '2023-11-07 15:26:01', '2023-11-07 15:26:01', 1, 1, 4, 1, NULL, NULL),
(88, 35, 4, 'EQPMT/DOC/150000', 'Autre Rapport 0', 3, NULL, '[{\"download_link\":\"products\\/November2023\\/j4yj1JCGVpH14jKdC2ry.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126.pdf\"}]', '2023-11-07 15:26:01', '2023-11-07 15:26:01', 1, 1, 4, 1, NULL, NULL),
(89, 36, 4, 'PAYS/DOC/160000', 'Reglementation', 3, NULL, '[{\"download_link\":\"certificats\\/November2023\\/OWjegYz09aJMCfQ9OMrl.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126-1.pdf\"}]', '2023-11-07 15:34:17', '2023-11-07 15:34:17', 1, 1, 4, 1, NULL, NULL),
(90, 36, 4, 'PAYS/DOC/170000', 'Modele de certificat', 3, NULL, '[{\"download_link\":\"certificats\\/November2023\\/oXjYww64bWR0iFSmPC3m.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126.pdf\"}]', '2023-11-07 15:34:17', '2023-11-07 15:34:17', 1, 1, 4, 1, NULL, NULL),
(91, 36, 4, 'PAYS/DOC/180000', 'Formulaire', 3, NULL, '[{\"download_link\":\"certificats\\/November2023\\/6nKRdwMGRVIqbE0Y5Ht2.pdf\",\"original_name\":\"230821MISE A JOUR ET DEVELOPPEMENT BLUE APP V.04.pdf\"}]', '2023-11-07 15:34:17', '2023-11-07 15:34:17', 1, 1, 4, 1, NULL, NULL),
(92, 37, 4, 'AG/MAT0001', 'CV John Doe', 3, NULL, '[{\"download_link\":\"documents\\/November2023\\/em134WAFlkj9WvxStjbn.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126-1.pdf\"}]', '2023-11-29 14:29:38', '2023-11-29 14:29:38', 2, 1, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `document_followers`
--

CREATE TABLE `document_followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) DEFAULT NULL,
  `agent_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `document_natures`
--

CREATE TABLE `document_natures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `team_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `document_natures`
--

INSERT INTO `document_natures` (`id`, `titre`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lettre ordinaire', 3, '2022-11-07 22:52:27', '2022-11-07 22:52:27', NULL),
(2, 'Lettre administrative', 1, '2022-11-07 22:52:27', '2022-11-07 22:52:27', NULL),
(3, 'Lettre amicale', 1, '2022-11-07 22:53:55', '2022-11-07 22:53:55', NULL),
(4, 'Lettre officielle', 1, '2022-11-07 22:53:55', '2022-11-07 22:53:55', NULL),
(5, 'Lettre administrative', 1, '2022-11-07 22:53:55', '2022-11-07 22:53:55', NULL),
(6, 'Lettre commerciale', 1, '2022-11-07 22:53:55', '2022-11-07 22:53:55', NULL),
(7, 'Lettre professionnelle', 1, '2022-11-07 22:53:55', '2022-11-07 22:53:55', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `document_notes`
--

CREATE TABLE `document_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `note` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `document_statuts`
--

CREATE TABLE `document_statuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `team_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `document_types`
--

INSERT INTO `document_types` (`id`, `titre`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Entrant', NULL, '2022-11-10 12:36:35', '2022-11-10 12:36:35', NULL),
(5, 'Sortant', NULL, '2022-11-10 12:36:35', '2022-11-10 12:36:35', NULL),
(6, 'Interne', NULL, '2022-11-14 14:13:24', '2022-11-14 14:13:24', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `dossiers`
--

CREATE TABLE `dossiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classeur_id` bigint(20) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `confidentiel` int(11) DEFAULT '0',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `team_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dossiers`
--

INSERT INTO `dossiers` (`id`, `classeur_id`, `reference`, `titre`, `description`, `confidentiel`, `created_by`, `updated_by`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'CLI/121111', 'Dossier du client Conftech SA', 'Dossier pour les documents cursus de l\'agent Conftech SA', 0, 1, 1, 1, '2023-05-10 13:34:37', '2023-05-10 13:34:37', NULL),
(2, 2, 'PAYS/500000', 'Dossier du pays : Congo (Brazzaville)', 'Dossier pour les documents du pays : Congo (Brazzaville)', 0, 1, 1, 1, '2023-05-10 16:57:40', '2023-05-10 16:57:40', NULL),
(3, 2, 'PAYS/600000', 'Dossier du pays : Congo (Brazzaville)', 'Dossier pour les documents du pays : Congo (Brazzaville)', 0, 1, 1, 1, '2023-05-10 16:59:40', '2023-05-10 16:59:40', NULL),
(4, 2, 'PAYS/700000', 'Dossier du pays : Congo (Brazzaville)', 'Dossier pour les documents du pays : Congo (Brazzaville)', 0, 1, 1, 1, '2023-05-10 17:02:36', '2023-05-10 17:02:36', NULL),
(5, 2, 'PAYS/800000', 'Dossier du pays : Congo (Brazzaville)', 'Dossier pour les documents du pays : Congo (Brazzaville)', 0, 1, 1, 1, '2023-05-10 17:03:39', '2023-05-10 17:03:39', NULL),
(6, 2, 'PAYS/900000', 'Dossier du pays : Congo (Brazzaville)', 'Dossier pour les documents du pays : Congo (Brazzaville)', 0, 1, 1, 1, '2023-05-10 17:05:24', '2023-05-10 17:05:24', NULL),
(7, 2, 'PAYS/100000', 'Dossier du pays : Congo (Brazzaville)', 'Dossier pour les documents du pays : Congo (Brazzaville)', 0, 1, 1, 1, '2023-05-10 17:05:53', '2023-05-10 17:05:53', NULL),
(8, 2, 'PAYS/110000', 'Dossier du pays : Congo (Brazzaville)', 'Dossier pour les documents du pays : Congo (Brazzaville)', 0, 1, 1, 1, '2023-05-10 17:06:09', '2023-05-10 17:06:09', NULL),
(9, 2, 'PAYS/120000', 'Dossier du pays : Congo (Brazzaville)', 'Dossier pour les documents du pays : Congo (Brazzaville)', 0, 1, 1, 1, '2023-05-10 17:07:24', '2023-05-10 17:07:24', NULL),
(10, 2, 'PAYS/130000', 'Dossier du pays : Congo (Brazzaville)', 'Dossier pour les documents du pays : Congo (Brazzaville)', 0, 1, 1, 1, '2023-05-10 17:08:12', '2023-05-10 17:08:12', NULL),
(11, 2, 'PAYS/140000', 'Dossier du pays : Congo (Brazzaville)', 'Dossier pour les documents du pays : Congo (Brazzaville)', 0, 1, 1, 1, '2023-05-10 17:08:57', '2023-05-10 17:08:57', NULL),
(12, 2, 'PAYS/150000', 'Dossier du pays : Congo (Brazzaville)', 'Dossier pour les documents du pays : Congo (Brazzaville)', 0, 1, 1, 1, '2023-05-10 17:09:44', '2023-05-10 17:09:44', NULL),
(13, 2, 'PAYS/160000', 'Dossier du pays : Congo (Brazzaville)', 'Dossier pour les documents du pays : Congo (Brazzaville)', 0, 1, 1, 1, '2023-05-10 17:10:37', '2023-05-10 17:10:37', NULL),
(14, 2, 'PAYS/170000', 'Dossier du pays : Congo (Brazzaville)', 'Dossier pour les documents du pays : Congo (Brazzaville)', 0, 1, 1, 1, '2023-05-10 17:11:56', '2023-05-10 17:11:56', NULL),
(15, 2, 'PAYS/180000', 'Dossier du pays : Congo (Brazzaville)', 'Dossier pour les documents du pays : Congo (Brazzaville)', 0, 1, 1, 1, '2023-05-10 17:12:20', '2023-05-10 17:12:20', NULL),
(16, 3, 'EQPMT/140000', 'Dossier de l\'équipement : Modem 4G', 'Dossier pour les documents de l\'équipement : Modem 4G', 0, 1, 1, 1, '2023-05-10 17:38:02', '2023-05-10 17:38:02', NULL),
(17, 3, 'EQPMT/150000', 'Dossier de l\'équipement : Routeur', 'Dossier pour les documents de l\'équipement : Routeur', 0, 1, 1, 1, '2023-05-10 17:42:00', '2023-05-10 17:42:00', NULL),
(18, 3, 'EQPMT/160000', 'Dossier de l\'équipement : Routeur', 'Dossier pour les documents de l\'équipement : Routeur', 0, 1, 1, 1, '2023-05-10 17:44:27', '2023-05-10 17:44:27', NULL),
(19, 4, 'CLI/130000', 'Dossier du client Conftech SA', 'Dossier pour les documents cursus de l\'agent Conftech SA', 0, 1, 1, 1, '2023-05-10 18:14:55', '2023-05-10 18:14:55', NULL),
(20, 5, 'AG/CS/AG/JO/20230513/0003', 'Dossier de l\'agent Otamba', 'Dossier pour les documents cursus de l\'agent Otamba', 0, 1, 1, 1, '2023-05-13 16:51:57', '2023-05-13 16:51:57', NULL),
(21, 5, 'AG/CS/AG/JO/20230513/0006', 'Dossier de l\'agent Otamba', 'Dossier pour les documents cursus de l\'agent Otamba', 0, 1, 1, 1, '2023-05-13 16:57:06', '2023-05-13 16:57:06', NULL),
(22, 6, 'REF/09679', 'Agent  JL', NULL, 1, 1, 1, 3, '2023-06-20 16:28:24', '2023-06-20 16:28:24', NULL),
(23, 6, 'REF/096693', 'refdhf', NULL, NULL, 1, 1, 3, '2023-06-20 16:29:44', '2023-06-20 16:29:44', NULL),
(24, 7, 'TACHE/30/06/2023', 'Dossier du tâche : Juste un test', 'Dossier pour les documents en rapport avec la gestion du tâche : Juste un test', 0, 2, 2, 3, '2023-07-02 20:42:47', '2023-07-02 20:42:47', NULL),
(25, 8, 'CLI/140000', 'Dossier du client CTC', 'Dossier pour les documents cursus de l\'agent CTC', 0, 2, 2, 3, '2023-10-18 11:22:33', '2023-10-18 11:22:33', NULL),
(26, 9, 'EQPMT/170000', 'Dossier de l\'équipement : Modem 4G', 'Dossier pour les documents de l\'équipement : Modem 4G', 0, 2, 2, 3, '2023-10-18 11:29:17', '2023-10-18 11:29:17', NULL),
(27, 10, 'PAYS/190000', 'Dossier du pays : Congo (Kinshasa)', 'Dossier pour les documents du pays : Congo (Kinshasa)', 0, 2, 2, 3, '2023-10-18 11:37:06', '2023-10-18 11:37:06', NULL),
(28, 11, 'CLI/150000', 'Dossier du client NewTech', 'Dossier pour les documents cursus de l\'agent NewTech', 0, 1, 1, 1, '2023-10-30 09:43:34', '2023-10-30 09:43:34', NULL),
(29, 12, 'EQPMT/180000', 'Dossier de l\'équipement : LG', 'Dossier pour les documents de l\'équipement : LG', 0, 1, 1, 1, '2023-10-30 10:25:03', '2023-10-30 10:25:03', NULL),
(30, 13, 'PAYS/200000', 'Dossier du pays : Samoa', 'Dossier pour les documents du pays : Samoa', 0, 1, 1, 1, '2023-10-30 10:29:38', '2023-10-30 10:29:38', NULL),
(31, 14, 'EQPMT/190000', 'Dossier de l\'équipement : lg inc', 'Dossier pour les documents de l\'équipement : lg inc', 0, 1, 1, 4, '2023-11-07 14:19:29', '2023-11-07 14:19:29', NULL),
(32, 15, 'PAYS/210000', 'Dossier du pays : Angola', 'Dossier pour les documents du pays : Angola', 0, 1, 1, 4, '2023-11-07 14:24:38', '2023-11-07 14:24:38', NULL),
(33, 15, 'PAYS/220000', 'Dossier du pays : Zambie', 'Dossier pour les documents du pays : Zambie', 0, 1, 1, 4, '2023-11-07 14:36:07', '2023-11-07 14:36:07', NULL),
(34, 16, 'CLI/170000', 'Dossier du client NewTech', 'Dossier pour les documents cursus de l\'agent NewTech', 0, 1, 1, 4, '2023-11-07 15:15:31', '2023-11-07 15:15:31', NULL),
(35, 14, 'EQPMT/200000', 'Dossier de l\'équipement : hwawei', 'Dossier pour les documents de l\'équipement : hwawei', 0, 1, 1, 4, '2023-11-07 15:26:01', '2023-11-07 15:26:01', NULL),
(36, 15, 'PAYS/230000', 'Dossier du pays : Argentine', 'Dossier pour les documents du pays : Argentine', 0, 1, 1, 4, '2023-11-07 15:34:17', '2023-11-07 15:34:17', NULL),
(37, 17, 'AG/MAT0001', 'Dossier de l\'agent Doe 2', 'Dossier pour les documents cursus de l\'agent Doe 2', 0, 2, 2, 3, '2023-11-29 14:29:36', '2023-11-29 14:29:36', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `dossier_passwords`
--

CREATE TABLE `dossier_passwords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dossier_id` bigint(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dossier_passwords`
--

INSERT INTO `dossier_passwords` (`id`, `dossier_id`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10, '$2y$10$luHEM.itIBs8y63dwjDRv.oo2sH7KwHHeb2k8bd9j42HYyg.mfOdu', '2023-03-25 14:23:12', '2023-03-25 14:23:12', NULL),
(2, 22, '$2y$10$pI0Bo6PL38jIK2S0xuWZr.cWg0tHkiFzp4LXh6m1Mhk5h/v/7EMM.', '2023-06-20 16:28:24', '2023-06-20 16:28:24', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

CREATE TABLE `etats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `statut_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`id`, `libelle`, `created_at`, `updated_at`, `user_id`, `statut_id`) VALUES
(1, 'Priorité absolu', '2022-07-04 14:06:19', '2022-07-04 14:06:19', 1, 1),
(2, 'Urgent', '2022-07-04 14:06:19', '2022-07-04 14:06:19', 1, 1),
(3, 'Normal', '2022-07-04 14:06:19', '2022-07-04 14:06:19', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `compte_id` bigint(20) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `date_limit_paie` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `total_net` double DEFAULT NULL,
  `statut_id` bigint(20) DEFAULT NULL,
  `team_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id`, `compte_id`, `customer_id`, `date_limit_paie`, `total`, `tax`, `total_net`, `statut_id`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 13, '2022-12-28', 1250, 1450, 1450, 1, 1, '2022-12-27 22:07:31', '2022-12-27 22:07:31', NULL),
(4, 1, 13, '2023-03-08', 850, 986, 986, 2, 1, '2023-03-07 00:25:00', '2023-03-07 00:25:01', NULL),
(5, 1, 13, '2023-03-08', 850, 986, 986, 3, 1, '2023-03-07 00:29:20', '2023-03-25 13:59:02', NULL),
(6, 1, 13, '2023-03-23', 850, 850, 850, 3, 1, '2023-03-07 02:35:18', '2023-03-07 03:04:22', NULL),
(7, 1, 13, '2023-03-27', 1250, 1450, 1450, 2, 1, '2023-03-25 14:03:24', '2023-03-25 14:03:24', NULL),
(8, 2, 13, '2023-08-03', 200, 200, 200, 3, 1, '2023-08-03 12:35:05', '2023-08-05 14:52:12', NULL),
(9, 1, 15, '2023-10-31', 600, 600, 600, 1, NULL, '2023-10-30 11:11:05', '2023-10-30 11:11:05', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `factures_statuts`
--

CREATE TABLE `factures_statuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `factures_statuts`
--

INSERT INTO `factures_statuts` (`id`, `titre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'En attente', '2022-12-27 23:58:31', '2022-12-27 23:58:31', NULL),
(2, 'Avance', '2022-12-27 23:58:31', '2022-12-27 23:58:31', NULL),
(3, 'Payée', '2022-12-28 00:00:56', '2022-12-28 00:00:56', NULL),
(4, 'Expirée', '2022-12-28 00:00:56', '2022-12-28 00:00:56', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fichiers`
--

CREATE TABLE `fichiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tache_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `statut_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

CREATE TABLE `fonctions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` bigint(20) DEFAULT NULL,
  `classification_id` bigint(20) DEFAULT NULL,
  `service_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text,
  `direction_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fonctions`
--

INSERT INTO `fonctions` (`id`, `departement_id`, `classification_id`, `service_id`, `category_id`, `titre`, `description`, `direction_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, 'Développeur full Stark', NULL, 1, '2023-01-16 20:48:06', '2023-01-16 20:48:06', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2023_04_15_181514_create_sessions_table', 1),
(10, '2023_04_15_191658_create_permission_tables', 2),
(11, '2023_04_15_201346_create_tasks_table', 3),
(12, '2023_04_16_022500_add_teams_fields', 3),
(13, '2023_06_30_133821_create_jobs_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `modalites`
--

CREATE TABLE `modalites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `renewal_price` float DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modalites`
--

INSERT INTO `modalites` (`id`, `country_id`, `prix`, `renewal_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 600, 0, '2022-09-06 17:43:59', '2022-09-06 17:43:59', NULL),
(2, 11, 250, 0, '2022-09-06 17:43:59', '2022-09-06 17:43:59', NULL),
(3, 44, 670, 0, '2022-09-22 08:25:21', '2022-09-22 08:25:21', NULL),
(4, 11, 230, 0, '2022-09-22 08:25:21', '2022-09-22 08:25:21', NULL),
(5, 26, 780, 0, '2022-09-22 08:25:21', '2022-09-22 08:25:21', NULL),
(6, 35, 300, 0, '2022-09-22 08:25:21', '2022-09-22 08:25:21', NULL),
(7, 137, 345, 400, '2022-09-22 08:33:39', '2022-10-31 18:20:50', NULL),
(8, 214, 820, 0, '2022-09-22 08:36:59', '2022-09-22 08:36:59', NULL),
(9, 40, 420, 0, '2022-10-19 16:04:36', '2022-10-19 16:04:36', NULL),
(10, 47, 700, 0, '2022-10-19 17:21:24', '2022-10-19 17:21:24', NULL),
(11, 214, 1350, 0, '2022-10-19 17:38:59', '2022-10-19 17:38:59', NULL),
(12, 40, 530, 0, '2022-10-19 17:38:59', '2022-10-19 17:38:59', NULL),
(13, 9, 420, 0, '2022-10-19 17:38:59', '2022-10-19 17:38:59', NULL),
(14, 246, 1350, 0, '2022-10-25 16:57:52', '2022-10-25 16:57:52', NULL),
(15, 245, 620, 0, '2022-10-25 16:57:52', '2022-10-25 16:57:52', NULL),
(16, 226, 320, 0, '2022-10-25 16:57:52', '2022-10-25 16:57:52', NULL),
(17, 75, 1350, 0, '2022-10-25 16:57:52', '2022-10-25 16:57:52', NULL),
(18, 163, 1800, 0, '2022-10-25 17:08:43', '2022-10-25 17:08:43', NULL),
(19, 26, 780, 0, '2022-10-26 10:35:52', '2022-10-26 10:35:52', NULL),
(20, 9, 1800, 0, '2022-10-26 11:08:41', '2022-10-26 11:08:41', NULL),
(21, 3, 2700, 2350, '2022-10-31 18:55:32', '2022-10-31 18:55:32', NULL),
(22, 6, 420, 250, '2022-11-09 11:14:58', '2022-11-09 11:14:58', NULL),
(23, 1, 520, 250, '2022-11-09 11:18:58', '2022-11-09 11:18:58', NULL),
(24, 40, 650, 600, '2022-11-15 08:08:20', '2022-11-15 08:08:20', NULL),
(25, 40, 450, 400, '2022-11-15 08:08:20', '2022-11-15 08:12:14', NULL),
(26, 40, 500, 400, '2023-03-25 13:17:40', '2023-03-25 13:17:40', NULL),
(27, 244, 300, 200, '2023-03-25 13:17:40', '2023-03-25 13:17:40', NULL),
(28, 40, 100, 100, '2023-05-09 22:56:16', '2023-05-09 22:56:16', NULL),
(29, 40, 100, 80, '2023-10-18 11:44:26', '2023-10-18 11:44:26', NULL),
(30, 12, 200, 150, '2023-10-30 10:34:31', '2023-10-30 10:34:31', NULL),
(31, 3, 300, 250, '2023-10-30 10:34:31', '2023-10-30 10:34:31', NULL),
(32, 12, 200, 0, '2023-10-30 10:38:48', '2023-10-30 10:38:48', NULL),
(33, 245, 450, 250, '2023-11-07 14:31:14', '2023-11-07 14:48:20', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`, `team_id`) VALUES
(1, 'App\\Models\\User', 1, 1),
(2, 'App\\Models\\User', 1, 1),
(2, 'App\\Models\\User', 3, 1),
(2, 'App\\Models\\User', 4, 1),
(3, 'App\\Models\\User', 1, 1),
(3, 'App\\Models\\User', 3, 1),
(3, 'App\\Models\\User', 4, 1),
(4, 'App\\Models\\User', 1, 1),
(4, 'App\\Models\\User', 3, 1),
(4, 'App\\Models\\User', 4, 1),
(5, 'App\\Models\\User', 1, 1),
(5, 'App\\Models\\User', 3, 1),
(5, 'App\\Models\\User', 4, 1),
(6, 'App\\Models\\User', 1, 1),
(6, 'App\\Models\\User', 3, 1),
(6, 'App\\Models\\User', 4, 1),
(7, 'App\\Models\\User', 1, 1),
(7, 'App\\Models\\User', 4, 1),
(8, 'App\\Models\\User', 1, 1),
(8, 'App\\Models\\User', 4, 1),
(9, 'App\\Models\\User', 1, 1),
(9, 'App\\Models\\User', 4, 1),
(10, 'App\\Models\\User', 1, 1),
(10, 'App\\Models\\User', 4, 1),
(11, 'App\\Models\\User', 1, 1),
(11, 'App\\Models\\User', 3, 1),
(11, 'App\\Models\\User', 4, 1),
(12, 'App\\Models\\User', 1, 1),
(13, 'App\\Models\\User', 1, 1),
(14, 'App\\Models\\User', 1, 1),
(15, 'App\\Models\\User', 1, 1),
(16, 'App\\Models\\User', 1, 1),
(12, 'App\\Models\\User', 1, 2),
(1, 'App\\Models\\User', 1, 3),
(2, 'App\\Models\\User', 1, 3),
(2, 'App\\Models\\User', 2, 3),
(3, 'App\\Models\\User', 1, 3),
(3, 'App\\Models\\User', 2, 3),
(4, 'App\\Models\\User', 1, 3),
(4, 'App\\Models\\User', 2, 3),
(5, 'App\\Models\\User', 1, 3),
(5, 'App\\Models\\User', 2, 3),
(6, 'App\\Models\\User', 1, 3),
(6, 'App\\Models\\User', 2, 3),
(7, 'App\\Models\\User', 1, 3),
(7, 'App\\Models\\User', 2, 3),
(8, 'App\\Models\\User', 1, 3),
(8, 'App\\Models\\User', 2, 3),
(9, 'App\\Models\\User', 1, 3),
(9, 'App\\Models\\User', 2, 3),
(10, 'App\\Models\\User', 1, 3),
(10, 'App\\Models\\User', 2, 3),
(11, 'App\\Models\\User', 1, 3),
(11, 'App\\Models\\User', 2, 3),
(12, 'App\\Models\\User', 1, 3),
(12, 'App\\Models\\User', 2, 3),
(13, 'App\\Models\\User', 1, 3),
(13, 'App\\Models\\User', 2, 3),
(14, 'App\\Models\\User', 1, 3),
(14, 'App\\Models\\User', 2, 3),
(15, 'App\\Models\\User', 1, 3),
(15, 'App\\Models\\User', 2, 3),
(16, 'App\\Models\\User', 1, 3),
(16, 'App\\Models\\User', 2, 3),
(1, 'App\\Models\\User', 1, 4),
(2, 'App\\Models\\User', 1, 4),
(3, 'App\\Models\\User', 1, 4),
(4, 'App\\Models\\User', 1, 4),
(5, 'App\\Models\\User', 1, 4),
(6, 'App\\Models\\User', 1, 4),
(7, 'App\\Models\\User', 1, 4),
(8, 'App\\Models\\User', 1, 4),
(9, 'App\\Models\\User', 1, 4),
(10, 'App\\Models\\User', 1, 4),
(11, 'App\\Models\\User', 1, 4),
(12, 'App\\Models\\User', 1, 4),
(16, 'App\\Models\\User', 1, 4),
(17, 'App\\Models\\User', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `team_id`) VALUES
(1, 'App\\Models\\User', 1, 1),
(2, 'App\\Models\\User', 3, 1),
(3, 'App\\Models\\User', 4, 1),
(4, 'App\\Models\\User', 1, 2),
(5, 'App\\Models\\User', 1, 3),
(6, 'App\\Models\\User', 2, 3),
(7, 'App\\Models\\User', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `modes_paiements`
--

CREATE TABLE `modes_paiements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modes_paiements`
--

INSERT INTO `modes_paiements` (`id`, `mode`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Transfert Bancaire', 1, '2022-09-06 18:37:39', '2022-09-06 18:37:39', NULL),
(2, 'Transfert agence', 1, '2022-09-06 18:37:39', '2022-09-06 18:37:39', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Gestions des entreprises', NULL, '2023-04-16 03:20:53', '2023-04-16 03:20:53'),
(2, 'Projects management', NULL, '2023-04-16 03:20:53', '2023-04-16 03:20:53'),
(3, 'Customers management', NULL, '2023-04-16 03:20:53', '2023-04-16 03:20:53'),
(4, 'Products management', NULL, '2023-04-16 03:20:53', '2023-04-16 03:20:53'),
(5, 'Countries information management', NULL, '2023-04-16 03:20:53', '2023-04-16 03:20:53'),
(6, 'Parteners management', NULL, '2023-04-16 03:20:53', '2023-04-16 03:20:53'),
(7, 'Finance management', NULL, '2023-04-16 03:20:53', '2023-04-16 03:20:53'),
(8, 'Tasks management', NULL, '2023-04-16 03:20:53', '2023-04-16 03:20:53'),
(9, 'Human ressources management', NULL, '2023-04-16 03:20:53', '2023-04-16 03:20:53'),
(10, 'Documents management', NULL, '2023-04-16 03:20:53', '2023-04-16 03:20:53'),
(11, 'Archives management', NULL, '2023-04-16 03:20:53', '2023-04-16 03:20:53'),
(12, 'Settings', NULL, '2023-04-16 03:20:53', '2023-04-16 03:20:53');

-- --------------------------------------------------------

--
-- Structure de la table `normes`
--

CREATE TABLE `normes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `norme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `normes`
--

INSERT INTO `normes` (`id`, `norme`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'efgtty', NULL, '2022-11-09 11:08:23', '2022-11-09 11:08:23', NULL),
(2, 'EN52586', NULL, '2022-11-15 07:59:42', '2022-11-15 07:59:42', NULL),
(3, 'EN445852', NULL, '2022-11-15 12:31:07', '2022-11-15 12:31:07', NULL),
(4, '2', NULL, '2022-12-30 14:19:32', '2022-12-30 14:19:32', NULL),
(5, 'ISO 900', 1, '2023-05-09 23:58:11', '2023-05-09 23:58:11', NULL),
(6, 'ISO 900', 3, '2023-10-18 11:29:17', '2023-10-18 11:29:17', NULL),
(7, 'EN 300', 1, '2023-10-30 10:25:02', '2023-10-30 10:25:02', NULL),
(8, 'EN301489', 4, '2023-11-07 15:26:00', '2023-11-07 15:26:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `etape_id` int(11) DEFAULT NULL,
  `statut_id` int(11) DEFAULT NULL,
  `titre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_text` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `project_id`, `etape_id`, `statut_id`, `titre`, `note_text`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, NULL, 'soumis', 'chaque vendredi la mise a jour', NULL, '2022-11-09 11:19:54', '2022-11-09 11:19:54', NULL),
(2, 2, NULL, NULL, 'soumis', 'a suivre et faire la mise a jour regulier', NULL, '2022-11-15 08:13:36', '2022-11-15 08:13:36', NULL),
(3, 5, NULL, NULL, NULL, 'un notre texte', NULL, '2022-12-29 14:35:33', '2022-12-29 14:35:33', NULL),
(4, 6, NULL, NULL, NULL, 'test note maj', NULL, '2022-12-29 15:11:36', '2022-12-29 15:11:36', NULL),
(5, 5, NULL, NULL, NULL, NULL, NULL, '2022-12-29 15:50:11', '2022-12-29 15:50:11', NULL),
(6, 5, NULL, NULL, NULL, NULL, NULL, '2022-12-29 15:51:30', '2022-12-29 15:51:30', NULL),
(7, 4, NULL, NULL, NULL, NULL, NULL, '2022-12-29 15:52:17', '2022-12-29 15:52:17', NULL),
(8, 8, NULL, NULL, NULL, NULL, NULL, '2023-01-29 12:04:45', '2023-01-29 12:04:45', NULL),
(9, 9, 2, 10, NULL, 'test note', 1, '2023-01-29 16:25:02', '2023-01-29 16:25:02', NULL),
(10, 9, NULL, NULL, NULL, NULL, NULL, '2023-02-01 13:59:08', '2023-02-01 13:59:08', NULL),
(11, 9, NULL, NULL, NULL, NULL, NULL, '2023-02-01 14:01:49', '2023-02-01 14:01:49', NULL),
(12, 2, 1, 6, NULL, 'test', NULL, '2023-02-04 12:06:32', '2023-02-04 12:06:32', NULL),
(13, 2, 2, 10, NULL, 'les test de mis a jour', NULL, '2023-02-04 12:09:54', '2023-02-04 12:09:54', NULL),
(14, 3, 1, 6, NULL, 'nous avons reçu un mail du client', NULL, '2023-02-04 13:39:09', '2023-02-04 13:39:09', NULL),
(15, 10, 1, 6, NULL, 'hhdfgdnsf', NULL, '2023-02-16 16:21:37', '2023-02-16 16:21:37', NULL),
(16, 11, 1, 6, NULL, 'test note', NULL, '2023-03-25 13:37:53', '2023-03-25 13:37:53', NULL),
(17, 12, 1, 6, NULL, 'on a recu le mail du client', 1, '2023-05-10 19:07:12', '2023-05-10 19:07:12', NULL),
(18, 12, 2, 10, NULL, 'nous avons rempli le formulaire', 1, '2023-05-21 15:15:01', '2023-05-21 15:15:01', NULL),
(19, 13, 1, 6, 'Mail reçu', 'test', NULL, '2023-10-30 10:42:14', '2023-10-30 10:42:14', NULL),
(20, 14, 3, 11, 'Soumission effectuée', 'En attente de facture', NULL, '2023-11-07 14:46:57', '2023-11-07 14:46:57', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `note_etapes`
--

CREATE TABLE `note_etapes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `note_etapes`
--

INSERT INTO `note_etapes` (`id`, `titre`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Réception', 1, '2023-01-29 16:13:53', '2023-01-29 16:13:53', NULL),
(2, 'Montage', 1, '2023-01-29 16:13:53', '2023-01-29 16:13:53', NULL),
(3, 'Soumission', 1, '2023-01-29 16:14:50', '2023-01-29 16:14:50', NULL),
(4, 'Traitement', 1, '2023-01-29 16:15:17', '2023-01-29 16:15:17', NULL),
(5, 'Réception du certificat', 1, '2023-01-29 16:15:17', '2023-01-29 16:15:17', NULL),
(6, 'Envoi au client', 1, '2023-01-29 16:16:27', '2023-01-29 16:16:27', NULL),
(7, 'Clôture du projet', 1, '2023-01-29 16:16:27', '2023-01-29 16:16:27', NULL),
(8, 'Sondage', 1, '2023-01-29 16:16:27', '2023-01-29 16:16:27', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `note_statuts`
--

CREATE TABLE `note_statuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `etape_id` bigint(20) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `note_statuts`
--

INSERT INTO `note_statuts` (`id`, `etape_id`, `titre`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 1, 'Mail reçu', 1, '2023-01-29 16:22:22', '2023-01-29 16:22:22', NULL),
(7, 1, 'Document à completer', 1, '2023-01-29 16:22:22', '2023-01-29 16:22:22', NULL),
(8, 1, 'Document téléchargé', 1, '2023-01-29 16:23:50', '2023-01-29 16:23:50', NULL),
(9, 1, 'Document complet', 1, '2023-01-29 16:23:50', '2023-01-29 16:23:50', NULL),
(10, 2, 'Formulaire rempli', 1, '2023-01-29 16:25:53', '2023-01-29 16:25:53', NULL),
(11, 3, 'Soumission effectuée', 1, '2023-01-29 16:28:22', '2023-01-29 16:28:22', NULL),
(12, 3, 'Preuve de soumission envoyée au client', 1, '2023-01-29 16:28:22', '2023-01-29 16:28:22', NULL),
(13, 4, 'Certificat soumis à signature ', 1, '2023-01-29 16:32:24', '2023-01-29 16:32:24', NULL),
(14, 4, 'Certificat signé', 1, '2023-01-29 16:32:24', '2023-01-29 16:32:24', NULL),
(15, 4, 'Facture reçue ', 1, '2023-01-29 16:39:57', '2023-01-29 16:39:57', NULL),
(16, 4, 'Facture payée', 1, '2023-01-29 16:39:57', '2023-01-29 16:39:57', NULL),
(17, 5, 'Copie du certificat reçue', 1, '2023-01-29 16:43:03', '2023-01-29 16:43:03', NULL),
(18, 5, 'original du certificat reçue', 1, '2023-01-29 16:43:03', '2023-01-29 16:43:03', NULL),
(19, 6, 'Envoi de la copie du certificat', 1, '2023-01-29 16:46:34', '2023-01-29 16:46:34', NULL),
(20, 6, 'Envoi de l\'original du certificat', 1, '2023-01-29 16:46:34', '2023-01-29 16:46:34', NULL),
(21, 7, 'Facture envoyée au client', 1, '2023-01-29 16:50:13', '2023-01-29 16:50:13', NULL),
(22, 7, 'Payement reçu', 1, '2023-01-29 16:50:13', '2023-01-29 16:50:13', NULL),
(23, 8, 'Sondage envoyé au client', 1, '2023-01-29 16:51:56', '2023-01-29 16:51:56', NULL),
(24, 8, 'Sondage reçu', 1, '2023-01-29 16:51:56', '2023-01-29 16:51:56', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('31472f01-d11b-4468-bed4-6719ef82ad1c', 'App\\Notifications\\TacheNotification', 'App\\Models\\User', 1, '{\"id\":1,\"parent_id\":null,\"user_id\":1,\"document_id\":null,\"statut_id\":2,\"priorite_id\":1,\"titre\":\"test tache\",\"description\":\"just a test\",\"date_debut\":\"2023-05-15T00:00:00.000000Z\",\"date_fin\":null,\"team_id\":1}', NULL, '2023-06-30 23:13:48', '2023-06-30 23:13:48'),
('38090aed-66a7-4f9f-afb2-d6f197e354ba', 'App\\Notifications\\TacheNotification', 'App\\Models\\User', 1, '{\"id\":1,\"parent_id\":null,\"user_id\":1,\"document_id\":null,\"statut_id\":2,\"priorite_id\":1,\"titre\":\"test tache\",\"description\":\"just a test\",\"date_debut\":\"2023-05-15T00:00:00.000000Z\",\"date_fin\":null,\"team_id\":1}', NULL, '2023-06-30 22:56:08', '2023-06-30 22:56:08'),
('9f278b0d-a1fb-44ea-8c09-e6448a5d3f18', 'App\\Notifications\\TacheNotification', 'App\\Models\\User', 1, '{\"id\":1,\"parent_id\":null,\"user_id\":1,\"document_id\":null,\"statut_id\":2,\"priorite_id\":1,\"titre\":\"test tache\",\"description\":\"just a test\",\"date_debut\":\"2023-05-15T00:00:00.000000Z\",\"date_fin\":null,\"team_id\":1}', NULL, '2023-06-30 22:52:37', '2023-06-30 22:52:37'),
('b23bd951-43e5-424e-b169-efab8ab062f5', 'App\\Notifications\\TacheNotification', 'App\\Models\\User', 1, '{\"id\":1,\"parent_id\":null,\"user_id\":1,\"document_id\":null,\"statut_id\":2,\"priorite_id\":1,\"titre\":\"test tache\",\"description\":\"just a test\",\"date_debut\":\"2023-05-15T00:00:00.000000Z\",\"date_fin\":null,\"team_id\":1}', NULL, '2023-06-30 22:46:38', '2023-06-30 22:46:38');

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

CREATE TABLE `partenaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `societe_id` bigint(20) DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `mode_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paiement_attributs` text COLLATE utf8mb4_unicode_ci,
  `team_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `partenaires`
--

INSERT INTO `partenaires` (`id`, `societe_id`, `country_id`, `mode_id`, `nom`, `prix`, `phone`, `email`, `description`, `image`, `paiement_attributs`, `team_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 'mutuma', 400, '0810023030', 'gaverno@gmail.com', 'test', NULL, '{\"nom_bank\":\"ecobank\",\"adresse_bank\":\"drftgg\",\"code_swift\":\"ddrfgt\",\"num_compte\":\"45822\",\"nom_beneficiaire\":\"erftg\"}', NULL, NULL, '2022-11-09 11:14:58', '2023-01-08 23:32:01'),
(2, 1, 2, 2, 'Dikasa Mvita Jean-Louis', 100, '0810023030', 'gaverno@gmail.com', 'test', NULL, '{\"nom_beneficiaire\":\"Selecteur RF\",\"phone_beneficiaire\":\"456698\"}', NULL, NULL, '2022-11-09 11:18:58', '2023-01-09 01:04:41'),
(3, 4, 3, 1, 'christian', 200, '8596452', 'christian@conformitech.net', 'un bon partenaire', NULL, '{\"nom_bank\":\"bcdc\",\"adresse_bank\":\"dujjnhu victoire\",\"code_swift\":\"ezrtgf\",\"num_compte\":\"2589623\",\"nom_beneficiaire\":\"conf tech service\"}', NULL, NULL, '2022-11-15 08:08:20', '2022-11-15 08:08:20'),
(4, 31, NULL, 1, 'Dikasa Mvita Jean-Louis', 400, '0811647737', 'jdikasa@yahoo.com', 'test description', 'partenaires/March2023/QDxuJT3IAEtphH7RZH14.JPG', '{\"nom_bank\":\"Access Bank\",\"adresse_bank\":\"une adresse\",\"code_swift\":\"6534739\",\"num_compte\":\"769498596\",\"nom_beneficiaire\":\"Dikasa Mvita Jean-Louis\"}', NULL, NULL, '2023-03-25 13:17:37', '2023-03-25 13:17:37'),
(5, 1, NULL, 2, 'Christian', 300, '09897567', 'christian@gmail.com', 'test', NULL, '{\"nom_beneficiaire\":\"Christian\",\"phone_beneficiaire\":\"09898687\"}', 1, NULL, '2023-05-09 22:56:16', '2023-05-09 22:56:16'),
(6, 4, NULL, 2, 'John Doe', NULL, '0810023030', 'johndoe@gmail.com', 'test description', 'partenaires/October2023/sMjfjobVA6pSLbF7KtIq.png', '{\"nom_beneficiaire\":\"John\",\"phone_beneficiaire\":\"098986873\"}', 3, NULL, '2023-10-18 11:44:26', '2023-10-18 11:44:26'),
(7, 1, NULL, 1, 'John Doe', NULL, '09897567', 'jdikasa@yahoo.com', NULL, 'partenaires/October2023/rABKj6BGSlH7OsOGHhO1.png', '{\"nom_bank\":\"Equity\",\"adresse_bank\":\"rywjgjfdgdj\",\"code_swift\":\"8897753\",\"num_compte\":\"6434573855\",\"nom_beneficiaire\":\"John Doe\"}', 1, NULL, '2023-10-30 10:34:31', '2023-10-30 10:34:31'),
(8, 7, NULL, 2, 'merveille', NULL, '12345678', 'info@conftech.com', NULL, NULL, '{\"nom_beneficiaire\":\"merveille\",\"phone_beneficiaire\":\"098986873\"}', 4, NULL, '2023-11-07 14:31:14', '2024-01-03 12:51:49');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('jdikasa@yahoo.com', '$2y$10$d9LiPxMCwsezUJsMUJ0weuzx7PIJRmR.RFvhePal5hWdl5uad08Ru', '2023-04-20 05:36:11');

-- --------------------------------------------------------

--
-- Structure de la table `pay_transactions`
--

CREATE TABLE `pay_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `facture_id` bigint(20) DEFAULT NULL,
  `montant` int(11) NOT NULL,
  `description` text,
  `team_id` bigint(20) DEFAULT NULL,
  `statut_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pay_transactions`
--

INSERT INTO `pay_transactions` (`id`, `user_id`, `facture_id`, `montant`, `description`, `team_id`, `statut_id`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 100, 'paiement de 0,00$ pour la facture <a href=\"http://localhost:8000/finances/factures/1\">1</a>', 1, NULL, NULL, '2022-12-27 22:07:31', '2022-12-27 22:07:31', NULL),
(2, 1, 2, 50, 'paiement de 0,00$ pour la facture <a href=\"http://localhost:8000/finances/factures/2\">2</a>', NULL, NULL, NULL, '2022-12-29 16:32:15', '2022-12-29 16:32:15', NULL),
(3, 1, 3, 10, 'paiement de 0,00$ pour la facture <a href=\"http://127.0.0.1:8000/finances/factures/3\">#000003</a>', NULL, NULL, NULL, '2023-02-16 16:28:44', '2023-02-16 16:28:44', NULL),
(4, 1, 4, 0, 'paiement de 0,00$ pour la facture <a href=\"http://127.0.0.1:8000/finances/factures/4\">#000004</a>', NULL, NULL, NULL, '2023-03-07 00:25:01', '2023-03-07 00:25:01', NULL),
(5, 1, NULL, 50, 'test', NULL, NULL, NULL, '2023-03-07 01:31:51', '2023-03-07 01:31:51', NULL),
(6, 1, 5, 50, NULL, NULL, NULL, NULL, '2023-03-07 01:45:59', '2023-03-07 01:45:59', NULL),
(7, 1, 5, 86, 'test paiement', NULL, NULL, NULL, '2023-03-07 02:39:53', '2023-03-07 02:39:53', NULL),
(8, 1, 6, 86, 'test', NULL, NULL, NULL, '2023-03-07 03:03:34', '2023-03-07 03:03:34', NULL),
(9, 1, 6, 900, 'test', NULL, NULL, NULL, '2023-03-07 03:04:22', '2023-03-07 03:04:22', NULL),
(10, 1, 5, 850, 'hdfj', NULL, NULL, NULL, '2023-03-25 13:59:02', '2023-03-25 13:59:02', NULL),
(11, 1, 7, 100, 'paiement de 100,00$ pour la facture <a href=\"http://localhost:8000/finances/factures/7\">#000007</a>', NULL, NULL, NULL, '2023-03-25 14:03:24', '2023-03-25 14:03:24', NULL),
(12, 1, 8, 0, 'paiement de 0,00$ pour la facture <a href=\"http://localhost:8001/finances/factures/8\">#000008</a>', NULL, 1, NULL, '2023-08-03 12:35:05', '2023-08-03 12:35:05', NULL),
(13, 1, 8, 200, 'solde', NULL, NULL, NULL, '2023-08-05 14:52:12', '2023-08-05 14:52:12', NULL),
(14, 1, 9, 0, 'paiement de 0,00$ pour la facture <a href=\"http://localhost:8000/finances/factures/9\">#000009</a>', NULL, 1, NULL, '2023-10-30 11:11:05', '2023-10-30 11:11:05', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `module_id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'update team information', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(2, 2, 'view projects', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(3, 3, 'view customers', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(4, 4, 'view products', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(5, 5, 'view countries information', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(6, 6, 'view parteners', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(7, 7, 'view finance', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(8, 7, 'view cotations', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(9, 7, 'view bills', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(10, 7, 'view bank', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(11, 8, 'view tasks', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(12, 9, 'manage human ressources', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(13, 10, 'view documents', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(14, 11, 'view archives', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(15, 12, 'view settings', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(16, 3, 'delete customers', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15'),
(17, 2, 'definir le type du projet', 'web', '2023-04-16 01:38:15', '2023-04-16 01:38:15');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pivot_agent_fonctions`
--

CREATE TABLE `pivot_agent_fonctions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) DEFAULT NULL,
  `fonction_id` bigint(20) DEFAULT NULL,
  `statut_id` bigint(20) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pivot_agent_fonctions`
--

INSERT INTO `pivot_agent_fonctions` (`id`, `agent_id`, `fonction_id`, `statut_id`, `date_debut`, `date_fin`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, '2023-01-16', NULL, 1, 1, '2023-01-16 18:25:47', '2023-01-16 18:25:47', NULL),
(2, 2, 1, 1, NULL, NULL, 1, 1, '2023-01-21 22:47:08', '2023-01-21 22:47:08', NULL),
(3, 3, 1, 1, NULL, NULL, 1, 1, '2023-03-07 03:33:58', '2023-03-07 03:33:58', NULL),
(4, 9, 1, 1, NULL, NULL, 1, 1, '2023-06-20 16:12:07', '2023-06-20 16:12:07', NULL),
(5, 10, 1, 1, NULL, NULL, 2, 2, '2023-11-29 14:29:36', '2023-11-29 14:29:36', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pivot_bandes_frequences_products`
--

CREATE TABLE `pivot_bandes_frequences_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `bandes_frequence_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pivot_bandes_frequences_products`
--

INSERT INTO `pivot_bandes_frequences_products` (`id`, `product_id`, `bandes_frequence_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL),
(3, 3, 1, NULL, NULL, NULL),
(4, 4, 2, NULL, NULL, NULL),
(5, 7, 5, NULL, NULL, NULL),
(6, 8, 2, NULL, NULL, NULL),
(7, 12, 2, NULL, NULL, NULL),
(8, 12, 1, NULL, NULL, NULL),
(9, 13, 1, NULL, NULL, NULL),
(10, 13, 2, NULL, NULL, NULL),
(11, 13, 6, NULL, NULL, NULL),
(12, 14, 7, NULL, NULL, NULL),
(13, 14, 2, NULL, NULL, NULL),
(14, 15, 7, NULL, NULL, NULL),
(15, 16, 7, NULL, NULL, NULL),
(17, 18, 7, NULL, NULL, NULL),
(18, 14, 8, NULL, NULL, NULL),
(19, 15, 8, NULL, NULL, NULL),
(20, 16, 8, NULL, NULL, NULL),
(21, 17, 9, NULL, NULL, NULL),
(22, 18, 10, NULL, NULL, NULL),
(23, 19, 11, NULL, NULL, NULL),
(24, 20, 12, NULL, NULL, NULL),
(25, 20, 13, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pivot_documents_agents`
--

CREATE TABLE `pivot_documents_agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) DEFAULT NULL,
  `document_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pivot_documents_agents`
--

INSERT INTO `pivot_documents_agents` (`id`, `agent_id`, `document_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 19, NULL, NULL, NULL),
(2, 6, 43, NULL, NULL, NULL),
(3, 8, 44, NULL, NULL, NULL),
(4, 10, 92, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pivot_documents_certificats`
--

CREATE TABLE `pivot_documents_certificats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `certificat_id` bigint(20) DEFAULT NULL,
  `document_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pivot_documents_certificats`
--

INSERT INTO `pivot_documents_certificats` (`id`, `certificat_id`, `document_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 4, NULL, NULL, NULL),
(2, 6, 5, NULL, NULL, NULL),
(3, 7, 6, NULL, NULL, NULL),
(4, 7, 7, NULL, NULL, NULL),
(5, 7, 8, NULL, NULL, NULL),
(6, 8, 9, NULL, NULL, NULL),
(7, 8, 10, NULL, NULL, NULL),
(8, 8, 11, NULL, NULL, NULL),
(9, 14, 13, NULL, NULL, NULL),
(10, 14, 14, NULL, NULL, NULL),
(11, 14, 15, NULL, NULL, NULL),
(12, 15, 16, NULL, NULL, NULL),
(13, 15, 17, NULL, NULL, NULL),
(14, 15, 18, NULL, NULL, NULL),
(15, 16, 19, NULL, NULL, NULL),
(16, 16, 20, NULL, NULL, NULL),
(17, 16, 21, NULL, NULL, NULL),
(18, 17, 22, NULL, NULL, NULL),
(19, 17, 23, NULL, NULL, NULL),
(20, 17, 24, NULL, NULL, NULL),
(21, 18, 25, NULL, NULL, NULL),
(22, 18, 26, NULL, NULL, NULL),
(23, 18, 27, NULL, NULL, NULL),
(24, 18, 28, NULL, NULL, NULL),
(25, 19, 57, NULL, NULL, NULL),
(26, 19, 58, NULL, NULL, NULL),
(27, 19, 59, NULL, NULL, NULL),
(28, 19, 60, NULL, NULL, NULL),
(29, 20, 70, NULL, NULL, NULL),
(30, 20, 71, NULL, NULL, NULL),
(31, 20, 72, NULL, NULL, NULL),
(32, 20, 73, NULL, NULL, NULL),
(33, 21, 77, NULL, NULL, NULL),
(34, 21, 78, NULL, NULL, NULL),
(35, 22, 79, NULL, NULL, NULL),
(36, 22, 80, NULL, NULL, NULL),
(37, 23, 89, NULL, NULL, NULL),
(38, 23, 90, NULL, NULL, NULL),
(39, 23, 91, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pivot_documents_customers`
--

CREATE TABLE `pivot_documents_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `document_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pivot_documents_customers`
--

INSERT INTO `pivot_documents_customers` (`id`, `customer_id`, `document_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 6, 22, NULL, NULL, NULL),
(3, 9, 23, NULL, NULL, NULL),
(4, 10, 24, NULL, NULL, NULL),
(5, 12, 1, NULL, NULL, NULL),
(6, 12, 2, NULL, NULL, NULL),
(7, 12, 3, NULL, NULL, NULL),
(8, 13, 40, NULL, NULL, NULL),
(9, 13, 41, NULL, NULL, NULL),
(10, 13, 42, NULL, NULL, NULL),
(11, 14, 47, NULL, NULL, NULL),
(12, 14, 48, NULL, NULL, NULL),
(13, 14, 49, NULL, NULL, NULL),
(14, 15, 61, NULL, NULL, NULL),
(15, 15, 62, NULL, NULL, NULL),
(16, 17, 81, NULL, NULL, NULL),
(17, 17, 82, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pivot_documents_notes`
--

CREATE TABLE `pivot_documents_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) DEFAULT NULL,
  `note_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pivot_documents_products`
--

CREATE TABLE `pivot_documents_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `document_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pivot_documents_products`
--

INSERT INTO `pivot_documents_products` (`id`, `product_id`, `document_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 14, 29, NULL, NULL, NULL),
(2, 14, 30, NULL, NULL, NULL),
(3, 15, 31, NULL, NULL, NULL),
(4, 15, 32, NULL, NULL, NULL),
(5, 16, 33, NULL, NULL, NULL),
(6, 16, 34, NULL, NULL, NULL),
(7, 16, 35, NULL, NULL, NULL),
(8, 16, 36, NULL, NULL, NULL),
(9, 16, 37, NULL, NULL, NULL),
(10, 16, 38, NULL, NULL, NULL),
(11, 16, 39, NULL, NULL, NULL),
(12, 17, 50, NULL, NULL, NULL),
(13, 17, 51, NULL, NULL, NULL),
(14, 17, 52, NULL, NULL, NULL),
(15, 17, 53, NULL, NULL, NULL),
(16, 17, 54, NULL, NULL, NULL),
(17, 17, 55, NULL, NULL, NULL),
(18, 17, 56, NULL, NULL, NULL),
(19, 18, 63, NULL, NULL, NULL),
(20, 18, 64, NULL, NULL, NULL),
(21, 18, 65, NULL, NULL, NULL),
(22, 18, 66, NULL, NULL, NULL),
(23, 18, 67, NULL, NULL, NULL),
(24, 18, 68, NULL, NULL, NULL),
(25, 18, 69, NULL, NULL, NULL),
(26, 19, 74, NULL, NULL, NULL),
(27, 19, 75, NULL, NULL, NULL),
(28, 19, 76, NULL, NULL, NULL),
(29, 20, 83, NULL, NULL, NULL),
(30, 20, 84, NULL, NULL, NULL),
(31, 20, 85, NULL, NULL, NULL),
(32, 20, 86, NULL, NULL, NULL),
(33, 20, 87, NULL, NULL, NULL),
(34, 20, 88, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pivot_factures_projects`
--

CREATE TABLE `pivot_factures_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) DEFAULT NULL,
  `facture_id` bigint(20) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `qt` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pivot_factures_projects`
--

INSERT INTO `pivot_factures_projects` (`id`, `project_id`, `facture_id`, `prix`, `qt`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1250, 1, '2022-12-27 22:07:31', '2022-12-27 22:07:31'),
(2, 6, 2, 1250, 1, '2022-12-29 16:32:15', '2022-12-29 16:32:15'),
(3, 5, 3, 1250, 1, '2023-02-16 16:28:44', '2023-02-16 16:28:44'),
(4, 4, 4, 850, 1, '2023-03-07 00:25:02', '2023-03-07 00:25:02'),
(5, 4, 5, 850, 1, '2023-03-07 00:29:20', '2023-03-07 00:29:20'),
(6, 4, 6, 850, 1, '2023-03-07 02:35:19', '2023-03-07 02:35:19'),
(7, 3, 7, 1250, 1, '2023-03-25 14:03:24', '2023-03-25 14:03:24'),
(8, 12, 8, 200, 1, '2023-08-03 12:35:05', '2023-08-03 12:35:05'),
(9, 13, 9, 600, 1, '2023-10-30 11:11:05', '2023-10-30 11:11:05');

-- --------------------------------------------------------

--
-- Structure de la table `pivot_partenaires_modalites`
--

CREATE TABLE `pivot_partenaires_modalites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partenaire_id` int(11) DEFAULT NULL,
  `modalite_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pivot_partenaires_modalites`
--

INSERT INTO `pivot_partenaires_modalites` (`id`, `partenaire_id`, `modalite_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 22, NULL, NULL, NULL),
(2, 2, 23, NULL, NULL, NULL),
(3, 3, 25, NULL, NULL, NULL),
(4, 4, 27, NULL, NULL, NULL),
(5, 5, 28, NULL, NULL, NULL),
(6, 6, 29, NULL, NULL, NULL),
(7, 7, 31, NULL, NULL, NULL),
(8, 7, 32, NULL, NULL, NULL),
(9, 8, 33, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pivot_products_cotations`
--

CREATE TABLE `pivot_products_cotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `cotation_id` bigint(20) DEFAULT NULL,
  `partenaire_id` bigint(20) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `qt` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pivot_products_cotations`
--

INSERT INTO `pivot_products_cotations` (`id`, `product_id`, `cotation_id`, `partenaire_id`, `prix`, `qt`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, 2, 850, 1, '2023-02-18 14:15:31', '2023-02-18 14:15:31', NULL),
(2, 13, 2, 3, 1250, 1, '2023-03-25 13:49:50', '2023-03-25 13:49:50', NULL),
(3, 10, 2, 3, 1250, 1, '2023-03-25 13:49:50', '2023-03-25 13:49:50', NULL),
(4, 14, 3, 5, 200, 1, '2023-05-10 21:20:35', '2023-05-10 21:20:35', NULL),
(5, 18, 4, 7, 600, 1, '2023-10-30 10:48:08', '2023-10-30 10:48:08', NULL),
(6, 16, 4, 7, 600, 1, '2023-10-30 10:48:08', '2023-10-30 10:48:08', NULL),
(7, 19, 5, 8, 500, 1, '2023-11-07 14:51:23', '2023-11-07 14:51:23', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pivot_taches_cibles`
--

CREATE TABLE `pivot_taches_cibles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cible_id` bigint(20) DEFAULT NULL,
  `tache_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pivot_user_conges`
--

CREATE TABLE `pivot_user_conges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `debut` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jour` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `montant` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conge_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `statut_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pivot_user_taches`
--

CREATE TABLE `pivot_user_taches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) DEFAULT NULL,
  `tache_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `statut_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pivot_user_taches`
--

INSERT INTO `pivot_user_taches` (`id`, `agent_id`, `tache_id`, `user_id`, `statut_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, NULL, NULL),
(2, 2, 2, NULL, 1, NULL, NULL),
(3, 3, 1, NULL, 1, NULL, NULL),
(4, 4, 1, NULL, 1, NULL, NULL),
(5, 5, 1, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pivo_normes_products`
--

CREATE TABLE `pivo_normes_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `norme_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pivo_normes_products`
--

INSERT INTO `pivo_normes_products` (`id`, `norme_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL),
(3, 3, 3, NULL, NULL, NULL),
(4, 1, 4, NULL, NULL, NULL),
(5, 4, 7, NULL, NULL, NULL),
(6, 3, 8, NULL, NULL, NULL),
(7, 2, 12, NULL, NULL, NULL),
(8, 3, 12, NULL, NULL, NULL),
(9, 2, 1, NULL, NULL, NULL),
(10, 2, 13, NULL, NULL, NULL),
(11, 3, 13, NULL, NULL, NULL),
(12, 5, 14, NULL, NULL, NULL),
(13, 5, 15, NULL, NULL, NULL),
(14, 5, 16, NULL, NULL, NULL),
(16, 5, 18, NULL, NULL, NULL),
(17, 5, 14, NULL, NULL, NULL),
(18, 5, 15, NULL, NULL, NULL),
(19, 5, 16, NULL, NULL, NULL),
(20, 6, 17, NULL, NULL, NULL),
(21, 7, 18, NULL, NULL, NULL),
(22, 8, 20, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pivo_puissances_products`
--

CREATE TABLE `pivo_puissances_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `puissance_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pivo_puissances_products`
--

INSERT INTO `pivo_puissances_products` (`id`, `puissance_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, NULL, NULL, NULL),
(2, 2, 3, NULL, NULL, NULL),
(3, 1, 4, NULL, NULL, NULL),
(4, 4, 7, NULL, NULL, NULL),
(5, 2, 8, NULL, NULL, NULL),
(6, 5, 8, NULL, NULL, NULL),
(7, 1, 12, NULL, NULL, NULL),
(8, 2, 12, NULL, NULL, NULL),
(9, 1, 1, NULL, NULL, NULL),
(10, 1, 13, NULL, NULL, NULL),
(11, 2, 13, NULL, NULL, NULL),
(12, 6, 14, NULL, NULL, NULL),
(13, 6, 15, NULL, NULL, NULL),
(14, 6, 16, NULL, NULL, NULL),
(16, 6, 18, NULL, NULL, NULL),
(17, 7, 14, NULL, NULL, NULL),
(18, 7, 15, NULL, NULL, NULL),
(19, 7, 16, NULL, NULL, NULL),
(20, 8, 17, NULL, NULL, NULL),
(21, 6, 18, NULL, NULL, NULL),
(22, 9, 20, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `plannings`
--

CREATE TABLE `plannings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lundi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mardi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mercredi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jeudi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendredi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `samedi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimanche` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `statut_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pointages`
--

CREATE TABLE `pointages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplementaire` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '00:00',
  `majoree` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '00:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `priorites`
--

CREATE TABLE `priorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(25) DEFAULT NULL,
  `team_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `priorites`
--

INSERT INTO `priorites` (`id`, `titre`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Normal', 1, '2023-05-15 01:42:50', '2023-05-15 01:42:50', NULL),
(2, 'Intermédiaire', 1, '2023-05-15 01:42:50', '2023-05-15 01:42:50', NULL),
(3, 'Urgent', 1, '2023-05-15 01:44:14', '2023-05-15 01:44:14', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` bigint(20) DEFAULT NULL,
  `marque_id` bigint(20) DEFAULT NULL,
  `modele_id` bigint(20) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `rapport_rf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rapport_safety` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rapport_emc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rapport_sar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `declaration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autre_rapport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `nom`, `type_id`, `marque_id`, `modele_id`, `image`, `description`, `rapport_rf`, `rapport_safety`, `rapport_emc`, `rapport_sar`, `declaration`, `autre_rapport`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'module RF', 16, 1, 15, 'products/November2022/WUtVyC9fvKKn6AiSENbG.jpg', 'test', '[{\"download_link\":\"products\\/November2022\\/SSSfPZAynGuxu0oOlHpr.pdf\",\"original_name\":\"Approval Team Authorization-Conf Tech (2).pdf\"}]', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-09 11:08:51', '2022-12-31 14:34:31', NULL),
(2, 'immobiliseur', 17, 2, 16, NULL, 'c\'est un equipement de faible puissance et de faible portée', '[{\"download_link\":\"products\\/November2022\\/ucS1ktJoupB8g01FHwYy.pdf\",\"original_name\":\"Approval Team Authorization-Conf Tech.pdf\"}]', '[{\"download_link\":\"products\\/November2022\\/WjkwOScYFw4hnHPjKXib.pdf\",\"original_name\":\"Approval Team Authorization-Conf Tech.pdf\"}]', '[{\"download_link\":\"products\\/November2022\\/eINhbYHs6qyZxeLMXRiz.pdf\",\"original_name\":\"Approval Team Authorization-Conf Tech (2).pdf\"}]', NULL, NULL, NULL, NULL, '2022-11-15 08:00:28', '2022-11-15 08:00:28', NULL),
(3, 'antenne', 18, 3, 17, NULL, 'gdgzhajskslsp', '[{\"download_link\":\"products\\/November2022\\/GOTfLD8K9Si5Wv3nbbJu.pdf\",\"original_name\":\"Approval Team Authorization-Conf Tech (2).pdf\"}]', '[{\"download_link\":\"products\\/November2022\\/LumMJ5MU5UB4oAWu3OTz.pdf\",\"original_name\":\"Approval Team Authorization-Dem Rep Congo.pdf\"}]', NULL, NULL, NULL, NULL, NULL, '2022-11-15 12:31:59', '2022-11-15 12:31:59', NULL),
(4, 'fhkfjfn', 14, 1, 9, 'products/November2022/MNqcqweDm9EeBnT3U4RE.jpg', NULL, '[{\"download_link\":\"products\\/November2022\\/O876ZsEebEwwE538pDBX.pdf\",\"original_name\":\"B3 APP301 CITE KIN OASIS BANDAL.pdf\"}]', '[{\"download_link\":\"products\\/November2022\\/KRB91DSLhfA4QGPJgwBy.pdf\",\"original_name\":\"bs35470.pdf\"}]', '[{\"download_link\":\"products\\/November2022\\/DVDsou6jupR4d7WM1sEC.pdf\",\"original_name\":\"CTS price list.pdf\"}]', '[{\"download_link\":\"products\\/November2022\\/xmenxpLhSQt6EUEPjaeD.pdf\",\"original_name\":\"INVOICE.pdf\"}]', '[{\"download_link\":\"products\\/November2022\\/5DwtNMA1WJKxkYXxbJZF.pdf\",\"original_name\":\"PROFIL CONF TECH SERVICE Sarl pdf.pdf\"}]', '[{\"download_link\":\"products\\/November2022\\/WsDcaeMbeY92UmObb0iO.pdf\",\"original_name\":\"bs35470.pdf\"}]', NULL, '2022-11-15 12:37:27', '2022-11-15 12:37:27', NULL),
(8, 'test', 21, 6, 20, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-30 14:55:02', '2022-12-30 14:55:02', NULL),
(9, 'immobiliseur', 17, 2, 16, NULL, 'c\'est un equipement de faible puissance et de faible portée', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-31 13:33:55', '2022-12-31 13:33:55', NULL),
(10, 'immobiliseur', 17, 2, 16, NULL, 'c\'est un equipement de faible puissance et de faible portée', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-31 14:23:36', '2022-12-31 14:23:36', NULL),
(11, 'immobiliseur', 17, 2, 16, NULL, 'c\'est un equipement de faible puissance et de faible portée', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-31 14:24:17', '2022-12-31 14:24:17', NULL),
(12, 'immobiliseur', 17, 2, 16, NULL, 'c\'est un equipement de faible puissance et de faible portée', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-31 14:24:59', '2022-12-31 14:24:59', NULL),
(13, 'Modem 4G', 22, 3, 7, 'products/March2023/I8ej27jDirh77k5Gshqb.JPG', 'une description', '[{\"download_link\":\"products\\/March2023\\/S7M2oAPfAr7OhyySe5vL.pdf\",\"original_name\":\"contrat-1.pdf\"}]', '[{\"download_link\":\"products\\/March2023\\/cGw4NMLUpT2pPEXnNv31.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '[{\"download_link\":\"products\\/March2023\\/aeGjrBRgdhVhXJ8agl2r.pdf\",\"original_name\":\"Contrat.pdf\"}]', '[{\"download_link\":\"products\\/March2023\\/gFKQ3lZPaOq02Ntk5chx.pdf\",\"original_name\":\"ELIK6 - Liste des clients.pdf\"}]', '[{\"download_link\":\"products\\/March2023\\/PBchv5FyKL5hwQE09rjk.pdf\",\"original_name\":\"Mu\\u0308s\\u0327avirlik.pdf\"}]', '[{\"download_link\":\"products\\/March2023\\/IF6q8uteLwK28XAbDrDx.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', NULL, '2023-03-25 12:37:22', '2023-03-25 12:37:22', NULL),
(14, 'Modem 4G', 25, 9, 23, 'products/May2023/j6sCVuqG5TCLIKDug7uz.jpeg', 'test', '[{\"download_link\":\"products\\/May2023\\/V59V1l8F3tsLEv3MP4m6.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '[{\"download_link\":\"products\\/May2023\\/Ned0ohfN67uowVBu4OP2.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '[{\"download_link\":\"products\\/May2023\\/xYwImTKSxIoYcrKqrwcX.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '[{\"download_link\":\"products\\/May2023\\/LXUS2zxjcJ4uks3FUzNR.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '[{\"download_link\":\"products\\/May2023\\/Q5thk1Op0urNqjJgtB8W.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '[{\"download_link\":\"products\\/May2023\\/peWfGQ7WxbXxHFCg3fIG.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', 1, '2023-05-10 17:38:02', '2023-05-10 17:38:02', NULL),
(16, 'Routeur', 25, 9, 23, 'products/May2023/K8WDDCtC8pgHUJKhYi9L.jpeg', 'test', '[{\"download_link\":\"products\\/May2023\\/cdTlGRhrlHHytvmvS9go.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '[{\"download_link\":\"products\\/May2023\\/NnccoGi58adpg3R90eu7.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '[{\"download_link\":\"products\\/May2023\\/kCT2Cjwpd6EGUb6VtZH1.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', '[{\"download_link\":\"products\\/May2023\\/aSlCVp1f2Tj6T9U5zqnX.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '[{\"download_link\":\"products\\/May2023\\/5xVlOTA9bY2hDN6bULDt.pdf\",\"original_name\":\"API-DOC-v1.pdf\"}]', '[{\"download_link\":\"products\\/May2023\\/UH7CE3537TowYVlWgCyf.pdf\",\"original_name\":\"Appel_d_offre_Mobile_Pay_App.pdf\"}]', 1, '2023-05-10 17:44:26', '2023-05-10 17:44:26', NULL),
(17, 'Modem 4G', 26, 10, 24, 'products/October2023/zOUG2vB57asrkRX6PcM4.png', 'Un bon modem', '[{\"download_link\":\"products\\/October2023\\/MfcAXghUr3Gci2qsMmzc.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '[{\"download_link\":\"products\\/October2023\\/yluACQV4fudtDKc8kk9P.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '[{\"download_link\":\"products\\/October2023\\/yu1KrjbJx5NmMabXQWQR.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '[{\"download_link\":\"products\\/October2023\\/DaQA9HdzXGsAKKBFKDyu.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '[{\"download_link\":\"products\\/October2023\\/EnCSP68IFMztspp2GLbo.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', '[{\"download_link\":\"products\\/October2023\\/fi5G3uGrfoLcwwvxtOsn.pdf\",\"original_name\":\"bulletin_dinscription_irsg_240_ects_2022-2023.pdf\"}]', 3, '2023-10-18 11:29:17', '2023-11-29 13:19:03', NULL),
(18, 'LG', 27, 11, 25, 'products/October2023/hCnY9abbD7ztVrmAAhId.png', NULL, '[{\"download_link\":\"products\\/October2023\\/J0GEOYWiZas99YvkS5Ei.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '[{\"download_link\":\"products\\/October2023\\/tw9qlOCQZbnsFFQPZjCj.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '[{\"download_link\":\"products\\/October2023\\/CWbJo9tOUepQIFbt0HC4.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '[{\"download_link\":\"products\\/October2023\\/nmDP6Sxv0myFhUIcgeYU.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '[{\"download_link\":\"products\\/October2023\\/lhNyCFW9xFiTi6l4b8Du.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', '[{\"download_link\":\"products\\/October2023\\/vXGxloIES7dFHL8JsanE.pdf\",\"original_name\":\"Roboto_Specimen_Book.pdf\"}]', 1, '2023-10-30 10:25:02', '2023-10-30 10:25:02', NULL),
(19, 'lg inc', 28, 13, 27, NULL, NULL, '[{\"download_link\":\"products\\/November2023\\/D3eQb18Wa5SUuLOjw1bq.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126.pdf\"}]', '[{\"download_link\":\"products\\/November2023\\/fp0C3SqRGcsX8XSaAbXL.pdf\",\"original_name\":\"230821MISE A JOUR ET DEVELOPPEMENT BLUE APP V.04.pdf\"}]', '[{\"download_link\":\"products\\/November2023\\/2lXoIjSvpURSHhv2HWoh.pdf\",\"original_name\":\"authentification unkin en-1.pdf\"}]', NULL, NULL, NULL, 4, '2023-11-07 14:19:28', '2023-11-07 14:19:28', NULL),
(20, 'hwawei', 29, 14, 28, NULL, 'test test', '[{\"download_link\":\"products\\/November2023\\/Kbj1WUhA1KEYOKfV4Fva.pdf\",\"original_name\":\"_storage_app_public_documents_mydoc.pdf\"}]', '[{\"download_link\":\"products\\/November2023\\/hDtIINsykj12147F18sZ.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126.pdf\"}]', '[{\"download_link\":\"products\\/November2023\\/MxSTlCDoZ8TerlyMm83B.pdf\",\"original_name\":\"_storage_app_public_documents_mydoc.pdf\"}]', '[{\"download_link\":\"products\\/November2023\\/RiA62ifePIm27sanqEHX.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126-1.pdf\"}]', '[{\"download_link\":\"products\\/November2023\\/aqUEs7XJKLmRi7H55UKY.pdf\",\"original_name\":\"authentification unkin en.pdf\"}]', '[{\"download_link\":\"products\\/November2023\\/j4yj1JCGVpH14jKdC2ry.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126.pdf\"}]', 4, '2023-11-07 15:26:00', '2023-11-07 15:26:41', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `products_marques`
--

CREATE TABLE `products_marques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products_marques`
--

INSERT INTO `products_marques` (`id`, `marque`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'epson', NULL, '2022-11-09 11:07:58', '2022-11-09 11:07:58', NULL),
(2, 'canon', NULL, '2022-11-15 07:59:15', '2022-11-15 07:59:15', NULL),
(3, 'samsung LG', NULL, '2022-11-15 12:30:42', '2022-11-15 12:30:42', NULL),
(4, 'test 2', NULL, '2022-12-30 14:11:36', '2022-12-30 14:11:36', NULL),
(5, 'test 2', NULL, '2022-12-30 14:18:10', '2022-12-30 14:18:10', NULL),
(6, 'test 2', NULL, '2022-12-30 14:19:31', '2022-12-30 14:19:31', NULL),
(7, '4G', 1, '2023-05-09 23:40:32', '2023-05-09 23:40:32', NULL),
(8, '4G', 1, '2023-05-09 23:58:10', '2023-05-09 23:58:10', NULL),
(9, '5G', 1, '2023-05-10 17:38:01', '2023-05-10 17:38:01', NULL),
(10, 'Vodacom', 3, '2023-10-18 11:29:16', '2023-10-18 11:29:16', NULL),
(11, 'LG', 1, '2023-10-30 10:25:01', '2023-10-30 10:25:01', NULL),
(12, 'emc45bbg', 4, '2023-11-07 14:13:03', '2023-11-07 14:13:03', NULL),
(13, 'lg', 4, '2023-11-07 14:19:26', '2023-11-07 14:19:26', NULL),
(14, 'hwawei', 4, '2023-11-07 15:25:59', '2023-11-07 15:25:59', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `products_models`
--

CREATE TABLE `products_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `modele` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products_models`
--

INSERT INTO `products_models` (`id`, `modele`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'c23', NULL, '2022-09-06 17:07:51', '2022-09-06 17:07:51', NULL),
(2, 'xx2', NULL, '2022-09-06 17:15:37', '2022-09-06 17:15:37', NULL),
(3, 'L525G', NULL, '2022-09-16 06:14:56', '2022-09-16 06:14:56', NULL),
(4, 'M745XD', NULL, '2022-09-22 07:16:42', '2022-09-22 07:16:42', NULL),
(5, 'MTX458', NULL, '2022-09-22 07:19:29', '2022-09-22 07:19:29', NULL),
(6, 'GB852', NULL, '2022-09-22 07:21:41', '2022-09-22 07:21:41', NULL),
(7, 'KL12', NULL, '2022-10-06 11:24:43', '2022-10-06 11:24:43', NULL),
(8, 'TV785', NULL, '2022-10-06 11:27:09', '2022-10-06 11:27:09', NULL),
(9, 'ER452', NULL, '2022-10-19 16:00:49', '2022-10-19 16:00:49', NULL),
(10, 'HF589', NULL, '2022-10-19 17:18:36', '2022-10-19 17:18:36', NULL),
(11, 'CF5289', NULL, '2022-10-19 17:30:53', '2022-10-19 17:30:53', NULL),
(12, 'ER14528XB', NULL, '2022-10-25 16:47:20', '2022-10-25 16:47:20', NULL),
(13, 'H45869', NULL, '2022-10-26 10:45:12', '2022-10-26 10:45:12', NULL),
(14, 'PX12', NULL, '2022-10-31 18:48:16', '2022-10-31 18:48:16', NULL),
(15, 'mx45225', NULL, '2022-11-09 11:08:04', '2022-11-09 11:08:04', NULL),
(16, 'IM4585', NULL, '2022-11-15 07:59:21', '2022-11-15 07:59:21', NULL),
(17, 'SS45258', NULL, '2022-11-15 12:30:49', '2022-11-15 12:30:49', NULL),
(18, 'test 3', NULL, '2022-12-30 14:11:36', '2022-12-30 14:11:36', NULL),
(19, 'test 3', NULL, '2022-12-30 14:18:10', '2022-12-30 14:18:10', NULL),
(20, 'test 3', NULL, '2022-12-30 14:19:31', '2022-12-30 14:19:31', NULL),
(21, 'Pocket', 1, '2023-05-09 23:40:32', '2023-05-09 23:40:32', NULL),
(22, 'Pocket', 1, '2023-05-09 23:58:10', '2023-05-09 23:58:10', NULL),
(23, 'Home', 1, '2023-05-10 17:38:01', '2023-05-10 17:38:01', NULL),
(24, 'MDDI', 3, '2023-10-18 11:29:16', '2023-10-18 11:29:16', NULL),
(25, 'MR20GA', 1, '2023-10-30 10:25:01', '2023-10-30 10:25:01', NULL),
(26, 'lg', 4, '2023-11-07 14:13:03', '2023-11-07 14:13:03', NULL),
(27, 'emab567ct', 4, '2023-11-07 14:19:26', '2023-11-07 14:19:26', NULL),
(28, 'x21a', 4, '2023-11-07 15:25:59', '2023-11-07 15:25:59', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `products_status`
--

CREATE TABLE `products_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products_types`
--

CREATE TABLE `products_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products_types`
--

INSERT INTO `products_types` (`id`, `nom`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'modem', NULL, '2022-09-06 16:55:55', '2022-09-06 16:55:55', NULL),
(2, 'routeur', NULL, '2022-09-06 17:15:15', '2022-09-06 17:15:15', NULL),
(3, 'module', NULL, '2022-09-16 06:14:27', '2022-09-16 06:14:27', NULL),
(4, 'Routeur RF', NULL, '2022-09-22 07:16:19', '2022-09-22 07:16:19', NULL),
(5, 'Emetteur Radio', NULL, '2022-09-22 07:19:14', '2022-09-22 07:19:14', NULL),
(6, 'Recepteur GPS', NULL, '2022-09-22 07:21:20', '2022-09-22 07:21:20', NULL),
(7, 'simple recepteur', NULL, '2022-10-06 11:24:16', '2022-10-06 11:24:16', NULL),
(8, 'r', NULL, '2022-10-06 11:26:10', '2022-10-06 11:26:10', NULL),
(9, 'radio de voiture', NULL, '2022-10-06 11:26:37', '2022-10-06 11:26:37', NULL),
(10, 'Recepteur GSM', NULL, '2022-10-19 16:00:13', '2022-10-19 16:00:13', NULL),
(11, 'filtre RF', NULL, '2022-10-19 17:18:09', '2022-10-19 17:18:09', NULL),
(12, 'Selecteur Radio', NULL, '2022-10-19 17:30:39', '2022-10-19 17:30:39', NULL),
(13, 'Modulateur GSM', NULL, '2022-10-25 16:47:02', '2022-10-25 16:47:02', NULL),
(14, 'Emetteur en fibre', NULL, '2022-10-26 10:44:57', '2022-10-26 10:44:57', NULL),
(15, 'Filtre HF', NULL, '2022-10-31 18:47:48', '2022-10-31 18:47:48', NULL),
(16, 'module RF', NULL, '2022-11-09 11:07:50', '2022-11-09 11:07:50', NULL),
(17, 'immobiliseur', NULL, '2022-11-15 07:59:08', '2022-11-15 07:59:08', NULL),
(18, 'antenne RF', NULL, '2022-11-15 12:30:33', '2022-11-15 12:30:33', NULL),
(19, 'test', NULL, '2022-12-30 14:11:36', '2022-12-30 14:11:36', NULL),
(20, 'test', NULL, '2022-12-30 14:18:10', '2022-12-30 14:18:10', NULL),
(21, 'test', NULL, '2022-12-30 14:19:31', '2022-12-30 14:19:31', NULL),
(22, 'Ecouter sans fil', NULL, '2023-03-25 12:37:20', '2023-03-25 12:37:20', NULL),
(23, 'Modem', 1, '2023-05-09 23:40:32', '2023-05-09 23:40:32', NULL),
(24, 'Modem', 1, '2023-05-09 23:58:10', '2023-05-09 23:58:10', NULL),
(25, 'Routeur Internet', 1, '2023-05-10 17:38:01', '2023-05-10 17:38:01', NULL),
(26, 'Pocket', 3, '2023-10-18 11:29:16', '2023-10-18 11:29:16', NULL),
(27, 'Magic remote', 1, '2023-10-30 10:25:01', '2023-10-30 10:25:01', NULL),
(28, 'car audio wifi', 4, '2023-11-07 14:13:03', '2023-11-07 14:13:03', NULL),
(29, 'Modem', 4, '2023-11-07 15:25:59', '2023-11-07 15:25:59', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `certificat_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `partenaire_id` int(11) DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `renewal_price` double DEFAULT NULL,
  `date_reception` datetime DEFAULT NULL,
  `date_soumission` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `date_cloture` datetime DEFAULT NULL,
  `date_renouv` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `statut_id` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `type` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `client_id`, `certificat_id`, `product_id`, `partenaire_id`, `duree`, `prix`, `renewal_price`, `date_reception`, `date_soumission`, `update_date`, `date_cloture`, `date_renouv`, `description`, `statut_id`, `team_id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 3, 2, 3, 42, NULL, NULL, '2022-11-15 00:00:00', '2022-11-15 00:00:00', '2023-02-10 00:00:00', '2022-12-27 00:00:00', NULL, 'projet facile', NULL, NULL, NULL, '2022-11-15 08:13:36', '2023-02-04 12:09:53', NULL),
(3, 2, 3, 2, 3, 42, NULL, NULL, '2022-11-15 00:00:00', '2022-11-15 00:00:00', '2023-02-10 00:00:00', '2022-12-27 00:00:00', NULL, 'projet facile', NULL, NULL, NULL, '2022-11-15 08:13:36', '2023-02-04 13:39:08', NULL),
(4, 1, 2, 1, 2, 14, 950, NULL, '2022-12-29 16:52:17', '0022-12-29 16:52:17', '2022-12-30 16:52:17', '0023-01-12 16:52:17', NULL, 'texte', NULL, NULL, NULL, '2022-12-29 14:34:01', '2022-12-29 15:52:17', NULL),
(5, 3, 3, 2, 3, 42, 1450, NULL, '2022-12-29 16:51:30', '0022-12-29 16:51:30', '2022-12-30 16:51:30', '0023-02-09 16:51:30', NULL, 'texte', NULL, NULL, NULL, '2022-12-29 14:35:33', '2022-12-29 15:51:30', NULL),
(6, 1, 3, 1, 3, 42, 1450, NULL, '2022-12-29 16:11:36', '2022-12-29 16:11:36', '2022-12-30 16:11:36', '2023-02-09 16:11:36', NULL, 'test description', NULL, NULL, NULL, '2022-12-29 15:11:36', '2022-12-29 15:11:36', NULL),
(7, 3, 3, 2, 3, 42, 1450, NULL, '2022-12-29 16:50:11', '0022-12-29 16:50:11', '2022-12-30 16:50:11', '0023-02-09 16:50:11', NULL, 'texte', NULL, NULL, NULL, '2022-12-29 15:50:11', '2022-12-29 15:50:11', NULL),
(8, 1, 2, 1, 2, 14, 950, NULL, '2023-01-28 13:04:45', '2023-01-29 13:04:45', '2023-02-03 13:04:45', '2023-02-12 13:04:45', NULL, 'test', NULL, NULL, NULL, '2023-01-29 12:04:45', '2023-02-04 14:29:08', '2023-02-04 14:29:08'),
(9, 1, 3, 2, 3, 42, 1450, NULL, '2023-01-28 15:01:49', '2023-01-29 15:01:49', '2023-02-03 15:01:49', '2023-03-12 15:01:49', NULL, 'test du projet', NULL, NULL, NULL, '2023-01-29 16:25:01', '2023-02-04 14:19:17', '2023-02-04 14:19:17'),
(10, 3, 3, 2, 3, 42, 1450, NULL, '2023-02-15 17:21:36', '2023-02-16 17:21:36', '2023-02-17 17:21:36', '2023-03-30 17:21:36', NULL, 'hewhje\r\nfhghfhgk', NULL, NULL, NULL, '2023-02-16 16:21:36', '2023-02-16 16:21:36', NULL),
(11, 4, 2, 13, 2, 4, 950, NULL, '2023-03-25 14:37:38', '2023-03-26 14:37:38', '2023-03-31 14:37:38', '2023-04-09 14:37:38', NULL, 'test', NULL, NULL, NULL, '2023-03-25 13:37:38', '2023-03-25 13:37:38', NULL),
(12, 13, 4, 14, 5, 7, 500, NULL, '2023-05-08 20:07:11', '2023-05-10 20:07:11', '2023-05-26 00:00:00', '2023-05-17 20:07:11', NULL, 'test', NULL, 1, NULL, '2023-05-10 19:07:11', '2023-05-21 15:15:01', NULL),
(13, 15, 20, 18, 7, 28, 600, NULL, '2023-10-30 11:42:14', '2023-10-31 11:42:14', '2023-11-03 11:42:14', '2023-11-28 11:42:14', NULL, NULL, NULL, 1, NULL, '2023-10-30 10:42:14', '2023-10-30 10:42:14', NULL),
(14, 16, 22, 19, 8, 14, 500, NULL, '2023-11-01 11:15:44', '2023-11-03 11:15:44', '2024-01-05 11:15:44', '2023-11-17 11:15:44', NULL, NULL, NULL, 4, 'B', '2023-11-07 14:46:56', '2024-01-04 10:15:44', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `project_statuts`
--

CREATE TABLE `project_statuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `project_statuts`
--

INSERT INTO `project_statuts` (`id`, `titre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'En cours', '2023-04-02 17:09:42', '2023-04-02 17:09:42', NULL),
(2, 'Terminé', '2023-04-02 17:09:42', '2023-04-02 17:09:42', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `puissances`
--

CREATE TABLE `puissances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `puisance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `puissances`
--

INSERT INTO `puissances` (`id`, `puisance`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '100 mw', NULL, '2022-11-15 07:59:32', '2022-11-15 07:59:32', NULL),
(2, '12W', NULL, '2022-11-15 12:31:01', '2022-11-15 12:31:01', NULL),
(3, '2', NULL, '2022-12-30 14:18:10', '2022-12-30 14:18:10', NULL),
(4, '2', NULL, '2022-12-30 14:19:31', '2022-12-30 14:19:31', NULL),
(5, '11W', NULL, '2022-12-30 14:55:02', '2022-12-30 14:55:02', NULL),
(6, '500MO /s', 1, '2023-05-09 23:58:11', '2023-05-09 23:58:11', NULL),
(7, '100MO /s', 1, '2023-05-10 17:38:02', '2023-05-10 17:38:02', NULL),
(8, '4G', 3, '2023-10-18 11:29:17', '2023-10-18 11:29:17', NULL),
(9, '1.9dbm', 4, '2023-11-07 15:26:00', '2023-11-07 15:26:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `renouvellables`
--

CREATE TABLE `renouvellables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `renouvellable_type` varchar(255) DEFAULT NULL,
  `renouvellable_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `old_prix` float DEFAULT NULL,
  `new_prix` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `revisions`
--

CREATE TABLE `revisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `revisionable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisionable_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8mb4_unicode_ci,
  `new_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `revisions`
--

INSERT INTO `revisions` (`id`, `revisionable_type`, `revisionable_id`, `user_id`, `key`, `old_value`, `new_value`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Customer', 7, 1, 'created_at', NULL, '2023-05-07 18:47:54', '2023-05-07 17:47:54', '2023-05-07 17:47:54'),
(2, 'App\\Models\\Customer', 8, 1, 'created_at', NULL, '2023-05-07 18:48:33', '2023-05-07 17:48:33', '2023-05-07 17:48:33'),
(3, 'App\\Models\\Certificat', 4, 1, 'created_at', NULL, '2023-05-09 23:31:00', '2023-05-09 22:31:00', '2023-05-09 22:31:00'),
(4, 'App\\Models\\Partenaire', 5, 1, 'created_at', NULL, '2023-05-09 23:56:16', '2023-05-09 22:56:16', '2023-05-09 22:56:16'),
(5, 'App\\Models\\Product', 14, 1, 'created_at', NULL, '2023-05-10 00:58:11', '2023-05-09 23:58:11', '2023-05-09 23:58:11'),
(6, 'App\\Models\\Customer', 1, 1, 'created_at', NULL, '2023-05-10 01:27:23', '2023-05-10 00:27:23', '2023-05-10 00:27:23'),
(7, 'App\\Models\\Product', 15, 1, 'created_at', NULL, '2023-05-10 12:10:35', '2023-05-10 11:10:35', '2023-05-10 11:10:35'),
(8, 'App\\Models\\Product', 14, 1, 'created_at', '2023-05-10 00:58:11', NULL, '2023-05-10 11:11:33', '2023-05-10 11:11:33'),
(9, 'App\\Models\\Product', 15, 1, 'created_at', '2023-05-10 12:10:35', NULL, '2023-05-10 11:16:24', '2023-05-10 11:16:24'),
(10, 'App\\Models\\Product', 16, 1, 'created_at', NULL, '2023-05-10 12:18:11', '2023-05-10 11:18:11', '2023-05-10 11:18:11'),
(11, 'App\\Models\\Product', 17, 1, 'created_at', NULL, '2023-05-10 12:19:07', '2023-05-10 11:19:07', '2023-05-10 11:19:07'),
(12, 'App\\Models\\Product', 16, 1, 'created_at', '2023-05-10 12:18:11', NULL, '2023-05-10 11:20:07', '2023-05-10 11:20:07'),
(13, 'App\\Models\\Product', 18, 1, 'created_at', NULL, '2023-05-10 12:23:24', '2023-05-10 11:23:24', '2023-05-10 11:23:24'),
(14, 'App\\Models\\Product', 17, 1, 'created_at', '2023-05-10 12:19:07', NULL, '2023-05-10 11:28:00', '2023-05-10 11:28:00'),
(15, 'App\\Models\\Product', 18, 1, 'created_at', '2023-05-10 12:23:24', NULL, '2023-05-10 11:28:00', '2023-05-10 11:28:00'),
(16, 'App\\Models\\Customer', 2, 1, 'created_at', NULL, '2023-05-10 13:44:47', '2023-05-10 12:44:47', '2023-05-10 12:44:47'),
(17, 'App\\Models\\Customer', 3, 1, 'created_at', NULL, '2023-05-10 13:48:53', '2023-05-10 12:48:53', '2023-05-10 12:48:53'),
(18, 'App\\Models\\Customer', 4, 1, 'created_at', NULL, '2023-05-10 13:58:29', '2023-05-10 12:58:29', '2023-05-10 12:58:29'),
(19, 'App\\Models\\Customer', 5, 1, 'created_at', NULL, '2023-05-10 14:13:33', '2023-05-10 13:13:33', '2023-05-10 13:13:33'),
(20, 'App\\Models\\Customer', 6, 1, 'created_at', NULL, '2023-05-10 14:14:54', '2023-05-10 13:14:54', '2023-05-10 13:14:54'),
(21, 'App\\Models\\Customer', 7, 1, 'created_at', NULL, '2023-05-10 14:19:03', '2023-05-10 13:19:03', '2023-05-10 13:19:03'),
(22, 'App\\Models\\Customer', 8, 1, 'created_at', NULL, '2023-05-10 14:21:23', '2023-05-10 13:21:23', '2023-05-10 13:21:23'),
(23, 'App\\Models\\Customer', 9, 1, 'created_at', NULL, '2023-05-10 14:21:47', '2023-05-10 13:21:47', '2023-05-10 13:21:47'),
(24, 'App\\Models\\Customer', 10, 1, 'created_at', NULL, '2023-05-10 14:29:24', '2023-05-10 13:29:24', '2023-05-10 13:29:24'),
(25, 'App\\Models\\Customer', 11, 1, 'created_at', NULL, '2023-05-10 14:31:54', '2023-05-10 13:31:54', '2023-05-10 13:31:54'),
(26, 'App\\Models\\Customer', 12, 1, 'created_at', NULL, '2023-05-10 14:34:37', '2023-05-10 13:34:37', '2023-05-10 13:34:37'),
(27, 'App\\Models\\Customer', 1, 1, 'deleted_at', NULL, '2023-05-10 14:40:48', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(28, 'App\\Models\\Customer', 2, 1, 'deleted_at', NULL, '2023-05-10 14:40:48', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(29, 'App\\Models\\Customer', 3, 1, 'deleted_at', NULL, '2023-05-10 14:40:48', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(30, 'App\\Models\\Customer', 4, 1, 'deleted_at', NULL, '2023-05-10 14:40:48', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(31, 'App\\Models\\Customer', 5, 1, 'deleted_at', NULL, '2023-05-10 14:40:48', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(32, 'App\\Models\\Customer', 6, 1, 'deleted_at', NULL, '2023-05-10 14:40:48', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(33, 'App\\Models\\Customer', 7, 1, 'deleted_at', NULL, '2023-05-10 14:40:48', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(34, 'App\\Models\\Customer', 8, 1, 'deleted_at', NULL, '2023-05-10 14:40:48', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(35, 'App\\Models\\Customer', 9, 1, 'deleted_at', NULL, '2023-05-10 14:40:48', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(36, 'App\\Models\\Customer', 10, 1, 'deleted_at', NULL, '2023-05-10 14:40:48', '2023-05-10 13:40:48', '2023-05-10 13:40:48'),
(37, 'App\\Models\\Customer', 11, 1, 'deleted_at', NULL, '2023-05-10 14:48:47', '2023-05-10 13:48:47', '2023-05-10 13:48:47'),
(38, 'App\\Models\\Customer', 12, 1, 'deleted_at', NULL, '2023-05-10 14:48:47', '2023-05-10 13:48:47', '2023-05-10 13:48:47'),
(39, 'App\\Models\\Certificat', 5, 1, 'created_at', NULL, '2023-05-10 17:57:39', '2023-05-10 16:57:39', '2023-05-10 16:57:39'),
(40, 'App\\Models\\Certificat', 6, 1, 'created_at', NULL, '2023-05-10 17:59:40', '2023-05-10 16:59:40', '2023-05-10 16:59:40'),
(41, 'App\\Models\\Certificat', 7, 1, 'created_at', NULL, '2023-05-10 18:02:36', '2023-05-10 17:02:36', '2023-05-10 17:02:36'),
(42, 'App\\Models\\Certificat', 8, 1, 'created_at', NULL, '2023-05-10 18:03:39', '2023-05-10 17:03:39', '2023-05-10 17:03:39'),
(43, 'App\\Models\\Certificat', 9, 1, 'created_at', NULL, '2023-05-10 18:05:23', '2023-05-10 17:05:24', '2023-05-10 17:05:24'),
(44, 'App\\Models\\Certificat', 10, 1, 'created_at', NULL, '2023-05-10 18:05:52', '2023-05-10 17:05:53', '2023-05-10 17:05:53'),
(45, 'App\\Models\\Certificat', 11, 1, 'created_at', NULL, '2023-05-10 18:06:09', '2023-05-10 17:06:09', '2023-05-10 17:06:09'),
(46, 'App\\Models\\Certificat', 12, 1, 'created_at', NULL, '2023-05-10 18:07:24', '2023-05-10 17:07:24', '2023-05-10 17:07:24'),
(47, 'App\\Models\\Certificat', 13, 1, 'created_at', NULL, '2023-05-10 18:08:12', '2023-05-10 17:08:12', '2023-05-10 17:08:12'),
(48, 'App\\Models\\Certificat', 14, 1, 'created_at', NULL, '2023-05-10 18:08:57', '2023-05-10 17:08:57', '2023-05-10 17:08:57'),
(49, 'App\\Models\\Certificat', 15, 1, 'created_at', NULL, '2023-05-10 18:09:44', '2023-05-10 17:09:44', '2023-05-10 17:09:44'),
(50, 'App\\Models\\Certificat', 16, 1, 'created_at', NULL, '2023-05-10 18:10:37', '2023-05-10 17:10:37', '2023-05-10 17:10:37'),
(51, 'App\\Models\\Certificat', 17, 1, 'created_at', NULL, '2023-05-10 18:11:56', '2023-05-10 17:11:56', '2023-05-10 17:11:56'),
(52, 'App\\Models\\Certificat', 18, 1, 'created_at', NULL, '2023-05-10 18:12:20', '2023-05-10 17:12:20', '2023-05-10 17:12:20'),
(53, 'App\\Models\\Certificat', 5, 1, 'created_at', '2023-05-10 17:57:39', NULL, '2023-05-10 17:27:47', '2023-05-10 17:27:47'),
(54, 'App\\Models\\Certificat', 6, 1, 'created_at', '2023-05-10 17:59:40', NULL, '2023-05-10 17:27:47', '2023-05-10 17:27:47'),
(55, 'App\\Models\\Certificat', 7, 1, 'created_at', '2023-05-10 18:02:36', NULL, '2023-05-10 17:27:47', '2023-05-10 17:27:47'),
(56, 'App\\Models\\Certificat', 8, 1, 'created_at', '2023-05-10 18:03:39', NULL, '2023-05-10 17:27:47', '2023-05-10 17:27:47'),
(57, 'App\\Models\\Certificat', 9, 1, 'created_at', '2023-05-10 18:05:23', NULL, '2023-05-10 17:27:47', '2023-05-10 17:27:47'),
(58, 'App\\Models\\Certificat', 10, 1, 'created_at', '2023-05-10 18:05:52', NULL, '2023-05-10 17:27:47', '2023-05-10 17:27:47'),
(59, 'App\\Models\\Certificat', 11, 1, 'created_at', '2023-05-10 18:06:09', NULL, '2023-05-10 17:27:47', '2023-05-10 17:27:47'),
(60, 'App\\Models\\Certificat', 12, 1, 'created_at', '2023-05-10 18:07:24', NULL, '2023-05-10 17:27:47', '2023-05-10 17:27:47'),
(61, 'App\\Models\\Certificat', 13, 1, 'created_at', '2023-05-10 18:08:12', NULL, '2023-05-10 17:27:47', '2023-05-10 17:27:47'),
(62, 'App\\Models\\Certificat', 14, 1, 'created_at', '2023-05-10 18:08:57', NULL, '2023-05-10 17:29:10', '2023-05-10 17:29:10'),
(63, 'App\\Models\\Certificat', 15, 1, 'created_at', '2023-05-10 18:09:44', NULL, '2023-05-10 17:29:10', '2023-05-10 17:29:10'),
(64, 'App\\Models\\Certificat', 16, 1, 'created_at', '2023-05-10 18:10:37', NULL, '2023-05-10 17:29:10', '2023-05-10 17:29:10'),
(65, 'App\\Models\\Certificat', 17, 1, 'created_at', '2023-05-10 18:11:56', NULL, '2023-05-10 17:29:10', '2023-05-10 17:29:10'),
(66, 'App\\Models\\Product', 14, 1, 'created_at', NULL, '2023-05-10 18:38:02', '2023-05-10 17:38:02', '2023-05-10 17:38:02'),
(67, 'App\\Models\\Product', 15, 1, 'created_at', NULL, '2023-05-10 18:42:00', '2023-05-10 17:42:00', '2023-05-10 17:42:00'),
(68, 'App\\Models\\Product', 16, 1, 'created_at', NULL, '2023-05-10 18:44:26', '2023-05-10 17:44:27', '2023-05-10 17:44:27'),
(69, 'App\\Models\\Product', 15, 1, 'created_at', '2023-05-10 18:42:00', NULL, '2023-05-10 17:44:37', '2023-05-10 17:44:37'),
(70, 'App\\Models\\Customer', 13, 1, 'created_at', NULL, '2023-05-10 19:14:55', '2023-05-10 18:14:55', '2023-05-10 18:14:55'),
(71, 'App\\Models\\Project', 12, 1, 'created_at', NULL, '2023-05-10 20:07:11', '2023-05-10 19:07:11', '2023-05-10 19:07:11'),
(72, 'App\\Models\\Project', 12, 1, 'update_date', '2023-05-12 20:07:11', '2023-05-26 00:00:00', '2023-05-21 15:15:01', '2023-05-21 15:15:01'),
(73, 'App\\Models\\Customer', 14, 2, 'created_at', NULL, '2023-10-18 12:22:31', '2023-10-18 11:22:31', '2023-10-18 11:22:31'),
(74, 'App\\Models\\Product', 17, 2, 'created_at', NULL, '2023-10-18 12:29:17', '2023-10-18 11:29:17', '2023-10-18 11:29:17'),
(75, 'App\\Models\\Certificat', 19, 2, 'created_at', NULL, '2023-10-18 12:37:06', '2023-10-18 11:37:06', '2023-10-18 11:37:06'),
(76, 'App\\Models\\Partenaire', 6, 2, 'created_at', NULL, '2023-10-18 12:44:26', '2023-10-18 11:44:26', '2023-10-18 11:44:26'),
(77, 'App\\Models\\Customer', 15, 1, 'created_at', NULL, '2023-10-30 10:43:32', '2023-10-30 09:43:32', '2023-10-30 09:43:32'),
(78, 'App\\Models\\Product', 18, 1, 'created_at', NULL, '2023-10-30 11:25:02', '2023-10-30 10:25:02', '2023-10-30 10:25:02'),
(79, 'App\\Models\\Certificat', 20, 1, 'created_at', NULL, '2023-10-30 11:29:38', '2023-10-30 10:29:38', '2023-10-30 10:29:38'),
(80, 'App\\Models\\Partenaire', 7, 1, 'created_at', NULL, '2023-10-30 11:34:31', '2023-10-30 10:34:31', '2023-10-30 10:34:31'),
(81, 'App\\Models\\Project', 13, 1, 'created_at', NULL, '2023-10-30 11:42:14', '2023-10-30 10:42:14', '2023-10-30 10:42:14'),
(82, 'App\\Models\\Customer', 16, 1, 'created_at', NULL, '2023-11-07 15:01:02', '2023-11-07 14:01:02', '2023-11-07 14:01:02'),
(83, 'App\\Models\\Customer', 16, 1, 'contrat', NULL, '[{\"download_link\":\"customers\\/November2023\\/ks625OufyWK2730XVabb.pdf\",\"original_name\":\"_storage_app_public_documents_mydoc.pdf\"}]', '2023-11-07 14:07:44', '2023-11-07 14:07:44'),
(84, 'App\\Models\\Customer', 16, 1, 'nda', NULL, '[{\"download_link\":\"customers\\/November2023\\/qDBb3lTvJiNT8qfz92dd.pdf\",\"original_name\":\"5-Article Text-29-1-10-20230126.pdf\"}]', '2023-11-07 14:07:44', '2023-11-07 14:07:44'),
(85, 'App\\Models\\Customer', 16, 1, 'description', NULL, 'en attente d\'un retour favorable', '2023-11-07 14:07:44', '2023-11-07 14:07:44'),
(86, 'App\\Models\\Product', 19, 1, 'created_at', NULL, '2023-11-07 15:19:28', '2023-11-07 14:19:28', '2023-11-07 14:19:28'),
(87, 'App\\Models\\Certificat', 21, 1, 'created_at', NULL, '2023-11-07 15:24:38', '2023-11-07 14:24:38', '2023-11-07 14:24:38'),
(88, 'App\\Models\\Partenaire', 8, 1, 'created_at', NULL, '2023-11-07 15:31:14', '2023-11-07 14:31:14', '2023-11-07 14:31:14'),
(89, 'App\\Models\\Certificat', 22, 1, 'created_at', NULL, '2023-11-07 15:36:07', '2023-11-07 14:36:07', '2023-11-07 14:36:07'),
(90, 'App\\Models\\Project', 14, 1, 'created_at', NULL, '2023-11-07 15:46:56', '2023-11-07 14:46:57', '2023-11-07 14:46:57'),
(91, 'App\\Models\\Partenaire', 8, 1, 'mode_id', '1', NULL, '2023-11-07 14:48:20', '2023-11-07 14:48:20'),
(92, 'App\\Models\\Partenaire', 8, 1, 'paiement_attributs', '{\"nom_bank\":\"Equity\",\"adresse_bank\":\"louandfg\",\"code_swift\":\"6543\",\"num_compte\":\"1345\",\"nom_beneficiaire\":\"merveille\"}', '{\"nom_beneficiaire\":\"merveille\",\"phone_beneficiaire\":null}', '2023-11-07 14:48:20', '2023-11-07 14:48:20'),
(93, 'App\\Models\\Customer', 17, 1, 'created_at', NULL, '2023-11-07 16:15:30', '2023-11-07 15:15:30', '2023-11-07 15:15:30'),
(94, 'App\\Models\\Product', 20, 1, 'created_at', NULL, '2023-11-07 16:26:00', '2023-11-07 15:26:00', '2023-11-07 15:26:00'),
(95, 'App\\Models\\Product', 20, 1, 'description', 'test', 'test test', '2023-11-07 15:26:41', '2023-11-07 15:26:41'),
(96, 'App\\Models\\Certificat', 23, 1, 'created_at', NULL, '2023-11-07 16:34:16', '2023-11-07 15:34:17', '2023-11-07 15:34:17'),
(97, 'App\\Models\\Customer', 18, 2, 'created_at', NULL, '2023-11-29 14:00:44', '2023-11-29 13:00:44', '2023-11-29 13:00:44'),
(98, 'App\\Models\\Customer', 18, 2, 'deleted_at', NULL, '2023-11-29 14:09:55', '2023-11-29 13:09:55', '2023-11-29 13:09:55'),
(99, 'App\\Models\\Product', 17, 2, 'description', 'Un bon modem', 'Un bon modem 2', '2023-11-29 13:11:20', '2023-11-29 13:11:20'),
(100, 'App\\Models\\Product', 17, 2, 'description', 'Un bon modem 2', 'Un bon modem', '2023-11-29 13:19:03', '2023-11-29 13:19:03'),
(101, 'App\\Models\\Project', 14, 1, 'partenaire_id', '8', NULL, '2024-01-03 12:43:56', '2024-01-03 12:43:56'),
(102, 'App\\Models\\Project', 14, 1, 'date_reception', '2023-11-01 15:46:56', '2023-11-01 13:43:56', '2024-01-03 12:43:56', '2024-01-03 12:43:56'),
(103, 'App\\Models\\Project', 14, 1, 'date_soumission', '2023-11-03 15:46:56', '2023-11-03 13:43:56', '2024-01-03 12:43:56', '2024-01-03 12:43:56'),
(104, 'App\\Models\\Project', 14, 1, 'update_date', '2023-11-10 15:46:56', '2024-01-05 13:43:56', '2024-01-03 12:43:56', '2024-01-03 12:43:56'),
(105, 'App\\Models\\Project', 14, 1, 'date_cloture', '2023-11-17 15:46:56', '2023-11-17 13:43:56', '2024-01-03 12:43:56', '2024-01-03 12:43:56'),
(106, 'App\\Models\\Partenaire', 8, 1, 'mode_id', NULL, '2', '2024-01-03 12:51:49', '2024-01-03 12:51:49'),
(107, 'App\\Models\\Partenaire', 8, 1, 'paiement_attributs', '{\"nom_beneficiaire\":\"merveille\",\"phone_beneficiaire\":null}', '{\"nom_beneficiaire\":\"merveille\",\"phone_beneficiaire\":\"098986873\"}', '2024-01-03 12:51:49', '2024-01-03 12:51:49'),
(108, 'App\\Models\\Project', 14, 1, 'partenaire_id', NULL, '8', '2024-01-04 10:15:44', '2024-01-04 10:15:44'),
(109, 'App\\Models\\Project', 14, 1, 'date_reception', '2023-11-01 13:43:56', '2023-11-01 11:15:44', '2024-01-04 10:15:44', '2024-01-04 10:15:44'),
(110, 'App\\Models\\Project', 14, 1, 'date_soumission', '2023-11-03 13:43:56', '2023-11-03 11:15:44', '2024-01-04 10:15:44', '2024-01-04 10:15:44'),
(111, 'App\\Models\\Project', 14, 1, 'update_date', '2024-01-05 13:43:56', '2024-01-05 11:15:44', '2024-01-04 10:15:44', '2024-01-04 10:15:44'),
(112, 'App\\Models\\Project', 14, 1, 'date_cloture', '2023-11-17 13:43:56', '2023-11-17 11:15:44', '2024-01-04 10:15:44', '2024-01-04 10:15:44');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `key` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `team_id`, `key`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'Administrateur', 'web', 'L\'administrateur de l\'entreprise', '2023-05-13 16:11:48', '2023-05-13 16:11:48'),
(2, 1, 'SG', 'Secrétaire général', 'web', 'le secrétaire général de l\'entreprise', '2023-05-13 15:56:53', '2023-05-13 15:56:53'),
(3, 1, 'Edite', 'Editeur', 'web', 'l\'éditeur', '2023-05-13 16:03:07', '2023-05-13 16:03:07'),
(4, 2, 'admin', 'Administrateur', 'web', NULL, '2023-06-18 10:56:09', '2023-06-18 10:56:09'),
(5, 3, 'admin', 'Administrateur', 'web', NULL, '2023-06-20 16:19:36', '2023-06-20 16:19:36'),
(6, 3, 'DRH', 'Directeur ressources humaine', 'web', 'Chargé de la gestion des carrières des agents de l\'entreprise', '2023-06-30 20:05:10', '2023-06-30 20:05:11'),
(7, 4, 'admin', 'Administrateur', 'web', NULL, '2023-11-07 13:56:54', '2023-11-07 13:56:54');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 4),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(14, 5),
(15, 5),
(16, 5),
(2, 6),
(3, 6),
(4, 6),
(5, 6),
(6, 6),
(7, 6),
(8, 6),
(9, 6),
(10, 6),
(11, 6),
(12, 6),
(13, 6),
(14, 6),
(15, 6),
(16, 6),
(1, 7),
(2, 7),
(3, 7),
(4, 7),
(5, 7),
(6, 7),
(7, 7),
(8, 7),
(9, 7),
(10, 7),
(11, 7),
(12, 7),
(16, 7),
(17, 7);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `direction_id` bigint(20) DEFAULT NULL,
  `departement_id` bigint(20) DEFAULT NULL,
  `division_id` bigint(20) DEFAULT NULL,
  `reponsable_id` bigint(20) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text,
  `statut_id` bigint(20) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rkNvP8EJPzB27EJ5TBIeOCuUAnGslno5K7xHJmXc', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:121.0) Gecko/20100101 Firefox/121.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoid3RNMGNEdFNvd1FuMnQyaFYzOFoyU1dLbDFNRWI4OHhyOG9za28yNyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcHJvamVjdHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJENxRTZEbEtsRGJyYjVnRmJpdVNIUnVtdHFuc2dzT3lKS2V3UC5zb01zRTNZbHBmZWVrMzJPIjt9', 1704366990);

-- --------------------------------------------------------

--
-- Structure de la table `societes`
--

CREATE TABLE `societes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `societes`
--

INSERT INTO `societes` (`id`, `nom`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aga', 1, '2023-05-09 22:56:16', '2023-05-09 22:56:16', NULL),
(2, 'Conftech SA', 1, '2023-05-10 12:44:47', '2023-05-10 12:44:47', NULL),
(3, 'CTC', 3, '2023-10-18 11:22:26', '2023-10-18 11:22:26', NULL),
(4, 'Aga', 3, '2023-10-18 11:44:25', '2023-10-18 11:44:25', NULL),
(5, 'NewTech', 1, '2023-10-30 09:43:29', '2023-10-30 09:43:29', NULL),
(6, 'approval gate for Africa', 4, '2023-11-07 14:01:02', '2023-11-07 14:01:02', NULL),
(7, 'tsc', 4, '2023-11-07 14:31:14', '2023-11-07 14:31:14', NULL),
(8, 'NewTech', 4, '2023-11-07 15:15:27', '2023-11-07 15:15:27', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `statuts`
--

CREATE TABLE `statuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_updated_at` int(11) DEFAULT NULL,
  `id_deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `statuts`
--

INSERT INTO `statuts` (`id`, `libelle`, `team_id`, `created_at`, `updated_at`, `deleted_at`, `id_updated_at`, `id_deleted_at`) VALUES
(1, 'Active', NULL, '2023-01-22 00:05:45', '2023-01-22 00:05:45', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

CREATE TABLE `taches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `statut_id` bigint(20) UNSIGNED DEFAULT '1',
  `tache_statut_id` bigint(20) DEFAULT '1',
  `priorite_id` bigint(20) DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pourcentage` int(11) DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `taches`
--

INSERT INTO `taches` (`id`, `user_id`, `statut_id`, `tache_statut_id`, `priorite_id`, `titre`, `pourcentage`, `description`, `date_debut`, `date_fin`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 2, 1, 'Test', 1, '<p>test</p>', '2023-07-22', '2023-07-23', 1, '2023-07-22 20:28:23', '2023-09-11 21:13:18', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `taches_statuts`
--

CREATE TABLE `taches_statuts` (
  `id` bigint(20) NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `taches_statuts`
--

INSERT INTO `taches_statuts` (`id`, `titre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Initial', '2022-11-29 15:53:15', '2022-11-29 15:53:15', NULL),
(2, 'En cours', '2022-11-29 15:53:15', '2022-11-29 15:53:15', NULL),
(3, 'Fini', '2022-11-29 15:53:15', '2022-11-29 15:53:15', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tache_documents`
--

CREATE TABLE `tache_documents` (
  `id` bigint(20) NOT NULL,
  `tache_id` bigint(20) NOT NULL,
  `document_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tache_documents`
--

INSERT INTO `tache_documents` (`id`, `tache_id`, `document_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023-07-22 21:28:23', '2023-07-22 21:28:23');

-- --------------------------------------------------------

--
-- Structure de la table `tache_objectifs`
--

CREATE TABLE `tache_objectifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tache_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tache_objectifs`
--

INSERT INTO `tache_objectifs` (`id`, `libelle`, `statut`, `created_at`, `updated_at`, `tache_id`, `agent_id`, `user_id`) VALUES
(1, 'Manger', '0', '2023-07-22 20:28:23', '2023-07-22 20:28:23', 1, 3, 1),
(2, 'taper', '0', '2023-08-05 16:29:39', '2023-08-05 16:29:39', 1, 8, 1),
(3, 'test', '0', '2023-08-17 23:15:00', '2023-08-17 23:15:00', 1, 9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'Conftech Service', 1, '2023-05-13 16:08:52', '2023-05-13 16:08:52'),
(2, 1, 'Aga', 0, '2023-06-18 10:56:09', '2023-06-18 10:56:09'),
(3, 1, 'Approval service', 0, '2023-06-20 16:19:36', '2023-06-20 16:19:36'),
(4, 1, 'NewTech', 0, '2023-11-07 13:56:53', '2023-11-07 13:56:53');

-- --------------------------------------------------------

--
-- Structure de la table `team_infos`
--

CREATE TABLE `team_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adresse` text,
  `rccm` varchar(80) DEFAULT NULL,
  `idnat` varchar(80) DEFAULT NULL,
  `impot` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `team_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `team_infos`
--

INSERT INTO `team_infos` (`id`, `phone`, `email`, `adresse`, `rccm`, `idnat`, `impot`, `logo`, `team_id`, `created_at`, `updated_at`) VALUES
(1, '081000000', 'info@conftech.com', 'test adresse', '978466', '886566', '568656', 'team_infos/Uv7QLNMkymknnmFN6Nb5ISSu6a8SYix2qAmg6g2V.png', 1, '2023-05-13 16:10:45', '2023-05-13 15:41:39'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2023-06-18 10:56:09', '2023-06-18 10:56:09'),
(3, NULL, 'info@conftech.com', NULL, NULL, NULL, NULL, NULL, 3, '2023-06-20 16:19:36', '2023-06-20 16:19:36'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2023-11-07 13:56:54', '2023-11-07 13:56:54');

-- --------------------------------------------------------

--
-- Structure de la table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `team_user`
--

INSERT INTO `team_user` (`id`, `team_id`, `user_id`, `role`, `created_at`, `updated_at`) VALUES
(3, 1, 3, 'SG', '2023-05-13 17:07:31', '2023-05-14 11:40:26'),
(4, 1, 4, 'Edite', '2023-06-20 16:13:55', '2023-08-17 23:49:10'),
(5, 3, 2, 'DRH', '2023-06-30 20:05:37', '2023-06-30 20:05:37'),
(6, 3, 5, 'DRH', '2023-06-30 20:05:37', '2023-06-30 20:05:37');

-- --------------------------------------------------------

--
-- Structure de la table `types_clients`
--

CREATE TABLE `types_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `types_clients`
--

INSERT INTO `types_clients` (`id`, `nom`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Simple', '2022-07-31 23:32:54', '2022-07-31 23:32:54', NULL),
(2, 'Potentiel', '2022-07-31 23:32:54', '2022-07-31 23:32:54', NULL),
(3, 'Réel', '2022-07-31 23:34:41', '2022-07-31 23:34:41', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_contrats`
--

CREATE TABLE `type_contrats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `statut_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_contrats`
--

INSERT INTO `type_contrats` (`id`, `libelle`, `created_at`, `updated_at`, `user_id`, `statut_id`) VALUES
(1, 'CDD', '2023-02-17 01:43:14', '2023-02-17 01:43:14', NULL, 1),
(2, 'CDI', '2023-02-17 01:43:14', '2023-02-17 01:43:14', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `statut_id`, `created_at`, `updated_at`) VALUES
(1, 'Jean-Louis Dikasa', 'jdikasa@yahoo.com', NULL, '$2y$10$CqE6DlKlDbrb5gFbiuSHRumtqnsgsOyJKewP.soMsE3Ylpfeek32O', NULL, NULL, NULL, 'XITXPks94HqyjPcDWbPCNLWw5Md49Bv1VDp1CYgVdmVmI08MLXqRZQCxOv4s', 4, 'profile-photos/4ghX9susN0nCA8K92jbb8UwkRv1aNBh3e4Kt0WoR.jpg', 1, '2023-04-15 17:40:07', '2024-01-03 12:05:39'),
(2, 'Christian Diki', 'christian@conformitech.com', NULL, '$2y$10$j2L1QJxHtykkb0CekqABweLMgmznu49iO2nzRWR8wVq7joEHvKMA6', NULL, NULL, NULL, 'CokriPbG58swKlf0RlhCZ3qU1Afaa517xR6Uu57CEFh11SB8j9Gsv60RNY9s', 3, NULL, 1, '2023-04-15 17:45:44', '2023-06-30 20:05:37'),
(3, 'Jacky Otamba', 'jackyotamba@gmail.com', NULL, '$2y$10$LjlwNY/Cm.M9irFd5XtOi.idtZb2SlQS6Bv2asZGKJMZG4X4jYXve', NULL, NULL, NULL, 'i90YR3Whh7Sc2KOb610BoqeTWEIFf3anpPJOA2Sivfj1Tzc0V0FmL4w40IDM', 1, 'profile-photos/TuN2SrTkbVvWGDBLqsw4H6EOW3begmpsnCoRQrp1.png', NULL, '2023-05-13 16:44:08', '2023-05-14 12:44:11'),
(4, 'Christian Diki', 'christian2@conformitech.com', NULL, '$2y$10$LsEwDN40gN9Tl1rgJu6XweS4XH7udfzflyzjWQHBuyYbuXlNTkNhe', NULL, NULL, NULL, 'izmNaX2bI5NrhZXC0SWtOJk2XGfJOCkbef2bzQL7K6uYQ0BltoCjb0M7SIxU', 1, NULL, NULL, '2023-06-20 16:12:07', '2023-06-20 16:13:55'),
(5, 'John 2 Doe 2', 'johndoe2@gmail.com', NULL, '$2y$10$keH2fYfTXvh.apa30Z/xo.oWra4RS5MMaR63zg9qo8zyynORV7/j6', NULL, NULL, NULL, NULL, 3, NULL, NULL, '2023-11-29 14:29:36', '2023-11-29 14:29:36'),
(6, 'John 3 Doe 3', 'johndoe3@gmail.com', NULL, '$2y$10$eBMQoLMB35H2G6bAyh.3bu3np2ZuBr42Rz6IPIaD8r.r00MCpTbRG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-29 14:44:24', '2023-11-29 14:44:24');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_matricule` (`matricule`);

--
-- Index pour la table `agent_statuts`
--
ALTER TABLE `agent_statuts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `archive_permissions`
--
ALTER TABLE `archive_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archive_permissions_agent_id_foreign` (`agent_id`);

--
-- Index pour la table `bandes_frequences`
--
ALTER TABLE `bandes_frequences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cartes`
--
ALTER TABLE `cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `carte_types`
--
ALTER TABLE `carte_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `certificats`
--
ALTER TABLE `certificats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `certificats_documents`
--
ALTER TABLE `certificats_documents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `certificats_leads_times`
--
ALTER TABLE `certificats_leads_times`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `certificats_types_echantillons`
--
ALTER TABLE `certificats_types_echantillons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `certificats_types_homologations`
--
ALTER TABLE `certificats_types_homologations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `certificats_validites`
--
ALTER TABLE `certificats_validites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classeurs`
--
ALTER TABLE `classeurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classeurs_reference_unique` (`reference`),
  ADD KEY `classeurs_departement_id_foreign` (`departement_id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentaires_tache_id_foreign` (`tache_id`),
  ADD KEY `commentaires_user_id_foreign` (`user_id`),
  ADD KEY `commentaires_statut_id_foreign` (`statut_id`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conges`
--
ALTER TABLE `conges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conges_user_id_foreign` (`user_id`),
  ADD KEY `conges_statut_id_foreign` (`statut_id`);

--
-- Index pour la table `contacts_people`
--
ALTER TABLE `contacts_people`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contrats_type_contrat_id_foreign` (`type_contrat_id`),
  ADD KEY `contrats_user_id_foreign` (`user_id`),
  ADD KEY `contrats_statut_id_foreign` (`statut_id`);

--
-- Index pour la table `cotations`
--
ALTER TABLE `cotations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers_contacts_people`
--
ALTER TABLE `customers_contacts_people`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departements_statut_id_foreign` (`statut_id`);

--
-- Index pour la table `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `divisions_departement_id_foreign` (`departement_id`),
  ADD KEY `divisions_statut_id_foreign` (`statut_id`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_user_id_foreign` (`user_id`),
  ADD KEY `documents_statut_id_foreign` (`statut_id`);

--
-- Index pour la table `document_followers`
--
ALTER TABLE `document_followers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document_natures`
--
ALTER TABLE `document_natures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document_notes`
--
ALTER TABLE `document_notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document_statuts`
--
ALTER TABLE `document_statuts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dossiers`
--
ALTER TABLE `dossiers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dossiers_reference_unique` (`reference`);

--
-- Index pour la table `dossier_passwords`
--
ALTER TABLE `dossier_passwords`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures_statuts`
--
ALTER TABLE `factures_statuts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `fichiers`
--
ALTER TABLE `fichiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fichiers_tache_id_foreign` (`tache_id`),
  ADD KEY `fichiers_user_id_foreign` (`user_id`),
  ADD KEY `fichiers_statut_id_foreign` (`statut_id`);

--
-- Index pour la table `fonctions`
--
ALTER TABLE `fonctions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modalites`
--
ALTER TABLE `modalites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`team_id`,`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  ADD KEY `model_has_permissions_team_foreign_key_index` (`team_id`),
  ADD KEY `model_has_permissions_permission_id_foreign` (`permission_id`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`team_id`,`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  ADD KEY `model_has_roles_team_foreign_key_index` (`team_id`),
  ADD KEY `model_has_roles_role_id_foreign` (`role_id`);

--
-- Index pour la table `modes_paiements`
--
ALTER TABLE `modes_paiements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `normes`
--
ALTER TABLE `normes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note_etapes`
--
ALTER TABLE `note_etapes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note_statuts`
--
ALTER TABLE `note_statuts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etape_id` (`etape_id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Index pour la table `partenaires`
--
ALTER TABLE `partenaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `pay_transactions`
--
ALTER TABLE `pay_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `pivot_agent_fonctions`
--
ALTER TABLE `pivot_agent_fonctions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pivot_bandes_frequences_products`
--
ALTER TABLE `pivot_bandes_frequences_products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pivot_documents_agents`
--
ALTER TABLE `pivot_documents_agents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pivot_documents_certificats`
--
ALTER TABLE `pivot_documents_certificats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pivot_documents_customers`
--
ALTER TABLE `pivot_documents_customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pivot_documents_notes`
--
ALTER TABLE `pivot_documents_notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pivot_documents_products`
--
ALTER TABLE `pivot_documents_products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pivot_factures_projects`
--
ALTER TABLE `pivot_factures_projects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pivot_partenaires_modalites`
--
ALTER TABLE `pivot_partenaires_modalites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pivot_products_cotations`
--
ALTER TABLE `pivot_products_cotations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pivot_taches_cibles`
--
ALTER TABLE `pivot_taches_cibles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pivot_user_conges`
--
ALTER TABLE `pivot_user_conges`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pivot_user_taches`
--
ALTER TABLE `pivot_user_taches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pivo_normes_products`
--
ALTER TABLE `pivo_normes_products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pivo_puissances_products`
--
ALTER TABLE `pivo_puissances_products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pointages`
--
ALTER TABLE `pointages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pointages_user_id_foreign` (`user_id`),
  ADD KEY `agent_pointage` (`agent_id`);

--
-- Index pour la table `priorites`
--
ALTER TABLE `priorites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products_marques`
--
ALTER TABLE `products_marques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products_models`
--
ALTER TABLE `products_models`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products_status`
--
ALTER TABLE `products_status`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products_types`
--
ALTER TABLE `products_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `project_statuts`
--
ALTER TABLE `project_statuts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `puissances`
--
ALTER TABLE `puissances`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `renouvellables`
--
ALTER TABLE `renouvellables`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `revisions`
--
ALTER TABLE `revisions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_team_id_name_guard_name_unique` (`team_id`,`name`,`guard_name`),
  ADD KEY `roles_team_foreign_key_index` (`team_id`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `societes`
--
ALTER TABLE `societes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `statuts`
--
ALTER TABLE `statuts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `taches`
--
ALTER TABLE `taches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taches_user_id_foreign` (`user_id`);

--
-- Index pour la table `taches_statuts`
--
ALTER TABLE `taches_statuts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tache_documents`
--
ALTER TABLE `tache_documents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tache_objectifs`
--
ALTER TABLE `tache_objectifs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cibles_tache_id_foreign` (`tache_id`),
  ADD KEY `cibles_user_id_foreign` (`user_id`);

--
-- Index pour la table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Index pour la table `team_infos`
--
ALTER TABLE `team_infos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Index pour la table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Index pour la table `types_clients`
--
ALTER TABLE `types_clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_contrats`
--
ALTER TABLE `type_contrats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_contrats_user_id_foreign` (`user_id`),
  ADD KEY `type_contrats_statut_id_foreign` (`statut_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `agent_statuts`
--
ALTER TABLE `agent_statuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `archive_permissions`
--
ALTER TABLE `archive_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `bandes_frequences`
--
ALTER TABLE `bandes_frequences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `cartes`
--
ALTER TABLE `cartes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `carte_types`
--
ALTER TABLE `carte_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `certificats`
--
ALTER TABLE `certificats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `certificats_documents`
--
ALTER TABLE `certificats_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `certificats_leads_times`
--
ALTER TABLE `certificats_leads_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `certificats_types_echantillons`
--
ALTER TABLE `certificats_types_echantillons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `certificats_types_homologations`
--
ALTER TABLE `certificats_types_homologations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `certificats_validites`
--
ALTER TABLE `certificats_validites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `classeurs`
--
ALTER TABLE `classeurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `conges`
--
ALTER TABLE `conges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `contacts_people`
--
ALTER TABLE `contacts_people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `contrats`
--
ALTER TABLE `contrats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `cotations`
--
ALTER TABLE `cotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `customers_contacts_people`
--
ALTER TABLE `customers_contacts_people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `directions`
--
ALTER TABLE `directions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT pour la table `document_followers`
--
ALTER TABLE `document_followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `document_natures`
--
ALTER TABLE `document_natures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `document_notes`
--
ALTER TABLE `document_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `document_statuts`
--
ALTER TABLE `document_statuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `dossiers`
--
ALTER TABLE `dossiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `dossier_passwords`
--
ALTER TABLE `dossier_passwords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `factures_statuts`
--
ALTER TABLE `factures_statuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fichiers`
--
ALTER TABLE `fichiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fonctions`
--
ALTER TABLE `fonctions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `modalites`
--
ALTER TABLE `modalites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `modes_paiements`
--
ALTER TABLE `modes_paiements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `normes`
--
ALTER TABLE `normes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `note_etapes`
--
ALTER TABLE `note_etapes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `note_statuts`
--
ALTER TABLE `note_statuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `partenaires`
--
ALTER TABLE `partenaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `pay_transactions`
--
ALTER TABLE `pay_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pivot_agent_fonctions`
--
ALTER TABLE `pivot_agent_fonctions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `pivot_bandes_frequences_products`
--
ALTER TABLE `pivot_bandes_frequences_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `pivot_documents_agents`
--
ALTER TABLE `pivot_documents_agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `pivot_documents_certificats`
--
ALTER TABLE `pivot_documents_certificats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `pivot_documents_customers`
--
ALTER TABLE `pivot_documents_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `pivot_documents_notes`
--
ALTER TABLE `pivot_documents_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pivot_documents_products`
--
ALTER TABLE `pivot_documents_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `pivot_factures_projects`
--
ALTER TABLE `pivot_factures_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `pivot_partenaires_modalites`
--
ALTER TABLE `pivot_partenaires_modalites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `pivot_products_cotations`
--
ALTER TABLE `pivot_products_cotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `pivot_taches_cibles`
--
ALTER TABLE `pivot_taches_cibles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pivot_user_conges`
--
ALTER TABLE `pivot_user_conges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pivot_user_taches`
--
ALTER TABLE `pivot_user_taches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `pivo_normes_products`
--
ALTER TABLE `pivo_normes_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `pivo_puissances_products`
--
ALTER TABLE `pivo_puissances_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `pointages`
--
ALTER TABLE `pointages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `priorites`
--
ALTER TABLE `priorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `products_marques`
--
ALTER TABLE `products_marques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `products_models`
--
ALTER TABLE `products_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `products_status`
--
ALTER TABLE `products_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products_types`
--
ALTER TABLE `products_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `project_statuts`
--
ALTER TABLE `project_statuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `puissances`
--
ALTER TABLE `puissances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `renouvellables`
--
ALTER TABLE `renouvellables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `revisions`
--
ALTER TABLE `revisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `societes`
--
ALTER TABLE `societes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `statuts`
--
ALTER TABLE `statuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `taches`
--
ALTER TABLE `taches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `taches_statuts`
--
ALTER TABLE `taches_statuts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tache_documents`
--
ALTER TABLE `tache_documents`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tache_objectifs`
--
ALTER TABLE `tache_objectifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `team_infos`
--
ALTER TABLE `team_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `types_clients`
--
ALTER TABLE `types_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `type_contrats`
--
ALTER TABLE `type_contrats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;
