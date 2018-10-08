
-- Criar tabela caminhao
-- Gerando em: 01/08/2018 17:00:32
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `caminhao`;

CREATE TABLE IF NOT EXISTS `caminhao` (
	`id_caminhao` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`placa_caminhao` varchar(10) NOT NULL ,
	`latitude_caminhao` varchar(100) NOT NULL ,
	`longitude_caminhao` varchar(100) NOT NULL ,
	`bool_disponivel_caminhao` int(1) NOT NULL DEFAULT 0 ,
	`data_atualizacao_caminhao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_caminhao` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO caminhao ( `id_caminhao`, `placa_caminhao`, `latitude_caminhao`, `longitude_caminhao`, `bool_disponivel_caminhao`, `data_atualizacao_caminhao`, `usuario_id`, `bool_ativo_caminhao`) VALUES ( 1, 'AAA-1234', '-21.7790371', '-46.5692484', 1, '2018-04-19 16:55:51', 1, 1);
INSERT INTO caminhao ( `id_caminhao`, `placa_caminhao`, `latitude_caminhao`, `longitude_caminhao`, `bool_disponivel_caminhao`, `data_atualizacao_caminhao`, `usuario_id`, `bool_ativo_caminhao`) VALUES ( 2, 'BBB-1234', '-21.7790371', '-46.5692484', 1, '2018-04-10 17:33:08', 1, 1);
INSERT INTO caminhao ( `id_caminhao`, `placa_caminhao`, `latitude_caminhao`, `longitude_caminhao`, `bool_disponivel_caminhao`, `data_atualizacao_caminhao`, `usuario_id`, `bool_ativo_caminhao`) VALUES ( 3, 'CCC-9999', '-21.79582030204647', '-46.520699858665466', 1, '2018-04-09 14:14:20', 1, 1);
INSERT INTO caminhao ( `id_caminhao`, `placa_caminhao`, `latitude_caminhao`, `longitude_caminhao`, `bool_disponivel_caminhao`, `data_atualizacao_caminhao`, `usuario_id`, `bool_ativo_caminhao`) VALUES ( 4, 'DDD-9999', '-21.799232199446397', '-46.51482582092285', 1, '2018-04-09 14:14:22', 1, 1);