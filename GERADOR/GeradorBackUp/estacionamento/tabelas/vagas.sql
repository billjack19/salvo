
-- Criar tabela vagas
-- Gerando em: 01/08/2018 16:58:25
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `vagas`;

CREATE TABLE IF NOT EXISTS `vagas` (
	`id_vagas` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`codigo_vaga_vagas` varchar(20) NOT NULL ,
	`placa_veiculo_vagas` varchar(20)  ,
	`tipo_veiculo_vagas` enum('Nenhum','Carro','Moto')  ,
	`status_vagas` enum('Disponível','Ocupado','Reservado') NOT NULL ,
	`andar_id` int(11) NOT NULL ,
	`data_atualizacao_vagas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_vagas` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO vagas ( `id_vagas`, `codigo_vaga_vagas`, `placa_veiculo_vagas`, `tipo_veiculo_vagas`, `status_vagas`, `andar_id`, `data_atualizacao_vagas`, `usuario_id`, `bool_ativo_vagas`) VALUES ( 1, 'A1', '', 'Nenhum', 'Reservado', 1, '2018-02-07 17:34:38', 1, 1);