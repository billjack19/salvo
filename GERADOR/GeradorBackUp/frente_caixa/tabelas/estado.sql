
-- Criar tabela estado
-- Gerando em: 01/08/2018 17:01:48
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `estado`;

CREATE TABLE IF NOT EXISTS `estado` (
	`id_estado` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_estado` varchar(50) NOT NULL ,
	`sigla_estado` varchar(2) NOT NULL ,
	`data_atualizacao_estado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_estado` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 1, 'Acre', 'AC', '2018-06-14 10:08:59', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 2, 'Alagoas', 'AL', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 3, 'Amapá', 'AP', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 4, 'Amazonas', 'AM', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 5, 'Bahia', 'BA', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 6, 'Ceará', 'CE', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 7, 'Distrito Federal', 'DF', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 8, 'Espírito Santo', 'ES', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 9, 'Goiás', 'GO', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 10, 'Maranhão', 'MA', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 11, 'Mato Grosso', 'MT', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 12, 'Mato Grosso do Sul', 'MS', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 13, 'Minas Gerais', 'MG', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 14, 'Pará', 'PA', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 15, 'Paraíba', 'PB', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 16, 'Paraná', 'PR', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 17, 'Pernambuco', 'PE', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 18, 'Piauí', 'PI', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 19, 'Rio de Janeiro', 'RJ', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 20, 'Rio Grande do Norte', 'RN', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 21, 'Rio Grande do Sul', 'RS', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 22, 'Rondônia', 'RO', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 23, 'Roraima', 'RR', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 24, 'Santa Catarina', 'SC', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 25, 'São Paulo', 'SP', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 26, 'Sergipe', 'SE', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 27, 'Tocantins', 'TO', '2018-06-14 10:08:43', 1, 1);