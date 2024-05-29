-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Mar-2021 às 00:17
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `celke`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `payments_picpays`
--

DROP TABLE IF EXISTS `payments_picpays`;
CREATE TABLE IF NOT EXISTS `payments_picpays` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_url` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qrcode` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `expires_at` datetime NOT NULL,
  `product_id` int NOT NULL,
  `payments_statu_id` int NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `payments_picpays`
--

INSERT INTO `payments_picpays` (`id`, `first_name`, `last_name`, `cpf`, `phone`, `email`, `payment_url`, `qrcode`, `expires_at`, `product_id`, `payments_statu_id`, `created`, `modified`) VALUES
(1, 'Cesar', 'Szpak', '123.456.789-10', '(27)12345-6789', 'teste@picpay.com', NULL, NULL, '2021-03-28 14:32:59', 1, 4, '2021-03-25 14:32:59', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `payments_status`
--

DROP TABLE IF EXISTS `payments_status`;
CREATE TABLE IF NOT EXISTS `payments_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(42) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(42) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obs` text COLLATE utf8mb4_unicode_ci,
  `color` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `payments_status`
--

INSERT INTO `payments_status` (`id`, `name`, `status`, `description`, `obs`, `color`, `created`, `modified`) VALUES
(1, 'Iniciado', 'start', 'Compra iniciada.', NULL, 'primary', '2021-04-23 11:34:05', NULL),
(2, 'Criado', 'created', 'Registro criado.', NULL, 'primary', '2021-04-23 11:34:05', NULL),
(3, 'Expirado ', 'expired', 'Prazo para pagamento expirado ou ordem cancelada.', '', 'warning', '2021-04-23 13:32:47', NULL),
(4, 'Análise', 'analysis', 'Pago e em processo de análise anti-fraude.', '', 'info', '2021-04-23 13:32:47', NULL),
(5, 'Pago', 'paid', 'Pago.', '', 'success', '2021-04-23 13:32:47', NULL),
(6, 'Completo', 'completed', 'Pago e saldo disponível.', '', 'success', '2021-04-23 13:32:47', NULL),
(7, 'Devolvido', 'refunded', 'Pago e devolvido.', '', 'danger', '2021-04-23 13:32:47', NULL),
(8, 'Estorno', 'chargeback', 'Pago e com chargeback.', '', 'danger', '2021-04-23 13:32:47', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `image` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `created`, `modified`) VALUES
(1, 'Curso de PHP Developer', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam molestie, eros nec tincidunt tristique, nulla massa posuere nisl, a venenatis justo urna eu risus. Duis quis ipsum volutpat mauris aliquet pellentesque a eu nunc. Integer pretium mi velit, sit amet suscipit nunc efficitur at. Phasellus elementum, dolor vitae luctus venenatis, lacus lacus lobortis ipsum, quis venenatis eros orci ac eros. Maecenas tristique luctus lectus nec fermentum. Phasellus lacinia velit venenatis neque facilisis, commodo auctor massa facilisis. Pellentesque id metus leo. Cras eget dignissim quam. Fusce laoreet eu massa at commodo. Pellentesque facilisis nisl a justo interdum malesuada. Praesent erat felis, mattis in eleifend quis, mollis sit amet sapien. Integer purus lacus, posuere at urna at, tincidunt viverra nisi.</p>\r\n\r\n<p>Nullam viverra dui sed nisi tincidunt, id rutrum ante sodales. Phasellus vestibulum facilisis ipsum vitae posuere. Sed in felis ipsum. Pellentesque vitae mauris suscipit, blandit ipsum eget, commodo lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas sit amet turpis in sodales. Sed tristique dolor et euismod euismod. Nulla nulla ipsum, cursus non laoreet ut, cursus dignissim ex. Sed facilisis augue ligula, eu dignissim tortor condimentum ut. Cras sit amet orci finibus, pretium eros quis, volutpat erat. Donec aliquet quis ante ut vestibulum. Nam sed ante ac nulla fringilla euismod.</p>', 247, 'curso-de-php-developer.jpg', '2021-04-23 12:08:54', NULL),
(2, 'Curso de PHP Orientado Objetos', '<p>Etiam nec arcu tempus lectus rhoncus faucibus. Pellentesque iaculis vel enim ac aliquet. Vivamus commodo lacus non arcu semper, eu varius erat gravida. Cras sed nisi quis nibh euismod pharetra. Fusce erat leo, venenatis aliquet molestie sit amet, rutrum vitae leo. Phasellus porttitor urna id sapien porttitor, eget condimentum tellus convallis. In lacinia nisi vitae laoreet tempor. Praesent vel sollicitudin quam. Sed in eleifend quam. Aliquam finibus consectetur urna. Nunc commodo eget turpis mattis dapibus. Donec id tempor nibh, quis pharetra leo.</p>\r\n\r\n<p>Sed sagittis quam quis enim placerat, non ultrices est semper. Suspendisse potenti. Duis vestibulum vitae quam sed maximus. Integer malesuada nulla eget blandit rhoncus. Morbi dignissim ac neque sit amet rhoncus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris in dignissim diam, sagittis auctor sapien. Ut ac odio sit amet nulla tincidunt eleifend eget quis nisl. In dignissim diam ut tellus mollis iaculis. Integer non metus volutpat tortor placerat eleifend. Maecenas ut nisi vehicula, rutrum ligula id, tempus nibh. Suspendisse lacinia enim lacus, id dapibus ex hendrerit in. Cras vulputate a lacus non elementum. Nulla sed orci sit amet risus fringilla gravida. Aliquam pellentesque mattis magna vel faucibus.</p>', 194.47, 'curso-de-php-orientado-a-objetos.jpg', '2021-04-23 12:08:54', NULL),
(3, 'Curso de PHP, MySQLi e Bootstrap', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam molestie, eros nec tincidunt tristique, nulla massa posuere nisl, a venenatis justo urna eu risus. Duis quis ipsum volutpat mauris aliquet pellentesque a eu nunc. Integer pretium mi velit, sit amet suscipit nunc efficitur at. Phasellus elementum, dolor vitae luctus venenatis, lacus lacus lobortis ipsum, quis venenatis eros orci ac eros. Maecenas tristique luctus lectus nec fermentum. Phasellus lacinia velit venenatis neque facilisis, commodo auctor massa facilisis. Pellentesque id metus leo. Cras eget dignissim quam. Fusce laoreet eu massa at commodo. Pellentesque facilisis nisl a justo interdum malesuada. Praesent erat felis, mattis in eleifend quis, mollis sit amet sapien. Integer purus lacus, posuere at urna at, tincidunt viverra nisi.</p>\r\n\r\n<p>Nullam viverra dui sed nisi tincidunt, id rutrum ante sodales. Phasellus vestibulum facilisis ipsum vitae posuere. Sed in felis ipsum. Pellentesque vitae mauris suscipit, blandit ipsum eget, commodo lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas sit amet turpis in sodales. Sed tristique dolor et euismod euismod. Nulla nulla ipsum, cursus non laoreet ut, cursus dignissim ex. Sed facilisis augue ligula, eu dignissim tortor condimentum ut. Cras sit amet orci finibus, pretium eros quis, volutpat erat. Donec aliquet quis ante ut vestibulum. Nam sed ante ac nulla fringilla euismod.</p>', 149, 'curso-de-php-mysqli-e-bootstrap.jpg', '2021-04-23 14:33:05', NULL),
(4, 'Curso de HTML, CSS e Bootstrap4', '<p>Nullam viverra dui sed nisi tincidunt, id rutrum ante sodales. Phasellus vestibulum facilisis ipsum vitae posuere. Sed in felis ipsum. Pellentesque vitae mauris suscipit, blandit ipsum eget, commodo lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas sit amet turpis in sodales. Sed tristique dolor et euismod euismod. Nulla nulla ipsum, cursus non laoreet ut, cursus dignissim ex. Sed facilisis augue ligula, eu dignissim tortor condimentum ut. Cras sit amet orci finibus, pretium eros quis, volutpat erat. Donec aliquet quis ante ut vestibulum. Nam sed ante ac nulla fringilla euismod.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam molestie, eros nec tincidunt tristique, nulla massa posuere nisl, a venenatis justo urna eu risus. Duis quis ipsum volutpat mauris aliquet pellentesque a eu nunc. Integer pretium mi velit, sit amet suscipit nunc efficitur at. Phasellus elementum, dolor vitae luctus venenatis, lacus lacus lobortis ipsum, quis venenatis eros orci ac eros. Maecenas tristique luctus lectus nec fermentum. Phasellus lacinia velit venenatis neque facilisis, commodo auctor massa facilisis. Pellentesque id metus leo. Cras eget dignissim quam. Fusce laoreet eu massa at commodo. Pellentesque facilisis nisl a justo interdum malesuada. Praesent erat felis, mattis in eleifend quis, mollis sit amet sapien. Integer purus lacus, posuere at urna at, tincidunt viverra nisi.</p>\r\n\r\n', 97, 'curso-de-html-css-bootstrap.jpg', '2021-04-23 14:33:05', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transactions_status`
--

DROP TABLE IF EXISTS `transactions_status`;
CREATE TABLE IF NOT EXISTS `transactions_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `authorization_id` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payments_statu_id` int NOT NULL,
  `payments_picpay_id` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `transactions_status`
--

INSERT INTO `transactions_status` (`id`, `authorization_id`, `payments_statu_id`, `payments_picpay_id`, `created`, `modified`) VALUES
(1, NULL, 2, 13, '2021-03-27 13:22:54', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
