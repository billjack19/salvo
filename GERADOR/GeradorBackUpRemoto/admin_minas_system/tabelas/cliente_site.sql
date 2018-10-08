
-- Criar tabela cliente_site
-- Gerando em: 01/08/2018 16:54:40
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
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 2, 'Jack Biller', 'jac', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '99723-1080', '', '', 0, '', '', '', 0, '', 1
);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 8, 'Teste Jack', 'tes', '*64D475A63138B1EFF85F475F994501BF26331685', '123', '', '', 0, '', '', '', 0, '', 1
);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 9, 'rafael', 'rafaelt', '*EC0FF37D2410C08F652646F814222DB2070E5661', '33333333', '333333333', 'ccccccc', 111, '', 'vvvvvv', 'dddddd', 0, '11111111', 1
);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 10, 'jelson teixeira', 'jelsonteixeira', '*CD670D3435B07FE0C8105DC0A48E35A10DAE909C', '35991602440', '35991602440', 'travesa valeriano jose da silva', 37, 'casa fundo 37a', 'centro', 'guaxupé', 0, '37800000', 1
);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 11, 'ysmaily', 'ysmaily', '*FE40A6FB694966392C6996313FBA2C2E9AE2CBF3', '35997591807', '35992097779', 'rua major francisco anacleto', 933, 'loja A', 'centro', 'nova resende', 0, '37860000', 1
);