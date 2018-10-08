
-- Criar tabela caixa_movimentacao
-- Gerando em: 01/08/2018 17:01:47
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `caixa_movimentacao`;

CREATE TABLE IF NOT EXISTS `caixa_movimentacao` (
	`id_caixa_movimentacao` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`valor_abertura_caixa_movimentacao` float  ,
	`valor_fechamento_caixa_movimentacao` float  ,
	`data_abertura_caixa_movimentacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`data_fechamento_caixa_movimentacao` datetime  ,
	`caixa_id` int(11) NOT NULL ,
	`data_atualizacao_caixa_movimentacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_caixa_movimentacao` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro