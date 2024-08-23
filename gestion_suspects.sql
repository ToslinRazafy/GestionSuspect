-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 06 fév. 2022 à 21:30
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_suspects`
--

-- --------------------------------------------------------

--
-- Structure de la table `categoriinfraction`
--

CREATE TABLE `categoriinfraction` (
  `NomCategorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categoriinfraction`
--

INSERT INTO `categoriinfraction` (`NomCategorie`) VALUES
('Abattage d\'arbre'),
('Abus de confiance'),
('Association de Malfaiteur'),
('Atteinte la propriété d\'autrui'),
('CBV'),
('Détournement de fonds '),
('Détournements de mineur'),
('Emission de chèque sans provision'),
('Escroqueries'),
('Extorsion de fonds'),
('Injure et outrage'),
('Kidnapping mines'),
('Menace de mort'),
('Meurtre'),
('Résistance opposée de mauvaise fois'),
('Viole'),
('VVF');

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

CREATE TABLE `concerner` (
  `ID_Dossier` varchar(50) NOT NULL,
  `ID_Suspect` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dossier_judiciaire`
--

CREATE TABLE `dossier_judiciaire` (
  `ID_Dossier` varchar(50) NOT NULL,
  `Resultat` enum('DEFERMENT_Mandat_de_depot','DEFERMENT_Liberté_provisoire','DOSSIER_A_TRANSMETTRE','RETRAIT_DE_PLAINTE_dossier_classé','RETRAIT_DE_PLAINTE_DAT') NOT NULL,
  `Verdict` enum('Condamné','Acquitté') NOT NULL,
  `date_de_cloture` date NOT NULL,
  `Date_Ajout` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enqueteur`
--

CREATE TABLE `enqueteur` (
  `ID_Enqueteur` int(11) NOT NULL,
  `ID_Service` varchar(20) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Grade` varchar(50) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enqueteur`
--

INSERT INTO `enqueteur` (`ID_Enqueteur`, `ID_Service`, `Nom`, `Grade`, `Contact`, `Mdp`, `image`) VALUES
(9779, 'SRPJ', 'Tsitohaina', 'IPPCE', '0341095534', 'fd632e86536a69ff7a81a3f556e21809', '75639_4bJOTa0U.jpg'),
(494656, 'SRPJ', 'Appolain', 'IP', '0345949133', 'fba9d88164f3e2d9109ee770223212a0', '');

-- --------------------------------------------------------

--
-- Structure de la table `implication`
--

CREATE TABLE `implication` (
  `ID_Infraction` varchar(50) NOT NULL,
  `ID_Suspect` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `implication`
--

INSERT INTO `implication` (`ID_Infraction`, `ID_Suspect`) VALUES
('050.2022', '050.SRPJ.2022'),
('105.2022', '105.SRPJ.2022'),
('139.2022', '139.SRPJ.2022'),
('164.2022', '164.SRPJ.2022'),
('357.2022', '357.1.SRPJ.2022'),
('357.2022', '357.2.SRPJ.2022'),
('357.2022', '357.3.SRPJ.2022');

-- --------------------------------------------------------

--
-- Structure de la table `infraction`
--

CREATE TABLE `infraction` (
  `ID_Infraction` varchar(50) NOT NULL,
  `Quand` date NOT NULL,
  `Lieu` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `Categorie` varchar(255) NOT NULL,
  `Date_AJout` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `infraction`
--

INSERT INTO `infraction` (`ID_Infraction`, `Quand`, `Lieu`, `Description`, `Categorie`, `Date_AJout`) VALUES
('050.2022', '2022-02-07', 'Soatsihadino', 'Daroka sy vono t@marteau ', 'CBV', '2022-02-06 20:03:14'),
('105.2022', '2022-03-26', 'Fianarantsoa', 'Daroka sy vono t@vody kiraro ', 'CBV', '2022-02-06 19:59:33'),
('139.2022', '2022-12-03', 'Sahavanona CR Andranovorivato ', 'Vono sy ratra niniana natao', 'CBV', '2022-02-06 19:40:15'),
('164.2022', '2022-02-05', 'Fianarantsoa', 'mur de soutènement', 'Atteinte la propriété d\'autrui', '2022-02-06 20:07:39'),
('357.2022', '2022-07-07', 'Anjilo', 'Fanapahana ala', 'Abattage d\'arbre', '2022-02-06 19:50:47');

-- --------------------------------------------------------

--
-- Structure de la table `plaignant`
--

CREATE TABLE `plaignant` (
  `ID_Plaignant` varchar(40) NOT NULL,
  `ID_Enqueteur` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Surnom` varchar(50) DEFAULT NULL,
  `CIN` varchar(100) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `Profession` varchar(255) NOT NULL,
  `Sexe` varchar(50) NOT NULL,
  `Date_Ajout` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `plaignant`
--

INSERT INTO `plaignant` (`ID_Plaignant`, `ID_Enqueteur`, `Nom`, `Prenom`, `Surnom`, `CIN`, `Adresse`, `Contact`, `Profession`, `Sexe`, `Date_Ajout`) VALUES
('050P.SRPJ.2022', 9779, 'RAZAFIMANDIMBY', 'Henri', 'Henri', '', 'Soahatsihadino Lot ISB 135/3205, CU et District Fianarantsoa ', '034.99.469.66', 'Gendarme en retraite', 'M', '2022-02-06 20:02:29'),
('105P.SRPJ.2022', 9779, 'TOMBOTSOA', 'Valimbavaka Joeldine', 'Valimbavaka', '', 'Isada fkt Isada CU et district de Fianarantsoa ', '034.90.806.28', 'Femme au foyer', 'F', '2022-02-06 19:58:24'),
('139P.SRPJ.2022', 9779, 'RAFANOMEZANJANAHARY', 'Jean Augustin', 'Jean Augustin', '220.311.004.493 du 17/03/1998 à Fianarantsoa', 'Ambalatanifotsy fokontany Sahavanona CR Andranovorivato district Vohibato', '034.91.479.60', 'Cultivateur', 'M', '2022-02-06 19:37:59'),
('164P.SRPJ.2022', 9779, 'RAZAFIARISOA', 'Perline', 'Perline', '201.012.002.180 du 28/02/1988 à Fianarantsoa', 'Ambalapaiso CU et District Fianarantsoa ', '034.29.321.92', 'Revendeuse', 'F', '2022-02-06 20:05:49'),
('357P.SRPJ.2022', 9779, 'RAZANAMPAHATELO', 'Paul Jean Domina', 'Rapoly Mainty', '209.441.000.790 du 30/01/1967 à Mananjary', 'Befaka Fkt Ambohimpierenana II, C/R  Ankofana Tsarafidy District Ambohimahasoa', '', 'Cultivateur', 'M', '2022-02-06 19:49:40');

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE `rapport` (
  `ID_Infraction` varchar(50) NOT NULL,
  `ID_Plaignant` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rapport`
--

INSERT INTO `rapport` (`ID_Infraction`, `ID_Plaignant`) VALUES
('050.2022', '050P.SRPJ.2022'),
('105.2022', '105P.SRPJ.2022'),
('139.2022', '139P.SRPJ.2022'),
('164.2022', '164P.SRPJ.2022'),
('357.2022', '357P.SRPJ.2022');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `ID_Service` varchar(20) NOT NULL,
  `Contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`ID_Service`, `Contact`) VALUES
('SRPJ', '0340552980'),
('SRSTUP', '0340947242');

-- --------------------------------------------------------

--
-- Structure de la table `suspect`
--

CREATE TABLE `suspect` (
  `ID_Suspect` varchar(40) NOT NULL,
  `ID_Enqueteur` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Surnom` varchar(50) DEFAULT NULL,
  `Sexe` enum('M','F') NOT NULL,
  `CIN` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Date_naiss` date NOT NULL,
  `Lieu_naiss` varchar(100) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `Profession` varchar(255) NOT NULL,
  `Description_physique` text DEFAULT NULL,
  `Antecedent_Criminelle` enum('OUI','NON') NOT NULL,
  `Date_Ajout` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `suspect`
--

INSERT INTO `suspect` (`ID_Suspect`, `ID_Enqueteur`, `Nom`, `Prenom`, `Surnom`, `Sexe`, `CIN`, `Age`, `Date_naiss`, `Lieu_naiss`, `Adresse`, `Contact`, `Profession`, `Description_physique`, `Antecedent_Criminelle`, `Date_Ajout`, `image`) VALUES
('050.SRPJ.2022', 9779, 'RANDRIANILAINA', 'Soanarindra Christian', ' Dadan\'i Tinah ', 'M', '', 31, '1991-07-10', 'Ivoamba', 'oahatsihadino  CU et District Fianarantsoa', '034.45.693.28', 'rabateur au stationnement', 'Masculin', 'OUI', '2022-02-06 20:04:48', '49281_PIA_M6mp.jpg'),
('105.SRPJ.2022', 9779, 'RAKOTONIRINA', 'Andrianaivo', 'RANAIVO', 'M', '201.401.009.323 du 04/09/1984 à Fianarantsoa', 56, '1966-09-07', 'Alakamisy Ambohimaha', 'Antanimandilana  Fkt et CR  Alakamisy Ambohimaha District Lalangina ', '034.31.775.27', 'revendeur de friperie', 'Masculin', 'NON', '2022-02-06 20:01:01', '96325_PIA_M6mp.jpg'),
('139.SRPJ.2022', 9779, 'NAMBININJANAHARY', 'Herman Jean Francisco', 'RaHery', 'M', '', 35, '1989-01-04', 'Andranovorivato', 'mbalamafana fokontany Sahavanana CR Andranovorivato district Vohibato', '', 'Cultivateur', 'Masculin', 'NON', '2022-02-06 19:48:21', '77606_PIA_M6mp.jpg'),
('164.SRPJ.2022', 9779, 'RAFIDIHARITIANA', 'Miora', 'Miora', 'F', '201.012.013549', 38, '1984-07-28', 'Fianarantsoa', 'Lot A-225/3702, Andavale fkt Ambalapaiso CU et district de Fianarantsoa ', '034.74.713.42', 'Responsable Personnel MIC', 'Feminin', 'NON', '2022-02-06 20:10:05', '22996_PIA_M6mp.jpg'),
('357.1.SRPJ.2022', 9779, 'RALAIVAO', 'Georges', 'RaGeorges ', 'M', '208.321.005.539 du 30/10/1978 à Ambohimahasoa', 52, '1960-11-27', 'Soanatao', 'Soanatao Fkt Ambohimanarivo Commune Manandroy Ambohimahasoa', '', 'Cultivateur', 'Masculin', 'NON', '2022-02-06 19:53:25', '67803_PIA_M6mp.jpg'),
('357.2.SRPJ.2022', 9779, 'RAVAOHITA', 'Séraphine', 'RaGeorges', 'M', '208.321.005.539 du 30/10/1978 à Ambohimahasoa', 52, '1960-11-27', 'Soanatao', 'Soanatao Fkt Ambohimanarivo Commune Manandroy Ambohimahasoa ', '', 'Cultivateur', 'Masculin', 'OUI', '2022-02-06 19:55:35', '10841_PIA_M6mp.jpg'),
('357.3.SRPJ.2022', 9779, 'RAMARINJANAHARY', 'Hary Jean ', 'RaHary', 'M', '108.011.000.620 du 09/03/1987 à Antsirabe', 53, '1969-07-20', 'Betafo', 'Soafiandry CR Ampitana Ambohimahasoa ', '', 'Entrepreneur', 'Masculin', 'NON', '2022-02-06 19:57:03', '34508_PIA_M6mp.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categoriinfraction`
--
ALTER TABLE `categoriinfraction`
  ADD PRIMARY KEY (`NomCategorie`);

--
-- Index pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD PRIMARY KEY (`ID_Dossier`,`ID_Suspect`),
  ADD KEY `concerner_ibfk_2` (`ID_Suspect`);

--
-- Index pour la table `dossier_judiciaire`
--
ALTER TABLE `dossier_judiciaire`
  ADD PRIMARY KEY (`ID_Dossier`);

--
-- Index pour la table `enqueteur`
--
ALTER TABLE `enqueteur`
  ADD PRIMARY KEY (`ID_Enqueteur`),
  ADD KEY `enqueteur_ibfk_1` (`ID_Service`);

--
-- Index pour la table `implication`
--
ALTER TABLE `implication`
  ADD PRIMARY KEY (`ID_Infraction`,`ID_Suspect`),
  ADD KEY `implication_ibfk_2` (`ID_Suspect`);

--
-- Index pour la table `infraction`
--
ALTER TABLE `infraction`
  ADD PRIMARY KEY (`ID_Infraction`);

--
-- Index pour la table `plaignant`
--
ALTER TABLE `plaignant`
  ADD PRIMARY KEY (`ID_Plaignant`),
  ADD KEY `plaignant_ibfk_1` (`ID_Enqueteur`);

--
-- Index pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`ID_Infraction`,`ID_Plaignant`),
  ADD KEY `rapport_ibfk_2` (`ID_Plaignant`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ID_Service`);

--
-- Index pour la table `suspect`
--
ALTER TABLE `suspect`
  ADD PRIMARY KEY (`ID_Suspect`),
  ADD KEY `suspect_ibfk_1` (`ID_Enqueteur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `enqueteur`
--
ALTER TABLE `enqueteur`
  MODIFY `ID_Enqueteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=494657;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD CONSTRAINT `concerner_ibfk_1` FOREIGN KEY (`ID_Dossier`) REFERENCES `dossier_judiciaire` (`ID_Dossier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `concerner_ibfk_2` FOREIGN KEY (`ID_Suspect`) REFERENCES `suspect` (`ID_Suspect`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `enqueteur`
--
ALTER TABLE `enqueteur`
  ADD CONSTRAINT `enqueteur_ibfk_1` FOREIGN KEY (`ID_Service`) REFERENCES `service` (`ID_Service`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `implication`
--
ALTER TABLE `implication`
  ADD CONSTRAINT `implication_ibfk_1` FOREIGN KEY (`ID_Infraction`) REFERENCES `infraction` (`ID_Infraction`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `implication_ibfk_2` FOREIGN KEY (`ID_Suspect`) REFERENCES `suspect` (`ID_Suspect`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `plaignant`
--
ALTER TABLE `plaignant`
  ADD CONSTRAINT `plaignant_ibfk_1` FOREIGN KEY (`ID_Enqueteur`) REFERENCES `enqueteur` (`ID_Enqueteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD CONSTRAINT `rapport_ibfk_1` FOREIGN KEY (`ID_Infraction`) REFERENCES `infraction` (`ID_Infraction`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rapport_ibfk_2` FOREIGN KEY (`ID_Plaignant`) REFERENCES `plaignant` (`ID_Plaignant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `suspect`
--
ALTER TABLE `suspect`
  ADD CONSTRAINT `suspect_ibfk_1` FOREIGN KEY (`ID_Enqueteur`) REFERENCES `enqueteur` (`ID_Enqueteur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
