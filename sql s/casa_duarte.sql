-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Abr-2018 às 14:07
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casa_duarte`
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
(20, 'bairro', 'Bairro', 1, 1, 1, 1, '2018-04-19 13:42:36', 1, 1),
(21, 'caminhao', 'Caminhao', 1, 1, 1, 1, '2018-04-19 13:42:36', 1, 1),
(22, 'cliente', 'Cliente', 1, 1, 1, 1, '2018-04-19 13:42:36', 1, 1),
(23, 'geocodificacao', 'Geocodificacao', 1, 1, 1, 1, '2018-04-19 13:42:36', 1, 1),
(24, 'item', 'Item', 1, 1, 1, 1, '2018-04-19 13:42:36', 1, 1),
(25, 'motorista', 'Motorista', 1, 1, 1, 1, '2018-04-19 13:42:37', 1, 1),
(26, 'pedido', 'Pedido', 1, 1, 1, 1, '2018-04-19 13:42:37', 1, 1),
(27, 'regiao', 'Regiao', 1, 1, 1, 1, '2018-04-19 13:42:37', 1, 1),
(28, 'viagem', 'Viagem', 1, 1, 1, 1, '2018-04-19 13:42:37', 1, 1),
(29, 'viagem_item-viagem', 'Viagem Item - Viagem', 1, 1, 1, 1, '2018-04-19 13:42:37', 1, 1),
(30, 'pedido_item-pedido', 'Pedido Item - Pedido', 1, 1, 1, 1, '2018-04-19 13:42:38', 1, 1),
(31, 'bairro-regiao', 'Bairro - Regiao', 1, 1, 1, 1, '2018-04-19 13:42:38', 1, 1),
(32, 'cliente_contato-cliente', 'Cliente Contato - Cliente', 1, 1, 1, 1, '2018-04-19 13:42:38', 1, 1),
(33, 'upload', 'Upload', 1, 1, 1, 1, '2018-04-19 13:42:38', 1, 1),
(34, 'mapa', 'Mapa', 1, 1, 1, 1, '2018-04-19 13:42:39', 1, 1),
(35, 'mov', 'Mov', 1, 1, 1, 1, '2018-04-19 13:42:39', 1, 1),
(36, 'relatorio', 'Relatório', 1, 1, 1, 1, '2018-04-19 13:42:39', 1, 1),
(37, 'notificacao', 'Notificação', 1, 1, 1, 1, '2018-04-19 13:42:39', 1, 1),
(38, 'usuario', 'Usuário', 1, 1, 1, 1, '2018-04-19 13:42:39', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro`
--

CREATE TABLE `bairro` (
  `id_bairro` int(11) NOT NULL,
  `descricao_bairro` varchar(100) NOT NULL,
  `lat_lng_bairro` varchar(100) NOT NULL,
  `raio_bairro` float NOT NULL,
  `regiao_id` int(11) DEFAULT NULL,
  `data_atualizacao_bairro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_bairro` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bairro`
--

INSERT INTO `bairro` (`id_bairro`, `descricao_bairro`, `lat_lng_bairro`, `raio_bairro`, `regiao_id`, `data_atualizacao_bairro`, `usuario_id`, `bool_ativo_bairro`) VALUES
(1, 'Jardim Quisisana', '-21.800467435696685,-46.56580924987793', 500, 4, '2018-04-11 16:29:37', 1, 1),
(2, 'Centro', '-21.78628150090536,-46.5695858001709', 500, 4, '2018-04-11 16:29:41', 1, 1),
(3, 'São José', '-21.809472384508748,-46.56949996948242', 500, 4, '2018-04-11 16:29:43', 1, 1),
(6, 'São Sebastião', '-21.856878477140818,-46.569929122924805', 500, 2, '2018-04-11 16:48:05', 1, 1),
(7, 'Jardim Kennedy', '-21.84142342746937,-46.5779972076416', 500, 2, '2018-04-11 16:49:16', 1, 1),
(8, 'Jardim Country Club', '-21.797917258830815,-46.61421775817871', 500, 3, '2018-04-11 16:50:34', 1, 1),
(9, 'Jardim Campos Elisios', '-21.798475113899347,-46.50795936584473', 500, 1, '2018-04-11 16:51:23', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `caminhao`
--

CREATE TABLE `caminhao` (
  `id_caminhao` int(11) NOT NULL,
  `placa_caminhao` varchar(10) NOT NULL,
  `latitude_caminhao` varchar(100) NOT NULL,
  `longitude_caminhao` varchar(100) NOT NULL,
  `bool_disponivel_caminhao` int(1) NOT NULL DEFAULT '0',
  `data_atualizacao_caminhao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_caminhao` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `caminhao`
--

INSERT INTO `caminhao` (`id_caminhao`, `placa_caminhao`, `latitude_caminhao`, `longitude_caminhao`, `bool_disponivel_caminhao`, `data_atualizacao_caminhao`, `usuario_id`, `bool_ativo_caminhao`) VALUES
(1, 'AAA-1234', '-21.7790371', '-46.5692484', 1, '2018-04-19 16:55:51', 1, 1),
(2, 'BBB-1234', '-21.7790371', '-46.5692484', 1, '2018-04-10 17:33:08', 1, 1),
(3, 'CCC-9999', '-21.79582030204647', '-46.520699858665466', 1, '2018-04-09 14:14:20', 1, 1),
(4, 'DDD-9999', '-21.799232199446397', '-46.51482582092285', 1, '2018-04-09 14:14:22', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(200) NOT NULL,
  `data_atualizacao_cliente` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_cliente` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `data_atualizacao_cliente`, `usuario_id`, `bool_ativo_cliente`) VALUES
(1, 'Jack Biller', '2018-04-12 17:13:06', 1, 1),
(2, 'Cliente 2', '2018-04-12 17:15:23', 1, 1),
(3, 'Cliente 3', '2018-04-12 17:15:28', 1, 1),
(4, 'Cliente 4', '2018-04-12 17:15:35', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_contato`
--

CREATE TABLE `cliente_contato` (
  `id_cliente_contato` int(11) NOT NULL,
  `telefone_cliente_contato` varchar(200) NOT NULL,
  `cliente_id` int(200) NOT NULL,
  `data_atualizacao_cliente_contato` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_cliente_contato` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente_contato`
--

INSERT INTO `cliente_contato` (`id_cliente_contato`, `telefone_cliente_contato`, `cliente_id`, `data_atualizacao_cliente_contato`, `usuario_id`, `bool_ativo_cliente_contato`) VALUES
(1, '9999-9999', 1, '2018-04-12 17:14:57', 1, 1),
(2, '9991-9991', 1, '2018-04-12 17:15:10', 1, 1),
(3, '9999-9999', 2, '2018-04-12 17:16:06', 1, 1),
(4, '9999-9999', 3, '2018-04-12 17:16:17', 1, 1),
(5, '9999-9999', 4, '2018-04-12 17:16:27', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `geocodificacao`
--

CREATE TABLE `geocodificacao` (
  `id_geocodificacao` int(11) NOT NULL,
  `endereco_geocodificacao` varchar(200) NOT NULL,
  `numero_geocodificacao` int(11) NOT NULL,
  `cep_geocodificacao` varchar(20) NOT NULL,
  `cidade_geocodificacao` varchar(200) NOT NULL,
  `latitude_geocodificacao` varchar(200) DEFAULT NULL,
  `longitude_geocodificacao` varchar(200) DEFAULT NULL,
  `data_atualizacao_geocodificacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_geocodificacao` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `geocodificacao`
--

INSERT INTO `geocodificacao` (`id_geocodificacao`, `endereco_geocodificacao`, `numero_geocodificacao`, `cep_geocodificacao`, `cidade_geocodificacao`, `latitude_geocodificacao`, `longitude_geocodificacao`, `data_atualizacao_geocodificacao`, `usuario_id`, `bool_ativo_geocodificacao`) VALUES
(1, 'assis figueredo', 260, '37701000', 'poços de caldas', '-21.780565', '-46.565024', '2018-04-19 15:25:01', 1, 1),
(2, 'dovilio taconi', 150, '37701253', 'poços de caldas', '-21.798659', '-46.56933', '2018-04-19 15:24:26', 1, 1),
(3, 'dovilio taconi', 150, '37701253', 'poços de caldas', '-21.798659', '-46.56933', '2018-04-19 15:25:01', 1, 1),
(4, 'dovilio taconi', 150, '37701253', 'poços de caldas', '-21.798659', '-46.56933', '2018-04-19 16:13:25', 1, 1),
(5, 'dovilio taconi', 150, '37701253', 'poços de caldas', '-21.798659', '-46.56933', '2018-04-19 16:13:25', 1, 1),
(6, 'dovilio taconi', 150, '37701253', 'poços de caldas', '-21.798659', '-46.56933', '2018-04-19 17:58:27', 1, 1),
(7, 'dovilio taconi', 150, '37701253', 'poços de caldas', '-21.798659', '-46.56933', '2018-04-19 16:16:29', 1, 1),
(8, 'assis figueredo', 210, '37701000', 'poços de caldas', '-21.780157', '-46.564955', '2018-04-19 16:29:31', 1, 1),
(9, 'dovilio taconi', 150, '37701253', 'poços de caldas', '-21.798659', '-46.56933', '2018-04-19 16:30:01', 1, 1),
(10, 'pernambuco', 679, '37701279', 'poços de caldas', '-21.7843562', '-46.5668704', '2018-04-19 16:31:01', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_tragetoria`
--

CREATE TABLE `historico_tragetoria` (
  `id_historico_tragetoria` int(11) NOT NULL,
  `localizacao_historico_tragetoria` varchar(100) NOT NULL,
  `caminhao_id` int(11) NOT NULL,
  `viagem_simples_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `data_atualizacao_historico_tragetoria` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_historico_tragetoria` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `descricao_item` varchar(200) NOT NULL,
  `data_atualizacao_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_item` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id_item`, `descricao_item`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES
(1, 'Areia', '2018-04-02 09:46:17', 1, 1),
(2, 'Cimento', '2018-04-02 09:46:21', 1, 1),
(3, 'Pedra Brita', '2018-04-02 09:46:32', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorista`
--

CREATE TABLE `motorista` (
  `id_motorista` int(11) NOT NULL,
  `nome_motorista` varchar(100) NOT NULL,
  `login_motorista` varchar(100) NOT NULL,
  `senha_motorista` varchar(100) NOT NULL,
  `data_atualizacao_motorista` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_motorista` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `motorista`
--

INSERT INTO `motorista` (`id_motorista`, `nome_motorista`, `login_motorista`, `senha_motorista`, `data_atualizacao_motorista`, `usuario_id`, `bool_ativo_motorista`) VALUES
(1, 'Fulando', 'mo1', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2018-04-11 09:46:15', 1, 1),
(2, 'Fulando 2', 'mo2', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2018-04-11 09:46:15', 1, 1),
(5, 'Fulando  3', 'mo3', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2018-04-11 09:46:15', 1, 1),
(6, 'Fulando  4', 'mo4', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2018-04-11 09:46:15', 1, 1);

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
(1, 'Nivel Administrador', 'bairro+caminhao+cliente+geocodificacao+item+motorista+pedido+regiao+viagem+viagem_item-viagem+pedido_item-pedido+bairro-regiao+cliente_contato-cliente+upload+mapa+mov+relatorio+notificacao+usuario', '2018-04-19 10:58:58', 1, 1);

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

--
-- Extraindo dados da tabela `notificacoes_config`
--

INSERT INTO `notificacoes_config` (`id_notificacoes_config`, `area_notificacoes_config`, `tipo_alteracao_notificacoes_config`, `data_atualizacao_notificacoes_config`, `usuario_id`, `bool_ativo_notificacoes_config`) VALUES
(1, 'pedido_item-pedido', 'I+U', '2018-04-02 09:56:01', 1, 1);

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

--
-- Extraindo dados da tabela `notificacoes_salvas`
--

INSERT INTO `notificacoes_salvas` (`id_notificacoes_salvas`, `descricao_notificacoes_salvas`, `usuario_atuador_notificacoes_salvas`, `usuaio_requerente_notificacoes_salvas`, `tipo_alteracao_notificacoes_salvas`, `notificacoes_config_id`, `data_atualizacao_notificacoes_salvas`, `bool_ativo_notificacoes_salvas`) VALUES
(1, '<b>Aréa de Atuação: </b>pedido_item-pedido<br><b>Registro inserido:</b><br>Item => /%/SELECT * FROM item WHERE id_item = 1/%/<br>Quantidade => 15<br>Valor Unitário => 250<br>Total => 3750<br>Pedido => /%/SELECT * FROM pedido WHERE id_pedido = 1/%/<br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => Sim<br>', '1', '1', 'i', 1, '2018-04-14 08:28:12', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `parametro`
--

CREATE TABLE `parametro` (
  `id_parametro` int(11) NOT NULL,
  `ip_parametro` varchar(20) DEFAULT NULL,
  `porta_parametro` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `parametro`
--

INSERT INTO `parametro` (`id_parametro`, `ip_parametro`, `porta_parametro`) VALUES
(1, '192.168.100.15', '8088');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `documento_pedido` varchar(6) NOT NULL,
  `filila_pedido` int(11) NOT NULL,
  `total_pedido` float NOT NULL,
  `data_atualizacao_pedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_pedido` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `documento_pedido`, `filila_pedido`, `total_pedido`, `data_atualizacao_pedido`, `usuario_id`, `bool_ativo_pedido`) VALUES
(1, '003596', 10, 150, '2018-04-02 09:48:35', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_item`
--

CREATE TABLE `pedido_item` (
  `id_pedido_item` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantidade_pedido_item` float NOT NULL,
  `valor_unitario_pedido_item` float NOT NULL,
  `total_pedido_item` float NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `data_atualizacao_pedido_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_pedido_item` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido_item`
--

INSERT INTO `pedido_item` (`id_pedido_item`, `item_id`, `quantidade_pedido_item`, `valor_unitario_pedido_item`, `total_pedido_item`, `pedido_id`, `data_atualizacao_pedido_item`, `usuario_id`, `bool_ativo_pedido_item`) VALUES
(1, 1, 2, 250, 500, 1, '2018-04-02 09:51:15', 1, 1),
(2, 2, 15, 21, 315, 1, '2018-04-02 09:51:33', 1, 1),
(3, 1, 3, 150, 450, 1, '2018-04-02 09:52:00', 1, 1),
(4, 1, 15, 250, 3750, 1, '2018-04-02 09:56:21', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `regiao`
--

CREATE TABLE `regiao` (
  `id_regiao` int(11) NOT NULL,
  `descricao_regiao` varchar(100) NOT NULL,
  `lat_lng_regiao` varchar(100) NOT NULL,
  `raio_regiao` float NOT NULL,
  `usuario_id` int(11) NOT NULL DEFAULT '1',
  `data_atualizacao_regiao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_regiao` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `regiao`
--

INSERT INTO `regiao` (`id_regiao`, `descricao_regiao`, `lat_lng_regiao`, `raio_regiao`, `usuario_id`, `data_atualizacao_regiao`, `bool_ativo_regiao`) VALUES
(1, 'Zona Leste', '-21.802698803212827,-46.5080451965332', 3000, 1, '2018-04-11 16:54:38', 1),
(2, 'Zona Sul', '-21.839112992942866,-46.56924247741699', 3000, 1, '2018-04-11 16:54:38', 1),
(3, 'Zona Oeste', '-21.780224157182847,-46.60572052001953', 2500, 1, '2018-04-11 16:54:38', 1),
(4, 'Zona Centro', '-21.789509322959844,-46.5615177154541', 2500, 1, '2018-04-11 16:54:38', 1);

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
-- Estrutura da tabela `viagem`
--

CREATE TABLE `viagem` (
  `id_viagem` int(11) NOT NULL,
  `endereco_incial_viagem` varchar(200) NOT NULL,
  `endereco_final_viagem` varchar(200) NOT NULL,
  `caminhao_id` int(11) NOT NULL,
  `motorista_id` int(11) NOT NULL,
  `data_atualizacao_viagem` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_viagem` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `viagem`
--

INSERT INTO `viagem` (`id_viagem`, `endereco_incial_viagem`, `endereco_final_viagem`, `caminhao_id`, `motorista_id`, `data_atualizacao_viagem`, `usuario_id`, `bool_ativo_viagem`) VALUES
(1, '-21.801517634953733,-46.568141682073474', '-21.801517634953733,-46.568141682073474', 1, 1, '2018-04-02 17:45:25', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `viagem_item`
--

CREATE TABLE `viagem_item` (
  `id_viagem_item` int(11) NOT NULL,
  `endereco_viagem_item` varchar(200) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantidade_viagem_item` float NOT NULL,
  `viagem_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `data_atualizacao_viagem_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_viagem_item` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `viagem_simples`
--

CREATE TABLE `viagem_simples` (
  `id_viagem_simples` int(11) NOT NULL,
  `origem_viagem_simples` varchar(100) NOT NULL,
  `destino_viagem_simples` varchar(100) NOT NULL,
  `placa_viagem_simples` int(11) NOT NULL,
  `motorista_viagem_simples` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `viagem_simples`
--

INSERT INTO `viagem_simples` (`id_viagem_simples`, `origem_viagem_simples`, `destino_viagem_simples`, `placa_viagem_simples`, `motorista_viagem_simples`) VALUES
(1, '-21.78593779334913,-46.56324505805969', '-21.78593779334913,-46.56324505805969', 1, 1),
(2, '-21.78593779334913,-46.56324505805969', '-21.78593779334913,-46.56324505805969', 2, 2),
(3, '-21.78593779334913,-46.56324505805969', '-21.78593779334913,-46.56324505805969', 3, 5),
(4, '-21.78593779334913,-46.56324505805969', '-21.78593779334913,-46.56324505805969', 4, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `viagem_simples_item`
--

CREATE TABLE `viagem_simples_item` (
  `id_viagem_simples_item` int(11) NOT NULL,
  `localizacao_viagem_simples_item` varchar(100) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `viagem_simples_id` int(11) NOT NULL,
  `bool_confirma_entrega` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `viagem_simples_item`
--

INSERT INTO `viagem_simples_item` (`id_viagem_simples_item`, `localizacao_viagem_simples_item`, `cliente_id`, `viagem_simples_id`, `bool_confirma_entrega`) VALUES
(1, '-21.780204231287797,-46.56462907791138', 1, 1, 0),
(2, '-21.78215695584276,-46.56658172607422', 2, 1, 0),
(3, '-21.787516848796123,-46.578125953674316', 3, 2, 0),
(4, '-21.795093084212976,-46.555917263031006', 4, 2, 0),
(5, '-21.81144961216114,-46.501664221286774', 1, 3, 1),
(6, '-21.801752468555826,-46.56855717301369', 2, 2, 0);

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
-- Indexes for table `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`id_bairro`),
  ADD KEY `fk_bairro<>usuario` (`usuario_id`),
  ADD KEY `fk_bairro<>regiao` (`regiao_id`);

--
-- Indexes for table `caminhao`
--
ALTER TABLE `caminhao`
  ADD PRIMARY KEY (`id_caminhao`),
  ADD KEY `fk_caminhao<>usuario` (`usuario_id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_cliente<>usuario` (`usuario_id`);

--
-- Indexes for table `cliente_contato`
--
ALTER TABLE `cliente_contato`
  ADD PRIMARY KEY (`id_cliente_contato`),
  ADD KEY `fk_cliente_contato<>usuario` (`usuario_id`),
  ADD KEY `fk_cliente_contato<>cliente` (`cliente_id`);

--
-- Indexes for table `geocodificacao`
--
ALTER TABLE `geocodificacao`
  ADD PRIMARY KEY (`id_geocodificacao`),
  ADD KEY `fk_geocodificacao<>usuario` (`usuario_id`);

--
-- Indexes for table `historico_tragetoria`
--
ALTER TABLE `historico_tragetoria`
  ADD PRIMARY KEY (`id_historico_tragetoria`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_item<>usuario` (`usuario_id`);

--
-- Indexes for table `motorista`
--
ALTER TABLE `motorista`
  ADD PRIMARY KEY (`id_motorista`),
  ADD KEY `fk_motorista<>usuario` (`usuario_id`);

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
-- Indexes for table `parametro`
--
ALTER TABLE `parametro`
  ADD PRIMARY KEY (`id_parametro`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_pedido<>usuario` (`usuario_id`);

--
-- Indexes for table `pedido_item`
--
ALTER TABLE `pedido_item`
  ADD PRIMARY KEY (`id_pedido_item`),
  ADD KEY `fk_pedido_item<>usuario` (`usuario_id`),
  ADD KEY `fk_pedido_item<>pedido` (`pedido_id`),
  ADD KEY `fk_pedido_item<>item` (`item_id`);

--
-- Indexes for table `regiao`
--
ALTER TABLE `regiao`
  ADD PRIMARY KEY (`id_regiao`),
  ADD KEY `fk_regiao<>usuario` (`usuario_id`);

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
-- Indexes for table `viagem`
--
ALTER TABLE `viagem`
  ADD PRIMARY KEY (`id_viagem`),
  ADD KEY `fk_viagem<>usuario` (`usuario_id`),
  ADD KEY `fk_viagem<>caminhao` (`caminhao_id`),
  ADD KEY `fk_viagem<>motorista` (`motorista_id`);

--
-- Indexes for table `viagem_item`
--
ALTER TABLE `viagem_item`
  ADD PRIMARY KEY (`id_viagem_item`),
  ADD KEY `fk_viagem_item<>usuario` (`usuario_id`),
  ADD KEY `fk_viagem_item<>pedido` (`pedido_id`),
  ADD KEY `fk_viagem_item<>viagem` (`viagem_id`),
  ADD KEY `fk_viagem_item<>item` (`item_id`);

--
-- Indexes for table `viagem_simples`
--
ALTER TABLE `viagem_simples`
  ADD PRIMARY KEY (`id_viagem_simples`),
  ADD KEY `fk_viagem_simples<>caminhao` (`placa_viagem_simples`),
  ADD KEY `fk_viagem_simples<>motorista` (`motorista_viagem_simples`);

--
-- Indexes for table `viagem_simples_item`
--
ALTER TABLE `viagem_simples_item`
  ADD PRIMARY KEY (`id_viagem_simples_item`),
  ADD KEY `fk_viegem_simples_item<>viagem_simples` (`viagem_simples_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_nivel_acesso`
--
ALTER TABLE `area_nivel_acesso`
  MODIFY `id_area_nivel_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `bairro`
--
ALTER TABLE `bairro`
  MODIFY `id_bairro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `caminhao`
--
ALTER TABLE `caminhao`
  MODIFY `id_caminhao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cliente_contato`
--
ALTER TABLE `cliente_contato`
  MODIFY `id_cliente_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `geocodificacao`
--
ALTER TABLE `geocodificacao`
  MODIFY `id_geocodificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `historico_tragetoria`
--
ALTER TABLE `historico_tragetoria`
  MODIFY `id_historico_tragetoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `motorista`
--
ALTER TABLE `motorista`
  MODIFY `id_motorista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `id_notificacoes_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notificacoes_pendentes`
--
ALTER TABLE `notificacoes_pendentes`
  MODIFY `id_notificacoes_pendentes` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notificacoes_salvas`
--
ALTER TABLE `notificacoes_salvas`
  MODIFY `id_notificacoes_salvas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parametro`
--
ALTER TABLE `parametro`
  MODIFY `id_parametro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pedido_item`
--
ALTER TABLE `pedido_item`
  MODIFY `id_pedido_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `regiao`
--
ALTER TABLE `regiao`
  MODIFY `id_regiao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT for table `viagem`
--
ALTER TABLE `viagem`
  MODIFY `id_viagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `viagem_item`
--
ALTER TABLE `viagem_item`
  MODIFY `id_viagem_item` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `viagem_simples`
--
ALTER TABLE `viagem_simples`
  MODIFY `id_viagem_simples` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `viagem_simples_item`
--
ALTER TABLE `viagem_simples_item`
  MODIFY `id_viagem_simples_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
-- Limitadores para a tabela `bairro`
--
ALTER TABLE `bairro`
  ADD CONSTRAINT `fk_bairro<>regiao` FOREIGN KEY (`regiao_id`) REFERENCES `regiao` (`id_regiao`),
  ADD CONSTRAINT `fk_bairro<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `caminhao`
--
ALTER TABLE `caminhao`
  ADD CONSTRAINT `fk_caminhao<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `cliente_contato`
--
ALTER TABLE `cliente_contato`
  ADD CONSTRAINT `fk_cliente_contato<>cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `fk_cliente_contato<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `geocodificacao`
--
ALTER TABLE `geocodificacao`
  ADD CONSTRAINT `fk_geocodificacao<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `motorista`
--
ALTER TABLE `motorista`
  ADD CONSTRAINT `fk_motorista<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

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
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `pedido_item`
--
ALTER TABLE `pedido_item`
  ADD CONSTRAINT `fk_pedido_item<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `fk_pedido_item<>pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `fk_pedido_item<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `regiao`
--
ALTER TABLE `regiao`
  ADD CONSTRAINT `fk_regiao<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`);

--
-- Limitadores para a tabela `viagem`
--
ALTER TABLE `viagem`
  ADD CONSTRAINT `fk_viagem<>caminhao` FOREIGN KEY (`caminhao_id`) REFERENCES `caminhao` (`id_caminhao`),
  ADD CONSTRAINT `fk_viagem<>motorista` FOREIGN KEY (`motorista_id`) REFERENCES `motorista` (`id_motorista`),
  ADD CONSTRAINT `fk_viagem<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `viagem_item`
--
ALTER TABLE `viagem_item`
  ADD CONSTRAINT `fk_viagem_item<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `fk_viagem_item<>pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `fk_viagem_item<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_viagem_item<>viagem` FOREIGN KEY (`viagem_id`) REFERENCES `viagem` (`id_viagem`);

--
-- Limitadores para a tabela `viagem_simples`
--
ALTER TABLE `viagem_simples`
  ADD CONSTRAINT `fk_viagem_simples<>caminhao` FOREIGN KEY (`placa_viagem_simples`) REFERENCES `caminhao` (`id_caminhao`),
  ADD CONSTRAINT `fk_viagem_simples<>motorista` FOREIGN KEY (`motorista_viagem_simples`) REFERENCES `motorista` (`id_motorista`);

--
-- Limitadores para a tabela `viagem_simples_item`
--
ALTER TABLE `viagem_simples_item`
  ADD CONSTRAINT `fk_viegem_simples_item<>viagem_simples` FOREIGN KEY (`viagem_simples_id`) REFERENCES `viagem_simples` (`id_viagem_simples`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
