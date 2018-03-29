-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 29 mars 2018 à 12:02
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
  `codePostClient` varchar(5) NOT NULL,
  `villeClient` varchar(255) NOT NULL,
  `Nature` varchar(255) NOT NULL,
  `ChiffreAffaire` int(250) NOT NULL,
  `Effectifs` int(255) NOT NULL,
  `ContactClients` varchar(255) DEFAULT NULL,
  `CommentaireClients` text NOT NULL,
  `Telephone` varchar(10) NOT NULL,
  `MailClient` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idClient`, `RaisonSociale`, `TypeClient`, `DomaineActivitée`, `numRueClient`, `nomRueClient`, `codePostClient`, `villeClient`, `Nature`, `ChiffreAffaire`, `Effectifs`, `ContactClients`, `CommentaireClients`, `Telephone`, `MailClient`, `keywords`) VALUES
(1, 'La Ferme', 'Principale', 'aggro', 32, 'la vache folle', '06000', 'Nice', 'Privée', 20000, 5, '', '', '123456789', 'laferme@gmail.com', ''),
(2, 'Clara', 'Principale', 'porno', 69, 'avenue du cône', '69690', 'la Pine', 'Privée', 69000, 1, '', '', '669696969', 'clara@hot.fr', 'swimsuit'),
(3, 'laCiboulette', 'Secondaire', 'épicier', 12, 'rue Léon II', '5000', 'Gap', 'Public', 21000, 2, '', '', '123456789', 'laciboul@gmail.fr', 'potato'),
(4, 'FalseCode', 'Principale', 'développement', 314, 'avenue de Pi', '31415', 'libre', 'Secondaire', 32000, 4, '', '', '123456789', 'lecode@gmail.com', 'girl'),
(7, 'Le Petit Vapoteur', 'Principale', 'e-cigarette', 45, 'rue de la vape', '92000', 'Paris', 'Privée', 20000, 10, '', '', '654121854', 'lepetitvape@gmail.fr', 'vapoteur,e-cigarette'),
(8, 'TuttiFruiti', 'Secondaire', 'maraîcher', 56, 'rue du verger', '6000', 'Nice', 'Privée', 10000, 20, '', '', '410121516', 'fruiti@tutti.com', 'fruit,maraîcher'),
(9, 'OdiO', 'Principale', 'Audio', 65, 'rue de la basse', '25000', 'la Musica', 'Privée', 50000, 10, '', '', '723252829', 'odio@gmail.com', 'casque,audio,musique'),
(10, 'eCOLO', 'principale', 'Fourniture scolaire', 21, 'rue de la regle', '06300', 'Nice', 'publique', 50000, 21, '', '', '0493232526', 'scolaire@gmail.com', 'jambon,fromage,plane'),
(11, 'Gourmandise', 'Secondaire', 'vendeur', 87, 'rue de la gourmandise', '6000', 'Nice', 'Privée', 30000, 10, '', '', '612141516', 'gateau@gmail.com', 'gateau'),
(12, 'Scolaire', 'principale', 'Fourniture scolaire', 21, 'rue de la regle', '06000', 'Nice', 'publique', 50000, 21, '', '', '0102030506', 'scolaire@gmail.com', 'school,pencil'),
(13, 'Gateau', 'principale', 'vendeur', 87, 'rue de la gourmandise', '06200', 'Nice', 'privï¿½e', 30000, 10, '', '', '1612141516', 'gateau@gmail.com', 'shotgun'),
(29, 'Chateau construction', 'secondaire', 'Chateaux', 99, 'chemin des citronniers', '11000', 'Narbonnes', 'publique', 151051, 45645, NULL, 'Niquel', '0580908007', 'coucou@cmoi.fr', 'castle'),
(30, 'ui', 'ancienne', 'ui', 42, 'ui', '02589', 'non', 'publique', 2, 1, NULL, 'ui bjr', '0000000000', 'satancule@live.fr', 'coucou,tu,veux,voir,ma,bite'),
(17, 'UsbO', 'secondaire', 'principale', 78, 'rue de la connection', '6000', 'Nice', 'publique', 23000, 10, '', '', '512141519', 'usbo@gmail.com', 'usb'),
(18, 'Animalerie06800', 'principale', 'animalerie', 98, 'rue de la litière', '06200', 'Nice', 'privï¿½e', 20000, 10, '', '', '0102030405', 'animo@gmail.com', 'animaux,ballon'),
(19, 'Gaming_Land', 'Principale', 'Jeux Vidéo', 65, 'rue de la console', '6200', 'Nice', 'Privée', 40000, 20, '', '', '412151419', 'gaming_land@gmail.com', 'jeuxvideo'),
(21, 'gaming', 'Principale', 'Jeux Vidéo', 65, 'rue de la console', '6200', 'Nice', 'Privée', 40000, 20, '', '', '412151419', 'gaming_land@gmail.com', 'jeuxvideo'),
(24, 'Garage rené', 'secondaire', 'Mécanique', 25, 'rue machin', '06800', 'cagnes sur mer', 'privï¿½e', 120000, 2, NULL, 'couciuy', '0102030405', 'garage@rene.fr', 'garage,cars,moto'),
(25, 'Robert boucherie', 'principale', 'Boucherie charcuterie', 45, 'rue de la saucisse', '31000', 'Toulouse', 'privï¿½e', 125000, 5, NULL, 'Des saucisses qu\'elles sont bonnes', '0102030405', 'roro@boubou.com', 'sausages,meat,bbq'),
(26, 'Sylvie coiffure', 'ancienne', 'Coiffeuse', 878, 'rue des ciseaux', '13000', 'Marseille', 'privï¿½e', 450, 10, NULL, 'Coiffure pour vieux, salon mal entretenu', '0605040809', 'lolilo06@coiffure.com', 'hair,scissors,haircut'),
(27, 'Micromania', 'principale', 'jeux video', 2, 'Avenue jean medecin', '06000', 'Nice', 'privï¿½e', 1200000, 10, NULL, 'Des voleurs', '0492874596', 'contact@micromania.fr', 'videogames,ass,boobs'),
(28, 'McDonalds', 'principale', 'Restauration', 45, 'rue machin', '06000', 'Nice', 'privï¿½e', 1588741, 20, NULL, 'Blablabla', '0102030405', 'contact@mcdo.fr', 'fastfood');

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
-- Structure de la table `nature`
--

DROP TABLE IF EXISTS `nature`;
CREATE TABLE IF NOT EXISTS `nature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nature`
--

INSERT INTO `nature` (`id`, `nom`) VALUES
(1, 'Privée'),
(4, 'Publique');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `nom`) VALUES
(2, 'Principale'),
(3, 'Secondaire'),
(4, 'Ancienne');

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
