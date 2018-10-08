
-- Criar tabela viagem_simples
-- Gerando em: 01/08/2018 17:00:36
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `viagem_simples`;

CREATE TABLE IF NOT EXISTS `viagem_simples` (
	`id_viagem_simples` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`origem_viagem_simples` varchar(100) NOT NULL ,
	`destino_viagem_simples` varchar(100) NOT NULL ,
	`placa_viagem_simples` int(11) NOT NULL ,
	`motorista_viagem_simples` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO viagem_simples ( `id_viagem_simples`, `origem_viagem_simples`, `destino_viagem_simples`, `placa_viagem_simples`, `motorista_viagem_simples`) VALUES ( 1, '-21.78593779334913,-46.56324505805969', '-21.78593779334913,-46.56324505805969', 1, 1);
INSERT INTO viagem_simples ( `id_viagem_simples`, `origem_viagem_simples`, `destino_viagem_simples`, `placa_viagem_simples`, `motorista_viagem_simples`) VALUES ( 2, '-21.78593779334913,-46.56324505805969', '-21.78593779334913,-46.56324505805969', 2, 2);
INSERT INTO viagem_simples ( `id_viagem_simples`, `origem_viagem_simples`, `destino_viagem_simples`, `placa_viagem_simples`, `motorista_viagem_simples`) VALUES ( 3, '-21.78593779334913,-46.56324505805969', '-21.78593779334913,-46.56324505805969', 3, 5);
INSERT INTO viagem_simples ( `id_viagem_simples`, `origem_viagem_simples`, `destino_viagem_simples`, `placa_viagem_simples`, `motorista_viagem_simples`) VALUES ( 4, '-21.78593779334913,-46.56324505805969', '-21.78593779334913,-46.56324505805969', 4, 6);