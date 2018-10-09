-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Dez-2017 às 20:49
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cacamba`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cacamba`
--

CREATE TABLE `cacamba` (
  `id_cacamba` int(11) NOT NULL,
  `descricao_cacamba` varchar(100) NOT NULL,
  `disponivel` int(1) NOT NULL DEFAULT '1',
  `cnpj_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cacamba`
--

INSERT INTO `cacamba` (`id_cacamba`, `descricao_cacamba`, `disponivel`, `cnpj_user`) VALUES
(1, 'Caçamba 01', 0, '1234.1234'),
(2, 'Caçamba 02', 0, '1234.1234'),
(3, 'Caçamba 03', 1, '1234.1234'),
(4, 'Caçamba 04', 0, '1234.1234'),
(5, 'Caçamba 05', 0, '1234.1234'),
(6, 'Caçamba 06', 1, '1234.1234'),
(7, 'Caçamba 07', 1, '1234.1234'),
(8, 'Caçamba 08', 1, '1234.1234'),
(9, 'Caçamba 09', 1, '1234.1234'),
(10, 'Caçamba 10', 1, '1234.1234'),
(11, 'Caçamba 01', 0, '123.123'),
(12, 'Caçamba 02', 1, '123.123'),
(13, 'Caçamba 03', 1, '123.123'),
(14, 'Caçamba 04', 1, '123.123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `caminhao`
--

CREATE TABLE `caminhao` (
  `id_caminhao` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `latidude` varchar(100) NOT NULL,
  `motorista_id` int(11) NOT NULL,
  `status_caminhao` int(11) NOT NULL,
  `ultima_atualizacao` varchar(100) NOT NULL,
  `ativo_caminhao` int(1) NOT NULL DEFAULT '1',
  `cnpj_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `caminhao`
--

INSERT INTO `caminhao` (`id_caminhao`, `descricao`, `longitude`, `latidude`, `motorista_id`, `status_caminhao`, `ultima_atualizacao`, `ativo_caminhao`, `cnpj_user`) VALUES
(1, 'AAA-0000', '-46.5667663', '-21.7841976', 0, 1, '18/10/2017  17:44:34', 1, '1234.1234'),
(2, 'BBB-0000', '-46.5667203', '-21.7841826', 0, 1, '18/10/2017  17:39:14', 1, '123.123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chave_map`
--

CREATE TABLE `chave_map` (
  `id_chave` int(11) NOT NULL,
  `descricao` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `chave_map`
--

INSERT INTO `chave_map` (`id_chave`, `descricao`) VALUES
(1, 'AIzaSyAhiMsOZoOhu4m5SHG4l_ij6WEHcJdf71A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `razao_social` varchar(100) NOT NULL,
  `tipo` enum('f','j') NOT NULL,
  `inscricao_federal` varchar(100) NOT NULL,
  `bool_ativo` int(1) NOT NULL DEFAULT '1',
  `telefone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `endereco` int(11) NOT NULL DEFAULT '0',
  `cnpj_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `razao_social`, `tipo`, `inscricao_federal`, `bool_ativo`, `telefone`, `email`, `endereco`, `cnpj_user`) VALUES
(1, 'CDI Informatica e Assessoria', 'j', '15.648.945/6156-45', 1, '(99) 9999-9999', 'cdi@email.com', 2, '1234.1234'),
(2, 'Sitcar', 'j', '45.645.642/1312-45', 0, '(51) 3024-2298', '', 4, '1234.1234'),
(3, 'CDI Acessoria e Infomatica e contabilidadde e rerererererererere', 'j', '13.123.132/1123-54', 1, '', '', 5, '123.123'),
(4, 'Jack Biller da Silva Prado', 'f', '131.456.896-57', 1, '(35) 9 9723-1080', 'jackbiller19@gmail.com', 8, '1234.1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `CNPJ` varchar(30) NOT NULL,
  `razao_social` varchar(200) NOT NULL,
  `nome_fantasia` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(200) DEFAULT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `uf` varchar(200) NOT NULL,
  `cep` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `imagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`CNPJ`, `razao_social`, `nome_fantasia`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `telefone`, `email`, `imagem`) VALUES
('123.123', 'Caçamba Ramos LTDA', 'Caçamba Ramos', 'Rua João de Almeida Prata', 809, NULL, 'Jardim São Paulo', 'Poços de Caldas', 'MG', '37704-003', '(35) 3721-4854', '', 'ramos.png'),
('1234.1234', 'Detroit Locação de Caçambas e Equipamentos Ltda', 'Detroit', 'Rua Assis Fiqueredo', 168, '', 'Centro', 'Poços de Caldas', 'MG', '37701-000', '(35) 3713-2170', 'detroitcacambas@hotmail.com', 'detroit.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrucao`
--

CREATE TABLE `instrucao` (
  `ordem` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `cnpj_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `instrucao`
--

INSERT INTO `instrucao` (`ordem`, `descricao`, `cnpj_user`) VALUES
(1, 'Favor não remover a caçamba sem antes nos consultar.', '1234.1234'),
(2, ' Ao deixar de utilizar a caçamba, ligue-nos e solicite a sua remoção.', '1234.1234'),
(3, 'O pagamento deverá ser efetuado ao motorista no ato da retirada ou conforme o combinado.', '1234.1234'),
(0, 'Não ultrapasse os limites da caçamba, o entulho/material não poderá ficar acima de seu nível/borda. o excesso será retirado e deixado no local', '1234.1234'),
(1, 'Não remova a Caçamba por conta própria', '123.123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `local_entrega`
--

CREATE TABLE `local_entrega` (
  `id_local_entrega` int(11) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(100) NOT NULL,
  `cep` varchar(30) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `bool_ativo` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `local_entrega`
--

INSERT INTO `local_entrega` (`id_local_entrega`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `cliente_id`, `latitude`, `longitude`, `bool_ativo`) VALUES
(1, '', 679, '', 'Centro', '', 'MG', '37701-021', 0, '-21.7843562', '-46.5668704', 1),
(2, 'Rua Pernambuco', 679, '', 'Centro', 'Poços de Caldas', 'MG', '37701-021', 1, '-21.7843562', '-46.5668704', 1),
(4, 'Avenida João Pinheiro', 665, '', 'Centro', 'Poços de Caldas', 'MG', '37701-387', 2, '-21.7859284', '-46.578943', 1),
(5, 'Rua Pernambuco', 679, 'teste', 'Centro', 'Poços de Caldas', 'MG', '37701-021', 3, '-21.7843562', '-46.5668704', 1),
(8, 'Rua Dovílio Taconi', 150, 'casa 03', 'Jardim Quisisana', 'Poços de Caldas', 'MG', '37701-253', 4, '-21.7986604', '-46.5693178', 1),
(10, 'Rua Pernambuco', 679, '', 'Centro', 'Poços de Caldas', 'MG', '37701-021', 4, '-21.7843562', '-46.5668704', 1),
(11, 'Rua Assis Figueiredo', 123, '', 'Centro', 'Poços de Caldas', 'MG', '37701-000', 1, '-21.7794406', '-46.56452090000001', 0),
(12, 'Rua Assis Figueiredo', 250, '', 'Centro', 'Poços de Caldas', 'MG', '37701-000', 1, '-21.7804957', '-46.5650443', 1),
(13, 'Rua Acácia', 13, '', 'São João', 'Poços de Caldas', 'MG', '37701-125', 1, '-21.7887561', '-46.551606', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorista`
--

CREATE TABLE `motorista` (
  `id_motorista` int(11) NOT NULL,
  `nome_motorista` varchar(100) NOT NULL,
  `login_motorista` varchar(100) NOT NULL,
  `senha_motorista` varchar(100) NOT NULL,
  `ativo_motorista` int(1) NOT NULL,
  `cnpj_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `motorista`
--

INSERT INTO `motorista` (`id_motorista`, `nome_motorista`, `login_motorista`, `senha_motorista`, `ativo_motorista`, `cnpj_user`) VALUES
(1, 'Adiministrador', 'adm', '123', 1, ''),
(2, 'Jack Biler', 'jac', '123', 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao_cacamba`
--

CREATE TABLE `movimentacao_cacamba` (
  `id_movimentacao_cacamba` int(11) NOT NULL,
  `cacamba_id` int(11) NOT NULL,
  `local_entrega_id` int(11) NOT NULL,
  `situacao` int(1) DEFAULT NULL,
  `titulo` text NOT NULL,
  `valor_total` float NOT NULL,
  `emissao` varchar(30) NOT NULL,
  `entrega` varchar(20) DEFAULT NULL,
  `retirada` varchar(20) DEFAULT NULL,
  `periodo` int(11) NOT NULL,
  `confirma_carreto` int(11) NOT NULL DEFAULT '0',
  `observacao` varchar(500) DEFAULT NULL,
  `flag_entrega` int(1) NOT NULL DEFAULT '0',
  `flag_recolhe` int(11) NOT NULL DEFAULT '0',
  `flag_pagto` int(1) NOT NULL DEFAULT '0',
  `flag_impressao` int(1) NOT NULL DEFAULT '1',
  `cnpj_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `movimentacao_cacamba`
--

INSERT INTO `movimentacao_cacamba` (`id_movimentacao_cacamba`, `cacamba_id`, `local_entrega_id`, `situacao`, `titulo`, `valor_total`, `emissao`, `entrega`, `retirada`, `periodo`, `confirma_carreto`, `observacao`, `flag_entrega`, `flag_recolhe`, `flag_pagto`, `flag_impressao`, `cnpj_user`) VALUES
(1, 1, 2, 3, 'teste', 100, '2017-11-13 17:37', '2017-11-13', '2017-11-16', 3, 0, NULL, 0, 0, 1, 1, '1234.1234'),
(2, 4, 8, 5, 'Caçamba', 100, '16/11/2017  17', '2017-11-16', '2017-11-27', 11, 0, '', 0, 0, 1, 1, '1234.1234'),
(4, 3, 10, 5, 'Caçamba', 120, '17/11/2017  14', '2017-11-17', '2017-11-24', 7, 0, '', 0, 0, 1, 1, '1234.1234'),
(5, 6, 8, 5, 'Caçamba', 123, '17/11/2017  14', '2017-11-17', '2017-12-02', 15, 0, '', 0, 0, 1, 1, '1234.1234'),
(6, 4, 12, 4, 'Caçamba', 100, '17/11/2017  15', '2017-11-17', '2017-11-22', 5, 0, '', 0, 0, 0, 1, '1234.1234'),
(9, 11, 5, 1, 'Caçamba', 100, '17/11/2017  16', '2017-11-17', '2017-11-27', 10, 0, '', 0, 0, 0, 1, '123.123'),
(10, 2, 8, 2, 'Caçamba', 100, '17/11/2017  17', '2017-11-17', '2017-11-21', 4, 0, '', 0, 0, 1, 1, '1234.1234'),
(11, 4, 2, 1, 'Caçamba', 100, '17/11/2017  17', '2017-11-17', '2017-11-21', 4, 0, '', 0, 0, 0, 1, '1234.1234'),
(12, 1, 2, 1, 'Caçamba', 100, '20/11/2017  11', '2017-11-20', '2017-11-27', 7, 0, '', 0, 0, 0, 1, '1234.1234'),
(13, 5, 2, 1, 'Caçamba', 123, '20/11/2017  12:58:38', '2017-11-20', '2017-11-21', 6, 0, '', 0, 0, 0, 1, '1234.1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `regiao`
--

CREATE TABLE `regiao` (
  `id_regiao` int(11) NOT NULL,
  `descricao_regiao` varchar(200) NOT NULL,
  `latitude_regiao` varchar(100) NOT NULL,
  `longitude_regiao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `regiao`
--

INSERT INTO `regiao` (`id_regiao`, `descricao_regiao`, `latitude_regiao`, `longitude_regiao`) VALUES
(1, 'Poços de Caldas', '-21.799966481181826', '-46.56498469848634'),
(2, 'São João da Boa Vista', '-21.971384848764203', '-46.7947197065223'),
(3, 'Bandeira do Sul', '-21.728885873951484', '-46.38603687286377');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `id_situacao` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `situacao`
--

INSERT INTO `situacao` (`id_situacao`, `descricao`) VALUES
(1, 'Temporário'),
(2, 'Não Recolher'),
(3, 'Recolher'),
(4, 'Recolido não recebido'),
(5, 'Recolido recebido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_regiao`
--

CREATE TABLE `sub_regiao` (
  `id_sub_regiao` int(11) NOT NULL,
  `regiao_id` int(11) NOT NULL,
  `descricao_sub_regiao` varchar(200) NOT NULL,
  `latitude_sub_regiao` varchar(100) NOT NULL,
  `longitude_sub_regiao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sub_regiao`
--

INSERT INTO `sub_regiao` (`id_sub_regiao`, `regiao_id`, `descricao_sub_regiao`, `latitude_sub_regiao`, `longitude_sub_regiao`) VALUES
(1, 1, 'São José', '-21.81003019457118', '-46.569671630859375'),
(3, 1, 'Jardim Centenario', '-21.806922367978267', '-46.56486511230469'),
(4, 1, 'Jardim Europa', '-21.81736121054412', '-46.590614318847656'),
(5, 1, 'Jardim Country Club', '-21.79656245890665', '-46.61524772644043'),
(7, 1, 'Jardim Quisisana', '-21.800427589532287', '-46.56709671020508'),
(8, 1, 'Santa Angela', '-21.801782352903754', '-46.57430648803711'),
(10, 1, 'Santa Maria', '-21.79831572695858', '-46.57662391662598'),
(11, 1, 'Jardim Santa Augusta', '-21.79325509940086', '-46.57280445098877'),
(12, 1, 'Dom Bosco', '-21.79979004939451', '-46.53430938720703'),
(13, 1, 'Parque Pinheiros', '-21.807559876368252', '-46.503753662109375'),
(14, 1, 'Jardim Itamaraty III', '-21.81385511931097', '-46.50160789489746'),
(15, 1, 'Jardim Philadelphia', '-21.820787534905204', '-46.51362419128418'),
(16, 1, 'Jardim Bandeirantes', '-21.81875565477614', '-46.56683922075899'),
(17, 1, 'Jardim Esperança', '-21.837599239731535', '-46.56696796417236'),
(18, 1, 'Jardim Kennedy', '-21.842459127376973', '-46.58065796160372'),
(19, 1, 'Jardim São Sebastião', '-21.85831236606966', '-46.57155990600586'),
(20, 1, 'Jardim Ipe', '-21.803734783457738', '-46.545982360839844'),
(21, 1, 'São Benedito', '-21.791302526025092', '-46.561174392700195'),
(22, 2, 'Jardim Leonor', '-21.975046257888494', '-46.78819657419808'),
(23, 2, 'Vila Isabel', '-21.98308510755134', '-46.806135188089684'),
(24, 3, 'Bandeira do Sul', '-21.728885873951484', '-46.38603687286377');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `login_ususario` varchar(100) NOT NULL,
  `senha_usuario` varchar(100) NOT NULL,
  `cnpj_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_ususario`, `senha_usuario`, `cnpj_user`) VALUES
(1, 'ADMINISTRADOR', 'ADM', '123', '1234.1234'),
(2, 'Ramos', 'RAM', '456', '123.123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cacamba`
--
ALTER TABLE `cacamba`
  ADD PRIMARY KEY (`id_cacamba`);

--
-- Indexes for table `caminhao`
--
ALTER TABLE `caminhao`
  ADD PRIMARY KEY (`id_caminhao`);

--
-- Indexes for table `chave_map`
--
ALTER TABLE `chave_map`
  ADD PRIMARY KEY (`id_chave`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`CNPJ`);

--
-- Indexes for table `local_entrega`
--
ALTER TABLE `local_entrega`
  ADD PRIMARY KEY (`id_local_entrega`);

--
-- Indexes for table `motorista`
--
ALTER TABLE `motorista`
  ADD PRIMARY KEY (`id_motorista`);

--
-- Indexes for table `movimentacao_cacamba`
--
ALTER TABLE `movimentacao_cacamba`
  ADD PRIMARY KEY (`id_movimentacao_cacamba`);

--
-- Indexes for table `regiao`
--
ALTER TABLE `regiao`
  ADD PRIMARY KEY (`id_regiao`);

--
-- Indexes for table `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`id_situacao`);

--
-- Indexes for table `sub_regiao`
--
ALTER TABLE `sub_regiao`
  ADD PRIMARY KEY (`id_sub_regiao`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cacamba`
--
ALTER TABLE `cacamba`
  MODIFY `id_cacamba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `caminhao`
--
ALTER TABLE `caminhao`
  MODIFY `id_caminhao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chave_map`
--
ALTER TABLE `chave_map`
  MODIFY `id_chave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `local_entrega`
--
ALTER TABLE `local_entrega`
  MODIFY `id_local_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `motorista`
--
ALTER TABLE `motorista`
  MODIFY `id_motorista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `movimentacao_cacamba`
--
ALTER TABLE `movimentacao_cacamba`
  MODIFY `id_movimentacao_cacamba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `regiao`
--
ALTER TABLE `regiao`
  MODIFY `id_regiao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `situacao`
--
ALTER TABLE `situacao`
  MODIFY `id_situacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sub_regiao`
--
ALTER TABLE `sub_regiao`
  MODIFY `id_sub_regiao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
