-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/06/2025 às 19:59
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
-- Banco de dados: `test`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `sigla` varchar(20) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `sigla`, `descricao`) VALUES
(1, 'HIG', 'Higiene Pessoal'),
(2, 'LMP', 'Limpeza Doméstica'),
(3, 'ANP', 'Alimentos Não Perecíveis'),
(4, 'BEB', 'Bebidas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `cod_barras` varchar(100) NOT NULL,
  `prateleira` varchar(100) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `codigo`, `descricao`, `cod_barras`, `prateleira`, `id_categoria`) VALUES
(1, 'HP001', 'Shampoo Anticaspa 300ml', '7891234567891', 'A1', 1),
(2, 'HP002', 'Sabonete Líquido Erva Doce', '7891234567892', 'A1', 1),
(3, 'HP003', 'Creme Dental Menta Fresh', '7891234567893', 'A2', 1),
(4, 'HP004', 'Desodorante Aerosol 48h', '7891234567894', 'A2', 1),
(5, 'HP005', 'Fio Dental 50m', '7891234567895', 'A3', 1),
(6, 'LD001', 'Detergente Neutro 500ml', '7892345678901', 'B1', 2),
(7, 'LD002', 'Água Sanitária 2L', '7892345678902', 'B2', 2),
(8, 'LD003', 'Lava Roupas em Pó 1kg', '7892345678903', 'B1', 2),
(9, 'LD004', 'Amaciante Concentrado 1L', '7892345678904', 'B2', 2),
(10, 'LD005', 'Esponja Multiuso Pacote c/ 4', '7892345678905', 'B3', 2),
(11, 'ANP001', 'Arroz Agulhinha Tipo 1 5kg', '7893456789012', 'C1', 3),
(12, 'ANP002', 'Feijão Carioca 1kg', '7893456789013', 'C1', 3),
(13, 'ANP003', 'Macarrão Espaguete 500g', '7893456789014', 'C2', 3),
(14, 'ANP004', 'Óleo de Soja 900ml', '7893456789015', 'C3', 3),
(15, 'ANP005', 'Molho de Tomate Tradicional', '7893456789016', 'C2', 3),
(16, 'BEB001', 'Refrigerante Cola 2L', '7894567890123', 'D1', 4),
(17, 'BEB002', 'Suco de Laranja Integral 1L', '7894567890124', 'D2', 4),
(18, 'BEB003', 'Água Mineral sem Gás 1,5L', '7894567890125', 'D1', 4),
(19, 'BEB004', 'Cerveja Pilsen Lata 350ml', '7894567890126', 'D3', 4),
(20, 'BEB005', 'Chá Mate Gelado 1L', '7894567890127', 'D2', 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `fk_produto_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
