
-- Criar tabela tabela_padrao
-- Gerando em: 05/08/2018 23:35:08
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `tabela_padrao`;

CREATE TABLE IF NOT EXISTS `tabela_padrao` (
	`id_tabela_padrao` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_tabela_padrao` varchar(200) NOT NULL ,
	`usuario_id` int(11)  ,
	`bool_ativo_tabela_padrao` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;