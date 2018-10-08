
-- Criar tabela cliente_site
-- Gerando em: 01/08/2018 16:52:03
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
	`bool_ativo_cliente_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 9, 'Jack Biller', 'jac', '123', '123', '', '', 0, '', '', '', 0, '', 1
);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 10, 'Omnes Engenharia', 'Omnes ', 'omnes0110', '11 25978118', '11 43718587', 'Rua Jandiatuba', 630, 'cj 129', 'Vila Andrade', 'Sao Paulo', 0, '05716150', 1
);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 11, 'Omnes Engenharia', 'Omnes ', 'omnes0110', '11 25978118', '11 43718587', 'Rua Jandiatuba', 630, 'cj 129', 'Vila Andrade', 'Sao Paulo', 0, '05716150', 1
);