-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Maio-2018 às 22:46
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balanca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `balanca`
--

CREATE TABLE `balanca` (
  `id_balanca` int(11) NOT NULL,
  `descricao_balanca` varchar(200) NOT NULL,
  `peso_balanca` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `balanca`
--

INSERT INTO `balanca` (`id_balanca`, `descricao_balanca`, `peso_balanca`) VALUES
(1, 'Balança 01', 12),
(2, 'Balança 02', 45.9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balanca`
--
ALTER TABLE `balanca`
  ADD PRIMARY KEY (`id_balanca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balanca`
--
ALTER TABLE `balanca`
  MODIFY `id_balanca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
