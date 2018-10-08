
-- Criar tabela relatorio_tabela
-- Gerando em: 01/08/2018 17:00:34
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `relatorio_tabela`;

CREATE TABLE IF NOT EXISTS `relatorio_tabela` (
	`id_relatorio_tabela` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_relatorio_tabela` varchar(200) NOT NULL ,
	`data_atualizacao_relatorio_tabela` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_relatorio_tabela` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro