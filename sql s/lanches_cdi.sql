-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Mar-2018 às 22:00
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lanches_cdi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamada`
--

CREATE TABLE `chamada` (
  `pedido` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `horario` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `chamada`
--

INSERT INTO `chamada` (`pedido`, `nome`, `horario`, `status`) VALUES
('003857', 'Jack Biller', '2018-03-06 00:00:00', 0),
('003869', 'Jack Biller Teste', '2018-03-13 10:07:04', 3),
('003870', 'Teste Qualquer Coisa', '2018-03-13 13:53:05', 3),
('003871', 'Teste 1', '2018-03-13 14:05:48', 2),
('003872', 'Teste 2', '2018-03-13 14:00:46', 3),
('003873', 'Teste 3', '2018-03-13 14:00:22', 3),
('003874', ' ', '2018-03-13 13:52:30', 3),
('003875', ' ', '2018-03-13 14:03:55', 2),
('003876', 'TESTE', '2018-03-13 14:06:15', 1),
('003877', 'Jack Biller da Silva Prado teste qweqwweqweqweqweq', '2018-03-13 16:27:05', 1),
('003878', 'teste nome muito grande para o reproduzir em outra', '2018-03-13 16:29:03', 1),
('003881', 'Jack Teste', '2018-03-15 09:12:52', 1),
('003885', 'Jack Teste', '2018-03-16 08:23:48', 4),
('003893', 'Jack', '2018-03-16 16:13:19', 1),
('003900', 'Jack Biller Teste', '2018-03-20 14:17:07', 3),
('003901', 'Jack Teste', '2018-03-20 17:25:48', 1),
('003903', 'teste', '2018-03-21 10:21:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `condicao`
--

CREATE TABLE `condicao` (
  `id_condicao` int(11) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `condicao`
--

INSERT INTO `condicao` (`id_condicao`, `descricao`) VALUES
(1, 'pendete'),
(2, 'chamado'),
(3, 'finalizado'),
(4, 'chamado novamente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parametros`
--

CREATE TABLE `parametros` (
  `id_parametros` int(11) NOT NULL,
  `ip_parametros` varchar(200) NOT NULL,
  `porta_paramentros` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `parametros`
--

INSERT INTO `parametros` (`id_parametros`, `ip_parametros`, `porta_paramentros`) VALUES
(1, '192.168.100.9', '8088');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chamada`
--
ALTER TABLE `chamada`
  ADD PRIMARY KEY (`pedido`);

--
-- Indexes for table `condicao`
--
ALTER TABLE `condicao`
  ADD PRIMARY KEY (`id_condicao`);

--
-- Indexes for table `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`id_parametros`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `condicao`
--
ALTER TABLE `condicao`
  MODIFY `id_condicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `parametros`
--
ALTER TABLE `parametros`
  MODIFY `id_parametros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
