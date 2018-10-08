
-- Criar tabela videos
-- Gerando em: 01/08/2018 16:52:16
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `videos`;

CREATE TABLE IF NOT EXISTS `videos` (
	`id_videos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_videos` text  ,
	`link_videos` varchar(500) NOT NULL ,
	`data_atualizacao_videos` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_videos` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO videos ( `id_videos`, `descricao_videos`, `link_videos`, `data_atualizacao_videos`, `bool_ativo_videos`) VALUES ( 1, 'Teste', 'https://www.youtube.com/watch?v=WebuwmLTBrI', '2018-01-17 23:52:14', 0
);