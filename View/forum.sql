-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 23 nov. 2020 à 09:03
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `boards`
--

CREATE TABLE `boards` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `boards`
--

INSERT INTO `boards` (`id`, `name`, `description`) VALUES
(1, 'Event', 'Concerts, festivals, rencontres, showcases');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edition_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `title`, `content`, `creation_date`, `edition_date`, `is_deleted`, `user_id`, `topic_id`) VALUES
(1, 'Clafoutis', 'Il était juste devant moi et je n\'en ai même pas mangé. J\'ai les nerfs !', '2020-11-21 21:45:09', '2020-11-21 20:48:36', 0, 2, NULL),
(3, 'Nouvelles galettes', 'Superbes galettes au chocolat avec des frites', '2020-11-22 18:21:45', '2020-11-21 21:44:37', 0, 24, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `board_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `signature` varchar(50) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `gravatar` tinyint(1) NOT NULL DEFAULT '0',
  `is_connected` tinyint(1) DEFAULT '0',
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `position` varchar(20) NOT NULL DEFAULT 'Membre',
  `topic_id` int(11) DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nickname`, `signature`, `gender`, `gravatar`, `is_connected`, `email`, `password`, `position`, `topic_id`, `message_id`) VALUES
(1, 'MiuMiu', 'MM', 'Autre', 0, 0, 'Miumiu@trucmuch.com', 'P3', '0', NULL, NULL),
(2, 'Maud-Pixel', 'EE', 'Autre', 1, 0, 'leleuxmaud@gmail.com', 'SSSS', 'Membre', NULL, NULL),
(12, 'Maud', 'klj,k', 'Autre', 0, 0, 'maxko@coi.com', 'jou', '0', NULL, NULL),
(15, 'pol', 'pp', 'Autre', 0, 0, 'pp@blop.com', 'ljlj', '0', NULL, NULL),
(23, 'Emilie', 'EE', 'Autre', 1, 0, 'emilie@gmail.com', 'ojoljulv', '1', NULL, NULL),
(24, 'Achouffe', 'AB', 'Autre', 1, 0, 'achouffe19996@gmail.com', '1234', 'Admin', NULL, NULL),
(25, 'Raph', 'RAMS', 'Autre', 0, 0, 'raphael.kasese@gmail.com', '1234', '0', NULL, NULL),
(26, 'Ekalyss', 'EKA', 'Autre', 0, 0, 'pieront.emilie@gmail.com', '1234', '0', NULL, NULL),
(27, 'Maxouf', 'XF', 'Autre', 0, 0, 'maxouf@gmail.com', 'mxfqq', '0', NULL, NULL),
(28, 'Johny', 'Halliday', 'Autre', 0, 0, 'johny@holi.com', '1234', '0', NULL, NULL),
(29, 'Johny', 'mg', 'Autre', 0, 0, 'johni@kilo.com', '1234', '0', NULL, NULL),
(30, 'Babel', 'jgjhg', 'Autre', 0, 0, 'babel@truc.com', '12345', '0', NULL, NULL),
(31, 'poipoi', 'kljklhj', 'Autre', 0, 0, 'jhjh@mail.com', 'HUJKI', '0', NULL, NULL),
(32, 'Bertha', 'BB', 'Autre', 0, 0, 'bb@gmail.com', 'tater', '0', NULL, NULL),
(33, 'jose', 'JI', 'Homme', 0, 0, 'jose@hihi.com', '1234', '0', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `topic_id` (`topic_id`) USING BTREE;

--
-- Index pour la table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `board_id` (`board_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `message_id` (`message_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);

--
-- Contraintes pour la table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`board_id`) REFERENCES `boards` (`id`),
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `message` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`),
  ADD CONSTRAINT `topic` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
