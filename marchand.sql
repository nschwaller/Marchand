-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 12 Mai 2020 à 08:37
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `marchand`
--

-- --------------------------------------------------------

--
-- Structure de la table `apaprtient`
--

CREATE TABLE `apaprtient` (
  `codeCD` int(11) NOT NULL,
  `codeP` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `apaprtient`
--

INSERT INTO `apaprtient` (`codeCD`, `codeP`, `quantite`) VALUES
(1, 36, 5),
(1, 37, 5),
(1, 38, 5);

-- --------------------------------------------------------

--
-- Structure de la table `Artiste`
--

CREATE TABLE `Artiste` (
  `codeA` int(11) NOT NULL,
  `nom` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Artiste`
--

INSERT INTO `Artiste` (`codeA`, `nom`) VALUES
(1, 'Angèle'),
(2, 'Calogero'),
(3, 'Soprano'),
(4, 'Slimane');

-- --------------------------------------------------------

--
-- Structure de la table `CD`
--

CREATE TABLE `CD` (
  `codeCD` int(11) NOT NULL,
  `nom` varchar(500) NOT NULL,
  `descriptionCD` varchar(500) NOT NULL,
  `photoCD` varchar(500) NOT NULL,
  `prixCD` float NOT NULL,
  `stockCD` int(11) NOT NULL,
  `codeA` int(11) NOT NULL,
  `codeG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `CD`
--

INSERT INTO `CD` (`codeCD`, `nom`, `descriptionCD`, `photoCD`, `prixCD`, `stockCD`, `codeA`, `codeG`) VALUES
(1, 'Brol', 'Brol est le premier album studio de la chanteuse belge Angèle, sorti le 5 octobre 2018. Il reçoit la Victoire de l\'album révélation de l\'année lors des Victoires de la musique 2019', 'brol.jfif', 19, 5555405, 1, 1),
(2, 'Liberté chérie', 'DescriptionLiberté chérie est le septième album de Calogero sorti le 25 août 2017. En sont extraits les singles Je joue de la musique, suivi de On se sait par cœur puis de Fondamental. Il a été enregistré dans les studios Abbey Road à Londres. L\'album est bien accueilli par la critique', 'calogero.jpg', 14, 85, 2, 2),
(3, 'l\'everst', 'L\'Everest est le cinquième album studio du chanteur français Soprano sorti le 14 octobre 2016 sur les labels Rec. 118 et Warner.', 'l\'everst.jpg', 14, 10096, 3, 3),
(4, 'solune', 'Solune est le deuxième album studio du chanteur français Slimane, sorti en janvier 2018', 'Solune.jpg', 15, 3, 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `Facture`
--

CREATE TABLE `Facture` (
  `codeUser` int(11) NOT NULL,
  `codeCD` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Genre`
--

CREATE TABLE `Genre` (
  `codeG` int(11) NOT NULL,
  `nom` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Genre`
--

INSERT INTO `Genre` (`codeG`, `nom`) VALUES
(1, 'Pop'),
(2, 'Rock'),
(3, 'Hip-hop'),
(4, 'RNB');

-- --------------------------------------------------------

--
-- Structure de la table `Panier`
--

CREATE TABLE `Panier` (
  `codeP` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Panier`
--

INSERT INTO `Panier` (`codeP`, `id`) VALUES
(31, 2),
(32, 2),
(33, 2),
(34, 5),
(35, 5),
(36, 5),
(37, 5),
(38, 5),
(39, 2),
(40, 7),
(41, 7),
(42, 7);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `codeUser` int(11) NOT NULL,
  `nomUser` varchar(500) NOT NULL,
  `prenomUser` varchar(500) NOT NULL,
  `adrresseUSer` varchar(500) NOT NULL,
  `cpUser` varchar(500) NOT NULL,
  `villeUser` varchar(500) NOT NULL,
  `mdpUser` varchar(500) NOT NULL,
  `loginUser` varchar(500) NOT NULL,
  `mailUser` varchar(500) NOT NULL,
  `codeP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`codeUser`, `nomUser`, `prenomUser`, `adrresseUSer`, `cpUser`, `villeUser`, `mdpUser`, `loginUser`, `mailUser`, `codeP`) VALUES
(2, 'nadia', 'chiyu', '1 allee des bergeronnettes', '57535', 'marange-silvange', '$2y$10$w7z0NFfNSLpON.1jtFulU.uZIMvhY4d7id8qMH.nKzryJ8lw5o2wK', 'chiyu', 'nadia.schwaller@gmail;com', 39),
(3, 'test', 'test', 'test', '57500', 'test', '$2y$10$n3ohjiRwYMBG9.hwQflFyu8QaCIiD/gPGoDlvWGX9JgT5WS67qPDq', 'test', 'test', NULL),
(4, 'elno', 'bahelno', '5 rue jedispas', '54800', 'jarny', '$2y$10$MLHbh1tgPeqBbKBdIDhNNeidM.5PQ5Mfc1On9FLNxIjcLqkxaTd/O', 'jul', 'elno54@outlook.fr', NULL),
(5, 'a', 'a', 'a', '1', 'a', '$2y$10$9VoBZHcy9jF67MzI4qr.c.85x3OBj1VcCDU9hFLfLJPP/UBJ7mqpu', 'a', 'a', 38),
(6, 'Ozkok', 'Ozan', '45 rue du faucon', '57500', 'Saint-Avold', '$2y$10$.VpWklvsFQOMyuV7CArCdOjhmfFyPuTKjl.DwDf9JMYTN3JSkMJCK', 'ozzie', 'ozan.ozkok3@hotmail.fr', NULL),
(7, 'reietr', 'romain', '7 Rue saint coppin', '55800', 'Noyer-Auzecours', '$2y$10$XGQccowGQUDktLyN.y9Ete1lmY/FEIjdr6hHz5U446UuohRknte0.', 'rreiter', 'rromain1212@gmail.com', 42);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `apaprtient`
--
ALTER TABLE `apaprtient`
  ADD PRIMARY KEY (`codeCD`,`codeP`),
  ADD KEY `apaprtient_Panier0_FK` (`codeP`);

--
-- Index pour la table `Artiste`
--
ALTER TABLE `Artiste`
  ADD PRIMARY KEY (`codeA`);

--
-- Index pour la table `CD`
--
ALTER TABLE `CD`
  ADD PRIMARY KEY (`codeCD`),
  ADD KEY `CD_Artiste_FK` (`codeA`),
  ADD KEY `CD_Genre0_FK` (`codeG`);

--
-- Index pour la table `Facture`
--
ALTER TABLE `Facture`
  ADD PRIMARY KEY (`codeUser`,`codeCD`),
  ADD KEY `Facture_CD0_FK` (`codeCD`);

--
-- Index pour la table `Genre`
--
ALTER TABLE `Genre`
  ADD PRIMARY KEY (`codeG`);

--
-- Index pour la table `Panier`
--
ALTER TABLE `Panier`
  ADD PRIMARY KEY (`codeP`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`codeUser`),
  ADD KEY `Utilisateur_Panier_FK` (`codeP`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Artiste`
--
ALTER TABLE `Artiste`
  MODIFY `codeA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `CD`
--
ALTER TABLE `CD`
  MODIFY `codeCD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Genre`
--
ALTER TABLE `Genre`
  MODIFY `codeG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Panier`
--
ALTER TABLE `Panier`
  MODIFY `codeP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `codeUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `apaprtient`
--
ALTER TABLE `apaprtient`
  ADD CONSTRAINT `apaprtient_CD_FK` FOREIGN KEY (`codeCD`) REFERENCES `CD` (`codeCD`),
  ADD CONSTRAINT `apaprtient_Panier0_FK` FOREIGN KEY (`codeP`) REFERENCES `Panier` (`codeP`);

--
-- Contraintes pour la table `CD`
--
ALTER TABLE `CD`
  ADD CONSTRAINT `CD_Artiste_FK` FOREIGN KEY (`codeA`) REFERENCES `Artiste` (`codeA`),
  ADD CONSTRAINT `CD_Genre0_FK` FOREIGN KEY (`codeG`) REFERENCES `Genre` (`codeG`);

--
-- Contraintes pour la table `Facture`
--
ALTER TABLE `Facture`
  ADD CONSTRAINT `Facture_CD0_FK` FOREIGN KEY (`codeCD`) REFERENCES `CD` (`codeCD`),
  ADD CONSTRAINT `Facture_Utilisateur_FK` FOREIGN KEY (`codeUser`) REFERENCES `Utilisateur` (`codeUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
