-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Dez-2017 às 20:52
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql_register`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `basedados`
--

CREATE TABLE `basedados` (
  `id_baseDados` int(11) NOT NULL,
  `descricao_baseDados` varchar(200) NOT NULL,
  `regitros_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `basedados`
--

INSERT INTO `basedados` (`id_baseDados`, `descricao_baseDados`, `regitros_id`) VALUES
(3, 'FOGO', 1),
(4, 'PointDaPanqueca', 1),
(5, 'Format', 2),
(6, 'FOGO', 4),
(7, 'AMFIOS', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `regitros`
--

CREATE TABLE `regitros` (
  `Id_SQL` int(11) NOT NULL,
  `ServerName` varchar(500) NOT NULL,
  `ServiceName` varchar(500) NOT NULL,
  `Key_SQL_servive` varchar(1000) NOT NULL,
  `Port_Number` int(11) NOT NULL,
  `user_regitros` varchar(200) NOT NULL DEFAULT 'sa',
  `senha_regitros` varchar(200) NOT NULL DEFAULT 'teste'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `regitros`
--

INSERT INTO `regitros` (`Id_SQL`, `ServerName`, `ServiceName`, `Key_SQL_servive`, `Port_Number`, `user_regitros`, `senha_regitros`) VALUES
(1, 'SUPORTECDI\\SQL2014', 'SQL2014', 'SOFTWARE\\Microsoft\\Microsoft SQL Server\\SQL2014\\MSSQLServer\\SuperSocketNetLib\\Tcp', 50207, '', ''),
(2, 'SUPORTECDI\\SULMINAS', 'SULMINAS', 'SOFTWARE\\Microsoft\\Microsoft SQL Server\\SULMINAS\\MSSQLServer\\SuperSocketNetLib\\Tcp', 49173, '', ''),
(4, 'CDI_INFO_009', 'MSSQLSERVER', 'SOFTWARE\\MICROSOFT\\MSSQLSERVER\\MSSQLSERVER\\SUPERSOCKETNETLIB\\TCP', 1433, '', ''),
(5, 'localhost', 'localhost', 'SOFTWARE\\MICROSOFT\\MSSQLSERVER\\MSSQLSERVER\\SUPERSOCKETNETLIB\\TCP', 1433, 'sa', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `descricao_status` varchar(500) NOT NULL,
  `basedados_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id_status`, `descricao_status`, `basedados_id`) VALUES
(1, '21/12/2017 17:16:11', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basedados`
--
ALTER TABLE `basedados`
  ADD PRIMARY KEY (`id_baseDados`);

--
-- Indexes for table `regitros`
--
ALTER TABLE `regitros`
  ADD PRIMARY KEY (`Id_SQL`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basedados`
--
ALTER TABLE `basedados`
  MODIFY `id_baseDados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `regitros`
--
ALTER TABLE `regitros`
  MODIFY `Id_SQL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
