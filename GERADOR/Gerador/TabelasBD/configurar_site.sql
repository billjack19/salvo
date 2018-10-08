
CREATE TABLE IF NOT EXISTS `configurar_site` (
  `id_configurar_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titulo_configurar_site` varchar(100) NOT NULL,
  `cor_pagina_configurar_site` varchar(100) NOT NULL,
  `contra_cor_pagina_configurar_site` varchar(100) NOT NULL,
  `imagem_icone_configurar_site` varchar(100) NOT NULL,
  `imagem_logo_configurar_site` varchar(100) NOT NULL,
  `data_atualizacao_configurar_site` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_configurar_site` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
