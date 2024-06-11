-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 11-Jun-2024 às 01:37
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE IF NOT EXISTS `adm` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`codigo`, `nome`, `email`, `senha`) VALUES
(1, 'Gabriel de matos', 'bielmatosprando2006@gmail.com', 'biel2006'),
(2, 'Daniel', 'rodriguimdamata123@gmail.com', '123'),
(3, 'isabella', 'isinha2006@gmail.com', '041206'),
(4, 'Markos', 'markos_adm@gmail.com', 'IS@bella1231');

-- --------------------------------------------------------

--
-- Estrutura da tabela `boletos`
--

DROP TABLE IF EXISTS `boletos`;
CREATE TABLE IF NOT EXISTS `boletos` (
  `id_boleto` int(11) NOT NULL AUTO_INCREMENT,
  `id_venda` int(11) DEFAULT NULL,
  `numero_boleto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `status_pagamento` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_boleto`),
  KEY `id_venda` (`id_venda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nome`) VALUES
(1, 'Vitaminas e Minerais'),
(2, 'Proteínas'),
(3, 'Pré Treinos'),
(4, 'Emagrecedores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_exercicio`
--

DROP TABLE IF EXISTS `categoria_exercicio`;
CREATE TABLE IF NOT EXISTS `categoria_exercicio` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categoria_exercicio`
--

INSERT INTO `categoria_exercicio` (`codigo`, `categoria`) VALUES
(1, 'Emagrecimento'),
(2, 'Musculação'),
(3, 'Fisioterapia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_receita`
--

DROP TABLE IF EXISTS `categoria_receita`;
CREATE TABLE IF NOT EXISTS `categoria_receita` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categoria_receita`
--

INSERT INTO `categoria_receita` (`id_categoria`, `nome`) VALUES
(1, 'Salgados'),
(2, 'Doces');

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhesusuario`
--

DROP TABLE IF EXISTS `detalhesusuario`;
CREATE TABLE IF NOT EXISTS `detalhesusuario` (
  `id_detalhe` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `nome_completo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf_cnpj` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detalhe`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

DROP TABLE IF EXISTS `exercicio`;
CREATE TABLE IF NOT EXISTS `exercicio` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `exercicio`
--

INSERT INTO `exercicio` (`codigo`, `titulo`, `texto`) VALUES
(1, 'Exercícios para Emagrecimento', 'Agachamento com salto\r\n            O agachamento com salto é um exercício que envolve o corpo inteiro, o que ajuda a queimar calorias de forma eficiente.\r\n    \r\n            Corrida parada\r\n            Os exercícios aeróbicos são muito importantes para o bom funcionamento físico e para a queima de gordura corporal.\r\n        \r\n            Caminhada na esteira\r\n            Uma atividade simples e uma grande aliada do dia a dia, a caminhada faz parte do grupo de exercícios que não precisam de muitos elementos para serem praticados.\r\n        \r\n            Polichinelo\r\n            Um exercício aeróbico que, assim como o agachamento com salto, envolve o corpo inteiro, é o polichinelo.\r\n        \r\n            Pular corda\r\n            Na infância, pular corda é uma brincadeira muito comum para se divertir entre amigos, mas a atividade também pode, e deve, ser realizada na fase adulta.\r\n        \r\n            Dança\r\n            Uma forma divertida e eficaz de perder peso, a dança traz diversos benefícios para o emagrecimento, bem como para a saúde do corpo.\r\n        \r\n            HIIT\r\n            Conhecido por ser um exercício que envolve alternar períodos de descanso com alta intensidade ou baixa intensidade.\r\n        \r\n            Flexão de braços\r\n            A flexão de braço é um exercício de força que, quando combinado com uma dieta saudável, pode ser muito benéfico para a perda de peso.\r\n        \r\n            Subir e descer escadas\r\n            Subir e descer escadas é uma forma de atividade física muito eficiente na perda de peso, além de acessível, pois pode ser realizada em diversos lugares.\r\n       \r\n            Burpees\r\n            O burpees é um exercício corporal completo que utiliza o treinamento de força e exercícios aeróbicos para obter um alto gasto calórico em um curto período.'),
(2, 'Exercícios para ganho muscular', 'Flexão de Braço\r\n3 Séries com 15 repetições cada\r\n\r\nTríceps Banco\r\n3 Séries com 15 repetições cada\r\n\r\nRemada Unilateral\r\n3 Séries com 15 repetições cada\r\n\r\nAgachamento\r\n3 Séries com 15 repetições cada\r\n\r\nRosca Direta com Barra ou Halteres\r\n3 a 4 Séries com 15 repetições cada\r\n\r\nAgachamento Avanço (Afundo)\r\n3 a 4 Séries com 15 repetições cada\r\n\r\nExtensão de Quadril\r\n3 a 4 Séries com 15 repetições cada\r\n\r\nPrancha Isométrica sobre o Solo\r\nMínimo de 30seg\r\n\r\nFlexão de Ombro (Frontal e Lateral)\r\n3 a 4 Séries com 15 repetições cada\r\n'),
(3, 'Exercícios fisioterapeuticos', 'Ao acordar, deitado de barriga para cima, pedalar 120 vezes no ar\r\nEste exercício melhora o posicionamento da coluna vertebral e da postura global, diminuindo ou retardando o encurvamento das costas e aliviando as dores na coluna.\r\n\r\nAntes do banho, exercitar as pernas (músculos gémeos)\r\nEste exercício bombeia o sangue para o coração, melhora os batimentos cardíacos e evita a obstrução das veias, diminuindo o risco de doenças cardíacas.\r\n\r\nSaltar à corda\r\nÉ um divertido e eficaz exercício para eliminar o excesso de peso, podendo queimar cerca de 10 calorias por minuto se fizer até 100 saltos por minuto. Além disso, este é um exercício verdadeiramente completo.\r\n\r\nSprints na bicicleta\r\nFaça no máximo cinco sequências, alternando velocidade intensa e velocidade menos intensa.\r\n\r\nAo chegar em casa, descanse um pouco e relaxe\r\nO importante é criar uma barreira entre o dia de trabalho que terminou e o serão em casa que está a começar.\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_noticia`
--

DROP TABLE IF EXISTS `imagem_noticia`;
CREATE TABLE IF NOT EXISTS `imagem_noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caminho` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `imagem_noticia`
--

INSERT INTO `imagem_noticia` (`id`, `caminho`) VALUES
(1, 'crud_noticia/inserir_not/imagem/not-1.webp'),
(2, 'crud_noticia/inserir_not/imagem/not-2.webp'),
(3, 'crud_noticia/inserir_not/imagem/not-3.webp'),
(4, 'crud_noticia/inserir_not/imagem/not-4.webp'),
(5, 'crud_noticia/inserir_not/imagem/not-5.webp'),
(6, 'crud_noticia/inserir_not/imagem/not-6.webp'),
(7, 'crud_noticia/inserir_not/imagem/not-7.webp'),
(8, 'crud_noticia/inserir_not/imagem/not-8.webp'),
(9, 'crud_noticia/inserir_not/imagem/not-9.webp'),
(10, 'crud_noticia/inserir_not/imagem/not-10.webp'),
(11, 'crud_noticia/inserir_not/imagem/not-11.webp'),
(12, 'crud_noticia/inserir_not/imagem/not-12.webp'),
(13, 'crud_noticia/inserir_not/imagem/not-13.webp'),
(14, 'crud_noticia/inserir_not/imagem/Wrap-de-Frango-e-Abacate.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_produto`
--

DROP TABLE IF EXISTS `imagem_produto`;
CREATE TABLE IF NOT EXISTS `imagem_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `produto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produtos` (`produto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `imagem_produto`
--

INSERT INTO `imagem_produto` (`id`, `nome`, `imagem`, `produto_id`) VALUES
(1, 'Vitamina Exemplo 1', 'imagem_produto/vitamina1.jpeg', 1),
(2, 'Vitamina Exemplo 2', 'imagem_produto/vitamina2.jpeg', 2),
(3, 'Vitamina Exemplo 3', 'imagem_produto/vitamina3.jpeg', 3),
(4, 'Vitamina Exemplo 4', 'imagem_produto/vitamina4.jpeg', 4),
(5, 'Vitamina Exemplo 5', 'imagem_produto/vitamina5.jpeg', 5),
(6, 'Proteína Exemplo 1', 'imagem_produto/proteina1.jpeg', 6),
(7, 'Proteína Exemplo 2', 'imagem_produto/proteina2.jpeg', 7),
(8, 'Proteína Exemplo 3', 'imagem_produto/proteina3.jpeg', 8),
(9, 'Proteína Exemplo 4', 'imagem_produto/proteina4.jpeg', 9),
(10, 'Proteína Exemplo 5', 'imagem_produto/proteina5.jpeg', 10),
(11, 'Pré Treino Exemplo 1', 'imagem_produto/pretreino1.jpeg', 11),
(12, 'Pré Treino Exemplo 2', 'imagem_produto/pretreino2.jpeg', 12),
(13, 'Pré Treino Exemplo 3', 'imagem_produto/pretreino3.jpeg', 13),
(14, 'Pré Treino Exemplo 4', 'imagem_produto/pretreino4.jpeg', 14),
(15, 'Pré Treino Exemplo 5', 'imagem_produto/pretreino5.jpeg', 15),
(16, 'Emagrecedor Exemplo 1', 'imagem_produto/emagrecedor1.jpeg', 16),
(17, 'Emagrecedor Exemplo 2', 'imagem_produto/emagrecedor2.jpeg', 17),
(18, 'Emagrecedor Exemplo 3', 'imagem_produto/emagrecedor3.jpeg', 18),
(19, 'Emagrecedor Exemplo 4', 'imagem_produto/emagrecedor4.jpeg', 19),
(20, 'Emagrecedor Exemplo 5', 'imagem_produto/emagrecedor5.jpeg', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_receita`
--

DROP TABLE IF EXISTS `imagem_receita`;
CREATE TABLE IF NOT EXISTS `imagem_receita` (
  `id_imgReceita` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_imgReceita`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `imagem_receita`
--

INSERT INTO `imagem_receita` (`id_imgReceita`, `nome`, `imagem`) VALUES
(1, 'wrap de frango com abacate', 'img/wrap-de-frango-com-abacate.webp'),
(2, 'smothie de frutas vermelhas', 'img/smoothie.webp'),
(3, 'salada de quinoa', 'img/salada-de-quinoa-simples'),
(4, 'salada de frutas', 'img/salada-de-frutas.jpg'),
(5, 'espaguete', 'img'),
(6, 'açai', 'img/acai.jpg'),
(7, 'sopa de legumes', 'img/sopa_leg.avif'),
(8, 'omelete de legumes', 'img/omelete-legumes.jpeg'),
(20, 'bolo-de-banana.jpg', 'img/bolo-de-banana.jpg'),
(21, 'teste', 'img/bolo-de-banana.jpg'),
(22, 'Wrap-de-Frango-e-Abacate.png', 'img/Wrap-de-Frango-e-Abacate.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE IF NOT EXISTS `noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem_noticia_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_imagem_noticia` (`imagem_noticia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `texto`, `link`, `imagem_noticia_id`) VALUES
(1, 'O que é melhor para a saúde, leite de vaca ou &#39;alternativos&#39;?', 'Organizações como o Serviço Nacional de Saúde do Reino Unido recomendam que crianças entre um e três anos consumam 350 miligramas de cálcio por dia - pouco mais de meio litro de leite. Quando se trata de adultos, entretanto, as pesquisas sobre o efeito do leite de vaca são conflitantes.', 'https://g1.globo.com/ciencia-e-saude/viva-voce/noticia/2019/12/06/o-que-e-melhor-para-a-saude-leite-de-vaca-ou-alternativos.ghtml', 1),
(2, 'Cortar completamente carne e laticínios faz bem à saúde? O que diz a ciência', 'Mais e mais pessoas estão comendo refeições vegetarianas e veganas — e parte do motivo é que isso é visto como mais saudável. A BBC buscou as evidências sobre o impacto na saúde.', 'https://g1.globo.com/ciencia-e-saude/noticia/2020/02/23/cortar-completamente-carne-e-laticinios-faz-bem-a-saude-o-que-diz-a-ciencia.ghtml', 2),
(3, 'Aprenda a fazer receitas que utilizam sobras de alimentos da sua geladeira', 'O Bem Estar no É de Casa mostrou como preparar uma torta de arroz recheada com frango e tomate, e também um suflê de sobras de feijão e cenoura ralada.', 'https://g1.globo.com/bemestar/noticia/2019/09/27/aprenda-a-fazer-receitas-que-utilizam-sobras-de-alimentos-da-sua-geladeira.ghtml', 14),
(4, 'Dieta vegetariana reduz risco de doenças do coração, mas aumenta risco de derrame, indica estudo', 'Especialistas em nutrição afirmam que, qualquer que seja o tipo de dieta adotado, o melhor para a saúde é consumir uma grande variedade de alimentos.', 'https://g1.globo.com/bemestar/noticia/2019/09/05/dieta-vegetariana-reduz-risco-de-doencas-do-coracao-mas-aumenta-risco-de-derrame-indica-estudo.ghtml', 4),
(5, 'Cúrcuma: veja 8 benefícios e como consumir', 'O ingrediente é conhecido por suas propriedades nutricionais e medicinais, sendo rico em compostos antioxidantes e anti-inflamatórios, além de ser versátil na alimentação', 'https://www.cnnbrasil.com.br/saude/curcuma-veja-8-beneficios-e-como-consumir/', 5),
(6, 'Veja mudanças na alimentação que podem diminuir mortes e impacto ambiental', 'Estudo brasileiro indicou alterações moderadas e acessíveis que beneficiam saúde humana e preservação do planeta', 'https://www.cnnbrasil.com.br/saude/veja-mudancas-na-alimentacao-que-podem-diminuir-mortes-e-impacto-ambiental/', 6),
(7, 'Quais os benefícios de dietas veganas e vegetarianas? Novo estudo traz respostas', 'Pesquisadores mostram que uma alimentação sem produtos de origem animal pode estar associada a um melhor estado de saúde', 'https://www.cnnbrasil.com.br/saude/quais-os-beneficios-de-dietas-veganas-e-vegetarianas-novo-estudo-traz-respostas/', 7),
(8, 'Existe risco de contaminação cruzada em eletrodomésticos como Air Fryer? Entenda', 'Reutilizar a fritadeira sem a devida higienização pode trazer riscos à saúde, segundo especialistas; veja quais são', 'https://www.cnnbrasil.com.br/saude/existe-risco-de-contaminacao-cruzada-em-eletrodomesticos-como-air-fryer-entenda/', 8),
(9, 'Bulking e cutting: saiba as diferenças entre as dietas e entenda como funcionam', 'Populares no universo fitness, as estratégias visam melhorar a composição corporal de acordo com objetivos individuais, como ganhar massa muscular ou perder peso', 'https://www.cnnbrasil.com.br/saude/bulking-e-cutting-saiba-as-diferencas-entre-as-dietas-e-entenda-como-funcionam/', 9),
(10, 'Confira 7 dicas de alimentação para ganho de massa muscular', 'Para ganhar massa magra, é fundamental aumentar a ingestão calórica com um bom equilíbrio entre proteínas, carboidratos e gorduras boas', 'https://www.cnnbrasil.com.br/saude/confira-7-dicas-de-alimentacao-para-ganho-de-massa-muscular/', 10),
(11, '5 fatos sobre alimentos ultraprocessados que você deve saber', 'Esse tipo de alimento contém aditivos como realçadores de sabor, corantes e espessantes que podem trazer riscos à saúde quando consumidos em excesso', 'https://www.cnnbrasil.com.br/saude/5-fatos-sobre-alimentos-ultraprocessados-que-voce-deve-saber/', 11),
(12, 'Se não devemos comer alimentos ultraprocessados, o que devemos comer?', 'Veja alguns alertas de como identificar e evitar comidas que podem prejudicar a sua saúde', 'https://www.cnnbrasil.com.br/saude/se-nao-devemos-comer-alimentos-ultraprocessados-o-que-devemos-comer/', 12),
(13, 'Estilo de vida saudável pode reduzir risco genético de morte em 62%, diz estudo', 'Estudo recente mostrou como uma vida ativa e saudável pode estar relacionada à longevidade, mesmo entre aqueles que têm maior predisposição genética à morte precoce', 'https://www.cnnbrasil.com.br/saude/estilo-de-vida-saudavel-pode-reduzir-risco-genetico-de-morte-em-62-diz-estudo/', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

DROP TABLE IF EXISTS `pagamentos`;
CREATE TABLE IF NOT EXISTS `pagamentos` (
  `id_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `metodo_pagamento` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pagamento` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pagamento`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `produto_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `imagem_id` int(11) DEFAULT NULL,
  `sobre` text COLLATE utf8mb4_unicode_ci,
  `beneficios` text COLLATE utf8mb4_unicode_ci,
  `recomendacoes` text COLLATE utf8mb4_unicode_ci,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `peso` decimal(10,2) NOT NULL DEFAULT '0.00',
  `largura` decimal(10,2) NOT NULL DEFAULT '0.00',
  `altura` decimal(10,2) NOT NULL DEFAULT '0.00',
  `comprimento` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`produto_id`),
  KEY `categoria_id` (`categoria_id`),
  KEY `fk_imagem_produto` (`imagem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`produto_id`, `nome`, `preco`, `estoque`, `categoria_id`, `imagem_id`, `sobre`, `beneficios`, `recomendacoes`, `data_criacao`, `data_atualizacao`, `peso`, `largura`, `altura`, `comprimento`) VALUES
(1, 'Vitamina Exemplo 1', '129.00', 100, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:27:35', '20.00', '50.00', '8.00', '5.00'),
(2, 'Vitamina Exemplo 2', '231.00', 100, 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:27:52', '25.00', '55.00', '85.00', '55.00'),
(3, 'Vitamina Exemplo 3', '339.00', 100, 1, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:28:13', '3.00', '60.00', '90.00', '60.00'),
(4, 'Vitamina Exemplo 4', '135.00', 100, 1, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:28:41', '35.00', '65.00', '95.00', '65.00'),
(5, 'Vitamina Exemplo 5', '79.00', 100, 1, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:29:31', '4.00', '7.00', '1.00', '7.00'),
(6, 'Proteína Exemplo 1', '159.00', 50, 2, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:30:15', '50.00', '10.00', '15.00', '10.00'),
(7, 'Proteína Exemplo 2', '69.00', 50, 2, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:29:52', '55.00', '10.00', '15.00', '10.00'),
(8, 'Proteína Exemplo 3', '27.00', 50, 2, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:30:44', '60.00', '11.00', '16.00', '11.00'),
(9, 'Proteína Exemplo 4', '18.00', 50, 2, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:31:11', '65.00', '11.00', '16.00', '11.00'),
(10, 'Proteína Exemplo 5', '99.00', 50, 2, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:31:35', '70.00', '12.00', '17.00', '12.00'),
(11, 'Pré Treino Exemplo 1', '45.00', 75, 3, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:32:10', '30.00', '70.00', '10.00', '70.00'),
(12, 'Pré Treino Exemplo 2', '25.00', 75, 3, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:32:38', '35.00', '75.00', '10.00', '7.00'),
(13, 'Pré Treino Exemplo 3', '16.00', 75, 3, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:34:46', '40.00', '80.00', '11.00', '80.00'),
(14, 'Pré Treino Exemplo 4', '75.00', 75, 3, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:35:07', '45.00', '85.00', '11.00', '85.00'),
(15, 'Pré Treino Exemplo 5', '185.00', 75, 3, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:35:33', '50.00', '90.00', '12.00', '90.00'),
(16, 'Emagrecedor Exemplo 1', '23999.00', 85, 4, 16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:21:04', '20.00', '500.00', '800.00', '500.00'),
(17, 'Emagrecedor Exemplo 2', '4999.00', 85, 4, 17, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:21:21', '25.00', '550.00', '850.00', '550.00'),
(18, 'Emagrecedor Exemplo 3', '159.00', 85, 4, 18, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:35:53', '30.00', '60.00', '90.00', '60.00'),
(19, 'Emagrecedor Exemplo 4', '169.00', 85, 4, 19, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:36:11', '35.00', '65.00', '95.00', '65.00'),
(20, 'Emagrecedor Exemplo 5', '79.00', 85, 4, 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor enim vel lorem dapibus, ac maximus sem sollicitudin. Proin tincidunt quam nec nibh facilisis, at rutrum ipsum tempor. In vel vehicula velit. Cras ullamcorper aliquet lectus, id elementum eros iaculis non. Cras ut tellus porta, viverra augue vel, auctor nisl. Morbi eget justo suscipit, tristique purus quis, dignissim metus. Nulla a mauris arcu. Pellentesque convallis nulla sed nunc dignissim, ac vulputate justo rutrum.', '2024-05-02 22:48:54', '2024-06-11 01:36:28', '4.00', '7.00', '1.00', '7.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

DROP TABLE IF EXISTS `receitas`;
CREATE TABLE IF NOT EXISTS `receitas` (
  `id_receita` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_imgReceita` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `link` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_receita`),
  KEY `id_categoria` (`id_categoria`),
  KEY `fk_imagem_receita` (`id_imgReceita`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `receitas`
--

INSERT INTO `receitas` (`id_receita`, `titulo`, `descricao`, `id_imgReceita`, `id_categoria`, `link`) VALUES
(18, 'Salada de Frutas', 'Uma salada fresca e colorida, com uma variedade de frutas da estação, perfeita para um lanche saudáv', 4, 2, 'https://www.tudogostoso.com.br/receita/787-salada-de-frutas-gostosa.html'),
(19, 'Wrap de Frango com Abacate', 'Wraps recheados com frango desfiado, abacate, tomate e folhas verdes, temperados com um toque de lim', 1, 1, 'https://www.minhareceita.com.br/receita/wrap-com-frango-desfiado-e-avocado/'),
(20, 'Açaí na Tigela', 'Açaí batido com banana, servido com granola e frutas frescas por cima.', 6, 2, 'https://www.tudogostoso.com.br/receita/58910-acai-na-tigela.html'),
(21, 'Salada de Quinoa', 'Uma salada nutritiva feita com quinoa, vegetais frescos e um delicioso molho de limão e azeite.', 3, 1, 'https://www.tudogostoso.com.br/receita/156861-salada-de-quinoa.html'),
(22, 'Espaguete Integral com Legumes', 'Espaguete integral servido com uma variedade de legumes salteados, ideal para uma refeição leve e sa', 5, 1, 'https://www.tudogostoso.com.br/receita/111295-macarrao-integral-com-legumes.html'),
(23, 'Sopa de Legumes', 'Uma sopa reconfortante feita com uma variedade de legumes frescos, perfeita para um dia frio.', 7, 1, 'https://www.tudogostoso.com.br/receita/15665-sopa-de-legumes-com-macarrao.html'),
(24, 'Omelete de Legumes', 'Omelete leve e saudável, recheada com uma variedade de legumes frescos e ervas.', 8, 1, 'https://www.tudogostoso.com.br/receita/163199-omelete-de-legumes.html');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email` varchar(150) CHARACTER SET latin1 NOT NULL,
  `telefone` varchar(14) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `telefone`, `senha`) VALUES
(1, 'Gabriel de matos prando', 'biel2006@gamil.com', '18997754801', 'spy12310'),
(3, 'Markos', 'Sidokinha567@gmail.com', '18994363', '696963'),
(4, 'Isabella', 'belinha666@gmail.com', '189965264', 'nicule');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `id_venda` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco_unitario` decimal(10,2) DEFAULT NULL,
  `data_venda` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_venda`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `fk_noticia_imagem_noticia` FOREIGN KEY (`imagem_noticia_id`) REFERENCES `imagem_noticia` (`id`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `vendas_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`produto_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
