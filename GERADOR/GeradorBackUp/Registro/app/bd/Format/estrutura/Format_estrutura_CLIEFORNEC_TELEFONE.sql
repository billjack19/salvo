

--
-- Database Format 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/12/2017 12:11:59
--  _    _        __    __          _____      ___    ___             ___
-- / \  / \  |   /  \  |  \    /\     |   |   /   \  |   |       /|  /   \
-- |  \/  |  |   | __  |__/   /__\    |   |   |   |  |   |  ---   |  |___|
-- |      |  |   \__/  |  \  /    \   |   |   \___/  |   |        |   ___|

USE Format;


DROP TABLE IF EXISTS `CLIEFORNEC_TELEFONE`;
CREATE TABLE CLIEFORNEC_TELEFONE (
	`Cliente` int NOT NULL,
	`Sequencia` int NOT NULL,
	`Telefone` char(10) DEFAULT NULL,
	`Ramal` char(15) DEFAULT NULL,
	`Tipo` varchar(50) DEFAULT NULL,
	`Contato` varchar(100) DEFAULT NULL,
	`Email` varchar(255) DEFAULT NULL,
	`EnviaNFE` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


