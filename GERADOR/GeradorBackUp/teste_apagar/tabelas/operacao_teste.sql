
-- Criar tabela operacao_teste
-- Gerando em: 01/08/2018 16:54:08
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `operacao_teste`;

CREATE TABLE IF NOT EXISTS `operacao_teste` (
	`id_operacao_teste` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`valor_1_operacao_teste` int(11) NOT NULL ,
	`valor_2_operacao_teste` int(11) NOT NULL ,
	`resultado_operacao_teste` int(11) NOT NULL ,
	`valor_3_operacao_teste` int(11) NOT NULL ,
	`valor_4_operacao_teste` int(11) NOT NULL ,
	`resultado_2_operacao_teste` int(11) NOT NULL ,
	`resultado_final_operacao_teste` int(11) NOT NULL ,
	`data_atualizacao_operacao_teste` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_operacao_teste` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO operacao_teste ( `id_operacao_teste`, `valor_1_operacao_teste`, `valor_2_operacao_teste`, `resultado_operacao_teste`, `valor_3_operacao_teste`, `valor_4_operacao_teste`, `resultado_2_operacao_teste`, `resultado_final_operacao_teste`, `data_atualizacao_operacao_teste`, `usuario_id`, `bool_ativo_operacao_teste`) VALUES ( 1, 150, 20, 120, 30, 50, 2, 0, '2018-02-01 14:34:11', 1, 1
);