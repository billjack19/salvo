
-- Criar tabela item
-- Gerando em: 01/08/2018 16:52:45
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `item`;

CREATE TABLE IF NOT EXISTS `item` (
	`id_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_item` varchar(300) NOT NULL ,
	`descricao_site_item` varchar(300)  ,
	`unidade_medida_item` varchar(3)  ,
	`imagem_item` varchar(200) NOT NULL ,
	`grupo_id` int(11) NOT NULL ,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_item` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 1, 'teste', 'teste', '', 'ferramentas_administrativas.png', 1, 1, 1
);