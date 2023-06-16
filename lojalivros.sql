-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Maio-2023 às 01:49
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lojalivros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `Edereco` varchar(200) NOT NULL,
  `Telefone` varchar(13) NOT NULL,
  `Email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`ID`, `Nome`, `Edereco`, `Telefone`, `Email`) VALUES
(1, 'Joao Silva', 'Rua A 123 - Sao Paulo', '1111111111', 'joao.silva@gmail.com'),
(2, 'Maria Santos', 'Rua B 456 - Rio de Janeiro', '2122222222', 'maria.santos@yahoo.com'),
(3, 'Jose Silva', 'Av. C 789 - Belo Horizonte', '3133333333', 'jose.silva@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itenspedido`
--

CREATE TABLE `itenspedido` (
  `ID` int(11) NOT NULL,
  `Pedido_ID` int(11) NOT NULL,
  `Produto` varchar(200) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `PrecoUnitario` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itenspedido`
--

INSERT INTO `itenspedido` (`ID`, `Pedido_ID`, `Produto`, `Quantidade`, `PrecoUnitario`) VALUES
(1, 1, 'Livro A', 2, '50'),
(2, 1, 'Livro B', 1, '25'),
(3, 2, 'Livro C', 3, '50'),
(4, 3, 'Livro A', 1, '50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livrarias`
--

CREATE TABLE `livrarias` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `Endereco` varchar(200) NOT NULL,
  `Telefone` varchar(13) NOT NULL,
  `Site` varchar(500) NOT NULL,
  `Logo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livrarias`
--

INSERT INTO `livrarias` (`ID`, `Nome`, `Endereco`, `Telefone`, `Site`, `Logo`) VALUES
(1, ' Livraria Cultura', '	Av. Paulista 2073 - Cerqueira Cesar Sao Paulo - SP', '1131704036', 'https://www3.livrariacultura.com.br/', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSe2PemLot1i6hzDR9rjFOrYgMRAqm1k5GOQ&usqp=CAU'),
(2, 'Livraria da Vila', 'R. Fradique Coutinho 915 - Pinheiros Sao Paulo - SP', '1138145811', 'https://www.livrariadavila.com.br', 'https://th.bing.com/th/id/OIP.c43Wcpqm3ihlCMMKzxJ1EAHaFh?w=229&h=180&c=7&r=0&o=5&pid=1.7'),
(3, 'Livraria Saraiva', 'Shopping Morumbi - Av. Roque Petroni Junior 1089 Sao Paulo - SP', '1151818799', 'https://www.saraiva.com.br', 'https://th.bing.com/th/id/OIP.UnAFS_Cf1F7P7xvmFLKc8gAAAA?w=190&h=106&c=7&r=0&o=5&pid=1.7'),
(4, 'Livraria Travessa', 'R. dos Andradas 858 - Centro Histórico de Porto Alegre Porto Alegre - RS', '5132271265', 'https://www.travessa.com.br', 'https://th.bing.com/th/id/OIP.pkylhtWeTqYpLQvpMa8hvQHaEc?w=294&h=180&c=7&r=0&o=5&pid=1.7'),
(5, 'Livraria da Folha', 'Alameda Santos 1470 - Jardim Paulista Sao Paulo - SP', '1137283100', 'http://polls.folha.com.br/poll/livraria/', 'https://th.bing.com/th?id=OIP.EmNH5mX2lhHBWEG-V0KW4gAAAA&w=250&h=250&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `ID` int(11) NOT NULL,
  `Cliente_ID` int(11) NOT NULL,
  `DataPedido` date NOT NULL,
  `ValorTotal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`ID`, `Cliente_ID`, `DataPedido`, `ValorTotal`) VALUES
(1, 1, '2023-02-01', '150'),
(2, 2, '2023-02-02', '250'),
(3, 1, '2023-02-03', '100');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `itenspedido`
--
ALTER TABLE `itenspedido`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `livrarias`
--
ALTER TABLE `livrarias`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `itenspedido`
--
ALTER TABLE `itenspedido`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `livrarias`
--
ALTER TABLE `livrarias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
