-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Mar-2016 às 13:26
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE IF NOT EXISTS `atividade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `meta` int(11) DEFAULT NULL,
  `descricao` text NOT NULL,
  `idDepartamentoFK` int(11) NOT NULL,
  `cnpj` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`id`, `nome`, `meta`, `descricao`, `idDepartamentoFK`, `cnpj`) VALUES
(1, 'Empacotar', 14, 'teste', 1, 525815);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`id`, `cnpj`, `nome`, `lider`, `gerente`, `idEnderecoFK`) VALUES
(9, 2147483647, 'Logistica', 'Eduardo', 'Ricardo', 1),
(13, 2147483647, 'Recursos Humano', 'Eduardo', 'Ricardo', 1),
(14, 2147483647, 'ExpediÃ§Ã£o', 'Eduardo', 'Ricardo', 1);

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
(7, '02994030', 'Rua Doutor ', '123123123123', 48),
(8, '0624330', 'Rua Dos Bob', '123123123123', 48);

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
  `cpf` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nivel` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `matricula` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `cpf`, `email`, `nivel`, `login`, `senha`, `matricula`) VALUES
(1, 'Ricardo Sousa de Santana', 2147483647, 'edubortolossi@gmail.com', 'Supervisor', '1', '123123', 11),
(2, 'Ricardo Sousa de Santana', 2147483647, 'rsantana@kairos.com', 'Gerente', 'rsantana', '13241234234', 1234567),
(3, 'Ricardo Sousa de Santana', 2147483647, 'rsantana@kairos.com', 'Gerente', 'rsantana', '234234234', 1234567),
(4, 'Ricardo Sousa de Santana', 2147483647, 'rsantana@kairos.com', 'Gerente', 'rsantana', '3213123', 1234567),
(5, 'Ricardo Sousa de Santana', 2147483647, 'rsantana@kairos.com', 'Gerente', 'rsantana', '123414324', 1234567),
(6, 'Ricardo Sousa de Santana', 2147483647, 'rsantana@kairos.com', 'Gerente', 'rsantana', '2312313123', 1234567),
(7, 'Ricardo Sousa de Santana', 2147483647, 'rsantana@kairos.com', 'Gerente', 'rsantana', '12313123', 1234567),
(8, 'Ricardo Sousa de Santana', 2147483647, 'rsantana@kairos.com', 'Gerente', 'rsantana', '123123', 0),
(9, 'Ricardo Sousa de Santana', 2147483647, 'rsantana@kairos.com', 'Gerente', 'rsantana', '123123123', 0),
(10, 'Ricardo Sousa de Santana', 1234567890, 'rsantana@kairos.com', 'Gerente', 'rsantana', '123123123', 123123),
(11, 'Ricardo Sousa de Santana', 1234567890, 'rsantana@kairos.com', 'Gerente', 'rsantana', '123123123', 123123),
(12, 'Ricardo Sousa de Santana', 1234567890, 'rsantana@kairos.com', 'Gerente', 'rsantana', '123123123', 123123),
(13, 'Ricardo Sousa de Santana', 1234567890, 'rsantana@kairos.com', 'Gerente', 'rsantana', '2313123123', 123123),
(14, 'Ricardo Sousa de Santana', 1234567890, 'rsantana@kairos.com', 'Gerente', 'rsantana', '12312312', 123123),
(15, 'Ricardo Sousa de Santana', 1234567890, 'rsantana@kairos.com', 'Gerente', 'rsantana', '123123123', 123123),
(16, 'Ricardo Sousa de Santana', 1234567890, 'rsantana@kairos.com', 'Gerente', 'rsantana', '21313123', 123123),
(17, 'Ricardo Sousa de Santana', 2147483647, 'rsantana@kairos.com', 'Administrador', 'rsantana', 'ricardo13', 2147483647);

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
  `idProdutividade` int(11) NOT NULL,
  `tempoInicial` datetime DEFAULT NULL,
  `tempoFinal` datetime DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProdutividade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
