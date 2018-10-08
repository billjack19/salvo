
-- Criar tabela slide_show
-- Gerando em: 01/08/2018 16:52:45
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `slide_show`;

CREATE TABLE IF NOT EXISTS `slide_show` (
	`id_slide_show` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_slide_show` varchar(100)  ,
	`descricao_slide_show` varchar(200)  ,
	`imagem_slide_show` varchar(100) NOT NULL ,
	`data_atualizacao_slide_show` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_slide_show` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 1, 'Teste', 'teste', 'fundo-slideshow-home.jpg', '2018-01-06 09:49:35', 1
);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 2, 'Teste 2', '...', 'maxresdefault.jpg', '2018-01-06 10:39:49', 1
);