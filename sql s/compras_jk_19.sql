-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Maio-2018 às 22:52
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compras_jk_19`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_nivel_acesso`
--

CREATE TABLE `area_nivel_acesso` (
  `id_area_nivel_acesso` int(11) NOT NULL,
  `area_area_nivel_acesso` varchar(200) NOT NULL,
  `demostrativo_area_nivel_acesso` varchar(200) NOT NULL,
  `bool_list_area_nivel_acesso` int(1) NOT NULL DEFAULT '1',
  `bool_insert_area_nivel_acesso` int(1) NOT NULL DEFAULT '1',
  `bool_update_area_nivel_acesso` int(1) NOT NULL DEFAULT '1',
  `nivel_acesso_id` int(11) NOT NULL,
  `data_atualizacao_area_nivel_acesso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_area_nivel_acesso` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `area_nivel_acesso`
--

INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
(72, 'grupo', 'Grupo', 1, 1, 1, 1, '2018-05-21 14:57:23', 1, 1),
(73, 'item', 'Item', 1, 1, 1, 1, '2018-05-21 14:57:24', 1, 1),
(74, 'lanc_preco', 'Lanc Preco', 1, 1, 1, 1, '2018-05-21 14:57:25', 1, 1),
(75, 'marca', 'Marca', 1, 1, 1, 1, '2018-05-21 14:57:25', 1, 1),
(76, 'orcamento', 'Orçamento', 1, 1, 1, 1, '2018-05-21 14:57:25', 1, 1),
(77, 'supermercado', 'Supermercado', 1, 1, 1, 1, '2018-05-21 14:57:25', 1, 1),
(78, 'orcamento_item-orcamento', 'Orçamento Item - Orçamento', 1, 1, 1, 1, '2018-05-21 14:57:25', 1, 1),
(79, 'item-grupo', 'Item - Grupo', 1, 1, 1, 1, '2018-05-21 14:57:25', 1, 1),
(80, 'upload', 'Upload', 1, 1, 1, 1, '2018-05-21 14:57:25', 1, 1),
(81, 'mapa', 'Mapa', 1, 1, 1, 1, '2018-05-21 14:57:26', 1, 1),
(82, 'mov', 'Mov', 1, 1, 1, 1, '2018-05-21 14:57:26', 1, 1),
(83, 'relatorio', 'Relatório', 1, 1, 1, 1, '2018-05-21 14:57:26', 1, 1),
(84, 'notificacao', 'Notificação', 1, 1, 1, 1, '2018-05-21 14:57:27', 1, 1),
(85, 'usuario', 'Usuário', 1, 1, 1, 1, '2018-05-21 14:57:27', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `descricao_grupo` varchar(200) NOT NULL,
  `data_atualizacao_grupo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_grupo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES
(1, 'Bebidas', '2018-05-21 14:38:24', 1, 1),
(2, 'Comidas', '2018-05-21 14:38:36', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `descricao_item` varchar(200) NOT NULL,
  `grupo_id` int(200) NOT NULL,
  `data_atualizacao_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_item` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id_item`, `descricao_item`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES
(1, 'Leite 1Lt', 1, '2018-05-21 14:39:41', 1, 1),
(2, 'Achocolatado em pó', 2, '2018-05-21 14:40:55', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lanc_preco`
--

CREATE TABLE `lanc_preco` (
  `id_lanc_preco` int(11) NOT NULL,
  `supermercado_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `marca_id` int(11) DEFAULT NULL,
  `preco_lanc_preco` float NOT NULL,
  `data_atualizacao_lanc_preco` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_lanc_preco` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lanc_preco`
--

INSERT INTO `lanc_preco` (`id_lanc_preco`, `supermercado_id`, `item_id`, `marca_id`, `preco_lanc_preco`, `data_atualizacao_lanc_preco`, `usuario_id`, `bool_ativo_lanc_preco`) VALUES
(1, 1, 2, 3, 5.6, '2018-05-21 14:52:10', 1, 1),
(2, 2, 1, 1, 2.6, '2018-05-21 14:52:26', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `descricao_marca` varchar(200) NOT NULL,
  `data_atualizacao_marca` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_marca` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES
(1, 'Quatá', '2018-05-21 14:38:55', 1, 1),
(2, 'Itambé', '2018-05-21 14:39:07', 1, 1),
(3, 'Nescal', '2018-05-21 14:39:13', 1, 1),
(4, 'Tody', '2018-05-21 14:39:19', 1, 1);

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
(1, 'Nivel Administrador', 'grupo+item+lanc_preco+marca+orcamento+supermercado+orcamento_item-orcamento+item-grupo+upload+mapa+mov+relatorio+notificacao+usuario', '2018-05-21 14:50:13', 1, 1);

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
  `tipo_alteracao_notificacoes_config` varchar(100) NOT NULL,
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
  `tipo_alteracao_notificacoes_salvas` varchar(50) NOT NULL,
  `notificacoes_config_id` int(200) NOT NULL,
  `data_atualizacao_notificacoes_salvas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_notificacoes_salvas` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `id_orcamento` int(11) NOT NULL,
  `emissao_orcamento` datetime DEFAULT CURRENT_TIMESTAMP,
  `descricao_orcamento` varchar(200) DEFAULT NULL,
  `data_atualizacao_orcamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_orcamento` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`id_orcamento`, `emissao_orcamento`, `descricao_orcamento`, `data_atualizacao_orcamento`, `usuario_id`, `bool_ativo_orcamento`) VALUES
(1, '2018-05-21 14:52:56', 'Compras mês 05-2018', '2018-05-21 14:52:56', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento_item`
--

CREATE TABLE `orcamento_item` (
  `id_orcamento_item` int(11) NOT NULL,
  `supermercado_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `marca_id` int(11) DEFAULT NULL,
  `quantidade_orcamento_item` float NOT NULL,
  `preco_orcamento_item` float NOT NULL,
  `total_orcamento_item` float NOT NULL,
  `orcamento_id` int(11) DEFAULT NULL,
  `data_atualizacao_orcamento_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_orcamento_item` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orcamento_item`
--

INSERT INTO `orcamento_item` (`id_orcamento_item`, `supermercado_id`, `item_id`, `marca_id`, `quantidade_orcamento_item`, `preco_orcamento_item`, `total_orcamento_item`, `orcamento_id`, `data_atualizacao_orcamento_item`, `usuario_id`, `bool_ativo_orcamento_item`) VALUES
(4, 1, 1, 1, 12, 2.6, 31.2, 1, '2018-05-21 14:59:20', 1, 1),
(5, 2, 2, 3, 1, 5.6, 5.6, 1, '2018-05-21 14:59:38', 1, 1);

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `supermercado`
--

CREATE TABLE `supermercado` (
  `id_supermercado` int(11) NOT NULL,
  `descricao_supermercado` varchar(200) NOT NULL,
  `data_atualizacao_supermercado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_supermercado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `supermercado`
--

INSERT INTO `supermercado` (`id_supermercado`, `descricao_supermercado`, `data_atualizacao_supermercado`, `usuario_id`, `bool_ativo_supermercado`) VALUES
(1, 'Bretas', '2018-05-21 14:45:51', 1, 1),
(2, 'Fonceca', '2018-05-21 14:45:55', 1, 1),
(3, 'San Michael', '2018-05-21 14:46:07', 1, 1),
(4, 'Super Vale', '2018-05-21 14:46:19', 1, 1),
(5, 'Almeida', '2018-05-21 14:46:33', 1, 1);

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
(1, 'Administrador', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1),
(2, 'SITE', 'SIT', '*C737C0A2F678ACBE092353610475CC003320E65E', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_nivel_acesso`
--
ALTER TABLE `area_nivel_acesso`
  ADD PRIMARY KEY (`id_area_nivel_acesso`),
  ADD KEY `fk_area_nivel_acesso<>usuario` (`usuario_id`),
  ADD KEY `fk_area_nivel_acesso<>nivel_acesso` (`nivel_acesso_id`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `fk_grupo<>usuario` (`usuario_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_item<>usuario` (`usuario_id`),
  ADD KEY `fk_item<>grupo` (`grupo_id`);

--
-- Indexes for table `lanc_preco`
--
ALTER TABLE `lanc_preco`
  ADD PRIMARY KEY (`id_lanc_preco`),
  ADD KEY `fk_lanc_preco<>usuario` (`usuario_id`),
  ADD KEY `fk_lanc_preco<>item` (`item_id`),
  ADD KEY `fk_lanc_preco<>supermercado` (`supermercado_id`),
  ADD KEY `fk_lanc_preco<>marca` (`marca_id`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`),
  ADD KEY `fk_marca<>usuario` (`usuario_id`);

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
-- Indexes for table `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`id_orcamento`),
  ADD KEY `fk_orcamento<>usuario` (`usuario_id`);

--
-- Indexes for table `orcamento_item`
--
ALTER TABLE `orcamento_item`
  ADD PRIMARY KEY (`id_orcamento_item`),
  ADD KEY `fk_orcamento_item<>usuario` (`usuario_id`),
  ADD KEY `fk_orcamento_item<>item` (`item_id`),
  ADD KEY `fk_orcamento_item<>supermercado` (`supermercado_id`),
  ADD KEY `fk_orcamento_item<>marca` (`marca_id`),
  ADD KEY `fk_orcamento_item<>orcamento` (`orcamento_id`);

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
-- Indexes for table `supermercado`
--
ALTER TABLE `supermercado`
  ADD PRIMARY KEY (`id_supermercado`),
  ADD KEY `fk_supermercado<>usuario` (`usuario_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_nivel_acesso`
--
ALTER TABLE `area_nivel_acesso`
  MODIFY `id_area_nivel_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lanc_preco`
--
ALTER TABLE `lanc_preco`
  MODIFY `id_lanc_preco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `id_orcamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orcamento_item`
--
ALTER TABLE `orcamento_item`
  MODIFY `id_orcamento_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id_relatorios` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relatorio_tabela`
--
ALTER TABLE `relatorio_tabela`
  MODIFY `id_relatorio_tabela` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supermercado`
--
ALTER TABLE `supermercado`
  MODIFY `id_supermercado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `area_nivel_acesso`
--
ALTER TABLE `area_nivel_acesso`
  ADD CONSTRAINT `fk_area_nivel_acesso<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`),
  ADD CONSTRAINT `fk_area_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `fk_grupo<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item<>grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id_grupo`),
  ADD CONSTRAINT `fk_item<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `lanc_preco`
--
ALTER TABLE `lanc_preco`
  ADD CONSTRAINT `fk_lanc_preco<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `fk_lanc_preco<>marca` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `fk_lanc_preco<>supermercado` FOREIGN KEY (`supermercado_id`) REFERENCES `supermercado` (`id_supermercado`),
  ADD CONSTRAINT `fk_lanc_preco<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `fk_marca<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

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
-- Limitadores para a tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD CONSTRAINT `fk_orcamento<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `orcamento_item`
--
ALTER TABLE `orcamento_item`
  ADD CONSTRAINT `fk_orcamento_item<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `fk_orcamento_item<>marca` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `fk_orcamento_item<>orcamento` FOREIGN KEY (`orcamento_id`) REFERENCES `orcamento` (`id_orcamento`),
  ADD CONSTRAINT `fk_orcamento_item<>supermercado` FOREIGN KEY (`supermercado_id`) REFERENCES `supermercado` (`id_supermercado`),
  ADD CONSTRAINT `fk_orcamento_item<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `supermercado`
--
ALTER TABLE `supermercado`
  ADD CONSTRAINT `fk_supermercado<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
