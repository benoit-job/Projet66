-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 11 juil. 2024 à 23:27
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet66`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
  `stock` int(100) NOT NULL,
  `description` text NOT NULL,
  `image` longtext DEFAULT NULL,
  `prix` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `category_id`, `title`, `subtitle`, `stock`, `description`, `image`, `prix`) VALUES
(36, 2, 'Dark wash Xavi jeans', 'Dark wash Xavi jeans', 50, '$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$', 'shop-4.jpg', 10000),
(38, 1, 'Ankle-cuff sandals', 'Ankle-cuff sandals', 50, '$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$', 'shop-5.jpg', 10000),
(39, 3, 'Furry hooded parka', 'Furry hooded parka', 50, '$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$', 'shop-1.jpg', 5000),
(40, 4, 'Croc-effect bag', 'Croc-effect bag', 50, 'PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP', 'shop-3.jpg', 20000),
(41, 5, 'Water resistant zips backpack', 'Water resistant zips backpack', 50, 'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK', 'shop-9.jpg', 15000);

-- --------------------------------------------------------

--
-- Structure de la table `artisans`
--

CREATE TABLE `artisans` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `datenaissance` date NOT NULL,
  `localisation` varchar(255) NOT NULL,
  `metier` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `password` varchar(16) NOT NULL,
  `photo` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `artisans`
--

INSERT INTO `artisans` (`id`, `nom`, `prenom`, `email`, `contact`, `sexe`, `datenaissance`, `localisation`, `metier`, `nationalite`, `password`, `photo`) VALUES
(1, 'MICHAEL', 'KOKO', 'kokomichael148@gmail.com', '050155', 'MASCULIN', '2024-04-11', 'ABIDJAN', 'MENUSIER', 'IVOIRIENNE', 'Michael', 'product-2.jpg'),
(4, 'SORO', 'JUNIOR', 'serge5@gmail.com', '0506944519', 'MASCULIN', '2024-05-10', 'ABIDJAN', 'COUTURIER', 'IVOIRIENNE', 'Michael', 'boubou_marocain.png'),
(7, 'SORO', 'DEBE', 'debe25@gmail.com', '070000', 'MASCULIN', '2024-02-29', 'ABIDJAN', 'PARTISIER', 'IVOIRIENNE', 'Michael', 'close-up-man-with-delicious-cupcakes.jpg'),
(8, 'KOFFI', 'KOUMAN', 'kouman25@gmail.com', '071111', 'MASCULIN', '2023-11-03', 'ABIDJAN', 'MENUISIER(E)', 'IVOIRIENNE', 'Michael', 'side-view-man-measuring-wood.jpg'),
(9, 'KARIDIOULA ', 'MARCELINE', 'kokomichael148@gmail.com', '072222', 'FEMININ', '2023-09-07', 'BOUAKE', 'COIFFEUR(SE)', 'IVOIRIENNE', 'Michael', 'woman-hairdresser-salon.jpg'),
(10, 'KOUAME', 'DORIAN', 'dorian25@gmail.com', '073333', 'MASCULIN', '2024-04-18', 'ABIDJAN', 'PEINTRE', 'IVOIRIENNE', 'Michael', 'strict-raised-hand-young-african-american-builder-uniform-holding-roller-brush-isolated-blue-background.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'SACS'),
(2, 'JEANS'),
(3, 'PULL'),
(4, 'ROBE'),
(5, 'CHAUSSURE'),
(6, 'CHAUSSURE');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `datenaissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `localisation` varchar(255) NOT NULL,
  `photo` longtext DEFAULT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `datenaissance`, `email`, `contact`, `sexe`, `nationalite`, `localisation`, `photo`, `password`) VALUES
(1, 'MICHAEL', 'KOKO', '2024-07-18', 'kokomichael148@gmail.com', '070000', 'MASCULIN', 'IVOIRIENNE', 'ABIDJAN', 'WhatsApp Image 2024-01-19 at 09.23.50.jpeg', 'Michael');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `image` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `title`, `prix`, `quantity`, `image`) VALUES
(82, 'Furry hooded parka', '5000', '1', 'shop-1.jpg'),
(83, 'Furry hooded parka', '5000', '1', 'shop-1.jpg'),
(84, 'Furry hooded parka', '5000', '1', 'shop-1.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Etrangere` (`category_id`);

--
-- Index pour la table `artisans`
--
ALTER TABLE `artisans`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `artisans`
--
ALTER TABLE `artisans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `products_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
