
-- Criar tabela contato
-- Gerando em: 01/08/2018 16:54:41
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `contato`;

CREATE TABLE IF NOT EXISTS `contato` (
	`id_contato` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_contato` varchar(200) NOT NULL ,
	`email_contato` varchar(200)  ,
	`telefone_contato` varchar(200)  ,
	`assunto_contato` varchar(200)  ,
	`mensagem_contato` text  ,
	`usuario_id` int(11) NOT NULL ,
	`data_atualizacao_contato` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_contato` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO contato ( `id_contato`, `nome_contato`, `email_contato`, `telefone_contato`, `assunto_contato`, `mensagem_contato`, `usuario_id`, `data_atualizacao_contato`, `bool_ativo_contato`) VALUES ( 1, 'teste no site Jack', 'site_Jack@asd.asd', '123', 'Formulario de Contato - Site Minas System', 'Teste', 2, '2018-01-25 13:57:44', 1
);
INSERT INTO contato ( `id_contato`, `nome_contato`, `email_contato`, `telefone_contato`, `assunto_contato`, `mensagem_contato`, `usuario_id`, `data_atualizacao_contato`, `bool_ativo_contato`) VALUES ( 2, 'Helder Eduardo de Figueiredo', 'helder.figueiredo@informatizepc.com.br', '3537147748', 'Formulario de Contato - Site Minas System', 'TESTE', 2, '2018-02-07 10:45:22', 1
);
INSERT INTO contato ( `id_contato`, `nome_contato`, `email_contato`, `telefone_contato`, `assunto_contato`, `mensagem_contato`, `usuario_id`, `data_atualizacao_contato`, `bool_ativo_contato`) VALUES ( 3, 'donizete', 'cdi@cdiinfo.com.br', '31114-1177', 'Formulario de Contato - Site Minas System', 'teste cdi', 2, '2018-02-08 10:53:23', 1
);
INSERT INTO contato ( `id_contato`, `nome_contato`, `email_contato`, `telefone_contato`, `assunto_contato`, `mensagem_contato`, `usuario_id`, `data_atualizacao_contato`, `bool_ativo_contato`) VALUES ( 4, 'Jack Teste', 'teste@teste.teste', '9999-9999', 'Formulario de Contato - Site Minas System', 'teste', 2, '2018-02-08 12:34:38', 1
);