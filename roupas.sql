create database bancoroupa;
use bancoroupa;

CREATE TABLE IF NOT EXISTS `roupas` (
    `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `descricao` varchar(50) NOT NULL,
    `quantidade` int NOT NULL,
    `precou` float NOT NULL,
    `tamanho` int NOT NULL,
    `img` varchar(30) NOT NULL
)

ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6;

INSERT INTO `roupas` (`id`, `descricao`, `quantidade`, `precou`, `tamanho`, `img`) VALUES
(1, 'Camisa da banda norueguesa Burzum', 10, 78.99, 20, 'camisa01.jpeg'),
(2, 'Camisa da banda norueguesa Mayhem', 6, 102.90, 20, 'camisa02.jpeg'),
(3, 'Camisa da banda sueca Bathory', 3, 135.50, 20, 'camisa03.jpeg');