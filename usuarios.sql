-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/10/2024 às 23:13
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
-- Banco de dados: `clientes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(3, 'lincon@gmail.com', '$2y$10$I/ErccGJ9.yH6lQJOhUFUuscuCcgfN2qU827tnBKeb2Z74v5Z.Xye'),
(4, 'ceunspitu@gmail.com', '$2y$10$mecwiZqNmFdlr1mZyrYbAOiB4qlI/qAR2iUO9p9VIzt/9szZVkHGO'),
(5, 'postoourofino@delta.com', '$2y$10$WELk6XbrU5A/DXrQAjf54.82LSWfN9BnZNAigdIds.T2EEBFFIdFK'),
(6, 'lucas@lucas.com', '$2y$10$SBYv7kmYQgqOo.MwwVRB4uKXaiNaHVePK3F98XnJsnaG4TSZqY2yO'),
(7, 'jonatan@jonatan.com', '$2y$10$RCbjd.t0MWox/s3KoWnwxOmVfGooXoEMUkgkws1p0Xu7qpCNsj3My'),
(8, 'lerdo@lerdo.com', '$2y$10$5KbxBT7x/PAdBHKYNx2h/euJfSLiLqVj3Bp.WkD9qDBJyCjMo/fae'),
(9, 'teste@teste.com', '$2y$10$eV/sIuEmAD1WtWUbdhqIB.rA8JZRTYd51Ux7vkmNfZWnYsdKp5xiy'),
(10, 'teste1@teste1.com', '$2y$10$8d4vm1CaRtU6fus9nWyNeuUV3dA1qkqy5JwirbTheNTO.wn/WK8HC'),
(11, 'teste2@teste2.com', '$2y$10$YeDRkszUsCi3Rl9sbtARJegEG0mnmBmE2L3wMkBhXLVmB7uN0xoXu'),
(12, 'teste3@teste3.com', '$2y$10$QFNe4Y8LQGwWiHk2n7kDhuAie1ji00CAKTfIMWk00yDC4qVQRpFt.');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
