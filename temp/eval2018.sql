-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 04 juin 2018 à 07:11
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
-- Base de données :  `eval2018`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'Artisanat', 'artisanat.jpg'),
(2, 'Social', 'social.jpg'),
(3, 'Economique', 'economique.jpg'),
(4, 'Bien-être', 'bien-etre.jpg'),
(5, 'Technique', 'technique.jpg'),
(12, 'Informatique', 'info.jpg'),
(14, 'Langues', 'langues.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '1',
  `duration` varchar(40) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catId` (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sections`
--

INSERT INTO `sections` (`id`, `name`, `categoryId`, `view`, `duration`, `image`, `description`) VALUES
(1, 'Bachelier en comptabilité', 3, 1, '4 ans', 'cpta.jpg', '<p>Well within gazelle however some caribou watchful and concomitant or horrendously and lemming well hello much through burped much through manatee while preparatory excluding valiantly proved that was far so much mandrill and sniffled far crud evident yet greyhound this like and.</p>\r\n'),
(3, 'Bachelier en secrétariat', 3, 1, '4 ans', 'sec.jpg', '<p>Equitable underneath so before tangibly lantern wow more that one dryly and mowed up in much rethought tenable insufferable absent otter flipped flamingo gnu that hence upset fish unnecessary reprehensively indecisively ungraceful one angelically and because.</p>\r\n'),
(4, 'Bachelier en construction', 5, 1, '4 ans', 'const.jpg', '<p>A as whooped diversely some safely amongst neutral definitely outside fresh flawlessly supp hired satanic on slavish fondly so tight well far raffish showed embarrassingly next this when cocky rid alas and barbarously academic and wolverine grunted aristocratic the alas equivalent a below scornfully and fallacious.</p>\r\n'),
(6, 'Réparation de montres anciennes', 1, 1, '2 ans', 'montre.jpg', '<p>Cost shivered off circa oh more this hugely and hedgehog much outside with a this impetuous more touched far hello goodness depending then with oh since less packed compatible and a less hence but far in dog regardless far some wow hey.</p>\r\n'),
(9, 'Bachelier en électromécanique', 5, 1, '4 ans', 'electro.jpg', '<p>The in cheered fabulously thus dear one rooster wow telepathic immediate after unbearable temperate forwardly unlike frequent strongly against hence chose a jeepers dreamed shuffled this excluding but hence correct outside dear leapt neurotically crud past blanched earthworm squid less the much furrowed fish.</p>\r\n'),
(10, 'Bachelier en topographie', 5, 1, '4 ans', 'topo.jpg', '<p>Despite oh antelope ouch up and and moistly less more kindhearted suspicious read gull house hello hawk a impala harshly while unthinkingly less frankly so hummingbird until with after one cooperatively began inappreciable the darn a added articulately in euphemistic much.</p>\r\n'),
(11, 'Décoration intérieure', 1, 1, '1 an', 'deco.jpg', '<p>Towards gasped pending human tiger more childishly realistic that a neat this pitiful wildebeest ravenous much rattlesnake as this hey that ambidextrously lecherously opossum as less against capital the near belched panda smirked before while a oh gerbil and among that up darn oh insufferable on.</p>\r\n'),
(13, 'Soins des mains', 4, 1, '6 mois', 'mains.jpg', '<p>Far this without man-of-war inanimate or before thoroughly built one affectionate man-of-war darn into ground assisted wrung then next one scorpion and on far amid goodness learned nightingale timorous decisive crud jeepers rancorous after raunchily until much a less bee a foolhardily limpet strode tart wow.</p>\r\n'),
(14, 'Soins du visage', 4, 1, '6 mois', 'visage.jpg', '<p>Moral so pending spread fantastically undertook far nutria wallaby hence jeez unicorn bald as experimentally one willfully and excepting selfless strode less broke gosh memorably treacherously congenially that cassowary before one capybara hence beneath and cuckoo strategically.</p>\r\n'),
(15, 'Huiles essentielles', 4, 1, '1 an', 'huile.jpg', '<p>Condescendingly fit while circa the toneless forward hey forbade jeez far and unbridled intimately much pouted busted house a manatee much tackily correct because aside more haltered yikes much instead whimpered across far jeepers some koala gosh awakened well due sweepingly baboon hello.</p>\r\n'),
(20, 'Anglais', 14, 1, '360 périodes', 'anglais.jpeg', '<p>And cliquish goodness crab with gazed hello until kangaroo nodded upset and some and splashed or pompous this darn and notwithstanding wow goose a shivered in easily more spelled that following forward then far stubbornly along crud for because jeez dogged less much naively yet tarantula jeepers considering extraordinary from.</p>\r\n'),
(21, 'Espagnol', 14, 0, '360 périodes', 'espagnol.jpg', '<p>Goodness the that grumbled rancorous overlaid snooty haughty black hugged when sentimentally wow less after sweepingly jeepers chameleon rabbit house alas shook hello merciful on this that that guilty however wow yikes foresaw shot as bald far wow hello wetted less spread far but avowedly considering.</p>\r\n'),
(22, 'Machine - techniques de base', 1, 1, '1 an et demi', 'machine01.png', '<p>Scelerisque phasellus aenean vivamus vitae placerat, maecenas leo sodales libero feugiat turpis, dictum sapien cras ac metus purus lobortis vel sem ornare eu elementum, enim ac semper egestas augue ultricies urna, vulputate integer arcu scelerisque urna adipiscing.</p>\r\n'),
(23, 'Soins du corps', 4, 1, '8 mois', 'corps.jpg', '<p>Dapibus dui nulla pharetra lacus nullam sollicitudin praesent lacus, massa duis etiam interdum pharetra ante suspendisse, lacus porta laoreet justo dolor quam inceptos per imperdiet porta potenti phasellus pulvinar condimentum lectus, curabitur torquent lectus cursus sem blandit commodo, aptent pretium egestas ipsum mollis fringilla.</p>\r\n'),
(24, 'Machine - techniques avancées', 1, 1, '1 an et demi', 'machine02.jpg', '<p>Tincidunt vestibulum felis sagittis odio donec massa pretium ligula, etiam sed eros ultricies eget himenaeos curae, donec taciti libero ipsum nec at eu hendrerit quam feugiat bibendum mi congue ut, ad felis vulputate sem fusce etiam, ullamcorper faucibus mollis vitae erat.</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `level` enum('Visiteur','Administrateur','Développeur','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstName`, `login`, `password`, `mail`, `level`) VALUES
(1, 'Lothbrok', 'Ragnar', 'ragnar', '$2y$10$W1.hqr/SeGo7xhOacLAoEOglrUXCGw6WgAjBcYAzvB5xd5BJfw97i', 'ragnar@gmail.com', 'Visiteur'),
(2, 'Grimes', 'Rick', 'rick', '$2y$10$wvsMjim29Hld.8OB14wKpOKvt0lh/3ELruoRlhh8ZRszLyAgFMRTu', 'rick@gmail.com', 'Visiteur'),
(3, 'Doe', 'John', 'doe', '$2y$10$RaaX3XYOA0zDiS7RC08y1ugb5TGJ0wdZF6FRWGgFnnT8My7dcHVVi', 'doe@gmail.com', 'Administrateur'),
(4, 'Dragonneau', 'Norbert', 'norbert', '$2y$10$M1g89Qd4yU7S6iiumEYZXe4qNXgxCTYpbKR58JGRb2zSdsOm7HQZW', 'dragonneau@gmail.com', 'Visiteur'),
(5, 'Hagrid', 'Rubeus', 'hagrid', '$2y$10$X.N15CWjxGdGAHX1Gkr/J.H6OkSwCpG1QUKdL5J9xCkXpWTQ9ma2K', 'hagrid@gmail.com', 'Visiteur'),
(6, 'Skywalker', 'Luke', 'luke', '$2y$10$GOhReCi/psj1o3E.MqjsvOXknQ2i4OY5JIhrVBqF3QU1rUob8ddVm', 'luke@gmail.com', 'Visiteur'),
(7, 'Delacour', 'Fleur', 'fleur', '$2y$10$j7f3TA3wTtp2c1UJLHW28e19floyIUQdaQ2lKID.8kdNKt/d.zTHy', 'fleur@gmail.com', 'Visiteur'),
(19, 'Marthus', 'Patrick', 'pat', '$2y$10$32KqQ2kr.kskqOidWCIBM.4kLNKGgiaT7pzZFNtTNcX/EknsE7rIO', 'pat@gmail.com', 'Administrateur');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
