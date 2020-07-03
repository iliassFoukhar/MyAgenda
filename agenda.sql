-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 18 Décembre 2019 à 00:36
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `agenda`
--

-- --------------------------------------------------------

--
-- Structure de la table `amitie`
--

CREATE TABLE IF NOT EXISTS `amitie` (
  `idAgenda1` int(70) NOT NULL,
  `idAgenda2` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `amitie`
--

INSERT INTO `amitie` (`idAgenda1`, `idAgenda2`) VALUES
(0, 1),
(0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE IF NOT EXISTS `demande` (
  `requested` int(70) NOT NULL,
  `requester` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `demande`
--

INSERT INTO `demande` (`requested`, `requester`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `idMessage` int(70) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `agendaId` int(70) NOT NULL,
  `Author` varchar(70) NOT NULL,
  PRIMARY KEY (`idMessage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`idMessage`, `message`, `date`, `agendaId`, `Author`) VALUES
(0, 'Tu es mon meilleur ami', '2019-12-02', 0, 'Brook'),
(1, 'J''aime la programmation', '2019-12-08', 0, 'Luffy'),
(2, 'Moi j''aime l''infographie', '2019-12-08', 0, 'Brook'),
(3, 'Est-ce que tu sais que si tu n''est pas l''ami de quelqu''un sur MyAgenda tu ne pourras pas voir ses messages ?', '2019-12-12', 1, 'Luffy'),
(4, 'On peut envoyer des invitations aux autres utilisateurs en cliquant sur Ajouter.', '2019-12-17', 2, 'Brook');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nomUtilisateur` varchar(50) NOT NULL,
  `motDePasse` varchar(50) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `agenda` int(11) NOT NULL,
  PRIMARY KEY (`nomUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nomUtilisateur`, `motDePasse`, `nom`, `prenom`, `pseudo`, `agenda`) VALUES
('Adam', '12121212', 'Mehdioui', 'Adam', 'Brook', 2),
('Ahmad', 'azerty', 'Ahmad', 'Ahmad', 'Luffy', 0),
('Hamid', 'HelloWorld', 'Halim', 'Hamid', 'Dreamer', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
