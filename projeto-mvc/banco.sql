-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/04/2024 às 22:33
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;

--
-- Banco de dados: `carshop`
--

-- --------------------------------------------------------
create database carshop;

USE carshop;
--
-- Estrutura para tabela `manutencao`
--

CREATE TABLE `manutencao` (
    `idManutencao` int(11) NOT NULL, `idveiculo` int(11) NOT NULL, `tipo` varchar(100) DEFAULT NULL, `data` date DEFAULT NULL, `descricao` text DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `marcas`
--

CREATE TABLE `marcas` (
    `idmarca` int(11) NOT NULL, `marca` varchar(100) NOT NULL, `pais` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Despejando dados para a tabela `marcas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `proprietario`
--

CREATE TABLE `proprietario` (
    `idproprietario` int(11) NOT NULL, `nome` varchar(100) DEFAULT NULL, `endereco` varchar(200) DEFAULT NULL, `telefone` varchar(20) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Despejando dados para a tabela `proprietario`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculo`
--

CREATE TABLE `veiculo` (
    `idveiculo` int(11) NOT NULL, `idmarca` int(11) NOT NULL, `proprietario_idproprietario` int(11) NOT NULL, `modelo` varchar(100) DEFAULT NULL, `ano` int(11) DEFAULT NULL, `cor` varchar(50) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Despejando dados para a tabela `veiculo`
--
--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `manutencao`
--
ALTER TABLE `manutencao`
ADD PRIMARY KEY (`idManutencao`),
ADD KEY `fk_Manutencao_veiculo1_idx` (`idveiculo`);

--
-- Índices de tabela `marcas`
--
ALTER TABLE `marcas` ADD PRIMARY KEY (`idmarca`);

--
-- Índices de tabela `proprietario`
--
ALTER TABLE `proprietario` ADD PRIMARY KEY (`idproprietario`);

--
-- Índices de tabela `veiculo`
--
ALTER TABLE `veiculo`
ADD PRIMARY KEY (
    `idveiculo`, `idmarca`, `proprietario_idproprietario`
),
ADD KEY `fk_veiculo_marcas_idx` (`idmarca`),
ADD KEY `fk_veiculo_proprietario1_idx` (`proprietario_idproprietario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `manutencao`
--
ALTER TABLE `manutencao`
MODIFY `idManutencao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT de tabela `proprietario`
--
ALTER TABLE `proprietario`
MODIFY `idproprietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
MODIFY `idveiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `manutencao`
--
ALTER TABLE `manutencao`
ADD CONSTRAINT `fk_Manutencao_veiculo1` FOREIGN KEY (`idveiculo`, `idmarca`) REFERENCES `veiculo` (`idveiculo`, `idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `veiculo`
--
ALTER TABLE `veiculo`
ADD CONSTRAINT `fk_veiculo_marcas` FOREIGN KEY (`idmarca`) REFERENCES `marcas` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_veiculo_proprietario1` FOREIGN KEY (`proprietario_idproprietario`) REFERENCES `proprietario` (`idproprietario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;