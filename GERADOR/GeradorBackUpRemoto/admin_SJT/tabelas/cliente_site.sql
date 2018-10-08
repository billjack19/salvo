
-- Criar tabela cliente_site
-- Gerando em: 02/08/2018 10:24:51
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `cliente_site`;

CREATE TABLE IF NOT EXISTS `cliente_site` (
	`id_cliente_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_cliente_site` varchar(200) NOT NULL ,
	`login_cliente_site` varchar(200) NOT NULL ,
	`senha_cliente_site` varchar(200) NOT NULL ,
	`telefone_cliente_site` varchar(30) NOT NULL ,
	`celular_cliente_site` varchar(30)  ,
	`endereco_cliente_site` varchar(500)  ,
	`numero_cliente_site` int(11)  ,
	`complemento_cliente_site` varchar(200)  ,
	`bairro_cliente_site` varchar(200)  ,
	`cidade_cliente_site` varchar(200)  ,
	`estado_id` int(11)  ,
	`cep_cliente_site` varchar(30)  ,
	`data_atualizacao_cliente_site` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11)  ,
	`bool_ativo_cliente_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;