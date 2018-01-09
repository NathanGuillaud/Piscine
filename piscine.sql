-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2018 at 04:16 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `piscine`
--

-- --------------------------------------------------------

--
-- Table structure for table `avoir`
--

CREATE TABLE `avoir` (
  `numJeu` smallint(2) NOT NULL,
  `numEditeur` smallint(2) NOT NULL,
  `nbExemplaire` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avoir`
--

-- --------------------------------------------------------

--
-- Table structure for table `concerner`
--

CREATE TABLE `concerner` (
  `numType` tinyint(1) NOT NULL,
  `idZone` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concerner`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
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
-- Dumping data for table `contact`
--

-- --------------------------------------------------------

--
-- Table structure for table `correspondre`
--

CREATE TABLE `correspondre` (
  `numReversation` smallint(2) NOT NULL,
  `numLogement` smallint(2) NOT NULL,
  `rembourse` tinyint(1) NOT NULL,
  `nbPersonne` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `editeur`
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
-- Dumping data for table `editeur`
--

-- --------------------------------------------------------

--
-- Table structure for table `festival`
--

CREATE TABLE `festival` (
  `idFestival` smallint(2) NOT NULL,
  `nomSalle` varchar(50) NOT NULL,
  `nbTotalPlace` smallint(2) NOT NULL,
  `prixUniTable` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `festival`
--

-- --------------------------------------------------------

--
-- Table structure for table `jeux`
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
-- Dumping data for table `jeux`
--

-- --------------------------------------------------------

--
-- Table structure for table `logement`
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
-- Table structure for table `louer`
--

CREATE TABLE `louer` (
  `quantitetable` smallint(2) NOT NULL,
  `idZone` smallint(2) NOT NULL,
  `numReservation` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `louer`
--

-- --------------------------------------------------------

--
-- Table structure for table `posseder`
--

CREATE TABLE `posseder` (
  `Envoi` tinyint(1) NOT NULL,
  `Don` smallint(2) NOT NULL,
  `numJeu` smallint(2) NOT NULL,
  `numReservation` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `numReservation` smallint(2) NOT NULL,
  `paye` tinyint(1) NOT NULL,
  `dateFacture` date NOT NULL,
  `dateRelance` date NOT NULL,
  `prix` float NOT NULL,
  `deplacement` tinyint(1) NOT NULL,
  `numEditeur` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `suivi`
--

CREATE TABLE `suivi` (
  `numSuivi` smallint(2) NOT NULL,
  `datePremierContact` date NOT NULL,
  `relanceContact` date NOT NULL,
  `compteRendu` date NOT NULL,
  `interesse` tinyint(1) NOT NULL,
  `estPresent` tinyint(1) NOT NULL,
  `commentaire` varchar(200) NOT NULL,
  `numEditeur` smallint(2) NOT NULL
  `facture` tinyint(1) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `numType` tinyint(1) NOT NULL,
  `libelleType` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(320) NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `idZone` smallint(2) NOT NULL,
  `idFestival` smallint(2) NOT NULL,
  `libelleZone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zone`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avoir`
--
ALTER TABLE `avoir`
  ADD PRIMARY KEY (`numJeu`,`numEditeur`),
  ADD KEY `numEditeur` (`numEditeur`);

--
-- Indexes for table `concerner`
--
ALTER TABLE `concerner`
  ADD PRIMARY KEY (`numType`,`idZone`),
  ADD KEY `idZone` (`idZone`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`numContact`),
  ADD KEY `numEditeur` (`numEditeur`);

--
-- Indexes for table `correspondre`
--
ALTER TABLE `correspondre`
  ADD PRIMARY KEY (`numReversation`),
  ADD KEY `numLogement` (`numLogement`);

--
-- Indexes for table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`numEditeur`) KEY_BLOCK_SIZE=2;

--
-- Indexes for table `festival`
--
ALTER TABLE `festival`
  ADD PRIMARY KEY (`idFestival`);

--
-- Indexes for table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`numJeu`),
  ADD KEY `numType` (`numType`);

--
-- Indexes for table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`numLogement`);

--
-- Indexes for table `louer`
--
ALTER TABLE `louer`
  ADD PRIMARY KEY (`idZone`,`numReservation`),
  ADD KEY `numReservation` (`numReservation`);

--
-- Indexes for table `posseder`
--
ALTER TABLE `posseder`
  ADD PRIMARY KEY (`numJeu`,`numReservation`),
  ADD KEY `numReservation` (`numReservation`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`numReservation`),
  ADD KEY `numEditeur` (`numEditeur`);

--
-- Indexes for table `suivi`
--
ALTER TABLE `suivi`
  ADD PRIMARY KEY (`numSuivi`),
  ADD KEY `numEditeur` (`numEditeur`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`numType`) KEY_BLOCK_SIZE=2;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `pseudo` (`login`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`idZone`,`idFestival`),
  ADD KEY `idFestival` (`idFestival`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `numContact` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `correspondre`
--
ALTER TABLE `correspondre`
  MODIFY `numReversation` smallint(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `numEditeur` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `festival`
--
ALTER TABLE `festival`
  MODIFY `idFestival` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `numJeu` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `logement`
--
ALTER TABLE `logement`
  MODIFY `numLogement` smallint(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `numReservation` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `suivi`
--
ALTER TABLE `suivi`
  MODIFY `numSuivi` smallint(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `numType` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `idZone` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `Avoir_ibfk_1` FOREIGN KEY (`numEditeur`) REFERENCES `editeur` (`numEditeur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Avoir_ibfk_2` FOREIGN KEY (`numJeu`) REFERENCES `jeux` (`numJeu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `concerner`
--
ALTER TABLE `concerner`
  ADD CONSTRAINT `Concerner_ibfk_1` FOREIGN KEY (`numType`) REFERENCES `type` (`numType`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Concerner_ibfk_2` FOREIGN KEY (`idZone`) REFERENCES `zone` (`idZone`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `Contact_ibfk_1` FOREIGN KEY (`numEditeur`) REFERENCES `editeur` (`numEditeur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `correspondre`
--
ALTER TABLE `correspondre`
  ADD CONSTRAINT `Correspondre_ibfk_1` FOREIGN KEY (`numReversation`) REFERENCES `reservation` (`numReservation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Correspondre_ibfk_2` FOREIGN KEY (`numLogement`) REFERENCES `logement` (`numLogement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jeux`
--
ALTER TABLE `jeux`
  ADD CONSTRAINT `Jeux_ibfk_1` FOREIGN KEY (`numType`) REFERENCES `type` (`numType`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `louer`
--
ALTER TABLE `louer`
  ADD CONSTRAINT `Louer_ibfk_1` FOREIGN KEY (`idZone`) REFERENCES `zone` (`idZone`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Louer_ibfk_2` FOREIGN KEY (`numReservation`) REFERENCES `reservation` (`numReservation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `Posseder_ibfk_1` FOREIGN KEY (`numJeu`) REFERENCES `jeux` (`numJeu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Posseder_ibfk_2` FOREIGN KEY (`numReservation`) REFERENCES `reservation` (`numReservation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`numEditeur`) REFERENCES `editeur` (`numEditeur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suivi`
--
ALTER TABLE `suivi`
  ADD CONSTRAINT `Suivi_ibfk_1` FOREIGN KEY (`numEditeur`) REFERENCES `editeur` (`numEditeur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zone`
--
ALTER TABLE `zone`
  ADD CONSTRAINT `Zone_ibfk_1` FOREIGN KEY (`idFestival`) REFERENCES `festival` (`idFestival`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
