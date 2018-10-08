
-- Chaves da notificacoes_pendentes
-- Gerando em: 05/08/2018 23:34:21
-- Pelo Gerador JK-19


ALTER TABLE `notificacoes_pendentes`
	ADD CONSTRAINT `fk_notificacoes_pendentes<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);