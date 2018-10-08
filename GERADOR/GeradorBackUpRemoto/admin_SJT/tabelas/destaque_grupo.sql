
-- Criar tabela destaque_grupo
-- Gerando em: 02/08/2018 10:24:55
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `destaque_grupo`;

CREATE TABLE IF NOT EXISTS `destaque_grupo` (
	`id_destaque_grupo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_destaque_grupo` varchar(100) NOT NULL ,
	`grupo_id` int(11) NOT NULL ,
	`imagem_destaque_grupo` varchar(100) NOT NULL ,
	`descricao_destaque_grupo` varchar(300)  ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_destaque_grupo` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_destaque_grupo` int(1) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;