
-- Criar tabela motorista
-- Gerando em: 01/08/2018 17:00:33
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `motorista`;

CREATE TABLE IF NOT EXISTS `motorista` (
	`id_motorista` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_motorista` varchar(100) NOT NULL ,
	`login_motorista` varchar(100) NOT NULL ,
	`senha_motorista` varchar(100) NOT NULL ,
	`data_atualizacao_motorista` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_motorista` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO motorista ( `id_motorista`, `nome_motorista`, `login_motorista`, `senha_motorista`, `data_atualizacao_motorista`, `usuario_id`, `bool_ativo_motorista`) VALUES ( 1, 'Fulando', 'mo1', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2018-04-11 09:46:15', 1, 1);
INSERT INTO motorista ( `id_motorista`, `nome_motorista`, `login_motorista`, `senha_motorista`, `data_atualizacao_motorista`, `usuario_id`, `bool_ativo_motorista`) VALUES ( 2, 'Fulando 2', 'mo2', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2018-04-11 09:46:15', 1, 1);
INSERT INTO motorista ( `id_motorista`, `nome_motorista`, `login_motorista`, `senha_motorista`, `data_atualizacao_motorista`, `usuario_id`, `bool_ativo_motorista`) VALUES ( 5, 'Fulando  3', 'mo3', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2018-04-11 09:46:15', 1, 1);
INSERT INTO motorista ( `id_motorista`, `nome_motorista`, `login_motorista`, `senha_motorista`, `data_atualizacao_motorista`, `usuario_id`, `bool_ativo_motorista`) VALUES ( 6, 'Fulando  4', 'mo4', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2018-04-11 09:46:15', 1, 1);