
-- Criar tabela notificacoes_config
-- Gerando em: 01/08/2018 16:54:07
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `notificacoes_config`;

CREATE TABLE IF NOT EXISTS `notificacoes_config` (
	`id_notificacoes_config` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`area_notificacoes_config` varchar(100) NOT NULL ,
	`tipo_alteracao_notificacoes_config` varchar(100) NOT NULL ,
	`data_atualizacao_notificacoes_config` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_notificacoes_config` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO notificacoes_config ( `id_notificacoes_config`, `area_notificacoes_config`, `tipo_alteracao_notificacoes_config`, `data_atualizacao_notificacoes_config`, `usuario_id`, `bool_ativo_notificacoes_config`) VALUES ( 1, 'jogo', 'I+U', '2018-02-08 15:36:49', 1, 1
);
INSERT INTO notificacoes_config ( `id_notificacoes_config`, `area_notificacoes_config`, `tipo_alteracao_notificacoes_config`, `data_atualizacao_notificacoes_config`, `usuario_id`, `bool_ativo_notificacoes_config`) VALUES ( 2, 'manhas', 'I+U', '2018-03-12 08:12:47', 1, 1
);
INSERT INTO notificacoes_config ( `id_notificacoes_config`, `area_notificacoes_config`, `tipo_alteracao_notificacoes_config`, `data_atualizacao_notificacoes_config`, `usuario_id`, `bool_ativo_notificacoes_config`) VALUES ( 3, 'console', 'I+U', '2018-03-12 08:13:17', 1, 1
);
INSERT INTO notificacoes_config ( `id_notificacoes_config`, `area_notificacoes_config`, `tipo_alteracao_notificacoes_config`, `data_atualizacao_notificacoes_config`, `usuario_id`, `bool_ativo_notificacoes_config`) VALUES ( 4, 'livro', 'I', '2018-03-12 08:33:07', 1, 1
);
INSERT INTO notificacoes_config ( `id_notificacoes_config`, `area_notificacoes_config`, `tipo_alteracao_notificacoes_config`, `data_atualizacao_notificacoes_config`, `usuario_id`, `bool_ativo_notificacoes_config`) VALUES ( 5, 'aluno', 'I+U', '2018-03-12 10:09:44', 1, 1
);