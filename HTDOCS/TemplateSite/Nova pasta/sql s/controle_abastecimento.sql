-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Dez-2017 às 20:50
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `controle_abastecimento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `abastecimento`
--

CREATE TABLE `abastecimento` (
  `id_abastecimento` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `caminhao_id` int(11) DEFAULT NULL,
  `terceiros_id` int(11) DEFAULT NULL,
  `bomba_id` int(11) NOT NULL,
  `data_abastecimento` date NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `horas` varchar(10) DEFAULT NULL,
  `odometro` int(11) DEFAULT NULL,
  `litros` float(7,3) NOT NULL,
  `vlr_unit` float(5,3) NOT NULL,
  `total` float(8,3) NOT NULL,
  `bool_cupom` tinyint(1) DEFAULT NULL,
  `bool_fitinha` tinyint(1) DEFAULT NULL,
  `bool_acerto` tinyint(1) DEFAULT NULL,
  `bool_placa_fit` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `abastecimento`
--

INSERT INTO `abastecimento` (`id_abastecimento`, `usuario_id`, `numero`, `caminhao_id`, `terceiros_id`, `bomba_id`, `data_abastecimento`, `mes`, `ano`, `horas`, `odometro`, `litros`, `vlr_unit`, `total`, `bool_cupom`, `bool_fitinha`, `bool_acerto`, `bool_placa_fit`) VALUES
(15, 1, 71, 0, 3, 4, '2017-07-27', 7, 2017, '21:32', 0, 34.230, 2.000, 68.460, 1, 1, 2, 0),
(16, 1, 3012, 0, 3, 4, '2017-07-25', 7, 2017, '13:23', 0, 5.000, 2.500, 12.500, 1, 1, 2, 0),
(17, 1, 3543, 21, 0, 4, '2017-07-24', 7, 2017, '23:23', 8765432, 345.000, 2.500, 862.500, 1, 1, 1, 0),
(18, 1, 3546, 17, 0, 4, '2017-07-24', 7, 2017, '23:23', 8765435, 245.600, 2.500, 614.000, 1, 1, 3, 1),
(19, 1, 3564, 11, 0, 4, '2017-07-26', 7, 2017, '12:32', 4324532, 300.500, 2.000, 601.000, 1, 1, 1, 0),
(20, 1, 3546, 21, 0, 4, '2017-06-15', 6, 2017, '21:32', 766346, 50.000, 2.800, 140.000, 1, 1, 1, 0),
(21, 1, 7564, 7, 0, 4, '2016-12-23', 12, 2016, '12:12', 656674, 675.450, 5.670, 3829.800, 1, 1, 1, 1),
(22, 1, 3243, 17, 0, 4, '2017-07-26', 7, 2017, '12:33', 32435423, 120.340, 2.000, 240.680, 1, 1, 3, 0),
(23, 1, 1232, 12, 0, 4, '2017-08-02', 8, 2017, '12:12', 21312, 32.320, 2.850, 92.110, 1, 1, 1, 0),
(24, 1, 1232, 12, 0, 4, '2017-08-02', 8, 2017, '12:12', 3213, 12.120, 2.850, 34.540, 1, 1, 1, 1),
(25, 1, 123432, 24, 0, 4, '2017-08-03', 8, 2017, '23:23', 3423, 12.120, 2.850, 34.540, 1, 1, 1, 0),
(26, 1, 23143, 24, 0, 4, '2017-08-15', 8, 2017, '23:44', 3432432, 1000.000, 2.850, 2850.000, 1, 1, 1, 0),
(28, 1, 21321, 12, 0, 4, '2017-08-02', 8, 2017, '12:33', 213232, 123.210, 2.300, 283.380, 1, 1, 1, 0),
(29, 1, 2132, 12, 0, 4, '2017-08-02', 8, 2017, '25:46', 43243, 232.130, 2.300, 533.900, 1, 1, 1, 1),
(30, 1, 4323, 24, 0, 4, '2017-08-02', 8, 2017, '21:32', 43241, 213.210, 2.300, 490.380, 1, 1, 1, 1),
(31, 1, 23212, 0, 3, 4, '2017-08-02', 8, 2017, '12:32', NULL, 123.210, 2.300, 283.380, 1, 1, 2, 1),
(32, 1, 23121, 17, 0, 4, '2017-08-02', 8, 2017, '12:32', 213213, 213.230, 2.300, 490.430, 1, 1, 0, 1),
(33, 1, 3213, 12, 0, 4, '2017-08-02', 8, 2017, '21:32', 2132123, 213.230, 2.300, 490.430, 1, 1, 1, 0),
(34, 1, 23413, 12, 0, 4, '2017-08-02', 8, 2017, '12:32', 232132, 23.120, 2.300, 53.180, 1, 1, 1, 1),
(35, 1, 123221, 17, 0, 4, '2017-08-02', 8, 2017, '21:32', 32312, 232.350, 2.300, 534.400, 1, 1, 3, 1),
(36, 1, 12323, 12, 0, 4, '2017-08-02', 8, 2017, '23:12', 213213, 322.130, 2.300, 740.900, 1, 1, 1, 1),
(37, 1, 1232, 0, 3, 4, '2017-08-03', 8, 2017, '12:32', NULL, 32.420, 2.300, 74.570, 1, 1, 2, 0),
(38, 1, 4563, 21, 0, 4, '2017-08-10', 8, 2017, '23:34', 346365, 565.760, 2.300, 1301.250, 1, 1, 1, 0),
(39, 1, 12321, 12, 0, 4, '2017-08-03', 8, 2017, '24:43', 12321321, 123.120, 2.300, 283.180, 1, 1, 1, 0),
(40, 1, 12321, 12, 0, 4, '2017-08-03', 8, 2017, '12:32', 1231232, 324.230, 2.300, 745.730, 1, 1, 1, 0),
(41, 1, 12321, 15, 0, 4, '2017-08-04', 8, 2017, '21:32', 3453453, 345.420, 2.300, 794.470, 1, 1, 1, 0),
(42, 1, 4323, 25, 0, 4, '2017-08-04', 8, 2017, '23:21', 1234321, 343.230, 2.300, 789.430, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bomba`
--

CREATE TABLE `bomba` (
  `id_bomba` int(11) NOT NULL,
  `descricao` varchar(60) DEFAULT NULL,
  `volume_atual` float(10,3) DEFAULT NULL,
  `volume_total` float(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bomba`
--

INSERT INTO `bomba` (`id_bomba`, `descricao`, `volume_atual`, `volume_total`) VALUES
(4, 'Bomba de Abastecimento SITCAR', 7670.000, 15000.000),
(6, 'Bomba test', 6556.840, 10000.000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `caminhao`
--

CREATE TABLE `caminhao` (
  `id_caminhao` int(11) NOT NULL,
  `placa` varchar(10) DEFAULT NULL,
  `cor_id` int(11) NOT NULL,
  `proprietario_id` int(11) DEFAULT NULL,
  `marca_id` int(11) NOT NULL,
  `vin_media` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `caminhao`
--

INSERT INTO `caminhao` (`id_caminhao`, `placa`, `cor_id`, `proprietario_id`, `marca_id`, `vin_media`) VALUES
(7, 'HLQ-1276', 1, 1, 1, 0),
(8, 'HLQ-1277', 1, 1, 1, 0),
(9, 'HLQ-1297', 1, 1, 1, 0),
(10, 'GXH-8232', 1, 3, 2, 0),
(11, 'GXH-8234', 1, 4, 2, 0),
(12, 'DAH-2384', 1, 4, 2, 0),
(13, 'GXH-8616', 1, 4, 2, 0),
(14, 'MPZ-2998', 1, 5, 2, 0),
(15, 'LOP-9994', 1, 6, 2, 0),
(16, 'GXH-8835', 1, 6, 2, 0),
(17, 'CSK-2508', 1, 6, 2, 1),
(18, 'GXH-8545', 2, 7, 2, 0),
(19, 'HJV-0323', 1, 8, 2, 0),
(20, 'GXH-8546', 1, 8, 2, 0),
(21, 'GXH-8511', 1, 8, 2, 0),
(22, 'MPZ-2994', 1, 1, 2, 0),
(23, 'GXH-8231', 1, 1, 2, 0),
(24, 'GXH-8619', 1, 1, 2, 0),
(25, 'PVC-1594', 1, 1, 2, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor`
--

CREATE TABLE `cor` (
  `id_cor` int(11) NOT NULL,
  `descricao` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cor`
--

INSERT INTO `cor` (`id_cor`, `descricao`) VALUES
(1, 'Branca'),
(2, 'Vermelha'),
(3, 'Prata'),
(4, 'Laranja');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `reg_federal` varchar(20) DEFAULT NULL,
  `reg_estadual` varchar(20) DEFAULT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `bairro` varchar(40) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome`, `reg_federal`, `reg_estadual`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado_id`, `cep`) VALUES
(4, 'Transvita', '12.312.312/3123-1', '123123123', 'Rua Tal', 45, '', 'Centro', 'Poços de caldas', 1, '43.243-242');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `bomba_id` int(11) NOT NULL,
  `num_nfe` int(11) DEFAULT NULL,
  `data_entrada` date NOT NULL,
  `mes` int(2) NOT NULL,
  `ano` int(5) NOT NULL,
  `qtd_litros` float(8,3) DEFAULT NULL,
  `vlr_unit` float(5,3) DEFAULT NULL,
  `total` float(9,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `usuario_id`, `empresa_id`, `bomba_id`, `num_nfe`, `data_entrada`, `mes`, `ano`, `qtd_litros`, `vlr_unit`, `total`) VALUES
(11, 1, 4, 4, 456, '2017-07-24', 7, 2017, -5000.000, 2.500, -12500.000),
(12, 1, 4, 4, NULL, '2017-07-26', 7, 2017, 5000.000, 2.850, 10000.000),
(13, 1, 4, 4, 12345, '2017-08-02', 8, 2017, 1000.000, 2.300, 2300.000),
(14, 1, 4, 4, 4323, '2017-08-02', 8, 2017, 10000.000, 2.450, 24500.000),
(15, 1, 4, 6, 5432, '2017-08-03', 8, 2017, 5324.520, 2.800, 14908.660);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `sigla` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id_estado`, `nome`, `sigla`) VALUES
(1, 'Minas Gerais', 'MG'),
(2, 'São Paulo', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `descricao` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`id_marca`, `descricao`) VALUES
(1, 'Volkswagen'),
(2, 'Scania'),
(3, 'Volvo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `proprietario`
--

CREATE TABLE `proprietario` (
  `id_proprietario` int(11) NOT NULL,
  `nome` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `proprietario`
--

INSERT INTO `proprietario` (`id_proprietario`, `nome`) VALUES
(1, 'SITCAR'),
(2, 'TA&G'),
(3, 'Nilceu'),
(4, 'Erley'),
(5, 'Gabriela'),
(6, 'Magaly'),
(7, 'Maria Helena'),
(8, 'Tânia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `terceiros`
--

CREATE TABLE `terceiros` (
  `id_terceiros` int(11) NOT NULL,
  `descricao` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `terceiros`
--

INSERT INTO `terceiros` (`id_terceiros`, `descricao`) VALUES
(3, 'Oficina'),
(4, 'Bomba de Abastecimento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `login` varchar(60) DEFAULT NULL,
  `senha` varchar(60) DEFAULT NULL,
  `nivel` int(11) NOT NULL,
  `bool_ativo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `login`, `senha`, `nivel`, `bool_ativo`) VALUES
(1, 'Jack Biller da Silva Prado', 'jack', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1),
(3, 'Claudinei Silva', 'cla', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abastecimento`
--
ALTER TABLE `abastecimento`
  ADD PRIMARY KEY (`id_abastecimento`),
  ADD KEY `fk_id_usuario` (`usuario_id`),
  ADD KEY `fk_id_bomba` (`bomba_id`),
  ADD KEY `fk_id_caminhao` (`caminhao_id`),
  ADD KEY `fk_id_terceiros` (`terceiros_id`);

--
-- Indexes for table `bomba`
--
ALTER TABLE `bomba`
  ADD PRIMARY KEY (`id_bomba`);

--
-- Indexes for table `caminhao`
--
ALTER TABLE `caminhao`
  ADD PRIMARY KEY (`id_caminhao`),
  ADD UNIQUE KEY `placa` (`placa`),
  ADD KEY `fk_id_cor` (`cor_id`),
  ADD KEY `fk_id_marca` (`marca_id`),
  ADD KEY `fk_id_proprietario` (`proprietario_id`);

--
-- Indexes for table `cor`
--
ALTER TABLE `cor`
  ADD PRIMARY KEY (`id_cor`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `fk_id_estado` (`estado_id`);

--
-- Indexes for table `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `fk_empresa_id` (`empresa_id`),
  ADD KEY `fk_bomba_id` (`bomba_id`),
  ADD KEY `fk_usuario_id` (`usuario_id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indexes for table `proprietario`
--
ALTER TABLE `proprietario`
  ADD PRIMARY KEY (`id_proprietario`);

--
-- Indexes for table `terceiros`
--
ALTER TABLE `terceiros`
  ADD PRIMARY KEY (`id_terceiros`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abastecimento`
--
ALTER TABLE `abastecimento`
  MODIFY `id_abastecimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `bomba`
--
ALTER TABLE `bomba`
  MODIFY `id_bomba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `caminhao`
--
ALTER TABLE `caminhao`
  MODIFY `id_caminhao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `cor`
--
ALTER TABLE `cor`
  MODIFY `id_cor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `proprietario`
--
ALTER TABLE `proprietario`
  MODIFY `id_proprietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `terceiros`
--
ALTER TABLE `terceiros`
  MODIFY `id_terceiros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
