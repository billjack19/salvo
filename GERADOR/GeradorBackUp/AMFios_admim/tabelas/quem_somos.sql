
-- Criar tabela quem_somos
-- Gerando em: 01/08/2018 16:49:41
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `quem_somos`;

CREATE TABLE IF NOT EXISTS `quem_somos` (
	`id_quem_somos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_quem_somos` varchar(200) NOT NULL ,
	`descricao_quem_somos` text NOT NULL ,
	`data_atualizacao_quem_somos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_quem_somos` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO quem_somos ( `id_quem_somos`, `titulo_quem_somos`, `descricao_quem_somos`, `data_atualizacao_quem_somos`, `bool_ativo_quem_somos`) VALUES ( 1, 'Quem Somos?', ' ', '2018-01-10 14:06:51', 0
);