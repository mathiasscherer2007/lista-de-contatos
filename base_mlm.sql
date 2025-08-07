-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/08/2025 às 22:05
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `base_mlm`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `idLivro` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `linkImagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`idLivro`, `titulo`, `linkImagem`) VALUES
(1, 'The Hobbit', 'https://m.media-amazon.com/images/I/91M9xPIf10L.jpg'),
(2, 'All Quiet on the Western Front', 'https://m.media-amazon.com/images/I/617GMlg0hIL.jpg'),
(3, 'The Lord of the Rings: The Fellowship of the Ring', 'https://m.media-amazon.com/images/I/71Ep7UNeTtL._UF1000,1000_QL80_.jpg'),
(4, 'The Lord of the Rings: The Two Towers', 'https://m.media-amazon.com/images/I/71FXalNQFtL._UF1000,1000_QL80_.jpg'),
(5, 'The Lord of the Rings: The Return of the King', 'https://legendabookstore.com/home/wp-content/uploads/2020/07/9780261103597.jpg'),
(6, 'The Silmarillion', 'https://m.media-amazon.com/images/I/71Gt0U59D3L._UF1000,1000_QL80_.jpg'),
(7, 'Bridge to Terabithia', 'https://m.media-amazon.com/images/I/91acCfRI6CL.jpg'),
(8, 'Travel to the Center of the Earth', 'https://d28hgpri8am2if.cloudfront.net/book_images/cvr9781416561460_9781416561460_hr.jpg'),
(9, '20,000 Leagues Under the Sea', 'https://m.media-amazon.com/images/I/71mw4nYxkdL._UF1000,1000_QL80_.jpg'),
(10, 'Don Quijote de la Mancha', 'https://m.media-amazon.com/images/I/81pdXbEIZhL._UF894,1000_QL80_.jpg'),
(11, 'The Red Book', 'https://m.media-amazon.com/images/I/61dyIeYMrnL._UF894,1000_QL80_.jpg'),
(12, 'The Communist Manifesto', 'https://m.media-amazon.com/images/I/51m-v7OOcGL._UF1000,1000_QL80_.jpg'),
(13, 'Diary of a Minecraft Zombie', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCwqr1cbyktjmA0x0WSXs5_I2_xE4SlntwXw&s'),
(14, 'The Art of War', 'https://m.media-amazon.com/images/I/71MizulW5AL.jpg'),
(15, 'The Book of the Five Rings', 'https://m.media-amazon.com/images/I/81G-H+DLRvL._UF894,1000_QL80_.jpg'),
(16, 'The Holy Bible', 'https://m.media-amazon.com/images/I/91bEStL5JjL._UF894,1000_QL80_.jpg'),
(17, 'From the Earth to the Moon', 'https://upload.wikimedia.org/wikipedia/commons/c/c4/From_the_Earth_to_the_Moon_Jules_Verne.jpg'),
(18, 'The Origin of Species', 'https://cdn.kobo.com/book-images/7f7cb400-e00d-4608-9fd8-e8c672820781/1200/1200/False/the-origin-of-species-44.jpg'),
(19, 'Ticket to Childhood', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvfSxFMF3z6Sx-ScjmA-QE5VOGAvg4Y2-T4A&s'),
(20, 'The Psicology of the Child', 'https://m.media-amazon.com/images/I/71LoylcbIuL.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `email` text NOT NULL,
  `senha` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`idLivro`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `idLivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
