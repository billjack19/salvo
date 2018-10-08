
-- Chaves da nivel_acesso
-- Gerando em: 02/08/2018 13:30:16
-- Pelo Gerador JK-19


ALTER TABLE `nivel_acesso`
	ADD CONSTRAINT `fk_nivel_acesso<>ususrio` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);