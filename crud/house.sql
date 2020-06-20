-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Jun-2020 às 00:17
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
  `CASA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CASA_DESCRICAO` varchar(255) DEFAULT NULL,
  `LONGITUDE` varchar(45) DEFAULT NULL,
  `LATITUDE` varchar(45) DEFAULT NULL,
  `USER_ID` int(11) NOT NULL,
  PRIMARY KEY (`CASA_ID`),
  KEY `fk_USER_ID` (`USER_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `componente`
--

DROP TABLE IF EXISTS `componente`;
CREATE TABLE IF NOT EXISTS `componente` (
  `COMP_ID` int(11) NOT NULL,
  `COMP_DESCRICAO` varchar(255) DEFAULT NULL,
  `COMP_VALOR` decimal(3,2) DEFAULT NULL,
  `COMP_DATA_INST` datetime DEFAULT NULL,
  `COMP_NOME` varchar(255) NOT NULL,
  `COMP_DATA_GARANTIA` datetime DEFAULT NULL,
  `CASA_ID` int(11) NOT NULL,
  PRIMARY KEY (`COMP_ID`),
  KEY `fk_CASA_ID` (`CASA_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_NOME` varchar(255) CHARACTER SET latin1 NOT NULL,
  `USER_TIPO` char(1) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `USER_DEFICIENCIA` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `USER_IDADE` decimal(10,0) DEFAULT NULL,
  `RUA` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `BAIRRO` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `CIDADE` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `UF` char(2) CHARACTER SET latin1 DEFAULT NULL,
  `USER_SENHA` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`USER_ID`, `USER_NOME`, `USER_TIPO`, `USER_DEFICIENCIA`, `USER_IDADE`, `RUA`, `BAIRRO`, `CIDADE`, `UF`, `USER_SENHA`) VALUES
(1, 'Pedro', '1', NULL, '17', NULL, NULL, NULL, NULL, '123'),
(2, 'pedro', '0', NULL, NULL, NULL, NULL, NULL, NULL, '123'),
(3, 'Testezinho ', '0', 'Auditiva', '34', 'Palmeiras', 'Valle', 'Indaia', 'SP', '123'),
(4, 'admin', '1', NULL, '28', 'Bandeirantes', 'Maracuja', 'Indaiatuba', 'SP', 'admin'),
(5, 'Rafa', '0', NULL, NULL, NULL, NULL, NULL, NULL, 'rafael'),
(6, 'jorgin', '1', 'nenhuma', '22', 'Matuto', 'Mooca', 'SÃ£o Paulo', 'SP', NULL),
(7, 'Matheus', '', 'nenhuma', '14', 'asdasdad', 'sadasd', 'asdaf', 'RS', NULL),
(8, 'davizen', '', 'nenhuma', '45', 'asd', 'wda', 'sdasd', 'ES', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
