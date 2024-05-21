-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : mar. 21 mai 2024 à 09:12
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wikicampers`
--

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vehicle_id` int NOT NULL,
  `user_id` int NOT NULL,
  `date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `price_per_day` int NOT NULL,
  `duration` int NOT NULL,
  `total_price` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E00CEDDE545317D1` (`vehicle_id`),
  KEY `IDX_E00CEDDEA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240513152130', '2024-05-13 15:22:30', 56),
('DoctrineMigrations\\Version20240513160403', '2024-05-13 16:04:36', 59),
('DoctrineMigrations\\Version20240514141722', '2024-05-14 14:17:57', 215),
('DoctrineMigrations\\Version20240514173144', '2024-05-14 17:32:03', 93),
('DoctrineMigrations\\Version20240515085440', '2024-05-15 08:54:53', 82),
('DoctrineMigrations\\Version20240515140057', '2024-05-15 14:01:13', 75),
('DoctrineMigrations\\Version20240517083115', '2024-05-17 08:31:31', 92),
('DoctrineMigrations\\Version20240517145559', '2024-05-17 14:56:13', 77),
('DoctrineMigrations\\Version20240517145734', '2024-05-17 14:57:50', 58),
('DoctrineMigrations\\Version20240521090900', '2024-05-21 09:11:28', 80);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nickname`) VALUES
(1, 'admin@test.com', '[\"ROLE_ADMIN\"]', '$2y$13$ZNa4F/74.Rgby7yux/e1s.HQnen6nYVUXp.pt7IP0ltaxKApXheEy', 'admin'),
(3, 'test@test.com', '[]', '$2y$13$tYFFSitK7k9cQF3LzM7Ukub9d9scs43nDVDxN5aGtO.b8Pw75NwDy', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `calendar_start_date` date NOT NULL,
  `calendar_end_date` date NOT NULL,
  `price_per_day` decimal(10,0) NOT NULL,
  `image_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `numberplate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` float NOT NULL,
  `height` float NOT NULL,
  `gearbox` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kms` int NOT NULL,
  `year` date NOT NULL,
  `fuel_consumption` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adblue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `places_nb` int NOT NULL,
  `zip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1B80E486A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicle`
--

INSERT INTO `vehicle` (`id`, `user_id`, `brand`, `model`, `calendar_start_date`, `calendar_end_date`, `price_per_day`, `image_name`, `image_size`, `updated_at`, `numberplate`, `length`, `height`, `gearbox`, `fuel_type`, `kms`, `year`, `fuel_consumption`, `adblue`, `description`, `places_nb`, `zip`, `city`, `country`) VALUES
(5, 1, 'Ford', 'BENIMAR SPORT', '2024-05-15', '2024-07-31', 0, 'ford-benimar-sport-6644db7738c45642724659.jpeg', 264654, '2024-05-15 15:57:43', '952-BM-85', 6.9, 3.09, 'Manuelle', 'Diesel', 30000, '2018-04-03', '10', 'Oui', '<div>Nous louons notre Béni avec qui nous aimons passer des bons moments à la mer, à la montagne, pour visiter le patrimoine culturel français...<br>Il est particulièrement adapté aux familles avec des enfants.<br>Nous y tenons beaucoup et nous vous demanderons d\'en prendre grand soin également.<br>Les animaux ne sont pas acceptés.</div>', 4, '69000', 'Lyon', 'France'),
(6, 1, 'Mercedes', 'VITO MARCO POLO W638', '2024-05-15', '2024-08-31', 0, 'mercedes-vito-66448b4ac78a2168976527.jpeg', 138245, '2024-05-15 10:15:38', '952-BM-86', 4.7, 1.85, 'Manuelle', 'Diesel', 26000, '2002-01-01', '9', 'Non', '<div>Salut, moi c\'est Mathieu 27 ans et grand adepte de vanlife et d\'aventure !<br>Je vous propose de louer mon van, Sergio, qui vous emmènera partout avec son moteur de 122ch très bien entretenu et qui consomme peu pour son poids (8,5L/100km), ses pneus tous neufs, son aménagement ultra complet et son style rétro !<br>Sa petite taille lui permet de passer sous les barres de 2m (et même les barres d\'1,90m) mais son toit ouvrant cache un couchage confortable de deux places et complète la banquette arrière qui se transforme en lit double en moins d\'une minute. Ainsi vous pourrez partir en vacances jusqu\'à 4 pour vous éclater en famille ou entres amis !<br>Je l\'ai équipé en vaisselle et accessoires de camping (couverts, casseroles, table de camping extérieure avec 4 tabourets dépliants, etc.), il y a tout ce qu\'il faut ! Et je peux même vous mettre des draps à disposition.<br>A 15min à pied de la gare d\'Aix-les-Bains, vous pourrez facilement récupérer le véhicule à pied (ou garer le votre).<br>N\'hésitez pas si vous avez des demandes particulières, je ferai ce que je peux pour vous faciliter la tâche, je vous expliquerai le fonctionnement du véhicule et les précautions à prendre mais rassurez vous, il se conduit très bien, il est très fonctionnel et très bien entretenu (normal j\'y veille personnellement) alors j\'espère que vous en prendre grand soin également.</div>', 4, '13000', 'Marseille', 'France'),
(7, 1, 'Volkswagen', 'GRAND CALIFORNIA', '2024-05-15', '2024-09-30', 0, 'volkswagen-grand-california-66448c3b8d84c764720453.jpeg', 387171, '2024-05-15 10:19:39', '952-BM-87', 6, 3, 'Automatique', 'Diesel', 40000, '2021-05-07', '11', 'Oui', '<div>Superbe grand California 600.<br>Van grande hauteur idéal pour 4 personnes été comme hiver.<br>Son moteur 177 cv et sa boîte automatique robotisée vous emmèneront partout.<br>Très moderne très fonctionnel très bien équipé.</div>', 4, '33000', 'Bordeaux', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `wiki_global_calendar`
--

DROP TABLE IF EXISTS `wiki_global_calendar`;
CREATE TABLE IF NOT EXISTS `wiki_global_calendar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `wiki_global_calendar`
--

INSERT INTO `wiki_global_calendar` (`id`, `start_date`, `end_date`) VALUES
(1, '2024-05-15', '2024-06-01');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_E00CEDDE545317D1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`),
  ADD CONSTRAINT `FK_E00CEDDEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `FK_1B80E486A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
