
-- Chaves da saiba_mais
-- Gerando em: 02/08/2018 10:25:21
-- Pelo Gerador JK-19


ALTER TABLE `saiba_mais`
	ADD CONSTRAINT `fk_saiba_mais<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);