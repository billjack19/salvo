
-- Criar tabela andar
-- Gerando em: 01/08/2018 16:58:23
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `andar`;

CREATE TABLE IF NOT EXISTS `andar` (
	`id_andar` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_andar` varchar(200) NOT NULL ,
	`data_atualizacao_andar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_andar` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO andar ( `id_andar`, `descricao_andar`, `data_atualizacao_andar`, `usuario_id`, `bool_ativo_andar`) VALUES ( 1, '1° Andar', '2018-02-07 17:31:27', 1, 1);
INSERT INTO andar ( `id_andar`, `descricao_andar`, `data_atualizacao_andar`, `usuario_id`, `bool_ativo_andar`) VALUES ( 2, '2° Andar', '2018-02-07 17:26:56', 1, 1);