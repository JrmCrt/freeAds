-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 23 Avril 2016 à 20:46
-- Version du serveur :  5.6.28-0ubuntu0.15.10.1
-- Version de PHP :  5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `freeads`
--
CREATE DATABASE IF NOT EXISTS `freeads` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `freeads`;

-- --------------------------------------------------------

--
-- Structure de la table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ads`
--

INSERT INTO `ads` (`id`, `id_user`, `title`, `description`, `picture`, `price`, `updated_at`, `created_at`) VALUES
(8, 14, 'cat', 'fluffy cat !', 'little_ball_of_fur_by_rebecca_wientzek.jpg', 20, '2016-04-23 16:29:19', '2016-04-22 10:41:20'),
(9, 14, 'the sun', 'that''s right i''m selling the sun', 'sunset_by_isaías_hernández.jpg', 10000, '2016-04-22 14:07:10', '2016-04-22 14:07:10'),
(10, 15, 'Modern sculpture', 'Modern art masterpiece', 'helios_by_sigi_sagi.jpg', 36000, '2016-04-23 16:47:33', '2016-04-23 13:29:16'),
(14, 14, 'water drops shaped like paws', 'cool right ?', 'FootFall.png', 45, '2016-04-23 16:36:50', '2016-04-23 16:36:50'),
(17, 15, 'Canadian wood', 'High quality canadian wood', 'wood_by_thomas_vandenkerckhove.jpg', 300, '2016-04-23 18:41:55', '2016-04-23 18:41:55');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `id_sender` int(11) NOT NULL,
  `id_recipient` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `text`, `id_sender`, `id_recipient`, `seen`, `updated_at`, `created_at`) VALUES
(1, 'hello\r\nits me', 14, 15, 0, '2016-04-23 15:30:33', '2016-04-23 15:30:33'),
(2, 'hi its oli', 15, 14, 1, '2016-04-23 16:39:30', '2016-04-23 08:21:21'),
(3, 'hi its oli again', 15, 14, 1, '2016-04-23 16:28:43', '2016-04-23 09:21:21'),
(4, 'yo', 14, 15, 0, '2016-04-23 16:29:33', '2016-04-23 16:29:33'),
(5, 'yo', 14, 15, 0, '2016-04-23 16:30:26', '2016-04-23 16:30:26'),
(6, 'S''up ?', 14, 15, 1, '2016-04-23 16:40:27', '2016-04-23 16:40:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `token` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `lastname`, `birthdate`, `email`, `admin`, `activated`, `token`, `updated_at`, `created_at`) VALUES
(14, 'jer', 'jerome', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'creté', '1994-12-31', 'crete_a@epitech.eu', 0, 1, '550ccac2564593e7fe88bba65800e8d8270d7f24', '2016-04-23 16:32:07', '2016-04-21 10:15:19'),
(15, 'oli8', 'oli', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'crt', '1987-12-31', 'crete_o@epitech.eu', 0, 1, '73b503293cbefad9b781de8785e5283fb9abc109', '2016-04-23 13:27:38', '2016-04-23 13:27:38'),
(16, 'test', 'plapla', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'pla', '1878-01-01', 'pla@pla.com', 0, 1, '5a02ec2e32e3ca085b0e62fff605026e19f524a7', '2016-04-23 16:45:17', '2016-04-23 16:45:17');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;