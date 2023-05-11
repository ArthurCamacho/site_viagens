-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Abr-2023 às 15:58
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

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirDependente` (`idResp` INT, `nomeDependente` VARCHAR(100), `emailDependente` VARCHAR(100), `cpfDependente` VARCHAR(14), `telefoneDependente` VARCHAR(14))   BEGIN

       insert into tbpessoas (nome,email, cpf, telefone) values (nomeDependente,emailDependente,cpfDependente,telefoneDependente);
       insert into tbpedentes (idPessoaResponsavel,idPessoaDependente) values (idResp,LAST_INSERT_ID());
       COMMIT;

 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirDependente2` (`idResp` INT, `nomeDependente` VARCHAR(100), `emailDependente` VARCHAR(100), `cpfDependente` VARCHAR(14), `telefoneDependente` VARCHAR(14))   BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
        BEGIN
            ROLLBACK;
            RESIGNAL;
        END;

    START TRANSACTION;
       insert into tbpessoas (nome,email, cpf, telefone) values (nomeDependente,emailDependente,cpfDependente,telefoneDependente);
       insert into tbpedentes (idPessoaResponsavel,idPessoaDependente) values (idResp,LAST_INSERT_ID());
       
    COMMIT WORK;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirDependente3` (`idResp` INT, `nomeDependente` VARCHAR(100), `emailDependente` VARCHAR(100), `cpfDependente` VARCHAR(14), `telefoneDependente` VARCHAR(14))   BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
        BEGIN
            ROLLBACK;
            RESIGNAL;
        END;

    START TRANSACTION;
       insert into tbpessoas (nome,email, cpf, telefone,idFuncao) values (nomeDependente,emailDependente,cpfDependente,telefoneDependente,2);
       insert into tbpedentes (idPessoaResponsavel,idPessoaDependente) values (idResp,LAST_INSERT_ID());
       
    COMMIT WORK;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirDependente4` (`idResp` INT, `nomeDependente` VARCHAR(100), `emailDependente` VARCHAR(100), `cpfDependente` VARCHAR(14), `telefoneDependente` VARCHAR(14))   BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
        BEGIN
            ROLLBACK;
            RESIGNAL;
        END;

    START TRANSACTION;
       insert into tbpessoas (nome,email, cpf, telefone,idFuncao,idStatus) values (nomeDependente,emailDependente,cpfDependente,telefoneDependente,2,1);
       insert into tbpedentes (idPessoaResponsavel,idPessoaDependente) values (idResp,LAST_INSERT_ID());
       
    COMMIT WORK;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirDependente5` (`idResp` INT, `nomeDependente` VARCHAR(100), `emailDependente` VARCHAR(100), `cpfDependente` VARCHAR(14), `telefoneDependente` VARCHAR(14))   BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
        BEGIN
            ROLLBACK;
            RESIGNAL;
        END;

    START TRANSACTION;
       insert into tbpessoas (nome,email, cpf, telefone,idFuncao,idStatus) values (nomeDependente,emailDependente,cpfDependente,telefoneDependente,2,1);
       insert into tbdependentes (idPessoaResponsavel,idPessoaDependente) values (idResp,LAST_INSERT_ID());
       
    COMMIT WORK;
END$$

DELIMITER ;

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
  `status` int(11) NOT NULL,
  `idCoordenador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbcursos`
--

INSERT INTO `tbcursos` (`id`, `nome`, `nivel`, `faixaetariaminima`, `faixaetariamaxima`, `status`, `idCoordenador`) VALUES
(4, 'Web 1 básico', 11, 8, 60, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbdependentes`
--

CREATE TABLE `tbdependentes` (
  `idPessoaResponsavel` int(11) NOT NULL,
  `idPessoaDependente` int(11) NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbdependentes`
--

INSERT INTO `tbdependentes` (`idPessoaResponsavel`, `idPessoaDependente`, `datahora`) VALUES
(3, 15, '0000-00-00 00:00:00'),
(3, 18, '2023-04-17 13:26:57'),
(10, 14, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfuncoes`
--

CREATE TABLE `tbfuncoes` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbfuncoes`
--

INSERT INTO `tbfuncoes` (`id`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Dependente'),
(3, 'Professor'),
(4, 'Coordenador'),
(5, 'Usuário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbiniscricoes`
--

CREATE TABLE `tbiniscricoes` (
  `id` int(11) NOT NULL,
  `idPessoa` int(11) NOT NULL,
  `idTurma` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `dataHoraInscricao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblocais`
--

CREATE TABLE `tblocais` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `endereco` text NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `responsavel` varchar(100) NOT NULL,
  `idCoordenador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tblocais`
--

INSERT INTO `tblocais` (`id`, `nome`, `endereco`, `telefone`, `responsavel`, `idCoordenador`) VALUES
(4, 'FATEC', 'WERTW BW ETWRE WTER TRWET EWRT EWRT ERT', '1732191433', 'Sérgio Borges ASDFAF', 3);

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
  `telefone` varchar(14) NOT NULL,
  `idFuncao` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbpessoas`
--

INSERT INTO `tbpessoas` (`id`, `nome`, `email`, `endereco`, `senha`, `cpf`, `telefone`, `idFuncao`, `idStatus`) VALUES
(3, 'Administrador2', '1@1.com', 'rawrar', '1', '111', '23423432424', 1, 1),
(6, 'Dependente', '2@2.com', '', '1', '222', '', 2, 1),
(7, 'Professor teste 3', '3@3.com', 'aset 3252345 ', '1123', '33332424234', '124234234', 3, 1),
(8, 'Coordenador', '4@4.com', '', '1', '444', '', 4, 1),
(9, 'Usuário Comum', '5@5.com', 'asfsafsdaf', '1', '555', '12434124123', 5, 2),
(10, 'Teste pessoa', 'p@p.com', 'Rua X', '1', '666', '666 666', 1, 1),
(14, 'dependente1', 'email@1010.com', '', '', '1010101', '(14)1010101', 2, 1),
(15, 'dependente2', 'email2@email.com', '', '', '223232323', '23232323', 2, 1),
(18, 'dependente27567', 'email24655@email.com', '', '', '223232324', '23232323', 2, 1);

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
(2, 'Inativo'),
(3, 'Em reformulação'),
(4, 'cadteste 124332'),
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
  `horatermino` time NOT NULL,
  `vagas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbturmas`
--

INSERT INTO `tbturmas` (`id`, `descricao`, `idCurso`, `idLocal`, `ano`, `semestre`, `datainicio`, `datatermino`, `idprofessor`, `status`, `horainicio`, `horatermino`, `vagas`) VALUES
(8, 'Turma Web 2023.1', 4, 4, 2023, 1, '2023-04-01', '2023-07-12', 8, 1, '00:00:00', '00:00:00', 50);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcursos`
--
ALTER TABLE `tbcursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Curso_Status` (`status`),
  ADD KEY `Curso_Coordenador` (`idCoordenador`);

--
-- Índices para tabela `tbdependentes`
--
ALTER TABLE `tbdependentes`
  ADD UNIQUE KEY `Unique_ResponsavelDependente` (`idPessoaResponsavel`,`idPessoaDependente`),
  ADD KEY `FK_PessoaDependente` (`idPessoaDependente`);

--
-- Índices para tabela `tbfuncoes`
--
ALTER TABLE `tbfuncoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbiniscricoes`
--
ALTER TABLE `tbiniscricoes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Unique_PessoaTurma` (`idPessoa`,`idTurma`),
  ADD KEY `FK_TurmaInscricao` (`idTurma`),
  ADD KEY `FK_StatusInscricao` (`idStatus`);

--
-- Índices para tabela `tblocais`
--
ALTER TABLE `tblocais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Local_Coordenador` (`idCoordenador`);

--
-- Índices para tabela `tbpessoas`
--
ALTER TABLE `tbpessoas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Unique_Email` (`email`),
  ADD UNIQUE KEY `Unique_CPF` (`cpf`),
  ADD KEY `Funcao_Usuario` (`idFuncao`),
  ADD KEY `Status_Pessoa` (`idStatus`);

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
  ADD KEY `FK_LocalTurma` (`idLocal`),
  ADD KEY `FK_StatusTurma` (`status`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcursos`
--
ALTER TABLE `tbcursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbfuncoes`
--
ALTER TABLE `tbfuncoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbiniscricoes`
--
ALTER TABLE `tbiniscricoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblocais`
--
ALTER TABLE `tblocais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbpessoas`
--
ALTER TABLE `tbpessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tbstatus`
--
ALTER TABLE `tbstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbturmas`
--
ALTER TABLE `tbturmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbcursos`
--
ALTER TABLE `tbcursos`
  ADD CONSTRAINT `Curso_Coordenador` FOREIGN KEY (`idCoordenador`) REFERENCES `tbpessoas` (`id`),
  ADD CONSTRAINT `Curso_Status` FOREIGN KEY (`status`) REFERENCES `tbstatus` (`id`);

--
-- Limitadores para a tabela `tbdependentes`
--
ALTER TABLE `tbdependentes`
  ADD CONSTRAINT `FK_PessoaDependente` FOREIGN KEY (`idPessoaDependente`) REFERENCES `tbpessoas` (`id`),
  ADD CONSTRAINT `FK_PessoaResponsavel` FOREIGN KEY (`idPessoaResponsavel`) REFERENCES `tbpessoas` (`id`);

--
-- Limitadores para a tabela `tbiniscricoes`
--
ALTER TABLE `tbiniscricoes`
  ADD CONSTRAINT `FK_PessoaInscricao` FOREIGN KEY (`idPessoa`) REFERENCES `tbpessoas` (`id`),
  ADD CONSTRAINT `FK_StatusInscricao` FOREIGN KEY (`idStatus`) REFERENCES `tbstatus` (`id`),
  ADD CONSTRAINT `FK_TurmaInscricao` FOREIGN KEY (`idTurma`) REFERENCES `tbturmas` (`id`);

--
-- Limitadores para a tabela `tblocais`
--
ALTER TABLE `tblocais`
  ADD CONSTRAINT `Local_Coordenador` FOREIGN KEY (`idCoordenador`) REFERENCES `tbpessoas` (`id`);

--
-- Limitadores para a tabela `tbpessoas`
--
ALTER TABLE `tbpessoas`
  ADD CONSTRAINT `Funcao_Usuario` FOREIGN KEY (`idFuncao`) REFERENCES `tbfuncoes` (`id`),
  ADD CONSTRAINT `Status_Pessoa` FOREIGN KEY (`idStatus`) REFERENCES `tbstatus` (`id`);

--
-- Limitadores para a tabela `tbturmas`
--
ALTER TABLE `tbturmas`
  ADD CONSTRAINT `FK_CursoTurma` FOREIGN KEY (`idCurso`) REFERENCES `tbcursos` (`id`),
  ADD CONSTRAINT `FK_LocalTurma` FOREIGN KEY (`idLocal`) REFERENCES `tblocais` (`id`),
  ADD CONSTRAINT `FK_ProfessorTurma` FOREIGN KEY (`idprofessor`) REFERENCES `tbpessoas` (`id`),
  ADD CONSTRAINT `FK_StatusTurma` FOREIGN KEY (`status`) REFERENCES `tbstatus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
