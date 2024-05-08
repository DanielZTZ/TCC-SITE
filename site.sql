-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 08-Maio-2024 às 22:35
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
-- Estrutura da tabela `imagem_noticia`
--

DROP TABLE IF EXISTS `imagem_noticia`;
CREATE TABLE IF NOT EXISTS `imagem_noticia` (
  `id_imgnot` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_imgnot`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `imagem_noticia`
--

INSERT INTO `imagem_noticia` (`id_imgnot`, `nome`, `img`) VALUES
(2, 'Os primeiros passos para uma vida saudável\r\n', 'image/materia-1.webp'),
(3, 'Cortar completamente carne e laticínios faz bem à saúde? O que diz a ciência', 'image/materia-2.webp\r\n'),
(4, 'Dieta vegetariana reduz risco de doenças do coração, mas aumenta risco de derrame, indica estudo', 'image/materia-3.webp'),
(5, 'Aprenda a fazer receitas que utilizam sobras de alimentos da sua geladeira', 'image/materia-4.webp'),
(6, 'Proteína animal ou vegetal: estudo sugere qual é a melhor para o sono', 'materia-5.webp'),
(7, 'Saúde recomenda atenção aos hábitos alimentares para uma vida saudável', 'image/materia-6.jpg'),
(8, 'É possível ser saudável e comer chocolate todos os dias?', 'image/materia-7.webp'),
(9, 'Chips de Batata Doce na Air Fryer: Receita Fácil e Saudável', 'image/materia-8.webp'),
(10, 'Descoberto melhor exercício físico para tratar depressão; veja qual', 'image/materia-9.jpg'),
(11, 'Saiba quais sinais de problema no fígado aparecem nos pés', 'image/materia-10.jpg'),
(12, 'Exercício físico é a melhor maneira de evitar estes 2 tipos de câncer', 'image/materia-11.jpg'),
(13, 'Musculação faz bem para cérebro dos idosos, revela estudo', 'image/materia-12.jpg'),
(14, 'Confira dicas para começar a correr e chegar até os 5 km', 'image/materia-13.webp'),
(22, 'materia-16', 'materia-16.webp'),
(23, 'materia-16', 'materia-16.webp'),
(24, 'meteria-16', 'materia-16.webp'),
(25, 'teste1', 'materia-16.webp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_produto`
--

DROP TABLE IF EXISTS `imagem_produto`;
CREATE TABLE IF NOT EXISTS `imagem_produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(220) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `imagem_produto`
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
-- Estrutura da tabela `imagem_receita`
--

DROP TABLE IF EXISTS `imagem_receita`;
CREATE TABLE IF NOT EXISTS `imagem_receita` (
  `id_imgReceita` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_imgReceita`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `imagem_receita`
--

INSERT INTO `imagem_receita` (`id_imgReceita`, `nome`, `imagem`) VALUES
(1, 'wrap de frango com abacate', 'imagem/wrap-de-frango-com-abacate.webp'),
(2, 'smothie de frutas vermelhas', 'imagem/smoothie.webp'),
(3, 'wrap de frango com abacate', 'imagem/wrap-de-frango-com-abacate.webp'),
(4, 'smothie de frutas vermelhas', 'imagem/smoothie.webp'),
(5, 'salada de quinoa', 'imagem/salada-de-quinoa-simples'),
(6, 'salada de frutas', 'imagem/salada-de-frutas.jpg'),
(7, 'salada de quinoa', 'imagem/salada-de-quinoa-simples'),
(8, 'salada de frutas', 'imagem/salada-de-frutas.jpg'),
(9, 'espaguete', 'imagem/espaguete.jpg'),
(10, 'açai', 'imagem/acai.jpg'),
(11, 'espaguete', 'imagem/espaguete.jpg'),
(12, 'açai', 'imagem/acai.jpg'),
(13, 'omelete de legumes', 'imagem/omelete-legumes.jpeg'),
(14, 'sopa de legumes', 'imagem/sopa_leg.avif'),
(15, 'omelete de legumes', 'imagem/omelete-legumes.jpeg'),
(16, 'sopa de legumes', 'imagem/sopa_leg.avif');

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
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `texto`, `link`, `imagem`) VALUES
(1, 'Os primeiros passos para uma vida saudável', 'Dia após dia, as inúmeras novidades acerca dos métodos elaborados para a adoção de uma vida saudável aumentam e, a partir disso, a busca pela alimentação balanceada e a prática de exercícios físicos crescem de forma paralela e constante. A preferência por alimentos orgânicos e com baixo teor calórico garantem a mobilidade social em prol de uma rotina mais saudável, ou seja, todas as termologias voltadas à perda de peso e relacionadas ao “universo fitness”, ganharam um novo significado.', 'https://g1.globo.com/sp/presidente-prudente-regiao/especial-publicitario/unimed-centro-oeste-paulista/noticia/2018/08/20/os-primeiros-passos-para-uma-vida-saudavel-unimed.ghtml', 'https://s2-g1.glbimg.com/QyheyTX-sSwoPf7XaEuZB0oxLM0=/0x0:1200x765/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2018/J/p/LPibHIQjATvJaAQFHhSQ/foto-materia-1.jpg'),
(2, 'Cortar completamente carne e laticínios faz bem à saúde? O que diz a ciência', 'O número de pessoas que diminuíram o consumo de carnes e laticínios ou cortaram completamente esses alimentos de suas dietas tem aumentado na última década.', 'https://g1.globo.com/ciencia-e-saude/noticia/2020/02/23/cortar-completamente-carne-e-laticinios-faz-bem-a-saude-o-que-diz-a-ciencia.ghtml', 'https://s2-g1.glbimg.com/ChRCvCoAxhlpcI7FLsujHiMDYtY=/0x0:976x549/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2020/G/x/Yv94AdStaYQA9wmST6jQ/1.jpg'),
(3, 'Dieta vegetariana reduz risco de doenças do coração, mas aumenta risco de derrame, indica estudo', 'Uma dieta livre de carnes reduz o risco de doenças cardíacas, mas aumenta o risco de derrame.', 'https://g1.globo.com/bemestar/noticia/2019/09/05/dieta-vegetariana-reduz-risco-de-doencas-do-coracao-mas-aumenta-risco-de-derrame-indica-estudo.ghtml', 'https://s2-g1.glbimg.com/BnutlAdf5Oh6SnIbWRt9oq7PfR8=/0x0:1280x750/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2019/d/1/TvY2V8Qk603EHpoZkfhw/prato-de-salada.jpg'),
(4, 'Aprenda a fazer receitas que utilizam sobras de alimentos da sua geladeira', 'Sobrou comida do almoço e ela foi guardada corretamente? Transforme-as em uma nova receita, sem desperdiçar nada.', 'https://g1.globo.com/bemestar/noticia/2019/09/27/aprenda-a-fazer-receitas-que-utilizam-sobras-de-alimentos-da-sua-geladeira.ghtml', 'https://s2-g1.glbimg.com/L4hOEQ-imWU-vURKK3unj3CblqA=/0x0:1600x1200/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2019/h/p/5dY8EBRbaiiGyEmUbNhg/cozinhaterapia.jpg'),
(5, 'Proteína animal ou vegetal: estudo sugere qual é a melhor para o sono', 'Ter uma boa qualidade de sono é fundamental para a saúde no geral. Estudos já mostraram que dormir bem melhora o humor, a concentração, fortalece o sistema imunológico e previne doenças cardiovasculares e metabólicas. Para ter uma boa noite de sono, o estilo de vida e a alimentação exercem papéis fundamentais. Diante disso, um novo estudo indica que o tipo de proteína consumida na alimentação pode influenciar no sono.', 'https://www.cnnbrasil.com.br/saude/proteina-animal-ou-vegetal-estudo-sugere-qual-e-a-melhor-para-o-sono/', 'https://www.cnnbrasil.com.br/wp-content/uploads/sites/12/2024/03/proteina-sono.jpg?w=1220&h=674&crop=1'),
(6, 'Saúde recomenda atenção aos hábitos alimentares para uma vida saudável', 'Entre os desafios da vida moderna, manter uma alimentação equilibrada e saudável está entre as maiores preocupações das pessoas. A Secretaria Municipal da Saúde (SMS) de Curitiba recomenda que as famílias escolham alimentos nutritivos, necessários para o bom funcionamento do corpo humano e não apenas para saciar a fome.', 'https://ipmc.curitiba.pr.gov.br/noticias/saude-recomenda-atencao-aos-habitos-alimentares-para-uma-vida-saudavel/3005', 'https://mid-ipmc.curitiba.pr.gov.br/2024/4/jpg/capa/00017787.jpg'),
(7, 'É possível ser saudável e comer chocolate todos os dias?', 'Durante a Páscoa, junto com os ovos de chocolate chega também a preocupação acerca dos malefícios que o doce pode causar à saúde devido aos níveis de gordura e açúcar. Contudo, alguns estudos mostram que consumir pequenas doses de certos chocolates diariamente pode fazer bem.', 'https://www.gazetaweb.com/noticias/ciencia-e-saude/e-possivel-ser-saudavel-e-comer-chocolate-todos-os-dias-755154', 'https://cdn.gazetaweb.com/img/inline/750000/940x500/E-possivel-ser-saudavel-e-comer-chocolate-todos-os0075515400-1.webp?fallback=https%3A%2F%2Fcdn.gazetaweb.com%2Fimg%2Finline%2F750000%2FE-possivel-ser-saudavel-e-comer-chocolate-todos-os0075515400.jpg%3Fx'),
(8, 'Chips de Batata Doce na Air Fryer: Receita Fácil e Saudável', 'Experimente uma maneira saudável e deliciosa de saborear batata doce com estes chips crocantes feitos na air fryer. Esta receita simples transforma fatias finas de batata doce em um petisco irresistível, perfeito para qualquer ocasião. Com apenas alguns ingredientes e alguns minutos na air fryer, você terá chips dourados por fora e macios por dentro, prontos para serem degustados!', 'https://www.bcnoticias.com.br/chips-de-batata-doce-na-air-fryer-receita-facil-e-saudavel/', 'https://www.bcnoticias.com.br/wp-content/uploads/2024/03/batata-doce-air-fryer.webp'),
(9, '\r\nDescoberto melhor exercício físico para tratar depressão; veja qual\r\n', 'A busca por tratamentos eficazes contra a depressão revela que a atividade física pode ser uma arma poderosa.', 'https://catracalivre.com.br/saude-bem-estar/melhor-exercicio-fisico-tratar-depressao/', 'https://catracalivre.com.br/wp-content/uploads/2024/04/descoberto-melhor-exercicio-fisico-para-tratar-depressao.jpg'),
(10, 'Saiba quais sinais de problema no fígado aparecem nos pés', 'Embora muitas vezes pensemos nos pés apenas como ferramentas para ir de um lugar para o outro, eles podem nos dar informações valiosas sobre a saúde em geral.', 'https://catracalivre.com.br/saude-bem-estar/saiba-quais-sinais-de-problema-no-figado-aparecem-nos-pes/', 'https://catracalivre.com.br/wp-content/uploads/2024/02/istock-1408610193-scaled.jpg'),
(11, 'Exercício físico é a melhor maneira de evitar estes 2 tipos de câncer', 'São registrados cerca de 625 mil casos de câncer de cabeça e pescoço no Brasil a cada ano, aponta o Instituto Nacional de Câncer (INCA). A conscientização sobre os cuidados preventivos é, portanto, de extrema importância.', 'https://catracalivre.com.br/saude-bem-estar/exercicio-fisico-e-a-melhor-maneira-de-evitar-estes-2-tipos-de-cancer/', 'https://catracalivre.com.br/wp-content/uploads/2024/03/exercicio-fisico-e-a-melhor-maneira-de-evitar-estes-2-tipos-de-cancer-e1710868087209.jpg'),
(12, 'Musculação faz bem para cérebro dos idosos, revela estudo\r\n', 'Uma pesquisa realizada por psicólogos da Universidade da Flórida, nos Estados Unidos revela que, pessoas dosas que optam por uma rotina repleta de exercícios físicos, sejam eles aeróbicos ou de musculação, podem melhorar a saúde do cérebro, em comparação com aquelas que levam uma vida sedentária.', 'https://catracalivre.com.br/saude-bem-estar/musculacao-faz-bem-para-cerebro-dos-idosos-revela-estudo/', 'https://catracalivre.com.br/wp-content/uploads/2024/01/istock-1778246182.jpg'),
(13, 'Confira dicas para começar a correr e chegar até os 5 km', 'Correr é uma prática cada vez mais popular por seus benefícios à saúde. A corrida é um esporte acessível e pode ser praticada em qualquer idade e sem investimentos financeiros altos.', 'https://www.metropoles.com/saude/dicas-para-comecar-a-correr-5k', 'https://uploads.metropoles.com/wp-content/uploads/2023/09/12165503/Corrida-5-600x400.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`produto_id`, `nome`, `preco`, `estoque`, `categoria_id`, `imagem_id`, `sobre`, `beneficios`, `recomendacoes`, `data_criacao`, `data_atualizacao`, `peso`, `largura`, `altura`, `comprimento`) VALUES
(11, 'Vitamina Exemplo 1', '129.99', 100, 1, 1, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.20', '5.00', '8.00', '5.00'),
(12, 'Vitamina Exemplo 2', '231.99', 100, 1, 2, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.25', '5.50', '8.50', '5.50'),
(13, 'Vitamina Exemplo 3', '33.99', 100, 1, 3, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.30', '6.00', '9.00', '6.00'),
(14, 'Vitamina Exemplo 4', '135.99', 100, 1, 4, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.35', '6.50', '9.50', '6.50'),
(15, 'Vitamina Exemplo 5', '87.99', 100, 1, 5, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.40', '7.00', '10.00', '7.00'),
(16, 'Proteína Exemplo 1', '159.99', 50, 2, 6, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.50', '10.00', '15.00', '10.00'),
(17, 'Proteína Exemplo 2', '69.99', 50, 2, 7, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.55', '10.50', '15.50', '10.50'),
(18, 'Proteína Exemplo 3', '279.99', 50, 2, 8, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.60', '11.00', '16.00', '11.00'),
(19, 'Proteína Exemplo 4', '189.99', 50, 2, 9, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.65', '11.50', '16.50', '11.50'),
(20, 'Proteína Exemplo 5', '99.99', 50, 2, 10, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.70', '12.00', '17.00', '12.00'),
(21, 'Pré Treino Exemplo 1', '45.99', 75, 3, 11, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.30', '7.00', '10.00', '7.00'),
(22, 'Pré Treino Exemplo 2', '255.99', 75, 3, 12, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.35', '7.50', '10.50', '7.50'),
(23, 'Pré Treino Exemplo 3', '165.99', 75, 3, 13, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.40', '8.00', '11.00', '8.00'),
(24, 'Pré Treino Exemplo 4', '75.99', 75, 3, 14, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.45', '8.50', '11.50', '8.50'),
(25, 'Pré Treino Exemplo 5', '185.99', 75, 3, 15, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.50', '9.00', '12.00', '9.00'),
(26, 'Emagrecedor Exemplo 1', '239.99', 85, 4, 16, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.20', '5.00', '8.00', '5.00'),
(27, 'Emagrecedor Exemplo 2', '49.99', 85, 4, 17, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.25', '5.50', '8.50', '5.50'),
(28, 'Emagrecedor Exemplo 3', '159.99', 85, 4, 18, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.30', '6.00', '9.00', '6.00'),
(29, 'Emagrecedor Exemplo 4', '169.99', 85, 4, 19, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.35', '6.50', '9.50', '6.50'),
(30, 'Emagrecedor Exemplo 5', '79.99', 85, 4, 20, 'descrição', 'descrição', 'descrição', '2024-05-02 22:48:54', '2024-05-02 22:48:54', '0.40', '7.00', '10.00', '7.00');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `telefone`, `senha`) VALUES
(1, 'Gabriel de matos prando', 'biel2006@gamil.com', '18997754801', 'spy12310');
COMMIT;

-- --------------------------------------------------------

--
-- Estrutura para tabela `DetalhesUsuario`
--

CREATE TABLE IF NOT EXISTS `DetalhesUsuario` (
  `id_detalhe` INT AUTO_INCREMENT PRIMARY KEY,
  `id_usuario` INT,
  `nome_completo` VARCHAR(255) NOT NULL,
  `cpf_cnpj` VARCHAR(20),
  `telefone` VARCHAR(20),
  `endereco` VARCHAR(255),
  `cidade` VARCHAR(100),
  `estado` VARCHAR(50),
  `pais` VARCHAR(50),
  `cep` VARCHAR(20),
  `data_criacao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_usuario`) REFERENCES `usuario`(`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Estrutura para tabela `Pagamentos`
--

CREATE TABLE IF NOT EXISTS `Pagamentos` (
  `id_pagamento` INT AUTO_INCREMENT PRIMARY KEY,
  `id_usuario` INT,
  `metodo_pagamento` VARCHAR(50),
  `status_pagamento` VARCHAR(50),
  `valor` DECIMAL(10, 2),
  `data_hora` DATETIME,
  `data_criacao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_usuario`) REFERENCES `usuario`(`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tabela de Vendas
--

CREATE TABLE IF NOT EXISTS `Vendas` (
  `id_venda` INT AUTO_INCREMENT PRIMARY KEY,
  `id_usuario` INT,
  `id_produto` INT,
  `quantidade` INT,
  `preco_unitario` DECIMAL(10, 2),
  `data_venda` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_usuario`) REFERENCES `usuario`(`id_usuario`),
  FOREIGN KEY (`id_produto`) REFERENCES `produtos`(`produto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tabela de Boletos
--

CREATE TABLE IF NOT EXISTS `Boletos` (
  `id_boleto` INT AUTO_INCREMENT PRIMARY KEY,
  `id_venda` INT,
  `numero_boleto` VARCHAR(100),
  `data_vencimento` DATE,
  `status_pagamento` VARCHAR(50),
  `data_criacao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_venda`) REFERENCES `Vendas`(`id_venda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
