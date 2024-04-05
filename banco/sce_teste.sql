-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05/04/2024 às 13:05
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
  `nome` varchar(60) NOT NULL,
  `cnpj_cpf` varchar(50) NOT NULL,
  `inscrição_estadual` varchar(50) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(140) NOT NULL,
  `numero` varchar(140) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `celular` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `nome`, `cnpj_cpf`, `inscrição_estadual`, `endereco`, `email`, `cidade`, `bairro`, `numero`, `cep`, `celular`) VALUES
(1, 'Joãozinho', '123.123.123-09', '0001', 'Rua Gonçalves Dias, quadra 5, casa 50', 'joão@gmail.com', 'Pará', 'centro', '', '', '(99) 99999-9997'),
(2, 'Paulo', '321.321.321-08', '0201', 'Rua Das Dores, quadra 15, casa 32', 'paulo@gmail.com', 'São Paulo', 'Lado Leste', '', '', '(99) 99999-9998'),
(24, 'André Bergê', '321.321.321-07', '0202', 'Maiobão Rua-57 Quadra - 146 Casa- 15', 'andre@gmail.com', 'Paço do Lumiar', 'Novo Horizonte', '15', '65130-000', '(99) 99999-9999'),
(26, 'Filipe', '12.312.312/3121-23', 'asdf', 'Rua C, Quadra 15, Casa 5, Cafeteira, São Luís', 'filipe@gmail.com', 'São Luís', 'Novo Horizonte', '18', '65130000', '(99) 99999-9996'),
(27, 'Bruno', '12.312.312/3123-12', '00012', 'Rua C, Quadra 15, Casa 5, Cafeteira, São Luís', 'bruno@gmail.com', 'São Luís', 'adfb', '12', '65130000', '(65) 46974-5489');

-- --------------------------------------------------------

--
-- Estrutura para tabela `intePV`
--

CREATE TABLE `intePV` (
  `idintePV` int(10) NOT NULL,
  `idprodutos` int(10) NOT NULL,
  `idvendas` int(10) NOT NULL,
  `quantidadeP` float NOT NULL,
  `valorP` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `intePV`
--

INSERT INTO `intePV` (`idintePV`, `idprodutos`, `idvendas`, `quantidadeP`, `valorP`) VALUES
(90, 2, 100, 1, 112),
(91, 2, 101, 1, 30),
(92, 17, 102, 1.5, 20),
(93, 4, 103, 4, 80),
(94, 2, 104, 1, 30.5),
(95, 24, 105, 2, 12.5),
(96, 5, 106, 1, 122),
(97, 6, 106, 1, 150),
(98, 2, 107, 1, 30);

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas`
--

CREATE TABLE `notas` (
  `idnotas` int(50) NOT NULL,
  `idintePV` int(30) NOT NULL,
  `idvendas` int(30) NOT NULL,
  `idclientes` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `unidade_de_medida` varchar(140) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `ncm` varchar(50) DEFAULT NULL,
  `quantidade` float NOT NULL DEFAULT 0,
  `custo` float NOT NULL,
  `preco` float NOT NULL,
  `origem` varchar(140) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `unidade_de_medida`, `descricao`, `ncm`, `quantidade`, `custo`, `preco`, `origem`) VALUES
(1, 'café', 'Kg', 'arabico', '2134562', 93, 8, 10, ''),
(2, 'cubo magico', 'un', '', '', 87, 10, 30, ''),
(4, 'polvo', 'Kg', '', '', 0, 100, 200, ''),
(5, 'gato', 'un', '', '', 6, 0, 50, ''),
(6, 'bola', 'un', '', '', 48, 5, 20, ''),
(17, 'carne', 'Kg', 'de boi', '2', 48.5, 10.5, 20, 'sdfsfdsf'),
(24, 'rosa', 'un', 'pretas', '987585', 48, 2, 20.4, 'dfgdfgsdgs');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) DEFAULT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Usuario Teste', 'teste@teste.com', '$2y$10$ui6uSWt3Jx8xS3b59tn15e5LFf0hzqnaezNbKOv58AP83TtSKGibm');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `idvendas` int(11) NOT NULL,
  `id_clientes` int(11) NOT NULL,
  `dataV` varchar(50) DEFAULT NULL,
  `qtdVenda` float DEFAULT NULL,
  `forma` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`idvendas`, `id_clientes`, `dataV`, `qtdVenda`, `forma`) VALUES
(100, 2, '2024-04-19', 112, 'Dinheiro'),
(101, 24, '2024-04-06', 30, 'Dinheiro'),
(102, 2, '2024-04-04', 30, 'Dinheiro'),
(103, 1, '2024-04-11', 320, 'Dinheiro'),
(104, 1, '2024-04-19', 30.5, 'Dinheiro'),
(105, 26, '2024-04-03', 25, 'Dinheiro'),
(106, 2, '2024-04-13', 272, 'Dinheiro'),
(107, 1, '2024-04-12', 30, 'Dinheiro');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`),
  ADD UNIQUE KEY `nome` (`nome`) USING BTREE;

--
-- Índices de tabela `intePV`
--
ALTER TABLE `intePV`
  ADD PRIMARY KEY (`idintePV`),
  ADD KEY `fk_intePVprodutos` (`idprodutos`),
  ADD KEY `fk_intePVvendas` (`idvendas`);

--
-- Índices de tabela `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idnotas`);

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
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `intePV`
--
ALTER TABLE `intePV`
  MODIFY `idintePV` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de tabela `notas`
--
ALTER TABLE `notas`
  MODIFY `idnotas` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `idvendas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

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
