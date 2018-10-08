
-- Criar tabela quem_somos
-- Gerando em: 02/08/2018 10:25:17
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `quem_somos`;

CREATE TABLE IF NOT EXISTS `quem_somos` (
	`id_quem_somos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_quem_somos` varchar(200) NOT NULL ,
	`descricao_quem_somos` text NOT NULL ,
	`imagem_quem_somos` varchar(100) NOT NULL ,
	`data_atualizacao_quem_somos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_quem_somos` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;