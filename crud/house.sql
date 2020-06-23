-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23-Jun-2020 às 04:15
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `house`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `casa`
--

DROP TABLE IF EXISTS `casa`;
CREATE TABLE IF NOT EXISTS `casa` (
  `house_id` int(11) NOT NULL AUTO_INCREMENT,
  `houseDescription` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`house_id`),
  KEY `fk_USER_ID` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `casa`
--

INSERT INTO `casa` (`house_id`, `houseDescription`, `user_id`) VALUES
(1, 'apartamento', 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `componente`
--

DROP TABLE IF EXISTS `componente`;
CREATE TABLE IF NOT EXISTS `componente` (
  `comp_id` int(11) NOT NULL AUTO_INCREMENT,
  `compDescription` varchar(255) DEFAULT NULL,
  `compName` varchar(255) NOT NULL,
  `house_id` int(11) NOT NULL,
  PRIMARY KEY (`comp_id`),
  KEY `fk_CASA_ID` (`house_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `componente`
--

INSERT INTO `componente` (`comp_id`, `compDescription`, `compName`, `house_id`) VALUES
(1, 'placa controladora', 'arduino', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) CHARACTER SET latin1 NOT NULL,
  `userEmail` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `userPhone` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `userType` char(1) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `userDeficiency` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `userAge` varchar(3) COLLATE latin1_general_ci DEFAULT NULL,
  `userAddress` varchar(500) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`user_id`, `userName`, `userEmail`, `userPhone`, `userType`, `userDeficiency`, `userAge`, `userAddress`) VALUES
(17, 'Fillipe', 'rpererah@gmail.com', '11975720443', '1', 'nenhuma', '43', 'Rua Dona Tecla 746'),
(16, 'lokao', 'rpererah@gmail.com', '+5519981858526', '0', 'nenhuma', '43', 'Rua Valdir Afonso 69');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
