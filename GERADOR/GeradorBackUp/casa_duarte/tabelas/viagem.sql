
-- Criar tabela viagem
-- Gerando em: 01/08/2018 17:00:35
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `viagem`;

CREATE TABLE IF NOT EXISTS `viagem` (
	`id_viagem` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`endereco_incial_viagem` varchar(200) NOT NULL ,
	`endereco_final_viagem` varchar(200) NOT NULL ,
	`caminhao_id` int(11) NOT NULL ,
	`motorista_id` int(11) NOT NULL ,
	`data_atualizacao_viagem` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_viagem` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO viagem ( `id_viagem`, `endereco_incial_viagem`, `endereco_final_viagem`, `caminhao_id`, `motorista_id`, `data_atualizacao_viagem`, `usuario_id`, `bool_ativo_viagem`) VALUES ( 1, '-21.801517634953733,-46.568141682073474', '-21.801517634953733,-46.568141682073474', 1, 1, '2018-04-02 17:45:25', 1, 1);