
-- Criar tabela orcamento
-- Gerando em: 01/08/2018 17:01:23
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `orcamento`;

CREATE TABLE IF NOT EXISTS `orcamento` (
	`id_orcamento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`emissao_orcamento` datetime  DEFAULT CURRENT_TIMESTAMP ,
	`descricao_orcamento` varchar(200)  ,
	`data_atualizacao_orcamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_orcamento` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO orcamento ( `id_orcamento`, `emissao_orcamento`, `descricao_orcamento`, `data_atualizacao_orcamento`, `usuario_id`, `bool_ativo_orcamento`) VALUES ( 1, '2018-05-21 14:52:56', 'Compras mês 05-2018', '2018-05-21 14:52:56', 1, 1);