-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 09 Mai 2016 à 12:36
-- Version du serveur :  5.5.49-0ubuntu0.14.04.1
-- Version de PHP :  7.0.6-1+donate.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_SysGRU`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Emetteur`
--

CREATE TABLE IF NOT EXISTS `Emetteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FC574580537A1329` (`message_id`),
  KEY `IDX_FC574580A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Message`
--

CREATE TABLE IF NOT EXISTS `Message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filerequete_id` int(11) DEFAULT NULL,
  `emetteur_id` int(11) DEFAULT NULL,
  `dateEnvoi` datetime NOT NULL,
  `objet` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `messageEnvoi` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_790009E3DB684A24` (`filerequete_id`),
  UNIQUE KEY `UNIQ_790009E379E92E8C` (`emetteur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ModeSaisine`
--

CREATE TABLE IF NOT EXISTS `ModeSaisine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `ModeSaisine`
--

INSERT INTO `ModeSaisine` (`id`, `libelle`) VALUES
(36, 'Appel téléphonique'),
(37, 'Courier'),
(38, 'Accueil du siège'),
(39, 'Plate-forme *SysGERUC@MEEM*'),
(40, 'Autres');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Profil`
--

INSERT INTO `Profil` (`id`, `code`, `libelle`, `loginpersist`, `datepersist`) VALUES
(64, 'ROLE_DDIP', 'Directeur de la DIP', NULL, NULL),
(65, 'ROLE_CSRU', 'Chef Service SRU', NULL, NULL),
(66, 'ROLE_CSRU', 'Chef Service SRU', NULL, NULL),
(67, 'ROLE_RT', 'Responsable Technique', NULL, NULL),
(68, 'ROLE_CSI', 'Chef Service SI', NULL, NULL),
(69, 'ROLE_ADRST', 'Agent de la DRST', NULL, NULL),
(70, 'ROLE_ADARPSL', 'Agent de la DARPSL', NULL, NULL),
(71, 'ROLE_SRU', 'Collaborateur SRU', NULL, NULL),
(72, 'ROLE_ADMIN', 'Administrateur', NULL, NULL),
(73, 'ROLE_DDIP', 'Directeur de l\'Informatique et du Pré-archivage', NULL, NULL),
(74, 'ROLE_CSRU', 'Chef Service des Relations avec les Usagers/clients', NULL, NULL),
(75, 'ROLE_CSI', 'Chef Service Informatique', NULL, NULL),
(76, 'ROLE_RT', 'Directeur ou Responsable Technique', NULL, NULL),
(77, 'ROLE_SRU', 'Collaborateur CSRU', NULL, NULL),
(78, 'ROLE_ADRST', 'Responsable Division ADRST', NULL, NULL),
(79, 'ROLE_ADARPSL', 'Responsable Division ADARPSL', NULL, NULL),
(80, 'ROLE_USER', 'Membre', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Recepteur`
--

CREATE TABLE IF NOT EXISTS `Recepteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  `datepersist` datetime DEFAULT NULL,
  `datedelete` datetime DEFAULT NULL,
  `estdelete` tinyint(1) DEFAULT NULL,
  `dateLu` datetime DEFAULT NULL,
  `estLu` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7F11587CA76ED395` (`user_id`),
  KEY `IDX_7F11587C537A1329` (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `estentraitement` tinyint(1) DEFAULT NULL,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D1DB0036DB684A24` (`filerequete_id`),
  UNIQUE KEY `UNIQ_D1DB0036A89E0E67` (`particulier_id`),
  UNIQUE KEY `UNIQ_D1DB003627DECFE7` (`cloturerequete_id`),
  UNIQUE KEY `UNIQ_D1DB0036342FA01E` (`societeentreprise_id`),
  KEY `IDX_D1DB0036E1A1B442` (`typerequete_id`),
  KEY `IDX_D1DB00362C9BA629` (`alerte_id`),
  KEY `IDX_D1DB0036118BB224` (`modesaisine_id`),
  KEY `IDX_D1DB0036480B4CBC` (`structuresoustutelle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adressecontact_id` int(11) DEFAULT NULL,
  `directeurtechnique_id` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
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
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_isconnect` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2DA1797792FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_2DA17977A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_2DA1797773A1281` (`adressecontact_id`),
  UNIQUE KEY `UNIQ_2DA17977628DAB52` (`directeurtechnique_id`),
  UNIQUE KEY `UNIQ_2DA179773414710B` (`agent_id`),
  UNIQUE KEY `UNIQ_2DA179773F521741` (`fileidentite_id`),
  KEY `IDX_2DA17977275ED078` (`profil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`id`, `adressecontact_id`, `directeurtechnique_id`, `agent_id`, `profil_id`, `fileidentite_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `type`, `user_isconnect`) VALUES
(1, NULL, NULL, 1, 72, NULL, 'admin', 'admin', 'faviem2012@gmail.com', 'faviem2012@gmail.com', 1, 'e6dm2zfvkrkks8kc0wc4804c88sc0sw', 'kdtoBNspeTnLJwKVpmcBC32tUnX7YcPyuFONhPucZG93kQwDEHE0auKWUe7NMIk2C+73ywIckfiMDcC0nsu22Q==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'DIP', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `AdresseContact`
--
ALTER TABLE `AdresseContact`
  ADD CONSTRAINT `FK_785D9517CCF9E01E` FOREIGN KEY (`departement_id`) REFERENCES `Departement` (`id`),
  ADD CONSTRAINT `FK_785D9517A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `Ville` (`id`);

--
-- Contraintes pour la table `Agent`
--
ALTER TABLE `Agent`
  ADD CONSTRAINT `FK_E74AB399A76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `ClotureRequete`
--
ALTER TABLE `ClotureRequete`
  ADD CONSTRAINT `FK_769ECE587A4147F0` FOREIGN KEY (`mention_id`) REFERENCES `Mention` (`id`),
  ADD CONSTRAINT `FK_769ECE5818FB544F` FOREIGN KEY (`requete_id`) REFERENCES `Requete` (`id`);

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
  ADD CONSTRAINT `FK_790009E379E92E8C` FOREIGN KEY (`emetteur_id`) REFERENCES `Emetteur` (`id`),
  ADD CONSTRAINT `FK_790009E3DB684A24` FOREIGN KEY (`filerequete_id`) REFERENCES `FileRequete` (`id`);

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
  ADD CONSTRAINT `FK_BBAB5413BEB611DE` FOREIGN KEY (`traitementrequete_id`) REFERENCES `TraitementRequete` (`id`),
  ADD CONSTRAINT `FK_BBAB54137A4147F0` FOREIGN KEY (`mention_id`) REFERENCES `Mention` (`id`);

--
-- Contraintes pour la table `Requete`
--
ALTER TABLE `Requete`
  ADD CONSTRAINT `FK_D1DB0036480B4CBC` FOREIGN KEY (`structuresoustutelle_id`) REFERENCES `StructureSoustutelle` (`id`),
  ADD CONSTRAINT `FK_D1DB0036118BB224` FOREIGN KEY (`modesaisine_id`) REFERENCES `ModeSaisine` (`id`),
  ADD CONSTRAINT `FK_D1DB003627DECFE7` FOREIGN KEY (`cloturerequete_id`) REFERENCES `ClotureRequete` (`id`),
  ADD CONSTRAINT `FK_D1DB00362C9BA629` FOREIGN KEY (`alerte_id`) REFERENCES `Alerte` (`id`),
  ADD CONSTRAINT `FK_D1DB0036342FA01E` FOREIGN KEY (`societeentreprise_id`) REFERENCES `SocieteEntreprise` (`id`),
  ADD CONSTRAINT `FK_D1DB0036A89E0E67` FOREIGN KEY (`particulier_id`) REFERENCES `Particulier` (`id`),
  ADD CONSTRAINT `FK_D1DB0036DB684A24` FOREIGN KEY (`filerequete_id`) REFERENCES `FileRequete` (`id`),
  ADD CONSTRAINT `FK_D1DB0036E1A1B442` FOREIGN KEY (`typerequete_id`) REFERENCES `TypeRequete` (`id`);

--
-- Contraintes pour la table `ResultatTraitementRequete`
--
ALTER TABLE `ResultatTraitementRequete`
  ADD CONSTRAINT `FK_FFA7E14AE2066F7E` FOREIGN KEY (`fileretraitement_id`) REFERENCES `FileTraitement` (`id`),
  ADD CONSTRAINT `FK_FFA7E14ABEB611DE` FOREIGN KEY (`traitementrequete_id`) REFERENCES `TraitementRequete` (`id`);

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
  ADD CONSTRAINT `FK_E74651F6628DAB52` FOREIGN KEY (`directeurtechnique_id`) REFERENCES `DirecteurTechnique` (`id`),
  ADD CONSTRAINT `FK_E74651F618FB544F` FOREIGN KEY (`requete_id`) REFERENCES `Requete` (`id`),
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
  ADD CONSTRAINT `FK_2DA179773F521741` FOREIGN KEY (`fileidentite_id`) REFERENCES `FileIdentite` (`id`),
  ADD CONSTRAINT `FK_2DA17977275ED078` FOREIGN KEY (`profil_id`) REFERENCES `Profil` (`id`),
  ADD CONSTRAINT `FK_2DA179773414710B` FOREIGN KEY (`agent_id`) REFERENCES `Agent` (`id`),
  ADD CONSTRAINT `FK_2DA17977628DAB52` FOREIGN KEY (`directeurtechnique_id`) REFERENCES `DirecteurTechnique` (`id`),
  ADD CONSTRAINT `FK_2DA1797773A1281` FOREIGN KEY (`adressecontact_id`) REFERENCES `AdresseContact` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
