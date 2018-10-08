
-- Criar tabela lanc_reserva_lotes
-- Gerando em: 01/08/2018 16:50:26
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `lanc_reserva_lotes`;

CREATE TABLE IF NOT EXISTS `lanc_reserva_lotes` (
	`ID_LANC_RESERVA_LOTES` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`Loteamento` int(11)  ,
	`NumLote` char(6)  ,
	`Corretor` varchar(3)  ,
	`DataReserva` datetime  ,
	`HoraReserva` char(8)  ,
	`ObservacaoReseva` varchar(4000)  ,
	`flagCancelada` int(1)  DEFAULT 0 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO lanc_reserva_lotes ( `ID_LANC_RESERVA_LOTES`, `Loteamento`, `NumLote`, `Corretor`, `DataReserva`, `HoraReserva`, `ObservacaoReseva`, `flagCancelada`) VALUES ( 1, 1, '11', 'ADM', '2017-11-27 00:00:00', '11:05:15', '', 1
);
INSERT INTO lanc_reserva_lotes ( `ID_LANC_RESERVA_LOTES`, `Loteamento`, `NumLote`, `Corretor`, `DataReserva`, `HoraReserva`, `ObservacaoReseva`, `flagCancelada`) VALUES ( 2, 1, '11', 'ADM', '2017-11-27 00:00:00', '11:09:47', 'teste', 0
);
INSERT INTO lanc_reserva_lotes ( `ID_LANC_RESERVA_LOTES`, `Loteamento`, `NumLote`, `Corretor`, `DataReserva`, `HoraReserva`, `ObservacaoReseva`, `flagCancelada`) VALUES ( 3, 1, '11', 'ALE', '2017-11-27 00:00:00', '13:52:04', 'teste 2', 0
);