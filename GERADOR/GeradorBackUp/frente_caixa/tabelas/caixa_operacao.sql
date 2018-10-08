
-- Criar tabela caixa_operacao
-- Gerando em: 01/08/2018 17:01:47
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `caixa_operacao`;

CREATE TABLE IF NOT EXISTS `caixa_operacao` (
	`id_caixa_operacao` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`valor_caixa_operacao` float NOT NULL ,
	`caixa_movimentacao_id` int(11) NOT NULL ,
	`operacoes_caixa_id` int(200) NOT NULL ,
	`data_emissao_caixa_operacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`data_atualizacao_caixa_operacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_caixa_operacao` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro