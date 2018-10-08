
-- Chaves da paginas
-- Gerando em: 02/08/2018 10:25:16
-- Pelo Gerador JK-19


ALTER TABLE `paginas`
	ADD CONSTRAINT `fk_paginas<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);