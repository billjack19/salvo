
-- Criar tabela jogadores
-- Gerando em: 01/08/2018 16:58:54
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `jogadores`;

CREATE TABLE IF NOT EXISTS `jogadores` (
	`id_jogadores` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_jogadores` varchar(200) NOT NULL ,
	`foto_jogadores` varchar(200)  ,
	`telefone_jogadores` varchar(200) NOT NULL ,
	`data_atualizacao_jogadores` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_jogadores` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO jogadores ( `id_jogadores`, `nome_jogadores`, `foto_jogadores`, `telefone_jogadores`, `data_atualizacao_jogadores`, `usuario_id`, `bool_ativo_jogadores`) VALUES ( 1, 'Jack Biller da Silva Prado', '', '35 99723-1080', '2018-02-22 10:09:55', 1, 1);