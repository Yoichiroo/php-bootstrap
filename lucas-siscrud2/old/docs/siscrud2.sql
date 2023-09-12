-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.31 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para siscrud
DROP DATABASE IF EXISTS `siscrud`;
CREATE DATABASE IF NOT EXISTS `siscrud` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `siscrud`;

-- Copiando estrutura para tabela siscrud.aluno
DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `matricula` int(11) NOT NULL AUTO_INCREMENT,
  `nome_aluno` varchar(50) DEFAULT NULL,
  `nome_pai` varchar(50) DEFAULT NULL,
  `nome_mae` varchar(50) DEFAULT NULL,
  `dt_nasc` date DEFAULT NULL,
  `sexo_aluno` char(1) DEFAULT NULL,
  `rg_aluno` int(11) DEFAULT NULL,
  `cpf_aluno` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela siscrud.aluno: 4 rows
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
REPLACE INTO `aluno` (`matricula`, `nome_aluno`, `nome_pai`, `nome_mae`, `dt_nasc`, `sexo_aluno`, `rg_aluno`, `cpf_aluno`) VALUES
	(12, 'MARIANA DA SILVA MALDONADO', 'ROBERTO RODRIGUES', 'RITA DE AMARAL', '1987-02-02', 'F', 656556565, '656555222'),
	(4, 'VITOR HUGO MAXWELL DE OLIVEIRA', 'CARLOS DE SOUZA BALINTER', 'MARIA EDUARDA FOXILIN', '1975-07-06', 'M', 979734343, '979873434'),
	(10, 'MARCELO PRADO DA SILVA', 'ROBERTO SILVEIRA', 'RENATA PIMENTEL DAS GRAÃ‡AS', '2015-10-02', 'M', 987979333, '9879879333'),
	(8, 'RONALDO DA SILVA', 'RONALDO AMÃ‚NCIO', 'RENATA PIMENTEL DAS GRAÃ‡AS', '2015-02-10', 'M', 987979333, '9879879333'),
	(7, 'DANIEL DA CONCEIÃ‡ÃƒO', 'JULIO DA SILVA TELLES', 'MARIA DE FÃTIMA', '1987-02-02', 'M', 987979333, '9879879333');
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;

-- Copiando estrutura para tabela siscrud.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel` int(1) unsigned NOT NULL DEFAULT '1',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `dt_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `nivel` (`nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela siscrud.usuario: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
REPLACE INTO `usuario` (`id`, `nome`, `usuario`, `senha`, `email`, `nivel`, `ativo`, `dt_cadastro`) VALUES
	(1, 'Davis de Freitas', 'freitas', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'davis@gmail.com', 3, 1, '2018-02-05 00:00:00'),
	(2, 'Jarvis', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'jarvis@ironman.com', 3, 1, '2021-11-24 19:31:10'),
	(3, 'Penelope', 'pcharmosa', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'penelope@gmail.com', 2, 1, '2021-11-24 18:55:00'),
	(4, 'Hulk Hell', 'hell', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'hell@hot.com', 1, 1, '2021-11-24 19:00:24'),
	(5, 'Maria da Silva', 'maria', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'maria@xmail.com', 3, 1, '2021-11-11 00:00:00'),
	(6, 'Adriana da Silva', 'adriana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'adriana@xmail.com', 3, 1, '2021-11-24 00:00:00');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
