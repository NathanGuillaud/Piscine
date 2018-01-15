-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 15 jan. 2018 à 18:28
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
(38, 19, 3),
(39, 19, 5),
(40, 20, 6),
(41, 20, 1),
(42, 20, 2),
(43, 20, 4),
(45, 19, 2),
(46, 22, 2),
(47, 19, 3);

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
(12, 18),
(13, 19),
(14, 20),
(17, 23);

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

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`numContact`, `estPrivilegie`, `nomContact`, `prenomContact`, `mailContact`, `poste`, `telContact`, `numEditeur`) VALUES
(4, 1, 'Tom Dupont', 'Tom', 'tom.dupont@gmail.com', 'Directeur', '0456758493', 20),
(6, 0, 'Marion Dupont', 'Marion', 'marion@gmail.com', 'Trésorière', '0687986777', 20),
(7, 1, 'Patrick Castel', 'Patrick', 'patrick@gmail.com', 'Directeur', '0434566758', 19),
(9, 1, 'Dupont', 'Pierre', 'Dupond@gmail.com', 'commercial', '0998899876', 22);

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
(19, 'Ankama', 'ankama@gmail.com', '0456765432', 'ankama.fr', 'Vient tous les ans.'),
(20, 'Hasbro', 'hasbro@gmail.com', '0456789067', 'hasbro.fr', ''),
(22, 'Asmodee', 'Asmodee@gmail.com', '0998877667', 'Asmodee.com', '');

-- --------------------------------------------------------

--
-- Structure de la table `festival`
--

CREATE TABLE `festival` (
  `idFestival` smallint(2) NOT NULL,
  `nomSalle` varchar(50) NOT NULL,
  `nbTotalPlace` smallint(2) NOT NULL,
  `prixUniTable` smallint(2) NOT NULL,
  `annee` smallint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `festival`
--

INSERT INTO `festival` (`idFestival`, `nomSalle`, `nbTotalPlace`, `prixUniTable`, `annee`) VALUES
(1, 'Corum de Montpellier', 145, 40, 2018),
(3, 'ferzfzergzergzergzregz', 100, 13, 2019),
(4, 'Chez moi', 456, 776, 2020),
(5, 'Polytech', 100, 35, 2021),
(6, 'Polytech', 100, 200, 2022);

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
(38, 'Monopoly', 1, 0, 0, 12),
(39, 'Uno', 0, 0, 1, 12),
(40, 'Cluedo', 0, 1, 0, 14),
(41, 'Time\'s up', 0, 0, 0, 12),
(42, 'Scrabble junior', 0, 0, 1, 13),
(43, 'Risk', 1, 0, 0, 14),
(45, 'Echec', 1, 0, 0, 15),
(46, 'Jungle speed', 1, 0, 1, 13),
(47, 'Poker', 1, 0, 0, 17);

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `numLogement` smallint(2) NOT NULL,
  `veutLogement` smallint(2) NOT NULL,
  `aEuLogement` smallint(2) NOT NULL,
  `cbPersonnes` int(10) NOT NULL,
  `numEditeur` smallint(2) NOT NULL,
  `commentaire` varchar(255) NOT NULL
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
(3, 18, 35),
(1, 19, 36),
(1, 19, 37),
(1, 19, 38),
(2, 19, 39),
(3, 19, 40),
(3, 23, 42);

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE `posseder` (
  `Envoi` tinyint(1) NOT NULL,
  `Don` smallint(2) NOT NULL,
  `nbExemplaire` smallint(2) NOT NULL,
  `numJeu` smallint(2) NOT NULL,
  `numReservation` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posseder`
--

INSERT INTO `posseder` (`Envoi`, `Don`, `nbExemplaire`, `numJeu`, `numReservation`) VALUES
(1, 0, 3, 38, 35),
(1, 0, 2, 38, 39),
(1, 0, 4, 38, 40),
(0, 1, 2, 39, 35),
(1, 0, 3, 42, 36),
(1, 0, 1, 42, 37),
(1, 0, 2, 42, 38),
(1, 0, 3, 42, 42);

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
(35, 0, '2018-01-15', '2018-01-29', 99, 1, 19, 1),
(36, 1, '2018-01-15', '2018-01-29', 33, 1, 20, 1),
(37, 1, '2018-01-15', '2018-01-29', 33, 1, 20, 1),
(38, 1, '2018-01-15', '2018-01-29', 33, 1, 20, 1),
(39, 0, '2018-01-15', '2018-01-29', 66, 0, 19, 1),
(40, 0, '2018-01-15', '2018-01-29', 99, 0, 19, 1),
(42, 0, '2018-01-15', '2018-01-29', 100, 1, 20, 1);

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
(9, '2018-01-18', '2018-02-01', '2018-02-12', 1, 0, '', 19, 0, 1),
(10, '2018-01-15', '2018-01-29', '2018-02-12', 0, 0, '', 20, 1, 1),
(12, '2018-01-15', '2018-01-29', '2018-02-12', 1, 0, '', 22, 0, 1);

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
(12, 'Famille'),
(13, 'Enfants'),
(14, 'Stratégie'),
(15, 'Reflexion'),
(16, 'Ankama'),
(17, 'Jeu de carte');

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
(13, 'igwall', '1ae94fe89c65d63c024d1e55e65aa55cb4621a69ef5fb28639c23eb08a9183d3', 'lucas.perso@mail.com', '2018-01-13 11:03:42'),
(14, 'admin', 'bad932406c7610c527e79469b7dd24dfdb613674ab21ec7889c1a956533b9e3d', 'admin@admin.fr', '2018-01-15 13:16:04');

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
(18, 1, 'Jeux familiaux'),
(19, 1, 'Jeux enfants'),
(20, 1, 'Jeux de stratégie'),
(23, 1, 'Carte');

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
  ADD PRIMARY KEY (`numLogement`),
  ADD KEY `editeur` (`numEditeur`);

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
  MODIFY `numContact` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `correspondre`
--
ALTER TABLE `correspondre`
  MODIFY `numReversation` smallint(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `numEditeur` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `festival`
--
ALTER TABLE `festival`
  MODIFY `idFestival` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `numJeu` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `numLogement` smallint(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `numReservation` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `suivi`
--
ALTER TABLE `suivi`
  MODIFY `numSuivi` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `numType` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `zone`
--
ALTER TABLE `zone`
  MODIFY `idZone` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
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
-- Contraintes pour la table `logement`
--
ALTER TABLE `logement`
  ADD CONSTRAINT `editeur` FOREIGN KEY (`numEditeur`) REFERENCES `editeur` (`numEditeur`) ON DELETE CASCADE ON UPDATE CASCADE;

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
