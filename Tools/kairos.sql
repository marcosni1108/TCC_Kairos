-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Mar-2016 às 01:17
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
  PRIMARY KEY (`idAmostra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `cnpj` int(11) NOT NULL,
  `unid_med` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`id`, `nome`, `meta`, `descricao`, `idDepartamentoFK`, `cnpj`, `unid_med`) VALUES
(7, 'Digitalizar', 0, 'Digitalizar documentos', 9, 525815, 'Caixa'),
(8, 'Limpeza de Documetos', 0, 'Retirada de todos os grampos, anotaÃ§Ãµes do documentos.', 15, 8, 'Caixa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `lider` varchar(100) NOT NULL,
  `gerente` varchar(100) NOT NULL,
  `idEnderecoFK` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`id`, `cnpj`, `nome`, `lider`, `gerente`, `idEnderecoFK`) VALUES
(9, 2147483647, 'Logistica', 'Eduardo', 'Ricardo', 7),
(13, 2147483647, 'Recursos Humano', 'Eduardo', 'Ricardo', 8),
(15, 2147483647, 'Triagem de Documento', 'Eduardo', 'Ricardo', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(100) DEFAULT NULL,
  `endereco` varchar(11) DEFAULT NULL,
  `cnpj` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `cep`, `endereco`, `cnpj`, `numero`) VALUES
(7, '02994030', 'Rua Doutor ', '111339801212', 48),
(8, '02994030', 'Rua Doutor ', '12123213123', 2147483647);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

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
(27, 'Lerigol', '395.060.048-54', 'leri@kairos', 'Operador', 'leri', 'f9e72e68bc765010f823b6bbfee8fdd9', '2147483647');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parada`
--

CREATE TABLE IF NOT EXISTS `parada` (
  `idParada` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `tempoParada` int(11) DEFAULT NULL,
  PRIMARY KEY (`idParada`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtividade`
--

CREATE TABLE IF NOT EXISTS `produtividade` (
  `idProdutividade` int(11) NOT NULL,
  `tempoInicial` datetime DEFAULT NULL,
  `tempoFinal` datetime DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProdutividade`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
