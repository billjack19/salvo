
-- Criar tabela teste_gatilho
-- Gerando em: 01/08/2018 16:54:09
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `teste_gatilho`;

CREATE TABLE IF NOT EXISTS `teste_gatilho` (
	`id_teste_gatilho` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`Referencia_teste_gatilho` varchar(3) NOT NULL ,
	`Descricao_teste_gatilho` varchar(50) NOT NULL ,
	`Estoque_teste_gatilho` int(11) NOT NULL ,
	`data_atualizacao_teste_gatilho` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_teste_gatilho` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro