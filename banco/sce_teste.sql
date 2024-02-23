-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 23/02/2024 às 10:14
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sce_teste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_clientes` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cnpj_cpf` varchar(50) NOT NULL,
  `inscrição_estadual` varchar(50) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(140) NOT NULL,
  `numero` varchar(140) NOT NULL,
  `cep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `nome`, `cnpj_cpf`, `inscrição_estadual`, `endereco`, `email`, `cidade`, `bairro`, `numero`, `cep`) VALUES
(1, 'Joãozinho', '123.123.123-09', '0001', 'Rua Gonçalves Dias, quadra 5, casa 50', 'joão@gmail.com', 'Pará', '', '', ''),
(2, 'Paulo', '321.321.321-08', '0201', 'Rua Das Dores, quadra 15, casa 32', 'paulo@gmail.com', 'São Paulo', '', '', ''),
(3, 'adsf', 'asadf', 'asdf', 'asdf', 'asdfg', 'asdf', 'asdfsd', 'asdf', 'asdf'),
(4, 'bdf', 'werferf', 'adg', 'dfvsed', 'zdsrgerg', 'sdfgre', 'adfb', 'vdfs', 'vsdfg'),
(24, 'ANDRE BERGE', 'werferf', 'asdf', 'Rua C, Quadra 15, Casa 5, Cafeteira, São Luís', 'andrezinhogame15@gmail.com', 'São Luís', 'NOVO HORIZONTE', '15', '65130000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `intePV`
--

CREATE TABLE `intePV` (
  `idintePV` int(10) NOT NULL,
  `idprodutos` int(10) NOT NULL,
  `idvendas` int(10) NOT NULL,
  `quantidadeP` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `intePV`
--

INSERT INTO `intePV` (`idintePV`, `idprodutos`, `idvendas`, `quantidadeP`) VALUES
(29, 5, 51, '1'),
(30, 1, 52, '1'),
(31, 6, 52, '1'),
(32, 2, 53, '2'),
(33, 7, 53, '1'),
(34, 4, 54, '2'),
(35, 2, 55, '2'),
(36, 1, 55, '1'),
(37, 5, 55, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `unidade_de_medida` varchar(140) DEFAULT 'un',
  `descricao` varchar(50) DEFAULT NULL,
  `ncm` varchar(50) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `custo` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `origem` varchar(140) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `unidade_de_medida`, `descricao`, `ncm`, `quantidade`, `custo`, `preco`, `origem`) VALUES
(1, 'café', 'un', '', '', 100, 8, 10, ''),
(2, 'cubo magico', 'un', NULL, NULL, 100, 10, 30, NULL),
(3, 'globo', 'un', '', '', 200, 25, 50, ''),
(4, 'polvo', 'un', '', '', 20, 100, 200, ''),
(5, 'gato', 'un', '', '', 10, 0, 50, ''),
(6, 'bola', 'un', '', '', 50, 5, 20, ''),
(7, 'papel', 'un', 'A4', '', 50, 11, 15, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) DEFAULT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Usuario Teste', 'teste@teste.com', 'teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `idvendas` int(11) NOT NULL,
  `id_clientes` int(11) NOT NULL,
  `dataV` varchar(50) DEFAULT NULL,
  `qtdVenda` varchar(50) DEFAULT NULL,
  `forma` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`idvendas`, `id_clientes`, `dataV`, `qtdVenda`, `forma`) VALUES
(51, 1, '2024-02-23', '50', 'dim'),
(52, 2, '2024-02-23', '30', 'dim'),
(53, 24, '2024-02-23', '85', 'dim'),
(54, 1, '2024-02-24', '100', 'dinheiro'),
(55, 24, '2024-02-25', '120', 'dinheiro');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`);

--
-- Índices de tabela `intePV`
--
ALTER TABLE `intePV`
  ADD PRIMARY KEY (`idintePV`),
  ADD KEY `fk_intePVprodutos` (`idprodutos`),
  ADD KEY `fk_intePVvendas` (`idvendas`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`idvendas`),
  ADD KEY `fk_vendasclientes` (`id_clientes`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `intePV`
--
ALTER TABLE `intePV`
  MODIFY `idintePV` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `idvendas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `intePV`
--
ALTER TABLE `intePV`
  ADD CONSTRAINT `fk_intePVprodutos` FOREIGN KEY (`idprodutos`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `fk_intePVvendas` FOREIGN KEY (`idvendas`) REFERENCES `vendas` (`idvendas`);

--
-- Restrições para tabelas `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendasclientes` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id_clientes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
