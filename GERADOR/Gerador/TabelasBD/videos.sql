

CREATE TABLE IF NOT EXISTS `videos` (
  `id_videos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_videos` text NOT NULL,
  `link_videos` varchar(200) NOT NULL,
  `data_atualizacao_videos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ususario_id` `ususario_id` INT(11) NOT NULL,
  `bool_ativo_videos` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;