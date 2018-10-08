
-- Criar tabela padrao_banco_de_dados
-- Gerando em: 05/08/2018 23:35:07
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `padrao_banco_de_dados`;

CREATE TABLE IF NOT EXISTS `padrao_banco_de_dados` (
	`id_padrao_banco_de_dados` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_padrao_banco_de_dados` varchar(200)  ,
	`descricao_padrao_banco_de_dados` text  ,
	`observacoes_padrao_banco_de_dados` text  ,
	`data_atualizacao_padrao_banco_de_dados` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_padrao_banco_de_dados` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;