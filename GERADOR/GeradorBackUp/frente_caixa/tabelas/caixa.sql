
-- Criar tabela caixa
-- Gerando em: 01/08/2018 17:01:46
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `caixa`;

CREATE TABLE IF NOT EXISTS `caixa` (
	`id_caixa` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_caixa` varchar(200) NOT NULL ,
	`filial_id` int(200) NOT NULL ,
	`data_atualizacao_caixa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_caixa` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO caixa ( `id_caixa`, `descricao_caixa`, `filial_id`, `data_atualizacao_caixa`, `usuario_id`, `bool_ativo_caixa`) VALUES ( 1, 'Caixa 01', 1, '2018-06-14 09:43:36', 1, 1);