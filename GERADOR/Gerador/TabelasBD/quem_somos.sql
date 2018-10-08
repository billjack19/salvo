

CREATE TABLE IF NOT EXISTS `quem_somos` (
  `id_quem_somos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titulo_quem_somos` varchar(200) NOT NULL,
  `descricao_quem_somos` text NOT NULL,
  `data_atualizacao_quem_somos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_quem_somos` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
