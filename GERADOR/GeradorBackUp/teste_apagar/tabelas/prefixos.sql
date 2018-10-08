
-- Criar tabela prefixos
-- Gerando em: 01/08/2018 16:54:08
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `prefixos`;

CREATE TABLE IF NOT EXISTS `prefixos` (
	`id_prefixos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`prefixo_prefixos` varchar(200) NOT NULL ,
	`descricao_prefixos` text NOT NULL ,
	`data_atualizacao_prefixos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_prefixos` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 1, 'imagem', 'Serve para referenciar nome de uma imagem no servidor', '2018-01-31 13:13:40', 1, 1
);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 2, 'video', 'Serve para referenciar um arquivo de vídeo no servidor', '2018-01-31 13:14:07', 1, 1
);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 3, 'audio', 'Serve para referenciar um arquivo de audio no servidor', '2018-01-31 13:14:31', 1, 1
);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 4, 'texto', 'Serve para referenciar um arquivo de texto no servidor', '2018-01-31 13:14:58', 1, 1
);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 5, 'bool', 'É um campo de verdadeiro ou falso.<br>
Sua formação é de int(1) prédefinido com 1, este campo só recebe valor 1 ou 0 sendo que o 1 serve para verdadeiro e o 0 para falso', '2018-01-31 13:16:40', 1, 1
);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 6, 'senha', 'Este campo aparece somente no cadastro e do tipo password, para ser alterado é preciso estar logado ou ter acesso direto ao banco de dados', '2018-01-31 13:18:14', 1, 1
);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 7, 'status', 'Prefixo para identificar quando um campo será alterado dinamicamente (por triggers)<br>
Também é mostrado somente no cadastro.<br>
Se precisar alterar este registro tem que ter acesso direto ao banco de dados', '2018-04-16 13:35:40', 1, 1
);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 8, 'mapa', 'Prefixo que indica que será preciso um mapa para achar geolocalização e cadastrar este campo
(Ideia inicial era de um modal com um mapa onde iria o usuário iria clicar na área do mapa e já iria puxar a latitude e longitude)', '2018-07-27 08:18:41', 1, 0
);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 9, 'foto', 'prefixo que indica que o campo deve abrir a webcam do computador e tirar uma foto', '2018-07-27 08:18:30', 1, 0
);