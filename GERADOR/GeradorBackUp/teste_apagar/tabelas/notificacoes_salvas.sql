
-- Criar tabela notificacoes_salvas
-- Gerando em: 01/08/2018 16:54:07
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `notificacoes_salvas`;

CREATE TABLE IF NOT EXISTS `notificacoes_salvas` (
	`id_notificacoes_salvas` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_notificacoes_salvas` text NOT NULL ,
	`usuario_atuador_notificacoes_salvas` varchar(200) NOT NULL ,
	`usuaio_requerente_notificacoes_salvas` varchar(200) NOT NULL ,
	`tipo_alteracao_notificacoes_salvas` enum('i','u','d') NOT NULL ,
	`notificacoes_config_id` int(200) NOT NULL ,
	`data_atualizacao_notificacoes_salvas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_notificacoes_salvas` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO notificacoes_salvas ( `id_notificacoes_salvas`, `descricao_notificacoes_salvas`, `usuario_atuador_notificacoes_salvas`, `usuaio_requerente_notificacoes_salvas`, `tipo_alteracao_notificacoes_salvas`, `notificacoes_config_id`, `data_atualizacao_notificacoes_salvas`, `bool_ativo_notificacoes_salvas`) VALUES ( 1, 'Descrição => PS1<br>Usuário Id => 1<br>Bool Ativo => 1<br>', '1', '1', 'i', 3, '2018-03-27 08:27:02', 1
);
INSERT INTO notificacoes_salvas ( `id_notificacoes_salvas`, `descricao_notificacoes_salvas`, `usuario_atuador_notificacoes_salvas`, `usuaio_requerente_notificacoes_salvas`, `tipo_alteracao_notificacoes_salvas`, `notificacoes_config_id`, `data_atualizacao_notificacoes_salvas`, `bool_ativo_notificacoes_salvas`) VALUES ( 2, '<b>Aréa de Atuação: </b>livro<br><b>Registro inserido:</b><br>Descrição => Teoria de tudo<br>Código => 1956<br>Género => /%/SELECT * FROM genero WHERE id_genero = 1/%/<br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => Sim<br>', '1', '1', 'i', 4, '2018-03-27 08:42:18', 1
);
INSERT INTO notificacoes_salvas ( `id_notificacoes_salvas`, `descricao_notificacoes_salvas`, `usuario_atuador_notificacoes_salvas`, `usuaio_requerente_notificacoes_salvas`, `tipo_alteracao_notificacoes_salvas`, `notificacoes_config_id`, `data_atualizacao_notificacoes_salvas`, `bool_ativo_notificacoes_salvas`) VALUES ( 3, '<b>Aréa de Atuação: </b>aluno<br><b>Registro inserido:</b><br>Nome => Teste Data Nascimento Notificação<br>Data Nascimento => 13/12/2005<br>Sexo => Masculino<br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => Sim<br>', '1', '1', 'i', 5, '2018-04-14 08:17:34', 1
);
INSERT INTO notificacoes_salvas ( `id_notificacoes_salvas`, `descricao_notificacoes_salvas`, `usuario_atuador_notificacoes_salvas`, `usuaio_requerente_notificacoes_salvas`, `tipo_alteracao_notificacoes_salvas`, `notificacoes_config_id`, `data_atualizacao_notificacoes_salvas`, `bool_ativo_notificacoes_salvas`) VALUES ( 4, '<b>Aréa de Atuação: </b>livro<br><b>Registro inserido:</b><br>Descrição => Meia Noite<br>Código => 548546<br>Género => /%/SELECT * FROM genero WHERE id_genero = 2/%/<br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => Sim<br>', '1', '1', 'i', 4, '2018-04-14 08:36:55', 1
);
INSERT INTO notificacoes_salvas ( `id_notificacoes_salvas`, `descricao_notificacoes_salvas`, `usuario_atuador_notificacoes_salvas`, `usuaio_requerente_notificacoes_salvas`, `tipo_alteracao_notificacoes_salvas`, `notificacoes_config_id`, `data_atualizacao_notificacoes_salvas`, `bool_ativo_notificacoes_salvas`) VALUES ( 5, '<b>Aréa de Atuação: </b>livro<br><b>Registro inserido:</b><br>Descrição => Só pra Variar<br>Código => 458462<br>Género => /%/SELECT * FROM genero WHERE id_genero = 1/%/<br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => Sim<br>', '1', '1', 'i', 4, '2018-04-14 08:54:10', 1
);