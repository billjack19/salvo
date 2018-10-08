
-- Criar tabela cliente_site
-- Gerando em: 01/08/2018 16:51:33
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
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 1, 'teste', 'teste', 'teste', 'Teste', '', '', 0, '', '', '', 13, '', 1
);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 2, 'Jack Biller', 'jac', '123', '9999-9999', '', '', 0, '', '', '', , '', 1
);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 4, 'Jack', 'jac', '123', '123', '', '', 0, '', '', '', 0, '', 0
);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 5, 'Teste Jack', 'jac', '456', '125', '', '', 0, '', '', '', , '', 1
);