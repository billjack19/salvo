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


-- Copiando estrutura do banco de dados para gerador
CREATE DATABASE IF NOT EXISTS `gerador` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gerador`;

-- Copiando estrutura para tabela gerador.config_login
CREATE TABLE IF NOT EXISTS `config_login` (
  `id_config_login` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_config_login` varchar(100) NOT NULL,
  `imagem_fundo_id` int(11) NOT NULL,
  `imagem_icone_id` int(11) NOT NULL,
  `tabela_login_config_login` varchar(100) NOT NULL,
  `login_config_login` varchar(100) NOT NULL,
  `senha_config_login` varchar(100) NOT NULL,
  `cor_fundo_config_login` varchar(10) NOT NULL,
  `password_config_login` int(1) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  PRIMARY KEY (`id_config_login`),
  KEY `fk_config_login<>projetos` (`projeto_id`),
  KEY `fk_config_login<>imagem_fundo` (`imagem_fundo_id`),
  KEY `fk_config_login<>imagem_icone` (`imagem_icone_id`),
  CONSTRAINT `fk_config_login<>imagem_fundo` FOREIGN KEY (`imagem_fundo_id`) REFERENCES `imagem_fundo` (`id_imagem_fundo`),
  CONSTRAINT `fk_config_login<>imagem_icone` FOREIGN KEY (`imagem_icone_id`) REFERENCES `imagem_icone` (`id_imagem_icone`),
  CONSTRAINT `fk_config_login<>projetos` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id_projeto`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.config_login: ~0 rows (aproximadamente)
DELETE FROM `config_login`;
/*!40000 ALTER TABLE `config_login` DISABLE KEYS */;
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(5, '29/12/2017 04:09:17', 2, 7, 'usuario', 'login_usuario', 'senha_usuario', '#acd7f0', 1, 5);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(6, '05/01/2018 05:54:53', 2, 9, 'tabusuarios', 'Identificacao', 'Senha', '#a6afdd', 0, 6);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(7, '29/12/2017 11:03:24', 7, 7, 'usuario', 'login_usuario', 'senha_usuario', '#97c0d5', 1, 8);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(8, '16/04/2018 09:14:34', 2, 7, 'usuario', 'login_usuario', 'senha_usuario', '#aee8e8', 1, 9);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(9, '16/01/2018 03:46:57', 8, 11, 'usuario', 'login_usuario', 'senha_usuario', '#c2e7ed', 1, 10);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(10, '16/01/2018 10:14:17', 8, 12, 'usuario', 'login_usuario', 'senha_usuario', '#b9e4ea', 1, 11);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(11, '08/02/2018 08:53:03', 8, 5, 'usuario', 'login_usuario', 'senha_usuario', '#b9cad0', 1, 12);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(12, '05/02/2018 03:59:57', 8, 13, 'usuario', 'login_usuario', 'senha_usuario', '#ffbf80', 1, 13);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(13, '05/02/2018 10:30:17', 8, 14, 'usuario', 'login_usuario', 'senha_usuario', '#a0e0eb', 1, 15);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(14, '31/01/2018 02:21:50', 8, 11, 'usuario', 'login_usuario', 'senha_usuario', '#67c25c', 1, 16);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(15, '07/02/2018 05:24:31', 8, 6, 'usuario', 'login_usuario', 'senha_usuario', '#caeabf', 1, 17);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(16, '22/02/2018 10:02:38', 8, 4, 'usuario', 'login_usuario', 'senha_usuario', '#bae1b5', 1, 18);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(17, '22/03/2018 10:41:30', 4, 5, 'usuario', 'login_usuario', 'senha_usuario', '#a5e4d3', 1, 19);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(18, '02/04/2018 09:43:14', 8, 6, 'usuario', 'login_usuario', 'senha_usuario', '#9ecbb6', 1, 20);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(19, '21/05/2018 02:33:27', 4, 11, 'usuario', 'login_usuario', 'senha_usuario', '#6cd2c4', 1, 23);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(20, '14/06/2018 08:28:47', 4, 2, 'usuario', 'login_usuario', 'senha_usuario', '#9fcd81', 1, 24);
INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
	(21, '25/07/2018 02:43:52', 2, 11, 'usuario', 'login_usuario', 'senha_usuario', '#c8f0c6', 1, 25);
/*!40000 ALTER TABLE `config_login` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.config_principal
CREATE TABLE IF NOT EXISTS `config_principal` (
  `id_config_principal` int(11) NOT NULL AUTO_INCREMENT,
  `projeto_id` int(11) NOT NULL,
  `modelo_cores_menu_id` int(11) NOT NULL,
  `icone_cadastro_config_principa` varchar(100) NOT NULL,
  `tabelas_cadastro_config_principa` text NOT NULL,
  `logoLg_config_principa` varchar(100) NOT NULL,
  `logoSm_config_principa` varchar(100) NOT NULL,
  `bool_upload_config_principa` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_config_principal`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.config_principal: ~8 rows (aproximadamente)
DELETE FROM `config_principal`;
/*!40000 ALTER TABLE `config_principal` DISABLE KEYS */;
INSERT INTO `config_principal` (`id_config_principal`, `projeto_id`, `modelo_cores_menu_id`, `icone_cadastro_config_principa`, `tabelas_cadastro_config_principa`, `logoLg_config_principa`, `logoSm_config_principa`, `bool_upload_config_principa`) VALUES
	(1, 10, 6, '\n						\n						\n						\n						\n						\n						\n						\n						\n						\n						<i class="fa fa-list-ul" aria-', 'cards+configurar_site+contato+destaque+endereco_site+estado+grupo+item+loja+slide_show', 'ferramentas_administrativas.png', 'ferramentas_administrativas.png', 1);
INSERT INTO `config_principal` (`id_config_principal`, `projeto_id`, `modelo_cores_menu_id`, `icone_cadastro_config_principa`, `tabelas_cadastro_config_principa`, `logoLg_config_principa`, `logoSm_config_principa`, `bool_upload_config_principa`) VALUES
	(2, 9, 1, '\n						\n						\n						\n						<i class="fa fa-list-ul" aria-hidden="true"></i>																				', 'cliente_site+configurar_site+contato+grupo+item+quem_somos+videos', 'AMFiosLogoLg.png', 'AMFiosLogoSm.png', 1);
INSERT INTO `config_principal` (`id_config_principal`, `projeto_id`, `modelo_cores_menu_id`, `icone_cadastro_config_principa`, `tabelas_cadastro_config_principa`, `logoLg_config_principa`, `logoSm_config_principa`, `bool_upload_config_principa`) VALUES
	(3, 11, 2, '\n						\n						\n						\n						\n						\n						\n						\n						\n						\n						\n						\n						<i class="fa fa-', 'configurar_site+contato+empresa+estado+quem_somos+saiba_mais+teste+videos', 'LogoCafePocosLg.png', 'LogoCafePocosSm.png', 1);
INSERT INTO `config_principal` (`id_config_principal`, `projeto_id`, `modelo_cores_menu_id`, `icone_cadastro_config_principa`, `tabelas_cadastro_config_principa`, `logoLg_config_principa`, `logoSm_config_principa`, `bool_upload_config_principa`) VALUES
	(4, 12, 6, '\n						\n						\n						\n						\n						\n						<i class="fa fa-list-ul" aria-hidden="true"></i>										', 'aluno+console+genero+jogo+livro+manhas+objetivos+operacao_data+operacao_teste+prefixos', 'LogotipoFinal.png', 'LogotipoFinal.png', 1);
INSERT INTO `config_principal` (`id_config_principal`, `projeto_id`, `modelo_cores_menu_id`, `icone_cadastro_config_principa`, `tabelas_cadastro_config_principa`, `logoLg_config_principa`, `logoSm_config_principa`, `bool_upload_config_principa`) VALUES
	(5, 13, 4, '\n						\n						\n						\n						\n						\n						\n						\n						\n						\n						\n						\n						<i class="fa fa-', 'cliente_site+configurar_site+contato+empresa+estado+grupo+item+quem_somos+videos', 'LogoLg.png', 'LogoSmForm.png', 1);
INSERT INTO `config_principal` (`id_config_principal`, `projeto_id`, `modelo_cores_menu_id`, `icone_cadastro_config_principa`, `tabelas_cadastro_config_principa`, `logoLg_config_principa`, `logoSm_config_principa`, `bool_upload_config_principa`) VALUES
	(6, 15, 1, '\n						\n						\n						\n						\n						\n						\n						\n						\n						<i class="fa fa-list" aria-hidden="tr', 'configurar_site+contato+empresa+estado+links_uteis+quem_somos+saiba_mais+videos', 'LogotipoFinal.png', 'LogotipoFinal.png', 1);
INSERT INTO `config_principal` (`id_config_principal`, `projeto_id`, `modelo_cores_menu_id`, `icone_cadastro_config_principa`, `tabelas_cadastro_config_principa`, `logoLg_config_principa`, `logoSm_config_principa`, `bool_upload_config_principa`) VALUES
	(7, 16, 2, '\n						\n						\n						\n						\n						\n						\n						<i class="fa fa-list-ul" aria-hidden="true"></i>			', 'formula+logica_negocio+padrao_banco_de_dados+tabela_padrao', 'LogotipoFinal.png', 'LogotipoFinal.png', 1);
INSERT INTO `config_principal` (`id_config_principal`, `projeto_id`, `modelo_cores_menu_id`, `icone_cadastro_config_principa`, `tabelas_cadastro_config_principa`, `logoLg_config_principa`, `logoSm_config_principa`, `bool_upload_config_principa`) VALUES
	(8, 17, 4, '\n						<i class="fa fa-list-ul" aria-hidden="true"></i>					', 'andar+reserva+vagas', 'favicon2.png', 'favicon2.png', 1);
INSERT INTO `config_principal` (`id_config_principal`, `projeto_id`, `modelo_cores_menu_id`, `icone_cadastro_config_principa`, `tabelas_cadastro_config_principa`, `logoLg_config_principa`, `logoSm_config_principa`, `bool_upload_config_principa`) VALUES
	(9, 18, 2, '<i class="fa fa-list" aria-hidden="true"></i>', 'jogadores+jogo_atual+jogos', 'ferramentas_administrativas.png', 'ferramentas_administrativas.png', 1);
INSERT INTO `config_principal` (`id_config_principal`, `projeto_id`, `modelo_cores_menu_id`, `icone_cadastro_config_principa`, `tabelas_cadastro_config_principa`, `logoLg_config_principa`, `logoSm_config_principa`, `bool_upload_config_principa`) VALUES
	(10, 19, 2, '\n						\n						\n						\n						\n						\n						\n						\n						<i class="fa fa-star" aria-hidden="true"></i', 'apostilas+cor_de_rotas+livros+revista+topicos', 'LogotipoFinal.png', 'ferramentas_administrativas.png', 1);
INSERT INTO `config_principal` (`id_config_principal`, `projeto_id`, `modelo_cores_menu_id`, `icone_cadastro_config_principa`, `tabelas_cadastro_config_principa`, `logoLg_config_principa`, `logoSm_config_principa`, `bool_upload_config_principa`) VALUES
	(11, 20, 1, '\n						\n						\n						\n						\n						\n						\n						\n						\n						<i class="fa fa-list-ul" aria-hidden=', 'bairro+caminhao+cliente+geocodificacao+item+motorista+pedido+regiao+viagem', 'LogotipoFinal.png', 'LogotipoFinal.png', 1);
INSERT INTO `config_principal` (`id_config_principal`, `projeto_id`, `modelo_cores_menu_id`, `icone_cadastro_config_principa`, `tabelas_cadastro_config_principa`, `logoLg_config_principa`, `logoSm_config_principa`, `bool_upload_config_principa`) VALUES
	(12, 23, 2, '\n						\n						\n						\n						\n						\n						\n						<i class="fa fa-list" aria-hidden="true"></i>						', 'grupo+item+lanc_preco+marca+orcamento+pedido+supermercado', 'LogotipoFinal.png', 'LogotipoFinal.png', 1);
INSERT INTO `config_principal` (`id_config_principal`, `projeto_id`, `modelo_cores_menu_id`, `icone_cadastro_config_principa`, `tabelas_cadastro_config_principa`, `logoLg_config_principa`, `logoSm_config_principa`, `bool_upload_config_principa`) VALUES
	(13, 24, 1, '\n						\n						\n						<i class="fa fa-th-list" aria-hidden="true"></i>															', 'caixa+cliente+condicao_de_pagamento+empresa+estado+filial+grupo+item+operacoes_caixa+unidade_medida', 'LogotipoFinal.png', 'LogotipoFinal.png', 1);
INSERT INTO `config_principal` (`id_config_principal`, `projeto_id`, `modelo_cores_menu_id`, `icone_cadastro_config_principa`, `tabelas_cadastro_config_principa`, `logoLg_config_principa`, `logoSm_config_principa`, `bool_upload_config_principa`) VALUES
	(14, 25, 1, '\n						\n						\n						\n						\n						\n						\n						\n						\n						<i class="fa fa-list" aria-hidden="tr', 'configurar_site+contato+grupo+item+new_sjt+quem_somos+saiba_mais+situacao+videos', 'LogotipoFinal.png', 'LogotipoFinal.png', 1);
/*!40000 ALTER TABLE `config_principal` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.config_relatorio
CREATE TABLE IF NOT EXISTS `config_relatorio` (
  `id_config_relatorio` int(11) NOT NULL AUTO_INCREMENT,
  `tabelas_config_relatorio` text NOT NULL,
  `projeto_id` int(11) NOT NULL,
  PRIMARY KEY (`id_config_relatorio`),
  KEY `fk_config_relatorio<>projetos` (`projeto_id`),
  CONSTRAINT `fk_config_relatorio<>projetos` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id_projeto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.config_relatorio: ~6 rows (aproximadamente)
DELETE FROM `config_relatorio`;
/*!40000 ALTER TABLE `config_relatorio` DISABLE KEYS */;
INSERT INTO `config_relatorio` (`id_config_relatorio`, `tabelas_config_relatorio`, `projeto_id`) VALUES
	(1, 'cliefornec+contato+teste_grade+videos', 11);
INSERT INTO `config_relatorio` (`id_config_relatorio`, `tabelas_config_relatorio`, `projeto_id`) VALUES
	(2, 'aluno+console+jogo+livro+manhas', 12);
INSERT INTO `config_relatorio` (`id_config_relatorio`, `tabelas_config_relatorio`, `projeto_id`) VALUES
	(3, 'cliente_site+contato+grupo+item+item_orcamento+orcamento+videos', 13);
INSERT INTO `config_relatorio` (`id_config_relatorio`, `tabelas_config_relatorio`, `projeto_id`) VALUES
	(4, 'cliente_site+contato+item_orcamento+videos', 15);
INSERT INTO `config_relatorio` (`id_config_relatorio`, `tabelas_config_relatorio`, `projeto_id`) VALUES
	(5, 'formula+padrao_banco_de_dados+tabela_padrao', 16);
INSERT INTO `config_relatorio` (`id_config_relatorio`, `tabelas_config_relatorio`, `projeto_id`) VALUES
	(6, 'andar+reserva+vagas', 17);
INSERT INTO `config_relatorio` (`id_config_relatorio`, `tabelas_config_relatorio`, `projeto_id`) VALUES
	(7, 'historico_jogo+jogadores+jogo_atual+jogos', 18);
INSERT INTO `config_relatorio` (`id_config_relatorio`, `tabelas_config_relatorio`, `projeto_id`) VALUES
	(8, 'apostilas+livros+revista+trabalho+volumes', 19);
/*!40000 ALTER TABLE `config_relatorio` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.cor_modelo_menu
CREATE TABLE IF NOT EXISTS `cor_modelo_menu` (
  `id_cor_modelo_menu` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_cor_modelo_menu` varchar(10) NOT NULL,
  `modelo_cores_menu_id` int(11) NOT NULL,
  `num_cor_modelo_menu` int(1) NOT NULL,
  PRIMARY KEY (`id_cor_modelo_menu`),
  KEY `fk_cor_modelo_menu<>modelo_cores_menu` (`modelo_cores_menu_id`),
  CONSTRAINT `fk_cor_modelo_menu<>modelo_cores_menu` FOREIGN KEY (`modelo_cores_menu_id`) REFERENCES `modelo_cores_menu` (`id_modelo_cores_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.cor_modelo_menu: ~48 rows (aproximadamente)
DELETE FROM `cor_modelo_menu`;
/*!40000 ALTER TABLE `cor_modelo_menu` DISABLE KEYS */;
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(1, '303946', 1, 1);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(2, '1c2128', 1, 2);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(3, '3b4655', 1, 3);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(4, '262d37', 1, 4);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(5, '505e73', 1, 5);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(6, '455264', 1, 6);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(7, '071e24', 1, 7);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(8, '344154', 1, 8);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(9, '304639', 2, 1);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(10, '1c2821', 2, 2);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(11, '3b5546', 2, 3);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(12, '26372d', 2, 4);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(13, '50735e', 2, 5);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(14, '456452', 2, 6);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(15, '07241e', 2, 7);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(16, '345441', 2, 8);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(17, '393046', 3, 1);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(18, '211c28', 3, 2);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(19, '463b55', 3, 3);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(20, '2d2637', 3, 4);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(21, '5e5073', 3, 5);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(22, '524564', 3, 6);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(23, '1e0724', 3, 7);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(24, '413454', 3, 8);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(25, '394630', 4, 1);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(26, '21281c', 4, 2);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(27, '46553b', 4, 3);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(28, '2d3726', 4, 4);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(29, '5e7350', 4, 5);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(30, '526445', 4, 6);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(31, '1e2407', 4, 7);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(32, '415434', 4, 8);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(33, '463039', 5, 1);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(34, '281c21', 5, 2);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(35, '553b46', 5, 3);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(36, '37262d', 5, 4);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(37, '73505e', 5, 5);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(38, '644552', 5, 6);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(39, '24071e', 5, 7);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(40, '543441', 5, 8);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(41, '463930', 6, 1);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(42, '28211c', 6, 2);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(43, '55463b', 6, 3);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(44, '372d26', 6, 4);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(45, '735e50', 6, 5);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(46, '645245', 6, 6);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(47, '241e07', 6, 7);
INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
	(48, '544134', 6, 8);
/*!40000 ALTER TABLE `cor_modelo_menu` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.formula
CREATE TABLE IF NOT EXISTS `formula` (
  `id_formula` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_formula` varchar(200) NOT NULL,
  `formula_formula` varchar(200) NOT NULL,
  `numero_campos_formula` int(11) NOT NULL,
  `numero_campos_data_formula` int(11) NOT NULL,
  `bool_ativo_formula` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_formula`),
  UNIQUE KEY `Index 2` (`descricao_formula`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.formula: ~11 rows (aproximadamente)
DELETE FROM `formula`;
/*!40000 ALTER TABLE `formula` DISABLE KEYS */;
INSERT INTO `formula` (`id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES
	(1, 'soma_dois', 'n0 + n1', 2, 0, 1);
INSERT INTO `formula` (`id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES
	(2, 'subtrai_dois', 'n0 - n1', 2, 0, 1);
INSERT INTO `formula` (`id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES
	(3, 'multiplica_dois', 'n0 * n1', 2, 0, 1);
INSERT INTO `formula` (`id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES
	(4, 'divide_dois', 'n0 / n1', 2, 0, 1);
INSERT INTO `formula` (`id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES
	(5, 'pontencia_quadrada', 'n0 * n0', 1, 0, 1);
INSERT INTO `formula` (`id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES
	(6, 'raiz', 'n0 r n1', 2, 0, 1);
INSERT INTO `formula` (`id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES
	(7, 'media_tre_num', '( n0 + n1 + n2 ) / 3', 3, 0, 1);
INSERT INTO `formula` (`id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES
	(8, 'potenciacao_simples', 'n0 e n1', 2, 0, 1);
INSERT INTO `formula` (`id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES
	(9, 'desconto_loja', 'n0 - ( n0 p n1 )', 2, 0, 1);
INSERT INTO `formula` (`id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES
	(10, 'data_entrega', 'd0 d+ n0', 1, 1, 1);
INSERT INTO `formula` (`id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES
	(11, 'diferenca_datas', 'd0 d<> d1', 0, 2, 1);
/*!40000 ALTER TABLE `formula` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.grade
CREATE TABLE IF NOT EXISTS `grade` (
  `id_grade` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_grade` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `projeto_id` int(11) NOT NULL,
  `tabela_primaria` varchar(200) NOT NULL,
  `tabela_grade` varchar(200) NOT NULL,
  PRIMARY KEY (`id_grade`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.grade: ~68 rows (aproximadamente)
DELETE FROM `grade`;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(1, '2018-01-02 08:21:20', 9, 'cliente_site', 'orcamento');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(2, '2018-01-02 08:21:36', 9, 'orcamento', 'item_orcamento');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(3, '2018-01-02 10:28:39', 9, 'configurar_site', 'cards');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(5, '2018-01-02 10:28:58', 9, 'configurar_site', 'slide_show');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(6, '2018-01-02 10:29:09', 9, 'configurar_site', 'endereco_site');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(8, '2018-01-02 13:47:21', 9, 'configurar_site', 'loja');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(9, '2018-01-02 15:41:29', 9, 'loja', 'topicos_loja');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(10, '2018-01-02 16:04:45', 9, 'configurar_site', 'destaque_grupo');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(11, '2018-01-08 08:45:54', 10, 'loja', 'topicos_loja');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(12, '2018-01-12 11:03:07', 11, 'configurar_site', 'cards');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(13, '2018-01-12 11:03:15', 11, 'configurar_site', 'destaque_grupo');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(14, '2018-01-12 11:03:25', 11, 'configurar_site', 'slide_show');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(15, '2018-01-12 11:03:41', 11, 'configurar_site', 'loja');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(19, '2018-01-12 11:07:14', 11, 'configurar_site', 'endereco_site');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(20, '2018-01-13 09:37:13', 11, 'saiba_mais', 'adicional_site');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(21, '2018-01-22 10:05:11', 11, 'teste', 'teste_grade');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(22, '2018-01-23 09:59:55', 12, 'jogo', 'manhas');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(23, '2018-01-24 16:48:56', 13, 'cliente_site', 'orcamento');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(24, '2018-01-24 16:49:03', 13, 'orcamento', 'item_orcamento');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(25, '2018-01-24 16:49:13', 13, 'configurar_site', 'cards');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(26, '2018-01-24 16:49:23', 13, 'configurar_site', 'destaque_grupo');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(27, '2018-01-24 16:49:55', 13, 'configurar_site', 'endereco_site');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(28, '2018-01-24 16:50:09', 13, 'configurar_site', 'slide_show');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(29, '2018-01-24 16:50:25', 13, 'configurar_site', 'loja');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(30, '2018-01-24 16:50:59', 13, 'loja', 'topicos_loja');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(31, '2018-01-27 10:08:58', 12, 'console', 'jogo');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(32, '2018-01-30 10:17:33', 15, 'configurar_site', 'cards');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(33, '2018-01-30 10:17:44', 15, 'configurar_site', 'destaque_grupo');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(34, '2018-01-30 10:17:52', 15, 'configurar_site', 'endereco_site');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(35, '2018-01-30 10:18:04', 15, 'configurar_site', 'slide_show');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(36, '2018-01-30 10:18:11', 15, 'configurar_site', 'loja');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(37, '2018-01-30 10:18:21', 15, 'cliente_site', 'orcamento');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(38, '2018-01-30 10:18:30', 15, 'orcamento', 'item_orcamento');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(39, '2018-01-30 10:18:42', 15, 'loja', 'topicos_loja');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(40, '2018-01-30 14:43:01', 15, 'saiba_mais', 'adicional_site');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(42, '2018-02-06 15:50:47', 15, 'cards', 'topicos_cards');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(43, '2018-02-07 17:25:08', 17, 'andar', 'vagas');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(44, '2018-02-22 10:04:15', 18, 'jogos', 'historico_jogo');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(45, '2018-03-22 10:39:52', 19, 'topicos', 'apostilas');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(46, '2018-03-22 14:56:16', 19, 'topicos', 'livros');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(47, '2018-03-23 08:08:58', 19, 'topicos', 'revista');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(48, '2018-03-23 08:09:09', 19, 'revista', 'volumes');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(49, '2018-04-02 09:42:19', 20, 'viagem', 'viagem_item');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(50, '2018-04-02 09:42:26', 20, 'pedido', 'pedido_item');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(51, '2018-04-11 16:55:04', 20, 'regiao', 'bairro');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(52, '2018-04-12 16:59:02', 20, 'cliente', 'cliente_contato');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(53, '2018-05-21 14:34:41', 23, 'orcamento', 'orcamento_item');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(54, '2018-05-21 14:34:50', 23, 'grupo', 'item');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(55, '2018-06-14 09:15:48', 24, 'grupo', 'item');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(56, '2018-06-14 09:15:59', 24, 'item', 'item_unidade_medida');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(57, '2018-06-14 09:16:07', 24, 'cliente', 'cliente_contato');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(58, '2018-06-14 09:16:16', 24, 'cliente', 'cliente_endereco');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(59, '2018-06-14 09:16:27', 24, 'pedido', 'pedido_item');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(60, '2018-06-14 09:16:32', 24, 'pedido', 'pedido_pagamento');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(61, '2018-06-14 09:16:40', 24, 'pedido_pagamento', 'pedido_pagamento_extorno');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(62, '2018-06-14 09:33:39', 24, 'caixa_movimentacao', 'caixa_operacao');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(63, '2018-06-14 10:40:44', 24, 'empresa', 'filial');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(64, '2018-07-11 17:33:04', 25, 'cliente_site', 'orcamento');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(65, '2018-07-11 17:33:12', 25, 'orcamento', 'item_orcamento');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(66, '2018-07-11 17:33:23', 25, 'configurar_site', 'cards');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(67, '2018-07-11 17:33:31', 25, 'configurar_site', 'destaque_grupo');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(68, '2018-07-11 17:33:41', 25, 'configurar_site', 'endereco_site');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(69, '2018-07-11 17:33:49', 25, 'configurar_site', 'slide_show');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(70, '2018-07-11 17:34:01', 25, 'configurar_site', 'loja');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(71, '2018-07-11 17:34:07', 25, 'loja', 'topicos_loja');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(72, '2018-07-13 09:22:12', 25, 'saiba_mais', 'adicional_site');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(73, '2018-07-13 14:16:29', 25, 'new_sjt', 'paginas');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(74, '2018-07-16 10:05:50', 25, 'item', 'fotos');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(75, '2018-07-27 14:34:35', 25, 'grupo', 'item');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(76, '2018-07-30 15:25:16', 23, 'pedido', 'compra');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(77, '2018-07-30 15:25:22', 23, 'compra', 'compra_item');
INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
	(78, '2018-07-30 15:34:33', 23, 'pedido', 'pedido_item');
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.grade_combo
CREATE TABLE IF NOT EXISTS `grade_combo` (
  `id_grade_combo` int(11) NOT NULL AUTO_INCREMENT,
  `projeto_id` int(11) NOT NULL,
  `tabela` varchar(200) NOT NULL,
  `campo_primario` varchar(200) NOT NULL,
  `campo_grade` varchar(200) NOT NULL,
  `campo_grade_primario` varchar(200) DEFAULT NULL,
  `campo_principal` varchar(200) NOT NULL,
  `sequencia` int(2) NOT NULL,
  PRIMARY KEY (`id_grade_combo`),
  KEY `fk_grade_combo<>projetos` (`projeto_id`),
  CONSTRAINT `fk_grade_combo<>projetos` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id_projeto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.grade_combo: ~1 rows (aproximadamente)
DELETE FROM `grade_combo`;
/*!40000 ALTER TABLE `grade_combo` DISABLE KEYS */;
INSERT INTO `grade_combo` (`id_grade_combo`, `projeto_id`, `tabela`, `campo_primario`, `campo_grade`, `campo_grade_primario`, `campo_principal`, `sequencia`) VALUES
	(1, 12, 'manhas', 'console', 'jogo', '', 'jogo_id', 1);
/*!40000 ALTER TABLE `grade_combo` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.icones
CREATE TABLE IF NOT EXISTS `icones` (
  `id_icones` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_icones` varchar(200) NOT NULL,
  `html_icones` varchar(200) NOT NULL,
  `tipo_icones` char(1) NOT NULL,
  PRIMARY KEY (`id_icones`)
) ENGINE=InnoDB AUTO_INCREMENT=1177 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.icones: ~1.176 rows (aproximadamente)
DELETE FROM `icones`;
/*!40000 ALTER TABLE `icones` DISABLE KEYS */;
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1, 'glass', '<i class=\'glyphicon glyphicon-glass\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(2, 'music', '<i class=\'glyphicon glyphicon-music\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(3, 'search', '<i class=\'glyphicon glyphicon-search\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(4, 'envelope', '<i class=\'glyphicon glyphicon-envelope\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(5, 'heart', '<i class=\'glyphicon glyphicon-heart\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(6, 'star', '<i class=\'glyphicon glyphicon-star\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(7, 'star-empty', '<i class=\'glyphicon glyphicon-star-empty\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(8, 'user', '<i class=\'glyphicon glyphicon-user\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(9, 'film', '<i class=\'glyphicon glyphicon-film\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(10, 'th-large', '<i class=\'glyphicon glyphicon-th-large\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(11, 'th', '<i class=\'glyphicon glyphicon-th\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(12, 'th-list', '<i class=\'glyphicon glyphicon-th-list\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(13, 'ok', '<i class=\'glyphicon glyphicon-ok\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(14, 'remove', '<i class=\'glyphicon glyphicon-remove\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(15, 'zoom-in', '<i class=\'glyphicon glyphicon-zoom-in\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(16, 'zoom-out', '<i class=\'glyphicon glyphicon-zoom-out\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(17, 'off', '<i class=\'glyphicon glyphicon-off\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(18, 'signal', '<i class=\'glyphicon glyphicon-signal\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(19, 'cog', '<i class=\'glyphicon glyphicon-cog\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(20, 'trash', '<i class=\'glyphicon glyphicon-trash\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(21, 'home', '<i class=\'glyphicon glyphicon-home\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(22, 'file', '<i class=\'glyphicon glyphicon-file\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(23, 'time', '<i class=\'glyphicon glyphicon-time\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(24, 'road', '<i class=\'glyphicon glyphicon-road\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(25, 'download-alt', '<i class=\'glyphicon glyphicon-download-alt\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(26, 'download', '<i class=\'glyphicon glyphicon-download\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(27, 'upload', '<i class=\'glyphicon glyphicon-upload\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(28, 'inbox', '<i class=\'glyphicon glyphicon-inbox\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(29, 'play-circle', '<i class=\'glyphicon glyphicon-play-circle\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(30, 'repeat', '<i class=\'glyphicon glyphicon-repeat\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(31, 'refresh', '<i class=\'glyphicon glyphicon-refresh\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(32, 'list-alt', '<i class=\'glyphicon glyphicon-list-alt\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(33, 'lock>', '<i class=\'glyphicon glyphicon-lock\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(34, 'flag', '<i class=\'glyphicon glyphicon-flag\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(35, 'headphones', '<i class=\'glyphicon glyphicon-headphones\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(36, 'volume-off', '<i class=\'glyphicon glyphicon-volume-off\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(37, 'volume-down', '<i class=\'glyphicon glyphicon-volume-down\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(38, 'volume-up', '<i class=\'glyphicon glyphicon-volume-up\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(39, 'qrcode', '<i class=\'glyphicon glyphicon-qrcode\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(40, 'barcode', '<i class=\'glyphicon glyphicon-barcode\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(41, 'tag', '<i class=\'glyphicon glyphicon-tag\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(42, 'tags', '<i class=\'glyphicon glyphicon-tags\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(43, 'book', '<i class=\'glyphicon glyphicon-book\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(44, 'bookmark>', '<i class=\'glyphicon glyphicon-bookmark\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(45, 'print', '<i class=\'glyphicon glyphicon-print\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(46, 'camera>', '<i class=\'glyphicon glyphicon-camera\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(47, 'font', '<i class=\'glyphicon glyphicon-font\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(48, 'bold', '<i class=\'glyphicon glyphicon-bold\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(49, 'italic', '<i class=\'glyphicon glyphicon-italic\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(50, 'text-height', '<i class=\'glyphicon glyphicon-text-height\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(51, 'text-width', '<i class=\'glyphicon glyphicon-text-width\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(52, 'align-left', '<i class=\'glyphicon glyphicon-align-left\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(53, 'align-center', '<i class=\'glyphicon glyphicon-align-center\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(54, 'align-right', '<i class=\'glyphicon glyphicon-align-right\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(55, 'align-justify', '<i class=\'glyphicon glyphicon-align-justify\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(56, 'list', '<i class=\'glyphicon glyphicon-list\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(57, 'indent-left', '<i class=\'glyphicon glyphicon-indent-left\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(58, 'indent-right', '<i class=\'glyphicon glyphicon-indent-right\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(59, 'facetime-video', '<i class=\'glyphicon glyphicon-facetime-video\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(60, 'picture', '<i class=\'glyphicon glyphicon-picture\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(61, 'pencil', '<i class=\'glyphicon glyphicon-pencil\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(62, 'map-marker', '<i class=\'glyphicon glyphicon-map-marker\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(63, 'adjust', '<i class=\'glyphicon glyphicon-adjust\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(64, 'tint', '<i class=\'glyphicon glyphicon-tint\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(65, 'edit', '<i class=\'glyphicon glyphicon-edit\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(66, 'share', '<i class=\'glyphicon glyphicon-share\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(67, 'check', '<i class=\'glyphicon glyphicon-check\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(68, 'move', '<i class=\'glyphicon glyphicon-move\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(69, 'step-backward', '<i class=\'glyphicon glyphicon-step-backward\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(70, 'fast-backward', '<i class=\'glyphicon glyphicon-fast-backward\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(71, 'backward', '<i class=\'glyphicon glyphicon-backward\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(72, 'play', '<i class=\'glyphicon glyphicon-play\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(73, 'pause', '<i class=\'glyphicon glyphicon-pause\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(74, 'stop', '<i class=\'glyphicon glyphicon-stop\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(75, 'forward', '<i class=\'glyphicon glyphicon-forward\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(76, 'fast-forward', '<i class=\'glyphicon glyphicon-fast-forward\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(77, 'step-forward', '<i class=\'glyphicon glyphicon-step-forward\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(78, 'eject', '<i class=\'glyphicon glyphicon-eject\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(79, 'chevron-left', '<i class=\'glyphicon glyphicon-chevron-left\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(80, 'chevron-right', '<i class=\'glyphicon glyphicon-chevron-right\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(81, 'plus-sign', '<i class=\'glyphicon glyphicon-plus-sign\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(82, 'minus-sign', '<i class=\'glyphicon glyphicon-minus-sign\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(83, 'remove-sign', '<i class=\'glyphicon glyphicon-remove-sign\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(84, 'ok-sign', '<i class=\'glyphicon glyphicon-ok-sign\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(85, 'question-sign', '<i class=\'glyphicon glyphicon-question-sign\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(86, 'info-sign', '<i class=\'glyphicon glyphicon-info-sign\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(87, 'screenshot', '<i class=\'glyphicon glyphicon-screenshot\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(88, 'remove-circle', '<i class=\'glyphicon glyphicon-remove-circle\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(89, 'ok-circle', '<i class=\'glyphicon glyphicon-ok-circle\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(90, 'ban-circle', '<i class=\'glyphicon glyphicon-ban-circle\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(91, 'arrow-left', '<i class=\'glyphicon glyphicon-arrow-left\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(92, 'arrow-right', '<i class=\'glyphicon glyphicon-arrow-right\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(93, 'arrow-up', '<i class=\'glyphicon glyphicon-arrow-up\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(94, 'arrow-down', '<i class=\'glyphicon glyphicon-arrow-down\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(95, 'share-alt', '<i class=\'glyphicon glyphicon-share-alt\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(96, 'resize-full', '<i class=\'glyphicon glyphicon-resize-full\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(97, 'resize-small', '<i class=\'glyphicon glyphicon-resize-small\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(98, 'plus', '<i class=\'glyphicon glyphicon-plus\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(99, 'minus', '<i class=\'glyphicon glyphicon-minus\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(100, 'asterisk', '<i class=\'glyphicon glyphicon-asterisk\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(101, 'exclamation-sign', '<i class=\'glyphicon glyphicon-exclamation-sign\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(102, 'gift', '<i class=\'glyphicon glyphicon-gift\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(103, 'leaf', '<i class=\'glyphicon glyphicon-leaf\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(104, 'fire', '<i class=\'glyphicon glyphicon-fire\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(105, 'eye-open', '<i class=\'glyphicon glyphicon-eye-open\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(106, 'eye-close', '<i class=\'glyphicon glyphicon-eye-close\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(107, 'warning-sign', '<i class=\'glyphicon glyphicon-warning-sign\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(108, 'plane', '<i class=\'glyphicon glyphicon-plane\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(109, 'calendar', '<i class=\'glyphicon glyphicon-calendar\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(110, 'random', '<i class=\'glyphicon glyphicon-random\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(111, 'comment', '<i class=\'glyphicon glyphicon-comment\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(112, 'magnet', '<i class=\'glyphicon glyphicon-magnet\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(113, 'chevron-up', '<i class=\'glyphicon glyphicon-chevron-up\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(114, 'chevron-down', '<i class=\'glyphicon glyphicon-chevron-down\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(115, 'retweet', '<i class=\'glyphicon glyphicon-retweet\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(116, 'shopping-cart', '<i class=\'glyphicon glyphicon-shopping-cart\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(117, 'folder-close', '<i class=\'glyphicon glyphicon-folder-close\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(118, 'folder-open', '<i class=\'glyphicon glyphicon-folder-open\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(119, 'resize-vertical', '<i class=\'glyphicon glyphicon-resize-vertical\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(120, 'resize-horizontal', '<i class=\'glyphicon glyphicon-resize-horizontal\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(121, 'hdd', '<i class=\'glyphicon glyphicon-hdd\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(122, 'bullhorn', '<i class=\'glyphicon glyphicon-bullhorn\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(123, 'bell', '<i class=\'glyphicon glyphicon-bell\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(124, 'certificate', '<i class=\'glyphicon glyphicon-certificate\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(125, 'thumbs-up', '<i class=\'glyphicon glyphicon-thumbs-up\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(126, 'thumbs-down', '<i class=\'glyphicon glyphicon-thumbs-down\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(127, 'hand-right', '<i class=\'glyphicon glyphicon-hand-right\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(128, 'hand-left', '<i class=\'glyphicon glyphicon-hand-left\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(129, 'hand-up', '<i class=\'glyphicon glyphicon-hand-up\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(130, 'hand-down', '<i class=\'glyphicon glyphicon-hand-down\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(131, 'circle-arrow-right', '<i class=\'glyphicon glyphicon-circle-arrow-right\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(132, 'circle-arrow-left', '<i class=\'glyphicon glyphicon-circle-arrow-left\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(133, 'circle-arrow-up', '<i class=\'glyphicon glyphicon-circle-arrow-up\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(134, 'circle-arrow-down', '<i class=\'glyphicon glyphicon-circle-arrow-down\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(135, 'globe', '<i class=\'glyphicon glyphicon-globe\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(136, 'wrench', '<i class=\'glyphicon glyphicon-wrench\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(137, 'tasks', '<i class=\'glyphicon glyphicon-tasks\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(138, 'filter', '<i class=\'glyphicon glyphicon-filter\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(139, 'briefcase', '<i class=\'glyphicon glyphicon-briefcase\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(140, 'fullscreen', '<i class=\'glyphicon glyphicon-fullscreen\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(141, 'dashboard', '<i class=\'glyphicon glyphicon-dashboard\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(142, 'paperclipn', '<i class=\'glyphicon glyphicon-paperclip\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(143, 'heart-empty', '<i class=\'glyphicon glyphicon-heart-empty\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(144, 'link', '<i class=\'glyphicon glyphicon-link\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(145, 'phone', '<i class=\'glyphicon glyphicon-phone\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(146, 'pushpin', '<i class=\'glyphicon glyphicon-pushpin\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(147, 'euro', '<i class=\'glyphicon glyphicon-euro\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(148, 'usd', '<i class=\'glyphicon glyphicon-usd\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(149, 'gbp', '<i class=\'glyphicon glyphicon-gbp\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(150, 'sort', '<i class=\'glyphicon glyphicon-sort\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(151, 'sort-by-alphabet', '<i class=\'glyphicon glyphicon-sort-by-alphabet\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(152, 'sort-by-alphabet-alt', '<i class=\'glyphicon glyphicon-sort-by-alphabet-alt\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(153, 'sort-by-order', '<i class=\'glyphicon glyphicon-sort-by-order\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(154, 'sort-by-order-alt', '<i class=\'glyphicon glyphicon-sort-by-order-alt\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(155, 'sort-by-attributes', '<i class=\'glyphicon glyphicon-sort-by-attributes\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(156, 'sort-by-attributes-alt', '<i class=\'glyphicon glyphicon-sort-by-attributes-alt\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(157, 'unchecked', '<i class=\'glyphicon glyphicon-unchecked\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(158, 'expand', '<i class=\'glyphicon glyphicon-expand\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(159, 'collapse-down', '<i class=\'glyphicon glyphicon-collapse-down\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(160, 'collapse-top', '<i class=\'glyphicon glyphicon-collapse-up\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(161, 'log-in', '<i class=\'glyphicon glyphicon-log-in\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(162, 'flash', '<i class=\'glyphicon glyphicon-flash\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(163, 'log-out', '<i class=\'glyphicon glyphicon-log-out\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(164, 'new-window', '<i class=\'glyphicon glyphicon-new-window\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(165, 'record', '<i class=\'glyphicon glyphicon-record\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(166, 'save', '<i class=\'glyphicon glyphicon-save\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(167, 'open', '<i class=\'glyphicon glyphicon-open\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(168, 'saved', '<i class=\'glyphicon glyphicon-saved\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(169, 'import', '<i class=\'glyphicon glyphicon-import\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(170, 'export', '<i class=\'glyphicon glyphicon-export\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(171, 'send', '<i class=\'glyphicon glyphicon-send\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(172, 'floppy-disk', '<i class=\'glyphicon glyphicon-floppy-disk\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(173, 'floppy-saved', '<i class=\'glyphicon glyphicon-floppy-saved\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(174, 'floppy-remove', '<i class=\'glyphicon glyphicon-floppy-remove\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(175, 'floppy-save', '<i class=\'glyphicon glyphicon-floppy-save\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(176, 'floppy-open', '<i class=\'glyphicon glyphicon-floppy-open\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(177, 'credit-card', '<i class=\'glyphicon glyphicon-credit-card\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(178, 'transfer', '<i class=\'glyphicon glyphicon-transfer\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(179, 'cutlery', '<i class=\'glyphicon glyphicon-cutlery\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(180, 'header', '<i class=\'glyphicon glyphicon-header\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(181, 'compressed', '<i class=\'glyphicon glyphicon-compressed\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(182, 'earphone', '<i class=\'glyphicon glyphicon-earphone\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(183, 'phone-alt', '<i class=\'glyphicon glyphicon-phone-alt\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(184, 'tower', '<i class=\'glyphicon glyphicon-tower\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(185, 'stats', '<i class=\'glyphicon glyphicon-stats\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(186, 'sd-video', '<i class=\'glyphicon glyphicon-sd-video\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(187, 'hd-video', '<i class=\'glyphicon glyphicon-hd-video\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(188, 'subtitles', '<i class=\'glyphicon glyphicon-subtitles\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(189, 'sound-stereo', '<i class=\'glyphicon glyphicon-sound-stereo\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(190, 'sound-dolby', '<i class=\'glyphicon glyphicon-sound-dolby\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(191, 'sound-5-1', '<i class=\'glyphicon glyphicon-sound-5-1\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(192, 'sound-6-1', '<i class=\'glyphicon glyphicon-sound-6-1\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(193, 'sound-7-1', '<i class=\'glyphicon glyphicon-sound-7-1\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(194, 'copyright-mark', '<i class=\'glyphicon glyphicon-copyright-mark\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(195, 'registration-mark', '<i class=\'glyphicon glyphicon-registration-mark\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(196, 'cloud', '<i class=\'glyphicon glyphicon-cloud\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(197, 'cloud-download', '<i class=\'glyphicon glyphicon-cloud-download\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(198, 'cloud-upload', '<i class=\'glyphicon glyphicon-cloud-upload\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(199, 'tree-conifer', '<i class=\'glyphicon glyphicon-tree-conifer\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(200, 'tree-deciduous', '<i class=\'glyphicon glyphicon-tree-deciduous\'></i>', 'b');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(201, 'address-book', '<i class=\'fa fa-address-book\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(202, 'address-book-o', '<i class=\'fa fa-address-book-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(203, 'address-card', '<i class=\'fa fa-address-card\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(204, 'address-card-o', '<i class=\'fa fa-address-card-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(205, 'bandcamp', '<i class=\'fa fa-bandcamp\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(206, 'bath', '<i class=\'fa fa-bath\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(207, 'bathtub <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-bathtub\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(208, 'drivers-license <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-drivers-license\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(209, 'drivers-license-o <span class=\'text-muted\'>(alias)</', '<i class=\'fa fa-drivers-license-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(210, 'eercast', '<i class=\'fa fa-eercast\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(211, 'envelope-open', '<i class=\'fa fa-envelope-open\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(212, 'envelope-open-o', '<i class=\'fa fa-envelope-open-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(213, 'etsy', '<i class=\'fa fa-etsy\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(214, 'free-code-camp', '<i class=\'fa fa-free-code-camp\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(215, 'grav', '<i class=\'fa fa-grav\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(216, 'handshake-o', '<i class=\'fa fa-handshake-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(217, 'id-badge', '<i class=\'fa fa-id-badge\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(218, 'id-card', '<i class=\'fa fa-id-card\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(219, 'id-card-o', '<i class=\'fa fa-id-card-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(220, 'imdb', '<i class=\'fa fa-imdb\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(221, 'linode', '<i class=\'fa fa-linode\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(222, 'meetup', '<i class=\'fa fa-meetup\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(223, 'microchip', '<i class=\'fa fa-microchip\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(224, 'podcast', '<i class=\'fa fa-podcast\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(225, 'quora', '<i class=\'fa fa-quora\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(226, 'ravelry', '<i class=\'fa fa-ravelry\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(227, 's15 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-s15\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(228, 'shower', '<i class=\'fa fa-shower\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(229, 'snowflake-o', '<i class=\'fa fa-snowflake-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(230, 'superpowers', '<i class=\'fa fa-superpowers\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(231, 'telegram', '<i class=\'fa fa-telegram\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(232, 'thermometer <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-thermometer\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(233, 'thermometer-0 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-thermometer-0\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(234, 'thermometer-1 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-thermometer-1\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(235, 'thermometer-2 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-thermometer-2\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(236, 'thermometer-3 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-thermometer-3\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(237, 'thermometer-4 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-thermometer-4\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(238, 'thermometer-empty', '<i class=\'fa fa-thermometer-empty\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(239, 'thermometer-full', '<i class=\'fa fa-thermometer-full\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(240, 'thermometer-half', '<i class=\'fa fa-thermometer-half\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(241, 'thermometer-quarter', '<i class=\'fa fa-thermometer-quarter\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(242, 'thermometer-three-quarters', '<i class=\'fa fa-thermometer-three-quarters\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(243, 'times-rectangle <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-times-rectangle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(244, 'times-rectangle-o <span class=\'text-muted\'>(alias)</', '<i class=\'fa fa-times-rectangle-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(245, 'user-circle', '<i class=\'fa fa-user-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(246, 'user-circle-o', '<i class=\'fa fa-user-circle-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(247, 'user-o', '<i class=\'fa fa-user-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(248, 'vcard <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-vcard\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(249, 'vcard-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-vcard-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(250, 'window-close', '<i class=\'fa fa-window-close\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(251, 'window-close-o', '<i class=\'fa fa-window-close-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(252, 'window-maximize', '<i class=\'fa fa-window-maximize\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(253, 'window-minimize', '<i class=\'fa fa-window-minimize\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(254, 'window-restore', '<i class=\'fa fa-window-restore\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(255, 'wpexplorer', '<i class=\'fa fa-wpexplorer\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(256, 'address-book', '<i class=\'fa fa-address-book\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(257, 'address-book-o', '<i class=\'fa fa-address-book-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(258, 'address-card', '<i class=\'fa fa-address-card\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(259, 'address-card-o', '<i class=\'fa fa-address-card-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(260, 'adjust', '<i class=\'fa fa-adjust\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(261, 'american-sign-language-interpreting', '<i class=\'fa fa-american-sign-language-interpreting\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(262, 'anchor', '<i class=\'fa fa-anchor\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(263, 'archive', '<i class=\'fa fa-archive\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(264, 'area-chart', '<i class=\'fa fa-area-chart\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(265, 'arrows', '<i class=\'fa fa-arrows\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(266, 'arrows-h', '<i class=\'fa fa-arrows-h\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(267, 'arrows-v', '<i class=\'fa fa-arrows-v\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(268, 'asl-interpreting <span class=\'text-muted\'>(alias)</span', '<i class=\'fa fa-asl-interpreting\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(269, 'assistive-listening-systems', '<i class=\'fa fa-assistive-listening-systems\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(270, 'asterisk', '<i class=\'fa fa-asterisk\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(271, 'at', '<i class=\'fa fa-at\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(272, 'audio-description', '<i class=\'fa fa-audio-description\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(273, 'automobile <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-automobile\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(274, 'balance-scale', '<i class=\'fa fa-balance-scale\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(275, 'ban', '<i class=\'fa fa-ban\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(276, 'bank <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-bank\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(277, 'bar-chart', '<i class=\'fa fa-bar-chart\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(278, 'bar-chart-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-bar-chart-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(279, 'barcode', '<i class=\'fa fa-barcode\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(280, 'bars', '<i class=\'fa fa-bars\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(281, 'bath', '<i class=\'fa fa-bath\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(282, 'bathtub <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-bathtub\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(283, 'battery <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-battery\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(284, 'battery-0 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-battery-0\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(285, 'battery-1 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-battery-1\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(286, 'battery-2 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-battery-2\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(287, 'battery-3 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-battery-3\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(288, 'battery-4 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-battery-4\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(289, 'battery-empty', '<i class=\'fa fa-battery-empty\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(290, 'battery-full', '<i class=\'fa fa-battery-full\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(291, 'battery-half', '<i class=\'fa fa-battery-half\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(292, 'battery-quarter', '<i class=\'fa fa-battery-quarter\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(293, 'battery-three-quarters', '<i class=\'fa fa-battery-three-quarters\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(294, 'bed', '<i class=\'fa fa-bed\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(295, 'beer', '<i class=\'fa fa-beer\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(296, 'bell', '<i class=\'fa fa-bell\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(297, 'bell-o', '<i class=\'fa fa-bell-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(298, 'bell-slash', '<i class=\'fa fa-bell-slash\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(299, 'bell-slash-o', '<i class=\'fa fa-bell-slash-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(300, 'bicycle', '<i class=\'fa fa-bicycle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(301, 'binoculars', '<i class=\'fa fa-binoculars\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(302, 'birthday-cake', '<i class=\'fa fa-birthday-cake\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(303, 'blind', '<i class=\'fa fa-blind\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(304, 'bluetooth', '<i class=\'fa fa-bluetooth\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(305, 'bluetooth-b', '<i class=\'fa fa-bluetooth-b\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(306, 'bolt', '<i class=\'fa fa-bolt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(307, 'bomb', '<i class=\'fa fa-bomb\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(308, 'book', '<i class=\'fa fa-book\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(309, 'bookmark', '<i class=\'fa fa-bookmark\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(310, 'bookmark-o', '<i class=\'fa fa-bookmark-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(311, 'braille', '<i class=\'fa fa-braille\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(312, 'briefcase', '<i class=\'fa fa-briefcase\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(313, 'bug', '<i class=\'fa fa-bug\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(314, 'building', '<i class=\'fa fa-building\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(315, 'building-o', '<i class=\'fa fa-building-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(316, 'bullhorn', '<i class=\'fa fa-bullhorn\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(317, 'bullseye', '<i class=\'fa fa-bullseye\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(318, 'bus', '<i class=\'fa fa-bus\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(319, 'cab <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-cab\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(320, 'calculator', '<i class=\'fa fa-calculator\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(321, 'calendar', '<i class=\'fa fa-calendar\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(322, 'calendar-check-o', '<i class=\'fa fa-calendar-check-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(323, 'calendar-minus-o', '<i class=\'fa fa-calendar-minus-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(324, 'calendar-o', '<i class=\'fa fa-calendar-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(325, 'calendar-plus-o', '<i class=\'fa fa-calendar-plus-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(326, 'calendar-times-o', '<i class=\'fa fa-calendar-times-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(327, 'camera', '<i class=\'fa fa-camera\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(328, 'camera-retro', '<i class=\'fa fa-camera-retro\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(329, 'car', '<i class=\'fa fa-car\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(330, 'caret-square-o-down', '<i class=\'fa fa-caret-square-o-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(331, 'caret-square-o-left', '<i class=\'fa fa-caret-square-o-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(332, 'caret-square-o-right', '<i class=\'fa fa-caret-square-o-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(333, 'caret-square-o-up', '<i class=\'fa fa-caret-square-o-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(334, 'cart-arrow-down', '<i class=\'fa fa-cart-arrow-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(335, 'cart-plus', '<i class=\'fa fa-cart-plus\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(336, 'cc', '<i class=\'fa fa-cc\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(337, 'certificate', '<i class=\'fa fa-certificate\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(338, 'check', '<i class=\'fa fa-check\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(339, 'check-circle', '<i class=\'fa fa-check-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(340, 'check-circle-o', '<i class=\'fa fa-check-circle-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(341, 'check-square', '<i class=\'fa fa-check-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(342, 'check-square-o', '<i class=\'fa fa-check-square-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(343, 'child', '<i class=\'fa fa-child\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(344, 'circle', '<i class=\'fa fa-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(345, 'circle-o', '<i class=\'fa fa-circle-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(346, 'circle-o-notch', '<i class=\'fa fa-circle-o-notch\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(347, 'circle-thin', '<i class=\'fa fa-circle-thin\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(348, 'clock-o', '<i class=\'fa fa-clock-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(349, 'clone', '<i class=\'fa fa-clone\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(350, 'close <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-close\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(351, 'cloud', '<i class=\'fa fa-cloud\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(352, 'cloud-download', '<i class=\'fa fa-cloud-download\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(353, 'cloud-upload', '<i class=\'fa fa-cloud-upload\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(354, 'code', '<i class=\'fa fa-code\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(355, 'code-fork', '<i class=\'fa fa-code-fork\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(356, 'coffee', '<i class=\'fa fa-coffee\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(357, 'cog', '<i class=\'fa fa-cog\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(358, 'cogs', '<i class=\'fa fa-cogs\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(359, 'comment', '<i class=\'fa fa-comment\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(360, 'comment-o', '<i class=\'fa fa-comment-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(361, 'commenting', '<i class=\'fa fa-commenting\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(362, 'commenting-o', '<i class=\'fa fa-commenting-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(363, 'comments', '<i class=\'fa fa-comments\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(364, 'comments-o', '<i class=\'fa fa-comments-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(365, 'compass', '<i class=\'fa fa-compass\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(366, 'copyright', '<i class=\'fa fa-copyright\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(367, 'creative-commons', '<i class=\'fa fa-creative-commons\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(368, 'credit-card', '<i class=\'fa fa-credit-card\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(369, 'credit-card-alt', '<i class=\'fa fa-credit-card-alt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(370, 'crop', '<i class=\'fa fa-crop\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(371, 'crosshairs', '<i class=\'fa fa-crosshairs\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(372, 'cube', '<i class=\'fa fa-cube\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(373, 'cubes', '<i class=\'fa fa-cubes\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(374, 'cutlery', '<i class=\'fa fa-cutlery\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(375, 'dashboard <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-dashboard\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(376, 'database', '<i class=\'fa fa-database\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(377, 'deaf', '<i class=\'fa fa-deaf\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(378, 'deafness <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-deafness\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(379, 'desktop', '<i class=\'fa fa-desktop\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(380, 'diamond', '<i class=\'fa fa-diamond\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(381, 'dot-circle-o', '<i class=\'fa fa-dot-circle-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(382, 'download', '<i class=\'fa fa-download\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(383, 'drivers-license <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-drivers-license\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(384, 'drivers-license-o <span class=\'text-muted\'>(alias)</', '<i class=\'fa fa-drivers-license-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(385, 'edit <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-edit\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(386, 'ellipsis-h', '<i class=\'fa fa-ellipsis-h\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(387, 'ellipsis-v', '<i class=\'fa fa-ellipsis-v\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(388, 'envelope', '<i class=\'fa fa-envelope\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(389, 'envelope-o', '<i class=\'fa fa-envelope-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(390, 'envelope-open', '<i class=\'fa fa-envelope-open\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(391, 'envelope-open-o', '<i class=\'fa fa-envelope-open-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(392, 'envelope-square', '<i class=\'fa fa-envelope-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(393, 'eraser', '<i class=\'fa fa-eraser\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(394, 'exchange', '<i class=\'fa fa-exchange\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(395, 'exclamation', '<i class=\'fa fa-exclamation\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(396, 'exclamation-circle', '<i class=\'fa fa-exclamation-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(397, 'exclamation-triangle', '<i class=\'fa fa-exclamation-triangle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(398, 'external-link', '<i class=\'fa fa-external-link\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(399, 'external-link-square', '<i class=\'fa fa-external-link-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(400, 'eye', '<i class=\'fa fa-eye\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(401, 'eye-slash', '<i class=\'fa fa-eye-slash\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(402, 'eyedropper', '<i class=\'fa fa-eyedropper\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(403, 'fax', '<i class=\'fa fa-fax\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(404, 'feed <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-feed\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(405, 'female', '<i class=\'fa fa-female\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(406, 'fighter-jet', '<i class=\'fa fa-fighter-jet\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(407, 'file-archive-o', '<i class=\'fa fa-file-archive-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(408, 'file-audio-o', '<i class=\'fa fa-file-audio-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(409, 'file-code-o', '<i class=\'fa fa-file-code-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(410, 'file-excel-o', '<i class=\'fa fa-file-excel-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(411, 'file-image-o', '<i class=\'fa fa-file-image-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(412, 'file-movie-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-file-movie-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(413, 'file-pdf-o', '<i class=\'fa fa-file-pdf-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(414, 'file-photo-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-file-photo-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(415, 'file-picture-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-file-picture-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(416, 'file-powerpoint-o', '<i class=\'fa fa-file-powerpoint-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(417, 'file-sound-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-file-sound-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(418, 'file-video-o', '<i class=\'fa fa-file-video-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(419, 'file-word-o', '<i class=\'fa fa-file-word-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(420, 'file-zip-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-file-zip-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(421, 'film', '<i class=\'fa fa-film\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(422, 'filter', '<i class=\'fa fa-filter\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(423, 'fire', '<i class=\'fa fa-fire\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(424, 'fire-extinguisher', '<i class=\'fa fa-fire-extinguisher\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(425, 'flag', '<i class=\'fa fa-flag\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(426, 'flag-checkered', '<i class=\'fa fa-flag-checkered\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(427, 'flag-o', '<i class=\'fa fa-flag-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(428, 'flash <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-flash\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(429, 'flask', '<i class=\'fa fa-flask\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(430, 'folder', '<i class=\'fa fa-folder\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(431, 'folder-o', '<i class=\'fa fa-folder-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(432, 'folder-open', '<i class=\'fa fa-folder-open\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(433, 'folder-open-o', '<i class=\'fa fa-folder-open-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(434, 'frown-o', '<i class=\'fa fa-frown-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(435, 'futbol-o', '<i class=\'fa fa-futbol-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(436, 'gamepad', '<i class=\'fa fa-gamepad\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(437, 'gavel', '<i class=\'fa fa-gavel\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(438, 'gear <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-gear\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(439, 'gears <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-gears\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(440, 'gift', '<i class=\'fa fa-gift\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(441, 'glass', '<i class=\'fa fa-glass\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(442, 'globe', '<i class=\'fa fa-globe\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(443, 'graduation-cap', '<i class=\'fa fa-graduation-cap\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(444, 'group <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-group\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(445, 'hand-grab-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-hand-grab-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(446, 'hand-lizard-o', '<i class=\'fa fa-hand-lizard-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(447, 'hand-paper-o', '<i class=\'fa fa-hand-paper-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(448, 'hand-peace-o', '<i class=\'fa fa-hand-peace-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(449, 'hand-pointer-o', '<i class=\'fa fa-hand-pointer-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(450, 'hand-rock-o', '<i class=\'fa fa-hand-rock-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(451, 'hand-scissors-o', '<i class=\'fa fa-hand-scissors-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(452, 'hand-spock-o', '<i class=\'fa fa-hand-spock-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(453, 'hand-stop-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-hand-stop-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(454, 'handshake-o', '<i class=\'fa fa-handshake-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(455, 'hard-of-hearing <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-hard-of-hearing\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(456, 'hashtag', '<i class=\'fa fa-hashtag\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(457, 'hdd-o', '<i class=\'fa fa-hdd-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(458, 'headphones', '<i class=\'fa fa-headphones\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(459, 'heart', '<i class=\'fa fa-heart\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(460, 'heart-o', '<i class=\'fa fa-heart-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(461, 'heartbeat', '<i class=\'fa fa-heartbeat\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(462, 'history', '<i class=\'fa fa-history\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(463, 'home', '<i class=\'fa fa-home\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(464, 'hotel <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-hotel\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(465, 'hourglass', '<i class=\'fa fa-hourglass\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(466, 'hourglass-1 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-hourglass-1\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(467, 'hourglass-2 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-hourglass-2\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(468, 'hourglass-3 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-hourglass-3\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(469, 'hourglass-end', '<i class=\'fa fa-hourglass-end\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(470, 'hourglass-half', '<i class=\'fa fa-hourglass-half\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(471, 'hourglass-o', '<i class=\'fa fa-hourglass-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(472, 'hourglass-start', '<i class=\'fa fa-hourglass-start\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(473, 'i-cursor', '<i class=\'fa fa-i-cursor\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(474, 'id-badge', '<i class=\'fa fa-id-badge\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(475, 'id-card', '<i class=\'fa fa-id-card\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(476, 'id-card-o', '<i class=\'fa fa-id-card-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(477, 'image <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-image\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(478, 'inbox', '<i class=\'fa fa-inbox\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(479, 'industry', '<i class=\'fa fa-industry\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(480, 'info', '<i class=\'fa fa-info\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(481, 'info-circle', '<i class=\'fa fa-info-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(482, 'institution <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-institution\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(483, 'key', '<i class=\'fa fa-key\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(484, 'keyboard-o', '<i class=\'fa fa-keyboard-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(485, 'language', '<i class=\'fa fa-language\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(486, 'laptop', '<i class=\'fa fa-laptop\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(487, 'leaf', '<i class=\'fa fa-leaf\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(488, 'legal <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-legal\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(489, 'lemon-o', '<i class=\'fa fa-lemon-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(490, 'level-down', '<i class=\'fa fa-level-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(491, 'level-up', '<i class=\'fa fa-level-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(492, 'life-bouy <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-life-bouy\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(493, 'life-buoy <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-life-buoy\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(494, 'life-ring', '<i class=\'fa fa-life-ring\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(495, 'life-saver <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-life-saver\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(496, 'lightbulb-o', '<i class=\'fa fa-lightbulb-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(497, 'line-chart', '<i class=\'fa fa-line-chart\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(498, 'location-arrow', '<i class=\'fa fa-location-arrow\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(499, 'lock', '<i class=\'fa fa-lock\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(500, 'low-vision', '<i class=\'fa fa-low-vision\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(501, 'magic', '<i class=\'fa fa-magic\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(502, 'magnet', '<i class=\'fa fa-magnet\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(503, 'mail-forward <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-mail-forward\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(504, 'mail-reply <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-mail-reply\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(505, 'mail-reply-all <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-mail-reply-all\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(506, 'male', '<i class=\'fa fa-male\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(507, 'map', '<i class=\'fa fa-map\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(508, 'map-marker', '<i class=\'fa fa-map-marker\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(509, 'map-o', '<i class=\'fa fa-map-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(510, 'map-pin', '<i class=\'fa fa-map-pin\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(511, 'map-signs', '<i class=\'fa fa-map-signs\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(512, 'meh-o', '<i class=\'fa fa-meh-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(513, 'microchip', '<i class=\'fa fa-microchip\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(514, 'microphone', '<i class=\'fa fa-microphone\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(515, 'microphone-slash', '<i class=\'fa fa-microphone-slash\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(516, 'minus', '<i class=\'fa fa-minus\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(517, 'minus-circle', '<i class=\'fa fa-minus-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(518, 'minus-square', '<i class=\'fa fa-minus-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(519, 'minus-square-o', '<i class=\'fa fa-minus-square-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(520, 'mobile', '<i class=\'fa fa-mobile\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(521, 'mobile-phone <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-mobile-phone\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(522, 'money', '<i class=\'fa fa-money\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(523, 'moon-o', '<i class=\'fa fa-moon-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(524, 'mortar-board <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-mortar-board\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(525, 'motorcycle', '<i class=\'fa fa-motorcycle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(526, 'mouse-pointer', '<i class=\'fa fa-mouse-pointer\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(527, 'music', '<i class=\'fa fa-music\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(528, 'navicon <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-navicon\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(529, 'newspaper-o', '<i class=\'fa fa-newspaper-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(530, 'object-group', '<i class=\'fa fa-object-group\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(531, 'object-ungroup', '<i class=\'fa fa-object-ungroup\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(532, 'paint-brush', '<i class=\'fa fa-paint-brush\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(533, 'paper-plane', '<i class=\'fa fa-paper-plane\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(534, 'paper-plane-o', '<i class=\'fa fa-paper-plane-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(535, 'paw', '<i class=\'fa fa-paw\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(536, 'pencil', '<i class=\'fa fa-pencil\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(537, 'pencil-square', '<i class=\'fa fa-pencil-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(538, 'pencil-square-o', '<i class=\'fa fa-pencil-square-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(539, 'percent', '<i class=\'fa fa-percent\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(540, 'phone', '<i class=\'fa fa-phone\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(541, 'phone-square', '<i class=\'fa fa-phone-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(542, 'photo <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-photo\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(543, 'picture-o', '<i class=\'fa fa-picture-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(544, 'pie-chart', '<i class=\'fa fa-pie-chart\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(545, 'plane', '<i class=\'fa fa-plane\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(546, 'plug', '<i class=\'fa fa-plug\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(547, 'plus', '<i class=\'fa fa-plus\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(548, 'plus-circle', '<i class=\'fa fa-plus-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(549, 'plus-square', '<i class=\'fa fa-plus-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(550, 'plus-square-o', '<i class=\'fa fa-plus-square-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(551, 'podcast', '<i class=\'fa fa-podcast\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(552, 'power-off', '<i class=\'fa fa-power-off\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(553, 'print', '<i class=\'fa fa-print\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(554, 'puzzle-piece', '<i class=\'fa fa-puzzle-piece\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(555, 'qrcode', '<i class=\'fa fa-qrcode\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(556, 'question', '<i class=\'fa fa-question\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(557, 'question-circle', '<i class=\'fa fa-question-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(558, 'question-circle-o', '<i class=\'fa fa-question-circle-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(559, 'quote-left', '<i class=\'fa fa-quote-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(560, 'quote-right', '<i class=\'fa fa-quote-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(561, 'random', '<i class=\'fa fa-random\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(562, 'recycle', '<i class=\'fa fa-recycle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(563, 'refresh', '<i class=\'fa fa-refresh\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(564, 'registered', '<i class=\'fa fa-registered\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(565, 'remove <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-remove\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(566, 'reorder <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-reorder\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(567, 'reply', '<i class=\'fa fa-reply\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(568, 'reply-all', '<i class=\'fa fa-reply-all\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(569, 'retweet', '<i class=\'fa fa-retweet\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(570, 'road', '<i class=\'fa fa-road\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(571, 'rocket', '<i class=\'fa fa-rocket\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(572, 'rss', '<i class=\'fa fa-rss\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(573, 'rss-square', '<i class=\'fa fa-rss-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(574, 's15 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-s15\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(575, 'search', '<i class=\'fa fa-search\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(576, 'search-minus', '<i class=\'fa fa-search-minus\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(577, 'search-plus', '<i class=\'fa fa-search-plus\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(578, 'send <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-send\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(579, 'send-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-send-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(580, 'server', '<i class=\'fa fa-server\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(581, 'share', '<i class=\'fa fa-share\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(582, 'share-alt', '<i class=\'fa fa-share-alt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(583, 'share-alt-square', '<i class=\'fa fa-share-alt-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(584, 'share-square', '<i class=\'fa fa-share-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(585, 'share-square-o', '<i class=\'fa fa-share-square-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(586, 'shield', '<i class=\'fa fa-shield\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(587, 'ship', '<i class=\'fa fa-ship\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(588, 'shopping-bag', '<i class=\'fa fa-shopping-bag\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(589, 'shopping-basket', '<i class=\'fa fa-shopping-basket\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(590, 'shopping-cart', '<i class=\'fa fa-shopping-cart\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(591, 'shower', '<i class=\'fa fa-shower\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(592, 'sign-in', '<i class=\'fa fa-sign-in\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(593, 'sign-language', '<i class=\'fa fa-sign-language\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(594, 'sign-out', '<i class=\'fa fa-sign-out\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(595, 'signal', '<i class=\'fa fa-signal\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(596, 'signing <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-signing\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(597, 'sitemap', '<i class=\'fa fa-sitemap\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(598, 'sliders', '<i class=\'fa fa-sliders\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(599, 'smile-o', '<i class=\'fa fa-smile-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(600, 'snowflake-o', '<i class=\'fa fa-snowflake-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(601, 'soccer-ball-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-soccer-ball-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(602, 'sort', '<i class=\'fa fa-sort\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(603, 'sort-alpha-asc', '<i class=\'fa fa-sort-alpha-asc\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(604, 'sort-alpha-desc', '<i class=\'fa fa-sort-alpha-desc\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(605, 'sort-amount-asc', '<i class=\'fa fa-sort-amount-asc\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(606, 'sort-amount-desc', '<i class=\'fa fa-sort-amount-desc\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(607, 'sort-asc', '<i class=\'fa fa-sort-asc\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(608, 'sort-desc', '<i class=\'fa fa-sort-desc\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(609, 'sort-down <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-sort-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(610, 'sort-numeric-asc', '<i class=\'fa fa-sort-numeric-asc\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(611, 'sort-numeric-desc', '<i class=\'fa fa-sort-numeric-desc\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(612, 'sort-up <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-sort-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(613, 'space-shuttle', '<i class=\'fa fa-space-shuttle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(614, 'spinner', '<i class=\'fa fa-spinner\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(615, 'spoon', '<i class=\'fa fa-spoon\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(616, 'square', '<i class=\'fa fa-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(617, 'square-o', '<i class=\'fa fa-square-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(618, 'star', '<i class=\'fa fa-star\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(619, 'star-half', '<i class=\'fa fa-star-half\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(620, 'star-half-empty <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-star-half-empty\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(621, 'star-half-full <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-star-half-full\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(622, 'star-half-o', '<i class=\'fa fa-star-half-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(623, 'star-o', '<i class=\'fa fa-star-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(624, 'sticky-note', '<i class=\'fa fa-sticky-note\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(625, 'sticky-note-o', '<i class=\'fa fa-sticky-note-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(626, 'street-view', '<i class=\'fa fa-street-view\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(627, 'suitcase', '<i class=\'fa fa-suitcase\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(628, 'sun-o', '<i class=\'fa fa-sun-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(629, 'support <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-support\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(630, 'tablet', '<i class=\'fa fa-tablet\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(631, 'tachometer', '<i class=\'fa fa-tachometer\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(632, 'tag', '<i class=\'fa fa-tag\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(633, 'tags', '<i class=\'fa fa-tags\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(634, 'tasks', '<i class=\'fa fa-tasks\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(635, 'taxi', '<i class=\'fa fa-taxi\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(636, 'television', '<i class=\'fa fa-television\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(637, 'terminal', '<i class=\'fa fa-terminal\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(638, 'thermometer <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-thermometer\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(639, 'thermometer-0 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-thermometer-0\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(640, 'thermometer-1 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-thermometer-1\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(641, 'thermometer-2 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-thermometer-2\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(642, 'thermometer-3 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-thermometer-3\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(643, 'thermometer-4 <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-thermometer-4\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(644, 'thermometer-empty', '<i class=\'fa fa-thermometer-empty\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(645, 'thermometer-full', '<i class=\'fa fa-thermometer-full\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(646, 'thermometer-half', '<i class=\'fa fa-thermometer-half\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(647, 'thermometer-quarter', '<i class=\'fa fa-thermometer-quarter\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(648, 'thermometer-three-quarters', '<i class=\'fa fa-thermometer-three-quarters\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(649, 'thumb-tack', '<i class=\'fa fa-thumb-tack\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(650, 'thumbs-down', '<i class=\'fa fa-thumbs-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(651, 'thumbs-o-down', '<i class=\'fa fa-thumbs-o-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(652, 'thumbs-o-up', '<i class=\'fa fa-thumbs-o-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(653, 'thumbs-up', '<i class=\'fa fa-thumbs-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(654, 'ticket', '<i class=\'fa fa-ticket\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(655, 'times', '<i class=\'fa fa-times\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(656, 'times-circle', '<i class=\'fa fa-times-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(657, 'times-circle-o', '<i class=\'fa fa-times-circle-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(658, 'times-rectangle <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-times-rectangle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(659, 'times-rectangle-o <span class=\'text-muted\'>(alias)</', '<i class=\'fa fa-times-rectangle-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(660, 'tint', '<i class=\'fa fa-tint\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(661, 'toggle-down <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-toggle-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(662, 'toggle-left <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-toggle-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(663, 'toggle-off', '<i class=\'fa fa-toggle-off\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(664, 'toggle-on', '<i class=\'fa fa-toggle-on\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(665, 'toggle-right <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-toggle-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(666, 'toggle-up <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-toggle-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(667, 'trademark', '<i class=\'fa fa-trademark\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(668, 'trash', '<i class=\'fa fa-trash\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(669, 'trash-o', '<i class=\'fa fa-trash-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(670, 'tree', '<i class=\'fa fa-tree\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(671, 'trophy', '<i class=\'fa fa-trophy\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(672, 'truck', '<i class=\'fa fa-truck\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(673, 'tty', '<i class=\'fa fa-tty\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(674, 'tv <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-tv\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(675, 'umbrella', '<i class=\'fa fa-umbrella\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(676, 'universal-access', '<i class=\'fa fa-universal-access\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(677, 'university', '<i class=\'fa fa-university\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(678, 'unlock', '<i class=\'fa fa-unlock\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(679, 'unlock-alt', '<i class=\'fa fa-unlock-alt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(680, 'unsorted <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-unsorted\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(681, 'upload', '<i class=\'fa fa-upload\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(682, 'user', '<i class=\'fa fa-user\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(683, 'user-circle', '<i class=\'fa fa-user-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(684, 'user-circle-o', '<i class=\'fa fa-user-circle-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(685, 'user-o', '<i class=\'fa fa-user-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(686, 'user-plus', '<i class=\'fa fa-user-plus\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(687, 'user-secret', '<i class=\'fa fa-user-secret\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(688, 'user-times', '<i class=\'fa fa-user-times\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(689, 'users', '<i class=\'fa fa-users\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(690, 'vcard <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-vcard\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(691, 'vcard-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-vcard-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(692, 'video-camera', '<i class=\'fa fa-video-camera\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(693, 'volume-control-phone', '<i class=\'fa fa-volume-control-phone\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(694, 'volume-down', '<i class=\'fa fa-volume-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(695, 'volume-off', '<i class=\'fa fa-volume-off\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(696, 'volume-up', '<i class=\'fa fa-volume-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(697, 'warning <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-warning\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(698, 'wheelchair', '<i class=\'fa fa-wheelchair\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(699, 'wheelchair-alt', '<i class=\'fa fa-wheelchair-alt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(700, 'wifi', '<i class=\'fa fa-wifi\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(701, 'window-close', '<i class=\'fa fa-window-close\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(702, 'window-close-o', '<i class=\'fa fa-window-close-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(703, 'window-maximize', '<i class=\'fa fa-window-maximize\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(704, 'window-minimize', '<i class=\'fa fa-window-minimize\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(705, 'window-restore', '<i class=\'fa fa-window-restore\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(706, 'wrench', '<i class=\'fa fa-wrench\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(707, 'american-sign-language-interpreting', '<i class=\'fa fa-american-sign-language-interpreting\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(708, 'asl-interpreting <span class=\'text-muted\'>(alias)</span', '<i class=\'fa fa-asl-interpreting\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(709, 'assistive-listening-systems', '<i class=\'fa fa-assistive-listening-systems\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(710, 'audio-description', '<i class=\'fa fa-audio-description\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(711, 'blind', '<i class=\'fa fa-blind\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(712, 'braille', '<i class=\'fa fa-braille\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(713, 'cc', '<i class=\'fa fa-cc\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(714, 'deaf', '<i class=\'fa fa-deaf\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(715, 'deafness <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-deafness\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(716, 'hard-of-hearing <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-hard-of-hearing\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(717, 'low-vision', '<i class=\'fa fa-low-vision\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(718, 'question-circle-o', '<i class=\'fa fa-question-circle-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(719, 'sign-language', '<i class=\'fa fa-sign-language\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(720, 'signing <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-signing\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(721, 'tty', '<i class=\'fa fa-tty\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(722, 'universal-access', '<i class=\'fa fa-universal-access\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(723, 'volume-control-phone', '<i class=\'fa fa-volume-control-phone\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(724, 'wheelchair', '<i class=\'fa fa-wheelchair\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(725, 'wheelchair-alt', '<i class=\'fa fa-wheelchair-alt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(726, 'hand-grab-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-hand-grab-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(727, 'hand-lizard-o', '<i class=\'fa fa-hand-lizard-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(728, 'hand-o-down', '<i class=\'fa fa-hand-o-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(729, 'hand-o-left', '<i class=\'fa fa-hand-o-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(730, 'hand-o-right', '<i class=\'fa fa-hand-o-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(731, 'hand-o-up', '<i class=\'fa fa-hand-o-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(732, 'hand-paper-o', '<i class=\'fa fa-hand-paper-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(733, 'hand-peace-o', '<i class=\'fa fa-hand-peace-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(734, 'hand-pointer-o', '<i class=\'fa fa-hand-pointer-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(735, 'hand-rock-o', '<i class=\'fa fa-hand-rock-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(736, 'hand-scissors-o', '<i class=\'fa fa-hand-scissors-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(737, 'hand-spock-o', '<i class=\'fa fa-hand-spock-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(738, 'hand-stop-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-hand-stop-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(739, 'thumbs-down', '<i class=\'fa fa-thumbs-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(740, 'thumbs-o-down', '<i class=\'fa fa-thumbs-o-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(741, 'thumbs-o-up', '<i class=\'fa fa-thumbs-o-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(742, 'thumbs-up', '<i class=\'fa fa-thumbs-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(743, 'ambulance', '<i class=\'fa fa-ambulance\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(744, 'automobile <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-automobile\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(745, 'bicycle', '<i class=\'fa fa-bicycle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(746, 'bus', '<i class=\'fa fa-bus\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(747, 'cab <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-cab\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(748, 'car', '<i class=\'fa fa-car\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(749, 'fighter-jet', '<i class=\'fa fa-fighter-jet\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(750, 'motorcycle', '<i class=\'fa fa-motorcycle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(751, 'plane', '<i class=\'fa fa-plane\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(752, 'rocket', '<i class=\'fa fa-rocket\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(753, 'ship', '<i class=\'fa fa-ship\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(754, 'space-shuttle', '<i class=\'fa fa-space-shuttle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(755, 'subway', '<i class=\'fa fa-subway\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(756, 'taxi', '<i class=\'fa fa-taxi\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(757, 'train', '<i class=\'fa fa-train\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(758, 'truck', '<i class=\'fa fa-truck\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(759, 'wheelchair', '<i class=\'fa fa-wheelchair\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(760, 'wheelchair-alt', '<i class=\'fa fa-wheelchair-alt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(761, 'genderless', '<i class=\'fa fa-genderless\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(762, 'intersex <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-intersex\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(763, 'mars', '<i class=\'fa fa-mars\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(764, 'mars-double', '<i class=\'fa fa-mars-double\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(765, 'mars-stroke', '<i class=\'fa fa-mars-stroke\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(766, 'mars-stroke-h', '<i class=\'fa fa-mars-stroke-h\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(767, 'mars-stroke-v', '<i class=\'fa fa-mars-stroke-v\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(768, 'mercury', '<i class=\'fa fa-mercury\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(769, 'neuter', '<i class=\'fa fa-neuter\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(770, 'transgender', '<i class=\'fa fa-transgender\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(771, 'transgender-alt', '<i class=\'fa fa-transgender-alt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(772, 'venus', '<i class=\'fa fa-venus\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(773, 'venus-double', '<i class=\'fa fa-venus-double\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(774, 'venus-mars', '<i class=\'fa fa-venus-mars\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(775, 'file', '<i class=\'fa fa-file\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(776, 'file-archive-o', '<i class=\'fa fa-file-archive-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(777, 'file-audio-o', '<i class=\'fa fa-file-audio-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(778, 'file-code-o', '<i class=\'fa fa-file-code-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(779, 'file-excel-o', '<i class=\'fa fa-file-excel-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(780, 'file-image-o', '<i class=\'fa fa-file-image-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(781, 'file-movie-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-file-movie-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(782, 'file-o', '<i class=\'fa fa-file-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(783, 'file-pdf-o', '<i class=\'fa fa-file-pdf-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(784, 'file-photo-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-file-photo-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(785, 'file-picture-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-file-picture-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(786, 'file-powerpoint-o', '<i class=\'fa fa-file-powerpoint-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(787, 'file-sound-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-file-sound-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(788, 'file-text', '<i class=\'fa fa-file-text\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(789, 'file-text-o', '<i class=\'fa fa-file-text-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(790, 'file-video-o', '<i class=\'fa fa-file-video-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(791, 'file-word-o', '<i class=\'fa fa-file-word-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(792, 'file-zip-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-file-zip-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(793, 'circle-o-notch', '<i class=\'fa fa-circle-o-notch\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(794, 'cog', '<i class=\'fa fa-cog\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(795, 'gear <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-gear\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(796, 'refresh', '<i class=\'fa fa-refresh\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(797, 'spinner', '<i class=\'fa fa-spinner\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(798, 'check-square', '<i class=\'fa fa-check-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(799, 'check-square-o', '<i class=\'fa fa-check-square-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(800, 'circle', '<i class=\'fa fa-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(801, 'circle-o', '<i class=\'fa fa-circle-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(802, 'dot-circle-o', '<i class=\'fa fa-dot-circle-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(803, 'minus-square', '<i class=\'fa fa-minus-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(804, 'minus-square-o', '<i class=\'fa fa-minus-square-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(805, 'plus-square', '<i class=\'fa fa-plus-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(806, 'plus-square-o', '<i class=\'fa fa-plus-square-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(807, 'square', '<i class=\'fa fa-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(808, 'square-o', '<i class=\'fa fa-square-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(809, 'cc-amex', '<i class=\'fa fa-cc-amex\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(810, 'cc-diners-club', '<i class=\'fa fa-cc-diners-club\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(811, 'cc-discover', '<i class=\'fa fa-cc-discover\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(812, 'cc-jcb', '<i class=\'fa fa-cc-jcb\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(813, 'cc-mastercard', '<i class=\'fa fa-cc-mastercard\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(814, 'cc-paypal', '<i class=\'fa fa-cc-paypal\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(815, 'cc-stripe', '<i class=\'fa fa-cc-stripe\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(816, 'cc-visa', '<i class=\'fa fa-cc-visa\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(817, 'credit-card', '<i class=\'fa fa-credit-card\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(818, 'credit-card-alt', '<i class=\'fa fa-credit-card-alt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(819, 'google-wallet', '<i class=\'fa fa-google-wallet\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(820, 'paypal', '<i class=\'fa fa-paypal\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(821, 'area-chart', '<i class=\'fa fa-area-chart\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(822, 'bar-chart', '<i class=\'fa fa-bar-chart\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(823, 'bar-chart-o <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-bar-chart-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(824, 'line-chart', '<i class=\'fa fa-line-chart\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(825, 'pie-chart', '<i class=\'fa fa-pie-chart\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(826, 'bitcoin <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-bitcoin\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(827, 'btc', '<i class=\'fa fa-btc\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(828, 'cny <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-cny\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(829, 'dollar <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-dollar\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(830, 'eur', '<i class=\'fa fa-eur\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(831, 'euro <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-euro\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(832, 'gbp', '<i class=\'fa fa-gbp\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(833, 'gg', '<i class=\'fa fa-gg\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(834, 'gg-circle', '<i class=\'fa fa-gg-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(835, 'ils', '<i class=\'fa fa-ils\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(836, 'inr', '<i class=\'fa fa-inr\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(837, 'jpy', '<i class=\'fa fa-jpy\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(838, 'krw', '<i class=\'fa fa-krw\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(839, 'money', '<i class=\'fa fa-money\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(840, 'rmb <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-rmb\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(841, 'rouble <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-rouble\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(842, 'rub', '<i class=\'fa fa-rub\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(843, 'ruble <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-ruble\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(844, 'rupee <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-rupee\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(845, 'shekel <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-shekel\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(846, 'sheqel <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-sheqel\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(847, 'try', '<i class=\'fa fa-try\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(848, 'turkish-lira <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-turkish-lira\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(849, 'usd', '<i class=\'fa fa-usd\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(850, 'viacoin', '<i class=\'fa fa-viacoin\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(851, 'won <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-won\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(852, 'yen <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-yen\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(853, 'align-center', '<i class=\'fa fa-align-center\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(854, 'align-justify', '<i class=\'fa fa-align-justify\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(855, 'align-left', '<i class=\'fa fa-align-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(856, 'align-right', '<i class=\'fa fa-align-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(857, 'bold', '<i class=\'fa fa-bold\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(858, 'chain <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-chain\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(859, 'chain-broken', '<i class=\'fa fa-chain-broken\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(860, 'clipboard', '<i class=\'fa fa-clipboard\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(861, 'columns', '<i class=\'fa fa-columns\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(862, 'copy <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-copy\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(863, 'cut <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-cut\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(864, 'dedent <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-dedent\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(865, 'eraser', '<i class=\'fa fa-eraser\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(866, 'file', '<i class=\'fa fa-file\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(867, 'file-o', '<i class=\'fa fa-file-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(868, 'file-text', '<i class=\'fa fa-file-text\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(869, 'file-text-o', '<i class=\'fa fa-file-text-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(870, 'files-o', '<i class=\'fa fa-files-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(871, 'floppy-o', '<i class=\'fa fa-floppy-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(872, 'font', '<i class=\'fa fa-font\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(873, 'header', '<i class=\'fa fa-header\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(874, 'indent', '<i class=\'fa fa-indent\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(875, 'italic', '<i class=\'fa fa-italic\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(876, 'link', '<i class=\'fa fa-link\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(877, 'list', '<i class=\'fa fa-list\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(878, 'list-alt', '<i class=\'fa fa-list-alt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(879, 'list-ol', '<i class=\'fa fa-list-ol\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(880, 'list-ul', '<i class=\'fa fa-list-ul\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(881, 'outdent', '<i class=\'fa fa-outdent\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(882, 'paperclip', '<i class=\'fa fa-paperclip\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(883, 'paragraph', '<i class=\'fa fa-paragraph\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(884, 'paste <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-paste\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(885, 'repeat', '<i class=\'fa fa-repeat\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(886, 'rotate-left <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-rotate-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(887, 'rotate-right <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-rotate-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(888, 'save <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-save\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(889, 'scissors', '<i class=\'fa fa-scissors\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(890, 'strikethrough', '<i class=\'fa fa-strikethrough\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(891, 'subscript', '<i class=\'fa fa-subscript\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(892, 'superscript', '<i class=\'fa fa-superscript\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(893, 'table', '<i class=\'fa fa-table\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(894, 'text-height', '<i class=\'fa fa-text-height\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(895, 'text-width', '<i class=\'fa fa-text-width\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(896, 'th', '<i class=\'fa fa-th\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(897, 'th-large', '<i class=\'fa fa-th-large\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(898, 'th-list', '<i class=\'fa fa-th-list\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(899, 'underline', '<i class=\'fa fa-underline\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(900, 'undo', '<i class=\'fa fa-undo\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(901, 'unlink <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-unlink\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(902, 'angle-double-down', '<i class=\'fa fa-angle-double-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(903, 'angle-double-left', '<i class=\'fa fa-angle-double-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(904, 'angle-double-right', '<i class=\'fa fa-angle-double-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(905, 'angle-double-up', '<i class=\'fa fa-angle-double-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(906, 'angle-down', '<i class=\'fa fa-angle-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(907, 'angle-left', '<i class=\'fa fa-angle-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(908, 'angle-right', '<i class=\'fa fa-angle-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(909, 'angle-up', '<i class=\'fa fa-angle-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(910, 'arrow-circle-down', '<i class=\'fa fa-arrow-circle-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(911, 'arrow-circle-left', '<i class=\'fa fa-arrow-circle-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(912, 'arrow-circle-o-down', '<i class=\'fa fa-arrow-circle-o-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(913, 'arrow-circle-o-left', '<i class=\'fa fa-arrow-circle-o-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(914, 'arrow-circle-o-right', '<i class=\'fa fa-arrow-circle-o-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(915, 'arrow-circle-o-up', '<i class=\'fa fa-arrow-circle-o-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(916, 'arrow-circle-right', '<i class=\'fa fa-arrow-circle-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(917, 'arrow-circle-up', '<i class=\'fa fa-arrow-circle-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(918, 'arrow-down', '<i class=\'fa fa-arrow-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(919, 'arrow-left', '<i class=\'fa fa-arrow-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(920, 'arrow-right', '<i class=\'fa fa-arrow-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(921, 'arrow-up', '<i class=\'fa fa-arrow-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(922, 'arrows', '<i class=\'fa fa-arrows\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(923, 'arrows-alt', '<i class=\'fa fa-arrows-alt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(924, 'arrows-h', '<i class=\'fa fa-arrows-h\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(925, 'arrows-v', '<i class=\'fa fa-arrows-v\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(926, 'caret-down', '<i class=\'fa fa-caret-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(927, 'caret-left', '<i class=\'fa fa-caret-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(928, 'caret-right', '<i class=\'fa fa-caret-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(929, 'caret-square-o-down', '<i class=\'fa fa-caret-square-o-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(930, 'caret-square-o-left', '<i class=\'fa fa-caret-square-o-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(931, 'caret-square-o-right', '<i class=\'fa fa-caret-square-o-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(932, 'caret-square-o-up', '<i class=\'fa fa-caret-square-o-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(933, 'caret-up', '<i class=\'fa fa-caret-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(934, 'chevron-circle-down', '<i class=\'fa fa-chevron-circle-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(935, 'chevron-circle-left', '<i class=\'fa fa-chevron-circle-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(936, 'chevron-circle-right', '<i class=\'fa fa-chevron-circle-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(937, 'chevron-circle-up', '<i class=\'fa fa-chevron-circle-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(938, 'chevron-down', '<i class=\'fa fa-chevron-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(939, 'chevron-left', '<i class=\'fa fa-chevron-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(940, 'chevron-right', '<i class=\'fa fa-chevron-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(941, 'chevron-up', '<i class=\'fa fa-chevron-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(942, 'exchange', '<i class=\'fa fa-exchange\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(943, 'hand-o-down', '<i class=\'fa fa-hand-o-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(944, 'hand-o-left', '<i class=\'fa fa-hand-o-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(945, 'hand-o-right', '<i class=\'fa fa-hand-o-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(946, 'hand-o-up', '<i class=\'fa fa-hand-o-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(947, 'long-arrow-down', '<i class=\'fa fa-long-arrow-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(948, 'long-arrow-left', '<i class=\'fa fa-long-arrow-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(949, 'long-arrow-right', '<i class=\'fa fa-long-arrow-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(950, 'long-arrow-up', '<i class=\'fa fa-long-arrow-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(951, 'toggle-down <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-toggle-down\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(952, 'toggle-left <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-toggle-left\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(953, 'toggle-right <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-toggle-right\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(954, 'toggle-up <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-toggle-up\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(955, 'arrows-alt', '<i class=\'fa fa-arrows-alt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(956, 'backward', '<i class=\'fa fa-backward\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(957, 'compress', '<i class=\'fa fa-compress\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(958, 'eject', '<i class=\'fa fa-eject\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(959, 'expand', '<i class=\'fa fa-expand\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(960, 'fast-backward', '<i class=\'fa fa-fast-backward\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(961, 'fast-forward', '<i class=\'fa fa-fast-forward\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(962, 'forward', '<i class=\'fa fa-forward\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(963, 'pause', '<i class=\'fa fa-pause\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(964, 'pause-circle', '<i class=\'fa fa-pause-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(965, 'pause-circle-o', '<i class=\'fa fa-pause-circle-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(966, 'play', '<i class=\'fa fa-play\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(967, 'play-circle', '<i class=\'fa fa-play-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(968, 'play-circle-o', '<i class=\'fa fa-play-circle-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(969, 'random', '<i class=\'fa fa-random\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(970, 'step-backward', '<i class=\'fa fa-step-backward\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(971, 'step-forward', '<i class=\'fa fa-step-forward\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(972, 'stop', '<i class=\'fa fa-stop\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(973, 'stop-circle', '<i class=\'fa fa-stop-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(974, 'stop-circle-o', '<i class=\'fa fa-stop-circle-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(975, 'youtube-play', '<i class=\'fa fa-youtube-play\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(976, '500px', '<i class=\'fa fa-500px\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(977, 'adn', '<i class=\'fa fa-adn\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(978, 'amazon', '<i class=\'fa fa-amazon\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(979, 'android', '<i class=\'fa fa-android\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(980, 'angellist', '<i class=\'fa fa-angellist\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(981, 'apple', '<i class=\'fa fa-apple\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(982, 'bandcamp', '<i class=\'fa fa-bandcamp\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(983, 'behance', '<i class=\'fa fa-behance\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(984, 'behance-square', '<i class=\'fa fa-behance-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(985, 'bitbucket', '<i class=\'fa fa-bitbucket\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(986, 'bitbucket-square', '<i class=\'fa fa-bitbucket-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(987, 'bitcoin <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-bitcoin\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(988, 'black-tie', '<i class=\'fa fa-black-tie\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(989, 'bluetooth', '<i class=\'fa fa-bluetooth\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(990, 'bluetooth-b', '<i class=\'fa fa-bluetooth-b\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(991, 'btc', '<i class=\'fa fa-btc\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(992, 'buysellads', '<i class=\'fa fa-buysellads\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(993, 'cc-amex', '<i class=\'fa fa-cc-amex\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(994, 'cc-diners-club', '<i class=\'fa fa-cc-diners-club\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(995, 'cc-discover', '<i class=\'fa fa-cc-discover\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(996, 'cc-jcb', '<i class=\'fa fa-cc-jcb\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(997, 'cc-mastercard', '<i class=\'fa fa-cc-mastercard\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(998, 'cc-paypal', '<i class=\'fa fa-cc-paypal\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(999, 'cc-stripe', '<i class=\'fa fa-cc-stripe\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1000, 'cc-visa', '<i class=\'fa fa-cc-visa\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1001, 'chrome', '<i class=\'fa fa-chrome\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1002, 'codepen', '<i class=\'fa fa-codepen\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1003, 'codiepie', '<i class=\'fa fa-codiepie\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1004, 'connectdevelop', '<i class=\'fa fa-connectdevelop\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1005, 'contao', '<i class=\'fa fa-contao\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1006, 'css3', '<i class=\'fa fa-css3\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1007, 'dashcube', '<i class=\'fa fa-dashcube\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1008, 'delicious', '<i class=\'fa fa-delicious\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1009, 'deviantart', '<i class=\'fa fa-deviantart\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1010, 'digg', '<i class=\'fa fa-digg\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1011, 'dribbble', '<i class=\'fa fa-dribbble\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1012, 'dropbox', '<i class=\'fa fa-dropbox\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1013, 'drupal', '<i class=\'fa fa-drupal\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1014, 'edge', '<i class=\'fa fa-edge\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1015, 'eercast', '<i class=\'fa fa-eercast\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1016, 'empire', '<i class=\'fa fa-empire\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1017, 'envira', '<i class=\'fa fa-envira\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1018, 'etsy', '<i class=\'fa fa-etsy\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1019, 'expeditedssl', '<i class=\'fa fa-expeditedssl\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1020, 'fa <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-fa\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1021, 'facebook', '<i class=\'fa fa-facebook\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1022, 'facebook-f <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-facebook-f\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1023, 'facebook-official', '<i class=\'fa fa-facebook-official\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1024, 'facebook-square', '<i class=\'fa fa-facebook-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1025, 'firefox', '<i class=\'fa fa-firefox\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1026, 'first-order', '<i class=\'fa fa-first-order\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1027, 'flickr', '<i class=\'fa fa-flickr\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1028, 'font-awesome', '<i class=\'fa fa-font-awesome\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1029, 'fonticons', '<i class=\'fa fa-fonticons\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1030, 'fort-awesome', '<i class=\'fa fa-fort-awesome\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1031, 'forumbee', '<i class=\'fa fa-forumbee\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1032, 'foursquare', '<i class=\'fa fa-foursquare\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1033, 'free-code-camp', '<i class=\'fa fa-free-code-camp\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1034, 'ge <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-ge\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1035, 'get-pocket', '<i class=\'fa fa-get-pocket\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1036, 'gg', '<i class=\'fa fa-gg\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1037, 'gg-circle', '<i class=\'fa fa-gg-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1038, 'git', '<i class=\'fa fa-git\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1039, 'git-square', '<i class=\'fa fa-git-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1040, 'github', '<i class=\'fa fa-github\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1041, 'github-alt', '<i class=\'fa fa-github-alt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1042, 'github-square', '<i class=\'fa fa-github-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1043, 'gitlab', '<i class=\'fa fa-gitlab\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1044, 'gittip <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-gittip\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1045, 'glide', '<i class=\'fa fa-glide\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1046, 'glide-g', '<i class=\'fa fa-glide-g\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1047, 'google', '<i class=\'fa fa-google\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1048, 'google-plus', '<i class=\'fa fa-google-plus\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1049, 'google-plus-circle <span class=\'text-muted\'>(alias)</', '<i class=\'fa fa-google-plus-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1050, 'google-plus-official', '<i class=\'fa fa-google-plus-official\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1051, 'google-plus-square', '<i class=\'fa fa-google-plus-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1052, 'google-wallet', '<i class=\'fa fa-google-wallet\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1053, 'gratipay', '<i class=\'fa fa-gratipay\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1054, 'grav', '<i class=\'fa fa-grav\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1055, 'hacker-news', '<i class=\'fa fa-hacker-news\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1056, 'houzz', '<i class=\'fa fa-houzz\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1057, 'html5', '<i class=\'fa fa-html5\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1058, 'imdb', '<i class=\'fa fa-imdb\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1059, 'instagram', '<i class=\'fa fa-instagram\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1060, 'internet-explorer', '<i class=\'fa fa-internet-explorer\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1061, 'ioxhost', '<i class=\'fa fa-ioxhost\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1062, 'joomla', '<i class=\'fa fa-joomla\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1063, 'jsfiddle', '<i class=\'fa fa-jsfiddle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1064, 'lastfm', '<i class=\'fa fa-lastfm\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1065, 'lastfm-square', '<i class=\'fa fa-lastfm-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1066, 'leanpub', '<i class=\'fa fa-leanpub\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1067, 'linkedin', '<i class=\'fa fa-linkedin\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1068, 'linkedin-square', '<i class=\'fa fa-linkedin-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1069, 'linode', '<i class=\'fa fa-linode\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1070, 'linux', '<i class=\'fa fa-linux\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1071, 'maxcdn', '<i class=\'fa fa-maxcdn\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1072, 'meanpath', '<i class=\'fa fa-meanpath\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1073, 'medium', '<i class=\'fa fa-medium\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1074, 'meetup', '<i class=\'fa fa-meetup\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1075, 'mixcloud', '<i class=\'fa fa-mixcloud\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1076, 'modx', '<i class=\'fa fa-modx\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1077, 'odnoklassniki', '<i class=\'fa fa-odnoklassniki\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1078, 'odnoklassniki-square', '<i class=\'fa fa-odnoklassniki-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1079, 'opencart', '<i class=\'fa fa-opencart\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1080, 'openid', '<i class=\'fa fa-openid\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1081, 'opera', '<i class=\'fa fa-opera\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1082, 'optin-monster', '<i class=\'fa fa-optin-monster\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1083, 'pagelines', '<i class=\'fa fa-pagelines\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1084, 'paypal', '<i class=\'fa fa-paypal\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1085, 'pied-piper', '<i class=\'fa fa-pied-piper\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1086, 'pied-piper-alt', '<i class=\'fa fa-pied-piper-alt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1087, 'pied-piper-pp', '<i class=\'fa fa-pied-piper-pp\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1088, 'pinterest', '<i class=\'fa fa-pinterest\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1089, 'pinterest-p', '<i class=\'fa fa-pinterest-p\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1090, 'pinterest-square', '<i class=\'fa fa-pinterest-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1091, 'product-hunt', '<i class=\'fa fa-product-hunt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1092, 'qq', '<i class=\'fa fa-qq\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1093, 'quora', '<i class=\'fa fa-quora\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1094, 'ra <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-ra\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1095, 'ravelry', '<i class=\'fa fa-ravelry\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1096, 'rebel', '<i class=\'fa fa-rebel\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1097, 'reddit', '<i class=\'fa fa-reddit\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1098, 'reddit-alien', '<i class=\'fa fa-reddit-alien\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1099, 'reddit-square', '<i class=\'fa fa-reddit-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1100, 'renren', '<i class=\'fa fa-renren\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1101, 'resistance <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-resistance\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1102, 'safari', '<i class=\'fa fa-safari\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1103, 'scribd', '<i class=\'fa fa-scribd\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1104, 'sellsy', '<i class=\'fa fa-sellsy\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1105, 'share-alt', '<i class=\'fa fa-share-alt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1106, 'share-alt-square', '<i class=\'fa fa-share-alt-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1107, 'shirtsinbulk', '<i class=\'fa fa-shirtsinbulk\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1108, 'simplybuilt', '<i class=\'fa fa-simplybuilt\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1109, 'skyatlas', '<i class=\'fa fa-skyatlas\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1110, 'skype', '<i class=\'fa fa-skype\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1111, 'slack', '<i class=\'fa fa-slack\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1112, 'slideshare', '<i class=\'fa fa-slideshare\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1113, 'snapchat', '<i class=\'fa fa-snapchat\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1114, 'snapchat-ghost', '<i class=\'fa fa-snapchat-ghost\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1115, 'snapchat-square', '<i class=\'fa fa-snapchat-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1116, 'soundcloud', '<i class=\'fa fa-soundcloud\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1117, 'spotify', '<i class=\'fa fa-spotify\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1118, 'stack-exchange', '<i class=\'fa fa-stack-exchange\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1119, 'stack-overflow', '<i class=\'fa fa-stack-overflow\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1120, 'steam', '<i class=\'fa fa-steam\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1121, 'steam-square', '<i class=\'fa fa-steam-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1122, 'stumbleupon', '<i class=\'fa fa-stumbleupon\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1123, 'stumbleupon-circle', '<i class=\'fa fa-stumbleupon-circle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1124, 'superpowers', '<i class=\'fa fa-superpowers\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1125, 'telegram', '<i class=\'fa fa-telegram\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1126, 'tencent-weibo', '<i class=\'fa fa-tencent-weibo\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1127, 'themeisle', '<i class=\'fa fa-themeisle\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1128, 'trello', '<i class=\'fa fa-trello\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1129, 'tripadvisor', '<i class=\'fa fa-tripadvisor\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1130, 'tumblr', '<i class=\'fa fa-tumblr\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1131, 'tumblr-square', '<i class=\'fa fa-tumblr-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1132, 'twitch', '<i class=\'fa fa-twitch\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1133, 'twitter', '<i class=\'fa fa-twitter\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1134, 'twitter-square', '<i class=\'fa fa-twitter-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1135, 'usb', '<i class=\'fa fa-usb\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1136, 'viacoin', '<i class=\'fa fa-viacoin\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1137, 'viadeo', '<i class=\'fa fa-viadeo\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1138, 'viadeo-square', '<i class=\'fa fa-viadeo-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1139, 'vimeo', '<i class=\'fa fa-vimeo\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1140, 'vimeo-square', '<i class=\'fa fa-vimeo-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1141, 'vine', '<i class=\'fa fa-vine\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1142, 'vk', '<i class=\'fa fa-vk\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1143, 'wechat <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-wechat\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1144, 'weibo', '<i class=\'fa fa-weibo\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1145, 'weixin', '<i class=\'fa fa-weixin\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1146, 'whatsapp', '<i class=\'fa fa-whatsapp\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1147, 'wikipedia-w', '<i class=\'fa fa-wikipedia-w\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1148, 'windows', '<i class=\'fa fa-windows\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1149, 'wordpress', '<i class=\'fa fa-wordpress\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1150, 'wpbeginner', '<i class=\'fa fa-wpbeginner\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1151, 'wpexplorer', '<i class=\'fa fa-wpexplorer\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1152, 'wpforms', '<i class=\'fa fa-wpforms\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1153, 'xing', '<i class=\'fa fa-xing\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1154, 'xing-square', '<i class=\'fa fa-xing-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1155, 'y-combinator', '<i class=\'fa fa-y-combinator\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1156, 'y-combinator-square <span class=\'text-muted\'>(alias)', '<i class=\'fa fa-y-combinator-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1157, 'yahoo', '<i class=\'fa fa-yahoo\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1158, 'yc <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-yc\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1159, 'yc-square <span class=\'text-muted\'>(alias)</span>', '<i class=\'fa fa-yc-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1160, 'yelp', '<i class=\'fa fa-yelp\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1161, 'yoast', '<i class=\'fa fa-yoast\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1162, 'youtube', '<i class=\'fa fa-youtube\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1163, 'youtube-play', '<i class=\'fa fa-youtube-play\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1164, 'youtube-square', '<i class=\'fa fa-youtube-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1165, 'ambulance', '<i class=\'fa fa-ambulance\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1166, 'h-square', '<i class=\'fa fa-h-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1167, 'heart', '<i class=\'fa fa-heart\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1168, 'heart-o', '<i class=\'fa fa-heart-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1169, 'heartbeat', '<i class=\'fa fa-heartbeat\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1170, 'hospital-o', '<i class=\'fa fa-hospital-o\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1171, 'medkit', '<i class=\'fa fa-medkit\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1172, 'plus-square', '<i class=\'fa fa-plus-square\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1173, 'stethoscope', '<i class=\'fa fa-stethoscope\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1174, 'user-md', '<i class=\'fa fa-user-md\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1175, 'wheelchair', '<i class=\'fa fa-wheelchair\' aria-hidden=\'true\'></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
	(1176, 'wheelchair-alt', '<i class=\'fa fa-wheelchair-alt\' aria-hidden=\'true\'></i>', 'f');
/*!40000 ALTER TABLE `icones` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.imagem_fundo
CREATE TABLE IF NOT EXISTS `imagem_fundo` (
  `id_imagem_fundo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_imagem_fundo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_imagem_fundo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.imagem_fundo: ~7 rows (aproximadamente)
DELETE FROM `imagem_fundo`;
/*!40000 ALTER TABLE `imagem_fundo` DISABLE KEYS */;
INSERT INTO `imagem_fundo` (`id_imagem_fundo`, `descricao_imagem_fundo`) VALUES
	(1, 'fundo azul.jpg');
INSERT INTO `imagem_fundo` (`id_imagem_fundo`, `descricao_imagem_fundo`) VALUES
	(2, 'fundo.jpg');
INSERT INTO `imagem_fundo` (`id_imagem_fundo`, `descricao_imagem_fundo`) VALUES
	(3, 'fundo_musical.png');
INSERT INTO `imagem_fundo` (`id_imagem_fundo`, `descricao_imagem_fundo`) VALUES
	(4, 'fundo2.png');
INSERT INTO `imagem_fundo` (`id_imagem_fundo`, `descricao_imagem_fundo`) VALUES
	(5, 'biblioteca_backGroud.jpg');
INSERT INTO `imagem_fundo` (`id_imagem_fundo`, `descricao_imagem_fundo`) VALUES
	(6, 'biblioteca_backGroud2.jpg');
INSERT INTO `imagem_fundo` (`id_imagem_fundo`, `descricao_imagem_fundo`) VALUES
	(7, 'fundo_manchado.jpg');
INSERT INTO `imagem_fundo` (`id_imagem_fundo`, `descricao_imagem_fundo`) VALUES
	(8, 'fundo-slideshow-home.jpg');
INSERT INTO `imagem_fundo` (`id_imagem_fundo`, `descricao_imagem_fundo`) VALUES
	(9, 'LogoLg.png');
/*!40000 ALTER TABLE `imagem_fundo` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.imagem_icone
CREATE TABLE IF NOT EXISTS `imagem_icone` (
  `id_imagem_icone` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_imagem_icone` varchar(500) NOT NULL,
  PRIMARY KEY (`id_imagem_icone`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.imagem_icone: ~7 rows (aproximadamente)
DELETE FROM `imagem_icone`;
/*!40000 ALTER TABLE `imagem_icone` DISABLE KEYS */;
INSERT INTO `imagem_icone` (`id_imagem_icone`, `descricao_imagem_icone`) VALUES
	(2, 'teacher.ico');
INSERT INTO `imagem_icone` (`id_imagem_icone`, `descricao_imagem_icone`) VALUES
	(3, 'lampada.gif');
INSERT INTO `imagem_icone` (`id_imagem_icone`, `descricao_imagem_icone`) VALUES
	(4, 'clave_sol.png');
INSERT INTO `imagem_icone` (`id_imagem_icone`, `descricao_imagem_icone`) VALUES
	(5, 'livro.png');
INSERT INTO `imagem_icone` (`id_imagem_icone`, `descricao_imagem_icone`) VALUES
	(6, 'abastecimento_icon.png');
INSERT INTO `imagem_icone` (`id_imagem_icone`, `descricao_imagem_icone`) VALUES
	(7, 'Logotipo.png');
INSERT INTO `imagem_icone` (`id_imagem_icone`, `descricao_imagem_icone`) VALUES
	(8, 'icons8-Truck-48.png');
INSERT INTO `imagem_icone` (`id_imagem_icone`, `descricao_imagem_icone`) VALUES
	(9, 'favicon2.png');
INSERT INTO `imagem_icone` (`id_imagem_icone`, `descricao_imagem_icone`) VALUES
	(10, 'Logotipo.png');
INSERT INTO `imagem_icone` (`id_imagem_icone`, `descricao_imagem_icone`) VALUES
	(11, 'ferramentas_administrativas.png');
INSERT INTO `imagem_icone` (`id_imagem_icone`, `descricao_imagem_icone`) VALUES
	(12, 'Logo_cafe_pocos.png');
INSERT INTO `imagem_icone` (`id_imagem_icone`, `descricao_imagem_icone`) VALUES
	(13, 'LogoSmForm.png');
INSERT INTO `imagem_icone` (`id_imagem_icone`, `descricao_imagem_icone`) VALUES
	(14, 'LogotipoFinal.png');
/*!40000 ALTER TABLE `imagem_icone` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.imagem_logo
CREATE TABLE IF NOT EXISTS `imagem_logo` (
  `id_imagem_logo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_imagem_logo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_imagem_logo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.imagem_logo: ~9 rows (aproximadamente)
DELETE FROM `imagem_logo`;
/*!40000 ALTER TABLE `imagem_logo` DISABLE KEYS */;
INSERT INTO `imagem_logo` (`id_imagem_logo`, `descricao_imagem_logo`) VALUES
	(1, 'AMFiosLogoSm.png');
INSERT INTO `imagem_logo` (`id_imagem_logo`, `descricao_imagem_logo`) VALUES
	(2, 'AMFiosLogoLg.png');
INSERT INTO `imagem_logo` (`id_imagem_logo`, `descricao_imagem_logo`) VALUES
	(3, 'favicon2.png');
INSERT INTO `imagem_logo` (`id_imagem_logo`, `descricao_imagem_logo`) VALUES
	(4, 'LogoBrothers.png');
INSERT INTO `imagem_logo` (`id_imagem_logo`, `descricao_imagem_logo`) VALUES
	(5, 'ferramentas_administrativas.png');
INSERT INTO `imagem_logo` (`id_imagem_logo`, `descricao_imagem_logo`) VALUES
	(6, 'LogoCafePocosSm.png');
INSERT INTO `imagem_logo` (`id_imagem_logo`, `descricao_imagem_logo`) VALUES
	(7, 'LogoCafePocosLg.png');
INSERT INTO `imagem_logo` (`id_imagem_logo`, `descricao_imagem_logo`) VALUES
	(8, 'LogoLg.png');
INSERT INTO `imagem_logo` (`id_imagem_logo`, `descricao_imagem_logo`) VALUES
	(9, 'LogoSmForm.png');
INSERT INTO `imagem_logo` (`id_imagem_logo`, `descricao_imagem_logo`) VALUES
	(10, 'LogotipoFinal.png');
/*!40000 ALTER TABLE `imagem_logo` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.logica_negocio
CREATE TABLE IF NOT EXISTS `logica_negocio` (
  `id_logica_negocio` int(11) NOT NULL AUTO_INCREMENT,
  `projetos_id` int(11) NOT NULL,
  `tabela_logica_negocio` varchar(200) NOT NULL,
  `campos_logica_negocio` text,
  `campos_data_logica_negocio` text,
  `campo_resultado_logica_negocio` varchar(200) NOT NULL,
  `tipo_reultado_logica_negocio` enum('i','d','s') NOT NULL,
  `formula_id` int(11) NOT NULL,
  `bool_ativo_logica_negocio` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_logica_negocio`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.logica_negocio: ~10 rows (aproximadamente)
DELETE FROM `logica_negocio`;
/*!40000 ALTER TABLE `logica_negocio` DISABLE KEYS */;
INSERT INTO `logica_negocio` (`id_logica_negocio`, `projetos_id`, `tabela_logica_negocio`, `campos_logica_negocio`, `campos_data_logica_negocio`, `campo_resultado_logica_negocio`, `tipo_reultado_logica_negocio`, `formula_id`, `bool_ativo_logica_negocio`) VALUES
	(1, 12, 'operacao_teste', 'valor_1_operacao_teste+valor_2_operacao_teste', '', 'resultado_operacao_teste', 'd', 1, 1);
INSERT INTO `logica_negocio` (`id_logica_negocio`, `projetos_id`, `tabela_logica_negocio`, `campos_logica_negocio`, `campos_data_logica_negocio`, `campo_resultado_logica_negocio`, `tipo_reultado_logica_negocio`, `formula_id`, `bool_ativo_logica_negocio`) VALUES
	(4, 12, 'operacao_teste', 'valor_3_operacao_teste+valor_4_operacao_teste', '', 'resultado_2_operacao_teste', 'd', 3, 1);
INSERT INTO `logica_negocio` (`id_logica_negocio`, `projetos_id`, `tabela_logica_negocio`, `campos_logica_negocio`, `campos_data_logica_negocio`, `campo_resultado_logica_negocio`, `tipo_reultado_logica_negocio`, `formula_id`, `bool_ativo_logica_negocio`) VALUES
	(5, 12, 'operacao_teste', 'resultado_operacao_teste+resultado_2_operacao_teste', '', 'resultado_final_operacao_teste', 'd', 9, 1);
INSERT INTO `logica_negocio` (`id_logica_negocio`, `projetos_id`, `tabela_logica_negocio`, `campos_logica_negocio`, `campos_data_logica_negocio`, `campo_resultado_logica_negocio`, `tipo_reultado_logica_negocio`, `formula_id`, `bool_ativo_logica_negocio`) VALUES
	(6, 13, 'item_orcamento', 'quantidade_item_orcamento+valor_unitario_item_orcamento', '', 'total_item_orcamento', 'd', 3, 1);
INSERT INTO `logica_negocio` (`id_logica_negocio`, `projetos_id`, `tabela_logica_negocio`, `campos_logica_negocio`, `campos_data_logica_negocio`, `campo_resultado_logica_negocio`, `tipo_reultado_logica_negocio`, `formula_id`, `bool_ativo_logica_negocio`) VALUES
	(7, 12, 'operacao_data', 'data_2_operacao_data', 'data_1_operacao_data', 'resultado_data_operacao_data', 's', 10, 1);
INSERT INTO `logica_negocio` (`id_logica_negocio`, `projetos_id`, `tabela_logica_negocio`, `campos_logica_negocio`, `campos_data_logica_negocio`, `campo_resultado_logica_negocio`, `tipo_reultado_logica_negocio`, `formula_id`, `bool_ativo_logica_negocio`) VALUES
	(8, 12, 'operacao_teste', 'valor_1_operacao_teste+valor_3_operacao_teste', '', 'valor_4_operacao_teste', 'd', 1, 1);
INSERT INTO `logica_negocio` (`id_logica_negocio`, `projetos_id`, `tabela_logica_negocio`, `campos_logica_negocio`, `campos_data_logica_negocio`, `campo_resultado_logica_negocio`, `tipo_reultado_logica_negocio`, `formula_id`, `bool_ativo_logica_negocio`) VALUES
	(9, 20, 'pedido_item', 'quantidade_pedido_item+valor_unitario_pedido_item', '', 'total_pedido_item', 'd', 3, 1);
INSERT INTO `logica_negocio` (`id_logica_negocio`, `projetos_id`, `tabela_logica_negocio`, `campos_logica_negocio`, `campos_data_logica_negocio`, `campo_resultado_logica_negocio`, `tipo_reultado_logica_negocio`, `formula_id`, `bool_ativo_logica_negocio`) VALUES
	(10, 23, 'orcamento_item', 'quantidade_orcamento_item+preco_orcamento_item', '', 'total_orcamento_item', 'd', 3, 1);
INSERT INTO `logica_negocio` (`id_logica_negocio`, `projetos_id`, `tabela_logica_negocio`, `campos_logica_negocio`, `campos_data_logica_negocio`, `campo_resultado_logica_negocio`, `tipo_reultado_logica_negocio`, `formula_id`, `bool_ativo_logica_negocio`) VALUES
	(11, 23, 'compra_item', 'quantidade_compra_item+valor_unitario_compra_item', '', 'total_compra_item', 'd', 3, 1);
INSERT INTO `logica_negocio` (`id_logica_negocio`, `projetos_id`, `tabela_logica_negocio`, `campos_logica_negocio`, `campos_data_logica_negocio`, `campo_resultado_logica_negocio`, `tipo_reultado_logica_negocio`, `formula_id`, `bool_ativo_logica_negocio`) VALUES
	(12, 23, 'pedido_item', 'quantidade_pedido_item+valor_unitario_pedido_item', '', 'total_pedido_item', 'd', 3, 1);
/*!40000 ALTER TABLE `logica_negocio` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.modelo_cores_menu
CREATE TABLE IF NOT EXISTS `modelo_cores_menu` (
  `id_modelo_cores_menu` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_modelo_cores_menu` varchar(10) NOT NULL,
  PRIMARY KEY (`id_modelo_cores_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.modelo_cores_menu: ~6 rows (aproximadamente)
DELETE FROM `modelo_cores_menu`;
/*!40000 ALTER TABLE `modelo_cores_menu` DISABLE KEYS */;
INSERT INTO `modelo_cores_menu` (`id_modelo_cores_menu`, `descricao_modelo_cores_menu`) VALUES
	(1, '3b4655');
INSERT INTO `modelo_cores_menu` (`id_modelo_cores_menu`, `descricao_modelo_cores_menu`) VALUES
	(2, '3b5546');
INSERT INTO `modelo_cores_menu` (`id_modelo_cores_menu`, `descricao_modelo_cores_menu`) VALUES
	(3, '463b55');
INSERT INTO `modelo_cores_menu` (`id_modelo_cores_menu`, `descricao_modelo_cores_menu`) VALUES
	(4, '2d3726');
INSERT INTO `modelo_cores_menu` (`id_modelo_cores_menu`, `descricao_modelo_cores_menu`) VALUES
	(5, '37262d');
INSERT INTO `modelo_cores_menu` (`id_modelo_cores_menu`, `descricao_modelo_cores_menu`) VALUES
	(6, '372d26');
/*!40000 ALTER TABLE `modelo_cores_menu` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.nivel_acesso
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.nivel_acesso: ~2 rows (aproximadamente)
DELETE FROM `nivel_acesso`;
/*!40000 ALTER TABLE `nivel_acesso` DISABLE KEYS */;
INSERT INTO `nivel_acesso` (`id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES
	(1, 'Nivel Administrador', 'formula+logica_negocio+padrao_banco_de_dados+tabela_padrao+upload+mapa+mov+pdf+usuario', '2018-02-07 09:58:31', 1, 1);
INSERT INTO `nivel_acesso` (`id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES
	(2, 'Usuário Padrão', 'formula+logica_negocio+tabela_padrao+pdf+usuario', '2018-01-31 14:53:15', 1, 1);
/*!40000 ALTER TABLE `nivel_acesso` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.padrao_banco_de_dados
CREATE TABLE IF NOT EXISTS `padrao_banco_de_dados` (
  `id_padrao_banco_de_dados` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_padrao_banco_de_dados` varchar(200) DEFAULT NULL,
  `descricao_padrao_banco_de_dados` text,
  `observacoes_padrao_banco_de_dados` text,
  `data_atualizacao_padrao_banco_de_dados` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_padrao_banco_de_dados` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_padrao_banco_de_dados`),
  KEY `fk_padrao_banco_de_dados<>usuario` (`usuario_id`),
  CONSTRAINT `fk_padrao_banco_de_dados<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.padrao_banco_de_dados: ~15 rows (aproximadamente)
DELETE FROM `padrao_banco_de_dados`;
/*!40000 ALTER TABLE `padrao_banco_de_dados` DISABLE KEYS */;
INSERT INTO `padrao_banco_de_dados` (`id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES
	(1, 'Chave Primaria', 'Toda chave primaria de começar com "id_" e o nome da tabela', '', '2018-02-07 10:00:04', 1, 1);
INSERT INTO `padrao_banco_de_dados` (`id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES
	(2, 'Nome da Tabela', 'Não pode começar com \'log_\'', 'Porque as tabelas de logs serão alimentadas por TRIGGERS  e servem apenas para gravar historio de registro', '2018-02-07 10:01:41', 1, 1);
INSERT INTO `padrao_banco_de_dados` (`id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES
	(3, 'Campo Bool_ativo', 'Todas as tabelas tem que ter o campo "bool_ativo_" e nome da tabela', 'O sistemas gerados não apagam registros, apenas muda-os de ativos para não ativo', '2018-02-07 10:03:15', 1, 1);
INSERT INTO `padrao_banco_de_dados` (`id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES
	(4, 'Coluna que não é chave estrangeira', 'Deve se escrita da seguinte forma "nome da coluna" _ \'nome da tabela"', 'Isso para não haver nenhuma repetição de campos pelo resto da estrutura do banco de dados com exceção da chave estrangeira', '2018-02-07 10:05:15', 1, 1);
INSERT INTO `padrao_banco_de_dados` (`id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES
	(5, 'Campo Chave estrangeira', 'Dever ser definia com o nome da tabela estrangeira mais "_id"', '', '2018-02-07 10:07:04', 1, 1);
INSERT INTO `padrao_banco_de_dados` (`id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES
	(6, 'Carácter \'+\'', 'Nenhum nome de tabela pode haver em sua descrição o carácter \'+\'', 'O sistema usa texto com nome de tabela concatenados com o carácter \'+\'', '2018-02-07 10:09:02', 1, 1);
INSERT INTO `padrao_banco_de_dados` (`id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES
	(7, 'Coluna de Data', 'Antes era sempre dateTime.<br>\nPorém não foi definido que usasse os tipos Date ou DateTime para registros', '', '2018-02-07 10:10:32', 1, 1);
INSERT INTO `padrao_banco_de_dados` (`id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES
	(8, 'Coluna de busca', 'Coluna para se fazer busca num registro de chave estrangeira será a segunda coluna', '', '2018-02-07 10:11:33', 1, 1);
INSERT INTO `padrao_banco_de_dados` (`id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES
	(9, 'Nome chave estrangeira', 'O nome da chave estrangeira segue o seguinte padrão <br>\n\'fk_\' + nome da tabela local + "<>" + nome da tabela estrangeira', '', '2018-02-07 10:13:06', 1, 1);
INSERT INTO `padrao_banco_de_dados` (`id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES
	(10, 'Quantidade de Colunas Chave Primaria', 'Todas as tabelas devem ter apenas um index primario', '', '2018-02-07 10:14:08', 1, 1);
INSERT INTO `padrao_banco_de_dados` (`id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES
	(11, 'A tabela de login', 'Ter no mínimo campos:<br>\nnome, <br>\nlogin, <br>\nsenha, <br>\nchave estrangeira para nível de acesso', '', '2018-02-07 10:15:39', 1, 1);
INSERT INTO `padrao_banco_de_dados` (`id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES
	(12, 'Prefixo e nome de tabela', 'As tabelas não podem começar com prefixo de nome de coluna', 'Os Prefixos são: <br>\nImagem, <br>\nVideo, <br>\nAudio, <br>\nTexto, <br>\nSenha, <br>\nBool, <br>\nId, <br>\nStatus', '2018-02-07 17:37:48', 1, 1);
INSERT INTO `padrao_banco_de_dados` (`id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES
	(13, 'Posição chave primaria', 'A coluna de chave primaria deve ser a primeira', '', '2018-02-07 10:18:17', 1, 1);
INSERT INTO `padrao_banco_de_dados` (`id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES
	(14, 'Nome Trigger', 'O nome das triggers devem seguir o seguinte padrão: <br>\n"tgr_\' + nomeTabela + "_" + operação', 'As operações podem ser:<br>\nBI -> Before Insert<br>\nBU -> Before Update<br>\nBD -> Before Delete<br>\nAI -> After Insert,<br>\nAU -> After Update, <br>\nAD -> After Delete', '2018-02-07 13:03:08', 1, 1);
INSERT INTO `padrao_banco_de_dados` (`id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES
	(15, 'Tabela Padrão', 'Nenhuma tabela pode ter nome de tabela padrão', 'As Tabelas Padrão são:<br>\nupload_arq<br>\nrelatorios<br>\nrelatorio_tabela<br>\narea_acesso<br>\nnivel_acesso<br>\nusuario<br>\nnotificacoes_config<br>\nnotificacoes<br>\nnotificacoes_salvas<br>\nnotificacoes_pendentes<br>', '2018-02-07 15:12:58', 1, 1);
/*!40000 ALTER TABLE `padrao_banco_de_dados` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.projetos
CREATE TABLE IF NOT EXISTS `projetos` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) NOT NULL,
  `host` varchar(500) NOT NULL,
  `user` varchar(500) NOT NULL,
  `pws` varchar(500) NOT NULL,
  `bancoDados` varchar(500) NOT NULL,
  `versao` varchar(20) NOT NULL DEFAULT '1',
  `bool_ativo` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_projeto`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.projetos: ~16 rows (aproximadamente)
DELETE FROM `projetos`;
/*!40000 ALTER TABLE `projetos` DISABLE KEYS */;
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(5, 'AMFios_admim', 'localhost', 'root', '', 'amfios', '1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(6, 'Format', 'localhost', 'root', '', 'format', '1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(8, 'AMFios_admim2', 'localhost', 'root', '', 'amfios', '1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(9, 'admin', 'amfios.mysql.uhserver.com', 'cdisite', 'Teste@12', 'amfios', '1.5.1.1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(10, 'admin_site', 'localhost', 'root', '', 'site', '1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(11, 'admin_cafepocos', 'localhost', 'root', '', 'cafe_pocos', '1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(12, 'teste_apagar', 'localhost', 'root', '', 'vaila', '1.5.1.1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(13, 'admin_minas_system', 'minas-system.mysql.uhserver.com', 'cdi_root', 'Teste@12', 'minas_system', '1.5.1.1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(15, 'admin_cdi', '186.193.152.31', 'cdiinifo', 'Teste123!@#', 'cdi_web', '1.5.1.1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(16, 'gerador_cadastro', 'localhost', 'root', '', 'gerador', '1.3.1.1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(17, 'estacionamento', 'localhost', 'root', '', 'estacionamento', '1.4.1.1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(18, 'Pong_21', 'localhost', 'root', '', 'pong_21', '1.4.1.1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(19, 'Revistas', 'localhost', 'root', '', 'revistas_download', '1.4.1.1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(20, 'casa_duarte', 'localhost', 'root', '', 'casa_duarte', '1.5.1.1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(21, 'araguaia_entidade', 'localhost', 'root', '', 'araguai', '1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(23, 'Compre_certo', 'localhost', 'root', '', 'compras_jk_19', '1.5.1.1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(24, 'frente_caixa', 'localhost', 'root', '', 'frentecaixa', '1.5.1.1', 1);
INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
	(25, 'admin_SJT', 'www.sjtconstrutora.com.br', 'sjt', 'Teste123!@#', 'sjt', '1.5.1.1', 1);
/*!40000 ALTER TABLE `projetos` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.relatorios
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.relatorios: ~1 rows (aproximadamente)
DELETE FROM `relatorios`;
/*!40000 ALTER TABLE `relatorios` DISABLE KEYS */;
INSERT INTO `relatorios` (`id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES
	(2, 'Relatório de Tabelas Padrão', 'tabela_padrao', 'descricao_tabela_padrao+bool_ativo_tabela_padrao', '', '', 1, '2018-01-31 14:33:36', 1, 0, 1);
INSERT INTO `relatorios` (`id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES
	(3, 'Relatório de Fórmulas', 'formula', 'descricao_formula+formula_formula+numero_campos_formula+bool_ativo_formula', '', NULL, 0, '2018-01-31 14:33:26', 1, 0, 1);
INSERT INTO `relatorios` (`id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES
	(4, 'Relatório de nomenclatura de Banco de Dados', 'padrao_banco_de_dados', 'titulo_padrao_banco_de_dados+descricao_padrao_banco_de_dados+observacoes_padrao_banco_de_dados+data_atualizacao_padrao_banco_de_dados', 'padrao_banco_de_dados_tr_usuario_tr_nome_usuario', '', 1, '2018-02-07 10:26:44', 1, 0, 1);
/*!40000 ALTER TABLE `relatorios` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.relatorio_tabela
CREATE TABLE IF NOT EXISTS `relatorio_tabela` (
  `id_relatorio_tabela` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_relatorio_tabela` varchar(200) NOT NULL,
  `data_atualizacao_relatorio_tabela` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_relatorio_tabela` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_relatorio_tabela`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.relatorio_tabela: ~2 rows (aproximadamente)
DELETE FROM `relatorio_tabela`;
/*!40000 ALTER TABLE `relatorio_tabela` DISABLE KEYS */;
INSERT INTO `relatorio_tabela` (`id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES
	(1, 'formula', '2018-02-07 10:23:23', 1);
INSERT INTO `relatorio_tabela` (`id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES
	(2, 'padrao_banco_de_dados', '2018-02-07 10:23:23', 1);
INSERT INTO `relatorio_tabela` (`id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES
	(3, 'tabela_padrao', '2018-02-07 10:23:23', 1);
/*!40000 ALTER TABLE `relatorio_tabela` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.tabela_algoritimo_exe
CREATE TABLE IF NOT EXISTS `tabela_algoritimo_exe` (
  `id_tabela_algoritimo_exe` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_padrao` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tabela_algoritimo_exe`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.tabela_algoritimo_exe: ~1 rows (aproximadamente)
DELETE FROM `tabela_algoritimo_exe`;
/*!40000 ALTER TABLE `tabela_algoritimo_exe` DISABLE KEYS */;
INSERT INTO `tabela_algoritimo_exe` (`id_tabela_algoritimo_exe`, `descricao_padrao`) VALUES
	(1, 'Padrão Site');
/*!40000 ALTER TABLE `tabela_algoritimo_exe` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.tabela_algoritimo_exe_item
CREATE TABLE IF NOT EXISTS `tabela_algoritimo_exe_item` (
  `id_tabela_algoritimo_exe_item` int(11) NOT NULL AUTO_INCREMENT,
  `tabela_algoritimo_exe_id` int(11) NOT NULL,
  `descricao_tabela` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tabela_algoritimo_exe_item`),
  KEY `fk_tabela_algoritimo_exe_item<>tabela_algoritimo_exe` (`tabela_algoritimo_exe_id`),
  CONSTRAINT `fk_tabela_algoritimo_exe_item<>tabela_algoritimo_exe` FOREIGN KEY (`tabela_algoritimo_exe_id`) REFERENCES `tabela_algoritimo_exe` (`id_tabela_algoritimo_exe`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.tabela_algoritimo_exe_item: ~21 rows (aproximadamente)
DELETE FROM `tabela_algoritimo_exe_item`;
/*!40000 ALTER TABLE `tabela_algoritimo_exe_item` DISABLE KEYS */;
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(1, 1, 'cliente_site.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(3, 1, 'contato.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(4, 1, 'empresa.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(5, 1, 'site.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(6, 1, 'cards.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(7, 1, 'loja.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(8, 1, 'topicos_loja.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(9, 1, 'slide_show.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(10, 1, 'endereco_site.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(11, 1, 'grupo.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(12, 1, 'item.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(13, 1, 'destaque_grupo.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(14, 1, 'estado.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(16, 1, 'orcamento.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(17, 1, 'item_orcamento.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(18, 1, 'saiba_mais.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(19, 1, 'adicional_site.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(20, 1, 'quem_somos.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(21, 1, 'videos.sql');
INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
	(22, 1, 'configurar_site.sql');
/*!40000 ALTER TABLE `tabela_algoritimo_exe_item` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.tabela_padrao
CREATE TABLE IF NOT EXISTS `tabela_padrao` (
  `id_tabela_padrao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_tabela_padrao` varchar(200) NOT NULL,
  `bool_ativo_tabela_padrao` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_tabela_padrao`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.tabela_padrao: ~8 rows (aproximadamente)
DELETE FROM `tabela_padrao`;
/*!40000 ALTER TABLE `tabela_padrao` DISABLE KEYS */;
INSERT INTO `tabela_padrao` (`id_tabela_padrao`, `descricao_tabela_padrao`, `bool_ativo_tabela_padrao`) VALUES
	(1, 'upload_arq', 1);
INSERT INTO `tabela_padrao` (`id_tabela_padrao`, `descricao_tabela_padrao`, `bool_ativo_tabela_padrao`) VALUES
	(2, 'relatorios', 1);
INSERT INTO `tabela_padrao` (`id_tabela_padrao`, `descricao_tabela_padrao`, `bool_ativo_tabela_padrao`) VALUES
	(3, 'relatorio_tabela', 1);
INSERT INTO `tabela_padrao` (`id_tabela_padrao`, `descricao_tabela_padrao`, `bool_ativo_tabela_padrao`) VALUES
	(4, 'area_acesso', 1);
INSERT INTO `tabela_padrao` (`id_tabela_padrao`, `descricao_tabela_padrao`, `bool_ativo_tabela_padrao`) VALUES
	(5, 'nivel_acesso', 1);
INSERT INTO `tabela_padrao` (`id_tabela_padrao`, `descricao_tabela_padrao`, `bool_ativo_tabela_padrao`) VALUES
	(6, 'usuario', 1);
INSERT INTO `tabela_padrao` (`id_tabela_padrao`, `descricao_tabela_padrao`, `bool_ativo_tabela_padrao`) VALUES
	(7, 'notificacoes_config', 1);
INSERT INTO `tabela_padrao` (`id_tabela_padrao`, `descricao_tabela_padrao`, `bool_ativo_tabela_padrao`) VALUES
	(8, 'notificacoes', 1);
INSERT INTO `tabela_padrao` (`id_tabela_padrao`, `descricao_tabela_padrao`, `bool_ativo_tabela_padrao`) VALUES
	(9, 'notificacoes_salvas', 1);
INSERT INTO `tabela_padrao` (`id_tabela_padrao`, `descricao_tabela_padrao`, `bool_ativo_tabela_padrao`) VALUES
	(10, 'notificacoes_pendentes', 1);
INSERT INTO `tabela_padrao` (`id_tabela_padrao`, `descricao_tabela_padrao`, `bool_ativo_tabela_padrao`) VALUES
	(11, 'area_nivel_acesso', 1);
/*!40000 ALTER TABLE `tabela_padrao` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.upload_arq
CREATE TABLE IF NOT EXISTS `upload_arq` (
  `id_upload_arq` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_upload_arq` varchar(100) NOT NULL,
  `tipo_upload_arq` varchar(100) NOT NULL,
  `data_atualizacaoupload_arq` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_upload_arq` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_upload_arq`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela gerador.upload_arq: ~0 rows (aproximadamente)
DELETE FROM `upload_arq`;
/*!40000 ALTER TABLE `upload_arq` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload_arq` ENABLE KEYS */;

-- Copiando estrutura para tabela gerador.usuario
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

-- Copiando dados para a tabela gerador.usuario: ~2 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES
	(1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1);
INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES
	(2, 'JACK BILLER', 'JAC', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 2, 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
