-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Jeu 30 Juin 2016 à 22:55
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `subway`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_repr` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `est_sur`
--

CREATE TABLE `est_sur` (
  `id_station` int(11) NOT NULL,
  `ligne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `est_sur`
--

INSERT INTO `est_sur` (`id_station`, `ligne`) VALUES
(3, 3),
(3, 5),
(3, 8),
(3, 9),
(3, 11),
(4, 1),
(4, 5),
(4, 8);

-- --------------------------------------------------------

--
-- Structure de la table `like_par`
--

CREATE TABLE `like_par` (
  `id` int(11) NOT NULL,
  `id_repr` int(120) NOT NULL,
  `id_user` int(120) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `like_par`
--

INSERT INTO `like_par` (`id`, `id_repr`, `id_user`, `etat`) VALUES
(261, 46, 39, 1),
(263, 46, 40, 1),
(265, 47, 39, 1);

-- --------------------------------------------------------

--
-- Structure de la table `representation`
--

CREATE TABLE `representation` (
  `id` int(11) NOT NULL,
  `nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_artiste` int(11) NOT NULL,
  `station` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `plage_de` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plage_a` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `representation`
--

INSERT INTO `representation` (`id`, `nom`, `description`, `id_artiste`, `station`, `date`, `plage_de`, `plage_a`, `image`) VALUES
(46, 'Yeah!', 'Réservez vos places de théâtre en promotion sur la billetterie TickeTac. Achetez des places de concert et de spectacle à Paris à prix réduit.', 41, 'Trocadero', '19:27:43', 'De 8h', 'A 14h', '1467307663.jpg'),
(47, 'Rock''nChill', 'Réservez vos places de théâtre en promotion sur la billetterie TickeTac. Achetez des places de concert et de spectacle à Paris à prix réduit.', 41, 'Ajouter un lieu (station)', '21:16:58', 'De 15h', 'A 20h', '1467314217.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `station`
--

CREATE TABLE `station` (
  `id` int(11) NOT NULL,
  `nom` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `station`
--

INSERT INTO `station` (`id`, `nom`) VALUES
(3, 'République'),
(4, 'Bastille');

-- --------------------------------------------------------

--
-- Structure de la table `suivis_par`
--

CREATE TABLE `suivis_par` (
  `id` int(11) NOT NULL,
  `id_user` int(120) NOT NULL,
  `id_artiste` int(120) NOT NULL,
  `etat` int(11) NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `suivis_par`
--

INSERT INTO `suivis_par` (`id`, `id_user`, `id_artiste`, `etat`, `date`) VALUES
(69, 39, 41, 1, '30-06-2016'),
(70, 40, 41, 1, '30-06-2016');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `email`, `hash`, `image`, `type`) VALUES
(39, 'Stéphane', 'steph@gmail.com', '060d796028d9accd0458390610d1062638b88dd2d1b3b9166f4388646140e8c4', '1467307472.png', 0),
(40, 'Florian', 'florian@gmail.com', '44229e1088d7e0f1a58ea7d5a7654e59caa4b492c198952d4e9add8774a44576', '1467307535.jpg', 0),
(41, 'Maxime', 'maxime.grec@gmail.com', 'aa02ba588f75a5846c32c0bf5ab53435743ba7ad8d999a4091e5a44fa514a253', '1467307609.jpg', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`,`id_user`,`id_repr`);

--
-- Index pour la table `est_sur`
--
ALTER TABLE `est_sur`
  ADD PRIMARY KEY (`id_station`,`ligne`);

--
-- Index pour la table `like_par`
--
ALTER TABLE `like_par`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id_repr` (`id_repr`,`id_user`),
  ADD KEY `fk_user` (`id_user`);

--
-- Index pour la table `representation`
--
ALTER TABLE `representation`
  ADD PRIMARY KEY (`id`,`id_artiste`),
  ADD KEY `fk_artiste` (`id_artiste`);

--
-- Index pour la table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `suivis_par`
--
ALTER TABLE `suivis_par`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_artiste`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `like_par`
--
ALTER TABLE `like_par`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=268;
--
-- AUTO_INCREMENT pour la table `representation`
--
ALTER TABLE `representation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT pour la table `station`
--
ALTER TABLE `station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `suivis_par`
--
ALTER TABLE `suivis_par`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `like_par`
--
ALTER TABLE `like_par`
  ADD CONSTRAINT `fk_repr` FOREIGN KEY (`id_repr`) REFERENCES `representation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `representation`
--
ALTER TABLE `representation`
  ADD CONSTRAINT `fk_artiste` FOREIGN KEY (`id_artiste`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
