-- --------------------------------------------------------
-- Servidor:                     minas-system.mysql.uhserver.com
-- Versão do servidor:           5.6.26-log - MySQL Community Server (GPL)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;




-- Copiando estrutura do banco de dados para minas_system
CREATE DATABASE IF NOT EXISTS `minas_system` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `minas_system`;

-- Copiando estrutura para tabela minas_system.adicional_site
DROP TABLE IF EXISTS `adicional_site`;
CREATE TABLE IF NOT EXISTS `adicional_site` (
  `id_adicional_site` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_adicional_site` varchar(200) NOT NULL,
  `descricao_adicional_site` text NOT NULL,
  `imagem_adicional_site` varchar(200) NOT NULL,
  `saiba_mais_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `data_atualizacao_adicional_site` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_adicional_site` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_adicional_site`),
  KEY `fk_adicional_site<>usuario` (`usuario_id`),
  KEY `fk_adiciona_site<>saiba_mais` (`saiba_mais_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.adicional_site: ~0 rows (aproximadamente)
DELETE FROM `adicional_site`;
/*!40000 ALTER TABLE `adicional_site` DISABLE KEYS */;
/*!40000 ALTER TABLE `adicional_site` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.cards
DROP TABLE IF EXISTS `cards`;
CREATE TABLE IF NOT EXISTS `cards` (
  `id_cards` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_cards` varchar(100) NOT NULL,
  `descricao_cards` varchar(200) DEFAULT NULL,
  `imagem_cards` varchar(100) NOT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_cards` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_cards` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cards`),
  KEY `fk_cards<>configurar_site` (`configurar_site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.cards: ~13 rows (aproximadamente)
DELETE FROM `cards`;
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
INSERT INTO `cards` (`id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES
	(1, 'Next Cable', '', 'Logonext.jpg', 1, '2018-01-25 09:49:34', 1),
	(2, 'Giga Security', '', 'cftv-hvr-adr-16-canais-gs16hd-hd-720p-giga-security-D_NQ_NP_143101-MLB8203210394_042015-F.jpg', 1, '2018-02-05 16:27:00', 1),
	(3, 'New Back', '', 'marcanewback.png', 1, '2018-01-25 09:51:47', 1),
	(4, 'TecVoz', '', 'tecvoz-1.jpg', 1, '2018-02-05 16:27:31', 1),
	(5, 'Lider', '', 'lider.jpg', 1, '2018-02-05 16:28:00', 1),
	(6, 'Telecam', '', 'telecam.png', 1, '2018-02-05 16:28:22', 1),
	(7, 'Multilaser', '', 'multilaser.png', 1, '2018-02-05 16:28:49', 1),
	(8, 'Magatron', '', 'megatron.jpg', 1, '2018-02-05 16:29:08', 1),
	(9, 'Onix', '', 'logo-onix.png', 1, '2018-02-05 16:30:13', 1),
	(10, 'Ragteck', '', 'ragteck.jpg', 1, '2018-02-05 16:30:53', 1),
	(11, 'Genno', '', 'genno.jpg', 1, '2018-02-05 16:31:15', 1),
	(12, 'TravBem', '', 'logo_travben.jpg', 1, '2018-02-05 16:31:41', 1),
	(13, 'UDI', '', 'udi cabos.png', 1, '2018-02-05 16:31:58', 1);
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.cliente_site
DROP TABLE IF EXISTS `cliente_site`;
CREATE TABLE IF NOT EXISTS `cliente_site` (
  `id_cliente_site` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente_site` varchar(200) NOT NULL,
  `login_cliente_site` varchar(200) NOT NULL,
  `senha_cliente_site` varchar(200) NOT NULL,
  `telefone_cliente_site` varchar(30) NOT NULL,
  `celular_cliente_site` varchar(30) DEFAULT NULL,
  `endereco_cliente_site` varchar(500) DEFAULT NULL,
  `numero_cliente_site` int(11) DEFAULT NULL,
  `complemento_cliente_site` varchar(200) DEFAULT NULL,
  `bairro_cliente_site` varchar(200) DEFAULT NULL,
  `cidade_cliente_site` varchar(200) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `cep_cliente_site` varchar(30) DEFAULT NULL,
  `bool_ativo_cliente_site` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cliente_site`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.cliente_site: ~2 rows (aproximadamente)
DELETE FROM `cliente_site`;
/*!40000 ALTER TABLE `cliente_site` DISABLE KEYS */;
INSERT INTO `cliente_site` (`id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES
	(2, 'Jack Biller', 'jac', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '99723-1080', '', '', 0, '', '', '', 0, '', 1),
	(8, 'Teste Jack', 'tes', '*64D475A63138B1EFF85F475F994501BF26331685', '123', '', '', 0, '', '', '', 0, '', 1);
/*!40000 ALTER TABLE `cliente_site` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.configurar_site
DROP TABLE IF EXISTS `configurar_site`;
CREATE TABLE IF NOT EXISTS `configurar_site` (
  `id_configurar_site` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_configurar_site` varchar(100) NOT NULL,
  `titulo_menu_configurar_site` varchar(100) DEFAULT NULL,
  `cor_pagina_configurar_site` varchar(100) NOT NULL,
  `contra_cor_pagina_configurar_site` varchar(100) NOT NULL,
  `imagem_icone_configurar_site` varchar(100) NOT NULL,
  `imagem_logo_configurar_site` varchar(100) NOT NULL,
  `data_atualizacao_configurar_site` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_configurar_site` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_configurar_site`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.configurar_site: ~1 rows (aproximadamente)
DELETE FROM `configurar_site`;
/*!40000 ALTER TABLE `configurar_site` DISABLE KEYS */;
INSERT INTO `configurar_site` (`id_configurar_site`, `titulo_configurar_site`, `titulo_menu_configurar_site`, `cor_pagina_configurar_site`, `contra_cor_pagina_configurar_site`, `imagem_icone_configurar_site`, `imagem_logo_configurar_site`, `data_atualizacao_configurar_site`, `bool_ativo_configurar_site`) VALUES
	(1, 'Minas System', '', '#f76b00;', '#fff;', 'LogoSmForm.png', 'LogoLgBranca.png', '2018-01-27 09:01:45', 1);
/*!40000 ALTER TABLE `configurar_site` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.contato
DROP TABLE IF EXISTS `contato`;
CREATE TABLE IF NOT EXISTS `contato` (
  `id_contato` int(11) NOT NULL AUTO_INCREMENT,
  `nome_contato` varchar(200) NOT NULL,
  `email_contato` varchar(200) DEFAULT NULL,
  `telefone_contato` varchar(200) DEFAULT NULL,
  `assunto_contato` varchar(200) DEFAULT NULL,
  `mensagem_contato` text,
  `usuario_id` int(11) NOT NULL,
  `data_atualizacao_contato` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_contato` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_contato`),
  KEY `fk_contato<>usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.contato: ~4 rows (aproximadamente)
DELETE FROM `contato`;
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` (`id_contato`, `nome_contato`, `email_contato`, `telefone_contato`, `assunto_contato`, `mensagem_contato`, `usuario_id`, `data_atualizacao_contato`, `bool_ativo_contato`) VALUES
	(1, 'teste no site Jack', 'site_Jack@asd.asd', '123', 'Formulario de Contato - Site Minas System', 'Teste', 2, '2018-01-25 13:57:44', 1),
	(2, 'Helder Eduardo de Figueiredo', 'helder.figueiredo@informatizepc.com.br', '3537147748', 'Formulario de Contato - Site Minas System', 'TESTE', 2, '2018-02-07 10:45:22', 1),
	(3, 'donizete', 'cdi@cdiinfo.com.br', '31114-1177', 'Formulario de Contato - Site Minas System', 'teste cdi', 2, '2018-02-08 10:53:23', 1),
	(4, 'Jack Teste', 'teste@teste.teste', '9999-9999', 'Formulario de Contato - Site Minas System', 'teste', 2, '2018-02-08 12:34:38', 1);
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.destaque_grupo
DROP TABLE IF EXISTS `destaque_grupo`;
CREATE TABLE IF NOT EXISTS `destaque_grupo` (
  `id_destaque_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_destaque_grupo` varchar(100) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `imagem_destaque_grupo` varchar(100) NOT NULL,
  `descricao_destaque_grupo` varchar(300) DEFAULT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_destaque_grupo` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_destaque_grupo` int(1) NOT NULL,
  PRIMARY KEY (`id_destaque_grupo`),
  KEY `fk_desatque_itens<>configurar_site` (`configurar_site_id`),
  KEY `fk_desatque_itens<>grupo` (`grupo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.destaque_grupo: ~7 rows (aproximadamente)
DELETE FROM `destaque_grupo`;
/*!40000 ALTER TABLE `destaque_grupo` DISABLE KEYS */;
INSERT INTO `destaque_grupo` (`id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES
	(1, 'Alarmes', 1, 'Alarmes-ultra (2).png', '', 1, '2018-02-08 11:03:08', 1),
	(2, 'Automação', 2, 'Automacao.jpg', '', 1, '2018-01-25 16:06:36', 0),
	(3, 'Nobreak e Baterias', 3, 'nobreak 700.jpg', '', 1, '2018-02-08 10:58:08', 1),
	(4, 'Cabos', 4, 'Cabos.jpg', '', 1, '2018-02-08 11:18:41', 1),
	(5, 'CFTV', 5, 'CFTV2.png', '', 1, '2018-02-06 17:39:51', 1),
	(6, 'Acessórios', 6, 'acessorios.jpg', '', 1, '2018-02-08 11:13:31', 1),
	(7, 'Controle de Acesso', 7, 'controle-de-acesso-gsproxct.png', '', 1, '2018-02-05 16:42:48', 1);
/*!40000 ALTER TABLE `destaque_grupo` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.empresa
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_empresa` varchar(200) NOT NULL,
  `imagem_logo_empresa` varchar(200) NOT NULL,
  `data_atualizacao_empresa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_empresa` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_empresa`),
  KEY `fk_empresa<>usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.empresa: ~1 rows (aproximadamente)
DELETE FROM `empresa`;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` (`id_empresa`, `descricao_empresa`, `imagem_logo_empresa`, `data_atualizacao_empresa`, `usuario_id`, `bool_ativo_empresa`) VALUES
	(1, 'Minas System', 'LogoLg.png', '2018-01-27 09:02:12', 1, 1);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.endereco_site
DROP TABLE IF EXISTS `endereco_site`;
CREATE TABLE IF NOT EXISTS `endereco_site` (
  `id_endereco_site` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_endereco_site` varchar(100) NOT NULL,
  `endereco_endereco_site` varchar(100) NOT NULL,
  `numero_endereco_site` int(11) NOT NULL,
  `complemento_endereco_site` varchar(100) DEFAULT NULL,
  `bairro_endereco_site` varchar(100) DEFAULT NULL,
  `cidade_endereco_site` varchar(100) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `cep_endereco_site` varchar(15) NOT NULL,
  `telefone_endereco_site` varchar(50) NOT NULL,
  `celular_endereco_site` varchar(50) DEFAULT NULL,
  `email_endereco_site` varchar(100) DEFAULT NULL,
  `horario_funcionamento_endereco_site` text NOT NULL,
  `latitude_endereco_site` varchar(100) NOT NULL,
  `longitude_endereco_site` varchar(100) NOT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_endereco_site` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_endereco_site` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_endereco_site`),
  KEY `fk_edereco_site<>configurar_site` (`configurar_site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.endereco_site: ~1 rows (aproximadamente)
DELETE FROM `endereco_site`;
/*!40000 ALTER TABLE `endereco_site` DISABLE KEYS */;
INSERT INTO `endereco_site` (`id_endereco_site`, `descricao_endereco_site`, `endereco_endereco_site`, `numero_endereco_site`, `complemento_endereco_site`, `bairro_endereco_site`, `cidade_endereco_site`, `estado_id`, `cep_endereco_site`, `telefone_endereco_site`, `celular_endereco_site`, `email_endereco_site`, `horario_funcionamento_endereco_site`, `latitude_endereco_site`, `longitude_endereco_site`, `configurar_site_id`, `data_atualizacao_endereco_site`, `bool_ativo_endereco_site`) VALUES
	(1, 'R. Francisco Tramonte, 10', 'R. Francisco Tramonte', 10, '', 'Jardim Centenario', 'Poços de Caldas', 13, '37704-256', '(35) 3712-6037', '(35) 3715-6397', '', 'segunda - sexta 08:00–18:00', '-21.804359', '-46.562745', 1, '2018-02-06 08:48:54', 1);
/*!40000 ALTER TABLE `endereco_site` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.estado
DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_estado` varchar(100) NOT NULL,
  `sigla_estado` char(2) NOT NULL,
  `bool_ativo_estado` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.estado: ~27 rows (aproximadamente)
DELETE FROM `estado`;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES
	(1, 'Acre', 'AC', 1),
	(2, 'Alagoas', 'AL', 1),
	(3, 'Amapá', 'AP', 1),
	(4, 'Amazonas', 'AM', 1),
	(5, 'Bahia', 'BA', 1),
	(6, 'Ceará', 'CE', 1),
	(7, 'Distrito Federal', 'DF', 1),
	(8, 'Espírito Santo', 'ES', 1),
	(9, 'Goiás', 'GO', 1),
	(10, 'Maranhão', 'MA', 1),
	(11, 'Mato Grosso', 'MT', 1),
	(12, 'Mato Grosso do Sul', 'MS', 1),
	(13, 'Minas Gerais', 'MG', 1),
	(14, 'Pará', 'PA', 1),
	(15, 'Paraíba', 'PB', 1),
	(16, 'Paraná', 'PR', 1),
	(17, 'Pernambuco', 'PE', 1),
	(18, 'Piauí', 'PI', 1),
	(19, 'Rio de Janeiro', 'RJ', 1),
	(20, 'Rio Grande do Norte', 'RN', 1),
	(21, 'Rio Grande do Sul', 'RS', 1),
	(22, 'Rondônia', 'RO', 1),
	(23, 'Roraima', 'RR', 1),
	(24, 'Santa Catarina', 'SC', 1),
	(25, 'São Paulo', 'SP', 1),
	(26, 'Sergipe', 'SE', 1),
	(27, 'Tocantins', 'TO', 1);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.grupo
DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_grupo` char(50) NOT NULL,
  `data_atualizacao_grupo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) DEFAULT NULL,
  `bool_ativo_grupo` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_grupo`),
  KEY `fk_grupo<>usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela minas_system.grupo: ~11 rows (aproximadamente)
DELETE FROM `grupo`;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` (`id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES
	(1, 'Alarmes', '2018-02-05 16:37:46', 1, 1),
	(2, 'Automação', '2018-02-05 17:43:36', 1, 0),
	(3, 'Nobreak e Baterias', '2018-02-06 10:44:09', 1, 1),
	(4, 'Cabos', '2018-01-25 08:43:25', 1, 1),
	(5, 'CFTV', '2018-01-25 08:43:37', 1, 1),
	(6, 'Acessórios', '2018-02-05 16:26:00', 1, 1),
	(7, 'Controle de Acesso', '2018-01-25 08:44:35', 1, 1),
	(8, 'Fechaduras', '2018-02-05 17:14:37', 1, 0),
	(9, 'Ferramentas', '2018-02-05 17:43:47', 1, 0),
	(10, 'Informática', '2018-02-05 17:44:10', 1, 0),
	(11, 'Interfonia', '2018-02-05 17:43:58', 1, 0);
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.item
DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_item` varchar(300) NOT NULL,
  `descricao_site_item` varchar(300) DEFAULT NULL,
  `unidade_medida_item` varchar(3) DEFAULT NULL,
  `imagem_item` varchar(200) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_item` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_item`),
  KEY `fk_item<>usuario` (`usuario_id`),
  KEY `fk_item<>grupo` (`grupo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela minas_system.item: ~56 rows (aproximadamente)
DELETE FROM `item`;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` (`id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES
	(1, 'Câmera de Seguração', '', '', 'camera.png', 1, 1, 1),
	(2, 'Alarme', '', '', 'alarme.jpg', 4, 1, 1),
	(3, 'Alarmes Slim', '', '', 'Alarmes-slim.png', 1, 1, 1),
	(4, 'Alarmes Ultra', '', '', 'Alarmes-ultra.png', 1, 1, 1),
	(5, 'Alta', '', '', 'alta.jpg', 4, 1, 1),
	(6, 'Cabo HDMI', '', '', 'cabo hdmi.jpg', 4, 1, 0),
	(7, 'Abraçadeira em Nylon Preta', '', '', 'Abracadeira-em-Nylon-Preta-300-x-36-mm-c-fortools-0070671.JPG', 6, 1, 1),
	(8, 'Cabo Paralelo Megatron', '', '', 'cabo paralelo megatron.jpg', 4, 1, 1),
	(9, 'Cabo de Rede', '', '', 'cabo rede.jpg', 4, 1, 1),
	(10, 'Cabo Coaxial', '', '', 'coaxial.jpg', 4, 1, 1),
	(11, 'Atack New Black Vista', '', '', 'atack-new-black-vista1-1-300x300.png', 1, 1, 1),
	(12, 'Controle De Acesso', '', '', 'controle de acesso.jpg', 7, 1, 1),
	(13, 'Controle de Acesso Gsproxct', '', '', 'controle-de-acesso-gsproxct.png', 7, 1, 1),
	(14, 'Controle de Acesso Gstouchct', '', '', 'controle-de-acesso-gstouchct.png', 7, 1, 0),
	(15, 'Controles Digitais Genno Tech Onix', '', '', 'Controles-Digitais-Genno-Tech-Onix.jpg', 1, 1, 1),
	(16, 'Articulador', '', '', 'articulador.jpg', 6, 1, 1),
	(17, 'Balun', '', '', 'balun.jpg', 6, 1, 1),
	(18, 'Bnc Borne', '', '', 'bnc borne.jpg', 6, 1, 1),
	(19, 'Filtro de Linha', '', '', 'filtro_de_linha_5_tom_pt_biv_lexman_89325845_0001_220x220.jpg', 6, 1, 1),
	(20, 'Eletrificador Revolution Control', '', '', 'eletrificador-revolution-control-.png', 1, 1, 1),
	(21, 'GATE-SAW', '', '', 'GATE-SAW.png', 1, 1, 1),
	(22, 'IB 550 PET', '', '', 'IB-550-PET.png', 1, 1, 1),
	(23, 'Sensor Magnético com Fio 1', '', '', 'Sensor-Magnetico-com-Fio-1.png', 1, 1, 1),
	(24, 'Sensor Magnético SMG SAW.', '', '', 'Sensor-Magnetico-SMG-SAW.png', 1, 1, 1),
	(25, 'Fontes', '', '', 'fontes.jpg', 6, 1, 1),
	(26, 'Haste', '', '', 'haste.jpg', 6, 1, 1),
	(27, 'Mola', '', '', 'mola.jpg', 6, 1, 1),
	(28, 'P4', '', '', 'p4.jpg', 6, 1, 1),
	(29, 'RCA', '', '', 'rca.jpg', 6, 1, 1),
	(30, 'Refletor', '', '', 'refletor.jpg', 6, 1, 1),
	(31, 'RJ-45', '', '', 'rj45.jpg', 6, 1, 1),
	(32, 'Roteador TP Link', '', '', 'Roteador-TP-Link-TL-WR840N-Wireless-300Mbps-com-2-Antenas-Interna-3112369.jpg', 6, 1, 1),
	(33, 'Suporte TV', '', '', 'suporte tv.jpg', 6, 1, 1),
	(34, 'Bullet 20m', '', '', 'bullet 20m.jpg', 5, 1, 1),
	(35, 'Bullet 25m', '', '', 'bullet 25m.jpg', 5, 1, 1),
	(36, 'Bullet', '', '', 'bullet.jpg', 5, 1, 1),
	(37, 'Camera Infravermelho Sony Exmor Full Ahd Gsfhd1050tv', '', '', 'camera-infravermelho-sony-exmor-full-ahd-gsfhd1050tv.png', 5, 1, 1),
	(38, 'Camera Speed Dome IP  Gsip2m18x120ir', '', '', 'camera-speed-dome-ip-gsip2m18x120ir.png', 5, 1, 1),
	(39, 'Camera Infravermelho Dome Ahd Plus 20 Metros Plastica Gshdp20db28', '', '', 'camera_infravermelho_dome_ahd_plus_20_metros_plastica-gshdp20db28.png', 5, 1, 1),
	(40, 'Camera Infravermelho Dome Ahd Plus 30 Metros Metalica Gshdp30db28', '', '', 'camera_infravermelho_dome_ahd_plus_30_metros_metalica-gshdp30db28.png', 5, 1, 1),
	(41, 'Camera Infravermelho Tubular Ahd Plus 20 Metros Plastica Gshdp20tb', '', '', 'camera_infravermelho_tubular_ahd_plus_20_metros_plastica-gshdp20tb.png', 5, 1, 1),
	(42, 'Camera Infravermelho Tubular Ahd Plus 30 Metros Metalica Gshdp30tb28', '', '', 'camera_infravermelho_tubular_ahd_plus_30_metros_metalica-gshdp30tb28.png', 5, 1, 1),
	(43, 'Dome', '', '', 'dome.jpg', 5, 1, 1),
	(44, 'Dvr Flex', '', '', 'dvr flex.jpg', 5, 1, 1),
	(45, 'DVR', '', '', 'dvr.jpg', 5, 1, 1),
	(46, 'Ftg TV ISP230IR', '', '', 'ftg_TV-ISP230IRjpg301022018163043.jpg', 5, 1, 1),
	(47, 'DVR Stand Alone DVR Lite', '', '', 'giga-produtos-nivel3-dvr-stand-alone-dvr-lite-dvr-lite-img.png', 5, 1, 1),
	(48, 'Gravador Digital de Video HVR Ahd 720p Gs04hd', '', '', 'gravador-digital-de-video-hvr-ahd-720p-gs04hd.png', 5, 1, 1),
	(49, 'Wifi', '', '', 'wifi.jpg', 5, 1, 1),
	(50, 'FTG X8 Preto', '', '', 'ftg_X8_Preto1jpg714072016113031.jpg', 7, 1, 1),
	(51, 'FTM F6', '', '', 'ftm_F6jpg114072016110350.jpg', 7, 1, 1),
	(52, 'FTM FL1000', '', '', 'ftm_FL1000_1jpg814072016110500.jpg', 7, 1, 1),
	(53, 'Controle de Acesso Gstouchct', '', '', 'controle-de-acesso-gstouchct.png', 7, 1, 1),
	(54, 'Nobreak 700', '', '', 'nobreak 700.jpg', 3, 1, 1),
	(55, 'Nobreak', '', '', 'nobreak.jpg', 3, 1, 1),
	(56, 'Nobreak', '', '', 'nobreak.png', 3, 1, 1);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.item_orcamento
DROP TABLE IF EXISTS `item_orcamento`;
CREATE TABLE IF NOT EXISTS `item_orcamento` (
  `id_item_orcamento` int(11) NOT NULL AUTO_INCREMENT,
  `data_lanc_item_orcamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orcamento_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantidade_item_orcamento` float NOT NULL,
  `total_item_orcamento` float NOT NULL,
  `bool_ativo_item_orcamento` int(1) DEFAULT '1',
  PRIMARY KEY (`id_item_orcamento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.item_orcamento: ~1 rows (aproximadamente)
DELETE FROM `item_orcamento`;
/*!40000 ALTER TABLE `item_orcamento` DISABLE KEYS */;
INSERT INTO `item_orcamento` (`id_item_orcamento`, `data_lanc_item_orcamento`, `orcamento_id`, `item_id`, `quantidade_item_orcamento`, `total_item_orcamento`, `bool_ativo_item_orcamento`) VALUES
	(1, '2018-01-25 10:36:21', 1, 1, 10, 1200, 1);
/*!40000 ALTER TABLE `item_orcamento` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.loja
DROP TABLE IF EXISTS `loja`;
CREATE TABLE IF NOT EXISTS `loja` (
  `id_loja` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_loja` varchar(100) NOT NULL,
  `descricao_loja` varchar(100) DEFAULT NULL,
  `imagem_loja` varchar(100) DEFAULT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_loja` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_loja` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_loja`),
  KEY `fk_loja<>configurar_site` (`configurar_site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.loja: ~1 rows (aproximadamente)
DELETE FROM `loja`;
/*!40000 ALTER TABLE `loja` DISABLE KEYS */;
INSERT INTO `loja` (`id_loja`, `titulo_loja`, `descricao_loja`, `imagem_loja`, `configurar_site_id`, `data_atualizacao_loja`, `bool_ativo_loja`) VALUES
	(1, 'Venha visitar nossa loja', 'Aguardamos sua visita', 'loja.png', 1, '2018-02-08 12:51:55', 1);
/*!40000 ALTER TABLE `loja` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.nivel_acesso
DROP TABLE IF EXISTS `nivel_acesso`;
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

-- Copiando dados para a tabela minas_system.nivel_acesso: ~1 rows (aproximadamente)
DELETE FROM `nivel_acesso`;
/*!40000 ALTER TABLE `nivel_acesso` DISABLE KEYS */;
INSERT INTO `nivel_acesso` (`id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES
	(1, 'Nivel Administrador', 'cliente_site+configurar_site+contato+empresa+estado+grupo+item+quem_somos+videos+orcamento-cliente_site+item_orcamento-orcamento+cards-configurar_site+destaque_grupo-configurar_site+endereco_site-configurar_site+slide_show-configurar_site+loja-configurar_site+topicos_loja-loja+mapa+mov+pdf+usuario', '2018-02-02 14:27:40', 1, 1);
/*!40000 ALTER TABLE `nivel_acesso` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.orcamento
DROP TABLE IF EXISTS `orcamento`;
CREATE TABLE IF NOT EXISTS `orcamento` (
  `id_orcamento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_orcamento` varchar(200) NOT NULL,
  `cliente_site_id` int(11) NOT NULL,
  `data_lanc_orcamento` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_orcamento` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_orcamento`),
  KEY `fk_orcamento<>cliente_site` (`cliente_site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.orcamento: ~1 rows (aproximadamente)
DELETE FROM `orcamento`;
/*!40000 ALTER TABLE `orcamento` DISABLE KEYS */;
INSERT INTO `orcamento` (`id_orcamento`, `descricao_orcamento`, `cliente_site_id`, `data_lanc_orcamento`, `bool_ativo_orcamento`) VALUES
	(1, 'Teste Jack', 2, '2018-01-25 10:35:22', 1);
/*!40000 ALTER TABLE `orcamento` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.quem_somos
DROP TABLE IF EXISTS `quem_somos`;
CREATE TABLE IF NOT EXISTS `quem_somos` (
  `id_quem_somos` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_quem_somos` varchar(200) NOT NULL,
  `descricao_quem_somos` text NOT NULL,
  `imagem_quem_somos` varchar(100) NOT NULL,
  `data_atualizacao_quem_somos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_quem_somos` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_quem_somos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.quem_somos: ~1 rows (aproximadamente)
DELETE FROM `quem_somos`;
/*!40000 ALTER TABLE `quem_somos` DISABLE KEYS */;
INSERT INTO `quem_somos` (`id_quem_somos`, `titulo_quem_somos`, `descricao_quem_somos`, `imagem_quem_somos`, `data_atualizacao_quem_somos`, `bool_ativo_quem_somos`) VALUES
	(1, 'Sobre A Minas System', 'Escreva aqui sua historia', 'LogoLg.png', '2018-01-29 13:40:06', 1);
/*!40000 ALTER TABLE `quem_somos` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.relatorios
DROP TABLE IF EXISTS `relatorios`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.relatorios: ~1 rows (aproximadamente)
DELETE FROM `relatorios`;
/*!40000 ALTER TABLE `relatorios` DISABLE KEYS */;
INSERT INTO `relatorios` (`id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES
	(1, 'Relatório de Contatos', 'contato', 'nome_contato+email_contato+telefone_contato', 'contato_tr_usuario_tr_nome_usuario', ' AND (usuario.nome_usuario LIKE \'%SITE%\')', 1, '2018-01-25 13:59:34', 1, 0, 1);
/*!40000 ALTER TABLE `relatorios` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.relatorio_tabela
DROP TABLE IF EXISTS `relatorio_tabela`;
CREATE TABLE IF NOT EXISTS `relatorio_tabela` (
  `id_relatorio_tabela` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_relatorio_tabela` varchar(200) NOT NULL,
  `data_atualizacao_relatorio_tabela` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_relatorio_tabela` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_relatorio_tabela`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.relatorio_tabela: ~7 rows (aproximadamente)
DELETE FROM `relatorio_tabela`;
/*!40000 ALTER TABLE `relatorio_tabela` DISABLE KEYS */;
INSERT INTO `relatorio_tabela` (`id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES
	(1, 'cliente_site', '2018-01-25 15:35:14', 1),
	(2, 'contato', '2018-01-25 15:35:14', 1),
	(3, 'grupo', '2018-01-25 15:35:14', 1),
	(4, 'item', '2018-01-25 15:35:15', 1),
	(5, 'item_orcamento', '2018-01-25 15:35:15', 1),
	(6, 'orcamento', '2018-01-25 15:35:15', 1),
	(7, 'videos', '2018-01-25 15:35:15', 1);
/*!40000 ALTER TABLE `relatorio_tabela` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.saiba_mais
DROP TABLE IF EXISTS `saiba_mais`;
CREATE TABLE IF NOT EXISTS `saiba_mais` (
  `id_saiba_mais` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_saiba_mais` varchar(200) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `data_atualizacao_saiba_mais` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_saiba_mais` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_saiba_mais`),
  KEY `fk_saiba_mais<>usuario` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.saiba_mais: ~0 rows (aproximadamente)
DELETE FROM `saiba_mais`;
/*!40000 ALTER TABLE `saiba_mais` DISABLE KEYS */;
/*!40000 ALTER TABLE `saiba_mais` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.site
DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
  `ID_SITE` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_EMPRESA` varchar(100) DEFAULT NULL,
  `NOME_CIDADE` varchar(100) DEFAULT NULL,
  `ESTADO` char(2) DEFAULT NULL,
  `FONE` varchar(14) DEFAULT NULL,
  `FONE_APP` varchar(14) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `sendusername` varchar(255) DEFAULT NULL,
  `sendpassword` varchar(255) DEFAULT NULL,
  `smtpserver` varchar(255) DEFAULT NULL,
  `smtpserverport` int(11) DEFAULT NULL,
  `MailFrom` varchar(255) DEFAULT NULL,
  `MailTo` varchar(255) DEFAULT NULL,
  `MailCc` varchar(255) DEFAULT NULL,
  `bool_ativo_site` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_SITE`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela minas_system.site: ~1 rows (aproximadamente)
DELETE FROM `site`;
/*!40000 ALTER TABLE `site` DISABLE KEYS */;
INSERT INTO `site` (`ID_SITE`, `NOME_EMPRESA`, `NOME_CIDADE`, `ESTADO`, `FONE`, `FONE_APP`, `EMAIL`, `sendusername`, `sendpassword`, `smtpserver`, `smtpserverport`, `MailFrom`, `MailTo`, `MailCc`, `bool_ativo_site`) VALUES
	(1, 'Minas System', 'Poços de Caldas', 'MG', '(35) 3712-6037', '', 'cdi@cdiinfo.com.br', 'thiago@cdiinfo.com.br', 'Cdidesenv03@', 'mail.cdiinfo.com.br', 465, 'thiago@cdiinfo.com.br', 'thiago.cdi@Hotmail.com', 'cdiinfo.suporte@gmail.com', 1);
/*!40000 ALTER TABLE `site` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.slide_show
DROP TABLE IF EXISTS `slide_show`;
CREATE TABLE IF NOT EXISTS `slide_show` (
  `id_slide_show` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_slide_show` varchar(100) DEFAULT NULL,
  `descricao_slide_show` varchar(200) DEFAULT NULL,
  `imagem_slide_show` varchar(100) NOT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_slide_show` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_slide_show` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_slide_show`),
  KEY `fk_slide_show<>configurar_site` (`configurar_site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.slide_show: ~3 rows (aproximadamente)
DELETE FROM `slide_show`;
/*!40000 ALTER TABLE `slide_show` DISABLE KEYS */;
INSERT INTO `slide_show` (`id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES
	(1, 'Tudo em Alarmes', '', 'fundo4.jpg', 1, '2018-02-06 08:59:05', 1),
	(2, 'Tudo para CFTV', '', 'security-resized-no-watermark.jpeg', 1, '2018-02-05 15:25:01', 1),
	(3, 'Informática', '', 'informatica.png', 1, '2018-02-05 15:24:53', 1);
/*!40000 ALTER TABLE `slide_show` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.topicos_loja
DROP TABLE IF EXISTS `topicos_loja`;
CREATE TABLE IF NOT EXISTS `topicos_loja` (
  `id_topicos_loja` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_topicos_loja` varchar(100) NOT NULL,
  `descricao_topicos_loja` varchar(100) NOT NULL,
  `loja_id` int(11) NOT NULL,
  `data_atualizacao_topicos_loja` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_topicos_loja` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_topicos_loja`),
  KEY `fk_topicos_loja<>loja` (`loja_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.topicos_loja: ~3 rows (aproximadamente)
DELETE FROM `topicos_loja`;
/*!40000 ALTER TABLE `topicos_loja` DISABLE KEYS */;
INSERT INTO `topicos_loja` (`id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `bool_ativo_topicos_loja`) VALUES
	(1, 'Endereço', 'R. Francisco Tramonte, 10 - Jardim Centenario, Poços de Caldas - MG', 1, '2018-01-25 09:36:53', 1),
	(2, 'Telefone', '(35) 3712-6037 ', 1, '2018-01-25 09:37:13', 1),
	(3, 'Horário de Funcionamento', 'Segunda - Sexta 08:00–18:00', 1, '2018-01-25 09:37:41', 1);
/*!40000 ALTER TABLE `topicos_loja` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.upload_arq
DROP TABLE IF EXISTS `upload_arq`;
CREATE TABLE IF NOT EXISTS `upload_arq` (
  `id_upload_arq` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_upload_arq` varchar(100) NOT NULL,
  `tipo_upload_arq` varchar(100) NOT NULL,
  `data_atualizacaoupload_arq` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_upload_arq` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_upload_arq`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.upload_arq: ~93 rows (aproximadamente)
DELETE FROM `upload_arq`;
/*!40000 ALTER TABLE `upload_arq` DISABLE KEYS */;
INSERT INTO `upload_arq` (`id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES
	(24, 'informatica.png', 'imagem', '2018-01-27 08:21:06', 1),
	(25, 'seguranca.png', 'imagem', '2018-01-27 08:40:47', 1),
	(26, 'security-resized-no-watermark.jpeg', 'imagem', '2018-01-27 08:58:10', 1),
	(27, 'giga-produtos-nivel3-dvr-stand-alone-dvr-lite-dvr-lite-img.png', 'imagem', '2018-02-05 15:28:50', 1),
	(28, 'cabo paralelo megatron.jpg', 'imagem', '2018-02-05 15:29:15', 1),
	(36, 'Roteador-TP-Link-TL-WR840N-Wireless-300Mbps-com-2-Antenas-Interna-3112369.jpg', 'imagem', '2018-02-05 15:29:55', 1),
	(40, 'Sensor-Magnetico-SMG-SAW.png', 'imagem', '2018-02-05 16:13:29', 1),
	(41, 'Sensor-Magnetico-com-Fio-1.png', 'imagem', '2018-02-05 16:13:34', 1),
	(49, 'camera-speed-dome-ip-gsip2m18x120ir.png', 'imagem', '2018-02-05 16:14:12', 1),
	(54, 'cabo hdmi.jpg', 'imagem', '2018-02-05 16:14:34', 1),
	(55, 'Controles-Digitais-Genno-Tech-Onix.jpg', 'imagem', '2018-02-05 16:14:38', 1),
	(56, 'camera_infravermelho_dome_ahd_plus_30_metros_metalica-gshdp30db28.png', 'imagem', '2018-02-05 16:14:44', 1),
	(57, 'camera_infravermelho_dome_ahd_plus_20_metros_plastica-gshdp20db28.png', 'imagem', '2018-02-05 16:14:49', 1),
	(58, 'camera_infravermelho_tubular_ahd_plus_30_metros_metalica-gshdp30tb28.png', 'imagem', '2018-02-05 16:14:54', 1),
	(59, 'camera_infravermelho_tubular_ahd_plus_20_metros_plastica-gshdp20tb.png', 'imagem', '2018-02-05 16:14:59', 1),
	(60, 'cftv-hvr-adr-16-canais-gs16hd-hd-720p-giga-security-D_NQ_NP_143101-MLB8203210394_042015-F.jpg', 'imagem', '2018-02-05 16:15:03', 1),
	(62, 'dome.jpg', 'imagem', '2018-02-05 16:15:12', 1),
	(63, 'dvr flex.jpg', 'imagem', '2018-02-05 16:15:17', 1),
	(64, 'dvr.jpg', 'imagem', '2018-02-05 16:15:23', 1),
	(65, 'eletrificador-revolution-control-.png', 'imagem', '2018-02-05 16:15:27', 1),
	(66, 'haste.jpg', 'imagem', '2018-02-05 16:15:31', 1),
	(67, 'ftg_TV-ISP230IRjpg301022018163043.jpg', 'imagem', '2018-02-05 16:15:36', 1),
	(68, 'filtro_de_linha_5_tom_pt_biv_lexman_89325845_0001_220x220.jpg', 'imagem', '2018-02-05 16:15:40', 1),
	(71, 'gravador-digital-de-video-hvr-ahd-720p-gs04hd.png', 'imagem', '2018-02-05 16:15:56', 1),
	(72, 'lider.jpg', 'imagem', '2018-02-05 16:16:01', 1),
	(73, 'megatron.jpg', 'imagem', '2018-02-05 16:16:06', 1),
	(75, 'multilaser.png', 'imagem', '2018-02-05 16:16:17', 1),
	(76, 'mola.jpg', 'imagem', '2018-02-05 16:16:22', 1),
	(77, 'nobreak 700.jpg', 'imagem', '2018-02-05 16:16:26', 1),
	(78, 'logo_travben.jpg', 'imagem', '2018-02-05 16:16:31', 1),
	(79, 'nobreak.png', 'imagem', '2018-02-05 16:16:35', 1),
	(80, 'nobreak.jpg', 'imagem', '2018-02-05 16:16:40', 1),
	(82, 'rca.jpg', 'imagem', '2018-02-05 16:16:50', 1),
	(83, 'ragteck.jpg', 'imagem', '2018-02-05 16:16:56', 1),
	(84, 'refletor.jpg', 'imagem', '2018-02-05 16:17:01', 1),
	(85, 'tecvoz-1.jpg', 'imagem', '2018-02-05 16:17:06', 1),
	(86, 'telecam.png', 'imagem', '2018-02-05 16:17:11', 1),
	(87, 'suporte tv.jpg', 'imagem', '2018-02-05 16:17:16', 1),
	(90, 'controle de acesso.jpg', 'imagem', '2018-02-05 16:41:23', 1),
	(92, 'controle-de-acesso-gstouchct.png', 'imagem', '2018-02-05 16:41:33', 1),
	(93, 'ftg_X8_Preto1jpg714072016113031.jpg', 'imagem', '2018-02-05 16:41:38', 1),
	(94, 'ftm_F6jpg114072016110350.jpg', 'imagem', '2018-02-05 16:41:44', 1),
	(95, 'ftm_FL1000_1jpg814072016110500.jpg', 'imagem', '2018-02-05 16:41:50', 1),
	(97, 'fundo4.jpg', 'imagem', '2018-02-06 08:58:34', 1),
	(140, 'Alarmes-slim.png', 'imagem', '2018-02-06 09:28:43', 1),
	(141, 'Abracadeira-em-Nylon-Preta-300-x-36-mm-c-fortools-0070671.JPG', 'imagem', '2018-02-06 09:28:43', 1),
	(142, 'Automacao.jpg', 'imagem', '2018-02-06 09:28:43', 1),
	(143, 'Baterias.jpg', 'imagem', '2018-02-06 09:28:44', 1),
	(144, 'Baterias_e_Pilhas.jpg', 'imagem', '2018-02-06 09:28:44', 1),
	(145, 'Alarmes-ultra.png', 'imagem', '2018-02-06 09:28:44', 1),
	(146, 'CFTV.png', 'imagem', '2018-02-06 09:28:44', 1),
	(147, 'Cabos.jpg', 'imagem', '2018-02-06 09:28:44', 1),
	(148, 'Conectores.jpg', 'imagem', '2018-02-06 09:28:45', 1),
	(149, 'Controle_de_Acesso.png', 'imagem', '2018-02-06 09:28:45', 1),
	(150, 'GATE-SAW.png', 'imagem', '2018-02-06 09:28:45', 1),
	(151, 'IB-550-PET.png', 'imagem', '2018-02-06 09:28:45', 1),
	(152, 'Logo.png', 'imagem', '2018-02-06 09:28:45', 1),
	(153, 'LogoLg.png', 'imagem', '2018-02-06 09:28:46', 1),
	(154, 'LogoLgBranca.png', 'imagem', '2018-02-06 09:28:46', 1),
	(155, 'LogoLgForm.png', 'imagem', '2018-02-06 09:28:46', 1),
	(156, 'LogoSmBranca.png', 'imagem', '2018-02-06 09:28:46', 1),
	(157, 'LogoSmForm.png', 'imagem', '2018-02-06 09:28:46', 1),
	(158, 'Logonext.jpg', 'imagem', '2018-02-06 09:28:47', 1),
	(159, 'alarme.jpg', 'imagem', '2018-02-06 09:28:47', 1),
	(160, 'alarmes.JPG', 'imagem', '2018-02-06 09:28:47', 1),
	(161, 'alta.jpg', 'imagem', '2018-02-06 09:28:47', 1),
	(162, 'articulador.jpg', 'imagem', '2018-02-06 09:28:48', 1),
	(163, 'atack-new-black-vista1-1-300x300.png', 'imagem', '2018-02-06 09:28:48', 1),
	(164, 'balun.jpg', 'imagem', '2018-02-06 09:28:48', 1),
	(165, 'bnc borne.jpg', 'imagem', '2018-02-06 09:28:48', 1),
	(166, 'bullet 20m.jpg', 'imagem', '2018-02-06 09:28:48', 1),
	(167, 'bullet 25m.jpg', 'imagem', '2018-02-06 09:28:48', 1),
	(168, 'bullet.jpg', 'imagem', '2018-02-06 09:28:49', 1),
	(169, 'cabo rede.jpg', 'imagem', '2018-02-06 09:28:49', 1),
	(170, 'camera-infravermelho-sony-exmor-full-ahd-gsfhd1050tv.png', 'imagem', '2018-02-06 09:28:49', 1),
	(171, 'camera.png', 'imagem', '2018-02-06 09:28:50', 1),
	(172, 'coaxial.jpg', 'imagem', '2018-02-06 09:28:50', 1),
	(173, 'controle-de-acesso-gsproxct.png', 'imagem', '2018-02-06 09:28:50', 1),
	(174, 'fontes.jpg', 'imagem', '2018-02-06 09:28:50', 1),
	(175, 'fundo1.jpg', 'imagem', '2018-02-06 09:28:50', 1),
	(176, 'fundo2.jpg', 'imagem', '2018-02-06 09:28:51', 1),
	(177, 'fundo3.jpg', 'imagem', '2018-02-06 09:28:51', 1),
	(178, 'genno.jpg', 'imagem', '2018-02-06 09:28:51', 1),
	(179, 'logo-onix.png', 'imagem', '2018-02-06 09:28:51', 1),
	(180, 'loja.png', 'imagem', '2018-02-06 09:28:51', 1),
	(181, 'marcanewback.png', 'imagem', '2018-02-06 09:28:52', 1),
	(182, 'p4.jpg', 'imagem', '2018-02-06 09:28:52', 1),
	(183, 'rj45.jpg', 'imagem', '2018-02-06 09:28:52', 1),
	(184, 'udi cabos.png', 'imagem', '2018-02-06 09:28:52', 1),
	(185, 'wifi.jpg', 'imagem', '2018-02-06 09:28:52', 1),
	(186, 'CFTV2.png', 'imagem', '2018-02-06 17:39:26', 1),
	(187, 'Alarmes-ultra (2).png', 'imagem', '2018-02-08 11:02:46', 1),
	(188, 'acessorios.jpg', 'imagem', '2018-02-08 11:13:08', 1);
/*!40000 ALTER TABLE `upload_arq` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.usuario
DROP TABLE IF EXISTS `usuario`;
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

-- Copiando dados para a tabela minas_system.usuario: ~2 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES
	(1, 'ADMINISTRADOR', 'ADM', '*68922D0185D8333DA80D814C32E5A04C28CC06D0', 1, 1),
	(2, 'SITE', 'SIT', '*C737C0A2F678ACBE092353610475CC003320E65E', 1, 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela minas_system.videos
DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id_videos` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_videos` text NOT NULL,
  `link_videos` varchar(200) NOT NULL,
  `data_atualizacao_videos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_videos` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_videos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela minas_system.videos: ~1 rows (aproximadamente)
DELETE FROM `videos`;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` (`id_videos`, `descricao_videos`, `link_videos`, `data_atualizacao_videos`, `bool_ativo_videos`) VALUES
	(1, '\'teste"', 'teste', '2018-02-06 10:25:32', 0);
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
