-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2019 at 06:35 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(20, 'Gilet'),
(19, 'Accessories'),
(18, 'Costume'),
(17, 'Jeans'),
(16, 'sneakers'),
(21, 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(30) NOT NULL,
  `prenom_client` varchar(30) NOT NULL,
  `mdp_client` varchar(30) NOT NULL,
  `telephone_client` int(11) NOT NULL,
  `adresse_client` varchar(30) NOT NULL,
  `ville_client` varchar(30) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `mdp_client`, `telephone_client`, `adresse_client`, `ville_client`) VALUES
(3, 'ines', 'guizani', '123', 2514453, 'ines2@esprit.tn', 'tunis'),
(4, 'ines', 'guizani', '123', 2514453, 'ines@esprit.tn', 'tunis');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`) VALUES
(1, 'black'),
(2, 'red'),
(3, 'blue'),
(4, 'Purple'),
(5, 'orange'),
(6, 'Green'),
(7, 'Violet'),
(8, 'pink');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `client`, `total`) VALUES
(12, 'ines@esprit.tn', 195),
(4, 'ines@esprit.tn', 75),
(5, 'ines@esprit.tn', 75),
(6, 'ines@esprit.tn', 75),
(7, 'ines@esprit.tn', 75),
(8, 'ines@esprit.tn', 75),
(9, 'ines@esprit.tn', 75),
(10, 'ines@esprit.tn', 75),
(11, 'ines@esprit.tn', 75);

-- --------------------------------------------------------

--
-- Table structure for table `lignes`
--

DROP TABLE IF EXISTS `lignes`;
CREATE TABLE IF NOT EXISTS `lignes` (
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `quantite_produit` int(11) NOT NULL,
  `prix_produit` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lignes`
--

INSERT INTO `lignes` (`id_commande`, `id_produit`, `nom_produit`, `quantite_produit`, `prix_produit`, `total`) VALUES
(3, 4, 'Jeans', 1, 55, 55),
(3, 3, 'Costume', 1, 20, 20),
(4, 4, 'Jeans', 1, 55, 55),
(5, 4, 'Jeans', 1, 55, 55),
(5, 3, 'Costume', 1, 20, 20),
(6, 4, 'Jeans', 1, 55, 55),
(6, 3, 'Costume', 1, 20, 20),
(7, 4, 'Jeans', 1, 55, 55),
(7, 3, 'Costume', 1, 20, 20),
(8, 4, 'Jeans', 1, 55, 55),
(8, 3, 'Costume', 1, 20, 20),
(9, 4, 'Jeans', 1, 55, 55),
(9, 3, 'Costume', 1, 20, 20),
(10, 4, 'Jeans', 1, 55, 55),
(10, 3, 'Costume', 1, 20, 20),
(11, 4, 'Jeans', 1, 55, 55),
(11, 3, 'Costume', 1, 20, 20),
(12, 4, 'Jeans', 1, 55, 55),
(12, 3, 'Costume', 1, 20, 20),
(12, 5, 'watch', 6, 20, 120);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_prod` int(11) NOT NULL,
  `id_client` varchar(200) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_prod` (`id_prod`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`ID`, `id_prod`, `id_client`, `note`) VALUES
(39, 9, 'DESKTOP-LFOB92L', 1),
(41, 3, 'DESKTOP-LFOB92L', 5),
(8, 4, 'DESKTOP-LFOB92L', 1),
(9, 3, 'meriem.khattat@esprit.tn', 4),
(42, 7, 'DESKTOP-LFOB92L', 1),
(43, 6, 'DESKTOP-LFOB92L', 5),
(40, 5, 'DESKTOP-LFOB92L', 5),
(44, 17, 'DESKTOP-LFOB92L', 3),
(45, 16, 'DESKTOP-LFOB92L', 5),
(46, 16, 'anes.temani@esprit.tn', 2),
(47, 3, 'ines@esprit.tn', 3);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `prix` int(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ETAT` varchar(20) NOT NULL DEFAULT 'DISPONIBLE',
  `STOCK` int(11) NOT NULL DEFAULT '0',
  `image` varchar(100) NOT NULL,
  `note` float DEFAULT NULL,
  `XS` int(11) DEFAULT '0',
  `S` int(11) DEFAULT '0',
  `M` int(11) DEFAULT '0',
  `L` int(11) DEFAULT '0',
  `XL` int(11) DEFAULT '0',
  `XXL` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`ID`, `name`, `prix`, `categorie`, `color`, `description`, `ETAT`, `STOCK`, `image`, `note`, `XS`, `S`, `M`, `L`, `XL`, `XXL`) VALUES
(9, 'T-shirt', 50, 'sneakers', 'blue', 'PANAMA SHIRT IS ONE OF OUR FLAGSHIP CREATIONS SHOWCASING METICULOUSLY DESIGNED DOUBLE-STITCH DIAMOND PATTERNS. UTILIZING MOTHER-OF-PEARL BUTTONS WITH HIGH COLLARS', 'DISPONIBLE', 73, 'images (1).jpg', 1, 10, 10, 10, 0, 3, 0),
(3, 'Costume', 20, 'Costume', 'black', 'PANAMA SHIRT IS ONE OF OUR FLAGSHIP CREATIONS SHOWCASING METICULOUSLY DESIGNED DOUBLE-STITCH DIAMOND PATTERNS', 'DISPONIBLE', 41, 'coh19jary_noir-1.jpg', 4, 10, 2, 2, 11, 11, 0),
(4, 'Jeans', 55, 'Jeans', 'black', 'jeans for men', 'DISPONIBLE', 49, 'images (1).jpg', 1, 11, 12, 5, 11, 11, 5),
(5, 'watch', 20, 'Accessories', 'black', ' test', 'DISPONIBLE', 49, 'product02.jpg', 5, 10, 11, 14, 15, 2, 3),
(6, 'Sneakers2', 100, 'sneakers', 'pink', ' watch', 'DISPONIBLE', 7, 'main-product03.jpg', 5, 1, 1, 1, 1, 1, 2),
(7, 'wallets', 100, 'Accessories', 'black', ' test', 'DISPONIBLE', 9, 'product03.jpg', 1, 1, 1, 1, 1, 2, 3),
(8, 'Produit7', 200, 'categorie2', 'black', ' 2', 'DISPONIBLE', 42, 'product06.jpg', 0, 12, 2, 2, 3, 22, 1),
(10, 'collar cover', 50, 'Accessories', 'Purple', 'man collar cover', 'DISPONIBLE', 48, '617NfOFc8pL._SX425_.jpg', 0, 10, 10, 11, 12, 3, 2),
(11, 'Jeans ', 20, 'Jeans', 'blue', ' jeans for men', 'DISPONIBLE', 13, 'jeans-homme-slim-effet-used-denim-stone-dc-36125261150040242.jpg', NULL, 0, 0, 0, 11, 2, 0),
(12, 'Jeans ', 20, 'Jeans', 'blue', ' jeans for men', 'DISPONIBLE', 0, 'tÃ©lÃ©chargement.jpg', NULL, 0, 0, 0, 0, 0, 0),
(13, 'Jeans  ', 42, 'Jeans', 'blue', ' jeans for men', 'DISPONIBLE', 20, 'jeans-homme-slim-effet-used-denim-stone-dc-36125261150040242.jpg', NULL, 2, 10, 2, 2, 2, 2),
(14, 'jeans', 20, 'Jeans', 'black', ' jeans for men', 'DISPONIBLE', 0, 'images.jpg', NULL, 0, 0, 0, 0, 0, 0),
(15, 'Jeans ', 50, 'Jeans', 'black', ' jeans for men', 'DISPONIBLE', 16, 'product_10592812hd.jpg', NULL, 0, 2, 2, 5, 5, 2),
(16, 'Jeans ', 80, 'Jeans', 'red', ' jeans for men', 'DISPONIBLE', 21, 'tÃ©lÃ©chargement.jpg', 3.5, 1, 2, 3, 6, 4, 5),
(17, 'T-shirt', 50, 'sneakers', 'blue', ' test', 'DISPONIBLE', 0, 'tÃ©lÃ©chargement.jpg', 3, 0, 0, 1, 0, 0, 0),
(18, 'eafeafeafea', 12, 'Accessories', 'black', 'fefeafeafeafeafeafe', 'DISPONIBLE', 27, 'Google.jpg', NULL, 3, 4, 5, 5, 5, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
