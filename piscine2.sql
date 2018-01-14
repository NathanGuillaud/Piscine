-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  Dim 14 jan. 2018 à 16:36
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE `avoir` (
  `numJeu` smallint(2) NOT NULL,
  `numEditeur` smallint(2) NOT NULL,
  `nbExemplaire` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avoir`
--

INSERT INTO `avoir` (`numJeu`, `numEditeur`, `nbExemplaire`) VALUES
(15, 11, 3),
(16, 11, 2),
(17, 11, 3);

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

CREATE TABLE `concerner` (
  `numType` tinyint(1) NOT NULL,
  `idZone` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `concerner`
--

INSERT INTO `concerner` (`numType`, `idZone`) VALUES
(9, 14),
(8, 15);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `numContact` tinyint(2) NOT NULL,
  `estPrivilegie` tinyint(1) NOT NULL,
  `nomContact` varchar(40) NOT NULL,
  `prenomContact` varchar(40) NOT NULL,
  `mailContact` varchar(40) NOT NULL,
  `poste` varchar(40) NOT NULL,
  `telContact` varchar(40) NOT NULL,
  `numEditeur` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `correspondre`
--

CREATE TABLE `correspondre` (
  `numReversation` smallint(2) NOT NULL,
  `numLogement` smallint(2) NOT NULL,
  `rembourse` tinyint(1) NOT NULL,
  `nbPersonne` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

CREATE TABLE `editeur` (
  `numEditeur` smallint(2) NOT NULL,
  `nomEditeur` varchar(40) NOT NULL,
  `mailEditeur` varchar(40) NOT NULL,
  `telEditeur` varchar(10) NOT NULL,
  `siteEditeur` varchar(40) NOT NULL,
  `commentaire` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`numEditeur`, `nomEditeur`, `mailEditeur`, `telEditeur`, `siteEditeur`, `commentaire`) VALUES
(11, 'Monopoly Corporation', 'contact@monopoly.fr', '1234567890', 'monopoly.com', ''),
(12, 'Hasbro', 'contact@hasbro.com', '1234567890', 'hasbro.com', ''),
(13, 'Cluedo', 'contact@cluedo.fr', '1234567890', 'cluedo.com', 'cddcddc'),
(14, 'Bil', 'vkjearuifhukar@gmail.com', '1234567890', 'cjyzge.com', 'jhafgrkf');

-- --------------------------------------------------------

--
-- Structure de la table `festival`
--

CREATE TABLE `festival` (
  `idFestival` smallint(2) NOT NULL,
  `nomSalle` varchar(50) NOT NULL,
  `nbTotalPlace` smallint(2) NOT NULL,
  `prixUniTable` smallint(2) NOT NULL,
  `annee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `festival`
--

INSERT INTO `festival` (`idFestival`, `nomSalle`, `nbTotalPlace`, `prixUniTable`, `annee`) VALUES
(1, 'Corum de Montpellier', 145, 33, '2017/2018');

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `numJeu` smallint(2) NOT NULL,
  `libelleJeu` varchar(50) NOT NULL,
  `estPrototype` tinyint(1) NOT NULL,
  `estSurdim` tinyint(1) NOT NULL,
  `payerFrais` tinyint(1) NOT NULL,
  `numType` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`numJeu`, `libelleJeu`, `estPrototype`, `estSurdim`, `payerFrais`, `numType`) VALUES
(15, 'Monopoly Zoo', 0, 0, 1, 8),
(16, 'Monopoly Tycoon Edition', 0, 0, 0, 8),
(17, 'Monopoly Traditionnel ', 0, 0, 1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `numLogement` smallint(2) NOT NULL,
  `nomLogement` varchar(40) NOT NULL,
  `rueLogement` varchar(40) NOT NULL,
  `villeLogement` varchar(40) NOT NULL,
  `CPLogement` mediumint(3) NOT NULL,
  `mailLogement` varchar(40) NOT NULL,
  `telLogement` varchar(40) NOT NULL,
  `siteLogement` varchar(40) NOT NULL,
  `payeParFestival` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `louer`
--

CREATE TABLE `louer` (
  `quantitetable` smallint(2) NOT NULL,
  `idZone` smallint(2) NOT NULL,
  `numReservation` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `louer`
--

INSERT INTO `louer` (`quantitetable`, `idZone`, `numReservation`) VALUES
(4, 14, 26),
(4, 14, 27),
(3, 14, 28),
(6, 15, 25),
(3, 15, 29);

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE `posseder` (
  `Envoi` tinyint(1) NOT NULL,
  `Don` smallint(2) NOT NULL,
  `numJeu` smallint(2) NOT NULL,
  `numReservation` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `numReservation` smallint(2) NOT NULL,
  `paye` tinyint(1) NOT NULL,
  `dateFacture` date NOT NULL,
  `dateRelance` date NOT NULL,
  `prix` float NOT NULL,
  `deplacement` tinyint(1) NOT NULL,
  `numEditeur` smallint(2) NOT NULL,
  `idFestival` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`numReservation`, `paye`, `dateFacture`, `dateRelance`, `prix`, `deplacement`, `numEditeur`, `idFestival`) VALUES
(25, 1, '2018-01-13', '2018-01-27', 145, 1, 11, 1),
(26, 0, '2018-01-13', '2018-01-27', 33, 0, 11, 1),
(27, 0, '2018-01-13', '2018-01-27', 33, 0, 11, 1),
(28, 1, '2018-01-14', '2018-01-28', 99, 1, 11, 1),
(29, 0, '2018-01-14', '2018-01-28', 99, 1, 11, 1);

-- --------------------------------------------------------

--
-- Structure de la table `suivi`
--

CREATE TABLE `suivi` (
  `numSuivi` smallint(2) NOT NULL,
  `datePremierContact` date NOT NULL,
  `relanceContact` date NOT NULL,
  `compteRendu` date NOT NULL,
  `interesse` tinyint(1) NOT NULL,
  `estPresent` tinyint(1) NOT NULL,
  `commentaire` varchar(200) NOT NULL,
  `numEditeur` smallint(2) NOT NULL,
  `facture` tinyint(1) NOT NULL,
  `idFestival` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `suivi`
--

INSERT INTO `suivi` (`numSuivi`, `datePremierContact`, `relanceContact`, `compteRendu`, `interesse`, `estPresent`, `commentaire`, `numEditeur`, `facture`, `idFestival`) VALUES
(1, '2018-01-13', '2018-01-27', '2018-02-10', 0, 0, '', 11, 0, 1),
(2, '2018-01-13', '2018-01-27', '2018-02-10', 1, 0, 'Aucun', 12, 0, 1),
(3, '2018-01-13', '2018-01-27', '2018-02-10', 0, 0, '', 13, 0, 1),
(4, '2018-01-14', '2018-01-28', '2018-02-11', 0, 0, '', 14, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `numType` tinyint(1) NOT NULL,
  `libelleType` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`numType`, `libelleType`) VALUES
(8, 'Jeux pour enfants'),
(9, 'Jeux de stratégie'),
(10, 'Jeux d\'équipe'),
(11, 'Jeux d\'agilité');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(320) NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `login`, `password`, `email`, `registerDate`) VALUES
(13, 'igwall', '1ae94fe89c65d63c024d1e55e65aa55cb4621a69ef5fb28639c23eb08a9183d3', 'lucas.perso@mail.com', '2018-01-13 11:03:42');

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

CREATE TABLE `zone` (
  `idZone` smallint(2) NOT NULL,
  `idFestival` smallint(2) NOT NULL,
  `libelleZone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `zone`
--

INSERT INTO `zone` (`idZone`, `idFestival`, `libelleZone`) VALUES
(14, 1, 'Zone de guerre civile'),
(15, 1, 'Monopoly Area');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD PRIMARY KEY (`numJeu`,`numEditeur`),
  ADD KEY `numEditeur` (`numEditeur`);

--
-- Index pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD PRIMARY KEY (`numType`,`idZone`),
  ADD KEY `idZone` (`idZone`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`numContact`),
  ADD KEY `numEditeur` (`numEditeur`);

--
-- Index pour la table `correspondre`
--
ALTER TABLE `correspondre`
  ADD PRIMARY KEY (`numReversation`),
  ADD KEY `numLogement` (`numLogement`);

--
-- Index pour la table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`numEditeur`) KEY_BLOCK_SIZE=2;

--
-- Index pour la table `festival`
--
ALTER TABLE `festival`
  ADD PRIMARY KEY (`idFestival`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`numJeu`),
  ADD KEY `numType` (`numType`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`numLogement`);

--
-- Index pour la table `louer`
--
ALTER TABLE `louer`
  ADD PRIMARY KEY (`idZone`,`numReservation`),
  ADD KEY `numReservation` (`numReservation`);

--
-- Index pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD PRIMARY KEY (`numJeu`,`numReservation`),
  ADD KEY `numReservation` (`numReservation`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`numReservation`),
  ADD KEY `numEditeur` (`numEditeur`),
  ADD KEY `reservation_ibfk_2` (`idFestival`);

--
-- Index pour la table `suivi`
--
ALTER TABLE `suivi`
  ADD PRIMARY KEY (`numSuivi`),
  ADD KEY `numEditeur` (`numEditeur`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`numType`) KEY_BLOCK_SIZE=2;

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `pseudo` (`login`);

--
-- Index pour la table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`idZone`,`idFestival`),
  ADD KEY `idFestival` (`idFestival`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `numContact` tinyint(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `correspondre`
--
ALTER TABLE `correspondre`
  MODIFY `numReversation` smallint(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `numEditeur` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `festival`
--
ALTER TABLE `festival`
  MODIFY `idFestival` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `numJeu` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `numLogement` smallint(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `numReservation` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `suivi`
--
ALTER TABLE `suivi`
  MODIFY `numSuivi` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `numType` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `zone`
--
ALTER TABLE `zone`
  MODIFY `idZone` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `Avoir_ibfk_1` FOREIGN KEY (`numEditeur`) REFERENCES `editeur` (`numEditeur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Avoir_ibfk_2` FOREIGN KEY (`numJeu`) REFERENCES `jeux` (`numJeu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD CONSTRAINT `Concerner_ibfk_1` FOREIGN KEY (`numType`) REFERENCES `type` (`numType`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Concerner_ibfk_2` FOREIGN KEY (`idZone`) REFERENCES `zone` (`idZone`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `Contact_ibfk_1` FOREIGN KEY (`numEditeur`) REFERENCES `editeur` (`numEditeur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `correspondre`
--
ALTER TABLE `correspondre`
  ADD CONSTRAINT `Correspondre_ibfk_1` FOREIGN KEY (`numReversation`) REFERENCES `reservation` (`numReservation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Correspondre_ibfk_2` FOREIGN KEY (`numLogement`) REFERENCES `logement` (`numLogement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD CONSTRAINT `Jeux_ibfk_1` FOREIGN KEY (`numType`) REFERENCES `type` (`numType`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `louer`
--
ALTER TABLE `louer`
  ADD CONSTRAINT `Louer_ibfk_1` FOREIGN KEY (`idZone`) REFERENCES `zone` (`idZone`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Louer_ibfk_2` FOREIGN KEY (`numReservation`) REFERENCES `reservation` (`numReservation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `Posseder_ibfk_1` FOREIGN KEY (`numJeu`) REFERENCES `jeux` (`numJeu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Posseder_ibfk_2` FOREIGN KEY (`numReservation`) REFERENCES `reservation` (`numReservation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`numEditeur`) REFERENCES `editeur` (`numEditeur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idFestival`) REFERENCES `festival` (`idFestival`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `suivi`
--
ALTER TABLE `suivi`
  ADD CONSTRAINT `Suivi_ibfk_1` FOREIGN KEY (`numEditeur`) REFERENCES `editeur` (`numEditeur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `zone`
--
ALTER TABLE `zone`
  ADD CONSTRAINT `Zone_ibfk_1` FOREIGN KEY (`idFestival`) REFERENCES `festival` (`idFestival`) ON DELETE CASCADE ON UPDATE CASCADE;
