
-- Criar tabela livro
-- Gerando em: 01/08/2018 16:54:06
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `livro`;

CREATE TABLE IF NOT EXISTS `livro` (
	`id_livro` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_livro` varchar(200) NOT NULL ,
	`codigo_livro` varchar(150) NOT NULL ,
	`genero_id` int(200) NOT NULL ,
	`data_atualizacao_livro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_livro` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO livro ( `id_livro`, `descricao_livro`, `codigo_livro`, `genero_id`, `data_atualizacao_livro`, `usuario_id`, `bool_ativo_livro`) VALUES ( 1, 'O livro', '123', 1, '2018-01-23 08:05:42', 1, 1
);
INSERT INTO livro ( `id_livro`, `descricao_livro`, `codigo_livro`, `genero_id`, `data_atualizacao_livro`, `usuario_id`, `bool_ativo_livro`) VALUES ( 2, 'O Livro Assombrado', '465', 2, '2018-01-23 08:06:05', 1, 1
);
INSERT INTO livro ( `id_livro`, `descricao_livro`, `codigo_livro`, `genero_id`, `data_atualizacao_livro`, `usuario_id`, `bool_ativo_livro`) VALUES ( 3, 'O poema misterioso', '1542', 2, '2018-03-27 08:10:41', 1, 1
);
INSERT INTO livro ( `id_livro`, `descricao_livro`, `codigo_livro`, `genero_id`, `data_atualizacao_livro`, `usuario_id`, `bool_ativo_livro`) VALUES ( 4, 'Teoria de tudo', '1956', 3, '2018-04-13 15:15:08', 1, 1
);
INSERT INTO livro ( `id_livro`, `descricao_livro`, `codigo_livro`, `genero_id`, `data_atualizacao_livro`, `usuario_id`, `bool_ativo_livro`) VALUES ( 5, 'Meia Noite e Meia', '548546', 1, '2018-04-14 09:11:47', 1, 1
);
INSERT INTO livro ( `id_livro`, `descricao_livro`, `codigo_livro`, `genero_id`, `data_atualizacao_livro`, `usuario_id`, `bool_ativo_livro`) VALUES ( 6, 'Só pra Variar', '458462', 1, '2018-04-14 08:53:04', 1, 1
);