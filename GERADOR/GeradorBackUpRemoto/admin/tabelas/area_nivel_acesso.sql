
-- Criar tabela area_nivel_acesso
-- Gerando em: 01/08/2018 16:52:01
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `area_nivel_acesso`;

CREATE TABLE IF NOT EXISTS `area_nivel_acesso` (
	`id_area_nivel_acesso` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`area_area_nivel_acesso` varchar(200) NOT NULL ,
	`demostrativo_area_nivel_acesso` varchar(200) NOT NULL ,
	`bool_list_area_nivel_acesso` int(1) NOT NULL DEFAULT 1 ,
	`bool_insert_area_nivel_acesso` int(1) NOT NULL DEFAULT 1 ,
	`bool_update_area_nivel_acesso` int(1) NOT NULL DEFAULT 1 ,
	`nivel_acesso_id` int(11) NOT NULL ,
	`data_atualizacao_area_nivel_acesso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_area_nivel_acesso` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 1, 'cliente_site', 'Cliente Site', 1, 1, 1, 1, '2018-04-17 08:44:18', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 2, 'configurar_site', 'Configurar Site', 1, 1, 1, 1, '2018-04-17 08:44:18', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 3, 'contato', 'Contato', 1, 1, 1, 1, '2018-04-17 08:44:18', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 4, 'grupo', 'Grupo', 1, 1, 1, 1, '2018-04-17 08:44:18', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 5, 'item', 'Item', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 6, 'quem_somos', 'Quem Somos', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 7, 'videos', 'Vídeos', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 8, 'orcamento-cliente_site', 'Orçamento - Cliente Site', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 9, 'item_orcamento-orcamento', 'Item Orçamento - Orçamento', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 10, 'cards-configurar_site', 'Cards - Configurar Site', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 11, 'slide_show-configurar_site', 'Slide Show - Configurar Site', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 12, 'endereco_site-configurar_site', 'Endereço Site - Configurar Site', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 13, 'loja-configurar_site', 'Loja - Configurar Site', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 14, 'topicos_loja-loja', 'Tópicos Loja - Loja', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 15, 'destaque_grupo-configurar_site', 'Destaque Grupo - Configurar Site', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 16, 'upload', 'Upload', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 17, 'mapa', 'Mapa', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 18, 'mov', 'Mov', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 19, 'relatorio', 'Relatório', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 20, 'notificacao', 'Notificação', 1, 1, 1, 1, '2018-04-17 08:44:19', 1, 1
);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 21, 'usuario', 'Usuário', 1, 1, 1, 1, '2018-04-17 08:44:20', 1, 1
);