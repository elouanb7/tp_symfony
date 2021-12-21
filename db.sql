-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 déc. 2021 à 19:23
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp_symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `soiree`
--

CREATE TABLE `soiree` (
  `id` int(11) NOT NULL,
  `nb_users` int(11) DEFAULT NULL,
  `money_spent` double DEFAULT NULL,
  `average_per_user` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_full` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `soiree`
--

INSERT INTO `soiree` (`id`, `nb_users`, `money_spent`, `average_per_user`, `created_at`, `date`, `creator_id`, `description`, `is_full`) VALUES
(1, NULL, NULL, NULL, '2021-11-02 12:30:00', '2021-11-25 18:59:25', 1, NULL, NULL),
(2, NULL, NULL, NULL, '2021-11-18 22:07:07', '2021-12-15 18:35:37', 1, NULL, NULL),
(3, NULL, NULL, NULL, '2021-11-19 11:47:43', '2021-12-11 02:51:27', 1, NULL, NULL),
(4, NULL, NULL, NULL, '2021-11-05 18:13:29', '2021-12-19 22:29:27', 1, NULL, NULL),
(5, NULL, NULL, NULL, '2021-11-16 11:39:30', '2021-12-09 17:57:49', 2, NULL, NULL),
(6, NULL, NULL, NULL, '2021-11-02 17:35:24', '2021-12-19 00:45:55', 2, NULL, NULL),
(7, NULL, NULL, NULL, '2021-11-06 22:02:00', '2021-12-06 10:38:22', 2, NULL, NULL),
(8, NULL, NULL, NULL, '2021-11-14 01:41:13', '2021-12-05 05:45:00', 2, NULL, NULL),
(9, NULL, NULL, NULL, '2021-11-12 01:03:26', '2021-11-27 08:12:05', 3, NULL, NULL),
(10, NULL, NULL, NULL, '2021-11-10 21:02:52', '2021-12-09 11:07:23', 3, NULL, NULL),
(11, NULL, NULL, NULL, '2021-11-10 00:14:49', '2021-12-09 17:41:55', 3, NULL, NULL),
(12, NULL, NULL, NULL, '2021-11-05 09:28:35', '2021-11-23 08:21:36', 3, NULL, NULL),
(13, NULL, NULL, NULL, '2021-11-18 20:07:00', '2021-12-21 19:10:41', 4, NULL, NULL),
(14, NULL, NULL, NULL, '2021-11-06 01:19:47', '2021-11-25 16:57:06', 4, NULL, NULL),
(15, NULL, NULL, NULL, '2021-11-21 08:09:53', '2021-12-06 22:28:56', 4, NULL, NULL),
(16, NULL, NULL, NULL, '2021-11-01 06:06:17', '2021-12-21 18:36:49', 4, NULL, NULL),
(17, NULL, NULL, NULL, '2021-11-18 02:38:17', '2021-11-26 15:56:17', 5, NULL, NULL),
(18, NULL, NULL, NULL, '2021-11-19 07:37:20', '2021-12-01 08:40:15', 5, NULL, NULL),
(19, NULL, NULL, NULL, '2021-11-16 17:13:47', '2021-12-10 08:32:33', 5, NULL, NULL),
(20, NULL, NULL, NULL, '2021-10-22 11:06:18', '2021-12-18 13:17:44', 5, NULL, NULL),
(21, NULL, NULL, NULL, '2021-11-13 11:29:46', '2021-12-21 13:27:51', 6, NULL, NULL),
(22, NULL, NULL, NULL, '2021-11-08 04:09:31', '2021-11-21 22:42:02', 6, NULL, NULL),
(23, NULL, NULL, NULL, '2021-11-20 01:06:23', '2021-12-09 06:35:55', 6, NULL, NULL),
(24, NULL, NULL, NULL, '2021-11-03 06:26:19', '2021-12-21 10:42:42', 6, NULL, NULL),
(25, NULL, NULL, NULL, '2021-11-03 10:31:17', '2021-12-17 12:39:47', 7, NULL, NULL),
(26, NULL, NULL, NULL, '2021-11-20 17:18:01', '2021-11-28 19:43:18', 7, NULL, NULL),
(27, NULL, NULL, NULL, '2021-10-25 14:07:33', '2021-11-23 04:11:19', 7, NULL, NULL),
(28, NULL, NULL, NULL, '2021-11-15 14:31:33', '2021-12-13 17:14:01', 7, NULL, NULL),
(29, NULL, NULL, NULL, '2021-10-26 07:32:35', '2021-11-23 08:25:15', 8, NULL, NULL),
(30, NULL, NULL, NULL, '2021-11-13 01:51:03', '2021-12-13 14:37:58', 8, NULL, NULL),
(31, NULL, NULL, NULL, '2021-11-14 23:33:50', '2021-12-03 15:25:02', 8, NULL, NULL),
(32, NULL, NULL, NULL, '2021-11-05 17:13:37', '2021-12-16 23:45:02', 8, NULL, NULL),
(33, NULL, NULL, NULL, '2021-11-18 02:14:43', '2021-11-24 13:48:57', 9, NULL, NULL),
(34, NULL, NULL, NULL, '2021-11-02 21:06:36', '2021-11-22 01:53:46', 9, NULL, NULL),
(35, NULL, NULL, NULL, '2021-11-08 17:16:09', '2021-11-25 13:29:58', 9, NULL, NULL),
(36, NULL, NULL, NULL, '2021-11-15 17:10:04', '2021-12-05 01:35:10', 9, NULL, NULL),
(37, NULL, NULL, NULL, '2021-11-08 12:18:40', '2021-12-06 12:49:54', 10, NULL, NULL),
(38, NULL, NULL, NULL, '2021-11-15 22:23:00', '2021-12-13 22:18:53', 10, NULL, NULL),
(39, NULL, NULL, NULL, '2021-11-21 18:02:06', '2021-11-28 07:10:32', 10, NULL, NULL),
(40, NULL, NULL, NULL, '2021-11-10 12:04:16', '2021-11-24 17:12:53', 10, NULL, NULL),
(42, 9, 15, 1.6666666666667, '2021-11-23 08:21:31', '2021-11-26 22:00:00', 1, 'Soiree Mousse', 1),
(43, 6, 0, 0, '2021-11-25 11:41:40', '2021-11-28 21:30:00', 1, 'Soiree Mousse chez Romain', 1),
(44, 3, 65, 21.666666666667, '2021-11-25 11:47:13', '2021-11-25 15:47:00', 1, 'Soiree chez Enzo', 1),
(45, 3, 0, 0, '2021-11-25 12:02:28', '2021-11-25 12:02:00', 1, 'Soiree chez romain', 1),
(46, 4, 0, 0, '2021-11-25 13:08:13', '2026-11-29 23:11:00', 1, 'Soiree chez romain', 1),
(47, NULL, NULL, NULL, '2021-12-16 10:28:08', '2021-12-16 21:00:00', 1, 'Ce soir, Boris est chez lui, c\'est soirée disco', 0),
(48, 1, 0, 0, '2021-12-16 10:35:57', '2021-12-16 10:35:00', 1, 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `prenom`, `nom`, `created_at`) VALUES
(1, 'nchauvin@club-internet.fr', '[\"ROLE_USER\"]', '$2y$13$A3yMRJimamSqvDN5S0MPleCYQHpRf/u0xKPUM6WneHjsFgx91DJzO', 'Alfred', 'Vaillant', '2021-10-10 03:37:35'),
(2, 'zacharie36@chartier.fr', '[\"ROLE_USER\"]', '$2y$13$79foUl5.ofdDDoQKsFmIGuJMfdUfI.HA2sobay3xPh4T28okyaHl.', 'Dominique', 'Langlois', '2021-03-28 18:05:47'),
(3, 'andree.charpentier@noos.fr', '[\"ROLE_USER\"]', '$2y$13$Rm7sAU2YAkle2v8OreQkM.Kt/5B0WSwnb0ON1UH1snl945e4A.t1G', 'Suzanne', 'Caron', '2021-11-19 02:59:35'),
(4, 'maillard.thierry@coulon.com', '[\"ROLE_USER\"]', '$2y$13$2aUV56KkUZzkqnqBrY/vcOTbCrmr0j2PkGtbbRXiDVvbLzHYu4byi', 'Agathe', 'Lenoir', '2021-08-23 21:03:04'),
(5, 'arthur10@henry.com', '[\"ROLE_USER\"]', '$2y$13$IEcr5z4LqnM4qrhFYA0/i.sVFX0a62T92BybiWdy2pPsmWe0Pqk1S', 'Margaux', 'Merle', '2021-10-31 15:02:21'),
(6, 'dmonnier@gillet.com', '[\"ROLE_USER\"]', '$2y$13$/M/Pbg3KeYeEPO2gjZQer.LcaGIz6qs66JNg6PbzSc2YWYLSxuy.y', 'Laetitia', 'Lopez', '2021-06-14 01:03:14'),
(7, 'laurent68@girard.fr', '[\"ROLE_USER\"]', '$2y$13$iH1I7Y.Gqs7RKSpslpX/fuTGm1nYNJDyvelou0PLLIMjjk1kdHbL2', 'Timothée', 'Prevost', '2021-03-20 07:58:04'),
(8, 'aimee.hoarau@vaillant.fr', '[\"ROLE_USER\"]', '$2y$13$m.AOyHS3ae2/M3sOAXvcludY/xDJCaHVdZGDqjQ6Vxm7UU9VnQpuG', 'Alain', 'Faure', '2021-05-11 01:22:38'),
(9, 'nicolas.legoff@free.fr', '[\"ROLE_USER\"]', '$2y$13$oH5tpv9Dn8AVEYpm2fPN2e7HlURuyde88KmpKin2HP0a8oaxnf3je', 'Chantal', 'Vasseur', '2020-12-04 15:03:40'),
(10, 'triou@noos.fr', '[\"ROLE_USER\"]', '$2y$13$zc0.D/31oWZpHqBUxa6LLO3xPZxy5SAEX.4KSuXcfLvnNGxGCPbJ2', 'Michelle', 'Cordier', '2021-01-21 21:06:51');

-- --------------------------------------------------------

--
-- Structure de la table `user_soiree`
--

CREATE TABLE `user_soiree` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `soiree_id` int(11) DEFAULT NULL,
  `is_guest` tinyint(1) DEFAULT NULL,
  `is_host` tinyint(1) DEFAULT NULL,
  `expenses` double DEFAULT NULL,
  `debts` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_soiree`
--

INSERT INTO `user_soiree` (`id`, `user_id`, `soiree_id`, `is_guest`, `is_host`, `expenses`, `debts`) VALUES
(1, 1, 1, 0, 1, NULL, NULL),
(2, 1, 2, 0, 1, NULL, NULL),
(3, 1, 3, 0, 1, NULL, NULL),
(4, 1, 4, 0, 1, NULL, NULL),
(5, 2, 5, 0, 1, NULL, NULL),
(6, 2, 6, 0, 1, NULL, NULL),
(7, 2, 7, 0, 1, NULL, NULL),
(8, 2, 8, 0, 1, NULL, NULL),
(9, 3, 9, 0, 1, NULL, NULL),
(10, 3, 10, 0, 1, NULL, NULL),
(11, 3, 11, 0, 1, NULL, NULL),
(12, 3, 12, 0, 1, NULL, NULL),
(13, 4, 13, 0, 1, NULL, NULL),
(14, 4, 14, 0, 1, NULL, NULL),
(15, 4, 15, 0, 1, NULL, NULL),
(16, 4, 16, 0, 1, NULL, NULL),
(17, 5, 17, 0, 1, NULL, NULL),
(18, 5, 18, 0, 1, NULL, NULL),
(19, 5, 19, 0, 1, NULL, NULL),
(20, 5, 20, 0, 1, NULL, NULL),
(21, 6, 21, 0, 1, NULL, NULL),
(22, 6, 22, 0, 1, NULL, NULL),
(23, 6, 23, 0, 1, NULL, NULL),
(24, 6, 24, 0, 1, NULL, NULL),
(25, 7, 25, 0, 1, NULL, NULL),
(26, 7, 26, 0, 1, NULL, NULL),
(27, 7, 27, 0, 1, NULL, NULL),
(28, 7, 28, 0, 1, NULL, NULL),
(29, 8, 29, 0, 1, NULL, NULL),
(30, 8, 30, 0, 1, NULL, NULL),
(31, 8, 31, 0, 1, NULL, NULL),
(32, 8, 32, 0, 1, NULL, NULL),
(33, 9, 33, 0, 1, NULL, NULL),
(34, 9, 34, 0, 1, NULL, NULL),
(35, 9, 35, 0, 1, NULL, NULL),
(36, 9, 36, 0, 1, NULL, NULL),
(37, 10, 37, 0, 1, NULL, NULL),
(38, 10, 38, 0, 1, NULL, NULL),
(39, 10, 39, 0, 1, NULL, NULL),
(40, 10, 40, 0, 1, NULL, NULL),
(53, 1, 42, 0, 1, 6, -4.3333333333333),
(54, 2, 42, 1, 0, 4, -2.3333333333333),
(55, 3, 42, 1, 0, NULL, 1.6666666666667),
(56, 4, 42, 1, 0, NULL, 1.6666666666667),
(57, 7, 42, 1, 0, 5, -3.3333333333333),
(58, 8, 42, 1, 0, NULL, 1.6666666666667),
(59, 9, 42, 1, 0, NULL, 1.6666666666667),
(60, 5, 42, 1, 0, NULL, 1.6666666666667),
(61, 10, 42, 1, 0, NULL, 1.6666666666667),
(62, 1, 43, 0, 1, NULL, NULL),
(63, 2, 43, 1, 0, NULL, NULL),
(64, 4, 43, 1, 0, NULL, NULL),
(65, 7, 43, 1, 0, NULL, NULL),
(66, 9, 43, 1, 0, NULL, NULL),
(67, 10, 43, 1, 0, NULL, NULL),
(68, 1, 44, 0, 1, 15, 6.6666666666667),
(69, 2, 44, 1, 0, 10, 11.666666666667),
(70, 3, 44, 1, 0, 40, -18.333333333333),
(71, 1, 45, 0, 1, NULL, 0),
(72, 2, 45, 1, 0, NULL, 0),
(73, 4, 45, 1, 0, NULL, 0),
(74, 1, 46, 0, 1, NULL, 0),
(75, 2, 46, 1, 0, NULL, 0),
(76, 3, 46, 1, 0, NULL, 0),
(77, 4, 46, 1, 0, NULL, 0),
(78, 1, 47, 0, 1, NULL, NULL),
(79, 1, 48, 0, 1, NULL, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `soiree`
--
ALTER TABLE `soiree`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Index pour la table `user_soiree`
--
ALTER TABLE `user_soiree`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_764D2BEFA76ED395` (`user_id`),
  ADD KEY `IDX_764D2BEFBA021F7B` (`soiree_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `soiree`
--
ALTER TABLE `soiree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `user_soiree`
--
ALTER TABLE `user_soiree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user_soiree`
--
ALTER TABLE `user_soiree`
  ADD CONSTRAINT `FK_764D2BEFA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_764D2BEFBA021F7B` FOREIGN KEY (`soiree_id`) REFERENCES `soiree` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
