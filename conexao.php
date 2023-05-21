<?php
define("SERVER", "localhost");
define("USER", "root");
define("PASSWORD", "root");
define("DB", "gerenciamentoClientes");

function cria_conexao()
{
    try {
        $conexao = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWORD);
        echo ("Conectado");
        return $conexao;
    } catch (PDOException $e) {
        print("Error: " . $e->getMessage());
    }
}
