

CREATE TABLE IF NOT EXISTS `relatorio_tabela` (
  `id_relatorio_tabela` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_relatorio_tabela` varchar(200) NOT NULL,
  `data_atualizacao_relatorio_tabela` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_relatorio_tabela` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;