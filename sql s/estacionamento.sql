-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Fev-2018 às 14:26
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estacionamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `andar`
--

CREATE TABLE `andar` (
  `id_andar` int(11) NOT NULL,
  `descricao_andar` varchar(200) NOT NULL,
  `data_atualizacao_andar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_andar` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `andar`
--

INSERT INTO `andar` (`id_andar`, `descricao_andar`, `data_atualizacao_andar`, `usuario_id`, `bool_ativo_andar`) VALUES
(1, '1° Andar', '2018-02-07 17:31:27', 1, 1),
(2, '2° Andar', '2018-02-07 17:26:56', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_acesso`
--

CREATE TABLE `nivel_acesso` (
  `id_nivel_acesso` int(11) NOT NULL,
  `descricao_nivel_acesso` varchar(200) NOT NULL,
  `area_nivel_acesso` text NOT NULL,
  `data_atualizacao_nivel_acesso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_nivel_acesso` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nivel_acesso`
--

INSERT INTO `nivel_acesso` (`id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES
(1, 'Nivel Administrador', 'andar+reserva+vagas+vagas-andar+upload+mapa+mov+pdf+notif+usuario', '2018-02-07 17:25:54', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id_notificacoes` int(11) NOT NULL,
  `descricao_notificacoes` text NOT NULL,
  `usuario_atuador_notificacoes` varchar(200) NOT NULL,
  `usuaio_requerente_notificacoes` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes` enum('i','u','d') NOT NULL,
  `notificacoes_config_id` int(200) NOT NULL,
  `bool_view_notificacoes` int(1) NOT NULL,
  `data_atualizacao_notificacoes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_notificacoes` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes_config`
--

CREATE TABLE `notificacoes_config` (
  `id_notificacoes_config` int(11) NOT NULL,
  `area_notificacoes_config` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes_config` varchar(50) NOT NULL,
  `data_atualizacao_notificacoes_config` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_notificacoes_config` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes_pendentes`
--

CREATE TABLE `notificacoes_pendentes` (
  `id_notificacoes_pendentes` int(11) NOT NULL,
  `descricao_notificacoes_pendentes` text NOT NULL,
  `usuario_atuador_notificacoes_pendentes` varchar(200) NOT NULL,
  `usuaio_requerente_notificacoes_pendentes` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes_pendentes` enum('i','u','d') NOT NULL,
  `notificacoes_config_id` int(200) NOT NULL,
  `data_atualizacao_notificacoes_pendentes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_notificacoes_pendentes` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes_salvas`
--

CREATE TABLE `notificacoes_salvas` (
  `id_notificacoes_salvas` int(11) NOT NULL,
  `descricao_notificacoes_salvas` text NOT NULL,
  `usuario_atuador_notificacoes_salvas` varchar(200) NOT NULL,
  `usuaio_requerente_notificacoes_salvas` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes_salvas` enum('i','u','d') NOT NULL,
  `notificacoes_config_id` int(200) NOT NULL,
  `data_atualizacao_notificacoes_salvas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_notificacoes_salvas` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorios`
--

CREATE TABLE `relatorios` (
  `id_relatorios` int(11) NOT NULL,
  `descricao_relatorios` varchar(200) NOT NULL,
  `tabela_relatorios` varchar(200) NOT NULL,
  `colunas_relatorios` text NOT NULL,
  `colunas_estrangeiras_relatorios` text NOT NULL,
  `colunas_filtro_relatorios` text,
  `bool_filtro_ativo_relatorios` int(1) NOT NULL DEFAULT '1',
  `data_atualizacao_relatorios` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_emitir_relatorios` int(1) NOT NULL DEFAULT '0',
  `bool_ativo_relatorios` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio_tabela`
--

CREATE TABLE `relatorio_tabela` (
  `id_relatorio_tabela` int(11) NOT NULL,
  `descricao_relatorio_tabela` varchar(200) NOT NULL,
  `data_atualizacao_relatorio_tabela` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_relatorio_tabela` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `relatorio_tabela`
--

INSERT INTO `relatorio_tabela` (`id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES
(1, 'andar', '2018-02-07 17:33:19', 1),
(2, 'reserva', '2018-02-07 17:33:19', 1),
(3, 'vagas', '2018-02-07 17:33:19', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `motivo_reserva` varchar(200) NOT NULL,
  `vagas_id` int(200) NOT NULL,
  `data_atualizacao_reserva` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_reserva` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `motivo_reserva`, `vagas_id`, `data_atualizacao_reserva`, `usuario_id`, `bool_ativo_reserva`) VALUES
(1, 'Teste', 1, '2018-02-07 17:32:41', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `upload_arq`
--

CREATE TABLE `upload_arq` (
  `id_upload_arq` int(11) NOT NULL,
  `descricao_upload_arq` varchar(100) NOT NULL,
  `tipo_upload_arq` varchar(100) NOT NULL,
  `data_atualizacaoupload_arq` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_upload_arq` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(200) DEFAULT NULL,
  `login_usuario` char(3) DEFAULT NULL,
  `senha_usuario` varchar(100) DEFAULT NULL,
  `nivel_acesso_id` int(11) NOT NULL DEFAULT '1',
  `bool_ativo_usuario` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES
(1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1),
(2, 'SITE', 'SIT', '*C737C0A2F678ACBE092353610475CC003320E65E', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id_vagas` int(11) NOT NULL,
  `codigo_vaga_vagas` varchar(20) NOT NULL,
  `placa_veiculo_vagas` varchar(20) DEFAULT NULL,
  `tipo_veiculo_vagas` enum('Nenhum','Carro','Moto') DEFAULT NULL,
  `status_vagas` enum('Disponível','Ocupado','Reservado') NOT NULL,
  `andar_id` int(11) NOT NULL,
  `data_atualizacao_vagas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_vagas` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id_vagas`, `codigo_vaga_vagas`, `placa_veiculo_vagas`, `tipo_veiculo_vagas`, `status_vagas`, `andar_id`, `data_atualizacao_vagas`, `usuario_id`, `bool_ativo_vagas`) VALUES
(1, 'A1', '', 'Nenhum', 'Reservado', 1, '2018-02-07 17:34:38', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `andar`
--
ALTER TABLE `andar`
  ADD PRIMARY KEY (`id_andar`),
  ADD KEY `fk_andar<>usuario` (`usuario_id`);

--
-- Indexes for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD PRIMARY KEY (`id_nivel_acesso`),
  ADD KEY `fk_nivel_acesso<>usuario` (`usuario_id`);

--
-- Indexes for table `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id_notificacoes`),
  ADD KEY `fk_notificacoes<>notificacoes_config` (`notificacoes_config_id`);

--
-- Indexes for table `notificacoes_config`
--
ALTER TABLE `notificacoes_config`
  ADD PRIMARY KEY (`id_notificacoes_config`),
  ADD KEY `fk_notificacoes_config<>usuario` (`usuario_id`);

--
-- Indexes for table `notificacoes_pendentes`
--
ALTER TABLE `notificacoes_pendentes`
  ADD PRIMARY KEY (`id_notificacoes_pendentes`),
  ADD KEY `fk_notificacoes_pendentes<>notificacoes_config` (`notificacoes_config_id`);

--
-- Indexes for table `notificacoes_salvas`
--
ALTER TABLE `notificacoes_salvas`
  ADD PRIMARY KEY (`id_notificacoes_salvas`),
  ADD KEY `fk_notificacoes_salvas<>notificacoes_config` (`notificacoes_config_id`);

--
-- Indexes for table `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`id_relatorios`);

--
-- Indexes for table `relatorio_tabela`
--
ALTER TABLE `relatorio_tabela`
  ADD PRIMARY KEY (`id_relatorio_tabela`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `fk_reserva<>usuario` (`usuario_id`),
  ADD KEY `fk_reserva<>vagas` (`vagas_id`);

--
-- Indexes for table `upload_arq`
--
ALTER TABLE `upload_arq`
  ADD PRIMARY KEY (`id_upload_arq`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `Login` (`login_usuario`),
  ADD KEY `fk_usuario<>nivel_acesso` (`nivel_acesso_id`);

--
-- Indexes for table `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id_vagas`),
  ADD KEY `fk_vagas<>usuario` (`usuario_id`),
  ADD KEY `fk_vagas<>andar` (`andar_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `andar`
--
ALTER TABLE `andar`
  MODIFY `id_andar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  MODIFY `id_nivel_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id_notificacoes` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notificacoes_config`
--
ALTER TABLE `notificacoes_config`
  MODIFY `id_notificacoes_config` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notificacoes_pendentes`
--
ALTER TABLE `notificacoes_pendentes`
  MODIFY `id_notificacoes_pendentes` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notificacoes_salvas`
--
ALTER TABLE `notificacoes_salvas`
  MODIFY `id_notificacoes_salvas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id_relatorios` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relatorio_tabela`
--
ALTER TABLE `relatorio_tabela`
  MODIFY `id_relatorio_tabela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `upload_arq`
--
ALTER TABLE `upload_arq`
  MODIFY `id_upload_arq` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id_vagas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `andar`
--
ALTER TABLE `andar`
  ADD CONSTRAINT `fk_andar<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD CONSTRAINT `fk_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD CONSTRAINT `fk_notificacoes<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);

--
-- Limitadores para a tabela `notificacoes_config`
--
ALTER TABLE `notificacoes_config`
  ADD CONSTRAINT `fk_notificacoes_config<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `notificacoes_pendentes`
--
ALTER TABLE `notificacoes_pendentes`
  ADD CONSTRAINT `fk_notificacoes_pendentes<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);

--
-- Limitadores para a tabela `notificacoes_salvas`
--
ALTER TABLE `notificacoes_salvas`
  ADD CONSTRAINT `fk_notificacoes_salvas<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reserva<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_reserva<>vagas` FOREIGN KEY (`vagas_id`) REFERENCES `vagas` (`id_vagas`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`);

--
-- Limitadores para a tabela `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `fk_vagas<>andar` FOREIGN KEY (`andar_id`) REFERENCES `andar` (`id_andar`),
  ADD CONSTRAINT `fk_vagas<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
