
-- Chaves da notificacoes_salvas
-- Gerando em: 02/08/2018 13:30:19
-- Pelo Gerador JK-19


ALTER TABLE `notificacoes_salvas`
	ADD CONSTRAINT `fk_notificacoes_salvas<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);