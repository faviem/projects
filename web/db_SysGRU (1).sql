-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost:3306
-- Généré le: Mar 29 Mars 2016 à 15:59
-- Version du serveur: 5.5.47-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `db_SysGRU`
--

-- --------------------------------------------------------

--
-- Structure de la table `AdresseContact`
--

CREATE TABLE IF NOT EXISTS `AdresseContact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville_id` int(11) DEFAULT NULL,
  `departement_id` int(11) DEFAULT NULL,
  `localite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telmobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_785D9517A73F0036` (`ville_id`),
  KEY `IDX_785D9517CCF9E01E` (`departement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Contenu de la table `AdresseContact`
--

INSERT INTO `AdresseContact` (`id`, `ville_id`, `departement_id`, `localite`, `telmobile`, `email`, `details`) VALUES
(1, 1, 2, 'AKpakpa', '+229 ...........', 'contrelec@benin.bj', NULL),
(2, 1, 2, 'AKpakpa', '+229 ...........', 'sbee@benin.bj', NULL),
(3, 1, 2, 'AKpakpa', '+229 ...........', 'aberme@benin.bj', NULL),
(4, 1, 2, 'AKpakpa', '+229 ...........', 'dge@benin.bj', NULL),
(5, 1, 2, 'AKpakpa', '+229 ...........', 'dghcf@benin.bj', NULL),
(6, 1, 2, 'AKpakpa', '+229 ...........', 'soneb@benin.bj', NULL),
(7, 1, 2, 'AKpakpa', '+229 ...........', 'GIZ@benin.bj', NULL),
(8, 1, 2, 'AKpakpa', '+229 ...........', 'ceb@benin.bj', NULL),
(15, 1, 2, 'Yyyyyyyyyyyyyyyénawa', '+229 96 89 26 25', 'fvemile@gmail.com', NULL),
(16, 1, 2, 'Vèdoko', '+229 96 89 26 25', 'fvemile@gmail.com', NULL),
(17, 4, 1, 'Pkankamè', '+229 89 52 45 47', 'agossou@yahoo.fr', NULL),
(18, 3, 1, 'Vanda', '+229 78 41 25 47', 'agon201@gmail.com', NULL),
(20, 2, 1, 'Agbokou', '+229 78 41 45 47', 'kokou@hotmail.fr', NULL),
(21, 4, 1, 'Lokomey', '+229 48 78 41 45', 'akm@yahoo.fr', NULL),
(22, 1, 3, 'Finagnon', '+229 89 55 44 77', 'gan@yahoo.fr', NULL),
(23, 3, 3, 'Kanpkè', '+339 45 14 78 41', 'ceri@yahoo.fr', NULL),
(24, 3, 3, 'Ynénawa', '+229 78 54 45 78', 'houns@yahoo.fr', NULL),
(26, 3, 1, 'Kpahou', '+229 89 52 45 14', 'thom@yahoo.fr', NULL),
(27, 2, 2, 'Sègbeya', '+229 89 52 45 14', 'jean@gmail.com', NULL),
(28, 1, 2, 'Sègbannan', '+229 96 89 52 54', 'fvemile@yahoo.fr', NULL),
(29, 4, 1, 'Finagnon', '+229 89 52 48 99', NULL, NULL),
(30, 3, 5, 'Avakpa', '+229 96 89 52 52', NULL, NULL),
(32, 4, 2, 'Avakpa', '+229 89 85 45 14', NULL, NULL),
(33, 4, 5, 'Landomey', '+229 98 56 25 14', NULL, NULL),
(34, 1, 2, 'Fignonhoué', '+229 98 56 25 14', NULL, NULL),
(35, 1, 3, 'SOnagnon', '+229 98 58 48 47', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Agent`
--

CREATE TABLE IF NOT EXISTS `Agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E74AB399A76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Agent`
--

INSERT INTO `Agent` (`id`, `user_id`, `loginpersist`, `datepersist`, `logindelete`, `datedelete`, `estdelete`, `nom`, `prenom`, `sexe`) VALUES
(1, 1, 'admin', NULL, NULL, NULL, 0, 'FADONOUGBO', 'Emile', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Alerte`
--

CREATE TABLE IF NOT EXISTS `Alerte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ClotureRequete`
--

CREATE TABLE IF NOT EXISTS `ClotureRequete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requete_id` int(11) NOT NULL,
  `mention_id` int(11) DEFAULT NULL,
  `dateCloture` datetime NOT NULL,
  `commentaireCloture` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_769ECE5818FB544F` (`requete_id`),
  KEY `IDX_769ECE587A4147F0` (`mention_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Departement`
--

CREATE TABLE IF NOT EXISTS `Departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomdepartement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `Departement`
--

INSERT INTO `Departement` (`id`, `nomdepartement`, `loginpersist`, `datepersist`, `logindelete`, `datedelete`, `estdelete`) VALUES
(1, 'COLLINE', 'admin', '2016-03-10 18:45:36', NULL, NULL, 0),
(2, 'ATLANTIQUE', 'admin', '2016-03-10 19:12:43', NULL, NULL, 0),
(3, 'PLATEAU', 'admin', '2016-03-14 08:31:30', NULL, NULL, 0),
(4, 'ALIBORI', 'admin', '2016-03-16 15:55:24', NULL, NULL, 0),
(5, 'BORGOU', 'admin', '2016-03-16 15:55:40', NULL, NULL, 0),
(6, 'DONGA', 'admin', '2016-03-16 15:55:45', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `DirecteurTechnique`
--

CREATE TABLE IF NOT EXISTS `DirecteurTechnique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `structuresoustutelle_id` int(11) DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1918D44AA76ED395` (`user_id`),
  KEY `IDX_1918D44A480B4CBC` (`structuresoustutelle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `DirecteurTechnique`
--

INSERT INTO `DirecteurTechnique` (`id`, `user_id`, `structuresoustutelle_id`, `loginpersist`, `datepersist`, `logindelete`, `datedelete`, `estdelete`, `nom`, `prenom`, `sexe`) VALUES
(1, 2, 8, 'admin', '2016-03-19 15:45:15', NULL, NULL, 0, 'KAKPO', 'André', 'M'),
(2, 6, 8, 'admin', '2016-03-19 21:15:49', NULL, NULL, 0, 'AGASSA', 'Denise', 'F'),
(3, 7, 8, 'admin', '2016-03-19 21:16:59', NULL, NULL, 0, 'FADOUMI', 'Guy', 'M'),
(4, 8, 5, 'admin', '2016-03-19 21:18:07', NULL, NULL, 0, 'DANSOU', 'Joyce', 'M');

-- --------------------------------------------------------

--
-- Structure de la table `Emetteur`
--

CREATE TABLE IF NOT EXISTS `Emetteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FC574580A76ED395` (`user_id`),
  UNIQUE KEY `UNIQ_FC574580537A1329` (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `FileIdentite`
--

CREATE TABLE IF NOT EXISTS `FileIdentite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateEnregistrement` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `FileRequete`
--

CREATE TABLE IF NOT EXISTS `FileRequete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requete_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateEnregistrement` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_16634EDD18FB544F` (`requete_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `FileTraitement`
--

CREATE TABLE IF NOT EXISTS `FileTraitement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filerequete_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateEnregistrement` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6B9F0844DB684A24` (`filerequete_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Mention`
--

CREATE TABLE IF NOT EXISTS `Mention` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `Mention`
--

INSERT INTO `Mention` (`id`, `libelle`, `loginpersist`, `datepersist`, `logindelete`, `datedelete`, `estdelete`) VALUES
(1, 'Moyennement satisfaisante', 'admin', '2016-03-14 09:57:22', NULL, NULL, 0),
(2, 'Satisfaisante', 'admin', '2016-03-14 09:56:15', NULL, NULL, 0),
(3, 'Très satisfaisante', 'admin', '2016-03-14 09:56:23', NULL, NULL, 0),
(4, 'Moins satisfaisante', 'admin', '2016-03-14 09:56:28', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Message`
--

CREATE TABLE IF NOT EXISTS `Message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateEnvoi` datetime NOT NULL,
  `emetteur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_790009E379E92E8C` (`emetteur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ModeSaisine`
--

CREATE TABLE IF NOT EXISTS `ModeSaisine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `ModeSaisine`
--

INSERT INTO `ModeSaisine` (`id`, `libelle`) VALUES
(1, 'Appel téléphonique'),
(2, 'Courier'),
(3, 'Accueil du siège'),
(4, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `Particulier`
--

CREATE TABLE IF NOT EXISTS `Particulier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usagerclient_id` int(11) NOT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_EA585B24D7746552` (`usagerclient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `Particulier`
--

INSERT INTO `Particulier` (`id`, `usagerclient_id`, `profession`, `nom`, `prenom`, `sexe`) VALUES
(2, 2, 'Menuisier', 'FADE', 'THomaa', NULL),
(3, 3, 'Vitrier', 'AHOGBEME', 'Jean', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Profil`
--

CREATE TABLE IF NOT EXISTS `Profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `libelle` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `Profil`
--

INSERT INTO `Profil` (`id`, `code`, `libelle`, `loginpersist`, `datepersist`) VALUES
(1, 'ROLE_DDIP', 'Directeur DIP', NULL, NULL),
(2, 'ROLE_CSRU', 'Chef Service SRU', NULL, NULL),
(3, 'ROLE_CSRU', 'Chef Service SRU', NULL, NULL),
(4, 'ROLE_RT', 'Responsable Technique', NULL, NULL),
(5, 'ROLE_CSI', 'Chef Service Informatique', NULL, NULL),
(6, 'ROLE_ADRST', 'Responsable DRST', NULL, NULL),
(7, 'ROLE_ADARPSL', 'Responsable DARPSL', NULL, NULL),
(8, 'ROLE_SRU', 'Collaborateur SRU', NULL, NULL),
(9, 'ROLE_ADMIN', 'Administrateur', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Recepteur`
--

CREATE TABLE IF NOT EXISTS `Recepteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `dateLu` datetime NOT NULL,
  `estLu` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_7F11587CA76ED395` (`user_id`),
  KEY `IDX_7F11587C537A1329` (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ReponseMessage`
--

CREATE TABLE IF NOT EXISTS `ReponseMessage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ReponseTraitementRequete`
--

CREATE TABLE IF NOT EXISTS `ReponseTraitementRequete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mention_id` int(11) DEFAULT NULL,
  `traitementrequete_id` int(11) NOT NULL,
  `dateReponse` datetime NOT NULL,
  `commentaireReponse` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BBAB5413BEB611DE` (`traitementrequete_id`),
  KEY `IDX_BBAB54137A4147F0` (`mention_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `ReponseTraitementRequete`
--

INSERT INTO `ReponseTraitementRequete` (`id`, `mention_id`, `traitementrequete_id`, `dateReponse`, `commentaireReponse`) VALUES
(1, 3, 2, '2016-03-25 10:29:37', 'pp'),
(2, 1, 5, '2016-03-28 10:13:28', 'oooookkkkkkkk');

-- --------------------------------------------------------

--
-- Structure de la table `Requete`
--

CREATE TABLE IF NOT EXISTS `Requete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filerequete_id` int(11) DEFAULT NULL,
  `particulier_id` int(11) DEFAULT NULL,
  `cloturerequete_id` int(11) DEFAULT NULL,
  `societeentreprise_id` int(11) DEFAULT NULL,
  `typerequete_id` int(11) DEFAULT NULL,
  `alerte_id` int(11) DEFAULT NULL,
  `modesaisine_id` int(11) DEFAULT NULL,
  `structuresoustutelle_id` int(11) DEFAULT NULL,
  `dateEmise` datetime NOT NULL,
  `dateConsulter` datetime DEFAULT NULL,
  `delaitraitementprevu` int(11) DEFAULT NULL,
  `typeusagerclient` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateCloturePrevue` datetime DEFAULT NULL,
  `dateCloturer` datetime DEFAULT NULL,
  `estFonder` tinyint(1) DEFAULT NULL,
  `estResolu` tinyint(1) NOT NULL,
  `codeRecepisse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estAvorterUsagerclient` tinyint(1) NOT NULL,
  `dateAvorterUsagerclient` datetime DEFAULT NULL,
  `commentaireAvorterUsagerclient` longtext COLLATE utf8_unicode_ci,
  `commentaireUsagerclient` longtext COLLATE utf8_unicode_ci NOT NULL,
  `commentaireVulnerable` longtext COLLATE utf8_unicode_ci,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `estentraitement` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D1DB0036DB684A24` (`filerequete_id`),
  UNIQUE KEY `UNIQ_D1DB0036A89E0E67` (`particulier_id`),
  UNIQUE KEY `UNIQ_D1DB003627DECFE7` (`cloturerequete_id`),
  UNIQUE KEY `UNIQ_D1DB0036342FA01E` (`societeentreprise_id`),
  KEY `IDX_D1DB0036E1A1B442` (`typerequete_id`),
  KEY `IDX_D1DB00362C9BA629` (`alerte_id`),
  KEY `IDX_D1DB0036118BB224` (`modesaisine_id`),
  KEY `IDX_D1DB0036480B4CBC` (`structuresoustutelle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `Requete`
--

INSERT INTO `Requete` (`id`, `filerequete_id`, `particulier_id`, `cloturerequete_id`, `societeentreprise_id`, `typerequete_id`, `alerte_id`, `modesaisine_id`, `structuresoustutelle_id`, `dateEmise`, `dateConsulter`, `delaitraitementprevu`, `typeusagerclient`, `dateCloturePrevue`, `dateCloturer`, `estFonder`, `estResolu`, `codeRecepisse`, `estAvorterUsagerclient`, `dateAvorterUsagerclient`, `commentaireAvorterUsagerclient`, `commentaireUsagerclient`, `commentaireVulnerable`, `loginpersist`, `datepersist`, `logindelete`, `datedelete`, `estdelete`, `estentraitement`) VALUES
(1, NULL, 2, NULL, NULL, 3, NULL, 1, 8, '2016-03-16 12:47:49', '2016-03-18 16:57:10', NULL, 'Personne physique', NULL, NULL, 1, 0, '1471216', 0, NULL, NULL, 'PLease', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, NULL, 3, NULL, NULL, 3, NULL, NULL, 5, '2016-03-17 19:35:25', '2016-03-17 20:40:29', NULL, 'Personne physique', NULL, NULL, 1, 0, '2491216', 0, NULL, NULL, 'Takon', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, NULL, NULL, NULL, 1, 3, NULL, NULL, 8, '2016-03-28 11:40:29', '2016-03-20 13:49:07', NULL, 'Personne morale', NULL, NULL, 1, 0, '3431019', 0, NULL, NULL, 'Aidez nous s''il vous plait', NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ResultatTraitementRequete`
--

CREATE TABLE IF NOT EXISTS `ResultatTraitementRequete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `traitementrequete_id` int(11) DEFAULT NULL,
  `fileretraitement_id` int(11) DEFAULT NULL,
  `dateResultat` datetime NOT NULL,
  `commentaireResultat` longtext COLLATE utf8_unicode_ci NOT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FFA7E14AE2066F7E` (`fileretraitement_id`),
  KEY `IDX_FFA7E14ABEB611DE` (`traitementrequete_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `ResultatTraitementRequete`
--

INSERT INTO `ResultatTraitementRequete` (`id`, `traitementrequete_id`, `fileretraitement_id`, `dateResultat`, `commentaireResultat`, `loginpersist`, `datepersist`, `logindelete`, `datedelete`, `estdelete`) VALUES
(1, 4, NULL, '2016-03-24 14:43:50', 'rzgregregeger', 'admin', '2016-03-24 14:43:50', 'admin', '2016-03-25 10:48:22', 1),
(2, 4, NULL, '2016-03-24 14:46:43', 'autre', 'admin', '2016-03-24 14:46:43', 'admin', '2016-03-24 20:34:42', 1),
(3, 5, NULL, '2016-03-24 15:44:23', 'encore', 'admin', '2016-03-24 15:44:23', 'admin', '2016-03-24 16:01:58', 1);

-- --------------------------------------------------------

--
-- Structure de la table `SocieteEntreprise`
--

CREATE TABLE IF NOT EXISTS `SocieteEntreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usagerclient_id` int(11) NOT NULL,
  `domaineactivite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `raisonsociale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numifu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numrccm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A2DC9B84D7746552` (`usagerclient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `SocieteEntreprise`
--

INSERT INTO `SocieteEntreprise` (`id`, `usagerclient_id`, `domaineactivite`, `nom`, `raisonsociale`, `numifu`, `numrccm`) VALUES
(1, 4, 'Textile', 'ECOWAS', 'Industrie Nationale de Textile', '145247845', '148574565');

-- --------------------------------------------------------

--
-- Structure de la table `StructureSoustutelle`
--

CREATE TABLE IF NOT EXISTS `StructureSoustutelle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adressecontact_id` int(11) DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `raisonsociale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numifu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numrccm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8F1A7BAC73A1281` (`adressecontact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `StructureSoustutelle`
--

INSERT INTO `StructureSoustutelle` (`id`, `adressecontact_id`, `loginpersist`, `datepersist`, `logindelete`, `datedelete`, `estdelete`, `nom`, `raisonsociale`, `numifu`, `numrccm`) VALUES
(1, 1, 'admin', '2016-03-11 10:13:33', NULL, NULL, 0, 'Agence de Contrôle des Installations Electriques Intérieures (CONTRELEC)', 'CONTRELEC', NULL, NULL),
(2, 2, 'admin', '2016-03-11 10:12:42', NULL, NULL, 0, 'Société Béninoise d''Energie Electrique (SBEE)', 'SBEE', NULL, NULL),
(3, 3, 'admin', '2016-03-11 10:13:47', NULL, NULL, 0, 'Agence Béninoise d''Electrification Rurale (ABERME)', 'ABERME', NULL, NULL),
(4, 4, 'admin', '2016-03-11 10:13:08', NULL, NULL, 0, 'Direction Générale de l''Energie (DGE)', 'DGE', NULL, NULL),
(5, 5, 'admin', '2016-03-11 10:14:26', NULL, NULL, 0, 'Direction Générale des Hydrocarbures et Autres Combustibles Focilles (DGHCF)', 'DGHCF', NULL, NULL),
(6, 6, 'admin', '2016-03-11 10:12:52', NULL, NULL, 0, 'Société Nationale des Eaux du Bénin (SONEB)', 'SONEB', NULL, NULL),
(7, 7, 'admin', '2016-03-11 10:13:00', NULL, NULL, 0, 'Groupement Internationale de Gaz (GIZ)', 'GIZ', NULL, NULL),
(8, 8, 'admin', '2016-03-11 10:13:18', NULL, NULL, 0, 'Communauté Electrique du Bénin (CEB)', 'CEB', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `TraitementRequete`
--

CREATE TABLE IF NOT EXISTS `TraitementRequete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reponsetraitementrequete_id` int(11) DEFAULT NULL,
  `requete_id` int(11) DEFAULT NULL,
  `directeurtechnique_id` int(11) DEFAULT NULL,
  `dateLancement` datetime NOT NULL,
  `estResolu` tinyint(1) DEFAULT NULL,
  `dateResolue` datetime DEFAULT NULL,
  `commentaireLancement` longtext COLLATE utf8_unicode_ci NOT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E74651F6EBA3FE3` (`reponsetraitementrequete_id`),
  KEY `IDX_E74651F618FB544F` (`requete_id`),
  KEY `IDX_E74651F6628DAB52` (`directeurtechnique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `TraitementRequete`
--

INSERT INTO `TraitementRequete` (`id`, `reponsetraitementrequete_id`, `requete_id`, `directeurtechnique_id`, `dateLancement`, `estResolu`, `dateResolue`, `commentaireLancement`, `loginpersist`, `datepersist`, `logindelete`, `datedelete`, `estdelete`) VALUES
(1, NULL, 1, 1, '2016-03-19 21:24:30', 0, NULL, 'aidez nous s''il vous plait', 'admin', '2016-03-19 21:24:30', NULL, NULL, 0),
(2, 1, 1, 1, '2016-03-20 10:34:43', 0, NULL, 'aidez nous s''il vous plait', 'admin', '2016-03-20 10:34:43', NULL, NULL, 0),
(3, NULL, 1, 2, '2016-03-20 11:02:37', 0, NULL, 'Aide rapide', 'admin', '2016-03-20 11:02:37', 'admin', '2016-03-22 15:29:01', 1),
(4, NULL, 3, 3, '2016-03-20 13:50:07', 0, NULL, 'Aide encore............', 'admin', '2016-03-20 13:50:07', NULL, NULL, 0),
(5, 2, 3, 2, '2016-03-20 15:11:05', 0, NULL, 'dsgggsdgs', 'admin', '2016-03-20 15:11:05', NULL, NULL, 0),
(6, NULL, 1, 2, '2016-03-24 22:00:03', 0, NULL, 'rgregegerge', 'admin', '2016-03-24 22:00:03', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `TypeRequete`
--

CREATE TABLE IF NOT EXISTS `TypeRequete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `TypeRequete`
--

INSERT INTO `TypeRequete` (`id`, `libelle`, `loginpersist`, `datepersist`, `logindelete`, `datedelete`, `estdelete`) VALUES
(1, 'Plainte', 'admin', '2016-03-11 10:03:04', NULL, NULL, 0),
(2, 'Suggestion', 'admin', '2016-03-11 10:03:11', NULL, NULL, 0),
(3, 'Réclammation', 'admin', '2016-03-11 10:03:19', NULL, NULL, 0),
(4, 'Projet', 'admin', '2016-03-11 10:03:26', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `UsagerClient`
--

CREATE TABLE IF NOT EXISTS `UsagerClient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adressecontact_id` int(11) DEFAULT NULL,
  `datePriseContact` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2C3C93BF73A1281` (`adressecontact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `UsagerClient`
--

INSERT INTO `UsagerClient` (`id`, `adressecontact_id`, `datePriseContact`) VALUES
(2, 26, '2016-03-16 12:47:49'),
(3, 27, '2016-03-16 12:49:14'),
(4, 28, '2016-03-19 10:43:03');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adressecontact_id` int(11) DEFAULT NULL,
  `profil_id` int(11) NOT NULL,
  `fileidentite_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `user_isconnect` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `directeurtechnique_id` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2DA1797792FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_2DA17977A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_2DA1797773A1281` (`adressecontact_id`),
  UNIQUE KEY `UNIQ_2DA179773F521741` (`fileidentite_id`),
  UNIQUE KEY `UNIQ_2DA17977628DAB52` (`directeurtechnique_id`),
  UNIQUE KEY `UNIQ_2DA179773414710B` (`agent_id`),
  KEY `IDX_2DA17977275ED078` (`profil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`id`, `adressecontact_id`, `profil_id`, `fileidentite_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `user_isconnect`, `type`, `directeurtechnique_id`, `agent_id`) VALUES
(1, NULL, 9, NULL, 'admin', 'admin', 'faviem2012@gmail.com', 'faviem2012@gmail.com', 1, 'olfq8lhdeog88gg48g48004okggs0cs', 'E7TWKYLbmGM4NbbMUooXRHJU3NCRtsJVW9QJTv3bgs1EV6Anzjo7+3xJsuCDsrEcsDN9rkajsldt6Il+4go7OQ==', '2016-03-29 08:17:54', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '0', 'DIP', NULL, 1),
(2, 29, 4, NULL, 'andre', 'andre', 'andre@gmail.com', 'andre@gmail.com', 1, '67vgl54fvlogowokck08w4wgkc8ss8k', 'G+ED+EjK3TDXnBT7kcwP0/b3cW5cXjhS0f4XqC+qIxaYXFqfkalL2Y8T3I3uAITZWQrKKknP0IbFvDNyMzxeHQ==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, NULL, 'DRTS', NULL, NULL),
(6, 33, 4, NULL, 'denise', 'denise', 'denise@yahho.fr', 'denise@yahho.fr', 1, 'n15xkzxs46s8cksokw8cksk8o04wc0s', 'tFGIMp0Azybl0jcQiCYDl28m5VETsPVDD5duNKgRhGF5N6Xne4TChnBQnKqJP7MPBEkjB5C0F1f2/27zULrnlw==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, NULL, 'DRTS', NULL, NULL),
(7, 34, 4, NULL, 'Guy', 'guy', 'guy@gmail.com', 'guy@gmail.com', 1, 'odbl3ppqmv4w8kkok48wscs4sowco8s', 'CrjJkMW/CHLYAoMVbEBMBMAHDghwlQhWq3zjttvssVE5Z3HS7WoBKwzsGNWD70s2DnukHQ6m8zUnNum6zLBIUw==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, NULL, 'DRTS', NULL, NULL),
(8, 35, 4, NULL, 'joyce', 'joyce', 'joyce@gmail.com', 'joyce@gmail.com', 1, 'qcp3zuz53zkskc0s0sksk4c0goc44o0', 'iOtGPBLQdAm/+O51D9HzJwEmqF/mn/y5l/fA/sQN3hcFCqR97KffUjMEFxFEAd/L0NQypF1oyY7d/8PEbSONtA==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, NULL, 'DRTS', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Ville`
--

CREATE TABLE IF NOT EXISTS `Ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomville` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loginpersist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `logindelete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `Ville`
--

INSERT INTO `Ville` (`id`, `nomville`, `loginpersist`, `datepersist`, `logindelete`, `datedelete`, `estdelete`) VALUES
(1, 'COTONOU', 'admin', '2016-03-10 18:42:07', NULL, NULL, 0),
(2, 'PORTO-NOVO', 'admin', '2016-03-10 18:44:52', NULL, NULL, 0),
(3, 'PARAKOU', 'admin', '2016-03-10 18:44:59', NULL, NULL, 0),
(4, 'OUIDAH', 'admin', '2016-03-10 18:45:07', NULL, NULL, 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `AdresseContact`
--
ALTER TABLE `AdresseContact`
  ADD CONSTRAINT `FK_785D9517A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `Ville` (`id`),
  ADD CONSTRAINT `FK_785D9517CCF9E01E` FOREIGN KEY (`departement_id`) REFERENCES `Departement` (`id`);

--
-- Contraintes pour la table `Agent`
--
ALTER TABLE `Agent`
  ADD CONSTRAINT `FK_E74AB399A76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `ClotureRequete`
--
ALTER TABLE `ClotureRequete`
  ADD CONSTRAINT `FK_769ECE5818FB544F` FOREIGN KEY (`requete_id`) REFERENCES `Requete` (`id`),
  ADD CONSTRAINT `FK_769ECE587A4147F0` FOREIGN KEY (`mention_id`) REFERENCES `Mention` (`id`);

--
-- Contraintes pour la table `DirecteurTechnique`
--
ALTER TABLE `DirecteurTechnique`
  ADD CONSTRAINT `FK_1918D44A480B4CBC` FOREIGN KEY (`structuresoustutelle_id`) REFERENCES `StructureSoustutelle` (`id`),
  ADD CONSTRAINT `FK_1918D44AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `Emetteur`
--
ALTER TABLE `Emetteur`
  ADD CONSTRAINT `FK_FC574580537A1329` FOREIGN KEY (`message_id`) REFERENCES `Message` (`id`),
  ADD CONSTRAINT `FK_FC574580A76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `FileRequete`
--
ALTER TABLE `FileRequete`
  ADD CONSTRAINT `FK_16634EDD18FB544F` FOREIGN KEY (`requete_id`) REFERENCES `Requete` (`id`);

--
-- Contraintes pour la table `FileTraitement`
--
ALTER TABLE `FileTraitement`
  ADD CONSTRAINT `FK_6B9F0844DB684A24` FOREIGN KEY (`filerequete_id`) REFERENCES `FileRequete` (`id`);

--
-- Contraintes pour la table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `FK_790009E379E92E8C` FOREIGN KEY (`emetteur_id`) REFERENCES `Emetteur` (`id`);

--
-- Contraintes pour la table `Particulier`
--
ALTER TABLE `Particulier`
  ADD CONSTRAINT `FK_EA585B24D7746552` FOREIGN KEY (`usagerclient_id`) REFERENCES `UsagerClient` (`id`);

--
-- Contraintes pour la table `Recepteur`
--
ALTER TABLE `Recepteur`
  ADD CONSTRAINT `FK_7F11587C537A1329` FOREIGN KEY (`message_id`) REFERENCES `Message` (`id`),
  ADD CONSTRAINT `FK_7F11587CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `ReponseTraitementRequete`
--
ALTER TABLE `ReponseTraitementRequete`
  ADD CONSTRAINT `FK_BBAB54137A4147F0` FOREIGN KEY (`mention_id`) REFERENCES `Mention` (`id`),
  ADD CONSTRAINT `FK_BBAB5413BEB611DE` FOREIGN KEY (`traitementrequete_id`) REFERENCES `TraitementRequete` (`id`);

--
-- Contraintes pour la table `Requete`
--
ALTER TABLE `Requete`
  ADD CONSTRAINT `FK_D1DB0036118BB224` FOREIGN KEY (`modesaisine_id`) REFERENCES `ModeSaisine` (`id`),
  ADD CONSTRAINT `FK_D1DB003627DECFE7` FOREIGN KEY (`cloturerequete_id`) REFERENCES `ClotureRequete` (`id`),
  ADD CONSTRAINT `FK_D1DB00362C9BA629` FOREIGN KEY (`alerte_id`) REFERENCES `Alerte` (`id`),
  ADD CONSTRAINT `FK_D1DB0036342FA01E` FOREIGN KEY (`societeentreprise_id`) REFERENCES `SocieteEntreprise` (`id`),
  ADD CONSTRAINT `FK_D1DB0036480B4CBC` FOREIGN KEY (`structuresoustutelle_id`) REFERENCES `StructureSoustutelle` (`id`),
  ADD CONSTRAINT `FK_D1DB0036A89E0E67` FOREIGN KEY (`particulier_id`) REFERENCES `Particulier` (`id`),
  ADD CONSTRAINT `FK_D1DB0036DB684A24` FOREIGN KEY (`filerequete_id`) REFERENCES `FileRequete` (`id`),
  ADD CONSTRAINT `FK_D1DB0036E1A1B442` FOREIGN KEY (`typerequete_id`) REFERENCES `TypeRequete` (`id`);

--
-- Contraintes pour la table `ResultatTraitementRequete`
--
ALTER TABLE `ResultatTraitementRequete`
  ADD CONSTRAINT `FK_FFA7E14ABEB611DE` FOREIGN KEY (`traitementrequete_id`) REFERENCES `TraitementRequete` (`id`),
  ADD CONSTRAINT `FK_FFA7E14AE2066F7E` FOREIGN KEY (`fileretraitement_id`) REFERENCES `FileTraitement` (`id`);

--
-- Contraintes pour la table `SocieteEntreprise`
--
ALTER TABLE `SocieteEntreprise`
  ADD CONSTRAINT `FK_A2DC9B84D7746552` FOREIGN KEY (`usagerclient_id`) REFERENCES `UsagerClient` (`id`);

--
-- Contraintes pour la table `StructureSoustutelle`
--
ALTER TABLE `StructureSoustutelle`
  ADD CONSTRAINT `FK_8F1A7BAC73A1281` FOREIGN KEY (`adressecontact_id`) REFERENCES `AdresseContact` (`id`);

--
-- Contraintes pour la table `TraitementRequete`
--
ALTER TABLE `TraitementRequete`
  ADD CONSTRAINT `FK_E74651F618FB544F` FOREIGN KEY (`requete_id`) REFERENCES `Requete` (`id`),
  ADD CONSTRAINT `FK_E74651F6628DAB52` FOREIGN KEY (`directeurtechnique_id`) REFERENCES `DirecteurTechnique` (`id`),
  ADD CONSTRAINT `FK_E74651F6EBA3FE3` FOREIGN KEY (`reponsetraitementrequete_id`) REFERENCES `ReponseTraitementRequete` (`id`);

--
-- Contraintes pour la table `UsagerClient`
--
ALTER TABLE `UsagerClient`
  ADD CONSTRAINT `FK_2C3C93BF73A1281` FOREIGN KEY (`adressecontact_id`) REFERENCES `AdresseContact` (`id`);

--
-- Contraintes pour la table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `FK_2DA17977275ED078` FOREIGN KEY (`profil_id`) REFERENCES `Profil` (`id`),
  ADD CONSTRAINT `FK_2DA179773414710B` FOREIGN KEY (`agent_id`) REFERENCES `Agent` (`id`),
  ADD CONSTRAINT `FK_2DA179773F521741` FOREIGN KEY (`fileidentite_id`) REFERENCES `FileIdentite` (`id`),
  ADD CONSTRAINT `FK_2DA17977628DAB52` FOREIGN KEY (`directeurtechnique_id`) REFERENCES `DirecteurTechnique` (`id`),
  ADD CONSTRAINT `FK_2DA1797773A1281` FOREIGN KEY (`adressecontact_id`) REFERENCES `AdresseContact` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
