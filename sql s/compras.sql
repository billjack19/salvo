-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.13-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para compras_jk_19
CREATE DATABASE IF NOT EXISTS `compras_jk_19` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `compras_jk_19`;

-- Copiando estrutura para tabela compras_jk_19.area_nivel_acesso
CREATE TABLE IF NOT EXISTS `area_nivel_acesso` (
  `id_area_nivel_acesso` int(11) NOT NULL AUTO_INCREMENT,
  `area_area_nivel_acesso` varchar(200) NOT NULL,
  `demostrativo_area_nivel_acesso` varchar(200) NOT NULL,
  `bool_list_area_nivel_acesso` int(1) NOT NULL DEFAULT '1',
  `bool_insert_area_nivel_acesso` int(1) NOT NULL DEFAULT '1',
  `bool_update_area_nivel_acesso` int(1) NOT NULL DEFAULT '1',
  `nivel_acesso_id` int(11) NOT NULL,
  `data_atualizacao_area_nivel_acesso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_area_nivel_acesso` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_area_nivel_acesso`),
  KEY `fk_area_nivel_acesso<>usuario` (`usuario_id`),
  KEY `fk_area_nivel_acesso<>nivel_acesso` (`nivel_acesso_id`),
  CONSTRAINT `fk_area_nivel_acesso<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`),
  CONSTRAINT `fk_area_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.area_nivel_acesso: ~18 rows (aproximadamente)
DELETE FROM `area_nivel_acesso`;
/*!40000 ALTER TABLE `area_nivel_acesso` DISABLE KEYS */;
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(149, 'grupo', 'Grupo', 1, 1, 1, 1, '2018-07-30 15:34:47', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(150, 'item', 'Item', 1, 1, 1, 1, '2018-07-30 15:34:47', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(151, 'lanc_preco', 'Lanc Preço', 1, 1, 1, 1, '2018-07-30 15:34:47', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(152, 'marca', 'Marca', 1, 1, 1, 1, '2018-07-30 15:34:47', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(153, 'orcamento', 'Orçamento', 1, 1, 1, 1, '2018-07-30 15:34:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(154, 'pedido', 'Pedido', 1, 1, 1, 1, '2018-07-30 15:34:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(155, 'supermercado', 'Supermercado', 1, 1, 1, 1, '2018-07-30 15:34:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(156, 'orcamento_item-orcamento', 'Orçamento Item - Orçamento', 1, 1, 1, 1, '2018-07-30 15:34:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(157, 'item-grupo', 'Item - Grupo', 1, 1, 1, 1, '2018-07-30 15:34:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(158, 'compra-pedido', 'Compra - Pedido', 1, 1, 1, 1, '2018-07-30 15:34:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(159, 'compra_item-compra', 'Compra Item - Compra', 1, 1, 1, 1, '2018-07-30 15:34:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(160, 'pedido_item-pedido', 'Pedido Item - Pedido', 1, 1, 1, 1, '2018-07-30 15:34:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(161, 'upload', 'Upload', 1, 1, 1, 1, '2018-07-30 15:34:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(162, 'mapa', 'Mapa', 1, 1, 1, 1, '2018-07-30 15:34:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(163, 'mov', 'Mov', 1, 1, 1, 1, '2018-07-30 15:34:49', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(164, 'relatorio', 'Relatório', 1, 1, 1, 1, '2018-07-30 15:34:49', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(165, 'notificacao', 'Notificação', 1, 1, 1, 1, '2018-07-30 15:34:49', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(166, 'usuario', 'Usuário', 1, 1, 1, 1, '2018-07-30 15:34:49', 1, 1);
/*!40000 ALTER TABLE `area_nivel_acesso` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.compra
CREATE TABLE IF NOT EXISTS `compra` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `total_compra` float NOT NULL DEFAULT '0',
  `supermercado_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `data_atualizacao_compra` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_compra` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_compra`),
  KEY `fk_compra<>usuario` (`usuario_id`),
  KEY `fk_compra<>pedido` (`pedido_id`),
  KEY `fk_compra<>supermercado` (`supermercado_id`),
  CONSTRAINT `fk_compra<>pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id_pedido`),
  CONSTRAINT `fk_compra<>supermercado` FOREIGN KEY (`supermercado_id`) REFERENCES `supermercado` (`id_supermercado`),
  CONSTRAINT `fk_compra<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.compra: ~0 rows (aproximadamente)
DELETE FROM `compra`;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` (`id_compra`, `total_compra`, `supermercado_id`, `pedido_id`, `data_atualizacao_compra`, `usuario_id`, `bool_ativo_compra`) VALUES
	(1, 42, 1, 1, '2018-07-30 15:30:07', 1, 1);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.compra_item
CREATE TABLE IF NOT EXISTS `compra_item` (
  `id_compra_item` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_compra_item` varchar(100) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantidade_compra_item` float NOT NULL,
  `valor_unitario_compra_item` float NOT NULL,
  `total_compra_item` float NOT NULL,
  `compra_id` int(11) NOT NULL,
  `data_atualizacao_compra_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_compra_item` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_compra_item`),
  KEY `fk_compra_item<>usuario` (`usuario_id`),
  KEY `fk_compra_item<>compra` (`compra_id`),
  KEY `fk_compra_item<>item` (`item_id`),
  CONSTRAINT `fk_compra_item<>compra` FOREIGN KEY (`compra_id`) REFERENCES `compra` (`id_compra`),
  CONSTRAINT `fk_compra_item<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`),
  CONSTRAINT `fk_compra_item<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.compra_item: ~1 rows (aproximadamente)
DELETE FROM `compra_item`;
/*!40000 ALTER TABLE `compra_item` DISABLE KEYS */;
INSERT INTO `compra_item` (`id_compra_item`, `descricao_compra_item`, `item_id`, `quantidade_compra_item`, `valor_unitario_compra_item`, `total_compra_item`, `compra_id`, `data_atualizacao_compra_item`, `usuario_id`, `bool_ativo_compra_item`) VALUES
	(1, '', 4, 12, 3.5, 42, 1, '2018-07-30 15:29:46', 1, 1);
/*!40000 ALTER TABLE `compra_item` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.equivalentes
CREATE TABLE IF NOT EXISTS `equivalentes` (
  `id_equivalentes` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_equivalentes` varchar(50) NOT NULL,
  `especificacao_equivalentes` varchar(100) DEFAULT NULL,
  `item_id` int(100) NOT NULL,
  `data_atualizacao_equivalentes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_equivalentes` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_equivalentes`),
  KEY `fk_equivalentes<>usuario` (`usuario_id`),
  KEY `fk_equivalentes<>item` (`item_id`),
  CONSTRAINT `fk_equivalentes<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`),
  CONSTRAINT `fk_equivalentes<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.equivalentes: ~0 rows (aproximadamente)
DELETE FROM `equivalentes`;
/*!40000 ALTER TABLE `equivalentes` DISABLE KEYS */;
INSERT INTO `equivalentes` (`id_equivalentes`, `codigo_equivalentes`, `especificacao_equivalentes`, `item_id`, `data_atualizacao_equivalentes`, `usuario_id`, `bool_ativo_equivalentes`) VALUES
	(1, '7896020160052', 'Embalagem Azul', 6, '2018-07-26 20:27:05', 1, 1);
/*!40000 ALTER TABLE `equivalentes` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.grupo
CREATE TABLE IF NOT EXISTS `grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_grupo` varchar(200) NOT NULL,
  `data_atualizacao_grupo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_grupo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_grupo`),
  KEY `fk_grupo<>usuario` (`usuario_id`),
  CONSTRAINT `fk_grupo<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.grupo: ~2 rows (aproximadamente)
DELETE FROM `grupo`;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` (`id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES
	(1, 'Diversos', '2018-07-11 23:05:50', 1, 1);
INSERT INTO `grupo` (`id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES
	(2, 'Comidas', '2018-05-21 14:38:36', 1, 1);
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.item
CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_item` varchar(200) NOT NULL,
  `marca_id` int(11) NOT NULL,
  `quantidade_item` float NOT NULL,
  `unidade_medida_id` int(11) NOT NULL,
  `grupo_id` int(200) NOT NULL DEFAULT '1',
  `data_atualizacao_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_item` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_item`),
  KEY `fk_item<>usuario` (`usuario_id`),
  KEY `fk_item<>grupo` (`grupo_id`),
  CONSTRAINT `fk_item<>grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id_grupo`),
  CONSTRAINT `fk_item<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.item: ~6 rows (aproximadamente)
DELETE FROM `item`;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` (`id_item`, `descricao_item`, `marca_id`, `quantidade_item`, `unidade_medida_id`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES
	(1, 'Leite 1Lt', 0, 0, 0, 1, '2018-05-21 14:39:41', 1, 1);
INSERT INTO `item` (`id_item`, `descricao_item`, `marca_id`, `quantidade_item`, `unidade_medida_id`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES
	(2, 'Achocolatado em pó', 0, 0, 0, 2, '2018-05-21 14:40:55', 1, 1);
INSERT INTO `item` (`id_item`, `descricao_item`, `marca_id`, `quantidade_item`, `unidade_medida_id`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES
	(3, 'Tenys Pé', 5, 100, 3, 1, '2018-07-25 21:47:23', 1, 1);
INSERT INTO `item` (`id_item`, `descricao_item`, `marca_id`, `quantidade_item`, `unidade_medida_id`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES
	(4, 'Leite UHT Integral', 1, 1, 5, 1, '2018-07-14 10:46:09', 1, 1);
INSERT INTO `item` (`id_item`, `descricao_item`, `marca_id`, `quantidade_item`, `unidade_medida_id`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES
	(5, 'Margarina com sal', 9, 500, 3, 1, '2018-07-14 21:02:29', 1, 1);
INSERT INTO `item` (`id_item`, `descricao_item`, `marca_id`, `quantidade_item`, `unidade_medida_id`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES
	(6, 'tenys pé', 5, 100, 3, 1, '2018-07-26 20:27:05', 1, 1);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.lanc_preco
CREATE TABLE IF NOT EXISTS `lanc_preco` (
  `id_lanc_preco` int(11) NOT NULL AUTO_INCREMENT,
  `supermercado_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `marca_id` int(11) DEFAULT NULL,
  `preco_lanc_preco` float NOT NULL,
  `data_atualizacao_lanc_preco` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_lanc_preco` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_lanc_preco`),
  KEY `fk_lanc_preco<>usuario` (`usuario_id`),
  KEY `fk_lanc_preco<>item` (`item_id`),
  KEY `fk_lanc_preco<>supermercado` (`supermercado_id`),
  KEY `fk_lanc_preco<>marca` (`marca_id`),
  CONSTRAINT `fk_lanc_preco<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`),
  CONSTRAINT `fk_lanc_preco<>marca` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id_marca`),
  CONSTRAINT `fk_lanc_preco<>supermercado` FOREIGN KEY (`supermercado_id`) REFERENCES `supermercado` (`id_supermercado`),
  CONSTRAINT `fk_lanc_preco<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.lanc_preco: ~2 rows (aproximadamente)
DELETE FROM `lanc_preco`;
/*!40000 ALTER TABLE `lanc_preco` DISABLE KEYS */;
INSERT INTO `lanc_preco` (`id_lanc_preco`, `supermercado_id`, `item_id`, `marca_id`, `preco_lanc_preco`, `data_atualizacao_lanc_preco`, `usuario_id`, `bool_ativo_lanc_preco`) VALUES
	(1, 1, 2, 3, 5.6, '2018-05-21 14:52:10', 1, 1);
INSERT INTO `lanc_preco` (`id_lanc_preco`, `supermercado_id`, `item_id`, `marca_id`, `preco_lanc_preco`, `data_atualizacao_lanc_preco`, `usuario_id`, `bool_ativo_lanc_preco`) VALUES
	(2, 2, 1, 1, 2.6, '2018-05-21 14:52:26', 1, 1);
/*!40000 ALTER TABLE `lanc_preco` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_marca` varchar(200) NOT NULL,
  `data_atualizacao_marca` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_marca` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_marca`),
  KEY `fk_marca<>usuario` (`usuario_id`),
  CONSTRAINT `fk_marca<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.marca: ~9 rows (aproximadamente)
DELETE FROM `marca`;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` (`id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES
	(1, 'Quatá', '2018-05-21 14:38:55', 1, 1);
INSERT INTO `marca` (`id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES
	(2, 'Itambé', '2018-05-21 14:39:07', 1, 1);
INSERT INTO `marca` (`id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES
	(3, 'Nescal', '2018-05-21 14:39:13', 1, 1);
INSERT INTO `marca` (`id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES
	(4, 'Tody', '2018-05-21 14:39:19', 1, 1);
INSERT INTO `marca` (`id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES
	(5, 'Baurel', '2018-07-11 23:48:34', 1, 1);
INSERT INTO `marca` (`id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES
	(6, 'Sorriso', '2018-07-11 23:48:48', 1, 1);
INSERT INTO `marca` (`id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES
	(7, 'Colgate', '2018-07-11 23:49:14', 1, 1);
INSERT INTO `marca` (`id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES
	(8, 'Santa Amália', '2018-07-12 20:34:32', 1, 1);
INSERT INTO `marca` (`id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES
	(9, 'Vigor', '2018-07-14 21:01:41', 1, 1);
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.nivel_acesso
CREATE TABLE IF NOT EXISTS `nivel_acesso` (
  `id_nivel_acesso` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_nivel_acesso` varchar(200) NOT NULL,
  `area_nivel_acesso` text NOT NULL,
  `data_atualizacao_nivel_acesso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_nivel_acesso` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_nivel_acesso`),
  KEY `fk_nivel_acesso<>usuario` (`usuario_id`),
  CONSTRAINT `fk_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.nivel_acesso: ~0 rows (aproximadamente)
DELETE FROM `nivel_acesso`;
/*!40000 ALTER TABLE `nivel_acesso` DISABLE KEYS */;
INSERT INTO `nivel_acesso` (`id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES
	(1, 'Nivel Administrador', 'grupo+item+lanc_preco+marca+orcamento+pedido+supermercado+orcamento_item-orcamento+item-grupo+compra-pedido+compra_item-compra+pedido_item-pedido+upload+mapa+mov+relatorio+notificacao+usuario', '2018-07-30 15:34:46', 1, 1);
/*!40000 ALTER TABLE `nivel_acesso` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.notificacoes
CREATE TABLE IF NOT EXISTS `notificacoes` (
  `id_notificacoes` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_notificacoes` text NOT NULL,
  `usuario_atuador_notificacoes` varchar(200) NOT NULL,
  `usuaio_requerente_notificacoes` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes` enum('i','u','d') NOT NULL,
  `notificacoes_config_id` int(200) NOT NULL,
  `bool_view_notificacoes` int(1) NOT NULL,
  `data_atualizacao_notificacoes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_notificacoes` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_notificacoes`),
  KEY `fk_notificacoes<>notificacoes_config` (`notificacoes_config_id`),
  CONSTRAINT `fk_notificacoes<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.notificacoes: ~0 rows (aproximadamente)
DELETE FROM `notificacoes`;
/*!40000 ALTER TABLE `notificacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.notificacoes_config
CREATE TABLE IF NOT EXISTS `notificacoes_config` (
  `id_notificacoes_config` int(11) NOT NULL AUTO_INCREMENT,
  `area_notificacoes_config` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes_config` varchar(100) NOT NULL,
  `data_atualizacao_notificacoes_config` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_notificacoes_config` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_notificacoes_config`),
  KEY `fk_notificacoes_config<>usuario` (`usuario_id`),
  CONSTRAINT `fk_notificacoes_config<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.notificacoes_config: ~0 rows (aproximadamente)
DELETE FROM `notificacoes_config`;
/*!40000 ALTER TABLE `notificacoes_config` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacoes_config` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.notificacoes_pendentes
CREATE TABLE IF NOT EXISTS `notificacoes_pendentes` (
  `id_notificacoes_pendentes` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_notificacoes_pendentes` text NOT NULL,
  `usuario_atuador_notificacoes_pendentes` varchar(200) NOT NULL,
  `usuaio_requerente_notificacoes_pendentes` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes_pendentes` enum('i','u','d') NOT NULL,
  `notificacoes_config_id` int(200) NOT NULL,
  `data_atualizacao_notificacoes_pendentes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_notificacoes_pendentes` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_notificacoes_pendentes`),
  KEY `fk_notificacoes_pendentes<>notificacoes_config` (`notificacoes_config_id`),
  CONSTRAINT `fk_notificacoes_pendentes<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.notificacoes_pendentes: ~0 rows (aproximadamente)
DELETE FROM `notificacoes_pendentes`;
/*!40000 ALTER TABLE `notificacoes_pendentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacoes_pendentes` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.notificacoes_salvas
CREATE TABLE IF NOT EXISTS `notificacoes_salvas` (
  `id_notificacoes_salvas` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_notificacoes_salvas` text NOT NULL,
  `usuario_atuador_notificacoes_salvas` varchar(200) NOT NULL,
  `usuaio_requerente_notificacoes_salvas` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes_salvas` varchar(50) NOT NULL,
  `notificacoes_config_id` int(200) NOT NULL,
  `data_atualizacao_notificacoes_salvas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_notificacoes_salvas` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_notificacoes_salvas`),
  KEY `fk_notificacoes_salvas<>notificacoes_config` (`notificacoes_config_id`),
  CONSTRAINT `fk_notificacoes_salvas<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.notificacoes_salvas: ~0 rows (aproximadamente)
DELETE FROM `notificacoes_salvas`;
/*!40000 ALTER TABLE `notificacoes_salvas` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacoes_salvas` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.orcamento
CREATE TABLE IF NOT EXISTS `orcamento` (
  `id_orcamento` int(11) NOT NULL AUTO_INCREMENT,
  `emissao_orcamento` datetime DEFAULT CURRENT_TIMESTAMP,
  `descricao_orcamento` varchar(200) DEFAULT NULL,
  `data_atualizacao_orcamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_orcamento` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_orcamento`),
  KEY `fk_orcamento<>usuario` (`usuario_id`),
  CONSTRAINT `fk_orcamento<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.orcamento: ~0 rows (aproximadamente)
DELETE FROM `orcamento`;
/*!40000 ALTER TABLE `orcamento` DISABLE KEYS */;
INSERT INTO `orcamento` (`id_orcamento`, `emissao_orcamento`, `descricao_orcamento`, `data_atualizacao_orcamento`, `usuario_id`, `bool_ativo_orcamento`) VALUES
	(1, '2018-05-21 14:52:56', 'Compras mês 05-2018', '2018-05-21 14:52:56', 1, 1);
/*!40000 ALTER TABLE `orcamento` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.orcamento_item
CREATE TABLE IF NOT EXISTS `orcamento_item` (
  `id_orcamento_item` int(11) NOT NULL AUTO_INCREMENT,
  `supermercado_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `marca_id` int(11) DEFAULT NULL,
  `quantidade_orcamento_item` float NOT NULL,
  `preco_orcamento_item` float NOT NULL,
  `total_orcamento_item` float NOT NULL,
  `orcamento_id` int(11) DEFAULT NULL,
  `data_atualizacao_orcamento_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_orcamento_item` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_orcamento_item`),
  KEY `fk_orcamento_item<>usuario` (`usuario_id`),
  KEY `fk_orcamento_item<>item` (`item_id`),
  KEY `fk_orcamento_item<>supermercado` (`supermercado_id`),
  KEY `fk_orcamento_item<>marca` (`marca_id`),
  KEY `fk_orcamento_item<>orcamento` (`orcamento_id`),
  CONSTRAINT `fk_orcamento_item<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`),
  CONSTRAINT `fk_orcamento_item<>marca` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id_marca`),
  CONSTRAINT `fk_orcamento_item<>orcamento` FOREIGN KEY (`orcamento_id`) REFERENCES `orcamento` (`id_orcamento`),
  CONSTRAINT `fk_orcamento_item<>supermercado` FOREIGN KEY (`supermercado_id`) REFERENCES `supermercado` (`id_supermercado`),
  CONSTRAINT `fk_orcamento_item<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.orcamento_item: ~2 rows (aproximadamente)
DELETE FROM `orcamento_item`;
/*!40000 ALTER TABLE `orcamento_item` DISABLE KEYS */;
INSERT INTO `orcamento_item` (`id_orcamento_item`, `supermercado_id`, `item_id`, `marca_id`, `quantidade_orcamento_item`, `preco_orcamento_item`, `total_orcamento_item`, `orcamento_id`, `data_atualizacao_orcamento_item`, `usuario_id`, `bool_ativo_orcamento_item`) VALUES
	(4, 1, 1, 1, 12, 2.6, 31.2, 1, '2018-05-21 14:59:20', 1, 1);
INSERT INTO `orcamento_item` (`id_orcamento_item`, `supermercado_id`, `item_id`, `marca_id`, `quantidade_orcamento_item`, `preco_orcamento_item`, `total_orcamento_item`, `orcamento_id`, `data_atualizacao_orcamento_item`, `usuario_id`, `bool_ativo_orcamento_item`) VALUES
	(5, 2, 2, 3, 1, 5.6, 5.6, 1, '2018-05-21 14:59:38', 1, 1);
/*!40000 ALTER TABLE `orcamento_item` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `total_pedido` float NOT NULL DEFAULT '0',
  `data_atualizacao_pedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_pedido` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_pedido`),
  KEY `fk_pedido<>usuario` (`usuario_id`),
  CONSTRAINT `fk_pedido<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.pedido: ~0 rows (aproximadamente)
DELETE FROM `pedido`;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`id_pedido`, `total_pedido`, `data_atualizacao_pedido`, `usuario_id`, `bool_ativo_pedido`) VALUES
	(1, 0, '2018-07-30 15:29:10', 1, 1);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.pedido_item
CREATE TABLE IF NOT EXISTS `pedido_item` (
  `id_pedido_item` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `quantidade_pedido_item` float NOT NULL,
  `valor_unitario_pedido_item` float NOT NULL,
  `total_pedido_item` float NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `supermercado_id` int(11) NOT NULL,
  `data_atualizacao_pedido_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_pedido_item` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_pedido_item`),
  KEY `fk_pedido_item<>usuario` (`usuario_id`),
  KEY `fk_pedido_item<>pedido` (`pedido_id`),
  KEY `fk_pedido_item<>item` (`item_id`),
  KEY `fk_pedido_item<>supermercado` (`supermercado_id`),
  CONSTRAINT `fk_pedido_item<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`),
  CONSTRAINT `fk_pedido_item<>pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id_pedido`),
  CONSTRAINT `fk_pedido_item<>supermercado` FOREIGN KEY (`supermercado_id`) REFERENCES `supermercado` (`id_supermercado`),
  CONSTRAINT `fk_pedido_item<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.pedido_item: ~1 rows (aproximadamente)
DELETE FROM `pedido_item`;
/*!40000 ALTER TABLE `pedido_item` DISABLE KEYS */;
INSERT INTO `pedido_item` (`id_pedido_item`, `item_id`, `quantidade_pedido_item`, `valor_unitario_pedido_item`, `total_pedido_item`, `pedido_id`, `supermercado_id`, `data_atualizacao_pedido_item`, `usuario_id`, `bool_ativo_pedido_item`) VALUES
	(1, 4, 13, 3.5, 45.5, 1, 3, '2018-07-30 15:57:57', 1, 1);
/*!40000 ALTER TABLE `pedido_item` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.relatorios
CREATE TABLE IF NOT EXISTS `relatorios` (
  `id_relatorios` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_relatorios` varchar(200) NOT NULL,
  `tabela_relatorios` varchar(200) NOT NULL,
  `colunas_relatorios` text NOT NULL,
  `colunas_estrangeiras_relatorios` text NOT NULL,
  `colunas_filtro_relatorios` text,
  `bool_filtro_ativo_relatorios` int(1) NOT NULL DEFAULT '1',
  `data_atualizacao_relatorios` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_emitir_relatorios` int(1) NOT NULL DEFAULT '0',
  `bool_ativo_relatorios` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_relatorios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.relatorios: ~0 rows (aproximadamente)
DELETE FROM `relatorios`;
/*!40000 ALTER TABLE `relatorios` DISABLE KEYS */;
/*!40000 ALTER TABLE `relatorios` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.relatorio_tabela
CREATE TABLE IF NOT EXISTS `relatorio_tabela` (
  `id_relatorio_tabela` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_relatorio_tabela` varchar(200) NOT NULL,
  `data_atualizacao_relatorio_tabela` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_relatorio_tabela` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_relatorio_tabela`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.relatorio_tabela: ~0 rows (aproximadamente)
DELETE FROM `relatorio_tabela`;
/*!40000 ALTER TABLE `relatorio_tabela` DISABLE KEYS */;
/*!40000 ALTER TABLE `relatorio_tabela` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.supermercado
CREATE TABLE IF NOT EXISTS `supermercado` (
  `id_supermercado` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_supermercado` varchar(200) NOT NULL,
  `data_atualizacao_supermercado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_supermercado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_supermercado`),
  KEY `fk_supermercado<>usuario` (`usuario_id`),
  CONSTRAINT `fk_supermercado<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.supermercado: ~7 rows (aproximadamente)
DELETE FROM `supermercado`;
/*!40000 ALTER TABLE `supermercado` DISABLE KEYS */;
INSERT INTO `supermercado` (`id_supermercado`, `descricao_supermercado`, `data_atualizacao_supermercado`, `usuario_id`, `bool_ativo_supermercado`) VALUES
	(0, 'Sem Supermercado', '2018-07-30 16:45:54', 1, 1);
INSERT INTO `supermercado` (`id_supermercado`, `descricao_supermercado`, `data_atualizacao_supermercado`, `usuario_id`, `bool_ativo_supermercado`) VALUES
	(1, 'Bretas', '2018-05-21 14:45:51', 1, 1);
INSERT INTO `supermercado` (`id_supermercado`, `descricao_supermercado`, `data_atualizacao_supermercado`, `usuario_id`, `bool_ativo_supermercado`) VALUES
	(2, 'Fonceca', '2018-05-21 14:45:55', 1, 1);
INSERT INTO `supermercado` (`id_supermercado`, `descricao_supermercado`, `data_atualizacao_supermercado`, `usuario_id`, `bool_ativo_supermercado`) VALUES
	(3, 'San Michael', '2018-05-21 14:46:07', 1, 1);
INSERT INTO `supermercado` (`id_supermercado`, `descricao_supermercado`, `data_atualizacao_supermercado`, `usuario_id`, `bool_ativo_supermercado`) VALUES
	(4, 'Super Vale', '2018-05-21 14:46:19', 1, 1);
INSERT INTO `supermercado` (`id_supermercado`, `descricao_supermercado`, `data_atualizacao_supermercado`, `usuario_id`, `bool_ativo_supermercado`) VALUES
	(5, 'Almeida', '2018-05-21 14:46:33', 1, 1);
INSERT INTO `supermercado` (`id_supermercado`, `descricao_supermercado`, `data_atualizacao_supermercado`, `usuario_id`, `bool_ativo_supermercado`) VALUES
	(6, 'VN', '2018-07-07 22:03:33', 1, 1);
/*!40000 ALTER TABLE `supermercado` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.unidade_medida
CREATE TABLE IF NOT EXISTS `unidade_medida` (
  `id_unidade_medida` int(11) NOT NULL AUTO_INCREMENT,
  `sigla_unidade_medida` char(2) NOT NULL,
  `descricao_unidade_medida` varchar(50) NOT NULL,
  PRIMARY KEY (`id_unidade_medida`),
  UNIQUE KEY `sigla_unidade_medida` (`sigla_unidade_medida`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.unidade_medida: ~9 rows (aproximadamente)
DELETE FROM `unidade_medida`;
/*!40000 ALTER TABLE `unidade_medida` DISABLE KEYS */;
INSERT INTO `unidade_medida` (`id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES
	(1, 'un', 'Unidade');
INSERT INTO `unidade_medida` (`id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES
	(2, 'kg', 'Kilograma');
INSERT INTO `unidade_medida` (`id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES
	(3, 'g', 'Grama');
INSERT INTO `unidade_medida` (`id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES
	(4, 'mg', 'Milígrama');
INSERT INTO `unidade_medida` (`id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES
	(5, 'l', 'Litro');
INSERT INTO `unidade_medida` (`id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES
	(6, 'ml', 'Mililitro');
INSERT INTO `unidade_medida` (`id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES
	(7, 'm', 'Metro');
INSERT INTO `unidade_medida` (`id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES
	(8, 'cm', 'Centímetro');
INSERT INTO `unidade_medida` (`id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES
	(9, 'mm', 'Milímetro');
/*!40000 ALTER TABLE `unidade_medida` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.upload_arq
CREATE TABLE IF NOT EXISTS `upload_arq` (
  `id_upload_arq` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_upload_arq` varchar(100) NOT NULL,
  `tipo_upload_arq` varchar(100) NOT NULL,
  `data_atualizacaoupload_arq` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_upload_arq` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_upload_arq`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.upload_arq: ~0 rows (aproximadamente)
DELETE FROM `upload_arq`;
/*!40000 ALTER TABLE `upload_arq` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload_arq` ENABLE KEYS */;

-- Copiando estrutura para tabela compras_jk_19.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(200) DEFAULT NULL,
  `login_usuario` char(3) DEFAULT NULL,
  `senha_usuario` varchar(100) DEFAULT NULL,
  `nivel_acesso_id` int(11) NOT NULL DEFAULT '1',
  `bool_ativo_usuario` int(1) DEFAULT '1',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `Login` (`login_usuario`),
  KEY `fk_usuario<>nivel_acesso` (`nivel_acesso_id`),
  CONSTRAINT `fk_usuario<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.usuario: ~2 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES
	(1, 'Administrador', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1);
INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES
	(2, 'SITE', 'SIT', '*C737C0A2F678ACBE092353610475CC003320E65E', 1, 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
