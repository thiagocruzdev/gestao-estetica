CREATE DATABASE IF NOT EXISTS `clinica`;
USE `clinica`;

DROP TABLE IF EXISTS `servico_produto`;
DROP TABLE IF EXISTS `servico`;
DROP TABLE IF EXISTS `produto`;
DROP TABLE IF EXISTS `cliente`;
DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nivel` enum('admin','funcionario') NOT NULL DEFAULT 'funcionario',
  PRIMARY KEY (`id`)
) 

INSERT INTO `usuario` (`login`, `senha`, `nome`, `nivel`) VALUES
('admin', '202cb962ac59075b964b07152d234b70', 'Administrador', 'admin'),
('maria', '202cb962ac59075b964b07152d234b70', 'Maria Silva', 'funcionario');

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) 

INSERT INTO `cliente` (`nome`, `telefone`, `email`, `cpf`) VALUES
('Ana Paula Souza', '(11) 98765-4321', 'ana@email.com', '123.456.789-00'),
('Carla Mendes', '(11) 91234-5678', 'carla@email.com', '987.654.321-00');

CREATE TABLE `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `quantidade` float NOT NULL DEFAULT 0,
  `valor` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) 

INSERT INTO `produto` (`descricao`, `quantidade`, `valor`) VALUES
('Acido Hialuronico 1ml', 20, 150.00),
('Protetor Solar FPS 50', 35, 45.00),
('Mascara Facial Hidratante', 50, 25.00);

CREATE TABLE `servico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` int(11) NOT NULL,
  `descricao` varchar(80) NOT NULL,
  `valor` float NOT NULL,
  `data_servico` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `servico_cliente` (`cliente`),
  CONSTRAINT `servico_cliente_fk` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id`)
) 

CREATE TABLE `servico_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servico` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `quantidade` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sp_servico` (`servico`),
  KEY `sp_produto` (`produto`),
  CONSTRAINT `sp_servico_fk` FOREIGN KEY (`servico`) REFERENCES `servico` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sp_produto_fk` FOREIGN KEY (`produto`) REFERENCES `produto` (`id`)
) 