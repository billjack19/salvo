
-- Criar tabela cards
-- Gerando em: 01/08/2018 16:54:39
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `cards`;

CREATE TABLE IF NOT EXISTS `cards` (
	`id_cards` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_cards` varchar(100) NOT NULL ,
	`descricao_cards` varchar(200)  ,
	`imagem_cards` varchar(100) NOT NULL ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_cards` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_cards` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 1, 'Next Cable', '', 'Logonext.jpg', 1, '2018-01-25 09:49:34', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 2, 'Giga Security', '', 'cftv-hvr-adr-16-canais-gs16hd-hd-720p-giga-security-D_NQ_NP_143101-MLB8203210394_042015-F.jpg', 1, '2018-02-05 16:27:00', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 3, 'New Back', '', 'marcanewback.png', 1, '2018-01-25 09:51:47', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 4, 'TecVoz', '', 'tecvoz-1.jpg', 1, '2018-02-05 16:27:31', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 5, 'Lider', '', 'lider.jpg', 1, '2018-02-05 16:28:00', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 6, 'Telecam', '', 'telecam.png', 1, '2018-02-05 16:28:22', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 7, 'Multilaser', '', 'multilaser.png', 1, '2018-02-05 16:28:49', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 8, 'Magatron', '', 'megatron.jpg', 1, '2018-02-05 16:29:08', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 9, 'Onix', '', 'logo-onix.png', 1, '2018-02-05 16:30:13', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 10, 'Ragteck', '', 'ragteck.jpg', 1, '2018-02-05 16:30:53', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 11, 'Genno', '', 'genno.jpg', 1, '2018-02-05 16:31:15', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 12, 'TravBem', '', 'logo_travben.jpg', 1, '2018-02-05 16:31:41', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 13, 'UDI', '', 'udi cabos.png', 1, '2018-02-05 16:31:58', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 14, 'PPA', '', 'ppa.png', 1, '2018-06-22 16:30:36', 1
);