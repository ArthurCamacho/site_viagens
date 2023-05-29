-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Maio-2023 às 01:40
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `viagens`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes`
--

CREATE TABLE `funcoes` (
  `idFuncao` int(11) NOT NULL,
  `funcao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `funcoes`
--

INSERT INTO `funcoes` (`idFuncao`, `funcao`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'CLIENTE'),
(3, 'GESTOR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lugares`
--

CREATE TABLE `lugares` (
  `idLugar` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `statusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `lugares`
--

INSERT INTO `lugares` (`idLugar`, `nome`, `pais`, `statusId`) VALUES
(1, 'Coliseo', 'Itália2', 1),
(2, 'Torre Eifel', 'França', 1),
(3, 'Fatec Rio Preto', 'Brazil', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `idPessoa` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numeroPredio` varchar(11) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `funcaoId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`idPessoa`, `nome`, `cpf`, `rua`, `numeroPredio`, `cep`, `bairro`, `cidade`, `estado`, `telefone`, `funcaoId`, `statusId`, `senha`) VALUES
(1, 'Arthur', '37269222886', 'A', '1', '15077190', '1', '1', 'SP', '123456789012', 1, 1, 'a'),
(2, 'Katia', '12345678911', 'rua qualquer', '1578', '15478563', 'bairro qualquer', 'cidade qualquer', 'SP', '12345678925', 2, 1, 'b'),
(3, 'Sabrina', '98765432100', 'rua', '123', '12354789', 'bairro', 'cidade', 'SP', '1235887777', 2, 1, 'a'),
(4, 'asd', '12312312312', '123123', '123123', '12312312', '123123', '123123', 'RO', '123123', 2, 1, '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoasviagens`
--

CREATE TABLE `pessoasviagens` (
  `id` int(11) NOT NULL,
  `pessoaId` int(11) NOT NULL,
  `viagemId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pessoasviagens`
--

INSERT INTO `pessoasviagens` (`id`, `pessoaId`, `viagemId`, `statusId`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 1),
(4, 1, 1, 1),
(5, 1, 1, 2),
(6, 1, 1, 2),
(7, 1, 1, 2),
(8, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `idStatus` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`idStatus`, `status`) VALUES
(1, 'ATIVO'),
(2, 'INATIVO'),
(3, 'CANCELADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `viagens`
--

CREATE TABLE `viagens` (
  `idViagem` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `origemId` int(11) NOT NULL,
  `destinoId` int(11) NOT NULL,
  `dataHoraPartida` datetime NOT NULL,
  `dataHoraChegada` datetime NOT NULL,
  `valor` float NOT NULL,
  `statusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `viagens`
--

INSERT INTO `viagens` (`idViagem`, `nome`, `origemId`, `destinoId`, `dataHoraPartida`, `dataHoraChegada`, `valor`, `statusId`) VALUES
(1, 'Para FATEC!!!', 1, 3, '2023-05-08 21:56:00', '2023-05-12 21:56:00', 13.39, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `funcoes`
--
ALTER TABLE `funcoes`
  ADD PRIMARY KEY (`idFuncao`);

--
-- Índices para tabela `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`idLugar`),
  ADD KEY `fk_qualquer_coisa` (`statusId`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`idPessoa`),
  ADD KEY `fk_pessoa_status` (`statusId`),
  ADD KEY `fk_pessoa_funcao` (`funcaoId`);

--
-- Índices para tabela `pessoasviagens`
--
ALTER TABLE `pessoasviagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pessoa` (`pessoaId`),
  ADD KEY `fk_viagem` (`viagemId`),
  ADD KEY `fk_status` (`statusId`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idStatus`);

--
-- Índices para tabela `viagens`
--
ALTER TABLE `viagens`
  ADD PRIMARY KEY (`idViagem`),
  ADD KEY `fk_viagem_origem` (`origemId`),
  ADD KEY `fk_viagem_destino` (`destinoId`),
  ADD KEY `fk_statusmais` (`statusId`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcoes`
--
ALTER TABLE `funcoes`
  MODIFY `idFuncao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `lugares`
--
ALTER TABLE `lugares`
  MODIFY `idLugar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pessoasviagens`
--
ALTER TABLE `pessoasviagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `idStatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `viagens`
--
ALTER TABLE `viagens`
  MODIFY `idViagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `lugares`
--
ALTER TABLE `lugares`
  ADD CONSTRAINT `fk_qualquer_coisa` FOREIGN KEY (`statusId`) REFERENCES `status` (`idStatus`);

--
-- Limitadores para a tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD CONSTRAINT `fk_pessoa_funcao` FOREIGN KEY (`funcaoId`) REFERENCES `funcoes` (`idFuncao`),
  ADD CONSTRAINT `fk_pessoa_status` FOREIGN KEY (`statusId`) REFERENCES `status` (`idStatus`);

--
-- Limitadores para a tabela `pessoasviagens`
--
ALTER TABLE `pessoasviagens`
  ADD CONSTRAINT `fk_pessoa` FOREIGN KEY (`pessoaId`) REFERENCES `pessoas` (`idPessoa`),
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`statusId`) REFERENCES `status` (`idStatus`),
  ADD CONSTRAINT `fk_viagem` FOREIGN KEY (`viagemId`) REFERENCES `viagens` (`idViagem`);

--
-- Limitadores para a tabela `viagens`
--
ALTER TABLE `viagens`
  ADD CONSTRAINT `fk_destino` FOREIGN KEY (`destinoId`) REFERENCES `lugares` (`idLugar`),
  ADD CONSTRAINT `fk_origem` FOREIGN KEY (`origemId`) REFERENCES `lugares` (`idLugar`),
  ADD CONSTRAINT `fk_statusmais` FOREIGN KEY (`statusId`) REFERENCES `status` (`idStatus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
