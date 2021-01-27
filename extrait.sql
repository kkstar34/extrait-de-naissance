-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 10 août 2020 à 15:19
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `extrait`
--

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

DROP TABLE IF EXISTS `agents`;
CREATE TABLE IF NOT EXISTS `agents` (
  `ID_AGENT` int(11) NOT NULL,
  `MATRICULE_AGENT` varchar(100) DEFAULT NULL,
  `NOM_AGENT` varchar(100) DEFAULT NULL,
  `PRENOM_AGENT` varchar(100) DEFAULT NULL,
  `FONCTION_AGENT` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_AGENT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mariages`
--

DROP TABLE IF EXISTS `mariages`;
CREATE TABLE IF NOT EXISTS `mariages` (
  `ID_MARIAGE` int(11) NOT NULL AUTO_INCREMENT,
  `NUMERO` int(11) NOT NULL,
  `ID_AGENT` int(11) NOT NULL,
  `DATE_MARIAGE` date DEFAULT NULL,
  `LIEU_MARIAGE` varchar(100) DEFAULT NULL,
  `LIEN_JUSTIFICATIF_MARIAGE` varchar(100) DEFAULT NULL,
  `CONJOINT` varchar(100) DEFAULT NULL,
  `DATE_DIVORCE` varchar(255) DEFAULT NULL,
  `PIECE_JUSTIFICATIF_DIVORCE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_MARIAGE`),
  KEY `FK_MARIAGE_MARIER_NAISSANC` (`NUMERO`),
  KEY `FK_MARIAGE_SAISIR_AGENT` (`ID_AGENT`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mariages`
--

INSERT INTO `mariages` (`ID_MARIAGE`, `NUMERO`, `ID_AGENT`, `DATE_MARIAGE`, `LIEU_MARIAGE`, `LIEN_JUSTIFICATIF_MARIAGE`, `CONJOINT`, `DATE_DIVORCE`, `PIECE_JUSTIFICATIF_DIVORCE`) VALUES
(24, 1528, 2, '2020-08-04', 'Bouake', 'lien', 'JULIE', 'Néant', NULL),
(22, 1234, 2, '2020-07-11', 'Paris', 'lien', 'JULIE', 'Néant', 'ci.png'),
(23, 258369, 2, '2020-07-04', 'Paris', 'lien', 'JULIanne', 'Néant', 'Array');

-- --------------------------------------------------------

--
-- Structure de la table `meres`
--

DROP TABLE IF EXISTS `meres`;
CREATE TABLE IF NOT EXISTS `meres` (
  `ID_MERE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_NATIONALITE` int(11) NOT NULL,
  `NOM_MERE` varchar(100) DEFAULT NULL,
  `PROFESSION_MERE` varchar(100) DEFAULT NULL,
  `PIECE_JUSTIFICATIF_MERE` varchar(100) DEFAULT NULL,
  `DOMICILE_MERE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_MERE`),
  KEY `FK_MERE_ETRE_1_NATIONAL` (`ID_NATIONALITE`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `meres`
--

INSERT INTO `meres` (`ID_MERE`, `ID_NATIONALITE`, `NOM_MERE`, `PROFESSION_MERE`, `PIECE_JUSTIFICATIF_MERE`, `DOMICILE_MERE`) VALUES
(81, 1, 'N\'Guessan Akissi Jacqueline', 'Commercante', 'Array', 'Yopougon'),
(89, 1, 'N\'Guessan Akissi Jacqueline', 'Commercante', NULL, 'Yopougon'),
(79, 1, 'Kouyate Aicha', 'Commerçante', 'background.jpg', 'COCODY'),
(88, 1, 'N\'Guessan Akissi Jacqueline', 'Commercante', NULL, 'Yopougon'),
(76, 1, 'test', 'INFORMATICIENNE', 'Array', NULL),
(75, 1, 'Diabate', 'Menagere', '112813_EV_black_men_02.jpg', NULL),
(74, 1, 'SOUMAHORO DJENEBA', 'Menagere', 'background.jpg', 'Bouake'),
(73, 1, 'Cecille Henriette', 'INFORMATICIENNE', 'cni_verso.png', NULL),
(87, 1, 'Toure Oumou', 'Commercante', 'cni.jpg', 'Sokoura');

-- --------------------------------------------------------

--
-- Structure de la table `naissances`
--

DROP TABLE IF EXISTS `naissances`;
CREATE TABLE IF NOT EXISTS `naissances` (
  `NUMERO` int(11) NOT NULL,
  `ID_PERE` int(11) NOT NULL,
  `ID_MERE` int(11) NOT NULL,
  `ID_AGENT` int(11) NOT NULL,
  `NOM_ENFANT` varchar(100) DEFAULT NULL,
  `PRENOM_ENFANT` varchar(100) DEFAULT NULL,
  `DATE_NAISSANCE_ENFANT` date DEFAULT NULL,
  `LIEU_NAISSANCE_ENFANT` varchar(100) DEFAULT NULL,
  `LIEU_DECLARATION_ENFANT` varchar(100) DEFAULT NULL,
  `DATE_DECLARATION_ENFANT` date DEFAULT NULL,
  `LIEU_JUSTIFICATIF_NAISSANCE` varchar(100) DEFAULT NULL,
  `SEXE_ENFANT` varchar(20) DEFAULT NULL,
  `DATE_DECES` varchar(255) DEFAULT NULL,
  `LIEU_DECES` varchar(100) DEFAULT NULL,
  `PIECE_JUSTIFICATIF_DECES` varchar(100) DEFAULT NULL,
  `HEURE_NAISSANCE_ENFANT` varchar(255) NOT NULL,
  PRIMARY KEY (`NUMERO`),
  KEY `FK_NAISSANC_ENREGISTR_AGENT` (`ID_AGENT`),
  KEY `FK_NAISSANC_ETRE_MERE_MERE` (`ID_MERE`),
  KEY `FK_NAISSANC_ETRE_PERE_PERE` (`ID_PERE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `naissances`
--

INSERT INTO `naissances` (`NUMERO`, `ID_PERE`, `ID_MERE`, `ID_AGENT`, `NOM_ENFANT`, `PRENOM_ENFANT`, `DATE_NAISSANCE_ENFANT`, `LIEU_NAISSANCE_ENFANT`, `LIEU_DECLARATION_ENFANT`, `DATE_DECLARATION_ENFANT`, `LIEU_JUSTIFICATIF_NAISSANCE`, `SEXE_ENFANT`, `DATE_DECES`, `LIEU_DECES`, `PIECE_JUSTIFICATIF_DECES`, `HEURE_NAISSANCE_ENFANT`) VALUES
(1528, 84, 81, 2, 'Amani', 'Koffi Judicael', '1998-07-04', 'Yopougon', 'Yopougon', '1998-07-04', 'Yopougon', 'masculin', 'Néant', 'Néant', 'pieces', '05:11'),
(230520, 82, 79, 2, 'Kouyate', 'Aminata Ramadan', '2020-05-23', 'Riviera Anono', 'cocody', '2020-05-23', 'Anono', 'feminin', 'Néant', 'Néant', 'pieces', '01:30'),
(1111, 89, 87, 2, 'Toure', 'Moussa', '2020-07-28', 'Riviera Anono', 'bouake', '2020-07-28', 'bouake', 'masculin', 'Néant', 'Néant', 'pieces', '10:00'),
(1235, 77, 74, 2, 'Kouyate', 'Karim', '1998-05-12', 'Maternite de Sokoura', 'plateau', '1998-05-12', 'Bouake', 'masculin', 'Néant', 'Néant', 'pieces', '00:50'),
(1234, 76, 73, 2, 'Vanie', 'Jean Marc', '2000-06-27', 'Yopougon', 'Yopougon', '2000-06-27', 'Yopougon', 'masculin', 'Néant', 'Néant', 'pieces', '15:59');

-- --------------------------------------------------------

--
-- Structure de la table `nationalites`
--

DROP TABLE IF EXISTS `nationalites`;
CREATE TABLE IF NOT EXISTS `nationalites` (
  `ID_NATIONALITE` int(11) NOT NULL AUTO_INCREMENT,
  `LIBELLE_NATIONALITE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_NATIONALITE`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nationalites`
--

INSERT INTO `nationalites` (`ID_NATIONALITE`, `LIBELLE_NATIONALITE`) VALUES
(1, 'Ivoirienne'),
(2, 'Malienne'),
(3, 'Ghanéenne');

-- --------------------------------------------------------

--
-- Structure de la table `peres`
--

DROP TABLE IF EXISTS `peres`;
CREATE TABLE IF NOT EXISTS `peres` (
  `ID_PERE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_NATIONALITE` int(11) NOT NULL,
  `NOM_PERE` varchar(100) DEFAULT NULL,
  `PROFESSION_PERE` varchar(100) DEFAULT NULL,
  `PIECE_JUSTIFICATIF_PERE` varchar(100) DEFAULT NULL,
  `DOMICILE_PERE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_PERE`),
  KEY `FK_PERE_ETRE_NATIONAL` (`ID_NATIONALITE`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `peres`
--

INSERT INTO `peres` (`ID_PERE`, `ID_NATIONALITE`, `NOM_PERE`, `PROFESSION_PERE`, `PIECE_JUSTIFICATIF_PERE`, `DOMICILE_PERE`) VALUES
(84, 1, 'Amani Assei Modeste', 'Soudure', 'background.jpg', 'Yopougon'),
(82, 1, 'Kouyate Mohamed', 'Entrepreneur', 'cni_verso.jpg', 'Cocody'),
(81, 1, 'test', 'Commercant', 'ci.png', ''),
(80, 1, 'Amangoua Franck', 'Enseignant', 'article-abidjan.jpg', ''),
(79, 1, 'Vanie', 'Chauffeur', 'Array', 'Marcory'),
(78, 1, 'Toure Seyd', 'Enseignant', '112813_EV_black_men_02.jpg', ''),
(77, 1, 'Kouyate Alassane', 'Employé de commerce', 'background.jpg', ''),
(76, 1, 'Vanie Kalou', 'Enseignant', 'cni_verso.png', ''),
(91, 1, 'Amani Assei Modeste', 'Soudure', NULL, 'Yopougon'),
(90, 1, 'Amani Assei Modeste', 'Soudure', NULL, 'Yopougon'),
(89, 2, 'Toure Seyd', 'Chauffeur', 'cni.jpg', 'Sokoura');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
