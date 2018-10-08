
-- Criar tabela aluno
-- Gerando em: 01/08/2018 16:54:06
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `aluno`;

CREATE TABLE IF NOT EXISTS `aluno` (
	`id_aluno` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_aluno` varchar(100) NOT NULL ,
	`data_nascimento_aluno` date NOT NULL ,
	`sexo_aluno` enum('Masculino','Feminino') NOT NULL ,
	`data_atualizacao_aluno` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_aluno` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO aluno ( `id_aluno`, `nome_aluno`, `data_nascimento_aluno`, `sexo_aluno`, `data_atualizacao_aluno`, `usuario_id`, `bool_ativo_aluno`) VALUES ( 1, 'Jack Biller', '1997-11-19', 'Masculino', '2018-01-26 11:51:04', 1, 1
);
INSERT INTO aluno ( `id_aluno`, `nome_aluno`, `data_nascimento_aluno`, `sexo_aluno`, `data_atualizacao_aluno`, `usuario_id`, `bool_ativo_aluno`) VALUES ( 2, 'Teste', '1998-05-24', 'Masculino', '2018-02-19 09:57:40', 1, 0
);
INSERT INTO aluno ( `id_aluno`, `nome_aluno`, `data_nascimento_aluno`, `sexo_aluno`, `data_atualizacao_aluno`, `usuario_id`, `bool_ativo_aluno`) VALUES ( 3, 'Jack Teste', '1997-11-19', 'Masculino', '2018-03-12 10:06:05', 1, 1
);
INSERT INTO aluno ( `id_aluno`, `nome_aluno`, `data_nascimento_aluno`, `sexo_aluno`, `data_atualizacao_aluno`, `usuario_id`, `bool_ativo_aluno`) VALUES ( 4, 'Jack Teste', '1997-11-19', 'Masculino', '2018-03-12 10:08:21', 1, 1
);
INSERT INTO aluno ( `id_aluno`, `nome_aluno`, `data_nascimento_aluno`, `sexo_aluno`, `data_atualizacao_aluno`, `usuario_id`, `bool_ativo_aluno`) VALUES ( 5, 'Jack Teste Apagar', '1997-11-19', 'Masculino', '2018-03-12 10:14:09', 1, 1
);
INSERT INTO aluno ( `id_aluno`, `nome_aluno`, `data_nascimento_aluno`, `sexo_aluno`, `data_atualizacao_aluno`, `usuario_id`, `bool_ativo_aluno`) VALUES ( 6, 'Fulando', '1999-12-15', 'Masculino', '2018-03-27 08:47:23', 1, 1
);
INSERT INTO aluno ( `id_aluno`, `nome_aluno`, `data_nascimento_aluno`, `sexo_aluno`, `data_atualizacao_aluno`, `usuario_id`, `bool_ativo_aluno`) VALUES ( 7, 'Teste Data Nascimento Notificação', '2005-12-13', 'Masculino', '2018-03-27 09:12:38', 1, 1
);