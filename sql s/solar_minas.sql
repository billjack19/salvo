-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Mar-2018 às 22:37
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solar_minas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `parametro`
--

CREATE TABLE `parametro` (
  `id_parametro` int(11) NOT NULL,
  `ip_parametro` varchar(50) NOT NULL,
  `porta_parametro` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `parametro`
--

INSERT INTO `parametro` (`id_parametro`, `ip_parametro`, `porta_parametro`) VALUES
(1, '192.168.100.9', '8088');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parametro_sms`
--

CREATE TABLE `parametro_sms` (
  `id_parametro_sms` int(11) NOT NULL,
  `num_origem_parametro_sms` varchar(200) NOT NULL,
  `client_id_parametro_sms` varchar(200) NOT NULL,
  `senha_parametro_sms` varchar(200) NOT NULL,
  `data_atualizacao_parametro_sms` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_parametro_sms` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `parametro_sms`
--

INSERT INTO `parametro_sms` (`id_parametro_sms`, `num_origem_parametro_sms`, `client_id_parametro_sms`, `senha_parametro_sms`, `data_atualizacao_parametro_sms`, `bool_ativo_parametro_sms`) VALUES
(1, '553531141177', 'thiago@cdiinfo.com.br', '2899058', '2018-03-28 13:43:18', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parametro`
--
ALTER TABLE `parametro`
  ADD PRIMARY KEY (`id_parametro`);

--
-- Indexes for table `parametro_sms`
--
ALTER TABLE `parametro_sms`
  ADD PRIMARY KEY (`id_parametro_sms`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parametro`
--
ALTER TABLE `parametro`
  MODIFY `id_parametro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parametro_sms`
--
ALTER TABLE `parametro_sms`
  MODIFY `id_parametro_sms` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
