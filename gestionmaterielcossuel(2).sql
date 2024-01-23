-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 23 jan. 2024 à 16:42
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
-- Base de données : `gestionmaterielcossuel`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation_agent`
--

CREATE TABLE `affectation_agent` (
  `id_aff` int(11) NOT NULL,
  `Date_Aff` datetime NOT NULL DEFAULT current_timestamp(),
  `Motif_Aff` text NOT NULL,
  `id_Agent` int(11) NOT NULL,
  `id_Agence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `id_Agence` int(11) NOT NULL,
  `Nom_Agence` varchar(30) NOT NULL,
  `Telephone_Agence` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE `agent` (
  `id_Agent` int(11) NOT NULL,
  `Prenom_Agent` varchar(50) NOT NULL,
  `Nom_Agent` varchar(30) NOT NULL,
  `Matricule` varchar(10) NOT NULL,
  `telephone` varchar(18) NOT NULL,
  `Email_Agent` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`id_Agent`, `Prenom_Agent`, `Nom_Agent`, `Matricule`, `telephone`, `Email_Agent`) VALUES
(1, 'Modou', 'MAR', 'M210', '786322664', 'makhfuzmar@gmail.com'),
(2, 'ibou', 'DIOP', 'M200', '778956622', 'ibrahima.diop@cossuel.sn');

-- --------------------------------------------------------

--
-- Structure de la table `attribution`
--

CREATE TABLE `attribution` (
  `id_Att` int(11) NOT NULL,
  `Nature_Att` varchar(20) NOT NULL,
  `Date_Att` datetime NOT NULL DEFAULT current_timestamp(),
  `id_mat` int(11) NOT NULL,
  `id_Agent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_Cat` int(11) NOT NULL,
  `Libelle_Cat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compte_utilisateur`
--

CREATE TABLE `compte_utilisateur` (
  `id_Compt` int(11) NOT NULL,
  `Login` varchar(30) NOT NULL,
  `Password` varchar(266) NOT NULL,
  `Statut` varchar(30) NOT NULL,
  `id_Agent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `compte_utilisateur`
--

INSERT INTO `compte_utilisateur` (`id_Compt`, `Login`, `Password`, `Statut`, `id_Agent`) VALUES
(1, 'modou', '1234', 'admin', 1),
(2, 'ibou', '1234', 'superadmin', 2);

-- --------------------------------------------------------

--
-- Structure de la table `contre_decharge`
--

CREATE TABLE `contre_decharge` (
  `id_ContreDecharge` int(11) NOT NULL,
  `NumeroConDecharge` varchar(20) NOT NULL,
  `Date_ConDecharge` datetime NOT NULL DEFAULT current_timestamp(),
  `id_Reparation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `decharge`
--

CREATE TABLE `decharge` (
  `id_Decharge` int(11) NOT NULL,
  `Numero_Dechage` int(11) NOT NULL,
  `Date_Decharge` datetime NOT NULL DEFAULT current_timestamp(),
  `id_Att` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `id_mat` int(11) NOT NULL,
  `Nom_Mat` varchar(20) NOT NULL,
  `Marque_Mat` varchar(20) NOT NULL,
  `Model_Mat` varchar(20) NOT NULL,
  `Date_Achat` date NOT NULL,
  `Numero_Serie` varchar(50) NOT NULL,
  `Fournisseur` varchar(50) NOT NULL,
  `Duree_Garantie` int(11) NOT NULL,
  `Prix_Mat` decimal(10,0) NOT NULL,
  `Etat_Mat` varchar(20) NOT NULL,
  `Autre_Commentaire` text NOT NULL,
  `id_Cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id_piece` int(11) NOT NULL,
  `Libelle_Piece` varchar(20) NOT NULL,
  `Prix_Unitaire` decimal(10,0) NOT NULL,
  `Nombre_Piece` int(11) NOT NULL,
  `id_Reparation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pieces_jointes`
--

CREATE TABLE `pieces_jointes` (
  `id_Pieces_Jointes` int(11) NOT NULL,
  `Libelle_Pieces_Jointes` varchar(30) NOT NULL,
  `Image_Pieces_Jointes` varchar(40) NOT NULL,
  `id_ContreDecharge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reparation`
--

CREATE TABLE `reparation` (
  `id_Reparation` int(11) NOT NULL,
  `Date_Entree` datetime NOT NULL DEFAULT current_timestamp(),
  `Date_Sortie` datetime DEFAULT current_timestamp(),
  `Diagnostique` text NOT NULL,
  `Prix_Maint` decimal(10,0) DEFAULT NULL,
  `id_mat` int(11) NOT NULL,
  `id_Agent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reprise`
--

CREATE TABLE `reprise` (
  `id_Reprise` int(11) NOT NULL,
  `Date_Reprise` datetime NOT NULL DEFAULT current_timestamp(),
  `Motif_Reprise` text NOT NULL,
  `Image_Reprise` varchar(50) NOT NULL,
  `id_Att` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectation_agent`
--
ALTER TABLE `affectation_agent`
  ADD PRIMARY KEY (`id_aff`),
  ADD KEY `id_Agence` (`id_Agence`),
  ADD KEY `id_Agent` (`id_Agent`);

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`id_Agence`);

--
-- Index pour la table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id_Agent`);

--
-- Index pour la table `attribution`
--
ALTER TABLE `attribution`
  ADD PRIMARY KEY (`id_Att`),
  ADD KEY `id_mat` (`id_mat`),
  ADD KEY `id_Agent` (`id_Agent`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_Cat`);

--
-- Index pour la table `compte_utilisateur`
--
ALTER TABLE `compte_utilisateur`
  ADD PRIMARY KEY (`id_Compt`),
  ADD KEY `id_Agent` (`id_Agent`);

--
-- Index pour la table `contre_decharge`
--
ALTER TABLE `contre_decharge`
  ADD PRIMARY KEY (`id_ContreDecharge`),
  ADD KEY `id_Reparation` (`id_Reparation`);

--
-- Index pour la table `decharge`
--
ALTER TABLE `decharge`
  ADD PRIMARY KEY (`id_Decharge`),
  ADD KEY `id_Att` (`id_Att`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`id_mat`),
  ADD KEY `id_Cat` (`id_Cat`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id_piece`),
  ADD KEY `id_Reparation` (`id_Reparation`);

--
-- Index pour la table `pieces_jointes`
--
ALTER TABLE `pieces_jointes`
  ADD PRIMARY KEY (`id_Pieces_Jointes`),
  ADD KEY `id_ContreDecharge` (`id_ContreDecharge`);

--
-- Index pour la table `reparation`
--
ALTER TABLE `reparation`
  ADD PRIMARY KEY (`id_Reparation`),
  ADD KEY `id_mat` (`id_mat`),
  ADD KEY `id_Agent` (`id_Agent`);

--
-- Index pour la table `reprise`
--
ALTER TABLE `reprise`
  ADD PRIMARY KEY (`id_Reprise`),
  ADD KEY `id_Att` (`id_Att`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affectation_agent`
--
ALTER TABLE `affectation_agent`
  MODIFY `id_aff` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `id_Agence` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `agent`
--
ALTER TABLE `agent`
  MODIFY `id_Agent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `attribution`
--
ALTER TABLE `attribution`
  MODIFY `id_Att` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_Cat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compte_utilisateur`
--
ALTER TABLE `compte_utilisateur`
  MODIFY `id_Compt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `contre_decharge`
--
ALTER TABLE `contre_decharge`
  MODIFY `id_ContreDecharge` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `decharge`
--
ALTER TABLE `decharge`
  MODIFY `id_Decharge` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `id_mat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id_piece` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pieces_jointes`
--
ALTER TABLE `pieces_jointes`
  MODIFY `id_Pieces_Jointes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reparation`
--
ALTER TABLE `reparation`
  MODIFY `id_Reparation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reprise`
--
ALTER TABLE `reprise`
  MODIFY `id_Reprise` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affectation_agent`
--
ALTER TABLE `affectation_agent`
  ADD CONSTRAINT `affectation_agent_ibfk_1` FOREIGN KEY (`id_Agence`) REFERENCES `agence` (`id_Agence`),
  ADD CONSTRAINT `affectation_agent_ibfk_2` FOREIGN KEY (`id_Agent`) REFERENCES `agent` (`id_Agent`);

--
-- Contraintes pour la table `attribution`
--
ALTER TABLE `attribution`
  ADD CONSTRAINT `attribution_ibfk_1` FOREIGN KEY (`id_mat`) REFERENCES `materiel` (`id_mat`),
  ADD CONSTRAINT `attribution_ibfk_2` FOREIGN KEY (`id_Agent`) REFERENCES `agent` (`id_Agent`);

--
-- Contraintes pour la table `compte_utilisateur`
--
ALTER TABLE `compte_utilisateur`
  ADD CONSTRAINT `compte_utilisateur_ibfk_1` FOREIGN KEY (`id_Agent`) REFERENCES `agent` (`id_Agent`);

--
-- Contraintes pour la table `contre_decharge`
--
ALTER TABLE `contre_decharge`
  ADD CONSTRAINT `contre_decharge_ibfk_1` FOREIGN KEY (`id_Reparation`) REFERENCES `reparation` (`id_Reparation`);

--
-- Contraintes pour la table `decharge`
--
ALTER TABLE `decharge`
  ADD CONSTRAINT `decharge_ibfk_1` FOREIGN KEY (`id_Att`) REFERENCES `attribution` (`id_Att`);

--
-- Contraintes pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `materiel_ibfk_1` FOREIGN KEY (`id_Cat`) REFERENCES `categorie` (`id_Cat`);

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`id_Reparation`) REFERENCES `reparation` (`id_Reparation`);

--
-- Contraintes pour la table `pieces_jointes`
--
ALTER TABLE `pieces_jointes`
  ADD CONSTRAINT `pieces_jointes_ibfk_1` FOREIGN KEY (`id_ContreDecharge`) REFERENCES `contre_decharge` (`id_ContreDecharge`);

--
-- Contraintes pour la table `reparation`
--
ALTER TABLE `reparation`
  ADD CONSTRAINT `reparation_ibfk_1` FOREIGN KEY (`id_mat`) REFERENCES `materiel` (`id_mat`),
  ADD CONSTRAINT `reparation_ibfk_2` FOREIGN KEY (`id_Agent`) REFERENCES `agent` (`id_Agent`);

--
-- Contraintes pour la table `reprise`
--
ALTER TABLE `reprise`
  ADD CONSTRAINT `reprise_ibfk_1` FOREIGN KEY (`id_Att`) REFERENCES `attribution` (`id_Att`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
