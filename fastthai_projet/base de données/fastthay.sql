-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 18 mars 2021 à 12:31
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fastthay`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `type`) VALUES
(1, 'doux'),
(2, 'épicé'),
(3, 'très épicé');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id_plat` int(11) NOT NULL,
  `nom_plat` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `prix` float(10,2) NOT NULL,
  `created` date NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id_plat`, `nom_plat`, `image`, `description`, `prix`, `created`, `id_type`) VALUES
(2, 'Pad Thai', 'pad_thai.jpg', 'Poulet/ boeuf ou crevettes(au choix) le tout sautés au wok avec pousses de soja, ciboulette et nouille de riz plates avec un filet de citron vert.', 9.90, '2021-03-26', 3),
(3, 'Bo Bun', 'bo_bun.jpg', 'Poulet/ boeuf ou legumes(au choix) sautés au wok, salade, pousses de soja, carottes, concombres, cacahuetes, herbes, oignons frits et vermicelles de riz.', 9.90, '2021-03-16', 1),
(4, 'Boeuf Loc Lac', 'loc_lac.jpg', 'Dés de boeuf caramelisés sautés au wok, salade, tomates, concombres, oignons, ciboulette thai, riz blanc sauté à la tomate et oeuf au plat.', 10.90, '2021-03-16', 2),
(5, 'Curry rouge', 'curry_rouge.jpg', 'Poulet/boeuf ou crevettes (au choix), curry rouge au lait de coco, poivrons, courgettes et pousses de bambou sautés au wok, ciboulette thai et riz.', 11.90, '2021-03-16', 3),
(6, 'Curry vert', 'curry_vert.jpg', 'Poulet/boeuf ou crevettes (au choix), curry rouge au lait de coco, poivrons, courgettes et pousses de bambou sautés au wok, ciboulette thai et riz.', 11.90, '2021-03-17', 2),
(7, 'Vegetarien', 'vegetarian.jpg', 'Poivron, courgettes, chou rouge, carottes, pousses de soja, pousses de bambou, oignons caramelisés au wok, salade, ciboulette et riz', 11.90, '2021-03-17', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `login`, `pass`, `role`, `date_create`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1, '2021-03-16 09:57:27'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2, '2021-03-16 10:01:00'),
(3, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 2, '2021-03-16 14:14:32'),
(4, 'user2', '7e58d63b60197ceb55a1c487989a3720', 2, '2021-03-17 10:06:08');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id_plat`),
  ADD KEY `fk` (`id_type`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id_plat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_type`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
