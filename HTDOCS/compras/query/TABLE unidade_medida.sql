-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.21-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela compras_jk_19.unidade_medida
DROP TABLE IF EXISTS `unidade_medida`;
CREATE TABLE IF NOT EXISTS `unidade_medida` (
	`id_unidade_medida` int(11) NOT NULL AUTO_INCREMENT,
	`sigla_unidade_medida` char(2) NOT NULL,
	`descricao_unidade_medida` varchar(50) NOT NULL,
	PRIMARY KEY (`id_unidade_medida`),
	UNIQUE KEY `sigla_unidade_medida` (`sigla_unidade_medida`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compras_jk_19.unidade_medida: ~9 rows (aproximadamente)
DELETE FROM `unidade_medida`;
/*!40000 ALTER TABLE `unidade_medida` DISABLE KEYS */;
INSERT INTO `unidade_medida` (`id_unidade_medida`, `sigla_unidade_medida`, `descricao_unidade_medida`) VALUES
	(1, 'un', 'Unidade'),
	(2, 'kg', 'Kilograma'),
	(3, 'g', 'Grama'),
	(4, 'mg', 'Milígrama'),
	(5, 'l', 'Litro'),
	(6, 'ml', 'Mililitro'),
	(7, 'm', 'Metro'),
	(8, 'cm', 'Centímetro'),
	(9, 'mm', 'Milímetro');
/*!40000 ALTER TABLE `unidade_medida` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
