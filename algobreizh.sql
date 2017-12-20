-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 20 Décembre 2017 à 14:50
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `algobreizh`
--

-- --------------------------------------------------------

--
-- Structure de la table `tclients`
--

CREATE TABLE `tclients` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tclients`
--

INSERT INTO `tclients` (`id`, `username`, `firstname`, `lastname`, `password`, `email`, `active`) VALUES
(1, 'qmz', 'Quentin', 'Martinez', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'qmz@algobreizh.fr', 1),
(2, 'bst', 'Paul', 'Besret', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'bst@algobreizh.fr', 1),
(3, 'dpe', 'Dorian', 'Pilorge', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'dpe@algobreizh.fr', 1);

-- --------------------------------------------------------

--
-- Structure de la table `torders`
--

CREATE TABLE `torders` (
  `id` int(11) NOT NULL,
  `clientId` int(11) DEFAULT NULL,
  `orderContentId` int(11) DEFAULT NULL,
  `done` tinyint(1) DEFAULT NULL,
  `id_tClients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `torders_products`
--

CREATE TABLE `torders_products` (
  `quantity` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `id_tProducts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tproducts`
--

CREATE TABLE `tproducts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `reference` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tproducts`
--

INSERT INTO `tproducts` (`id`, `name`, `price`, `reference`) VALUES
(1, 'Chondrus crispus', 10, 'P001'),
(2, 'Conserves', 8, 'P002'),
(3, 'Court bouillon', 12, 'P003'),
(4, 'Émietté de thon Wakamé', 10, 'P004'),
(5, 'Épices marines', 9, 'P005'),
(6, 'Haricots de mer en saumure (500g)', 19, 'P006'),
(7, 'Haricots marins', 12.5, 'P007'),
(8, 'Laitue de mer en feuilles', 11.9, 'P008'),
(9, 'Laitue de mer en paillettes', 18.5, 'P009'),
(10, 'Moutarde à la salicorne', 15.5, 'P010'),
(11, 'Nori en feuilles', 15.1, 'P011'),
(12, 'Nori en paillettes', 7.5, 'P012'),
(13, 'Nori saupoudreur aromate (10g)', 5, 'P013'),
(14, 'Pates aux algues', 8, 'P014'),
(15, 'Salicornes au naturel', 9.5, 'P015'),
(16, 'Salicornes au vinaigre', 13.8, 'P016'),
(17, 'Sels aux algues', 17, 'P017'),
(18, 'Tisane aux algues', 7, 'P018'),
(19, 'Wakamé en feuilles', 5, 'P019'),
(20, 'Wakamé en paillettes', 8, 'P020');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tclients`
--
ALTER TABLE `tclients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `torders`
--
ALTER TABLE `torders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tOrders_id_tClients` (`id_tClients`);

--
-- Index pour la table `torders_products`
--
ALTER TABLE `torders_products`
  ADD PRIMARY KEY (`id`,`id_tProducts`),
  ADD KEY `FK_tOrders_Products_id_tProducts` (`id_tProducts`);

--
-- Index pour la table `tproducts`
--
ALTER TABLE `tproducts`
  ADD PRIMARY KEY (`id`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `torders`
--
ALTER TABLE `torders`
  ADD CONSTRAINT `FK_tOrders_id_tClients` FOREIGN KEY (`id_tClients`) REFERENCES `tclients` (`id`);

--
-- Contraintes pour la table `torders_products`
--
ALTER TABLE `torders_products`
  ADD CONSTRAINT `FK_tOrders_Products_id` FOREIGN KEY (`id`) REFERENCES `torders` (`id`),
  ADD CONSTRAINT `FK_tOrders_Products_id_tProducts` FOREIGN KEY (`id_tProducts`) REFERENCES `tproducts` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
