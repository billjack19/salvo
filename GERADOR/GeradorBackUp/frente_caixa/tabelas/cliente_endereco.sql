
-- Criar tabela cliente_endereco
-- Gerando em: 01/08/2018 17:01:47
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `cliente_endereco`;

CREATE TABLE IF NOT EXISTS `cliente_endereco` (
	`id_cliente_endereco` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`endereco_cliente_endereco` varchar(200) NOT NULL ,
	`numero_cliente_endereco` int(11) NOT NULL ,
	`complemento_cliente_endereco` varchar(100)  ,
	`bairro_cliente_endereco` varchar(200) NOT NULL ,
	`cidade_cliente_endereco` varchar(200) NOT NULL ,
	`estado_id` int(50) NOT NULL ,
	`cliente_id` int(11)  ,
	`data_atualizacao_cliente_endereco` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_cliente_endereco` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cliente_endereco ( `id_cliente_endereco`, `endereco_cliente_endereco`, `numero_cliente_endereco`, `complemento_cliente_endereco`, `bairro_cliente_endereco`, `cidade_cliente_endereco`, `estado_id`, `cliente_id`, `data_atualizacao_cliente_endereco`, `usuario_id`, `bool_ativo_cliente_endereco`) VALUES ( 1, 'Teste', 12, '', 'Teste', 'Teste', 13, 1, '2018-06-14 10:10:11', 1, 1);