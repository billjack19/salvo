
-- Chaves da manhas
-- Gerando em: 02/08/2018 13:30:16
-- Pelo Gerador JK-19


ALTER TABLE `manhas`
	ADD CONSTRAINT `fk_manhas<>jogo` FOREIGN KEY (`jogo_id`) REFERENCES `jogo` (`id_jogo`);

ALTER TABLE `manhas`
	ADD CONSTRAINT `fk_manhas<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);