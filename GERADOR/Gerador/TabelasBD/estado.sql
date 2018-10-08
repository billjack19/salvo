

CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_estado` varchar(100) NOT NULL,
  `sigla_estado` char(2) NOT NULL,
  `bool_ativo_estado` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


TRUNCATE `estado`;

INSERT INTO `estado` (`descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES
('Acre', 'AC', 1),
('Alagoas', 'AL', 1),
('Amapá', 'AP', 1),
('Amazonas', 'AM', 1),
('Bahia', 'BA', 1),
('Ceará', 'CE', 1),
('Distrito Federal', 'DF', 1),
('Espírito Santo', 'ES', 1),
('Goiás', 'GO', 1),
('Maranhão', 'MA', 1),
('Mato Grosso', 'MT', 1),
('Mato Grosso do Sul', 'MS', 1),
('Minas Gerais', 'MG', 1),
('Pará', 'PA', 1),
('Paraíba', 'PB', 1),
('Paraná', 'PR', 1),
('Pernambuco', 'PE', 1),
('Piauí', 'PI', 1),
('Rio de Janeiro', 'RJ', 1),
('Rio Grande do Norte', 'RN', 1),
('Rio Grande do Sul', 'RS', 1),
('Rondônia', 'RO', 1),
('Roraima', 'RR', 1),
('Santa Catarina', 'SC', 1),
('São Paulo', 'SP', 1),
('Sergipe', 'SE', 1),
('Tocantins', 'TO', 1);