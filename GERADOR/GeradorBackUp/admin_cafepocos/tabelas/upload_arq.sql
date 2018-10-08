
-- Criar tabela upload_arq
-- Gerando em: 01/08/2018 16:53:40
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `upload_arq`;

CREATE TABLE IF NOT EXISTS `upload_arq` (
	`id_upload_arq` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_upload_arq` varchar(100) NOT NULL ,
	`tipo_upload_arq` varchar(100) NOT NULL ,
	`data_atualizacaoupload_arq` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_upload_arq` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 32, 'Logo_cafe_pocos.png', 'imagem', '2018-01-12 13:15:25', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 34, 'fundo2.jpg', 'imagem', '2018-01-12 13:17:10', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 35, 'fundo3.jpg', 'imagem', '2018-01-12 13:17:24', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 36, 'adubo.jpg', 'imagem', '2018-01-12 13:40:12', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 37, 'defensivo.png', 'imagem', '2018-01-12 13:40:47', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 38, 'ferramentas.jpg', 'imagem', '2018-01-12 13:41:03', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 42, '2.jpg', 'imagem', '2018-01-12 15:44:14', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 45, 'Video1.mp4', 'video', '2018-01-13 11:09:34', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 54, 'Logotipo.JPG', 'imagem', '2018-01-15 13:39:46', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 55, 'coffeeshop1.jpg', 'imagem', '2018-01-15 13:39:48', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 56, 'fundo1.jpeg', 'imagem', '2018-01-15 13:39:49', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 57, '60.jpg', 'imagem', '2018-01-15 13:46:56', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 59, 'Kalimba.mp3', 'audio', '2018-01-15 14:47:11', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 61, 'descobrir_porta.txt', 'texto', '2018-01-15 16:56:49', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 62, 'Teste_Orcamento_Por_PDF.pdf', 'texto', '2018-01-15 17:18:44', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 63, 'Blend_Natural_cafepocoscafe.jpg', 'imagem', '2018-01-15 17:50:42', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 64, 'LogotipoOrignal.JPG', 'imagem', '2018-01-17 13:10:44', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 65, 'LogotipoOrignalSemCorte.JPG', 'imagem', '2018-01-19 16:45:00', 1
);