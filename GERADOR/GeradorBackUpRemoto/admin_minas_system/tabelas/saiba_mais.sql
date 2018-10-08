
-- Criar tabela saiba_mais
-- Gerando em: 01/08/2018 16:54:51
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `saiba_mais`;

CREATE TABLE IF NOT EXISTS `saiba_mais` (
	`id_saiba_mais` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_saiba_mais` varchar(200) NOT NULL ,
	`usuario_id` int(11) NOT NULL ,
	`data_atualizacao_saiba_mais` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_saiba_mais` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro