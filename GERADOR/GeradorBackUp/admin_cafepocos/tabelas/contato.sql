
-- Criar tabela contato
-- Gerando em: 01/08/2018 16:53:38
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
INSERT INTO contato ( `id_contato`, `nome_contato`, `email_contato`, `telefone_contato`, `assunto_contato`, `mensagem_contato`, `usuario_id`, `data_atualizacao_contato`, `bool_ativo_contato`) VALUES ( 1, 'Teste Jack', 'teste@teste.teste', '9999-9999', 'Formulario de Contato - Site CaféPoços', 'Teste', 3, '2018-01-24 14:50:35', 1
);