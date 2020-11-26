-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 25/11/2020 às 22:15
-- Versão do servidor: 8.0.22-0ubuntu0.20.04.2
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `consultorio`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `horarios`
--

CREATE TABLE `horarios` (
  `id` int NOT NULL,
  `id_medico` int NOT NULL,
  `data_horario` datetime NOT NULL,
  `horario_agendado` tinyint NOT NULL DEFAULT '0',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `horarios`
--

INSERT INTO `horarios` (`id`, `id_medico`, `data_horario`, `horario_agendado`, `data_criacao`, `data_alteracao`) VALUES
(1, 1, '2020-11-24 15:18:36', 0, '2020-11-19 18:19:38', '2020-11-19 18:19:38'),
(6, 2, '2020-11-27 18:30:00', 0, '2020-11-23 18:25:09', '2020-11-23 18:25:09'),
(8, 2, '2020-11-26 15:25:36', 1, '2020-11-23 18:25:58', '2020-11-26 01:01:28'),
(10, 2, '2020-11-28 08:00:00', 0, '2020-11-25 22:59:54', '2020-11-25 22:59:54'),
(14, 2, '2020-11-30 10:10:00', 0, '2020-11-25 23:06:06', '2020-11-25 23:06:06'),
(15, 1, '2020-11-30 11:00:00', 1, '2020-11-25 23:06:58', '2020-11-26 01:03:01'),
(16, 1, '2020-11-26 03:00:00', 0, '2020-11-26 01:14:14', '2020-11-26 01:14:14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicos`
--

CREATE TABLE `medicos` (
  `id` int NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `senha` text NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `medicos`
--

INSERT INTO `medicos` (`id`, `email`, `nome`, `senha`, `data_criacao`, `data_alteracao`) VALUES
(1, 'banana@gmail.com', 'Dr. Luan Hartwig Peil', '$2y$10$MHYCUhfiFKR1x170K9igCOMfbx2QNokcGXToMGzINwyw6sGD1x8f2', '2020-11-19 18:17:40', '2020-11-24 21:45:50'),
(2, 'felipelealdamasceno@gmail.com', 'Dr. Felipe Leal Damasceno', '$2y$10$hE1L9nEG9lQGknvHSfhXguw1ibqIHVYRFC7lNJrTzz.JH/.L55FtO', '2020-11-23 16:44:15', '2020-11-24 22:10:01');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medico_data_horario` (`id_medico`,`data_horario`);

--
-- Índices de tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `medico_horario` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
