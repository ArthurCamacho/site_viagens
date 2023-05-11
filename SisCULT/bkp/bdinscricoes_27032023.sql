-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Mar-2023 às 14:09
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdinscricoes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcursos`
--

CREATE TABLE `tbcursos` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `nivel` int(11) NOT NULL,
  `faixaetariaminima` int(11) NOT NULL,
  `faixaetariamaxima` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbcursos`
--

INSERT INTO `tbcursos` (`id`, `nome`, `nivel`, `faixaetariaminima`, `faixaetariamaxima`, `status`) VALUES
(1, 'Informática Básica', 1, 6, 90, 1),
(2, 'Violão', 1, 6, 12, 1),
(3, 'Python', 2, 18, 26, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblocais`
--

CREATE TABLE `tblocais` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `endereco` text NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `responsavel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tblocais`
--

INSERT INTO `tblocais` (`id`, `nome`, `endereco`, `telefone`, `responsavel`) VALUES
(3, 'IFSP', '14514\r\nsdfsadf', '179565656', 'Maria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpessoas`
--

CREATE TABLE `tbpessoas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(300) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbpessoas`
--

INSERT INTO `tbpessoas` (`id`, `nome`, `email`, `endereco`, `senha`, `cpf`, `telefone`) VALUES
(1, 'asdf', '1@1.com', 'asdf', '123', 'asf', 'asfddasf'),
(2, 'Luciene', 'asdf', 'asdf', 'asdf', 'saf', 'asdfsdaf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbstatus`
--

CREATE TABLE `tbstatus` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbstatus`
--

INSERT INTO `tbstatus` (`id`, `descricao`) VALUES
(1, 'Ativo'),
(2, 'Cancelado'),
(3, 'Em reformulação'),
(4, 'cadteste'),
(5, 'teste2'),
(8, 'teste5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbturmas`
--

CREATE TABLE `tbturmas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `idLocal` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `datainicio` date NOT NULL,
  `datatermino` date NOT NULL,
  `idprofessor` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `horainicio` time NOT NULL,
  `horatermino` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcursos`
--
ALTER TABLE `tbcursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Curso_Status` (`status`);

--
-- Índices para tabela `tblocais`
--
ALTER TABLE `tblocais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbpessoas`
--
ALTER TABLE `tbpessoas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Unique_Email` (`email`),
  ADD UNIQUE KEY `Unique_CPF` (`cpf`);

--
-- Índices para tabela `tbstatus`
--
ALTER TABLE `tbstatus`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbturmas`
--
ALTER TABLE `tbturmas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CursoTurma` (`idCurso`),
  ADD KEY `FK_ProfessorTurma` (`idprofessor`),
  ADD KEY `FK_LocalTurma` (`idLocal`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcursos`
--
ALTER TABLE `tbcursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tblocais`
--
ALTER TABLE `tblocais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbpessoas`
--
ALTER TABLE `tbpessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbstatus`
--
ALTER TABLE `tbstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbturmas`
--
ALTER TABLE `tbturmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbcursos`
--
ALTER TABLE `tbcursos`
  ADD CONSTRAINT `Curso_Status` FOREIGN KEY (`status`) REFERENCES `tbstatus` (`id`);

--
-- Limitadores para a tabela `tbturmas`
--
ALTER TABLE `tbturmas`
  ADD CONSTRAINT `FK_CursoTurma` FOREIGN KEY (`idCurso`) REFERENCES `tbcursos` (`id`),
  ADD CONSTRAINT `FK_LocalTurma` FOREIGN KEY (`idLocal`) REFERENCES `tblocais` (`id`),
  ADD CONSTRAINT `FK_ProfessorTurma` FOREIGN KEY (`idprofessor`) REFERENCES `tbpessoas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
