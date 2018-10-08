

--
-- Database AMFIOS 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 20/12/2017 16:20:51
--  _    _        __    __          _____      ___    ___             ___
-- / \  / \  |   /  \  |  \    /\     |   |   /   \  |   |       /|  /   \
-- |  \/  |  |   | __  |__/   /__\    |   |   |   |  |   |  ---   |  |___|
-- |      |  |   \__/  |  \  /    \   |   |   \___/  |   |        |   ___|

USE AMFIOS;


DROP TABLE IF EXISTS `SUB_GRUPO_ESTOQUE`;
CREATE TABLE SUB_GRUPO_ESTOQUE (
	`GRUPO` int NOT NULL,
	`SUB_GRUPO` int NOT NULL,
	`DESCRICAO` varchar(50) DEFAULT NULL,
	`DataAtualizacao` datetime DEFAULT NULL,
	`HoraAtualizacao` char(8) DEFAULT NULL,
	`UsuarioAtualizacao` char(3) DEFAULT NULL,
	PRIMARY KEY (`GRUPO`, `SUB_GRUPO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


