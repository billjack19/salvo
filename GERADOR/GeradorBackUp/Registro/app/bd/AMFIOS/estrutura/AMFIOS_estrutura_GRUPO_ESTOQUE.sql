

--
-- Database AMFIOS 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 20/12/2017 16:20:01
--  _    _        __    __          _____      ___    ___             ___
-- / \  / \  |   /  \  |  \    /\     |   |   /   \  |   |       /|  /   \
-- |  \/  |  |   | __  |__/   /__\    |   |   |   |  |   |  ---   |  |___|
-- |      |  |   \__/  |  \  /    \   |   |   \___/  |   |        |   ___|

USE AMFIOS;


DROP TABLE IF EXISTS `GRUPO_ESTOQUE`;
CREATE TABLE GRUPO_ESTOQUE (
	`GRUPO` int NOT NULL,
	`DESCRICAO` char(50) DEFAULT NULL,
	`DataAtualizacao` datetime DEFAULT NULL,
	`HoraAtualizacao` char(8) DEFAULT NULL,
	`UsuarioAtualizacao` char(3) DEFAULT NULL,
	`Conta_Contabil` char(5) DEFAULT NULL,
	PRIMARY KEY (`GRUPO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


