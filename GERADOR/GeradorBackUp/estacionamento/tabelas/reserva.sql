
-- Criar tabela reserva
-- Gerando em: 01/08/2018 16:58:24
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `reserva`;

CREATE TABLE IF NOT EXISTS `reserva` (
	`id_reserva` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`motivo_reserva` varchar(200) NOT NULL ,
	`vagas_id` int(200) NOT NULL ,
	`data_atualizacao_reserva` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_reserva` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO reserva ( `id_reserva`, `motivo_reserva`, `vagas_id`, `data_atualizacao_reserva`, `usuario_id`, `bool_ativo_reserva`) VALUES ( 1, 'Teste', 1, '2018-02-07 17:32:41', 1, 1);