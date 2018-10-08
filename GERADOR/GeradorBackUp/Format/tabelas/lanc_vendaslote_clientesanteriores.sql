
-- Criar tabela lanc_vendaslote_clientesanteriores
-- Gerando em: 01/08/2018 16:50:27
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `lanc_vendaslote_clientesanteriores`;

CREATE TABLE IF NOT EXISTS `lanc_vendaslote_clientesanteriores` (
	`Filial` int(11) NOT NULL PRIMARY KEY ,
	`Documento` varchar(6) NOT NULL PRIMARY KEY ,
	`Seq` int(11) NOT NULL PRIMARY KEY ,
	`Cliente` int(11) NOT NULL PRIMARY KEY ,
	`DataTransf` datetime  ,
	`Usuario` varchar(200)  ,
	`Historico` longtext  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro