
-- Criar tabela endereco_site
-- Gerando em: 01/08/2018 16:52:45
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `endereco_site`;

CREATE TABLE IF NOT EXISTS `endereco_site` (
	`id_endereco_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_endereco_site` varchar(100) NOT NULL ,
	`endereco_endereco_site` varchar(100) NOT NULL ,
	`numero_endereco_site` int(11) NOT NULL ,
	`complemento_endereco_site` varchar(100)  ,
	`cidade_endereco_site` varchar(100) NOT NULL ,
	`estado_id` int(11) NOT NULL ,
	`cep_endereco_site` varchar(15) NOT NULL ,
	`telefone_endereco_site` varchar(50) NOT NULL ,
	`celular_endereco_site` varchar(50)  ,
	`horario_funcionamento_endereco_site` text NOT NULL ,
	`latitude_endereco_site` varchar(100) NOT NULL ,
	`longitude_endereco_site` varchar(100) NOT NULL ,
	`data_atualizacao_endereco_site` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_endereco_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO endereco_site ( `id_endereco_site`, `descricao_endereco_site`, `endereco_endereco_site`, `numero_endereco_site`, `complemento_endereco_site`, `cidade_endereco_site`, `estado_id`, `cep_endereco_site`, `telefone_endereco_site`, `celular_endereco_site`, `horario_funcionamento_endereco_site`, `latitude_endereco_site`, `longitude_endereco_site`, `data_atualizacao_endereco_site`, `bool_ativo_endereco_site`) VALUES ( 1, 'teste', 'Travessa José Sebastião Pimentel', 71, '', 'Poços de Caldas', 13, '37701-253', '(35 ) 9 9723-1080', '', '08:00h - 18:00h', '-21.801543277945747', '-46.5680730342865', '2018-01-10 16:48:20', 1
);