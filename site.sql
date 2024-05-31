-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 31/05/2024 às 17:22
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
-- Estrutura para tabela `boletos`
--

DROP TABLE IF EXISTS `boletos`;
CREATE TABLE IF NOT EXISTS `boletos` (
  `id_boleto` int NOT NULL AUTO_INCREMENT,
  `id_venda` int DEFAULT NULL,
  `numero_boleto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `status_pagamento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_boleto`),
  KEY `id_venda` (`id_venda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `categoria_id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Estrutura para tabela `categoria_receita`
--

DROP TABLE IF EXISTS `categoria_receita`;
CREATE TABLE IF NOT EXISTS `categoria_receita` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `categoria_receita`
--

INSERT INTO `categoria_receita` (`id_categoria`, `nome`) VALUES
(1, 'Salgados'),
(2, 'Doces');

-- --------------------------------------------------------

--
-- Estrutura para tabela `detalhesusuario`
--

DROP TABLE IF EXISTS `detalhesusuario`;
CREATE TABLE IF NOT EXISTS `detalhesusuario` (
  `id_detalhe` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `nome_completo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf_cnpj` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detalhe`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem_produto`
--

DROP TABLE IF EXISTS `imagem_produto`;
CREATE TABLE IF NOT EXISTS `imagem_produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `imagem` varchar(220) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Despejando dados para a tabela `imagem_produto`
--

INSERT INTO `imagem_produto` (`id`, `nome`, `imagem`) VALUES
(1, 'Vitamina Exemplo 1', 'img/vitamina1.jpeg'),
(2, 'Vitamina Exemplo 2', 'img/vitamina2.jpeg'),
(3, 'Vitamina Exemplo 3', 'img/vitamina3.jpeg'),
(4, 'Vitamina Exemplo 4', 'img/vitamina4.jpeg'),
(5, 'Vitamina Exemplo 5', 'img/vitamina5.jpeg'),
(6, 'Proteína Exemplo 1', 'img/proteina1.jpeg'),
(7, 'Proteína Exemplo 2', 'img/proteina2.jpeg'),
(8, 'Proteína Exemplo 3', 'img/proteina3.jpeg'),
(9, 'Proteína Exemplo 4', 'img/proteina4.jpeg'),
(10, 'Proteína Exemplo 5', 'img/proteina5.jpeg'),
(11, 'Pré Treino Exemplo 1', 'img/pretreino1.jpeg'),
(12, 'Pré Treino Exemplo 2', 'img/pretreino2.jpeg'),
(13, 'Pré Treino Exemplo 3', 'img/pretreino3.jpeg'),
(14, 'Pré Treino Exemplo 4', 'img/pretreino4.jpeg'),
(15, 'Pré Treino Exemplo 5', 'img/pretreino5.jpeg'),
(16, 'Emagrecedor Exemplo 1', 'img/emagrecedor1.jpeg'),
(17, 'Emagrecedor Exemplo 2', 'img/emagrecedor2.jpeg'),
(18, 'Emagrecedor Exemplo 3', 'img/emagrecedor3.jpeg'),
(19, 'Emagrecedor Exemplo 4', 'img/emagrecedor4.jpeg'),
(20, 'Emagrecedor Exemplo 5', 'img/emagrecedor5.jpeg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem_receita`
--

DROP TABLE IF EXISTS `imagem_receita`;
CREATE TABLE IF NOT EXISTS `imagem_receita` (
  `id_imgReceita` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_imgReceita`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `imagem_receita`
--

INSERT INTO `imagem_receita` (`id_imgReceita`, `nome`, `imagem`) VALUES
(1, 'wrap de frango com abacate', 'image/wrap-de-frango-com-abacate.webp'),
(2, 'smothie de frutas vermelhas', 'image/smoothie.webp'),
(3, 'salada de quinoa', 'image/salada-de-quinoa-simples'),
(4, 'salada de frutas', 'image/salada-de-frutas.jpg'),
(5, 'espaguete', 'image/espaguete.jpg'),
(6, 'açai', 'image/acai.jpg'),
(7, 'sopa de legumes', 'image/sopa_leg.avif'),
(8, 'omelete de legumes', 'image/omelete-legumes.jpeg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticia`
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE IF NOT EXISTS `noticia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `texto`, `link`, `imagem`) VALUES
(3, 'TESTE1', 'TESTE1', 'https://www.youtube.com', 'imagem01-logo-RECAYD_DRUG-03.jpg'),
(4, 'TESTE1', 'TESTE1', 'https://www.youtube.com', 'imagem08accb812e8420cb98b81cec383fc5e8.jpg'),
(5, 'TESTE3', 'TESTE3', 'https://www.youtube.com', 'imagens/11.jpg'),
(6, 'TESTE3', 'TESTE3', 'https://www.youtube.com', 'imagensdownload (1).jpeg'),
(7, 'TESTE3', 'TESTE3', 'https://www.youtube.com', 'imagens/images.jpeg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamentos`
--

DROP TABLE IF EXISTS `pagamentos`;
CREATE TABLE IF NOT EXISTS `pagamentos` (
  `id_pagamento` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `metodo_pagamento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pagamento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pagamento`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `imagem_id` int DEFAULT NULL,
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
  KEY `categoria_id` (`categoria_id`),
  KEY `fk_imagem_produto` (`imagem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`produto_id`, `nome`, `preco`, `estoque`, `categoria_id`, `imagem_id`, `sobre`, `beneficios`, `recomendacoes`, `data_criacao`, `data_atualizacao`, `peso`, `largura`, `altura`, `comprimento`) VALUES
(11, 'Vitamina Exemplo 1', 129.99, 100, 1, 1, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.20, 5.00, 8.00, 5.00),
(12, 'Vitamina Exemplo 2', 231.99, 100, 1, 2, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.25, 5.50, 8.50, 5.50),
(13, 'Vitamina Exemplo 3', 33.99, 100, 1, 3, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.30, 6.00, 9.00, 6.00),
(14, 'Vitamina Exemplo 4', 135.99, 100, 1, 4, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.35, 6.50, 9.50, 6.50),
(15, 'Vitamina Exemplo 5', 87.99, 100, 1, 5, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.40, 7.00, 10.00, 7.00),
(16, 'Proteína Exemplo 1', 159.99, 50, 2, 6, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.50, 10.00, 15.00, 10.00),
(17, 'Proteína Exemplo 2', 69.99, 50, 2, 7, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.55, 10.50, 15.50, 10.50),
(18, 'Proteína Exemplo 3', 279.99, 50, 2, 8, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.60, 11.00, 16.00, 11.00),
(19, 'Proteína Exemplo 4', 189.99, 50, 2, 9, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.65, 11.50, 16.50, 11.50),
(20, 'Proteína Exemplo 5', 99.99, 50, 2, 10, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.70, 12.00, 17.00, 12.00),
(21, 'Pré Treino Exemplo 1', 45.99, 75, 3, 11, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.30, 7.00, 10.00, 7.00),
(22, 'Pré Treino Exemplo 2', 255.99, 75, 3, 12, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.35, 7.50, 10.50, 7.50),
(23, 'Pré Treino Exemplo 3', 165.99, 75, 3, 13, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.40, 8.00, 11.00, 8.00),
(24, 'Pré Treino Exemplo 4', 75.99, 75, 3, 14, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.45, 8.50, 11.50, 8.50),
(25, 'Pré Treino Exemplo 5', 185.99, 75, 3, 15, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.50, 9.00, 12.00, 9.00),
(26, 'Emagrecedor Exemplo 1', 239.99, 85, 4, 16, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.20, 5.00, 8.00, 5.00),
(27, 'Emagrecedor Exemplo 2', 49.99, 85, 4, 17, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.25, 5.50, 8.50, 5.50),
(28, 'Emagrecedor Exemplo 3', 159.99, 85, 4, 18, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.30, 6.00, 9.00, 6.00),
(29, 'Emagrecedor Exemplo 4', 169.99, 85, 4, 19, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.35, 6.50, 9.50, 6.50),
(30, 'Emagrecedor Exemplo 5', 79.99, 85, 4, 20, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', 0.40, 7.00, 10.00, 7.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `receitas`
--

DROP TABLE IF EXISTS `receitas`;
CREATE TABLE IF NOT EXISTS `receitas` (
  `id_receita` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_imgReceita` int NOT NULL,
  `id_categoria` int NOT NULL,
  `link` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_receita`),
  KEY `id_categoria` (`id_categoria`),
  KEY `fk_imagem_receita` (`id_imgReceita`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `receitas`
--

INSERT INTO `receitas` (`id_receita`, `titulo`, `descricao`, `id_imgReceita`, `id_categoria`, `link`) VALUES
(17, 'Smoothie de Frutas Vermelhas', 'Um smoothie delicioso e refrescante, feito com uma mistura de frutas vermelhas, iogurte natural e um', 2, 2, 'https://www.tudogostoso.com.br/receita/143871-smoothie-de-frutas-vermelhas.html'),
(18, 'Salada de Frutas', 'Uma salada fresca e colorida, com uma variedade de frutas da estação, perfeita para um lanche saudáv', 4, 2, 'https://www.tudogostoso.com.br/receita/787-salada-de-frutas-gostosa.html'),
(19, 'Wrap de Frango com Abacate', 'Wraps recheados com frango desfiado, abacate, tomate e folhas verdes, temperados com um toque de lim', 1, 1, 'https://www.minhareceita.com.br/receita/wrap-com-frango-desfiado-e-avocado/'),
(20, 'Açaí na Tigela', 'Açaí batido com banana, servido com granola e frutas frescas por cima.', 6, 2, 'https://www.tudogostoso.com.br/receita/58910-acai-na-tigela.html'),
(21, 'Salada de Quinoa', 'Uma salada nutritiva feita com quinoa, vegetais frescos e um delicioso molho de limão e azeite.', 3, 1, 'https://www.tudogostoso.com.br/receita/156861-salada-de-quinoa.html'),
(22, 'Espaguete Integral com Legumes', 'Espaguete integral servido com uma variedade de legumes salteados, ideal para uma refeição leve e sa', 5, 1, 'https://www.tudogostoso.com.br/receita/111295-macarrao-integral-com-legumes.html'),
(23, 'Sopa de Legumes', 'Uma sopa reconfortante feita com uma variedade de legumes frescos, perfeita para um dia frio.', 7, 1, 'https://www.tudogostoso.com.br/receita/15665-sopa-de-legumes-com-macarrao.html'),
(24, 'Omelete de Legumes', 'Omelete leve e saudável, recheada com uma variedade de legumes frescos e ervas.', 8, 1, 'https://www.tudogostoso.com.br/receita/163199-omelete-de-legumes.html');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telefone` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `senha` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `telefone`, `senha`) VALUES
(1, 'Gabriel de matos prando', 'biel2006@gamil.com', '18997754801', 'spy12310');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `id_venda` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `id_produto` int DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `preco_unitario` decimal(10,2) DEFAULT NULL,
  `data_venda` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_venda`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `vendas_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`produto_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
