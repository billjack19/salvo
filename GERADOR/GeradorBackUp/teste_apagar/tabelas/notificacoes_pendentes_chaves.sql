
-- Chaves da notificacoes_pendentes
-- Gerando em: 02/08/2018 13:30:18
-- Pelo Gerador JK-19


ALTER TABLE `notificacoes_pendentes`
	ADD CONSTRAINT `fk_notificacoes_pendentes<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);