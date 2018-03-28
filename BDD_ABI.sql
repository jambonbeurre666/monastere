-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 27 mars 2018 à 14:21
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `abi`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `RaisonSociale` varchar(255) NOT NULL,
  `TypeClient` varchar(255) NOT NULL,
  `DomaineActivitée` varchar(255) NOT NULL,
  `numRueClient` int(11) NOT NULL,
  `nomRueClient` varchar(255) NOT NULL,
  `codePostClient` int(5) NOT NULL,
  `villeClient` varchar(255) NOT NULL,
  `Nature` varchar(255) NOT NULL,
  `ChiffreAffaire` int(250) NOT NULL,
  `Effectifs` int(255) NOT NULL,
  `ContactClients` varchar(255) NOT NULL,
  `CommentaireClients` text NOT NULL,
  `Telephone` int(10) NOT NULL,
  `MailClient` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idClient`, `RaisonSociale`, `TypeClient`, `DomaineActivitée`, `numRueClient`, `nomRueClient`, `codePostClient`, `villeClient`, `Nature`, `ChiffreAffaire`, `Effectifs`, `ContactClients`, `CommentaireClients`, `Telephone`, `MailClient`, `keywords`) VALUES
(1, 'La Ferme', 'principale', 'aggro', 32, 'la vache folle', 6000, 'Nice', 'privée', 20000, 5, '', '', 123456789, 'laferme@gmail.com', ''),
(2, 'Clara', 'principale', 'porno', 69, 'avenue du cône', 69690, 'la Pine', 'privée', 69000, 1, '', '', 669696969, 'clara@hot.fr', 'swimsuit'),
(3, 'laCiboulette', 'secondaire', 'épicier', 12, 'rue Léon II', 5000, 'Gap', 'public', 21000, 2, '', '', 123456789, 'laciboul@gmail.fr', 'potato'),
(4, 'FalseCode', 'principale', 'développement', 314, 'avenue de Pi', 31415, 'libre', 'secondaire', 32000, 4, '', '', 123456789, 'lecode@gmail.com', 'girl'),
(5, 'MobiloFun', 'principale', 'telephonie', 78, 'rue de l\'antenne', 6000, 'Nice', 'public', 100000, 10, '', '', 203040506, 'mobilofun@gmail.com', 'telephone,mobile'),
(6, 'lalala', 'secondaire', 'musique', 15, 'boulevard la clée de sol', 6200, 'Nice', 'public', 10000, 5, '', '', 412345678, 'lalala@hotmail.fr', 'musique, instrument'),
(7, 'Le Petit Vapoteur', 'principale', 'e-cigarette', 45, 'rue de la vape', 92000, 'Paris', 'privée', 20000, 10, '', '', 654121854, 'lepetitvape@gmail.fr', 'vapoteur,e-cigarette'),
(8, 'TuttiFruiti', 'secondaire', 'maraîcher', 56, 'rue du verger', 6000, 'Nice', 'privée', 10000, 20, '', '', 410121516, 'fruiti@tutti.com', 'fruit,maraîcher'),
(9, 'OdiO', 'principale', 'Audio', 65, 'rue de la basse', 25000, 'la Musica', 'privée', 50000, 10, '', '', 723252829, 'odio@gmail.com', 'casque,audio,musique');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `idClient` int(11) NOT NULL,
  `idContact` int(11) NOT NULL,
  `nomContact` varchar(255) NOT NULL,
  `prenomContact` varchar(255) NOT NULL,
  `numRueContact` int(11) NOT NULL,
  `nomRueContact` varchar(255) NOT NULL,
  `codePostContact` int(5) NOT NULL,
  `villeContact` varchar(255) NOT NULL,
  `telephoneContact` int(10) NOT NULL,
  `mailContact` varchar(255) NOT NULL,
  PRIMARY KEY (`idContact`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`idClient`, `idContact`, `nomContact`, `prenomContact`, `numRueContact`, `nomRueContact`, `codePostContact`, `villeContact`, `telephoneContact`, `mailContact`) VALUES
(1, 20, 'Bove', 'Jose', 25, 'rue du mais ', 75000, 'Paris', 658745896, 'josebove@lemais.com'),
(2, 21, 'magique', 'Lamain', 45, 'Dorcell', 75000, 'Paris', 696589658, 'lamain@magique.com'),
(3, 22, 'lepersil', 'Yves', 86, 'avenue des prés ', 6000, 'Nice', 636254125, 'Yveslepersil@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mail`, `motdepasse`) VALUES
(1, 'Bombeur', 'Jean', 'admin@abi.fr', '$2y$10$.Q.MXBS8Xahx9aVdW2MNdO4UL1PVlZFNonFnVGY3nPBNEAP5bv5U6');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
