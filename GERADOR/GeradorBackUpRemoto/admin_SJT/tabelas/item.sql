
-- Criar tabela item
-- Gerando em: 02/08/2018 10:25:04
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `item`;

CREATE TABLE IF NOT EXISTS `item` (
	`id_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_item` varchar(300) NOT NULL ,
	`descricao_resumida_item` text  ,
	`descricao_site_item` text  ,
	`imagem_item` varchar(200) NOT NULL ,
	`endereco_item` varchar(300)  ,
	`numero_item` int(5) NOT NULL ,
	`bairro_item` varchar(50)  ,
	`cidade_item` varchar(50)  ,
	`estado_id` int(50)  ,
	`situacao_id` int(11) NOT NULL ,
	`grupo_id` int(11)  ,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_item` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;