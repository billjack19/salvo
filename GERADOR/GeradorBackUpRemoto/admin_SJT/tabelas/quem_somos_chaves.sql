
-- Chaves da quem_somos
-- Gerando em: 02/08/2018 10:25:17
-- Pelo Gerador JK-19


ALTER TABLE `quem_somos`
	ADD CONSTRAINT `fk_quem_somos<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);