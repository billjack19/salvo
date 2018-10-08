
-- Criar tabela estado
-- Gerando em: 01/08/2018 16:53:38
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `estado`;

CREATE TABLE IF NOT EXISTS `estado` (
	`id_estado` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_estado` varchar(100) NOT NULL ,
	`sigla_estado` char(2) NOT NULL ,
	`bool_ativo_estado` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 1, 'Acre', 'AC', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 2, 'Alagoas', 'AL', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 3, 'Amapá', 'AP', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 4, 'Amazonas', 'AM', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 5, 'Bahia', 'BA', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 6, 'Ceará', 'CE', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 7, 'Distrito Federal', 'DF', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 8, 'Espírito Santo', 'ES', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 9, 'Goiás', 'GO', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 10, 'Maranhão', 'MA', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 11, 'Mato Grosso', 'MT', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 12, 'Mato Grosso do Sul', 'MS', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 13, 'Minas Gerais', 'MG', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 14, 'Pará', 'PA', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 15, 'Paraíba', 'PB', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 16, 'Paraná', 'PR', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 17, 'Pernambuco', 'PE', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 18, 'Piauí', 'PI', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 19, 'Rio de Janeiro', 'RJ', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 20, 'Rio Grande do Norte', 'RN', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 21, 'Rio Grande do Sul', 'RS', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 22, 'Rondônia', 'RO', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 23, 'Roraima', 'RR', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 24, 'Santa Catarina', 'SC', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 25, 'São Paulo', 'SP', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 26, 'Sergipe', 'SE', 1
);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 27, 'Tocantins', 'TO', 1
);