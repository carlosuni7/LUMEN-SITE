-- DDL - DATA DEFINITION LANGUAGE - CREATE TABLE, ALTER TABLE, DROP TABLE
DROP DATABASE `lumen_produtos`;

CREATE DATABASE `lumen_produtos`;

CREATE TABLE `lojas` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(200),
  `descricao` varchar(200),
  `ativo` int DEFAULT 1
);

CREATE TABLE `categorias` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) UNIQUE,
  `descricao` varchar(200),
  `ativo` int DEFAULT 1
);

CREATE TABLE `produtos` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(200),
  `descricao` varchar(200),
  `preco` double(255,2),
  `id_loja` int,
  `id_categoria` int,
  `ativo` int NOT NULL DEFAULT 1
);

ALTER TABLE `produtos` ADD FOREIGN KEY (`id_loja`) REFERENCES `lojas` (`id`);

ALTER TABLE `produtos` ADD FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
