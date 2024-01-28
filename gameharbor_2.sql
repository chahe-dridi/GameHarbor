-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 28 jan. 2024 à 06:11
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gameharbor`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `wallet_id` varchar(50) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `wallet_id`, `registration_date`, `country`, `email`, `password`) VALUES
(15, 'ghada', '', '2024-01-27 17:19:41', '', 'ghada@gmail.com', '$2y$10$qCvaSEy9vbnwX/vIDZ8jTem/mTRRU4kSLp3Oqyn9gZN0zxyy7H2EK'),
(16, 'chaher dridi', '', '2024-01-27 17:28:52', 'Afghanistan', 'chaher@gmail.com', '$2y$10$N6hrZXt8fr.hn91h1WpU/.A81vZcC5278EG.RE.HSFjfkLpDRAdsW'),
(19, 'iheb', '', '2024-01-27 18:49:13', 'Afghanistan', 'c@gmail.com', '$2y$10$Ge/lgaRR4KsEhCtid9sDgurXA/x0tyfgpchGlx.ytVQKvBKesLhQm');

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`game_id`, `game_name`, `description`, `genre`, `price`, `picture`, `id_admin`) VALUES
(1, 'valorant', 'shooting game', 'fps', 2900, 'shop-img-1.jpg', NULL),
(2, 'gta v', '', 'action/adventure', 3000, 'shop-img-3.jpg', NULL),
(3, 'rainbow six seige', 'e', 'fps', 3100, 'shop-img-2.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `publicity_agents`
--

CREATE TABLE `publicity_agents` (
  `agent_id` int(11) NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `wallet_id` varchar(50) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `public_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `publicity_agents`
--

INSERT INTO `publicity_agents` (`agent_id`, `agent_name`, `wallet_id`, `registration_date`, `password`, `public_key`) VALUES
(4, 'achrefe', '', '2024-01-28 03:39:18', '$2y$10$bx3hmBRmYJ/Ka8WYc2E1je9EHHRFBbNaoQJmLG.YyOMaPgOVs/n0C', ''),
(5, 'ch@gmail.com', '', '2024-01-28 05:03:02', '$2y$10$cyBWFDUkfSyUsksHYGEH3O.KoWuac51do/R2JMzWDbm.W2xPQf8wC', '');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name_video` varchar(255) NOT NULL,
  `coins` int(11) NOT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `creation_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `videos`
--

INSERT INTO `videos` (`id`, `name_video`, `coins`, `agent_id`, `creation_timestamp`) VALUES
(1, 'video-1.mp4', 50, 4, '2024-01-28 04:10:48'),
(2, 'video-2.mp4', 0, 4, '2024-01-28 04:10:48'),
(3, 'video-2.mp4', 30, 4, '2024-01-28 04:10:48'),
(6, 'video-5.mp4', 2, 4, '2024-01-28 05:01:06'),
(7, 'video-10.mp4', 100, 5, '2024-01-28 05:03:52');

-- --------------------------------------------------------

--
-- Structure de la table `wallets`
--

CREATE TABLE `wallets` (
  `wallet_id` varchar(50) NOT NULL,
  `balance` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Index pour la table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `fk_admin` (`id_admin`);

--
-- Index pour la table `publicity_agents`
--
ALTER TABLE `publicity_agents`
  ADD PRIMARY KEY (`agent_id`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Index pour la table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`wallet_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `publicity_agents`
--
ALTER TABLE `publicity_agents`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);

--
-- Contraintes pour la table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `publicity_agents` (`agent_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
