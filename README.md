# gerenciamentoClientes
Projeto da disciplina de gerencia de projetos de ADS no IFRS

# Scrip para criação do banco de dados

create schema gerenciamentoClientes;

use gerenciamentoClientes;

CREATE TABLE `representante` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `status` int DEFAULT 0,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
)
