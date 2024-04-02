-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02/04/2024 às 04:14
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
-- Banco de dados: `not_saudavel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticia`
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE IF NOT EXISTS `noticia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `noticia`
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
