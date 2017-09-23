-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Set-2017 às 21:04
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_funcionario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `analistas`
--

CREATE TABLE `analistas` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  `projeto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `analistas`
--

INSERT INTO `analistas` (`id`, `funcionario_id`, `projeto`) VALUES
(2, 12, 'Sistema ERP'),
(3, 13, 'Emissor de CTE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sexo` char(1) NOT NULL,
  `idade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `sexo`, `idade`) VALUES
(5, 'Gus Antoniassi', 'M', 21),
(8, 'Sebastian Bergmann', 'M', 40),
(9, 'Larry E. Masters', 'M', 50),
(10, 'Mark Story', 'M', 35),
(12, 'Henry Bruno Fernando Ribeiro', 'M', 23),
(13, 'Catarina Alice Julia Rocha', 'F', 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios_hobbies`
--

CREATE TABLE `funcionarios_hobbies` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  `hobby_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios_hobbies`
--

INSERT INTO `funcionarios_hobbies` (`id`, `funcionario_id`, `hobby_id`) VALUES
(19, 5, 15),
(20, 5, 16),
(21, 5, 18),
(22, 5, 29),
(23, 5, 45),
(25, 8, 4),
(26, 8, 9),
(27, 9, 9),
(28, 9, 46),
(29, 9, 47),
(30, 10, 1),
(31, 10, 9),
(32, 10, 13),
(37, 12, 3),
(38, 12, 14),
(39, 12, 18),
(40, 13, 11),
(41, 13, 19),
(42, 13, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `hobbies`
--

INSERT INTO `hobbies` (`id`, `nome`) VALUES
(1, 'Yoga'),
(2, 'Escrita'),
(3, 'Carpintaria'),
(4, 'Impressão 3D'),
(5, 'Atuação'),
(6, 'Rádio amador'),
(7, 'Jogos de tabuleiro'),
(8, 'Caligrafia'),
(9, 'Programação'),
(10, 'Cozinhar'),
(11, 'Cosplay'),
(12, 'Palavras cruzadas'),
(13, 'Criptografia'),
(14, 'Dança'),
(15, 'Artes digitais'),
(16, 'Faça você mesmo'),
(17, 'Desenho'),
(18, 'Eletrônica'),
(19, 'Jogos (jogos de mesa e role-playing)'),
(20, 'Hidroponia'),
(21, 'Fabricação de jóias'),
(22, 'Quebra-cabeça'),
(23, 'Malabarismo'),
(24, 'Fabricação de facas'),
(25, 'Tricô'),
(26, 'Ouvir música'),
(27, 'Magia'),
(28, 'Metalurgia'),
(29, 'Construção de modelos'),
(30, 'Origami'),
(31, 'Pintura'),
(32, 'Fotografia'),
(33, 'Tocar instrumentos musicais'),
(34, 'Cerâmica'),
(35, 'Enigmas'),
(36, 'Leitura'),
(37, 'Scrapbooking'),
(38, 'Esculpindo'),
(39, 'Costura'),
(40, 'Cantando'),
(41, 'Esboço'),
(42, 'Soapmaking'),
(43, 'Tênis de mesa'),
(44, 'Taxidermia'),
(45, 'Videogames'),
(46, 'Assistir filmes'),
(47, 'Assistir televisão'),
(48, 'Escultura em madeira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `programadores`
--

CREATE TABLE `programadores` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  `linguagem` varchar(255) NOT NULL,
  `github` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `programadores`
--

INSERT INTO `programadores` (`id`, `funcionario_id`, `linguagem`, `github`) VALUES
(1, 5, 'PHP, Javascript, C/C++, Java, Pascal', 'GusAntoniassi'),
(7, 8, 'PHP', 'sebastianbergmann'),
(8, 9, 'PHP', 'phpnut'),
(9, 10, 'PHP', 'markstory');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analistas`
--
ALTER TABLE `analistas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_analistas_funcionarios1_idx` (`funcionario_id`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionarios_hobbies`
--
ALTER TABLE `funcionarios_hobbies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_funcionarios_hobbies_hobbies1_idx` (`hobby_id`),
  ADD KEY `fk_funcionarios_hobbies_funcionarios1_idx` (`funcionario_id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programadores`
--
ALTER TABLE `programadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_programadores_funcionarios_idx` (`funcionario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analistas`
--
ALTER TABLE `analistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `funcionarios_hobbies`
--
ALTER TABLE `funcionarios_hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `programadores`
--
ALTER TABLE `programadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `analistas`
--
ALTER TABLE `analistas`
  ADD CONSTRAINT `fk_analistas_funcionarios1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcionarios_hobbies`
--
ALTER TABLE `funcionarios_hobbies`
  ADD CONSTRAINT `fk_funcionarios_hobbies_funcionarios1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_funcionarios_hobbies_hobbies1` FOREIGN KEY (`hobby_id`) REFERENCES `hobbies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `programadores`
--
ALTER TABLE `programadores`
  ADD CONSTRAINT `fk_programadores_funcionarios` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
