
-- Chaves da aluno
-- Gerando em: 02/08/2018 13:30:11
-- Pelo Gerador JK-19


ALTER TABLE `aluno`
	ADD CONSTRAINT `fk_aluno<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);