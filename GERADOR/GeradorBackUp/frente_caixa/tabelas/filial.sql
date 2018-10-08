
-- Criar tabela filial
-- Gerando em: 01/08/2018 17:01:48
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `filial`;

CREATE TABLE IF NOT EXISTS `filial` (
	`id_filial` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`razao_social_filial` varchar(200) NOT NULL ,
	`cnpj_filial` varchar(25) NOT NULL ,
	`empresa_id` int(200)  ,
	`data_atualizacao_filial` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_filial` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO filial ( `id_filial`, `razao_social_filial`, `cnpj_filial`, `empresa_id`, `data_atualizacao_filial`, `usuario_id`, `bool_ativo_filial`) VALUES ( 1, 'Filial 01', '123', , '2018-06-14 09:43:18', 1, 1);