
-- Criar tabela unidade_medida
-- Gerando em: 01/08/2018 17:01:25
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `unidade_medida`;

CREATE TABLE IF NOT EXISTS `unidade_medida` (
	`id_unidade_medida` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`sigla_unidade_medida` char(2) NOT NULL ,
	`descricao_unidade_medida` varchar(50) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO unidade_medida ( `id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES ( 1, 'un', 'Unidade');
INSERT INTO unidade_medida ( `id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES ( 2, 'kg', 'Kilograma');
INSERT INTO unidade_medida ( `id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES ( 3, 'g', 'Grama');
INSERT INTO unidade_medida ( `id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES ( 4, 'mg', 'Milígrama');
INSERT INTO unidade_medida ( `id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES ( 5, 'l', 'Litro');
INSERT INTO unidade_medida ( `id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES ( 6, 'ml', 'Mililitro');
INSERT INTO unidade_medida ( `id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES ( 7, 'm', 'Metro');
INSERT INTO unidade_medida ( `id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES ( 8, 'cm', 'Centímetro');
INSERT INTO unidade_medida ( `id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES ( 9, 'mm', 'Milímetro');