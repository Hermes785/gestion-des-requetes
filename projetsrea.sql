-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 25, 2022 at 09:28 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetsrea`
--

-- --------------------------------------------------------

--
-- Table structure for table `chefd`
--

DROP TABLE IF EXISTS `chefd`;
CREATE TABLE IF NOT EXISTS `chefd` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chefd`
--

INSERT INTO `chefd` (`id`, `nom_user`, `password`, `nom`, `prenom`, `poste`, `email`, `tel`) VALUES
(1, 'M KAZE', '123', 'KAZE', '', 'Chef de département', 'kaze@myiuc.com', 680802222),
(2, 'M TEKOUDJOU FRANCOIS-XAVIER', '321', 'TEKOUDJOU', 'FRANCOIS-XAVIER', 'chef de departement', 'tekoudjou@gmail.com', 66565656),
(3, 'M Tchouta Alain', '123', 'Tchouta', 'Alain', 'chef de departement', 'tchoutaalain@gmail.com', 671045252),
(4, 'Mme NOUBANKA MANUELLA', '012', 'Noubanka', 'manuella', 'Directrice', 'noubankamanuela@myiuc.com', 691478569);

-- --------------------------------------------------------

--
-- Table structure for table `etud`
--

DROP TABLE IF EXISTS `etud`;
CREATE TABLE IF NOT EXISTS `etud` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(255) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `classe` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` int(9) NOT NULL,
  `test` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etud`
--

INSERT INTO `etud` (`id`, `matricule`, `nom_user`, `nom`, `prenom`, `classe`, `email`, `adresse`, `tel`, `test`) VALUES
(1, 'IUC18E0035691', 'Jordan', 'Tsafack', 'Jordan', 'prepa 3il2A', 'jordantsafack18@myiuc.com', 'Douala logpom ', 699998888, ''),
(2, 'IUC18E0035692', 'Hermes Nguefack', 'Nguefack', 'Hermes', 'CS2I3 A', 'nguefackhermes18@myiuc.com', 'Douala logpom ', 656410452, ''),
(3, 'IUC18E0035693', 'paul dongmo', 'Dongmo', 'Paul', '3IL3', 'pauldongmo18@myiuc.com', 'MAKEPE logpom', 656410452, ''),
(4, 'IUC18E0035694', 'Christelle Kenfack', 'Kenfack', 'Christelle', 'Cs2i4', 'christellekenfack18@myiuc.com', 'Baunamoussadi Terminus ', 666564444, ''),
(5, 'IUC18E0035695', 'Ateudjeu Djina', 'Ateudjeu', 'Djina', ' prepa 3il1C', 'ateudjeudjina18@myiuc.com', 'logpom  bassong', 6565688, ''),
(6, 'IUC18E0035696', 'mingaha jordan', 'mingaha', 'jordan', 'cs2i5', 'mingahajordan18@myiuc.com', 'makepe ', 656410487, ''),
(7, 'IUC18E0035698', 'Ngoudjo ivan', 'Ngoudjo', 'ivan', 'CS2I3 B', 'ngoudjoivan18@myiuc.com', 'Yassa', 656565656, '');

-- --------------------------------------------------------

--
-- Table structure for table `req`
--

DROP TABLE IF EXISTS `req`;
CREATE TABLE IF NOT EXISTS `req` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` varchar(30) NOT NULL,
  `nomE` varchar(255) NOT NULL,
  `classeE` varchar(255) NOT NULL,
  `adresseE` varchar(255) NOT NULL,
  `emailE` varchar(255) NOT NULL,
  `telE` int(9) NOT NULL,
  `dest` varchar(255) NOT NULL,
  `obj` varchar(255) NOT NULL,
  `justif` varchar(255) DEFAULT NULL,
  `statut` varchar(255) NOT NULL,
  `observ` varchar(255) DEFAULT NULL,
  `idE` int(10) NOT NULL,
  `contenu` text NOT NULL,
  `etat` varchar(50) NOT NULL DEFAULT 'pas encore traiter',
  `matiere` varchar(255) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `req`
--

INSERT INTO `req` (`id`, `date`, `nomE`, `classeE`, `adresseE`, `emailE`, `telE`, `dest`, `obj`, `justif`, `statut`, `observ`, `idE`, `contenu`, `etat`, `matiere`, `session`) VALUES
(98, 'June-05-2022 22:20:50', 'Nguefack Hermes', 'CS2I3 A', 'Douala logpom ', 'nguefackhermes18@myiuc.com', 656410452, 'M TEKOUDJOU FRANCOIS-XAVIER', 'rectification de note', 'NOTE INFORMATION PRECONTRACTUELLE 2022-2023 (mise Ã  jour 07 mars 2022) -1.pdf', 'requete envoyee', 'SSS', 2, 'SSS', 'valide', 'kjkkjkjk', 'normale'),
(95, 'June-03-2022 21:38:19', 'Nguefack Hermes', 'CS2I3 A', 'Douala logpom ', 'nguefackhermes18@myiuc.com', 656410452, 'M TEKOUDJOU FRANCOIS-XAVIER', 'rectification de note', '', 'requete envoyee', 'VALIDE', 2, 'MMM', 'valide', 'llllllllllllllllllllllllllllllllllllll', 'cc1'),
(96, 'June-04-2022 09:10:40', 'Nguefack Hermes', 'CS2I3 A', 'Douala logpom ', 'nguefackhermes18@myiuc.com', 656410452, 'M TEKOUDJOU FRANCOIS-XAVIER', 'rectification de note', 'NOTE INFORMATION PRECONTRACTUELLE 2022-2023 (mise Ã  jour 07 mars 2022) -1.pdf', 'requete envoyee', 'NON FONDE', 2, 'SFSFFSSFFSSFFSFFSFSFSFSFSSFFSSS', 'non valide', 'gcgcgc', 'cc1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
