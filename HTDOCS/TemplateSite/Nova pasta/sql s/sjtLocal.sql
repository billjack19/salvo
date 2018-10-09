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


-- Copiando estrutura do banco de dados para sjt
CREATE DATABASE IF NOT EXISTS `sjt` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sjt`;

-- Copiando estrutura para tabela sjt.adicional_site
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
  KEY `fk_adiciona_site<>saiba_mais` (`saiba_mais_id`),
  CONSTRAINT `fk_adicional_site<>saiba_mais` FOREIGN KEY (`saiba_mais_id`) REFERENCES `saiba_mais` (`id_saiba_mais`),
  CONSTRAINT `fk_adicional_site<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.adicional_site: ~2 rows (aproximadamente)
DELETE FROM `adicional_site`;
/*!40000 ALTER TABLE `adicional_site` DISABLE KEYS */;
INSERT INTO `adicional_site` (`id_adicional_site`, `titulo_adicional_site`, `descricao_adicional_site`, `imagem_adicional_site`, `saiba_mais_id`, `usuario_id`, `data_atualizacao_adicional_site`, `bool_ativo_adicional_site`) VALUES
	(1, 'Prêmios Top of Mind Brazil', 'Considerado hoje como o mais importante prêmio de marketing editado no Brasil, o Top of Mind Brazil tem aprimorado suas técnicas de coleta \ne análise de dados para que seus resultados sejam cada vez mais fiéis às tendências de mercado. \n<br><br>\nO INBRAP sabe de suas responsabilidades para com o Brasil, e por isso, instituiu o Prêmio Top of Mind Brazil, concedido anualmente àquelas \nempresas, entidades e profissionais que realmente fazem a diferença e tem como objetivo reconhecer, distinguir e premiar a gestão de \nempresas e instituições que se destacam no mercado brasileiro, cuja excelência na qualidade de seus produtos ou serviços contribuem \nefetivamente para o desenvolvimento sócio-econômico do pais, valorizando sobretudo a pessoa humana e os princípios éticos que devem \nreger a sociedade brasileira.\n<br><br>\nO prêmio Top of Mind Brazil é o resultado de uma proposta erguida sobre sólidas bases de análise mercadológica em consonância com os \nmais modernos modelos de gestão utilizados pelas mais importantes premiações internacionais.\n<br><br>\nPara saber mais detalhes do Prêmio Top of Mind Brazil consulte o site: \n<a href=\'http://www.ibrap.com.br\' target=\'_blank\'>www.ibrap.com.br</a>', 'top_of_mind_brazil.jpg', 1, 1, '2018-07-13 10:18:11', 1);
INSERT INTO `adicional_site` (`id_adicional_site`, `titulo_adicional_site`, `descricao_adicional_site`, `imagem_adicional_site`, `saiba_mais_id`, `usuario_id`, `data_atualizacao_adicional_site`, `bool_ativo_adicional_site`) VALUES
	(2, 'Prêmio IMEC 2010', 'O Prêmio IMEC, há 20 anos, destaca profissionais e empresas que atuam corretamente na área de Engenharia e seu objetivo é dar mais \ncredibilidade aos premiados dentro do mercado da construção civil.\n<br><br>\nSão eleitos fornecedores de produtos e serviços, pessoas físicas e jurídicas, que tenham contribuído, de forma significativa, para a cultura, \neconomia e, em particular, para o desenvolvimento da Engenharia.\n<br><br>\nA SJT Construtora e Incorporadora Ltda. foi uma das empresas conceituadas e reconhecidas neste ramo a receber o Prêmio IMEC 2010,\nem função da qualidade de seus empreendimentos, seriedade em seu trabalho, comprometimento com o meio ambiente e preocupação com o\nbem-estar de seus moradores.\n<br><br>\nPara saber mais detalhes do Prêmio IMEC 2010 consulte o site: \n<a href=\'http://www.premioimec.com.br\' target=\'_blank\'>www.premioimec.com.br</a>', 'premio_imec_2010.png', 1, 1, '2018-07-13 10:17:55', 1);
/*!40000 ALTER TABLE `adicional_site` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.area_nivel_acesso
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
) ENGINE=InnoDB AUTO_INCREMENT=237 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.area_nivel_acesso: ~58 rows (aproximadamente)
DELETE FROM `area_nivel_acesso`;
/*!40000 ALTER TABLE `area_nivel_acesso` DISABLE KEYS */;
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(179, 'cliente_site', 'Cliente Site', 1, 1, 1, 1, '2018-07-16 16:48:44', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(180, 'cliente_site', 'Cliente Site', 1, 1, 1, 1, '2018-07-16 16:48:44', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(181, 'configurar_site', 'Configurar Site', 1, 1, 1, 1, '2018-07-16 16:48:45', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(182, 'configurar_site', 'Configurar Site', 1, 1, 1, 1, '2018-07-16 16:48:45', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(183, 'contato', 'Contato', 1, 1, 1, 1, '2018-07-16 16:48:45', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(184, 'contato', 'Contato', 1, 1, 1, 1, '2018-07-16 16:48:45', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(185, 'empresa', 'Empresa', 1, 1, 1, 1, '2018-07-16 16:48:45', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(186, 'empresa', 'Empresa', 1, 1, 1, 1, '2018-07-16 16:48:45', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(187, 'estado', 'Estado', 1, 1, 1, 1, '2018-07-16 16:48:45', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(188, 'estado', 'Estado', 1, 1, 1, 1, '2018-07-16 16:48:45', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(189, 'grupo', 'Grupo', 1, 1, 1, 1, '2018-07-16 16:48:45', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(190, 'grupo', 'Grupo', 1, 1, 1, 1, '2018-07-16 16:48:45', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(191, 'item', 'Item', 1, 1, 1, 1, '2018-07-16 16:48:45', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(192, 'item', 'Item', 1, 1, 1, 1, '2018-07-16 16:48:46', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(193, 'new_sjt', 'New Sjt', 1, 1, 1, 1, '2018-07-16 16:48:46', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(194, 'new_sjt', 'New Sjt', 1, 1, 1, 1, '2018-07-16 16:48:46', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(195, 'quem_somos', 'Quem Somos', 1, 1, 1, 1, '2018-07-16 16:48:46', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(196, 'quem_somos', 'Quem Somos', 1, 1, 1, 1, '2018-07-16 16:48:46', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(197, 'saiba_mais', 'Saiba Mais', 1, 1, 1, 1, '2018-07-16 16:48:46', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(198, 'saiba_mais', 'Saiba Mais', 1, 1, 1, 1, '2018-07-16 16:48:46', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(199, 'situacao', 'Situação', 1, 1, 1, 1, '2018-07-16 16:48:46', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(200, 'situacao', 'Situação', 1, 1, 1, 1, '2018-07-16 16:48:46', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(201, 'videos', 'Videos', 1, 1, 1, 1, '2018-07-16 16:48:46', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(202, 'videos', 'Videos', 1, 1, 1, 1, '2018-07-16 16:48:46', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(203, 'orcamento-cliente_site', 'Orçamento - Cliente Site', 1, 1, 1, 1, '2018-07-16 16:48:46', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(204, 'orcamento-cliente_site', 'Orçamento - Cliente Site', 1, 1, 1, 1, '2018-07-16 16:48:46', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(205, 'item_orcamento-orcamento', 'Item Orçamento - Orçamento', 1, 1, 1, 1, '2018-07-16 16:48:47', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(206, 'item_orcamento-orcamento', 'Item Orçamento - Orçamento', 1, 1, 1, 1, '2018-07-16 16:48:47', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(207, 'cards-configurar_site', 'Cards - Configurar Site', 1, 1, 1, 1, '2018-07-16 16:48:47', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(208, 'cards-configurar_site', 'Cards - Configurar Site', 1, 1, 1, 1, '2018-07-16 16:48:47', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(209, 'destaque_grupo-configurar_site', 'Destaque Grupo - Configurar Site', 1, 1, 1, 1, '2018-07-16 16:48:47', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(210, 'destaque_grupo-configurar_site', 'Destaque Grupo - Configurar Site', 1, 1, 1, 1, '2018-07-16 16:48:47', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(211, 'endereco_site-configurar_site', 'Endereço Site - Configurar Site', 1, 1, 1, 1, '2018-07-16 16:48:47', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(212, 'endereco_site-configurar_site', 'Endereço Site - Configurar Site', 1, 1, 1, 1, '2018-07-16 16:48:47', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(213, 'slide_show-configurar_site', 'Slide Show - Configurar Site', 1, 1, 1, 1, '2018-07-16 16:48:47', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(214, 'slide_show-configurar_site', 'Slide Show - Configurar Site', 1, 1, 1, 1, '2018-07-16 16:48:47', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(215, 'loja-configurar_site', 'Loja - Configurar Site', 1, 1, 1, 1, '2018-07-16 16:48:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(216, 'loja-configurar_site', 'Loja - Configurar Site', 1, 1, 1, 1, '2018-07-16 16:48:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(217, 'topicos_loja-loja', 'Tópicos Loja - Loja', 1, 1, 1, 1, '2018-07-16 16:48:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(218, 'topicos_loja-loja', 'Tópicos Loja - Loja', 1, 1, 1, 1, '2018-07-16 16:48:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(219, 'adicional_site-saiba_mais', 'Adicional Site - Saiba Mais', 1, 1, 1, 1, '2018-07-16 16:48:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(220, 'adicional_site-saiba_mais', 'Adicional Site - Saiba Mais', 1, 1, 1, 1, '2018-07-16 16:48:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(221, 'paginas-new_sjt', 'Paginas - New Sjt', 1, 1, 1, 1, '2018-07-16 16:48:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(222, 'paginas-new_sjt', 'Paginas - New Sjt', 1, 1, 1, 1, '2018-07-16 16:48:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(223, 'fotos-item', 'Fotos - Item', 1, 1, 1, 1, '2018-07-16 16:48:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(224, 'fotos-item', 'Fotos - Item', 1, 1, 1, 1, '2018-07-16 16:48:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(225, 'upload', 'Upload', 1, 1, 1, 1, '2018-07-16 16:48:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(226, 'upload', 'Upload', 1, 1, 1, 1, '2018-07-16 16:48:48', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(227, 'mapa', 'Mapa', 1, 1, 1, 1, '2018-07-16 16:48:49', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(228, 'mapa', 'Mapa', 1, 1, 1, 1, '2018-07-16 16:48:49', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(229, 'mov', 'Mov', 1, 1, 1, 1, '2018-07-16 16:48:49', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(230, 'mov', 'Mov', 1, 1, 1, 1, '2018-07-16 16:48:49', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(231, 'relatorio', 'Relatório', 1, 1, 1, 1, '2018-07-16 16:48:49', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(232, 'relatorio', 'Relatório', 1, 1, 1, 1, '2018-07-16 16:48:49', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(233, 'notificacao', 'Notificação', 1, 1, 1, 1, '2018-07-16 16:48:49', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(234, 'notificacao', 'Notificação', 1, 1, 1, 1, '2018-07-16 16:48:49', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(235, 'usuario', 'Usuário', 1, 1, 1, 1, '2018-07-16 16:48:49', 1, 1);
INSERT INTO `area_nivel_acesso` (`id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES
	(236, 'usuario', 'Usuário', 1, 1, 1, 1, '2018-07-16 16:48:49', 1, 1);
/*!40000 ALTER TABLE `area_nivel_acesso` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.cards
CREATE TABLE IF NOT EXISTS `cards` (
  `id_cards` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_cards` varchar(100) NOT NULL,
  `descricao_cards` varchar(200) DEFAULT NULL,
  `imagem_cards` varchar(100) NOT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_cards` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_cards` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cards`),
  KEY `fk_cards<>usuario` (`usuario_id`),
  CONSTRAINT `fk_cards<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.cards: ~2 rows (aproximadamente)
DELETE FROM `cards`;
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
INSERT INTO `cards` (`id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `usuario_id`, `bool_ativo_cards`) VALUES
	(1, '2005/2006 e 2006/2007', 'Prêmio Top of Mind Brazil', 'trofeu.png', 1, '2018-07-18 08:14:12', 1, 0);
INSERT INTO `cards` (`id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `usuario_id`, `bool_ativo_cards`) VALUES
	(2, 'STJ NEWS', 'Novidades, destaques, acabamentos, em construção. Confira no nosso jornal.', '57.jpg', 1, '2018-07-18 08:14:15', 1, 0);
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.cliente_site
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
  `data_atualizacao_cliente_site` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) DEFAULT NULL,
  `bool_ativo_cliente_site` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cliente_site`),
  KEY `fk_cliente_site<>usuario` (`usuario_id`),
  CONSTRAINT `fk_cliente_site<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.cliente_site: ~0 rows (aproximadamente)
DELETE FROM `cliente_site`;
/*!40000 ALTER TABLE `cliente_site` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente_site` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.configurar_site
CREATE TABLE IF NOT EXISTS `configurar_site` (
  `id_configurar_site` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_configurar_site` varchar(100) NOT NULL,
  `titulo_menu_configurar_site` varchar(100) NOT NULL,
  `cor_pagina_configurar_site` varchar(100) NOT NULL,
  `contra_cor_pagina_configurar_site` varchar(100) NOT NULL,
  `imagem_icone_configurar_site` varchar(100) NOT NULL,
  `imagem_logo_configurar_site` varchar(100) NOT NULL,
  `data_atualizacao_configurar_site` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_configurar_site` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_configurar_site`),
  KEY `fk_configurar_site<>usuario` (`usuario_id`),
  CONSTRAINT `fk_configurar_site<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.configurar_site: ~0 rows (aproximadamente)
DELETE FROM `configurar_site`;
/*!40000 ALTER TABLE `configurar_site` DISABLE KEYS */;
INSERT INTO `configurar_site` (`id_configurar_site`, `titulo_configurar_site`, `titulo_menu_configurar_site`, `cor_pagina_configurar_site`, `contra_cor_pagina_configurar_site`, `imagem_icone_configurar_site`, `imagem_logo_configurar_site`, `data_atualizacao_configurar_site`, `usuario_id`, `bool_ativo_configurar_site`) VALUES
	(1, 'SJT CONSTRUTORA E INCORPORADORA', ' ', '#1E90FF;', 'black;', 'logoSm.png', 'logo.png', '2018-07-12 16:13:45', 1, 1);
/*!40000 ALTER TABLE `configurar_site` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.contato
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
  KEY `fk_contato<>usuario` (`usuario_id`),
  CONSTRAINT `fk_contato<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.contato: ~0 rows (aproximadamente)
DELETE FROM `contato`;
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.destaque_grupo
CREATE TABLE IF NOT EXISTS `destaque_grupo` (
  `id_destaque_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_destaque_grupo` varchar(100) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `imagem_destaque_grupo` varchar(100) NOT NULL,
  `descricao_destaque_grupo` varchar(300) DEFAULT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_destaque_grupo` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_destaque_grupo` int(1) NOT NULL,
  PRIMARY KEY (`id_destaque_grupo`),
  KEY `fk_destaque_grupo<>usuario` (`usuario_id`),
  CONSTRAINT `fk_destaque_grupo<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.destaque_grupo: ~2 rows (aproximadamente)
DELETE FROM `destaque_grupo`;
/*!40000 ALTER TABLE `destaque_grupo` DISABLE KEYS */;
INSERT INTO `destaque_grupo` (`id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `usuario_id`, `bool_ativo_destaque_grupo`) VALUES
	(1, 'Casas Residenciais', 1, 'residenncial.png', '', 1, '2018-07-13 16:39:25', 1, 1);
INSERT INTO `destaque_grupo` (`id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `usuario_id`, `bool_ativo_destaque_grupo`) VALUES
	(2, 'Condomínios', 2, 'condominio.png', '', 1, '2018-07-13 16:39:37', 1, 1);
INSERT INTO `destaque_grupo` (`id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `usuario_id`, `bool_ativo_destaque_grupo`) VALUES
	(3, 'Terrenos', 3, 'jardim_dos_estados_frontal.jpg', '', 1, '2018-07-16 17:27:16', 1, 1);
/*!40000 ALTER TABLE `destaque_grupo` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_empresa` varchar(200) NOT NULL,
  `imagem_logo_empresa` varchar(200) NOT NULL,
  `data_atualizacao_empresa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_empresa` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_empresa`),
  KEY `fk_empresa<>usuario` (`usuario_id`),
  CONSTRAINT `fk_empresa<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.empresa: ~0 rows (aproximadamente)
DELETE FROM `empresa`;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.endereco_site
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
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_endereco_site` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_endereco_site`),
  KEY `fk_endereco_site<>usuario` (`usuario_id`),
  CONSTRAINT `fk_endereco_site<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.endereco_site: ~0 rows (aproximadamente)
DELETE FROM `endereco_site`;
/*!40000 ALTER TABLE `endereco_site` DISABLE KEYS */;
INSERT INTO `endereco_site` (`id_endereco_site`, `descricao_endereco_site`, `endereco_endereco_site`, `numero_endereco_site`, `complemento_endereco_site`, `bairro_endereco_site`, `cidade_endereco_site`, `estado_id`, `cep_endereco_site`, `telefone_endereco_site`, `celular_endereco_site`, `email_endereco_site`, `horario_funcionamento_endereco_site`, `latitude_endereco_site`, `longitude_endereco_site`, `configurar_site_id`, `data_atualizacao_endereco_site`, `usuario_id`, `bool_ativo_endereco_site`) VALUES
	(1, 'SJT Construtora', 'Rua. Dr. Agostinho de Souza Lima', 149, '', 'Aparecida', 'Poços de Caldas', 13, '37701-126', '(35) 3721-6494', '', 'sjtconst@veloxmail.com.br', 'Segunda a Sexta: 8h as 17h30', '-21.7889276', '-46.5599226', 1, '2018-07-12 16:17:00', 1, 1);
/*!40000 ALTER TABLE `endereco_site` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_estado` varchar(100) NOT NULL,
  `sigla_estado` char(2) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_estado` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_estado`),
  KEY `fk_estado<>usuario` (`usuario_id`),
  CONSTRAINT `fk_estado<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.estado: ~27 rows (aproximadamente)
DELETE FROM `estado`;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(1, 'Acre', 'AC', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(2, 'Alagoas', 'AL', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(3, 'Amapá', 'AP', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(4, 'Amazonas', 'AM', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(5, 'Bahia', 'BA', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(6, 'Ceará', 'CE', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(7, 'Distrito Federal', 'DF', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(8, 'Espírito Santo', 'ES', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(9, 'Goiás', 'GO', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(10, 'Maranhão', 'MA', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(11, 'Mato Grosso', 'MT', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(12, 'Mato Grosso do Sul', 'MS', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(13, 'Minas Gerais', 'MG', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(14, 'Pará', 'PA', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(15, 'Paraíba', 'PB', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(16, 'Paraná', 'PR', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(17, 'Pernambuco', 'PE', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(18, 'Piauí', 'PI', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(19, 'Rio de Janeiro', 'RJ', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(20, 'Rio Grande do Norte', 'RN', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(21, 'Rio Grande do Sul', 'RS', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(22, 'Rondônia', 'RO', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(23, 'Roraima', 'RR', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(24, 'Santa Catarina', 'SC', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(25, 'São Paulo', 'SP', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(26, 'Sergipe', 'SE', 1, 1);
INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES
	(27, 'Tocantins', 'TO', 1, 1);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.fotos
CREATE TABLE IF NOT EXISTS `fotos` (
  `id_fotos` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_fotos` varchar(50) NOT NULL,
  `imagem_fotos` varchar(100) NOT NULL,
  `item_id` int(11) NOT NULL,
  `data_atualizacao_fotos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_fotos` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_fotos`),
  KEY `fk_fotos<>usuario` (`usuario_id`),
  KEY `fk_fotos<>item` (`item_id`),
  CONSTRAINT `fk_fotos<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`),
  CONSTRAINT `fk_fotos<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.fotos: ~47 rows (aproximadamente)
DELETE FROM `fotos`;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(1, 'Academia', 'MirantesulAcademia.jpg', 1, '2018-07-16 10:46:05', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(2, 'Área Externa', 'Mirantesularea_externa.jpg', 1, '2018-07-16 10:46:27', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(3, 'Banheiro', 'MirantesulBanheiro.jpg', 1, '2018-07-16 10:46:36', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(4, 'Churrasqueira', 'MirantesulChurrasqueira.jpg', 1, '2018-07-16 10:46:50', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(5, 'Cobertura', 'MirantesulCobertura.jpg', 1, '2018-07-16 10:47:03', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(6, 'Cozinha', 'MirantesulCozinha.jpg', 1, '2018-07-16 10:47:11', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(7, 'Dormitório 1', 'MirantesulDormitorio_1.jpg', 1, '2018-07-16 14:50:16', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(8, 'Dormitório 2', 'MirantesulDormitorio_2.jpg', 1, '2018-07-16 10:47:39', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(9, 'Entrada Social', 'MirantesulEntrada_Social.jpg', 1, '2018-07-16 10:47:55', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(10, 'Fachada', 'MirantesulFachada.jpg', 1, '2018-07-16 10:51:35', 1, 0);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(11, 'Guarita', 'MirantesulGuarita.jpg', 1, '2018-07-16 10:48:14', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(12, 'Hall', 'MirantesulHall.jpg', 1, '2018-07-16 10:51:39', 1, 0);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(13, 'Hall Dormitórios', 'Mirantesulhall_dormitorios.jpg', 1, '2018-07-16 10:50:46', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(14, 'Hall Entrada', 'Mirantesulhall_entrada.jpg', 1, '2018-07-16 10:49:02', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(15, 'Lavanderia', 'Mirantesullavanderia.jpg', 1, '2018-07-16 10:49:13', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(16, 'Piscina', 'Mirantesulpiscina.jpg', 1, '2018-07-16 10:49:45', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(17, 'Baheiro', 'villaggio__banheiro.jpg', 2, '2018-07-16 14:47:00', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(18, 'Banheiro Suite', 'villaggio__banheiro_suite.jpg', 2, '2018-07-16 14:47:16', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(19, 'Cozinha e Lavandeira', 'villaggio__cozinha_e_lavanderia.jpg', 2, '2018-07-16 14:47:39', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(20, 'Sacada', 'villaggio__sacada.jpg', 2, '2018-07-16 14:47:48', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(21, 'Sala', 'villaggio__sala.jpg', 2, '2018-07-16 14:48:00', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(22, 'Sala de Jantar', 'villaggio__sala_de_jantar.jpg', 2, '2018-07-16 14:48:12', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(23, 'Suite', 'villaggio__suite.jpg', 2, '2018-07-16 14:48:19', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(24, 'Ccorredor', 'villaggio__villaggio__.jpg', 2, '2018-07-16 14:49:19', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(25, 'Área de Lazer', 'quissisana_tower__Area_de_lazer.jpg', 3, '2018-07-16 15:05:24', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(26, 'Banheiro 1', 'quissisana_tower__banheiro1.jpg', 3, '2018-07-16 15:05:43', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(27, 'Banheiro Suite', 'quissisana_tower__banheiro_suite.jpg', 3, '2018-07-16 15:06:01', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(28, 'Banheiro Suite 2', 'quissisana_tower__Banheiro_Suite_2.jpg', 3, '2018-07-16 15:06:18', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(29, 'Corredor', 'quissisana_tower__corredor.jpg', 3, '2018-07-16 15:06:26', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(30, 'Cozinha', 'quissisana_tower__cozinha.jpg', 3, '2018-07-16 15:06:45', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(31, 'Dispensa', 'quissisana_tower__Dispensa.jpg', 3, '2018-07-16 15:06:54', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(32, 'Dormitório 1', 'quissisana_tower__dormitorio1.jpg', 3, '2018-07-16 15:07:12', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(33, 'Dormitório 2', 'quissisana_tower__dormitorio2.jpg', 3, '2018-07-16 15:08:49', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(34, 'Lavanderia', 'quissisana_tower__lavanderia.jpg', 3, '2018-07-16 15:09:02', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(35, 'Sala', 'quissisana_tower__sala.jpg', 3, '2018-07-16 15:09:13', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(36, 'Suite', 'quissisana_tower__suite.jpg', 3, '2018-07-16 15:09:22', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(37, 'Área de Lazer', 'HondurasArea_de_lazer.jpg', 4, '2018-07-16 15:19:39', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(38, 'Banheiro', 'HondurasBanheiro.jpg', 4, '2018-07-16 15:19:51', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(39, 'Churrasqueira', 'HondurasChurrasqueira.jpg', 4, '2018-07-16 15:20:06', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(40, 'Cozinha', 'HondurasCozinha.jpg', 4, '2018-07-16 15:21:56', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(41, 'Cozinha 2', 'HondurasCozinha2.jpg', 4, '2018-07-16 15:21:32', 1, 0);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(42, 'Dormitório', 'HondurasDormitorio.jpg', 4, '2018-07-16 15:20:50', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(43, 'Escadas', 'HondurasEscadas.jpg', 4, '2018-07-16 15:21:00', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(44, 'Hall Entrada', 'HondurasHall_Entrada.jpg', 4, '2018-07-16 15:23:44', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(45, 'Sala', 'HondurasSala.jpg', 4, '2018-07-16 15:21:18', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(46, 'Vista Frontal', 'jardim_dos_estados_frontal.jpg', 5, '2018-07-16 17:34:59', 1, 1);
INSERT INTO `fotos` (`id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES
	(47, 'Vista do Fundo', 'jardim_dos_estados_fundo.jpg', 5, '2018-07-16 17:35:14', 1, 1);
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.grupo
CREATE TABLE IF NOT EXISTS `grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_grupo` char(50) NOT NULL,
  `imagem_grupo` varchar(100) NOT NULL,
  `data_atualizacao_grupo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) DEFAULT NULL,
  `bool_ativo_grupo` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_grupo`),
  KEY `fk_grupo<>usuario` (`usuario_id`),
  CONSTRAINT `fk_grupo<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sjt.grupo: ~2 rows (aproximadamente)
DELETE FROM `grupo`;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` (`id_grupo`, `descricao_grupo`, `imagem_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES
	(1, 'Casas Residenciais', 'residenncial.png', '2018-07-13 16:38:11', 1, 1);
INSERT INTO `grupo` (`id_grupo`, `descricao_grupo`, `imagem_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES
	(2, 'Condomínios', 'condominio.png', '2018-07-13 16:38:25', 1, 1);
INSERT INTO `grupo` (`id_grupo`, `descricao_grupo`, `imagem_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES
	(3, 'Terrenos', 'jardim_dos_estados_frontal.jpg', '2018-07-16 17:22:11', 1, 1);
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.item
CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_item` varchar(300) NOT NULL,
  `descricao_resumida_item` text,
  `descricao_site_item` text,
  `endereco_item` varchar(300) DEFAULT NULL,
  `numero_item` int(5) NOT NULL,
  `bairro_item` varchar(50) DEFAULT NULL,
  `cidade_item` varchar(50) DEFAULT NULL,
  `estado_id` int(50) DEFAULT NULL,
  `imagem_item` varchar(200) NOT NULL,
  `situacao_id` int(11) NOT NULL,
  `grupo_id` int(11),
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_item` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_item`),
  KEY `fk_item<>usuario` (`usuario_id`),
  KEY `fk_item<>grupo` (`grupo_id`),
  KEY `fk_item<>situacao` (`situacao_id`),
  CONSTRAINT `fk_item<>grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id_grupo`),
  CONSTRAINT `fk_item<>situacao` FOREIGN KEY (`situacao_id`) REFERENCES `situacao` (`id_situacao`),
  CONSTRAINT `fk_item<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sjt.item: ~5 rows (aproximadamente)
DELETE FROM `item`;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` (`id_item`, `titulo_item`, `descricao_resumida_item`, `descricao_site_item`, `endereco_item`, `numero_item`, `bairro_item`, `cidade_item`, `estado_id`, `imagem_item`, `situacao_id`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES
	(1, 'Mirante Sul Residencial', 'Apartamento com 3 dormitórios, sendo 1 suíte, área de lazer  letterspacing 6 com churrasqueira e forno à lenha, academia de ginástica,  piscina aquecida...', 'Apartamentos com 3 dormitórios, sendo 1 suíte, garagem para 2 carros, acabamento em madeira e granito, \nsacada, área de lazer com churrasqueira e forno à lenha, academia de ginástica, piscina aquecida, playground, elevador, \nmonitoramento e guarita 24 horas e vista panôramica.', 'Rua Haiti', 110, 'Jardim Quissisana', 'Poços de Caldas', 13, 'mirante_sul_residencial.png', 1, 2, 1, 1);
INSERT INTO `item` (`id_item`, `titulo_item`, `descricao_resumida_item`, `descricao_site_item`, `endereco_item`, `numero_item`, `bairro_item`, `cidade_item`, `estado_id`, `imagem_item`, `situacao_id`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES
	(2, 'Villaggio di Trento Residencial', 'Apartamentos com 3 dormitórios, sendo 1 suíte, garagem para 2 carros, sacada e área de lazer com churrasqueira...', 'Apartamentos com 3 dormitórios, sendo 1 suíte, garagem para 2 carros, acabamento em \nmadeira e granito, sacada e área de lazer com churrasqueira.', 'Rua Uruguai', 105, 'Jardim Quissisana', 'Poços de Caldas', 13, 'villaggio_di_trento_residencial.jpg', 3, 2, 1, 1);
INSERT INTO `item` (`id_item`, `titulo_item`, `descricao_resumida_item`, `descricao_site_item`, `endereco_item`, `numero_item`, `bairro_item`, `cidade_item`, `estado_id`, `imagem_item`, `situacao_id`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES
	(3, 'Quissisana Tower Residencial', 'Apartamentos com 3 dormitórios, sendo 1 suíte, garagem para 1 \ncarro, despensa individual, acabamento em madeira e granito...', 'Apartamentos com 3 dormitórios, sendo 1 suíte, garagem para 1 carro, despensa individual, \nacabamento em madeira e granito, sacada e área de lazer com churrasqueira.', 'Rua Equador', 245, 'Jardim Quissisana', 'Poços de Caldas', 13, 'quissisana_tower_residencial.png', 3, 2, 1, 1);
INSERT INTO `item` (`id_item`, `titulo_item`, `descricao_resumida_item`, `descricao_site_item`, `endereco_item`, `numero_item`, `bairro_item`, `cidade_item`, `estado_id`, `imagem_item`, `situacao_id`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES
	(4, 'Honduras Top Life Residencial', 'Apartamentos com 3 dormitórios, sendo 1 suíte, garagem \npara 2 carros, despensa individual...', 'Apartamentos com 3 dormitórios, sendo 1 suíte, garagem para 2 carros, despensa individual, \nacabamento em madeira e granito, sacada e área de lazer com churrasqueira.', 'Rua Honduras', 85, 'Jardim Quissisana', 'Poços de Caldas', 13, 'honduras_top_life_residencial.png', 2, 2, 1, 1);
INSERT INTO `item` (`id_item`, `titulo_item`, `descricao_resumida_item`, `descricao_site_item`, `endereco_item`, `numero_item`, `bairro_item`, `cidade_item`, `estado_id`, `imagem_item`, `situacao_id`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES
	(5, 'Terreno Jardim dos Estados', 'Local Ideal para prédio com 910M² de área', 'Local Ideal para prédio com 910M² de área', 'Rua Corumba', 0, 'Jardim dos Estados', 'Poços de Caldas', 13, 'jardim_dos_estados_frontal.jpg', 4, 3, 1, 1);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.item_orcamento
CREATE TABLE IF NOT EXISTS `item_orcamento` (
  `id_item_orcamento` int(11) NOT NULL AUTO_INCREMENT,
  `data_lanc_item_orcamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orcamento_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantidade_item_orcamento` float NOT NULL,
  `total_item_orcamento` float NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_item_orcamento` int(1) DEFAULT '1',
  PRIMARY KEY (`id_item_orcamento`),
  KEY `fk_item_orcamento<>orcamento` (`orcamento_id`),
  KEY `fk_item_orcamento<>item` (`item_id`),
  KEY `fk_item_orcamento<>usuario` (`usuario_id`),
  CONSTRAINT `fk_item_orcamento<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`),
  CONSTRAINT `fk_item_orcamento<>orcamento` FOREIGN KEY (`orcamento_id`) REFERENCES `orcamento` (`id_orcamento`),
  CONSTRAINT `fk_item_orcamento<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.item_orcamento: ~0 rows (aproximadamente)
DELETE FROM `item_orcamento`;
/*!40000 ALTER TABLE `item_orcamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_orcamento` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.loja
CREATE TABLE IF NOT EXISTS `loja` (
  `id_loja` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_loja` varchar(100) NOT NULL,
  `descricao_loja` varchar(100) DEFAULT NULL,
  `imagem_loja` varchar(100) DEFAULT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_loja` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_loja` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_loja`),
  KEY `fk_loja<>usuario` (`usuario_id`),
  CONSTRAINT `fk_loja<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.loja: ~0 rows (aproximadamente)
DELETE FROM `loja`;
/*!40000 ALTER TABLE `loja` DISABLE KEYS */;
INSERT INTO `loja` (`id_loja`, `titulo_loja`, `descricao_loja`, `imagem_loja`, `configurar_site_id`, `data_atualizacao_loja`, `usuario_id`, `bool_ativo_loja`) VALUES
	(1, 'Faça uma visita!', '', 'logo.png', 1, '2018-07-13 15:56:28', 1, 1);
/*!40000 ALTER TABLE `loja` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.new_sjt
CREATE TABLE IF NOT EXISTS `new_sjt` (
  `id_new_sjt` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_new_sjt` varchar(50) NOT NULL,
  `data_atualizacao_new_sjt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_new_sjt` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_new_sjt`),
  KEY `fk_new_SJT<>usuario` (`usuario_id`),
  CONSTRAINT `fk_new_SJT<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.new_sjt: ~7 rows (aproximadamente)
DELETE FROM `new_sjt`;
/*!40000 ALTER TABLE `new_sjt` DISABLE KEYS */;
INSERT INTO `new_sjt` (`id_new_sjt`, `descricao_new_sjt`, `data_atualizacao_new_sjt`, `usuario_id`, `bool_ativo_new_sjt`) VALUES
	(1, 'Edição 44', '2018-07-13 14:19:05', 1, 1);
INSERT INTO `new_sjt` (`id_new_sjt`, `descricao_new_sjt`, `data_atualizacao_new_sjt`, `usuario_id`, `bool_ativo_new_sjt`) VALUES
	(2, 'Edição 45', '2018-07-13 14:19:33', 1, 1);
INSERT INTO `new_sjt` (`id_new_sjt`, `descricao_new_sjt`, `data_atualizacao_new_sjt`, `usuario_id`, `bool_ativo_new_sjt`) VALUES
	(3, 'Edição 46', '2018-07-13 14:19:36', 1, 1);
INSERT INTO `new_sjt` (`id_new_sjt`, `descricao_new_sjt`, `data_atualizacao_new_sjt`, `usuario_id`, `bool_ativo_new_sjt`) VALUES
	(4, 'Edição 47', '2018-07-13 14:19:41', 1, 1);
INSERT INTO `new_sjt` (`id_new_sjt`, `descricao_new_sjt`, `data_atualizacao_new_sjt`, `usuario_id`, `bool_ativo_new_sjt`) VALUES
	(5, 'Edição 49', '2018-07-13 14:19:47', 1, 1);
INSERT INTO `new_sjt` (`id_new_sjt`, `descricao_new_sjt`, `data_atualizacao_new_sjt`, `usuario_id`, `bool_ativo_new_sjt`) VALUES
	(6, 'Edição 50', '2018-07-13 14:19:52', 1, 1);
INSERT INTO `new_sjt` (`id_new_sjt`, `descricao_new_sjt`, `data_atualizacao_new_sjt`, `usuario_id`, `bool_ativo_new_sjt`) VALUES
	(7, 'Edição 52', '2018-07-13 14:19:59', 1, 1);
/*!40000 ALTER TABLE `new_sjt` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.nivel_acesso
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

-- Copiando dados para a tabela sjt.nivel_acesso: ~0 rows (aproximadamente)
DELETE FROM `nivel_acesso`;
/*!40000 ALTER TABLE `nivel_acesso` DISABLE KEYS */;
INSERT INTO `nivel_acesso` (`id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES
	(1, 'Nivel Administrador', 'cliente_site+configurar_site+contato+empresa+estado+grupo+item+new_sjt+quem_somos+saiba_mais+situacao+videos+orcamento-cliente_site+item_orcamento-orcamento+cards-configurar_site+destaque_grupo-configurar_site+endereco_site-configurar_site+slide_show-configurar_site+loja-configurar_site+topicos_loja-loja+adicional_site-saiba_mais+paginas-new_sjt+fotos-item+upload+mapa+mov+relatorio+notificacao+usuario', '2018-07-16 16:48:42', 1, 1);
/*!40000 ALTER TABLE `nivel_acesso` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.notificacoes
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

-- Copiando dados para a tabela sjt.notificacoes: ~0 rows (aproximadamente)
DELETE FROM `notificacoes`;
/*!40000 ALTER TABLE `notificacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.notificacoes_config
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

-- Copiando dados para a tabela sjt.notificacoes_config: ~0 rows (aproximadamente)
DELETE FROM `notificacoes_config`;
/*!40000 ALTER TABLE `notificacoes_config` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacoes_config` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.notificacoes_pendentes
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

-- Copiando dados para a tabela sjt.notificacoes_pendentes: ~0 rows (aproximadamente)
DELETE FROM `notificacoes_pendentes`;
/*!40000 ALTER TABLE `notificacoes_pendentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacoes_pendentes` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.notificacoes_salvas
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

-- Copiando dados para a tabela sjt.notificacoes_salvas: ~0 rows (aproximadamente)
DELETE FROM `notificacoes_salvas`;
/*!40000 ALTER TABLE `notificacoes_salvas` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacoes_salvas` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.orcamento
CREATE TABLE IF NOT EXISTS `orcamento` (
  `id_orcamento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_orcamento` varchar(200) NOT NULL,
  `cliente_site_id` int(11) NOT NULL,
  `data_lanc_orcamento` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_orcamento` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_orcamento`),
  KEY `fk_orcamento<>usuario` (`usuario_id`),
  CONSTRAINT `fk_orcamento<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.orcamento: ~0 rows (aproximadamente)
DELETE FROM `orcamento`;
/*!40000 ALTER TABLE `orcamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `orcamento` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.paginas
CREATE TABLE IF NOT EXISTS `paginas` (
  `id_paginas` int(11) NOT NULL AUTO_INCREMENT,
  `numero_da_pagina_paginas` int(3) NOT NULL,
  `imagem_paginas` varchar(50) NOT NULL,
  `imagem_miniatura_paginas` varchar(50) NOT NULL,
  `new_sjt_id` int(11) NOT NULL,
  `data_atualizacao_paginas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_paginas` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_paginas`),
  KEY `fk_paginas<>usuario` (`usuario_id`),
  CONSTRAINT `fk_paginas<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.paginas: ~56 rows (aproximadamente)
DELETE FROM `paginas`;
/*!40000 ALTER TABLE `paginas` DISABLE KEYS */;
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(2, 1, 'ed44_pag_1.jpg', 'ed44_min_pag_1.jpg', 1, '2018-07-13 14:33:04', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(3, 2, 'ed44_pag_2.jpg', 'ed44_min_pag_2.jpg', 1, '2018-07-13 14:34:47', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(4, 3, 'ed44_pag_3.jpg', 'ed44_min_pag_3.jpg', 1, '2018-07-13 14:34:58', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(5, 4, 'ed44_pag_4.jpg', 'ed44_min_pag_4.jpg', 1, '2018-07-13 14:35:09', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(6, 5, 'ed44_pag_5.jpg', 'ed44_min_pag_5.jpg', 1, '2018-07-13 14:35:24', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(7, 6, 'ed44_pag_6.jpg', 'ed44_min_pag_6.jpg', 1, '2018-07-13 14:35:35', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(8, 7, 'ed44_pag_7.jpg', 'ed44_min_pag_7.jpg', 1, '2018-07-13 14:35:51', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(9, 8, 'ed44_pag_8.jpg', 'ed44_min_pag_8.jpg', 1, '2018-07-13 14:36:03', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(10, 1, 'ed45_pag_1.jpg', 'ed45_min_pag_1.jpg', 2, '2018-07-13 14:45:40', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(11, 2, 'ed45_pag_2.jpg', 'ed45_min_pag_2.jpg', 2, '2018-07-13 14:44:30', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(12, 3, 'ed45_pag_3.jpg', 'ed45_min_pag_3.jpg', 2, '2018-07-13 14:44:39', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(13, 4, 'ed45_pag_4.jpg', 'ed45_min_pag_4.jpg', 2, '2018-07-13 14:44:50', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(14, 5, 'ed45_pag_5.jpg', 'ed45_min_pag_5.jpg', 2, '2018-07-13 14:45:02', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(15, 6, 'ed45_pag_6.jpg', 'ed45_min_pag_6.jpg', 2, '2018-07-13 14:45:10', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(16, 7, 'ed45_pag_7.jpg', 'ed45_min_pag_7.jpg', 2, '2018-07-13 14:45:18', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(17, 8, 'ed45_pag_8.jpg', 'ed45_min_pag_8.jpg', 2, '2018-07-13 14:45:28', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(18, 1, 'ed46_pag_1.jpg', 'ed46_min_pag_1.jpg', 3, '2018-07-13 14:54:21', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(19, 2, 'ed46_pag_2.jpg', 'ed46_min_pag_2.jpg', 3, '2018-07-13 14:54:42', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(20, 3, 'ed46_pag_3.jpg', 'ed46_min_pag_3.jpg', 3, '2018-07-13 14:54:55', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(21, 4, 'ed46_pag_4.jpg', 'ed46_min_pag_4.jpg', 3, '2018-07-13 14:55:07', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(22, 5, 'ed46_pag_5.jpg', 'ed46_min_pag_5.jpg', 3, '2018-07-13 14:55:22', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(23, 6, 'ed46_pag_6.jpg', 'ed46_min_pag_6.jpg', 3, '2018-07-13 14:55:36', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(24, 7, 'ed46_pag_7.jpg', 'ed46_min_pag_7.jpg', 3, '2018-07-13 14:55:46', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(25, 8, 'ed46_pag_8.jpg', 'ed46_min_pag_8.jpg', 3, '2018-07-13 14:55:56', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(26, 1, 'ed47_pag_1.jpg', 'ed47_min_pag_1.jpg', 4, '2018-07-13 15:03:07', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(27, 2, 'ed47_pag_2.jpg', 'ed47_min_pag_2.jpg', 4, '2018-07-13 15:03:20', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(28, 3, 'ed47_pag_3.jpg', 'ed47_min_pag_3.jpg', 4, '2018-07-13 15:03:31', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(29, 4, 'ed47_pag_4.jpg', 'ed47_min_pag_4.jpg', 4, '2018-07-13 15:03:46', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(30, 5, 'ed47_pag_5.jpg', 'ed47_min_pag_5.jpg', 4, '2018-07-13 15:04:00', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(31, 6, 'ed47_pag_6.jpg', 'ed47_min_pag_6.jpg', 4, '2018-07-13 15:04:13', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(32, 7, 'ed47_pag_7.jpg', 'ed47_min_pag_7.jpg', 4, '2018-07-13 15:04:24', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(33, 8, 'ed47_pag_8.jpg', 'ed47_min_pag_8.jpg', 4, '2018-07-13 15:04:37', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(34, 1, 'ed49_pag_1.jpg', 'ed49_min_pag_1.jpg', 5, '2018-07-13 15:15:03', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(35, 2, 'ed49_pag_2.jpg', 'ed49_min_pag_2.jpg', 5, '2018-07-13 15:15:15', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(36, 3, 'ed49_pag_3.jpg', 'ed49_min_pag_3.jpg', 5, '2018-07-13 15:15:28', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(37, 4, 'ed49_pag_4.jpg', 'ed49_min_pag_4.jpg', 5, '2018-07-13 15:15:41', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(38, 5, 'ed49_pag_5.jpg', 'ed49_min_pag_5.jpg', 5, '2018-07-13 15:15:52', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(39, 6, 'ed49_pag_6.jpg', 'ed49_min_pag_6.jpg', 5, '2018-07-13 15:16:06', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(40, 7, 'ed49_pag_7.jpg', 'ed49_min_pag_7.jpg', 5, '2018-07-13 15:16:18', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(41, 8, 'ed49_pag_8.jpg', 'ed49_min_pag_8.jpg', 5, '2018-07-13 15:16:27', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(42, 1, 'ed50_pag_1.jpg', 'ed50_min_pag_1.jpg', 6, '2018-07-13 15:23:25', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(43, 2, 'ed50_pag_2.jpg', 'ed50_min_pag_2.jpg', 6, '2018-07-13 15:23:35', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(44, 3, 'ed50_pag_3.jpg', 'ed50_min_pag_3.jpg', 6, '2018-07-13 15:23:45', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(45, 4, 'ed50_pag_4.jpg', 'ed50_min_pag_4.jpg', 6, '2018-07-13 15:23:58', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(46, 5, 'ed50_pag_5.jpg', 'ed50_min_pag_5.jpg', 6, '2018-07-13 15:24:16', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(47, 6, 'ed50_pag_6.jpg', 'ed50_min_pag_6.jpg', 6, '2018-07-13 15:24:30', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(48, 7, 'ed50_pag_7.jpg', 'ed50_min_pag_7.jpg', 6, '2018-07-13 15:24:43', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(49, 8, 'ed50_pag_8.jpg', 'ed50_min_pag_8.jpg', 6, '2018-07-13 15:24:54', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(50, 1, 'ed52_pag_1.jpg', 'ed52_min_pag_1.jpg', 7, '2018-07-13 15:33:18', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(51, 2, 'ed52_pag_2.jpg', 'ed52_min_pag_2.jpg', 7, '2018-07-13 15:33:29', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(52, 3, 'ed52_pag_3.jpg', 'ed52_min_pag_3.jpg', 7, '2018-07-13 15:33:39', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(53, 4, 'ed52_pag_4.jpg', 'ed52_min_pag_4.jpg', 7, '2018-07-13 15:33:49', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(54, 5, 'ed52_pag_5.jpg', 'ed52_min_pag_5.jpg', 7, '2018-07-13 15:33:57', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(55, 6, 'ed52_pag_6.jpg', 'ed52_min_pag_6.jpg', 7, '2018-07-13 15:34:05', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(56, 7, 'ed52_pag_7.jpg', 'ed52_min_pag_7.jpg', 7, '2018-07-13 15:34:14', 1, 1);
INSERT INTO `paginas` (`id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES
	(57, 8, 'ed52_pag_8.jpg', 'ed52_min_pag_8.jpg', 7, '2018-07-13 15:34:22', 1, 1);
/*!40000 ALTER TABLE `paginas` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.quem_somos
CREATE TABLE IF NOT EXISTS `quem_somos` (
  `id_quem_somos` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_quem_somos` varchar(200) NOT NULL,
  `descricao_quem_somos` text NOT NULL,
  `imagem_quem_somos` varchar(100) NOT NULL,
  `data_atualizacao_quem_somos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_quem_somos` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_quem_somos`),
  KEY `fk_quem_somos<>usuario` (`usuario_id`),
  CONSTRAINT `fk_quem_somos<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.quem_somos: ~1 rows (aproximadamente)
DELETE FROM `quem_somos`;
/*!40000 ALTER TABLE `quem_somos` DISABLE KEYS */;
INSERT INTO `quem_somos` (`id_quem_somos`, `titulo_quem_somos`, `descricao_quem_somos`, `imagem_quem_somos`, `data_atualizacao_quem_somos`, `usuario_id`, `bool_ativo_quem_somos`) VALUES
	(1, 'Sobre a SJT', 'Disposta a inovar o setor de construção civil e satisfazer as necessidades de seus clientes com uma moradia segura, de bom gosto e \nnotável arquitetura, a SJT Incorporadora e Administradora Ltda. prima por qualidade - desde nobre matéria-prima com marcas \nreconhecidas até o detalhe do acabamento final, respeito e segurança em todas as suas obras.\n<br>\nProfissionais renomados, fornecedores eficientes e mão-de-obra especializada são primordiais na garantia de bons resultados. \n<br>\nA empresa que aprimorou o mercado de arquitetura com suas idéias modernas e construções bem feitas valoriza os profissionais desta \nárea e conta com uma equipe competente e comprometida com seu trabalho, sempre construindo qualidade de vida e pensando no \nbem-estar de seus proprietários.\n<br>\nO reconhecimento de sua seriedade pôde ser constatado nos sucessos consecutivos do Prêmio Top of Mind 2005, 2006 e  2007.\n<br>\nVisite você também nossos empreendimentos!', 'sobre.png', '2018-07-12 13:58:22', 1, 1);
/*!40000 ALTER TABLE `quem_somos` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.relatorios
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

-- Copiando dados para a tabela sjt.relatorios: ~0 rows (aproximadamente)
DELETE FROM `relatorios`;
/*!40000 ALTER TABLE `relatorios` DISABLE KEYS */;
/*!40000 ALTER TABLE `relatorios` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.relatorio_tabela
CREATE TABLE IF NOT EXISTS `relatorio_tabela` (
  `id_relatorio_tabela` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_relatorio_tabela` varchar(200) NOT NULL,
  `data_atualizacao_relatorio_tabela` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_relatorio_tabela` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_relatorio_tabela`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.relatorio_tabela: ~0 rows (aproximadamente)
DELETE FROM `relatorio_tabela`;
/*!40000 ALTER TABLE `relatorio_tabela` DISABLE KEYS */;
/*!40000 ALTER TABLE `relatorio_tabela` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.saiba_mais
CREATE TABLE IF NOT EXISTS `saiba_mais` (
  `id_saiba_mais` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_saiba_mais` varchar(200) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `data_atualizacao_saiba_mais` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_saiba_mais` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_saiba_mais`),
  KEY `fk_saiba_mais<>usuario` (`usuario_id`),
  CONSTRAINT `fk_saiba_mais<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.saiba_mais: ~0 rows (aproximadamente)
DELETE FROM `saiba_mais`;
/*!40000 ALTER TABLE `saiba_mais` DISABLE KEYS */;
INSERT INTO `saiba_mais` (`id_saiba_mais`, `descricao_saiba_mais`, `usuario_id`, `data_atualizacao_saiba_mais`, `bool_ativo_saiba_mais`) VALUES
	(1, 'Saiba Mais', 1, '2018-07-13 09:21:16', 1);
/*!40000 ALTER TABLE `saiba_mais` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.site
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

-- Copiando dados para a tabela sjt.site: ~0 rows (aproximadamente)
DELETE FROM `site`;
/*!40000 ALTER TABLE `site` DISABLE KEYS */;
INSERT INTO `site` (`ID_SITE`, `NOME_EMPRESA`, `NOME_CIDADE`, `ESTADO`, `FONE`, `FONE_APP`, `EMAIL`, `sendusername`, `sendpassword`, `smtpserver`, `smtpserverport`, `MailFrom`, `MailTo`, `MailCc`, `bool_ativo_site`) VALUES
	(1, 'SJT Construtora', 'Poços de Caldas', 'MG', '(35) 3721-6494', '', 'cdi@cdiinfo.com.br', 'thiago@cdiinfo.com.br', 'Cdidesenv03@', 'mail.cdiinfo.com.br', 465, 'thiago@cdiinfo.com.br', 'thiago.cdi@Hotmail.com', 'cdiinfo.suporte@gmail.com', 1);
/*!40000 ALTER TABLE `site` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.situacao
CREATE TABLE IF NOT EXISTS `situacao` (
  `id_situacao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_situacao` varchar(100) NOT NULL,
  `cor_situacao` varchar(20) NOT NULL,
  `data_atualizacao_situacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_situacao` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_situacao`),
  KEY `fk_status<>usuario` (`usuario_id`),
  CONSTRAINT `fk_status<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.situacao: ~4 rows (aproximadamente)
DELETE FROM `situacao`;
/*!40000 ALTER TABLE `situacao` DISABLE KEYS */;
INSERT INTO `situacao` (`id_situacao`, `descricao_situacao`, `cor_situacao`, `data_atualizacao_situacao`, `usuario_id`, `bool_ativo_situacao`) VALUES
	(1, 'Pronto P/ Morar', 'green;', '2018-07-13 17:22:48', 1, 1);
INSERT INTO `situacao` (`id_situacao`, `descricao_situacao`, `cor_situacao`, `data_atualizacao_situacao`, `usuario_id`, `bool_ativo_situacao`) VALUES
	(2, '100% Vendido', 'red;', '2018-07-16 16:49:47', 1, 1);
INSERT INTO `situacao` (`id_situacao`, `descricao_situacao`, `cor_situacao`, `data_atualizacao_situacao`, `usuario_id`, `bool_ativo_situacao`) VALUES
	(3, 'Últimas Unidades', '#f0ad4e;', '2018-07-16 16:53:40', 1, 1);
INSERT INTO `situacao` (`id_situacao`, `descricao_situacao`, `cor_situacao`, `data_atualizacao_situacao`, `usuario_id`, `bool_ativo_situacao`) VALUES
	(4, 'Vende-se', 'green;', '2018-07-16 17:28:37', 1, 1);
INSERT INTO `situacao` (`id_situacao`, `descricao_situacao`, `cor_situacao`, `data_atualizacao_situacao`, `usuario_id`, `bool_ativo_situacao`) VALUES
	(5, 'Vendido', 'red;', '2018-07-17 08:38:34', 1, 1);
/*!40000 ALTER TABLE `situacao` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.slide_show
CREATE TABLE IF NOT EXISTS `slide_show` (
  `id_slide_show` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_slide_show` varchar(100) DEFAULT NULL,
  `descricao_slide_show` varchar(200) DEFAULT NULL,
  `imagem_slide_show` varchar(100) NOT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_slide_show` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_slide_show` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_slide_show`),
  KEY `fk_slide_show<>usuario` (`usuario_id`),
  CONSTRAINT `fk_slide_show<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.slide_show: ~3 rows (aproximadamente)
DELETE FROM `slide_show`;
/*!40000 ALTER TABLE `slide_show` DISABLE KEYS */;
INSERT INTO `slide_show` (`id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `usuario_id`, `bool_ativo_slide_show`) VALUES
	(1, 'Honduras Top Life Residencial', 'Totalmente Vendido', 'Honduras_Top_Life_Residencial.png', 1, '2018-07-12 10:28:33', 1, 1);
INSERT INTO `slide_show` (`id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `usuario_id`, `bool_ativo_slide_show`) VALUES
	(2, 'Mirante Sul Residencial', 'Pronto P/ Morar', 'Mirante_Sul_Residencial.png', 1, '2018-07-12 10:28:36', 1, 1);
INSERT INTO `slide_show` (`id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `usuario_id`, `bool_ativo_slide_show`) VALUES
	(3, 'Villaggio Di Trento Residencial', 'Totalmente Vendido', 'villaggio_di_trento_residencial.jpg', 1, '2018-07-17 08:19:01', 1, 1);
INSERT INTO `slide_show` (`id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `usuario_id`, `bool_ativo_slide_show`) VALUES
	(6, 'Quissisana Tower Residencial', 'Totalmente Vendido', 'Quissisana_Tower_Residencial.jpg', 1, '2018-07-12 10:52:12', 1, 1);
/*!40000 ALTER TABLE `slide_show` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.topicos_loja
CREATE TABLE IF NOT EXISTS `topicos_loja` (
  `id_topicos_loja` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_topicos_loja` varchar(100) NOT NULL,
  `descricao_topicos_loja` varchar(100) NOT NULL,
  `loja_id` int(11) NOT NULL,
  `data_atualizacao_topicos_loja` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_topicos_loja` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_topicos_loja`),
  KEY `fk_topicos_loja<>loja` (`loja_id`),
  KEY `fk_topicos_loja<>usuario` (`usuario_id`),
  CONSTRAINT `fk_topicos_loja<>loja` FOREIGN KEY (`loja_id`) REFERENCES `loja` (`id_loja`),
  CONSTRAINT `fk_topicos_loja<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.topicos_loja: ~3 rows (aproximadamente)
DELETE FROM `topicos_loja`;
/*!40000 ALTER TABLE `topicos_loja` DISABLE KEYS */;
INSERT INTO `topicos_loja` (`id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `usuario_id`, `bool_ativo_topicos_loja`) VALUES
	(1, 'Endereço', 'Rua. Dr. Agostinho de Souza Lima, 149 - Aparecida  Poços de Caldas - MG, 37701-126 ', 1, '2018-07-13 15:51:14', 1, 1);
INSERT INTO `topicos_loja` (`id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `usuario_id`, `bool_ativo_topicos_loja`) VALUES
	(3, 'Telefone', '(35) 3721-6494', 1, '2018-07-13 15:54:58', 1, 1);
INSERT INTO `topicos_loja` (`id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `usuario_id`, `bool_ativo_topicos_loja`) VALUES
	(4, 'E-mail', 'sjtconst@veloxmail.com.br', 1, '2018-07-13 15:55:16', 1, 1);
INSERT INTO `topicos_loja` (`id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `usuario_id`, `bool_ativo_topicos_loja`) VALUES
	(5, 'Horário de Funcionamento', 'Segunda a Sexta: 8h as 17h30', 1, '2018-07-13 15:55:27', 1, 1);
/*!40000 ALTER TABLE `topicos_loja` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.upload_arq
CREATE TABLE IF NOT EXISTS `upload_arq` (
  `id_upload_arq` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_upload_arq` varchar(100) NOT NULL,
  `tipo_upload_arq` varchar(100) NOT NULL,
  `data_atualizacaoupload_arq` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_upload_arq` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_upload_arq`)
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.upload_arq: ~1 rows (aproximadamente)
DELETE FROM `upload_arq`;
/*!40000 ALTER TABLE `upload_arq` DISABLE KEYS */;
INSERT INTO `upload_arq` (`id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES
	(201, 'villaggio_di_trento_residencial.jpg', 'imagem', '2018-07-17 08:15:54', 1);
INSERT INTO `upload_arq` (`id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES
	(202, 'Villaggio_Di_Trento_Residencial_min.png', 'imagem', '2018-07-17 08:16:54', 1);
/*!40000 ALTER TABLE `upload_arq` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.usuario
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

-- Copiando dados para a tabela sjt.usuario: ~2 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES
	(1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1);
INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES
	(2, 'SITE', 'SIT', '*C737C0A2F678ACBE092353610475CC003320E65E', 1, 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela sjt.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `id_videos` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_videos` text NOT NULL,
  `link_videos` varchar(200) NOT NULL,
  `data_atualizacao_videos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_videos` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_videos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sjt.videos: ~0 rows (aproximadamente)
DELETE FROM `videos`;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
