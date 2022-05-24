-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 07 avr. 2022 à 18:24
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eco`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `panier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `produit`, `qte`, `panier`) VALUES
(31, 1, 2, 25),
(32, 6, 1, 25),
(33, 9, 1, 25);

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id_commande` int(11) NOT NULL,
  `panier_id` int(11) NOT NULL,
  `montantHT` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `dateCommande` date NOT NULL,
  `dateLivraison` date NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id_commande`, `panier_id`, `montantHT`, `client`, `dateCommande`, `dateLivraison`, `etat`) VALUES
(36, 25, 20510, 26, '2022-04-06', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `categorieproduit`
--

CREATE TABLE `categorieproduit` (
  `id_categorie` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorieproduit`
--

INSERT INTO `categorieproduit` (`id_categorie`, `category_name`) VALUES
(1, 'Composte Organique'),
(2, 'Electroniques');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `qteCommande` float NOT NULL,
  `dateCommande` date NOT NULL,
  `dateLivraison` date NOT NULL,
  `etatcommande` int(11) NOT NULL,
  `panierID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `produit`, `montant`, `client`, `qteCommande`, `dateCommande`, `dateLivraison`, `etatcommande`, `panierID`) VALUES
(1, 1, 100, 1, 258, '2021-12-30', '0000-00-00', 1, 0),
(3, 2, 100, 4, 585, '2021-12-31', '0000-00-00', 1, 0),
(4, 1, 500, 4, 100, '2022-03-15', '0000-00-00', 2, 0),
(5, 1, 0, 23, 0, '2022-03-23', '0000-00-00', 1, 0),
(6, 1, 0, 26, 200, '2022-03-31', '0000-00-00', 1, 0),
(7, 19, 0, 26, 11, '2022-04-02', '0000-00-00', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `etatcommande`
--

CREATE TABLE `etatcommande` (
  `id_etatCommande` int(11) NOT NULL,
  `etatCommande` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etatcommande`
--

INSERT INTO `etatcommande` (`id_etatCommande`, `etatCommande`) VALUES
(1, 'En Cours'),
(2, 'Livré'),
(3, 'Annulé');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `user` int(4) NOT NULL,
  `message` text NOT NULL,
  `date_denvoi` date NOT NULL DEFAULT current_timestamp(),
  `statutMessage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `user`, `message`, `date_denvoi`, `statutMessage`) VALUES
(1, 1, 'Test yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', '2022-02-06', 1),
(3, 3, 'test', '2022-02-06', 1),
(4, 3, 'test', '2022-02-06', 0);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `etatPanier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_panier`, `user_id`, `etatPanier`) VALUES
(25, 26, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `intitule` varchar(250) NOT NULL,
  `categorie` int(11) NOT NULL,
  `prix` float NOT NULL,
  `quantite` float NOT NULL,
  `qteFinal` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `vendeur` int(11) NOT NULL,
  `statutProduit_id` int(11) NOT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `intitule`, `categorie`, `prix`, `quantite`, `qteFinal`, `description`, `image`, `vendeur`, `statutProduit_id`, `dateCreated`) VALUES
(1, 'tomate', 1, 10000, 100, 79, 'en effet, la tomate est un l??gume-fruit qui accepte le compost demi-mur. pour ceux qui n’ont pas (encore) de composteur personnel, vous pouvez utiliser du compost vendu en sacs. on en trouve en jardinerie, ou mieux, sur les plateformes de compostages qui recyclent les d??chets verts. attention, n’utilisez surtout pas de terreau !                        ', '11873_pizza.jpg', 1, 2, '2021-12-30'),
(2, 'Coques de cacao', 1, 50000, 5000, 5000, 'La coque de cacao est un produit 100% naturel et biodégradable obtenu par le broyage des coquilles de fèves de cacao. Ce produit est recommandé comme étant le meilleur paillis pour le sol, il protège les plantations du gel hivernal.', '1640878850.jpg', 1, 1, '2021-12-30'),
(4, 'test', 1, 10000, 456, 456, 'test description', '1641749325.jpg', 1, 1, '2022-01-09'),
(6, 'test', 1, 10, 10, 9, 'test', '16550_logo.jpg', 4, 2, '2022-02-01'),
(9, 'Cacao', 1, 500, 450, 449, 'Cacao', '38442_500.png', 1, 2, '2022-03-18'),
(11, 'chute', 1, 450, 450, 450, 'testt', '42509_chute.jpg', 1, 3, '0000-00-00'),
(17, 'tomate', 1, 452, 120, 120, '', '22226_aw.png', 10, 2, '0000-00-00'),
(18, 'chute', 2, 3, 500, 500, 'chute ', '31220_cover.jpg', 10, 2, '0000-00-00'),
(19, 'test ajout', 2, 5, 10, 10, 'test de l\'ajout du produit', '62501_eye.jpg', 10, 2, '2022-03-28');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id_statut` int(11) NOT NULL,
  `statuts` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `statuts`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Structure de la table `statutproduit`
--

CREATE TABLE `statutproduit` (
  `id_statutProduit` int(11) NOT NULL,
  `statutProduit` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `statutproduit`
--

INSERT INTO `statutproduit` (`id_statutProduit`, `statutProduit`) VALUES
(1, 'Soumis'),
(2, 'Validé'),
(3, 'En vente'),
(4, 'Vendu');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `genre` varchar(250) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `localite` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `token` text NOT NULL,
  `userType` int(11) NOT NULL,
  `statut` int(11) NOT NULL,
  `image_user` text NOT NULL,
  `dateInscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `email`, `genre`, `contact`, `localite`, `password`, `token`, `userType`, `statut`, `image_user`, `dateInscription`) VALUES
(1, 'Potter', 'Backary', 'Bamba@gmail.com', 'homme', '0707', 'Adiake', '$2y$10$uf0JDajvzVG3czmR5atLG.03dLoNqJcNyZ3k0SpvQnEV3XtjvoXZi', '0', 1, 2, '36041_im3.jpg', '2021-12-30'),
(3, 'DOE', 'Jhon', 'yoannbosson97@gmail.com', 'homme', '0101', 'Dublin', '1234', '672929', 2, 1, '42241_cover.jpg', '2022-02-02'),
(4, 'Dollar', 'Mary', 'marydollar@gmail.com', 'femme', '070707', 'Cheyennes', '4444', 'yecyuetbejfekeuglifhaoefbezui84876ejugtuye', 2, 1, '42241_cover.jpg', '0000-00-00'),
(10, 'bosson', 'yoann', 'yo@gmail.com', 'homme', '0797505242', 'yopougon', '$2y$10$fZc/lG/lyjFN1sKhMJFE5OiI/icBuKNAS.V4qrkupvKgK4FlgIidy', '0', 1, 1, '42241_cover.jpg', '0000-00-00'),
(17, 'Bosson', 'Yoann', 'yoannbosson@gmail.com', 'homme', '07975052', 'Yopougon', '202cb962ac59075b964b07152d234b70', '', 1, 2, '36041_im3.jpg', '2022-03-14'),
(23, 'Laeticia', 'Baure', 'baure@gmail.com', 'femme', '0101', 'Cocody', '202cb962ac59075b964b07152d234b70', '', 2, 1, '1648060787.jpg', '2022-03-23'),
(24, 'parker', 'petter', 'parker@gmail.com', 'homme', '0202', 'adjamé', '$2y$10$xnArAxSk1ZDs0UtfhBPbn.HZHcdmYB9Hm8JEWD7FriuQcPckYCT16', '0', 1, 1, '59591_vu1 (2).jpg', '0000-00-00'),
(26, 'potter', 'harry', 'potter@gmail.com', 'homme', '010101', 'poudlard', '814f06ab7f40b2cff77f2c7bdffd3415', '685338', 2, 1, '93599_24kgold.jpg', '0000-00-00'),
(27, 'jackson', 'jordan', 'jordan@gmail.com', 'homme', '0101', 'cocody', '202cb962ac59075b964b07152d234b70', '', 2, 1, '59989_vu6.jpg', '0000-00-00'),
(28, 'cooper', 'david', 'david@gmail.com', 'homme', '0101', 'yop', '$2y$10$Z0j19c78/yI5Ry0nwPtsde0zTEKfjBLvm3Z.tqJ44My18Ypdf7VjK', '126802', 1, 2, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `usertype`
--

CREATE TABLE `usertype` (
  `id_type` int(11) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `usertype`
--

INSERT INTO `usertype` (`id_type`, `type`) VALUES
(1, 'Admin'),
(2, 'Other'),
(3, 'Super Admin\r\n');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `categorieproduit`
--
ALTER TABLE `categorieproduit`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `client` (`client`),
  ADD KEY `produit` (`produit`),
  ADD KEY `etatCommande` (`etatcommande`);

--
-- Index pour la table `etatcommande`
--
ALTER TABLE `etatcommande`
  ADD PRIMARY KEY (`id_etatCommande`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendeur` (`vendeur`),
  ADD KEY `categorie` (`categorie`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id_statut`);

--
-- Index pour la table `statutproduit`
--
ALTER TABLE `statutproduit`
  ADD PRIMARY KEY (`id_statutProduit`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `statut` (`statut`),
  ADD KEY `userType` (`userType`);

--
-- Index pour la table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `categorieproduit`
--
ALTER TABLE `categorieproduit`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `etatcommande`
--
ALTER TABLE `etatcommande`
  MODIFY `id_etatCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id_statut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `statutproduit`
--
ALTER TABLE `statutproduit`
  MODIFY `id_statutProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`client`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_3` FOREIGN KEY (`etatCommande`) REFERENCES `etatcommande` (`id_etatCommande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_4` FOREIGN KEY (`etatcommande`) REFERENCES `etatcommande` (`id_etatCommande`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`vendeur`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`categorie`) REFERENCES `categorieproduit` (`id_categorie`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`statut`) REFERENCES `statut` (`id_statut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`userType`) REFERENCES `usertype` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
