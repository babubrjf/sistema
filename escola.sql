-- Criar o banco de dados
CREATE DATABASE escola;

-- Usar o banco de dados criado
USE escola;

CREATE TABLE `atividades` (
  `codigo` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `turma_codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`codigo`, `descricao`, `turma_codigo`) VALUES
(1, 'UC1 - TURMA1', 1),
(2, 'UC2 - TURMA1', 1),
(3, 'UC3 - TURMA1', 1),
(4, 'UC1 - TURMA2', 2),
(5, 'UC2 - TURMA2', 2),
(6, 'UC3 - TURMA2', 2),
(8, 'UC1 - TURMA3', 3),
(10, 'UC2 - TURMA3', 3),
(11, 'UC3 - TURMA3', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`codigo`, `nome`) VALUES
(1, 'HT-SIS-MANHA'),
(2, 'HT-SDT-TARDE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`codigo`, `nome`, `email`, `senha`, `tipo`) VALUES
(1, 'Administrador', 'admin@master.com', 'admin', 'adm'),
(2, 'Allysson Freitas', 'allysson@escola.com', '123', 'prof'),
(3, 'Chico Anísio', 'chico@escola.com', '321', 'prof');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `codigo` int(11) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `professor_codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`codigo`, `curso`, `nome`, `professor_codigo`) VALUES
(1, 'HT-SIS-MANHA', 'TESTES DE SISTEMAS', 2),
(2, 'HT-SIS-MANHA', 'MANUTENÇÃO DE SISTEMAS', 2),
(3, 'HT-SIS-MANHA', 'DESENVOLVIMENTO DE SISTEMAS', 2),
(7, 'HT-SDT-TARDE', 'INTERNET DAS COISAS', 3),
(8, 'HT-SDT-TARDE', 'CIRCUITOS ELÉTRICOS', 3),
(15, '', 'teste', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `turma_codigo` (`turma_codigo`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `professor_codigo` (`professor_codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atividades`
--
ALTER TABLE `atividades`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atividades`
--
ALTER TABLE `atividades`
  ADD CONSTRAINT `atividades_ibfk_1` FOREIGN KEY (`turma_codigo`) REFERENCES `turmas` (`codigo`);

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`professor_codigo`) REFERENCES `professores` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
