-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03/04/2024 às 18:26
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `site`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `categoria_id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nome`) VALUES
(1, 'Vitaminas e Minerais'),
(2, 'Proteínas'),
(3, 'Pré Treinos'),
(4, 'Emagrecedores');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `produto_id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int NOT NULL,
  `categoria_id` int DEFAULT NULL,
  `imagem` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sobre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `beneficios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `recomendacoes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `peso` decimal(10,2) NOT NULL DEFAULT '0.00',
  `largura` decimal(10,2) NOT NULL DEFAULT '0.00',
  `altura` decimal(10,2) NOT NULL DEFAULT '0.00',
  `comprimento` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`produto_id`),
  KEY `categoria_id` (`categoria_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`produto_id`, `nome`, `preco`, `estoque`, `categoria_id`, `imagem`, `sobre`, `beneficios`, `recomendacoes`, `data_criacao`, `data_atualizacao`, `peso`, `largura`, `altura`, `comprimento`) VALUES
(1, 'Produto 1', 99.99, 10, 1, 'img/suplemento.jpg', 'Sobre Produto 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt tempore dolor molestiae! Id labore quas adipisci illo molestiae. Accusamus ullam molestias aliquam voluptas ab consequatur debitis, iste dolorum pariatur consectetur?', 'Benefícios Produto 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt tempore dolor molestiae! Id labore quas adipisci illo molestiae. Accusamus ullam molestias aliquam voluptas ab consequatur debitis, iste dolorum pariatur consectetur?', 'Recomendações de uso Produto 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt tempore dolor molestiae! Id labore quas adipisci illo molestiae. Accusamus ullam molestias aliquam voluptas ab consequatur debitis, iste dolorum pariatur consectetur?', '2024-03-31 20:21:50', '2024-03-31 20:21:50', 0.00, 0.00, 0.00, 0.00),
(2, 'Produto 2', 199.99, 15, 2, 'img/suplemento2.jpg', 'Sobre Produto 2', 'Benefícios Produto 2', 'Recomendações de uso Produto 2', '2024-03-31 20:21:50', '2024-03-31 20:21:50', 0.00, 0.00, 0.00, 0.00),
(3, 'Produto 3', 299.99, 5, 3, 'img/suplemento3.jpg', 'Sobre Produto 3', 'Benefícios Produto 3', 'Recomendações de uso Produto 3', '2024-03-31 20:21:50', '2024-03-31 20:21:50', 0.00, 0.00, 0.00, 0.00),
(4, 'Produto 4', 59.99, 8, 1, 'img/suplemento.jpg', 'Sobre Produto 4', 'Benefícios Produto 4', 'Recomendações de uso Produto 4', '2024-03-31 20:21:50', '2024-03-31 20:21:50', 0.00, 0.00, 0.00, 0.00),
(5, 'Produto 5', 49.99, 10, 2, 'img/suplemento2.jpg', 'Sobre Produto 5', 'Benefícios Produto 5', 'Recomendações de uso Produto 5', '2024-03-31 20:21:50', '2024-03-31 20:21:50', 0.00, 0.00, 0.00, 0.00),
(6, 'Produto 6', 39.99, 20, 3, 'img/suplemento3.jpg', 'Sobre Produto 6', 'Benefícios Produto 6', 'Recomendações de uso Produto 6', '2024-03-31 20:21:50', '2024-03-31 20:21:50', 0.00, 0.00, 0.00, 0.00),
(7, 'Produto 7', 109.99, 30, 1, 'img/suplemento.jpg', 'Sobre Produto 7', 'Benefícios Produto 7', 'Recomendações de uso Produto 7', '2024-03-31 20:21:50', '2024-03-31 20:21:50', 0.00, 0.00, 0.00, 0.00),
(8, 'Produto 8', 129.99, 25, 2, 'img/suplemento2.jpg', 'Sobre Produto 8', 'Benefícios Produto 8', 'Recomendações de uso Produto 8', '2024-03-31 20:21:50', '2024-03-31 20:21:50', 0.00, 0.00, 0.00, 0.00),
(9, 'Produto 9', 29.99, 12, 3, 'img/suplemento3.jpg', 'Sobre Produto 9', 'Benefícios Produto 9', 'Recomendações de uso Produto 9', '2024-03-31 20:21:50', '2024-03-31 20:21:50', 0.00, 0.00, 0.00, 0.00),
(10, 'Produto 10', 89.99, 18, 4, 'img/suplemento4.jpg', 'Sobre Produto 10', 'Benefícios Produto 10', 'Recomendações de uso Produto 10', '2024-03-31 20:21:50', '2024-03-31 20:21:50', 0.00, 0.00, 0.00, 0.00);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
