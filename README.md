# Gerenciamento de Clientes de Vinicola

Projeto da disciplina de gerencia de projetos de ADS no IFRS

## Script para subir banco de dados no docker

1 - Certifique-se de ter o Docker instalado.
2 - Abra o cmd diretamente na pasta raiz do projeto e rode o seguinte comando:

docker-compose up -d

Este comando inicializará uma imagem do MySql em um container

## Script para criação do banco de dados

use gerenciamentoclientes;

CREATE TABLE representante (
id bigint unsigned NOT NULL AUTO_INCREMENT,
name varchar(100) NOT NULL,
endereco varchar(250),
telefone varchar(15),
email varchar(50) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
documento varchar(14),
estado varchar(2),
status int DEFAULT 0,
password varchar(100) NOT NULL,
PRIMARY KEY (id),
UNIQUE KEY id (id)
);

ALTER USER 'gerenciamentoclientes'@'%' IDENTIFIED WITH mysql_native_password BY '123456';
