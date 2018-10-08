
-- Chaves da usuario
-- Gerando em: 02/08/2018 10:25:29
-- Pelo Gerador JK-19


ALTER TABLE `usuario`
	ADD UNIQUE INDEX `Login` (`login_usuario`);

ALTER TABLE `usuario`
	ADD CONSTRAINT `fk_usuario<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`);