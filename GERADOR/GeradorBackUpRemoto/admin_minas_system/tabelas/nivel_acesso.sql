
-- Criar tabela nivel_acesso
-- Gerando em: 01/08/2018 16:54:46
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `nivel_acesso`;

CREATE TABLE IF NOT EXISTS `nivel_acesso` (
	`id_nivel_acesso` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_nivel_acesso` varchar(200) NOT NULL ,
	`area_nivel_acesso` text NOT NULL ,
	`data_atualizacao_nivel_acesso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_nivel_acesso` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 1, 'Nivel Administrador', 'cliente_site+configurar_site+contato+empresa+estado+grupo+item+quem_somos+videos+orcamento-cliente_site+item_orcamento-orcamento+cards-configurar_site+destaque_grupo-configurar_site+endereco_site-configurar_site+slide_show-configurar_site+loja-configurar_site+topicos_loja-loja+upload+mapa+mov+pdf+notif+usuario', '2018-04-14 10:40:07', 1, 1
);
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 2, 'Usuario', 'cliente_site+configurar_site+contato+empresa+estado+grupo+item+quem_somos+videos+orcamento-cliente_site+item_orcamento-orcamento+cards-configurar_site+destaque_grupo-configurar_site+endereco_site-configurar_site+slide_show-configurar_site+loja-configurar_site+topicos_loja-loja+upload+mov+pdf+usuario', '2018-04-16 08:58:18', 1, 1
);