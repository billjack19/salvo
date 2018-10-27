-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.34-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela questionario.alternativas
CREATE TABLE IF NOT EXISTS `alternativas` (
  `id_alternativas` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta_id` int(11) NOT NULL,
  `descricao` text,
  `ck_correto` int(1) DEFAULT '0',
  PRIMARY KEY (`id_alternativas`),
  KEY `fk_alternativa<>pergunta` (`pergunta_id`),
  CONSTRAINT `fk_alternativa<>pergunta` FOREIGN KEY (`pergunta_id`) REFERENCES `pergunta` (`id_pergunta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela questionario.alternativas: ~4 rows (aproximadamente)
DELETE FROM `alternativas`;
/*!40000 ALTER TABLE `alternativas` DISABLE KEYS */;
INSERT INTO `alternativas` (`id_alternativas`, `pergunta_id`, `descricao`, `ck_correto`) VALUES
	(1, 1, 'Alternativa A', 0),
	(2, 1, 'Alternativa B', 1),
	(3, 2, 'Alternativa A', 1),
	(4, 2, 'Alternativa B', 0);
/*!40000 ALTER TABLE `alternativas` ENABLE KEYS */;

-- Copiando estrutura para tabela questionario.pergunta
CREATE TABLE IF NOT EXISTS `pergunta` (
  `id_pergunta` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text,
  PRIMARY KEY (`id_pergunta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela questionario.pergunta: ~2 rows (aproximadamente)
DELETE FROM `pergunta`;
/*!40000 ALTER TABLE `pergunta` DISABLE KEYS */;
INSERT INTO `pergunta` (`id_pergunta`, `descricao`) VALUES
	(1, 'Pergunta 1'),
	(2, 'Pergunta 2');
/*!40000 ALTER TABLE `pergunta` ENABLE KEYS */;

-- Copiando estrutura para tabela questionario.questionario
CREATE TABLE IF NOT EXISTS `questionario` (
  `id_questionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_questionario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela questionario.questionario: ~0 rows (aproximadamente)
DELETE FROM `questionario`;
/*!40000 ALTER TABLE `questionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `questionario` ENABLE KEYS */;

-- Copiando estrutura para tabela questionario.resposta
CREATE TABLE IF NOT EXISTS `resposta` (
  `id_resposta` int(11) NOT NULL AUTO_INCREMENT,
  `questionario_id` int(11) NOT NULL,
  `pergunta_id` int(11) NOT NULL,
  `alternativas_id` int(11) NOT NULL,
  PRIMARY KEY (`id_resposta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela questionario.resposta: ~0 rows (aproximadamente)
DELETE FROM `resposta`;
/*!40000 ALTER TABLE `resposta` DISABLE KEYS */;
/*!40000 ALTER TABLE `resposta` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
