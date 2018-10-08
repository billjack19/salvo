

CREATE TABLE IF NOT EXISTS `endereco_site` (
  `id_endereco_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_endereco_site` varchar(100) NOT NULL,
  `endereco_endereco_site` varchar(100) NOT NULL,
  `numero_endereco_site` int(11) NOT NULL,
  `complemento_endereco_site` varchar(100) DEFAULT NULL,
  `bairro_endereco_site` varchar(100) DEFAULT NULL,
  `cidade_endereco_site` varchar(100) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `cep_endereco_site` varchar(15) NOT NULL,
  `telefone_endereco_site` varchar(50) NOT NULL,
  `celular_endereco_site` varchar(50) DEFAULT NULL,
  `email_endereco_site` varchar(100) DEFAULT NULL,
  `horario_funcionamento_endereco_site` text NOT NULL,
  `latitude_endereco_site` varchar(100) NOT NULL,
  `longitude_endereco_site` varchar(100) NOT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_endereco_site` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_endereco_site` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `endereco_site`
  ADD KEY `fk_edereco_site<>configurar_site` (`configurar_site_id`),
  ADD CONSTRAINT `fk_edereco_site<>configurar_site` FOREIGN KEY (`configurar_site_id`) REFERENCES `configurar_site` (`id_configurar_site`);