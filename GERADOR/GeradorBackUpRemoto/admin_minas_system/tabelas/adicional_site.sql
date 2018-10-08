
-- Criar tabela adicional_site
-- Gerando em: 01/08/2018 16:54:38
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `adicional_site`;

CREATE TABLE IF NOT EXISTS `adicional_site` (
	`id_adicional_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_adicional_site` varchar(200) NOT NULL ,
	`descricao_adicional_site` text NOT NULL ,
	`imagem_adicional_site` varchar(200) NOT NULL ,
	`saiba_mais_id` int(11) NOT NULL ,
	`usuario_id` int(11) NOT NULL ,
	`data_atualizacao_adicional_site` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_adicional_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro