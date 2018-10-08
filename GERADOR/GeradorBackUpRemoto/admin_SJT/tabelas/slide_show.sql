
-- Criar tabela slide_show
-- Gerando em: 02/08/2018 10:25:25
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `slide_show`;

CREATE TABLE IF NOT EXISTS `slide_show` (
	`id_slide_show` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_slide_show` varchar(100)  ,
	`descricao_slide_show` varchar(200)  ,
	`imagem_slide_show` varchar(100) NOT NULL ,
	`item_id` int(11)  ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_slide_show` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_slide_show` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;