

--
-- Database Format 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/12/2017 10:52:26
--  _    _        __    __          _____      ___    ___             ___
-- / \  / \  |   /  \  |  \    /\     |   |   /   \  |   |       /|  /   \
-- |  \/  |  |   | __  |__/   /__\    |   |   |   |  |   |  ---   |  |___|
-- |      |  |   \__/  |  \  /    \   |   |   \___/  |   |        |   ___|

USE Format;


DROP TABLE IF EXISTS `CLIEFORNEC`;
CREATE TABLE CLIEFORNEC (
	`CODIGO` int NOT NULL,
	`CPF_CGC` varchar(18) DEFAULT NULL,
	`RAZAOSOCIAL` varchar(70) DEFAULT NULL,
	`SenhaSITE` varchar(50) DEFAULT NULL,
	PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


