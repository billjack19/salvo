
-- Criar tabela parametro
-- Gerando em: 01/08/2018 17:00:34
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `parametro`;

CREATE TABLE IF NOT EXISTS `parametro` (
	`id_parametro` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`ip_parametro` varchar(20)  ,
	`porta_parametro` varchar(10)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO parametro ( `id_parametro`, `ip_parametro`, `porta_parametro`) VALUES ( 1, '192.168.100.15', '8088');