-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Abr-2016 às 21:00
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kairos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amostra`
--

CREATE TABLE IF NOT EXISTS `amostra` (
  `idAmostra` int(11) NOT NULL AUTO_INCREMENT,
  `horainicial` time NOT NULL,
  `horafinal` time NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `indice` int(11) DEFAULT NULL,
  `IdDeptoFK` int(11) NOT NULL,
  `IdAtividadeFK` int(11) NOT NULL,
  PRIMARY KEY (`idAmostra`),
  KEY `IdDeptoFK` (`IdDeptoFK`),
  KEY `IdAtividadeFK` (`IdAtividadeFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Extraindo dados da tabela `amostra`
--

INSERT INTO `amostra` (`idAmostra`, `horainicial`, `horafinal`, `quantidade`, `indice`, `IdDeptoFK`, `IdAtividadeFK`) VALUES
(8, '12:00:00', '14:00:00', 1200, 600, 28, 22),
(9, '15:00:00', '16:00:00', 1500, 1500, 28, 22),
(10, '12:00:00', '16:00:00', 1300, 325, 28, 23),
(11, '13:00:00', '16:00:00', 1220, 407, 28, 23),
(12, '12:00:00', '13:00:00', 10000, 10000, 29, 26),
(13, '12:00:00', '14:00:00', 1000, 500, 29, 26),
(14, '12:00:00', '14:00:00', 1200, 600, 29, 26),
(15, '12:00:00', '14:00:00', 1200, 600, 29, 28),
(16, '12:00:00', '14:00:00', 1200, 600, 29, 28),
(17, '12:00:00', '14:00:00', 1300, 650, 29, 28),
(18, '12:00:00', '14:00:00', 1200, 600, 28, 29),
(19, '12:00:00', '14:00:00', 1200, 600, 28, 29),
(20, '12:00:00', '14:00:00', 1300, 650, 28, 29),
(21, '12:00:00', '14:00:00', 1200, 600, 28, 30),
(22, '12:00:00', '14:00:00', 1200, 600, 28, 30),
(23, '12:00:00', '14:00:00', 1200, 600, 28, 30),
(24, '12:00:00', '14:00:00', 1200, 600, 28, 31),
(25, '12:00:00', '14:00:00', 1200, 600, 28, 31),
(26, '12:00:00', '14:00:00', 1200, 600, 28, 31),
(27, '13:00:00', '16:00:00', 1500, 500, 28, 31),
(28, '12:00:00', '14:00:00', 1200, 600, 28, 32),
(29, '12:00:00', '16:00:00', 1500, 375, 28, 32),
(30, '12:00:00', '18:00:00', 1220, 203, 28, 32),
(31, '08:00:00', '09:00:00', 60, 60, 31, 34),
(33, '09:00:00', '10:00:00', 90, 90, 31, 35),
(34, '00:00:00', '00:00:00', 1, 0, 29, 37),
(35, '00:00:08', '00:00:09', 1, 1, 29, 37),
(36, '00:00:00', '00:00:00', 1, 0, 29, 37),
(37, '00:00:00', '00:00:00', 1, 0, 29, 37),
(38, '00:00:08', '00:00:09', 1, 1, 29, 36),
(39, '00:00:08', '00:00:00', 1, 0, 29, 36),
(48, '00:00:08', '00:00:09', 1, 1, 29, 38),
(49, '00:00:08', '00:00:09', 3, 3, 29, 38),
(50, '838:59:59', '00:00:00', 1, 0, 29, 42),
(51, '838:59:59', '00:00:00', 1, 0, 29, 42),
(52, '838:59:59', '00:00:00', 1, 0, 29, 42),
(53, '838:59:59', '00:00:00', 1, 0, 29, 41),
(54, '838:59:59', '00:00:00', 2, 0, 29, 41),
(55, '838:59:59', '00:00:00', 2, 0, 29, 41),
(58, '838:59:59', '00:00:00', 12, 0, 29, 43),
(59, '838:59:59', '00:00:00', 12, 0, 29, 43),
(60, '838:59:59', '00:00:00', 1, 0, 29, 44),
(61, '838:59:59', '00:00:00', 3, 0, 29, 44),
(62, '838:59:59', '00:00:00', 1, 0, 29, 45),
(63, '838:59:59', '00:00:00', 1, 0, 29, 45),
(64, '838:59:59', '00:00:00', 1, 0, 29, 46),
(65, '838:59:59', '00:00:00', 1, 0, 29, 46),
(66, '838:59:59', '00:00:00', 1, 0, 29, 46),
(67, '838:59:59', '00:00:00', 1, 0, 29, 46),
(68, '838:59:59', '00:00:00', 1, 0, 29, 47),
(69, '838:59:59', '00:00:00', 2, 0, 29, 47);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE IF NOT EXISTS `atividade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `meta` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `idDepartamentoFK` int(11) NOT NULL,
  `unid_med` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idDepartamentoFK` (`idDepartamentoFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`id`, `nome`, `meta`, `descricao`, `idDepartamentoFK`, `unid_med`) VALUES
(22, 'Teste', 0, 'Teste', 28, 'Caixa'),
(23, 'Esmigalhar Bugs', 0, 'Esmigalhar todos os bugs encontrados no sistemas.', 28, 'Documento'),
(26, 'Destruir Bugs', 0, 'Destruir Bugs', 29, 'Documento'),
(28, 'Teste Dois', 0, 'AAAAAA', 29, 'Documento'),
(29, 'Programao', 0, 'aaaaa', 28, 'Documento'),
(30, 'Digitalizar', 0, 'aaaaa', 28, 'Documento'),
(31, 'Teste Tres Moda', 0, 'AAAAAAAA', 28, 'Documento'),
(32, 'Teste Media', 0, 'aaaaaa', 28, 'Documento'),
(34, 'Preparacao', 0, '', 31, 'Documento'),
(35, 'triagem', 0, '', 31, 'Caixa'),
(36, 'Maoe', 0, 'aaaa', 29, 'Caixa'),
(37, 'teste', 0, 'teste', 29, 'Documento'),
(38, 'TesteValidaHora', 0, '', 29, 'Caixa'),
(39, 'Teste de Quarta', 0, 'aaaaaaaaaqqwwqqw121212', 28, 'Documento'),
(40, 'Programao', 0, 'ooo', 28, 'Caixa'),
(41, 'oooo', 0, 'oooo', 29, 'Documento'),
(42, 'Teste Bruno', 0, 'Teset', 29, 'Documento'),
(43, 'Teste Finalizar', 0, 'te', 29, 'Documento'),
(44, 'Teste Finalizar e', 0, '', 29, 'Documento'),
(45, 'Esmigalhar wwwww', 0, 't', 29, 'Documento'),
(46, 'TesteYYSYSYSYS', 0, 'Teste', 29, 'Caixa'),
(47, 'Tesllllllllooadoasodoasod', 0, '', 29, 'Documento'),
(48, 'Show TIme', 0, '', 29, 'Documento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(18) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `lider` int(11) NOT NULL,
  `gerente` int(11) NOT NULL,
  `idEnderecoFK` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEnderecoFK` (`idEnderecoFK`),
  KEY `liderFK` (`lider`),
  KEY `geretenteFK` (`gerente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`id`, `cnpj`, `nome`, `lider`, `gerente`, `idEnderecoFK`) VALUES
(28, '11.699.124/0001-01', 'Logistica', 22, 22, 7),
(29, '11.699.124/0001-02', 'Recursos Humanos', 23, 23, 8),
(31, '02.265.444/0001-84', 'Logistica', 23, 24, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cnpj` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `cep`, `endereco`, `cnpj`, `numero`) VALUES
(7, '02994030', 'Rua Doutor Campos Mello', '11.699.124/0001-01', 48),
(8, '02994030', 'Rua Manuel Bicudo', '11.699.124/0001-02', 214),
(9, '03333-333', 'Rua CapitÃ£o Antonio Rosa', '21.824.282/0001-11', 48),
(10, '06243-030', 'Rua dos Pinhais', '02.265.444/0001-84', 349);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filial`
--

CREATE TABLE IF NOT EXISTS `filial` (
  `idfilial` int(11) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `cnpj` int(11) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `numero` varchar(10) NOT NULL,
  PRIMARY KEY (`idfilial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `filial`
--

INSERT INTO `filial` (`idfilial`, `cep`, `cnpj`, `endereco`, `numero`) VALUES
(1, '02994030', 11111111, 'Rua Doutor Campos Mello', '48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nivel` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `matricula` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `cpf`, `email`, `nivel`, `login`, `senha`, `matricula`) VALUES
(18, 'admin', '395.060.048-54', 'admin@karios.com', 'Administrador', 'admin', 'f9e72e68bc765010f823b6bbfee8fdd9', '1213110040'),
(20, 'Ricardo Santana', '395.060.048-54', 'ricardo@kairos.com', 'Gerente', 'rsantana', '141951996ef29065d5d06b5f9757b42f', '2147483647'),
(21, 'Eduardo Bortolossi Cecotti', '395.060.048-54', 'eduardo@kairos.com', 'Gerente', 'e.bortolossi', 'f9e72e68bc765010f823b6bbfee8fdd9', '2147483647'),
(22, 'Marcos Batista', '395.060.048-54', 'marcos@kairos.com', 'Lider', 'm.batista', 'f9e72e68bc765010f823b6bbfee8fdd9', '2147483647'),
(23, 'Anderson Paes', '395.060.048-54', 'anderson@kairos.com', 'Lider', 'a.paes', 'f9e72e68bc765010f823b6bbfee8fdd9', '2147483647'),
(24, 'Wesley Sousa', '395.060.048-54', 'wesley@kairos.com', 'Gerente', 'w.sousa', 'f9e72e68bc765010f823b6bbfee8fdd9', '2147483647'),
(26, 'Sousa Matos', '395.060.048-54', 'sousa@kairos', 'Operador', 's.matos', 'f9e72e68bc765010f823b6bbfee8fdd9', '2147483647'),
(28, 'EduMaraacao', '395.060.048-54', 'ricardo_band@hotmail.com', 'Lider', 'rsantana1', '141951996ef29065d5d06b5f9757b42f', '123123123'),
(29, 'teste Bruno', '395.060.048-54', 'teste@hotmail.com', 'Supervisor', 'bruno.teste', '141951996ef29065d5d06b5f9757b42f', '1231231');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parada`
--

CREATE TABLE IF NOT EXISTS `parada` (
  `idParada` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `tempoParada` int(11) DEFAULT NULL,
  PRIMARY KEY (`idParada`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtividade`
--

CREATE TABLE IF NOT EXISTS `produtividade` (
  `IdProdutividade` int(11) NOT NULL AUTO_INCREMENT,
  `tempoInicial` varchar(5) DEFAULT NULL,
  `tempoFinal` varchar(5) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `data` date NOT NULL,
  `IdFuncionario` int(10) NOT NULL,
  `IdDepartamento` int(10) NOT NULL,
  `IdAtividade` int(11) NOT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`IdProdutividade`),
  KEY `IdDepartamentoProd` (`IdDepartamento`),
  KEY `IdAtividadeProd` (`IdAtividade`),
  KEY `IdFuncionarioProd` (`IdFuncionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Extraindo dados da tabela `produtividade`
--

INSERT INTO `produtividade` (`IdProdutividade`, `tempoInicial`, `tempoFinal`, `quantidade`, `data`, `IdFuncionario`, `IdDepartamento`, `IdAtividade`, `status`) VALUES
(47, '15:32', '15:33', 12123123, '2016-04-15', 20, 29, 38, 'finaliza'),
(48, '15:33', '15:34', 12, '2016-04-15', 20, 29, 44, 'finaliza'),
(49, '15:35', '15:36', 123123, '2016-04-15', 20, 28, 40, 'finaliza'),
(50, '15:36', '15:37', 123123, '2016-04-15', 20, 31, 34, 'finaliza'),
(51, '15:37', '15:40', 2147483647, '2016-04-15', 20, 31, 35, 'finaliza'),
(52, '15:42', '15:44', 123123, '2016-04-15', 20, 28, 30, 'finaliza'),
(53, '15:45', '15:49', 123123123, '2016-04-15', 20, 31, 35, 'finaliza'),
(54, '15:50', '15:51', 213123, '2016-04-15', 20, 29, 48, 'finaliza'),
(55, '15:52', '15:53', 213123123, '2016-04-15', 20, 28, 40, 'finaliza'),
(56, '15:53', '15:55', 123123123, '2016-04-15', 20, 28, 23, 'finaliza'),
(57, '15:56', '15:56', 123123, '2016-04-15', 20, 29, 36, 'finaliza'),
(58, '15:57', '15:57', 123123123, '2016-04-15', 20, 28, 31, 'finaliza'),
(59, '15:58', '15:58', 9090, '2016-04-15', 20, 31, 35, 'finaliza');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `amostra`
--
ALTER TABLE `amostra`
  ADD CONSTRAINT `IdAtividadeFK` FOREIGN KEY (`IdAtividadeFK`) REFERENCES `atividade` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `IdDeptoFK` FOREIGN KEY (`IdDeptoFK`) REFERENCES `departamento` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `idDepartamentoFK` FOREIGN KEY (`idDepartamentoFK`) REFERENCES `departamento` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `geretenteFK` FOREIGN KEY (`gerente`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `idEnderecoFK` FOREIGN KEY (`idEnderecoFK`) REFERENCES `endereco` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `liderFK` FOREIGN KEY (`lider`) REFERENCES `funcionario` (`id`);

--
-- Limitadores para a tabela `produtividade`
--
ALTER TABLE `produtividade`
  ADD CONSTRAINT `IdAtividadeProd` FOREIGN KEY (`IdAtividade`) REFERENCES `atividade` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `IdDepartamentoProd` FOREIGN KEY (`IdDepartamento`) REFERENCES `departamento` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `IdFuncionarioFK` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionario` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `IdFuncionarioProd` FOREIGN KEY (`IdFuncionario`) REFERENCES `funcionario` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
