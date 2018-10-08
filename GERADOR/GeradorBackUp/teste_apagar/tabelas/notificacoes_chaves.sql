
-- Chaves da notificacoes
-- Gerando em: 02/08/2018 13:30:17
-- Pelo Gerador JK-19


ALTER TABLE `notificacoes`
	ADD CONSTRAINT `fk_notificacoes<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);