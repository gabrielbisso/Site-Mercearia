-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jul-2021 às 23:12
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mercefrut`
--
CREATE DATABASE IF NOT EXISTS `mercefrut` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `mercefrut`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_adm` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id_adm`, `nome`, `email`, `senha`) VALUES
(1, 'Gustavo', 'gustavo1701@gmail.com', 'gustavo1701'),
(2, 'Claudia', 'claudia1408@gmail.com', 'claudia14'),
(3, 'Gabriel', 'gabriel0311@gmail.com', 'gabriel0311');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome`) VALUES
(1, 'Frutas'),
(2, 'Verduras'),
(3, 'Legumes'),
(4, 'Carnes'),
(5, 'Cereais'),
(6, 'Frios'),
(7, 'Bebidas'),
(8, 'Pães'),
(9, 'Laticinios'),
(10, 'Produtos de Limpeza');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` float NOT NULL,
  `data` date NOT NULL,
  `forma_pag` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id_compra`, `id_usuario`, `total`, `data`, `forma_pag`, `status`) VALUES
(1, 1, 8.4, '2021-07-14', 'Dinheiro ', 'Vendido '),
(2, 2, 22, '2021-07-15', 'Cartão', 'Vendido'),
(3, 3, 10, '2021-07-20', 'Dinheiro', 'Vendido'),
(4, 4, 10, '2021-07-19', 'Cartão', 'Vendido'),
(5, 5, 135, '2021-07-16', 'Dinheiro', 'Vendido'),
(6, 6, 3000, '2021-07-18', 'Cartão', 'Vendido'),
(7, 7, 4, '2021-07-19', 'Dinheiro', 'Vendido'),
(8, 8, 11.5, '2021-07-16', 'Dinheiro', 'Vendido'),
(9, 9, 15, '2021-07-12', 'Cartão', 'Vendido'),
(10, 10, 40, '2021-07-12', 'Cartão', 'Vendido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra_produto`
--

CREATE TABLE `compra_produto` (
  `id_compra_produto` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `preco` float NOT NULL,
  `quantidade_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Extraindo dados da tabela `compra_produto`
--

INSERT INTO `compra_produto` (`id_compra_produto`, `id_produto`, `id_compra`, `preco`, `quantidade_prod`) VALUES
(1, 10, 1, 2.8, 3),
(2, 7, 2, 5.5, 4),
(3, 3, 3, 1, 10),
(4, 5, 4, 5, 2),
(5, 4, 5, 45, 3),
(6, 6, 6, 30, 10),
(7, 9, 7, 4, 1),
(8, 8, 8, 11.5, 5),
(9, 2, 9, 15, 12),
(10, 1, 10, 40, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `preco` float NOT NULL,
  `quantidade` int(11) NOT NULL,
  `fornecedor` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagem` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `id_categoria`, `nome`, `preco`, `quantidade`, `fornecedor`, `imagem`, `descricao`) VALUES
(1, 2, 'Brócolis', 2.5, 50, 'Verduras Nação', 'brócolis50.jpg', 'Caixa com 50 cachos de Brócolis, fornecidos pela Verduras Nação.'),
(2, 1, 'Maçã', 1.25, 30, 'FrutiCenter', 'maca.jpg', 'Caixa com 30 maçãs, fornecidas pela FrutiCenter.'),
(3, 3, 'Pimentão', 1, 50, 'LeguBom', 'pimentao.jpg', 'Caixa com 50 pimentões, fornecidos pela LeguBom.'),
(4, 4, 'Peito de Frango ', 45, 20, 'FrangoCocoro', 'peitodefrango.jpg', '20 peitos de frango de 1KG, fornecidos por FrangoCocoro.'),
(5, 5, 'Feijão', 5, 60, 'Feijaodao', 'feijao.jpg', '60 sacos de feijão de 1KG, fornecidos pela Feijaodao.'),
(6, 6, 'Queijo', 30, 50, 'Fazenda bom fim', 'queijo.jpg', '50 pacotes de queijos de 500g, fornecidos pela Fazenda bom fim.'),
(7, 7, 'Coca-Cola', 5.5, 100, 'Empresa Coca-Cola', 'coca.jpg', '100 garrafas de coca-cola de 1l, fornecidas pOR Empresa Coca-Cola.'),
(8, 8, 'Bolacha', 2.3, 50, 'Pãoarte', 'bolacha.jpg', '50 sacos de bolacha fechados com 1kg, fornecidos por Pãoarte.'),
(9, 9, 'Leite ', 4, 200, 'Latvida', 'leite.jpg', '200 caixas de leite, fornecidas por Latvida.'),
(10, 10, 'Detergente', 2.8, 30, 'Limpabem', 'detergente.jpg', '30 garrafas de detergente de 500ml, fornecidos pos Limpabem.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `endereco` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cpf` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `endereco`, `cpf`, `senha`, `email`) VALUES
(1, 'Alici ', 'Rua Danubio Vasques ', '19826534576', 'alici01', 'alici03@gmail.com'),
(2, 'Dominique ', 'Rua Brigadeiro Luciano', '23865389654', 'domi02', 'domi02@gmail.com'),
(3, 'Geovana', 'Rua Marcio Pinheiro', '23876439123', 'geovana03', 'geovana03@gmail.com'),
(4, 'Maria Luiza', 'Rua Salustiano Marques', '37639727619', 'malu04', 'malu04@gmail.com'),
(5, 'Manuela', 'Rua Pinheiro Platamo', '24598346123', 'manu05', 'manu05@gmail.com'),
(6, 'Fernanda', 'Rua Lidiano Moreira', '47548329876', 'nanda06', 'nanda06@gmail.com'),
(7, 'Veronica', 'Rua 24 de Novembro', '74382345987', 'vero07', 'vero07@gmail.com'),
(8, 'Felipe', 'Rua Vasco Nadino', '34583423487', 'felipe08', 'felipe08@gmail.com'),
(9, 'Guilherme', 'Rua Francisco Alves', '87639287362', 'gui09', 'gui09@gmail.com'),
(10, 'Augusto', 'Rua Rivadavia Roda', '34563728123', 'guto10', 'guto10@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_adm`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `compra_produto`
--
ALTER TABLE `compra_produto`
  ADD PRIMARY KEY (`id_compra_produto`,`id_produto`,`id_compra`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_compra` (`id_compra`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `compra_produto`
--
ALTER TABLE `compra_produto`
  MODIFY `id_compra_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `compra_produto`
--
ALTER TABLE `compra_produto`
  ADD CONSTRAINT `compra_produto_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `compra_produto_ibfk_2` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id_compra`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
