
-- Criar tabela videos
-- Gerando em: 01/08/2018 16:54:54
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `videos`;

CREATE TABLE IF NOT EXISTS `videos` (
	`id_videos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_videos` text NOT NULL ,
	`link_videos` varchar(200) NOT NULL ,
	`data_atualizacao_videos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_videos` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO videos ( `id_videos`, `descricao_videos`, `link_videos`, `data_atualizacao_videos`, `bool_ativo_videos`) VALUES ( 1, '\'teste"', 'teste', '2018-02-06 10:25:32', 0
);